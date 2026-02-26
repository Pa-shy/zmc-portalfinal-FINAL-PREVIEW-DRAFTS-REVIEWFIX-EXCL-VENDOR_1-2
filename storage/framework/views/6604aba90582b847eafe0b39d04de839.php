<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 p-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold m-0">Accreditation & Fee Matrix</h6>
            <p class="text-slate-600 small m-0 fw-medium">Manage journalist categories and legislative fees</p>
        </div>
        <form action="<?php echo e(route('staff.it.fees.sync')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-slate-100 border text-slate-600 btn-sm rounded-pill px-3 fw-bold">Sync Legislative Rates</button>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle m-0">
                <thead class="bg-slate-50 border-top border-bottom border-slate-100">
                    <tr>
                        <th class="ps-4 small text-slate-700 uppercase fw-bold py-3">Code</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3">Category Name</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3">Base Fee (USD)</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3 text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="ps-4"><span class="badge bg-slate-100 text-slate-900 border fw-bold"><?php echo e($code); ?></span></td>
                        <td class="small fw-medium text-slate-700"><?php echo e($label); ?></td>
                        <td colspan="2">
                            <form action="<?php echo e(route('staff.it.fees.save')); ?>" method="POST" class="d-flex align-items-center justify-content-end gap-2 px-0">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="category_code" value="<?php echo e($code); ?>">
                                <div class="input-group input-group-sm" style="width: 120px;">
                                    <span class="input-group-text bg-white border-end-0 text-slate-400">$</span>
                                    <input type="number" name="fee_amount" step="0.01" class="form-control border-start-0 ps-0 text-end fw-bold" value="<?php echo e($fees[$code] ?? 0); ?>">
                                </div>
                                <button type="submit" class="btn btn-sm btn-icon me-4"><i class="ri-save-line text-primary"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
            <h6 class="fw-bold mb-3 small uppercase text-slate-600">Media House Categories</h6>
            <div class="d-flex flex-wrap gap-2">
                <?php $__currentLoopData = $mediaCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mCode => $mLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p-2 bg-slate-50 rounded-3 border flex-grow-1" style="min-width: calc(50% - 1rem);">
                    <div class="badge bg-white text-primary border mb-1"><?php echo e($mCode); ?></div>
                    <div class="small fw-bold text-slate-700"><?php echo e($mLabel); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
            <h6 class="fw-bold mb-3 small uppercase text-slate-600">ID numbering format</h6>
            <div class="p-3 bg-slate-900 text-white rounded-4 mb-3 font-monospace small">
                <span class="text-warning">PREFIX</span>[ID:8]<span class="text-info">SUFFIX</span>
                <br><span class="text-success">// Example: J00012345E</span>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-slate-100 border text-slate-600 py-2 rounded-pill small fw-bold">Advanced Numbering Settings</button>
                <button class="btn btn-slate-100 border text-slate-600 py-2 rounded-pill small fw-bold">QR Code Validation Logic</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/runner/workspace/resources/views/staff/it/dashboard/partials/accreditation.blade.php ENDPATH**/ ?>