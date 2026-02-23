<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('page_title', 'PROFILE'); ?>

<?php $__env->startSection('content'); ?>
<div id="profile-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Journalist Profile</h4>
    <button class="btn btn-primary" id="editProfileBtn">
      <i class="ri-edit-line me-2"></i>Edit Profile
    </button>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h5 class="m-0"><i class="ri-user-settings-line me-2"></i>Personal Information</h5>
    </div>

    <div class="form-steps-container">
      <div class="text-center mb-4">
        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(Auth::user()->name ?? 'User')); ?>&size=120&background=facc15&color=000&bold=true"
             class="rounded-circle" alt="Profile" width="120" height="120">
        <h5 class="mt-3 mb-1"><?php echo e(Auth::user()->name ?? 'User'); ?></h5>
        <p class="text-muted">Accredited Journalist</p>
        <div class="d-flex justify-content-center gap-2 mb-3">
          <span class="badge bg-light text-dark">ID: ZMC-2023-045</span>
          <span class="badge bg-success">Active</span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->name ?? ''); ?>" readonly>
        </div>
        <div class="form-field">
          <label class="form-label">National ID / Passport</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->profile_data['national_reg_no'] ?? Auth::user()->profile_data['passport_no'] ?? 'Not Provided'); ?>" readonly>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="<?php echo e(Auth::user()->email ?? ''); ?>" readonly>
        </div>
        <div class="form-field">
          <label class="form-label">Phone</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->phone_country_code); ?> <?php echo e(Auth::user()->phone_number); ?>" readonly>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  document.getElementById('editProfileBtn')?.addEventListener('click', function(){
    const inputs = document.querySelectorAll('#profile-page input');
    const isReadOnly = inputs[0].readOnly;
    inputs.forEach(i => i.readOnly = !isReadOnly);

    if(isReadOnly){
      this.classList.remove('btn-primary');
      this.classList.add('btn-success');
      this.innerHTML = '<i class="ri-save-line me-2"></i>Save Changes';
    }else{
      this.classList.remove('btn-success');
      this.classList.add('btn-primary');
      this.innerHTML = '<i class="ri-edit-line me-2"></i>Edit Profile';
      alert('Demo: Profile saved');
    }
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/accreditation/profile.blade.php ENDPATH**/ ?>