<?php $__env->startSection('title', 'Analytics'); ?>

<?php $__env->startSection('content'); ?>
<?php
  $labels = collect(range(0, 29))
    ->map(fn($i) => $from->copy()->addDays($i)->format('Y-m-d'))
    ->values();

  $appMap = $dailyApplications->groupBy(fn($r) => $r->d)->map(function ($rows) {
    return $rows->pluck('c', 'application_type');
  });

  $accreditationSeries = $labels->map(fn($d) => (int)($appMap[$d]['accreditation'] ?? 0));
  $registrationSeries  = $labels->map(fn($d) => (int)($appMap[$d]['registration'] ?? 0));
  $publicUsersMap      = $dailyPublicUsers->pluck('c', 'd');
  $publicUsersSeries   = $labels->map(fn($d) => (int)($publicUsersMap[$d] ?? 0));

  $statusOptions = $statusBreakdown->pluck('status')->values();
?>

<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Analytics</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Trends and breakdowns across applications and users (last 30 days).</div>
    </div>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-dark">
      <i class="ri-arrow-left-line me-1"></i> Back to Dashboard
    </a>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="text-muted small">Public Users</div>
          <div class="fs-3 fw-bold"><?php echo e(number_format($totals['public_users'] ?? 0)); ?></div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="text-muted small">Staff Users</div>
          <div class="fs-3 fw-bold"><?php echo e(number_format($totals['staff_users'] ?? 0)); ?></div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="text-muted small">Accreditation Applications</div>
          <div class="fs-3 fw-bold"><?php echo e(number_format($totals['accreditation'] ?? 0)); ?></div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="text-muted small">Media House Registrations</div>
          <div class="fs-3 fw-bold"><?php echo e(number_format($totals['registration'] ?? 0)); ?></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4 mb-4">
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
          <div class="fw-bold"><i class="ri-line-chart-line me-2"></i>Daily trend (30 days)</div>
        </div>
        <div class="card-body">
          <canvas id="trendChart" height="110"></canvas>
          <div class="text-muted small mt-2">Includes accreditation, media house registrations, and new public users per day.</div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-pie-chart-line me-2"></i>Applications by Status</div>
        </div>
        <div class="card-body">
          <canvas id="statusChart" height="240"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4 mb-4">
    <div class="col-lg-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-bar-chart-fill me-2"></i>Applications by Collection Region</div>
        </div>
        <div class="card-body">
          <canvas id="regionChart" height="80"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4 mb-4">
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-table-2 me-2"></i>By Status</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0 small">
              <tbody>
                <?php $__currentLoopData = $statusBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="ps-3"><?php echo e(ucwords(str_replace('_',' ', $row->status))); ?></td>
                    <td class="text-end pe-3 fw-bold"><?php echo e(number_format($row->c)); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-table-2 me-2"></i>By Type</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0 small">
              <tbody>
                <?php $__currentLoopData = $typeBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="ps-3"><?php echo e(ucfirst($row->application_type ?? 'Unknown')); ?></td>
                    <td class="text-end pe-3 fw-bold"><?php echo e(number_format($row->c)); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="fw-bold"><i class="ri-table-2 me-2"></i>By Region</div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0 small">
              <tbody>
                <?php $__currentLoopData = $regionBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td class="ps-3"><?php echo e(ucfirst($row->collection_region ?? 'Online/Other')); ?></td>
                    <td class="text-end pe-3 fw-bold"><?php echo e(number_format($row->c)); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
  (function(){
    const labels = <?php echo json_encode($labels, 15, 512) ?>;
    const seriesAcc = <?php echo json_encode($accreditationSeries, 15, 512) ?>;
    const seriesReg = <?php echo json_encode($registrationSeries, 15, 512) ?>;
    const seriesPub = <?php echo json_encode($publicUsersSeries, 15, 512) ?>;

    const statusLabels = <?php echo json_encode($statusBreakdown->map(fn($r) => ucwords(str_replace('_', ' ', $r->status)))) ?>;
    const statusCounts = <?php echo json_encode($statusBreakdown->pluck('c'), 15, 512) ?>;

    const ctx = document.getElementById('trendChart');
    if (ctx) {
      new Chart(ctx, {
        type: 'line',
        data: {
          labels,
          datasets: [
            { label: 'Accreditation', data: seriesAcc, tension: 0.25 },
            { label: 'Media House', data: seriesReg, tension: 0.25 },
            { label: 'New Public Users', data: seriesPub, tension: 0.25 }
          ]
        },
        options: {
          responsive: true,
          interaction: { mode: 'index', intersect: false },
          scales: {
            x: { ticks: { maxTicksLimit: 8 } },
            y: { beginAtZero: true, ticks: { precision: 0 } }
          }
        }
      });
    }

    const pctx = document.getElementById('statusChart');
    if (pctx) {
      new Chart(pctx, {
        type: 'doughnut',
        data: {
          labels: statusLabels,
          datasets: [{ data: statusCounts }]
        },
        options: {
          responsive: true,
          plugins: { legend: { position: 'bottom' } }
        }
      });
    }

    const rctx = document.getElementById('regionChart');
    if (rctx) {
      new Chart(rctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($regionBreakdown->pluck('collection_region')->map(fn($r) => ucfirst($r ?? 'Other')), 15, 512) ?>,
          datasets: [{
            label: 'Applications',
            data: <?php echo json_encode($regionBreakdown->pluck('c'), 15, 512) ?>,
            backgroundColor: '#1e293b'
          }]
        },
        options: {
          responsive: true,
          scales: { y: { beginAtZero: true } }
        }
      });
    }
  })();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/analytics/index.blade.php ENDPATH**/ ?>