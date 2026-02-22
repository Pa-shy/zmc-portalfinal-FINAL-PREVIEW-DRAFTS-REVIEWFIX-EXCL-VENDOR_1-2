<?php

namespace App\Repositories\Director;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ActivityLogRepository
{
    /**
     * Get logs by action type
     * 
     * @param string|array $action
     * @param Carbon|null $startDate
     * @param Carbon|null $endDate
     * @return Collection
     */
    public function getByAction($action, ?Carbon $startDate = null, ?Carbon $endDate = null): Collection
    {
        $query = ActivityLog::query();
        
        if (is_array($action)) {
            $query->whereIn('action', $action);
        } else {
            $query->where('action', $action);
        }
        
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        
        return $query->with('user:id,name,email')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get logs by user
     * 
     * @param int $userId
     * @param array $filters
     * @return Collection
     */
    public function getByUser(int $userId, array $filters = []): Collection
    {
        $query = ActivityLog::where('user_id', $userId);
        
        if (isset($filters['action'])) {
            $query->where('action', $filters['action']);
        }
        
        if (isset($filters['date_from']) && isset($filters['date_to'])) {
            $query->whereBetween('created_at', [
                Carbon::parse($filters['date_from']),
                Carbon::parse($filters['date_to'])
            ]);
        }
        
        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get high-risk actions
     * 
     * @param Carbon|null $startDate
     * @return Collection
     */
    public function getHighRiskActions(?Carbon $startDate = null): Collection
    {
        $highRiskActions = [
            'registrar_reassign_category',
            'manual_payment_override',
            'certificate_edit_after_approval',
            'application_reopened',
            'system_override',
            'excessive_reprint'
        ];
        
        $query = ActivityLog::whereIn('action', $highRiskActions);
        
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        
        return $query->with('user:id,name,email')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get action counts by staff member
     * 
     * @param string $action
     * @return Collection
     */
    public function getActionCountsByStaff(string $action): Collection
    {
        return ActivityLog::select(
            'user_id',
            'user_role',
            DB::raw('COUNT(*) as action_count')
        )
        ->where('action', $action)
        ->where('created_at', '>=', now()->startOfMonth())
        ->groupBy('user_id', 'user_role')
        ->with('user:id,name,email')
        ->orderBy('action_count', 'desc')
        ->get();
    }

    /**
     * Get suspicious activity patterns
     * 
     * @return array
     */
    public function getSuspiciousActivityPatterns(): array
    {
        $startOfMonth = now()->startOfMonth();
        
        return [
            'failed_logins' => ActivityLog::where('action', 'failed_login')
                ->where('created_at', '>=', $startOfMonth)
                ->count(),
            
            'repeated_reassignments' => ActivityLog::where('action', 'registrar_reassign_category')
                ->where('created_at', '>=', $startOfMonth)
                ->select('user_id', DB::raw('COUNT(*) as count'))
                ->groupBy('user_id')
                ->havingRaw('COUNT(*) > 5')
                ->count(),
            
            'high_waiver_frequency' => ActivityLog::where('action', 'waiver_approved')
                ->where('created_at', '>=', $startOfMonth)
                ->count(),
            
            'system_overrides' => ActivityLog::where('action', 'system_override')
                ->where('created_at', '>=', $startOfMonth)
                ->count(),
        ];
    }
}
