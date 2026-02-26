<?php $__env->startSection('title', 'Super Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Super Admin Dashboard</h4>
                    <div class="text-muted mt-1" style="font-size:13px;">Complete system overview and management</div>
                </div>
                <div class="d-flex gap-2">
                    <span class="zmc-pill zmc-pill-dark">
                        <i class="ri-shield-star-line me-1"></i> Super Admin
                    </span>
                </div>
            </div>

            
            <div class="row g-3 mt-1">
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="text-muted" style="font-size:12px;">Total Applications</div>
                            <div class="fw-bold" style="font-size:24px;"><?php echo e(number_format($stats['total_applications'] ?? 0)); ?></div>
                            <div class="text-muted" style="font-size:12px;">Today: <?php echo e(number_format($stats['applications_today'] ?? 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="text-muted" style="font-size:12px;">Applications by Stage</div>
                            <div class="d-flex flex-wrap gap-2 mt-2" style="font-size:12px;">
                                <span class="badge bg-light text-dark">Officer: <?php echo e($applicationsByStage['Officer'] ?? 0); ?></span>
                                <span class="badge bg-light text-dark">Accounts: <?php echo e($applicationsByStage['Accounts'] ?? 0); ?></span>
                                <span class="badge bg-light text-dark">Registrar: <?php echo e($applicationsByStage['Registrar'] ?? 0); ?></span>
                                <span class="badge bg-light text-dark">Production: <?php echo e($applicationsByStage['Production'] ?? 0); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="text-muted" style="font-size:12px;">Average Turnaround</div>
                            <div class="fw-bold" style="font-size:24px;"><?php echo e(number_format($avgTurnaroundHours ?? 0, 1)); ?>h</div>
                            <div class="text-muted" style="font-size:12px;">Issued (last 30 days)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="text-muted" style="font-size:12px;">System Health</div>
                            <div class="fw-bold" style="font-size:24px;"><?php echo e((int)($failedJobs ?? 0)); ?></div>
                            <div class="text-muted" style="font-size:12px;">Failed Jobs</div>
                            <div class="mt-2">
                                <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.health.index')); ?>">View Health</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row g-3 mt-1">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="fw-semibold">Alerts</div>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge <?php echo e(($alerts['slaBreaches'] ?? 0) > 0 ? 'bg-danger' : 'bg-success'); ?>">SLA breaches: <?php echo e($alerts['slaBreaches'] ?? 0); ?></span>
                                <span class="badge <?php echo e(($alerts['stuckApplications'] ?? 0) > 0 ? 'bg-warning text-dark' : 'bg-success'); ?>">Stuck: <?php echo e($alerts['stuckApplications'] ?? 0); ?></span>
                                <span class="badge <?php echo e(($alerts['failedPayments'] ?? 0) > 0 ? 'bg-warning text-dark' : 'bg-success'); ?>">Failed payments: <?php echo e($alerts['failedPayments'] ?? 0); ?></span>
                            </div>
                            <div class="d-flex gap-2">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.workflow.config')); ?>">SLA Settings</a>
                                <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.fees.config')); ?>">Payment Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
      <div class="alert alert-success d-flex align-items-start gap-2">
        <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
        <div><?php echo e(session('success')); ?></div>
      </div>
    <?php endif; ?>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-primary text-white">
                <div class="card-body text-center py-3">
                    <i class="ri-user-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold" id="stat-total-users"><?php echo e($stats['total_users']); ?></h3>
                    <small>Total Users</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-success text-white">
                <div class="card-body text-center py-3">
                    <i class="ri-shield-user-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold" id="stat-staff-users"><?php echo e($stats['staff_users']); ?></h3>
                    <small>Staff Users</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100" style="background:#0ea5e9;color:#fff;">
                <div class="card-body text-center py-3">
                    <i class="ri-user-smile-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold" id="stat-public-users"><?php echo e($stats['public_users'] ?? 0); ?></h3>
                    <small>Public Users</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-info text-white">
                <div class="card-body text-center py-3">
                    <i class="ri-file-list-3-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold" id="stat-total-applications"><?php echo e($stats['total_applications']); ?></h3>
                    <small>Applications</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-warning text-dark">
                <div class="card-body text-center py-3">
                    <i class="ri-time-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold" id="stat-pending-applications"><?php echo e($stats['pending_applications']); ?></h3>
                    <small>Pending</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-secondary text-white">
                <div class="card-body text-center py-3">
                    <i class="ri-key-2-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold"><?php echo e($stats['roles']); ?></h3>
                    <small>Roles</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-dark text-white">
                <div class="card-body text-center py-3">
                    <i class="ri-history-line fs-2 mb-2"></i>
                    <h3 class="mb-0 fw-bold"><?php echo e($stats['audit_entries']); ?></h3>
                    <small>Audit Logs</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-3">
                        <i class="ri-user-add-line me-2"></i>New Registrations
                    </h6>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Today</span>
                        <span class="badge bg-primary"><?php echo e($stats['new_users_today']); ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>This Week</span>
                        <span class="badge bg-info"><?php echo e($stats['new_users_week']); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-3">
                        <i class="ri-file-list-line me-2"></i>Applications
                    </h6>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Approved</span>
                        <span class="badge bg-success"><?php echo e($stats['approved_applications']); ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Rejected</span>
                        <span class="badge bg-danger"><?php echo e($stats['rejected_applications']); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-3">
                        <i class="ri-pie-chart-line me-2"></i>By Type
                    </h6>
                    <?php $__currentLoopData = $applicationsByType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><?php echo e(ucfirst($type ?? 'Unknown')); ?></span>
                        <span class="badge bg-secondary"><?php echo e($count); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(empty($applicationsByType)): ?>
                    <p class="text-muted small mb-0">No applications yet</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-3">
                        <i class="ri-settings-3-line me-2"></i>Quick Actions
                    </h6>
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('admin.analytics')); ?>" class="btn btn-outline-dark btn-sm">
                            <i class="ri-line-chart-line me-1"></i> Analytics
                        </a>
                        <a href="<?php echo e(route('admin.mediahouse.index')); ?>" class="btn btn-outline-primary btn-sm">
                            <i class="ri-building-2-line me-1"></i> Media House Registrations
                        </a>
                        <a href="<?php echo e(route('admin.accreditation.index')); ?>" class="btn btn-outline-secondary btn-sm">
                            <i class="ri-user-search-line me-1"></i> Journalist Accreditation
                        </a>
                        <a href="<?php echo e(route('admin.users.staff')); ?>" class="btn btn-outline-success btn-sm">
                            <i class="ri-user-settings-line me-1"></i> User & Account Management
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="ri-shield-keyhole-line me-2"></i>Roles Overview</h5>
                        <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-sm btn-outline-primary">Manage</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="ri-user-star-line me-2 text-primary"></i>
                                <span class="fw-semibold"><?php echo e(ucwords(str_replace('_', ' ', $role->name))); ?></span>
                            </div>
                            <span class="badge bg-primary rounded-pill"><?php echo e($role->users_count); ?> users</span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="ri-user-line me-2"></i>Recent Users</h5>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('admin.users.public')); ?>" class="btn btn-sm btn-outline-secondary">Public Users</a>
                            <a href="<?php echo e(route('admin.users.staff')); ?>" class="btn btn-sm btn-outline-primary">Staff Users</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="recent-public-tab" data-bs-toggle="tab" data-bs-target="#recent-public" type="button" role="tab">Public Users</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="recent-staff-tab" data-bs-toggle="tab" data-bs-target="#recent-staff" type="button" role="tab">Staff Users</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="recent-public" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="border-0">User</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Joined</th>
                                            <th class="border-0 text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $recentPublicUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center me-2" style="width:36px;height:36px;">
                                                            <span class="text-secondary fw-bold"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                                                        </div>
                                                        <div>
                                                            <div class="fw-semibold"><?php echo e($user->name); ?></div>
                                                            <div class="small text-muted">Self-registered (Accreditation)</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted"><?php echo e($user->email); ?></td>
                                                <td class="text-muted"><?php echo e($user->created_at->diffForHumans()); ?></td>
                                                <td class="text-end">
                                                    <a href="<?php echo e(route('admin.users.access.edit', $user)); ?>" class="btn btn-sm btn-outline-primary" title="Edit Access"><i class="ri-edit-line"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="4" class="text-center py-4 text-muted">No recent public users</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="recent-staff" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="border-0">User</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Role(s)</th>
                                            <th class="border-0">Joined</th>
                                            <th class="border-0 text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $recentStaffUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center me-2" style="width:36px;height:36px;">
                                                            <span class="text-success fw-bold"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                                                        </div>
                                                        <div>
                                                            <div class="fw-semibold"><?php echo e($user->name); ?></div>
                                                            <div class="small text-muted">Created by Admin/IT</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted"><?php echo e($user->email); ?></td>
                                                <td>
                                                    <?php $__empty_2 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                        <span class="badge bg-primary bg-opacity-10 text-primary"><?php echo e(ucwords(str_replace('_', ' ', $role->name))); ?></span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                        <span class="badge bg-secondary bg-opacity-10 text-secondary">Staff</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-muted"><?php echo e($user->created_at->diffForHumans()); ?></td>
                                                <td class="text-end">
                                                    <a href="<?php echo e(route('admin.users.access.edit', $user)); ?>" class="btn btn-sm btn-outline-primary" title="Edit Access"><i class="ri-edit-line"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="5" class="text-center py-4 text-muted">No recent staff users</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold"><i class="ri-file-list-3-line me-2"></i>Recent Applications</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 ps-4">Reference</th>
                                    <th class="border-0">Type</th>
                                    <th class="border-0">Status</th>
                                    <th class="border-0">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $recentApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="ps-4 fw-semibold"><?php echo e($app->reference ?? 'N/A'); ?></td>
                                    <td>
                                        <span class="badge <?php echo e($app->application_type === 'accreditation' ? 'bg-info' : 'bg-warning'); ?>">
                                            <?php echo e(ucfirst($app->application_type ?? 'Unknown')); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'approved' => 'success',
                                                'rejected' => 'danger',
                                                'draft' => 'secondary',
                                                'under_review' => 'info',
                                            ];
                                            $color = $statusColors[$app->status] ?? 'secondary';
                                        ?>
                                        <span class="badge bg-<?php echo e($color); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $app->status ?? 'Unknown'))); ?></span>
                                    </td>
                                    <td class="text-muted"><?php echo e($app->created_at->diffForHumans()); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No applications yet</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold"><i class="ri-history-line me-2"></i>Audit Trail</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" style="max-height: 400px; overflow-y: auto;">
                        <?php $__empty_1 = true; $__currentLoopData = $recentAudit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <?php
                                        $actionColors = [
                                            'create' => 'success',
                                            'approve' => 'success',
                                            'reject' => 'danger',
                                            'update' => 'info',
                                            'delete' => 'danger',
                                            'login' => 'primary',
                                        ];
                                        $color = $actionColors[$log->action] ?? 'secondary';
                                    ?>
                                    <span class="badge bg-<?php echo e($color); ?> me-2"><?php echo e(ucfirst($log->action)); ?></span>
                                    <span class="fw-semibold"><?php echo e($log->entity_type); ?></span>
                                </div>
                                <small class="text-muted"><?php echo e($log->created_at->diffForHumans()); ?></small>
                            </div>
                            <p class="mb-1 mt-2 small"><?php echo e(Str::limit($log->description, 80)); ?></p>
                            <small class="text-muted">
                                <i class="ri-user-line me-1"></i><?php echo e($log->user_name); ?>

                                <?php if($log->user_role): ?>
                                    <span class="badge bg-light text-dark ms-1"><?php echo e($log->user_role); ?></span>
                                <?php endif; ?>
                            </small>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="list-group-item text-center py-4 text-muted">
                            <i class="ri-history-line fs-2 d-block mb-2"></i>
                            No audit logs yet
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

<style>
.hover-shadow:hover {
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    transform: translateY(-2px);
    transition: all 0.2s ease;
}
.card {
    transition: all 0.2s ease;
}
</style>

<script>
  (function () {
    async function refreshAdminStats() {
      try {
        const res = await fetch("<?php echo e(route('admin.dashboard.stats')); ?>", {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        if (!res.ok) return;
        const data = await res.json();

        const map = {
          'stat-total-users': data.total_users,
          'stat-staff-users': data.staff_users,
          'stat-public-users': data.public_users,
          'stat-total-applications': (data.mediahouse_registrations ?? 0) + (data.journalist_accreditations ?? 0),
          'stat-pending-applications': data.pending_applications,
        };

        Object.keys(map).forEach(id => {
          const el = document.getElementById(id);
          if (el && typeof map[id] !== 'undefined' && map[id] !== null) {
            el.textContent = map[id];
          }
        });
      } catch (e) {
        // ignore
      }
    }

    // refresh every 20 seconds
    refreshAdminStats();
    setInterval(refreshAdminStats, 20000);
  })();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>