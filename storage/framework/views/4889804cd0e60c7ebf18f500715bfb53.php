

<?php $__env->startSection('title', $portfolio['title'] ?? 'Portfolio Detail'); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-scroll-index="1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1><?php echo e($portfolio['title'] ?? 'Portfolio'); ?></h1>
                    <ul class="breadcrumb-links">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active"><?php echo e($portfolio['title'] ?? 'Portfolio'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Portfolio Single Section Start //-->
<section class="section" id="portfolio-single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if(isset($portfolio['images']) && count($portfolio['images']) > 0): ?>
                <div class="owl-carousel owl-theme" id="portfolioCarousel">
                    <?php $__currentLoopData = $portfolio['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset('images/' . $image)); ?>" alt="portfolio image" class="img-fluid">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <?php if(isset($portfolio['image'])): ?>
                <div class="portfolio-single-image">
                    <img src="<?php echo e(asset('images/' . $portfolio['image'])); ?>" alt="portfolio image" class="img-fluid">
                </div>
                <?php endif; ?>
                <?php endif; ?>

                <div class="portfolio-single-inner">
                    <h4><?php echo e($portfolio['title'] ?? 'Portfolio Item'); ?></h4>
                    <div class="author-meta">
                        <a href="#"><span class="far fa-calendar-alt"></span><?php echo e($portfolio['date'] ?? '18 March 2024'); ?></a>
                        <a href="#"><span class="far fa-bookmark"></span><?php echo e($portfolio['category'] ?? 'Category'); ?></a>
                    </div>
                    <p><?php echo $portfolio['description'] ?? ''; ?></p>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="widget-sidebar">
                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Portfolio Details</h5>
                        <div class="sidebar-details-list">
                            <ul>
                                <li>
                                    <h6>Project Name<span><?php echo e($portfolio['title'] ?? 'Project Name'); ?></span></h6>
                                </li>
                                <li>
                                    <h6>Project Category<span><?php echo e($portfolio['category'] ?? 'Category'); ?></span></h6>
                                </li>
                                <?php if(isset($portfolio['value'])): ?>
                                <li>
                                    <h6>Project Value<span><?php echo e($portfolio['value']); ?></span></h6>
                                </li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['customer'])): ?>
                                <li>
                                    <h6>Customer<span><?php echo e($portfolio['customer']); ?></span></h6>
                                </li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['created_date'])): ?>
                                <li>
                                    <h6>Created Date<span><?php echo e($portfolio['created_date']); ?></span></h6>
                                </li>
                                <?php endif; ?>
                                <?php if(isset($portfolio['end_date'])): ?>
                                <li>
                                    <h6>End Date<span><?php echo e($portfolio['end_date']); ?></span></h6>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Categories</h5>
                        <ul class="sidebar-category-list clearfix">
                            <li class="<?php echo e($portfolio['category'] == 'Creative' ? 'active' : ''); ?>"><a href="<?php echo e(route('portfolios.category', 'creative')); ?>">Creative <span class="category-count">(2)</span></a></li>
                            <li class="<?php echo e($portfolio['category'] == 'Mockup' ? 'active' : ''); ?>"><a href="<?php echo e(route('portfolios.category', 'mockup')); ?>">Mockup <span class="category-count">(3)</span></a></li>
                            <li class="<?php echo e($portfolio['category'] == 'UI/UX' ? 'active' : ''); ?>"><a href="<?php echo e(route('portfolios.category', 'ui-ux')); ?>">UI/UX <span class="category-count">(1)</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Recent Portfolio</h5>
                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="<?php echo e(route('portfolio.show', 'card-mockup')); ?>">
                                    <img src="<?php echo e(asset('images/1710766541-portfolio-grid-img-1.jpg')); ?>" class="img-fluid image-size-100" alt="portfolio image">
                                </a>
                            </div>
                            <div class="recent-post-body">
                                <a href="<?php echo e(route('portfolio.show', 'card-mockup')); ?>">
                                    <h6 class="recent-post-title">Card Mockup</h6>
                                </a>
                                <p class="recent-post-date"><i class="far fa-calendar-alt"></i>18 March 2024</p>
                            </div>
                        </div>
                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="<?php echo e(route('portfolio.show', 'mockup-box')); ?>">
                                    <img src="<?php echo e(asset('images/1710766555-portfolio-grid-img-2.jpg')); ?>" class="img-fluid image-size-100" alt="portfolio image">
                                </a>
                            </div>
                            <div class="recent-post-body">
                                <a href="<?php echo e(route('portfolio.show', 'mockup-box')); ?>">
                                    <h6 class="recent-post-title">Mockup Box</h6>
                                </a>
                                <p class="recent-post-date"><i class="far fa-calendar-alt"></i>18 March 2024</p>
                            </div>
                        </div>
                        <div class="recent-post-item clearfix">
                            <div class="recent-post-img mr-3">
                                <a href="<?php echo e(route('portfolio.show', 'coffee-mockup')); ?>">
                                    <img src="<?php echo e(asset('images/no-image.jpg')); ?>" class="img-fluid image-size-100" alt="portfolio image">
                                </a>
                            </div>
                            <div class="recent-post-body">
                                <a href="<?php echo e(route('portfolio.show', 'coffee-mockup')); ?>">
                                    <h6 class="recent-post-title">Coffee Mockup</h6>
                                </a>
                                <p class="recent-post-date"><i class="far fa-calendar-alt"></i>18 March 2024</p>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Copy Url and Share:</h5>
                        <ul class="sidebar-share clearfix">
                            <li>
                                <div style="display: none;" id="hiddenURLDiv"></div>
                                <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link fa-facebook-f"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Portfolio Single Section End //-->
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\AIA\Downloads\khaled\resources\views/pages/portfolio-detail.blade.php ENDPATH**/ ?>