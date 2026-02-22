<?php $__env->startSection('title', $title ?? 'Records'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title ?? 'Records'); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;"><i class="ri-information-line me-1"></i>Issued records (active, expired, etc.).</div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-dashboard-3-line me-1"></i>Dashboard</a>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Number</th>
              <th>Holder / Contact</th>
              <th>Status</th>
              <th>Issued</th>
              <th>Expires</th>
              <th class="text-end">QR</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="fw-semibold"><?php echo e($row->record_number ?? $row->certificate_no ?? ('#'.$row->id)); ?></td>
              <td><?php echo e($row->holder->name ?? $row->contact->name ?? $row->contact_name ?? '—'); ?></td>
              <td><span class="badge bg-secondary"><?php echo e($row->status ?? '—'); ?></span></td>
              <td><?php echo e(optional($row->issued_at)->format('Y-m-d') ?? '—'); ?></td>
              <td>
                <?php
                  $expires = optional($row->expires_at);
                ?>
                <?php echo e($expires?->format('Y-m-d') ?? '—'); ?>

              </td>
              <td class="text-end">
                <?php if(!empty($row->qr_token)): ?>
                  <code><?php echo e($row->qr_token); ?></code>
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted py-4">No records found.</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if(method_exists($rows, 'links')): ?>
        <div class="mt-3"><?php echo e($rows->links()); ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/records_list.blade.php ENDPATH**/ ?>