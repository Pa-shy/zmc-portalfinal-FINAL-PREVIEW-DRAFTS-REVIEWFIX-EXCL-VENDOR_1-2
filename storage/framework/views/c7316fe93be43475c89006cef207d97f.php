<?php $__env->startSection('title', 'Forgot Password'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-card">
  <div class="auth-header">
    <h1>Forgot your password?</h1>
    <p>Enter your email address and we'll send you a reset link.</p>
  </div>

  <?php if(session('status')): ?>
    <div class="alert alert-success"><?php echo e(session('status')); ?></div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('password.email')); ?>">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required autofocus>
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger small mt-1"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button class="btn btn-primary w-100" type="submit">Send reset link</button>
  </form>

  <div class="text-center mt-3">
    <a href="<?php echo e(route('login')); ?>">Back to sign in</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>