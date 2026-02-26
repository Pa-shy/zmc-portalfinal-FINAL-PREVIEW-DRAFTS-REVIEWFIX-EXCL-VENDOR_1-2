<?php $__env->startSection('content'); ?>
<div style="padding:20px;max-width:980px">
  <h2>Edit role: <?php echo e($role->name); ?></h2>

  <?php if(session('success')): ?>
    <div style="background:#dcfce7;color:#166534;padding:10px;border-radius:8px;margin:10px 0;">
      <?php echo e(session('success')); ?>

    </div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('admin.roles.update', $role)); ?>">
    <?php echo csrf_field(); ?>

    <div style="display:flex;flex-wrap:wrap;gap:10px;padding:12px;border:1px solid #e5e7eb;border-radius:10px;">
      <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label style="display:flex;align-items:center;gap:6px;">
          <input type="checkbox" name="permissions[]" value="<?php echo e($p->name); ?>" <?php if(in_array($p->name, $rolePerms, true)): echo 'checked'; endif; ?>>
          <?php echo e($p->name); ?>

        </label>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button style="padding:10px 14px;margin-top:16px;">Save</button>
    <a href="<?php echo e(route('admin.roles.index')); ?>" style="margin-left:10px;">Back</a>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>