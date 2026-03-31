<?php $__env->startSection('title', 'Fix Requests'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0">Fix Requests from Registrar</h4>
            <p class="text-muted small mb-0">Applications requiring corrections</p>
        </div>
        <a href="<?php echo e(route('staff.officer.dashboard')); ?>" class="btn btn-light border btn-sm">
            <i class="ri-dashboard-line me-1"></i>Dashboard
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="ri-checkbox-circle-line me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label small">Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">Pending & In Progress</option>
                        <option value="pending" <?php echo e(request('status') === 'pending' ? 'selected' : ''); ?>>Pending Only</option>
                        <option value="in_progress" <?php echo e(request('status') === 'in_progress' ? 'selected' : ''); ?>>In Progress</option>
                        <option value="resolved" <?php echo e(request('status') === 'resolved' ? 'selected' : ''); ?>>Resolved</option>
                        <option value="cancelled" <?php echo e(request('status') === 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary btn-sm me-2">
                        <i class="ri-filter-line me-1"></i>Filter
                    </button>
                    <a href="<?php echo e(route('staff.officer.fix-requests')); ?>" class="btn btn-light border btn-sm">
                        <i class="ri-refresh-line"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $fixRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fixRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><?php echo e($fixRequest->application->reference); ?></span>
                    <?php
                        $statusColors = [
                            'pending' => 'warning',
                            'in_progress' => 'info',
                            'resolved' => 'success',
                            'cancelled' => 'secondary'
                        ];
                        $color = $statusColors[$fixRequest->status] ?? 'secondary';
                    ?>
                    <span class="badge bg-<?php echo e($color); ?>"><?php echo e(ucfirst($fixRequest->status)); ?></span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small text-muted d-block">Applicant</label>
                        <div class="fw-bold"><?php echo e($fixRequest->application->applicant->name); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="small text-muted d-block">Request Type</label>
                        <span class="badge bg-light text-dark border">
                            <?php echo e(str_replace('_', ' ', ucwords($fixRequest->request_type))); ?>

                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="small text-muted d-block">Description</label>
                        <div class="small"><?php echo e($fixRequest->description); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="small text-muted d-block">Requested By</label>
                        <div class="small"><?php echo e($fixRequest->requester->name); ?></div>
                        <div class="text-muted" style="font-size: 11px;"><?php echo e($fixRequest->created_at->diffForHumans()); ?></div>
                    </div>

                    <?php if($fixRequest->resolution_notes): ?>
                    <div class="mb-3">
                        <label class="small text-muted d-block">Resolution Notes</label>
                        <div class="small"><?php echo e($fixRequest->resolution_notes); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer bg-white border-top">
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('staff.officer.applications.show', $fixRequest->application)); ?>" 
                           class="btn btn-sm btn-primary flex-fill">
                            <i class="ri-eye-line me-1"></i>View Application
                        </a>
                        <?php if(in_array($fixRequest->status, ['pending', 'in_progress'])): ?>
                        <button type="button" class="btn btn-sm btn-success" 
                                data-bs-toggle="modal" 
                                data-bs-target="#resolveModal<?php echo e($fixRequest->id); ?>">
                            <i class="ri-check-line"></i>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="resolveModal<?php echo e($fixRequest->id); ?>" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="<?php echo e(route('staff.officer.fix-requests.resolve', $fixRequest)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title"><i class="ri-check-line me-2"></i>Resolve Fix Request</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info small">
                            <i class="ri-information-line me-1"></i>
                            After resolving, the application will return to your queue for re-approval.
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Action</label>
                            <select name="action" class="form-select" required>
                                <option value="resolved">Mark as Resolved</option>
                                <option value="cancelled">Cancel Request</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Resolution Notes (Optional)</label>
                            <textarea name="resolution_notes" class="form-control" rows="4" 
                                      placeholder="Describe what was fixed..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">
                            <i class="ri-check-line me-1"></i>Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="ri-inbox-line text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                    <h5 class="text-muted mt-3">No Fix Requests</h5>
                    <p class="text-muted small">You don't have any pending fix requests from the Registrar.</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php if($fixRequests->hasPages()): ?>
    <div class="mt-4">
        <?php echo e($fixRequests->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/fix_requests.blade.php ENDPATH**/ ?>