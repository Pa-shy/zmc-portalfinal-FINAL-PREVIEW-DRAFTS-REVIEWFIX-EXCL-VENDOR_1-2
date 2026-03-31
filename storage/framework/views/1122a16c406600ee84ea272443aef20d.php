

<?php
    $height = $height ?? 300;
?>

<div class="chart-container-wrapper">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="ri-bar-chart-line me-2"></i><?php echo e($title); ?>

            </h5>
            <?php if(isset($drilldown)): ?>
                <a href="<?php echo e($drilldown); ?>" class="btn btn-sm btn-outline-primary">
                    <i class="ri-external-link-line"></i> Details
                </a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="chart-canvas-wrapper" style="position: relative; height: <?php echo e($height); ?>px;">
                <canvas id="<?php echo e($chartId); ?>" data-chart-type="<?php echo e($chartType); ?>"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
.chart-container-wrapper {
    height: 100%;
}

.chart-container-wrapper .card {
    height: 100%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border: 1px solid #e5e7eb;
}

.chart-container-wrapper .card-header {
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 1rem 1.25rem;
}

.chart-container-wrapper .card-header h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
}

.chart-container-wrapper .card-body {
    padding: 1.25rem;
}

.chart-canvas-wrapper {
    width: 100%;
}

.chart-canvas-wrapper canvas {
    max-height: 100%;
}
</style>

<?php if(isset($chartData)): ?>
    <?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('<?php echo e($chartId); ?>');
            if (ctx) {
                const chartData = <?php echo json_encode($chartData, 15, 512) ?>;
                const chartType = '<?php echo e($chartType); ?>';
                
                // Initialize chart with provided data
                new Chart(ctx, {
                    type: chartType,
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        <?php if($chartType === 'line' || $chartType === 'bar'): ?>
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                        <?php endif; ?>
                    }
                });
            }
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/partials/chart-container.blade.php ENDPATH**/ ?>