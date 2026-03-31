<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Accreditation Report</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #facc15; padding-bottom: 15px; }
        .header h1 { margin: 0; font-size: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1e293b; color: white; padding: 8px; text-align: left; }
        td { padding: 6px 8px; border-bottom: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zimbabwe Media Commission</h1>
        <div>Monthly Accreditation Report - <?php echo e($month); ?></div>
    </div>
    
    <p><strong>Generated:</strong> <?php echo e($generated_at); ?></p>
    
    <h2>Monthly Trends</h2>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Submitted</th>
                <th>Approved</th>
                <th>Rejected</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $monthly_trends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($trend->month); ?></td>
                <td><?php echo e($trend->total_submitted); ?></td>
                <td><?php echo e($trend->total_approved); ?></td>
                <td><?php echo e($trend->total_rejected); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/pdf/monthly-accreditation.blade.php ENDPATH**/ ?>