<?php $__env->startSection('title', 'Renewal Details'); ?>

<?php $__env->startSection('content'); ?>
<div id="renewals-show-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Renewal Application Details</h4>
    <a class="btn btn-secondary" href="<?php echo e(route('accreditation.renewals.index')); ?>">
      <i class="ri-arrow-left-line me-1"></i>Back to Renewals
    </a>
  </div>

  <!-- Status Banner -->
  <div class="alert 
    <?php if($renewal->status === 'renewal_produced_ready_for_collection'): ?> alert-success
    <?php elseif($renewal->status === 'renewal_payment_rejected'): ?> alert-danger
    <?php elseif($renewal->status === 'renewal_payment_verified'): ?> alert-info
    <?php else: ?> alert-warning
    <?php endif; ?> mb-4">
    <div class="d-flex align-items-start">
      <i class="
        <?php if($renewal->status === 'renewal_produced_ready_for_collection'): ?> ri-checkbox-circle-line
        <?php elseif($renewal->status === 'renewal_payment_rejected'): ?> ri-error-warning-line
        <?php elseif($renewal->status === 'renewal_payment_verified'): ?> ri-information-line
        <?php else: ?> ri-time-line
        <?php endif; ?> me-2" style="font-size:20px;"></i>
      <div>
        <div class="fw-bold">Status: <?php echo e($renewal->getStatusLabel()); ?></div>
        
        <?php if($renewal->status === 'renewal_payment_rejected'): ?>
          <div class="mt-2" style="font-size:13px;">
            <strong>Reason:</strong> <?php echo e($renewal->payment_rejection_reason); ?>

          </div>
          <div class="mt-1" style="font-size:13px;">
            Please resubmit your payment to continue.
          </div>
        <?php elseif($renewal->status === 'renewal_produced_ready_for_collection'): ?>
          <div class="mt-2" style="font-size:13px;">
            Your renewed document is ready for collection at: <strong><?php echo e($renewal->collection_location); ?></strong>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <!-- Original Record -->
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h6 class="fw-bold mb-3"><i class="ri-file-text-line me-2"></i>Original Record</h6>
          <div class="row g-3">
            <div class="col-12">
              <div class="zmc-lbl">Accreditation Number</div>
              <div class="fw-semibold"><?php echo e($renewal->original_number); ?></div>
            </div>
            <?php if($renewal->originalApplication): ?>
              <div class="col-12">
                <div class="zmc-lbl">Type</div>
                <div class="fw-semibold"><?php echo e(ucfirst($renewal->originalApplication->application_type)); ?></div>
              </div>
              <div class="col-12">
                <div class="zmc-lbl">Full Name</div>
                <div class="fw-semibold"><?php echo e($renewal->originalApplication->applicant->name); ?></div>
              </div>
              <div class="col-12">
                <div class="zmc-lbl">Email Address</div>
                <div class="fw-semibold"><?php echo e($renewal->originalApplication->applicant->email); ?></div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Payment Information -->
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h6 class="fw-bold mb-3"><i class="ri-wallet-line me-2"></i>Payment Information</h6>
          <div class="row g-3">
            <div class="col-12">
              <div class="zmc-lbl">Payment Method</div>
              <div class="fw-semibold"><?php echo e($renewal->getPaymentMethodLabel() ?? 'Not submitted'); ?></div>
            </div>
            <?php if($renewal->payment_reference): ?>
              <div class="col-12">
                <div class="zmc-lbl">Reference</div>
                <div class="fw-semibold"><?php echo e($renewal->payment_reference); ?></div>
              </div>
            <?php endif; ?>
            <?php if($renewal->payment_amount): ?>
              <div class="col-12">
                <div class="zmc-lbl">Amount</div>
                <div class="fw-semibold">$<?php echo e(number_format($renewal->payment_amount, 2)); ?></div>
              </div>
            <?php endif; ?>
            <?php if($renewal->payment_submitted_at): ?>
              <div class="col-12">
                <div class="zmc-lbl">Submitted</div>
                <div class="fw-semibold"><?php echo e($renewal->payment_submitted_at->format('M d, Y H:i')); ?></div>
              </div>
            <?php endif; ?>
            <?php if($renewal->payment_verified_at): ?>
              <div class="col-12">
                <div class="zmc-lbl">Verified</div>
                <div class="fw-semibold"><?php echo e($renewal->payment_verified_at->format('M d, Y H:i')); ?></div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Changes Requested -->
    <?php if($renewal->has_changes && $renewal->changeRequests->count() > 0): ?>
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <h6 class="fw-bold mb-3"><i class="ri-edit-line me-2"></i>Changes Requested</h6>
            <div class="row g-3">
              <?php $__currentLoopData = $renewal->changeRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                  <div class="border rounded p-3">
                    <div class="fw-bold mb-2"><?php echo e($change->field_name); ?></div>
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="zmc-lbl">Old Value</div>
                        <div style="font-size:13px;"><?php echo e($change->old_value); ?></div>
                      </div>
                      <div class="col-6">
                        <div class="zmc-lbl">New Value</div>
                        <div style="font-size:13px;"><?php echo e($change->new_value); ?></div>
                      </div>
                    </div>
                    <?php if($change->supporting_document_path): ?>
                      <div class="mt-2">
                        <span class="badge bg-info"><i class="ri-attachment-line me-1"></i>Document attached</span>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Timeline -->
    <div class="col-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="fw-bold mb-3"><i class="ri-time-line me-2"></i>Application Timeline</h6>
          <div class="timeline">
            <div class="timeline-item">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="fw-semibold">Renewal Started</div>
                <div class="text-muted" style="font-size:12px;"><?php echo e($renewal->created_at->format('M d, Y H:i')); ?></div>
              </div>
            </div>
            
            <?php if($renewal->looked_up_at): ?>
              <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                  <div class="fw-semibold">Record Lookup Completed</div>
                  <div class="text-muted" style="font-size:12px;"><?php echo e($renewal->looked_up_at->format('M d, Y H:i')); ?></div>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if($renewal->confirmed_at): ?>
              <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                  <div class="fw-semibold">Information Confirmed</div>
                  <div class="text-muted" style="font-size:12px;"><?php echo e($renewal->confirmed_at->format('M d, Y H:i')); ?></div>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if($renewal->payment_submitted_at): ?>
              <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                  <div class="fw-semibold">Payment Submitted</div>
                  <div class="text-muted" style="font-size:12px;"><?php echo e($renewal->payment_submitted_at->format('M d, Y H:i')); ?></div>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if($renewal->payment_verified_at): ?>
              <div class="timeline-item">
                <div class="timeline-marker bg-success"></div>
                <div class="timeline-content">
                  <div class="fw-semibold text-success">Payment Verified</div>
                  <div class="text-muted" style="font-size:12px;"><?php echo e($renewal->payment_verified_at->format('M d, Y H:i')); ?></div>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if($renewal->produced_at): ?>
              <div class="timeline-item">
                <div class="timeline-marker bg-success"></div>
                <div class="timeline-content">
                  <div class="fw-semibold text-success">Document Produced</div>
                  <div class="text-muted" style="font-size:12px;"><?php echo e($renewal->produced_at->format('M d, Y H:i')); ?></div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('styles'); ?>
<style>
.timeline {
  position: relative;
  padding-left: 30px;
}
.timeline-item {
  position: relative;
  padding-bottom: 20px;
}
.timeline-item:last-child {
  padding-bottom: 0;
}
.timeline-item::before {
  content: '';
  position: absolute;
  left: -23px;
  top: 8px;
  bottom: -12px;
  width: 2px;
  background: #e5e7eb;
}
.timeline-item:last-child::before {
  display: none;
}
.timeline-marker {
  position: absolute;
  left: -28px;
  top: 4px;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #000;
  border: 2px solid #fff;
  box-shadow: 0 0 0 2px #e5e7eb;
}
.timeline-content {
  padding-left: 10px;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/renewals/show.blade.php ENDPATH**/ ?>