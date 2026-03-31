<?php $__env->startSection('title', 'System Audit Trail'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="mb-4">
        <h4 class="fw-bold m-0">System Audit Trail</h4>
        <div class="text-muted small">Chronological chain of custody and action logs.</div>
    </div>

    <form action="<?php echo e(url()->current()); ?>" method="GET" class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-10">
                    <input type="text" name="search" class="form-control" placeholder="Search by action, user, or meta data..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="zmc-card p-0 shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 small">
                <thead class="bg-light">
                    <tr class="text-muted text-uppercase">
                        <th>Timestamp</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Entity</th>
                        <th>Details</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted"><?php echo e($log->created_at->format('d M Y H:i:s')); ?></td>
                            <td class="fw-bold"><?php echo e($log->user?->name ?? 'System'); ?></td>
                            <td><span class="badge bg-light text-dark border"><?php echo e($log->user_role); ?></span></td>
                            <td><span class="fw-bold text-primary"><?php echo e(strtoupper(str_replace('_',' ', $log->action))); ?></span></td>
                            <td>
                                <?php if($log->entity): ?>
                                    <span class="text-muted"><?php echo e(class_basename($log->entity_type)); ?> #<?php echo e($log->entity_id); ?></span>
                                <?php else: ?>
                                    <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($log->meta): ?>
                                    <div class="text-truncate" style="max-width: 250px;" title="<?php echo e(json_encode($log->meta)); ?>">
                                        <?php echo e(json_encode($log->meta)); ?>

                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted"><?php echo e($log->ip); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">No audit logs found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        <?php echo e($logs->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/audit_trail.blade.php ENDPATH**/ ?>