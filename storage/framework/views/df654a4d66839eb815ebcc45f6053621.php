<?php $__env->startSection('title', 'IT Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="it-dashboard" style="font-family: 'Inter', sans-serif; color: #1e293b; background: #f8fafc; min-height: 100vh; padding: 20px;">
    
    <!-- Hero Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-4 rounded-4 shadow-sm border border-slate-100">
        <div>
            <h2 class="fw-bold m-0" style="letter-spacing: -0.02em; color: #0f172a;">IT Dashboard</h2>
            <p class="text-slate-600 m-0 small mt-1">Unified System Administration & Monitoring</p>
        </div>
        <div class="d-flex gap-2">
            <div class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill d-flex align-items-center">
                <span class="pulse-dot me-2"></span> System Online
            </div>
            <div class="badge bg-slate-100 text-slate-600 border border-slate-200 px-3 py-2 rounded-pill">
                v2.4.0-Onyx
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="dashboard-nav-container mb-4 overflow-x-auto">
        <div class="nav nav-pills gap-2 flex-nowrap pb-2" id="itDashboardTabs" role="tablist">
            <?php
                $tabs = [
                    'overview' => ['icon' => 'ri-dashboard-3-line', 'label' => 'Overview'],
                    'monitoring' => ['icon' => 'ri-pulse-line', 'label' => 'App Monitoring'],
                    'drafts' => ['icon' => 'ri-draft-line', 'label' => 'Drafts'],
                    'files' => ['icon' => 'ri-file-cloud-line', 'label' => 'Files'],
                    'errors' => ['icon' => 'ri-bug-line', 'label' => 'Logs & Errors'],
                    'payments' => ['icon' => 'ri-bank-card-line', 'label' => 'Payments'],
                    'security' => ['icon' => 'ri-shield-flash-line', 'label' => 'Security'],
                    'backup' => ['icon' => 'ri-database-2-line', 'label' => 'Backup'],
                    'audit' => ['icon' => 'ri-history-line', 'label' => 'Audit'],
                    'system' => ['icon' => 'ri-settings-5-line', 'label' => 'System'],
                    'reports' => ['icon' => 'ri-file-chart-line', 'label' => 'Reporting'],
                ];
            ?>

            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="nav-link <?php if($key === 'overview'): ?> active <?php endif; ?> rounded-3 border-0 px-3 py-2 d-flex align-items-center gap-2 whitespace-nowrap" 
                    id="tab-<?php echo e($key); ?>" data-bs-toggle="pill" data-bs-target="#panel-<?php echo e($key); ?>" type="button" role="tab"
                    style="font-size: 13px; font-weight: 500; transition: all 0.2s ease;">
                <i class="<?php echo e($tab['icon']); ?> fs-5"></i>
                <span><?php echo e($tab['label']); ?></span>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Content Panels -->
    <div class="tab-content border-0" id="itDashboardContent">
        
        <!-- 1. System Overview Section -->
        <div class="tab-pane fade show active" id="panel-overview" role="tabpanel">
            <div class="row g-4">
                <!-- Status Grid -->
                <div class="col-xl-9">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="stats-card p-4 rounded-4 bg-white shadow-sm border border-slate-100">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="icon-box bg-primary-subtle text-primary p-2 rounded-3"><i class="ri-user-line fs-4"></i></div>
                                    <span class="text-success small fw-bold">+12% <i class="ri-arrow-right-up-line"></i></span>
                                </div>
                                <h3 class="fw-bold mb-1" style="color: #0f172a;"><?php echo e(number_format($stats['total_users'])); ?></h3>
                                <p class="text-slate-600 small m-0 fw-medium">Total Registered Users</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card p-4 rounded-4 bg-white shadow-sm border border-slate-100">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="icon-box bg-purple-subtle text-purple p-2 rounded-3"><i class="ri-file-list-3-line fs-4"></i></div>
                                    <span class="text-primary small fw-bold">New</span>
                                </div>
                                <h3 class="fw-bold mb-1" style="color: #0f172a;"><?php echo e(number_format($stats['app_stats']['new'])); ?></h3>
                                <p class="text-slate-600 small m-0 fw-medium">Active Submissions</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card p-4 rounded-4 bg-white shadow-sm border border-slate-100">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="icon-box bg-orange-subtle text-orange p-2 rounded-3"><i class="ri-draft-line fs-4"></i></div>
                                    <span class="text-orange small fw-bold">Active</span>
                                </div>
                                <h3 class="fw-bold mb-1" style="color: #0f172a;"><?php echo e(number_format($stats['draft_count'])); ?></h3>
                                <p class="text-slate-600 small m-0 fw-medium">Draft Applications</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card p-4 rounded-4 bg-white shadow-sm border border-slate-100">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="icon-box bg-success-subtle text-success p-2 rounded-3"><i class="ri-checkbox-circle-line fs-4"></i></div>
                                    <span class="text-slate-500 small fw-bold">Rate</span>
                                </div>
                                <?php
                                    $totalResolved = $stats['approval_metrics']['approved'] + $stats['approval_metrics']['rejected'];
                                    $rate = $totalResolved > 0 ? round(($stats['approval_metrics']['approved'] / $totalResolved) * 100) : 0;
                                ?>
                                <h3 class="fw-bold mb-1" style="color: #0f172a;"><?php echo e($rate); ?>%</h3>
                                <p class="text-slate-600 small m-0 fw-medium">Approval Efficiency</p>
                            </div>
                        </div>
                    </div>

                    <!-- Trends Chart -->
                    <div class="card border-0 shadow-sm rounded-4 mt-4 overflow-hidden">
                        <div class="card-header bg-white p-4 border-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fw-bold m-0" style="color: #0f172a;">Accreditation & Registration Trends</h6>
                                <p class="text-slate-600 small m-0">Monthly growth analysis for <?php echo e(date('Y')); ?></p>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-slate-100 border text-slate-600 rounded-pill px-3" data-bs-toggle="dropdown">
                                    <?php echo e($currentRangeLabel); ?> <i class="ri-arrow-down-s-line"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-4 p-2">
                                    <li><a class="dropdown-item rounded-3 small fw-bold px-3 py-2 <?php echo e(request('trend_range') == '30_days' ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['trend_range' => '30_days'])); ?>">Last 30 Days</a></li>
                                    <li><a class="dropdown-item rounded-3 small fw-bold px-3 py-2 <?php echo e(request('trend_range') == '90_days' ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['trend_range' => '90_days'])); ?>">Last 90 Days</a></li>
                                    <li><a class="dropdown-item rounded-3 small fw-bold px-3 py-2 <?php echo e(request('trend_range') == '6_months' ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['trend_range' => '6_months'])); ?>">Last 6 Months</a></li>
                                    <li><a class="dropdown-item rounded-3 small fw-bold px-3 py-2 <?php echo e((request('trend_range') == '12_months' || !request('trend_range')) ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['trend_range' => '12_months'])); ?>">Last 12 Months</a></li>
                                    <li><a class="dropdown-item rounded-3 small fw-bold px-3 py-2 <?php echo e(request('trend_range') == 'this_year' ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['trend_range' => 'this_year'])); ?>">This Year</a></li>
                                    <li><a class="dropdown-item rounded-3 small fw-bold px-3 py-2 <?php echo e(request('trend_range') == 'all_time' ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['trend_range' => 'all_time'])); ?>">All Time</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="accreditationTrendsChart" style="height: 350px;"></div>
                        </div>
                    </div>

                    
                    <div class="row g-4 mt-2">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                                <div class="card-header bg-white p-4 border-0 d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold m-0">Regions Management</h6>
                                    <button type="button" class="btn btn-sm btn-dark rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addRegionModal">
                                        <i class="ri-add-line"></i> New Region
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0 small">
                                        <thead class="bg-slate-50">
                                            <tr>
                                                <th class="ps-4">Region</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                                <th>Expiry</th>
                                                <th>Officers</th>
                                                <th class="text-end pe-4">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="ps-4 fw-bold text-slate-700"><?php echo e($r->name); ?></td>
                                                <td><code class="text-primary"><?php echo e($r->code); ?></code></td>
                                                <td>
                                                    <span class="badge <?php echo e($r->is_active ? 'bg-success-subtle text-success' : 'bg-slate-100 text-slate-500'); ?> rounded-pill border">
                                                        <?php echo e($r->is_active ? 'Active' : 'Disabled'); ?>

                                                    </span>
                                                </td>
                                                <td class="text-slate-700 fw-bold"><?php echo e($r->expires_at ? $r->expires_at->format('d M Y') : 'Permanent'); ?></td>
                                                <td><span class="badge rounded-pill bg-slate-900"><?php echo e($r->officers_count); ?></span></td>
                                                <td class="text-end pe-4">
                                                    <form action="<?php echo e(route('staff.it.regions.toggle', $r)); ?>" method="POST" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <button class="btn btn-sm <?php echo e($r->is_active ? 'btn-outline-danger' : 'btn-outline-success'); ?> rounded-pill px-3">
                                                            <?php echo e($r->is_active ? 'Disable' : 'Enable'); ?>

                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-2">
                                <div class="card-header bg-white p-4 border-0">
                                    <h6 class="fw-bold m-0">Pending Staff Approvals</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0 small">
                                        <thead class="bg-slate-50">
                                            <tr>
                                                <th class="ps-4">Requesting User</th>
                                                <th>Roles</th>
                                                <th>Created</th>
                                                <th class="text-end pe-4">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="fw-bold text-slate-700"><?php echo e($p->name); ?></div>
                                                    <div class="text-slate-600 small fw-bold"><?php echo e($p->email); ?></div>
                                                </td>
                                                <td>
                                                    <?php $__currentLoopData = $p->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="badge bg-slate-100 text-slate-600 border rounded-pill"><?php echo e($role->name); ?></span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td class="text-slate-700 fw-bold"><?php echo e($p->created_at->diffForHumans()); ?></td>
                                                <td class="text-end pe-4">
                                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">Awaiting Approval</span>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="4" class="text-center py-4 text-slate-700 fw-bold small">No pending staff approvals at this time.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($pending->hasPages()): ?>
                                <div class="card-footer bg-white border-0 px-4 py-3">
                                    <?php echo e($pending->links()); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 mt-2 mb-4">
                        <!-- Key Metrics Table -->
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                                <div class="card-header bg-white border-0 py-3">
                                    <h6 class="fw-bold m-0">Processing Performance</h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush border-0">
                                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="p-2 bg-slate-50 rounded-circle"><i class="ri-timer-2-line text-slate-600"></i></div>
                                                <span class="fw-bold text-slate-700">Avg. Turnaround Time</span>
                                            </div>
                                            <span class="fw-bold text-slate-900"><?php echo e(number_format($avgProcessingTime, 1)); ?> hrs</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="p-2 bg-slate-50 rounded-circle"><i class="ri-server-line text-slate-600"></i></div>
                                                <span class="fw-bold text-slate-700">System Uptime</span>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <span class="badge rounded-pill <?php echo e(($health['database'] ?? false) ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'); ?> border">DB</span>
                                                <span class="badge rounded-pill <?php echo e(($health['storage'] ?? false) ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'); ?> border">Disk</span>
                                                <span class="badge rounded-pill <?php echo e(($health['queue'] ?? false) ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'); ?> border">Jobs</span>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="p-2 bg-slate-50 rounded-circle"><i class="ri-database-line text-slate-600"></i></div>
                                                <span class="fw-bold text-slate-700">Resource Saturation</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-3" style="min-width: 120px;">
                                                <div class="progress flex-grow-1" style="height: 6px;">
                                                    <div class="progress-bar bg-primary" style="width: 42%"></div>
                                                </div>
                                                <span class="small fw-bold text-slate-700">42%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Payment Summary -->
                        <div class="col-md-6">
                             <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between">
                                    <h6 class="fw-bold m-0">Payment Reconciliation</h6>
                                    <a href="#" class="small text-primary fw-bold text-decoration-none">Export Ledger</a>
                                </div>
                                <div class="card-body p-0 px-4 pb-4">
                                    <div class="d-flex gap-2 flex-wrap mb-4">
                                        <div class="flex-grow-1 p-3 rounded-4 bg-slate-50 border border-slate-100 text-center">
                                            <div class="text-slate-600 small fw-bold mb-1 uppercase letter-spacing-1">Confirmed</div>
                                            <div class="fw-bold fs-4 text-slate-900"><?php echo e(number_format($paymentSummary['Paid'] ?? 0)); ?></div>
                                        </div>
                                        <div class="flex-grow-1 p-3 rounded-4 bg-danger-subtle border border-danger-subtle text-center">
                                            <div class="text-danger small fw-medium mb-1 uppercase letter-spacing-1">Failed</div>
                                            <div class="fw-bold fs-4 text-danger"><?php echo e(number_format($paymentSummary['Failed'] ?? 0)); ?></div>
                                        </div>
                                    </div>
                                    <div id="paymentHealthChart" style="height: 80px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Widgets -->
                <div class="col-xl-3">

                    <!-- Storage Overview -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                        <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                            <i class="ri-hard-drive-2-line text-primary"></i> Upload Storage
                        </h6>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between small mb-2">
                                <span class="text-slate-600">Total Document Volume</span>
                                <span class="fw-bold text-slate-800"><?php echo e($storageUsageBytes ? number_format($storageUsageBytes/1024/1024, 1) . ' MB' : 'N/A'); ?></span>
                            </div>
                            <div class="progress rounded-pill" style="height: 10px; background: #f1f5f9;">
                                <?php
                                    $storagePercent = ($storageUsage['total'] > 0) ? ($storageUsage['used'] / $storageUsage['total']) * 100 : 0;
                                ?>
                                <div class="progress-bar rounded-pill bg-primary" style="width: <?php echo e($storagePercent); ?>%"></div>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <?php $__currentLoopData = $storageByModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-slate-50 border border-slate-100">
                                <span class="small text-slate-600"><?php echo e(ucfirst(str_replace('_', ' ', $mod->doc_type))); ?></span>
                                <span class="small fw-bold text-slate-900"><?php echo e(number_format($mod->total/1024/1024, 1)); ?> MB</span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <!-- Navigation Links (Unified from Dashboard) -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                        <h6 class="fw-bold mb-3">Quick Navigation</h6>
                        <div class="d-grid gap-2">
                            <a href="<?php echo e(route('staff.it.applicants.list')); ?>" class="btn btn-slate-50 text-slate-700 btn-sm fw-bold border text-start px-3 py-2 d-flex align-items-center gap-2">
                                <i class="ri-group-line text-primary"></i> Applicant Management
                            </a>
                            <a href="<?php echo e(route('admin.content.index')); ?>" class="btn btn-slate-50 text-slate-700 btn-sm fw-bold border text-start px-3 py-2 d-flex align-items-center gap-2">
                                <i class="ri-article-line text-purple"></i> CMS Management
                            </a>
                            <a href="<?php echo e(route('admin.audit.index')); ?>" class="btn btn-slate-50 text-slate-700 btn-sm fw-bold border text-start px-3 py-2 d-flex align-items-center gap-2">
                                <i class="ri-shield-check-line text-danger"></i> System Audit Logs
                            </a>
                            <a href="<?php echo e(route('admin.analytics')); ?>" class="btn btn-slate-50 text-slate-700 btn-sm fw-bold border text-start px-3 py-2 d-flex align-items-center gap-2">
                                <i class="ri-line-chart-line text-success"></i> Performance Analytics
                            </a>
                        </div>
                    </div>

                    <!-- Security Pulse -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                        <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                            <i class="ri-shield-check-line text-success"></i> Security Status
                        </h6>
                        <ul class="list-unstyled m-0">
                            <li class="d-flex align-items-center gap-3 mb-3">
                                <i class="ri-checkbox-circle-fill text-success fs-5"></i>
                                <div class="small">
                                    <div class="fw-bold text-slate-900">SSL Certificate</div>
                                    <div class="text-slate-600 font-weight-bold">Active (Verified)</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3 mb-3">
                                <i class="ri-checkbox-circle-fill text-success fs-5"></i>
                                <div class="small">
                                    <div class="fw-bold text-slate-900">WAF Policy</div>
                                    <div class="text-slate-600 font-weight-bold">Strict Mode Enabled</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <div class="spinner-grow spinner-grow-sm text-warning me-1"></div>
                                <div class="small">
                                    <div class="fw-bold text-slate-900">Session Monitor</div>
                                    <div class="text-slate-600 font-weight-bold"><?php echo e(count($activeSessions)); ?> active sessions detected</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monitoring Section -->
        <div class="tab-pane fade" id="panel-monitoring" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.monitoring', ['query' => $monitoringQuery], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Draft Section -->
        <div class="tab-pane fade" id="panel-drafts" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.drafts', ['drafts' => $draftsQuery], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>


        <!-- Errors Section -->
        <div class="tab-pane fade" id="panel-errors" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.errors', ['logs' => $errorLogs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>




        <!-- Payments Section -->
        <div class="tab-pane fade" id="panel-payments" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.payments', ['transactions' => $recentTransactions, 'reconciliation' => $paymentReconciliation], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Files Section -->
        <div class="tab-pane fade" id="panel-files" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.files', ['files' => $filesQuery, 'storageStats' => $storageStats], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Security Section -->
        <div class="tab-pane fade" id="panel-security" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.security', ['sessions' => $activeSessions], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Backup Section -->
        <div class="tab-pane fade" id="panel-backup" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.backup', ['lastBackup' => $lastBackup ?? 'N/A', 'storageStats' => $storageStats], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Audit Section -->
        <div class="tab-pane fade" id="panel-audit" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.audit', ['logs' => $auditLogs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- System Section -->
        <div class="tab-pane fade" id="panel-system" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.system', ['env' => $systemEnv], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>


        <!-- Reports Section -->
        <div class="tab-pane fade" id="panel-reports" role="tabpanel">
             <?php echo $__env->make('staff.it.dashboard.partials.reports', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>


    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
    
    .it-dashboard .nav-pills .nav-link {
        color: #64748b;
        background: #fff;
        border: 1px solid #e2e8f0 !important;
        white-space: nowrap;
    }
    
    .it-dashboard .nav-pills .nav-link.active {
        background: #0f172a !important;
        color: #fff !important;
        border-color: #0f172a !important;
    }
    
    .it-dashboard .stats-card:hover {
        transform: translateY(-4px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-color: #cbd5e1 !important;
    }

    .pulse-dot {
        width: 8px;
        height: 8px;
        background: #22c55e;
        border-radius: 50%;
        display: inline-block;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
        100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
    }

    .list-group-item:last-child {
        border-bottom: 0 !important;
    }

    .bg-purple-subtle { background: #f3e8ff; color: #a855f7; }
    .bg-orange-subtle { background: #fff7ed; color: #f97316; }
    .bg-success-subtle { background: #f0fdf4; color: #22c55e; }
    
    .letter-spacing-1 { letter-spacing: 0.1em; }
    .uppercase { text-transform: uppercase; }

    /* Custom scrollbar for tabs */
    .dashboard-nav-container::-webkit-scrollbar {
        height: 4px;
    }
    .dashboard-nav-container::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    /* Reduce pagination arrow size */
    nav[role="navigation"] svg {
        width: 14px !important;
        height: 14px !important;
    }
    .pagination svg {
        width: 14px !important;
        height: 14px !important;
    }
</style>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Accreditation & Registration Trends Chart
        var trendsOptions = {
            series: [{
                name: 'Accreditations',
                data: <?php echo json_encode($accreditationTrends, 15, 512) ?>
            }, {
                name: 'Registrations',
                data: <?php echo json_encode($registrationTrends, 15, 512) ?>
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif'
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 3 },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                }
            },
            xaxis: {
                categories: <?php echo json_encode($trendLabels, 15, 512) ?>,
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: { show: false },
            grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
            colors: ['#0f172a', '#3b82f6']
        };

        var trendsChart = new ApexCharts(document.querySelector("#accreditationTrendsChart"), trendsOptions);
        trendsChart.render();

        // mini Sparkline for payment health
        var paymentOptions = {
            series: [{ data: [12, 14, 18, 11, 15, 22, 19] }],
            chart: { type: 'area', height: 80, sparkline: { enabled: true } },
            stroke: { curve: 'smooth', width: 2 },
            fill: { opacity: 0.3 },
            colors: ['#3b82f6']
        };
        new ApexCharts(document.querySelector("#paymentHealthChart"), paymentOptions).render();
    });
</script>
<?php $__env->stopPush(); ?>
  
  <div class="modal fade" id="addRegionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <form action="<?php echo e(route('staff.it.regions.store')); ?>" method="POST" class="modal-content border-0 shadow-lg rounded-4">
        <?php echo csrf_field(); ?>
        <div class="modal-header border-0 p-4 pb-2">
          <h5 class="modal-title fw-bold">Create New Administrative Region</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <div class="mb-3">
            <label class="form-label small fw-bold text-slate-600">Region Name</label>
            <input type="text" name="name" class="form-control rounded-3 border-slate-200" placeholder="e.g. Harare North" required>
          </div>
          <div class="mb-3">
            <label class="form-label small fw-bold text-slate-600">Internal Code</label>
            <input type="text" name="code" class="form-control rounded-3 border-slate-200" placeholder="e.g. harare_n" required>
          </div>
          <div class="mb-0">
            <label class="form-label small fw-bold text-slate-600">Expiry Date (Optional)</label>
            <input type="date" name="expires_at" class="form-control rounded-3 border-slate-200">
            <div class="form-text small">Leave blank for permanent regions.</div>
          </div>
        </div>
        <div class="modal-footer border-0 p-4 pt-2">
          <button type="button" class="btn btn-slate-100 rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-dark rounded-pill px-4">Create Region</button>
        </div>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/it/dashboard/index.blade.php ENDPATH**/ ?>