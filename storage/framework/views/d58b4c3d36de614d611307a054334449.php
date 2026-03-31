<?php $__env->startSection('title', 'Alerts & Notifications'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">Alerts & Notifications</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">Operational alerts (PayNow events, uploads, approvals). Powered by audit log entries.</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom fw-bold"><i class="ri-notification-3-line me-2" style="color:var(--zmc-accent)"></i> Latest</div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>Time</th>
            <th>Action</th>
            <th>Model</th>
            <th class="text-end">Details</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="small text-muted"><?php echo e($log->created_at ? \Carbon\Carbon::parse($log->created_at)->format('d M Y H:i') : '—'); ?></td>
              <td class="fw-bold"><?php echo e($log->action); ?></td>
              <td class="text-muted small"><?php echo e(class_basename($log->model_type ?? '')); ?> #<?php echo e($log->model_id ?? '—'); ?></td>
              <td class="text-end">
                <?php if(($log->model_type ?? '') === \App\Models\Application::class && $log->model_id): ?>
                  <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('staff.accounts.applications.show', $log->model_id)); ?>"><i class="ri-eye-line"></i></a>
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="4" class="text-center text-muted p-4">No alerts yet.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="p-3"><?php echo e($logs->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/alerts.blade.php ENDPATH**/ ?>