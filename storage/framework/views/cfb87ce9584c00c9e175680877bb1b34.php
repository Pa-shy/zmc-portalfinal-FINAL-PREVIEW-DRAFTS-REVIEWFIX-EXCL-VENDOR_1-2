<?php $__env->startSection('title', 'Unavailable'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
  <div class="card border-0 shadow-sm">
    <div class="card-body p-4">
      <h4 class="fw-bold mb-2"><?php echo e($portal ?? 'Portal'); ?> is currently unavailable</h4>
      <p class="text-muted mb-0">Access to this portal has been temporarily disabled by the system administrator.</p>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/shared/portal_disabled.blade.php ENDPATH**/ ?>