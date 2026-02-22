<?php $__env->startSection('title','User Approvals'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">User Approvals</h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        Approve or reject accounts created by IT Admin.
      </div>
    </div>
    <div>
      <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-dark">
        <i class="ri-arrow-left-line me-1"></i> Back
      </a>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <div class="zmc-card p-0 shadow-sm border-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0"><i class="ri-user-follow-line me-2" style="color:var(--zmc-accent)"></i> Pending approvals</h6>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th style="width:60px;">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Date</th>
            <th class="text-end" style="min-width:170px;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="text-muted small"><?php echo e($pending->firstItem() + $i); ?></td>
            <td class="fw-bold text-dark"><?php echo e($u->name); ?></td>
            <td><?php echo e($u->email); ?></td>
            <td>
              <?php $__currentLoopData = $u->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge bg-light text-dark border me-1"><?php echo e(strtoupper(str_replace('_',' ', $r->name))); ?></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td class="small"><?php echo e(optional($u->created_at)->format('d M Y')); ?></td>
            <td class="text-end">
              <form method="POST" action="<?php echo e(route('admin.approvals.approve', $u)); ?>" class="d-inline"><?php echo csrf_field(); ?>
                <button class="btn btn-sm btn-outline-success"><i class="ri-check-line"></i> Approve</button>
              </form>
              <form method="POST" action="<?php echo e(route('admin.approvals.reject', $u)); ?>" class="d-inline" onsubmit="return confirm('Reject / suspend this account?')"><?php echo csrf_field(); ?>
                <button class="btn btn-sm btn-outline-danger"><i class="ri-close-line"></i> Reject</button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="6" class="text-center py-5 text-muted">No pending approvals.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-3"><?php echo e($pending->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/approvals/index.blade.php ENDPATH**/ ?>