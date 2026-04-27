

<?php $__env->startSection('title', 'Plans'); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>Plans</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="active">
                            Plans
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Plans Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Plans</h2>
            </div>
        </div>
    </div>
</section>
<!--// Plans Section End //-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\plans.blade.php ENDPATH**/ ?>