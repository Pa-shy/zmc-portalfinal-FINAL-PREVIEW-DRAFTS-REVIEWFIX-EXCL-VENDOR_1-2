<?php $__env->startSection('title', 'Workflow Configuration'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Workflow Configuration</h4>
      <div class="text-muted" style="font-size:13px;">Manage SLA time limits and escalation rules per stage.</div>
    </div>
    <div class="d-flex gap-2">
      <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.workflow.index')); ?>">View Pipeline</a>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('admin.workflow.config')); ?>">
    <?php echo csrf_field(); ?>

    <div class="row g-3">
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white fw-semibold">SLA Settings (hours)</div>
          <div class="card-body">
            <div class="small text-muted mb-2">Used for dashboard alerts. SLA applies to how long an application can remain in the listed status.</div>
            <?php ($sla = $workflow['sla_hours'] ?? []); ?>
            <div class="table-responsive">
              <table class="table table-sm align-middle">
                <thead class="table-light"><tr><th>Status Key</th><th style="width:160px;">SLA (hours)</th></tr></thead>
                <tbody>
                  <?php $__currentLoopData = ($defaults['sla_hours'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-nowrap"><code><?php echo e($key); ?></code></td>
                      <td>
                        <input type="number" min="1" max="720" class="form-control form-control-sm" name="sla_hours[<?php echo e($key); ?>]" value="<?php echo e($sla[$key] ?? $val); ?>" />
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white fw-semibold">Escalation Rules</div>
          <div class="card-body">
            <div class="small text-muted mb-2">Define when an alert should escalate to roles (comma-separated role names).</div>
            <?php ($esc = $workflow['escalations'] ?? []); ?>
            <div class="table-responsive">
              <table class="table table-sm align-middle">
                <thead class="table-light"><tr><th>Stage Key</th><th style="width:140px;">After (hours)</th><th>Notify roles</th></tr></thead>
                <tbody>
                  <?php $__currentLoopData = ($defaults['escalations'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-nowrap"><code><?php echo e($key); ?></code></td>
                      <td><input type="number" min="1" max="720" class="form-control form-control-sm" name="escalations[<?php echo e($key); ?>][after_hours]" value="<?php echo e($esc[$key]['after_hours'] ?? $val['after_hours'] ?? ''); ?>" /></td>
                      <td><input type="text" class="form-control form-control-sm" name="escalations[<?php echo e($key); ?>][notify_roles]" value="<?php echo e($esc[$key]['notify_roles'] ?? $val['notify_roles'] ?? ''); ?>" placeholder="e.g. super_admin,registrar" /></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
      <button class="btn btn-primary">Save Workflow Settings</button>
    </div>
  </form>

  <div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-semibold">Routing Rules (Reference)</div>
    <div class="card-body">
      <div class="small text-muted">Pipeline is fixed in system logic: Officer → Accounts → Registrar → Production.</div>
      <div class="d-flex flex-wrap gap-2 mt-2">
        <span class="badge bg-light text-dark">Officer</span>
        <span class="badge bg-light text-dark">Accounts</span>
        <span class="badge bg-light text-dark">Registrar</span>
        <span class="badge bg-light text-dark">Production</span>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/admin/system/workflow_config.blade.php ENDPATH**/ ?>