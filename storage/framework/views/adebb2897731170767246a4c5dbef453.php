<?php
  $portalKey = $portalKey ?? 'both';
  $latestNotices = \App\Models\Notice::where('is_published',true)->whereIn('target_portal',[$portalKey,'both'])->latest('published_at')->take(3)->get();
  $latestEvents = \App\Models\Event::where('is_published',true)->whereIn('target_portal',[$portalKey,'both'])->orderByRaw('starts_at is null, starts_at asc')->take(3)->get();
?>

<div class="row g-3 mb-4">
  <div class="col-12 col-lg-6">
    <div class="zmc-card h-100">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="fw-bold"><i class="ri-megaphone-line me-2" style="color:var(--zmc-accent)"></i>Notices</div>
        <a class="small fw-bold text-decoration-none" href="<?php echo e(route('portal.notices_events', ['portal'=>$portalKey])); ?>">View all</a>
      </div>
      <?php $__empty_1 = true; $__currentLoopData = $latestNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-2">
          <div class="fw-bold" style="font-size:13px;"><?php echo e($n->title); ?></div>
          <div class="text-muted" style="font-size:12px;"><?php echo e(optional($n->published_at ?? $n->created_at)->format('d M Y')); ?></div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-muted small">No notices.</div>
      <?php endif; ?>
    </div>
  </div>

  <div class="col-12 col-lg-6">
    <div class="zmc-card h-100">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="fw-bold"><i class="ri-calendar-event-line me-2" style="color:var(--zmc-accent)"></i>Events</div>
        <a class="small fw-bold text-decoration-none" href="<?php echo e(route('portal.notices_events', ['portal'=>$portalKey])); ?>">View all</a>
      </div>
      <?php $__empty_1 = true; $__currentLoopData = $latestEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-2">
          <div class="fw-bold" style="font-size:13px;"><?php echo e($e->title); ?></div>
          <div class="text-muted" style="font-size:12px;"><?php echo e($e->starts_at ? $e->starts_at->format('d M Y H:i') : 'Date TBA'); ?><?php echo e($e->location ? ' • '.$e->location : ''); ?></div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-muted small">No events.</div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php /**PATH /home/runner/workspace/resources/views/portal/partials/notices_events_widget.blade.php ENDPATH**/ ?>