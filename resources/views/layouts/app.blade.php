@php
    $khLocale = app()->getLocale();
    $khOther  = $khLocale === 'ar' ? 'en' : 'ar';
    $khDir    = $khLocale === 'ar' ? 'rtl' : 'ltr';
    $khCanonical = url()->current();

    // Real hreflang pair. Each language has its own URL (/about and /ar/about), so
    // these point at genuinely different documents — which is what makes the
    // annotation valid. Pointing all three at one URL, as this used to, told Google
    // nothing and left the whole Arabic translation unindexable.
    $khPath   = '/' . ltrim(request()->getPathInfo(), '/');
    $khEnUrl  = rtrim(url(\App\Http\Middleware\SetLocale::toLocale($khPath, 'en') ?? '/'), '/');
    $khArUrl  = rtrim(url(\App\Http\Middleware\SetLocale::toLocale($khPath, 'ar') ?? '/ar'), '/');
    $khEnUrl  = $khEnUrl !== '' ? $khEnUrl : url('/');
    $khAltUrl = $khLocale === 'ar' ? $khEnUrl : $khArUrl;
@endphp
<!DOCTYPE html>
<html lang="{{ $khLocale }}" dir="{{ $khDir }}" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0a0e1a">
    <meta name="color-scheme" content="dark">

    {{-- Single source of truth. A hardcoded googlebot directive here would win over the
         generic one (more specific agent), silently un-noindexing any page that sets it. --}}
    <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">

    <title>@yield('title', 'Khaled Ahmed — Senior Full Stack Web Developer | Laravel, React, Node.js')</title>
    <meta name="title" content="@yield('title', 'Khaled Ahmed — Senior Full Stack Web Developer')">
    <meta name="description" content="@yield('description', 'Senior full stack web developer with 5+ years experience and 25+ shipped projects across 7 countries. Hire an expert Laravel, React, and Node.js developer for your next web app.')">
    <meta name="keywords" content="@yield('keywords', 'web developer, full stack developer, hire web developer, Laravel developer, React developer, Node.js developer, Khaled Ahmed')">
    <meta name="author" content="Khaled Ahmed">

    <link rel="canonical" href="@yield('canonical', $khCanonical)">
    <link rel="alternate" hreflang="en" href="{{ $khEnUrl }}">
    <link rel="alternate" hreflang="ar" href="{{ $khArUrl }}">
    {{-- Region-qualified variants. Several hreflang values may legitimately point at one
         URL; this tells Google the Arabic version is intended for Saudi, the UAE, Kuwait,
         Qatar and Egypt, and that the English version also serves the UAE's large
         English-speaking business population. Both are target markets. --}}
    @foreach(['ar-SA', 'ar-AE', 'ar-KW', 'ar-QA', 'ar-EG'] as $khRegion)
        <link rel="alternate" hreflang="{{ $khRegion }}" href="{{ $khArUrl }}">
    @endforeach
    <link rel="alternate" hreflang="en-AE" href="{{ $khEnUrl }}">
    <link rel="alternate" hreflang="en-SA" href="{{ $khEnUrl }}">
    <link rel="alternate" hreflang="x-default" href="{{ $khEnUrl }}">

    {{-- Open Graph --}}
    <meta property="og:type"        content="@yield('og_type', 'website')">
    <meta property="og:url"         content="@yield('canonical', $khCanonical)">
    <meta property="og:title"       content="@yield('og_title', 'Khaled Ahmed — Senior Full Stack Web Developer')">
    <meta property="og:description" content="@yield('og_description', 'Senior full stack web developer. Laravel, React, Node.js. 5+ years, 25+ projects, 7 countries.')">
    <meta property="og:image"       content="@yield('og_image', asset('images/og-cover.webp'))">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt"   content="@yield('og_image_alt', 'Khaled Ahmed — Senior Full Stack Web Developer')">
    <meta property="og:site_name"   content="Khaled Ahmed">
    <meta property="og:locale"      content="{{ $khLocale === 'ar' ? 'ar_EG' : 'en_US' }}">

    {{-- Twitter --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:url"         content="@yield('canonical', $khCanonical)">
    <meta name="twitter:title"       content="@yield('twitter_title', 'Khaled Ahmed — Senior Full Stack Web Developer')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Senior full stack web developer. Laravel, React, Node.js.')">
    <meta name="twitter:image"       content="@yield('twitter_image', asset('images/og-cover.webp'))">
    <meta name="twitter:image:alt"   content="@yield('twitter_image_alt', 'Khaled Ahmed — Senior Full Stack Web Developer')">

    {{-- Favicons --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo-360w.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-360w.webp') }}">



    {{-- Preload only the faces the first paint needs. Self-hosted, so they start
         downloading immediately instead of after a round trip to a third-party CSS file. --}}
    @php
        $khPreloadFonts = $khLocale === 'ar'
            ? ['fonts/self/cairo-400-40278.woff2', 'fonts/self/cairo-700-40278.woff2']
            : ['fonts/self/inter-400-56160.woff2', 'fonts/self/inter-700-56160.woff2'];
    @endphp
    @foreach($khPreloadFonts as $khFont)
        <link rel="preload" as="font" type="font/woff2" href="{{ asset($khFont) }}" crossorigin>
    @endforeach


    {{-- Preload the homepage hero: it is the LCP element, so discovering it via CSS-blocked
         HTML parsing costs roughly a full round trip. --}}
    @hasSection('lcp_image')
        <link rel="preload" as="image" href="@yield('lcp_image')" fetchpriority="high">
    @endif

    {{-- =========================================================
         DESIGN SYSTEM — single source of truth. Deep navy dark.
         ========================================================= --}}
    <style id="design-system">
        /* Font Awesome, subset to the icons this site uses and self-hosted.
           font-display:swap is declared here; the CDN build omits it, which
           Lighthouse measured as 160 ms of invisible icons on mobile. */
        @font-face {
            font-family: 'Font Awesome 6 Free';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url('/fonts/fa/fa-solid-900.woff2') format('woff2');
        }
        @font-face {
            font-family: 'Font Awesome 6 Brands';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('/fonts/fa/fa-brands-400.woff2') format('woff2');
        }
        .fa, .fas, .fa-solid, .far, .fa-regular, .fab, .fa-brands {
            -moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased;
            display: inline-block; font-style: normal; font-variant: normal;
            line-height: 1; text-rendering: auto; }
        .fa, .fas, .fa-solid, .far, .fa-regular { font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .fab, .fa-brands { font-family: 'Font Awesome 6 Brands'; font-weight: 400; }
        .fa-arrow-left::before { content: "\f060"; }
        .fa-arrow-right::before { content: "\f061"; }
        .fa-arrow-up::before { content: "\f062"; }
        .fa-bars::before { content: "\f0c9"; }
        .fa-bolt::before { content: "\f0e7"; }
        .fa-book-open::before { content: "\f518"; }
        .fa-bookmark::before { content: "\f02e"; }
        .fa-calendar::before { content: "\f133"; }
        .fa-calendar-alt::before { content: "\f073"; }
        .fa-check-circle::before { content: "\f058"; }
        .fa-chevron-left::before { content: "\f053"; }
        .fa-chevron-right::before { content: "\f054"; }
        .fa-circle::before { content: "\f111"; }
        .fa-circle-minus::before { content: "\f056"; }
        .fa-clock::before { content: "\f017"; }
        .fa-comments::before { content: "\f086"; }
        .fa-download::before { content: "\f019"; }
        .fa-envelope::before { content: "\f0e0"; }
        .fa-exclamation-circle::before { content: "\f06a"; }
        .fa-external-link-alt::before { content: "\f35d"; }
        .fa-github::before { content: "\f09b"; }
        .fa-globe::before { content: "\f0ac"; }
        .fa-google-play::before { content: "\f3ab"; }
        .fa-home::before { content: "\f015"; }
        .fa-link::before { content: "\f0c1"; }
        .fa-linkedin::before { content: "\f08c"; }
        .fa-linkedin-in::before { content: "\f0e1"; }
        .fa-map-marker-alt::before { content: "\f3c5"; }
        .fa-mobile-screen-button::before { content: "\f3cd"; }
        .fa-paper-plane::before { content: "\f1d8"; }
        .fa-phone-alt::before { content: "\f879"; }
        .fa-rocket::before { content: "\f135"; }
        .fa-star::before { content: "\f005"; }
        .fa-book-quran::before { content: "\f687"; }
        .fa-cash-register::before { content: "\f788"; }
        .fa-chart-line::before { content: "\f201"; }
        .fa-motorcycle::before { content: "\f21c"; }
        .fa-phone-volume::before { content: "\f2a0"; }
        .fa-scissors::before { content: "\f0c4"; }
        .fa-utensils::before { content: "\f2e7"; }
        .fa-check::before { content: "\f00c"; }
        .fa-circle-check::before { content: "\f058"; }
        .fa-file-lines::before { content: "\f15c"; }
        .fa-layer-group::before { content: "\f5fd"; }
        .fa-link-slash::before { content: "\f127"; }
        .fa-up-down::before { content: "\f338"; }
        .fa-times::before { content: "\f00d"; }
        .fa-user::before { content: "\f007"; }
        .fa-whatsapp::before { content: "\f232"; }

        /* Self-hosted Inter + Cairo. font-display:swap on every face. */
@font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('/fonts/self/inter-400-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url('/fonts/self/inter-500-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('/fonts/self/inter-600-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url('/fonts/self/inter-700-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url('/fonts/self/inter-800-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('/fonts/self/cairo-400-40278.woff2') format('woff2');
            unicode-range: U+0600-06FF, U+0750-077F, U+0870-088E, U+0890-0891, U+0897-08E1, U+08E3-08FF, U+200C-200E, U+2010-2011, U+204F, U+2E41, U+FB50-FDFF, U+FE70-FE74, U+FE76-FEFC, U+102E0-102FB, U+10E60-10E7E, U+10EC2-10EC4, U+10EFC-10EFF, U+1EE00-1EE03, U+1EE05-1EE1F, U+1EE21-1EE22, U+1EE24, U+1EE27, U+1EE29-1EE32, U+1EE34-1EE37, U+1EE39, U+1EE3B, U+1EE42, U+1EE47, U+1EE49, U+1EE4B, U+1EE4D-1EE4F, U+1EE51-1EE52, U+1EE54, U+1EE57, U+1EE59, U+1EE5B, U+1EE5D, U+1EE5F, U+1EE61-1EE62, U+1EE64, U+1EE67-1EE6A, U+1EE6C-1EE72, U+1EE74-1EE77, U+1EE79-1EE7C, U+1EE7E, U+1EE80-1EE89, U+1EE8B-1EE9B, U+1EEA1-1EEA3, U+1EEA5-1EEA9, U+1EEAB-1EEBB, U+1EEF0-1EEF1;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('/fonts/self/cairo-400-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('/fonts/self/cairo-600-40278.woff2') format('woff2');
            unicode-range: U+0600-06FF, U+0750-077F, U+0870-088E, U+0890-0891, U+0897-08E1, U+08E3-08FF, U+200C-200E, U+2010-2011, U+204F, U+2E41, U+FB50-FDFF, U+FE70-FE74, U+FE76-FEFC, U+102E0-102FB, U+10E60-10E7E, U+10EC2-10EC4, U+10EFC-10EFF, U+1EE00-1EE03, U+1EE05-1EE1F, U+1EE21-1EE22, U+1EE24, U+1EE27, U+1EE29-1EE32, U+1EE34-1EE37, U+1EE39, U+1EE3B, U+1EE42, U+1EE47, U+1EE49, U+1EE4B, U+1EE4D-1EE4F, U+1EE51-1EE52, U+1EE54, U+1EE57, U+1EE59, U+1EE5B, U+1EE5D, U+1EE5F, U+1EE61-1EE62, U+1EE64, U+1EE67-1EE6A, U+1EE6C-1EE72, U+1EE74-1EE77, U+1EE79-1EE7C, U+1EE7E, U+1EE80-1EE89, U+1EE8B-1EE9B, U+1EEA1-1EEA3, U+1EEA5-1EEA9, U+1EEAB-1EEBB, U+1EEF0-1EEF1;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('/fonts/self/cairo-600-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url('/fonts/self/cairo-700-40278.woff2') format('woff2');
            unicode-range: U+0600-06FF, U+0750-077F, U+0870-088E, U+0890-0891, U+0897-08E1, U+08E3-08FF, U+200C-200E, U+2010-2011, U+204F, U+2E41, U+FB50-FDFF, U+FE70-FE74, U+FE76-FEFC, U+102E0-102FB, U+10E60-10E7E, U+10EC2-10EC4, U+10EFC-10EFF, U+1EE00-1EE03, U+1EE05-1EE1F, U+1EE21-1EE22, U+1EE24, U+1EE27, U+1EE29-1EE32, U+1EE34-1EE37, U+1EE39, U+1EE3B, U+1EE42, U+1EE47, U+1EE49, U+1EE4B, U+1EE4D-1EE4F, U+1EE51-1EE52, U+1EE54, U+1EE57, U+1EE59, U+1EE5B, U+1EE5D, U+1EE5F, U+1EE61-1EE62, U+1EE64, U+1EE67-1EE6A, U+1EE6C-1EE72, U+1EE74-1EE77, U+1EE79-1EE7C, U+1EE7E, U+1EE80-1EE89, U+1EE8B-1EE9B, U+1EEA1-1EEA3, U+1EEA5-1EEA9, U+1EEAB-1EEBB, U+1EEF0-1EEF1;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url('/fonts/self/cairo-700-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url('/fonts/self/cairo-800-40278.woff2') format('woff2');
            unicode-range: U+0600-06FF, U+0750-077F, U+0870-088E, U+0890-0891, U+0897-08E1, U+08E3-08FF, U+200C-200E, U+2010-2011, U+204F, U+2E41, U+FB50-FDFF, U+FE70-FE74, U+FE76-FEFC, U+102E0-102FB, U+10E60-10E7E, U+10EC2-10EC4, U+10EFC-10EFF, U+1EE00-1EE03, U+1EE05-1EE1F, U+1EE21-1EE22, U+1EE24, U+1EE27, U+1EE29-1EE32, U+1EE34-1EE37, U+1EE39, U+1EE3B, U+1EE42, U+1EE47, U+1EE49, U+1EE4B, U+1EE4D-1EE4F, U+1EE51-1EE52, U+1EE54, U+1EE57, U+1EE59, U+1EE5B, U+1EE5D, U+1EE5F, U+1EE61-1EE62, U+1EE64, U+1EE67-1EE6A, U+1EE6C-1EE72, U+1EE74-1EE77, U+1EE79-1EE7C, U+1EE7E, U+1EE80-1EE89, U+1EE8B-1EE9B, U+1EEA1-1EEA3, U+1EEA5-1EEA9, U+1EEAB-1EEBB, U+1EEF0-1EEF1;
        }
@font-face {
            font-family: 'Cairo';
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url('/fonts/self/cairo-800-56160.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        :root {
            /* ─── Color palette ─── */
            --bg-1:        #0a0e1a;
            --bg-2:        #0f172a;
            --bg-3:        #131a2c;
            --surface-1:   #131a2c;
            --surface-2:   #1a2238;
            --surface-3:   #232b42;

            --text-1:      #f1f5f9;
            --text-2:      #cbd5e1;
            --text-3:      #94a3b8;
            --text-4:      #64748b;

            --border-1:    rgba(255,255,255,0.06);
            --border-2:    rgba(255,255,255,0.12);
            --border-3:    rgba(96,165,250,0.25);

            --brand:       #60a5fa;
            --brand-2:     #a78bfa;
            --accent:      #f0abfc;
            --success:     #34d399;
            --warning:     #fbbf24;
            --danger:      #f87171;

            --gradient-1:  linear-gradient(135deg, #60a5fa 0%, #a78bfa 50%, #f0abfc 100%);
            --gradient-2:  linear-gradient(135deg, #60a5fa, #7c3aed);
            --gradient-bg: radial-gradient(circle at 20% 20%, rgba(96,165,250,0.10) 0%, transparent 45%),
                           radial-gradient(circle at 80% 80%, rgba(167,139,250,0.12) 0%, transparent 45%);

            /* ─── Spacing ─── */
            --sp-1: 4px;  --sp-2: 8px;  --sp-3: 12px; --sp-4: 16px;
            --sp-5: 24px; --sp-6: 32px; --sp-7: 48px; --sp-8: 64px; --sp-9: 96px;

            /* ─── Type ─── */
            --font-sans: 'Inter', 'Cairo', system-ui, -apple-system, 'Segoe UI', sans-serif;
            --font-mono: 'JetBrains Mono', ui-monospace, 'SF Mono', Menlo, Consolas, monospace;

            /* ─── Radius & shadow ─── */
            --r-sm: 8px;  --r-md: 12px; --r-lg: 16px; --r-xl: 20px; --r-2xl: 24px; --r-full: 999px;
            --shadow-sm: 0 4px 12px -2px rgba(0,0,0,0.35);
            --shadow-md: 0 12px 30px -10px rgba(0,0,0,0.50);
            --shadow-lg: 0 24px 60px -20px rgba(0,0,0,0.60);
            --shadow-glow: 0 10px 40px -10px rgba(96,165,250,0.40);

            /* ─── Layout ─── */
            --nav-h: 72px;
            --container-max: 1240px;
        }
        html[lang="ar"] :root, html[lang="ar"] { --font-sans: 'Cairo', 'Inter', system-ui, sans-serif; }

        /* ─── Reset ─── */
        *, *::before, *::after { box-sizing: border-box; }

        /* ─── GRID & UTILITIES ───────────────────────────────────────────
           Replaces the Bootstrap CDN. Lighthouse measured that file at
           1,050 ms of render-blocking time on mobile with 31.5 KiB unused;
           an audit of every template found only grid, flex, spacing and
           text utilities in use. Inlining them removes the request, and
           with it a whole third-party origin, from the critical path.
           Breakpoints and gutter sizes match Bootstrap 5 so no markup changed. */
        .container { width: 100%; padding-inline: 12px; margin-inline: auto; }
        @media (min-width: 576px)  { .container { max-width: 540px; } }
        @media (min-width: 768px)  { .container { max-width: 720px; } }
        @media (min-width: 992px)  { .container { max-width: 960px; } }
        @media (min-width: 1200px) { .container { max-width: 1140px; } }
        @media (min-width: 1400px) { .container { max-width: 1320px; } }

        .row { --gx: 24px; --gy: 0px; display: flex; flex-wrap: wrap;
               margin-inline: calc(-.5 * var(--gx)); margin-top: calc(-1 * var(--gy)); }
        .row > * { flex-shrink: 0; width: 100%; max-width: 100%;
                   padding-inline: calc(.5 * var(--gx)); margin-top: var(--gy); }
        .g-0 { --gx: 0px;  --gy: 0px;  }
        .g-1 { --gx: 4px;  --gy: 4px;  }
        .g-2 { --gx: 8px;  --gy: 8px;  }
        .g-3 { --gx: 16px; --gy: 16px; }
        .g-4 { --gx: 24px; --gy: 24px; }
        .g-5 { --gx: 48px; --gy: 48px; }

        .col { flex: 1 0 0%; }
        .col-auto { flex: 0 0 auto; width: auto; }
        .col-1 { flex: 0 0 auto; width: 8.333333%; }
        .col-2 { flex: 0 0 auto; width: 16.666667%; }
        .col-3 { flex: 0 0 auto; width: 25%; }
        .col-4 { flex: 0 0 auto; width: 33.333333%; }
        .col-5 { flex: 0 0 auto; width: 41.666667%; }
        .col-6 { flex: 0 0 auto; width: 50%; }
        .col-7 { flex: 0 0 auto; width: 58.333333%; }
        .col-8 { flex: 0 0 auto; width: 66.666667%; }
        .col-9 { flex: 0 0 auto; width: 75%; }
        .col-10 { flex: 0 0 auto; width: 83.333333%; }
        .col-11 { flex: 0 0 auto; width: 91.666667%; }
        .col-12 { flex: 0 0 auto; width: 100%; }

        @media (min-width: 576px) {
            .col-sm-auto { flex: 0 0 auto; width: auto; }
            .col-sm-1 { flex: 0 0 auto; width: 8.333333%; }
            .col-sm-2 { flex: 0 0 auto; width: 16.666667%; }
            .col-sm-3 { flex: 0 0 auto; width: 25%; }
            .col-sm-4 { flex: 0 0 auto; width: 33.333333%; }
            .col-sm-5 { flex: 0 0 auto; width: 41.666667%; }
            .col-sm-6 { flex: 0 0 auto; width: 50%; }
            .col-sm-7 { flex: 0 0 auto; width: 58.333333%; }
            .col-sm-8 { flex: 0 0 auto; width: 66.666667%; }
            .col-sm-9 { flex: 0 0 auto; width: 75%; }
            .col-sm-10 { flex: 0 0 auto; width: 83.333333%; }
            .col-sm-11 { flex: 0 0 auto; width: 91.666667%; }
            .col-sm-12 { flex: 0 0 auto; width: 100%; }
        }

        @media (min-width: 768px) {
            .col-md-auto { flex: 0 0 auto; width: auto; }
            .col-md-1 { flex: 0 0 auto; width: 8.333333%; }
            .col-md-2 { flex: 0 0 auto; width: 16.666667%; }
            .col-md-3 { flex: 0 0 auto; width: 25%; }
            .col-md-4 { flex: 0 0 auto; width: 33.333333%; }
            .col-md-5 { flex: 0 0 auto; width: 41.666667%; }
            .col-md-6 { flex: 0 0 auto; width: 50%; }
            .col-md-7 { flex: 0 0 auto; width: 58.333333%; }
            .col-md-8 { flex: 0 0 auto; width: 66.666667%; }
            .col-md-9 { flex: 0 0 auto; width: 75%; }
            .col-md-10 { flex: 0 0 auto; width: 83.333333%; }
            .col-md-11 { flex: 0 0 auto; width: 91.666667%; }
            .col-md-12 { flex: 0 0 auto; width: 100%; }
        }

        @media (min-width: 992px) {
            .col-lg-auto { flex: 0 0 auto; width: auto; }
            .col-lg-1 { flex: 0 0 auto; width: 8.333333%; }
            .col-lg-2 { flex: 0 0 auto; width: 16.666667%; }
            .col-lg-3 { flex: 0 0 auto; width: 25%; }
            .col-lg-4 { flex: 0 0 auto; width: 33.333333%; }
            .col-lg-5 { flex: 0 0 auto; width: 41.666667%; }
            .col-lg-6 { flex: 0 0 auto; width: 50%; }
            .col-lg-7 { flex: 0 0 auto; width: 58.333333%; }
            .col-lg-8 { flex: 0 0 auto; width: 66.666667%; }
            .col-lg-9 { flex: 0 0 auto; width: 75%; }
            .col-lg-10 { flex: 0 0 auto; width: 83.333333%; }
            .col-lg-11 { flex: 0 0 auto; width: 91.666667%; }
            .col-lg-12 { flex: 0 0 auto; width: 100%; }
        }

        @media (min-width: 1200px) {
            .col-xl-auto { flex: 0 0 auto; width: auto; }
            .col-xl-1 { flex: 0 0 auto; width: 8.333333%; }
            .col-xl-2 { flex: 0 0 auto; width: 16.666667%; }
            .col-xl-3 { flex: 0 0 auto; width: 25%; }
            .col-xl-4 { flex: 0 0 auto; width: 33.333333%; }
            .col-xl-5 { flex: 0 0 auto; width: 41.666667%; }
            .col-xl-6 { flex: 0 0 auto; width: 50%; }
            .col-xl-7 { flex: 0 0 auto; width: 58.333333%; }
            .col-xl-8 { flex: 0 0 auto; width: 66.666667%; }
            .col-xl-9 { flex: 0 0 auto; width: 75%; }
            .col-xl-10 { flex: 0 0 auto; width: 83.333333%; }
            .col-xl-11 { flex: 0 0 auto; width: 91.666667%; }
            .col-xl-12 { flex: 0 0 auto; width: 100%; }
        }

        @media (min-width: 1400px) {
            .col-xxl-auto { flex: 0 0 auto; width: auto; }
            .col-xxl-1 { flex: 0 0 auto; width: 8.333333%; }
            .col-xxl-2 { flex: 0 0 auto; width: 16.666667%; }
            .col-xxl-3 { flex: 0 0 auto; width: 25%; }
            .col-xxl-4 { flex: 0 0 auto; width: 33.333333%; }
            .col-xxl-5 { flex: 0 0 auto; width: 41.666667%; }
            .col-xxl-6 { flex: 0 0 auto; width: 50%; }
            .col-xxl-7 { flex: 0 0 auto; width: 58.333333%; }
            .col-xxl-8 { flex: 0 0 auto; width: 66.666667%; }
            .col-xxl-9 { flex: 0 0 auto; width: 75%; }
            .col-xxl-10 { flex: 0 0 auto; width: 83.333333%; }
            .col-xxl-11 { flex: 0 0 auto; width: 91.666667%; }
            .col-xxl-12 { flex: 0 0 auto; width: 100%; }
        }

        .d-flex { display: flex !important; }
        .d-inline-flex { display: inline-flex !important; }
        .d-block { display: block !important; }
        .d-none { display: none !important; }
        .flex-column { flex-direction: column !important; }
        .flex-wrap { flex-wrap: wrap !important; }
        .align-items-center { align-items: center !important; }
        .align-items-start { align-items: flex-start !important; }
        .align-items-end { align-items: flex-end !important; }
        .justify-content-center { justify-content: center !important; }
        .justify-content-between { justify-content: space-between !important; }
        .justify-content-end { justify-content: flex-end !important; }
        .text-center { text-align: center !important; }
        .text-start { text-align: start !important; }
        .text-end { text-align: end !important; }
        .order-1 { order: 1 !important; } .order-2 { order: 2 !important; } .order-3 { order: 3 !important; }
        .gap-1 { gap: 4px !important; }  .gap-2 { gap: 8px !important; }
        .gap-3 { gap: 16px !important; } .gap-4 { gap: 24px !important; }
        .mt-1 { margin-top: 4px !important; }   .mt-2 { margin-top: 8px !important; }
        .mt-3 { margin-top: 16px !important; }  .mt-4 { margin-top: 24px !important; }
        .mt-5 { margin-top: 48px !important; }
        .mb-1 { margin-bottom: 4px !important; }  .mb-2 { margin-bottom: 8px !important; }
        .mb-3 { margin-bottom: 16px !important; } .mb-4 { margin-bottom: 24px !important; }
        .mb-5 { margin-bottom: 48px !important; }
        .me-3 { margin-inline-end: 16px !important; }
        .mr-3 { margin-inline-end: 16px !important; }
        .py-5 { padding-top: 48px !important; padding-bottom: 48px !important; }
        .img-fluid { max-width: 100%; height: auto; }
        .clearfix::after { display: block; clear: both; content: ""; }
        .visually-hidden { position: absolute !important; width: 1px; height: 1px; padding: 0;
            margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0; }

        html { scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }
        body {
            margin: 0;
            font-family: var(--font-sans);
            font-size: 16px;
            line-height: 1.65;
            color: var(--text-1);
            background: var(--bg-1);
            color-scheme: dark;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            padding-top: var(--nav-h);
        }
        img, svg { max-width: 100%; display: block; }
        a { color: var(--brand); text-decoration: none; transition: color .2s ease; }
        a:hover { color: var(--brand-2); }

        h1, h2, h3, h4, h5, h6 { font-weight: 700; line-height: 1.2; letter-spacing: -0.02em; color: var(--text-1); margin: 0 0 var(--sp-4); }
        h1 { font-size: clamp(32px, 5vw, 56px); font-weight: 800; }
        h2 { font-size: clamp(26px, 3.5vw, 40px); font-weight: 800; }
        h3 { font-size: clamp(20px, 2.4vw, 26px); }
        h4 { font-size: 18px; }
        p  { margin: 0 0 var(--sp-4); color: var(--text-2); }

        ::selection { background: var(--brand); color: var(--bg-1); }
        ::-webkit-scrollbar { width: 12px; height: 12px; }
        ::-webkit-scrollbar-track { background: var(--bg-1); }
        ::-webkit-scrollbar-thumb { background: var(--border-2); border-radius: 6px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--brand); }

        /* ─── Container override (cap width) ─── */
        .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            max-width: var(--container-max);
        }

        /* ─── Section ─── */
        .ks-section { padding: var(--sp-9) 0; position: relative; }
        .ks-section--tight { padding: var(--sp-7) 0; }
        .ks-section--lead { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-9); }

        .ks-shead { text-align: center; max-width: 720px; margin: 0 auto var(--sp-7); }
        .ks-shead .ks-eyebrow { margin: 0 auto var(--sp-3); }
        .ks-shead h2 { margin-bottom: var(--sp-3); }
        .ks-shead p { color: var(--text-3); font-size: 17px; margin: 0; }

        /* ─── Eyebrow chip ─── */
        .ks-eyebrow {
            display: inline-flex; align-items: center; gap: var(--sp-2);
            padding: 7px 14px;
            background: rgba(96,165,250,0.10);
            border: 1px solid rgba(96,165,250,0.28);
            color: #93c5fd;
            font-size: 12px; font-weight: 700;
            letter-spacing: 1.4px; text-transform: uppercase;
            border-radius: var(--r-full);
        }
        .ks-eyebrow .ks-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--success); box-shadow: 0 0 0 0 rgba(52,211,153,0.6); animation: ks-pulse 2s ease infinite; }

        /* ─── Buttons ─── */
        .ks-btn {
            display: inline-flex; align-items: center; gap: 9px;
            padding: 13px 24px;
            border-radius: var(--r-md);
            font-weight: 700; font-size: 14.5px;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
            border: 1px solid transparent;
            cursor: pointer; line-height: 1;
            white-space: nowrap;
        }
        .ks-btn--primary {
            background: var(--gradient-2);
            color: #fff;
            box-shadow: 0 10px 30px -10px rgba(96,165,250,0.55);
        }
        .ks-btn--primary:hover { transform: translateY(-2px); box-shadow: 0 14px 36px -10px rgba(96,165,250,0.75); color: #fff; }
        .ks-btn--ghost {
            background: rgba(255,255,255,0.04);
            color: var(--text-1);
            border-color: var(--border-2);
        }
        .ks-btn--ghost:hover { background: rgba(255,255,255,0.08); color: #fff; transform: translateY(-2px); }
        .ks-btn--outline {
            background: transparent;
            color: var(--brand);
            border-color: var(--brand);
        }
        .ks-btn--outline:hover { background: rgba(96,165,250,0.10); color: var(--brand); }
        .ks-btn i { font-size: 11px; transition: transform .2s ease; }
        .ks-btn:hover i { transform: translateX(3px); }
        html[dir="rtl"] .ks-btn:hover i { transform: translateX(-3px); }
        html[dir="rtl"] .ks-btn i { transform: scaleX(-1); }

        /* ─── Card ─── */
        .ks-card {
            background: var(--surface-1);
            border: 1px solid var(--border-1);
            border-radius: var(--r-lg);
            padding: var(--sp-6);
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
            position: relative;
        }
        .ks-card--hover:hover { transform: translateY(-4px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
        .ks-card--gradient {
            background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%);
        }

        /* ─── Chip / Tag ─── */
        .ks-chip {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 7px 14px;
            background: var(--surface-1);
            border: 1px solid var(--border-1);
            color: var(--text-1);
            font-size: 13px; font-weight: 600;
            border-radius: var(--r-full);
            text-decoration: none;
            transition: transform .2s ease, border-color .2s ease, background .2s ease, color .2s ease;
        }
        .ks-chip:hover { transform: translateY(-2px); border-color: var(--border-3); color: var(--brand); background: rgba(96,165,250,0.08); }
        .ks-chip.is-active { background: var(--brand); color: var(--bg-1); border-color: var(--brand); }
        .ks-chip i { color: var(--brand); }
        .ks-chip.is-active i { color: var(--bg-1); }

        /* ─── Stats grid ─── */
        .ks-stats { display: grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: var(--sp-4); }
        .ks-stat {
            padding: 18px 12px;
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--border-1);
            border-radius: var(--r-md);
            text-align: center;
            transition: transform .25s ease, background .25s ease, border-color .25s ease;
        }
        .ks-stat:hover { transform: translateY(-3px); background: rgba(96,165,250,0.08); border-color: var(--border-3); }
        .ks-stat__num { font-size: 30px; font-weight: 800; color: var(--brand); line-height: 1; margin-bottom: 4px; font-feature-settings: "tnum"; }
        .ks-stat__lbl { font-size: 12.5px; color: var(--text-3); font-weight: 500; letter-spacing: 0.3px; }

        /* ─── NAVBAR ─── */
        .ks-nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1050;
            height: var(--nav-h);
            background: rgba(10,14,26,0.72);
            backdrop-filter: blur(18px) saturate(160%);
            -webkit-backdrop-filter: blur(18px) saturate(160%);
            border-bottom: 1px solid var(--border-1);
            transition: background .25s ease, border-color .25s ease, box-shadow .25s ease;
        }
        .ks-nav.is-scrolled {
            background: rgba(7,10,20,0.92);
            border-bottom-color: var(--border-3);
            box-shadow: 0 8px 24px -10px rgba(0,0,0,0.45);
        }
        .ks-nav__inner {
            height: 100%;
            display: flex; align-items: center; gap: var(--sp-5);
            padding-inline: var(--sp-5);
            max-width: var(--container-max); margin: 0 auto;
        }
        .ks-nav__brand {
            display: inline-flex; align-items: center; gap: 10px;
            text-decoration: none; flex-shrink: 0;
        }
        .ks-nav__brand img {
            height: 38px; width: auto;
            filter: brightness(1.1);
        }
        .ks-nav__links {
            display: flex; align-items: center; gap: 4px;
            margin-inline-start: auto; margin-inline-end: auto;
        }
        .ks-nav__link {
            position: relative;
            padding: 9px 14px;
            color: var(--text-2);
            font-size: 14px; font-weight: 600;
            text-decoration: none;
            border-radius: var(--r-sm);
            transition: color .2s ease, background .2s ease;
        }
        .ks-nav__link:hover { color: #fff; background: rgba(255,255,255,0.04); }
        .ks-nav__link.is-active { color: #fff; }
        .ks-nav__link.is-active::after {
            content: ''; position: absolute;
            left: 14px; right: 14px; bottom: 2px;
            height: 2px; border-radius: 2px;
            background: var(--gradient-1);
        }
        .ks-nav__actions { display: flex; align-items: center; gap: 10px; flex-shrink: 0; margin-inline-start: auto; }
        .ks-nav__lang {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 13px;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border-2);
            color: var(--text-1);
            font-size: 13px; font-weight: 600;
            border-radius: var(--r-full); text-decoration: none;
            transition: background .2s ease, border-color .2s ease, transform .2s ease;
        }
        .ks-nav__lang:hover { background: rgba(96,165,250,0.10); border-color: var(--border-3); color: #fff; transform: translateY(-1px); }
        .ks-nav__lang i { color: var(--brand); font-size: 12px; }
        .ks-nav__cta {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 20px;
            background: var(--gradient-2);
            color: #fff;
            font-size: 13.5px; font-weight: 700;
            border-radius: var(--r-full); text-decoration: none;
            box-shadow: 0 8px 22px -8px rgba(96,165,250,0.55);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .ks-nav__cta:hover { transform: translateY(-2px); box-shadow: 0 12px 28px -8px rgba(96,165,250,0.75); color: #fff; }
        .ks-nav__cta i { font-size: 11px; transition: transform .2s ease; }
        .ks-nav__cta:hover i { transform: translateX(3px); }
        html[dir="rtl"] .ks-nav__cta i { transform: scaleX(-1); }
        html[dir="rtl"] .ks-nav__cta:hover i { transform: scaleX(-1) translateX(3px); }

        .ks-nav__burger {
            display: none;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border-2);
            width: 40px; height: 40px;
            border-radius: var(--r-sm);
            padding: 0;
            cursor: pointer;
            color: var(--text-1);
            font-size: 18px;
            margin-inline-start: auto;
            transition: background .2s ease, border-color .2s ease;
        }
        .ks-nav__burger:hover { background: rgba(96,165,250,0.10); border-color: var(--border-3); }

        @media (max-width: 991.98px) {
            .ks-nav__links, .ks-nav__actions { display: none; }
            .ks-nav__burger { display: inline-flex; align-items: center; justify-content: center; }
        }

        /* ─── MOBILE DRAWER ─── */
        .ks-drawer {
            position: fixed; top: 0; right: 0; bottom: 0;
            width: min(360px, 88vw);
            background: var(--bg-2);
            border-inline-start: 1px solid var(--border-2);
            z-index: 1060;
            transform: translateX(100%);
            transition: transform .3s cubic-bezier(.22,.61,.36,1);
            display: flex; flex-direction: column;
            padding: var(--sp-5);
            overflow-y: auto;
        }
        html[dir="rtl"] .ks-drawer { right: auto; left: 0; transform: translateX(-100%); border-inline-start: none; border-inline-end: 1px solid var(--border-2); }
        .ks-drawer.is-open { transform: translateX(0); }
        .ks-drawer__head { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding-bottom: var(--sp-5); border-bottom: 1px solid var(--border-1); margin-bottom: var(--sp-5); }
        .ks-drawer__close { background: rgba(255,255,255,0.04); border: 1px solid var(--border-2); color: var(--text-1); width: 38px; height: 38px; border-radius: var(--r-sm); cursor: pointer; font-size: 16px; }
        .ks-drawer__close:hover { background: rgba(96,165,250,0.10); border-color: var(--border-3); }
        .ks-drawer__links { display: flex; flex-direction: column; gap: 4px; list-style: none; padding: 0; margin: 0; }
        .ks-drawer__links a { display: flex; align-items: center; justify-content: space-between; padding: 14px 16px; color: var(--text-1); text-decoration: none; font-weight: 600; border-radius: var(--r-sm); transition: background .2s ease; }
        .ks-drawer__links a:hover, .ks-drawer__links a.is-active { background: rgba(96,165,250,0.10); color: var(--brand); }
        .ks-drawer__foot { margin-top: auto; padding-top: var(--sp-5); border-top: 1px solid var(--border-1); display: flex; flex-direction: column; gap: var(--sp-3); }

        .ks-drawer__backdrop { position: fixed; inset: 0; background: rgba(0,0,0,0.55); backdrop-filter: blur(4px); z-index: 1055; opacity: 0; pointer-events: none; transition: opacity .3s ease; }
        .ks-drawer__backdrop.is-open { opacity: 1; pointer-events: auto; }
        body.has-drawer-open { overflow: hidden; }

        /* ─── FOOTER ─── */
        .ks-foot {
            background: #060912;
            border-top: 1px solid var(--border-1);
            padding: var(--sp-8) 0 var(--sp-5);
            color: var(--text-2);
        }
        .ks-foot a { color: var(--text-2); text-decoration: none; transition: color .2s ease; }
        .ks-foot a:hover { color: var(--brand); }
        .ks-foot h4 { color: var(--text-1); font-size: 14px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; margin: 0 0 var(--sp-4); }
        .ks-foot__h { font-size: 15px; font-weight: 700; color: var(--text-1); margin: 0 0 var(--sp-4); letter-spacing: 0; }
        .ks-foot__brand { display: flex; align-items: center; gap: 10px; margin-bottom: var(--sp-4); }
        .ks-foot__brand img { height: 38px; width: auto; }
        .ks-foot__about { color: var(--text-3); font-size: 14px; line-height: 1.7; margin: 0 0 var(--sp-4); }
        .ks-foot__links { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--sp-2); }
        .ks-foot__links a { font-size: 14px; }
        .ks-foot__social { display: flex; gap: 10px; margin-top: var(--sp-3); }
        .ks-foot__social a { width: 38px; height: 38px; display: grid; place-items: center; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-sm); color: var(--text-2); transition: all .2s ease; }
        .ks-foot__social a:hover { background: rgba(96,165,250,0.10); border-color: var(--border-3); color: var(--brand); transform: translateY(-2px); }
        .ks-foot__bot { border-top: 1px solid var(--border-1); margin-top: var(--sp-6); padding-top: var(--sp-5); display: flex; justify-content: space-between; gap: var(--sp-4); flex-wrap: wrap; font-size: 13px; color: var(--text-3); }

        /* ─── FLOATING WHATSAPP (left) — expanding pill ─── */
        .ks-fab-wa {
            position: fixed; bottom: 24px; left: 24px; z-index: 999;
            height: 60px;
            padding: 0 6px;
            border-radius: 999px;
            background: linear-gradient(135deg, #25d366, #128c7e);
            color: #fff !important;
            display: inline-flex; align-items: center; gap: 0;
            text-decoration: none;
            box-shadow: 0 14px 34px -8px rgba(37,211,102,0.6);
            border: 2px solid rgba(255,255,255,0.20);
            transition: gap .3s cubic-bezier(.2,.8,.2,1), padding .3s cubic-bezier(.2,.8,.2,1), transform .2s ease, box-shadow .2s ease;
            overflow: hidden;
            animation: ks-fab-in .5s ease .8s both;
        }
        .ks-fab-wa__icon {
            flex-shrink: 0;
            width: 48px; height: 48px;
            display: grid; place-items: center;
            font-size: 27px; line-height: 1;
            position: relative;
        }
        /* online dot */
        .ks-fab-wa__dot {
            position: absolute; top: 6px; right: 6px;
            width: 11px; height: 11px; border-radius: 50%;
            background: #4ade80; border: 2px solid #0e5c3f;
        }
        .ks-fab-wa__label {
            max-width: 0; opacity: 0;
            white-space: nowrap; font-size: 14.5px; font-weight: 700;
            transition: max-width .3s cubic-bezier(.2,.8,.2,1), opacity .25s ease, padding .3s ease;
            padding: 0;
        }
        .ks-fab-wa:hover { transform: translateY(-2px); box-shadow: 0 18px 42px -8px rgba(37,211,102,0.85); color: #fff !important; gap: 4px; padding: 0 18px 0 6px; }
        .ks-fab-wa:hover .ks-fab-wa__label { max-width: 200px; opacity: 1; padding-inline-end: 4px; }
        .ks-fab-wa::before {
            content: ''; position: absolute; inset: -6px;
            border-radius: 999px; border: 2px solid #25d366;
            opacity: .5; animation: ks-ring 2.2s ease-out infinite;
            pointer-events: none;
        }
        /* Auto-reveal the label briefly on load to draw attention, then collapse */
        .ks-fab-wa.ks-fab-wa--peek { gap: 4px; padding: 0 18px 0 6px; }
        .ks-fab-wa.ks-fab-wa--peek .ks-fab-wa__label { max-width: 200px; opacity: 1; padding-inline-end: 4px; }
        @keyframes ks-fab-in { from { opacity: 0; transform: translateY(16px) scale(.9); } to { opacity: 1; transform: translateY(0) scale(1); } }
        html[dir="rtl"] .ks-fab-wa:hover { padding: 0 6px 0 18px; }
        @media (max-width: 768px) {
            .ks-fab-wa { left: 14px; bottom: 20px; height: 54px; }
            .ks-fab-wa__icon { width: 44px; height: 44px; font-size: 24px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .ks-fab-wa, .ks-fab-wa::before { animation: none; }
        }

        /* ─── SCROLL-TOP (right) ─── */
        .ks-fab-top {
            position: fixed; bottom: 28px; right: 24px; z-index: 998;
            width: 44px; height: 44px;
            border-radius: 50%;
            background: rgba(96,165,250,0.16);
            color: var(--brand);
            border: 1px solid var(--border-3);
            backdrop-filter: blur(10px);
            display: grid; place-items: center;
            cursor: pointer;
            opacity: 0; pointer-events: none;
            transition: all .25s ease;
        }
        .ks-fab-top.is-visible { opacity: 1; pointer-events: auto; }
        .ks-fab-top:hover { transform: translateY(-2px); background: rgba(96,165,250,0.30); color: #fff; }
        @media (max-width: 768px) {
            .ks-fab-top { right: 14px; bottom: 20px; width: 40px; height: 40px; }
        }

        /* mobile bottom bar removed */

        /* ─── ANIMATIONS ─── */
        @keyframes ks-pulse { 0%,100% { box-shadow: 0 0 0 0 rgba(52,211,153,0.5); } 50% { box-shadow: 0 0 0 7px rgba(52,211,153,0); } }
        @keyframes ks-ring  { 0% { transform: scale(0.9); opacity: 0.7; } 100% { transform: scale(1.5); opacity: 0; } }
        @keyframes ks-fadeup { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .ks-fadeup { opacity: 0; transform: translateY(20px); transition: opacity .6s ease, transform .6s cubic-bezier(.2,.8,.2,1); }
        .ks-fadeup.is-in { opacity: 1; transform: translateY(0); }

        /* ─── Media (framed image) ─── */
        .ks-media { position: relative; border-radius: var(--r-lg); overflow: hidden; border: 1px solid var(--border-2); box-shadow: var(--shadow-md); }
        .ks-media img { width: 100%; height: auto; display: block; }
        .ks-media::after { content: ''; position: absolute; inset: 0; box-shadow: inset 0 0 50px rgba(96,165,250,0.10); border-radius: var(--r-lg); pointer-events: none; }

        /* ─── Utilities ─── */
        .ks-grad-text { background: var(--gradient-1); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .ks-bg-grad   { background: var(--gradient-bg), linear-gradient(180deg, var(--bg-1) 0%, var(--bg-2) 100%); }
        .ks-glass     { background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border: 1px solid var(--border-1); }

        @media (max-width: 768px) {
            .ks-section { padding: var(--sp-7) 0; }
            .ks-stats { grid-template-columns: repeat(2, 1fr); }
        }
    </style>

    @stack('styles')
    @yield('structured_data')
</head>
<body>

@include('partials.header')

<main>
    @yield('content')
</main>

@include('partials.footer')

{{-- Floating WhatsApp (always left) — expanding pill --}}
<a href="https://wa.me/201204593124?text={{ urlencode($khLocale === 'ar' ? 'أهلاً خالد، أحب أناقش مشروع تطوير ويب' : 'Hi Khaled, I would like to discuss a web development project') }}"
   target="_blank" rel="noopener" class="ks-fab-wa" id="ksFabWa" aria-label="{{ $khLocale === 'ar' ? 'تواصل عبر واتساب' : 'Chat on WhatsApp' }}">
    <span class="ks-fab-wa__icon"><i class="fab fa-whatsapp"></i><span class="ks-fab-wa__dot"></span></span>
    <span class="ks-fab-wa__label">{{ $khLocale === 'ar' ? 'تواصل واتساب' : 'Chat on WhatsApp' }}</span>
</a>

{{-- Scroll-to-top (always right) --}}
<button type="button" class="ks-fab-top" id="ksFabTop" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

{{-- Mobile drawer --}}
<div class="ks-drawer__backdrop" id="ksDrawerBackdrop"></div>
<aside class="ks-drawer" id="ksDrawer" aria-hidden="true" inert>
    <div class="ks-drawer__head">
        <a href="{{ route('home') }}" class="ks-nav__brand"><img src="{{ asset('images/logo-360w.webp') }}" alt="Khaled Ahmed"></a>
        <button type="button" class="ks-drawer__close" id="ksDrawerClose" aria-label="Close menu"><i class="fas fa-times"></i></button>
    </div>
    <ul class="ks-drawer__links">
        <li><a href="{{ route('home') }}"      class="{{ request()->routeIs('home') ? 'is-active' : '' }}">{{ __('site.home') }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
        <li><a href="{{ route('about') }}"     class="{{ request()->routeIs('about') ? 'is-active' : '' }}">{{ __('site.about') }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
        <li><a href="{{ route('services') }}"  class="{{ request()->routeIs('services') ? 'is-active' : '' }}">{{ __('site.services') }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
        <li><a href="{{ route('portfolios') }}" class="{{ request()->routeIs('portfolios') || request()->routeIs('portfolios.category') ? 'is-active' : '' }}">{{ __('site.portfolio') }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
        <li><a href="{{ route('blogs') }}"     class="{{ request()->routeIs('blogs') || request()->routeIs('blog.show') || request()->routeIs('blog.category') ? 'is-active' : '' }}">{{ __('site.blog') }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
        <li><a href="{{ route('faqs') }}">{{ __('site.faqs') ?? 'FAQs' }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
        <li><a href="{{ route('contact') }}"   class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">{{ __('site.contact') }} <i class="fas fa-chevron-{{ $khDir === 'rtl' ? 'left' : 'right' }}"></i></a></li>
    </ul>
    <div class="ks-drawer__foot">
        <a href="{{ route('lang.switch', $khOther) }}" class="ks-btn ks-btn--ghost" style="justify-content:center;">
            <i class="fas fa-globe"></i> {{ $khOther === 'ar' ? 'العربية' : 'English' }}
        </a>
        <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary" style="justify-content:center;">
            {{ __('site.contact_me') }} <i class="fa fa-arrow-right"></i>
        </a>
    </div>
</aside>

{{-- Scripts --}}
<script>
(function () {
    'use strict';
    // Nav scrolled state
    var nav = document.querySelector('.ks-nav');
    var fabTop = document.getElementById('ksFabTop');
    var onScroll = function () {
        // Read scroll position once, before any class change. Reading it again after a
        // classList.toggle() has invalidated style forces a synchronous layout.
        var y = window.scrollY;
        if (nav) nav.classList.toggle('is-scrolled', y > 8);
        if (fabTop) fabTop.classList.toggle('is-visible', y > 300);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // Scroll-to-top
    var fabTop = document.getElementById('ksFabTop');
    if (fabTop) fabTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // WhatsApp FAB: briefly reveal the label ~2s after load to draw attention, then collapse
    var fabWa = document.getElementById('ksFabWa');
    if (fabWa && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        setTimeout(function () {
            fabWa.classList.add('ks-fab-wa--peek');
            setTimeout(function () { fabWa.classList.remove('ks-fab-wa--peek'); }, 3200);
        }, 2000);
    }

    // Mobile drawer
    var drawer = document.getElementById('ksDrawer');
    var backdrop = document.getElementById('ksDrawerBackdrop');
    var closeBtn = document.getElementById('ksDrawerClose');
    var openBtns = document.querySelectorAll('[data-ks-drawer-open]');
    var open = function () {
        if (drawer) { drawer.classList.add('is-open'); drawer.setAttribute('aria-hidden','false'); drawer.removeAttribute('inert'); }
        if (backdrop) backdrop.classList.add('is-open');
        document.body.classList.add('has-drawer-open');
    };
    var close = function () {
        if (drawer) { drawer.classList.remove('is-open'); drawer.setAttribute('aria-hidden','true'); drawer.setAttribute('inert',''); }
        if (backdrop) backdrop.classList.remove('is-open');
        document.body.classList.remove('has-drawer-open');
    };
    openBtns.forEach(function (b) { b.addEventListener('click', open); });
    if (closeBtn) closeBtn.addEventListener('click', close);
    if (backdrop) backdrop.addEventListener('click', close);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });

    // IntersectionObserver fade-up
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); }
            });
        }, { rootMargin: '0px 0px -60px 0px', threshold: 0.05 });
        document.querySelectorAll('.ks-fadeup').forEach(function (el) { io.observe(el); });
    } else {
        document.querySelectorAll('.ks-fadeup').forEach(function (el) { el.classList.add('is-in'); });
    }
})();
</script>

@stack('scripts')
</body>
</html>
