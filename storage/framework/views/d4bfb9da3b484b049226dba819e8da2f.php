<?php $__env->startSection('title','Complaints & Appeals'); ?>
<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Complaints & Appeals</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Received from the website.</div>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="zmc-card mb-3">
    <form class="row g-2 align-items-end" method="GET">
      <div class="col-12 col-md-3">
        <label class="form-label zmc-lbl">Type</label>
        <select class="form-select zmc-input" name="type">
          <option value="">All</option>
          <option value="complaint" <?php if(($type ?? '')==='complaint'): echo 'selected'; endif; ?>>Complaint</option>
          <option value="appeal" <?php if(($type ?? '')==='appeal'): echo 'selected'; endif; ?>>Appeal</option>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <label class="form-label zmc-lbl">Status</label>
        <select class="form-select zmc-input" name="status">
          <option value="">All</option>
          <?php $__currentLoopData = ['open'=>'Open','in_progress'=>'In Progress','resolved'=>'Resolved','closed'=>'Closed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($k); ?>" <?php if(($status ?? '')===$k): echo 'selected'; endif; ?>><?php echo e($v); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <button class="btn btn-dark"><i class="ri-filter-3-line me-1"></i>Filter</button>
        <a class="btn btn-light" href="<?php echo e(route('admin.complaints.index')); ?>">Reset</a>
      </div>
    </form>
  </div>

  <div class="zmc-card">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Attachment</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="fw-bold">#<?php echo e($c->id); ?></td>
            <td class="text-uppercase small"><?php echo e($c->type); ?></td>
            <td>
              <?php echo e($c->full_name); ?>

              <div class="small text-muted"><?php echo e($c->email ?? ''); ?> <?php echo e($c->phone ? '• '.$c->phone : ''); ?></div>
            </td>
            <td>
              <?php echo e($c->subject ?? '—'); ?>

              <div class="small text-muted" style="max-width:420px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo e($c->message); ?></div>
            </td>
            <td>
              <?php
                $map = ['open'=>'warning','in_progress'=>'primary','resolved'=>'success','closed'=>'secondary'];
              ?>
              <span class="badge rounded-pill bg-<?php echo e($map[$c->status] ?? 'secondary'); ?> px-3"><?php echo e(str_replace('_',' ', $c->status)); ?></span>
            </td>
            <td class="small">
              <?php if($c->attachment_path): ?>
                <a href="<?php echo e(asset('storage/'.$c->attachment_path)); ?>" target="_blank"><?php echo e($c->attachment_original_name ?? 'Download'); ?></a>
              <?php else: ?>
                —
              <?php endif; ?>
            </td>
            <td class="text-end">
              <?php if(auth()->user()->can('manage_complaints_appeals')): ?>
                <form method="POST" action="<?php echo e(route('admin.complaints.update',$c)); ?>" class="d-inline"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                  <select name="status" class="form-select form-select-sm d-inline" style="width:160px; display:inline-block;" onchange="this.form.submit()">
                    <?php $__currentLoopData = ['open'=>'Open','in_progress'=>'In Progress','resolved'=>'Resolved','closed'=>'Closed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($k); ?>" <?php if($c->status===$k): echo 'selected'; endif; ?>><?php echo e($v); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </form>
              <?php else: ?>
                —
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <div class="mt-3"><?php echo e($items->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/complaints/index.blade.php ENDPATH**/ ?>