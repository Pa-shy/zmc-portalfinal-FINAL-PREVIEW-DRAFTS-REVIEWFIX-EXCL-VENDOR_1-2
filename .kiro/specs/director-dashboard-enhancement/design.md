# Design Document: Director/CEO Dashboard Enhancement

## Overview

This design document specifies the technical architecture and implementation strategy for enhancing the Director/CEO Dashboard with comprehensive strategic oversight capabilities. The enhanced dashboard will provide executive-level visibility into accreditation operations, financial performance, compliance monitoring, and risk indicators while maintaining a strictly view-only interface.

### Design Goals

1. **Executive-Focused Visualization**: Prioritize charts, graphs, and visual indicators over tabular data
2. **Drill-Down Navigation**: Enable Directors to click aggregate metrics to view detailed underlying records
3. **Real-Time Insights**: Provide current data with efficient caching strategies
4. **SQLite Compatibility**: Ensure all database queries work with SQLite without MySQL-specific functions
5. **Performance Optimization**: Load dashboard sections within 3-5 seconds through strategic caching
6. **View-Only Access**: Prevent any operational actions while providing comprehensive visibility
7. **Risk Awareness**: Implement color-coded risk indicators (Green/Amber/Red) across all sections

### Technology Stack

- **Backend**: Laravel 12.x with PHP 8.2+
- **Frontend**: Blade templates with Bootstrap 5
- **Charting**: Chart.js 4.x for data visualizations
- **Database**: SQLite with date functions via strftime()
- **Export Libraries**: 
  - Laravel Excel (Maatwebsite) for Excel exports
  - DomPDF or Snappy (wkhtmltopdf) for PDF generation
- **Icons**: Remix Icons
- **Caching**: Laravel Cache with file driver

### System Context

The Director Dashboard operates within the Zimbabwe Media Commission's accreditation management system, which processes:
- Journalist accreditation applications (AP1-AP4 forms)
- Media house registrations
- Mass media entity accreditations
- Renewal applications (AP5)
- Payment processing and waivers
- Certificate and card issuance

The dashboard aggregates data from multiple operational modules (Officer, Registrar, Accounts, Production) to provide strategic oversight without interfering with operational workflows.

## Architecture

### High-Level Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                    Director Dashboard Layer                  │
│  (View-Only, No Operational Actions)                        │
└─────────────────────────────────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   Controller Layer                           │
│  DirectorController + Service Classes                       │
│  - Route requests                                           │
│  - Coordinate services                                      │
│  - Return views with data                                   │
└─────────────────────────────────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   Service Layer                              │
│  - DashboardMetricsService                                  │
│  - AccreditationAnalyticsService                            │
│  - FinancialAnalyticsService                                │
│  - ComplianceMonitoringService                              │
│  - MediaHouseOversightService                               │
│  - StaffPerformanceService                                  │
│  - RiskIndicatorService                                     │
│  - ReportGenerationService                                  │
└─────────────────────────────────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   Repository Layer                           │
│  - ApplicationRepository                                    │
│  - PaymentRepository                                        │
│  - ActivityLogRepository                                    │
│  - UserRepository                                           │
└─────────────────────────────────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   Data Layer                                 │
│  Models: Application, Payment, ActivityLog, User,           │
│          PrintLog, DocumentVersion                          │
└─────────────────────────────────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   SQLite Database                            │
└─────────────────────────────────────────────────────────────┘
```

### Component Responsibilities

#### DirectorController
- Handle HTTP requests for dashboard sections
- Coordinate service calls
- Apply view-only access control
- Return views with prepared data
- Handle report generation requests

#### Service Classes
Each service class encapsulates business logic for a specific dashboard area:

1. **DashboardMetricsService**: Calculate top-level KPIs
2. **AccreditationAnalyticsService**: Process accreditation trends and efficiency metrics
3. **FinancialAnalyticsService**: Aggregate revenue, waivers, and payment data
4. **ComplianceMonitoringService**: Track high-risk actions and audit events
5. **MediaHouseOversightService**: Monitor media house registrations and compliance
6. **StaffPerformanceService**: Calculate staff productivity metrics
7. **RiskIndicatorService**: Evaluate risk thresholds and generate alerts
8. **ReportGenerationService**: Generate PDF and Excel exports

#### Repository Classes
Repositories abstract database queries and provide reusable query methods:
- Centralize SQLite-compatible query logic
- Provide methods for common data retrieval patterns
- Enable easier testing through dependency injection

### Directory Structure

```
app/
├── Http/
│   └── Controllers/
│       └── Staff/
│           └── DirectorController.php (enhanced)
├── Services/
│   └── Director/
│       ├── DashboardMetricsService.php
│       ├── AccreditationAnalyticsService.php
│       ├── FinancialAnalyticsService.php
│       ├── ComplianceMonitoringService.php
│       ├── MediaHouseOversightService.php
│       ├── StaffPerformanceService.php
│       ├── RiskIndicatorService.php
│       └── ReportGenerationService.php
├── Repositories/
│   └── Director/
│       ├── ApplicationRepository.php
│       ├── PaymentRepository.php
│       ├── ActivityLogRepository.php
│       └── UserRepository.php
└── Exports/
    └── Director/
        ├── MonthlyAccreditationExport.php
        ├── RevenueFinancialExport.php
        ├── ComplianceAuditExport.php
        ├── MediaHouseStatusExport.php
        └── OperationalPerformanceExport.php

resources/
└── views/
    └── staff/
        └── director/
            ├── dashboard.blade.php (enhanced)
            ├── reports/
            │   ├── accreditation.blade.php
            │   ├── financial.blade.php
            │   ├── compliance.blade.php
            │   ├── mediahouses.blade.php
            │   ├── staff.blade.php
            │   ├── issuance.blade.php
            │   ├── geographic.blade.php
            │   └── downloads.blade.php
            ├── partials/
            │   ├── kpi-card.blade.php
            │   ├── risk-indicator.blade.php
            │   ├── chart-container.blade.php
            │   └── drill-down-modal.blade.php
            └── pdf/
                ├── monthly-accreditation.blade.php
                ├── revenue-financial.blade.php
                ├── compliance-audit.blade.php
                ├── mediahouse-status.blade.php
                └── operational-performance.blade.php

config/
└── director-dashboard.php (new configuration file)
```

## Components and Interfaces

### Service Class Interfaces

#### DashboardMetricsService

```php
class DashboardMetricsService
{
    public function __construct(
        private ApplicationRepository $applicationRepo,
        private PaymentRepository $paymentRepo,
        private ActivityLogRepository $activityLogRepo
    ) {}

    /**
     * Get all top-level KPIs for executive overview
     * @return array
     */
    public function getExecutiveKPIs(): array;

    /**
     * Get total active accreditations
     * @return int
     */
    public function getTotalActiveAccreditations(): int;

    /**
     * Get accreditations issued in current month
     * @return int
     */
    public function getIssuedThisMonth(): int;

    /**
     * Get accreditations issued year-to-date
     * @return int
     */
    public function getIssuedYearToDate(): int;

    /**
     * Get revenue collected month-to-date
     * @return float
     */
    public function getRevenueMTD(): float;

    /**
     * Get revenue collected year-to-date
     * @return float
     */
    public function getRevenueYTD(): float;

    /**
     * Get outstanding revenue amount
     * @return float
     */
    public function getOutstandingRevenue(): float;

    /**
     * Get count of applications in pipeline
     * @return int
     */
    public function getApplicationsInPipeline(): int;

    /**
     * Get average processing time in days
     * @return float
     */
    public function getAverageProcessingTime(): float;

    /**
     * Get approval rate as percentage
     * @return float
     */
    public function getApprovalRate(): float;

    /**
     * Get count of active compliance flags
     * @return int
     */
    public function getActiveComplianceFlags(): int;

    /**
     * Get total registered media houses
     * @return int
     */
    public function getTotalMediaHouses(): int;
}
```

#### AccreditationAnalyticsService

```php
class AccreditationAnalyticsService
{
    /**
     * Get monthly trends for submitted, approved, rejected applications
     * @param int $months Number of months to retrieve
     * @return Collection
     */
    public function getMonthlyTrends(int $months = 12): Collection;

    /**
     * Get average processing time by stage
     * @return array ['officer' => float, 'registrar' => float, 'accounts' => float]
     */
    public function getProcessingTimeByStage(): array;

    /**
     * Get approval-to-rejection ratio by category
     * @return Collection
     */
    public function getApprovalRatioByCategory(): Collection;

    /**
     * Get approval-to-rejection ratio by residency type
     * @return Collection
     */
    public function getApprovalRatioByResidency(): Collection;

    /**
     * Get category distribution with trends
     * @return Collection
     */
    public function getCategoryDistribution(): Collection;

    /**
     * Get detailed applications for drill-down
     * @param array $filters
     * @return Collection
     */
    public function getDrillDownApplications(array $filters): Collection;

    /**
     * Get chart data for monthly trends
     * @return array Chart.js compatible format
     */
    public function getMonthlyTrendsChartData(): array;
}
```

#### FinancialAnalyticsService

```php
class FinancialAnalyticsService
{
    /**
     * Get monthly revenue trend with year-over-year comparison
     * @param int $months
     * @return array
     */
    public function getMonthlyRevenueTrend(int $months = 12): array;

    /**
     * Get revenue breakdown by service type
     * @return Collection
     */
    public function getRevenueByServiceType(): Collection;

    /**
     * Get revenue breakdown by applicant type
     * @return Collection
     */
    public function getRevenueByApplicantType(): Collection;

    /**
     * Get revenue breakdown by residency type
     * @return Collection
     */
    public function getRevenueByResidency(): Collection;

    /**
     * Get revenue breakdown by payment method
     * @return Collection
     */
    public function getRevenueByPaymentMethod(): Collection;

    /**
     * Get waiver statistics
     * @return array ['count' => int, 'total_value' => float, 'by_approver' => Collection, 'by_category' => Collection]
     */
    public function getWaiverStatistics(): array;

    /**
     * Get outstanding payments with aging analysis
     * @return array ['0_30' => int, '30_60' => int, '60_plus' => int]
     */
    public function getOutstandingPaymentsAging(): array;

    /**
     * Get drill-down payment details
     * @param array $filters
     * @return Collection
     */
    public function getDrillDownPayments(array $filters): Collection;
}
```

#### ComplianceMonitoringService

```php
class ComplianceMonitoringService
{
    /**
     * Get category reassignment statistics
     * @return array ['total' => int, 'by_staff' => Collection]
     */
    public function getCategoryReassignments(): array;

    /**
     * Get reopened applications statistics
     * @return array ['total' => int, 'by_staff' => Collection]
     */
    public function getReopenedApplications(): array;

    /**
     * Get manual override statistics
     * @return array ['total' => int, 'by_staff' => Collection]
     */
    public function getManualOverrides(): array;

    /**
     * Get certificate edit statistics
     * @return array ['total' => int, 'by_staff' => Collection, 'most_edited_fields' => Collection]
     */
    public function getCertificateEdits(): array;

    /**
     * Get excessive reprint statistics
     * @return array ['by_applicant' => Collection, 'by_staff' => Collection]
     */
    public function getExcessiveReprints(): array;

    /**
     * Get print vs reprint statistics
     * @return array ['total_prints' => int, 'total_reprints' => int]
     */
    public function getPrintStatistics(): array;

    /**
     * Get suspicious activity alerts
     * @return array ['failed_logins' => int, 'repeated_reassignments' => int, 'high_waiver_frequency' => int, 'system_overrides' => int]
     */
    public function getSuspiciousActivityAlerts(): array;

    /**
     * Get drill-down audit trail
     * @param string $eventType
     * @param array $filters
     * @return Collection
     */
    public function getDrillDownAuditTrail(string $eventType, array $filters): Collection;
}
```

#### MediaHouseOversightService

```php
class MediaHouseOversightService
{
    /**
     * Get media house status counts
     * @return array ['active' => int, 'suspended' => int, 'new_registrations' => int]
     */
    public function getMediaHouseStatusCounts(): array;

    /**
     * Get average staff accreditations per media house
     * @return float
     */
    public function getAverageStaffPerHouse(): float;

    /**
     * Get media houses exceeding staff thresholds
     * @return Collection
     */
    public function getHousesExceedingThresholds(): Collection;

    /**
     * Get accreditations nearing expiry
     * @param int $days Days until expiry
     * @return Collection
     */
    public function getAccreditationsNearingExpiry(int $days = 30): Collection;

    /**
     * Get high-risk non-renewal cases
     * @return Collection
     */
    public function getHighRiskNonRenewals(): Collection;

    /**
     * Get drill-down media house details
     * @param int $mediaHouseId
     * @return array
     */
    public function getDrillDownMediaHouseDetails(int $mediaHouseId): array;
}
```

#### StaffPerformanceService

```php
class StaffPerformanceService
{
    /**
     * Get applications processed per officer
     * @return Collection
     */
    public function getApplicationsProcessedPerOfficer(): Collection;

    /**
     * Get average review time per registrar
     * @return Collection
     */
    public function getAverageReviewTimePerRegistrar(): Collection;

    /**
     * Get payment verification turnaround per staff
     * @return Collection
     */
    public function getPaymentVerificationTurnaround(): Collection;

    /**
     * Get approval distribution per officer
     * @return Collection
     */
    public function getApprovalDistributionPerOfficer(): Collection;

    /**
     * Get category reassignment frequency per staff
     * @return Collection
     */
    public function getReassignmentFrequencyPerStaff(): Collection;

    /**
     * Get drill-down staff activity logs
     * @param int $userId
     * @param array $filters
     * @return Collection
     */
    public function getDrillDownStaffActivity(int $userId, array $filters): Collection;
}
```

#### RiskIndicatorService

```php
class RiskIndicatorService
{
    /**
     * Get all risk indicators with color coding
     * @return array
     */
    public function getAllRiskIndicators(): array;

    /**
     * Evaluate excessive waivers risk
     * @return array ['status' => string, 'level' => string, 'value' => mixed, 'threshold' => mixed]
     */
    public function evaluateExcessiveWaivers(): array;

    /**
     * Evaluate high rejection spike risk
     * @return array
     */
    public function evaluateRejectionSpike(): array;

    /**
     * Evaluate processing time SLA risk
     * @return array
     */
    public function evaluateProcessingTimeSLA(): array;

    /**
     * Evaluate revenue drop risk
     * @return array
     */
    public function evaluateRevenueDrop(): array;

    /**
     * Evaluate reprint frequency risk
     * @return array
     */
    public function evaluateReprintFrequency(): array;

    /**
     * Evaluate category reassignment risk
     * @return array
     */
    public function evaluateCategoryReassignment(): array;

    /**
     * Evaluate payment verification delay risk
     * @return array
     */
    public function evaluatePaymentDelay(): array;

    /**
     * Get risk level color
     * @param string $level 'green', 'amber', 'red'
     * @return string CSS class
     */
    public function getRiskLevelColor(string $level): string;
}
```

#### ReportGenerationService

```php
class ReportGenerationService
{
    /**
     * Generate monthly accreditation report
     * @param string $format 'pdf' or 'excel'
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateMonthlyAccreditationReport(string $format, array $params);

    /**
     * Generate revenue and financial report
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateRevenueFinancialReport(string $format, array $params);

    /**
     * Generate compliance and audit report
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateComplianceAuditReport(string $format, array $params);

    /**
     * Generate media house status report
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateMediaHouseStatusReport(string $format, array $params);

    /**
     * Generate operational performance report
     * @param string $format
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateOperationalPerformanceReport(string $format, array $params);
}
```

### Repository Interfaces

#### ApplicationRepository

```php
class ApplicationRepository
{
    /**
     * Get applications by status
     * @param string|array $status
     * @return Collection
     */
    public function getByStatus($status): Collection;

    /**
     * Get applications submitted in date range
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function getSubmittedInRange(Carbon $startDate, Carbon $endDate): Collection;

    /**
     * Get applications issued in date range
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function getIssuedInRange(Carbon $startDate, Carbon $endDate): Collection;

    /**
     * Get monthly application counts (SQLite compatible)
     * @param int $months
     * @return Collection
     */
    public function getMonthlyApplicationCounts(int $months = 12): Collection;

    /**
     * Get average processing time in hours (calculated in PHP for SQLite)
     * @param string|null $stage
     * @return float
     */
    public function getAverageProcessingTime(?string $stage = null): float;

    /**
     * Get applications by category
     * @return Collection
     */
    public function getByCategory(): Collection;

    /**
     * Get applications with excessive prints
     * @param int $threshold
     * @return Collection
     */
    public function getWithExcessivePrints(int $threshold = 1): Collection;

    /**
     * Get applications nearing expiry
     * @param int $days
     * @return Collection
     */
    public function getNearingExpiry(int $days = 30): Collection;
}
```

#### PaymentRepository

```php
class PaymentRepository
{
    /**
     * Get payments in date range
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @param string|null $status
     * @return Collection
     */
    public function getInRange(Carbon $startDate, Carbon $endDate, ?string $status = null): Collection;

    /**
     * Get revenue by service type
     * @param Carbon|null $startDate
     * @param Carbon|null $endDate
     * @return Collection
     */
    public function getRevenueByServiceType(?Carbon $startDate = null, ?Carbon $endDate = null): Collection;

    /**
     * Get revenue by applicant category
     * @return Collection
     */
    public function getRevenueByApplicantCategory(): Collection;

    /**
     * Get revenue by payment method
     * @return Collection
     */
    public function getRevenueByPaymentMethod(): Collection;

    /**
     * Get monthly revenue trend (SQLite compatible)
     * @param int $months
     * @return Collection
     */
    public function getMonthlyRevenueTrend(int $months = 12): Collection;

    /**
     * Get outstanding payments with aging
     * @return array
     */
    public function getOutstandingPaymentsAging(): array;
}
```

#### ActivityLogRepository

```php
class ActivityLogRepository
{
    /**
     * Get logs by action type
     * @param string|array $action
     * @param Carbon|null $startDate
     * @param Carbon|null $endDate
     * @return Collection
     */
    public function getByAction($action, ?Carbon $startDate = null, ?Carbon $endDate = null): Collection;

    /**
     * Get logs by user
     * @param int $userId
     * @param array $filters
     * @return Collection
     */
    public function getByUser(int $userId, array $filters = []): Collection;

    /**
     * Get high-risk actions
     * @param Carbon|null $startDate
     * @return Collection
     */
    public function getHighRiskActions(?Carbon $startDate = null): Collection;

    /**
     * Get action counts by staff member
     * @param string $action
     * @return Collection
     */
    public function getActionCountsByStaff(string $action): Collection;

    /**
     * Get suspicious activity patterns
     * @return array
     */
    public function getSuspiciousActivityPatterns(): array;
}
```

## Data Models

### Existing Models (Leveraged)

#### Application Model
```php
// Key fields used:
- id
- status (draft, submitted, officer_review, officer_approved, officer_rejected, 
         registrar_review, registrar_approved, registrar_rejected, 
         accounts_review, issued)
- application_type (accreditation, registration, renewal)
- accreditation_category_code (J, MM, MH, etc.)
- residency_type (local, foreign)
- submitted_at
- assigned_at
- last_action_at
- approved_at
- issued_at
- current_stage (officer, registrar, accounts, production)
- print_count
- waiver_status (pending, approved, rejected)
- proof_amount_paid
- expiry_date
- media_house_id (for journalists)

// Relationships:
- user() - applicant
- assignedOfficer()
- assignedRegistrar()
- payments()
- activityLogs()
- printLogs()
- documentVersions()
```

#### Payment Model
```php
// Key fields:
- id
- application_id
- status (pending, paid, failed, refunded)
- amount
- service_type (accreditation, registration, renewal, reprint)
- applicant_category (journalist, media_house, mass_media)
- payment_method (paynow, bank_transfer, cash, waiver)
- confirmed_at
- created_at

// Relationships:
- application()
```

#### ActivityLog Model
```php
// Key fields:
- id
- user_id
- user_role
- action (registrar_reassign_category, manual_payment_override, 
         certificate_edit_after_approval, application_reopened, etc.)
- entity_type (Application, Payment, User)
- entity_id
- old_value
- new_value
- ip_address
- created_at

// Relationships:
- user()
```

#### User Model
```php
// Key fields:
- id
- name
- email
- designation
- region
- roles (via Spatie Laravel Permission)

// Relationships:
- assignedApplications()
- activityLogs()
```

#### PrintLog Model
```php
// Key fields:
- id
- application_id
- user_id (staff who initiated print)
- print_type (initial, reprint)
- document_type (certificate, card)
- printed_at

// Relationships:
- application()
- user()
```

#### DocumentVersion Model
```php
// Key fields:
- id
- application_id
- user_id (staff who made edit)
- field_name (field that was edited)
- old_value
- new_value
- edited_at

// Relationships:
- application()
- user()
```

### New Configuration Model

#### RiskThreshold Configuration
```php
// Stored in config/director-dashboard.php

return [
    'risk_thresholds' => [
        'excessive_waivers' => [
            'green' => ['max' => 5],  // 0-5 waivers per month
            'amber' => ['min' => 6, 'max' => 10],  // 6-10 waivers
            'red' => ['min' => 11],  // 11+ waivers
        ],
        'rejection_spike' => [
            'green' => ['max' => 10],  // 0-10% rejection rate
            'amber' => ['min' => 11, 'max' => 20],  // 11-20%
            'red' => ['min' => 21],  // 21%+
        ],
        'processing_time_sla' => [
            'green' => ['max' => 5],  // 0-5 days
            'amber' => ['min' => 6, 'max' => 10],  // 6-10 days
            'red' => ['min' => 11],  // 11+ days
        ],
        'revenue_drop' => [
            'green' => ['min' => -5],  // -5% to +∞
            'amber' => ['min' => -15, 'max' => -6],  // -15% to -6%
            'red' => ['max' => -16],  // -16% or worse
        ],
        'reprint_frequency' => [
            'green' => ['max' => 2],  // 0-2 reprints per application
            'amber' => ['min' => 3, 'max' => 4],  // 3-4 reprints
            'red' => ['min' => 5],  // 5+ reprints
        ],
        'category_reassignment' => [
            'green' => ['max' => 3],  // 0-3 reassignments per month
            'amber' => ['min' => 4, 'max' => 7],  // 4-7 reassignments
            'red' => ['min' => 8],  // 8+ reassignments
        ],
        'payment_delay' => [
            'green' => ['max' => 2],  // 0-2 days
            'amber' => ['min' => 3, 'max' => 5],  // 3-5 days
            'red' => ['min' => 6],  // 6+ days
        ],
    ],
    
    'cache_ttl' => [
        'kpis' => 3600,  // 1 hour
        'charts' => 7200,  // 2 hours
        'reports' => 86400,  // 24 hours
    ],
    
    'chart_colors' => [
        'primary' => '#3b82f6',
        'success' => '#10b981',
        'warning' => '#f59e0b',
        'danger' => '#ef4444',
        'info' => '#06b6d4',
        'secondary' => '#6b7280',
    ],
    
    'media_house_staff_threshold' => 50,  // Alert if media house has 50+ staff
    'expiry_warning_days' => 30,  // Warn 30 days before expiry
    'excessive_print_threshold' => 2,  // Flag if more than 2 reprints
];
```


## Database Query Strategies (SQLite-Compatible)

### SQLite Date Handling

SQLite uses `strftime()` for date formatting and manipulation. All queries must avoid MySQL-specific functions like `DATE_FORMAT()`, `TIMESTAMPDIFF()`, `YEAR()`, `MONTH()`, etc.

#### Date Format Patterns
```php
// Month-Year grouping
strftime('%Y-%m', created_at) as month

// Year grouping
strftime('%Y', created_at) as year

// Day of month
strftime('%d', created_at) as day

// Full date
strftime('%Y-%m-%d', created_at) as date

// Week number
strftime('%W', created_at) as week
```

#### Date Comparisons
```php
// Instead of TIMESTAMPDIFF, calculate in PHP:
$apps = Application::whereNotNull('submitted_at')
    ->whereNotNull('issued_at')
    ->select('submitted_at', 'issued_at')
    ->get();

$totalHours = 0;
foreach ($apps as $app) {
    $totalHours += Carbon::parse($app->submitted_at)
        ->diffInHours(Carbon::parse($app->issued_at));
}
$avgHours = $apps->count() > 0 ? $totalHours / $apps->count() : 0;
```

### Query Optimization Strategies

#### 1. Monthly Trends Query (SQLite-Compatible)

```php
// Get monthly application counts
$monthlyTrends = Application::select(
    DB::raw("strftime('%Y-%m', created_at) as month"),
    DB::raw("COUNT(*) as total_submitted"),
    DB::raw("SUM(CASE WHEN status = 'issued' THEN 1 ELSE 0 END) as total_approved"),
    DB::raw("SUM(CASE WHEN status LIKE '%rejected%' THEN 1 ELSE 0 END) as total_rejected")
)
->where('created_at', '>=', now()->subMonths(12))
->groupBy('month')
->orderBy('month', 'desc')
->get();
```

#### 2. Revenue Aggregation Query

```php
// Revenue by service type
$revenueByService = Payment::select(
    'service_type',
    DB::raw('SUM(amount) as total_revenue'),
    DB::raw('COUNT(*) as transaction_count')
)
->where('status', 'paid')
->where('confirmed_at', '>=', now()->startOfYear())
->groupBy('service_type')
->get();
```

#### 3. Staff Performance Query

```php
// Applications processed per officer
$staffPerformance = User::role('accreditation_officer')
    ->withCount([
        'assignedApplications as processed_count' => function($q) {
            $q->whereNotNull('last_action_at')
              ->where('last_action_at', '>=', now()->startOfMonth());
        },
        'assignedApplications as approved_count' => function($q) {
            $q->where('status', Application::OFFICER_APPROVED)
              ->where('last_action_at', '>=', now()->startOfMonth());
        }
    ])
    ->get();
```

#### 4. Compliance Monitoring Query

```php
// High-risk actions by staff
$categoryReassignments = ActivityLog::select(
    'user_id',
    'user_role',
    DB::raw('COUNT(*) as reassignment_count')
)
->where('action', 'registrar_reassign_category')
->where('created_at', '>=', now()->startOfMonth())
->groupBy('user_id', 'user_role')
->with('user:id,name,email')
->get();
```

#### 5. Media House Oversight Query

```php
// Media houses with staff counts
$mediaHouses = Application::where('application_type', 'registration')
    ->where('status', Application::ISSUED)
    ->withCount([
        'staffAccreditations' => function($q) {
            $q->where('status', Application::ISSUED);
        }
    ])
    ->having('staff_accreditations_count', '>', config('director-dashboard.media_house_staff_threshold'))
    ->get();
```

#### 6. Aging Analysis Query

```php
// Outstanding payments aging (SQLite compatible)
$aging = [
    '0_30' => Application::where('status', Application::ACCOUNTS_REVIEW)
        ->where('updated_at', '>=', now()->subDays(30))
        ->count(),
    '30_60' => Application::where('status', Application::ACCOUNTS_REVIEW)
        ->where('updated_at', '<', now()->subDays(30))
        ->where('updated_at', '>=', now()->subDays(60))
        ->count(),
    '60_plus' => Application::where('status', Application::ACCOUNTS_REVIEW)
        ->where('updated_at', '<', now()->subDays(60))
        ->count(),
];
```

### Caching Strategy

#### Cache Keys Structure
```php
// KPI cache keys
'director.kpis.executive_overview'
'director.kpis.active_accreditations'
'director.kpis.revenue_mtd'
'director.kpis.revenue_ytd'

// Chart data cache keys
'director.charts.monthly_trends'
'director.charts.revenue_breakdown'
'director.charts.category_distribution'

// Report cache keys
'director.reports.accreditation.{month}'
'director.reports.financial.{month}'
```

#### Cache Implementation Pattern
```php
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
```

#### Cache Invalidation Strategy
```php
// Invalidate caches when relevant data changes
// In Application model:
protected static function booted()
{
    static::updated(function ($application) {
        if ($application->isDirty('status')) {
            Cache::forget('director.kpis.executive_overview');
            Cache::forget('director.charts.monthly_trends');
        }
    });
}

// In Payment model:
protected static function booted()
{
    static::updated(function ($payment) {
        if ($payment->isDirty('status') && $payment->status === 'paid') {
            Cache::forget('director.kpis.executive_overview');
            Cache::forget('director.charts.revenue_breakdown');
        }
    });
}
```

### Query Performance Optimization

#### Indexes Required
```php
// Migration for performance indexes
Schema::table('applications', function (Blueprint $table) {
    $table->index('status');
    $table->index('application_type');
    $table->index('accreditation_category_code');
    $table->index('residency_type');
    $table->index(['status', 'issued_at']);
    $table->index(['status', 'submitted_at']);
    $table->index('media_house_id');
});

Schema::table('payments', function (Blueprint $table) {
    $table->index('status');
    $table->index('service_type');
    $table->index('applicant_category');
    $table->index('payment_method');
    $table->index(['status', 'confirmed_at']);
});

Schema::table('activity_logs', function (Blueprint $table) {
    $table->index('action');
    $table->index('user_id');
    $table->index('created_at');
    $table->index(['action', 'created_at']);
});

Schema::table('print_logs', function (Blueprint $table) {
    $table->index('application_id');
    $table->index('print_type');
    $table->index('printed_at');
});
```

#### Eager Loading Strategy
```php
// Load relationships efficiently
$applications = Application::with([
    'user:id,name,email',
    'assignedOfficer:id,name',
    'assignedRegistrar:id,name',
    'payments' => function($q) {
        $q->where('status', 'paid');
    }
])
->where('status', Application::ISSUED)
->get();
```

## Controller Methods and Responsibilities

### DirectorController Structure

```php
<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\Director\DashboardMetricsService;
use App\Services\Director\AccreditationAnalyticsService;
use App\Services\Director\FinancialAnalyticsService;
use App\Services\Director\ComplianceMonitoringService;
use App\Services\Director\MediaHouseOversightService;
use App\Services\Director\StaffPerformanceService;
use App\Services\Director\RiskIndicatorService;
use App\Services\Director\ReportGenerationService;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function __construct(
        private DashboardMetricsService $metricsService,
        private AccreditationAnalyticsService $accreditationService,
        private FinancialAnalyticsService $financialService,
        private ComplianceMonitoringService $complianceService,
        private MediaHouseOversightService $mediaHouseService,
        private StaffPerformanceService $staffService,
        private RiskIndicatorService $riskService,
        private ReportGenerationService $reportService
    ) {
        // Ensure view-only access
        $this->middleware(['staff.portal', 'role:director']);
    }

    /**
     * Executive Overview Dashboard
     * Requirements: 1.1-1.10
     */
    public function dashboard()
    {
        $kpis = $this->metricsService->getExecutiveKPIs();
        $riskIndicators = $this->riskService->getAllRiskIndicators();
        $highRiskActivity = $this->complianceService->getHighRiskActions(5);
        
        return view('staff.director.dashboard', compact('kpis', 'riskIndicators', 'highRiskActivity'));
    }

    /**
     * Accreditation Performance Report
     * Requirements: 2.1-2.6
     */
    public function accreditationPerformance()
    {
        $monthlyTrends = $this->accreditationService->getMonthlyTrendsChartData();
        $processingTimeByStage = $this->accreditationService->getProcessingTimeByStage();
        $approvalRatioByCategory = $this->accreditationService->getApprovalRatioByCategory();
        $approvalRatioByResidency = $this->accreditationService->getApprovalRatioByResidency();
        $categoryDistribution = $this->accreditationService->getCategoryDistribution();
        
        return view('staff.director.reports.accreditation', compact(
            'monthlyTrends',
            'processingTimeByStage',
            'approvalRatioByCategory',
            'approvalRatioByResidency',
            'categoryDistribution'
        ));
    }

    /**
     * Financial Performance Report
     * Requirements: 3.1-3.8
     */
    public function financialOverview()
    {
        $monthlyRevenueTrend = $this->financialService->getMonthlyRevenueTrend();
        $revenueByServiceType = $this->financialService->getRevenueByServiceType();
        $revenueByApplicantType = $this->financialService->getRevenueByApplicantType();
        $revenueByResidency = $this->financialService->getRevenueByResidency();
        $revenueByPaymentMethod = $this->financialService->getRevenueByPaymentMethod();
        $waiverStatistics = $this->financialService->getWaiverStatistics();
        $outstandingPaymentsAging = $this->financialService->getOutstandingPaymentsAging();
        
        return view('staff.director.reports.financial', compact(
            'monthlyRevenueTrend',
            'revenueByServiceType',
            'revenueByApplicantType',
            'revenueByResidency',
            'revenueByPaymentMethod',
            'waiverStatistics',
            'outstandingPaymentsAging'
        ));
    }

    /**
     * Compliance and Risk Monitoring
     * Requirements: 4.1-4.12
     */
    public function complianceRisk()
    {
        $categoryReassignments = $this->complianceService->getCategoryReassignments();
        $reopenedApplications = $this->complianceService->getReopenedApplications();
        $manualOverrides = $this->complianceService->getManualOverrides();
        $certificateEdits = $this->complianceService->getCertificateEdits();
        $excessiveReprints = $this->complianceService->getExcessiveReprints();
        $printStatistics = $this->complianceService->getPrintStatistics();
        $suspiciousActivity = $this->complianceService->getSuspiciousActivityAlerts();
        
        return view('staff.director.reports.compliance', compact(
            'categoryReassignments',
            'reopenedApplications',
            'manualOverrides',
            'certificateEdits',
            'excessiveReprints',
            'printStatistics',
            'suspiciousActivity'
        ));
    }

    /**
     * Media House Oversight
     * Requirements: 5.1-5.7
     */
    public function mediaHouseOversight()
    {
        $statusCounts = $this->mediaHouseService->getMediaHouseStatusCounts();
        $averageStaffPerHouse = $this->mediaHouseService->getAverageStaffPerHouse();
        $housesExceedingThresholds = $this->mediaHouseService->getHousesExceedingThresholds();
        $accreditationsNearingExpiry = $this->mediaHouseService->getAccreditationsNearingExpiry();
        $highRiskNonRenewals = $this->mediaHouseService->getHighRiskNonRenewals();
        
        return view('staff.director.reports.mediahouses', compact(
            'statusCounts',
            'averageStaffPerHouse',
            'housesExceedingThresholds',
            'accreditationsNearingExpiry',
            'highRiskNonRenewals'
        ));
    }

    /**
     * Staff Performance Metrics
     * Requirements: 7.1-7.6
     */
    public function staffPerformance()
    {
        $applicationsProcessed = $this->staffService->getApplicationsProcessedPerOfficer();
        $averageReviewTime = $this->staffService->getAverageReviewTimePerRegistrar();
        $paymentVerificationTurnaround = $this->staffService->getPaymentVerificationTurnaround();
        $approvalDistribution = $this->staffService->getApprovalDistributionPerOfficer();
        $reassignmentFrequency = $this->staffService->getReassignmentFrequencyPerStaff();
        
        return view('staff.director.reports.staff', compact(
            'applicationsProcessed',
            'averageReviewTime',
            'paymentVerificationTurnaround',
            'approvalDistribution',
            'reassignmentFrequency'
        ));
    }

    /**
     * Issuance and Print Oversight
     * Requirements: 8.1-8.5
     */
    public function issuanceOversight()
    {
        $monthlyIssuance = $this->accreditationService->getMonthlyIssuanceCounts();
        $printRatio = $this->complianceService->getPrintStatistics();
        $printsByStaff = $this->staffService->getPrintActionsByStaff();
        $outstandingUnprinted = $this->accreditationService->getOutstandingUnprinted();
        
        return view('staff.director.reports.issuance', compact(
            'monthlyIssuance',
            'printRatio',
            'printsByStaff',
            'outstandingUnprinted'
        ));
    }

    /**
     * Geographic Distribution
     * Requirements: 9.1-9.5
     */
    public function geographicDistribution()
    {
        $accreditationsByRegion = $this->accreditationService->getAccreditationsByRegion();
        $revenueByRegion = $this->financialService->getRevenueByRegion();
        $processingTimeByRegion = $this->accreditationService->getProcessingTimeByRegion();
        $mediaHousesByRegion = $this->mediaHouseService->getMediaHousesByRegion();
        
        return view('staff.director.reports.geographic', compact(
            'accreditationsByRegion',
            'revenueByRegion',
            'processingTimeByRegion',
            'mediaHousesByRegion'
        ));
    }

    /**
     * Reports and Downloads Page
     * Requirements: 10.1-10.8, 12.1
     */
    public function reportsDownloads()
    {
        return view('staff.director.reports.downloads');
    }

    /**
     * Generate Monthly Accreditation Report
     * Requirements: 10.1, 10.6, 10.7, 10.8
     */
    public function generateMonthlyAccreditationReport(Request $request)
    {
        $format = $request->input('format', 'pdf'); // pdf or excel
        $month = $request->input('month', now()->format('Y-m'));
        
        return $this->reportService->generateMonthlyAccreditationReport($format, [
            'month' => $month
        ]);
    }

    /**
     * Generate Revenue and Financial Report
     * Requirements: 10.2, 10.6, 10.7, 10.8
     */
    public function generateRevenueFinancialReport(Request $request)
    {
        $format = $request->input('format', 'pdf');
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfMonth()->format('Y-m-d'));
        
        return $this->reportService->generateRevenueFinancialReport($format, [
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }

    /**
     * Generate Compliance and Audit Report
     * Requirements: 10.3, 10.6, 10.7, 10.8
     */
    public function generateComplianceAuditReport(Request $request)
    {
        $format = $request->input('format', 'pdf');
        $month = $request->input('month', now()->format('Y-m'));
        
        return $this->reportService->generateComplianceAuditReport($format, [
            'month' => $month
        ]);
    }

    /**
     * Generate Media House Status Report
     * Requirements: 10.4, 10.6, 10.7, 10.8
     */
    public function generateMediaHouseStatusReport(Request $request)
    {
        $format = $request->input('format', 'pdf');
        
        return $this->reportService->generateMediaHouseStatusReport($format, []);
    }

    /**
     * Generate Operational Performance Report
     * Requirements: 10.5, 10.6, 10.7, 10.8
     */
    public function generateOperationalPerformanceReport(Request $request)
    {
        $format = $request->input('format', 'pdf');
        $month = $request->input('month', now()->format('Y-m'));
        
        return $this->reportService->generateOperationalPerformanceReport($format, [
            'month' => $month
        ]);
    }

    /**
     * Drill-Down: Application Details
     * Requirements: 2.6, 3.8, 11.8
     */
    public function drillDownApplications(Request $request)
    {
        // View-only: no edit actions
        $filters = $request->only(['status', 'category', 'residency', 'date_from', 'date_to']);
        $applications = $this->accreditationService->getDrillDownApplications($filters);
        
        return view('staff.director.drilldown.applications', compact('applications', 'filters'));
    }

    /**
     * Drill-Down: Payment Details
     * Requirements: 3.8, 11.8
     */
    public function drillDownPayments(Request $request)
    {
        $filters = $request->only(['service_type', 'payment_method', 'date_from', 'date_to']);
        $payments = $this->financialService->getDrillDownPayments($filters);
        
        return view('staff.director.drilldown.payments', compact('payments', 'filters'));
    }

    /**
     * Drill-Down: Audit Trail
     * Requirements: 4.12, 11.8, 15.1-15.4
     */
    public function drillDownAuditTrail(Request $request)
    {
        $eventType = $request->input('event_type');
        $filters = $request->only(['user_id', 'date_from', 'date_to']);
        $auditTrail = $this->complianceService->getDrillDownAuditTrail($eventType, $filters);
        
        return view('staff.director.drilldown.audit', compact('auditTrail', 'eventType', 'filters'));
    }

    /**
     * Drill-Down: Media House Details
     * Requirements: 5.7, 11.8
     */
    public function drillDownMediaHouse(Request $request, int $mediaHouseId)
    {
        $details = $this->mediaHouseService->getDrillDownMediaHouseDetails($mediaHouseId);
        
        return view('staff.director.drilldown.mediahouse', compact('details'));
    }

    /**
     * Drill-Down: Staff Activity
     * Requirements: 7.6, 11.8
     */
    public function drillDownStaffActivity(Request $request, int $userId)
    {
        $filters = $request->only(['action_type', 'date_from', 'date_to']);
        $activity = $this->staffService->getDrillDownStaffActivity($userId, $filters);
        
        return view('staff.director.drilldown.staff', compact('activity', 'userId', 'filters'));
    }

    /**
     * AJAX: Refresh KPIs
     * Requirements: 1.10, 14.1, 14.2
     */
    public function refreshKPIs()
    {
        Cache::forget('director.kpis.executive_overview');
        $kpis = $this->metricsService->getExecutiveKPIs();
        
        return response()->json($kpis);
    }

    /**
     * AJAX: Get Chart Data
     * Requirements: 14.1, 14.2
     */
    public function getChartData(Request $request)
    {
        $chartType = $request->input('chart_type');
        
        $data = match($chartType) {
            'monthly_trends' => $this->accreditationService->getMonthlyTrendsChartData(),
            'revenue_breakdown' => $this->financialService->getRevenueBreakdownChartData(),
            'category_distribution' => $this->accreditationService->getCategoryDistributionChartData(),
            default => []
        };
        
        return response()->json($data);
    }
}
```

### Route Definitions

```php
// routes/web.php

Route::middleware(['staff.portal', 'role:director'])->prefix('staff/director')->name('staff.director.')->group(function () {
    
    // Main Dashboard
    Route::get('/', [DirectorController::class, 'dashboard'])->name('dashboard');
    
    // Report Sections
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/accreditation', [DirectorController::class, 'accreditationPerformance'])->name('accreditation');
        Route::get('/financial', [DirectorController::class, 'financialOverview'])->name('financial');
        Route::get('/compliance', [DirectorController::class, 'complianceRisk'])->name('compliance');
        Route::get('/mediahouses', [DirectorController::class, 'mediaHouseOversight'])->name('mediahouses');
        Route::get('/staff', [DirectorController::class, 'staffPerformance'])->name('staff');
        Route::get('/issuance', [DirectorController::class, 'issuanceOversight'])->name('issuance');
        Route::get('/geographic', [DirectorController::class, 'geographicDistribution'])->name('geographic');
        Route::get('/downloads', [DirectorController::class, 'reportsDownloads'])->name('downloads');
    });
    
    // Report Generation
    Route::prefix('generate')->name('generate.')->group(function () {
        Route::post('/monthly-accreditation', [DirectorController::class, 'generateMonthlyAccreditationReport'])->name('monthly-accreditation');
        Route::post('/revenue-financial', [DirectorController::class, 'generateRevenueFinancialReport'])->name('revenue-financial');
        Route::post('/compliance-audit', [DirectorController::class, 'generateComplianceAuditReport'])->name('compliance-audit');
        Route::post('/mediahouse-status', [DirectorController::class, 'generateMediaHouseStatusReport'])->name('mediahouse-status');
        Route::post('/operational-performance', [DirectorController::class, 'generateOperationalPerformanceReport'])->name('operational-performance');
    });
    
    // Drill-Down Views
    Route::prefix('drilldown')->name('drilldown.')->group(function () {
        Route::get('/applications', [DirectorController::class, 'drillDownApplications'])->name('applications');
        Route::get('/payments', [DirectorController::class, 'drillDownPayments'])->name('payments');
        Route::get('/audit', [DirectorController::class, 'drillDownAuditTrail'])->name('audit');
        Route::get('/mediahouse/{id}', [DirectorController::class, 'drillDownMediaHouse'])->name('mediahouse');
        Route::get('/staff/{id}', [DirectorController::class, 'drillDownStaffActivity'])->name('staff');
    });
    
    // AJAX Endpoints
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::get('/refresh-kpis', [DirectorController::class, 'refreshKPIs'])->name('refresh-kpis');
        Route::get('/chart-data', [DirectorController::class, 'getChartData'])->name('chart-data');
    });
});
```


## View Structure and Layout

### Dashboard Layout Hierarchy

```
portal.blade.php (main layout)
└── staff.director.dashboard.blade.php
    ├── partials.kpi-card.blade.php (×8 KPI cards)
    ├── partials.risk-indicator.blade.php (×7 risk indicators)
    └── partials.chart-container.blade.php (×2 overview charts)
```

### Executive Overview Dashboard (dashboard.blade.php)

```blade
@extends('layouts.portal')
@section('title', 'Executive Overview - Director Dashboard')

@section('content')
<div class="director-dashboard">
    {{-- Header with View-Only Badge --}}
    <div class="dashboard-header">
        <h4>Executive Overview</h4>
        <div class="header-actions">
            <span class="badge bg-dark">VIEW-ONLY</span>
            <button onclick="refreshKPIs()" class="btn btn-sm btn-outline-primary">
                <i class="ri-refresh-line"></i> Refresh
            </button>
        </div>
    </div>

    {{-- Top KPI Row (Requirements 1.1-1.9) --}}
    <div class="row g-3 mb-4">
        @include('staff.director.partials.kpi-card', [
            'title' => 'Active Accreditations',
            'value' => number_format($kpis['total_active_accreditations']),
            'icon' => 'ri-id-card-line',
            'color' => 'primary',
            'subtitle' => 'Currently issued'
        ])
        
        @include('staff.director.partials.kpi-card', [
            'title' => 'Issued (MTD/YTD)',
            'value' => $kpis['issued_this_month'] . ' / ' . $kpis['issued_this_year'],
            'icon' => 'ri-checkbox-circle-line',
            'color' => 'success',
            'trend' => '+12%'
        ])
        
        @include('staff.director.partials.kpi-card', [
            'title' => 'Revenue (MTD/YTD)',
            'value' => '$' . number_format($kpis['revenue_mtd'], 2) . ' / $' . number_format($kpis['revenue_ytd'], 2),
            'icon' => 'ri-money-dollar-circle-line',
            'color' => 'info',
            'drilldown' => route('staff.director.reports.financial')
        ])
        
        @include('staff.director.partials.kpi-card', [
            'title' => 'Avg Processing Time',
            'value' => $kpis['avg_processing_time'] . ' days',
            'icon' => 'ri-time-line',
            'color' => 'warning'
        ])
    </div>

    <div class="row g-3 mb-4">
        @include('staff.director.partials.kpi-card', [
            'title' => 'Approval Rate',
            'value' => $kpis['approval_rate'] . '%',
            'icon' => 'ri-percent-line',
            'color' => 'success',
            'progress' => $kpis['approval_rate']
        ])
        
        @include('staff.director.partials.kpi-card', [
            'title' => 'Pipeline Volume',
            'value' => number_format($kpis['applications_in_pipeline']),
            'icon' => 'ri-inbox-line',
            'color' => 'secondary'
        ])
        
        @include('staff.director.partials.kpi-card', [
            'title' => 'Compliance Flags',
            'value' => number_format($kpis['compliance_flags_active']),
            'icon' => 'ri-alarm-warning-line',
            'color' => 'danger',
            'drilldown' => route('staff.director.reports.compliance')
        ])
        
        @include('staff.director.partials.kpi-card', [
            'title' => 'Media Houses',
            'value' => number_format($kpis['total_media_houses']),
            'icon' => 'ri-building-2-line',
            'color' => 'primary',
            'drilldown' => route('staff.director.reports.mediahouses')
        ])
    </div>

    {{-- Strategic Risk Indicators (Requirements 6.1-6.8) --}}
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5><i class="ri-shield-check-line me-2"></i>Strategic Risk Indicators</h5>
                    <span class="badge bg-danger-subtle text-danger">Live Monitoring</span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach($riskIndicators as $indicator)
                            @include('staff.director.partials.risk-indicator', ['indicator' => $indicator])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Access to Detailed Reports --}}
    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ route('staff.director.reports.accreditation') }}" class="report-card">
                <i class="ri-bar-chart-line"></i>
                <div>
                    <h6>Accreditation Performance</h6>
                    <p>Trends, efficiency & distribution</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('staff.director.reports.financial') }}" class="report-card">
                <i class="ri-money-dollar-circle-line"></i>
                <div>
                    <h6>Financial Performance</h6>
                    <p>Revenue, waivers & aging</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('staff.director.reports.compliance') }}" class="report-card">
                <i class="ri-shield-check-line"></i>
                <div>
                    <h6>Compliance & Risk</h6>
                    <p>Audit, reprints & security</p>
                </div>
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
function refreshKPIs() {
    fetch('{{ route("staff.director.ajax.refresh-kpis") }}')
        .then(response => response.json())
        .then(data => {
            // Update KPI values dynamically
            updateKPIValues(data);
        });
}

// Auto-refresh every 5 minutes
setInterval(refreshKPIs, 300000);
</script>
@endpush
@endsection
```

### KPI Card Partial (partials/kpi-card.blade.php)

```blade
<div class="col-12 col-md-3">
    <div class="kpi-card {{ $drilldown ?? false ? 'clickable' : '' }}" 
         @if($drilldown ?? false) onclick="window.location='{{ $drilldown }}'" @endif>
        <div class="kpi-icon bg-{{ $color }}-subtle text-{{ $color }}">
            <i class="{{ $icon }}"></i>
        </div>
        <div class="kpi-content">
            <div class="kpi-title">{{ $title }}</div>
            <div class="kpi-value">{{ $value }}</div>
            @if(isset($subtitle))
                <div class="kpi-subtitle">{{ $subtitle }}</div>
            @endif
            @if(isset($trend))
                <div class="kpi-trend text-success">
                    <i class="ri-arrow-up-line"></i> {{ $trend }}
                </div>
            @endif
            @if(isset($progress))
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-{{ $color }}" style="width: {{ $progress }}%"></div>
                </div>
            @endif
        </div>
    </div>
</div>
```

### Risk Indicator Partial (partials/risk-indicator.blade.php)

```blade
<div class="col-md-6 col-lg-4">
    <div class="risk-indicator risk-{{ $indicator['level'] }}">
        <div class="risk-header">
            <span class="risk-badge badge-{{ $indicator['level'] }}">
                {{ strtoupper($indicator['level']) }}
            </span>
            <h6>{{ $indicator['title'] }}</h6>
        </div>
        <div class="risk-body">
            <div class="risk-value">{{ $indicator['value'] }}</div>
            <div class="risk-description">{{ $indicator['description'] }}</div>
        </div>
        @if($indicator['drilldown'] ?? false)
            <a href="{{ $indicator['drilldown'] }}" class="risk-drilldown">
                View Details <i class="ri-arrow-right-line"></i>
            </a>
        @endif
    </div>
</div>

<style>
.risk-indicator {
    border: 2px solid;
    border-radius: 8px;
    padding: 1rem;
    transition: all 0.3s;
}

.risk-indicator.risk-green {
    border-color: #10b981;
    background: #f0fdf4;
}

.risk-indicator.risk-amber {
    border-color: #f59e0b;
    background: #fffbeb;
}

.risk-indicator.risk-red {
    border-color: #ef4444;
    background: #fef2f2;
}

.badge-green { background: #10b981; color: white; }
.badge-amber { background: #f59e0b; color: white; }
.badge-red { background: #ef4444; color: white; }
</style>
```

### Chart Container Partial (partials/chart-container.blade.php)

```blade
<div class="col-12 col-lg-{{ $size ?? 6 }}">
    <div class="card">
        <div class="card-header">
            <h5>{{ $title }}</h5>
            @if($drilldown ?? false)
                <a href="{{ $drilldown }}" class="btn btn-sm btn-link">View Details</a>
            @endif
        </div>
        <div class="card-body">
            <canvas id="{{ $chartId }}" height="{{ $height ?? 300 }}"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('{{ $chartId }}').getContext('2d');
    
    @if($lazy ?? false)
        // Lazy load chart data
        fetch('{{ route("staff.director.ajax.chart-data") }}?chart_type={{ $chartType }}')
            .then(response => response.json())
            .then(data => {
                renderChart(ctx, data);
            });
    @else
        // Render immediately with provided data
        renderChart(ctx, @json($chartData));
    @endif
});

function renderChart(ctx, data) {
    new Chart(ctx, {
        type: '{{ $chartType }}',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}
</script>
@endpush
```

### Accreditation Performance Report (reports/accreditation.blade.php)

```blade
@extends('layouts.portal')
@section('title', 'Accreditation Performance - Director Dashboard')

@section('content')
<div class="director-report">
    <div class="report-header">
        <h4>Accreditation Performance</h4>
        <div class="header-actions">
            <a href="{{ route('staff.director.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                <i class="ri-arrow-left-line"></i> Back to Overview
            </a>
            <button onclick="exportReport('pdf')" class="btn btn-sm btn-primary">
                <i class="ri-file-pdf-line"></i> Export PDF
            </button>
        </div>
    </div>

    {{-- Monthly Trends Chart (Requirement 2.1) --}}
    @include('staff.director.partials.chart-container', [
        'title' => 'Monthly Application Trends',
        'chartId' => 'monthlyTrendsChart',
        'chartType' => 'line',
        'chartData' => $monthlyTrends,
        'size' => 12,
        'height' => 400
    ])

    {{-- Processing Time by Stage (Requirement 2.2) --}}
    <div class="row g-4 mt-4">
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Processing Time by Stage',
                'chartId' => 'processingTimeChart',
                'chartType' => 'bar',
                'chartData' => $processingTimeByStage
            ])
        </div>

        {{-- Approval Ratio by Category (Requirement 2.3) --}}
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Approval Ratio by Category',
                'chartId' => 'approvalRatioCategoryChart',
                'chartType' => 'doughnut',
                'chartData' => $approvalRatioByCategory
            ])
        </div>
    </div>

    {{-- Approval Ratio by Residency (Requirement 2.4) --}}
    <div class="row g-4 mt-4">
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Approval Ratio by Residency',
                'chartId' => 'approvalRatioResidencyChart',
                'chartType' => 'bar',
                'chartData' => $approvalRatioByResidency
            ])
        </div>

        {{-- Category Distribution (Requirement 2.5) --}}
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Category Distribution',
                'chartId' => 'categoryDistributionChart',
                'chartType' => 'pie',
                'chartData' => $categoryDistribution,
                'drilldown' => route('staff.director.drilldown.applications', ['view' => 'category'])
            ])
        </div>
    </div>
</div>

@push('scripts')
<script>
function exportReport(format) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("staff.director.generate.monthly-accreditation") }}';
    
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}';
    
    const formatInput = document.createElement('input');
    formatInput.type = 'hidden';
    formatInput.name = 'format';
    formatInput.value = format;
    
    form.appendChild(csrfInput);
    form.appendChild(formatInput);
    document.body.appendChild(form);
    form.submit();
}
</script>
@endpush
@endsection
```

### Financial Performance Report (reports/financial.blade.php)

```blade
@extends('layouts.portal')
@section('title', 'Financial Performance - Director Dashboard')

@section('content')
<div class="director-report">
    <div class="report-header">
        <h4>Financial Performance</h4>
        <div class="header-actions">
            <a href="{{ route('staff.director.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                <i class="ri-arrow-left-line"></i> Back
            </a>
            <button onclick="exportReport('excel')" class="btn btn-sm btn-success">
                <i class="ri-file-excel-line"></i> Export Excel
            </button>
        </div>
    </div>

    {{-- Monthly Revenue Trend (Requirement 3.1) --}}
    @include('staff.director.partials.chart-container', [
        'title' => 'Monthly Revenue Trend (YoY Comparison)',
        'chartId' => 'monthlyRevenueChart',
        'chartType' => 'line',
        'chartData' => $monthlyRevenueTrend,
        'size' => 12,
        'height' => 400
    ])

    {{-- Revenue Breakdowns (Requirements 3.2-3.5) --}}
    <div class="row g-4 mt-4">
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Revenue by Service Type',
                'chartId' => 'revenueServiceChart',
                'chartType' => 'bar',
                'chartData' => $revenueByServiceType,
                'drilldown' => route('staff.director.drilldown.payments', ['group' => 'service'])
            ])
        </div>
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Revenue by Applicant Type',
                'chartId' => 'revenueApplicantChart',
                'chartType' => 'doughnut',
                'chartData' => $revenueByApplicantType
            ])
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Revenue by Residency',
                'chartId' => 'revenueResidencyChart',
                'chartType' => 'bar',
                'chartData' => $revenueByResidency
            ])
        </div>
        <div class="col-md-6">
            @include('staff.director.partials.chart-container', [
                'title' => 'Revenue by Payment Method',
                'chartId' => 'revenuePaymentMethodChart',
                'chartType' => 'pie',
                'chartData' => $revenueByPaymentMethod
            ])
        </div>
    </div>

    {{-- Waiver Statistics (Requirement 3.6) --}}
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Waiver Analysis</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stat-box">
                                <div class="stat-label">Total Waivers</div>
                                <div class="stat-value">{{ $waiverStatistics['count'] }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-box">
                                <div class="stat-label">Total Value</div>
                                <div class="stat-value">${{ number_format($waiverStatistics['total_value'], 2) }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <canvas id="waiverByApproverChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Outstanding Payments Aging (Requirement 3.7) --}}
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Outstanding Payments Aging Analysis</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="aging-bucket aging-green">
                                <div class="aging-label">0-30 Days</div>
                                <div class="aging-value">{{ $outstandingPaymentsAging['0_30'] }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="aging-bucket aging-amber">
                                <div class="aging-label">30-60 Days</div>
                                <div class="aging-value">{{ $outstandingPaymentsAging['30_60'] }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="aging-bucket aging-red">
                                <div class="aging-label">60+ Days</div>
                                <div class="aging-value">{{ $outstandingPaymentsAging['60_plus'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

### Drill-Down Modal (partials/drill-down-modal.blade.php)

```blade
<div class="modal fade" id="drillDownModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detailed Records</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="drillDownContent">
                    <div class="text-center py-5">
                        <div class="spinner-border" role="status"></div>
                        <p class="mt-2">Loading details...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="exportDrillDown()">
                    <i class="ri-download-line"></i> Export
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function showDrillDown(url) {
    const modal = new bootstrap.Modal(document.getElementById('drillDownModal'));
    modal.show();
    
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('drillDownContent').innerHTML = html;
        })
        .catch(error => {
            document.getElementById('drillDownContent').innerHTML = 
                '<div class="alert alert-danger">Failed to load details</div>';
        });
}
</script>
```

### CSS Styling

```css
/* resources/css/director-dashboard.css */

.director-dashboard {
    padding: 1.5rem;
}

.kpi-card {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.3s;
    display: flex;
    gap: 1rem;
    height: 100%;
}

.kpi-card.clickable {
    cursor: pointer;
}

.kpi-card.clickable:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transform: translateY(-2px);
}

.kpi-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.kpi-content {
    flex: 1;
}

.kpi-title {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.kpi-value {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1e293b;
    line-height: 1;
}

.kpi-subtitle {
    font-size: 0.75rem;
    color: #9ca3af;
    margin-top: 0.25rem;
}

.kpi-trend {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.report-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    text-decoration: none;
    color: inherit;
    transition: all 0.3s;
}

.report-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transform: translateY(-2px);
    border-left: 4px solid #facc15;
}

.report-card i {
    font-size: 2rem;
    color: #3b82f6;
}

.report-card h6 {
    margin: 0;
    font-weight: 600;
}

.report-card p {
    margin: 0;
    font-size: 0.875rem;
    color: #6b7280;
}

.aging-bucket {
    padding: 1.5rem;
    border-radius: 8px;
    border: 2px solid;
}

.aging-bucket.aging-green {
    border-color: #10b981;
    background: #f0fdf4;
}

.aging-bucket.aging-amber {
    border-color: #f59e0b;
    background: #fffbeb;
}

.aging-bucket.aging-red {
    border-color: #ef4444;
    background: #fef2f2;
}

.aging-label {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.aging-value {
    font-size: 2rem;
    font-weight: 700;
}

.stat-box {
    text-align: center;
    padding: 1rem;
}

.stat-label {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
}

/* View-Only Indicators */
.view-only-badge {
    position: fixed;
    top: 80px;
    right: 20px;
    z-index: 1000;
    background: #1e293b;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
}

/* Disable all form elements in director views */
.director-dashboard input,
.director-dashboard button[type="submit"],
.director-dashboard select,
.director-dashboard textarea {
    pointer-events: none;
    opacity: 0.6;
}

/* But allow navigation buttons */
.director-dashboard .btn-link,
.director-dashboard .btn-outline-secondary,
.director-dashboard .btn-primary[onclick] {
    pointer-events: auto;
    opacity: 1;
}
```


## Chart and Visualization Implementation

### Chart.js Integration

#### Chart Types and Use Cases

1. **Line Charts**: Monthly trends, revenue over time, processing time trends
2. **Bar Charts**: Processing time by stage, approval ratios, regional comparisons
3. **Doughnut/Pie Charts**: Category distribution, revenue breakdown, payment methods
4. **Stacked Bar Charts**: Year-over-year comparisons, multi-category breakdowns

#### Chart Configuration Pattern

```javascript
// resources/js/director-charts.js

class DirectorCharts {
    constructor() {
        this.defaultColors = {
            primary: '#3b82f6',
            success: '#10b981',
            warning: '#f59e0b',
            danger: '#ef4444',
            info: '#06b6d4',
            secondary: '#6b7280'
        };
    }

    createMonthlyTrendsChart(canvasId, data) {
        const ctx = document.getElementById(canvasId).getContext('2d');
        
        return new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.months,
                datasets: [
                    {
                        label: 'Submitted',
                        data: data.submitted,
                        borderColor: this.defaultColors.primary,
                        backgroundColor: this.defaultColors.primary + '20',
                        tension: 0.4
                    },
                    {
                        label: 'Approved',
                        data: data.approved,
                        borderColor: this.defaultColors.success,
                        backgroundColor: this.defaultColors.success + '20',
                        tension: 0.4
                    },
                    {
                        label: 'Rejected',
                        data: data.rejected,
                        borderColor: this.defaultColors.danger,
                        backgroundColor: this.defaultColors.danger + '20',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            footer: function(tooltipItems) {
                                return 'Click to drill down';
                            }
                        }
                    }
                },
                onClick: (event, elements) => {
                    if (elements.length > 0) {
                        const index = elements[0].index;
                        const month = data.months[index];
                        this.drillDownToMonth(month);
                    }
                }
            }
        });
    }

    createRevenueBreakdownChart(canvasId, data) {
        const ctx = document.getElementById(canvasId).getContext('2d');
        
        return new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.values,
                    backgroundColor: [
                        this.defaultColors.primary,
                        this.defaultColors.success,
                        this.defaultColors.warning,
                        this.defaultColors.info,
                        this.defaultColors.secondary
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: $${value.toLocaleString()} (${percentage}%)`;
                            }
                        }
                    }
                },
                onClick: (event, elements) => {
                    if (elements.length > 0) {
                        const index = elements[0].index;
                        const category = data.labels[index];
                        this.drillDownToCategory(category);
                    }
                }
            }
        });
    }

    drillDownToMonth(month) {
        const url = `/staff/director/drilldown/applications?month=${month}`;
        showDrillDown(url);
    }

    drillDownToCategory(category) {
        const url = `/staff/director/drilldown/applications?category=${category}`;
        showDrillDown(url);
    }
}

// Initialize charts when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.directorCharts = new DirectorCharts();
});
```


### Chart Data Transformation

#### Service Layer Chart Data Methods

```php
// In AccreditationAnalyticsService

public function getMonthlyTrendsChartData(): array
{
    $trends = $this->getMonthlyTrends(12);
    
    return [
        'months' => $trends->pluck('month')->map(function($month) {
            return Carbon::createFromFormat('Y-m', $month)->format('M Y');
        })->toArray(),
        'submitted' => $trends->pluck('total_submitted')->toArray(),
        'approved' => $trends->pluck('total_approved')->toArray(),
        'rejected' => $trends->pluck('total_rejected')->toArray(),
    ];
}

public function getCategoryDistributionChartData(): array
{
    $distribution = $this->getCategoryDistribution();
    
    return [
        'labels' => $distribution->pluck('category_name')->toArray(),
        'values' => $distribution->pluck('count')->toArray(),
        'percentages' => $distribution->pluck('percentage')->toArray(),
    ];
}
```

```php
// In FinancialAnalyticsService

public function getRevenueBreakdownChartData(): array
{
    $breakdown = $this->getRevenueByServiceType();
    
    return [
        'labels' => $breakdown->pluck('service_type')->map(function($type) {
            return ucwords(str_replace('_', ' ', $type));
        })->toArray(),
        'values' => $breakdown->pluck('total')->toArray(),
    ];
}
```

## Drill-Down Navigation Flow

### Navigation Architecture

```
Dashboard KPI Card
    ↓ (click)
Drill-Down Modal/Page
    ↓ (displays)
Filtered Data Table
    ↓ (click row)
Individual Record Detail
```

### Drill-Down Implementation Pattern

#### 1. Clickable Metric with Data Attributes

```blade
<div class="kpi-card clickable" 
     data-drilldown-url="{{ route('staff.director.drilldown.applications', ['status' => 'issued']) }}"
     onclick="showDrillDown(this.dataset.drilldownUrl)">
    <div class="kpi-value">{{ $kpis['total_active_accreditations'] }}</div>
    <div class="kpi-title">Active Accreditations</div>
</div>
```

#### 2. Drill-Down Controller Method

```php
public function drillDownApplications(Request $request)
{
    $filters = $request->only(['status', 'category', 'residency', 'month', 'date_from', 'date_to']);
    
    $query = Application::query();
    
    if ($filters['status'] ?? false) {
        $query->where('status', $filters['status']);
    }
    
    if ($filters['category'] ?? false) {
        $query->where('accreditation_category_code', $filters['category']);
    }
    
    if ($filters['residency'] ?? false) {
        $query->where('residency_type', $filters['residency']);
    }
    
    if ($filters['month'] ?? false) {
        $month = Carbon::createFromFormat('Y-m', $filters['month']);
        $query->whereYear('created_at', $month->year)
              ->whereMonth('created_at', $month->month);
    }
    
    $applications = $query->with(['user:id,name,email', 'assignedOfficer:id,name'])
                          ->orderBy('created_at', 'desc')
                          ->paginate(50);
    
    if ($request->ajax()) {
        return view('staff.director.drilldown.applications-table', compact('applications', 'filters'));
    }
    
    return view('staff.director.drilldown.applications', compact('applications', 'filters'));
}
```

#### 3. Drill-Down View

```blade
{{-- staff/director/drilldown/applications.blade.php --}}
@extends('layouts.portal')

@section('content')
<div class="drilldown-page">
    <div class="drilldown-header">
        <h4>Application Details</h4>
        <div class="drilldown-filters">
            <select id="statusFilter" class="form-select form-select-sm">
                <option value="">All Statuses</option>
                <option value="issued">Issued</option>
                <option value="pending">Pending</option>
            </select>
            <button onclick="exportDrillDown()" class="btn btn-sm btn-primary">
                <i class="ri-download-line"></i> Export
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Applicant</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Processing Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                <tr onclick="viewApplicationDetail({{ $app->id }})">
                    <td>{{ $app->application_number }}</td>
                    <td>{{ $app->user->name }}</td>
                    <td>{{ $app->accreditation_category_code }}</td>
                    <td><span class="badge bg-{{ $app->status_color }}">{{ $app->status }}</span></td>
                    <td>{{ $app->submitted_at?->format('d M Y') }}</td>
                    <td>{{ $app->processing_time_days }} days</td>
                    <td>
                        <button class="btn btn-sm btn-link" onclick="event.stopPropagation(); viewApplicationDetail({{ $app->id }})">
                            View
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $applications->links() }}
</div>
@endsection
```


## Report Generation Architecture

### PDF Report Generation

#### Using DomPDF

```php
// In ReportGenerationService

use Barryvdh\DomPDF\Facade\Pdf;

public function generateMonthlyAccreditationReport(string $format, array $params)
{
    $month = Carbon::createFromFormat('Y-m', $params['month'] ?? now()->format('Y-m'));
    
    $data = [
        'month' => $month->format('F Y'),
        'generated_at' => now()->format('d M Y H:i'),
        'applications' => $this->accreditationService->getMonthlyApplications($month),
        'trends' => $this->accreditationService->getMonthlyTrends(1),
        'approval_rate' => $this->metricsService->getApprovalRate(),
        'processing_time' => $this->metricsService->getAverageProcessingTime(),
    ];
    
    if ($format === 'pdf') {
        $pdf = Pdf::loadView('staff.director.pdf.monthly-accreditation', $data);
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('monthly-accreditation-report-' . $month->format('Y-m') . '.pdf');
    }
    
    if ($format === 'excel') {
        return Excel::download(
            new MonthlyAccreditationExport($data),
            'monthly-accreditation-report-' . $month->format('Y-m') . '.xlsx'
        );
    }
}
```

#### PDF Template

```blade
{{-- staff/director/pdf/monthly-accreditation.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Accreditation Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #facc15;
            padding-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #1e293b;
        }
        .header .subtitle {
            color: #6b7280;
            margin-top: 5px;
        }
        .meta-info {
            background: #f3f4f6;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .kpi-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .kpi-item {
            display: table-cell;
            width: 25%;
            text-align: center;
            padding: 15px;
            border: 1px solid #e5e7eb;
        }
        .kpi-value {
            font-size: 24px;
            font-weight: bold;
            color: #1e293b;
        }
        .kpi-label {
            font-size: 10px;
            color: #6b7280;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background: #1e293b;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }
        td {
            padding: 6px 8px;
            border-bottom: 1px solid #e5e7eb;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zimbabwe Media Commission</h1>
        <div class="subtitle">Monthly Accreditation Report - {{ $month }}</div>
    </div>
    
    <div class="meta-info">
        <strong>Report Generated:</strong> {{ $generated_at }}<br>
        <strong>Data Period:</strong> {{ $month }}<br>
        <strong>Report Type:</strong> Board-Ready Executive Summary
    </div>
    
    <h2>Key Performance Indicators</h2>
    <div class="kpi-grid">
        <div class="kpi-item">
            <div class="kpi-value">{{ $applications->count() }}</div>
            <div class="kpi-label">Applications Submitted</div>
        </div>
        <div class="kpi-item">
            <div class="kpi-value">{{ $approval_rate }}%</div>
            <div class="kpi-label">Approval Rate</div>
        </div>
        <div class="kpi-item">
            <div class="kpi-value">{{ $processing_time }}</div>
            <div class="kpi-label">Avg Processing Time</div>
        </div>
        <div class="kpi-item">
            <div class="kpi-value">{{ $applications->where('status', 'issued')->count() }}</div>
            <div class="kpi-label">Issued</div>
        </div>
    </div>
    
    <h2>Application Details</h2>
    <table>
        <thead>
            <tr>
                <th>Application ID</th>
                <th>Applicant</th>
                <th>Category</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Processing Days</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
            <tr>
                <td>{{ $app->application_number }}</td>
                <td>{{ $app->user->name }}</td>
                <td>{{ $app->accreditation_category_code }}</td>
                <td>{{ ucwords(str_replace('_', ' ', $app->status)) }}</td>
                <td>{{ $app->submitted_at?->format('d M Y') }}</td>
                <td>{{ $app->processing_time_days }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>This is a system-generated report. For inquiries, contact the Registrar's Office.</p>
        <p>Zimbabwe Media Commission | Accreditation Management System</p>
    </div>
</body>
</html>
```

### Excel Report Generation

#### Using Laravel Excel

```php
// app/Exports/Director/MonthlyAccreditationExport.php

namespace App\Exports\Director;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MonthlyAccreditationExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    protected $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    public function collection()
    {
        return $this->data['applications']->map(function($app) {
            return [
                'Application ID' => $app->application_number,
                'Applicant Name' => $app->user->name,
                'Email' => $app->user->email,
                'Category' => $app->accreditation_category_code,
                'Residency' => $app->residency_type,
                'Status' => ucwords(str_replace('_', ' ', $app->status)),
                'Submitted Date' => $app->submitted_at?->format('Y-m-d'),
                'Issued Date' => $app->issued_at?->format('Y-m-d'),
                'Processing Days' => $app->processing_time_days,
                'Assigned Officer' => $app->assignedOfficer?->name,
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'Application ID',
            'Applicant Name',
            'Email',
            'Category',
            'Residency',
            'Status',
            'Submitted Date',
            'Issued Date',
            'Processing Days',
            'Assigned Officer',
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FACC15']]],
        ];
    }
    
    public function title(): string
    {
        return 'Accreditation Report';
    }
}
```


## Caching and Performance Optimization

### Caching Strategy

#### Cache Layer Architecture

```
Request → Check Cache → Cache Hit? → Return Cached Data
                ↓ (Cache Miss)
         Query Database → Store in Cache → Return Data
```

#### Cache Implementation

```php
// In DashboardMetricsService

use Illuminate\Support\Facades\Cache;

public function getExecutiveKPIs(): array
{
    $cacheKey = 'director.kpis.executive_overview';
    $cacheTTL = config('director-dashboard.cache_ttl.kpis', 3600);
    
    return Cache::remember($cacheKey, $cacheTTL, function() {
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

public function refreshKPIs(): array
{
    Cache::forget('director.kpis.executive_overview');
    return $this->getExecutiveKPIs();
}
```

#### Cache Invalidation Events

```php
// In Application model

protected static function booted()
{
    static::updated(function ($application) {
        if ($application->isDirty('status')) {
            Cache::tags(['director-dashboard'])->flush();
        }
    });
    
    static::created(function ($application) {
        Cache::tags(['director-dashboard'])->flush();
    });
}

// In Payment model

protected static function booted()
{
    static::updated(function ($payment) {
        if ($payment->isDirty('status') && $payment->status === 'paid') {
            Cache::forget('director.kpis.executive_overview');
            Cache::forget('director.charts.revenue_breakdown');
        }
    });
}
```

### Query Optimization

#### Eager Loading Strategy

```php
// Avoid N+1 queries by eager loading relationships

$applications = Application::with([
    'user:id,name,email',
    'assignedOfficer:id,name',
    'assignedRegistrar:id,name',
    'payments' => function($q) {
        $q->where('status', 'paid')->select('id', 'application_id', 'amount', 'confirmed_at');
    }
])
->where('status', Application::ISSUED)
->get();
```

#### Chunking for Large Datasets

```php
// Process large datasets in chunks to avoid memory issues

public function getAverageProcessingTime(): float
{
    $totalHours = 0;
    $count = 0;
    
    Application::where('status', Application::ISSUED)
        ->whereNotNull('submitted_at')
        ->whereNotNull('issued_at')
        ->select('submitted_at', 'issued_at')
        ->chunk(1000, function($applications) use (&$totalHours, &$count) {
            foreach ($applications as $app) {
                $totalHours += Carbon::parse($app->submitted_at)
                    ->diffInHours(Carbon::parse($app->issued_at));
                $count++;
            }
        });
    
    return $count > 0 ? round($totalHours / $count / 24, 1) : 0;
}
```

#### Database Indexes

```php
// Migration for performance indexes

public function up()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->index('status');
        $table->index('application_type');
        $table->index('accreditation_category_code');
        $table->index('residency_type');
        $table->index(['status', 'issued_at']);
        $table->index(['status', 'submitted_at']);
        $table->index('media_house_id');
        $table->index('created_at');
    });
    
    Schema::table('payments', function (Blueprint $table) {
        $table->index('status');
        $table->index('service_type');
        $table->index('applicant_category');
        $table->index('payment_method');
        $table->index(['status', 'confirmed_at']);
        $table->index('created_at');
    });
    
    Schema::table('activity_logs', function (Blueprint $table) {
        $table->index('action');
        $table->index('user_id');
        $table->index('created_at');
        $table->index(['action', 'created_at']);
    });
    
    Schema::table('print_logs', function (Blueprint $table) {
        $table->index('application_id');
        $table->index('print_type');
        $table->index('printed_at');
    });
}
```

### Lazy Loading for Charts

```javascript
// Load chart data on demand when section becomes visible

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const chartContainer = entry.target;
            const chartType = chartContainer.dataset.chartType;
            
            fetch(`/staff/director/ajax/chart-data?chart_type=${chartType}`)
                .then(response => response.json())
                .then(data => {
                    renderChart(chartContainer.querySelector('canvas'), data);
                    observer.unobserve(chartContainer);
                });
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.chart-container[data-lazy="true"]').forEach(container => {
    observer.observe(container);
});
```

### Performance Monitoring

```php
// Add performance logging for slow queries

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

DB::listen(function ($query) {
    if ($query->time > 1000) { // Log queries taking more than 1 second
        Log::warning('Slow query detected', [
            'sql' => $query->sql,
            'bindings' => $query->bindings,
            'time' => $query->time . 'ms'
        ]);
    }
});
```

## Risk Threshold Calculation Logic

### Risk Indicator Evaluation

```php
// In RiskIndicatorService

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

public function evaluateExcessiveWaivers(): array
{
    $monthStart = now()->startOfMonth();
    $waiverCount = Application::where('waiver_status', 'approved')
        ->where('updated_at', '>=', $monthStart)
        ->count();
    
    $thresholds = config('director-dashboard.risk_thresholds.excessive_waivers');
    $level = $this->determineRiskLevel($waiverCount, $thresholds);
    
    return [
        'title' => 'Excessive Waivers',
        'value' => $waiverCount,
        'level' => $level,
        'description' => "Waivers granted this month",
        'threshold' => $thresholds,
        'drilldown' => route('staff.director.drilldown.payments', ['type' => 'waiver'])
    ];
}

public function evaluateRejectionSpike(): array
{
    $monthStart = now()->startOfMonth();
    
    $totalDecided = Application::whereIn('status', [Application::ISSUED, Application::REGISTRAR_REJECTED])
        ->where('updated_at', '>=', $monthStart)
        ->count();
    
    $rejected = Application::where('status', Application::REGISTRAR_REJECTED)
        ->where('updated_at', '>=', $monthStart)
        ->count();
    
    $rejectionRate = $totalDecided > 0 ? round(($rejected / $totalDecided) * 100, 1) : 0;
    
    $thresholds = config('director-dashboard.risk_thresholds.rejection_spike');
    $level = $this->determineRiskLevel($rejectionRate, $thresholds);
    
    return [
        'title' => 'Rejection Rate',
        'value' => $rejectionRate . '%',
        'level' => $level,
        'description' => "Applications rejected this month",
        'threshold' => $thresholds,
        'drilldown' => route('staff.director.drilldown.applications', ['status' => 'rejected'])
    ];
}

public function evaluateProcessingTimeSLA(): array
{
    $avgProcessingTime = $this->metricsService->getAverageProcessingTime();
    
    $thresholds = config('director-dashboard.risk_thresholds.processing_time_sla');
    $level = $this->determineRiskLevel($avgProcessingTime, $thresholds);
    
    return [
        'title' => 'Processing Time SLA',
        'value' => $avgProcessingTime . ' days',
        'level' => $level,
        'description' => "Average processing time",
        'threshold' => $thresholds,
        'drilldown' => route('staff.director.reports.accreditation')
    ];
}

public function evaluateRevenueDrop(): array
{
    $currentMonth = now();
    $previousMonth = now()->subMonth();
    
    $currentRevenue = Payment::where('status', 'paid')
        ->whereYear('confirmed_at', $currentMonth->year)
        ->whereMonth('confirmed_at', $currentMonth->month)
        ->sum('amount');
    
    $previousRevenue = Payment::where('status', 'paid')
        ->whereYear('confirmed_at', $previousMonth->year)
        ->whereMonth('confirmed_at', $previousMonth->month)
        ->sum('amount');
    
    $percentageChange = $previousRevenue > 0 
        ? round((($currentRevenue - $previousRevenue) / $previousRevenue) * 100, 1)
        : 0;
    
    $thresholds = config('director-dashboard.risk_thresholds.revenue_drop');
    $level = $this->determineRiskLevel($percentageChange, $thresholds);
    
    return [
        'title' => 'Revenue Change',
        'value' => ($percentageChange >= 0 ? '+' : '') . $percentageChange . '%',
        'level' => $level,
        'description' => "Month-over-month change",
        'threshold' => $thresholds,
        'drilldown' => route('staff.director.reports.financial')
    ];
}

protected function determineRiskLevel($value, array $thresholds): string
{
    // Green threshold
    if (isset($thresholds['green']['max']) && $value <= $thresholds['green']['max']) {
        return 'green';
    }
    if (isset($thresholds['green']['min']) && $value >= $thresholds['green']['min']) {
        return 'green';
    }
    
    // Red threshold
    if (isset($thresholds['red']['min']) && $value >= $thresholds['red']['min']) {
        return 'red';
    }
    if (isset($thresholds['red']['max']) && $value <= $thresholds['red']['max']) {
        return 'red';
    }
    
    // Amber (default if not green or red)
    return 'amber';
}

public function getRiskLevelColor(string $level): string
{
    return match($level) {
        'green' => 'success',
        'amber' => 'warning',
        'red' => 'danger',
        default => 'secondary'
    };
}
```


## Data Refresh Mechanisms

### Real-Time Data Updates

#### AJAX Polling for Critical KPIs

```javascript
// resources/js/director-realtime.js

class DirectorRealtime {
    constructor() {
        this.pollInterval = 60000; // 1 minute
        this.pollTimer = null;
    }
    
    startPolling() {
        this.pollTimer = setInterval(() => {
            this.refreshKPIs();
        }, this.pollInterval);
    }
    
    stopPolling() {
        if (this.pollTimer) {
            clearInterval(this.pollTimer);
            this.pollTimer = null;
        }
    }
    
    async refreshKPIs() {
        try {
            const response = await fetch('/staff/director/ajax/refresh-kpis');
            const data = await response.json();
            
            this.updateKPIValues(data);
            this.updateLastRefreshTime();
        } catch (error) {
            console.error('Failed to refresh KPIs:', error);
        }
    }
    
    updateKPIValues(data) {
        // Update each KPI card with new values
        Object.keys(data).forEach(key => {
            const element = document.querySelector(`[data-kpi="${key}"]`);
            if (element) {
                const valueElement = element.querySelector('.kpi-value');
                if (valueElement) {
                    this.animateValueChange(valueElement, data[key]);
                }
            }
        });
    }
    
    animateValueChange(element, newValue) {
        element.classList.add('updating');
        setTimeout(() => {
            element.textContent = this.formatValue(newValue);
            element.classList.remove('updating');
            element.classList.add('updated');
            setTimeout(() => {
                element.classList.remove('updated');
            }, 1000);
        }, 300);
    }
    
    formatValue(value) {
        if (typeof value === 'number') {
            return value.toLocaleString();
        }
        return value;
    }
    
    updateLastRefreshTime() {
        const refreshElement = document.getElementById('lastRefreshTime');
        if (refreshElement) {
            refreshElement.textContent = 'Last updated: ' + new Date().toLocaleTimeString();
        }
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    window.directorRealtime = new DirectorRealtime();
    window.directorRealtime.startPolling();
});

// Stop polling when page is hidden
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        window.directorRealtime.stopPolling();
    } else {
        window.directorRealtime.startPolling();
    }
});
```

#### CSS for Update Animations

```css
.kpi-value.updating {
    opacity: 0.5;
    transition: opacity 0.3s;
}

.kpi-value.updated {
    animation: pulse 0.5s;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
        color: #10b981;
    }
}
```

### Manual Refresh Controls

```blade
{{-- Add refresh button to dashboard header --}}
<div class="dashboard-header">
    <h4>Executive Overview</h4>
    <div class="header-actions">
        <span id="lastRefreshTime" class="text-muted small me-3">
            Last updated: {{ now()->format('H:i:s') }}
        </span>
        <button onclick="manualRefresh()" class="btn btn-sm btn-outline-primary" id="refreshBtn">
            <i class="ri-refresh-line"></i> Refresh
        </button>
    </div>
</div>

<script>
async function manualRefresh() {
    const btn = document.getElementById('refreshBtn');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Refreshing...';
    
    await window.directorRealtime.refreshKPIs();
    
    btn.disabled = false;
    btn.innerHTML = '<i class="ri-refresh-line"></i> Refresh';
}
</script>
```

### Cache Warming Strategy

```php
// Console command to warm dashboard caches

namespace App\Console\Commands;

use App\Services\Director\DashboardMetricsService;
use App\Services\Director\AccreditationAnalyticsService;
use App\Services\Director\FinancialAnalyticsService;
use App\Services\Director\RiskIndicatorService;
use Illuminate\Console\Command;

class WarmDirectorDashboardCache extends Command
{
    protected $signature = 'director:warm-cache';
    protected $description = 'Warm the cache for Director dashboard';
    
    public function handle(
        DashboardMetricsService $metricsService,
        AccreditationAnalyticsService $accreditationService,
        FinancialAnalyticsService $financialService,
        RiskIndicatorService $riskService
    ) {
        $this->info('Warming Director dashboard cache...');
        
        $this->info('Caching executive KPIs...');
        $metricsService->getExecutiveKPIs();
        
        $this->info('Caching accreditation trends...');
        $accreditationService->getMonthlyTrendsChartData();
        
        $this->info('Caching financial data...');
        $financialService->getMonthlyRevenueTrend();
        
        $this->info('Caching risk indicators...');
        $riskService->getAllRiskIndicators();
        
        $this->info('Cache warming complete!');
    }
}
```

```php
// Schedule cache warming in Kernel.php

protected function schedule(Schedule $schedule)
{
    // Warm cache every hour
    $schedule->command('director:warm-cache')->hourly();
    
    // Clear old cache at midnight
    $schedule->call(function () {
        Cache::tags(['director-dashboard'])->flush();
    })->daily();
}
```

## Error Handling

### Service Layer Error Handling

```php
// In DashboardMetricsService

use Illuminate\Support\Facades\Log;

public function getExecutiveKPIs(): array
{
    try {
        return Cache::remember('director.kpis.executive_overview', 3600, function() {
            return [
                'total_active_accreditations' => $this->getTotalActiveAccreditations(),
                'issued_this_month' => $this->getIssuedThisMonth(),
                // ... other KPIs
            ];
        });
    } catch (\Exception $e) {
        Log::error('Failed to fetch executive KPIs', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        // Return default values to prevent dashboard from breaking
        return [
            'total_active_accreditations' => 0,
            'issued_this_month' => 0,
            'issued_this_year' => 0,
            'revenue_mtd' => 0,
            'revenue_ytd' => 0,
            'outstanding_revenue' => 0,
            'applications_in_pipeline' => 0,
            'avg_processing_time' => 0,
            'approval_rate' => 0,
            'compliance_flags_active' => 0,
            'total_media_houses' => 0,
        ];
    }
}
```

### Controller Error Handling

```php
// In DirectorController

public function dashboard()
{
    try {
        $kpis = $this->metricsService->getExecutiveKPIs();
        $riskIndicators = $this->riskService->getAllRiskIndicators();
        $highRiskActivity = $this->complianceService->getHighRiskActions(5);
        
        return view('staff.director.dashboard', compact('kpis', 'riskIndicators', 'highRiskActivity'));
    } catch (\Exception $e) {
        Log::error('Director dashboard error', [
            'error' => $e->getMessage(),
            'user' => auth()->id()
        ]);
        
        return view('staff.director.dashboard-error', [
            'error' => 'Unable to load dashboard data. Please try again later.'
        ]);
    }
}
```

### Frontend Error Handling

```javascript
// Handle AJAX errors gracefully

async function refreshKPIs() {
    try {
        const response = await fetch('/staff/director/ajax/refresh-kpis');
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        updateKPIValues(data);
    } catch (error) {
        console.error('Failed to refresh KPIs:', error);
        showErrorNotification('Unable to refresh data. Please reload the page.');
    }
}

function showErrorNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3';
    notification.style.zIndex = '9999';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 5000);
}
```

## Testing Strategy

### Unit Testing

#### Service Layer Tests

```php
// tests/Unit/Services/DashboardMetricsServiceTest.php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\Director\DashboardMetricsService;
use App\Models\Application;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardMetricsServiceTest extends TestCase
{
    use RefreshDatabase;
    
    protected DashboardMetricsService $service;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = app(DashboardMetricsService::class);
    }
    
    /** @test */
    public function it_calculates_total_active_accreditations()
    {
        Application::factory()->count(5)->create(['status' => Application::ISSUED]);
        Application::factory()->count(3)->create(['status' => Application::DRAFT]);
        
        $result = $this->service->getTotalActiveAccreditations();
        
        $this->assertEquals(5, $result);
    }
    
    /** @test */
    public function it_calculates_issued_this_month()
    {
        Application::factory()->create([
            'status' => Application::ISSUED,
            'issued_at' => now()
        ]);
        
        Application::factory()->create([
            'status' => Application::ISSUED,
            'issued_at' => now()->subMonths(2)
        ]);
        
        $result = $this->service->getIssuedThisMonth();
        
        $this->assertEquals(1, $result);
    }
    
    /** @test */
    public function it_calculates_revenue_mtd()
    {
        Payment::factory()->create([
            'status' => 'paid',
            'amount' => 100.00,
            'confirmed_at' => now()
        ]);
        
        Payment::factory()->create([
            'status' => 'paid',
            'amount' => 50.00,
            'confirmed_at' => now()->subMonths(2)
        ]);
        
        $result = $this->service->getRevenueMTD();
        
        $this->assertEquals(100.00, $result);
    }
}
```


#### Repository Tests

```php
// tests/Unit/Repositories/ApplicationRepositoryTest.php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Repositories\Director\ApplicationRepository;
use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class ApplicationRepositoryTest extends TestCase
{
    use RefreshDatabase;
    
    protected ApplicationRepository $repository;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = app(ApplicationRepository::class);
    }
    
    /** @test */
    public function it_gets_applications_by_status()
    {
        Application::factory()->count(3)->create(['status' => Application::ISSUED]);
        Application::factory()->count(2)->create(['status' => Application::DRAFT]);
        
        $result = $this->repository->getByStatus(Application::ISSUED);
        
        $this->assertCount(3, $result);
    }
    
    /** @test */
    public function it_gets_monthly_application_counts()
    {
        Application::factory()->create(['created_at' => now()]);
        Application::factory()->create(['created_at' => now()->subMonth()]);
        
        $result = $this->repository->getMonthlyApplicationCounts(2);
        
        $this->assertCount(2, $result);
    }
}
```

### Integration Testing

```php
// tests/Feature/DirectorDashboardTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class DirectorDashboardTest extends TestCase
{
    use RefreshDatabase;
    
    protected User $director;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        $directorRole = Role::create(['name' => 'director']);
        $this->director = User::factory()->create();
        $this->director->assignRole($directorRole);
    }
    
    /** @test */
    public function director_can_access_dashboard()
    {
        $response = $this->actingAs($this->director)
            ->get(route('staff.director.dashboard'));
        
        $response->assertStatus(200);
        $response->assertViewIs('staff.director.dashboard');
    }
    
    /** @test */
    public function dashboard_displays_executive_kpis()
    {
        Application::factory()->count(5)->create(['status' => Application::ISSUED]);
        
        $response = $this->actingAs($this->director)
            ->get(route('staff.director.dashboard'));
        
        $response->assertStatus(200);
        $response->assertViewHas('kpis');
        $this->assertEquals(5, $response->viewData('kpis')['total_active_accreditations']);
    }
    
    /** @test */
    public function director_cannot_edit_applications()
    {
        $application = Application::factory()->create();
        
        $response = $this->actingAs($this->director)
            ->put(route('staff.officer.applications.update', $application), [
                'status' => Application::OFFICER_APPROVED
            ]);
        
        $response->assertStatus(403);
    }
    
    /** @test */
    public function director_can_generate_pdf_report()
    {
        $response = $this->actingAs($this->director)
            ->post(route('staff.director.generate.monthly-accreditation'), [
                'format' => 'pdf',
                'month' => now()->format('Y-m')
            ]);
        
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }
    
    /** @test */
    public function director_can_drill_down_to_applications()
    {
        Application::factory()->count(10)->create(['status' => Application::ISSUED]);
        
        $response = $this->actingAs($this->director)
            ->get(route('staff.director.drilldown.applications', ['status' => 'issued']));
        
        $response->assertStatus(200);
        $response->assertViewHas('applications');
    }
}
```

## Correctness Properties

*A property is a characteristic or behavior that should hold true across all valid executions of a system—essentially, a formal statement about what the system should do. Properties serve as the bridge between human-readable specifications and machine-verifiable correctness guarantees.*

### Property 1: Drill-Down Navigation Consistency

*For any* clickable aggregate metric on the dashboard, clicking it should navigate to a drill-down view that displays the detailed records underlying that metric.

**Validates: Requirements 2.6, 3.8, 4.12, 5.7, 7.6, 8.5, 9.5**

### Property 2: Risk Indicator Color Coding

*For any* risk indicator value, the system should apply color coding (green, amber, or red) based on the configured thresholds, and the color should accurately reflect the risk level.

**Validates: Requirements 6.1, 6.2, 6.3, 6.4, 6.5, 6.6, 6.7**

### Property 3: Risk Indicator Highlighting

*For any* risk indicator with amber or red status, the indicator should be visually highlighted prominently on the dashboard.

**Validates: Requirement 6.8**

### Property 4: Report Export Format Availability

*For any* report type, both PDF and Excel export formats should be available when requested.

**Validates: Requirements 10.6, 10.7**

### Property 5: Report Metadata Inclusion

*For any* exported report (PDF or Excel), the report should include generation timestamp and data period covered.

**Validates: Requirement 10.8**

### Property 6: View-Only Application Restrictions

*For any* application record, Directors should be prevented from performing edit, approve, reject, assign, or reassign actions.

**Validates: Requirements 11.1, 11.2, 11.3**

### Property 7: View-Only Document Restrictions

*For any* document or certificate, Directors should be prevented from generating, printing, or reprinting actions.

**Validates: Requirements 11.4, 11.5**

### Property 8: View-Only Payment Restrictions

*For any* payment record or waiver request, Directors should be prevented from modifying payment data or granting waivers.

**Validates: Requirements 11.6, 11.7**

### Property 9: View and Report Access

*For any* data or report in the system, Directors should be able to view it and generate reports from it.

**Validates: Requirement 11.8**

### Property 10: Access Denied Messaging

*For any* operational action attempted by a Director, the system should display an access denied message.

**Validates: Requirement 11.9**

### Property 11: Menu Navigation Consistency

*For any* menu item in the sidebar, clicking it should navigate to the corresponding dashboard section.

**Validates: Requirement 12.2**

### Property 12: Risk Color Consistency

*For any* risk indicator across all dashboard sections, the color coding for risk levels should be consistent (green for normal, amber for elevated, red for critical).

**Validates: Requirement 12.4**

### Property 13: Drill-Down Loading Indicators

*For any* drill-down operation, a loading indicator should be displayed while data is being fetched.

**Validates: Requirement 12.5**

### Property 14: SQLite Query Compatibility

*For any* database query executed by the dashboard, it should use SQLite-compatible syntax without MySQL-specific functions.

**Validates: Requirements 13.1, 13.2, 13.3, 13.4**

### Property 15: KPI Data Freshness

*For any* KPI displayed on the dashboard, the data should be refreshed at least daily or in real-time when available.

**Validates: Requirements 1.10, 14.1, 14.2**

### Property 16: Dashboard Load Performance

*For any* dashboard section, it should load within the specified time limit (3 seconds for Executive Overview, 5 seconds for other sections).

**Validates: Requirements 14.3, 14.4**

### Property 17: Report Generation Progress

*For any* complex report generation, a progress indicator should be displayed during the generation process.

**Validates: Requirement 14.5**

### Property 18: Data Caching Implementation

*For any* frequently accessed aggregate data, it should be cached to improve performance.

**Validates: Requirement 14.6**

### Property 19: Audit Data Immutability

*For any* audit event displayed on the dashboard, the data should come from immutable audit logs and cannot be modified.

**Validates: Requirements 15.1, 15.2**

### Property 20: Complete Audit Trail Display

*For any* audit event, the display should include timestamp, actor, action, and affected records.

**Validates: Requirement 15.3**

### Property 21: Historical Data Preservation

*For any* historical compliance data, the original values should be preserved without recalculation.

**Validates: Requirement 15.4**


## Testing Strategy

### Dual Testing Approach

The Director Dashboard enhancement will employ both unit testing and property-based testing to ensure comprehensive coverage:

- **Unit tests**: Verify specific examples, edge cases, and error conditions
- **Property tests**: Verify universal properties across all inputs
- Together: Comprehensive coverage (unit tests catch concrete bugs, property tests verify general correctness)

### Unit Testing Focus

Unit tests should focus on:
- Specific examples that demonstrate correct behavior (e.g., dashboard displays 5 active accreditations when 5 exist)
- Integration points between components (e.g., controller calls correct service methods)
- Edge cases and error conditions (e.g., handling empty datasets, database errors)
- SQLite compatibility (e.g., date queries use strftime correctly)

### Property-Based Testing Configuration

- **Library**: Use a property-based testing library appropriate for PHP (e.g., Eris, or implement custom generators)
- **Minimum iterations**: 100 iterations per property test
- **Test tagging**: Each property test must reference its design document property
- **Tag format**: `Feature: director-dashboard-enhancement, Property {number}: {property_text}`

### Property Test Examples

```php
// tests/Property/DirectorDashboardPropertyTest.php

namespace Tests\Property;

use Tests\TestCase;
use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DirectorDashboardPropertyTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Feature: director-dashboard-enhancement, Property 1: Drill-Down Navigation Consistency
     * For any clickable aggregate metric, clicking it should navigate to drill-down view
     * 
     * @test
     */
    public function drill_down_navigation_works_for_all_metrics()
    {
        $director = User::factory()->create();
        $director->assignRole('director');
        
        $metrics = [
            ['route' => 'staff.director.drilldown.applications', 'params' => ['status' => 'issued']],
            ['route' => 'staff.director.drilldown.payments', 'params' => ['service_type' => 'accreditation']],
            ['route' => 'staff.director.drilldown.audit', 'params' => ['event_type' => 'category_reassignment']],
        ];
        
        foreach ($metrics as $metric) {
            $response = $this->actingAs($director)
                ->get(route($metric['route'], $metric['params']));
            
            $response->assertStatus(200);
            $response->assertViewHasAll(['filters']);
        }
    }
    
    /**
     * Feature: director-dashboard-enhancement, Property 2: Risk Indicator Color Coding
     * For any risk indicator value, color coding should match configured thresholds
     * 
     * @test
     */
    public function risk_indicators_apply_correct_color_coding()
    {
        $testCases = [
            ['value' => 3, 'threshold' => 'excessive_waivers', 'expected' => 'green'],
            ['value' => 8, 'threshold' => 'excessive_waivers', 'expected' => 'amber'],
            ['value' => 15, 'threshold' => 'excessive_waivers', 'expected' => 'red'],
        ];
        
        $riskService = app(\App\Services\Director\RiskIndicatorService::class);
        
        foreach ($testCases as $case) {
            $thresholds = config("director-dashboard.risk_thresholds.{$case['threshold']}");
            $level = $riskService->determineRiskLevel($case['value'], $thresholds);
            
            $this->assertEquals($case['expected'], $level);
        }
    }
    
    /**
     * Feature: director-dashboard-enhancement, Property 6: View-Only Application Restrictions
     * For any application, Directors should be prevented from edit/approve/reject actions
     * 
     * @test
     */
    public function directors_cannot_perform_operational_actions_on_applications()
    {
        $director = User::factory()->create();
        $director->assignRole('director');
        
        $application = Application::factory()->create();
        
        $restrictedActions = [
            ['method' => 'put', 'route' => 'staff.officer.applications.update', 'data' => ['status' => 'approved']],
            ['method' => 'post', 'route' => 'staff.officer.applications.approve', 'data' => []],
            ['method' => 'post', 'route' => 'staff.officer.applications.reject', 'data' => ['reason' => 'test']],
        ];
        
        foreach ($restrictedActions as $action) {
            $response = $this->actingAs($director)
                ->{$action['method']}(route($action['route'], $application), $action['data']);
            
            $response->assertStatus(403);
        }
    }
    
    /**
     * Feature: director-dashboard-enhancement, Property 14: SQLite Query Compatibility
     * For any database query, it should use SQLite-compatible syntax
     * 
     * @test
     */
    public function all_queries_use_sqlite_compatible_syntax()
    {
        $director = User::factory()->create();
        $director->assignRole('director');
        
        // Enable query logging
        \DB::enableQueryLog();
        
        // Access dashboard to trigger queries
        $this->actingAs($director)->get(route('staff.director.dashboard'));
        
        $queries = \DB::getQueryLog();
        
        // Check that no MySQL-specific functions are used
        $mysqlFunctions = ['DATE_FORMAT', 'TIMESTAMPDIFF', 'YEAR(', 'MONTH(', 'DAY('];
        
        foreach ($queries as $query) {
            foreach ($mysqlFunctions as $function) {
                $this->assertStringNotContainsString(
                    $function,
                    $query['query'],
                    "Query contains MySQL-specific function: {$function}"
                );
            }
        }
        
        \DB::disableQueryLog();
    }
}
```

### Test Coverage Goals

- **Unit Test Coverage**: Minimum 80% code coverage for service and repository classes
- **Integration Test Coverage**: All controller methods and routes
- **Property Test Coverage**: All 21 correctness properties
- **Performance Test Coverage**: Load time requirements (3s/5s thresholds)

### Continuous Integration

```yaml
# .github/workflows/director-dashboard-tests.yml

name: Director Dashboard Tests

on:
  push:
    paths:
      - 'app/Services/Director/**'
      - 'app/Repositories/Director/**'
      - 'app/Http/Controllers/Staff/DirectorController.php'
      - 'tests/**'

jobs:
  test:
    runs-on: ubuntu-latest
    
    steps:
      - uses: actions/checkout@v2
      
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: sqlite3
      
      - name: Install Dependencies
        run: composer install
      
      - name: Run Unit Tests
        run: php artisan test --testsuite=Unit --filter=Director
      
      - name: Run Property Tests
        run: php artisan test --testsuite=Property --filter=DirectorDashboard
      
      - name: Run Integration Tests
        run: php artisan test --testsuite=Feature --filter=DirectorDashboard
      
      - name: Generate Coverage Report
        run: php artisan test --coverage --min=80
```

## Implementation Phases

### Phase 1: Foundation (Week 1)
- Create service classes and repositories
- Implement basic KPI calculations
- Set up caching infrastructure
- Create database indexes

### Phase 2: Dashboard Views (Week 2)
- Build executive overview dashboard
- Create KPI card components
- Implement risk indicator display
- Add navigation structure

### Phase 3: Analytics Reports (Week 3)
- Build accreditation performance report
- Build financial performance report
- Build compliance monitoring report
- Implement Chart.js visualizations

### Phase 4: Drill-Down & Reports (Week 4)
- Implement drill-down navigation
- Build drill-down views
- Implement PDF report generation
- Implement Excel export functionality

### Phase 5: Performance & Polish (Week 5)
- Optimize queries and caching
- Implement real-time updates
- Add loading indicators
- Performance testing and tuning

### Phase 6: Testing & Documentation (Week 6)
- Write unit tests
- Write property-based tests
- Write integration tests
- Complete user documentation

## Security Considerations

### Access Control

```php
// Middleware to enforce view-only access

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirectorViewOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasRole('director')) {
            // Block all POST, PUT, PATCH, DELETE requests except for report generation
            if (in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                if (!$request->routeIs('staff.director.generate.*')) {
                    abort(403, 'Directors have view-only access');
                }
            }
        }
        
        return $next($request);
    }
}
```

### Data Privacy

- Ensure sensitive personal information is masked in drill-down views
- Implement row-level security for regional directors (if applicable)
- Log all director access for audit purposes

```php
// Log director access

use Illuminate\Support\Facades\Log;

public function dashboard()
{
    Log::info('Director accessed dashboard', [
        'user_id' => auth()->id(),
        'user_name' => auth()->user()->name,
        'ip_address' => request()->ip(),
        'timestamp' => now()
    ]);
    
    // ... rest of method
}
```

### Rate Limiting

```php
// Apply rate limiting to prevent abuse

Route::middleware(['staff.portal', 'role:director', 'throttle:60,1'])
    ->prefix('staff/director')
    ->name('staff.director.')
    ->group(function () {
        // ... routes
    });
```

## Deployment Considerations

### Environment Configuration

```env
# .env additions for Director Dashboard

DIRECTOR_DASHBOARD_CACHE_TTL=3600
DIRECTOR_DASHBOARD_REALTIME_POLLING=true
DIRECTOR_DASHBOARD_POLLING_INTERVAL=60000
DIRECTOR_DASHBOARD_MAX_DRILL_DOWN_RESULTS=1000
```

### Database Migrations

```php
// Migration to add indexes

public function up()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->index('status');
        $table->index('application_type');
        $table->index(['status', 'issued_at']);
        $table->index(['status', 'submitted_at']);
    });
    
    Schema::table('payments', function (Blueprint $table) {
        $table->index('status');
        $table->index(['status', 'confirmed_at']);
    });
    
    Schema::table('activity_logs', function (Blueprint $table) {
        $table->index('action');
        $table->index(['action', 'created_at']);
    });
}
```

### Asset Compilation

```json
// package.json additions

{
  "dependencies": {
    "chart.js": "^4.4.0"
  },
  "scripts": {
    "build:director": "vite build --mode director"
  }
}
```

### Cache Configuration

```php
// config/cache.php

'stores' => [
    'director' => [
        'driver' => 'file',
        'path' => storage_path('framework/cache/director'),
    ],
],
```

## Maintenance and Monitoring

### Health Checks

```php
// Console command for dashboard health check

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Director\DashboardMetricsService;

class DirectorDashboardHealthCheck extends Command
{
    protected $signature = 'director:health-check';
    
    public function handle(DashboardMetricsService $service)
    {
        $this->info('Running Director Dashboard health check...');
        
        try {
            $kpis = $service->getExecutiveKPIs();
            $this->info('✓ KPIs loaded successfully');
            
            $cacheHit = Cache::has('director.kpis.executive_overview');
            $this->info($cacheHit ? '✓ Cache is working' : '✗ Cache miss detected');
            
            $this->info('Health check complete!');
        } catch (\Exception $e) {
            $this->error('✗ Health check failed: ' . $e->getMessage());
            return 1;
        }
        
        return 0;
    }
}
```

### Performance Monitoring

```php
// Log slow dashboard loads

use Illuminate\Support\Facades\Log;

public function dashboard()
{
    $startTime = microtime(true);
    
    $kpis = $this->metricsService->getExecutiveKPIs();
    $riskIndicators = $this->riskService->getAllRiskIndicators();
    $highRiskActivity = $this->complianceService->getHighRiskActions(5);
    
    $loadTime = (microtime(true) - $startTime) * 1000; // Convert to milliseconds
    
    if ($loadTime > 3000) {
        Log::warning('Slow dashboard load', [
            'load_time_ms' => $loadTime,
            'user_id' => auth()->id()
        ]);
    }
    
    return view('staff.director.dashboard', compact('kpis', 'riskIndicators', 'highRiskActivity'));
}
```

## Conclusion

This design document provides a comprehensive blueprint for enhancing the Director/CEO Dashboard with strategic oversight capabilities. The implementation follows Laravel best practices, ensures SQLite compatibility, prioritizes performance through caching, and maintains strict view-only access control.

Key design decisions:
1. **Service-oriented architecture** for maintainability and testability
2. **Repository pattern** for database abstraction
3. **Aggressive caching** with smart invalidation for performance
4. **Chart.js** for rich visualizations with drill-down capability
5. **Dual export formats** (PDF and Excel) for different use cases
6. **Property-based testing** for comprehensive correctness verification
7. **Real-time updates** via AJAX polling for critical metrics
8. **Color-coded risk indicators** for immediate executive awareness

The design addresses all 15 requirements with 21 testable correctness properties, ensuring the enhanced dashboard provides Directors with comprehensive strategic oversight while maintaining system integrity through view-only access restrictions.

