<?php $currentLocale = app()->getLocale(); $otherLocale = $currentLocale === 'ar' ? 'en' : 'ar'; ?>
<header class="header fixed-top" id="header">
    <div id="nav-menu-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand site-logo" title="Khaled Ahmed — Senior Full Stack Web Developer" href="<?php echo e(route('home')); ?>" aria-label="Khaled Ahmed Home">
                    <img src="<?php echo e(asset('images/logo.png')); ?>"
                         alt="Khaled Ahmed - Full Stack Web Developer"
                         width="180" height="73"
                         class="img-fluid"
                         loading="eager" decoding="async">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="togler-icon-inner">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>"><?php echo e(__('site.about')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('services') ? 'active' : ''); ?>" href="<?php echo e(route('services')); ?>"><?php echo e(__('site.services')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('portfolios') || request()->routeIs('portfolios.category') ? 'active' : ''); ?>" href="<?php echo e(route('portfolios')); ?>"><?php echo e(__('site.portfolio')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('blogs') || request()->routeIs('blog.show') || request()->routeIs('blog.category') ? 'active' : ''); ?>" href="<?php echo e(route('blogs')); ?>"><?php echo e(__('site.blog')); ?></a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">
                                <i class="fas fa-envelope me-2"></i><?php echo e(__('site.contact_me')); ?>

                            </a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link menu-link" href="<?php echo e(route('lang.switch', $otherLocale)); ?>">
                                <i class="fas fa-globe me-2"></i>
                                <?php echo e($otherLocale === 'ar' ? 'العربية' : 'English'); ?>

                            </a>
                        </li>
                        <li class="nav-item navbar-btn-resp d-none d-lg-flex align-items-center" style="gap: 10px;">
                            <a href="<?php echo e(route('lang.switch', $otherLocale)); ?>" class="lang-switch" title="<?php echo e(__('site.language')); ?>">
                                <i class="fas fa-globe"></i>
                                <?php echo e($otherLocale === 'ar' ? 'العربية' : 'English'); ?>

                            </a>
                            <a href="<?php echo e(route('contact')); ?>" class="primary-btn">
                                <span class="text"><?php echo e(__('site.contact_me')); ?></span>
                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<?php /**PATH F:\Certificates\khaled\resources\views\partials\header.blade.php ENDPATH**/ ?>