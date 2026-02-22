<div class="row g-4 mb-4">
    <div class="col-md-7">
        <div class="zmc-card bg-white shadow-sm border-0 rounded-4 p-4 h-100">
            <h5 class="fw-bold mb-4">High-Risk Action Log (MTD)</h5>
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead class="bg-light rounded-3">
                        <tr>
                            <th class="ps-3 py-3 text-muted small fw-bold text-uppercase">Critical Action Type</th>
                            <th class="py-3 text-center text-muted small fw-bold text-uppercase">Occurrences</th>
                            <th class="pe-3 py-3 text-end text-muted small fw-bold text-uppercase">Risk Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-3 py-3 fw-bold">Category Reassignments</td>
                            <td class="py-3 text-center h5 mb-0 fw-black"><?php echo e(number_format($auditSnapshot['category_reassignments'] ?? 0)); ?></td>
                            <td class="pe-3 py-3 text-end">
                                <?php
                                    $count = $auditSnapshot['category_reassignments'] ?? 0;
                                    $badge = $count > 10 ? 'danger' : ($count > 5 ? 'warning' : 'success');
                                    $level = $count > 10 ? 'HIGH' : ($count > 5 ? 'MEDIUM' : 'LOW');
                                ?>
                                <span class="badge bg-<?php echo e($badge); ?> bg-opacity-10 text-<?php echo e($badge); ?> px-3 py-1 rounded-pill"><?php echo e($level); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3 py-3 fw-bold">Manual Payment Overrides</td>
                            <td class="py-3 text-center h5 mb-0 fw-black"><?php echo e(number_format($auditSnapshot['manual_payment_overrides'] ?? 0)); ?></td>
                            <td class="pe-3 py-3 text-end">
                                <?php
                                    $count = $auditSnapshot['manual_payment_overrides'] ?? 0;
                                    $badge = $count > 5 ? 'danger' : ($count > 2 ? 'warning' : 'success');
                                    $level = $count > 5 ? 'HIGH' : ($count > 2 ? 'MEDIUM' : 'LOW');
                                ?>
                                <span class="badge bg-<?php echo e($badge); ?> bg-opacity-10 text-<?php echo e($badge); ?> px-3 py-1 rounded-pill"><?php echo e($level); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3 py-3 fw-bold">Certificate / Card Data Edits</td>
                            <td class="py-3 text-center h5 mb-0 fw-black"><?php echo e(number_format($auditSnapshot['certificate_edits'] ?? 0)); ?></td>
                            <td class="pe-3 py-3 text-end">
                                <?php
                                    $count = $auditSnapshot['certificate_edits'] ?? 0;
                                    $badge = $count > 5 ? 'danger' : ($count > 2 ? 'warning' : 'success');
                                    $level = $count > 5 ? 'HIGH' : ($count > 2 ? 'MEDIUM' : 'LOW');
                                ?>
                                <span class="badge bg-<?php echo e($badge); ?> bg-opacity-10 text-<?php echo e($badge); ?> px-3 py-1 rounded-pill"><?php echo e($level); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3 py-3 fw-bold">Reopened Applications</td>
                            <td class="py-3 text-center h5 mb-0 fw-black"><?php echo e(number_format($auditSnapshot['reopened_applications'] ?? 0)); ?></td>
                            <td class="pe-3 py-3 text-end">
                                <span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">INFO</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <?php if(array_sum($auditSnapshot ?? []) === 0): ?>
                <div class="mt-4 p-4 bg-success-subtle rounded-4 text-center">
                    <i class="ri-shield-check-line text-success" style="font-size: 48px;"></i>
                    <p class="mt-3 mb-0 text-success fw-bold">No high-risk actions recorded this month</p>
                    <p class="small text-muted mb-0">System operating within normal parameters</p>
                </div>
            <?php else: ?>
                <div class="mt-4 p-3 bg-light rounded-4">
                    <div class="d-flex gap-3 align-items-center">
                        <i class="ri-information-line text-primary h4 mb-0"></i>
                        <div class="smaller text-muted">A standard audit trail is maintained for all critical actions. The CEO can request detailed logs from the IT department if any spikes occur.</div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-md-5">
        <div class="zmc-card bg-white shadow-sm border-0 rounded-4 p-4 h-100">
            <h5 class="fw-bold mb-4">Reprint & Waste Integrity</h5>
            
            <?php
                $totalPrints = $reprints['total'] ?? 0;
                $totalReprints = $reprints['reprints'] ?? 0;
                $firstTime = $totalPrints - $totalReprints;
                $wastageRatio = $totalPrints > 0 ? round(($totalReprints / $totalPrints) * 100, 1) : 0;
            ?>
            
            <div class="text-center mb-4">
                 <div class="h1 fw-black mb-0 text-dark"><?php echo e(number_format($totalPrints)); ?></div>
                 <div class="text-muted small fw-bold text-uppercase">Total Prints (This Month)</div>
            </div>
            
            <?php if($totalPrints > 0): ?>
                <div class="row text-center mb-4">
                    <div class="col-6 border-end">
                        <div class="h3 fw-black mb-0 text-success"><?php echo e(number_format($firstTime)); ?></div>
                        <div class="text-muted smaller">First-time Issuance</div>
                    </div>
                    <div class="col-6">
                        <div class="h3 fw-black mb-0 text-danger"><?php echo e(number_format($totalReprints)); ?></div>
                        <div class="text-muted smaller">Duplicates / Reprints</div>
                    </div>
                </div>

                <div class="p-3 <?php echo e($wastageRatio > 15 ? 'bg-danger-subtle' : 'bg-warning-subtle'); ?> rounded-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small fw-bold <?php echo e($wastageRatio > 15 ? 'text-danger' : 'text-warning'); ?>">Wastage / Error Ratio</span>
                        <span class="h4 fw-black mb-0 <?php echo e($wastageRatio > 15 ? 'text-danger' : 'text-warning'); ?>"><?php echo e($wastageRatio); ?>%</span>
                    </div>
                </div>

                <h6 class="small fw-bold text-muted text-uppercase mb-3">Top Reprint Operators</h6>
                <?php if(isset($reprints['top_staff']) && $reprints['top_staff']->isNotEmpty()): ?>
                    <?php $__currentLoopData = $reprints['top_staff']->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="smaller fw-bold">
                                <?php if(isset($staff->user) && $staff->user): ?>
                                    <?php echo e($staff->user->name); ?>

                                <?php else: ?>
                                    Operator #<?php echo e($staff->user_id); ?>

                                <?php endif; ?>
                            </span>
                            <span class="badge bg-light text-dark fw-black"><?php echo e($staff->reprint_count ?? $staff->count ?? 0); ?> reprints</span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="text-center text-muted py-3">
                        <small>No reprint data available</small>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text-center text-muted py-5">
                    <i class="ri-printer-line" style="font-size: 48px; opacity: 0.3;"></i>
                    <p class="mt-3 mb-0">No print activity recorded this month</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Compliance tab loaded');
    console.log('Audit snapshot:', <?php echo json_encode($auditSnapshot ?? [], 15, 512) ?>);
    console.log('Reprints data:', <?php echo json_encode($reprints ?? [], 15, 512) ?>);
});
</script>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/partials/compliance.blade.php ENDPATH**/ ?>