
<?php
    $isAr      = app()->getLocale() === 'ar';
    $khOffline = !empty($project['offline']);
    $khCase    = route('portfolio.show', $project['slug']);
    $khShot    = \App\Services\ScreenshotService::get($project['slug']);
?>
<div class="col-lg-4 col-md-6">
    <div class="pf-card ks-fadeup<?php echo e($khOffline ? ' pf-card--offline' : ''); ?>">
        <a class="pf-card__hit" href="<?php echo e($khCase); ?>" aria-label="<?php echo e($isAr ? 'دراسة حالة: ' : 'Case study: '); ?><?php echo e($project['title']); ?>"></a>

        <?php if($khShot): ?>
            <figure class="pf-shot" style="--shift:<?php echo e($khShot['shift']); ?>;--dur:<?php echo e($khShot['dur']); ?>">
                <img src="<?php echo e(asset($khShot['src'])); ?>"
                     width="<?php echo e($khShot['w']); ?>" height="<?php echo e($khShot['h']); ?>"
                     loading="lazy" decoding="async"
                     alt="<?php echo e($isAr
                        ? 'لقطة شاشة للصفحة الرئيسية لموقع ' . $project['title'] . ' — ' . $project['category'] . ' من تطوير خالد أحمد بـ ' . implode(' و', array_slice($project['tech'], 0, 3))
                        : $project['title'] . ' homepage screenshot — ' . $project['category'] . ' site built by Khaled Ahmed with ' . implode(', ', array_slice($project['tech'], 0, 3))); ?>">
            </figure>
        <?php else: ?>
            <div class="pf-shot pf-shot--none" aria-hidden="true"><i class="fas fa-link-slash"></i></div>
        <?php endif; ?>

        <div class="pf-card__top">
            <span class="pf-card__cat"><?php echo e($project['category']); ?></span>
            <?php if($khOffline): ?>
                <span class="pf-card__off"><i class="fas fa-circle-minus"></i> <?php echo e($isAr ? 'غير متاح حاليا' : 'Currently offline'); ?></span>
            <?php elseif(!empty($project['featured'])): ?>
                <span class="pf-card__feat"><i class="fas fa-star"></i> <?php echo e($isAr ? 'مميّز' : 'Featured'); ?></span>
            <?php endif; ?>
        </div>

        <h3 class="pf-card__title"><?php echo e($project['title']); ?></h3>
        <p class="pf-card__sum"><?php echo e($project['summary']); ?></p>

        <?php if(!empty($project['tech'])): ?>
            <div class="pf-card__tech">
                <?php $__currentLoopData = array_slice($project['tech'], 0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><span><?php echo e($t); ?></span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="pf-card__foot">
            <span class="pf-card__visit"><?php echo e($isAr ? 'دراسة الحالة' : 'Read case study'); ?> <i class="fas fa-arrow-<?php echo e($isAr ? 'left' : 'right'); ?>"></i></span>
            <?php if($khOffline): ?>
                <span class="pf-card__role"><?php echo e($isAr ? 'الموقع متوقف' : 'Site offline'); ?></span>
            <?php else: ?>
                <a class="pf-card__ext" href="<?php echo e($project['url']); ?>" target="_blank" rel="noopener nofollow"
                   aria-label="<?php echo e($isAr ? 'زيارة موقع ' : 'Visit the live site for '); ?><?php echo e($project['title']); ?>">
                    <?php echo e($isAr ? 'الموقع' : 'Live site'); ?> <i class="fas fa-external-link-alt"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH F:\Certificates\khaled\resources\views/partials/portfolio-card.blade.php ENDPATH**/ ?>