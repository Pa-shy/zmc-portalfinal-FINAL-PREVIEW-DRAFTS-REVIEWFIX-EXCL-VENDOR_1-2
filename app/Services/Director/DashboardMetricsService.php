<?php

namespace App\Services\Director;

use App\Repositories\Director\ApplicationRepository;
use App\Repositories\Director\PaymentRepository;
use App\Repositories\Director\ActivityLogRepository;
use App\Models\Application;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DashboardMetricsService
{
    public function __construct(
        private ApplicationRepository $applicationRepo,
        private PaymentRepository $paymentRepo,
        private ActivityLogRepository $activityLogRepo
    ) {}

    /**
     * Get all top-level KPIs for executive overview
     * 
     * @return array
     */
    public function getExecutiveKPIs(): array
    {
        return Cache::remember('director.kpis.executive_overview', 3600, function() {
            return [
                'total_active_accreditations' => $this->getTotalActiveAccreditations(),
                'issued_this_month' => $this->getIssuedThisMonth(),
                'issued_this_year' => $this->getIssuedYearToDate(),
                'revenue_mtd' => $this->getRevenueMTD(),
                'revenue_ytd' => $this->getRevenueYTD(),
                'outstanding_revenue' => $this->getOutstandingRevenue(),
                'applications_in_pipeline' => $this->getApplicationsInPipeline(),
                'avg_processing_time' => $this->getAverageProcessingTime(),
                'approval_rate' => $this->getApprovalRate(),
                'compliance_flags_active' => $this->getActiveComplianceFlags(),
                'total_media_houses' => $this->getTotalMediaHouses(),
            ];
        });
    }

    /**
     * Get total active accreditations
     * 
     * @return int
     */
    public function getTotalActiveAccreditations(): int
    {
        return Application::where('status', 'issued')
            ->where(function($query) {
                $query->whereNull('expiry_date')
                      ->orWhere('expiry_date', '>=', now());
            })
            ->count();
    }

    /**
     * Get accreditations issued in current month
     * 
     * @return int
     */
    public function getIssuedThisMonth(): int
    {
        return Application::where('status', 'issued')
            ->whereBetween('issued_at', [
                now()->startOfMonth(),
                now()->endOfMonth()
            ])
            ->count();
    }

    /**
     * Get accreditations issued year-to-date
     * 
     * @return int
     */
    public function getIssuedYearToDate(): int
    {
        return Application::where('status', 'issued')
            ->whereBetween('issued_at', [
                now()->startOfYear(),
                now()
            ])
            ->count();
    }

    /**
     * Get revenue collected month-to-date
     * 
     * @return float
     */
    public function getRevenueMTD(): float
    {
        return Payment::where('status', 'paid')
            ->whereBetween('confirmed_at', [
                now()->startOfMonth(),
                now()
            ])
            ->sum('amount') ?? 0.0;
    }

    /**
     * Get revenue collected year-to-date
     * 
     * @return float
     */
    public function getRevenueYTD(): float
    {
        return Payment::where('status', 'paid')
            ->whereBetween('confirmed_at', [
                now()->startOfYear(),
                now()
            ])
            ->sum('amount') ?? 0.0;
    }

    /**
     * Get outstanding revenue amount
     * 
     * @return float
     */
    public function getOutstandingRevenue(): float
    {
        return Payment::where('status', 'pending')
            ->sum('amount') ?? 0.0;
    }

    /**
     * Get count of applications in pipeline
     * 
     * @return int
     */
    public function getApplicationsInPipeline(): int
    {
        return Application::whereIn('status', [
            'submitted',
            'officer_review',
            'registrar_review',
            'accounts_review'
        ])->count();
    }

    /**
     * Get average processing time in days
     * 
     * @return float
     */
    public function getAverageProcessingTime(): float
    {
        $avgHours = $this->applicationRepo->getAverageProcessingTime();
        return round($avgHours / 24, 1); // Convert hours to days
    }

    /**
     * Get approval rate as percentage
     * 
     * @return float
     */
    public function getApprovalRate(): float
    {
        $total = Application::whereIn('status', [
            'issued',
            'officer_rejected',
            'registrar_rejected'
        ])->count();
        
        if ($total === 0) {
            return 0.0;
        }
        
        $approved = Application::where('status', 'issued')->count();
        
        return round(($approved / $total) * 100, 1);
    }

    /**
     * Get count of active compliance flags
     * 
     * @return int
     */
    public function getActiveComplianceFlags(): int
    {
        $highRiskActions = $this->activityLogRepo->getHighRiskActions(now()->startOfMonth());
        return $highRiskActions->count();
    }

    /**
     * Get total registered media houses
     * 
     * @return int
     */
    public function getTotalMediaHouses(): int
    {
        return Application::where('application_type', 'registration')
            ->where('status', 'issued')
            ->count();
    }
}
