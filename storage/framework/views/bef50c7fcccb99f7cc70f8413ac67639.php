<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Compliance & Audit Report</title>
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
        <div>Compliance & Audit Report - <?php echo e($month); ?></div>
    </div>
    <p><strong>Generated:</strong> <?php echo e($generated_at); ?></p>
    <h2>High-Risk Actions Summary</h2>
    <p>Category Reassignments: <?php echo e($category_reassignments['total']); ?></p>
    <p>Reopened Applications: <?php echo e($reopened_applications['total']); ?></p>
    <p>Manual Overrides: <?php echo e($manual_overrides['total']); ?></p>
    <p>Certificate Edits: <?php echo e($certificate_edits['total']); ?></p>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/pdf/compliance-audit.blade.php ENDPATH**/ ?>