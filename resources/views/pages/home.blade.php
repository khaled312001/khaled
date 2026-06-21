@extends('layouts.app')

@section('title', 'Hire a Senior Full Stack Web Developer | Laravel, React, Node.js — Khaled Ahmed')
@section('description', 'Hire Khaled Ahmed — Senior Full Stack Web Developer with 5+ years and 25+ shipped projects across 7 countries. Expert in Laravel, React.js, Node.js, Vue.js, and modern web technologies. Free consultation, 24-hour response.')
@section('keywords', 'hire full stack developer, web developer for hire, senior web developer, Laravel developer, React developer, Node.js developer, freelance web developer, web development services, custom web application, e-commerce developer, SaaS developer, web developer Egypt, Cairo developer, Khaled Ahmed, Barmagly')
@section('canonical', 'https://khaledahmed.net')
@section('og_image', asset('images/logo.png'))
@section('og_image_alt', 'Khaled Ahmed — Senior Full Stack Web Developer')

@push('styles')
<style>
    /* =====================================================
       HOME — clean, dark-first, modern. Self-contained.
       Uses shared --dm-* variables from layout dark-mode-global.
       ===================================================== */

    /* Section spacing baseline (overrides default light section padding) */
    .home-page .h-section { padding: 96px 0; position: relative; }
    .home-page .h-section.tight { padding: 64px 0; }

    /* ============ HERO ============ */
    .h-hero {
        padding: 140px 0 100px;
        background:
            radial-gradient(circle at 18% 18%, rgba(96,165,250,0.15) 0%, transparent 45%),
            radial-gradient(circle at 82% 80%, rgba(167,139,250,0.18) 0%, transparent 45%),
            linear-gradient(180deg, #050816 0%, #0a0e1a 100%);
        position: relative;
        overflow: hidden;
    }
    .h-hero::before {
        content: '';
        position: absolute; inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
        background-size: 28px 28px;
        opacity: 0.5;
        pointer-events: none;
    }
    .h-hero .container { position: relative; z-index: 1; }

    .h-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 8px 16px;
        background: rgba(96,165,250,0.10);
        border: 1px solid rgba(96,165,250,0.30);
        color: #93c5fd;
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border-radius: 999px;
        margin-bottom: 22px;
        opacity: 0; animation: h-fadeup 0.6s ease 0.05s forwards;
    }
    .h-eyebrow .h-dot { width: 8px; height: 8px; border-radius: 50%; background: #10b981; box-shadow: 0 0 0 0 rgba(16,185,129,0.6); animation: h-pulse 2s ease infinite; }

    .h-hero h1 {
        color: #fff; font-weight: 800;
        font-size: 56px; line-height: 1.08; letter-spacing: -0.03em;
        margin: 0 0 22px;
        opacity: 0; animation: h-fadeup 0.7s ease 0.15s forwards;
    }
    .h-hero h1 .h-grad {
        background: linear-gradient(135deg, #60a5fa, #c4b5fd 60%, #f0abfc);
        -webkit-background-clip: text; background-clip: text; color: transparent;
    }
    .h-hero h2 {
        color: #cbd5e1; font-size: 19px; line-height: 1.6; font-weight: 400;
        max-width: 680px; margin: 0 0 36px;
        opacity: 0; animation: h-fadeup 0.7s ease 0.25s forwards;
    }

    .h-stats {
        display: grid; grid-template-columns: repeat(4, minmax(0,1fr));
        gap: 18px; max-width: 720px; margin-bottom: 40px;
        opacity: 0; animation: h-fadeup 0.7s ease 0.35s forwards;
    }
    .h-stats .stat {
        padding: 18px 12px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        text-align: center;
        backdrop-filter: blur(8px);
        transition: transform 0.25s ease, background 0.25s ease, border-color 0.25s ease;
    }
    .h-stats .stat:hover { transform: translateY(-3px); background: rgba(96,165,250,0.10); border-color: rgba(96,165,250,0.25); }
    .h-stats .num { font-size: 30px; font-weight: 800; color: #60a5fa; line-height: 1; margin-bottom: 5px; font-feature-settings: "tnum"; }
    .h-stats .lbl { font-size: 12.5px; color: #cbd5e1; font-weight: 500; letter-spacing: 0.3px; }

    .h-cta-row {
        display: flex; gap: 14px; flex-wrap: wrap;
        opacity: 0; animation: h-fadeup 0.7s ease 0.45s forwards;
    }
    .h-btn {
        display: inline-flex; align-items: center; gap: 10px;
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 700; font-size: 15px;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        border: 1px solid transparent;
    }
    .h-btn-primary {
        background: linear-gradient(135deg, #60a5fa, #7c3aed);
        color: #fff;
        box-shadow: 0 10px 30px -10px rgba(96,165,250,0.55);
    }
    .h-btn-primary:hover { transform: translateY(-2px); color: #fff; box-shadow: 0 14px 36px -10px rgba(96,165,250,0.75); }
    .h-btn-ghost {
        background: rgba(255,255,255,0.04);
        color: #e2e8f0;
        border-color: rgba(255,255,255,0.15);
    }
    .h-btn-ghost:hover { background: rgba(255,255,255,0.08); color: #fff; transform: translateY(-2px); }
    .h-btn i { font-size: 12px; transition: transform 0.2s ease; }
    .h-btn:hover i { transform: translateX(3px); }
    html[dir="rtl"] .h-btn:hover i { transform: translateX(-3px); }

    /* ============ Code-card decoration (right column on desktop) ============ */
    .h-code {
        position: relative;
        background: linear-gradient(160deg, #0b1220 0%, #131a2c 100%);
        border: 1px solid rgba(96,165,250,0.20);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 30px 80px -25px rgba(0,0,0,0.65);
        opacity: 0; animation: h-fadeup 0.8s ease 0.4s forwards;
        max-width: 480px; margin-inline-start: auto;
    }
    .h-code .bar { display: flex; align-items: center; gap: 8px; padding: 12px 16px; background: rgba(255,255,255,0.04); border-bottom: 1px solid rgba(255,255,255,0.06); }
    .h-code .dot { width: 12px; height: 12px; border-radius: 50%; }
    .h-code .dot.r { background: #ef4444; } .h-code .dot.y { background: #f59e0b; } .h-code .dot.g { background: #10b981; }
    .h-code .file { margin-inline-start: auto; font-size: 12px; color: #94a3b8; font-family: ui-monospace, monospace; }
    .h-code pre { margin: 0; padding: 22px 26px; font-family: 'JetBrains Mono', ui-monospace, 'SF Mono', Menlo, Consolas, monospace; font-size: 14.5px; line-height: 1.85; color: #cbd5e1; background: transparent; overflow-x: auto; direction: ltr; text-align: left; unicode-bidi: isolate; }
    .h-code pre code { background: transparent; color: inherit; padding: 0; display: block; }
    .h-code .t-c { color: #64748b; font-style: italic; }
    .h-code .t-k { color: #c084fc; }
    .h-code .t-v { color: #60a5fa; }
    .h-code .t-p { color: #f0abfc; }
    .h-code .t-s { color: #34d399; }
    .h-code .t-n { color: #fbbf24; }

    /* ============ TRUST STRIP ============ */
    .h-trust { padding: 50px 0; background: rgba(255,255,255,0.02); border-top: 1px solid var(--dm-border, rgba(255,255,255,0.08)); border-bottom: 1px solid var(--dm-border, rgba(255,255,255,0.08)); }
    .h-trust-card { display: flex; gap: 14px; align-items: center; padding: 18px 22px; background: var(--dm-card, #131a2c); border: 1px solid var(--dm-border, rgba(255,255,255,0.08)); border-radius: 14px; }
    .h-trust-icon { flex-shrink: 0; width: 48px; height: 48px; display: grid; place-items: center; border-radius: 12px; background: rgba(96,165,250,0.12); color: #60a5fa; font-size: 20px; }
    .h-trust-card .label { font-size: 12px; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
    .h-trust-card .countries { font-size: 15px; color: #e2e8f0; font-weight: 600; }

    /* ============ SECTION HEADING ============ */
    .h-shead { text-align: center; max-width: 720px; margin: 0 auto 56px; }
    .h-shead .h-eyebrow { margin-bottom: 14px; }
    .h-shead h2 { color: #fff; font-size: 38px; font-weight: 800; line-height: 1.2; letter-spacing: -0.02em; margin: 0 0 14px; }
    .h-shead p { color: #94a3b8; font-size: 16.5px; line-height: 1.6; margin: 0; }

    /* ============ SERVICES GRID ============ */
    .h-service {
        position: relative;
        padding: 32px 28px;
        background: linear-gradient(160deg, var(--dm-card, #131a2c) 0%, var(--dm-bg-2, #0f172a) 100%);
        border: 1px solid var(--dm-border, rgba(255,255,255,0.08));
        border-radius: 16px;
        height: 100%;
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    .h-service::before { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(96,165,250,0.05), transparent 60%); opacity: 0; transition: opacity 0.3s ease; pointer-events: none; }
    .h-service:hover { transform: translateY(-6px); border-color: rgba(96,165,250,0.35); box-shadow: 0 24px 50px -20px rgba(0,0,0,0.55); }
    .h-service:hover::before { opacity: 1; }
    .h-service .h-icon { width: 56px; height: 56px; border-radius: 14px; display: grid; place-items: center; background: linear-gradient(135deg, rgba(96,165,250,0.18), rgba(124,58,237,0.18)); color: #60a5fa; font-size: 24px; margin-bottom: 22px; border: 1px solid rgba(96,165,250,0.20); }
    .h-service h3 { color: #fff; font-size: 19px; font-weight: 700; margin: 0 0 12px; }
    .h-service p { color: #94a3b8; font-size: 14.5px; line-height: 1.65; margin: 0 0 20px; }
    .h-service .h-more { color: #60a5fa; font-weight: 600; font-size: 13.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: gap 0.2s ease; }
    .h-service .h-more:hover { gap: 10px; }

    /* ============ TECH STACK ============ */
    .h-stack { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; max-width: 900px; margin: 0 auto; }
    .h-chip { display: inline-flex; align-items: center; gap: 8px; padding: 11px 18px; border-radius: 999px; background: var(--dm-card, #131a2c); border: 1px solid var(--dm-border, rgba(255,255,255,0.08)); color: #e2e8f0; font-size: 14px; font-weight: 600; transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease; }
    .h-chip:hover { transform: translateY(-3px); border-color: rgba(96,165,250,0.40); background: rgba(96,165,250,0.08); }
    .h-chip i { color: #60a5fa; }

    /* ============ FINAL CTA ============ */
    .h-final {
        padding: 80px 40px;
        background:
            radial-gradient(circle at 30% 50%, rgba(96,165,250,0.20) 0%, transparent 60%),
            linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        border: 1px solid rgba(96,165,250,0.20);
        border-radius: 24px;
        text-align: center;
        margin-top: 40px;
    }
    .h-final h2 { color: #fff; font-size: 38px; font-weight: 800; letter-spacing: -0.02em; line-height: 1.18; margin: 0 0 16px; }
    .h-final p { color: #cbd5e1; font-size: 17px; margin: 0 auto 30px; max-width: 620px; line-height: 1.65; }

    /* ============ ANIMATIONS ============ */
    @keyframes h-fadeup { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes h-pulse { 0%, 100% { box-shadow: 0 0 0 0 rgba(16,185,129,0.55); } 50% { box-shadow: 0 0 0 6px rgba(16,185,129,0); } }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 992px) {
        .h-hero { padding: 110px 0 70px; }
        .h-hero h1 { font-size: 40px; }
        .h-code { margin-top: 50px; max-width: 100%; }
    }
    @media (max-width: 768px) {
        .h-hero { padding: 90px 0 50px; }
        .h-hero h1 { font-size: 32px; line-height: 1.15; }
        .h-hero h2 { font-size: 16px; }
        .h-stats { grid-template-columns: repeat(2, 1fr); gap: 12px; }
        .h-stats .num { font-size: 24px; }
        .h-shead h2 { font-size: 28px; }
        .h-final { padding: 50px 24px; }
        .h-final h2 { font-size: 26px; }
        .home-page .h-section { padding: 64px 0; }
    }
</style>
@endpush

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Khaled Ahmed",
    "url": "https://khaledahmed.net",
    "jobTitle": "Senior Full Stack Web Developer",
    "worksFor": { "@type": "Organization", "name": "Barmagly", "url": "https://barmagly.tech" },
    "description": "Senior full stack web developer with 5+ years of experience and 25+ shipped projects across 7 countries. Expert in Laravel, React, Node.js.",
    "address": { "@type": "PostalAddress", "addressLocality": "Cairo", "addressCountry": "EG" },
    "sameAs": [
        "https://linkedin.com/in/khaled-ahmed-82368819b",
        "https://github.com/khaled312001"
    ],
    "knowsAbout": ["Laravel","React","Next.js","Node.js","TypeScript","PHP","MySQL","PostgreSQL","SEO","Web Performance"]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "https://khaledahmed.net",
    "name": "Khaled Ahmed — Senior Full Stack Web Developer",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://khaledahmed.net/blogs?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endsection

@section('content')
<div class="home-page">

<section class="h-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="h-eyebrow"><span class="h-dot"></span> {{ app()->getLocale() === 'ar' ? 'متاح لمشاريع جديده' : 'Available for new projects' }}</span>
                <h1>{{ app()->getLocale() === 'ar' ? 'مطوّر ويب' : 'Senior Full Stack' }} <span class="h-grad">{{ app()->getLocale() === 'ar' ? 'فُل ستاك خبير' : 'Web Developer' }}</span> {{ app()->getLocale() === 'ar' ? 'يسلّم بإتقان' : 'who ships in production' }}</h1>
                <h2>{{ app()->getLocale() === 'ar' ? 'أنا خالد أحمد — أكتر من 5 سنين خبره و 25+ مشروع إنتاج تم تسليمه في 7 دول. متخصص في Laravel و React و Node.js. تواصل واستشاره مجانيه، رد خلال 24 ساعه.' : 'I am Khaled Ahmed — 5+ years and 25+ production projects shipped across 7 countries. Specialized in Laravel, React, Node.js. Free consultation, response within 24 hours.' }}</h2>

                <div class="h-stats">
                    <div class="stat"><div class="num">25+</div><div class="lbl">{{ __('site.projects_shipped') }}</div></div>
                    <div class="stat"><div class="num">7</div><div class="lbl">{{ __('site.countries_served') }}</div></div>
                    <div class="stat"><div class="num">5+</div><div class="lbl">{{ __('site.years_experience') }}</div></div>
                    <div class="stat"><div class="num">24h</div><div class="lbl">{{ __('site.response_time') }}</div></div>
                </div>

                <div class="h-cta-row">
                    <a href="{{ route('contact') }}" class="h-btn h-btn-primary">{{ __('site.get_free_consultation') }} <i class="fa fa-arrow-right"></i></a>
                    <a href="{{ route('portfolios') }}" class="h-btn h-btn-ghost">{{ __('site.view_my_work') }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block">
                <div class="h-code" aria-hidden="true">
                    <div class="bar">
                        <span class="dot r"></span><span class="dot y"></span><span class="dot g"></span>
                        <span class="file">App.tsx</span>
                    </div>
                    <pre><code><span class="t-c">// senior full stack</span>
<span class="t-k">const</span> <span class="t-v">khaled</span> = {
  <span class="t-p">stack</span>: [<span class="t-s">'Laravel'</span>, <span class="t-s">'React'</span>],
  <span class="t-p">shipped</span>: <span class="t-n">25</span>,
  <span class="t-p">countries</span>: <span class="t-n">8</span>,
  <span class="t-p">since</span>: <span class="t-n">2020</span>,
  <span class="t-p">ship</span>: () => <span class="t-s">'production'</span>,
}</code></pre>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h-trust">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="h-trust-card">
                    <div class="h-trust-icon"><i class="fas fa-globe"></i></div>
                    <div>
                        <div class="label">{{ app()->getLocale() === 'ar' ? 'البلدان' : 'Coverage' }}</div>
                        <div class="countries">{{ app()->getLocale() === 'ar' ? 'مصر · UK · السعوديه · UAE · سويسرا · ألمانيا · فرنسا · الكويت' : 'Egypt · UK · Saudi · UAE · Switzerland · Germany · France · Kuwait' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-trust-card">
                    <div class="h-trust-icon"><i class="fas fa-rocket"></i></div>
                    <div>
                        <div class="label">{{ app()->getLocale() === 'ar' ? 'مشاريع منشوره' : 'Live projects' }}</div>
                        <div class="countries">{{ app()->getLocale() === 'ar' ? '35+ موقع إنتاج فعّال' : '35+ shipped production sites' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-trust-card">
                    <div class="h-trust-icon"><i class="fas fa-comments"></i></div>
                    <div>
                        <div class="label">{{ app()->getLocale() === 'ar' ? 'الرد' : 'Response' }}</div>
                        <div class="countries">{{ app()->getLocale() === 'ar' ? 'خلال 24 ساعه — عرض مكتوب' : 'Within 24 hours — written quote' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h-section">
    <div class="container">
        <div class="h-shead">
            <span class="h-eyebrow">{{ app()->getLocale() === 'ar' ? 'خدمات' : 'Services' }}</span>
            <h2>{{ app()->getLocale() === 'ar' ? 'كل اللي تحتاجه لمشروع ويب احترافي' : 'Everything you need for a production-grade web project' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'من تصميم الـAPI لحد النشر — كل المراحل بفريق واحد بدون تعقيدات.' : 'From API design to deployment — every stage handled by one accountable senior, no agency overhead.' }}</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="h-service">
                    <div class="h-icon"><i class="fab fa-laravel"></i></div>
                    <h3>{{ app()->getLocale() === 'ar' ? 'Laravel Backend' : 'Laravel Backend' }}</h3>
                    <p>{{ app()->getLocale() === 'ar' ? 'تطبيقات ويب قويه ومُحكمه: API، Auth، queues، billing، multi-tenant.' : 'Rock-solid web apps: REST/GraphQL APIs, auth, queues, billing, multi-tenant architectures.' }}</p>
                    <a href="{{ route('services') }}" class="h-more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-service">
                    <div class="h-icon"><i class="fab fa-react"></i></div>
                    <h3>{{ app()->getLocale() === 'ar' ? 'React & Next.js' : 'React & Next.js' }}</h3>
                    <p>{{ app()->getLocale() === 'ar' ? 'واجهات سريعه و SEO-ready بـNext.js 15 و RSC و Tailwind و TypeScript.' : 'Fast, SEO-ready frontends with Next.js 15, React Server Components, Tailwind, and TypeScript.' }}</p>
                    <a href="{{ route('services') }}" class="h-more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-service">
                    <div class="h-icon"><i class="fas fa-rocket"></i></div>
                    <h3>{{ app()->getLocale() === 'ar' ? 'SaaS MVP' : 'SaaS MVP Development' }}</h3>
                    <p>{{ app()->getLocale() === 'ar' ? 'إطلاق MVP خلال 8-16 أسبوع — Stripe billing، dashboard، API، نشر آلي.' : 'Ship your SaaS MVP in 8-16 weeks — Stripe billing, dashboards, API, CI/CD deployment.' }}</p>
                    <a href="{{ route('services') }}" class="h-more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-service">
                    <div class="h-icon"><i class="fas fa-shopping-cart"></i></div>
                    <h3>{{ app()->getLocale() === 'ar' ? 'تجاره إلكترونيه' : 'E-commerce' }}</h3>
                    <p>{{ app()->getLocale() === 'ar' ? 'WooCommerce، Shopify، أو custom Laravel — دفع، شحن، تكاملات.' : 'WooCommerce, Shopify, or custom Laravel storefronts with payment, shipping, and CRM integrations.' }}</p>
                    <a href="{{ route('services') }}" class="h-more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-service">
                    <div class="h-icon"><i class="fas fa-bolt"></i></div>
                    <h3>{{ app()->getLocale() === 'ar' ? 'أداء و SEO' : 'Performance & SEO' }}</h3>
                    <p>{{ app()->getLocale() === 'ar' ? 'تحسين Core Web Vitals، Lighthouse 95+، schema، sitemap، canonical.' : 'Core Web Vitals tuning, Lighthouse 95+ scores, structured data, sitemap and canonical hygiene.' }}</p>
                    <a href="{{ route('services') }}" class="h-more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-service">
                    <div class="h-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>{{ app()->getLocale() === 'ar' ? 'صيانه و أمن' : 'Maintenance & Security' }}</h3>
                    <p>{{ app()->getLocale() === 'ar' ? 'retainer شهري: تحديثات، backups، monitoring، ترقيع ثغرات.' : 'Monthly retainers: updates, backups, monitoring, security patches, and small feature additions.' }}</p>
                    <a href="{{ route('services') }}" class="h-more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h-section tight">
    <div class="container">
        <div class="h-shead">
            <span class="h-eyebrow">{{ app()->getLocale() === 'ar' ? 'الأدوات' : 'Tech stack' }}</span>
            <h2>{{ app()->getLocale() === 'ar' ? 'تقنيات حديثه وقويه' : 'Modern, production-ready stack' }}</h2>
        </div>
        <div class="h-stack">
            <span class="h-chip"><i class="fab fa-laravel"></i> Laravel</span>
            <span class="h-chip"><i class="fab fa-react"></i> React</span>
            <span class="h-chip"><i class="fab fa-node-js"></i> Node.js</span>
            <span class="h-chip"><i class="fab fa-js"></i> TypeScript</span>
            <span class="h-chip"><i class="fab fa-vuejs"></i> Vue.js</span>
            <span class="h-chip"><i class="fab fa-php"></i> PHP 8.3</span>
            <span class="h-chip"><i class="fas fa-database"></i> MySQL</span>
            <span class="h-chip"><i class="fas fa-database"></i> PostgreSQL</span>
            <span class="h-chip"><i class="fas fa-database"></i> MongoDB</span>
            <span class="h-chip"><i class="fas fa-server"></i> Redis</span>
            <span class="h-chip"><i class="fab fa-aws"></i> AWS</span>
            <span class="h-chip"><i class="fab fa-docker"></i> Docker</span>
            <span class="h-chip"><i class="fab fa-git-alt"></i> Git / CI</span>
            <span class="h-chip"><i class="fas fa-credit-card"></i> Stripe</span>
        </div>
    </div>
</section>

<section class="h-section">
    <div class="container">
        <div class="h-final">
            <h2>{{ app()->getLocale() === 'ar' ? 'مستعد لنبدأ مشروعك؟' : 'Ready to start your project?' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'ابعتلي تفاصيل المشروع وهتلاقي عرض مكتوب وخطه واضحه خلال 24 ساعه. بدون التزام، بدون مكالمات مبيعات.' : 'Send the project brief. You will get a written, fixed-fee quote and a realistic timeline within 24 hours. No commitment, no sales calls.' }}</p>
            <div class="h-cta-row" style="justify-content: center;">
                <a href="{{ route('contact') }}" class="h-btn h-btn-primary">{{ __('site.get_free_consultation') }} <i class="fa fa-arrow-right"></i></a>
                <a href="{{ route('portfolios') }}" class="h-btn h-btn-ghost">{{ __('site.view_my_work') }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

</div>
@endsection
