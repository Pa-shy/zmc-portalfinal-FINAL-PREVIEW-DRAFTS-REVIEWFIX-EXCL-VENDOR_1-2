<div class="zmc-card bg-white shadow-sm border-0 rounded-4 p-4">
    <h5 class="fw-bold mb-4">Operational Throughput (MonthlyProcessed)</h5>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light">
                <tr>
                    <th class="ps-3 py-3 text-muted small fw-bold text-uppercase">Staff Member</th>
                    <th class="py-3 text-muted small fw-bold text-uppercase">Role / Designation</th>
                    <th class="py-3 text-center text-muted small fw-bold text-uppercase">Applications Processed</th>
                    <th class="pe-3 py-3 text-end text-muted small fw-bold text-uppercase">Operational Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $staffPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="ps-3 py-3 d-flex align-items-center gap-3">
                            <div class="avatar bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width:32px; height:32px; font-size:12px;">
                                <?php echo e(substr($staff->name, 0, 2)); ?>

                            </div>
                            <span class="fw-bold"><?php echo e($staff->name); ?></span>
                        </td>
                        <td class="py-3">
                            <span class="badge bg-light text-dark text-capitalize"><?php echo e(str_replace('_', ' ', $staff->getRoleNames()->first() ?? 'Staff')); ?></span>
                        </td>
                        <td class="py-3 text-center">
                            <div class="h5 fw-black mb-0"><?php echo e(number_format($staff->processed_applications_count)); ?></div>
                        </td>
                        <td class="pe-3 py-3 text-end">
                            <?php if($staff->processed_applications_count > 50): ?>
                                <span class="text-success small fw-bold"><i class="ri-checkbox-circle-fill me-1"></i> High Performance</span>
                            <?php elseif($staff->processed_applications_count > 10): ?>
                                <span class="text-primary small fw-bold"><i class="ri-checkbox-circle-line me-1"></i> Active</span>
                            <?php else: ?>
                                <span class="text-muted small fw-bold">Low Volume</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/staff/director/partials/staff_performance.blade.php ENDPATH**/ ?>