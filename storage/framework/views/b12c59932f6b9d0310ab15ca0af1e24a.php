<?php $__env->startSection('title', 'Application Details'); ?>

<?php $__env->startSection('content'); ?>
<?php
  $isAcc = ($application->application_type === 'accreditation');
?>

<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Application: <?php echo e($application->reference ?? 'N/A'); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;">Read-only view for admin/director oversight.</div>
    </div>
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-outline-dark">
      <i class="ri-arrow-left-line me-1"></i> Back
    </a>
  </div>

  <div class="row g-4">
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-user-3-line me-2"></i>Applicant</div>
        </div>
        <div class="card-body">
          <div class="fw-bold"><?php echo e($application->applicant?->name ?? 'Applicant'); ?></div>
          <div class="text-muted"><?php echo e($application->applicant?->email); ?></div>
          <div class="mt-3">
            <div class="text-muted small">Type</div>
            <div class="fw-semibold"><?php echo e(ucfirst($application->application_type ?? 'Unknown')); ?></div>
          </div>
          <div class="mt-3">
            <div class="text-muted small">Status</div>
            <div><span class="badge bg-secondary"><?php echo e(ucwords(str_replace('_',' ', $application->status ?? 'unknown'))); ?></span></div>
          </div>
          <div class="mt-3">
            <div class="text-muted small">Submitted</div>
            <div class="fw-semibold"><?php echo e($application->submitted_at?->toDayDateTimeString() ?? $application->created_at?->toDayDateTimeString()); ?></div>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-attachment-2 me-2"></i>Documents</div>
        </div>
        <div class="card-body">
          <?php $__empty_1 = true; $__currentLoopData = $application->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
              <div>
                <div class="fw-semibold"><?php echo e(ucwords(str_replace('_',' ', $doc->document_type ?? 'document'))); ?></div>
                <div class="text-muted small"><?php echo e($doc->created_at?->diffForHumans()); ?></div>
              </div>
              <?php if($doc->path): ?>
                <a class="btn btn-sm btn-outline-primary" target="_blank" href="<?php echo e(\Illuminate\Support\Facades\Storage::url($doc->path)); ?>">
                  <i class="ri-external-link-line"></i>
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-muted">No documents uploaded.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-file-text-line me-2"></i>Form Data</div>
        </div>
        <div class="card-body">
          <?php $data = $application->form_data ?? []; ?>
          <?php if(empty($data)): ?>
            <div class="text-muted">No form data captured.</div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-sm">
                <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td style="width:35%" class="text-muted fw-semibold"><?php echo e(ucwords(str_replace('_',' ', $k))); ?></td>
                    <td>
                      <?php if(is_array($v)): ?>
                        <pre class="mb-0" style="white-space:pre-wrap;"><?php echo e(json_encode($v, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)); ?></pre>
                      <?php else: ?>
                        <?php echo e((string)$v); ?>

                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-message-2-line me-2"></i>Messages</div>
        </div>
        <div class="card-body">
          <?php $__empty_1 = true; $__currentLoopData = $application->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border rounded p-3 mb-2">
              <div class="d-flex justify-content-between">
                <div class="fw-bold"><?php echo e($m->fromUser?->name ?? 'User'); ?> <span class="text-muted">→</span> <?php echo e($m->toUser?->name ?? 'User'); ?></div>
                <div class="text-muted small"><?php echo e($m->sent_at?->diffForHumans() ?? $m->created_at?->diffForHumans()); ?></div>
              </div>
              <div class="mt-2"><?php echo e($m->body); ?></div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-muted">No messages.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/applications/show.blade.php ENDPATH**/ ?>