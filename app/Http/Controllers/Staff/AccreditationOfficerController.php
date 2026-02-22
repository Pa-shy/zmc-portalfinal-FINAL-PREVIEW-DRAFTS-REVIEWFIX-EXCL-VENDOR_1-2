<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\ApplicationWorkflow;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccreditationOfficerController extends Controller
{
    /**
     * Officer dashboard statuses (your list + submitted).
     */
    public function dashboard()
    {
        $user = Auth::user();

        // KPI counts (Step 1: dashboard summary)
        $pendingStatuses = [
            Application::SUBMITTED,
            Application::OFFICER_REVIEW,
            Application::CORRECTION_REQUESTED,
            Application::RETURNED_TO_OFFICER,
        ];

        $kpis = [
            'total_applications' => Application::count(),
            'pending_applications' => Application::whereIn('status', $pendingStatuses)
                ->where(function($q) use ($user) {
                    $q->whereNull('assigned_officer_id')
                      ->orWhere('assigned_officer_id', $user->id);
                })->count(),
            'approved_applications' => Application::whereIn('status', [Application::OFFICER_APPROVED, Application::REGISTRAR_APPROVED, Application::ISSUED])->count(),
            'rejected_applications' => Application::whereIn('status', [Application::OFFICER_REJECTED, Application::REGISTRAR_REJECTED])->count(),
            'new_this_week' => Application::where('created_at', '>=', now()->startOfWeek())->count(),
        ];

        $statuses = [
            'approved_pending_payment',
            'needs_correction',
            'returned_from_payments',
            'returned_from_registrar',
            'under_officer_review',
            'corrections_requested',
            'officer_approved_pending_registrar',
            'submitted',
        ];

        $applications = Application::query()
            ->with(['applicant', 'documents'])
            ->withCount('documents')
            ->whereIn('status', $statuses)
            ->where(function($q) use ($user) {
                // Show applications that are NOT assigned to anyone else
                // AND either unassigned OR assigned to current user
                $q->whereNull('assigned_officer_id')
                  ->orWhere('assigned_officer_id', $user->id);
            })
            // Pool visibility logic (respecting lock timeout)
            ->where(function($q) use ($user) {
                $q->whereNull('locked_at')
                  ->orWhere('locked_at', '<=', now()->subHours(2))
                  ->orWhere('locked_by', $user->id);
            })
            ->latest()
            ->paginate(20);

        // Renewals due (expiring within 90 days)
        $cutoff = now()->addDays(90);
        $expiringJournalists = collect();
        $expiringMediaHouses = collect();

        if (class_exists(\App\Models\AccreditationRecord::class) && Schema::hasTable('accreditation_records')) {
            $expiringJournalists = \App\Models\AccreditationRecord::query()
                ->with('holder')
                ->whereNotNull('expires_at')
                ->where('expires_at', '>=', now())
                ->where('expires_at', '<=', $cutoff)
                ->orderBy('expires_at')
                ->limit(10)
                ->get();
        }

        if (class_exists(\App\Models\RegistrationRecord::class) && Schema::hasTable('registration_records')) {
            $expiringMediaHouses = \App\Models\RegistrationRecord::query()
                ->with('contact')
                ->whereNotNull('expires_at')
                ->where('expires_at', '>=', now())
                ->where('expires_at', '<=', $cutoff)
                ->orderBy('expires_at')
                ->limit(10)
                ->get();
        }

        // Inactive journalists (2-3 years without login)
        $inactiveJournalists = collect();
        $twoYearsAgo = now()->subYears(2);
        $threeYearsAgo = now()->subYears(3);

        if (class_exists(\App\Models\AccreditationRecord::class) && Schema::hasTable('accreditation_records')) {
            $inactiveJournalists = \App\Models\AccreditationRecord::query()
                ->join('users', 'accreditation_records.holder_user_id', '=', 'users.id')
                ->select('accreditation_records.*', 'users.updated_at as last_activity')
                ->with('holder')
                ->whereNotNull('accreditation_records.holder_user_id')
                ->where('users.updated_at', '<=', $twoYearsAgo)
                ->where('users.updated_at', '>=', $threeYearsAgo)
                ->orderBy('users.updated_at')
                ->limit(10)
                ->get();
        }

        return view('staff.officer.dashboard', compact('applications', 'kpis', 'expiringJournalists', 'expiringMediaHouses', 'inactiveJournalists'));
    }

    public function show(Application $application)
{
    // Try to claim the application (concurrency lock)
    if (!$application->claim(auth()->user())) {
        $lockerName = $application->lockedBy ? $application->lockedBy->name : 'another officer';
        return redirect()->back()->with('error', "This application is currently being worked on by {$lockerName}.");
    }

    $application->load([
        'applicant',
        'documents',
        'messages',
        'workflowLogs',
        'lockedBy',
    ]);

    return view('staff.officer.show', compact('application'));
}

public function unlock(Application $application)
{
    if ($application->locked_by === auth()->id()) {
        $application->unlock();
        return redirect()->route('staff.officer.dashboard')->with('success', 'Application released back to pool.');
    }
    return back();
}

    public function openReview(Request $request, Application $application)
    {
        $from = $application->status;

        if ($application->status !== Application::OFFICER_REVIEW) {
            ApplicationWorkflow::transition($application, Application::OFFICER_REVIEW, 'officer_open_review');
        }

        $application->refresh();
        $this->audit('officer_open_review', $application, $from, $application->status);

        return back()->with('success', 'Application moved to Officer Review.');
    }

    /**
     * ✅ Officer Approve -> PUSH TO REGISTRAR DASHBOARD (registrar_review)
     */
public function approve(Request $request, Application $application)
{
    $data = $request->validate([
        'decision_notes' => ['nullable', 'string', 'max:5000'],
        'category_code'  => ['required','string','max:10'],
    ]);

    $from = $application->status;

    // Ensure review state first
    if ($application->status === Application::SUBMITTED) {
        ApplicationWorkflow::transition($application, Application::OFFICER_REVIEW, 'officer_open_review');
    }

    // Persist category selection
    if ($application->application_type === 'registration') {
        $allowed = array_keys(Application::massMediaCategories());
        abort_unless(in_array($data['category_code'], $allowed, true), 422, 'Invalid media house category.');
        if (Schema::hasColumn('applications','media_house_category_code')) {
            $application->media_house_category_code = $data['category_code'];
        }
    } else {
        $allowed = array_keys(Application::accreditationCategories());
        abort_unless(in_array($data['category_code'], $allowed, true), 422, 'Invalid accreditation category.');
        if (Schema::hasColumn('applications','accreditation_category_code')) {
            $application->accreditation_category_code = $data['category_code'];
        }
    }
    $application->save();

    // Officer approves then pushes directly to Registrar review
    ApplicationWorkflow::transition($application, Application::OFFICER_APPROVED, 'officer_approve', [
        'decision_notes' => $data['decision_notes'] ?? null,
        'category_code' => $data['category_code'],
    ]);

    ApplicationWorkflow::transition($application, Application::REGISTRAR_REVIEW, 'system_send_to_registrar', [
        'category_code' => $data['category_code'],
    ]);

    if (!empty($data['decision_notes']) && Schema::hasColumn('applications','decision_notes')) {
        $application->decision_notes = $data['decision_notes'];
        $application->save();
    }

    $this->audit('officer_approve', $application, $from, $application->status, [
        'notes' => $data['decision_notes'] ?? null,
        'category_code' => $data['category_code'],
    ]);

    return back()->with('success', 'Approved and sent to Registrar for review.');
}


    public function reject(Request $request, Application $application)
    {
        abort(403, 'Accreditation Officers cannot reject applications. Use Request Correction or forward to Registrar.');
    }

    public function requestCorrection(Request $request, Application $application)
    {
        $data = $request->validate([
            'notes' => ['required', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        // First move to review if needed
        if ($application->status === Application::SUBMITTED) {
            ApplicationWorkflow::transition($application, Application::OFFICER_REVIEW, 'officer_open_review');
        }

        $this->safeSet($application, [
            'correction_notes' => $data['notes'],
            'decision_notes' => $data['notes'],
        ]);

        ApplicationWorkflow::transition($application, Application::CORRECTION_REQUESTED, 'officer_request_correction', [
            'notes' => $data['notes'],
        ]);

        $application->refresh();

        $this->audit('officer_request_correction', $application, $from, $application->status, [
            'notes' => $data['notes'],
        ]);

        $this->persistMessageIfAvailable($application, $data['notes']);

        return back()->with('success', 'Correction requested.');
    }

    /**
     * Display paginated list of accredited journalists with filters
     */
    public function accreditedJournalists(Request $request)
    {
        $query = \App\Models\AccreditationRecord::query()
            ->with('holder')
            ->orderBy('issued_at', 'desc');

        // Filter by search term (name or certificate number)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('certificate_no', 'like', "%{$search}%")
                  ->orWhereHas('holder', function ($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by collection status
        if ($request->filled('collection_status')) {
            $status = $request->input('collection_status');
            if ($status === 'collected') {
                $query->whereNotNull('collected_at');
            } elseif ($status === 'uncollected') {
                $query->whereNull('collected_at');
            }
        }

        // Filter by expiry status
        if ($request->filled('expiry_status')) {
            $status = $request->input('expiry_status');
            if ($status === 'expiring_soon') {
                $query->whereNotNull('expires_at')
                      ->where('expires_at', '>=', now())
                      ->where('expires_at', '<=', now()->addDays(90));
            } elseif ($status === 'expired') {
                $query->whereNotNull('expires_at')
                      ->where('expires_at', '<', now());
            }
        }

        $journalists = $query->paginate(20)->appends($request->query());

        return view('staff.officer.accredited_journalists', compact('journalists'));
    }

    /**
     * Display paginated list of registered media houses with filters
     */
    public function registeredMediaHouses(Request $request)
    {
        $query = \App\Models\RegistrationRecord::query()
            ->with('contact')
            ->orderBy('issued_at', 'desc');

        // Filter by search term (entity name or registration number)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('registration_no', 'like', "%{$search}%")
                  ->orWhere('entity_name', 'like', "%{$search}%");
            });
        }

        // Filter by collection status
        if ($request->filled('collection_status')) {
            $status = $request->input('collection_status');
            if ($status === 'collected') {
                $query->whereNotNull('collected_at');
            } elseif ($status === 'uncollected') {
                $query->whereNull('collected_at');
            }
        }

        // Filter by expiry status
        if ($request->filled('expiry_status')) {
            $status = $request->input('expiry_status');
            if ($status === 'expiring_soon') {
                $query->whereNotNull('expires_at')
                      ->where('expires_at', '>=', now())
                      ->where('expires_at', '<=', now()->addDays(90));
            } elseif ($status === 'expired') {
                $query->whereNotNull('expires_at')
                      ->where('expires_at', '<', now());
            }
        }

        $mediaHouses = $query->paginate(20)->appends($request->query());

        return view('staff.officer.registered_mediahouses', compact('mediaHouses'));
    }

    /**
     * Send collection notification to journalists/media houses
     */
    public function sendCollectionNotification(Request $request)
    {
        $data = $request->validate([
            'record_type' => ['required', 'in:accreditation,registration'],
            'record_ids' => ['nullable', 'array'],
            'record_ids.*' => ['integer'],
        ]);

        $notificationService = new \App\Services\NotificationService();
        $count = 0;
        $type = $data['record_type'];
        $ids = $data['record_ids'] ?? [];

        if ($type === 'accreditation') {
            $query = \App\Models\AccreditationRecord::query()->with('holder')->whereNull('collected_at');
            if (!empty($ids)) {
                $query->whereIn('id', $ids);
            }
            $records = $query->get();

            foreach ($records as $record) {
                if ($notificationService->sendCollectionReminder($record, 'accreditation')) {
                    activity()
                        ->causedBy(Auth::user())
                        ->performedOn($record)
                        ->log('collection_reminder_sent');
                    $count++;
                }
            }
        } else {
            $query = \App\Models\RegistrationRecord::query()->with('contact')->whereNull('collected_at');
            if (!empty($ids)) {
                $query->whereIn('id', $ids);
            }
            $records = $query->get();

            foreach ($records as $record) {
                if ($notificationService->sendCollectionReminder($record, 'registration')) {
                    activity()
                        ->causedBy(Auth::user())
                        ->performedOn($record)
                        ->log('collection_reminder_sent');
                    $count++;
                }
            }
        }

        return back()->with('success', "Collection reminders sent to {$count} " . ($type === 'accreditation' ? 'journalists' : 'media houses') . ".");
    }

    public function sendMessage(Request $request, Application $application)
    {
        $data = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $this->persistMessageIfAvailable($application, $data['message']);

        $this->audit('officer_message_sent', $application, null, null, [
            'message_preview' => Str::limit($data['message'], 100),
        ]);

        return back()->with('success', 'Message sent to applicant.');
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
                // TODO: Implement actual notification sending (email/SMS/portal notification)
                // For now, just log the action
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
                // TODO: Implement actual notification sending
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

    public function idVerify(Request $request, Application $application)
    {
        $data = $request->validate([
            'result' => ['required', 'in:pending,passed,failed'],
            'notes'  => ['nullable', 'string', 'max:5000'],
        ]);

        $from = $application->status;

        if ($this->hasColumn('applications', 'id_verification_status')) {
            $application->id_verification_status = $data['result'];
            $application->save();
        }

        $this->audit('officer_id_verify_stub', $application, $from, $from, [
            'result' => $data['result'],
            'notes' => $data['notes'] ?? null,
        ]);

        return back()->with('success', 'ID verification (stub) updated.');
    }

    /* =========================
     * Menu pages (v1)
     * ========================= */

    // --- Applications lists ---
    public function applicationsIndex()     { return $this->applicationsList('all'); }
    public function applicationsNew()       { return $this->applicationsList('new'); }
    public function applicationsPending()   { return $this->applicationsList('pending'); }
    public function applicationsApproved()  { return $this->applicationsList('approved'); }
    public function applicationsRejected()  { return $this->applicationsList('rejected'); }
    public function applicationsIncomplete(){ abort(404); } // drafts remain in applicant portal only
    public function applicationsBulk()      { return $this->placeholder('Bulk Review', 'Bulk review workflow can be enabled later (batch approve / request correction).'); }

    public function applicationsExportCsv(Request $request, string $list)
    {
        $q = $this->applicationsBaseQuery($list, $request);

        $filename = 'applications_'.$list.'_'.now()->format('Ymd_His').'.csv';
        return response()->streamDownload(function () use ($q) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['Ref','Applicant','Email','Type','Scope','Request','Status','Submitted','Category']);
            $q->chunk(500, function ($rows) use ($out) {
                foreach ($rows as $app) {
                    fputcsv($out, [
                        $app->reference,
                        $app->applicant?->name,
                        $app->applicant?->email,
                        $app->application_type,
                        $app->journalist_scope,
                        $app->request_type,
                        $app->status,
                        optional($app->created_at)->format('Y-m-d H:i'),
                        $app->categoryLabel(),
                    ]);
                }
            });
            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv']);
    }

    // --- Records ---
    public function recordsJournalists() { return $this->recordsListPage('Accredited Journalists', 'accreditation'); }
    public function recordsMediaHouses() { return $this->recordsListPage('Registered Media Houses', 'registration'); }
    public function recordsHistory()     { return $this->placeholder('Accreditation & Registration History', 'Shows historical issuance/renewal activity once records are populated.'); }
    public function recordsSuspended()   { abort(404); }
    public function recordsRenewals()    { return $this->placeholder('Renewals Management', 'Manage renewal requests (approve, reject, request info) once renewal records are enabled.'); }

    // --- Documents ---
    public function documentsUploaded() { return $this->documentsListPage('Uploaded Documents', null); }
    public function documentsPending()  { return $this->documentsListPage('Documents Pending Verification', 'pending'); }
    public function documentsVerified() { return $this->documentsListPage('Verified Documents', 'verified'); }
    public function documentsRejected() { return $this->documentsListPage('Rejected Documents', 'rejected'); }

    // --- Renewals & expiry ---
    public function renewalsExpiring() { return $this->expiriesPage('Expiring Soon'); }
    public function renewalsExpired()  { return $this->expiriesPage('Expired', true); }
    public function renewalsRequests() { return $this->placeholder('Renewal Requests', 'Lists renewal submissions once renewal linking is enabled.'); }
    public function renewalsQueue()    { return $this->followUpQueuePage(); }

    // --- Compliance ---
    public function complianceMonitoring() { return $this->placeholder('Compliance Monitoring', 'Compliance monitoring dashboard (flags, risk scores, thresholds).'); }
    public function complianceViolations() { return $this->complianceListPage('Reported Violations'); }
    public function complianceCases()      { return $this->complianceCasesPage(); }
    public function complianceUnaccredited(){ return $this->unaccreditedReportsPage(); }

    // --- Reports ---
    public function reportsStats()      { return $this->placeholder('Accreditation Statistics', 'Charts and KPIs can be added (counts by status, region, type).'); }
    public function reportsMonthly()    { return $this->placeholder('Monthly / Annual Reports', 'Generate PDF/Excel/CSV exports (installations required).'); }
    public function reportsTrends()     { return $this->placeholder('Accreditation Trends', 'Trends over time (submissions, approvals, renewals).'); }
    public function reportsCompliance() { return $this->placeholder('Compliance Reports', 'Compliance summaries and investigation outcomes.'); }

    // --- Communication ---
    public function commNotices()       { return $this->placeholder('Accreditation Notices', 'Officer-facing notices board.'); }
    public function commAnnouncements() { return $this->placeholder('Public Announcements', 'Publish announcements to applicants (subject to permissions).'); }
    public function commMemos()         { return $this->placeholder('Internal Memos', 'Internal comms for staff.'); }
    public function commMessaging()     { return $this->placeholder('Bulk Messaging', 'Send email/SMS/portal notifications (queues + providers required).'); }

    // --- Advanced ---
    public function advancedDuplicates(){ return $this->placeholder('Duplicate Applicant Detection', 'Shows potential duplicates by National ID / Passport / Email / Phone / name similarity.'); }
    public function advancedForgery()   { return $this->placeholder('AI Document Forgery Checks', 'Integrate with AI service/API to produce document risk scores.'); }
    public function advancedQr()        { return $this->placeholder('Accreditation QR Verification', 'Verify QR codes to confirm accreditation status.'); }
    public function advancedAudit()     { return $this->auditTrailPage(); }

    // --- Tools ---
    public function toolsProfile() { return redirect()->route('settings'); }
    public function toolsTasks()   { return $this->placeholder('Task Queue', 'Officer tasks queue (follow-ups, verifications, escalations).'); }
    public function toolsDrafts()  { return $this->placeholder('Saved Drafts', 'Shows saved drafts and partially completed items.'); }
    public function toolsSops()    { return $this->placeholder('System Help / SOPs', 'Upload SOP PDFs and quick guides for staff.'); }

    /* =========================
     * Internal page builders
     * ========================= */

    private function placeholder(string $title, string $subtitle = '')
    {
        return view('staff.officer.placeholder', [
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }

    private function applicationsList(string $list)
    {
        $titles = [
            'all' => 'All Applications',
            'new' => 'New Applications',
            'pending' => 'Pending Review',
            'approved' => 'Approved',
            'rejected' => 'Rejected / Returned',
        ];

        $q = $this->applicationsBaseQuery($list, request());
        $applications = $q->paginate(20)->withQueryString();

        return view('staff.officer.applications_list_filtered', [
            'title' => $titles[$list] ?? 'Applications',
            'list' => $list,
            'applications' => $applications,
            'bucketLabels' => Application::bucketLabels(),
        ]);
    }

    private function applicationsBaseQuery(string $list, Request $request)
    {
        $user = Auth::user();
        $q = Application::query()->with('applicant')->latest();

        // Pool visibility: exclude applications being worked on by others
        $q->where(function($qq) use ($user) {
            $qq->whereNull('assigned_officer_id')
              ->orWhere('assigned_officer_id', $user->id);
        });

        // Pool visibility logic (respecting lock timeout)
        $q->where(function($qq) use ($user) {
            $qq->whereNull('locked_at')
              ->orWhere('locked_at', '<=', now()->subHours(2))
              ->orWhere('locked_by', $user->id);
        });

        // exclude drafts (drafts remain in applicant portal)
        $q->where(function ($qq) {
            $qq->whereNull('status')->orWhere('status', '!=', Application::DRAFT);
        });
        if ($this->hasColumn('applications','is_draft')) {
            $q->where(function ($qq) {
                $qq->whereNull('is_draft')->orWhere('is_draft', false);
            });
        }

        // list scopes
        $list = strtolower($list);
        if ($list === 'new') {
            $q->where('status', Application::SUBMITTED);
        } elseif ($list === 'pending') {
            $q->whereIn('status', [Application::SUBMITTED, Application::OFFICER_REVIEW, Application::CORRECTION_REQUESTED, Application::RETURNED_TO_OFFICER]);
        } elseif ($list === 'approved') {
            $q->whereIn('status', [Application::OFFICER_APPROVED, Application::REGISTRAR_REVIEW]);
        } elseif ($list === 'rejected') {
            // show both rejected and returned in one page (UI tabs split)
            $q->whereIn('status', [Application::OFFICER_REJECTED, Application::RETURNED_TO_OFFICER]);
        }

        // filters
        if ($bucket = $request->query('bucket')) {
            $q->applyBucket($bucket);
        } else {
            // Individual filters as fallback
            if ($rt = $request->query('request_type')) {
                if (in_array($rt, ['new','renewal','replacement'], true)) $q->where('request_type', $rt);
            }
            if ($sc = $request->query('scope')) {
                if (in_array($sc, ['local','foreign'], true)) {
                    if ($sc === 'local') {
                        $q->where(fn($w) => $w->where('journalist_scope', 'local')->orWhereNull('journalist_scope'));
                    } else {
                        $q->where('journalist_scope', 'foreign');
                    }
                }
            }
        }

        if ($t = $request->query('application_type')) {
            if (in_array($t, ['accreditation','registration'], true)) $q->where('application_type', $t);
        }
        // Status is not exposed as a general filter (list defaults apply).
        // Only the Rejected/Returned tabs use an exact status filter.
        if ($list === 'rejected') {
            $st = $request->query('status');
            if (in_array($st, [Application::OFFICER_REJECTED, Application::RETURNED_TO_OFFICER], true)) {
                $q->where('status', $st);
            }
        }
        if ($from = $request->query('date_from')) {
            $q->whereDate('created_at', '>=', $from);
        }
        if ($to = $request->query('date_to')) {
            $q->whereDate('created_at', '<=', $to);
        }
        if ($search = trim((string)$request->query('q'))) {
            $q->where(function ($qq) use ($search) {
                $qq->where('reference', 'like', "%{$search}%")
                   ->orWhereHas('applicant', function ($u) use ($search) {
                       $u->where('name','like', "%{$search}%")
                         ->orWhere('email','like', "%{$search}%");
                   });
            });
        }

        return $q;
    }

    private function recordsListPage(string $title, string $type)
    {
        $rows = collect();
        if ($type === 'accreditation' && class_exists(\App\Models\AccreditationRecord::class) && Schema::hasTable('accreditation_records')) {
            $rows = \App\Models\AccreditationRecord::query()->with('holder')->latest('issued_at')->paginate(20);
        }
        if ($type === 'registration' && class_exists(\App\Models\RegistrationRecord::class) && Schema::hasTable('registration_records')) {
            $rows = \App\Models\RegistrationRecord::query()->with('contact')->latest('issued_at')->paginate(20);
        }

        return view('staff.officer.records_list', [
            'title' => $title,
            'type' => $type,
            'rows' => $rows,
        ]);
    }

    private function recordsSuspendedPage()
    {
        $acc = collect();
        $reg = collect();
        if (class_exists(\App\Models\AccreditationRecord::class) && Schema::hasTable('accreditation_records')) {
            $acc = \App\Models\AccreditationRecord::whereIn('status', ['suspended','revoked'])->latest('updated_at')->paginate(20, ['*'], 'acc');
        }
        if (class_exists(\App\Models\RegistrationRecord::class) && Schema::hasTable('registration_records')) {
            $reg = \App\Models\RegistrationRecord::whereIn('status', ['suspended','revoked'])->latest('updated_at')->paginate(20, ['*'], 'reg');
        }

        return view('staff.officer.records_suspended', [
            'acc' => $acc,
            'reg' => $reg,
        ]);
    }

    private function documentsListPage(string $title, ?string $verificationStatus)
    {
        $apps = collect();

        if (class_exists(\App\Models\ApplicationDocument::class) && Schema::hasTable('application_documents')) {
            $docStatus = null;
            if ($verificationStatus === 'pending') $docStatus = 'pending';
            if ($verificationStatus === 'verified') $docStatus = 'accepted';
            if ($verificationStatus === 'rejected') $docStatus = 'rejected';

            $appsQ = Application::query()
                ->with(['applicant','documents'])
                ->latest();

            // exclude drafts
            $appsQ->where(function ($qq) {
                $qq->whereNull('status')->orWhere('status','!=', Application::DRAFT);
            });

            if ($t = request()->query('application_type')) {
                if (in_array($t, ['accreditation','registration'], true)) $appsQ->where('application_type', $t);
            }

            if ($from = request()->query('date_from')) {
                $appsQ->whereDate('created_at','>=', $from);
            }
            if ($to = request()->query('date_to')) {
                $appsQ->whereDate('created_at','<=', $to);
            }

            $appsQ->whereHas('documents', function ($dq) use ($docStatus) {
                if ($docStatus) {
                    $dq->where('status', $docStatus);
                }
            });

            if ($docStatus) {
                $appsQ->with(['documents' => function ($dq) use ($docStatus) {
                    $dq->where('status', $docStatus)->latest();
                }]);
            }

            $apps = $appsQ->paginate(15)->withQueryString();
        }

        return view('staff.officer.documents_grouped', [
            'title' => $title,
            'applications' => $apps,
        ]);
    }

    private function expiriesPage(string $title, bool $expiredOnly = false)
    {
        $months = (int) request()->query('months', 3);
        $cutoff = now()->addMonths(max(1, $months));

        $acc = collect();
        $reg = collect();

        if (class_exists(\App\Models\AccreditationRecord::class) && Schema::hasTable('accreditation_records')) {
            $q = \App\Models\AccreditationRecord::query()->with('holder');
            $q->whereNotNull('expires_at');
            if ($expiredOnly) {
                $q->where('expires_at', '<', now());
            } else {
                $q->where('expires_at', '<=', $cutoff)->where('expires_at', '>=', now());
            }
            $acc = $q->orderBy('expires_at')->paginate(20, ['*'], 'acc');
        }

        if (class_exists(\App\Models\RegistrationRecord::class) && Schema::hasTable('registration_records')) {
            $q = \App\Models\RegistrationRecord::query()->with('contact');
            $q->whereNotNull('expires_at');
            if ($expiredOnly) {
                $q->where('expires_at', '<', now());
            } else {
                $q->where('expires_at', '<=', $cutoff)->where('expires_at', '>=', now());
            }
            $reg = $q->orderBy('expires_at')->paginate(20, ['*'], 'reg');
        }

        return view('staff.officer.expiries', [
            'title' => $title,
            'months' => $months,
            'acc' => $acc,
            'reg' => $reg,
        ]);
    }

    private function followUpQueuePage()
    {
        $rows = collect();
        if (class_exists(\App\Models\OfficerFollowUp::class) && Schema::hasTable('officer_followups')) {
            $rows = \App\Models\OfficerFollowUp::query()->latest()->paginate(20);
        }
        return view('staff.officer.followups', [
            'title' => 'Officer Follow-up Queue',
            'rows' => $rows,
        ]);
    }

    private function complianceListPage(string $title)
    {
        $rows = collect();
        if (class_exists(\App\Models\Violation::class) && Schema::hasTable('violations')) {
            $rows = \App\Models\Violation::query()->latest()->paginate(20);
        }
        return view('staff.officer.compliance_list', [
            'title' => $title,
            'rows' => $rows,
        ]);
    }

    private function complianceCasesPage()
    {
        $rows = collect();
        if (class_exists(\App\Models\ComplianceCase::class) && Schema::hasTable('compliance_cases')) {
            $rows = \App\Models\ComplianceCase::query()->latest()->paginate(20);
        }
        return view('staff.officer.compliance_cases', [
            'title' => 'Investigation Cases',
            'rows' => $rows,
        ]);
    }

    private function unaccreditedReportsPage()
    {
        $rows = collect();
        if (class_exists(\App\Models\UnaccreditedReport::class) && Schema::hasTable('unaccredited_reports')) {
            $rows = \App\Models\UnaccreditedReport::query()->latest()->paginate(20);
        }
        return view('staff.officer.unaccredited_reports', [
            'title' => 'Unaccredited Practice Reports',
            'rows' => $rows,
        ]);
    }

    private function auditTrailPage()
    {
        $applicationId = request()->query('application_id');
        $logs = collect();
        if (class_exists(\App\Models\ActivityLog::class) && Schema::hasTable('activity_logs')) {
            $q = \App\Models\ActivityLog::query()->latest();
            if ($applicationId) {
                $q->where('entity_type', Application::class)->where('entity_id', $applicationId);
            }
            $logs = $q->paginate(25);
        }

        return view('staff.officer.audit_trail', [
            'title' => 'Audit Trail (Per Application)',
            'logs' => $logs,
            'applicationId' => $applicationId,
        ]);
    }

    /* =========================
    /* ========================= Helpers ========================= */

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

    private function hasColumn(string $table, string $column): bool
    {
        try {
            return Schema::hasColumn($table, $column);
        } catch (\Throwable $e) {
            return false;
        }
    }

    private function persistMessageIfAvailable(Application $application, string $message): void
    {
        if (class_exists(\App\Models\ApplicationMessage::class) && Schema::hasTable('application_messages')) {
            \App\Models\ApplicationMessage::create([
                'application_id' => $application->id,
                'from_user_id'   => Auth::id(),
                'to_user_id'     => $application->applicant_user_id,
                'channel'        => 'internal',
                'subject'        => null,
                'body'           => $message,
                'sent_at'        => now(),
                'read_at'        => null,
            ]);
        }
    }
}
