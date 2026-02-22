<?php $__env->startSection('title', 'Compliance & Risk'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Compliance & Governance Monitoring</h4>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3"><i class="ri-alarm-warning-line me-1 text-danger"></i> High-Risk Actions (This Month)</h6>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Category Reassignments</span>
                        <span class="badge bg-warning rounded-pill"><?php echo e($risks['category_reassignments']); ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Certificate Edits After Approval</span>
                        <span class="badge bg-danger rounded-pill"><?php echo e($risks['certificate_edits']); ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Excessive Reprints (>1)</span>
                        <span class="badge bg-dark rounded-pill"><?php echo e($risks['reprints_above_threshold']); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3"><i class="ri-shield-user-line me-1 text-primary"></i> Suspicious Activity Alerts</h6>
                <div class="alert alert-warning border-0 d-flex align-items-center">
                    <i class="ri-error-warning-line fs-3 me-2"></i>
                    <div>
                        <div class="fw-bold">Failed Login Attempts</div>
                        <div class="smaller">Total attempts: <?php echo e($suspicious['failed_logins']); ?> (Month)</div>
                    </div>
                </div>
                <div class="alert alert-info border-0 d-flex align-items-center mt-3">
                    <i class="ri-user-search-line fs-3 me-2"></i>
                    <div>
                        <div class="fw-bold">Frequent Reassignments</div>
                        <div class="smaller">No anomalies detected in staff behavior.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="zmc-card p-0">
                <div class="p-3 border-bottom bg-light">
                    <h6 class="fw-bold m-0">Compliance Audit Preview</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="bg-light smaller">
                            <tr>
                                <th class="ps-3">Timestamp</th>
                                <th>Officer</th>
                                <th>Action</th>
                                <th>Reference</th>
                                <th>Reason / Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\ActivityLog::whereIn('action', ['registrar_reassign_category', 'certificate_edit'])->latest()->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-3 smaller"><?php echo e($log->created_at->format('d M Y H:i')); ?></td>
                                <td class="smaller"><?php echo e($log->user?->name ?? 'System'); ?></td>
                                <td><span class="badge bg-light text-dark border"><?php echo e(str_replace('_', ' ', $log->action)); ?></span></td>
                                <td class="smaller"><?php echo e(optional($log->entity)->reference ?? '—'); ?></td>
                                <td class="smaller text-muted"><?php echo e($log->meta['reason'] ?? 'N/A'); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="5" class="text-center py-4 text-muted">No specific compliance logs found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/staff/director/reports/compliance.blade.php ENDPATH**/ ?>