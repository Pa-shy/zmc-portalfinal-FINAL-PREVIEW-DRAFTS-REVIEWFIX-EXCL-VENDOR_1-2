<?php $__env->startSection('title', 'Oversight Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h4 class="fw-bold m-0">Oversight</h4>
    <div class="text-muted small">Read-only visibility across the entire process. Search + filters + view logs.</div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-body">
    <form class="row g-2" method="GET">
      <div class="col-md-3">
        <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" placeholder="Search ref / name">
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select">
          <option value="">All statuses</option>
          <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($s); ?>" <?php if(request('status')===$s): echo 'selected'; endif; ?>><?php echo e(str_replace('_',' ', $s)); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="col-md-3">
        <select name="region" class="form-select">
          <option value="">All regions</option>
          <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($r); ?>" <?php if(request('region')===$r): echo 'selected'; endif; ?>><?php echo e($r); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="col-md-3 d-grid">
        <button class="btn btn-dark" type="submit">Filter</button>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header fw-bold">All Applications (Read-only)</div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Reference</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Status</th>
            <th>Region</th>
            <th>Last Action</th>
            <th class="text-end">View</th>
          </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($applications->firstItem() + $i); ?></td>
            <td class="fw-semibold"><?php echo e($app->reference); ?></td>
            <td><?php echo e($app->applicant?->name ?? '—'); ?></td>
            <td class="text-capitalize"><?php echo e($app->application_type); ?></td>
            <td><span class="badge bg-info"><?php echo e(str_replace('_',' ', $app->status)); ?></span></td>
            <td class="text-capitalize"><?php echo e($app->collection_region ?? '—'); ?></td>
            <td class="small text-muted">
              <?php echo e($app->last_action_at ? $app->last_action_at->format('d M Y H:i') : '—'); ?>

            </td>
            <td class="text-end">
              <a href="<?php echo e(route('staff.oversight.applications.show', $app)); ?>" class="btn btn-sm btn-primary">View</a>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="8" class="text-center py-4 text-muted">No records found.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  <?php echo e($applications->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/oversight/dashboard.blade.php ENDPATH**/ ?>