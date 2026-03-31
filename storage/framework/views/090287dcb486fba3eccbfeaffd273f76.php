<?php $__env->startSection('title', 'Create User (IT Admin)'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-outline-dark">
      <i class="ri-arrow-left-line me-1"></i> Back
    </a>
  </div>
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">Create User</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">
        <i class="ri-information-line me-1"></i>
        Users created here require approval by Super Admin or Director.
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="<?php echo e(route('staff.it.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3 d-none d-md-inline">
        <i class="ri-dashboard-3-line me-1"></i> Dashboard
      </a>
    </div>
  </div>

  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($e); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <div class="zmc-card">
    <form method="POST" action="<?php echo e(route('staff.it.users.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-12 col-md-4">
          <label class="form-label zmc-lbl">Name</label>
          <input class="form-control zmc-input" name="name" value="<?php echo e(old('name')); ?>" required>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label zmc-lbl">Email</label>
          <input class="form-control zmc-input" name="email" type="email" value="<?php echo e(old('email')); ?>" required>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label zmc-lbl">Temp Password</label>
          <input class="form-control zmc-input" name="password" type="text" value="<?php echo e(old('password')); ?>" required>
        </div>

        <div class="col-12">
          <label class="form-label zmc-lbl">Assign Role(s) (requested)</label>
          <div class="row g-2">
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-12 col-md-3">
                <label class="d-flex align-items-center gap-2 p-2 border rounded" style="background:#fff; cursor:pointer;">
                  <input type="checkbox" name="roles[]" value="<?php echo e($role->name); ?>" <?php if(in_array($role->name, old('roles', []))): echo 'checked'; endif; ?>>
                  <span class="small fw-bold"><?php echo e(strtoupper(str_replace('_',' ', $role->name))); ?></span>
                </label>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        <div class="col-12 mt-4">
          <label class="form-label zmc-lbl">Assign Regional Jurisdiction (for Accreditation Officers)</label>
          <div class="row g-2">
            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-12 col-md-3">
                <label class="d-flex align-items-center gap-2 p-2 border rounded" style="background:#fff; cursor:pointer;">
                  <input type="checkbox" name="assigned_regions[]" value="<?php echo e($region->id); ?>" <?php if(in_array($region->id, old('assigned_regions', []))): echo 'checked'; endif; ?>>
                  <div>
                    <div class="small fw-bold"><?php echo e($region->name); ?></div>
                    <?php if($region->expires_at): ?>
                      <div class="text-danger" style="font-size:10px;">Expires: <?php echo e($region->expires_at->format('d M Y')); ?></div>
                    <?php endif; ?>
                  </div>
                </label>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="form-text mt-2">Accreditation Officers will only see applications for their assigned regions.</div>
        </div>
      </div>

      <div class="mt-3 d-flex justify-content-end">
        <button class="btn btn-dark fw-bold px-4" type="submit">
          <i class="ri-user-add-line me-1"></i> Create & Queue
        </button>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/it/create-user.blade.php ENDPATH**/ ?>