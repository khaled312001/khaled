

<?php $__env->startSection('title', 'Careers'); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1><?php echo e(__('site.page_careers_h1')); ?></h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a>
                        </li>
                        <li class="active">
                            <?php echo e(__('site.page_careers_h1')); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Careers Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Join Our Team</h2>
            </div>
        </div>
    </div>
</section>
<!--// Careers Section End //-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\careers.blade.php ENDPATH**/ ?>