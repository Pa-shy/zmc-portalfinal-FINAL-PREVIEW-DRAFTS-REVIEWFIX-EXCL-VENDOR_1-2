<?php $__env->startSection('title', 'Organization Profile'); ?>

<?php $__env->startSection('content'); ?>

<div id="org-profile-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Organization Profile</h4>
    <button class="btn btn-primary" id="editOrgProfileBtn">
      <i class="ri-edit-line me-2"></i>Edit Profile
    </button>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h5 class="m-0"><i class="ri-building-2-line me-2"></i>Registered Entity Information</h5>
      <p class="mt-2">Maintain your organization details. (In production this should sync from your database.)</p>
    </div>

    <div class="form-steps-container">
      <div class="text-center mb-4">
        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(Auth::user()->profile_data['organization_name'] ?? Auth::user()->name)); ?>&size=120&background=facc15&color=000&bold=true"
             class="rounded-circle" alt="Profile" width="120" height="120">
        <h5 class="mt-3 mb-1" id="orgNameHeading"><?php echo e(Auth::user()->profile_data['organization_name'] ?? Auth::user()->name); ?></h5>
        <p class="text-muted mb-1">Applicant Account Account</p>
        <div class="d-flex justify-content-center gap-2">
          <span class="badge bg-light text-dark">Ref: <?php echo e(Auth::user()->email); ?></span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Organization Name</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->profile_data['organization_name'] ?? Auth::user()->name); ?>" readonly>
        </div>
        <div class="form-field">
          <label class="form-label">Primary Contact Email</label>
          <input type="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>" readonly>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Phone</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->phone_country_code); ?> <?php echo e(Auth::user()->phone_number); ?>" readonly>
        </div>
        <div class="form-field">
          <label class="form-label">Head Office Address</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->profile_data['head_office_address'] ?? 'Not Provided'); ?>" readonly>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Type of Mass Media Activities</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->profile_data['mass_media_activities'] ?? 'Not Provided'); ?>" readonly>
        </div>
        <div class="form-field">
          <label class="form-label">Website</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->profile_data['website'] ?? 'Not Provided'); ?>" readonly>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/mediahouse/profile.blade.php ENDPATH**/ ?>