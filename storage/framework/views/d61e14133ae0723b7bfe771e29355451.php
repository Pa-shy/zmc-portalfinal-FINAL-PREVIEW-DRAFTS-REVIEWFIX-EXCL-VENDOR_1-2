<?php $__env->startSection('title', 'Application Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-outline-dark">
    <i class="ri-arrow-left-line me-1"></i> Back
  </a>
  <div>
    <?php
      $name = ($application->application_type === 'registration') 
        ? ($application->form_data['org_name'] ?? $application->form_data['organization_name'] ?? $application->applicant?->name)
        : (($application->form_data['first_name'] ?? '') . ' ' . ($application->form_data['surname'] ?? '') ?: $application->applicant?->name);
    ?>
    <h4 class="fw-bold mb-0"><?php echo e($application->reference); ?></h4>
    <div class="fw-bold text-dark my-1" style="font-size: var(--font-size-lg);"><i class="ri-user-line me-1"></i> <?php echo e($name); ?></div>
    <div class="text-muted small text-uppercase">
      <?php echo e(str_replace('_', ' ', $application->application_type)); ?> • <?php echo e($application->request_type); ?> • <?php echo e($application->journalist_scope ?? $application->residency_type ?? 'local'); ?>

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
    <?php echo $__env->make('staff.partials.application_details_card', ['application' => $application], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="card mt-3">
      <div class="card-header fw-bold bg-light d-flex justify-content-between align-items-center">
        <span><i class="ri-history-line me-1"></i> Previous Applications for this Applicant</span>
        <span class="badge bg-white text-dark border"><?php echo e($previousApplications->count()); ?> found</span>
      </div>
      <div class="card-body p-0">
        <?php if($previousApplications->count()): ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover mb-0 align-middle small">
              <thead class="bg-light">
                <tr>
                  <th class="ps-3">Ref</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th class="text-end pe-3">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $previousApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $paStatus = strtolower((string)$pa->status);
                    $paBadge = match(true) {
                      str_contains($paStatus, 'approved') || $paStatus === 'issued' => 'success',
                      str_contains($paStatus, 'rejected') => 'danger',
                      default => 'info'
                    };
                  ?>
                  <tr>
                    <td class="ps-3 fw-bold"><?php echo e($pa->reference); ?></td>
                    <td class="text-capitalize"><?php echo e($pa->application_type); ?></td>
                    <td><span class="badge bg-<?php echo e($paBadge); ?>-subtle text-<?php echo e($paBadge); ?> border border-<?php echo e($paBadge); ?>"><?php echo e(ucwords(str_replace('_',' ', $pa->status))); ?></span></td>
                    <td><?php echo e($pa->created_at?->format('d M Y')); ?></td>
                    <td class="text-end pe-3">
                      <a href="<?php echo e(route('staff.officer.applications.show', $pa)); ?>" class="btn btn-xs btn-outline-primary py-0" title="View this application">
                        <i class="ri-eye-line"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="p-4 text-center text-muted small">No other applications found for this applicant.</div>
        <?php endif; ?>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header fw-bold bg-light d-flex justify-content-between align-items-center">
        <span><i class="ri-history-line me-1"></i> Payment History for this Applicant</span>
        <span class="badge bg-white text-dark border"><?php echo e($userPayments->count()); ?> found</span>
      </div>
      <div class="card-body p-0">
        <?php if($userPayments->count()): ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover mb-0 align-middle small">
              <thead class="bg-light">
                <tr>
                  <th class="ps-3">Ref</th>
                  <th>Amount</th>
                  <th>Method</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $userPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $pStatus = strtolower((string)$p->status);
                    $pBadge = match(true) {
                      $pStatus === 'paid' || $pStatus === 'confirmed' => 'success',
                      $pStatus === 'reversed' || $pStatus === 'failed' => 'danger',
                      default => 'info'
                    };
                  ?>
                  <tr>
                    <td class="ps-3 fw-bold"><?php echo e($p->reference); ?></td>
                    <td><?php echo e(number_format($p->amount, 2)); ?> <?php echo e($p->currency); ?></td>
                    <td class="text-capitalize"><?php echo e($p->method); ?></td>
                    <td><span class="badge bg-<?php echo e($pBadge); ?>-subtle text-<?php echo e($pBadge); ?> border border-<?php echo e($pBadge); ?> text-capitalize"><?php echo e($p->status); ?></span></td>
                    <td><?php echo e($p->created_at?->format('d M Y')); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="p-4 text-center text-muted small">No previous payments found for this applicant.</div>
        <?php endif; ?>
      </div>
    </div>

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

          
          <button type="button" class="btn btn-outline-warning w-100 mb-3" data-bs-toggle="modal" data-bs-target="#forwardNoApprovalModal">
            <i class="ri-arrow-right-line me-1"></i> Forward to Registrar (No Approval)
          </button>
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


<div class="modal fade" id="forwardNoApprovalModal" tabindex="-1" aria-labelledby="forwardNoApprovalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #000000; color: #facc15; border: 2px solid #facc15;">
      <div class="modal-header" style="border-bottom: 1px solid #facc15;">
        <h5 class="modal-title" id="forwardNoApprovalModalLabel">
          <i class="ri-alert-line me-2"></i>Forward to Registrar Without Approval
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="<?php echo e(route('staff.officer.applications.forward-no-approval', $application)); ?>">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="alert" style="background: rgba(250, 204, 21, 0.1); border: 1px solid #facc15; color: #facc15;">
            <i class="ri-information-line me-2"></i>
            <strong>Special Case:</strong> This action forwards the application to the Registrar WITHOUT your approval. Use this for waiver submissions or other special circumstances that require Registrar review before payment verification.
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Reason Type <span class="text-danger">*</span></label>
            <select class="form-select" id="reasonType" style="background: #1a1a1a; color: #facc15; border: 1px solid #facc15;">
              <option value="">-- Select reason type --</option>
              <option value="Waiver submitted">Waiver Submitted</option>
              <option value="Special payment arrangement">Special Payment Arrangement</option>
              <option value="Requires Registrar review">Requires Registrar Review</option>
              <option value="Complicated payment method">Complicated Payment Method</option>
              <option value="Other">Other (specify below)</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Detailed Reason <span class="text-danger">*</span></label>
            <textarea class="form-control" name="reason" rows="4" required 
                      style="background: #1a1a1a; color: #facc15; border: 1px solid #facc15;"
                      placeholder="Provide detailed explanation for forwarding without approval..."></textarea>
            <small class="form-text" style="color: #facc15; opacity: 0.7;">
              This reason will be visible to the Registrar and included in the audit trail.
            </small>
          </div>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #facc15;">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border-color: #facc15; color: #facc15;">
            Cancel
          </button>
          <button type="submit" class="btn" style="background: #facc15; color: #000000; font-weight: 600;">
            <i class="ri-arrow-right-line me-1"></i> Forward to Registrar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Auto-fill reason textarea when reason type is selected
document.getElementById('reasonType')?.addEventListener('change', function() {
  const reasonTextarea = document.querySelector('textarea[name="reason"]');
  if (this.value && this.value !== 'Other' && reasonTextarea) {
    const currentText = reasonTextarea.value.trim();
    if (!currentText || currentText === reasonTextarea.placeholder) {
      reasonTextarea.value = this.value + ': ';
      reasonTextarea.focus();
    }
  }
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/show.blade.php ENDPATH**/ ?>