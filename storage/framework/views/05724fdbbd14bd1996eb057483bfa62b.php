<?php $__env->startSection('title', 'PayNow Settings'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">PayNow Settings</h4>
      <div class="text-muted mt-1" style="font-size:13px;">View-only integration metadata (masked where necessary).</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card">
    <div class="fw-bold mb-2"><i class="ri-settings-3-line me-2" style="color:var(--zmc-accent)"></i> Gateway status</div>
    <div class="table-responsive">
      <table class="table table-sm align-middle mb-0">
        <thead><tr><th>Key</th><th>Value</th></tr></thead>
        <tbody>
          <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $val = $v;
              if (is_string($val) && str_contains(strtolower($k), 'id') && strlen($val) > 6) {
                $val = substr($val, 0, 3) . str_repeat('*', max(strlen($val) - 6, 0)) . substr($val, -3);
              }
            ?>
            <tr>
              <td class="text-muted small" style="width:320px;"><?php echo e($k); ?></td>
              <td class="small"><?php echo e($val ?? '—'); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <div class="text-muted small mt-3">
      Error logs: wire this page to your webhook controller logs.
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/paynow_settings.blade.php ENDPATH**/ ?>