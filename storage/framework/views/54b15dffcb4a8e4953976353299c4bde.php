<?php $__env->startSection('title', 'Login Activity'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Login Activity</h4>
      <div class="text-muted" style="font-size:13px;">Failed logins and last active sessions (from audit logs).</div>
    </div>
    <form class="d-flex gap-2" method="GET" action="<?php echo e(route('admin.users.login_activity')); ?>">
      <input class="form-control form-control-sm" name="q" value="<?php echo e($q); ?>" placeholder="Search (email, IP, etc.)" style="width:260px;"/>
      <button class="btn btn-sm btn-primary">Search</button>
    </form>
  </div>

  <div class="row g-3">
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Failed logins</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light">
                <tr>
                  <th>Date</th>
                  <th>IP</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $failedLogins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr>
                    <td class="text-nowrap"><?php echo e($l->created_at?->format('Y-m-d H:i')); ?></td>
                    <td class="text-nowrap"><?php echo e($l->ip); ?></td>
                    <td style="font-size:12px;"><?php echo e(is_array($l->meta) ? json_encode($l->meta) : $l->meta); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr><td colspan="3" class="text-center text-muted py-3">No failed logins found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer bg-white"><?php echo e($failedLogins->links()); ?></div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Latest successful logins</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light">
                <tr>
                  <th>Date</th>
                  <th>Actor</th>
                  <th>IP</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $lastLogins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr>
                    <td class="text-nowrap"><?php echo e($l->created_at?->format('Y-m-d H:i')); ?></td>
                    <td class="text-nowrap"><?php echo e($l->actor_user_id ? ('#'.$l->actor_user_id) : '—'); ?></td>
                    <td class="text-nowrap"><?php echo e($l->ip); ?></td>
                    <td class="text-nowrap"><?php echo e($l->action); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr><td colspan="4" class="text-center text-muted py-3">No login activity found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer bg-white"><?php echo e($lastLogins->links()); ?></div>
      </div>

      <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white fw-semibold">Last active sessions (approx.)</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light"><tr><th>User</th><th>Last seen</th></tr></thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $lastActive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr>
                    <td><?php echo e($row['user']?->name ?? ('User #'.($row['user']?->id ?? ''))); ?></td>
                    <td class="text-nowrap"><?php echo e(\Carbon\Carbon::parse($row['last_seen'])->format('Y-m-d H:i')); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr><td colspan="2" class="text-center text-muted py-3">No recent activity.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/users/login_activity.blade.php ENDPATH**/ ?>