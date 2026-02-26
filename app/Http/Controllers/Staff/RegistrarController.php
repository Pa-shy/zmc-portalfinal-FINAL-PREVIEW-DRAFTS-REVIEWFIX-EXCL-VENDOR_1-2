<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ActivityLog;
use App\Models\Payment;
use App\Models\PrintLog;
use App\Models\DocumentVersion;
use App\Models\Notice;
use App\Models\Event;
use App\Models\News;
use App\Models\Reminder;
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

        $kpis = [
            'awaiting_registrar' => Application::whereIn('status', [
                    Application::REGISTRAR_REVIEW,
                    Application::APPROVED_AWAITING_PAYMENT,
                    Application::FORWARDED_TO_REGISTRAR,
                ])
                ->where(function($q) use ($user) {
                    $q->whereNull('assigned_officer_id')
                      ->orWhere('assigned_officer_id', $user->id);
                })->count(),
            'approved_today' => Application::where('status', Application::ACCOUNTS_REVIEW)->where('last_action_at', '>=', $today)->count(),
            'approved_this_week' => Application::where('status', Application::ACCOUNTS_REVIEW)->where('last_action_at', '>=', $thisWeek)->count(),
            'returned_to_officer' => Application::where('status', Application::RETURNED_TO_OFFICER)->count(),
            'category_mismatches' => ActivityLog::where('action', 'registrar_reassign_category')->where('created_at', '>=', $thisWeek)->count(),
            'certificates_generated_today' => DocumentVersion::where('document_type', 'certificate')->where('created_at', '>=', $today)->count(),
            'prints_today' => PrintLog::where('created_at', '>=', $today)->count(),
            'flagged_reprints' => Application::where('print_count', '>', 1)->count(),
            'awaiting_payment_approval' => Application::where('status', Application::APPROVED_AWAITING_PAYMENT)
                ->where(function($q) use ($user) {
                    $q->whereNull('assigned_officer_id')
                      ->orWhere('assigned_officer_id', $user->id);
                })
                ->count(),
            'forwarded_to_registrar' => Application::where('status', Application::FORWARDED_TO_REGISTRAR)->count(),
            'fix_requests' => Application::where('status', Application::REGISTRAR_FIX_REQUEST)->count(),
        ];

        $query = Application::query()
            ->with(['applicant', 'lastActionBy'])
            ->withCount('printLogs');

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

        if (!$request->filled('status')) {
            $query->whereIn('status', [
                Application::PAID_CONFIRMED,
                Application::REGISTRAR_REVIEW,
                Application::REGISTRAR_APPROVED,
                Application::RETURNED_TO_OFFICER,
                Application::ACCOUNTS_REVIEW,
                Application::APPROVED_AWAITING_PAYMENT,
                Application::FORWARDED_TO_REGISTRAR,
                Application::REGISTRAR_FIX_REQUEST,
            ]);
        }

        $applications = $query->latest()->paginate(20)->withQueryString();

        $activity = ActivityLog::query()
            ->whereIn('action', [
                'registrar_approve',
                'registrar_reject',
                'registrar_return_to_accounts',
                'registrar_reassign_category',
                'registrar_approve_for_payment',
                'registrar_fix_request',
                'registrar_push_to_accounts',
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

    public function incomingQueue(Request $request)
    {
        $query = Application::query()
            ->with(['applicant', 'assignedOfficer', 'payments'])
            ->whereIn('status', [
                Application::REGISTRAR_REVIEW,
                Application::APPROVED_AWAITING_PAYMENT,
                Application::FORWARDED_TO_REGISTRAR,
            ]);

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

    public function approveForPayment(Request $request, Application $application)
    {
        $data = $request->validate([
            'decision_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        ApplicationWorkflow::transition($application, Application::ACCOUNTS_REVIEW, 'registrar_approve_for_payment', [
            'notes' => $data['decision_notes'] ?? null,
        ]);

        $this->safeSet($application, [
            'registrar_reviewed_at' => now(),
            'registrar_reviewed_by' => Auth::id(),
            'decision_notes' => $data['decision_notes'] ?? $application->decision_notes,
        ]);

        $this->audit('registrar_approve_for_payment', $application, $from, $application->status, [
            'notes' => $data['decision_notes'] ?? null,
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
        if (!$application->claim(auth()->user())) {
            $lockerName = $application->lockedBy ? $application->lockedBy->name : 'another official';
            return redirect()->back()->with('error', "This application is currently being worked on by {$lockerName}.");
        }

        $application->load(['applicant', 'documents', 'messages', 'workflowLogs', 'payments', 'printLogs', 'documentVersions', 'lockedBy']);

        $auditTrail = ActivityLog::where('entity_type', get_class($application))
            ->where('entity_id', $application->id)
            ->with('user')
            ->latest()
            ->get();

        $previousApplications = collect();
        if ($application->applicant_user_id) {
            $previousApplications = Application::where('applicant_user_id', $application->applicant_user_id)
                ->where('id', '!=', $application->id)
                ->latest()
                ->get();
        }

        return view('staff.registrar.show', compact('application', 'auditTrail', 'previousApplications'));
    }

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

    public function approve(Request $request, Application $application)
    {
        $data = $request->validate([
            'decision_notes' => ['nullable', 'string', 'max:5000'],
            'category_code'  => ['required', 'string', 'max:10'],
            'registrar_letter' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
        ]);

        $from = $application->status;

        if ($application->application_type === 'registration') {
            $allowed = array_keys(Application::massMediaCategories());
            abort_unless(in_array($data['category_code'], $allowed, true), 422, 'Invalid media house category.');
            $application->media_house_category_code = $data['category_code'];

            if ($request->hasFile('registrar_letter')) {
                $path = $request->file('registrar_letter')->store('documents/registrar_letters', 'public');
                $application->registrar_letter_path = $path;
            }

            if (empty($application->registrar_letter_path)) {
                return back()->withErrors(['registrar_letter' => 'Official registrar letter must be uploaded for media house registration approval.']);
            }

            if (!empty($data['decision_notes'])) {
                $application->decision_notes = $data['decision_notes'];
            }
            $application->save();

            ApplicationWorkflow::transition($application, Application::REGISTRAR_APPROVED_PENDING_REG_FEE, 'registrar_approve_pending_reg_fee', [
                'decision_notes' => $data['decision_notes'] ?? null,
                'category_code'  => $data['category_code'],
            ]);
        } else {
            $allowed = array_keys(Application::accreditationCategories());
            abort_unless(in_array($data['category_code'], $allowed, true), 422, 'Invalid accreditation category.');
            $application->accreditation_category_code = $data['category_code'];

            if (!empty($data['decision_notes'])) {
                $application->decision_notes = $data['decision_notes'];
            }
            $application->save();

            ApplicationWorkflow::transition($application, Application::ACCOUNTS_REVIEW, 'registrar_approve_for_payment', [
                'decision_notes' => $data['decision_notes'] ?? null,
                'category_code'  => $data['category_code'],
            ]);
        }

        $this->safeSet($application, [
            'registrar_reviewed_at' => now(),
            'registrar_reviewed_by' => Auth::id(),
        ]);

        $this->audit('registrar_approve', $application, $from, $application->status, [
            'category_code' => $data['category_code'],
        ]);

        $successMsg = $application->application_type === 'registration'
            ? 'Approved. Pending registration fee payment.'
            : 'Approved and sent to Accounts for payment.';

        return back()->with('success', $successMsg);
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

    public function raiseFixRequest(Request $request, Application $application)
    {
        $data = $request->validate([
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        ApplicationWorkflow::transition($application, Application::REGISTRAR_FIX_REQUEST, 'registrar_fix_request', [
            'message' => $data['message'],
        ]);

        $this->safeSet($application, [
            'correction_notes' => $data['message'],
        ]);

        $this->audit('registrar_fix_request', $application, $from, Application::REGISTRAR_FIX_REQUEST, [
            'message' => $data['message'],
        ]);

        return back()->with('success', 'Fix request sent to Accreditation Officer.');
    }

    public function pushToAccounts(Request $request, Application $application)
    {
        $data = $request->validate([
            'notes' => ['nullable', 'string', 'max:5000'],
        ]);

        abort_unless($application->status === Application::FORWARDED_TO_REGISTRAR, 422, 'Application must be in forwarded_to_registrar status.');

        $from = $application->status;

        ApplicationWorkflow::transition($application, Application::PENDING_ACCOUNTS_FROM_REGISTRAR, 'registrar_push_to_accounts', [
            'notes' => $data['notes'] ?? null,
        ]);

        $this->audit('registrar_push_to_accounts', $application, $from, Application::PENDING_ACCOUNTS_FROM_REGISTRAR, [
            'notes' => $data['notes'] ?? null,
        ]);

        return back()->with('success', 'Application pushed to Accounts for processing.');
    }

    public function accountsOversight(Request $request)
    {
        $paymentsQueue = Application::whereIn('status', [
                Application::ACCOUNTS_REVIEW,
                Application::AWAITING_ACCOUNTS_VERIFICATION,
                Application::PENDING_ACCOUNTS_FROM_REGISTRAR,
            ])
            ->with(['applicant', 'payments'])
            ->latest('last_action_at')
            ->paginate(20, ['*'], 'queue_page');

        $recentPayments = Payment::with(['application.applicant'])
            ->latest()
            ->limit(50)
            ->get();

        $paymentStats = [
            'total_payments' => Payment::count(),
            'confirmed' => Payment::where('status', 'paid')->count(),
            'pending' => Payment::where('status', 'pending')->count(),
            'rejected' => Payment::where('status', 'rejected')->count(),
        ];

        $paymentLogs = ActivityLog::whereIn('action', [
                'accounts_confirm_paid',
                'accounts_reject_payment',
                'proof_approved',
                'proof_rejected',
                'waiver_approved',
                'waiver_rejected',
                'payment_verified',
            ])
            ->with(['user', 'entity'])
            ->latest()
            ->limit(30)
            ->get();

        $waiverApplications = Application::whereNotNull('waiver_path')
            ->with('applicant')
            ->latest()
            ->limit(20)
            ->get();

        return view('staff.registrar.accounts_oversight', compact(
            'paymentsQueue',
            'recentPayments',
            'paymentStats',
            'paymentLogs',
            'waiverApplications'
        ));
    }

    public function remindersIndex(Request $request)
    {
        $reminders = Reminder::with('creator')
            ->latest()
            ->paginate(20);

        return view('staff.registrar.reminders', compact('reminders'));
    }

    public function createReminder(Request $request)
    {
        $data = $request->validate([
            'target_type' => ['required', 'in:user,media_house'],
            'target_id' => ['required', 'integer'],
            'message' => ['required', 'string', 'max:5000'],
            'reminder_type' => ['required', 'string', 'max:100'],
        ]);

        $reminder = Reminder::create([
            'target_type' => $data['target_type'],
            'target_id' => $data['target_id'],
            'message' => $data['message'],
            'reminder_type' => $data['reminder_type'],
            'created_by' => Auth::id(),
        ]);

        ActivityLogger::log('registrar_create_reminder', $reminder, null, null, [
            'target_type' => $data['target_type'],
            'target_id' => $data['target_id'],
            'reminder_type' => $data['reminder_type'],
        ]);

        return back()->with('success', 'Reminder created successfully.');
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

    public function news(Request $request)
    {
        $news = News::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(20);

        return view('staff.registrar.news', compact('news'));
    }
}
