<?php $__env->startSection('title', 'Compliance & Risk Monitoring'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">Compliance & Risk Monitoring</h4>
    </div>

    <div class="row g-4">
        <!-- Category Reassignments -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-exchange-line text-warning me-2"></i>Category Reassignments
                </h6>
                <div class="alert alert-warning alert-sm mb-3">
                    <strong><?php echo e($categoryReassignments['total']); ?></strong> reassignments this month
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Staff Member</th>
                                <th class="text-end">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categoryReassignments['by_staff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($staff->user_name); ?></td>
                                <td class="text-end fw-bold"><?php echo e($staff->count); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Reopened Applications -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-refresh-line text-info me-2"></i>Reopened Applications
                </h6>
                <div class="alert alert-info alert-sm mb-3">
                    <strong><?php echo e($reopenedApplications['total']); ?></strong> applications reopened
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Staff Member</th>
                                <th class="text-end">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reopenedApplications['by_staff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($staff->user_name); ?></td>
                                <td class="text-end fw-bold"><?php echo e($staff->count); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Manual Overrides -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-shield-keyhole-line text-danger me-2"></i>Manual Overrides
                </h6>
                <div class="alert alert-danger alert-sm mb-3">
                    <strong><?php echo e($manualOverrides['total']); ?></strong> manual overrides recorded
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Staff Member</th>
                                <th class="text-end">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $manualOverrides['by_staff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($staff->user_name); ?></td>
                                <td class="text-end fw-bold"><?php echo e($staff->count); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Certificate Edits -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-edit-line text-warning me-2"></i>Certificate Edits After Approval
                </h6>
                <div class="alert alert-warning alert-sm mb-3">
                    <strong><?php echo e($certificateEdits['total']); ?></strong> post-approval edits
                </div>
                <h6 class="fw-bold mt-3 mb-2 small">Most Edited Fields</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Field Name</th>
                                <th class="text-end">Edit Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $certificateEdits['most_edited_fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ucwords(str_replace('_', ' ', $field->field_name))); ?></td>
                                <td class="text-end fw-bold"><?php echo e($field->count); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Print Statistics -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-printer-line text-primary me-2"></i>Print vs Reprint Statistics
                </h6>
                <div style="height: 200px;">
                    <canvas id="printStatsChart"></canvas>
                </div>
                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Prints</span>
                        <span class="fw-bold"><?php echo e(number_format($printStatistics['total_prints'])); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Total Reprints</span>
                        <span class="fw-bold text-warning"><?php echo e(number_format($printStatistics['total_reprints'])); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Excessive Reprints -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-alert-line text-danger me-2"></i>Excessive Reprints
                </h6>
                <h6 class="fw-bold mt-3 mb-2 small">By Applicant (Top 10)</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Applicant</th>
                                <th class="text-end">Reprints</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $excessiveReprints['by_applicant']->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reprint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($reprint->applicant_name); ?></td>
                                <td class="text-end fw-bold text-danger"><?php echo e($reprint->reprint_count); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Suspicious Activity Alerts -->
        <div class="col-md-12">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-alarm-warning-line text-danger me-2"></i>Suspicious Activity Alerts
                </h6>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 text-center <?php echo e($suspiciousActivity['failed_logins'] > 10 ? 'border-danger bg-danger bg-opacity-10' : 'bg-light'); ?>">
                            <div class="h3 fw-bold mb-1 <?php echo e($suspiciousActivity['failed_logins'] > 10 ? 'text-danger' : 'text-muted'); ?>">
                                <?php echo e($suspiciousActivity['failed_logins']); ?>

                            </div>
                            <div class="text-muted small">Failed Login Attempts</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 text-center <?php echo e($suspiciousActivity['repeated_reassignments'] > 5 ? 'border-warning bg-warning bg-opacity-10' : 'bg-light'); ?>">
                            <div class="h3 fw-bold mb-1 <?php echo e($suspiciousActivity['repeated_reassignments'] > 5 ? 'text-warning' : 'text-muted'); ?>">
                                <?php echo e($suspiciousActivity['repeated_reassignments']); ?>

                            </div>
                            <div class="text-muted small">Repeated Reassignments</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 text-center <?php echo e($suspiciousActivity['high_waiver_frequency'] > 5 ? 'border-danger bg-danger bg-opacity-10' : 'bg-light'); ?>">
                            <div class="h3 fw-bold mb-1 <?php echo e($suspiciousActivity['high_waiver_frequency'] > 5 ? 'text-danger' : 'text-muted'); ?>">
                                <?php echo e($suspiciousActivity['high_waiver_frequency']); ?>

                            </div>
                            <div class="text-muted small">High Waiver Frequency</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 text-center <?php echo e($suspiciousActivity['system_overrides'] > 3 ? 'border-danger bg-danger bg-opacity-10' : 'bg-light'); ?>">
                            <div class="h3 fw-bold mb-1 <?php echo e($suspiciousActivity['system_overrides'] > 3 ? 'text-danger' : 'text-muted'); ?>">
                                <?php echo e($suspiciousActivity['system_overrides']); ?>

                            </div>
                            <div class="text-muted small">System Overrides</div>
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
            setTimeout(initCharts, 100);
            return;
        }

        // Print Statistics Chart
        const printStatsCanvas = document.getElementById('printStatsChart');
        if (printStatsCanvas) {
            new Chart(printStatsCanvas, {
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
                        legend: { position: 'bottom' }
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

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/director/reports/compliance.blade.php ENDPATH**/ ?>