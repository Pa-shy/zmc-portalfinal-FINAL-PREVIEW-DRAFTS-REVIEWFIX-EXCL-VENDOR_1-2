<?php

namespace App\Services\Director;

use App\Repositories\Director\ActivityLogRepository;
use App\Models\ActivityLog;
use App\Models\Application;
use App\Models\PrintLog;
use App\Models\DocumentVersion;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ComplianceMonitoringService
{
    public function __construct(
        private ActivityLogRepository $activityLogRepo
    ) {}

    /**
     * Get category reassignment statistics
     * 
     * @return array ['total' => int, 'by_staff' => Collection]
     */
    public function getCategoryReassignments(): array
    {
        $reassignments = $this->activityLogRepo->getByAction(
            'registrar_reassign_category',
            now()->startOfMonth(),
            now()
        );
        
        $byStaff = $this->activityLogRepo->getActionCountsByStaff('registrar_reassign_category');
        
        return [
            'total' => $reassignments->count(),
            'by_staff' => $byStaff,
        ];
    }

    /**
     * Get reopened applications statistics
     * 
     * @return array ['total' => int, 'by_staff' => Collection]
     */
    public function getReopenedApplications(): array
    {
        $reopened = $this->activityLogRepo->getByAction(
            'application_reopened',
            now()->startOfMonth(),
            now()
        );
        
        $byStaff = $this->activityLogRepo->getActionCountsByStaff('application_reopened');
        
        return [
            'total' => $reopened->count(),
            'by_staff' => $byStaff,
        ];
    }

    /**
     * Get manual override statistics
     * 
     * @return array ['total' => int, 'by_staff' => Collection]
     */
    public function getManualOverrides(): array
    {
        $overrides = $this->activityLogRepo->getByAction(
            ['manual_payment_override', 'system_override'],
            now()->startOfMonth(),
            now()
        );
        
        $byStaff = ActivityLog::whereIn('action', ['manual_payment_override', 'system_override'])
            ->where('created_at', '>=', now()->startOfMonth())
            ->select('user_id', 'user_role', DB::raw('COUNT(*) as action_count'))
            ->groupBy('user_id', 'user_role')
            ->with('user:id,name,email')
            ->orderBy('action_count', 'desc')
            ->get();
        
        return [
            'total' => $overrides->count(),
            'by_staff' => $byStaff,
        ];
    }

    /**
     * Get certificate edit statistics
     * 
     * @return array ['total' => int, 'by_staff' => Collection, 'most_edited_fields' => Collection]
     */
    public function getCertificateEdits(): array
    {
        $edits = $this->activityLogRepo->getByAction(
            'certificate_edit_after_approval',
            now()->startOfMonth(),
            now()
        );
        
        $byStaff = $this->activityLogRepo->getActionCountsByStaff('certificate_edit_after_approval');
        
        // Get most edited fields from DocumentVersion model if it exists
        $mostEditedFields = collect([]);
        if (class_exists(DocumentVersion::class)) {
            $mostEditedFields = DocumentVersion::where('edited_at', '>=', now()->startOfMonth())
                ->select('field_name', DB::raw('COUNT(*) as edit_count'))
                ->groupBy('field_name')
                ->orderBy('edit_count', 'desc')
                ->limit(10)
                ->get();
        }
        
        return [
            'total' => $edits->count(),
            'by_staff' => $byStaff,
            'most_edited_fields' => $mostEditedFields,
        ];
    }

    /**
     * Get excessive reprint statistics
     * 
     * @return array ['by_applicant' => Collection, 'by_staff' => Collection]
     */
    public function getExcessiveReprints(): array
    {
        $threshold = config('director-dashboard.excessive_print_threshold', 2);
        
        $byApplicant = Application::where('print_count', '>', $threshold)
            ->with('applicant:id,name,email')
            ->select('id', 'application_number', 'applicant_id', 'print_count')
            ->orderBy('print_count', 'desc')
            ->limit(20)
            ->get();
        
        $byStaff = collect([]);
        if (class_exists(PrintLog::class)) {
            $byStaff = PrintLog::where('print_type', 'reprint')
                ->where('printed_at', '>=', now()->startOfMonth())
                ->select('user_id', DB::raw('COUNT(*) as reprint_count'))
                ->groupBy('user_id')
                ->with('user:id,name,email')
                ->orderBy('reprint_count', 'desc')
                ->get();
        }
        
        return [
            'by_applicant' => $byApplicant,
            'by_staff' => $byStaff,
        ];
    }

    /**
     * Get print vs reprint statistics
     * 
     * @return array ['total_prints' => int, 'total_reprints' => int]
     */
    public function getPrintStatistics(): array
    {
        if (!class_exists(PrintLog::class)) {
            return [
                'total_prints' => 0,
                'total_reprints' => 0,
            ];
        }
        
        $totalPrints = PrintLog::where('print_type', 'initial')
            ->where('printed_at', '>=', now()->startOfMonth())
            ->count();
        
        $totalReprints = PrintLog::where('print_type', 'reprint')
            ->where('printed_at', '>=', now()->startOfMonth())
            ->count();
        
        return [
            'total_prints' => $totalPrints,
            'total_reprints' => $totalReprints,
        ];
    }

    /**
     * Get suspicious activity alerts
     * 
     * @return array ['failed_logins' => int, 'repeated_reassignments' => int, 'high_waiver_frequency' => int, 'system_overrides' => int]
     */
    public function getSuspiciousActivityAlerts(): array
    {
        return $this->activityLogRepo->getSuspiciousActivityPatterns();
    }

    /**
     * Get drill-down audit trail
     * 
     * @param string $eventType
     * @param array $filters
     * @return Collection
     */
    public function getDrillDownAuditTrail(string $eventType, array $filters): Collection
    {
        $query = ActivityLog::where('action', $eventType)
            ->with(['user:id,name,email', 'entity']);
        
        if (isset($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }
        
        if (isset($filters['date_from']) && isset($filters['date_to'])) {
            $query->whereBetween('created_at', [
                Carbon::parse($filters['date_from']),
                Carbon::parse($filters['date_to'])
            ]);
        }
        
        return $query->orderBy('created_at', 'desc')->limit(100)->get();
    }

    /**
     * Get high-risk actions for dashboard display
     * 
     * @param int $limit
     * @return Collection
     */
    public function getHighRiskActions(int $limit = 5): Collection
    {
        return $this->activityLogRepo->getHighRiskActions(now()->subDays(7))
            ->take($limit);
    }
}
