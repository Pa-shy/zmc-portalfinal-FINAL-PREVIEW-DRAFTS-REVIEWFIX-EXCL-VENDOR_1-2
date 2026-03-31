<?php $__env->startSection('title', $title ?? 'Unaccredited Practice Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-3" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0"><?php echo e($title ?? 'Unaccredited Practice Reports'); ?></h4>
      <div class="text-muted small mt-1"><i class="ri-information-line me-1"></i>Reports of unaccredited practice captured for follow-up.</div>
    </div>
    <div>
      <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-dashboard-3-line me-1"></i>Dashboard</a>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Report</th>
              <th>Subject</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="fw-semibold"><?php echo e($r->reference ?? ('#'.$r->id)); ?></td>
              <td><?php echo e($r->subject_name ?? $r->entity_name ?? '—'); ?></td>
              <td><span class="badge bg-secondary"><?php echo e($r->status ?? 'open'); ?></span></td>
              <td><?php echo e(optional($r->created_at)->format('Y-m-d H:i')); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="4" class="text-center text-muted py-4">No reports found.</td></tr>
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

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/unaccredited_reports.blade.php ENDPATH**/ ?>