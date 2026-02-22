<?php $__env->startSection('title', 'Approved Waivers'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Approved Waivers</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Read-only record of approved waivers (audit flagged).</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom fw-bold"><i class="ri-check-double-line me-2" style="color:var(--zmc-accent)"></i> Approved waivers</div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>Applicant</th>
            <th>Application #</th>
            <th>Waiver doc</th>
            <th>Approved</th>
            <th>Justification</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $ref = $app->reference ?? ('APP-' . str_pad((int)$app->id, 5, '0', STR_PAD_LEFT));
              $waiverUrl = $app->waiver_path ? asset('storage/' . ltrim($app->waiver_path, '/')) : null;
            ?>
            <tr>
              <td><?php echo e($app->applicant?->name ?? '—'); ?></td>
              <td class="fw-bold"><?php echo e($ref); ?></td>
              <td>
                <?php if($waiverUrl): ?>
                  <a href="<?php echo e($waiverUrl); ?>" target="_blank" class="btn btn-sm btn-outline-dark"><i class="ri-attachment-2"></i> View</a>
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
              <td class="small text-muted"><?php echo e($app->waiver_reviewed_at ? \Carbon\Carbon::parse($app->waiver_reviewed_at)->format('d M Y H:i') : '—'); ?></td>
              <td class="text-muted" style="max-width:420px;">
                <div class="small text-truncate" title="<?php echo e($app->waiver_review_notes ?? ''); ?>"><?php echo e($app->waiver_review_notes ?? '—'); ?></div>
              </td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('staff.accounts.applications.show', $app->id)); ?>" title="Open application"><i class="ri-eye-line"></i></a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted p-4">No approved waivers.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="p-3"><?php echo e($applications->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/waivers_approved.blade.php ENDPATH**/ ?>