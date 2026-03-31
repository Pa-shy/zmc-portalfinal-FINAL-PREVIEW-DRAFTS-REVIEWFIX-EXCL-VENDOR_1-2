<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<?php
  $status = request('status');
  $statusList = [
    'draft','submitted','officer_review','officer_approved','correction_requested','officer_rejected',
    'registrar_review','registrar_approved','registrar_rejected','accounts_review','paid_confirmed',
    'production_queue','card_generated','certificate_generated','printed','issued'
  ];
?>

<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;">Read-only oversight list. Processing is done by staff roles.</div>
    </div>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-dark">
      <i class="ri-arrow-left-line me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body d-flex flex-wrap gap-2 align-items-center justify-content-between">
      <form class="d-flex gap-2 flex-wrap align-items-center" method="GET">
        <div class="fw-bold me-2">Filter</div>
        <select name="status" class="form-select form-select-sm" style="width:220px;">
          <option value="">All statuses</option>
          <?php $__currentLoopData = $statusList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($s); ?>" <?php if($status === $s): echo 'selected'; endif; ?>><?php echo e(ucwords(str_replace('_',' ', $s))); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button class="btn btn-sm btn-primary" type="submit"><i class="ri-filter-3-line me-1"></i>Apply</button>
        <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(request()->url()); ?>">Reset</a>
      </form>
      <div class="text-muted small">Showing <?php echo e($applications->firstItem() ?? 0); ?>-<?php echo e($applications->lastItem() ?? 0); ?> of <?php echo e($applications->total()); ?></div>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="bg-light">
            <tr>
              <th class="border-0 ps-4">Reference</th>
              <th class="border-0">Applicant</th>
              <th class="border-0">Status</th>
              <th class="border-0">Submitted</th>
              <th class="border-0 text-end pe-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td class="ps-4 fw-semibold"><?php echo e($app->reference ?? 'N/A'); ?></td>
                <td>
                  <div class="fw-semibold"><?php echo e($app->applicant?->name ?? 'Applicant'); ?></div>
                  <div class="text-muted small"><?php echo e($app->applicant?->email); ?></div>
                </td>
                <td>
                  <span class="badge bg-secondary"><?php echo e(ucwords(str_replace('_',' ', $app->status ?? 'unknown'))); ?></span>
                </td>
                <td class="text-muted"><?php echo e($app->submitted_at?->diffForHumans() ?? $app->created_at?->diffForHumans()); ?></td>
                <td class="text-end pe-4">
                  <a href="<?php echo e(route('admin.applications.show', $app)); ?>" class="btn btn-sm btn-outline-primary">
                    <i class="ri-eye-line"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <td colspan="5" class="text-center py-4 text-muted">No applications found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="mt-3">
    <?php echo e($applications->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/applications/index.blade.php ENDPATH**/ ?>