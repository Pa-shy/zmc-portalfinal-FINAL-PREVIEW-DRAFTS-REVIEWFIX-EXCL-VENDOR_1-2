<?php $__env->startSection('title', 'Reminders'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">
        <i class="ri-alarm-line me-2"></i> Reminders
      </h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        Create and manage reminders for practitioners and media houses.
      </div>
    </div>
    <div class="d-flex gap-2">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createReminderModal">
        <i class="ri-add-line me-1"></i> New Reminder
      </button>
      <a href="<?php echo e(route('staff.registrar.dashboard')); ?>" class="btn btn-outline-dark btn-sm">
        <i class="ri-arrow-left-line me-1"></i> Back
      </a>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="zmc-card">
    <div class="table-responsive">
      <table class="table table-sm table-hover mb-0">
        <thead>
          <tr class="text-muted small">
            <th>#</th>
            <th>Target Type</th>
            <th>Target ID</th>
            <th>Reminder Type</th>
            <th>Message</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Acknowledged</th>
          </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="small text-muted"><?php echo e($reminders->firstItem() + $i); ?></td>
            <td class="small fw-bold"><?php echo e(ucfirst(str_replace('_', ' ', $reminder->target_type))); ?></td>
            <td class="small"><?php echo e($reminder->target_id); ?></td>
            <td><span class="badge bg-info rounded-pill"><?php echo e($reminder->reminder_type); ?></span></td>
            <td class="small" style="max-width:300px;"><?php echo e(\Illuminate\Support\Str::limit($reminder->message, 80)); ?></td>
            <td class="small"><?php echo e($reminder->creator?->name ?? '—'); ?></td>
            <td class="small text-muted"><?php echo e($reminder->created_at ? $reminder->created_at->format('d M Y H:i') : '—'); ?></td>
            <td class="small">
              <?php if($reminder->acknowledged_at): ?>
                <span class="text-success"><i class="ri-check-double-line"></i> <?php echo e($reminder->acknowledged_at->format('d M Y')); ?></span>
              <?php else: ?>
                <span class="text-warning">Pending</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="8" class="text-muted small text-center">No reminders found.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
    <?php if(method_exists($reminders, 'links')): ?>
      <div class="mt-3"><?php echo e($reminders->links()); ?></div>
    <?php endif; ?>
  </div>

</div>

<div class="modal fade" id="createReminderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" method="POST" action="<?php echo e(route('staff.registrar.reminders.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="modal-header">
        <h5 class="modal-title fw-bold"><i class="ri-alarm-line me-2"></i> Create Reminder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label fw-bold small">Target Type <span class="text-danger">*</span></label>
          <select name="target_type" class="form-select form-select-sm" required>
            <option value="">-- Select --</option>
            <option value="user">Practitioner (User)</option>
            <option value="media_house">Media House</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold small">Target ID <span class="text-danger">*</span></label>
          <input type="number" name="target_id" class="form-control form-control-sm" required min="1" placeholder="Enter user or media house ID">
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold small">Reminder Type <span class="text-danger">*</span></label>
          <select name="reminder_type" class="form-select form-select-sm" required>
            <option value="">-- Select --</option>
            <option value="renewal_due">Renewal Due</option>
            <option value="payment_pending">Payment Pending</option>
            <option value="document_required">Document Required</option>
            <option value="general">General</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold small">Message <span class="text-danger">*</span></label>
          <textarea name="message" class="form-control form-control-sm" rows="4" required placeholder="Enter reminder message..."></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light btn-sm fw-bold" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-sm fw-bold">
          <i class="ri-send-plane-line me-1"></i> Create Reminder
        </button>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/reminders.blade.php ENDPATH**/ ?>