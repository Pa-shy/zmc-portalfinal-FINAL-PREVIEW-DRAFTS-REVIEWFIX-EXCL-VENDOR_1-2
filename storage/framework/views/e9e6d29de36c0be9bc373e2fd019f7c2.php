<?php $__env->startSection('title', $title ?? 'Audit Trail'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-3" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0"><?php echo e($title ?? 'Audit Trail'); ?></h4>
      <div class="text-muted small mt-1"><i class="ri-information-line me-1"></i>Filter by application id using <code>?application_id=...</code>.</div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-dashboard-3-line me-1"></i>Dashboard</a>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form class="row g-2 mb-3" method="get">
        <div class="col-12 col-md-4">
          <input type="number" class="form-control" name="application_id" value="<?php echo e($applicationId); ?>" placeholder="Application ID (optional)">
        </div>
        <div class="col-12 col-md-2">
          <button class="btn btn-primary w-100" type="submit">Filter</button>
        </div>
      </form>

      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>When</th>
              <th>Action</th>
              <th>Entity</th>
              <th>From</th>
              <th>To</th>
              <th>Actor</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e(optional($log->created_at)->format('Y-m-d H:i')); ?></td>
              <td class="fw-semibold"><?php echo e($log->action ?? $log->event ?? '—'); ?></td>
              <td><?php echo e(class_basename($log->entity_type ?? '')); ?> #<?php echo e($log->entity_id ?? '—'); ?></td>
              <td><span class="badge bg-light text-dark"><?php echo e($log->from_status ?? '—'); ?></span></td>
              <td><span class="badge bg-light text-dark"><?php echo e($log->to_status ?? '—'); ?></span></td>
              <td><?php echo e($log->actor_user_id ?? $log->user_id ?? '—'); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted py-4">No logs found.</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if(method_exists($logs, 'links')): ?>
        <div class="mt-3"><?php echo e($logs->links()); ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/audit_trail.blade.php ENDPATH**/ ?>