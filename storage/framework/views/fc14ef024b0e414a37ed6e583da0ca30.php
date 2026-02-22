<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 p-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold m-0 text-danger">Critical Log Events</h6>
            <p class="text-slate-600 small m-0 fw-medium">System warnings, errors, and failed attempts monitoring</p>
        </div>
        <button class="btn btn-danger btn-sm rounded-pill px-3 fw-bold">Clear Resolve Error</button>
    </div>
    <div class="card-body p-0">
         <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead class="bg-danger-subtle border-top border-bottom border-danger-subtle">
                    <tr>
                        <th class="ps-4 small text-danger uppercase fw-bold py-3">Timestamp</th>
                        <th class="small text-danger uppercase fw-bold py-3">Action</th>
                        <th class="small text-danger uppercase fw-bold py-3">User/IP</th>
                        <th class="small text-danger uppercase fw-bold py-3">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="table-danger-light">
                        <td class="ps-4 small fw-medium text-slate-600"><?php echo e($log->created_at->format('Y-m-d H:i:s')); ?></td>
                        <td class="small fw-bold text-danger"><?php echo e(strtoupper($log->action)); ?></td>
                        <td>
                            <div class="small fw-bold text-slate-900"><?php echo e($log->user?->email ?? 'Guest'); ?></div>
                            <div class="text-slate-600 fw-bold" style="font-size: 11px;">IP: <?php echo e($log->ip); ?></div>
                        </td>
                        <td style="max-width: 400px;">
                            <code class="small text-danger bg-danger-subtle p-1 rounded"><?php echo e(json_encode($log->meta)); ?></code>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="py-5 text-center text-muted">No critical errors found in recent logs.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-top">
            <?php echo e($logs->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/staff/it/dashboard/partials/errors.blade.php ENDPATH**/ ?>