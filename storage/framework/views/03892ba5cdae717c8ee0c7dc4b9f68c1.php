<?php $__env->startSection('title', $title ?? 'Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        Users are split into separate lists:
        <strong>Staff Users</strong> and <strong>Public Users</strong>.
      </div>
    </div>
    <div class="d-flex gap-2 flex-wrap">
      <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-outline-dark"><i class="ri-arrow-left-line me-1"></i> Back</a>
      <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-sm btn-primary"><i class="ri-user-add-line me-1"></i> Create user</a>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="card border-0 shadow-sm mb-4">
    <div class="card-body d-flex flex-wrap gap-2 align-items-center">
      <div class="fw-bold me-2"><i class="ri-group-line me-1"></i> Lists</div>

      <a href="<?php echo e(route('admin.users.staff', request()->query())); ?>"
         class="btn btn-sm <?php echo e($type === 'staff' ? 'btn-dark' : 'btn-outline-dark'); ?>">
        <i class="ri-shield-user-line me-1"></i> Staff Users
        <span class="badge bg-light text-dark ms-1"><?php echo e($counts['staff'] ?? 0); ?></span>
      </a>

      <a href="<?php echo e(route('admin.users.public', request()->query())); ?>"
         class="btn btn-sm <?php echo e($type === 'public' ? 'btn-dark' : 'btn-outline-dark'); ?>">
        <i class="ri-user-smile-line me-1"></i> Public Users
        <span class="badge bg-light text-dark ms-1"><?php echo e($counts['public'] ?? 0); ?></span>
      </a>

      <div class="ms-auto w-100 w-md-auto">
        <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
          <input name="q" value="<?php echo e($q); ?>" class="form-control form-control-sm" style="max-width:360px" placeholder="Search name or email...">
          <button class="btn btn-sm btn-outline-primary"><i class="ri-search-line me-1"></i> Search</button>
          <?php if($q): ?>
            <a href="<?php echo e($type === 'staff' ? route('admin.users.staff') : route('admin.users.public')); ?>" class="btn btn-sm btn-outline-secondary">Clear</a>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
      <div class="fw-bold">
        <?php if($type === 'staff'): ?>
          <i class="ri-shield-user-line me-2"></i> Staff Users
        <?php else: ?>
          <i class="ri-user-smile-line me-2"></i> Public Users
        <?php endif; ?>
      </div>
      <span class="badge bg-dark"><?php echo e($users->total()); ?></span>
    </div>

    <div class="table-responsive">
      <table class="table zmc-table-lite mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if($type === 'staff'): ?>
              <th>Designation</th>
              <th>Roles</th>
            <?php else: ?>
              <th>Status</th>
            <?php endif; ?>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($u->id); ?></td>
              <td class="fw-bold"><?php echo e($u->name); ?></td>
              <td class="text-muted"><?php echo e($u->email); ?></td>

              <?php if($type === 'staff'): ?>
                <td class="small"><?php echo e($u->designation ?? '—'); ?></td>
                <td>
                  <?php ($r = $u->roles->pluck('name')->values()); ?>
                  <?php if($r->isEmpty()): ?>
                    <span class="text-muted">—</span>
                  <?php else: ?>
                    <div class="d-flex flex-wrap gap-1">
                      <?php $__currentLoopData = $r; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge bg-light text-dark" style="border:1px solid rgba(15,23,42,.12)"><?php echo e(str_replace('_',' ', $rn)); ?></span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <?php endif; ?>
                </td>
              <?php else: ?>
                <td>
                  <?php ($status = $u->account_status ?? 'active'); ?>
                  <span class="badge rounded-pill bg-<?php echo e($status === 'active' ? 'success' : 'secondary'); ?> px-3">
                    <?php echo e(strtoupper($status)); ?>

                  </span>
                </td>
              <?php endif; ?>

              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.users.access.edit', $u)); ?>">
                  <i class="ri-user-settings-line me-1"></i> Access
                </a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">No users found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="card-body pt-3">
      <?php echo e($users->links()); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/admin/users/list.blade.php ENDPATH**/ ?>