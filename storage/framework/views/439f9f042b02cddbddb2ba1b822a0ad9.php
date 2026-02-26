<?php $__env->startSection('title', $title ?? 'Follow-up Queue'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title ?? 'Officer Follow-up Queue'); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;"><i class="ri-information-line me-1"></i>Auto-generated follow-ups for expiring items and compliance flags.</div>
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
              <th>Type</th>
              <th>Reference</th>
              <th>Due</th>
              <th>Status</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="fw-semibold"><?php echo e($it->task_type); ?></td>
              <td><?php echo e($it->reference ?? ('#'.$it->id)); ?></td>
              <td><?php echo e(optional($it->due_at)->format('Y-m-d') ?? '—'); ?></td>
              <td><span class="badge bg-secondary"><?php echo e($it->status); ?></span></td>
              <td><?php echo e(optional($it->created_at)->format('Y-m-d H:i')); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="text-center text-muted py-4">No follow-ups in the queue.</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if(method_exists($items, 'links')): ?>
        <div class="mt-3"><?php echo e($items->links()); ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/followups.blade.php ENDPATH**/ ?>