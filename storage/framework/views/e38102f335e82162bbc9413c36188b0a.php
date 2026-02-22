<?php $__env->startSection('title', 'Issuance & Print Oversight'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Issuance & Print Oversight</h4>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Total Issued</div>
                        <div class="h2 fw-black mb-0 text-success">
                            <?php echo e(number_format(\App\Models\Application::where('status', 'issued')->count())); ?>

                        </div>
                    </div>
                    <i class="ri-checkbox-circle-line fs-1 text-success opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Total Prints</div>
                        <div class="h2 fw-black mb-0 text-primary"><?php echo e(number_format($printStatistics['total_prints'])); ?></div>
                    </div>
                    <i class="ri-printer-line fs-1 text-primary opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-warning">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Reprints</div>
                        <div class="h2 fw-black mb-0 text-warning"><?php echo e(number_format($printStatistics['total_reprints'])); ?></div>
                    </div>
                    <i class="ri-refresh-line fs-1 text-warning opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="zmc-card border-start border-4 border-danger">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small fw-bold text-uppercase mb-1">Reprint Rate</div>
                        <div class="h2 fw-black mb-0 text-danger">
                            <?php
                                $totalPrints = $printStatistics['total_prints'] + $printStatistics['total_reprints'];
                                $reprintRate = $totalPrints > 0 ? ($printStatistics['total_reprints'] / $totalPrints) * 100 : 0;
                            ?>
                            <?php echo e(number_format($reprintRate, 1)); ?>%
                        </div>
                    </div>
                    <i class="ri-error-warning-line fs-1 text-danger opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Print vs Reprint Distribution</h6>
                <div style="height: 300px;">
                    <canvas id="printDistChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Print Actions by Staff</h6>
                <div style="height: 300px;">
                    <canvas id="staffPrintsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    
    <?php
        $unprintedCount = \App\Models\Application::where('status', 'issued')
            ->where(function($q) {
                $q->whereNull('print_count')->orWhere('print_count', 0);
            })
            ->count();
    ?>
    <?php if($unprintedCount > 0): ?>
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="alert alert-warning border-0 d-flex align-items-center shadow-sm">
                <i class="ri-alert-line fs-3 me-3"></i>
                <div>
                    <div class="fw-bold">Unprinted Approvals Detected</div>
                    <div class="small">
                        There are <strong><?php echo e($unprintedCount); ?></strong> approved applications that have not been printed yet.
                        These should be processed in the production queue.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="zmc-card p-0">
                <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold m-0">Detailed Print Actions by Staff Member</h6>
                    <span class="badge bg-primary"><?php echo e($printsByStaff->count()); ?> Staff Members</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-3">Staff Member</th>
                                <th>Role</th>
                                <th class="text-center">Total Prints</th>
                                <th class="text-center">Initial Prints</th>
                                <th class="text-center">Reprints</th>
                                <th class="text-center">Reprint Rate</th>
                                <th class="text-center">Performance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $printsByStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $staffReprintRate = $staff->total_prints > 0 ? ($staff->reprints / $staff->total_prints) * 100 : 0;
                            ?>
                            <tr>
                                <td class="ps-3 fw-bold"><?php echo e($staff->name); ?></td>
                                <td>
                                    <span class="badge bg-secondary small">
                                        <?php echo e(strtoupper(str_replace('_', ' ', $staff->role ?? 'N/A'))); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary fs-6"><?php echo e(number_format($staff->total_prints)); ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success"><?php echo e(number_format($staff->initial_prints)); ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-warning text-dark"><?php echo e(number_format($staff->reprints)); ?></span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <div class="progress" style="width: 80px; height: 18px;">
                                            <div class="progress-bar <?php echo e($staffReprintRate > 20 ? 'bg-danger' : ($staffReprintRate > 10 ? 'bg-warning' : 'bg-success')); ?>" 
                                                 style="width: <?php echo e(min($staffReprintRate, 100)); ?>%">
                                            </div>
                                        </div>
                                        <span class="small fw-bold"><?php echo e(number_format($staffReprintRate, 1)); ?>%</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if($staffReprintRate <= 5): ?>
                                        <span class="badge bg-success">
                                            <i class="ri-star-fill"></i> Excellent
                                        </span>
                                    <?php elseif($staffReprintRate <= 15): ?>
                                        <span class="badge bg-info">
                                            <i class="ri-checkbox-circle-line"></i> Good
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">
                                            <i class="ri-alert-line"></i> Needs Review
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No print actions recorded
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                        <?php if($printsByStaff->isNotEmpty()): ?>
                        <tfoot class="bg-light">
                            <tr class="fw-bold">
                                <td class="ps-3" colspan="2">TOTALS</td>
                                <td class="text-center"><?php echo e(number_format($printsByStaff->sum('total_prints'))); ?></td>
                                <td class="text-center"><?php echo e(number_format($printsByStaff->sum('initial_prints'))); ?></td>
                                <td class="text-center"><?php echo e(number_format($printsByStaff->sum('reprints'))); ?></td>
                                <td class="text-center">
                                    <?php
                                        $totalPrintsSum = $printsByStaff->sum('total_prints');
                                        $totalReprintsSum = $printsByStaff->sum('reprints');
                                        $overallRate = $totalPrintsSum > 0 ? ($totalReprintsSum / $totalPrintsSum) * 100 : 0;
                                    ?>
                                    <?php echo e(number_format($overallRate, 1)); ?>%
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                        <?php endif; ?>
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
                    Print Quality & Efficiency Insights
                </h6>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">Overall Reprint Rate</div>
                            <div class="h4 fw-bold mb-0 <?php echo e($reprintRate > 15 ? 'text-danger' : ($reprintRate > 10 ? 'text-warning' : 'text-success')); ?>">
                                <?php echo e(number_format($reprintRate, 1)); ?>%
                            </div>
                            <div class="smaller text-muted">
                                <?php if($reprintRate <= 5): ?>
                                    Excellent quality control
                                <?php elseif($reprintRate <= 10): ?>
                                    Good performance
                                <?php elseif($reprintRate <= 15): ?>
                                    Acceptable range
                                <?php else: ?>
                                    Needs improvement
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">Print Efficiency</div>
                            <div class="h4 fw-bold mb-0 text-primary">
                                <?php echo e($printStatistics['total_prints'] > 0 ? number_format((1 - $reprintRate/100) * 100, 1) : 0); ?>%
                            </div>
                            <div class="smaller text-muted">First-time success rate</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">Staff with Low Reprint Rate</div>
                            <div class="h4 fw-bold mb-0 text-success">
                                <?php echo e($printsByStaff->filter(function($s) {
                                    $rate = $s->total_prints > 0 ? ($s->reprints / $s->total_prints) * 100 : 0;
                                    return $rate <= 10;
                                })->count()); ?>

                            </div>
                            <div class="smaller text-muted">Out of <?php echo e($printsByStaff->count()); ?> staff</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="small text-muted mb-1">Unprinted Approvals</div>
                            <div class="h4 fw-bold mb-0 <?php echo e($unprintedCount > 0 ? 'text-warning' : 'text-success'); ?>">
                                <?php echo e(number_format($unprintedCount)); ?>

                            </div>
                            <div class="smaller text-muted">Pending production</div>
                        </div>
                    </div>
                </div>
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

        // Print Distribution Doughnut Chart
        const distCanvas = document.getElementById('printDistChart');
        if (distCanvas) {
            new Chart(distCanvas, {
                type: 'doughnut',
                data: {
                    labels: ['Initial Prints', 'Reprints'],
                    datasets: [{
                        data: [
                            <?php echo e($printStatistics['total_prints']); ?>,
                            <?php echo e($printStatistics['total_reprints']); ?>

                        ],
                        backgroundColor: ['#10b981', '#f59e0b']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { padding: 20, font: { size: 13 } }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = <?php echo e($printStatistics['total_prints'] + $printStatistics['total_reprints']); ?>;
                                    const percentage = total > 0 ? ((context.parsed / total) * 100).toFixed(1) : 0;
                                    return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Staff Prints Bar Chart
        const staffCanvas = document.getElementById('staffPrintsChart');
        if (staffCanvas) {
            const staffData = <?php echo json_encode($printsByStaff); ?>;
            new Chart(staffCanvas, {
                type: 'bar',
                data: {
                    labels: staffData.map(s => s.name),
                    datasets: [
                        {
                            label: 'Initial Prints',
                            data: staffData.map(s => s.initial_prints),
                            backgroundColor: '#10b981'
                        },
                        {
                            label: 'Reprints',
                            data: staffData.map(s => s.reprints),
                            backgroundColor: '#f59e0b'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { padding: 15, font: { size: 11 } }
                        }
                    },
                    scales: {
                        x: { stacked: true },
                        y: { 
                            stacked: true,
                            beginAtZero: true,
                            ticks: { precision: 0 }
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

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/staff/director/reports/issuance.blade.php ENDPATH**/ ?>