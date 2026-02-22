<?php

namespace App\Services\Director;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MediaHouseOversightService
{
    /**
     * Get media house status counts
     * 
     * @return array ['active' => int, 'suspended' => int, 'new_this_year' => int]
     */
    public function getMediaHouseStatusCounts(): array
    {
        // Count all registrations by status
        $issued = Application::where('application_type', 'registration')
            ->where('status', 'issued')
            ->count();
        
        $inProgress = Application::where('application_type', 'registration')
            ->whereIn('status', ['draft', 'officer_review', 'registrar_review', 'pending_payment', 'production_queue'])
            ->count();
        
        $suspended = Application::where('application_type', 'registration')
            ->where('status', 'suspended')
            ->count();
        
        $newThisYear = Application::where('application_type', 'registration')
            ->where('created_at', '>=', now()->startOfYear())
            ->count();
        
        $total = Application::where('application_type', 'registration')->count();
        
        return [
            'active' => $issued,
            'in_progress' => $inProgress,
            'suspended' => $suspended,
            'new_this_year' => $newThisYear,
            'total' => $total,
        ];
    }

    /**
     * Get average staff accreditations per media house
     * 
     * @return float
     */
    public function getAverageStaffPerHouse(): float
    {
        $mediaHouses = Application::where('application_type', 'registration')
            ->where('status', 'issued')
            ->pluck('applicant_id'); // Get the user IDs of media house owners
        
        if ($mediaHouses->isEmpty()) {
            return 0.0;
        }
        
        // Count staff accreditations where media_house_id matches any media house owner
        $totalStaff = Application::whereIn('media_house_id', $mediaHouses)
            ->where('status', 'issued')
            ->count();
        
        return round($totalStaff / $mediaHouses->count(), 1);
    }

    /**
     * Get media houses exceeding staff thresholds
     * 
     * @return Collection
     */
    public function getHousesExceedingThresholds(): Collection
    {
        $threshold = config('director-dashboard.media_house_staff_threshold', 50);
        
        // Get media house registrations with staff count
        $mediaHouses = Application::where('application_type', 'registration')
            ->where('status', 'issued')
            ->select('id', 'application_number', 'applicant_id', 'issued_at')
            ->with('applicant:id,name,email')
            ->get();
        
        // Count staff for each media house and filter by threshold
        return $mediaHouses->map(function($house) {
            $staffCount = Application::where('media_house_id', $house->applicant_id)
                ->where('status', 'issued')
                ->count();
            
            $house->staff_accreditations_count = $staffCount;
            return $house;
        })
        ->filter(function($house) use ($threshold) {
            return $house->staff_accreditations_count > $threshold;
        })
        ->sortByDesc('staff_accreditations_count')
        ->values();
    }

    /**
     * Get accreditations nearing expiry
     * 
     * @param int $days Days until expiry
     * @return Collection
     */
    public function getAccreditationsNearingExpiry(int $days = 30): Collection
    {
        $expiryDate = now()->addDays($days);
        
        return Application::where('status', 'issued')
            ->whereNotNull('expiry_date')
            ->where('expiry_date', '<=', $expiryDate)
            ->where('expiry_date', '>=', now())
            ->with(['applicant:id,name,email'])
            ->orderBy('expiry_date', 'asc')
            ->limit(50)
            ->get();
    }

    /**
     * Get high-risk non-renewal cases
     * 
     * @return Collection
     */
    public function getHighRiskNonRenewals(): Collection
    {
        // Applications that expired in the last 30 days
        // Note: Renewal tracking would require additional logic to check if a new application exists
        return Application::where('status', 'issued')
            ->whereNotNull('expiry_date')
            ->where('expiry_date', '<', now())
            ->where('expiry_date', '>=', now()->subDays(30))
            ->with(['applicant:id,name,email'])
            ->orderBy('expiry_date', 'desc')
            ->limit(50)
            ->get();
    }

    /**
     * Get drill-down media house details
     * 
     * @param int $mediaHouseId Application ID of the media house registration
     * @return array
     */
    public function getDrillDownMediaHouseDetails(int $mediaHouseId): array
    {
        $mediaHouse = Application::where('id', $mediaHouseId)
            ->where('application_type', 'registration')
            ->with(['applicant:id,name,email'])
            ->first();
        
        if (!$mediaHouse) {
            return [];
        }
        
        // Get staff accreditations using the media house owner's user ID
        $staffAccreditations = Application::where('media_house_id', $mediaHouse->applicant_id)
            ->where('status', 'issued')
            ->with(['applicant:id,name,email'])
            ->orderBy('issued_at', 'desc')
            ->get();
        
        return [
            'media_house' => $mediaHouse,
            'staff_count' => $staffAccreditations->count(),
            'staff_accreditations' => $staffAccreditations,
            'expiring_soon' => $staffAccreditations->filter(function($app) {
                return $app->expiry_date && 
                       $app->expiry_date <= now()->addDays(30) &&
                       $app->expiry_date >= now();
            }),
        ];
    }
}
