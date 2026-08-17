<?php
    $khLocale = app()->getLocale();
    $year = date('Y');
?>
<footer class="ks-foot" role="contentinfo">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3">
                <div class="ks-foot__brand">
                    <img src="<?php echo e(asset('images/logo-360w.webp')); ?>" alt="Khaled Ahmed" width="180" height="38">
                </div>
                <p class="ks-foot__about">
                    <?php echo e($khLocale === 'ar' ? 'مطور ويب Full Stack خبير في Laravel و React و Node.js. أكثر من خمس سنوات خبرة و25 مشروعا منشورا في ثماني دول.' : 'Senior full stack web developer specialized in Laravel, React, and Node.js. 5+ years of experience and 25+ shipped production projects across 8 countries.'); ?>

                </p>
                <div class="ks-foot__social">
                    <a href="https://github.com/khaled312001" target="_blank" rel="me noopener" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" rel="me noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://wa.me/201204593124" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:khaledahmedhaggagy@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <h2 class="ks-foot__h"><?php echo e($khLocale === 'ar' ? 'الخدمات' : 'Services'); ?></h2>
                <ul class="ks-foot__links">
                    <?php $__currentLoopData = \App\Services\LandingService::index(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('landing', $lp['slug'])); ?>"><?php echo e($lp['label']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <h2 class="ks-foot__h"><?php echo e($khLocale === 'ar' ? 'الموقع' : 'Site'); ?></h2>
                <ul class="ks-foot__links">
                    <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a></li>
                    <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('site.about')); ?></a></li>
                    <li><a href="<?php echo e(route('services')); ?>"><?php echo e(__('site.services')); ?></a></li>
                    <li><a href="<?php echo e(route('portfolios')); ?>"><?php echo e(__('site.portfolio')); ?></a></li>
                    <li><a href="<?php echo e(route('blogs')); ?>"><?php echo e(__('site.blog')); ?></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4">
                <h2 class="ks-foot__h"><?php echo e($khLocale === 'ar' ? 'تواصل' : 'Get in touch'); ?></h2>
                <ul class="ks-foot__links">
                    <li><a href="mailto:khaledahmedhaggagy@gmail.com"><i class="fas fa-envelope" style="color:var(--brand);width:16px;"></i> khaledahmedhaggagy@gmail.com</a></li>
                    <li><a href="tel:+201204593124" dir="ltr"><i class="fas fa-phone-alt" style="color:var(--brand);width:16px;"></i> +20 120 459 3124</a></li>
                    <li><a href="https://wa.me/201204593124" target="_blank" rel="noopener"><i class="fab fa-whatsapp" style="color:var(--success);width:16px;"></i> WhatsApp</a></li>
                    <li><a href="<?php echo e(route('faqs')); ?>"><?php echo e(__('site.faqs') ?? 'FAQs'); ?></a> · <a href="<?php echo e(route('plans')); ?>"><?php echo e($khLocale === 'ar' ? 'الباقات' : 'Plans'); ?></a></li>
                    <li><span style="color:var(--text-3);"><i class="fas fa-map-marker-alt" style="color:var(--brand);width:16px;"></i> <?php echo e($khLocale === 'ar' ? 'القاهرة، مصر' : 'Cairo, Egypt'); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="ks-foot__bot">
            <div>&copy; <?php echo e($year); ?> Khaled Ahmed. <?php echo e($khLocale === 'ar' ? 'جميع الحقوق محفوظة.' : 'All rights reserved.'); ?></div>
            <div>
                <a href="<?php echo e(route('sitemap')); ?>">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH F:\Certificates\khaled\resources\views/partials/footer.blade.php ENDPATH**/ ?>