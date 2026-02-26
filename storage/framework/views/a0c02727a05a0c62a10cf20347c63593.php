<?php $__env->startSection('title', 'Permission Matrix'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Permission Matrix</h4>
      <div class="text-muted" style="font-size:13px;">Roles vs permissions overview.</div>
    </div>
    <div class="d-flex gap-2">
      <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.roles.index')); ?>">Roles</a>
      <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.permissions.index')); ?>">Permissions</a>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-sm mb-0">
          <thead class="table-light">
            <tr>
              <th>Permission</th>
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="text-center" style="white-space:nowrap;"><?php echo e($r->name); ?></th>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><code><?php echo e($p->name); ?></code></td>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td class="text-center">
                    <?php if(!empty($matrix[$r->name][$p->name])): ?>
                      <i class="ri-check-line text-success"></i>
                    <?php else: ?>
                      <i class="ri-close-line text-muted"></i>
                    <?php endif; ?>
                  </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/permissions/matrix.blade.php ENDPATH**/ ?>