<?php $__env->startSection('title', 'User Action Logs'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">User Action Logs</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">Timestamped audit trail of approvals/rejections and other actions.</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card mb-3">
    <form method="GET" class="row g-2 align-items-end">
      <div class="col-12 col-md-4">
        <label class="form-label small text-muted">Action</label>
        <input class="form-control" name="action" value="<?php echo e(request('action')); ?>" placeholder="e.g., accounts_proof_approved">
      </div>
      <div class="col-12 col-md-4">
        <label class="form-label small text-muted">User ID</label>
        <input class="form-control" name="user" value="<?php echo e(request('user')); ?>" placeholder="e.g., 16">
      </div>
      <div class="col-12 col-md-4 d-flex gap-2">
        <button class="btn btn-primary w-100"><i class="ri-filter-3-line me-1"></i> Filter</button>
        <a class="btn btn-outline-secondary w-100" href="<?php echo e(route('staff.accounts.tools.logs')); ?>">Clear</a>
      </div>
    </form>
  </div>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom fw-bold"><i class="ri-history-line me-2" style="color:var(--zmc-accent)"></i> Logs</div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>Time</th>
            <th>Action</th>
            <th>User</th>
            <th>Model</th>
            <th>Meta</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="small text-muted"><?php echo e($log->created_at ? \Carbon\Carbon::parse($log->created_at)->format('d M Y H:i') : '—'); ?></td>
              <td class="fw-bold"><?php echo e($log->action); ?></td>
              <td class="text-muted"><?php echo e($log->actor_user_id ?? '—'); ?></td>
              <td class="text-muted"><?php echo e($log->model_type ? class_basename($log->model_type) . '#' . $log->model_id : '—'); ?></td>
              <td class="text-muted" style="max-width:520px;">
                <div class="small text-truncate" title="<?php echo e(json_encode($log->meta ?? [])); ?>"><?php echo e(is_array($log->meta) ? json_encode($log->meta) : ($log->meta ?? '—')); ?></div>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="text-center text-muted p-4">No logs found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="p-3"><?php echo e($logs->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/user_action_logs.blade.php ENDPATH**/ ?>