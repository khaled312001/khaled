<?php
    $khLocale = app()->getLocale();
    $khOther  = $khLocale === 'ar' ? 'en' : 'ar';
?>
<header class="ks-nav" id="ksNav">
    <div class="ks-nav__inner">
        <a href="<?php echo e(route('home')); ?>" class="ks-nav__brand" aria-label="Khaled Ahmed Home">
            <img src="<?php echo e(asset('images/logo-360w.webp')); ?>" alt="Khaled Ahmed" width="180" height="38">
        </a>

        <nav class="ks-nav__links" aria-label="Primary">
            <a class="ks-nav__link <?php echo e(request()->routeIs('home') ? 'is-active' : ''); ?>" href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a>
            <a class="ks-nav__link <?php echo e(request()->routeIs('about') ? 'is-active' : ''); ?>" href="<?php echo e(route('about')); ?>"><?php echo e(__('site.about')); ?></a>
            <a class="ks-nav__link <?php echo e(request()->routeIs('services') ? 'is-active' : ''); ?>" href="<?php echo e(route('services')); ?>"><?php echo e(__('site.services')); ?></a>
            <a class="ks-nav__link <?php echo e(request()->routeIs('portfolios') || request()->routeIs('portfolios.category') ? 'is-active' : ''); ?>" href="<?php echo e(route('portfolios')); ?>"><?php echo e(__('site.portfolio')); ?></a>
            <a class="ks-nav__link <?php echo e(request()->routeIs('blogs') || request()->routeIs('blog.show') || request()->routeIs('blog.category') ? 'is-active' : ''); ?>" href="<?php echo e(route('blogs')); ?>"><?php echo e(__('site.blog')); ?></a>
        </nav>

        <div class="ks-nav__actions">
            <a href="<?php echo e(route('lang.switch', $khOther)); ?>" class="ks-nav__lang" title="<?php echo e(__('site.language')); ?>">
                <i class="fas fa-globe"></i>
                <span><?php echo e($khOther === 'ar' ? 'العربية' : 'English'); ?></span>
            </a>
            <a href="<?php echo e(route('contact')); ?>" class="ks-nav__cta">
                <span><?php echo e(__('site.contact_me')); ?></span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>

        <button type="button" class="ks-nav__burger" data-ks-drawer-open aria-label="Open menu" aria-controls="ksDrawer">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>
<?php /**PATH F:\Certificates\khaled\resources\views/partials/header.blade.php ENDPATH**/ ?>