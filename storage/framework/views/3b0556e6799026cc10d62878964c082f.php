<div class="row g-4 mb-4">
    <div class="col-md-8">
        <div class="zmc-card bg-white shadow-sm border-0 rounded-4 p-4 h-100">
            <h5 class="fw-bold mb-4">Media House Entity Status</h5>
            
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="p-3 bg-success-subtle rounded-4 text-center">
                        <div class="text-muted small fw-bold text-uppercase mb-1">Active</div>
                        <div class="h2 fw-black mb-0 text-success"><?php echo e(number_format($mediaHouses['active'] ?? 0)); ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-info-subtle rounded-4 text-center">
                        <div class="text-muted small fw-bold text-uppercase mb-1">In Progress</div>
                        <div class="h2 fw-black mb-0 text-info"><?php echo e(number_format($mediaHouses['in_progress'] ?? 0)); ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-danger-subtle rounded-4 text-center">
                        <div class="text-muted small fw-bold text-uppercase mb-1">Suspended</div>
                        <div class="h2 fw-black mb-0 text-danger"><?php echo e(number_format($mediaHouses['suspended'] ?? 0)); ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-primary-subtle rounded-4 text-center">
                        <div class="text-muted small fw-bold text-uppercase mb-1">Total</div>
                        <div class="h2 fw-black mb-0 text-primary"><?php echo e(number_format($mediaHouses['total'] ?? 0)); ?></div>
                    </div>
                </div>
            </div>
            
            <div class="p-3 bg-light rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small fw-bold text-muted">New Registrations (YTD)</span>
                    <span class="badge bg-primary px-3 py-2"><?php echo e(number_format($mediaHouses['new_this_year'] ?? 0)); ?></span>
                </div>
                <div class="progress" style="height: 8px; border-radius: 4px;">
                    <?php
                        $newCount = $mediaHouses['new_this_year'] ?? 0;
                        $percentage = min(100, ($newCount / 20) * 100);
                    ?>
                    <div class="progress-bar bg-primary" style="width: <?php echo e($percentage); ?>%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">Target: 20 new registrations/year</small>
                    <small class="text-muted"><?php echo e(round($percentage, 0)); ?>% achieved</small>
                </div>
            </div>
            
            <?php if(isset($housesExceedingThresholds) && $housesExceedingThresholds->isNotEmpty()): ?>
                <div class="mt-4">
                    <h6 class="small fw-bold text-muted text-uppercase mb-3">
                        <i class="ri-alert-line text-warning me-1"></i> Houses Exceeding Staff Threshold
                    </h6>
                    <?php $__currentLoopData = $housesExceedingThresholds->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="smaller fw-bold"><?php echo e($house->applicant->name ?? 'Media House #' . $house->id); ?></span>
                            <span class="badge bg-warning text-dark"><?php echo e($house->staff_accreditations_count); ?> staff</span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="zmc-card bg-white shadow-sm border-0 rounded-4 p-4 h-100">
            <h5 class="fw-bold mb-4">Staff Metrics</h5>
            
            <div class="text-center mb-4 p-4 bg-light rounded-4">
                <div class="text-muted small fw-bold text-uppercase mb-2">Avg Staff per House</div>
                <div class="display-4 fw-black text-primary"><?php echo e(number_format($averageStaffPerHouse ?? 0, 1)); ?></div>
            </div>
            
            <?php if(isset($accreditationsNearingExpiry) && $accreditationsNearingExpiry->isNotEmpty()): ?>
                <div class="alert alert-warning border-0 rounded-4 mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ri-time-line h5 mb-0"></i>
                        <div>
                            <div class="fw-bold small">Expiring Soon</div>
                            <div class="smaller"><?php echo e($accreditationsNearingExpiry->count()); ?> accreditations expire within 30 days</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if(isset($regional) && $regional->isNotEmpty()): ?>
                <div class="mt-4">
                    <h6 class="small fw-bold text-muted text-uppercase mb-3">Regional Distribution</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless align-middle mb-0">
                            <tbody>
                                <?php $__currentLoopData = $regional->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="py-2 fw-medium"><?php echo e($region->collection_region); ?></td>
                                        <td class="py-2 text-end fw-black"><?php echo e(number_format($region->count)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center text-muted py-3">
                    <i class="ri-map-pin-line" style="font-size: 32px; opacity: 0.3;"></i>
                    <p class="small mb-0 mt-2">Regional data not available</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Media oversight tab loaded');
    console.log('Media houses data:', <?php echo json_encode($mediaHouses ?? [], 15, 512) ?>);
    console.log('Average staff per house:', <?php echo json_encode($averageStaffPerHouse ?? 0, 15, 512) ?>);
});
</script>
<?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/staff/director/partials/media_oversight.blade.php ENDPATH**/ ?>