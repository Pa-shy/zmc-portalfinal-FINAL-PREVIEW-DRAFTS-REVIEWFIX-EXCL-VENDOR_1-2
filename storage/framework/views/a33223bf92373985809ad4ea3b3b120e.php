<?php $__env->startSection('title', 'News & Press Statements'); ?>

<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0">News & Press Statements</h4>
            <div class="text-muted small">View published news articles and press releases</div>
        </div>
        <a href="<?php echo e(route('staff.registrar.dashboard')); ?>" class="btn btn-light border btn-sm">
            <i class="ri-arrow-left-line"></i> Back to Dashboard
        </a>
    </div>

    <div class="zmc-card p-0 shadow-sm border-0">
        <div class="p-3 border-bottom">
            <h6 class="fw-bold m-0">
                <i class="ri-newspaper-line me-2" style="color:#2563eb"></i> Latest News
            </h6>
        </div>

        <div class="p-3">
            <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card mb-3 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0"><?php echo e($article->title); ?></h5>
                            <span class="badge bg-primary-subtle text-primary border-primary">
                                <?php echo e($article->published_at?->format('d M Y')); ?>

                            </span>
                        </div>
                        
                        <?php if($article->excerpt): ?>
                            <p class="text-muted mb-2"><?php echo e($article->excerpt); ?></p>
                        <?php endif; ?>

                        <div class="mb-3">
                            <p class="mb-0"><?php echo e(Str::limit($article->content, 300)); ?></p>
                        </div>

                        <div class="d-flex gap-2 align-items-center">
                            <?php if($article->category): ?>
                                <span class="badge bg-light text-dark border small">
                                    <i class="ri-price-tag-3-line me-1"></i><?php echo e(ucfirst($article->category)); ?>

                                </span>
                            <?php endif; ?>
                            <?php if($article->author): ?>
                                <span class="badge bg-light text-dark border small">
                                    <i class="ri-user-line me-1"></i><?php echo e($article->author); ?>

                                </span>
                            <?php endif; ?>
                            <?php if($article->is_featured): ?>
                                <span class="badge bg-warning-subtle text-warning border-warning small">
                                    <i class="ri-star-line me-1"></i>Featured
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-5 text-muted">
                    <i class="ri-newspaper-line" style="font-size: 48px;"></i>
                    <p class="mt-2">No news articles published yet.</p>
                </div>
            <?php endif; ?>

            <?php if($news->hasPages()): ?>
                <div class="mt-3">
                    <?php echo e($news->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/staff/registrar/news.blade.php ENDPATH**/ ?>