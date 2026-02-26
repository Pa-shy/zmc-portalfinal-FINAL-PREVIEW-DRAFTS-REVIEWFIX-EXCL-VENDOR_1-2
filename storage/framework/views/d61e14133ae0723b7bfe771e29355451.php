<?php $__env->startSection('title', 'Application Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-outline-dark">
    <i class="ri-arrow-left-line me-1"></i> Back
  </a>
  <div>
    <h4 class="fw-bold mb-1"><?php echo e($application->reference); ?></h4>
    <div class="text-muted">
      <?php echo e($application->application_type); ?> • <?php echo e($application->request_type); ?> • <?php echo e($application->journalist_scope ?? '—'); ?>

    </div>
  </div>
  <div class="d-flex align-items-center gap-2">
    <form action="<?php echo e(route('staff.officer.applications.unlock', $application)); ?>" method="POST" class="d-inline">
       <?php echo csrf_field(); ?>
       <button class="btn btn-sm btn-outline-warning">
         <i class="ri-lock-unlock-line me-1"></i> Release & Back
       </button>
    </form>
    <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-secondary d-none d-md-inline">Dashboard</a>
  </div>
</div>

<?php if(session('success')): ?>
  <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<div class="row g-3">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header fw-bold">Applicant</div>
      <div class="card-body">
        <div class="d-flex align-items-center gap-3">
          <?php
            $passportPhoto = $application->documents->where('doc_type', 'passport_photo')->first();
          ?>
          <?php if($passportPhoto): ?>
            <div class="border rounded p-1 bg-light">
              <img src="<?php echo e($passportPhoto->url); ?>" alt="Passport Photo" style="width: 100px; height: 120px; object-fit: cover;">
            </div>
          <?php endif; ?>
          <div>
            <div><b>Name:</b> <?php echo e($application->applicant?->name ?? '—'); ?></div>
            <div><b>Email:</b> <?php echo e($application->applicant?->email ?? '—'); ?></div>
            <div><b>Region for collection:</b> <?php echo e($application->collection_region); ?></div>
            <div class="mt-2">
              <b>Status:</b> <span class="badge bg-info"><?php echo e(str_replace('_',' ', $application->status)); ?></span>
            </div>
          </div>
        </div>
        <?php if($application->decision_notes): ?>
          <div class="mt-3">
            <b>Notes:</b>
            <div class="border rounded p-2 mt-1"><?php echo e($application->decision_notes); ?></div>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card mt-3">
      <div class="card-header fw-bold">Documents</div>
      <div class="card-body">
        <?php if($application->documents && $application->documents->count()): ?>
          <div class="list-group">
            <?php $__currentLoopData = $application->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                 href="<?php echo e($doc->url); ?>" target="_blank" rel="noopener">
                <div>
                  <div class="fw-semibold"><?php echo e($doc->original_name ?? $doc->doc_type); ?></div>
                  <div class="small text-muted"><?php echo e(strtoupper($doc->doc_type)); ?> • Uploaded <?php echo e($doc->created_at?->format('Y-m-d H:i')); ?></div>
                </div>
                <span class="badge bg-success-subtle text-success border border-success">View</span>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php else: ?>
          <div class="text-muted">No documents uploaded yet.</div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php if($previousApplications->count()): ?>
  <div class="col-12">
    <div class="card mt-3">
      <div class="card-header fw-bold d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#prevAppsPanel" role="button" aria-expanded="false">
        <span><i class="ri-history-line me-1"></i> Previous Applications by This Applicant (<?php echo e($previousApplications->count()); ?>)</span>
        <i class="ri-arrow-down-s-line"></i>
      </div>
      <div class="collapse" id="prevAppsPanel">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm table-hover align-middle mb-0">
              <thead class="bg-light">
                <tr>
                  <th>Reference</th>
                  <th>Type</th>
                  <th>Request</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $previousApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prevApp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="small fw-bold"><?php echo e($prevApp->reference); ?></td>
                    <td class="small text-capitalize"><?php echo e($prevApp->application_type ?? '—'); ?></td>
                    <td>
                      <?php
                        $pReqType = $prevApp->request_type ?? 'new';
                        $pReqBadge = match($pReqType) { 'renewal' => 'warning', 'replacement' => 'info', default => 'success' };
                      ?>
                      <span class="badge bg-<?php echo e($pReqBadge); ?>"><?php echo e(ucfirst($pReqType)); ?></span>
                    </td>
                    <td><span class="badge bg-secondary"><?php echo e(ucwords(str_replace('_', ' ', $prevApp->status))); ?></span></td>
                    <td class="small text-muted"><?php echo e($prevApp->created_at?->format('d M Y') ?? '—'); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="col-md-5">
    <div class="card">
      <div class="card-header fw-bold">Actions</div>
      <div class="card-body">

        <?php
          $actionableStatuses = [
            'submitted', 'submitted_with_app_fee', 'officer_review',
            'needs_correction', 'returned_from_payments', 'returned_from_registrar',
            'returned_to_officer', 'registrar_fix_request', 'correction_requested',
          ];
        ?>
        <?php if(in_array($application->status, $actionableStatuses)): ?>
          <form method="POST" action="<?php echo e(route('staff.officer.applications.approve', $application)); ?>" class="mb-3">
            <?php echo csrf_field(); ?>
            <?php
              $isRegistration = ($application->application_type ?? '') === 'registration';
              $cats = $isRegistration ? \App\Models\Application::massMediaCategories() : \App\Models\Application::accreditationCategories();
              $label = $isRegistration ? 'Mass Media Category' : 'Accreditation Category';
              $approveLabel = $isRegistration ? 'Verify & Send to Registrar' : 'Approve (Prompt Payment)';
            ?>

            <label class="form-label fw-semibold"><?php echo e($label); ?> (required)</label>
            <select class="form-select mb-2" name="category_code" required>
              <option value="">-- Select category --</option>
              <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($code); ?>" <?php if(($isRegistration ? $application->media_house_category_code : $application->accreditation_category_code) === $code): echo 'selected'; endif; ?>><?php echo e($code); ?> - <?php echo e($name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label class="form-label fw-semibold">Approve notes (optional)</label>
            <textarea class="form-control mb-2" name="decision_notes" rows="3"></textarea>
            <button class="btn btn-success w-100"><?php echo e($approveLabel); ?></button>
          </form>

          <form method="POST" action="<?php echo e(route('staff.officer.applications.requestCorrection', $application)); ?>" class="mb-3">
            <?php echo csrf_field(); ?>
            <label class="form-label fw-semibold">Return to applicant — reason (required)</label>
            <textarea class="form-control mb-2" name="notes" rows="3" required></textarea>
            <button class="btn btn-warning w-100">Return to Applicant</button>
          </form>

          <form method="POST" action="<?php echo e(route('staff.officer.applications.forward-to-registrar', $application)); ?>" class="mb-3">
            <?php echo csrf_field(); ?>
            <label class="form-label fw-semibold">Forward to Registrar — reason (required)</label>
            <textarea class="form-control mb-2" name="forward_reason" rows="3" required placeholder="Waiver, special case, etc."></textarea>
            <button class="btn btn-outline-primary w-100">Forward to Registrar (No Approval)</button>
          </form>
        <?php else: ?>
          <div class="alert alert-light border">No actions available for this status.</div>
        <?php endif; ?>

        <hr>

        <form method="POST" action="<?php echo e(route('staff.officer.applications.message', $application)); ?>">
          <?php echo csrf_field(); ?>
          <label class="form-label fw-semibold">Message applicant</label>
          <textarea class="form-control mb-2" name="message" rows="3" required></textarea>
          <button class="btn btn-primary w-100">Send Message</button>
        </form>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/show.blade.php ENDPATH**/ ?>