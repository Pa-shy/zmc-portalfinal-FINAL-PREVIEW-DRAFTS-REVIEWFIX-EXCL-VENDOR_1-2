<?php $__env->startSection('title', 'Physical Intake'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">Physical / Walk-in Intake</h4>
  <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-secondary btn-sm">Back to Dashboard</a>
</div>

<?php if(session('success')): ?>
  <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($e); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>

<div class="card">
  <div class="card-header fw-bold">Record Physical Intake</div>
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('staff.officer.physical-intake.process')); ?>">
      <?php echo csrf_field(); ?>

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Application Type <span class="text-danger">*</span></label>
          <select name="application_type" class="form-select" required>
            <option value="">-- Select --</option>
            <option value="accreditation" <?php if(old('application_type') === 'accreditation'): echo 'selected'; endif; ?>>Accreditation (Media Practitioner)</option>
            <option value="registration" <?php if(old('application_type') === 'registration'): echo 'selected'; endif; ?>>Registration (Media House)</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Request Type <span class="text-danger">*</span></label>
          <select name="request_type" class="form-select" required>
            <option value="">-- Select --</option>
            <option value="new" <?php if(old('request_type') === 'new'): echo 'selected'; endif; ?>>New</option>
            <option value="renewal" <?php if(old('request_type') === 'renewal'): echo 'selected'; endif; ?>>Renewal</option>
            <option value="replacement" <?php if(old('request_type') === 'replacement'): echo 'selected'; endif; ?>>Replacement</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Accreditation / Registration Number <span class="text-danger">*</span></label>
          <input type="text" name="lookup_number" class="form-control" value="<?php echo e(old('lookup_number')); ?>" required placeholder="e.g. J12345678E or MC00001234">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Receipt Number <span class="text-danger">*</span></label>
          <input type="text" name="receipt_number" class="form-control" value="<?php echo e(old('receipt_number')); ?>" required placeholder="Enter receipt number">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Applicant Name</label>
          <input type="text" name="applicant_name" class="form-control" value="<?php echo e(old('applicant_name')); ?>" placeholder="Full name (optional)">
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Notes</label>
          <textarea name="notes" class="form-control" rows="3" placeholder="Any additional notes..."><?php echo e(old('notes')); ?></textarea>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary">
          <i class="ri-check-line me-1"></i> Record & Add to Production Queue
        </button>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/physical_intake.blade.php ENDPATH**/ ?>