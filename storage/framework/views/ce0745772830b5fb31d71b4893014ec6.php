<?php $__env->startSection('title', $title ?? 'Applications'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;"><?php echo e($title ?? 'Applications'); ?></h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);"><i class="ri-information-line me-1"></i>Filter and search applications. Export functionality available in Records Section.</div>
    </div>

    <div class="d-flex gap-2">
      <button type="button" class="btn btn-white border shadow-sm btn-sm px-3" data-bs-toggle="modal" data-bs-target="#advancedFiltersModal">
        <i class="ri-filter-3-line me-1"></i> Advanced Filters
      </button>
      <a href="<?php echo e(url()->current()); ?>" class="btn btn-white border shadow-sm btn-sm px-3" title="Refresh">
        <i class="ri-refresh-line me-1"></i> Refresh
      </a>
    </div>
  </div>

  
  <?php
    $activeYear = request('year', now()->year);
    $activeProcessingStatus = request('processing_status', 'all');
  ?>
  <div class="d-flex flex-wrap gap-2 mb-3 align-items-center">
    <div class="d-flex gap-2 align-items-center">
      <label class="small fw-bold text-muted mb-0">Year:</label>
      <?php for($y = now()->year; $y >= now()->year - 5; $y--): ?>
        <a class="btn btn-sm <?php echo e($activeYear == $y ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['year' => $y])); ?>"><?php echo e($y); ?></a>
      <?php endfor; ?>
    </div>

    <span class="mx-2 text-muted">|</span>

    <div class="d-flex gap-2">
      <a class="btn btn-sm <?php echo e($activeProcessingStatus === 'all' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['processing_status' => 'all'])); ?>">All</a>
      <a class="btn btn-sm <?php echo e($activeProcessingStatus === 'processed' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['processing_status' => 'processed'])); ?>">Processed</a>
      <a class="btn btn-sm <?php echo e($activeProcessingStatus === 'unprocessed' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['processing_status' => 'unprocessed'])); ?>">Unprocessed</a>
    </div>
  </div>

  
  <?php
    $activeType = request('application_type');
  ?>
  <div class="d-flex flex-wrap gap-2 mb-3">
    <a class="btn btn-sm <?php echo e($activeType==='accreditation' || !$activeType ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => 'accreditation'])); ?>">Accreditations</a>
    <a class="btn btn-sm <?php echo e($activeType==='registration' ? 'btn-dark' : 'btn-outline-dark'); ?>" href="<?php echo e(request()->fullUrlWithQuery(['application_type' => 'registration'])); ?>">Registrations</a>

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

        <div class="col-12 col-md-6">
          <label class="form-label small fw-bold">Quick Search</label>
          <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" placeholder="Name, Accreditation Number, or Registration Number" />
        </div>

        <div class="col-6 col-md-2">
          <label class="form-label small fw-bold">From</label>
          <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>" class="form-control" />
        </div>

        <div class="col-6 col-md-2">
          <label class="form-label small fw-bold">To</label>
          <input type="date" name="date_to" value="<?php echo e(request('date_to')); ?>" class="form-control" />
        </div>

        <input type="hidden" name="year" value="<?php echo e(request('year', now()->year)); ?>" />
        <input type="hidden" name="processing_status" value="<?php echo e(request('processing_status', 'all')); ?>" />
        <input type="hidden" name="application_type" value="<?php echo e(request('application_type')); ?>" />

        <div class="col-12 col-md-2 d-flex gap-2">
          <button class="btn btn-dark w-100"><i class="ri-search-line me-1"></i>Search</button>
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
              <th>New or Renewal</th>
              <th>Foreign or Local</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <?php
                // Determine New or Renewal
                $requestType = strtolower((string)($app->request_type ?? 'new'));
                $newOrRenewal = $requestType === 'renewal' ? 'Renewal' : 'New';
                
                // Determine Foreign or Local
                $scope = strtolower((string)($app->journalist_scope ?? $app->residency_type ?? 'local'));
                $foreignOrLocal = $scope === 'foreign' ? 'Foreign' : 'Local';
              ?>
              <tr>
                <td class="fw-bold"><?php echo e($app->reference); ?></td>
                <td>
                  <div class="fw-semibold"><?php echo e($app->applicant?->name ?? '—'); ?></div>
                  <div class="text-muted small"><?php echo e($app->applicant?->email ?? '—'); ?></div>
                </td>
                <td>
                  <span class="badge bg-dark"><?php echo e($app->applicationTypeLabel()); ?></span>
                </td>
                <td class="text-capitalize small"><?php echo e(str_replace('_',' ', $app->status)); ?></td>
                <td class="small"><?php echo e(optional($app->created_at)->format('d M Y')); ?></td>
                <td>
                  <span class="badge rounded-pill bg-<?php echo e($newOrRenewal === 'Renewal' ? 'info' : 'primary'); ?> px-3"><?php echo e($newOrRenewal); ?></span>
                </td>
                <td>
                  <span class="badge rounded-pill bg-<?php echo e($foreignOrLocal === 'Foreign' ? 'warning' : 'success'); ?> px-3"><?php echo e($foreignOrLocal); ?></span>
                </td>
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
              <tr><td colspan="8" class="text-center py-5 text-muted">No applications found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="mt-3"><?php echo e($applications->links()); ?></div>
</div>


<div class="modal fade" id="advancedFiltersModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Advanced Filters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="GET">
        <div class="modal-body">
          <div class="row g-3">
            
            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Gender</label>
              <select class="form-select" name="gender">
                <option value="">All</option>
                <option value="male" <?php if(request('gender')==='male'): echo 'selected'; endif; ?>>Male</option>
                <option value="female" <?php if(request('gender')==='female'): echo 'selected'; endif; ?>>Female</option>
                <option value="other" <?php if(request('gender')==='other'): echo 'selected'; endif; ?>>Other</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Age Range</label>
              <div class="d-flex gap-2 align-items-center">
                <input type="number" name="age_min" value="<?php echo e(request('age_min')); ?>" class="form-control" placeholder="Min" min="0" max="120" />
                <span>to</span>
                <input type="number" name="age_max" value="<?php echo e(request('age_max')); ?>" class="form-control" placeholder="Max" min="0" max="120" />
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Organisation</label>
              <input type="text" name="organisation" value="<?php echo e(request('organisation')); ?>" class="form-control" placeholder="Organisation name" />
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Province</label>
              <select class="form-select" name="province">
                <option value="">All</option>
                <option value="harare" <?php if(request('province')==='harare'): echo 'selected'; endif; ?>>Harare</option>
                <option value="bulawayo" <?php if(request('province')==='bulawayo'): echo 'selected'; endif; ?>>Bulawayo</option>
                <option value="manicaland" <?php if(request('province')==='manicaland'): echo 'selected'; endif; ?>>Manicaland</option>
                <option value="mashonaland_central" <?php if(request('province')==='mashonaland_central'): echo 'selected'; endif; ?>>Mashonaland Central</option>
                <option value="mashonaland_east" <?php if(request('province')==='mashonaland_east'): echo 'selected'; endif; ?>>Mashonaland East</option>
                <option value="mashonaland_west" <?php if(request('province')==='mashonaland_west'): echo 'selected'; endif; ?>>Mashonaland West</option>
                <option value="masvingo" <?php if(request('province')==='masvingo'): echo 'selected'; endif; ?>>Masvingo</option>
                <option value="matabeleland_north" <?php if(request('province')==='matabeleland_north'): echo 'selected'; endif; ?>>Matabeleland North</option>
                <option value="matabeleland_south" <?php if(request('province')==='matabeleland_south'): echo 'selected'; endif; ?>>Matabeleland South</option>
                <option value="midlands" <?php if(request('province')==='midlands'): echo 'selected'; endif; ?>>Midlands</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Collection Region</label>
              <select class="form-select" name="collection_region">
                <option value="">All</option>
                <option value="harare" <?php if(request('collection_region')==='harare'): echo 'selected'; endif; ?>>Harare</option>
                <option value="bulawayo" <?php if(request('collection_region')==='bulawayo'): echo 'selected'; endif; ?>>Bulawayo</option>
                <option value="mutare" <?php if(request('collection_region')==='mutare'): echo 'selected'; endif; ?>>Mutare</option>
                <option value="gweru" <?php if(request('collection_region')==='gweru'): echo 'selected'; endif; ?>>Gweru</option>
                <option value="masvingo" <?php if(request('collection_region')==='masvingo'): echo 'selected'; endif; ?>>Masvingo</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Foreign or Local</label>
              <select class="form-select" name="scope">
                <option value="">All</option>
                <option value="local" <?php if(request('scope')==='local'): echo 'selected'; endif; ?>>Local</option>
                <option value="foreign" <?php if(request('scope')==='foreign'): echo 'selected'; endif; ?>>Foreign</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">New or Renewal</label>
              <select class="form-select" name="request_type">
                <option value="">All</option>
                <option value="new" <?php if(request('request_type')==='new'): echo 'selected'; endif; ?>>New</option>
                <option value="renewal" <?php if(request('request_type')==='renewal'): echo 'selected'; endif; ?>>Renewal</option>
                <option value="replacement" <?php if(request('request_type')==='replacement'): echo 'selected'; endif; ?>>Replacement</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label small fw-bold">Nationality</label>
              <input type="text" name="nationality" value="<?php echo e(request('nationality')); ?>" class="form-control" placeholder="Nationality" />
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="year" value="<?php echo e(request('year', now()->year)); ?>" />
          <input type="hidden" name="processing_status" value="<?php echo e(request('processing_status', 'all')); ?>" />
          <input type="hidden" name="application_type" value="<?php echo e(request('application_type')); ?>" />
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-dark"><i class="ri-filter-3-line me-1"></i>Apply Filters</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/applications_list_filtered.blade.php ENDPATH**/ ?>