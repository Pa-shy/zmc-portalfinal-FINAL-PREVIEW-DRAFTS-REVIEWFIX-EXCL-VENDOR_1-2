<?php $__env->startSection('title', 'Reports & Analytics'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Reports & Analytics</h4>
      <div class="text-muted" style="font-size:13px;">Operational + compliance snapshots with exports.</div>
    </div>
    <div class="d-flex gap-2 flex-wrap">
      <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.downloads.index')); ?>">Export Centre</a>
      <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.downloads.csv', ['type' => 'applications'])); ?>">Download Applications (CSV)</a>
      <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.downloads.csv', ['type' => 'complaints'])); ?>">Download Complaints (CSV)</a>
    </div>
  </div>

  <form class="row g-2 align-items-end mb-3" method="GET" action="<?php echo e(route('admin.reports.index')); ?>">
    <div class="col-md-3">
      <label class="form-label small text-muted">From</label>
      <input type="date" class="form-control form-control-sm" name="from" value="<?php echo e($from->format('Y-m-d')); ?>" />
    </div>
    <div class="col-md-3">
      <label class="form-label small text-muted">To</label>
      <input type="date" class="form-control form-control-sm" name="to" value="<?php echo e($to->format('Y-m-d')); ?>" />
    </div>
    <div class="col-md-3">
      <button class="btn btn-sm btn-primary">Apply</button>
    </div>
  </form>

  <div class="row g-3">
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold d-flex align-items-center justify-content-between">
          <span>Operational report: Applications by stage</span>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.downloads.csv', ['type' => 'applications'])); ?>">Download CSV</a>
        </div>
        <div class="card-body p-0">
          <div class="p-3">
            <canvas id="chartByStage" height="120"></canvas>
          </div>
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light"><tr><th>Status</th><th class="text-end">Total</th></tr></thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $byStage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr><td><?php echo e($r->status); ?></td><td class="text-end"><?php echo e($r->total); ?></td></tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr><td colspan="2" class="text-center text-muted py-3">No data.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold d-flex align-items-center justify-content-between">
          <span>Applications by type</span>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.downloads.csv', ['type' => 'applications'])); ?>">Download CSV</a>
        </div>
        <div class="card-body p-0">
          <div class="p-3">
            <canvas id="chartByType" height="120"></canvas>
          </div>
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light"><tr><th>Type</th><th class="text-end">Total</th></tr></thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $byType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr><td><?php echo e(ucfirst($r->application_type)); ?></td><td class="text-end"><?php echo e($r->total); ?></td></tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr><td colspan="2" class="text-center text-muted py-3">No data.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white fw-semibold">Compliance & audit reports</div>
        <div class="card-body">
          <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.audit.index')); ?>">Audit & Logs</a>
            <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.workflow.config')); ?>">SLA & Escalations</a>
            <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.users.login_activity')); ?>">Login Activity</a>
          </div>
          <div class="small text-muted mt-2">Use these screens for compliance reviews and investigations.</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    (function () {
      const byStage = <?php echo json_encode($byStage->map(fn($r) => ['label' => $r->status, 'value' => (int)$r->total]), 512) ?>;
      const byType = <?php echo json_encode($byType->map(fn($r) => ['label' => ucfirst($r->application_type), 'value' => (int)$r->total]), 512) ?>;

      const stageCtx = document.getElementById('chartByStage');
      if (stageCtx) {
        new Chart(stageCtx, {
          type: 'bar',
          data: {
            labels: byStage.map(x => x.label),
            datasets: [{ label: 'Applications', data: byStage.map(x => x.value) }]
          },
          options: { responsive: true, plugins: { legend: { display: false } } }
        });
      }

      const typeCtx = document.getElementById('chartByType');
      if (typeCtx) {
        new Chart(typeCtx, {
          type: 'doughnut',
          data: {
            labels: byType.map(x => x.label),
            datasets: [{ label: 'Applications', data: byType.map(x => x.value) }]
          },
          options: { responsive: true }
        });
      }
    })();
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/reports/index.blade.php ENDPATH**/ ?>