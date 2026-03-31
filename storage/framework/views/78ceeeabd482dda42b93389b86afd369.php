<?php $__env->startSection('title', 'Payments Listing'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Payments Listing</h4>
        <a href="<?php echo e(route('staff.accounts.payments.offline.create')); ?>" class="btn btn-primary">
            <i class="ri-add-line"></i> Record Offline Payment
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?php echo e(route('staff.accounts.payments.index')); ?>" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control" value="<?php echo e(request('search')); ?>" placeholder="Ref, Applicant Name...">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select name="status[]" class="form-select select2" multiple>
                        <option value="paid" <?php echo e(in_array('paid', (array)request('status')) ? 'selected' : ''); ?>>Paid</option>
                        <option value="pending" <?php echo e(in_array('pending', (array)request('status')) ? 'selected' : ''); ?>>Pending</option>
                        <option value="failed" <?php echo e(in_array('failed', (array)request('status')) ? 'selected' : ''); ?>>Failed</option>
                        <option value="reversed" <?php echo e(in_array('reversed', (array)request('status')) ? 'selected' : ''); ?>>Reversed</option>
                        <option value="refunded" <?php echo e(in_array('refunded', (array)request('status')) ? 'selected' : ''); ?>>Refunded</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Method</label>
                    <select name="method[]" class="form-select select2" multiple>
                        <option value="paynow" <?php echo e(in_array('paynow', (array)request('method')) ? 'selected' : ''); ?>>Paynow</option>
                        <option value="bank_transfer" <?php echo e(in_array('bank_transfer', (array)request('method')) ? 'selected' : ''); ?>>Bank Transfer</option>
                        <option value="cash" <?php echo e(in_array('cash', (array)request('method')) ? 'selected' : ''); ?>>Cash</option>
                        <option value="pos" <?php echo e(in_array('pos', (array)request('method')) ? 'selected' : ''); ?>>POS</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">From</label>
                    <input type="date" name="date_from" class="form-control" value="<?php echo e(request('date_from')); ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label">To</label>
                    <input type="date" name="date_to" class="form-control" value="<?php echo e(request('date_to')); ?>">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-secondary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Reference</th>
                        <th>Applicant</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <span class="fw-bold"><?php echo e($payment->reference); ?></span>
                            <?php if($payment->source == 'offline'): ?>
                                <span class="badge bg-info">Offline</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($payment->application->applicant->name ?? 'N/A'); ?>

                            <div class="small text-muted"><?php echo e($payment->applicant_category); ?> | <?php echo e($payment->residency); ?></div>
                        </td>
                        <td><?php echo e(number_format($payment->amount, 2)); ?> <?php echo e($payment->currency); ?></td>
                        <td><?php echo e(ucfirst(str_replace('_', ' ', $payment->method))); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($payment->status == 'paid' ? 'success' : ($payment->status == 'pending' ? 'warning' : 'danger')); ?>">
                                <?php echo e(ucfirst($payment->status)); ?>

                            </span>
                        </td>
                        <td><?php echo e($payment->created_at->format('Y-m-d H:i')); ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Options
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="<?php echo e(route('staff.applications.details', $payment->application_id)); ?>">View Application</a></li>
                                    <?php if($payment->method == 'paynow' && $payment->status != 'paid'): ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('staff.accounts.payments.retry', $payment->id)); ?>">Retry Status</a></li>
                                    <?php endif; ?>
                                    <?php if($payment->status == 'paid'): ?>
                                    <li><button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#reverseModal<?php echo e($payment->id); ?>">Reverse</button></li>
                                    <li><button class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#refundModal<?php echo e($payment->id); ?>">Refund</button></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No payments found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white border-0">
            <?php echo e($payments->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/accounts/payments/index.blade.php ENDPATH**/ ?>