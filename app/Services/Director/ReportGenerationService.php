<?php

namespace App\Services\Director;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportGenerationService
{
    public function __construct(
        private DashboardMetricsService $metricsService,
        private AccreditationAnalyticsService $accreditationService,
        private FinancialAnalyticsService $financialService,
        private ComplianceMonitoringService $complianceService,
        private MediaHouseOversightService $mediaHouseService,
        private StaffPerformanceService $staffService
    ) {}

    /**
     * Generate monthly accreditation report
     * 
     * @param string $format 'pdf' or 'excel'
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateMonthlyAccreditationReport(string $format, array $params)
    {
        $month = Carbon::createFromFormat('Y-m', $params['month'] ?? now()->format('Y-m'));
        
        $data = [
            'month' => $month->format('F Y'),
            'generated_at' => now()->format('d M Y H:i'),
            'monthly_trends' => $this->accreditationService->getMonthlyTrends(1),
            'processing_time' => $this->accreditationService->getProcessingTimeByStage(),
            'approval_ratio_category' => $this->accreditationService->getApprovalRatioByCategory(),
            'approval_ratio_residency' => $this->accreditationService->getApprovalRatioByResidency(),
            'category_distribution' => $this->accreditationService->getCategoryDistribution(),
        ];
        
        if ($format === 'pdf') {
            $pdf = Pdf::loadView('staff.director.pdf.monthly-accreditation', $data);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->download('monthly-accreditation-report-' . $month->format('Y-m') . '.pdf');
        }
        
        if ($format === 'excel') {
            return Excel::download(
                new \App\Exports\Director\MonthlyAccreditationExport($data),
                'monthly-accreditation-report-' . $month->format('Y-m') . '.xlsx'
            );
        }
    }

    /**
     * Generate revenue and financial report
     * 
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateRevenueFinancialReport(string $format, array $params)
    {
        $startDate = Carbon::parse($params['start_date'] ?? now()->startOfMonth());
        $endDate = Carbon::parse($params['end_date'] ?? now()->endOfMonth());
        
        $data = [
            'period' => $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y'),
            'generated_at' => now()->format('d M Y H:i'),
            'revenue_trend' => $this->financialService->getMonthlyRevenueTrend(12),
            'revenue_by_service' => $this->financialService->getRevenueByServiceType(),
            'revenue_by_applicant' => $this->financialService->getRevenueByApplicantType(),
            'revenue_by_residency' => $this->financialService->getRevenueByResidency(),
            'revenue_by_method' => $this->financialService->getRevenueByPaymentMethod(),
            'waiver_statistics' => $this->financialService->getWaiverStatistics(),
            'outstanding_aging' => $this->financialService->getOutstandingPaymentsAging(),
        ];
        
        if ($format === 'pdf') {
            $pdf = Pdf::loadView('staff.director.pdf.revenue-financial', $data);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->download('revenue-financial-report-' . now()->format('Y-m-d') . '.pdf');
        }
        
        if ($format === 'excel') {
            return Excel::download(
                new \App\Exports\Director\RevenueFinancialExport($data),
                'revenue-financial-report-' . now()->format('Y-m-d') . '.xlsx'
            );
        }
    }

    /**
     * Generate compliance and audit report
     * 
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateComplianceAuditReport(string $format, array $params)
    {
        $month = Carbon::createFromFormat('Y-m', $params['month'] ?? now()->format('Y-m'));
        
        $data = [
            'month' => $month->format('F Y'),
            'generated_at' => now()->format('d M Y H:i'),
            'category_reassignments' => $this->complianceService->getCategoryReassignments(),
            'reopened_applications' => $this->complianceService->getReopenedApplications(),
            'manual_overrides' => $this->complianceService->getManualOverrides(),
            'certificate_edits' => $this->complianceService->getCertificateEdits(),
            'excessive_reprints' => $this->complianceService->getExcessiveReprints(),
            'print_statistics' => $this->complianceService->getPrintStatistics(),
            'suspicious_activity' => $this->complianceService->getSuspiciousActivityAlerts(),
        ];
        
        if ($format === 'pdf') {
            $pdf = Pdf::loadView('staff.director.pdf.compliance-audit', $data);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->download('compliance-audit-report-' . $month->format('Y-m') . '.pdf');
        }
        
        if ($format === 'excel') {
            return Excel::download(
                new \App\Exports\Director\ComplianceAuditExport($data),
                'compliance-audit-report-' . $month->format('Y-m') . '.xlsx'
            );
        }
    }

    /**
     * Generate media house status report
     * 
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateMediaHouseStatusReport(string $format, array $params)
    {
        $data = [
            'generated_at' => now()->format('d M Y H:i'),
            'status_counts' => $this->mediaHouseService->getMediaHouseStatusCounts(),
            'average_staff' => $this->mediaHouseService->getAverageStaffPerHouse(),
            'exceeding_thresholds' => $this->mediaHouseService->getHousesExceedingThresholds(),
            'nearing_expiry' => $this->mediaHouseService->getAccreditationsNearingExpiry(),
            'high_risk_renewals' => $this->mediaHouseService->getHighRiskNonRenewals(),
        ];
        
        if ($format === 'pdf') {
            $pdf = Pdf::loadView('staff.director.pdf.mediahouse-status', $data);
            $pdf->setPaper('a4', 'portrait');
            return $pdf->download('mediahouse-status-report-' . now()->format('Y-m-d') . '.pdf');
        }
        
        if ($format === 'excel') {
            return Excel::download(
                new \App\Exports\Director\MediaHouseStatusExport($data),
                'mediahouse-status-report-' . now()->format('Y-m-d') . '.xlsx'
            );
        }
    }

    /**
     * Generate operational performance report
     * 
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateOperationalPerformanceReport(string $format, array $params)
    {
        $month = Carbon::createFromFormat('Y-m', $params['month'] ?? now()->format('Y-m'));
        
        $data = [
            'month' => $month->format('F Y'),
            'generated_at' => now()->format('d M Y H:i'),
            'applications_processed' => $this->staffService->getApplicationsProcessedPerOfficer(),
            'review_times' => $this->staffService->getAverageReviewTimePerRegistrar(),
            'payment_turnaround' => $this->staffService->getPaymentVerificationTurnaround(),
            'approval_distribution' => $this->staffService->getApprovalDistributionPerOfficer(),
            'reassignment_frequency' => $this->staffService->getReassignmentFrequencyPerStaff(),
            'processing_time_by_stage' => $this->accreditationService->getProcessingTimeByStage(),
        ];
        
        if ($format === 'pdf') {
            $pdf = Pdf::loadView('staff.director.pdf.operational-performance', $data);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->download('operational-performance-report-' . $month->format('Y-m') . '.pdf');
        }
        
        if ($format === 'excel') {
            return Excel::download(
                new \App\Exports\Director\OperationalPerformanceExport($data),
                'operational-performance-report-' . $month->format('Y-m') . '.xlsx'
            );
        }
    }
}
