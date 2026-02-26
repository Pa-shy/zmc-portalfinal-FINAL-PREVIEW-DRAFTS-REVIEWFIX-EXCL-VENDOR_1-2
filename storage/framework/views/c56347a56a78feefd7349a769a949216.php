<?php $__env->startSection('title', 'Production Queue'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">Production Queue</h4>
  <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-secondary btn-sm">Back to Dashboard</a>
</div>

<?php if(session('success')): ?>
  <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<div class="card">
  <div class="card-header fw-bold">Payment Verified — Ready for Production</div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th>Reference</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Request</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $rowNo = $applications->firstItem() + $i;
              $requestBadge = match($app->request_type) {
                'renewal' => 'warning',
                'replacement' => 'info',
                default => 'success',
              };
            ?>
            <tr>
              <td class="text-muted small"><?php echo e($rowNo); ?></td>
              <td class="fw-bold"><?php echo e($app->reference); ?></td>
              <td><?php echo e($app->applicant?->name ?? '—'); ?></td>
              <td class="text-capitalize"><?php echo e($app->application_type ?? '—'); ?></td>
              <td>
                <span class="badge bg-<?php echo e($requestBadge); ?>"><?php echo e(ucfirst($app->request_type ?? 'new')); ?></span>
              </td>
              <td><span class="badge bg-info"><?php echo e(ucwords(str_replace('_', ' ', $app->status))); ?></span></td>
              <td class="small"><?php echo e(optional($app->created_at)->format('d M Y')); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" class="text-center py-4 text-muted">No applications in the production queue.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php if(method_exists($applications, 'links')): ?>
  <div class="mt-3"><?php echo e($applications->links()); ?></div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/production_queue.blade.php ENDPATH**/ ?>