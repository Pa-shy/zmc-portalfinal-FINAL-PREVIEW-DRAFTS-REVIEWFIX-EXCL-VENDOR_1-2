<?php $__env->startSection('title', 'Create User'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Create Staff User</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Users created here are marked as <strong>Staff</strong> by default.</div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('admin.users.staff')); ?>" class="btn btn-sm btn-outline-dark"><i class="ri-arrow-left-line me-1"></i> Back</a>
    </div>
  </div>

  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <div class="fw-bold mb-1">Please fix the following:</div>
      <ul class="mb-0">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($e); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <div class="card border-0 shadow-sm" style="max-width:820px;">
    <div class="card-body">
      <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" class="row g-3">
        <?php echo csrf_field(); ?>

        <div class="col-md-6">
          <label class="form-label fw-bold">Name</label>
          <input name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-bold">Designation</label>
          <input name="designation" value="<?php echo e(old('designation')); ?>" class="form-control" placeholder="e.g. Accreditation Officer, Registrar...">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-bold">Email</label>
          <input name="email" value="<?php echo e(old('email')); ?>" type="email" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-bold">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label fw-bold">Assign roles</label>
          <div class="p-3 rounded" style="border:1px solid var(--zmc-border); background: rgba(248,250,252,.7);">
            <div class="row g-2">
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-lg-4">
                  <label class="d-flex align-items-center gap-2 p-2 rounded" style="border:1px solid rgba(15,23,42,.08); background:#fff;">
                    <input type="checkbox" name="roles[]" value="<?php echo e($r->name); ?>" class="form-check-input m-0">
                    <span class="fw-bold" style="font-size:12px;"><?php echo e(str_replace('_',' ', $r->name)); ?></span>
                  </label>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <div class="text-muted small mt-2">Tip: Assign only what the user needs. The <strong>Director</strong> role has admin access, but is blocked from operational workflows.</div>
        </div>

        <div class="col-12 d-flex gap-2">
          <button class="btn btn-primary"><i class="ri-save-3-line me-1"></i> Create user</button>
          <a href="<?php echo e(route('admin.users.staff')); ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/users/create.blade.php ENDPATH**/ ?>