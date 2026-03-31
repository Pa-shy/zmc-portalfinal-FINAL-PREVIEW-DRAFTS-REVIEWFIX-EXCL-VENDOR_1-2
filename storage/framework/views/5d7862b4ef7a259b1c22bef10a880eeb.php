<?php $__env->startSection('title', 'PayNow Transactions'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">PayNow Transactions</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">
        Real-time feed built from application payment fields (PayNow ref/status). When PayNow webhooks are enabled, this becomes your operational queue.
      </div>
    </div>
    <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-refresh-line me-1"></i> Refresh</a>
  </div>

  <div class="zmc-card mb-3">
    <form method="GET" class="row g-2 align-items-end">
      <div class="col-12 col-md-2">
        <label class="form-label small text-muted">From</label>
        <input type="date" name="from" class="form-control" value="<?php echo e(request('from')); ?>">
      </div>
      <div class="col-12 col-md-2">
        <label class="form-label small text-muted">To</label>
        <input type="date" name="to" class="form-control" value="<?php echo e(request('to')); ?>">
      </div>
      <div class="col-12 col-md-2">
        <label class="form-label small text-muted">Payment status</label>
        <select name="status" class="form-select">
          <option value="">All</option>
          <?php $__currentLoopData = ['paid'=>'Paid','pending'=>'Pending','failed'=>'Failed','reversed'=>'Reversed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($k); ?>" <?php if(request('status')===$k): echo 'selected'; endif; ?>><?php echo e($v); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="col-12 col-md-2">
        <label class="form-label small text-muted">Application type</label>
        <select name="type" class="form-select">
          <option value="">All</option>
          <option value="accreditation" <?php if(request('type')==='accreditation'): echo 'selected'; endif; ?>>Accreditation</option>
          <option value="registration" <?php if(request('type')==='registration'): echo 'selected'; endif; ?>>Registration</option>
        </select>
      </div>
      <div class="col-12 col-md-2">
        <label class="form-label small text-muted">Amount</label>
        <input type="text" name="amount" class="form-control" value="<?php echo e(request('amount')); ?>" placeholder="(placeholder)">
      </div>
      <div class="col-12 col-md-2 d-flex gap-2">
        <button class="btn btn-primary w-100"><i class="ri-filter-3-line me-1"></i> Filter</button>
        <a class="btn btn-outline-secondary w-100" href="<?php echo e(route('staff.accounts.paynow.transactions')); ?>">Clear</a>
      </div>
    </form>
  </div>

  <div class="zmc-card p-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <div class="fw-bold"><i class="ri-bank-card-line me-2" style="color:var(--zmc-accent)"></i> Transactions</div>
      <div class="d-flex gap-2">
        <button type="button" class="btn btn-sm btn-outline-dark" disabled title="Export will be wired to CSV/PDF"><i class="ri-download-2-line me-1"></i> Export CSV</button>
        <button type="button" class="btn btn-sm btn-outline-dark" disabled><i class="ri-file-pdf-2-line me-1"></i> Export PDF</button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>Applicant / Media House</th>
            <th>Application #</th>
            <th>Fee type</th>
            <th>Amount</th>
            <th>PayNow ref</th>
            <th>Status</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $ref = $app->reference ?? ('APP-' . str_pad((int)$app->id, 5, '0', STR_PAD_LEFT));
              $status = strtolower((string)($app->payment_status ?? 'pending'));
              $badge = match($status) {
                'paid' => 'success',
                'failed' => 'danger',
                'reversed' => 'warning',
                default => 'info',
              };
            ?>
            <tr>
              <td><?php echo e($app->applicant?->name ?? '—'); ?></td>
              <td class="fw-bold"><?php echo e($ref); ?></td>
              <td class="text-capitalize"><?php echo e($app->application_type ?? '—'); ?></td>
              <td class="text-muted">—</td>
              <td class="text-muted"><?php echo e($app->paynow_reference ?? '—'); ?></td>
              <td><span class="badge rounded-pill bg-<?php echo e($badge); ?> px-3"><?php echo e(ucfirst($status)); ?></span></td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('staff.accounts.applications.show', $app->id)); ?>"><i class="ri-eye-line"></i></a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" class="text-center text-muted p-4">No PayNow-linked transactions found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="p-3"><?php echo e($applications->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/paynow_transactions.blade.php ENDPATH**/ ?>