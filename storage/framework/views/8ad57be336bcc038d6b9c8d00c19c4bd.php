<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-6 max-w-6xl">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Renewal Production</h1>
        <p class="text-gray-600 mt-2"><?php echo e($renewal->getRenewalTypeLabel()); ?></p>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Applicant Info -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Applicant Information</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-medium"><?php echo e($renewal->applicant->name); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium"><?php echo e($renewal->applicant->email); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Original Number</p>
                        <p class="font-medium"><?php echo e($renewal->original_number); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Renewal Type</p>
                        <p class="font-medium"><?php echo e(ucfirst($renewal->renewal_type)); ?></p>
                    </div>
                </div>
            </div>

            <!-- Original Application -->
            <?php if($renewal->originalApplication): ?>
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Original Application Details</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Reference</p>
                            <p class="font-medium"><?php echo e($renewal->originalApplication->reference); ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Type</p>
                            <p class="font-medium"><?php echo e(ucfirst($renewal->originalApplication->application_type)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Changes Requested -->
            <?php if($renewal->has_changes && $renewal->changeRequests->count() > 0): ?>
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Changes to Apply</h2>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $renewal->changeRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border rounded-lg p-4">
                                <p class="font-medium"><?php echo e($change->field_name); ?></p>
                                <div class="grid grid-cols-2 gap-4 mt-2 text-sm">
                                    <div>
                                        <p class="text-gray-600">Old Value</p>
                                        <p><?php echo e($change->old_value); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">New Value</p>
                                        <p class="font-semibold text-green-600"><?php echo e($change->new_value); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Actions Sidebar -->
        <div class="space-y-6">
            <!-- Production Actions -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Production Actions</h3>
                
                <?php if($renewal->status === 'renewal_payment_verified'): ?>
                    <form method="POST" action="<?php echo e(route('staff.officer.renewals.production.generate', $renewal)); ?>" class="mb-4">
                        <?php echo csrf_field(); ?>
                        <button type="submit" 
                                class="w-full px-4 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                            Start Production
                        </button>
                    </form>
                <?php endif; ?>

                <?php if($renewal->status === 'renewal_in_production'): ?>
                    <form method="POST" action="<?php echo e(route('staff.officer.renewals.production.mark-produced', $renewal)); ?>" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Collection Location</label>
                            <input type="text" 
                                   name="collection_location" 
                                   class="w-full px-3 py-2 border rounded-lg" 
                                   placeholder="e.g., Harare Office"
                                   required>
                        </div>
                        
                        <button type="submit" 
                                class="w-full px-4 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
                            Mark as Produced
                        </button>
                    </form>

                    <button type="button" 
                            onclick="printDocument()"
                            class="w-full mt-4 px-4 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-600">
                        Print Document
                    </button>
                <?php endif; ?>

                <?php if($renewal->status === 'renewal_produced_ready_for_collection'): ?>
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <p class="text-sm text-green-800 font-medium">Document Produced</p>
                        <p class="text-sm text-green-700 mt-1">Ready for collection</p>
                    </div>

                    <button type="button" 
                            onclick="printDocument()"
                            class="w-full mt-4 px-4 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-600">
                        Print Document
                    </button>
                <?php endif; ?>
            </div>

            <!-- Status Info -->
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-600">Current Status</p>
                <p class="font-semibold text-gray-900 mt-1"><?php echo e($renewal->getStatusLabel()); ?></p>
                
                <?php if($renewal->print_count > 0): ?>
                    <p class="text-sm text-gray-600 mt-3">Print Count</p>
                    <p class="font-semibold text-gray-900"><?php echo e($renewal->print_count); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <a href="<?php echo e(route('staff.officer.renewals.production')); ?>" 
           class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300">
            Back to Production Queue
        </a>
    </div>
</div>

<script>
async function printDocument() {
    if (!confirm('Log this print action?')) return;
    
    try {
        const response = await fetch('<?php echo e(route("staff.officer.renewals.production.print", $renewal)); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        });
        
        const data = await response.json();
        
        if (data.ok) {
            alert('Print logged successfully. Total prints: ' + data.print_count);
            window.print();
        } else {
            alert('Error logging print');
        }
    } catch (error) {
        alert('Error logging print');
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.staff', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/officer/renewal_production_show.blade.php ENDPATH**/ ?>