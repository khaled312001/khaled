<!DOCTYPE html>
<html dir="ltr" lang="en" itemscope itemtype="https://schema.org/WebSite">
<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
    <meta name="googlebot" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="Khaled Ahmed">
    <meta name="copyright" content="Khaled Ahmed">
    
    <!-- Primary Meta Tags -->
    <title>@yield('title', 'Khaled Ahmed - Full-Stack Developer & Certified Instructor')</title>
    <meta name="title" content="@yield('title', 'Khaled Ahmed - Full-Stack Developer & Certified Instructor')">
    <meta name="description" content="@yield('description', 'Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training. Based in Qena, Egypt.')">
    <meta name="keywords" content="@yield('keywords', 'Full Stack Developer, Web Development, Laravel, React.js, Vue.js, Programming Instructor, Web Applications, PHP Developer, JavaScript Developer, Egypt Developer, Qena')">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'Khaled Ahmed - Full-Stack Developer & Certified Instructor')">
    <meta property="og:description" content="@yield('og_description', 'Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="@yield('og_image_alt', 'Khaled Ahmed - Full-Stack Developer')">
    <meta property="og:site_name" content="Khaled Ahmed - Full-Stack Developer">
    <meta property="og:locale" content="en_US">
    <meta property="fb:app_id" content="">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('twitter_title', 'Khaled Ahmed - Full-Stack Developer & Certified Instructor')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo.png'))">
    <meta name="twitter:image:alt" content="@yield('twitter_image_alt', 'Khaled Ahmed - Full-Stack Developer')">
    <meta name="twitter:creator" content="@khaledahmed">
    <meta name="twitter:site" content="@khaledahmed">
    
    <!-- Additional Meta Tags -->
    <meta itemprop="name" content="@yield('title', 'Khaled Ahmed - Full-Stack Developer & Certified Instructor')">
    <meta itemprop="description" content="@yield('description', 'Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training.')">
    <meta itemprop="image" content="@yield('og_image', asset('images/logo.png'))">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            --main-color: #2563eb;
            --secondary-color: #6b7280;
            --scroll-button-color: #2563eb;
            --bottom-button-color: #1e40af;
            --bottom-button-hover-color: #1e3a5f;
            --side-button-color: #2563eb;
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

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Khaled Ahmed",
        "jobTitle": "Full-Stack Developer & Certified Instructor",
        "url": "https://khaledahmed.net",
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ],
        "email": "khaledahmedhaggagy@gmail.com",
        "telephone": "+20-1204593124",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Cairo",
            "addressCountry": "Egypt"
        },
        "image": "{{ asset('images/logo.png') }}",
        "description": "Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training.",
        "knowsAbout": [
            "Web Development",
            "Laravel",
            "React.js",
            "Vue.js",
            "PHP",
            "JavaScript",
            "MySQL",
            "Full-Stack Development",
            "Programming Instruction"
        ],
        "alumniOf": {
            "@type": "EducationalOrganization",
            "name": "Luxor University"
        }
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Khaled Ahmed - Full-Stack Developer",
        "url": "https://khaledahmed.net",
        "description": "Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training.",
        "publisher": {
            "@type": "Person",
            "name": "Khaled Ahmed"
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://khaledahmed.net/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    
    @yield('structured_data')

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

