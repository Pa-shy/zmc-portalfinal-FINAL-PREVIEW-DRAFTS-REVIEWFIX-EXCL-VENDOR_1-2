<?php $__env->startSection('title', 'Messages'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto',sans-serif;color:#334155;">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px;color:#1e293b;">Messages</h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        <i class="ri-mail-line me-1"></i> Your conversations per application.
      </div>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="zmc-card p-0 shadow-sm border-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0"><i class="ri-list-check-2 me-2" style="color:var(--zmc-accent)"></i>Latest threads</h6>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th><i class="ri-hashtag me-1"></i> Ref</th>
            <th><i class="ri-user-line me-1"></i> With</th>
            <th><i class="ri-chat-3-line me-1"></i> Last message</th>
            <th><i class="ri-time-line me-1"></i> When</th>
            <th class="text-end" style="min-width:120px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $ref = $t->application?->reference ?? ('APP-' . $t->application_id);
              $who = $t->other_user?->name ?? 'User';
              $when = $t->sent_at ? $t->sent_at->format('d M Y H:i') : ($t->created_at?->format('d M Y H:i') ?? '—');
              $unread = (int)($t->unread_count ?? 0);
            ?>
            <tr>
              <td class="fw-bold text-dark"><?php echo e($ref); ?></td>
              <td><?php echo e($who); ?>

                <?php if($unread > 0): ?>
                  <span class="badge rounded-pill bg-primary ms-2"><?php echo e($unread); ?> new</span>
                <?php endif; ?>
              </td>
              <td class="text-muted"><?php echo e(\Illuminate\Support\Str::limit($t->body, 70)); ?></td>
              <td class="small text-muted"><?php echo e($when); ?></td>
              <td class="text-end">
                <a class="btn btn-sm btn-dark" href="<?php echo e(route('messages.thread', $t->application_id)); ?>">
                  Open
                </a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="5" class="text-center py-5 text-muted">No messages found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/messages/index.blade.php ENDPATH**/ ?>