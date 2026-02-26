<?php $__env->startSection('title', 'Fees & Payments (Oversight)'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Fees & Payments (Oversight)</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Super Admin configures fee rules; Accounts verifies payments.</div>
    </div>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-secondary"><i class="ri-arrow-left-line me-1"></i>Back</a>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="fw-semibold">Payment Queues</div>
          <div class="text-muted" style="font-size:12px;">High-level visibility only.</div>
          <div class="mt-3">
            <div class="d-flex justify-content-between align-items-center py-2" style="border-bottom:1px dashed #e2e8f0;">
              <div>
                <div class="fw-semibold">Pending Verification</div>
                <div class="text-muted" style="font-size:12px;">Accounts Review</div>
              </div>
              <div class="fw-bold"><?php echo e($pendingPayments); ?></div>
            </div>
            <div class="d-flex justify-content-between align-items-center py-2">
              <div>
                <div class="fw-semibold">Cleared to Registrar</div>
                <div class="text-muted" style="font-size:12px;">Paid Confirmed / Registrar Review</div>
              </div>
              <div class="fw-bold"><?php echo e($paidConfirmed); ?></div>
            </div>
          </div>

          <div class="alert alert-warning mt-3 mb-0" style="font-size:13px;">
            Fee amounts are shown as <b>Configured in Finance</b> until we wire a fee catalogue table.
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0">
          <div class="fw-semibold">Fee Catalogue (placeholder)</div>
          <div class="text-muted" style="font-size:12px;">We can connect this to a database-managed fee table later.</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm align-middle">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Amount</th>
                  <th>Payment Channels</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $feeCatalogue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="fw-semibold"><?php echo e($row['category']); ?></td>
                    <td><?php echo e($row['amount']); ?></td>
                    <td><?php echo e($row['channel']); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/system/fees.blade.php ENDPATH**/ ?>