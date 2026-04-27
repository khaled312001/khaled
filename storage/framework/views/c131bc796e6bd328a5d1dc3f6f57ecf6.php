

<?php $__env->startSection('title', $portfolio['title'] ?? 'Portfolio Detail'); ?>

<?php $__env->startSection('content'); ?>
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1><?php echo e($portfolio['title'] ?? 'Portfolio'); ?></h1>
                    <ul class="breadcrumb-links">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li><a href="<?php echo e(route('portfolios')); ?>">Portfolio</a></li>
                        <li class="active"><?php echo e($portfolio['title'] ?? 'Portfolio'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="portfolio-single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if(isset($portfolio['images']) && count($portfolio['images']) > 0): ?>
                <div class="owl-carousel owl-theme" id="portfolioCarousel">
                    <?php $__currentLoopData = $portfolio['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset('images/projects/' . $image)); ?>" alt="portfolio image" class="img-fluid">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <?php if(isset($portfolio['image'])): ?>
                <div class="portfolio-single-image">
                    <img src="<?php echo e(asset('images/projects/' . $portfolio['image'])); ?>" alt="portfolio image" class="img-fluid">
                </div>
                <?php endif; ?>
                <?php endif; ?>

                <div class="portfolio-single-inner">
                    <h4><?php echo e($portfolio['title'] ?? 'Portfolio Item'); ?></h4>
                    <div class="author-meta">
                        <a href="#"><span class="far fa-calendar-alt"></span><?php echo e($portfolio['date'] ?? '2024'); ?></a>
                        <a href="#"><span class="far fa-bookmark"></span><?php echo e($portfolio['category'] ?? 'Category'); ?></a>
                    </div>
                    <p><?php echo $portfolio['description'] ?? ''; ?></p>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="widget-sidebar">
                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Project Details</h5>
                        <div class="sidebar-details-list">
                            <ul>
                                <li><h6>Project<span><?php echo e($portfolio['title'] ?? 'Project'); ?></span></h6></li>
                                <li><h6>Category<span><?php echo e($portfolio['category'] ?? 'Category'); ?></span></h6></li>
                                <?php if(isset($portfolio['client'])): ?>
                                <li><h6>Client<span><?php echo e($portfolio['client']); ?></span></h6></li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['duration'])): ?>
                                <li><h6>Duration<span><?php echo e($portfolio['duration']); ?></span></h6></li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['tech'])): ?>
                                <li><h6>Tech Stack<span><?php echo e($portfolio['tech']); ?></span></h6></li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['link'])): ?>
                                <li><h6>Website<span><a href="<?php echo e($portfolio['link']); ?>" target="_blank">Visit</a></span></h6></li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['repo'])): ?>
                                <li><h6>Repository<span><a href="<?php echo e($portfolio['repo']); ?>" target="_blank">GitHub</a></span></h6></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Recent Projects</h5>

                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="#"><img src="<?php echo e(asset('images/projects/couvreur.jpg')); ?>" class="img-fluid image-size-100"></a>
                            </div>
                            <div class="recent-post-body">
                                <a href="#"><h6 class="recent-post-title">Couvreur Roofing Website</h6></a>
                            </div>
                        </div>

                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="#"><img src="<?php echo e(asset('images/projects/kebab.jpg')); ?>" class="img-fluid image-size-100"></a>
                            </div>
                            <div class="recent-post-body">
                                <a href="#"><h6 class="recent-post-title">King Kebab System</h6></a>
                            </div>
                        </div>

                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="#"><img src="<?php echo e(asset('images/projects/water.jpg')); ?>" class="img-fluid image-size-100"></a>
                            </div>
                            <div class="recent-post-body">
                                <a href="#"><h6 class="recent-post-title">Salsabeel Water Delivery</h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Copy URL</h5>
                        <ul class="sidebar-share clearfix">
                            <li>
                                <div style="display:none;" id="hiddenURLDiv"></div>
                                <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function copyPageURL() {
        var url = window.location.href;
        var tempInput = document.createElement("input");
        tempInput.value = url;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        alert("URL copied to clipboard!");
    }

    jQuery(document).ready(function($) {
        if ($('#portfolioCarousel').length && $('#portfolioCarousel').children().length > 0) {
            $('#portfolioCarousel').owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: false,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\portfolio-detail.blade.php ENDPATH**/ ?>