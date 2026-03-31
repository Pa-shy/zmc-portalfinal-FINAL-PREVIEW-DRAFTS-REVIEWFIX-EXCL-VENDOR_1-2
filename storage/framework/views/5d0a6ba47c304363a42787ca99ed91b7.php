

<div class="col-md-6 col-lg-4">
    <div class="risk-indicator risk-<?php echo e($indicator['level']); ?>">
        <div class="risk-header">
            <span class="risk-badge badge-<?php echo e($indicator['level']); ?>">
                <?php echo e(strtoupper($indicator['level'])); ?>

            </span>
            <h6><?php echo e($indicator['title']); ?></h6>
        </div>
        <div class="risk-body">
            <div class="risk-value"><?php echo e($indicator['value']); ?></div>
            <?php if(isset($indicator['threshold'])): ?>
                <div class="risk-threshold">Threshold: <?php echo e($indicator['threshold']); ?></div>
            <?php endif; ?>
            <?php if(isset($indicator['description'])): ?>
                <div class="risk-description"><?php echo e($indicator['description']); ?></div>
            <?php endif; ?>
        </div>
        <?php if(isset($indicator['drilldown'])): ?>
            <a href="<?php echo e($indicator['drilldown']); ?>" class="risk-drilldown">
                View Details <i class="ri-arrow-right-line"></i>
            </a>
        <?php endif; ?>
    </div>
</div>

<style>
.risk-indicator {
    border: 2px solid;
    border-radius: 8px;
    padding: 1rem;
    transition: all 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.risk-indicator.risk-green {
    border-color: #10b981;
    background: #f0fdf4;
}

.risk-indicator.risk-amber {
    border-color: #f59e0b;
    background: #fffbeb;
}

.risk-indicator.risk-red {
    border-color: #ef4444;
    background: #fef2f2;
}

.risk-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.risk-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge-green {
    background: #10b981;
    color: white;
}

.badge-amber {
    background: #f59e0b;
    color: white;
}

.badge-red {
    background: #ef4444;
    color: white;
}

.risk-header h6 {
    margin: 0;
    font-size: 0.875rem;
    font-weight: 600;
    color: #1f2937;
}

.risk-body {
    flex: 1;
    margin-bottom: 0.75rem;
}

.risk-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.risk-threshold {
    font-size: 0.75rem;
    color: #6b7280;
    margin-bottom: 0.25rem;
}

.risk-description {
    font-size: 0.875rem;
    color: #4b5563;
    line-height: 1.4;
}

.risk-drilldown {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #3b82f6;
    text-decoration: none;
    transition: color 0.2s;
}

.risk-drilldown:hover {
    color: #2563eb;
    text-decoration: underline;
}

.risk-drilldown i {
    font-size: 1rem;
}
</style>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/partials/risk-indicator.blade.php ENDPATH**/ ?>