<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Operational Performance Report</title>
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
        <div>Operational Performance Report - <?php echo e($month); ?></div>
    </div>
    <p><strong>Generated:</strong> <?php echo e($generated_at); ?></p>
    <h2>Staff Performance</h2>
    <table>
        <thead><tr><th>Staff Member</th><th>Applications Processed</th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $applications_processed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($officer->name); ?></td>
                <td><?php echo e($officer->processed_count); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/pdf/operational-performance.blade.php ENDPATH**/ ?>