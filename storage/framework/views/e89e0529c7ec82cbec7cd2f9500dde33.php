<?php $__env->startSection('title', 'Registrar Review - ' . $application->reference); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0"><?php echo e($application->reference); ?></h4>
            <div class="text-muted small">
                <?php echo e(strtoupper($application->application_type)); ?> •
                <span class="badge bg-primary-subtle text-primary border-primary">
                    <?php echo e(strtoupper(str_replace('_',' ', $application->status))); ?>

                </span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('staff.registrar.incoming-queue')); ?>" class="btn btn-light border btn-sm">
                <i class="ri-arrow-left-line"></i> Back to Queue
            </a>
            <a href="<?php echo e(route('staff.registrar.dashboard')); ?>" class="btn btn-light border btn-sm">Dashboard</a>
        </div>
    </div>

    <?php if(session('success')): ?> <div class="alert alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-lg-8">
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold d-flex justify-content-between">
                    <span><i class="ri-user-line me-1"></i> Applicant Details</span>
                    <span class="small text-muted">ID: <?php echo e($application->id); ?></span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="small text-muted d-block">Full Name</label>
                            <span class="fw-bold"><?php echo e($application->applicant?->name ?? '—'); ?></span>
                        </div>
                        <div class="col-md-4">
                            <label class="small text-muted d-block">ID/Passport</label>
                            <span class="fw-bold"><?php echo e($application->form_data['id_passport_number'] ?? '—'); ?></span>
                        </div>
                        <div class="col-md-4">
                            <label class="small text-muted d-block">Nationality</label>
                            <span class="fw-bold"><?php echo e($application->form_data['nationality'] ?? '—'); ?></span>
                        </div>
                        <div class="col-md-4">
                            <label class="small text-muted d-block">Residency</label>
                            <span class="fw-bold text-uppercase"><?php echo e($application->residency_type ?? 'local'); ?></span>
                        </div>
                        <div class="col-md-4">
                            <label class="small text-muted d-block">Contact</label>
                            <span class="fw-bold"><?php echo e($application->applicant?->email); ?></span>
                        </div>
                        <div class="col-md-4">
                            <label class="small text-muted d-block">Media House</label>
                            <span class="fw-bold"><?php echo e($application->form_data['employer_name'] ?? '—'); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-award-line me-1"></i> Category Validation
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <label class="small text-muted d-block">Currently Assigned Category</label>
                            <span class="h5 fw-bold text-primary">
                                <?php echo e($application->accreditation_category_code ?? $application->media_house_category_code ?? 'NOT ASSIGNED'); ?>

                            </span>
                        </div>
                        <?php if(in_array($application->status, ['paid_confirmed', 'registrar_review'])): ?>
                        <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#reassignModal">
                            <i class="ri-edit-line"></i> Reassign Category
                        </button>
                        <?php endif; ?>
                    </div>

                    <div class="p-3 bg-light rounded">
                        <h6 class="small fw-bold mb-2">Supporting Evidence Summary</h6>
                        <ul class="small mb-0">
                            <li>Designation: <?php echo e($application->form_data['designation'] ?? '—'); ?></li>
                            <li>Medium Type: <?php echo e($application->form_data['medium_type'] ?? '—'); ?></li>
                            <li>Scope: <?php echo e($application->journalist_scope ?? '—'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-checkbox-list-line me-1"></i> Document Checklist
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light small">
                                <tr>
                                    <th>Document Type</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $application->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="small fw-bold"><?php echo e(strtoupper(str_replace('_',' ', $doc->doc_type))); ?></td>
                                        <td><span class="badge bg-success-subtle text-success">PRESENT</span></td>
                                        <td class="text-end">
                                            <a href="<?php echo e(\Illuminate\Support\Facades\Storage::url($doc->file_path)); ?>" target="_blank" class="btn btn-xs btn-outline-primary">
                                                <i class="ri-eye-line"></i> Preview
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr><td colspan="3" class="text-center py-3 text-muted">No documents found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-history-line me-1"></i> Full Audit Trail (Timeline)
                </div>
                <div class="card-body">
                    <div class="timeline-v2">
                        <?php $__currentLoopData = $auditTrail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="timeline-item pb-3 mb-3 border-bottom border-light">
                                <div class="d-flex justify-content-between">
                                    <span class="small fw-bold text-dark"><?php echo e(strtoupper(str_replace('_',' ', $log->action))); ?></span>
                                    <span class="small text-muted"><?php echo e($log->created_at->format('d M Y H:i')); ?></span>
                                </div>
                                <div class="small text-muted">
                                    By: <?php echo e($log->user?->name ?? 'System'); ?> (<?php echo e($log->user_role ?? '—'); ?>)
                                </div>
                                <?php if($log->meta): ?>
                                    <div class="mt-1 p-2 bg-light rounded small text-dark">
                                        <?php $__currentLoopData = $log->meta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk => $mv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(is_string($mv)): ?>
                                                <div><strong><?php echo e($mk); ?>:</strong> <?php echo e($mv); ?></div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold text-success">
                    <i class="ri-bank-card-line me-1"></i> Payment Validation
                </div>
                <div class="card-body">
                    <?php
                        $lastPayment = $application->payments->last();
                    ?>
                    <?php if($lastPayment): ?>
                        <div class="mb-3">
                            <label class="small text-muted d-block">Status</label>
                            <span class="badge bg-success-subtle text-success border-success px-3">
                                <?php echo e(strtoupper($lastPayment->status)); ?>

                            </span>
                        </div>
                        <div class="mb-2 small">
                            <strong>Method:</strong> <?php echo e(strtoupper($lastPayment->method)); ?> (<?php echo e($lastPayment->source); ?>)<br>
                            <strong>Amount:</strong> <?php echo e($lastPayment->amount); ?> <?php echo e($lastPayment->currency); ?><br>
                            <strong>Reference:</strong> <?php echo e($lastPayment->reference); ?><br>
                            <strong>Date:</strong> <?php echo e($lastPayment->confirmed_at?->format('d M Y') ?? '—'); ?>

                        </div>
                        <hr>
                        <div class="small text-muted">
                            <i class="ri-checkbox-circle-line me-1"></i> Verified by Accounts
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning small mb-0">No payment records found.</div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-printer-line me-1"></i> Issuance & Printing
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small text-muted d-block">Current Status</label>
                        <span class="fw-bold"><?php echo e(strtoupper(str_replace('_',' ', $application->status))); ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted d-block">Print Count</label>
                        <span class="h4 fw-bold <?php echo e($application->print_count > 1 ? 'text-danger' : ''); ?>">
                            <?php echo e($application->print_count); ?>

                        </span>
                    </div>
                    <?php if($application->printLogs->count() > 0): ?>
                        <div class="list-group list-group-flush border-top mt-2">
                            <?php $__currentLoopData = $application->printLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-group-item px-0 py-2 small">
                                    <div class="d-flex justify-content-between">
                                        <strong><?php echo e(strtoupper($pl->document_type)); ?></strong>
                                        <span><?php echo e($pl->printed_at->format('d M H:i')); ?></span>
                                    </div>
                                    <div class="text-muted">By: <?php echo e($pl->printedBy?->name); ?></div>
                                    <div class="text-muted">Reason: <?php echo e($pl->reason); ?></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="ri-settings-3-line me-1"></i> Registrar Actions
                </div>
                <div class="card-body">
                    <?php if(in_array($application->status, ['registrar_review'])): ?>
                        <?php if($application->payment_status !== 'paid' && !$application->registrar_reviewed_at): ?>
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-primary">Stage 1: Approval for Payment</label>
                                <button type="button" class="btn btn-primary w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#approveForPaymentModal">
                                    <i class="ri-money-dollar-circle-line me-1"></i> Approve for Payment
                                </button>
                                <div class="form-text smaller mt-1">This forwards the application to Accounts.</div>
                            </div>
                            <hr>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array($application->status, ['paid_confirmed', 'registrar_review'])): ?>
                        <form method="POST" action="<?php echo e(route('staff.registrar.applications.approve', $application)); ?>" class="mb-3">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="category_code" value="<?php echo e($application->accreditation_category_code ?? $application->media_house_category_code); ?>">
                            <label class="form-label small fw-bold">Internal Notes (Optional)</label>
                            <textarea class="form-control mb-2" name="decision_notes" rows="3" placeholder="Add any notes..."></textarea>
                            <button class="btn btn-success w-100 shadow-sm" <?php echo e($application->status !== 'paid_confirmed' ? 'disabled' : ''); ?>>
                                <i class="ri-check-line me-1"></i> Final Approval
                            </button>
                            <?php if($application->status !== 'paid_confirmed'): ?>
                                <div class="form-text smaller text-danger">Final approval requires confirmed payment.</div>
                            <?php endif; ?>
                        </form>

                        <div class="row g-2">
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-warning w-100 btn-sm" data-bs-toggle="modal" data-bs-target="#returnModal">
                                    <i class="ri-arrow-go-back-line"></i> Return
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-danger w-100 btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                    <i class="ri-close-line"></i> Reject
                                </button>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info small mb-0 text-center">
                            <i class="ri-information-line me-1"></i> No pending actions for Registrar.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="approveForPaymentModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="<?php echo e(route('staff.registrar.applications.approve-for-payment', $application)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title">Approve for Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>This will forward the application to the Accounts department for payment verification. The applicant will be notified to proceed with payment.</p>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Internal Notes for Accounts</label>
                    <textarea name="decision_notes" class="form-control" rows="3" placeholder="Optional notes..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Forward to Accounts</button>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="reassignModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="<?php echo e(route('staff.registrar.applications.reassign-category', $application)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title">Reassign Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php
                    $isRegistration = $application->application_type === 'registration';
                    $cats = $isRegistration ? \App\Models\Application::massMediaCategories() : \App\Models\Application::accreditationCategories();
                ?>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Select New Category</label>
                    <select name="category_code" class="form-select" required>
                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($code); ?>" <?php echo e(($application->accreditation_category_code ?? $application->media_house_category_code) == $code ? 'selected' : ''); ?>>
                                <?php echo e($code); ?> - <?php echo e($name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Reason for Reassignment</label>
                    <textarea name="reason" class="form-control" rows="3" required placeholder="State why the category is being changed..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning">Reassign & Update</button>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="returnModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="<?php echo e(route('staff.registrar.applications.return', $application)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title">Return to Accreditation Officer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="small text-muted">This will send the application back to the Accreditation Officer for correction.</p>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Notes / Required Fixes</label>
                    <textarea name="decision_notes" class="form-control" rows="4" required placeholder="Specify what needs to be fixed..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning">Send Back</button>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="<?php echo e(route('staff.registrar.applications.reject', $application)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title">Reject Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Rejection Reason</label>
                    <textarea name="decision_notes" class="form-control" rows="4" required placeholder="Provide a clear reason for the applicant..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Confirm Reject</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .timeline-v2 { position: relative; }
    .timeline-item { position: relative; padding-left: 20px; }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #2563eb;
    }
    .timeline-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 4px;
        top: 15px;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/show.blade.php ENDPATH**/ ?>