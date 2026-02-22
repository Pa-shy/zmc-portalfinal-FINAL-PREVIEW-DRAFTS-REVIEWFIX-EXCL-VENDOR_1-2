<?php $__env->startSection('title', 'System Health'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">System Health</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Operational visibility: queues, stuck items, environment.</div>
    </div>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-secondary"><i class="ri-arrow-left-line me-1"></i>Back</a>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0">
          <div class="fw-semibold">Database</div>
        </div>
        <div class="card-body">
          <?php if($dbOk): ?>
            <div class="alert alert-success mb-0"><i class="ri-checkbox-circle-line me-1"></i> Database connection OK</div>
          <?php else: ?>
            <div class="alert alert-danger mb-0"><i class="ri-error-warning-line me-1"></i> Database connection FAILED</div>
          <?php endif; ?>

          <div class="mt-3">
            <div class="fw-semibold mb-2">Environment</div>
            <div class="small text-muted">APP_ENV: <span class="text-dark fw-semibold"><?php echo e($env['app_env']); ?></span></div>
            <div class="small text-muted">DEBUG: <span class="text-dark fw-semibold"><?php echo e($env['app_debug'] ? 'true' : 'false'); ?></span></div>
            <div class="small text-muted">PHP: <span class="text-dark fw-semibold"><?php echo e($env['php_version']); ?></span></div>
            <div class="small text-muted">Laravel: <span class="text-dark fw-semibold"><?php echo e($env['laravel_version']); ?></span></div>
            <div class="small text-muted">DB: <span class="text-dark fw-semibold"><?php echo e($env['db_connection']); ?></span></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0">
          <div class="fw-semibold">Queue Snapshot</div>
          <div class="text-muted" style="font-size:12px;">Counts by stage (Officer → Accounts → Registrar → Production)</div>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <?php $__currentLoopData = $stageCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-6 col-md-3">
                <div class="p-3 rounded" style="border:1px solid #e2e8f0; background:#fff;">
                  <div class="text-muted" style="font-size:12px;"><?php echo e($stage); ?></div>
                  <div class="fw-bold" style="font-size:22px;"><?php echo e($count); ?></div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white border-0">
          <div class="fw-semibold">Stuck Applications</div>
          <div class="text-muted" style="font-size:12px;">Not updated in 7+ days and not completed/rejected.</div>
        </div>
        <div class="card-body">
          <?php if($stuck->isEmpty()): ?>
            <div class="text-muted">No stuck items detected.</div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-sm align-middle">
                <thead>
                  <tr>
                    <th>Application</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $stuck; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="fw-semibold">#<?php echo e($a->id); ?> • <?php echo e($a->application_type); ?></td>
                      <td><span class="badge bg-warning text-dark"><?php echo e($a->status); ?></span></td>
                      <td class="text-muted"><?php echo e($a->updated_at?->format('Y-m-d H:i')); ?></td>
                      <td class="text-end">
                        <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.applications.show', $a)); ?>">View</a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/admin/system/health.blade.php ENDPATH**/ ?>