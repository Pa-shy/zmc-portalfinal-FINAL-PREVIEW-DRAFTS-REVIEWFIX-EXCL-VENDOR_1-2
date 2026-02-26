<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\AuditTrail;
use App\Models\AuditLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSystemController extends Controller
{
    /**
     * Workflow + routing configuration (read-only UI for now).
     */
    public function workflow()
    {
        // Ordered pipeline for oversight
        $pipeline = [
            ['key' => Application::SUBMITTED,        'label' => 'Submitted',           'stage' => 'Officer'],
            ['key' => Application::OFFICER_REVIEW,   'label' => 'Officer Review',      'stage' => 'Officer'],
            ['key' => Application::OFFICER_APPROVED, 'label' => 'Officer Approved',    'stage' => 'Accounts'],
            ['key' => Application::ACCOUNTS_REVIEW,  'label' => 'Accounts Review',     'stage' => 'Accounts'],
            ['key' => Application::PAID_CONFIRMED,   'label' => 'Payment Confirmed',   'stage' => 'Registrar'],
            ['key' => Application::REGISTRAR_REVIEW, 'label' => 'Registrar Review',    'stage' => 'Registrar'],
            ['key' => Application::REGISTRAR_APPROVED,'label' => 'Registrar Approved', 'stage' => 'Production'],
            ['key' => Application::PRODUCTION_QUEUE, 'label' => 'Production Queue',    'stage' => 'Production'],
            ['key' => Application::CARD_GENERATED,   'label' => 'Card Generated',      'stage' => 'Production'],
            ['key' => Application::CERT_GENERATED,   'label' => 'Certificate Generated','stage' => 'Production'],
            ['key' => Application::PRINTED,          'label' => 'Printed',             'stage' => 'Production'],
            ['key' => Application::ISSUED,           'label' => 'Issued',              'stage' => 'Complete'],
        ];

        $counts = Application::selectRaw('status, COUNT(*) as c')
            ->groupBy('status')
            ->pluck('c', 'status')
            ->toArray();

        // Allowed transitions (governed by business logic in controllers)
        $transitions = [
            Application::SUBMITTED => [Application::OFFICER_REVIEW, Application::OFFICER_REJECTED],
            Application::OFFICER_REVIEW => [Application::OFFICER_APPROVED, Application::CORRECTION_REQUESTED, Application::OFFICER_REJECTED],
            Application::OFFICER_APPROVED => [Application::ACCOUNTS_REVIEW],
            Application::ACCOUNTS_REVIEW => [Application::PAID_CONFIRMED],
            Application::PAID_CONFIRMED => [Application::REGISTRAR_REVIEW],
            Application::REGISTRAR_REVIEW => [Application::REGISTRAR_APPROVED, Application::REGISTRAR_REJECTED],
            Application::REGISTRAR_APPROVED => [Application::PRODUCTION_QUEUE],
            Application::PRODUCTION_QUEUE => [Application::CARD_GENERATED, Application::CERT_GENERATED],
            Application::CARD_GENERATED => [Application::PRINTED],
            Application::CERT_GENERATED => [Application::PRINTED],
            Application::PRINTED => [Application::ISSUED],
        ];

        return view('admin/system/workflow', compact('pipeline', 'counts', 'transitions'));
    }

    /**
     * Templates catalogue (read-only UI; actual template files are managed by IT).
     */
    public function templates()
    {
        $templates = [
            ['name' => 'Accreditation Card Template', 'type' => 'Card', 'owner' => 'Production', 'status' => 'Active'],
            ['name' => 'Accreditation Certificate Template', 'type' => 'Certificate', 'owner' => 'Production', 'status' => 'Active'],
            ['name' => 'Approval Letter', 'type' => 'Letter', 'owner' => 'Registrar', 'status' => 'Active'],
            ['name' => 'Rejection Letter', 'type' => 'Letter', 'owner' => 'Registrar', 'status' => 'Active'],
            ['name' => 'Correction Request', 'type' => 'Letter', 'owner' => 'Officer', 'status' => 'Active'],
            ['name' => 'SMS – Application Update', 'type' => 'SMS', 'owner' => 'System', 'status' => 'Active'],
            ['name' => 'Email – Payment Instructions', 'type' => 'Email', 'owner' => 'Accounts', 'status' => 'Active'],
        ];

        return view('admin/system/templates', compact('templates'));
    }

    /**
     * Fees & Payments configuration (read-only UI; fee catalogue can be wired to a model later).
     */
    public function fees()
    {
        $feeCatalogue = [
            ['category' => 'Accreditation – Local Media Practitioner', 'amount' => 'Configured in Finance', 'channel' => 'PayNow / Bank'],
            ['category' => 'Accreditation – Foreign Media Practitioner', 'amount' => 'Configured in Finance', 'channel' => 'PayNow / Bank'],
            ['category' => 'Registration – Mass Media Service', 'amount' => 'Configured in Finance', 'channel' => 'PayNow / Bank'],
            ['category' => 'Replacement – Card', 'amount' => 'Configured in Finance', 'channel' => 'Cash / Bank'],
            ['category' => 'Replacement – Certificate', 'amount' => 'Configured in Finance', 'channel' => 'Cash / Bank'],
        ];

        $pendingPayments = Application::whereIn('status', [Application::ACCOUNTS_REVIEW])->count();
        $paidConfirmed = Application::whereIn('status', [Application::PAID_CONFIRMED, Application::REGISTRAR_REVIEW])->count();

        return view('admin/system/fees', compact('feeCatalogue', 'pendingPayments', 'paidConfirmed'));
    }

    /**
     * Audit & Logs.
     */
    public function audit(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $auditTrail = AuditTrail::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('action', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(25);

        $auditLog = AuditLog::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('action', 'like', "%{$q}%")
                    ->orWhere('meta', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(25, ['*'], 'auditlog');

        return view('admin/audit/index', compact('auditTrail', 'auditLog', 'q'));
    }

    /**
     * Regions & Offices (simple catalogue view; can be wired to a model later).
     */
    public function regions()
    {
        $offices = [
            ['name' => 'Head Office (Harare)', 'code' => 'HQ', 'status' => 'Active'],
            ['name' => 'Bulawayo Regional Office', 'code' => 'BYO', 'status' => 'Active'],
            ['name' => 'Mutare Regional Office', 'code' => 'MTR', 'status' => 'Active'],
            ['name' => 'Gweru Regional Office', 'code' => 'GWE', 'status' => 'Active'],
            ['name' => 'Masvingo Regional Office', 'code' => 'MSV', 'status' => 'Active'],
        ];

        return view('admin/system/regions', compact('offices'));
    }

    /**
     * System health + queue visibility.
     */
    public function health()
    {
        $stageCounts = [
            'Officer' => Application::whereIn('status', [Application::SUBMITTED, Application::OFFICER_REVIEW, Application::CORRECTION_REQUESTED])->count(),
            'Accounts' => Application::whereIn('status', [Application::OFFICER_APPROVED, Application::ACCOUNTS_REVIEW])->count(),
            'Registrar' => Application::whereIn('status', [Application::PAID_CONFIRMED, Application::REGISTRAR_REVIEW])->count(),
            'Production' => Application::whereIn('status', [Application::REGISTRAR_APPROVED, Application::PRODUCTION_QUEUE, Application::CARD_GENERATED, Application::CERT_GENERATED, Application::PRINTED])->count(),
        ];

        // Simple "stuck" detection: applications not updated in 7 days and not complete
        $stuck = Application::whereNotIn('status', [Application::ISSUED, Application::OFFICER_REJECTED, Application::REGISTRAR_REJECTED])
            ->where('updated_at', '<', Carbon::now()->subDays(7))
            ->latest('updated_at')
            ->take(25)
            ->get();

        $dbOk = true;
        try {
            DB::select('select 1');
        } catch (\Throwable $e) {
            $dbOk = false;
        }

        $env = [
            'app_env' => config('app.env'),
            'app_debug' => (bool) config('app.debug'),
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'db_connection' => config('database.default'),
        ];

        return view('admin/system/health', compact('stageCounts', 'stuck', 'dbOk', 'env'));
    }

    /**
     * Admin profile + theme + password settings.
     */
    public function settings()
    {
        $user = auth()->user();
        return view('settings.index', compact('user'));
    }
}
