<?php $__env->startSection('title', 'Regions & Offices'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Regions & Offices</h4>
      <div class="text-muted" style="font-size:13px;">Maintain regional offices, schedules, and staff assignments.</div>
    </div>
    <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.regions.index')); ?>">Catalogue</a>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <div class="row g-3">
    <div class="col-lg-8">
      <form method="POST" action="<?php echo e(route('admin.regions.offices')); ?>">
        <?php echo csrf_field(); ?>
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white fw-semibold d-flex align-items-center justify-content-between">
            <span>Offices</span>
            <span class="small text-muted">Assigned staff IDs are comma-separated</span>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-sm align-middle mb-0" id="officeTable">
                <thead class="table-light"><tr><th>Office</th><th style="width:90px;">Code</th><th style="width:140px;">Region</th><th>Schedule</th><th>Assigned staff (IDs)</th><th style="width:70px;"></th></tr></thead>
                <tbody>
                  <?php $__currentLoopData = ($cfg['offices'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><input class="form-control form-control-sm" name="offices[<?php echo e($i); ?>][name]" value="<?php echo e($o['name'] ?? ''); ?>" /></td>
                      <td><input class="form-control form-control-sm" name="offices[<?php echo e($i); ?>][code]" value="<?php echo e($o['code'] ?? ''); ?>" /></td>
                      <td><input class="form-control form-control-sm" name="offices[<?php echo e($i); ?>][region]" value="<?php echo e($o['region'] ?? ''); ?>" /></td>
                      <td><input class="form-control form-control-sm" name="offices[<?php echo e($i); ?>][schedule]" value="<?php echo e($o['schedule'] ?? ''); ?>" placeholder="e.g. Mon–Fri 08:00–16:30" /></td>
                      <td><input class="form-control form-control-sm" name="offices[<?php echo e($i); ?>][assigned_user_ids]" value="<?php echo e(implode(',', $o['assigned_user_ids'] ?? [])); ?>" placeholder="e.g. 12,15" /></td>
                      <td class="text-end"><button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('tr').remove()">Remove</button></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-white d-flex justify-content-between">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addOfficeRow()">Add office</button>
            <button class="btn btn-primary">Save Offices</button>
          </div>
        </div>
      </form>

      <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white fw-semibold">Staff directory (IDs)</div>
        <div class="card-body">
          <div class="small text-muted mb-2">Use these IDs when assigning staff to an office.</div>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead class="table-light"><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
              <tbody>
                <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($u->id); ?></td>
                    <td><?php echo e($u->name); ?></td>
                    <td><?php echo e($u->email); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Regional performance (applications)</div>
        <div class="card-body">
          <div class="small text-muted mb-2">Uses <code>applications.region</code> (if populated).</div>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead class="table-light"><tr><th>Region</th><th class="text-end">Total</th></tr></thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $perf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr><td><?php echo e($r->region); ?></td><td class="text-end"><?php echo e($r->total); ?></td></tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr><td colspan="2" class="text-center text-muted py-3">No region data found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function addOfficeRow(){
    const tbody = document.querySelector('#officeTable tbody');
    const i = tbody.querySelectorAll('tr').length;
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td><input class="form-control form-control-sm" name="offices[${i}][name]" /></td>
      <td><input class="form-control form-control-sm" name="offices[${i}][code]" /></td>
      <td><input class="form-control form-control-sm" name="offices[${i}][region]" /></td>
      <td><input class="form-control form-control-sm" name="offices[${i}][schedule]" placeholder="Mon–Fri 08:00–16:30" /></td>
      <td><input class="form-control form-control-sm" name="offices[${i}][assigned_user_ids]" placeholder="12,15" /></td>
      <td class="text-end"><button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('tr').remove()">Remove</button></td>
    `;
    tbody.appendChild(tr);
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/system/regions_offices.blade.php ENDPATH**/ ?>