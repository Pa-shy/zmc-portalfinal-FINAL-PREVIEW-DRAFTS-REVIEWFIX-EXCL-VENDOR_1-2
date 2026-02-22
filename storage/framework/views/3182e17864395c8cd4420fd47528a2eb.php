<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Revenue & Financial Report</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #facc15; padding-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1e293b; color: white; padding: 8px; text-align: left; }
        td { padding: 6px 8px; border-bottom: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zimbabwe Media Commission</h1>
        <div>Revenue & Financial Report - <?php echo e($period); ?></div>
    </div>
    <p><strong>Generated:</strong> <?php echo e($generated_at); ?></p>
    <h2>Revenue by Service Type</h2>
    <table>
        <thead><tr><th>Service Type</th><th>Revenue</th><th>Transactions</th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $revenue_by_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($service->service_type); ?></td>
                <td>$<?php echo e(number_format($service->total_revenue, 2)); ?></td>
                <td><?php echo e($service->transaction_count); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/pdf/revenue-financial.blade.php ENDPATH**/ ?>