<?php $__env->startSection('title', 'Audit Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Audit Reports</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Accounts/Payments approval logs (who did what & when).</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom fw-bold"><i class="ri-file-search-line me-2" style="color:var(--zmc-accent)"></i> Audit trail</div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>Time</th>
            <th>Action</th>
            <th>Model</th>
            <th>Model ID</th>
            <th>Meta</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="small text-muted"><?php echo e($log->created_at ? \Carbon\Carbon::parse($log->created_at)->format('d M Y H:i') : '—'); ?></td>
              <td class="fw-bold"><?php echo e($log->action); ?></td>
              <td class="text-muted small"><?php echo e(class_basename($log->model_type ?? '') ?: '—'); ?></td>
              <td class="text-muted small"><?php echo e($log->model_id ?? '—'); ?></td>
              <td class="small text-muted" style="max-width:520px;">
                <div class="text-truncate" title="<?php echo e(json_encode($log->meta ?? [])); ?>"><?php echo e(json_encode($log->meta ?? [])); ?></div>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="text-center text-muted p-4">No audit logs yet.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="p-3"><?php echo e($logs->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/reports_audit.blade.php ENDPATH**/ ?>