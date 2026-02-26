<?php $__env->startSection('title', 'Application Audits'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Application & Accreditation Audits</h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        <i class="ri-information-line me-1"></i>
        Verify decisions, consistency and workflow compliance. Flag irregularities for follow-up.
      </div>
    </div>
    <div class="d-flex gap-2">
      <a class="btn btn-success btn-sm" href="<?php echo e(route('staff.auditor.applications.csv', request()->query())); ?>">
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
      <div class="col-md-2">
        <label class="form-label small text-muted">Application Type</label>
        <select class="form-select form-select-sm" name="application_type">
          <option value="">All</option>
          <?php $__currentLoopData = \App\Models\Application::bucketLabels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($k); ?>" <?php if(request('application_type')===$k): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="col-md-2">
        <label class="form-label small text-muted">Status</label>
        <input class="form-control form-control-sm" name="status" value="<?php echo e(request('status')); ?>" placeholder="e.g. officer_review">
      </div>

      <div class="col-md-2">
        <label class="form-label small text-muted">From</label>
        <input type="date" class="form-control form-control-sm" name="date_from" value="<?php echo e(request('date_from', request('from'))); ?>">
      </div>
      <div class="col-md-2">
        <label class="form-label small text-muted">To</label>
        <input type="date" class="form-control form-control-sm" name="date_to" value="<?php echo e(request('date_to', request('to'))); ?>">
      </div>
      <div class="col-md-4">
        <label class="form-label small text-muted">Search</label>
        <input class="form-control form-control-sm" name="search" value="<?php echo e(request('search')); ?>" placeholder="Ref / applicant / email / PayNow ref">
      </div>
      <div class="col-md-8 d-flex gap-2">
        <button class="btn btn-dark btn-sm" type="submit"><i class="ri-filter-3-line me-1"></i>Filter</button>
        <a class="btn btn-white border btn-sm" href="<?php echo e(route('staff.auditor.applications')); ?>">Reset</a>
      </div>
    </form>
  </div>

  <div class="zmc-card shadow-sm border-0 p-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0"><i class="ri-file-search-line me-2" style="color:var(--zmc-accent)"></i>Applications</h6>
      <div class="small text-muted">Showing <?php echo e($applications->count()); ?> of <?php echo e($applications->total()); ?></div>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead>
          <tr>
            <th>Ref</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Request</th>
            <th>Scope</th>
            <th>Status</th>
            <th>Payment</th>
            <th style="width:240px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $hasPayment = !empty($a->paynow_confirmed_at) || ($a->proof_status === 'approved') || ($a->waiver_status === 'approved');
              $isApprovedStage = in_array($a->status, [\App\Models\Application::PAID_CONFIRMED, \App\Models\Application::PRODUCTION_QUEUE, \App\Models\Application::CARD_GENERATED, \App\Models\Application::CERT_GENERATED, \App\Models\Application::PRINTED, \App\Models\Application::ISSUED], true);
              $irregular = $isApprovedStage && !$hasPayment;
            ?>
            <tr <?php if($irregular): ?> style="background:#fff7ed;" <?php endif; ?>>
              <td class="fw-bold"><?php echo e($a->reference); ?></td>
              <td>
                <div class="fw-semibold"><?php echo e($a->applicant->name ?? '—'); ?></div>
                <div class="small text-muted"><?php echo e($a->applicant->email ?? '—'); ?></div>
              </td>
              <td class="small"><?php echo e($a->application_type); ?></td>
              <td class="small"><?php echo e($a->request_type); ?></td>
              <td class="small"><?php echo e($a->journalist_scope ?? '—'); ?></td>
              <td class="small fw-bold"><?php echo e($a->status); ?></td>
              <td class="small">
                <?php if(!empty($a->paynow_confirmed_at)): ?>
                  <span class="badge bg-success">PayNow</span>
                <?php elseif($a->proof_status==='approved'): ?>
                  <span class="badge bg-success">Proof</span>
                <?php elseif($a->waiver_status==='approved'): ?>
                  <span class="badge bg-success">Waiver</span>
                <?php else: ?>
                  <span class="badge bg-warning text-dark">Unverified</span>
                <?php endif; ?>
                <?php if($irregular): ?>
                  <div class="small" style="color:#dc2626;">Irregular approved stage</div>
                <?php endif; ?>
              </td>
              <td>
                <form method="POST" action="<?php echo e(route('staff.auditor.flag')); ?>" class="d-flex gap-2">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="entity_type" value="application">
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
            <tr><td colspan="8" class="text-center py-5 text-muted">No applications found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3"><?php echo e($applications->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/auditor/applications.blade.php ENDPATH**/ ?>