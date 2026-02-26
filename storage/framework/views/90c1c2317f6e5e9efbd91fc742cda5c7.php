<?php $__env->startSection('title', 'Pending Payment Proofs'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Pending Payment Proofs</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Review uploaded proofs, compare against PayNow reference/status, then approve or reject with a reason.</div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom fw-bold"><i class="ri-time-line me-2" style="color:var(--zmc-accent)"></i> Queue</div>
    <form id="bulkProofsForm" method="POST" action="<?php echo e(route('staff.accounts.proofs.bulk-download')); ?>">
      <?php echo csrf_field(); ?>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 zmc-mini-table">
          <thead>
            <tr>
              <th style="width: 40px;">
                <input type="checkbox" id="selectAllProofs" class="form-check-input">
              </th>
              <th>Applicant</th>
              <th>Application #</th>
              <th>Uploaded proof</th>
              <th>PayNow ref</th>
              <th>Status</th>
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
              <td><input type="checkbox" name="application_ids[]" value="<?php echo e($app->id); ?>" class="form-check-input proof-checkbox"></td>
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
              <td><span class="badge rounded-pill bg-info px-3">Submitted</span></td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('staff.accounts.applications.show', $app->id)); ?>" title="Open application"><i class="ri-eye-line"></i></a>

                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#approveProof<?php echo e($app->id); ?>" title="Approve">
                  <i class="ri-check-line"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#rejectProof<?php echo e($app->id); ?>" title="Reject">
                  <i class="ri-close-line"></i>
                </button>
              </td>
            </tr>

            <?php $__env->startPush('zmc_modals'); ?>
              <div class="modal fade" id="approveProof<?php echo e($app->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <form class="modal-content" method="POST" action="<?php echo e(route('staff.accounts.proofs.approve', $app->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header zmc-modal-header">
                      <div>
                        <div class="zmc-modal-title"><i class="ri-check-line me-2" style="color:var(--zmc-accent)"></i> Approve proof <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;"><?php echo e($ref); ?></span></div>
                        <div class="zmc-modal-sub">Confirm this proof is valid. Optional: capture PayNow reference/status.</div>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row g-2">
                        <div class="col-12 col-md-6">
                          <label class="form-label">PayNow reference (optional)</label>
                          <input class="form-control" name="paynow_reference" value="<?php echo e($app->paynow_reference); ?>" maxlength="200">
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label">Payment status (optional)</label>
                          <select class="form-select" name="payment_status">
                            <option value="">Leave unchanged</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                            <option value="reversed">Reversed</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <label class="form-label">Notes (optional)</label>
                          <textarea class="form-control" name="proof_review_notes" rows="4" maxlength="5000" placeholder="e.g., proof matches PayNow, amount correct, reference OK"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success"><i class="ri-check-line me-1"></i> Approve</button>
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="modal fade" id="rejectProof<?php echo e($app->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <form class="modal-content" method="POST" action="<?php echo e(route('staff.accounts.proofs.reject', $app->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header zmc-modal-header">
                      <div>
                        <div class="zmc-modal-title"><i class="ri-close-line me-2" style="color:#dc2626"></i> Reject proof <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;"><?php echo e($ref); ?></span></div>
                        <div class="zmc-modal-sub">Rejection reason is mandatory.</div>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <label class="form-label">Reason</label>
                      <textarea class="form-control" name="proof_review_notes" rows="4" maxlength="5000" required placeholder="e.g., wrong amount, missing reference, duplicate proof, unclear image"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-danger"><i class="ri-close-line me-1"></i> Reject</button>
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            <?php $__env->stopPush(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted p-4">No pending proofs.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    </form>
    <div class="p-3 d-flex justify-content-between align-items-center">
      <div><?php echo e($applications->links()); ?></div>
      <button type="submit" form="bulkProofsForm" class="btn btn-primary" id="downloadSelectedBtn" disabled>
        <i class="ri-download-2-line me-1"></i> Bulk Download Selection
      </button>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const selectAll = document.getElementById('selectAllProofs');
  const checkboxes = document.querySelectorAll('.proof-checkbox');
  const downloadBtn = document.getElementById('downloadSelectedBtn');

  function updateDownloadBtn() {
    const checkedCount = document.querySelectorAll('.proof-checkbox:checked').length;
    downloadBtn.disabled = checkedCount === 0;
    downloadBtn.innerHTML = `<i class="ri-download-2-line me-1"></i> Bulk Download (${checkedCount})`;
  }

  if (selectAll) {
    selectAll.addEventListener('change', function() {
      checkboxes.forEach(cb => cb.checked = selectAll.checked);
      updateDownloadBtn();
    });
  }

  checkboxes.forEach(cb => {
    cb.addEventListener('change', updateDownloadBtn);
  });
});
</script>

<?php echo $__env->yieldPushContent('zmc_modals'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/proofs_pending.blade.php ENDPATH**/ ?>