<?php $__env->startSection('title', 'Notices & Events'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0">Notices & Events</h4>
            <div class="text-muted small">View published notices and upcoming events</div>
        </div>
        <a href="<?php echo e(route('staff.registrar.dashboard')); ?>" class="btn btn-light border btn-sm">
            <i class="ri-arrow-left-line"></i> Back to Dashboard
        </a>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-6">
            <div class="zmc-card p-0 shadow-sm border-0">
                <div class="p-3 border-bottom">
                    <h6 class="fw-bold m-0">
                        <i class="ri-notification-line me-2" style="color:#2563eb"></i> Notices
                    </h6>
                </div>

                <div class="p-3">
                    <?php $__empty_1 = true; $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card mb-3 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0"><?php echo e($notice->title); ?></h6>
                                    <span class="badge bg-primary-subtle text-primary border-primary">
                                        <?php echo e($notice->published_at?->format('d M Y')); ?>

                                    </span>
                                </div>
                                <p class="text-muted small mb-2"><?php echo e(Str::limit($notice->content, 200)); ?></p>
                                <?php if($notice->target_portal): ?>
                                    <span class="badge bg-light text-dark border small">
                                        Target: <?php echo e(ucfirst($notice->target_portal)); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="ri-notification-off-line" style="font-size: 48px;"></i>
                            <p class="mt-2">No notices published yet.</p>
                        </div>
                    <?php endif; ?>

                    <?php if($notices->hasPages()): ?>
                        <div class="mt-3">
                            <?php echo e($notices->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="zmc-card p-0 shadow-sm border-0">
                <div class="p-3 border-bottom">
                    <h6 class="fw-bold m-0">
                        <i class="ri-calendar-event-line me-2" style="color:#ffffff"></i> Events
                    </h6>
                </div>

                <div class="p-3">
                    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card mb-3 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0"><?php echo e($event->title); ?></h6>
                                    <span class="badge bg-success-subtle text-success border-success">
                                        <?php echo e($event->starts_at?->format('d M Y')); ?>

                                    </span>
                                </div>
                                <p class="text-muted small mb-2"><?php echo e(Str::limit($event->description, 200)); ?></p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <?php if($event->location): ?>
                                        <span class="badge bg-light text-dark border small">
                                            <i class="ri-map-pin-line me-1"></i><?php echo e($event->location); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($event->starts_at && $event->ends_at): ?>
                                        <span class="badge bg-light text-dark border small">
                                            <i class="ri-time-line me-1"></i>
                                            <?php echo e($event->starts_at->format('H:i')); ?> - <?php echo e($event->ends_at->format('H:i')); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($event->target_portal): ?>
                                        <span class="badge bg-light text-dark border small">
                                            Target: <?php echo e(ucfirst($event->target_portal)); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="ri-calendar-close-line" style="font-size: 48px;"></i>
                            <p class="mt-2">No events scheduled yet.</p>
                        </div>
                    <?php endif; ?>

                    <?php if($events->hasPages()): ?>
                        <div class="mt-3">
                            <?php echo e($events->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/notices_events.blade.php ENDPATH**/ ?>