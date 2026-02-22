<?php $__env->startSection('title', $title ?? 'Suspended / Revoked'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title ?? 'Suspended / Revoked Records'); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;"><i class="ri-information-line me-1"></i>Suspended/revoked items across accreditation and registration.</div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-dashboard-3-line me-1"></i>Dashboard</a>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="fw-bold">Accreditation (Journalists)</h6>
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead><tr><th>Holder</th><th>Certificate</th><th>Status</th><th>Expires</th></tr></thead>
              <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $accreditation ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e($r->holder->name ?? '—'); ?></td>
                  <td><?php echo e($r->certificate_no ?? '—'); ?></td>
                  <td><span class="badge bg-secondary"><?php echo e($r->status); ?></span></td>
                  <td><?php echo e(optional($r->expires_at)->format('Y-m-d') ?? '—'); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="text-center text-muted py-3">No records.</td></tr>
              <?php endif; ?>
              </tbody>
            </table>
          </div>
          <?php if(($accreditation ?? null) && method_exists($accreditation, 'links')): ?>
            <div class="mt-2"><?php echo e($accreditation->links()); ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="fw-bold">Registration (Media Houses)</h6>
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead><tr><th>Entity</th><th>Reg No</th><th>Status</th><th>Expires</th></tr></thead>
              <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $registration ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e($r->entity_name ?? '—'); ?></td>
                  <td><?php echo e($r->registration_no ?? '—'); ?></td>
                  <td><span class="badge bg-secondary"><?php echo e($r->status); ?></span></td>
                  <td><?php echo e(optional($r->expires_at)->format('Y-m-d') ?? '—'); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="text-center text-muted py-3">No records.</td></tr>
              <?php endif; ?>
              </tbody>
            </table>
          </div>
          <?php if(($registration ?? null) && method_exists($registration, 'links')): ?>
            <div class="mt-2"><?php echo e($registration->links()); ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/records_suspended.blade.php ENDPATH**/ ?>