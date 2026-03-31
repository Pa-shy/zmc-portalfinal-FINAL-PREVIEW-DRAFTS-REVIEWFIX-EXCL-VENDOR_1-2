<?php $__env->startSection('title', $title ?? 'Document Verification'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;"><?php echo e($title ?? 'Document Verification'); ?></h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);"><i class="ri-information-line me-1"></i>Documents are grouped under each applicant/application for easy review. Registrar and Accreditation Officer can view applicant uploads.</div>
    </div>
    <div class="d-flex gap-2">
      <button type="button" onclick="window.print()" class="btn btn-white border shadow-sm btn-sm px-3"><i class="ri-printer-line me-1"></i>Export PDF</button>
    </div>
  </div>

  <?php $activeType = request('application_type'); ?>
  <div class="d-flex flex-wrap gap-2 mb-3">
    <a class="btn btn-sm <?php echo e($activeType ? 'btn-outline-dark' : 'btn-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => null])); ?>">All</a>
    <a class="btn btn-sm <?php echo e($activeType==='accreditation' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => 'accreditation'])); ?>">Accreditation Documents</a>
    <a class="btn btn-sm <?php echo e($activeType==='registration' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => 'registration'])); ?>">Media House Documents</a>
  </div>

  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <form method="GET" class="row g-2 align-items-end">
        <div class="col-6 col-md-3">
          <label class="form-label small fw-bold">From</label>
          <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>" class="form-control" />
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small fw-bold">To</label>
          <input type="date" name="date_to" value="<?php echo e(request('date_to')); ?>" class="form-control" />
        </div>
        <input type="hidden" name="application_type" value="<?php echo e(request('application_type')); ?>" />
        <div class="col-12 col-md-3 d-flex gap-2">
          <button class="btn btn-dark w-100"><i class="ri-filter-3-line me-1"></i>Apply</button>
          <a class="btn btn-outline-secondary w-100" href="<?php echo e(url()->current()); ?>">Reset</a>
        </div>
      </form>
    </div>
  </div>

  <div class="accordion" id="docsAccordion">
    <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <?php
        $accId = 'acc_'.$app->id;
      ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?php echo e($accId); ?>">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($accId); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($accId); ?>">
            <div class="w-100 d-flex justify-content-between align-items-center flex-wrap gap-2">
              <div>
                <div class="fw-bold"><?php echo e($app->applicant?->name ?? '—'); ?> <span class="text-muted fw-normal">(<?php echo e($app->applicant?->email ?? '—'); ?>)</span></div>
                <div class="small text-muted">Ref: <span class="fw-semibold"><?php echo e($app->reference); ?></span> • <?php echo e($app->applicationTypeLabel()); ?> • Submitted: <?php echo e(optional($app->created_at)->format('d M Y')); ?></div>
              </div>
              <span class="badge bg-dark"><?php echo e($app->documents->count()); ?> docs</span>
            </div>
          </button>
        </h2>
        <div id="collapse<?php echo e($accId); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo e($accId); ?>" data-bs-parent="#docsAccordion">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-sm align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Document</th>
                    <th>Original Name</th>
                    <th>Status</th>
                    <th class="text-end">Open</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $app->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="fw-semibold"><?php echo e($doc->document_type); ?></td>
                      <td class="small text-muted"><?php echo e($doc->original_name ?? '—'); ?></td>
                      <td class="text-capitalize"><?php echo e($doc->status ?? '—'); ?></td>
                      <td class="text-end">
                        <a href="<?php echo e($doc->url); ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="ri-external-link-line me-1"></i>View</a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="text-center py-5 text-muted">No documents found for the selected filters.</div>
    <?php endif; ?>
  </div>

  <div class="mt-3"><?php echo e($applications->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/documents_grouped.blade.php ENDPATH**/ ?>