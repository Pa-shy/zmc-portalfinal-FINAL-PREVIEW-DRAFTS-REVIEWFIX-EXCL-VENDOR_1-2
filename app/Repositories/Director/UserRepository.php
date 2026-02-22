<?php

namespace App\Repositories\Director;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    /**
     * Get staff with application counts
     * 
     * @return Collection
     */
    public function getStaffWithApplicationCounts(): Collection
    {
        return User::whereHas('roles', function($query) {
            $query->whereIn('name', ['accreditation_officer', 'registrar', 'accounts']);
        })
        ->withCount([
            'assignedApplications as processed_count' => function($q) {
                $q->whereNotNull('last_action_at')
                  ->where('last_action_at', '>=', now()->startOfMonth());
            }
        ])
        ->orderBy('processed_count', 'desc')
        ->get();
    }

    /**
     * Get staff with processing times
     * 
     * @return Collection
     */
    public function getStaffWithProcessingTimes(): Collection
    {
        return User::whereHas('roles', function($query) {
            $query->whereIn('name', ['accreditation_officer', 'registrar']);
        })
        ->with(['assignedApplications' => function($q) {
            $q->whereNotNull('assigned_at')
              ->whereNotNull('last_action_at')
              ->where('last_action_at', '>=', now()->startOfMonth())
              ->select('id', 'assigned_officer_id', 'assigned_at', 'last_action_at');
        }])
        ->get();
    }

    /**
     * Get staff with action counts
     * 
     * @param string $action
     * @return Collection
     */
    public function getStaffWithActionCounts(string $action): Collection
    {
        return User::whereHas('activityLogs', function($query) use ($action) {
            $query->where('action', $action)
                  ->where('created_at', '>=', now()->startOfMonth());
        })
        ->withCount([
            'activityLogs as action_count' => function($q) use ($action) {
                $q->where('action', $action)
                  ->where('created_at', '>=', now()->startOfMonth());
            }
        ])
        ->orderBy('action_count', 'desc')
        ->get();
    }
}
