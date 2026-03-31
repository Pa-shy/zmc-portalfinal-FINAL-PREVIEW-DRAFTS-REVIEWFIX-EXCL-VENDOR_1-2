<?php $__env->startSection('title', 'Media House Oversight'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color:#1e293b;">Media House Oversight & Monitoring</h4>
    </div>

    <div class="row g-4">
        <!-- Status Counts -->
        <div class="col-md-4">
            <div class="zmc-card text-center">
                <div class="mb-2">
                    <i class="ri-building-2-line" style="font-size: 48px; color: #10b981;"></i>
                </div>
                <div class="h2 fw-bold mb-1"><?php echo e(number_format($statusCounts['active'])); ?></div>
                <div class="text-muted">Active Media Houses</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="zmc-card text-center">
                <div class="mb-2">
                    <i class="ri-pause-circle-line" style="font-size: 48px; color: #f59e0b;"></i>
                </div>
                <div class="h2 fw-bold mb-1"><?php echo e(number_format($statusCounts['suspended'])); ?></div>
                <div class="text-muted">Suspended</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="zmc-card text-center">
                <div class="mb-2">
                    <i class="ri-add-circle-line" style="font-size: 48px; color: #3b82f6;"></i>
                </div>
                <div class="h2 fw-bold mb-1"><?php echo e(number_format($statusCounts['new_registrations'])); ?></div>
                <div class="text-muted">New Registrations (30 days)</div>
            </div>
        </div>

        <!-- Average Staff Per House -->
        <div class="col-md-12">
            <div class="zmc-card">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="fw-bold mb-2">Average Staff Accreditations per Media House</h6>
                        <p class="text-muted mb-0">Monitoring organizational capacity and compliance thresholds</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="h1 fw-bold mb-0" style="color: #3b82f6;"><?php echo e(number_format($averageStaffPerHouse, 1)); ?></div>
                        <div class="text-muted small">Average Staff Members</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Houses Exceeding Thresholds -->
        <div class="col-md-12">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-alert-line text-warning me-2"></i>Media Houses Exceeding Staff Thresholds
                </h6>
                <?php if($housesExceedingThresholds->count() > 0): ?>
                <div class="alert alert-warning alert-sm mb-3">
                    <strong><?php echo e($housesExceedingThresholds->count()); ?></strong> media houses have exceeded the staff threshold of <?php echo e(config('director-dashboard.media_house_staff_threshold', 50)); ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Media House</th>
                                <th>Type</th>
                                <th class="text-end">Staff Count</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $housesExceedingThresholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="fw-bold"><?php echo e($house->organization_name); ?></td>
                                <td><?php echo e(ucwords($house->media_type ?? 'N/A')); ?></td>
                                <td class="text-end">
                                    <span class="badge bg-warning"><?php echo e($house->staff_count); ?></span>
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-<?php echo e($house->status === 'active' ? 'success' : 'secondary'); ?>">
                                        <?php echo e(ucwords($house->status)); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="alert alert-success alert-sm">
                    <i class="ri-checkbox-circle-line me-2"></i>All media houses are within acceptable staff thresholds
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Accreditations Nearing Expiry -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-time-line text-danger me-2"></i>Accreditations Nearing Expiry (30 Days)
                </h6>
                <?php if($accreditationsNearingExpiry->count() > 0): ?>
                <div class="alert alert-danger alert-sm mb-3">
                    <strong><?php echo e($accreditationsNearingExpiry->count()); ?></strong> accreditations expiring soon
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Applicant</th>
                                <th>Media House</th>
                                <th class="text-end">Expires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $accreditationsNearingExpiry->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accreditation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($accreditation->applicant_name); ?></td>
                                <td class="small"><?php echo e($accreditation->media_house_name); ?></td>
                                <td class="text-end">
                                    <span class="badge bg-danger">
                                        <?php echo e(\Carbon\Carbon::parse($accreditation->expiry_date)->format('d M Y')); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="alert alert-success alert-sm">
                    <i class="ri-checkbox-circle-line me-2"></i>No accreditations expiring in the next 30 days
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- High-Risk Non-Renewals -->
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">
                    <i class="ri-error-warning-line text-danger me-2"></i>High-Risk Non-Renewal Cases
                </h6>
                <?php if($highRiskNonRenewals->count() > 0): ?>
                <div class="alert alert-danger alert-sm mb-3">
                    <strong><?php echo e($highRiskNonRenewals->count()); ?></strong> high-risk non-renewal cases identified
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr class="smaller text-muted">
                                <th>Applicant</th>
                                <th>Media House</th>
                                <th class="text-end">Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $highRiskNonRenewals->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($case->applicant_name); ?></td>
                                <td class="small"><?php echo e($case->media_house_name); ?></td>
                                <td class="text-end">
                                    <span class="badge bg-dark">
                                        <?php echo e(\Carbon\Carbon::parse($case->expiry_date)->diffForHumans()); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="alert alert-success alert-sm">
                    <i class="ri-checkbox-circle-line me-2"></i>No high-risk non-renewal cases at this time
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/director/reports/mediahouses.blade.php ENDPATH**/ ?>