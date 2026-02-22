<?php $__env->startSection('title', 'Access Control'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Access Control</h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        Manage roles and direct permissions for <strong><?php echo e($user->name); ?></strong> <span class="text-muted">(<?php echo e($user->email); ?>)</span>
      </div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('admin.users.staff')); ?>" class="btn btn-sm btn-outline-dark"><i class="ri-arrow-left-line me-1"></i> Back</a>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

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

  <form method="POST" action="<?php echo e(route('admin.users.access.update', $user)); ?>">
    <?php echo csrf_field(); ?>

    <div class="card border-0 shadow-sm mb-4">
      <div class="card-header bg-white border-0 py-3">
        <div class="fw-bold"><i class="ri-user-settings-line me-2"></i>Account Identity</div>
        <div class="text-muted small">Update core profile details and credentials.</div>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label small fw-bold text-slate-600">Full Name</label>
            <input type="text" name="name" class="form-control rounded-3" value="<?php echo e(old('name', $user->name)); ?>" required>
          </div>
          <div class="col-md-3">
            <label class="form-label small fw-bold text-slate-600">Designation</label>
            <input type="text" name="designation" class="form-control rounded-3" value="<?php echo e(old('designation', $user->designation)); ?>" placeholder="e.g. Accounts Officer">
          </div>
          <div class="col-md-3">
            <label class="form-label small fw-bold text-slate-600">Email Address</label>
            <input type="email" name="email" class="form-control rounded-3" value="<?php echo e(old('email', $user->email)); ?>" required>
          </div>
          <div class="col-md-3">
            <label class="form-label small fw-bold text-slate-600">New Password (Optional)</label>
            <input type="password" name="password" class="form-control rounded-3" placeholder="Leave blank to keep current">
            <div class="form-text small">Min 6 characters if provided.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-12 col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header bg-white border-0 py-3">
            <div class="fw-bold"><i class="ri-shield-keyhole-line me-2"></i>Roles</div>
          </div>
          <div class="card-body">
            <div class="row g-2">
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6">
                  <label class="d-flex align-items-center gap-2 p-2 rounded" style="border:1px solid rgba(15,23,42,.08); background:#fff;">
                    <input type="checkbox" name="roles[]" value="<?php echo e($r->name); ?>" class="form-check-input m-0"
                      <?php if(in_array($r->name, $userRoleNames, true)): echo 'checked'; endif; ?>>
                    <span class="fw-bold" style="font-size:12px;"><?php echo e(str_replace('_',' ', $r->name)); ?></span>
                  </label>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="text-muted small mt-2">Roles grant permissions in bulk (recommended).</div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header bg-white border-0 py-3">
            <div class="fw-bold"><i class="ri-key-2-line me-2"></i>Direct Permissions</div>
            <div class="text-muted small">Applied in addition to permissions inherited from roles.</div>
          </div>
          <div class="card-body">
            <div class="row g-2" style="max-height:420px; overflow:auto;">
              <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6">
                  <label class="d-flex align-items-center gap-2 p-2 rounded" style="border:1px solid rgba(15,23,42,.08); background:#fff;">
                    <input type="checkbox" name="permissions[]" value="<?php echo e($p->name); ?>" class="form-check-input m-0"
                      <?php if(in_array($p->name, $userPermNames, true)): echo 'checked'; endif; ?>>
                    <span class="fw-bold" style="font-size:12px;"><?php echo e(str_replace('_',' ', $p->name)); ?></span>
                  </label>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex gap-2 mt-4">
      <button class="btn btn-primary"><i class="ri-save-3-line me-1"></i> Save access</button>
      <a href="<?php echo e(route('admin.users.staff')); ?>" class="btn btn-outline-secondary">Cancel</a>
    </div>
  </form>

  <div class="card border-danger shadow-sm mt-5" style="border-style: dashed; background: #fffafb;">
    <div class="card-header bg-transparent border-0 py-3">
      <div class="fw-bold text-danger"><i class="ri-error-warning-line me-2"></i>Danger Zone: Account Reset</div>
    </div>
    <div class="card-body">
      <p class="text-muted small">
        Initiating an account reset will deactivate the current credentials and generate a one-time setup link.
        The user will be able to choose a new <strong>username</strong>, <strong>email</strong>, and <strong>password</strong>.
        Existing data and relationships will be preserved.
      </p>

      <?php if($user->setup_token): ?>
        <div class="alert alert-info border-0 shadow-sm d-flex flex-column gap-2 mb-3">
          <div class="fw-bold small text-uppercase"><i class="ri-link me-1"></i> Setup Link Generated:</div>
          <div class="d-flex gap-2 align-items-center">
            <input type="text" class="form-control form-control-sm bg-white" readonly value="<?php echo e(url('/account/setup/' . $user->setup_token)); ?>" id="setupLink">
            <button class="btn btn-sm btn-dark" onclick="copySetupLink()"><i class="ri-file-copy-line"></i> Copy</button>
          </div>
          <div class="small opacity-75 italic">Send this link to the user to complete their account setup.</div>
        </div>
        <script>
          function copySetupLink() {
            var copyText = document.getElementById("setupLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Setup link copied to clipboard!");
          }
        </script>
      <?php endif; ?>

      <form method="POST" action="<?php echo e(route('admin.users.reset', $user)); ?>" onsubmit="return confirm('Are you sure you want to reset this account? The user will need to set new credentials.')">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-outline-danger btn-sm">
          <i class="ri-refresh-line me-1"></i> Reset Account for User Setup
        </button>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/admin/users/access.blade.php ENDPATH**/ ?>