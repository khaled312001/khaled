<header class="header fixed-top" id="header">
    <div id="nav-menu-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand" title="Home" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Khaled Ahmed Logo" class="img-fluid logo-transparent" style="max-height: 50px;">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Khaled Ahmed Logo" class="img-fluid logo-normal" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="togler-icon-inner">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('services') ? 'active' : ''); ?>" href="<?php echo e(route('services')); ?>">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('portfolios') ? 'active' : ''); ?>" href="<?php echo e(route('portfolios')); ?>">Portfolio</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link menu-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">
                                <i class="fas fa-envelope me-2"></i>Contact Me
                            </a>
                        </li>
                        <li class="nav-item navbar-btn-resp d-none d-lg-flex align-items-center">
                            <a href="<?php echo e(route('contact')); ?>" class="primary-btn">
                                <span class="text">Contact Me</span>
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