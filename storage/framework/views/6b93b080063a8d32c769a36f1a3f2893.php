<!DOCTYPE html>
<?php $locale = app()->getLocale(); $isRtl = $locale === 'ar'; ?>
<html dir="<?php echo e($isRtl ? 'rtl' : 'ltr'); ?>" lang="<?php echo e($locale); ?>" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#1e40af">
    <meta name="robots" content="<?php echo $__env->yieldContent('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'); ?>">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="3 days">
    <meta name="author" content="Khaled Ahmed">
    <meta name="copyright" content="Khaled Ahmed">
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="geo.region" content="EG">
    <meta name="geo.placename" content="Cairo, Egypt">
    <meta name="geo.position" content="30.0444;31.2357">
    <meta name="ICBM" content="30.0444, 31.2357">

    <title><?php echo $__env->yieldContent('title', 'Khaled Ahmed — Senior Full Stack Web Developer | Laravel, React, Node.js'); ?></title>
    <meta name="title" content="<?php echo $__env->yieldContent('title', 'Khaled Ahmed — Senior Full Stack Web Developer | Laravel, React, Node.js'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Senior full stack web developer with 5+ years experience and 25+ shipped projects across 7 countries. Hire an expert Laravel, React, and Node.js developer for your next web app, e-commerce site, or SaaS platform.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'web developer, full stack developer, hire web developer, Laravel developer, React developer, Node.js developer, web development services, freelance web developer Egypt, Khaled Ahmed, custom web application, e-commerce developer, SaaS developer'); ?>">

    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">
    <link rel="alternate" hreflang="en" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">
    <link rel="alternate" hreflang="ar" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">

    <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'Khaled Ahmed — Senior Full Stack Web Developer'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', 'Hire a senior full stack web developer with 5+ years and 25+ shipped projects. Laravel, React, Node.js, and modern web technologies.'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/logo.png')); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo $__env->yieldContent('og_image_alt', 'Khaled Ahmed - Full-Stack Developer'); ?>">
    <meta property="og:site_name" content="Khaled Ahmed">
    <meta property="og:locale" content="en_US">
    <meta property="og:locale:alternate" content="ar_EG">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter_title', 'Khaled Ahmed — Senior Full Stack Web Developer'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('twitter_description', 'Hire a senior full stack web developer. Laravel, React, Node.js, and modern web technologies. 5+ years, 25+ projects, 7 countries.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('twitter_image', asset('images/logo.png')); ?>">
    <meta name="twitter:image:alt" content="<?php echo $__env->yieldContent('twitter_image_alt', 'Khaled Ahmed - Full-Stack Developer'); ?>">
    <meta name="twitter:creator" content="@khaledahmed">
    <meta name="twitter:site" content="@khaledahmed">

    <meta itemprop="name" content="<?php echo $__env->yieldContent('title', 'Khaled Ahmed — Senior Full Stack Web Developer'); ?>">
    <meta itemprop="description" content="<?php echo $__env->yieldContent('description', 'Senior full stack web developer with 5+ years experience.'); ?>">
    <meta itemprop="image" content="<?php echo $__env->yieldContent('og_image', asset('images/logo.png')); ?>">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('images/favicon-192.png')); ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo e(asset('images/favicon-512.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('images/apple-touch-icon.png')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@400;500;600;700;800&family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific.popup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vegas.slider.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">

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
        html { scroll-behavior: smooth; }
        body { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        img { max-width: 100%; height: auto; }
        @media (max-width: 768px) {
            .container { padding-left: 18px; padding-right: 18px; }
            .section { padding: 50px 0; }
            h1 { font-size: 28px !important; line-height: 1.25 !important; }
            h2 { font-size: 22px !important; line-height: 1.3 !important; }
            h3 { font-size: 18px !important; }
            .hero-banner h1 { font-size: 30px !important; }
            .hero-banner h2 { font-size: 16px !important; line-height: 1.6 !important; }
            .breadcrumb-section { padding: 90px 0 30px !important; }
            .mobile-widget-container { display: flex !important; }
            .btn-whatsapp-pulse { right: 18px !important; bottom: 80px !important; width: 52px !important; height: 52px !important; }
            .btn-whatsapp-pulse-border { bottom: 140px !important; }
            .btn-whatsapp-pulse-border-2 { bottom: 200px !important; }
        }
        /* Mobile bottom bar */
        .mobile-widget-container { position: fixed; bottom: 0; left: 0; right: 0; z-index: 999; background: #fff; padding: 8px; box-shadow: 0 -2px 10px rgba(0,0,0,0.08); display: none; gap: 8px; }
        .mobile-widget-container .btn-icon { flex: 1; padding: 12px; border-radius: 8px; font-weight: 600; text-align: center; text-decoration: none; font-size: 14px; }
        .mobile-widget-container .btn-icon:first-child { background: #2563eb; color: #fff; }
        .mobile-widget-container .btn-icon:last-child { background: #25d366; color: #fff; }
        @media (max-width: 768px) {
            body { padding-bottom: 70px; }
            .mobile-widget-container { display: flex; }
        }

        /* Single clean floating WhatsApp (desktop) — replaces the cluttered side stack */
        .floating-whatsapp {
            position: fixed; bottom: 28px; right: 28px; z-index: 998;
            width: 58px; height: 58px; border-radius: 50%;
            background: #25d366; color: #fff !important;
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; text-decoration: none;
            box-shadow: 0 6px 20px rgba(37,211,102,0.45);
            transition: transform .2s, box-shadow .2s;
        }
        .floating-whatsapp:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 24px rgba(37,211,102,0.6);
            color: #fff !important;
        }
        .floating-whatsapp::before {
            content: ''; position: absolute; inset: -4px;
            border-radius: 50%; border: 2px solid #25d366;
            opacity: 0.5; animation: wa-pulse 2s ease-out infinite;
        }
        @keyframes wa-pulse {
            0% { transform: scale(1); opacity: 0.5; }
            100% { transform: scale(1.4); opacity: 0; }
        }

        /* Hide noisy hero side widgets (vertical email + social column) */
        .hero-banner .hero-social-list,
        .hero-banner .hero-email-link { display: none !important; }

        /* Cleaner scroll-to-top button */
        .scroll-top-btn {
            width: 44px !important; height: 44px !important;
            border-radius: 10px !important;
            background: var(--main-color) !important; color: #fff !important;
            box-shadow: 0 4px 12px rgba(37,99,235,0.3) !important;
            border: none !important;
        }

        /* ====================================================================
           MODERN DESIGN SYSTEM — applied site-wide
           ==================================================================== */

        /* Gradient text utility */
        .gradient-text {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 50%, #ec4899 100%);
            -webkit-background-clip: text; background-clip: text;
            -webkit-text-fill-color: transparent; color: transparent;
        }

        /* Section heading polish */
        .section-heading-left h2,
        .section-heading h2,
        .about-inner h2 {
            font-weight: 700;
            letter-spacing: -0.02em;
        }
        .section-heading-left span,
        .section-heading span,
        .about-inner h6 {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--main-color);
            margin-bottom: 12px;
            position: relative;
            padding-left: 36px;
        }
        .section-heading-left span::before,
        .section-heading span::before,
        .about-inner h6::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            width: 28px; height: 2px;
            background: linear-gradient(90deg, transparent, var(--main-color));
        }

        /* Buttons — modern, refined */
        .primary-btn,
        .white-btn {
            position: relative;
            overflow: hidden;
            border-radius: 10px !important;
            font-weight: 600;
            letter-spacing: 0.2px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .primary-btn::after,
        .white-btn::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.25) 50%, transparent 100%);
            transform: translateX(-120%);
            transition: transform 0.6s ease;
        }
        .primary-btn:hover,
        .white-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(37,99,235,0.28);
        }
        .primary-btn:hover::after,
        .white-btn:hover::after {
            transform: translateX(120%);
        }

        /* Cards — subtle modern lift */
        .service-card,
        .blog-item,
        .blog-card,
        .testimonial-card,
        .related-card,
        .why-card,
        .portfolio-item,
        .team-member,
        .pricing-table {
            transition: transform 0.35s cubic-bezier(.2,.8,.2,1), box-shadow 0.35s ease, border-color 0.25s ease;
            will-change: transform;
        }
        .service-card:hover,
        .blog-item:hover,
        .blog-card:hover,
        .testimonial-card:hover,
        .related-card:hover,
        .portfolio-item:hover,
        .team-member:hover,
        .pricing-table:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.10);
        }

        /* Image zoom on hover for cards */
        .blog-img img,
        .blog-card .blog-img img,
        .related-card img,
        .portfolio-img img {
            transition: transform 0.6s cubic-bezier(.2,.8,.2,1);
        }
        .blog-item:hover .blog-img img,
        .blog-card:hover .blog-img img,
        .related-card:hover img,
        .portfolio-item:hover .portfolio-img img {
            transform: scale(1.06);
        }

        /* Header — glass effect on scroll */
        .header.fixed-top {
            transition: background 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease;
        }
        .header.fixed-top.scrolled,
        .header.fixed-top.sticky {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: saturate(180%) blur(14px);
            -webkit-backdrop-filter: saturate(180%) blur(14px);
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.06);
        }

        /* Nav link underline animation */
        .nav-link.menu-link {
            position: relative;
            transition: color 0.2s ease;
        }
        .nav-link.menu-link::after {
            content: '';
            position: absolute;
            left: 12px; right: 12px; bottom: 6px;
            height: 2px;
            background: var(--main-color);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        .nav-link.menu-link:hover::after,
        .nav-link.menu-link.active::after {
            transform: scaleX(1);
        }

        /* Reveal-on-scroll animation (replaces wow.js look) */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s ease, transform 0.7s cubic-bezier(.2,.8,.2,1);
        }
        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal.delay-1 { transition-delay: 0.1s; }
        .reveal.delay-2 { transition-delay: 0.2s; }
        .reveal.delay-3 { transition-delay: 0.3s; }
        .reveal.delay-4 { transition-delay: 0.4s; }

        /* Subtle floating animation for hero stats */
        @keyframes floatSubtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .hero-stats .stat:nth-child(1) { animation: floatSubtle 4.5s ease-in-out infinite; }
        .hero-stats .stat:nth-child(2) { animation: floatSubtle 4.5s ease-in-out 0.4s infinite; }
        .hero-stats .stat:nth-child(3) { animation: floatSubtle 4.5s ease-in-out 0.8s infinite; }
        .hero-stats .stat:nth-child(4) { animation: floatSubtle 4.5s ease-in-out 1.2s infinite; }

        /* Animated gradient background for hero — clean, no overlay */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .hero-banner {
            position: relative;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 25%, #1e40af 50%, #312e81 75%, #0f172a 100%) !important;
            background-size: 200% 200% !important;
            animation: gradientShift 18s ease infinite;
            overflow: hidden;
        }

        /* Kill the legacy ::before/::after overlays from theme/style.css
           that put a black 0.3 alpha layer (and a moving dot grid) on top.
           Important: also disable the keyframe animation that dims them. */
        .hero-banner::before,
        .hero-banner::after {
            content: '';
            position: absolute;
            top: auto; left: auto; right: auto; bottom: auto;
            width: auto; height: auto;
            background: none !important;
            background-image: none !important;
            opacity: 1 !important;
            animation: none !important;
            mix-blend-mode: normal !important;
            transform: none !important;
            pointer-events: none;
        }
        /* Decorative orbs (don't dim the hero) */
        .hero-banner::before {
            top: -120px; right: -120px;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(96,165,250,0.20), transparent 70%) !important;
            z-index: 0;
        }
        .hero-banner::after {
            bottom: -160px; left: -100px;
            width: 460px; height: 460px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(124,58,237,0.20), transparent 70%) !important;
            z-index: 0;
        }
        .hero-banner > .container { position: relative; z-index: 2; }
        .hero-banner h1 { color: #fff !important; }
        .hero-banner h2 { color: #cbd5e1 !important; }

        /* Glow ring around hero stats numbers */
        .hero-stats .stat .num {
            position: relative;
            display: inline-block;
        }
        .hero-stats .stat .num::after {
            content: '';
            position: absolute;
            inset: -8px -10px;
            background: radial-gradient(circle, rgba(96,165,250,0.20), transparent 70%);
            z-index: -1;
        }

        /* Service-card icon: animated gradient */
        .service-card .icon {
            background: linear-gradient(135deg, #2563eb, #7c3aed) !important;
            position: relative;
            transition: transform 0.4s cubic-bezier(.2,.8,.2,1);
        }
        .service-card:hover .icon {
            transform: rotate(-6deg) scale(1.08);
        }
        .service-card .icon::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,0.35));
            opacity: 0;
            transition: opacity 0.3s;
        }
        .service-card:hover .icon::after { opacity: 1; }

        /* Timeline / numbered cards (why-card) */
        .why-card .num {
            position: relative;
            background: linear-gradient(135deg, #2563eb, #7c3aed) !important;
            box-shadow: 0 8px 20px rgba(37,99,235,0.30);
            transition: transform 0.3s ease;
        }
        .why-card:hover .num { transform: scale(1.08) rotate(-4deg); }

        /* Stack pills with hover */
        .stack-pill {
            transition: all 0.25s ease;
            cursor: default;
        }
        .stack-pill:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(37,99,235,0.18);
            background: var(--main-color) !important;
            color: #fff !important;
        }

        /* Blog filter pills polish */
        .blog-filter-bar a {
            transition: all 0.25s ease;
        }
        .blog-filter-bar a:hover { transform: translateY(-2px); }

        /* Testimonials: glass card */
        .testimonial-card {
            backdrop-filter: blur(0);
            border: 1px solid rgba(15, 23, 42, 0.04);
        }
        .testimonial-card .stars {
            font-size: 16px;
            letter-spacing: 1px;
        }

        /* CTA blocks: more dimension */
        .blog-cta,
        .article-cta,
        .faq-cta,
        .final-cta {
            position: relative;
            overflow: hidden;
        }
        .blog-cta::before,
        .article-cta::before,
        .faq-cta::before,
        .final-cta::before {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 480px; height: 480px;
            background: radial-gradient(circle, rgba(255,255,255,0.10), transparent 60%);
            pointer-events: none;
        }

        /* Footer polish */
        .footer { background: linear-gradient(180deg, #0f172a 0%, #020617 100%) !important; }
        .footer-title {
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 18px !important;
        }
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 36px; height: 2px;
            background: linear-gradient(90deg, var(--main-color), transparent);
        }
        .footer-links li a {
            transition: color 0.2s ease, padding-left 0.2s ease;
        }
        .footer-links li a:hover {
            color: #60a5fa !important;
            padding-left: 6px;
        }
        .footer-social-links a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 38px; height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            color: #cbd5e1;
            margin-right: 8px;
            transition: all 0.25s ease;
        }
        .footer-social-links a:hover {
            background: var(--main-color);
            color: #fff;
            transform: translateY(-3px);
        }

        /* Breadcrumb section polish */
        .breadcrumb-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%) !important;
            position: relative; overflow: hidden;
        }
        .breadcrumb-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.6;
        }
        .breadcrumb-section h1,
        .breadcrumb-section .breadcrumb-links a,
        .breadcrumb-section .breadcrumb-links li {
            color: #fff !important;
        }
        .breadcrumb-section .breadcrumb-links {
            display: inline-flex;
            list-style: none; padding: 0;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
            border-radius: 999px;
            padding: 8px 18px;
            gap: 14px;
        }

        /* Site logo sizing — clean, sharp, retina-ready
           Note: legacy style.css hides .navbar-brand img by default — we override here. */
        .header .navbar-brand.site-logo img,
        .navbar-brand.site-logo img {
            display: block !important;
            visibility: visible !important;
            height: 46px !important;
            width: auto !important;
            max-height: 46px;
            object-fit: contain;
            opacity: 1 !important;
            transition: opacity 0.2s ease;
        }
        .navbar-brand.site-logo:hover img {
            opacity: 0.85 !important;
        }
        @media (max-width: 768px) {
            .header .navbar-brand.site-logo img,
            .navbar-brand.site-logo img { height: 38px !important; max-height: 38px; }
        }

        /* Footer logo (uses logo-light.png on dark background) */
        .footer-logo {
            max-height: 56px !important;
            width: auto;
            filter: brightness(0) invert(1);
            opacity: 0.95;
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* ====================================================================
           RTL / Arabic support
           ==================================================================== */
        html[dir="rtl"] body {
            font-family: 'Cairo', 'Roboto', sans-serif;
        }
        html[dir="rtl"] h1, html[dir="rtl"] h2, html[dir="rtl"] h3,
        html[dir="rtl"] h4, html[dir="rtl"] h5, html[dir="rtl"] h6 {
            font-family: 'Cairo', 'Poppins', sans-serif;
            letter-spacing: 0;
        }
        html[dir="rtl"] .floating-whatsapp {
            right: auto;
            left: 28px;
        }
        html[dir="rtl"] .scroll-top-btn {
            right: auto !important;
            left: 28px !important;
        }
        html[dir="rtl"] .section-heading-left span,
        html[dir="rtl"] .section-heading span,
        html[dir="rtl"] .about-inner h6 {
            padding-left: 0;
            padding-right: 36px;
        }
        html[dir="rtl"] .section-heading-left span::before,
        html[dir="rtl"] .section-heading span::before,
        html[dir="rtl"] .about-inner h6::before {
            left: auto; right: 0;
            background: linear-gradient(270deg, transparent, var(--main-color));
        }
        html[dir="rtl"] .footer-title::after {
            left: auto;
            right: 0;
            background: linear-gradient(270deg, var(--main-color), transparent);
        }
        html[dir="rtl"] .footer-links li a:hover {
            padding-left: 0;
            padding-right: 6px;
        }
        html[dir="rtl"] .blog-card .read-more i,
        html[dir="rtl"] .article-content .lead { transform: scaleX(-1); }
        html[dir="rtl"] .fa-arrow-right::before { content: "\f060"; /* FA arrow-left */ }
        html[dir="rtl"] .me-3, html[dir="rtl"] .me-2 { margin-right: 0 !important; margin-left: 0.75rem !important; }
        html[dir="rtl"] .ms-2 { margin-left: 0 !important; margin-right: 0.5rem !important; }

        /* Language switcher button */
        .lang-switch {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 6px 14px;
            border-radius: 999px;
            background: rgba(37,99,235,0.08);
            color: var(--main-color);
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid rgba(37,99,235,0.15);
        }
        .lang-switch:hover {
            background: var(--main-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(37,99,235,0.25);
        }
        .lang-switch i { font-size: 12px; }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/helper-style.css')); ?>">

    
    <style>
        #counters {
            background-image: url(<?php echo e(asset('images/counter-bg.png')); ?>);
        }

        /* Kill legacy hero overlay (rgba(0,0,0,0.3) and animated dot grid) */
        .hero-banner {
            position: relative !important;
            overflow: hidden !important;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 25%, #1e40af 50%, #312e81 75%, #0f172a 100%) !important;
            background-size: 200% 200% !important;
            animation: gradientShift 18s ease infinite !important;
        }
        .hero-banner::before,
        .hero-banner::after {
            content: '' !important;
            position: absolute !important;
            top: auto !important; left: auto !important; right: auto !important; bottom: auto !important;
            width: auto !important; height: auto !important;
            background: none !important;
            background-image: none !important;
            background-color: transparent !important;
            opacity: 1 !important;
            animation: none !important;
            mix-blend-mode: normal !important;
            transform: none !important;
            pointer-events: none !important;
            filter: none !important;
        }
        /* Decorative orbs (no dimming) */
        .hero-banner::before {
            top: -120px !important;
            right: -120px !important;
            width: 380px !important;
            height: 380px !important;
            border-radius: 50% !important;
            background: radial-gradient(circle, rgba(96,165,250,0.22), transparent 70%) !important;
            z-index: 0 !important;
        }
        .hero-banner::after {
            bottom: -160px !important;
            left: -100px !important;
            width: 460px !important;
            height: 460px !important;
            border-radius: 50% !important;
            background: radial-gradient(circle, rgba(124,58,237,0.22), transparent 70%) !important;
            z-index: 0 !important;
        }
        .hero-banner > .container { position: relative; z-index: 2; }
        .hero-banner h1 { color: #fff !important; }
        .hero-banner h2 { color: #cbd5e1 !important; }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ====================================================================
           LOGO VISIBILITY — must override style.css which hides .navbar-brand img
           ==================================================================== */
        .header .navbar-brand img,
        .navbar-brand.site-logo img,
        .header .navbar-brand.site-logo img {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            height: 46px !important;
            width: auto !important;
            max-height: 46px !important;
            object-fit: contain !important;
            transition: opacity 0.2s ease !important;
        }
        @media (max-width: 768px) {
            .header .navbar-brand img,
            .navbar-brand.site-logo img,
            .header .navbar-brand.site-logo img {
                height: 38px !important;
                max-height: 38px !important;
            }
        }
        /* Footer logo (white via CSS filter on a dark background) */
        .footer .footer-logo {
            display: block !important;
            visibility: visible !important;
            opacity: 0.95 !important;
            max-height: 56px !important;
            width: auto !important;
            filter: brightness(0) invert(1);
        }

        /* ====================================================================
           BUTTONS — kill legacy circular icon + white border (style.css line 1900s)
           Must be after style.css to win.
           ==================================================================== */
        .primary-btn,
        .white-btn,
        .btn-primary-cta {
            display: inline-flex !important;
            align-items: center !important;
            gap: 10px !important;
            padding: 12px 26px !important;
            border-radius: 10px !important;
            line-height: 1.2 !important;
            min-height: 0 !important;
            height: auto !important;
            font-size: 14.5px !important;
            font-weight: 600 !important;
            border: none !important;
            text-decoration: none !important;
            white-space: nowrap;
        }
        .primary-btn,
        .btn-primary-cta {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%) !important;
            color: #fff !important;
            box-shadow: 0 6px 16px rgba(37,99,235,0.28);
        }
        .primary-btn:hover,
        .btn-primary-cta:hover {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a5f 100%) !important;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(37,99,235,0.40);
        }
        .white-btn {
            background: #fff !important;
            color: #1e40af !important;
            box-shadow: 0 6px 16px rgba(0,0,0,0.18);
        }
        .white-btn:hover {
            background: #f8fafc !important;
            color: #1e3a5f !important;
            transform: translateY(-2px);
        }

        /* KILL the legacy white-circle icon container */
        .primary-btn .icon,
        .white-btn .icon,
        .btn-primary-cta .icon {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: auto !important;
            height: auto !important;
            background: transparent !important;
            border: none !important;
            border-radius: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            transition: transform 0.25s ease;
        }
        .primary-btn .icon i,
        .white-btn .icon i,
        .btn-primary-cta .icon i {
            width: auto !important;
            height: auto !important;
            line-height: 1 !important;
            background: transparent !important;
            border: none !important;
            border-radius: 0 !important;
            padding: 0 !important;
            font-size: 12px !important;
            color: inherit !important;
            transform: none !important;
        }
        .primary-btn:hover .icon,
        .btn-primary-cta:hover .icon { transform: translateX(4px); }
        html[dir="rtl"] .primary-btn .icon i,
        html[dir="rtl"] .white-btn .icon i,
        html[dir="rtl"] .btn-primary-cta .icon i {
            transform: scaleX(-1) !important;
        }
        html[dir="rtl"] .primary-btn:hover .icon,
        html[dir="rtl"] .btn-primary-cta:hover .icon {
            transform: translateX(-4px);
        }
        .primary-btn .text,
        .white-btn .text,
        .btn-primary-cta .text {
            padding: 0 !important;
            text-transform: none !important;
            font-weight: 600 !important;
        }

        /* The mobile bottom bar — translate Call/WhatsApp labels via aria/text;
           also clean up its spacing */
        .mobile-widget-container .btn-icon {
            font-size: 14px !important;
            padding: 11px 8px !important;
            line-height: 1.2 !important;
        }

        /* The repeated scroll-top buttons in the screenshot are the JS adding
           .active class on every section. Force only one visible at a time. */
        .scroll-top-btn {
            position: fixed !important;
            bottom: 28px !important;
            right: 28px !important;
            width: 44px !important;
            height: 44px !important;
            margin: 0 !important;
        }
        .scroll-top-btn:not(.active) {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }
        html[dir="rtl"] .scroll-top-btn {
            right: auto !important;
            left: 28px !important;
        }

        /* ====================================================================
           SECTION POLISH — modern badges, icons, brand-color treatments
           ==================================================================== */

        /* Section badge above each H2 (replaces small all-caps spans) */
        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 16px;
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(124,58,237,0.10));
            border: 1px solid rgba(37,99,235,0.18);
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 16px;
        }
        .section-badge i { font-size: 12px; color: #7c3aed; }

        /* Heading after badge */
        .section-title-h2 {
            font-size: 36px !important;
            font-weight: 800 !important;
            color: #0f172a;
            letter-spacing: -0.025em;
            margin-bottom: 14px;
            line-height: 1.2;
        }
        .section-title-h2 .accent {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .section-subtitle {
            color: #64748b;
            max-width: 640px;
            margin: 0 auto 50px;
            font-size: 16px;
            line-height: 1.7;
        }
        @media (max-width: 768px) {
            .section-title-h2 { font-size: 26px !important; }
            .section-subtitle { font-size: 15px; margin-bottom: 30px; }
        }

        /* Brand-color icon variants for service-card icons (cycle through) */
        .service-card:nth-child(7n+1) .icon { background: linear-gradient(135deg, #2563eb, #1e40af) !important; }
        .service-card:nth-child(7n+2) .icon { background: linear-gradient(135deg, #7c3aed, #5b21b6) !important; }
        .service-card:nth-child(7n+3) .icon { background: linear-gradient(135deg, #06b6d4, #0891b2) !important; }
        .service-card:nth-child(7n+4) .icon { background: linear-gradient(135deg, #f97316, #ea580c) !important; }
        .service-card:nth-child(7n+5) .icon { background: linear-gradient(135deg, #10b981, #059669) !important; }
        .service-card:nth-child(7n+6) .icon { background: linear-gradient(135deg, #ec4899, #db2777) !important; }
        .service-card:nth-child(7n+7) .icon { background: linear-gradient(135deg, #fbbf24, #f59e0b) !important; }

        /* Why-card numbers — color cycle */
        .why-card:nth-child(6n+1) .num { background: linear-gradient(135deg, #2563eb, #1e40af) !important; box-shadow: 0 8px 20px rgba(37,99,235,0.30); }
        .why-card:nth-child(6n+2) .num { background: linear-gradient(135deg, #7c3aed, #5b21b6) !important; box-shadow: 0 8px 20px rgba(124,58,237,0.30); }
        .why-card:nth-child(6n+3) .num { background: linear-gradient(135deg, #06b6d4, #0891b2) !important; box-shadow: 0 8px 20px rgba(6,182,212,0.30); }
        .why-card:nth-child(6n+4) .num { background: linear-gradient(135deg, #10b981, #059669) !important; box-shadow: 0 8px 20px rgba(16,185,129,0.30); }
        .why-card:nth-child(6n+5) .num { background: linear-gradient(135deg, #f97316, #ea580c) !important; box-shadow: 0 8px 20px rgba(249,115,22,0.30); }
        .why-card:nth-child(6n+6) .num { background: linear-gradient(135deg, #ec4899, #db2777) !important; box-shadow: 0 8px 20px rgba(236,72,153,0.30); }

        /* Section background variants — alternate for visual rhythm */
        .section-light { background: #fff; }
        .section-soft  { background: #f8fafc; position: relative; }
        .section-soft::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        }
        .section-soft::after {
            content: '';
            position: absolute; bottom: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        }

        /* ====================================================================
           BUTTONS — clean, modern, no ugly circular icon container
           ==================================================================== */
        .primary-btn,
        .btn-primary-cta {
            display: inline-flex !important;
            align-items: center;
            gap: 10px;
            padding: 14px 30px !important;
            border-radius: 10px !important;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%) !important;
            color: #fff !important;
            font-weight: 600 !important;
            font-size: 14.5px !important;
            letter-spacing: 0.3px;
            line-height: 1.2 !important;
            text-decoration: none !important;
            border: none !important;
            box-shadow: 0 8px 20px rgba(37,99,235,0.30);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        }
        .primary-btn::before,
        .btn-primary-cta::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.22) 50%, transparent 100%);
            transform: translateX(-120%);
            transition: transform 0.6s ease;
            pointer-events: none;
        }
        .primary-btn:hover,
        .btn-primary-cta:hover {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a5f 100%) !important;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(37,99,235,0.40);
        }
        .primary-btn:hover::before,
        .btn-primary-cta:hover::before { transform: translateX(120%); }
        .primary-btn .text,
        .btn-primary-cta .text { position: relative; z-index: 1; }

        /* The circular icon container — KILLED. Just show the icon itself. */
        .primary-btn .icon,
        .btn-primary-cta .icon {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: auto !important;
            height: auto !important;
            background: transparent !important;
            border-radius: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            position: relative;
            z-index: 1;
            font-size: 13px;
            transition: transform 0.25s ease;
        }
        .primary-btn .icon i,
        .btn-primary-cta .icon i { font-size: 13px; }
        .primary-btn:hover .icon { transform: translateX(4px); }
        html[dir="rtl"] .primary-btn .icon i { transform: scaleX(-1); }
        html[dir="rtl"] .primary-btn:hover .icon { transform: translateX(-4px); }

        /* White button (used inside dark sections) */
        .white-btn {
            display: inline-flex !important;
            align-items: center;
            gap: 10px;
            padding: 14px 30px !important;
            border-radius: 10px !important;
            background: #fff !important;
            color: #1e40af !important;
            font-weight: 700 !important;
            font-size: 14.5px !important;
            line-height: 1.2 !important;
            text-decoration: none !important;
            border: none !important;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .white-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.28);
            background: #f8fafc !important;
            color: #1e3a5f !important;
        }
        .white-btn .icon,
        .white-btn .text { position: relative; z-index: 1; }
        .white-btn .icon {
            background: transparent !important;
            width: auto !important; height: auto !important;
            border-radius: 0 !important;
            padding: 0 !important;
        }

        /* Outline / secondary button */
        .btn-secondary-cta {
            display: inline-flex !important;
            align-items: center;
            gap: 10px;
            padding: 13px 28px !important;
            border-radius: 10px !important;
            background: rgba(255,255,255,0.05) !important;
            color: #fff !important;
            border: 2px solid rgba(255,255,255,0.30) !important;
            font-weight: 600 !important;
            font-size: 14.5px !important;
            line-height: 1.2 !important;
            text-decoration: none !important;
            backdrop-filter: blur(8px);
            transition: all 0.25s ease;
        }
        .btn-secondary-cta:hover {
            border-color: #fff !important;
            background: rgba(255,255,255,0.12) !important;
            color: #fff !important;
            transform: translateY(-2px);
        }
        .btn-secondary-cta i { font-size: 12px; }
        html[dir="rtl"] .btn-secondary-cta i { transform: scaleX(-1); }

        /* ====================================================================
           CARDS — depth, refined hover
           ==================================================================== */
        .service-card,
        .why-card,
        .testimonial-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px !important;
            padding: 32px 28px !important;
            transition: transform 0.4s cubic-bezier(.2,.8,.2,1), box-shadow 0.4s ease, border-color 0.25s ease;
            position: relative;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .service-card:hover::before { transform: scaleX(1); }
        .service-card:hover,
        .why-card:hover,
        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 48px rgba(15,23,42,0.12), 0 4px 12px rgba(15,23,42,0.06);
            border-color: rgba(37,99,235,0.30);
        }

        /* Service card icon — bigger, brand-glow */
        .service-card .icon {
            width: 64px !important;
            height: 64px !important;
            border-radius: 14px !important;
            display: inline-flex;
            align-items: center; justify-content: center;
            font-size: 26px !important;
            color: #fff !important;
            margin-bottom: 22px !important;
            box-shadow: 0 10px 22px rgba(37,99,235,0.25);
            position: relative;
        }
        .service-card .icon::after {
            content: '';
            position: absolute; inset: 0;
            border-radius: inherit;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,0.30));
            opacity: 0;
            transition: opacity 0.3s;
        }
        .service-card:hover .icon::after { opacity: 1; }
        .service-card:hover .icon { transform: rotate(-6deg) scale(1.08); }
        .service-card h3 { font-size: 20px !important; font-weight: 700 !important; margin-bottom: 12px !important; }
        .service-card p { font-size: 14.5px !important; line-height: 1.7 !important; color: #475569 !important; }
        .service-card .features li {
            font-size: 13.5px;
            color: #334155;
            padding: 5px 0 5px 26px;
            position: relative;
        }
        .service-card .features li::before {
            content: "✓";
            position: absolute;
            left: 0; top: 5px;
            width: 18px; height: 18px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            display: inline-flex;
            align-items: center; justify-content: center;
        }
        html[dir="rtl"] .service-card .features li {
            padding-left: 0;
            padding-right: 26px;
        }
        html[dir="rtl"] .service-card .features li::before {
            left: auto; right: 0;
        }

        /* Why-card numbers — bigger, prominent */
        .why-card .num {
            width: 56px !important;
            height: 56px !important;
            border-radius: 16px !important;
            font-size: 22px !important;
            font-weight: 800 !important;
            margin-bottom: 18px !important;
        }
        .why-card h3 { font-size: 19px !important; font-weight: 700 !important; margin-bottom: 12px !important; }
        .why-card p { font-size: 14.5px !important; line-height: 1.7 !important; color: #475569 !important; }

        /* Testimonial cards — quote-mark accent */
        .testimonial-card { padding: 36px 30px !important; }
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 8px; right: 26px;
            font-size: 100px;
            font-family: Georgia, serif;
            line-height: 1;
            color: rgba(37,99,235,0.10);
            font-weight: 700;
        }
        html[dir="rtl"] .testimonial-card::before { right: auto; left: 26px; }
        .testimonial-card .stars {
            font-size: 18px !important;
            letter-spacing: 2px;
            margin-bottom: 14px !important;
        }
        .testimonial-card p {
            font-size: 15px !important;
            line-height: 1.75 !important;
            color: #334155 !important;
            font-style: italic;
            position: relative;
            margin-bottom: 18px !important;
        }
        .testimonial-card .author {
            font-weight: 700 !important;
            color: #0f172a !important;
            font-size: 15px !important;
        }
        .testimonial-card .role {
            font-size: 13px !important;
            color: #64748b !important;
        }

        /* Hero buttons — make them bigger for the home page */
        .hero-cta-row .btn-primary-cta {
            background: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%) !important;
            color: #fff !important;
            font-size: 16px !important;
            padding: 17px 38px !important;
            box-shadow: 0 14px 30px rgba(37,99,235,0.40);
        }
        .hero-cta-row .btn-primary-cta:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%) !important;
            color: #fff !important;
        }

        /* Hero stats — more prominent */
        .hero-stats { gap: 50px !important; }
        .hero-stats .stat .num {
            font-size: 40px !important;
            font-weight: 800 !important;
            background: linear-gradient(135deg, #93c5fd, #60a5fa);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-stats .stat .lbl {
            font-size: 13px !important;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #94a3b8 !important;
            margin-top: 6px !important;
        }

        /* Section spacing */
        section.section,
        section.services-grid,
        section.why-section,
        section.stack-section,
        section.testimonial-section { padding: 90px 0 !important; }

        /* Stack pills — more refined */
        .stack-pill {
            display: inline-flex !important;
            align-items: center;
            padding: 9px 18px !important;
            border-radius: 999px !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            margin: 5px 5px !important;
            transition: all 0.25s ease;
            cursor: default;
        }
        .stack-pill:not(.primary) {
            background: #fff !important;
            color: #334155 !important;
            border: 1.5px solid #e2e8f0;
        }
        .stack-pill.primary {
            background: linear-gradient(135deg, #2563eb, #1e40af) !important;
            color: #fff !important;
            border: none;
            box-shadow: 0 6px 14px rgba(37,99,235,0.25);
        }
        .stack-pill:hover {
            transform: translateY(-3px);
        }
        .stack-pill:not(.primary):hover {
            background: #f8fafc !important;
            border-color: #2563eb;
            color: #2563eb !important;
        }

        /* Trust bar polish */
        .trust-bar {
            background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%) !important;
            border-bottom: 1px solid #e0e7ff;
        }
        .trust-bar .label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .trust-bar .label::before {
            content: '';
            display: inline-block;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }

        /* Stack pills — colored variants */
        .stack-pill {
            background: #f1f5f9;
            color: #1e293b;
            border: 1px solid transparent;
        }
        .stack-pill.primary {
            background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(124,58,237,0.10)) !important;
            color: #2563eb !important;
            border: 1px solid rgba(37,99,235,0.20);
        }

        /* Final CTA polish */
        .final-cta {
            background: linear-gradient(135deg, #1e40af 0%, #312e81 50%, #0f172a 100%) !important;
            position: relative;
            overflow: hidden;
        }
        .final-cta::before {
            content: '';
            position: absolute;
            top: -50%; right: -10%;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(124,58,237,0.25), transparent 60%);
            pointer-events: none;
        }
        .final-cta::after {
            content: '';
            position: absolute;
            bottom: -50%; left: -10%;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(96,165,250,0.20), transparent 60%);
            pointer-events: none;
        }
        .final-cta .container { position: relative; z-index: 1; }
    </style>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Khaled Ahmed",
        "alternateName": ["Khaled Ahmed Haggagy", "خالد أحمد"],
        "jobTitle": "Senior Full Stack Web Developer",
        "url": "https://khaledahmed.net",
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ],
        "email": "khaledahmedhaggagy@gmail.com",
        "telephone": ["+20-1204593124", "+20-1010254819"],
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Cairo",
            "addressRegion": "Cairo",
            "addressCountry": "EG"
        },
        "image": "<?php echo e(asset('images/logo.png')); ?>",
        "description": "Senior full stack web developer with 5+ years of professional experience delivering 25+ production projects across 7 countries. Founder of Barmagly software startup.",
        "knowsAbout": [
            "Web Development",
            "Full Stack Development",
            "Laravel",
            "React.js",
            "Vue.js",
            "Node.js",
            "PHP",
            "JavaScript",
            "TypeScript",
            "MySQL",
            "MongoDB",
            "REST API",
            "GraphQL",
            "DevOps",
            "Docker",
            "AWS",
            "Programming Instruction"
        ],
        "knowsLanguage": ["en", "ar"],
        "alumniOf": {
            "@type": "EducationalOrganization",
            "name": "Luxor University"
        },
        "worksFor": {
            "@type": "Organization",
            "name": "Barmagly",
            "url": "https://khaledahmed.net"
        }
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ProfessionalService",
        "name": "Khaled Ahmed — Web Development Services",
        "image": "<?php echo e(asset('images/logo.png')); ?>",
        "@id": "https://khaledahmed.net",
        "url": "https://khaledahmed.net",
        "telephone": ["+20-1204593124", "+20-1010254819"],
        "priceRange": "$$",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Cairo",
            "addressCountry": "EG"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 30.0444,
            "longitude": 31.2357
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Sunday","Monday","Tuesday","Wednesday","Thursday"],
            "opens": "09:00",
            "closes": "21:00"
        },
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ],
        "areaServed": ["EG", "SA", "AE", "US", "GB", "DE", "CA"],
        "serviceType": [
            "Web Development",
            "Full Stack Development",
            "Laravel Development",
            "React Development",
            "E-commerce Development",
            "SaaS Development",
            "Custom Web Applications"
        ]
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Khaled Ahmed — Senior Full Stack Web Developer",
        "url": "https://khaledahmed.net",
        "description": "Senior full stack web developer specializing in Laravel, React, Node.js, and modern web technologies.",
        "inLanguage": "en",
        "publisher": {
            "@type": "Person",
            "name": "Khaled Ahmed"
        }
    }
    </script>

    <?php echo $__env->yieldContent('structured_data'); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body data-bs-spy="scroll" data-bs-target="#fixedNavbar">

<div class="page-wrapper" id="wrapper">

    <main class="main-area">

        <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </main>

    <a href="#" class="scroll-top-btn" data-scroll-goto="1" aria-label="Scroll to top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <div id="preloader-wrap">
        <div class="preloader-inner">
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    </div>

</div>

<!-- Mobile bottom bar (phones only) -->
<div class="mobile-widget-container">
    <a href="tel:+201204593124" class="btn-icon" aria-label="<?php echo e(__('site.phone_whatsapp')); ?>">
        <i class="fas fa-phone-alt"></i> <?php echo e(app()->getLocale() === 'ar' ? 'اتصل' : 'Call'); ?>

    </a>
    <a href="https://wa.me/201204593124?text=<?php echo e(urlencode(app()->getLocale() === 'ar' ? 'أهلاً خالد، أحب أناقش مشروع تطوير ويب' : 'Hi Khaled, I would like to discuss a web development project')); ?>" class="btn-icon" aria-label="WhatsApp">
        <i class="fab fa-whatsapp"></i> <?php echo e(app()->getLocale() === 'ar' ? 'واتساب' : 'WhatsApp'); ?>

    </a>
</div>

<!-- Single floating WhatsApp button (desktop only, mobile uses bottom bar) -->
<a href="https://wa.me/201204593124?text=Hi%20Khaled%2C%20I%27d%20like%20to%20discuss%20a%20web%20development%20project"
   target="_blank" rel="noopener"
   class="floating-whatsapp d-none d-md-flex"
   aria-label="WhatsApp Khaled Ahmed">
    <i class="fab fa-whatsapp"></i>
</a>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/images.loaded.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/wow.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/magnific.popup.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/waypoint.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/counter.up.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/jquery.easing.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/validate.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/custom.select.plugin.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/scrollit.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/isotope.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/zepto.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/vegas.slider.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/jquery.mb-ytb.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/main.js')); ?>" defer></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH F:\Certificates\khaled\resources\views\layouts\app.blade.php ENDPATH**/ ?>