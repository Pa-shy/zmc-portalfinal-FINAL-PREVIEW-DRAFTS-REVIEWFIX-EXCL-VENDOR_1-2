<?php $__env->startSection('title', 'Approved Payment Proofs'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Approved Payment Proofs</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Read-only history of approved proofs, for audit and tracking.</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom fw-bold"><i class="ri-checkbox-circle-line me-2" style="color:var(--zmc-accent)"></i> Approved proofs</div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>Applicant</th>
            <th>Application #</th>
            <th>Proof</th>
            <th>PayNow ref</th>
            <th>Approved</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $ref = $app->reference ?? ('APP-' . str_pad((int)$app->id, 5, '0', STR_PAD_LEFT));
              $proofPath = $app->payment_proof_path;
              if (!$proofPath) {
                $proofDoc = $app->documents?->firstWhere('doc_type', 'proof_of_payment');
                $proofPath = $proofDoc?->file_path;
              }
              $proofUrl = $proofPath ? asset('storage/' . ltrim($proofPath, '/')) : null;
            ?>
            <tr>
              <td><?php echo e($app->applicant?->name ?? '—'); ?></td>
              <td class="fw-bold"><?php echo e($ref); ?></td>
              <td>
                <?php if($proofUrl): ?>
                  <a href="<?php echo e($proofUrl); ?>" target="_blank" class="btn btn-sm btn-outline-dark"><i class="ri-attachment-2"></i> View</a>
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
              <td class="text-muted"><?php echo e($app->paynow_reference ?? '—'); ?></td>
              <td class="small text-muted"><?php echo e($app->proof_reviewed_at ? \Carbon\Carbon::parse($app->proof_reviewed_at)->format('d M Y H:i') : '—'); ?></td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('staff.accounts.applications.show', $app->id)); ?>" title="Open application"><i class="ri-eye-line"></i></a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted p-4">No approved proofs yet.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="p-3"><?php echo e($applications->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/proofs_approved.blade.php ENDPATH**/ ?>