

<?php $__env->startSection('title', '404 - Page Not Found'); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-bg-image-path="img/bg/breadcrumb-img.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>404 Page</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="active">
                            404 Page
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// .row //-->
    </div>
    <!--// .container //-->
</section>
<!--// Breadcrumb Section end //-->

<!--// Error Page Start //-->
<section class="error-page section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 col-sm-12">
                <h4 class="error-text">404</h4>
                <div class="page-404-body">
                    <h4 class="error-title">That page doesn't exist!</h4>
                    <p class="error-subline">Sorry, the page you were looking for could not be found.</p>
                    <a href="<?php echo e(route('home')); ?>" class="primary-icon-btn">Back To Home <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Error Page End //-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\errors\404.blade.php ENDPATH**/ ?>