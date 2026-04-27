

<?php $__env->startSection('title', 'Teams'); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1><?php echo e(__('site.page_teams_h1')); ?></h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a>
                        </li>
                        <li class="active">
                            <?php echo e(__('site.page_teams_h1')); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Team Section Start //-->
<section class="section" id="team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span>Team</span>
                    <h2>Our Team</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="team-item">
                    <img src="<?php echo e(asset('images/1710767681-team-img-1.jpg')); ?>" alt="Team" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Team Section End //-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\teams.blade.php ENDPATH**/ ?>