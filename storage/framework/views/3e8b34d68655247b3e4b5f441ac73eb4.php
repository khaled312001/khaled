<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="<?php echo $__env->yieldContent('title', 'Homepage'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('description', ''); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', ''); ?>">
    <meta name="author" content="Khaled Ahmed">
    <meta property="fb:app_id" content="">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Homepage'); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('description', ''); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', ''); ?>">
    <meta itemprop="image" content="<?php echo $__env->yieldContent('og_image', ''); ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', ''); ?>">
    <meta property="twitter:title" content="<?php echo $__env->yieldContent('title', 'Homepage'); ?>">
    <meta property="twitter:description" content="<?php echo $__env->yieldContent('description', ''); ?>">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Title -->
    <title><?php echo $__env->yieldContent('title', 'Homepage'); ?></title>

    <!-- Favicon -->
    <link href="<?php echo e(asset('images/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo e(asset('images/favicon.png')); ?>" sizes="128x128" rel="shortcut icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!--// Boostrap v5 //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific.popup.min.css')); ?>">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <!--// Vegas Slider Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/vegas.slider.min.css')); ?>">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.default.min.css')); ?>">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">
    <!--// Flat Icons //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">

    <style>
        :root {
            --main-color: #e00606;
            --secondary-color: #929090;
            --scroll-button-color: #ff4400;
            --bottom-button-color: #ff0000;
            --bottom-button-hover-color: #4f4f4f;
            --side-button-color: #ff0000;
            --title-font: 'Poppins', sans-serif;
            --text-font: 'Roboto', sans-serif;
        }
    </style>

    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!--// Theme Color Css //-->

    <!--  helper style css file -->
    <link rel="stylesheet" href="<?php echo e(asset('css/helper-style.css')); ?>">

    <style>
        #counters {
            background-image: url(<?php echo e(asset('images/counter-bg.png')); ?>);
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body data-bs-spy="scroll" data-bs-target="#fixedNavbar">

<!--// Page Wrapper Start //-->
<div class="page-wrapper" id="wrapper">

    <!--// Main Area Start //-->
    <main class="main-area">

        <!--// Header Start //-->
        <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--// Header End  //-->

        <!--// Content Start //-->
        <?php echo $__env->yieldContent('content'); ?>
        <!--// Content End //-->

        <!--// Footer Start //-->
        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--// Footer End //-->

    </main>
    <!--// Main Area End //-->

    <a href="#" class="scroll-top-btn" data-scroll-goto="1">
        <i class="fa fa-arrow-up"></i>
    </a>
    <!--// .scroll-top-btn // -->

    <div id="preloader-wrap">
        <div class="preloader-inner">
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
    <!--// Preloader // -->

</div>
<!--// Page Wrapper End //-->

<div class="mobile-widget-container">
    <a href="tel:+201204593124" class="btn btn-icon">
        <i class="fas fa-phone-alt"></i> Call
    </a>
    <a href="https://wa.me/201204593124" class="btn btn-icon">
        <i class="fab fa-whatsapp"></i> Whatsapp
    </a>
</div>

<a href="tel:+201204593124" class="btn-whatsapp-pulse custom-color-black">
    <i class="fas fa-phone"></i>
</a>

<a href="https://wa.me/201204593124" class="btn-whatsapp-pulse btn-whatsapp-pulse-border" style="">
    <i class="fab fa-whatsapp"></i>
</a>

<a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" class="btn-whatsapp-pulse btn-whatsapp-pulse-border-2 custom-color-blue" style="">
    <i class="fab fa-linkedin"></i>
</a>

<!--// JQuery //-->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<!--// Bootstrap //-->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!--// Images Loaded Js //-->
<script src="<?php echo e(asset('js/images.loaded.min.js')); ?>"></script>
<!--// Wow Js //-->
<script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
<!--// Magnific Popup //-->
<script src="<?php echo e(asset('js/magnific.popup.min.js')); ?>"></script>
<!--// Waypoint Js //-->
<script src="<?php echo e(asset('js/waypoint.min.js')); ?>"></script>
<!--// Counter Up Js //-->
<script src="<?php echo e(asset('js/counter.up.min.js')); ?>"></script>
<!--// JQuery Easing Functions //-->
<script src="<?php echo e(asset('js/jquery.easing.min.js')); ?>"></script>
<!--// Owl Carousel //-->
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<!--// Form Validate //-->
<script src="<?php echo e(asset('js/validate.min.js')); ?>"></script>
<!--// Form Validate //-->
<script src="<?php echo e(asset('js/custom.select.plugin.js')); ?>"></script>
<!--// Scroll It //-->
<script src="<?php echo e(asset('js/scrollit.min.js')); ?>"></script>
<!--// Isotope Js //-->
<script src="<?php echo e(asset('js/isotope.min.js')); ?>"></script>
<!--// Zepto //-->
<script src="<?php echo e(asset('js/zepto.min.js')); ?>"></script>
<!--// Vegas Slider //-->
<script src="<?php echo e(asset('js/vegas.slider.min.js')); ?>"></script>
<!--// MB Youtube Player //-->
<script src="<?php echo e(asset('js/jquery.mb-ytb.min.js')); ?>"></script>
<!--// Main Js //-->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>

<?php /**PATH C:\Users\AIA\Downloads\khaled\resources\views/layouts/app.blade.php ENDPATH**/ ?>