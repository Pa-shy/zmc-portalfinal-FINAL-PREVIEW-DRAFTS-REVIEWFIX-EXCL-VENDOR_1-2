<?php $__env->startSection('title', 'Payment Proofs Audit'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">Payment Proofs Audit</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">
        <i class="ri-information-line me-1"></i>
        Read-only view of uploaded receipts/proofs. Auditors cannot approve/reject.
      </div>
    </div>
    <div class="d-flex gap-2">
      <a class="btn btn-success btn-sm" href="<?php echo e(route('staff.auditor.proofs.csv', request()->query())); ?>">
        <i class="ri-file-excel-line me-1"></i>Export CSV
      </a>
      <button class="btn btn-outline-dark btn-sm" onclick="window.print()">
        <i class="ri-printer-line me-1"></i>Print PDF
      </button>
      <a class="btn btn-white border btn-sm" href="<?php echo e(route('staff.auditor.dashboard')); ?>">
        <i class="ri-arrow-left-line me-1"></i>Back
      </a>
    </div>
  </div>

  <div class="zmc-card shadow-sm border-0 p-3 mb-3">
    <form method="GET" class="row g-2 align-items-end">
      <div class="col-md-3">
        <label class="form-label small text-muted">Proof Status</label>
        <select class="form-select form-select-sm" name="status">
          <option value="">All</option>
          <option value="submitted" <?php if(request('status')==='submitted'): echo 'selected'; endif; ?>>Submitted</option>
          <option value="approved" <?php if(request('status')==='approved'): echo 'selected'; endif; ?>>Approved</option>
          <option value="rejected" <?php if(request('status')==='rejected'): echo 'selected'; endif; ?>>Rejected</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label small text-muted">From</label>
        <input type="date" class="form-control form-control-sm" name="from" value="<?php echo e(request('from')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small text-muted">To</label>
        <input type="date" class="form-control form-control-sm" name="to" value="<?php echo e(request('to')); ?>">
      </div>
      <div class="col-md-3 d-flex gap-2">
        <button class="btn btn-dark btn-sm" type="submit"><i class="ri-filter-3-line me-1"></i>Filter</button>
        <a class="btn btn-white border btn-sm" href="<?php echo e(route('staff.auditor.proofs')); ?>">Reset</a>
      </div>
    </form>
  </div>

  <div class="zmc-card shadow-sm border-0 p-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0"><i class="ri-file-copy-2-line me-2" style="color:var(--zmc-accent)"></i>Proofs</h6>
      <div class="small text-muted">Showing <?php echo e($applications->count()); ?> of <?php echo e($applications->total()); ?></div>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead>
          <tr>
            <th>Ref</th>
            <th>Applicant</th>
            <th>Status</th>
            <th>Uploaded</th>
            <th>File</th>
            <th style="width:260px;">Flag</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="fw-bold"><?php echo e($a->reference); ?></td>
              <td>
                <div class="fw-semibold"><?php echo e($a->applicant->name ?? '—'); ?></div>
                <div class="small text-muted"><?php echo e($a->applicant->email ?? '—'); ?></div>
              </td>
              <td class="small fw-bold"><?php echo e($a->proof_status ?? '—'); ?></td>
              <td class="small"><?php echo e($a->payment_proof_uploaded_at ? $a->payment_proof_uploaded_at->format('d M Y H:i') : '—'); ?></td>
              <td class="small">
                <?php if($a->payment_proof_path): ?>
                  <a href="<?php echo e(asset($a->payment_proof_path)); ?>" target="_blank" class="btn btn-sm btn-white border"><i class="ri-eye-line me-1"></i>View</a>
                <?php else: ?>
                  —
                <?php endif; ?>
              </td>
              <td>
                <form method="POST" action="<?php echo e(route('staff.auditor.flag')); ?>" class="d-flex gap-2">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="entity_type" value="payment_proof">
                  <input type="hidden" name="entity_id" value="<?php echo e($a->id); ?>">
                  <select name="severity" class="form-select form-select-sm" style="max-width:120px;">
                    <option value="medium">MED</option>
                    <option value="low">LOW</option>
                    <option value="high">HIGH</option>
                  </select>
                  <input class="form-control form-control-sm" name="reason" placeholder="Flag reason" required>
                  <button class="btn btn-sm btn-outline-danger" type="submit"><i class="ri-flag-2-line"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center py-5 text-muted">No payment proofs found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3"><?php echo e($applications->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/auditor/proofs.blade.php ENDPATH**/ ?>