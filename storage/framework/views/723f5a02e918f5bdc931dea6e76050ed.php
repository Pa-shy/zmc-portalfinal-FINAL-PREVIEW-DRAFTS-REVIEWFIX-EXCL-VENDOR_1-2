<?php $__env->startSection('title', 'Media House Oversight'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Media House Oversight & Monitoring</h4>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Issued/Active</div>
                        <div class="h2 fw-black mb-0 text-success"><?php echo e(number_format($statusCounts['active'])); ?></div>
                    </div>
                    <i class="ri-building-line fs-1 text-success opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-warning">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">In Progress</div>
                        <div class="h2 fw-black mb-0 text-warning"><?php echo e(number_format($statusCounts['in_progress'])); ?></div>
                    </div>
                    <i class="ri-time-line fs-1 text-warning opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">New This Year</div>
                        <div class="h2 fw-black mb-0 text-primary"><?php echo e(number_format($statusCounts['new_this_year'])); ?></div>
                    </div>
                    <i class="ri-add-circle-line fs-1 text-primary opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Total Registrations</div>
                        <div class="h2 fw-black mb-0 text-info"><?php echo e(number_format($statusCounts['total'])); ?></div>
                    </div>
                    <i class="ri-file-list-line fs-1 text-info opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Status Distribution</h6>
                <div style="height: 300px;">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Detailed Status Breakdown</h6>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light sticky-top">
                            <tr class="smaller text-muted">
                                <th>Status</th>
                                <th class="text-end">Count</th>
                                <th class="text-end">Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $statusBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-bold text-uppercase small"><?php echo e(str_replace('_', ' ', $status->status)); ?></td>
                                <td class="text-end">
                                    <span class="badge bg-primary"><?php echo e($status->count); ?></span>
                                </td>
                                <td class="text-end">
                                    <?php echo e($statusCounts['total'] > 0 ? number_format(($status->count / $statusCounts['total']) * 100, 1) : 0); ?>%
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">No data available</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Accreditations Nearing Expiry (30 Days)</h6>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light sticky-top">
                            <tr class="smaller text-muted">
                                <th>Applicant</th>
                                <th>Application #</th>
                                <th>Expiry Date</th>
                                <th>Days Left</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $accreditationsNearingExpiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-bold"><?php echo e($app->applicant->name ?? 'N/A'); ?></td>
                                <td class="smaller"><?php echo e($app->application_number); ?></td>
                                <td><?php echo e($app->expiry_date ? \Carbon\Carbon::parse($app->expiry_date)->format('d M Y') : 'N/A'); ?></td>
                                <td>
                                    <?php
                                        $daysLeft = $app->expiry_date ? \Carbon\Carbon::parse($app->expiry_date)->diffInDays(now()) : 0;
                                    ?>
                                    <span class="badge <?php echo e($daysLeft <= 7 ? 'bg-danger' : ($daysLeft <= 14 ? 'bg-warning' : 'bg-info')); ?>">
                                        <?php echo e($daysLeft); ?> days
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">No accreditations expiring soon</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-alarm-warning-line me-1 text-warning"></i>
                    Houses Exceeding Staff Threshold (>50)
                </h6>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light sticky-top">
                            <tr class="smaller text-muted">
                                <th>Media House</th>
                                <th>Application #</th>
                                <th class="text-end">Staff Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $housesExceedingThresholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-bold"><?php echo e($house->applicant->name ?? 'N/A'); ?></td>
                                <td class="smaller"><?php echo e($house->application_number); ?></td>
                                <td class="text-end">
                                    <span class="badge bg-warning text-dark"><?php echo e($house->staff_accreditations_count); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">No houses exceeding threshold</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-error-warning-line me-1 text-danger"></i>
                    High-Risk Non-Renewals (Expired Last 30 Days)
                </h6>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light sticky-top">
                            <tr class="smaller text-muted">
                                <th>Applicant</th>
                                <th>Application #</th>
                                <th>Expired On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $highRiskNonRenewals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-bold"><?php echo e($app->applicant->name ?? 'N/A'); ?></td>
                                <td class="smaller"><?php echo e($app->application_number); ?></td>
                                <td class="text-danger"><?php echo e($app->expiry_date ? \Carbon\Carbon::parse($app->expiry_date)->format('d M Y') : 'N/A'); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">No recent non-renewals</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4">
        <div class="col-12">
            <div class="zmc-card bg-light border-0">
                <h6 class="fw-bold mb-3">
                    <i class="ri-lightbulb-line me-1 text-warning"></i>
                    Strategic Insights & Summary
                </h6>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">Total Registrations</div>
                            <div class="h4 fw-bold mb-0"><?php echo e(number_format($statusCounts['total'])); ?></div>
                            <div class="smaller text-muted">All time</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">Issued/Active</div>
                            <div class="h4 fw-bold mb-0 text-success"><?php echo e(number_format($statusCounts['active'])); ?></div>
                            <div class="smaller text-muted">Fully processed</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">In Progress</div>
                            <div class="h4 fw-bold mb-0 text-warning"><?php echo e(number_format($statusCounts['in_progress'])); ?></div>
                            <div class="smaller text-muted">Pending review/payment</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">New This Year</div>
                            <div class="h4 fw-bold mb-0 text-primary"><?php echo e(number_format($statusCounts['new_this_year'])); ?></div>
                            <div class="smaller text-muted"><?php echo e(now()->year); ?> applications</div>
                        </div>
                    </div>
                </div>
                
                <?php if($statusCounts['total'] > 0): ?>
                <div class="mt-4 p-3 bg-white rounded-3 border">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="small text-muted mb-2">Processing Rate</div>
                            <div class="progress" style="height: 25px;">
                                <?php
                                    $processedRate = $statusCounts['total'] > 0 ? ($statusCounts['active'] / $statusCounts['total']) * 100 : 0;
                                ?>
                                <div class="progress-bar bg-success" style="width: <?php echo e($processedRate); ?>%">
                                    <?php echo e(number_format($processedRate, 1)); ?>%
                                </div>
                            </div>
                            <div class="smaller text-muted mt-1"><?php echo e($statusCounts['active']); ?> of <?php echo e($statusCounts['total']); ?> issued</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-muted mb-2">Pending Applications</div>
                            <div class="progress" style="height: 25px;">
                                <?php
                                    $pendingRate = $statusCounts['total'] > 0 ? ($statusCounts['in_progress'] / $statusCounts['total']) * 100 : 0;
                                ?>
                                <div class="progress-bar bg-warning" style="width: <?php echo e($pendingRate); ?>%">
                                    <?php echo e(number_format($pendingRate, 1)); ?>%
                                </div>
                            </div>
                            <div class="smaller text-muted mt-1"><?php echo e($statusCounts['in_progress']); ?> applications in progress</div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    function initCharts() {
        if (typeof Chart === 'undefined') {
            console.error('Chart.js not loaded, retrying...');
            setTimeout(initCharts, 100);
            return;
        }

        // Status Distribution Pie Chart
        const statusCanvas = document.getElementById('statusChart');
        if (statusCanvas) {
            const statusData = <?php echo json_encode($statusBreakdown); ?>;
            const labels = statusData.map(s => s.status.replace(/_/g, ' ').toUpperCase());
            const counts = statusData.map(s => s.count);
            const colors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#06b6d4'];
            
            new Chart(statusCanvas, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: counts,
                        backgroundColor: colors.slice(0, labels.length)
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: { size: 11 }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = counts.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? ((context.parsed / total) * 100).toFixed(1) : 0;
                                    return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCharts);
    } else {
        initCharts();
    }
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/director/reports/mediahouses.blade.php ENDPATH**/ ?>