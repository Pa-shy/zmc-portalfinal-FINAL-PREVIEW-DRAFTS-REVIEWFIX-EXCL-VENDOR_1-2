<?php $__env->startSection('title', $title ?? 'Applications'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color: var(--zmc-text-dark);"><?php echo e($title ?? 'Applications'); ?></h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">
        <i class="ri-information-line me-1"></i>
        Use this list to open an application and approve / reject / return it as needed.
      </div>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="<?php echo e(route('staff.registrar.dashboard')); ?>" class="btn btn-white border shadow-sm btn-sm px-3">
        <i class="ri-arrow-left-line me-1"></i> Back
      </a>
    </div>
  </div>

  <div class="zmc-card p-0 shadow-sm border-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0">
        <i class="ri-list-check-2 me-2" style="color:var(--zmc-accent)"></i>
        <?php echo e($title ?? 'Applications'); ?>

      </h6>
      <?php if(method_exists($applications, 'currentPage')): ?>
        <div class="small text-muted">Page <?php echo e($applications->currentPage()); ?> of <?php echo e($applications->lastPage()); ?></div>
      <?php endif; ?>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th style="width:60px;">#</th>
            <th>Ref</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>
            <th class="text-end" style="min-width:130px;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <?php
            $status = strtolower((string)($app->status ?? ''));
            $badge = match($status) {
              'registrar_rejected' => 'danger',
              'registrar_approved' => 'success',
              'returned_to_accounts' => 'secondary',
              'accounts_review' => 'warning',
              default => 'info',
            };
            $rowNo = method_exists($applications,'firstItem') && $applications->firstItem()
              ? ($applications->firstItem() + $i)
              : ($i + 1);
            $ref = $app->reference ?? ('APP-' . str_pad((int)$app->id, 5, '0', STR_PAD_LEFT));
            $type = $app->application_type ?? '—';
          ?>
          <tr>
            <td class="text-muted small"><?php echo e($rowNo); ?></td>
            <td class="fw-bold text-dark"><?php echo e($ref); ?></td>
            <td><?php echo e($app->applicant?->name ?? '—'); ?></td>
            <td><span class="small fw-bold text-uppercase"><?php echo e($type); ?></span></td>
            <td class="small"><?php echo e(!empty($app->created_at) ? \Carbon\Carbon::parse($app->created_at)->format('d M Y') : '—'); ?></td>
            <td>
              <span class="badge rounded-pill bg-<?php echo e($badge); ?> px-3">
                <?php echo e(ucwords(str_replace('_',' ', $status ?: '—'))); ?>

              </span>
            </td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('staff.registrar.applications.show', $app)); ?>">
                <i class="fa-regular fa-eye me-1"></i> Open
              </a>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="7" class="text-center text-muted py-4">No records found.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

    <?php if(method_exists($applications, 'links')): ?>
      <div class="p-3 border-top">
        <?php echo e($applications->links()); ?>

      </div>
    <?php endif; ?>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/applications_list.blade.php ENDPATH**/ ?>