<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZMC - Document Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        .verify-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
            padding: 2rem;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .status-badge {
            font-size: 1.2rem;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        .info-grid {
            text-align: left;
            margin-top: 1.5rem;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #edf2f7;
        }
        .info-label {
            color: #718096;
            font-weight: 500;
        }
        .info-value {
            color: #2d3748;
            font-weight: 700;
        }
        .logo-section img {
            height: 60px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="verify-card">
    <div class="logo-section">
        <img src="https://zmc.co.zw/wp-content/uploads/2022/10/ZMC-LOG-NEW.png" alt="ZMC Logo">
        <h4 class="fw-bold">Zimbabwe Media Council</h4>
        <p class="text-muted small">Official Document Verification</p>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger">
            <i class="ri-error-warning-line me-2"></i> <?php echo e($error); ?>

        </div>
        <p class="mt-3">The QR code you scanned could not be validated.</p>
    <?php else: ?>
        <?php
            $status = strtolower($record->status ?? 'unknown');
            $isActive = $status === 'active';
            $isAccreditation = ($type === 'accreditation');
        ?>

        <div class="status-badge <?php echo e($isActive ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'); ?>">
            <i class="<?php echo e($isActive ? 'ri-checkbox-circle-line' : 'ri-close-circle-line'); ?> me-2"></i>
            <?php echo e(strtoupper($status)); ?>

        </div>

        <h5 class="fw-bold mb-0">
            <?php echo e($isAccreditation ? ($record->holder->name ?? 'Journalist') : ($record->entity_name ?? 'Media House')); ?>

        </h5>
        <p class="text-muted small"><?php echo e($isAccreditation ? 'Accredited Journalist' : 'Registered Media House'); ?></p>

        <div class="info-grid">
            <div class="info-item">
                <span class="info-label"><?php echo e($isAccreditation ? 'Certificate No' : 'Registration No'); ?></span>
                <span class="info-value"><?php echo e($isAccreditation ? $record->certificate_no : $record->registration_no); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Issued At</span>
                <span class="info-value"><?php echo e(\Carbon\Carbon::parse($record->issued_at)->format('d M Y')); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Expires At</span>
                <span class="info-value"><?php echo e(\Carbon\Carbon::parse($record->expires_at)->format('d M Y')); ?></span>
            </div>
            <?php if($isAccreditation && $record->application && $record->application->accreditation_category_code): ?>
                <div class="info-item">
                    <span class="info-label">Category</span>
                    <span class="info-value"><?php echo e($record->application->accreditation_category_code); ?></span>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-4 text-muted small">
            <i class="ri-shield-check-line me-1"></i> This is an authentic ZMC document.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/public/verify.blade.php ENDPATH**/ ?>