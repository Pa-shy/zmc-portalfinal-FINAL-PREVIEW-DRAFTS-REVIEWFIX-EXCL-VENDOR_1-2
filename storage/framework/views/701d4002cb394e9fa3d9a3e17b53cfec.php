<?php $__env->startSection('title','Notices & Events'); ?>
<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Notices & Events</h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        Latest updates for your portal.
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-7">
      <div class="zmc-card">
        <h6 class="fw-bold mb-3"><i class="ri-megaphone-line me-2" style="color:var(--zmc-accent)"></i>Notices</h6>
        <?php $__empty_1 = true; $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="border-bottom pb-3 mb-3">
            <?php if($n->image_path): ?>
              <div class="mb-2">
                <img src="<?php echo e(asset('storage/' . $n->image_path)); ?>" alt="<?php echo e($n->title); ?>" class="rounded" style="max-width:100%;max-height:180px;object-fit:cover;">
              </div>
            <?php endif; ?>
            <div class="fw-bold text-dark"><?php echo e($n->title); ?></div>
            <div class="text-muted small"><?php echo e(optional($n->published_at)->format('d M Y')); ?></div>
            <div class="mt-2" style="white-space:pre-wrap; font-size:13px;"><?php echo e($n->body); ?></div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="text-muted">No notices at the moment.</div>
        <?php endif; ?>
      </div>
    </div>

    <div class="col-12 col-lg-5">
      <div class="zmc-card">
        <h6 class="fw-bold mb-3"><i class="ri-calendar-event-line me-2" style="color:var(--zmc-accent)"></i>Events</h6>
        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="border-bottom pb-3 mb-3">
            <?php if($e->image_path): ?>
              <div class="mb-2">
                <img src="<?php echo e(asset('storage/' . $e->image_path)); ?>" alt="<?php echo e($e->title); ?>" class="rounded" style="max-width:100%;max-height:180px;object-fit:cover;">
              </div>
            <?php endif; ?>
            <div class="fw-bold text-dark"><?php echo e($e->title); ?></div>
            <div class="text-muted small">
              <?php if($e->starts_at): ?>
                <?php echo e($e->starts_at->format('d M Y, H:i')); ?>

                <?php if($e->ends_at): ?> – <?php echo e($e->ends_at->format('d M Y, H:i')); ?> <?php endif; ?>
              <?php endif; ?>
              <?php if($e->location): ?> • <?php echo e($e->location); ?> <?php endif; ?>
            </div>
            <?php if($e->description): ?>
              <div class="mt-2" style="white-space:pre-wrap; font-size:13px;"><?php echo e($e->description); ?></div>
            <?php endif; ?>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="text-muted">No upcoming events.</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/portal/notices-events/index.blade.php ENDPATH**/ ?>