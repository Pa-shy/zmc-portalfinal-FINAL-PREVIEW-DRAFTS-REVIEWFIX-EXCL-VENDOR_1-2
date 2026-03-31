<?php $__env->startSection('title', $title ?? 'Compliance'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;"><?php echo e($title ?? 'Compliance'); ?></h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);"><i class="ri-information-line me-1"></i>Log violations, attach evidence, and escalate for action.</div>
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
              <th>Ref</th>
              <th>Type</th>
              <th>Status</th>
              <th>Created</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="fw-semibold"><?php echo e($r->reference ?? ('#'.$r->id)); ?></td>
              <td><?php echo e($r->category ?? $r->type ?? '—'); ?></td>
              <td><span class="badge bg-secondary"><?php echo e($r->status ?? '—'); ?></span></td>
              <td><?php echo e(optional($r->created_at)->format('Y-m-d H:i')); ?></td>
              <td class="text-muted"><?php echo e(\Illuminate\Support\Str::limit($r->summary ?? $r->notes ?? '', 80)); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="text-center text-muted py-4">No compliance items found.</td></tr>
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

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/compliance_list.blade.php ENDPATH**/ ?>