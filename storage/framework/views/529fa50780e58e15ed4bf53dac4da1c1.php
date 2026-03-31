<?php $__env->startSection('title', 'Lookup Your Record'); ?>

<?php $__env->startSection('content'); ?>
<div id="renewals-lookup-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Lookup Your Record</h4>
    <a class="btn btn-secondary" href="<?php echo e(route('accreditation.renewals.index')); ?>">
      <i class="ri-arrow-left-line me-1"></i>Back to Renewals
    </a>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h1>AP5 — Number Lookup</h1>
      <p>Enter your accreditation number to retrieve your record</p>
    </div>

    <div class="form-steps-container">
      <div class="step-progress">
        <div class="step-progress-bar">
          <div class="step" data-step="1">
            <div class="step-number">1</div>
            <div class="step-label">Select Type</div>
          </div>
          <div class="step active" data-step="2">
            <div class="step-number">2</div>
            <div class="step-label">Number Lookup</div>
          </div>
          <div class="step" data-step="3">
            <div class="step-number">3</div>
            <div class="step-label">Confirm Changes</div>
          </div>
          <div class="step" data-step="4">
            <div class="step-number">4</div>
            <div class="step-label">Payment</div>
          </div>
        </div>
      </div>

      <?php if(session('error')): ?>
        <div class="alert alert-danger mb-3">
          <i class="ri-error-warning-line me-2"></i><?php echo e(session('error')); ?>

        </div>
      <?php endif; ?>

      <div class="step-content active">
        <h3 class="step-title">Enter Your Accreditation Number</h3>
        <div class="current-step-info">
          <i class="ri-information-line me-2"></i>
          Enter the exact number as it appears on your current accreditation card.
        </div>

        <form method="POST" action="<?php echo e(route('accreditation.renewals.perform-lookup', $renewal)); ?>">
          <?php echo csrf_field(); ?>

          <div class="form-field mb-3">
            <label class="form-label required">Accreditation Number</label>
            <input type="text" 
                   name="number" 
                   id="number" 
                   class="form-control zmc-input"
                   placeholder="Enter your accreditation number"
                   value="<?php echo e(old('number')); ?>"
                   required>
            <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="text-danger mt-1" style="font-size:12px;"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="alert alert-warning" style="font-size:12px;">
            <i class="ri-alert-line me-1"></i>
            <strong>Important:</strong> Make sure to enter the number exactly as shown on your card.
          </div>

          <div class="form-buttons">
            <a href="<?php echo e(route('accreditation.renewals.index')); ?>" class="btn btn-secondary">
              <i class="ri-arrow-left-line"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
              Search <i class="ri-search-line"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/renewals/lookup.blade.php ENDPATH**/ ?>