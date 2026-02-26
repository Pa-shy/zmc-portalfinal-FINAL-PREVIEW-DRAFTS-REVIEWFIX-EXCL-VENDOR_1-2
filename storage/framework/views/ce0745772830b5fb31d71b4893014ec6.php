<?php $__env->startSection('title', $title ?? 'Applications'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;"><?php echo e($title ?? 'Applications'); ?></h4>
      <div class="text-muted mt-1" style="font-size:13px;"><i class="ri-information-line me-1"></i>Use filters (same style as Auditor) and export CSV / Print to PDF.</div>
    </div>

    <div class="d-flex gap-2">
      <a href="<?php echo e(route('staff.officer.applications.export', ['list' => $list] + request()->query())); ?>" class="btn btn-white border shadow-sm btn-sm px-3">
        <i class="ri-download-2-line me-1"></i> Export CSV
      </a>
      <button type="button" onclick="window.print()" class="btn btn-white border shadow-sm btn-sm px-3">
        <i class="ri-printer-line me-1"></i> Export PDF
      </button>
    </div>
  </div>

  
  <?php
    $activeType = request('application_type');
  ?>
  <div class="d-flex flex-wrap gap-2 mb-3">
    <a class="btn btn-sm <?php echo e($activeType ? 'btn-outline-dark' : 'btn-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => null])); ?>">All</a>
    <a class="btn btn-sm <?php echo e($activeType==='accreditation' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => 'accreditation'])); ?>">Accreditations</a>
    <a class="btn btn-sm <?php echo e($activeType==='registration' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => 'registration'])); ?>">Media House Registrations</a>

    <?php if(($list ?? '') === 'rejected'): ?>
      <span class="mx-2 text-muted">|</span>
      <?php $activeStatus = request('status'); ?>
      <a class="btn btn-sm <?php echo e($activeStatus===\App\Models\Application::OFFICER_REJECTED ? 'btn-danger' : 'btn-outline-danger'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['status' => \App\Models\Application::OFFICER_REJECTED])); ?>">Rejected</a>
      <a class="btn btn-sm <?php echo e($activeStatus===\App\Models\Application::RETURNED_TO_OFFICER ? 'btn-warning' : 'btn-outline-warning'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['status' => \App\Models\Application::RETURNED_TO_OFFICER])); ?>">Returned</a>
      <a class="btn btn-sm <?php echo e(!$activeStatus ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['status' => null])); ?>">Both</a>
    <?php endif; ?>
  </div>

  
  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <form method="GET" class="row g-2 align-items-end">

        <div class="col-12 col-md-3">
          <label class="form-label small fw-bold">Search</label>
          <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" placeholder="Ref / name / email" />
        </div>

        <div class="col-12 col-md-3">
          <label class="form-label small fw-bold">Application Type</label>
          <select class="form-select" name="bucket">
            <option value="">All</option>
            <?php $__currentLoopData = ($bucketLabels ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($k); ?>" <?php if(request('bucket')===$k): echo 'selected'; endif; ?>><?php echo e($lbl); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="col-6 col-md-2">
          <label class="form-label small fw-bold">From</label>
          <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>" class="form-control" />
        </div>

        <div class="col-6 col-md-2">
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

  
  <div class="card shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Ref</th>
              <th>Applicant</th>
              <th>Type</th>
              <th>Status</th>
              <th>Submitted</th>
              <th>Category</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td class="fw-bold"><?php echo e($app->reference); ?></td>
                <td>
                  <div class="fw-semibold"><?php echo e($app->applicant?->name ?? '—'); ?></div>
                  <div class="text-muted small"><?php echo e($app->applicant?->email ?? '—'); ?></div>
                </td>
                <td>
                  <span class="badge bg-dark"><?php echo e($app->applicationTypeLabel()); ?></span>
                </td>
                <td class="text-capitalize"><?php echo e(str_replace('_',' ', $app->status)); ?></td>
                <td class="small"><?php echo e(optional($app->created_at)->format('d M Y')); ?></td>
                <td class="small"><?php echo e($app->categoryLabel() ?? '—'); ?></td>
                <td class="text-end">
  <div class="zmc-action-strip justify-content-end">

    
    <a
      href="<?php echo e(route('staff.officer.applications.show', $app)); ?>#correction"
      class="btn btn-sm zmc-icon-btn btn-outline-dark"
      <?php if(!in_array($app->status, [
        \App\Models\Application::SUBMITTED,
        \App\Models\Application::OFFICER_REVIEW,
        \App\Models\Application::RETURNED_TO_OFFICER,
        \App\Models\Application::CORRECTION_REQUESTED,
      ], true)): ?> aria-disabled="true" tabindex="-1" <?php endif; ?>
      data-bs-toggle="tooltip" data-bs-placement="top"
      title="Request correction"
    >
      <i class="fa-regular fa-comment-dots"></i>
    </a>

    
    <a
      href="<?php echo e(route('staff.officer.applications.show', $app)); ?>"
      class="btn btn-sm zmc-icon-btn btn-outline-primary"
      data-bs-toggle="tooltip" data-bs-placement="top"
      title="View application"
    >
      <i class="fa-regular fa-eye"></i>
    </a>

    
    <a
      href="<?php echo e(route('staff.officer.applications.show', $app)); ?>#approve"
      class="btn btn-sm zmc-icon-btn btn-outline-success"
      <?php if(!in_array($app->status, [
        \App\Models\Application::SUBMITTED,
        \App\Models\Application::OFFICER_REVIEW,
        \App\Models\Application::RETURNED_TO_OFFICER,
        \App\Models\Application::CORRECTION_REQUESTED,
      ], true)): ?> aria-disabled="true" tabindex="-1" <?php endif; ?>
      data-bs-toggle="tooltip" data-bs-placement="top"
      title="Approve"
    >
      <i class="fa-solid fa-check"></i>
    </a>

    
    <a
      href="<?php echo e(route('staff.officer.applications.show', $app)); ?>#message"
      class="btn btn-sm zmc-icon-btn btn-outline-secondary"
      data-bs-toggle="tooltip" data-bs-placement="top"
      title="Message"
    >
      <i class="fa-regular fa-envelope"></i>
    </a>

  </div>
</td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr><td colspan="7" class="text-center py-5 text-muted">No applications found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="mt-3"><?php echo e($applications->links()); ?></div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/applications_list_filtered.blade.php ENDPATH**/ ?>