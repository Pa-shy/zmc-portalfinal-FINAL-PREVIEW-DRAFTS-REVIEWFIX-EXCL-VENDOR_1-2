<?php $__env->startSection('title', 'Reports & Downloads - Director Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h4>Reports & Downloads</h4>
            <p class="text-muted">Generate comprehensive reports for board presentations and analysis</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Monthly Accreditation Report -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Monthly Accreditation Report</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('staff.director.generate.monthly-accreditation')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Month</label>
                            <input type="month" name="month" class="form-control" value="<?php echo e(now()->format('Y-m')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Format</label>
                            <select name="format" class="form-select">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Revenue Financial Report -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Revenue & Financial Report</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('staff.director.generate.revenue-financial')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="<?php echo e(now()->startOfMonth()->format('Y-m-d')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="<?php echo e(now()->endOfMonth()->format('Y-m-d')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Format</label>
                            <select name="format" class="form-select">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Compliance Audit Report -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Compliance & Audit Report</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('staff.director.generate.compliance-audit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Month</label>
                            <input type="month" name="month" class="form-control" value="<?php echo e(now()->format('Y-m')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Format</label>
                            <select name="format" class="form-select">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Media House Status Report -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Media House Status Report</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('staff.director.generate.mediahouse-status')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Format</label>
                            <select name="format" class="form-select">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Operational Performance Report -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Operational Performance Report</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('staff.director.generate.operational-performance')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Month</label>
                            <input type="month" name="month" class="form-control" value="<?php echo e(now()->format('Y-m')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Format</label>
                            <select name="format" class="form-select">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/director/reports/downloads.blade.php ENDPATH**/ ?>