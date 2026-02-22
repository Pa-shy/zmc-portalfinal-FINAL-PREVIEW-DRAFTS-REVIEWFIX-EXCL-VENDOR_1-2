<?php

namespace App\Services\Director;

use App\Models\Application;
use App\Models\Payment;
use App\Models\ActivityLog;
use Carbon\Carbon;

class RiskIndicatorService
{
    /**
     * Get all risk indicators with color coding
     * 
     * @return array
     */
    public function getAllRiskIndicators(): array
    {
        return [
            'excessive_waivers' => $this->evaluateExcessiveWaivers(),
            'rejection_spike' => $this->evaluateRejectionSpike(),
            'processing_time_sla' => $this->evaluateProcessingTimeSLA(),
            'revenue_drop' => $this->evaluateRevenueDrop(),
            'reprint_frequency' => $this->evaluateReprintFrequency(),
            'category_reassignment' => $this->evaluateCategoryReassignment(),
            'payment_delay' => $this->evaluatePaymentDelay(),
        ];
    }

    /**
     * Evaluate excessive waivers risk
     * 
     * @return array ['status' => string, 'level' => string, 'value' => mixed, 'threshold' => mixed]
     */
    public function evaluateExcessiveWaivers(): array
    {
        $waiverCount = Application::where('waiver_status', 'approved')
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();
        
        $thresholds = config('director-dashboard.risk_thresholds.excessive_waivers', [
            'green' => ['max' => 5],
            'amber' => ['min' => 6, 'max' => 10],
            'red' => ['min' => 11],
        ]);
        
        $level = $this->determineRiskLevel($waiverCount, $thresholds);
        
        return [
            'title' => 'Excessive Waivers',
            'status' => $level,
            'level' => $level,
            'value' => $waiverCount,
            'description' => "Waivers granted this month",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Evaluate high rejection spike risk
     * 
     * @return array
     */
    public function evaluateRejectionSpike(): array
    {
        $total = Application::whereIn('status', ['issued', 'officer_rejected', 'registrar_rejected'])
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();
        
        $rejected = Application::where('status', 'LIKE', '%rejected%')
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();
        
        $rejectionRate = $total > 0 ? round(($rejected / $total) * 100, 1) : 0;
        
        $thresholds = config('director-dashboard.risk_thresholds.rejection_spike', [
            'green' => ['max' => 10],
            'amber' => ['min' => 11, 'max' => 20],
            'red' => ['min' => 21],
        ]);
        
        $level = $this->determineRiskLevel($rejectionRate, $thresholds);
        
        return [
            'title' => 'Rejection Rate',
            'status' => $level,
            'level' => $level,
            'value' => $rejectionRate . '%',
            'description' => "Current month rejection rate",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Evaluate processing time SLA risk
     * 
     * @return array
     */
    public function evaluateProcessingTimeSLA(): array
    {
        $apps = Application::whereNotNull('submitted_at')
            ->whereNotNull('issued_at')
            ->where('issued_at', '>=', now()->subMonth())
            ->select('submitted_at', 'issued_at')
            ->get();
        
        $avgDays = 0;
        if ($apps->isNotEmpty()) {
            $totalHours = 0;
            foreach ($apps as $app) {
                $totalHours += Carbon::parse($app->submitted_at)
                    ->diffInHours(Carbon::parse($app->issued_at));
            }
            $avgDays = round($totalHours / $apps->count() / 24, 1);
        }
        
        $thresholds = config('director-dashboard.risk_thresholds.processing_time_sla', [
            'green' => ['max' => 5],
            'amber' => ['min' => 6, 'max' => 10],
            'red' => ['min' => 11],
        ]);
        
        $level = $this->determineRiskLevel($avgDays, $thresholds);
        
        return [
            'title' => 'Processing Time SLA',
            'status' => $level,
            'level' => $level,
            'value' => $avgDays . ' days',
            'description' => "Average processing time",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Evaluate revenue drop risk
     * 
     * @return array
     */
    public function evaluateRevenueDrop(): array
    {
        $currentMonth = Payment::where('status', 'paid')
            ->whereBetween('confirmed_at', [now()->startOfMonth(), now()])
            ->sum('amount');
        
        $previousMonth = Payment::where('status', 'paid')
            ->whereBetween('confirmed_at', [
                now()->subMonth()->startOfMonth(),
                now()->subMonth()->endOfMonth()
            ])
            ->sum('amount');
        
        $percentageChange = $previousMonth > 0 
            ? round((($currentMonth - $previousMonth) / $previousMonth) * 100, 1) 
            : 0;
        
        $thresholds = config('director-dashboard.risk_thresholds.revenue_drop', [
            'green' => ['min' => -5],
            'amber' => ['min' => -15, 'max' => -6],
            'red' => ['max' => -16],
        ]);
        
        $level = $this->determineRiskLevel($percentageChange, $thresholds);
        
        return [
            'title' => 'Revenue Trend',
            'status' => $level,
            'level' => $level,
            'value' => $percentageChange . '%',
            'description' => "Month-over-month change",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Evaluate reprint frequency risk
     * 
     * @return array
     */
    public function evaluateReprintFrequency(): array
    {
        $threshold = config('director-dashboard.excessive_print_threshold', 2);
        $excessiveReprints = Application::where('print_count', '>', $threshold)->count();
        
        $thresholds = config('director-dashboard.risk_thresholds.reprint_frequency', [
            'green' => ['max' => 2],
            'amber' => ['min' => 3, 'max' => 4],
            'red' => ['min' => 5],
        ]);
        
        $level = $this->determineRiskLevel($excessiveReprints, $thresholds);
        
        return [
            'title' => 'Excessive Reprints',
            'status' => $level,
            'level' => $level,
            'value' => $excessiveReprints,
            'description' => "Applications with excessive reprints",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Evaluate category reassignment risk
     * 
     * @return array
     */
    public function evaluateCategoryReassignment(): array
    {
        $reassignments = ActivityLog::where('action', 'registrar_reassign_category')
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();
        
        $thresholds = config('director-dashboard.risk_thresholds.category_reassignment', [
            'green' => ['max' => 3],
            'amber' => ['min' => 4, 'max' => 7],
            'red' => ['min' => 8],
        ]);
        
        $level = $this->determineRiskLevel($reassignments, $thresholds);
        
        return [
            'title' => 'Category Reassignments',
            'status' => $level,
            'level' => $level,
            'value' => $reassignments,
            'description' => "Reassignments this month",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Evaluate payment verification delay risk
     * 
     * @return array
     */
    public function evaluatePaymentDelay(): array
    {
        $delayedPayments = Payment::where('status', 'pending')
            ->where('created_at', '<', now()->subDays(3))
            ->count();
        
        $thresholds = config('director-dashboard.risk_thresholds.payment_delay', [
            'green' => ['max' => 2],
            'amber' => ['min' => 3, 'max' => 5],
            'red' => ['min' => 6],
        ]);
        
        $level = $this->determineRiskLevel($delayedPayments, $thresholds);
        
        return [
            'title' => 'Payment Delays',
            'status' => $level,
            'level' => $level,
            'value' => $delayedPayments,
            'description' => "Payments pending > 3 days",
            'threshold' => $thresholds,
        ];
    }

    /**
     * Determine risk level based on value and thresholds
     * 
     * @param float $value
     * @param array $thresholds
     * @return string
     */
    private function determineRiskLevel(float $value, array $thresholds): string
    {
        // Check red threshold
        if (isset($thresholds['red']['min']) && $value >= $thresholds['red']['min']) {
            return 'red';
        }
        if (isset($thresholds['red']['max']) && $value <= $thresholds['red']['max']) {
            return 'red';
        }
        
        // Check amber threshold
        if (isset($thresholds['amber']['min']) && isset($thresholds['amber']['max'])) {
            if ($value >= $thresholds['amber']['min'] && $value <= $thresholds['amber']['max']) {
                return 'amber';
            }
        }
        
        // Default to green
        return 'green';
    }

    /**
     * Get risk level color CSS class
     * 
     * @param string $level 'green', 'amber', 'red'
     * @return string CSS class
     */
    public function getRiskLevelColor(string $level): string
    {
        return match($level) {
            'green' => 'success',
            'amber' => 'warning',
            'red' => 'danger',
            default => 'secondary',
        };
    }
}
