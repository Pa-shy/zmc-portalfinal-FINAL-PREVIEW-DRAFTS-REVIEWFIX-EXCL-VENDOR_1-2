<?php $__env->startSection('title', $title ?? 'Accreditation Officer'); ?>

<?php $__env->startSection('content'); ?>
  <div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
      <div>
        <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;"><?php echo e($title ?? 'Page'); ?></h4>
        <?php if(!empty($subtitle)): ?>
          <div class="text-muted mt-1" style="font-size: var(--font-size-base);">
            <i class="ri-information-line me-1"></i><?php echo e($subtitle); ?>

          </div>
        <?php endif; ?>
      </div>
      <div>
        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-white border shadow-sm btn-sm px-3">
          <i class="ri-arrow-left-line me-1"></i> Back
        </a>
      </div>
    </div>

    <div class="alert alert-info">
      <i class="ri-tools-line me-1"></i>
      This module is enabled in the menu. Functional workflows will appear here as records/data are populated.
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/placeholder.blade.php ENDPATH**/ ?>