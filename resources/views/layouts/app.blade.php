<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@yield('title', 'Homepage')">
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', '')">
    <meta name="author" content="Khaled Ahmed">
    <meta property="fb:app_id" content="">
    <meta property="og:title" content="@yield('title', 'Homepage')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="@yield('description', '')">
    <meta property="og:image" content="@yield('og_image', '')">
    <meta itemprop="image" content="@yield('og_image', '')">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@yield('og_image', '')">
    <meta property="twitter:title" content="@yield('title', 'Homepage')">
    <meta property="twitter:description" content="@yield('description', '')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title', 'Homepage')</title>

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('images/favicon.png') }}" sizes="128x128" rel="shortcut icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!--// Boostrap v5 //-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('css/magnific.popup.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!--// Vegas Slider Css //-->
    <link rel="stylesheet" href="{{ asset('css/vegas.slider.min.css') }}">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.default.min.css') }}">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!--// Flat Icons //-->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--// Theme Color Css //-->

    <!--  helper style css file -->
    <link rel="stylesheet" href="{{ asset('css/helper-style.css') }}">

    <style>
        #counters {
            background-image: url({{ asset('images/counter-bg.png') }});
        }
    </style>

    @stack('styles')
</head>
<body data-bs-spy="scroll" data-bs-target="#fixedNavbar">

<!--// Page Wrapper Start //-->
<div class="page-wrapper" id="wrapper">

    <!--// Main Area Start //-->
    <main class="main-area">

        <!--// Header Start //-->
        @include('partials.header')
        <!--// Header End  //-->

        <!--// Content Start //-->
        @yield('content')
        <!--// Content End //-->

        <!--// Footer Start //-->
        @include('partials.footer')
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
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!--// Bootstrap //-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--// Images Loaded Js //-->
<script src="{{ asset('js/images.loaded.min.js') }}"></script>
<!--// Wow Js //-->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!--// Magnific Popup //-->
<script src="{{ asset('js/magnific.popup.min.js') }}"></script>
<!--// Waypoint Js //-->
<script src="{{ asset('js/waypoint.min.js') }}"></script>
<!--// Counter Up Js //-->
<script src="{{ asset('js/counter.up.min.js') }}"></script>
<!--// JQuery Easing Functions //-->
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<!--// Owl Carousel //-->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('js/validate.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('js/custom.select.plugin.js') }}"></script>
<!--// Scroll It //-->
<script src="{{ asset('js/scrollit.min.js') }}"></script>
<!--// Isotope Js //-->
<script src="{{ asset('js/isotope.min.js') }}"></script>
<!--// Zepto //-->
<script src="{{ asset('js/zepto.min.js') }}"></script>
<!--// Vegas Slider //-->
<script src="{{ asset('js/vegas.slider.min.js') }}"></script>
<!--// MB Youtube Player //-->
<script src="{{ asset('js/jquery.mb-ytb.min.js') }}"></script>
<!--// Main Js //-->
<script src="{{ asset('js/main.js') }}"></script>

@stack('scripts')

</body>
</html>

