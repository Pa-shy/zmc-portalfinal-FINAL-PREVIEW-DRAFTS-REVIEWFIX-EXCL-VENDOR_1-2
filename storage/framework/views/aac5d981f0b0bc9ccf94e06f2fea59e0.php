<?php $__env->startSection('title', 'Manage Applicants'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Applicant Account Management</h4>
    <a href="<?php echo e(route('staff.it.dashboard')); ?>" class="btn btn-outline-dark btn-sm">
      <i class="ri-arrow-left-line me-1"></i> Back to Dashboard
    </a>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success border-0 shadow-sm d-flex align-items-center gap-2 mb-4">
      <i class="ri-checkbox-circle-fill text-success" style="font-size:20px;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="zmc-card p-0 shadow-sm border-0">
    <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0">Applicants List</h6>
      <div class="small text-muted"><?php echo e($applicants->total()); ?> total accounts</div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registered At</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td>
              <div class="fw-bold text-dark"><?php echo e($u->name); ?></div>
              <div class="small text-muted">ID: #<?php echo e($u->id); ?></div>
            </td>
            <td><?php echo e($u->email); ?></td>
            <td class="small"><?php echo e($u->created_at->format('d M Y')); ?></td>
            <td class="text-end">
              <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#resetModal<?php echo e($u->id); ?>">
                <i class="ri-refresh-line me-1"></i> Reset / Edit
              </button>
            </td>
          </tr>

          
          <div class="modal fade" id="resetModal<?php echo e($u->id); ?>" tabindex="-1">
            <div class="modal-dialog">
              <form action="<?php echo e(route('staff.it.applicants.reset', $u)); ?>" method="POST" class="modal-content text-start">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                  <h5 class="modal-title">Reset Profile: <?php echo e($u->name); ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <p class="small text-danger mb-3">
                    <i class="ri-error-warning-line me-1"></i> 
                    Changing these details will allow the applicant to login with new credentials. 
                    Their dashboard data remains intact.
                  </p>
                  <div class="mb-3">
                    <label class="form-label small fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($u->name); ?>">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo e($u->email); ?>">
                  </div>
                  <div class="mb-0">
                    <label class="form-label small fw-bold">New Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Leave blank to keep current">
                    <div class="small text-muted mt-1">Minimum 6 characters.</div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <?php if($applicants->hasPages()): ?>
    <div class="p-3 border-top">
      <?php echo e($applicants->links()); ?>

    </div>
    <?php endif; ?>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/it/applicants.blade.php ENDPATH**/ ?>