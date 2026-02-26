<?php $__env->startSection('title', 'Payment Review'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-outline-dark">
    <i class="ri-arrow-left-line me-1"></i> Back
  </a>
  <div>
    <h4 class="fw-bold mb-1"><?php echo e($application->reference); ?></h4>
    <div class="text-muted"><?php echo e(strtoupper($application->application_type)); ?> • <?php echo e(str_replace('_',' ', $application->status)); ?></div>
  </div>
  <div class="d-flex align-items-center gap-2">
    <form action="<?php echo e(route('staff.accounts.applications.unlock', $application)); ?>" method="POST" class="d-inline">
       <?php echo csrf_field(); ?>
       <button class="btn btn-sm btn-outline-warning">
         <i class="ri-lock-unlock-line me-1"></i> Release & Back
       </button>
    </form>
    <a href="<?php echo e(route('staff.accounts.dashboard')); ?>" class="btn btn-secondary d-none d-md-inline">Dashboard</a>
  </div>
</div>

<?php if(session('success')): ?> <div class="alert alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>
<?php if($errors->any()): ?>
  <div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
<?php endif; ?>

<div class="row g-3">
  <div class="col-lg-7">
    <div class="card">
      <div class="card-header fw-bold">Applicant & Application</div>
      <div class="card-body">
        <div><b>Name:</b> <?php echo e($application->applicant?->name ?? '—'); ?></div>
        <div><b>Email:</b> <?php echo e($application->applicant?->email ?? '—'); ?></div>
        <div><b>Collection region:</b> <?php echo e($application->collection_region ?? '—'); ?></div>
        <div class="mt-2"><b>Submitted:</b> <?php echo e($application->submitted_at?->format('Y-m-d H:i') ?? '—'); ?></div>
        
        <?php if(in_array($application->status, [\App\Models\Application::PAID_CONFIRMED]) || $application->payment_status === 'paid' || $application->proof_status === 'approved'): ?>
          <div class="mt-3">
            <a href="<?php echo e(route('staff.accounts.applications.receipt', $application)); ?>" class="btn btn-sm btn-outline-primary">
              <i class="ri-file-download-line me-1"></i> Download Payment Receipt (PDF)
            </a>
          </div>
        <?php endif; ?>

        <hr>
        <div class="fw-bold mb-3"><i class="ri-file-list-3-line me-1"></i>Application Details</div>
        
        <?php if($application->form_data): ?>
          <?php
            $formData = $application->form_data;
            if (is_string($formData)) $formData = json_decode($formData, true);
            
            $labels = [
              // Accreditation (AP3/AP5)
              'title' => 'Title',
              'surname' => 'Surname',
              'first_name' => 'First Name',
              'other_names' => 'Other Names',
              'dob' => 'Date of Birth',
              'birth_place' => 'Place & Country of Birth',
              'marital_status' => 'Marital Status',
              'gender' => 'Sex',
              'national_reg_no' => 'National ID',
              'passport_no' => 'Passport No',
              'nationality' => 'Nationality',
              'address' => 'Residential Address',
              'phone' => 'Phone',
              'email' => 'Email',
              'employment_type' => 'Employment Type',
              'medium_type' => 'Medium Type',
              'designation' => 'Designation',
              'media_org' => 'Media Organization',
              'collection_region' => 'Collection Office',
              
              // Media House (AP1)
              'contact_name' => 'Contact Person',
              'organization_name' => 'Organization Name',
              'organization_address' => 'Physical Address',
              'organization_email' => 'Organization Email',
              'organization_phone' => 'Organization Phone',
              'website' => 'Website',
            ];
          ?>

          <div class="form-viewer">
            <table class="table table-sm table-bordered">
              <tbody>
                <?php $__currentLoopData = $formData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(in_array($key, ['current_step', 'registration_scope', 'journalist_scope'])) continue; ?>
                  <tr>
                    <td class="bg-light fw-semibold" style="width: 40%;"><?php echo e($labels[$key] ?? ucwords(str_replace('_', ' ', $key))); ?></td>
                    <td>
                      <?php if(is_array($value)): ?>
                        <pre class="small mb-0"><?php echo e(json_encode($value, JSON_PRETTY_PRINT)); ?></pre>
                      <?php else: ?>
                        <?php echo e($value); ?>

                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="text-muted italic">No specific form data captured.</div>
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

  <?php if(isset($previousApplications) && $previousApplications->count()): ?>
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

  <?php if(isset($previousPayments) && $previousPayments->count()): ?>
  <div class="col-12">
    <div class="card mt-3">
      <div class="card-header fw-bold d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#prevPaymentsPanel" role="button" aria-expanded="false">
        <span><i class="ri-bank-card-line me-1"></i> Previous Payments by This Applicant (<?php echo e($previousPayments->count()); ?>)</span>
        <i class="ri-arrow-down-s-line"></i>
      </div>
      <div class="collapse" id="prevPaymentsPanel">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm table-hover align-middle mb-0">
              <thead class="bg-light">
                <tr>
                  <th>Reference</th>
                  <th>Method</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $previousPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prevPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="small fw-bold"><?php echo e($prevPayment->reference); ?></td>
                    <td class="small text-uppercase"><?php echo e($prevPayment->method ?? '—'); ?></td>
                    <td class="small"><?php echo e($prevPayment->amount ?? '—'); ?> <?php echo e($prevPayment->currency ?? 'USD'); ?></td>
                    <td>
                      <?php
                        $payBadge = match($prevPayment->status) { 'paid' => 'success', 'pending' => 'warning', 'rejected','reversed','voided' => 'danger', default => 'secondary' };
                      ?>
                      <span class="badge bg-<?php echo e($payBadge); ?>"><?php echo e(ucfirst($prevPayment->status)); ?></span>
                    </td>
                    <td class="small text-muted"><?php echo e($prevPayment->created_at?->format('d M Y') ?? '—'); ?></td>
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

  <div class="col-lg-5">
    <div class="card">
      <div class="card-header fw-bold">Payments Actions</div>
      <div class="card-body">
        <div class="text-muted small mb-3">
          Confirm payment proof / waiver. When approved, the application is sent to the Registrar.
        </div>

        <?php if(in_array($application->status, ['approved_pending_payment','payment_proof_uploaded','waiver_uploaded','returned_from_payments'])): ?>
          <form method="POST" action="<?php echo e(route('staff.accounts.applications.paid', $application)); ?>" class="mb-3">
            <?php echo csrf_field(); ?>
            <label class="form-label fw-semibold">Decision notes (optional)</label>
            <textarea class="form-control mb-2" name="decision_notes" rows="3" placeholder="e.g. Proof valid / waiver accepted"></textarea>
            <button class="btn btn-success w-100"><i class="ri-check-line me-1"></i>Confirm Payment/Waiver & Send to Registrar</button>
          </form>

          <form method="POST" action="<?php echo e(route('staff.accounts.applications.return', $application)); ?>">
            <?php echo csrf_field(); ?>
            <label class="form-label fw-semibold">Rejection / Return reason</label>
            <textarea class="form-control mb-2" name="decision_notes" rows="3" required placeholder="Explain why payment/waiver is rejected"></textarea>
            <button class="btn btn-outline-danger w-100"><i class="ri-close-line me-1"></i>Return to Officer / Reject</button>
          </form>
        <?php else: ?>
          <div class="alert alert-info mb-0">
            This application is not currently in the payments verification stage.
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/show.blade.php ENDPATH**/ ?>