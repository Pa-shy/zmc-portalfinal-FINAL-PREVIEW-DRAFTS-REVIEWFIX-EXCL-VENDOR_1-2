<?php $__env->startSection('title', $title ?? 'Applications'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title ?? 'Applications'); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;"><i class="ri-information-line me-1"></i>Click a row to open the application.</div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-dashboard-3-line me-1"></i>Dashboard</a>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Ref</th>
              <th>Applicant</th>
              <th>Type</th>
              <th>Status</th>
              <th>Submitted</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="fw-semibold"><?php echo e($app->reference ?? ('#'.$app->id)); ?></td>
              <td><?php echo e($app->applicant->name ?? '—'); ?></td>
              <td><?php echo e($app->application_type ?? '—'); ?></td>
              <td><span class="badge bg-secondary"><?php echo e($app->status); ?></span></td>
              <td><?php echo e(optional($app->submitted_at)->format('Y-m-d H:i') ?? optional($app->created_at)->format('Y-m-d H:i')); ?></td>
              <td class="text-end">
  <div class="zmc-action-strip justify-content-end">
    <a href="<?php echo e(route('staff.officer.applications.show', $app)); ?>#correction" class="btn btn-sm zmc-icon-btn btn-outline-dark" title="Request correction">
      <i class="fa-regular fa-comment-dots"></i>
    </a>
    <a href="<?php echo e(route('staff.officer.applications.show', $app)); ?>" class="btn btn-sm zmc-icon-btn btn-outline-primary" title="View application">
      <i class="fa-regular fa-eye"></i>
    </a>
    <a href="<?php echo e(route('staff.officer.applications.show', $app)); ?>#approve" class="btn btn-sm zmc-icon-btn btn-outline-success" title="Approve">
      <i class="fa-solid fa-check"></i>
    </a>
    <a href="<?php echo e(route('staff.officer.applications.show', $app)); ?>#message" class="btn btn-sm zmc-icon-btn btn-outline-secondary" title="Message">
      <i class="fa-regular fa-envelope"></i>
    </a>
  </div>
</td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted py-4">No applications found.</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if(method_exists($applications, 'links')): ?>
        <div class="mt-3"><?php echo e($applications->links()); ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/applications_list.blade.php ENDPATH**/ ?>