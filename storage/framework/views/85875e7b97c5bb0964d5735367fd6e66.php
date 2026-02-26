<?php $__env->startSection('title', 'Staff Performance'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Staff Performance & Productivity Overview</h4>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Total Staff</div>
                        <div class="h2 fw-black mb-0 text-primary"><?php echo e($performance->count()); ?></div>
                    </div>
                    <i class="ri-team-line fs-1 text-primary opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Total Processed</div>
                        <div class="h2 fw-black mb-0 text-success"><?php echo e(number_format($performance->sum('processed_count'))); ?></div>
                    </div>
                    <i class="ri-file-check-line fs-1 text-success opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Avg Per Staff</div>
                        <div class="h2 fw-black mb-0 text-info">
                            <?php echo e($performance->count() > 0 ? number_format($performance->sum('processed_count') / $performance->count(), 1) : 0); ?>

                        </div>
                    </div>
                    <i class="ri-bar-chart-line fs-1 text-info opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-warning">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">High Performers</div>
                        <div class="h2 fw-black mb-0 text-warning">
                            <?php echo e($performance->filter(fn($s) => $s->processed_count > 50)->count()); ?>

                        </div>
                    </div>
                    <i class="ri-medal-line fs-1 text-warning opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Applications Processed by Staff</h6>
                <div style="height: 350px;">
                    <canvas id="processedChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Performance Distribution</h6>
                <div style="height: 350px;">
                    <canvas id="performanceDistChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="zmc-card p-0">
                <div class="p-3 border-bottom bg-light">
                    <h6 class="fw-bold m-0">Detailed Performance by Officer</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-3">Name</th>
                                <th>Role</th>
                                <th class="text-center">Applications Processed</th>
                                <th class="text-center">Performance Level</th>
                                <th class="text-center">Contribution %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $performance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $totalProcessed = $performance->sum('processed_count');
                                $contribution = $totalProcessed > 0 ? ($staff->processed_count / $totalProcessed) * 100 : 0;
                            ?>
                            <tr>
                                <td class="ps-3 fw-bold"><?php echo e($staff->name); ?></td>
                                <td>
                                    <span class="badge bg-secondary">
                                        <?php echo e(strtoupper(str_replace('_', ' ', $staff->getRoleNames()->first() ?? 'N/A'))); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary rounded-pill fs-6"><?php echo e($staff->processed_count); ?></span>
                                </td>
                                <td class="text-center">
                                    <?php if($staff->processed_count > 50): ?>
                                        <span class="badge bg-success">
                                            <i class="ri-star-fill"></i> High Performer
                                        </span>
                                    <?php elseif($staff->processed_count > 20): ?>
                                        <span class="badge bg-info">
                                            <i class="ri-arrow-up-line"></i> Active
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="ri-checkbox-circle-line"></i> Standard
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <div class="progress" style="width: 100px; height: 20px;">
                                            <div class="progress-bar bg-primary" style="width: <?php echo e($contribution); ?>%"></div>
                                        </div>
                                        <span class="small fw-bold"><?php echo e(number_format($contribution, 1)); ?>%</span>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No staff performance data available
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4">
        <?php if($averageReviewTime->isNotEmpty()): ?>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-time-line me-1 text-info"></i>
                    Average Review Time by Registrar
                </h6>
                <div style="height: 300px;">
                    <canvas id="reviewTimeChart"></canvas>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($approvalDistribution->isNotEmpty()): ?>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-checkbox-circle-line me-1 text-success"></i>
                    Approval Distribution by Officer
                </h6>
                <div style="height: 300px;">
                    <canvas id="approvalChart"></canvas>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($reassignmentFrequency->isNotEmpty()): ?>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-arrow-left-right-line me-1 text-warning"></i>
                    Reassignment Frequency
                </h6>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light sticky-top">
                            <tr class="smaller text-muted">
                                <th>Staff Member</th>
                                <th class="text-end">Reassignments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reassignmentFrequency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="fw-bold"><?php echo e($staff->name); ?></td>
                                <td class="text-end">
                                    <span class="badge <?php echo e($staff->reassignment_count > 10 ? 'bg-danger' : ($staff->reassignment_count > 5 ? 'bg-warning' : 'bg-info')); ?>">
                                        <?php echo e($staff->reassignment_count); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($paymentVerificationTurnaround->isNotEmpty()): ?>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-money-dollar-circle-line me-1 text-success"></i>
                    Payment Verification Turnaround
                </h6>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light sticky-top">
                            <tr class="smaller text-muted">
                                <th>Staff Member</th>
                                <th class="text-end">Avg. Time (hours)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $paymentVerificationTurnaround; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="fw-bold"><?php echo e($staff->name); ?></td>
                                <td class="text-end">
                                    <span class="badge bg-info"><?php echo e(round($staff->avg_turnaround_time, 1)); ?>h</span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
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

        const performanceData = <?php echo json_encode($performance); ?>;
        
        // Applications Processed Chart (Horizontal Bar)
        const processedCanvas = document.getElementById('processedChart');
        if (processedCanvas && performanceData.length > 0) {
            new Chart(processedCanvas, {
                type: 'bar',
                data: {
                    labels: performanceData.map(s => s.name),
                    datasets: [{
                        label: 'Applications Processed',
                        data: performanceData.map(s => s.processed_count),
                        backgroundColor: '#3b82f6'
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });
        }

        // Performance Distribution (Doughnut)
        const distCanvas = document.getElementById('performanceDistChart');
        if (distCanvas && performanceData.length > 0) {
            const highPerformers = performanceData.filter(s => s.processed_count > 50).length;
            const active = performanceData.filter(s => s.processed_count > 20 && s.processed_count <= 50).length;
            const standard = performanceData.filter(s => s.processed_count <= 20).length;
            
            new Chart(distCanvas, {
                type: 'doughnut',
                data: {
                    labels: ['High Performers', 'Active', 'Standard'],
                    datasets: [{
                        data: [highPerformers, active, standard],
                        backgroundColor: ['#10b981', '#3b82f6', '#6b7280']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { padding: 15, font: { size: 11 } }
                        }
                    }
                }
            });
        }

        // Review Time Chart
        const reviewTimeCanvas = document.getElementById('reviewTimeChart');
        <?php if($averageReviewTime->isNotEmpty()): ?>
        if (reviewTimeCanvas) {
            const reviewTimeData = <?php echo json_encode($averageReviewTime); ?>;
            new Chart(reviewTimeCanvas, {
                type: 'bar',
                data: {
                    labels: reviewTimeData.map(r => r.name),
                    datasets: [{
                        label: 'Avg Review Time (hours)',
                        data: reviewTimeData.map(r => parseFloat(r.avg_review_time)),
                        backgroundColor: '#06b6d4'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + 'h';
                                }
                            }
                        }
                    }
                }
            });
        }
        <?php endif; ?>

        // Approval Distribution Chart
        const approvalCanvas = document.getElementById('approvalChart');
        <?php if($approvalDistribution->isNotEmpty()): ?>
        if (approvalCanvas) {
            const approvalData = <?php echo json_encode($approvalDistribution); ?>;
            new Chart(approvalCanvas, {
                type: 'pie',
                data: {
                    labels: approvalData.map(a => a.name),
                    datasets: [{
                        data: approvalData.map(a => a.approval_count),
                        backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6', '#ef4444', '#06b6d4']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { padding: 10, font: { size: 10 } }
                        }
                    }
                }
            });
        }
        <?php endif; ?>
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCharts);
    } else {
        initCharts();
    }
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/director/reports/staff.blade.php ENDPATH**/ ?>