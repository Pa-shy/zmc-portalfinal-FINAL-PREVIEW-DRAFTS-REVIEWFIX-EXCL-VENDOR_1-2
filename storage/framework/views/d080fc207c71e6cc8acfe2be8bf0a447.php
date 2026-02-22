<?php $__env->startSection('title', 'Regions & Offices'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Regions & Offices</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Catalogue of offices used for assignments and reporting.</div>
    </div>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-secondary"><i class="ri-arrow-left-line me-1"></i>Back</a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0">
      <div class="fw-semibold">Regional Offices</div>
      <div class="text-muted" style="font-size:12px;">We can wire this to a database table (regional_offices) when you're ready.</div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm align-middle">
          <thead>
            <tr>
              <th>Office</th>
              <th>Code</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="fw-semibold"><?php echo e($o['name']); ?></td>
                <td><span class="badge bg-secondary"><?php echo e($o['code']); ?></span></td>
                <td><span class="badge <?php echo e($o['status']==='Active' ? 'bg-success' : 'bg-warning text-dark'); ?>"><?php echo e($o['status']); ?></span></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>

      <div class="alert alert-info mt-3 mb-0" style="font-size:13px;">
        If you want, we can add: assigned officers per office, office schedules, and regional performance KPIs.
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/system/regions.blade.php ENDPATH**/ ?>