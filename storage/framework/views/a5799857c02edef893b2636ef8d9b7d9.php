<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Media House Status Report</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #facc15; padding-bottom: 15px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zimbabwe Media Commission</h1>
        <div>Media House Status Report</div>
    </div>
    <p><strong>Generated:</strong> <?php echo e($generated_at); ?></p>
    <h2>Status Summary</h2>
    <p>Active Media Houses: <?php echo e($status_counts['active']); ?></p>
    <p>Suspended: <?php echo e($status_counts['suspended']); ?></p>
    <p>New Registrations: <?php echo e($status_counts['new_registrations']); ?></p>
    <p>Average Staff per House: <?php echo e($average_staff); ?></p>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/pdf/mediahouse-status.blade.php ENDPATH**/ ?>