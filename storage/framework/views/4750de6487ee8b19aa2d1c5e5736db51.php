<?php $__env->startSection('title', $title ?? 'Documents'); ?>

<?php $__env->startSection('content'); ?>
<?php
  // Defensive defaults: prevent 500s if a controller forgets to pass variables.
  $title = $title ?? 'Documents';
  $documents = $documents ?? ($docs ?? collect());
?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color: var(--zmc-text-dark);"><?php echo e($title); ?></h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);"><i class="ri-information-line me-1"></i>Preview and verify uploaded documents.</div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-dashboard-3-line me-1"></i>Dashboard</a>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Application</th>
              <th>Applicant</th>
              <th>Doc Type</th>
              <th>Status</th>
              <th>Uploaded</th>
              <th class="text-end">File</th>
            </tr>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($doc->application->reference ?? ('#'.$doc->application_id)); ?></td>
              <td><?php echo e($doc->application->applicant->name ?? '—'); ?></td>
              <td class="fw-semibold"><?php echo e($doc->doc_type); ?></td>
              <td>
                <span class="badge bg-secondary"><?php echo e($doc->verification_status ?? ($doc->status ?? 'pending')); ?></span>
              </td>
              <td><?php echo e(optional($doc->created_at)->format('Y-m-d H:i')); ?></td>
              <td class="text-end">
                <?php if(!empty($doc->file_path)): ?>
                  <a class="btn btn-sm btn-outline-primary" target="_blank" href="<?php echo e(asset('storage/'.ltrim($doc->file_path,'/'))); ?>">
                    <i class="ri-eye-line me-1"></i>Preview
                  </a>
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="text-center text-muted py-4">No documents found.</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if(method_exists($documents, 'links')): ?>
        <div class="mt-3"><?php echo e($documents->links()); ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/documents_list.blade.php ENDPATH**/ ?>