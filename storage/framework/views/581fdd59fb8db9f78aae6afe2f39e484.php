<?php $__env->startSection('title', 'Financial Performance'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
    <div class="mb-4">
        <a href="<?php echo e(route('staff.director.dashboard')); ?>" class="btn btn-sm btn-link p-0 text-muted mb-2 text-decoration-none">
            <i class="ri-arrow-left-line"></i> Back to Overview
        </a>
        <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Financial Performance Overview</h4>
    </div>

    <div class="row g-4">
        
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Revenue by Service Type</h6>
                <div style="height: 250px;">
                    <canvas id="serviceRevenueChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="zmc-card">
                <h6 class="fw-bold mb-3">Revenue by Applicant Type</h6>
                <div style="height: 250px;">
                    <canvas id="typeRevenueChart"></canvas>
                </div>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="zmc-card h-100 border-start border-4 border-warning">
                <h6 class="fw-bold mb-3">Waivers Overview</h6>
                <div class="display-6 fw-black text-warning"><?php echo e($waivers->count); ?></div>
                <div class="text-muted">Waivers granted</div>
                <hr>
                <div class="h4 fw-bold text-dark">$<?php echo e(number_format($waivers->waived_amount, 2)); ?></div>
                <div class="text-muted smaller">Total value waived</div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="zmc-card h-100">
                <h6 class="fw-bold mb-3">Outstanding Revenue Aging</h6>
                <div class="row text-center mt-4">
                    <div class="col-4 border-end">
                        <div class="h2 fw-black text-success"><?php echo e($aging['0_30']); ?></div>
                        <div class="text-muted smaller">0-30 Days</div>
                    </div>
                    <div class="col-4 border-end">
                        <div class="h2 fw-black text-warning"><?php echo e($aging['30_60']); ?></div>
                        <div class="text-muted smaller">30-60 Days</div>
                    </div>
                    <div class="col-4">
                        <div class="h2 fw-black text-danger"><?php echo e($aging['60_plus']); ?></div>
                        <div class="text-muted smaller">60+ Days</div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-top">
                    <div class="alert alert-light border-0 small mb-0">
                        <i class="ri-information-line me-1"></i> Aging is calculated based on time since application was approved by Accreditation Officer but not yet paid.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Chart.js loaded:', typeof Chart !== 'undefined');
    
    if (typeof Chart !== 'undefined') {
        // Service Revenue Chart
        const serviceCanvas = document.getElementById('serviceRevenueChart');
        if (serviceCanvas) {
            new Chart(serviceCanvas, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($revenueByService->pluck('service_type')->toArray()); ?>,
                    datasets: [{
                        label: 'Revenue ($)',
                        data: <?php echo json_encode($revenueByService->pluck('total_revenue')->toArray()); ?>,
                        backgroundColor: '#3b82f6'
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }

        // Type Revenue Chart
        const typeCanvas = document.getElementById('typeRevenueChart');
        if (typeCanvas) {
            new Chart(typeCanvas, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($revenueByType->pluck('applicant_category')->toArray()); ?>,
                    datasets: [{
                        data: <?php echo json_encode($revenueByType->pluck('total_revenue')->toArray()); ?>,
                        backgroundColor: ['#10b981', '#f59e0b', '#8b5cf6', '#3b82f6', '#ef4444']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { 
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: { size: 11 }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': $' + context.parsed.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }
    } else {
        console.error('Chart.js not loaded');
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/patiencemupikeni/Downloads/zmc-portalfinal-FINAL-PREVIEW-DRAFTS-REVIEWFIX-EXCL-VENDOR_1-2/resources/views/staff/director/reports/financial.blade.php ENDPATH**/ ?>