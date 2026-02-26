<?php $__env->startSection('title', 'Organization Profile'); ?>

<?php $__env->startSection('content'); ?>
<?php
  $user = Auth::user();
  $socialMedia = $user->social_media ?? [];
?>

<div id="org-profile-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Organization Profile</h4>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2 mb-3">
      <i class="ri-checkbox-circle-line" style="font-size:18px;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <?php if($errors->any()): ?>
    <div class="alert alert-danger mb-3">
      <ul class="mb-0">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($e); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('mediahouse.profile.update')); ?>">
    <?php echo csrf_field(); ?>

    <div class="form-container mb-4">
      <div class="form-header">
        <h5 class="m-0"><i class="ri-building-2-line me-2"></i>Registered Entity Information</h5>
      </div>

      <div class="form-steps-container">
        <div class="text-center mb-4">
          <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($user->profile_data['organization_name'] ?? $user->name)); ?>&size=120&background=facc15&color=000&bold=true"
               class="rounded-circle" alt="Profile" width="120" height="120">
          <h5 class="mt-3 mb-1"><?php echo e($user->profile_data['organization_name'] ?? $user->name); ?></h5>
          <p class="text-muted mb-1">Media House Account</p>
          <div class="d-flex justify-content-center gap-2">
            <span class="badge bg-light text-dark">Ref: <?php echo e($user->email); ?></span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label">Organization Name</label>
            <input type="text" name="organization_name" class="form-control" value="<?php echo e(old('organization_name', $user->profile_data['organization_name'] ?? $user->name)); ?>">
          </div>
          <div class="form-field">
            <label class="form-label">Primary Contact Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $user->email)); ?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label required">Phone Number (Primary)</label>
            <input type="text" name="phone_number" class="form-control" value="<?php echo e(old('phone_number', $user->phone_number ?? '')); ?>" placeholder="+263...">
          </div>
          <div class="form-field">
            <label class="form-label required">Phone Number (Secondary)</label>
            <input type="text" name="phone2" class="form-control" value="<?php echo e(old('phone2', $user->phone2 ?? '')); ?>" placeholder="+263...">
            <small class="text-muted">At least two phone numbers are required</small>
          </div>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label">Head Office Address</label>
            <input type="text" name="head_office_address" class="form-control" value="<?php echo e(old('head_office_address', $user->profile_data['head_office_address'] ?? '')); ?>">
          </div>
          <div class="form-field">
            <label class="form-label">Type of Mass Media Activities</label>
            <input type="text" name="mass_media_activities" class="form-control" value="<?php echo e(old('mass_media_activities', $user->profile_data['mass_media_activities'] ?? '')); ?>">
          </div>
        </div>
      </div>
    </div>

    <div class="form-container mb-4">
      <div class="form-header">
        <h5 class="m-0"><i class="ri-share-line me-2"></i>Social Media Platforms</h5>
      </div>

      <div class="form-steps-container">
        <div class="form-row">
          <div class="form-field">
            <label class="form-label"><i class="ri-facebook-fill me-1"></i> Facebook</label>
            <input type="url" name="social_media[facebook]" class="form-control" value="<?php echo e(old('social_media.facebook', $socialMedia['facebook'] ?? '')); ?>" placeholder="https://facebook.com/...">
          </div>
          <div class="form-field">
            <label class="form-label"><i class="ri-twitter-x-fill me-1"></i> X / Twitter</label>
            <input type="url" name="social_media[twitter]" class="form-control" value="<?php echo e(old('social_media.twitter', $socialMedia['twitter'] ?? '')); ?>" placeholder="https://x.com/...">
          </div>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label"><i class="ri-instagram-fill me-1"></i> Instagram</label>
            <input type="url" name="social_media[instagram]" class="form-control" value="<?php echo e(old('social_media.instagram', $socialMedia['instagram'] ?? '')); ?>" placeholder="https://instagram.com/...">
          </div>
          <div class="form-field">
            <label class="form-label"><i class="ri-youtube-fill me-1"></i> YouTube</label>
            <input type="url" name="social_media[youtube]" class="form-control" value="<?php echo e(old('social_media.youtube', $socialMedia['youtube'] ?? '')); ?>" placeholder="https://youtube.com/...">
          </div>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label"><i class="ri-tiktok-fill me-1"></i> TikTok</label>
            <input type="url" name="social_media[tiktok]" class="form-control" value="<?php echo e(old('social_media.tiktok', $socialMedia['tiktok'] ?? '')); ?>" placeholder="https://tiktok.com/...">
          </div>
          <div class="form-field">
            <label class="form-label"><i class="ri-global-line me-1"></i> Website</label>
            <input type="url" name="social_media[website]" class="form-control" value="<?php echo e(old('social_media.website', $socialMedia['website'] ?? '')); ?>" placeholder="https://...">
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">
        <i class="ri-save-line me-2"></i>Save Profile
      </button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/mediahouse/profile.blade.php ENDPATH**/ ?>