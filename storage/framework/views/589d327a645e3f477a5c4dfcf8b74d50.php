<?php $__env->startSection('title', 'Downloads'); ?>
<?php $__env->startSection('page_title', 'DOWNLOADS'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Downloads</h4>
  <a class="btn btn-secondary" href="<?php echo e(url()->previous()); ?>"><i class="ri-arrow-left-line me-1"></i>Back</a>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body">
    <p class="text-muted mb-3">Download your uploaded documents and any generated files associated with your applications.</p>

    <?php if($docs->count() === 0): ?>
      <div class="alert alert-info mb-0">No downloadable files yet.</div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Application</th>
              <th>Type</th>
              <th>File</th>
              <th>Uploaded</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><span class="badge bg-light text-dark"><?php echo e($doc->application->reference); ?></span></td>
                <td><?php echo e($doc->document_type); ?></td>
                <td class="text-truncate" style="max-width:280px;"><?php echo e($doc->original_name ?: basename($doc->file_path)); ?></td>
                <td class="text-muted"><?php echo e($doc->created_at?->format('d M Y H:i')); ?></td>
                <td class="text-end">
                  <a class="btn btn-sm btn-primary" href="<?php echo e(route(str_starts_with(Route::currentRouteName(),'mediahouse.') ? 'mediahouse.downloads.file' : 'accreditation.downloads.file', $doc)); ?>">
                    <i class="ri-download-2-line me-1"></i>Download
                  </a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/downloads/index.blade.php ENDPATH**/ ?>