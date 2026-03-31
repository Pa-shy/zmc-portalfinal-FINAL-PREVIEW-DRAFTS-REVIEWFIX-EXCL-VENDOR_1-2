<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Renewals Production</h1>
        <p class="text-gray-600 mt-2">Generate renewed documents</p>
    </div>

    <!-- KPIs -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-600">Ready for Production</p>
            <p class="text-3xl font-bold text-blue-600"><?php echo e($kpis['ready']); ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-600">In Production</p>
            <p class="text-3xl font-bold text-yellow-600"><?php echo e($kpis['in_production']); ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-600">Ready for Collection</p>
            <p class="text-3xl font-bold text-green-600"><?php echo e($kpis['ready_for_collection']); ?></p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <form method="GET" class="flex gap-4">
            <select name="renewal_type" class="px-4 py-2 border rounded-lg">
                <option value="">All Types</option>
                <option value="accreditation" <?php echo e(request('renewal_type') === 'accreditation' ? 'selected' : ''); ?>>Accreditation</option>
                <option value="registration" <?php echo e(request('renewal_type') === 'registration' ? 'selected' : ''); ?>>Registration</option>
                <option value="permission" <?php echo e(request('renewal_type') === 'permission' ? 'selected' : ''); ?>>Permission</option>
            </select>
            
            <button type="submit" class="px-6 py-2 bg-black text-yellow-400 rounded-lg hover:bg-gray-800">
                Filter
            </button>
        </form>
    </div>

    <!-- Renewals Table -->
    <?php if($renewals->count() > 0): ?>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applicant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Original Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Verified</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $renewals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $renewal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium"><?php echo e(ucfirst($renewal->renewal_type)); ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div>
                                    <p class="text-sm font-medium text-gray-900"><?php echo e($renewal->applicant->name); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo e($renewal->applicant->email); ?></p>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <?php echo e($renewal->original_number); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?php echo e($renewal->payment_verified_at->format('M d, Y H:i')); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="<?php echo e(route('staff.officer.renewals.production.show', $renewal)); ?>" 
                                   class="text-black hover:text-gray-700">
                                    Process
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <?php echo e($renewals->links()); ?>

        </div>
    <?php else: ?>
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <p class="text-gray-500">No renewals ready for production</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.staff', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/renewals_production.blade.php ENDPATH**/ ?>