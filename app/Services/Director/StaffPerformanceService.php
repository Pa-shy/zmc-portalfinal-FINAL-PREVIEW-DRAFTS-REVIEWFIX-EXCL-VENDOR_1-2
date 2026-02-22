<?php

namespace App\Services\Director;

use App\Repositories\Director\UserRepository;
use App\Models\User;
use App\Models\Application;
use App\Models\ActivityLog;
use App\Models\PrintLog;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StaffPerformanceService
{
    public function __construct(
        private UserRepository $userRepo
    ) {}

    /**
     * Get applications processed per officer
     * 
     * @return Collection
     */
    public function getApplicationsProcessedPerOfficer(): Collection
    {
        return User::role(['accreditation_officer', 'registrar'])
        ->withCount([
            'processedApplications as processed_count' => function($q) {
                $q->where('updated_at', '>=', now()->startOfMonth());
            }
        ])
        ->orderBy('processed_count', 'desc')
        ->get(['id', 'name', 'email']);
    }

    /**
     * Get average review time per registrar
     * 
     * @return Collection
     */
    public function getAverageReviewTimePerRegistrar(): Collection
    {
        $registrars = User::whereHas('roles', function($query) {
            $query->where('name', 'registrar');
        })
        ->with(['assignedApplications' => function($q) {
            $q->whereNotNull('assigned_at')
              ->whereNotNull('registrar_approved_at')
              ->where('registrar_approved_at', '>=', now()->startOfMonth())
              ->select('id', 'assigned_officer_id', 'assigned_at', 'registrar_approved_at');
        }])
        ->get(['id', 'name', 'email']);
        
        return $registrars->map(function($registrar) {
            $apps = $registrar->assignedApplications;
            
            if ($apps->isEmpty()) {
                $registrar->avg_review_hours = 0;
                return $registrar;
            }
            
            $totalHours = 0;
            foreach ($apps as $app) {
                $totalHours += Carbon::parse($app->assigned_at)
                    ->diffInHours(Carbon::parse($app->registrar_approved_at));
            }
            
            $registrar->avg_review_hours = round($totalHours / $apps->count(), 1);
            unset($registrar->assignedApplications);
            
            return $registrar;
        })->sortByDesc('avg_review_hours');
    }

    /**
     * Get payment verification turnaround per staff
     * 
     * @return Collection
     */
    public function getPaymentVerificationTurnaround(): Collection
    {
        return User::whereHas('roles', function($query) {
            $query->where('name', 'accounts');
        })
        ->withCount([
            'assignedApplications as verified_count' => function($q) {
                $q->where('status', 'issued')
                  ->where('issued_at', '>=', now()->startOfMonth());
            }
        ])
        ->orderBy('verified_count', 'desc')
        ->get(['id', 'name', 'email']);
    }

    /**
     * Get approval distribution per officer
     * 
     * @return Collection
     */
    public function getApprovalDistributionPerOfficer(): Collection
    {
        return User::whereHas('roles', function($query) {
            $query->where('name', 'accreditation_officer');
        })
        ->withCount([
            'assignedApplications as total_reviewed' => function($q) {
                $q->whereIn('status', ['officer_approved', 'officer_rejected'])
                  ->where('last_action_at', '>=', now()->startOfMonth());
            },
            'assignedApplications as approved_count' => function($q) {
                $q->where('status', 'officer_approved')
                  ->where('last_action_at', '>=', now()->startOfMonth());
            },
            'assignedApplications as rejected_count' => function($q) {
                $q->where('status', 'officer_rejected')
                  ->where('last_action_at', '>=', now()->startOfMonth());
            }
        ])
        ->get(['id', 'name', 'email'])
        ->map(function($officer) {
            $officer->approval_rate = $officer->total_reviewed > 0
                ? round(($officer->approved_count / $officer->total_reviewed) * 100, 1)
                : 0;
            return $officer;
        })
        ->sortByDesc('total_reviewed');
    }

    /**
     * Get category reassignment frequency per staff
     * 
     * @return Collection
     */
    public function getReassignmentFrequencyPerStaff(): Collection
    {
        return ActivityLog::where('action', 'registrar_reassign_category')
            ->where('created_at', '>=', now()->startOfMonth())
            ->select('user_id', 'user_role', DB::raw('COUNT(*) as reassignment_count'))
            ->groupBy('user_id', 'user_role')
            ->with('user:id,name,email')
            ->orderBy('reassignment_count', 'desc')
            ->get();
    }

    /**
     * Get drill-down staff activity logs
     * 
     * @param int $userId
     * @param array $filters
     * @return Collection
     */
    public function getDrillDownStaffActivity(int $userId, array $filters): Collection
    {
        $query = ActivityLog::where('user_id', $userId)
            ->with(['entity']);
        
        if (isset($filters['action_type'])) {
            $query->where('action', $filters['action_type']);
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
     * Get print actions by staff
     * 
     * @return Collection
     */
    public function getPrintActionsByStaff(): Collection
    {
        if (!class_exists(PrintLog::class)) {
            return collect([]);
        }
        
        return PrintLog::where('printed_at', '>=', now()->startOfMonth())
            ->select('user_id', 'print_type', DB::raw('COUNT(*) as print_count'))
            ->groupBy('user_id', 'print_type')
            ->with('user:id,name,email')
            ->orderBy('print_count', 'desc')
            ->get();
    }
}
