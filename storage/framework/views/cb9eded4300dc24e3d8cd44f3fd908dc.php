<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startSection('content'); ?>
<div id="settings-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Settings</h4>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h5 class="m-0"><i class="ri-settings-3-line me-2"></i>Account Settings</h5>
    </div>

    <div class="form-steps-container">
      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Organization Display Name</label>
          <input type="text" class="form-control" value="Mass Media Service">
        </div>
        <div class="form-field">
          <label class="form-label">Notification Email</label>
          <input type="email" class="form-control" value="info@mediahouse.co.zw">
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Phone Number</label>
          <input type="text" class="form-control" value="<?php echo e(Auth::user()->phone_number ?? ''); ?>">
        </div>
        <div class="form-field">
          <label class="form-label">Theme</label>
          <div class="d-flex align-items-center gap-3">
            <select class="form-control" id="themeSelect" style="max-width:200px;">
              <option value="light" <?php if((Auth::user()->theme ?? 'light') === 'light'): echo 'selected'; endif; ?>>Light</option>
              <option value="dark" <?php if((Auth::user()->theme ?? 'light') === 'dark'): echo 'selected'; endif; ?>>Dark</option>
            </select>
            <span class="text-muted small" id="themeSaveStatus"></span>
          </div>
        </div>
      </div>

      <div class="form-buttons">
        <button type="button" class="btn btn-primary" onclick="alert('Demo: Settings saved')">
          Save Changes
        </button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  document.getElementById('themeSelect')?.addEventListener('change', function(){
    const theme = this.value;
    const status = document.getElementById('themeSaveStatus');
    fetch('<?php echo e(route("settings.theme.ajax")); ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        'Accept': 'application/json'
      },
      body: JSON.stringify({ theme: theme })
    })
    .then(r => r.json())
    .then(data => {
      if(data.success){
        document.body.className = 'theme-' + theme;
        if(status) status.textContent = 'Saved!';
        setTimeout(() => { if(status) status.textContent = ''; }, 2000);
      }
    })
    .catch(() => {
      if(status) status.textContent = 'Error saving';
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/mediahouse/settings.blade.php ENDPATH**/ ?>