<?php $__env->startSection('title', 'Revenue Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">Revenue Reports</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">Summary counts now; wire to fee schedules to compute monetary totals.</div>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-sm btn-outline-dark" disabled><i class="ri-download-2-line me-1"></i> Export CSV</button>
      <button class="btn btn-sm btn-outline-dark" disabled><i class="ri-file-pdf-2-line me-1"></i> Export PDF</button>
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-6 col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body py-2 px-3">
          <div class="text-muted" style="font-size: var(--font-size-sm);">Paid (PayNow / Proof)</div>
          <div class="fw-bold" style="font-size:20px;"><?php echo e($paidCount); ?></div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body py-2 px-3">
          <div class="text-muted" style="font-size: var(--font-size-sm);">Waived</div>
          <div class="fw-bold text-warning" style="font-size:20px;"><?php echo e($waivedCount); ?></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body py-2 px-3">
          <div class="text-muted" style="font-size: var(--font-size-sm);">Fee Breakdown</div>
          <div class="small text-muted" style="font-size:11px;">Enable fee schedule to compute totals per category.</div>
        </div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 fw-bold py-3"><i class="ri-table-line me-1"></i> Payment Ledgers by Category</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle small mb-0">
          <thead class="bg-light">
            <tr>
              <th class="ps-3">Category</th>
              <th class="text-center">Paid Applications</th>
              <th class="text-center">Waived Applications</th>
              <th class="text-end pe-3">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="fw-bold ps-3"><?php echo e($row['label']); ?></td>
              <td class="text-center">
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3">
                  <?php echo e($row['paid']); ?>

                </span>
              </td>
              <td class="text-center">
                <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-3">
                  <?php echo e($row['waived']); ?>

                </span>
              </td>
              <td class="text-end pe-3">
                <a href="<?php echo e(route('staff.accounts.reports.export-ledger', array_merge(['bucket' => $key], request()->query()))); ?>" class="btn btn-sm btn-outline-primary px-3">
                  <i class="ri-download-2-line me-1"></i> Download CSV
                </a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/reports_revenue.blade.php ENDPATH**/ ?>