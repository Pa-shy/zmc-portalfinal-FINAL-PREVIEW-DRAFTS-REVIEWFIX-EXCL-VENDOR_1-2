<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ActivityLog;
use App\Models\PrintLog;
use App\Models\DocumentVersion;
use App\Models\Notice;
use App\Models\Event;
use App\Models\News;
use App\Services\ApplicationWorkflow;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RegistrarController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $today = now()->startOfDay();
        $thisWeek = now()->startOfWeek();

        // KPIs
        $kpis = [
            'awaiting_registrar' => Application::where('status', Application::REGISTRAR_REVIEW) // Now it comes from AO
                ->where(function($q) use ($user) {
                    $q->whereNull('assigned_officer_id')
                      ->orWhere('assigned_officer_id', $user->id);
                })->count(),
            'approved_today' => Application::where('status', Application::ACCOUNTS_REVIEW)->where('last_action_at', '>=', $today)->count(),
            'approved_this_week' => Application::where('status', Application::ACCOUNTS_REVIEW)->where('last_action_at', '>=', $thisWeek)->count(),
            'returned_to_officer' => Application::where('status', Application::RETURNED_TO_OFFICER)->count(),

            // Category mismatches: items where registrar changed the category
            'category_mismatches' => ActivityLog::where('action', 'registrar_reassign_category')->where('created_at', '>=', $thisWeek)->count(),

            'certificates_generated_today' => DocumentVersion::where('document_type', 'certificate')->where('created_at', '>=', $today)->count(),
            'prints_today' => PrintLog::where('created_at', '>=', $today)->count(),

            // Reprints flagged: prints > 1
            'flagged_reprints' => Application::where('print_count', '>', 1)->count(),

            // New: Applications awaiting Registrar to approve for payment
            'awaiting_payment_approval' => Application::where('status', Application::REGISTRAR_REVIEW)
                ->whereNull('registrar_reviewed_at')
                ->where('payment_status', '!=', 'paid')
                ->where(function($q) use ($user) {
                    $q->whereNull('assigned_officer_id')
                      ->orWhere('assigned_officer_id', $user->id);
                })
                ->count(),
        ];

        // Global Filters logic for the main dashboard list
        $query = Application::query()
            ->with(['applicant', 'lastActionBy'])
            ->withCount('printLogs');

        // Concurrency visibility logic
        $query->where(function($q) use ($user) {
            $q->whereNull('assigned_officer_id')
              ->orWhere('assigned_officer_id', $user->id);
        });

        $query->where(function($q) use ($user) {
            $q->whereNull('locked_at')
              ->orWhere('locked_at', '<=', now()->subHours(2))
              ->orWhere('locked_by', $user->id);
        });

        if ($request->filled('type')) {
            $query->where('application_type', $request->type);
        }
        if ($request->filled('classification')) {
            $query->where('journalist_scope', $request->classification);
        }
        if ($request->filled('residency')) {
            $query->where('residency_type', $request->residency);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('reference', 'like', "%$s%")
                  ->orWhereHas('applicant', function($aq) use ($s) {
                      $aq->where('name', 'like', "%$s%");
                  });
            });
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // By default show items needing attention or recently approved
        if (!$request->filled('status')) {
            $query->whereIn('status', [
                Application::PAID_CONFIRMED,
                Application::REGISTRAR_REVIEW,
                Application::REGISTRAR_APPROVED,
                Application::RETURNED_TO_OFFICER,
                Application::ACCOUNTS_REVIEW,
            ]);
        }

        $applications = $query->latest()->paginate(20)->withQueryString();

        // Activity feed - recent registrar-related actions
        $activity = ActivityLog::query()
            ->whereIn('action', [
                'registrar_approve',
                'registrar_reject',
                'registrar_return_to_accounts',
                'registrar_reassign_category',
                'registrar_approve_for_payment',
                'accounts_confirm_paid',
                'officer_approve',
                'application_submitted',
            ])
            ->with(['user', 'entity'])
            ->latest()
            ->limit(15)
            ->get();

        return view('staff.registrar.dashboard', compact('applications', 'kpis', 'activity'));
    }

    /**
     * 2) Incoming Queue: “Confirmed by Accreditation Officer”
     * Driven by workflow: confirmed items that cleared accounts.
     */
    public function incomingQueue(Request $request)
    {
        $query = Application::query()
            ->with(['applicant', 'assignedOfficer', 'payments'])
            ->where('status', Application::REGISTRAR_REVIEW);

        // Apply filters
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('reference', 'like', "%$s%")
                  ->orWhereHas('applicant', function($aq) use ($s) {
                      $aq->where('name', 'like', "%$s%");
                  });
            });
        }

        $applications = $query->latest('last_action_at')->paginate(20);

        return view('staff.registrar.incoming_queue', compact('applications'));
    }

    /**
     * Registrar approves for payment.
     */
    public function approveForPayment(Request $request, Application $application)
    {
        $data = $request->validate([
            'decision_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        // Transitions to accounts_review so they can handle payment
        ApplicationWorkflow::transition($application, Application::ACCOUNTS_REVIEW, 'registrar_approve_for_payment', [
            'notes' => $data['decision_notes'] ?? null,
        ]);

        $this->safeSet($application, [
            'registrar_reviewed_at' => now(),
            'registrar_reviewed_by' => Auth::id(),
            'decision_notes' => $data['decision_notes'] ?? $application->decision_notes,
        ]);

        return back()->with('success', 'Application approved for payment and forwarded to Accounts.');
    }

    public function applicationsList(Request $request, string $type, string $bucket)
    {
        abort_unless(in_array($type, ['accreditation', 'registration'], true), 404);

        $statusMap = [
            'new' => [Application::PAID_CONFIRMED],
            'under-review' => [Application::REGISTRAR_REVIEW],
            'approved' => [Application::REGISTRAR_APPROVED],
            'rejected' => [Application::REGISTRAR_REJECTED],
            'corrections' => [Application::RETURNED_TO_OFFICER, Application::RETURNED_TO_ACCOUNTS],
        ];

        $statuses = $statusMap[$bucket] ?? [Application::PAID_CONFIRMED, Application::REGISTRAR_REVIEW];

        $applications = Application::query()
            ->with('applicant')
            ->withCount('documents')
            ->where('application_type', $type)
            ->whereIn('status', $statuses)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $title = ucfirst($type) . ' • ' . ucwords(str_replace('-', ' ', $bucket));

        return view('staff.registrar.applications_list', compact('applications', 'title', 'type', 'bucket'));
    }

    public function renewalsList(Request $request, string $bucket)
    {
        $base = Application::query()
            ->with('applicant')
            ->withCount('documents')
            ->where('request_type', 'renewal');

        if ($bucket === 'due-soon') {
            $base->whereIn('status', [
                Application::PAID_CONFIRMED,
                Application::REGISTRAR_REVIEW,
                Application::REGISTRAR_APPROVED,
                Application::ISSUED,
            ]);
        } elseif ($bucket === 'submitted') {
            $base->whereIn('status', [
                Application::PAID_CONFIRMED,
                Application::REGISTRAR_REVIEW,
            ]);
        } elseif ($bucket === 'renewed-expired') {
            $base->whereIn('status', [
                Application::REGISTRAR_APPROVED,
                Application::ISSUED,
            ]);
        }

        $applications = $base->latest()->paginate(20)->withQueryString();

        $title = 'Renewals (AP5) • ' . ucwords(str_replace('-', ' ', $bucket));

        return view('staff.registrar.applications_list', compact('applications', 'title'));
    }

    public function placeholder(string $title, string $hint = '')
    {
        return view('staff.registrar.placeholder', compact('title', 'hint'));
    }

    public function show(Application $application)
    {
        // Try to claim the application (concurrency lock)
        if (!$application->claim(auth()->user())) {
            $lockerName = $application->lockedBy ? $application->lockedBy->name : 'another official';
            return redirect()->back()->with('error', "This application is currently being worked on by {$lockerName}.");
        }

        $application->load(['applicant', 'documents', 'messages', 'workflowLogs', 'payments', 'printLogs', 'documentVersions', 'lockedBy']);

        // Audit trail from ActivityLog
        $auditTrail = ActivityLog::where('entity_type', get_class($application))
            ->where('entity_id', $application->id)
            ->with('user')
            ->latest()
            ->get();

        return view('staff.registrar.show', compact('application', 'auditTrail'));
    }

    /**
     * Registrar reassigns category.
     */
    public function reassignCategory(Request $request, Application $application)
    {
        $data = $request->validate([
            'category_code' => 'required|string',
            'reason' => 'required|string|max:1000',
        ]);

        $oldCategory = $application->accreditation_category_code ?? $application->media_house_category_code;

        if ($application->application_type === 'registration') {
            $application->media_house_category_code = $data['category_code'];
        } else {
            $application->accreditation_category_code = $data['category_code'];
        }

        $application->save();

        ActivityLogger::log('registrar_reassign_category', $application, $application->status, $application->status, [
            'old_category' => $oldCategory,
            'new_category' => $data['category_code'],
            'reason' => $data['reason'],
        ]);

        return back()->with('success', 'Category reassigned successfully.');
    }

    /**
     * Registrar approves -> moves to Accounts for payment
     */
        public function approve(Request $request, Application $application)
    {
        // Actually, the issue says Registrar pushes to Accounts.
        // If Registrar is doing "Approval", it's likely "Approval for Payment".

        $data = $request->validate([
            'decision_notes' => ['nullable', 'string', 'max:5000'],
            'category_code'  => ['required', 'string', 'max:10'],
        ]);

        $from = $application->status;

        // Persist category selection
        if ($application->application_type === 'registration') {
            $allowed = array_keys(Application::massMediaCategories());
            abort_unless(in_array($data['category_code'], $allowed, true), 422, 'Invalid media house category.');
            $application->media_house_category_code = $data['category_code'];
        } else {
            $allowed = array_keys(Application::accreditationCategories());
            abort_unless(in_array($data['category_code'], $allowed, true), 422, 'Invalid accreditation category.');
            $application->accreditation_category_code = $data['category_code'];
        }

        if (!empty($data['decision_notes'])) {
            $application->decision_notes = $data['decision_notes'];
        }
        $application->save();

        // Registrar approves moves it to ACCOUNTS_REVIEW as per requested workflow
        ApplicationWorkflow::transition($application, Application::ACCOUNTS_REVIEW, 'registrar_approve_for_payment', [
            'decision_notes' => $data['decision_notes'] ?? null,
            'category_code'  => $data['category_code'],
        ]);

        $this->safeSet($application, [
            'registrar_reviewed_at' => now(),
            'registrar_reviewed_by' => Auth::id(),
        ]);

        ActivityLogger::log('registrar_approve', $application, $from, $application->status, [
            'actor_role' => session('active_staff_role'),
            'category_code' => $data['category_code'],
        ]);

        return back()->with('success', 'Approved and sent to Accounts for payment.');
    }


    public function reject(Request $request, Application $application)
    {
        $data = $request->validate([
            'decision_notes' => ['required', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        $this->safeSet($application, [
            'rejection_reason' => $data['decision_notes'],
            'decision_notes' => $data['decision_notes'],
        ]);

        ApplicationWorkflow::transition($application, Application::REGISTRAR_REJECTED, 'registrar_reject', [
            'reason' => $data['decision_notes'],
        ]);

        $application->refresh();

        $this->audit('registrar_reject', $application, $from, $application->status, [
            'reason' => $data['decision_notes'],
        ]);

        return back()->with('success', 'Rejected.');
    }

    public function returnToAccounts(Request $request, Application $application)
    {
        $data = $request->validate([
            'decision_notes' => ['required', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        ApplicationWorkflow::transition($application, Application::RETURNED_TO_ACCOUNTS, 'registrar_return_to_accounts', [
            'notes' => $data['decision_notes'],
        ]);

        $this->safeSet($application, ['decision_notes' => $data['decision_notes']]);

        $application->refresh();

        $this->audit('registrar_return_to_accounts', $application, $from, $application->status, [
            'notes' => $data['decision_notes'],
        ]);

        return back()->with('success', 'Returned to Accounts/Payments.');
    }

    public function sendRenewalReminders(Request $request)
    {
        $data = $request->validate([
            'record_type' => ['required', 'in:accreditation,registration'],
            'record_ids' => ['nullable', 'array'],
            'record_ids.*' => ['integer'],
        ]);

        $count = 0;
        $type = $data['record_type'];
        $ids = $data['record_ids'] ?? [];

        if ($type === 'accreditation' && class_exists(\App\Models\AccreditationRecord::class)) {
            $query = \App\Models\AccreditationRecord::query()->with('holder');
            if (!empty($ids)) {
                $query->whereIn('id', $ids);
            } else {
                $cutoff = now()->addDays(90);
                $query->whereNotNull('expires_at')
                      ->where('expires_at', '>=', now())
                      ->where('expires_at', '<=', $cutoff);
            }
            $records = $query->get();
            foreach ($records as $record) {
                if ($record->holder) {
                    activity()
                        ->causedBy(Auth::user())
                        ->performedOn($record)
                        ->withProperties(['holder_email' => $record->holder->email])
                        ->log('renewal_reminder_sent');
                    $count++;
                }
            }
        } elseif ($type === 'registration' && class_exists(\App\Models\RegistrationRecord::class)) {
            $query = \App\Models\RegistrationRecord::query()->with('contact');
            if (!empty($ids)) {
                $query->whereIn('id', $ids);
            } else {
                $cutoff = now()->addDays(90);
                $query->whereNotNull('expires_at')
                      ->where('expires_at', '>=', now())
                      ->where('expires_at', '<=', $cutoff);
            }
            $records = $query->get();
            foreach ($records as $record) {
                if ($record->contact) {
                    activity()
                        ->causedBy(Auth::user())
                        ->performedOn($record)
                        ->withProperties(['contact_email' => $record->contact->email])
                        ->log('renewal_reminder_sent');
                    $count++;
                }
            }
        }

        return back()->with('success', "Renewal reminders sent to {$count} " . ($type === 'accreditation' ? 'journalists' : 'media houses') . ".");
    }

    /* helpers */
    private function audit(string $action, Application $application, ?string $from, ?string $to, array $meta = []): void
    {
        $payload = array_merge([
            'actor_role' => session('active_staff_role'),
            'actor_user_id' => Auth::id(),
            'from_status' => $from,
            'to_status' => $to,
        ], $meta);

        ActivityLogger::log($action, $application, $from, $to, $payload);
        \App\Support\AuditTrail::log($action, $application, $payload);
    }

    private function safeSet(Application $application, array $fields): void
    {
        foreach ($fields as $k => $v) {
            if ($this->hasColumn('applications', $k)) {
                $application->{$k} = $v;
            }
        }
        $application->save();
    }

    public function reports(Request $request)
    {
        $query = Application::query();

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $approvals = (clone $query)->where('status', Application::REGISTRAR_APPROVED)->count();
        $reassignments = ActivityLog::where('action', 'registrar_reassign_category')
            ->when($request->filled('date_from'), fn($q) => $q->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn($q) => $q->whereDate('created_at', '<=', $request->date_to))
            ->count();

        $totalPrints = PrintLog::when($request->filled('date_from'), fn($q) => $q->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn($q) => $q->whereDate('created_at', '<=', $request->date_to))
            ->count();

        $edits = DocumentVersion::when($request->filled('date_from'), fn($q) => $q->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn($q) => $q->whereDate('created_at', '<=', $request->date_to))
            ->count();

        return view('staff.registrar.reports', compact('approvals', 'reassignments', 'totalPrints', 'edits'));
    }

    public function auditTrailSearch(Request $request)
    {
        $query = ActivityLog::query()->with(['user', 'entity']);

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('action', 'like', "%$s%")
                  ->orWhere('meta', 'like', "%$s%")
                  ->orWhereHas('user', function($uq) use ($s) {
                      $uq->where('name', 'like', "%$s%");
                  });
            });
        }

        $logs = $query->latest()->paginate(50);
        return view('staff.registrar.audit_trail', compact('logs'));
    }

    private function hasColumn(string $table, string $column): bool
    {
        try { return Schema::hasColumn($table, $column); }
        catch (\Throwable $e) { return false; }
    }

    /**
     * View Notices & Events (Read-only)
     */
    public function noticesEvents(Request $request)
    {
        $notices = Notice::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(20);

        $events = Event::query()
            ->where('is_published', true)
            ->orderBy('starts_at')
            ->paginate(20);

        return view('staff.registrar.notices_events', compact('notices', 'events'));
    }

    /**
     * View News / Press Statements (Read-only)
     */
    public function news(Request $request)
    {
        $news = News::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(20);

        return view('staff.registrar.news', compact('news'));
    }
}
