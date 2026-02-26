<?php $__env->startSection('title', 'Accounts Oversight (Read-Only)'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">
        <i class="ri-eye-line me-2"></i> Accounts Oversight
      </h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        <i class="ri-information-line me-1"></i>
        Read-only view of Accounts activity. You cannot approve or reject payments from this screen.
      </div>
    </div>
    <a href="<?php echo e(route('staff.registrar.dashboard')); ?>" class="btn btn-outline-dark btn-sm">
      <i class="ri-arrow-left-line me-1"></i> Back to Dashboard
    </a>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="zmc-card h-100 border-primary">
        <div class="text-muted small fw-bold">Total Payments</div>
        <div class="h3 fw-black mb-0 text-primary"><?php echo e($paymentStats['total_payments'] ?? 0); ?></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="zmc-card h-100 border-success">
        <div class="text-muted small fw-bold">Confirmed</div>
        <div class="h3 fw-black mb-0 text-success"><?php echo e($paymentStats['confirmed'] ?? 0); ?></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="zmc-card h-100 border-warning">
        <div class="text-muted small fw-bold">Pending</div>
        <div class="h3 fw-black mb-0 text-warning"><?php echo e($paymentStats['pending'] ?? 0); ?></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="zmc-card h-100 border-danger">
        <div class="text-muted small fw-bold">Rejected</div>
        <div class="h3 fw-black mb-0 text-danger"><?php echo e($paymentStats['rejected'] ?? 0); ?></div>
      </div>
    </div>
  </div>

  <div class="zmc-card mb-4">
    <h6 class="fw-bold mb-3"><i class="ri-time-line me-1"></i> Payments Queue</h6>
    <div class="table-responsive">
      <table class="table table-sm table-hover mb-0">
        <thead>
          <tr class="text-muted small">
            <th>Reference</th>
            <th>Applicant</th>
            <th>Status</th>
            <th>PayNow Ref</th>
            <th>Proof</th>
            <th>Waiver</th>
            <th>Receipt #</th>
            <th>Last Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $paymentsQueue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="fw-bold small"><?php echo e($app->reference ?? 'APP-' . str_pad($app->id, 5, '0', STR_PAD_LEFT)); ?></td>
            <td class="small"><?php echo e($app->applicant?->name ?? '—'); ?></td>
            <td><span class="badge bg-info rounded-pill"><?php echo e(ucwords(str_replace('_', ' ', $app->status))); ?></span></td>
            <td class="small"><?php echo e($app->paynow_reference ?? $app->paynow_ref_submitted ?? '—'); ?></td>
            <td class="small">
              <?php if($app->payment_proof_path): ?>
                <span class="text-success"><i class="ri-check-line"></i> Uploaded</span>
              <?php else: ?>
                <span class="text-muted">—</span>
              <?php endif; ?>
            </td>
            <td class="small">
              <?php if($app->waiver_path): ?>
                <span class="text-info"><i class="ri-file-text-line"></i> <?php echo e(ucfirst($app->waiver_status ?? 'pending')); ?></span>
              <?php else: ?>
                <span class="text-muted">—</span>
              <?php endif; ?>
            </td>
            <td class="small"><?php echo e($app->receipt_number ?? '—'); ?></td>
            <td class="small text-muted"><?php echo e($app->last_action_at ? $app->last_action_at->format('d M Y H:i') : '—'); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="8" class="text-muted small text-center">No applications in accounts queue.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
    <?php if(method_exists($paymentsQueue, 'links')): ?>
      <div class="mt-3"><?php echo e($paymentsQueue->links()); ?></div>
    <?php endif; ?>
  </div>

  <div class="zmc-card mb-4">
    <h6 class="fw-bold mb-3"><i class="ri-money-dollar-circle-line me-1"></i> Recent Payments</h6>
    <div class="table-responsive">
      <table class="table table-sm table-hover mb-0">
        <thead>
          <tr class="text-muted small">
            <th>Payment Ref</th>
            <th>Application</th>
            <th>Method</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="fw-bold small"><?php echo e($payment->reference ?? '—'); ?></td>
            <td class="small"><?php echo e($payment->application?->reference ?? '—'); ?></td>
            <td class="small"><?php echo e(ucfirst($payment->method ?? '—')); ?></td>
            <td class="small"><?php echo e($payment->currency ?? 'USD'); ?> <?php echo e(number_format($payment->amount ?? 0, 2)); ?></td>
            <td>
              <?php
                $pBadge = match($payment->status ?? '') {
                  'paid', 'confirmed' => 'success',
                  'pending' => 'warning',
                  'rejected', 'reversed' => 'danger',
                  default => 'secondary',
                };
              ?>
              <span class="badge bg-<?php echo e($pBadge); ?> rounded-pill"><?php echo e(ucfirst($payment->status ?? '—')); ?></span>
            </td>
            <td class="small text-muted"><?php echo e($payment->created_at ? $payment->created_at->format('d M Y H:i') : '—'); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="6" class="text-muted small text-center">No recent payments.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-6">
      <div class="zmc-card h-100">
        <h6 class="fw-bold mb-3"><i class="ri-file-shield-line me-1"></i> Waiver Applications</h6>
        <div class="table-responsive">
          <table class="table table-sm mb-0">
            <thead>
              <tr class="text-muted small">
                <th>Reference</th>
                <th>Applicant</th>
                <th>Waiver Status</th>
              </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $waiverApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td class="small fw-bold"><?php echo e($wa->reference ?? '—'); ?></td>
                <td class="small"><?php echo e($wa->applicant?->name ?? '—'); ?></td>
                <td><span class="badge bg-info rounded-pill"><?php echo e(ucfirst($wa->waiver_status ?? 'pending')); ?></span></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr><td colspan="3" class="text-muted small text-center">No waiver applications.</td></tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="zmc-card h-100">
        <h6 class="fw-bold mb-3"><i class="ri-history-line me-1"></i> Payment Audit Log</h6>
        <div class="table-responsive" style="max-height:400px; overflow-y:auto;">
          <table class="table table-sm mb-0">
            <thead>
              <tr class="text-muted small">
                <th>Time</th>
                <th>Action</th>
                <th>User</th>
              </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $paymentLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td class="small text-muted"><?php echo e($log->created_at ? $log->created_at->format('d M H:i') : '—'); ?></td>
                <td class="small fw-bold"><?php echo e(str_replace('_', ' ', $log->action)); ?></td>
                <td class="small"><?php echo e($log->user?->name ?? '—'); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr><td colspan="3" class="text-muted small text-center">No payment audit logs.</td></tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/accounts_oversight.blade.php ENDPATH**/ ?>