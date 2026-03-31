<?php $__env->startSection('title', 'My Renewals & Replacements (AP5)'); ?>

<?php $__env->startSection('content'); ?>
<div id="mediahouse-renewals-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">My Renewals & Replacements (AP5)</h4>
    <a class="btn btn-secondary" href="<?php echo e(route('mediahouse.portal')); ?>">
      <i class="ri-arrow-left-line me-1"></i>Back to Dashboard
    </a>
  </div>

  <div class="mb-4">
    <a href="<?php echo e(route('mediahouse.renewals.select-type')); ?>" class="btn btn-primary">
      <i class="ri-add-line me-1"></i>Start New Renewal / Replacement
    </a>
  </div>

  <?php if($renewals->count() > 0): ?>
    <div class="card shadow-sm">
      <div class="card-body">
        <h6 class="fw-bold mb-3"><i class="ri-file-list-3-line me-1"></i>My Renewal Applications</h6>
        <div class="table-responsive">
          <table class="table table-sm align-middle mb-0">
            <thead>
              <tr>
                <th>Type</th>
                <th>Registration Number</th>
                <th>Status</th>
                <th>Submitted</th>
                <th class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $renewals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $renewal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="text-capitalize"><?php echo e($renewal->request_type ?? 'Renewal'); ?></td>
                  <td class="fw-semibold"><code><?php echo e($renewal->original_number ?? 'N/A'); ?></code></td>
                  <td>
                    <span class="badge 
                      <?php if($renewal->status === 'renewal_produced_ready_for_collection'): ?> bg-success
                      <?php elseif($renewal->status === 'renewal_payment_rejected'): ?> bg-danger
                      <?php elseif($renewal->status === 'renewal_payment_verified'): ?> bg-info
                      <?php elseif(str_contains($renewal->status, 'awaiting')): ?> bg-warning
                      <?php else: ?> bg-secondary
                      <?php endif; ?>">
                      <?php echo e(ucwords(str_replace('_', ' ', $renewal->status))); ?>

                    </span>
                  </td>
                  <td class="text-muted"><?php echo e($renewal->created_at->format('d M Y, H:i')); ?></td>
                  <td class="text-end">
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('mediahouse.renewals.show', $renewal)); ?>">
                      <i class="ri-eye-line me-1"></i>View
                    </a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php if($renewals->hasPages()): ?>
      <div class="mt-3">
        <?php echo e($renewals->links()); ?>

      </div>
    <?php endif; ?>
  <?php else: ?>
    <div class="card shadow-sm">
      <div class="card-body text-center py-5">
        <i class="ri-file-list-3-line" style="font-size:48px; opacity:0.3;"></i>
        <h5 class="mt-3 mb-2">No Renewals Yet</h5>
        <p class="text-muted mb-4">You haven't started any renewal or replacement applications.</p>
        <a href="<?php echo e(route('mediahouse.renewals.select-type')); ?>" class="btn btn-primary">
          <i class="ri-add-line me-1"></i>Start Your First Renewal
        </a>
      </div>
    </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/mediahouse/renewals/index.blade.php ENDPATH**/ ?>