<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 p-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold m-0">Live Application Stream</h6>
            <p class="text-slate-600 small m-0">Real-time status of all submissions across the workflow</p>
        </div>
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm rounded-pill" placeholder="Search reference or user...">
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead class="bg-slate-50 border-top border-bottom border-slate-100">
                    <tr>
                        <th class="ps-4 small text-slate-700 uppercase fw-bold py-3">Reference</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3">Applicant</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3">Type</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3">Status</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3 text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    <?php $__empty_1 = true; $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold text-slate-900 mb-1"><?php echo e($app->reference); ?></div>
                            <div class="text-slate-600 fw-medium" style="font-size: 11px;">Submitted: <?php echo e($app->submitted_at?->format('d M, H:i') ?: 'N/A'); ?></div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($app->applicant?->name ?? 'U')); ?>&background=6366f1&color=fff" class="rounded-circle" width="32">
                                <div>
                                    <div class="fw-medium text-slate-900 small"><?php echo e($app->applicant?->name); ?></div>
                                    <div class="text-slate-600 fw-medium" style="font-size: 11px;"><?php echo e($app->applicant?->email); ?></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-slate-100 text-slate-800 border border-slate-200 rounded-pill px-2">
                                <?php echo e(strtoupper($app->request_type)); ?> <?php echo e(strtoupper($app->application_type)); ?>

                            </span>
                        </td>
                        <td>
                            <?php
                                $statusColors = [
                                    'draft' => 'bg-slate-100 text-slate-600',
                                    'submitted' => 'bg-primary-subtle text-primary border-primary-subtle',
                                    'officer_review' => 'bg-purple-subtle text-purple',
                                    'issued' => 'bg-success-subtle text-success',
                                ];
                                $colorClass = $statusColors[$app->status] ?? 'bg-warning-subtle text-warning';
                            ?>
                            <span class="badge <?php echo e($colorClass); ?> border rounded-pill px-3 py-1">
                                <?php echo e(str_replace('_', ' ', strtoupper($app->status))); ?>

                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-icon border-0 bg-transparent text-slate-400" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border shadow-sm rounded-3">
                                    <li><a class="dropdown-item small" href="<?php echo e(route('staff.it.application.overview', $app)); ?>"><i class="ri-eye-line me-2"></i> View Details</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="<?php echo e(route('staff.it.application.unlock', $app->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="dropdown-item small text-warning"><i class="ri-lock-unlock-line me-2"></i> Release Lock</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="<?php echo e(route('staff.it.application.reset', $app->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="dropdown-item small text-danger"><i class="ri-restart-line me-2"></i> Reset to Draft</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="py-5 text-center text-slate-600 font-weight-bold">
                            <i class="ri-inbox-line fs-2 mb-2 d-block opacity-50"></i>
                            No applications found in stream.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-top border-slate-100">
            <?php echo e($query->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/runner/workspace/resources/views/staff/it/dashboard/partials/monitoring.blade.php ENDPATH**/ ?>