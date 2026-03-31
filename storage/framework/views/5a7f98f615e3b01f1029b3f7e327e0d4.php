

<div class="col-12 col-md-3">
    <div class="kpi-card <?php echo e(isset($drilldown) ? 'clickable' : ''); ?>" 
         <?php if(isset($drilldown)): ?> onclick="window.location='<?php echo e($drilldown); ?>'" style="cursor: pointer;" <?php endif; ?>>
        <div class="kpi-icon bg-<?php echo e($color); ?>-subtle text-<?php echo e($color); ?>">
            <i class="<?php echo e($icon); ?>"></i>
        </div>
        <div class="kpi-content">
            <div class="kpi-title"><?php echo e($title); ?></div>
            <div class="kpi-value"><?php echo e($value); ?></div>
            <?php if(isset($subtitle)): ?>
                <div class="kpi-subtitle"><?php echo e($subtitle); ?></div>
            <?php endif; ?>
            <?php if(isset($trend)): ?>
                <div class="kpi-trend <?php echo e(str_starts_with($trend, '+') ? 'text-success' : 'text-danger'); ?>">
                    <i class="<?php echo e(str_starts_with($trend, '+') ? 'ri-arrow-up-line' : 'ri-arrow-down-line'); ?>"></i> <?php echo e($trend); ?>

                </div>
            <?php endif; ?>
            <?php if(isset($progress)): ?>
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-<?php echo e($color); ?>" style="width: <?php echo e($progress); ?>%"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.kpi-card {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.3s;
    display: flex;
    gap: 1rem;
    height: 100%;
}

.kpi-card.clickable:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transform: translateY(-2px);
}

.kpi-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.kpi-content {
    flex: 1;
}

.kpi-title {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.kpi-value {
    font-size: 1.75rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.kpi-subtitle {
    font-size: 0.75rem;
    color: #9ca3af;
}

.kpi-trend {
    font-size: 0.875rem;
    font-weight: 500;
    margin-top: 0.5rem;
}

.kpi-trend i {
    font-size: 1rem;
}
</style>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/partials/kpi-card.blade.php ENDPATH**/ ?>