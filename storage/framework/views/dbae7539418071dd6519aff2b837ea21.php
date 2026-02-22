<?php $__env->startSection('title', 'Templates & Documents'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Templates & Documents</h4>
      <div class="text-muted" style="font-size:13px;">Upload templates and manage active versions (basic version control).</div>
    </div>
    <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.templates.index')); ?>">Catalogue</a>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <div class="row g-3">
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Upload new version</div>
        <div class="card-body">
          <form method="POST" action="<?php echo e(route('admin.templates.config')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-2">
              <label class="form-label small text-muted">Template type</label>
              <select class="form-select form-select-sm" name="type" required>
                <?php $__currentLoopData = ($cfg['items'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($key); ?>"><?php echo e($item['label'] ?? strtoupper($key)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label small text-muted">Label (optional)</label>
              <input class="form-control form-control-sm" name="label" placeholder="e.g. 2026 Card Template" />
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">File</label>
              <input class="form-control form-control-sm" type="file" name="file" required />
              <div class="small text-muted mt-1">Max 5MB.</div>
            </div>
            <button class="btn btn-primary btn-sm">Upload & Activate</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Current templates</div>
        <div class="card-body">
          <div class="accordion" id="tplAcc">
            <?php $__currentLoopData = ($cfg['items'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php ($active = $item['active_version'] ?? null); ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="h<?php echo e($key); ?>">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c<?php echo e($key); ?>">
                    <?php echo e($item['label'] ?? strtoupper($key)); ?>

                    <span class="badge bg-light text-dark ms-2">Active: <?php echo e($active ?: '—'); ?></span>
                  </button>
                </h2>
                <div id="c<?php echo e($key); ?>" class="accordion-collapse collapse" data-bs-parent="#tplAcc">
                  <div class="accordion-body">
                    <?php if(empty($item['versions'])): ?>
                      <div class="text-muted">No versions uploaded.</div>
                    <?php else: ?>
                      <div class="table-responsive">
                        <table class="table table-sm">
                          <thead class="table-light"><tr><th>Version</th><th>Label</th><th>Uploaded</th><th>Path</th></tr></thead>
                          <tbody>
                            <?php $__currentLoopData = array_reverse($item['versions']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td class="text-nowrap"><code><?php echo e($v['version'] ?? ''); ?></code></td>
                                <td><?php echo e($v['label'] ?? ''); ?></td>
                                <td class="text-nowrap"><?php echo e($v['uploaded_at'] ?? ''); ?></td>
                                <td style="font-size:12px;"><?php echo e($v['path'] ?? ''); ?></td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/system/templates_config.blade.php ENDPATH**/ ?>