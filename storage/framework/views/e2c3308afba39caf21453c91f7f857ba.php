<?php $__env->startSection('title', 'Payment Detail'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0">Payment Submission Detail</h4>
            <div class="text-muted small mt-1">
                <i class="ri-eye-line me-1"></i>
                Read-only view
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('staff.registrar.payment-oversight')); ?>" class="btn btn-light border btn-sm">
                <i class="ri-arrow-left-line"></i> Back to Oversight
            </a>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-money-dollar-circle-line me-2"></i> Payment Information
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="small text-muted d-block">Payment Stage</label>
                            <span class="badge bg-secondary-subtle text-secondary border-secondary px-3 py-2">
                                <?php echo e($paymentSubmission->getStageLabel()); ?>

                            </span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Payment Method</label>
                            <span class="fw-bold"><?php echo e($paymentSubmission->getMethodLabel()); ?></span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Reference Number</label>
                            <span class="fw-bold"><?php echo e($paymentSubmission->reference ?? '—'); ?></span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Amount</label>
                            <span class="fw-bold">
                                <?php if($paymentSubmission->amount): ?>
                                    <?php echo e($paymentSubmission->currency); ?> $<?php echo e(number_format($paymentSubmission->amount, 2)); ?>

                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Status</label>
                            <span class="badge bg-<?php echo e($paymentSubmission->getStatusColor()); ?>-subtle text-<?php echo e($paymentSubmission->getStatusColor()); ?> border-<?php echo e($paymentSubmission->getStatusColor()); ?> px-3 py-2">
                                <?php echo e(ucfirst($paymentSubmission->status)); ?>

                            </span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Submitted At</label>
                            <span class="fw-bold"><?php echo e($paymentSubmission->submitted_at?->format('d M Y H:i:s') ?? '—'); ?></span>
                        </div>

                        <?php if($paymentSubmission->verified_at): ?>
                            <div class="col-md-6">
                                <label class="small text-muted d-block">Verified At</label>
                                <span class="fw-bold"><?php echo e($paymentSubmission->verified_at->format('d M Y H:i:s')); ?></span>
                            </div>

                            <div class="col-md-6">
                                <label class="small text-muted d-block">Verified By</label>
                                <span class="fw-bold"><?php echo e($paymentSubmission->verifier->name ?? '—'); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($paymentSubmission->rejection_reason): ?>
                            <div class="col-12">
                                <label class="small text-muted d-block">Rejection Reason</label>
                                <div class="alert alert-danger mb-0">
                                    <?php echo e($paymentSubmission->rejection_reason); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <?php if($paymentSubmission->proof_metadata): ?>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-bold">
                        <i class="ri-file-text-line me-2"></i> Proof Details
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <?php if(isset($paymentSubmission->proof_metadata['payer_name'])): ?>
                                <div class="col-md-6">
                                    <label class="small text-muted d-block">Payer Name</label>
                                    <span class="fw-bold"><?php echo e($paymentSubmission->proof_metadata['payer_name']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($paymentSubmission->proof_metadata['payment_date'])): ?>
                                <div class="col-md-6">
                                    <label class="small text-muted d-block">Payment Date</label>
                                    <span class="fw-bold"><?php echo e($paymentSubmission->proof_metadata['payment_date']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($paymentSubmission->proof_metadata['file_name'])): ?>
                                <div class="col-md-6">
                                    <label class="small text-muted d-block">File Name</label>
                                    <span class="fw-bold"><?php echo e($paymentSubmission->proof_metadata['file_name']); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($paymentSubmission->proof_metadata['file_hash'])): ?>
                                <div class="col-md-12">
                                    <label class="small text-muted d-block">File Hash (SHA256)</label>
                                    <code class="small"><?php echo e($paymentSubmission->proof_metadata['file_hash']); ?></code>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-file-list-line me-2"></i> Application Information
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="small text-muted d-block">Reference</label>
                            <span class="fw-bold"><?php echo e($paymentSubmission->application->reference); ?></span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Application Type</label>
                            <span class="fw-bold text-uppercase"><?php echo e($paymentSubmission->application->application_type); ?></span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Applicant</label>
                            <span class="fw-bold"><?php echo e($paymentSubmission->application->applicant->name ?? '—'); ?></span>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block">Current Status</label>
                            <span class="badge bg-primary-subtle text-primary border-primary">
                                <?php echo e(strtoupper(str_replace('_', ' ', $paymentSubmission->application->status))); ?>

                            </span>
                        </div>

                        <div class="col-12">
                            <a href="<?php echo e(route('staff.registrar.applications.show', $paymentSubmission->application)); ?>" class="btn btn-sm btn-outline-primary">
                                <i class="ri-external-link-line me-1"></i> View Full Application
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php if($allPayments->count() > 1): ?>
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        <i class="ri-history-line me-2"></i> All Payment Submissions for This Application
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Stage</th>
                                    <th>Method</th>
                                    <th>Submitted</th>
                                    <th>Status</th>
                                    <th>Verified By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $allPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e($p->id === $paymentSubmission->id ? 'table-active' : ''); ?>">
                                        <td>
                                            <span class="badge bg-secondary-subtle text-secondary border-secondary">
                                                <?php echo e($p->getStageLabel()); ?>

                                            </span>
                                        </td>
                                        <td class="small"><?php echo e($p->getMethodLabel()); ?></td>
                                        <td class="small"><?php echo e($p->submitted_at?->format('d M Y H:i')); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo e($p->getStatusColor()); ?>-subtle text-<?php echo e($p->getStatusColor()); ?> border-<?php echo e($p->getStatusColor()); ?>">
                                                <?php echo e(ucfirst($p->status)); ?>

                                            </span>
                                        </td>
                                        <td class="small"><?php echo e($p->verifier->name ?? '—'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-time-line me-2"></i> Activity Timeline
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <?php if($paymentSubmission->verified_at): ?>
                            <div class="timeline-item">
                                <div class="timeline-marker bg-<?php echo e($paymentSubmission->status === 'verified' ? 'success' : 'danger'); ?>"></div>
                                <div class="timeline-content">
                                    <div class="fw-bold small">
                                        <?php echo e($paymentSubmission->status === 'verified' ? 'Verified' : 'Rejected'); ?>

                                    </div>
                                    <div class="text-muted" style="font-size: 11px;">
                                        <?php echo e($paymentSubmission->verified_at->format('d M Y H:i:s')); ?>

                                    </div>
                                    <div class="small">By: <?php echo e($paymentSubmission->verifier->name ?? 'System'); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <div class="fw-bold small">Submitted</div>
                                <div class="text-muted" style="font-size: 11px;">
                                    <?php echo e($paymentSubmission->submitted_at?->format('d M Y H:i:s')); ?>

                                </div>
                                <div class="small">Method: <?php echo e($paymentSubmission->getMethodLabel()); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="alert alert-info mt-4">
                <div class="d-flex align-items-start">
                    <i class="ri-information-line me-2" style="font-size: 1.5rem;"></i>
                    <div>
                        <strong>Read-Only Access</strong>
                        <div class="small mt-1">
                            You are viewing this payment submission for oversight purposes only. 
                            All payment verification actions are handled by the Accounts department.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    padding-bottom: 20px;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -21px;
    top: 20px;
    width: 2px;
    height: calc(100% - 10px);
    background: #e2e8f0;
}

.timeline-marker {
    position: absolute;
    left: -26px;
    top: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px currentColor;
}

.timeline-content {
    padding-left: 10px;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/payment_detail.blade.php ENDPATH**/ ?>