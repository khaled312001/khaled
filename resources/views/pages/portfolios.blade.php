@extends('layouts.app')

@php
    $projectCount = count(\App\Services\PortfolioService::all());
    $countryCount = $countryCount ?? \App\Services\PortfolioService::countryCount();
@endphp

@section('title', isset($category) ? ucfirst($category) . ' Projects | Khaled Ahmed Portfolio' : $projectCount . ' Real Projects Shipped Across ' . $countryCount . ' Countries | Khaled Ahmed Portfolio')
@section('description', isset($category) ? 'See ' . strtolower($category) . ' web development projects shipped by Khaled Ahmed — senior full stack developer.' : $projectCount . ' real production projects shipped across ' . $countryCount . ' countries — Laravel, React, Node.js. SaaS, e-commerce, restaurants, hotels, healthcare, education and more.')
@section('keywords', 'web developer portfolio, Laravel projects, React projects, full stack developer Egypt, hire web developer, custom web application portfolio, Khaled Ahmed projects')
@section('canonical', isset($category) ? 'https://khaledahmed.net/portfolio/category/' . $category : 'https://khaledahmed.net/portfolios')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">
<style>
    /* ─────────── Hero ─────────── */
    .portfolio-hero {
        padding: 120px 0 60px;
        background: linear-gradient(135deg, #0a1428 0%, #1e3a5f 45%, #2563eb 100%);
        color: #fff;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .portfolio-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(96,165,250,0.15) 0%, transparent 40%),
            radial-gradient(circle at 80% 70%, rgba(124,58,237,0.18) 0%, transparent 40%);
        pointer-events: none;
    }
    .portfolio-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1px);
        background-size: 28px 28px;
        opacity: 0.6;
        pointer-events: none;
    }
    .portfolio-hero > .container { position: relative; z-index: 2; }
    .portfolio-hero .eyebrow {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(96,165,250,0.15);
        border: 1px solid rgba(96,165,250,0.30);
        color: #93c5fd;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border-radius: 999px;
        margin-bottom: 18px;
        opacity: 0;
        animation: fadeUp 0.6s ease 0.05s forwards;
    }
    .portfolio-hero h1 {
        color: #fff;
        font-weight: 800;
        margin-bottom: 16px;
        font-size: 44px;
        letter-spacing: -0.025em;
        line-height: 1.15;
        opacity: 0;
        animation: fadeUp 0.7s ease 0.15s forwards;
    }
    .portfolio-hero h1 .grad {
        background: linear-gradient(135deg, #60a5fa, #c4b5fd);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .portfolio-hero p.lead {
        color: #cbd5e1;
        max-width: 720px;
        margin: 0 auto 30px;
        font-size: 17.5px;
        line-height: 1.6;
        opacity: 0;
        animation: fadeUp 0.7s ease 0.25s forwards;
    }
    .portfolio-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0,1fr));
        max-width: 720px;
        margin: 0 auto;
        gap: 18px;
        opacity: 0;
        animation: fadeUp 0.7s ease 0.35s forwards;
    }
    .portfolio-stats .stat {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.10);
        backdrop-filter: blur(8px);
        border-radius: 14px;
        padding: 16px 8px;
        text-align: center;
        transition: transform 0.25s ease, background 0.25s ease;
    }
    .portfolio-stats .stat:hover {
        transform: translateY(-3px);
        background: rgba(255,255,255,0.10);
    }
    .portfolio-stats .num {
        font-size: 32px;
        font-weight: 800;
        color: #60a5fa;
        line-height: 1;
        margin-bottom: 4px;
        font-feature-settings: "tnum";
    }
    .portfolio-stats .lbl { font-size: 12.5px; color: #cbd5e1; font-weight: 500; letter-spacing: 0.3px; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ─────────── Country quick-nav (sticky) ─────────── */
    .country-nav {
        position: sticky;
        top: 0;
        z-index: 30;
        background: rgba(255,255,255,0.96);
        backdrop-filter: blur(14px);
        border-bottom: 1px solid #e5e7eb;
        padding: 14px 0;
        opacity: 0;
        animation: fadeUp 0.5s ease 0.45s forwards;
    }
    .country-nav-inner {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        scrollbar-width: thin;
        padding-bottom: 4px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .country-nav-inner::-webkit-scrollbar { height: 4px; }
    .country-nav-inner::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
    .country-chip {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 14px;
        background: #f1f5f9;
        color: #1e293b;
        border-radius: 999px;
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 600;
        white-space: nowrap;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }
    .country-chip:hover {
        background: #fff;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(37,99,235,0.15);
    }
    .country-chip .fi {
        width: 22px;
        height: 16px;
        border-radius: 3px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.20);
        flex-shrink: 0;
        background-size: cover;
    }
    .country-chip .count {
        font-size: 11px;
        background: rgba(15,23,42,0.08);
        padding: 1px 7px;
        border-radius: 999px;
        margin-inline-start: 2px;
    }

    /* ─────────── Category filter ─────────── */
    .portfolio-cat-nav {
        padding: 20px 0;
        background: #fff;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
    }
    .portfolio-cat-nav a {
        display: inline-block; margin: 4px;
        padding: 7px 16px;
        border-radius: 999px;
        background: #f1f5f9; color: #1e293b;
        text-decoration: none;
        font-size: 13.5px; font-weight: 500;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }
    .portfolio-cat-nav a:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(15,23,42,0.08); }
    .portfolio-cat-nav a.active { background: var(--main-color); color: #fff; box-shadow: 0 6px 16px rgba(37,99,235,0.30); }

    /* ─────────── Country section ─────────── */
    .country-section { padding-top: 56px; scroll-margin-top: 100px; }
    .country-section:first-child { padding-top: 24px; }
    .country-section-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        padding-bottom: 18px;
        border-bottom: 2px solid #e5e7eb;
        position: relative;
    }
    .country-section-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        inset-inline-start: 0;
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, #2563eb, #7c3aed);
    }
    .cs-flag-wrap {
        flex-shrink: 0;
        width: 56px; height: 56px;
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        border: 1px solid #cbd5e1;
        border-radius: 16px;
        display: grid; place-items: center;
        box-shadow: 0 6px 16px rgba(15,23,42,0.08);
    }
    .cs-flag-wrap .fi {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.18);
        background-size: cover;
    }
    .cs-info { flex: 1; min-width: 0; }
    .cs-name {
        margin: 0 0 4px;
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.01em;
    }
    .cs-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #64748b;
        font-weight: 500;
        flex-wrap: wrap;
    }
    .cs-count {
        background: #eff6ff;
        color: #2563eb;
        padding: 3px 10px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 12px;
    }
    .cs-featured-hint {
        color: #f59e0b;
        font-weight: 600;
        font-size: 12.5px;
    }

    /* ─────────── Project card ─────────── */
    .project-card {
        position: relative;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        transition: transform 0.4s cubic-bezier(.2,.8,.2,1), box-shadow 0.4s ease, border-color 0.2s ease;
        height: 100%;
        display: flex; flex-direction: column;
        opacity: 0;
        transform: translateY(28px);
    }
    .project-card.in-view {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.6s ease, transform 0.6s cubic-bezier(.2,.8,.2,1), box-shadow 0.4s ease, border-color 0.2s ease;
    }
    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 28px 56px rgba(15,23,42,0.14);
        border-color: var(--main-color);
    }
    /* Browser-frame preview window */
    .project-card .project-img {
        position: relative;
        height: 260px;
        overflow: hidden;
        background: #0f172a;
        border-bottom: 1px solid #e5e7eb;
        display: block;
    }
    .project-card .project-img::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 26px;
        background: linear-gradient(180deg, #f1f5f9 0%, #e2e8f0 100%);
        border-bottom: 1px solid #cbd5e1;
        z-index: 3;
    }
    .project-card .project-img::after {
        content: '';
        position: absolute;
        top: 9px; left: 12px;
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #ef4444;
        box-shadow: 14px 0 0 #f59e0b, 28px 0 0 #10b981;
        z-index: 4;
    }
    .project-card .project-img img {
        position: absolute;
        top: 26px; left: 0;
        width: 100%;
        min-height: 234px;
        height: auto;
        display: block;
        object-fit: cover;
        object-position: top center;
        transform: translateY(0);
        transition: transform 4.5s cubic-bezier(.22,.61,.36,1);
        will-change: transform;
    }
    /* Scroll the image up on hover only if it's taller than the viewport.
       The min-height + object-fit:cover above ensures short images don't
       look stretched — they fill the viewport from the top instead. */
    .project-card:hover .project-img img,
    .project-card:focus-within .project-img img {
        transform: translateY(calc(-100% + 234px));
    }
    /* Hide broken images cleanly so the fallback can show */
    .project-card .project-img img.img-failed { display: none; }

    /* ─── Image fallback (shown when img fails or for placeholder slugs) ─── */
    .project-card .img-fallback {
        position: absolute;
        top: 26px; left: 0; right: 0; bottom: 0;
        z-index: 1;
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 30px 24px;
        text-align: center;
        background:
            radial-gradient(circle at 20% 20%, rgba(96,165,250,0.20) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(124,58,237,0.22) 0%, transparent 50%),
            linear-gradient(135deg, #0f172a 0%, #1e3a5f 100%);
    }
    .project-card .img-fallback::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1px);
        background-size: 22px 22px;
    }
    .project-card .img-fallback-title {
        position: relative;
        font-size: 22px;
        font-weight: 800;
        color: #fff;
        line-height: 1.2;
        letter-spacing: -0.01em;
        max-width: 100%;
    }
    .project-card .img-fallback-cat {
        position: relative;
        font-size: 11px;
        font-weight: 700;
        color: #93c5fd;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    /* When the real img fails, JS marks the parent — show the fallback. */
    .project-card .project-img.has-failed-img .img-fallback { display: flex; }
    .project-card .project-img.has-failed-img .scroll-hint { display: none; }
    /* For SVG placeholder images we made (lotus-sharm.svg, daamny.svg) — show as-is,
       but disable the hover-scroll so the placeholder stays centered. */
    .project-card .project-img img[src$=".svg"] {
        min-height: 0;
        height: 100%;
        object-fit: cover;
    }
    .project-card:hover .project-img img[src$=".svg"],
    .project-card:focus-within .project-img img[src$=".svg"] {
        transform: none;
    }
    .project-card:hover .project-img img[src$=".svg"] ~ .scroll-hint,
    .project-card .project-img img[src$=".svg"] ~ .scroll-hint {
        display: none;
    }
    .project-card .project-img > .preview-mask {
        position: absolute;
        top: 26px; left: 0; right: 0; bottom: 0;
        pointer-events: none;
        background: linear-gradient(180deg, rgba(15,23,42,0.10), transparent 16%, transparent 88%, rgba(15,23,42,0.06));
        z-index: 2;
    }
    .project-card .scroll-hint {
        position: absolute;
        bottom: 12px; right: 12px;
        background: rgba(15,23,42,0.78);
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        padding: 5px 11px;
        border-radius: 999px;
        z-index: 5;
        backdrop-filter: blur(6px);
        opacity: 0.95;
        transition: opacity 0.25s ease;
        display: inline-flex; align-items: center; gap: 6px;
    }
    .project-card:hover .scroll-hint { opacity: 0; }
    .project-card .scroll-hint i { animation: hintBounce 1.6s ease-in-out infinite; }
    @keyframes hintBounce { 0%,100% { transform: translateY(0); } 50% { transform: translateY(3px); } }

    .project-card .featured-badge {
        position: absolute; top: 38px; right: 12px;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #fff;
        padding: 5px 11px;
        border-radius: 999px;
        font-size: 11px; font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 5;
        box-shadow: 0 6px 14px rgba(245,158,11,0.45);
        display: inline-flex; align-items: center; gap: 4px;
    }
    html[dir="rtl"] .project-card .featured-badge { right: auto; left: 12px; }

    .project-card .project-body {
        padding: 22px 22px 24px;
        flex: 1;
        display: flex; flex-direction: column;
    }
    .project-card .cat {
        font-size: 11.5px;
        color: var(--main-color);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }
    .project-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.35;
        margin-bottom: 8px;
    }
    .project-card .summary {
        color: #475569;
        font-size: 13.5px;
        line-height: 1.6;
        margin-bottom: 14px;
        flex: 1;
    }
    .project-card .tech-stack { margin-bottom: 14px; }
    .project-card .tech-stack span {
        display: inline-block;
        background: #f1f5f9;
        color: #334155;
        font-size: 11px;
        font-weight: 600;
        padding: 4px 9px;
        border-radius: 6px;
        margin: 2px 4px 2px 0;
    }
    .project-card .actions {
        display: flex; align-items: center; justify-content: space-between;
        padding-top: 12px;
        border-top: 1px solid #f1f5f9;
    }
    .project-card .visit {
        color: var(--main-color);
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex; align-items: center; gap: 6px;
        transition: gap 0.2s ease;
    }
    .project-card .visit:hover { gap: 10px; }
    .project-card .role { font-size: 11.5px; color: #94a3b8; }

    /* ─────────── CTA ─────────── */
    .portfolio-cta {
        background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
        color: #fff;
        padding: 56px 40px;
        border-radius: 20px;
        text-align: center;
        margin: 80px 0 30px;
        position: relative;
        overflow: hidden;
    }
    .portfolio-cta::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.10) 1px, transparent 1px);
        background-size: 22px 22px;
        opacity: 0.4;
    }
    .portfolio-cta > * { position: relative; }
    .portfolio-cta h2 { color: #fff; font-size: 30px; font-weight: 800; margin-bottom: 14px; letter-spacing: -0.01em; }
    .portfolio-cta p { color: rgba(255,255,255,0.92); margin-bottom: 26px; max-width: 600px; margin-left: auto; margin-right: auto; font-size: 16px; }
    .portfolio-cta .btn-cta {
        background: #fff; color: #1e40af;
        padding: 15px 36px; border-radius: 12px;
        font-weight: 700; text-decoration: none;
        display: inline-block;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        font-size: 15px;
    }
    .portfolio-cta .btn-cta:hover { transform: translateY(-3px); box-shadow: 0 14px 32px rgba(0,0,0,0.28); }

    @media (max-width: 768px) {
        .portfolio-hero { padding: 80px 0 36px; }
        .portfolio-hero h1 { font-size: 28px; }
        .portfolio-hero p.lead { font-size: 15px; }
        .portfolio-stats { gap: 10px; }
        .portfolio-stats .num { font-size: 24px; }
        .portfolio-stats .lbl { font-size: 11px; }
        .cs-name { font-size: 20px; }
        .cs-flag-wrap { width: 48px; height: 48px; font-size: 26px; }
        .portfolio-cta { padding: 36px 22px; }
        .portfolio-cta h2 { font-size: 22px; }
    }
</style>
@endpush

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Khaled Ahmed — Web Development Portfolio",
    "description": "{{ $projectCount }} real production projects shipped across {{ $countryCount }} countries.",
    "url": "{{ url('/portfolios') }}",
    "isPartOf": {"@type":"WebSite","name":"Khaled Ahmed","url":"https://khaledahmed.net"},
    "mainEntity": {
        "@type": "ItemList",
        "numberOfItems": {{ count($projects) }},
        "itemListElement": [
            @foreach($projects as $i => $p)
            {
                "@type": "ListItem",
                "position": {{ $i + 1 }},
                "item": {
                    "@type": "CreativeWork",
                    "name": @json($p['title']),
                    "description": @json($p['summary']),
                    "url": @json($p['url']),
                    "creator": {"@type":"Person","name":"Khaled Ahmed"}
                }
            }@if(!$loop->last),@endif
            @endforeach
        ]
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"{{ url('/') }}"},
        {"@type":"ListItem","position":2,"name":"Portfolio","item":"{{ url('/portfolios') }}"}
        @if(isset($category)),{"@type":"ListItem","position":3,"name":"{{ ucfirst($category) }}","item":"{{ url('/portfolio/category/' . $category) }}"}@endif
    ]
}
</script>
@endsection

@section('content')
<section class="portfolio-hero">
    <div class="container">
        @if(isset($category))
            <span class="eyebrow">{{ app()->getLocale() === 'ar' ? 'تخصّص' : 'Category' }}</span>
            <h1>{{ ucfirst(str_replace('-', ' ', $category)) }} <span class="grad">Projects</span></h1>
            <p class="lead">{{ app()->getLocale() === 'ar' ? 'مشاريع إنتاج حقيقيه في' : 'Real production work in' }} <strong>{{ strtolower(str_replace('-', ' ', $category)) }}</strong> — {{ app()->getLocale() === 'ar' ? 'مبنيه ومنشوره بواسطه خالد أحمد.' : 'built and shipped by Khaled Ahmed.' }}</p>
        @else
            <span class="eyebrow">{{ app()->getLocale() === 'ar' ? 'سابقة الأعمال' : 'Portfolio' }}</span>
            <h1>{{ app()->getLocale() === 'ar' ? 'مشاريع حقيقيه،' : 'Real Projects,' }} <span class="grad">{{ app()->getLocale() === 'ar' ? 'نتائج حقيقيه' : 'Real Results' }}</span></h1>
            <p class="lead">{{ app()->getLocale() === 'ar' ? $projectCount . ' مشروع إنتاجي تم تسليمها في ' . $countryCount . ' دول — من سويسرا وألمانيا للمملكه المتحده والخليج. اضغط على أي بطاقه لتشوف الموقع المباشر.' : $projectCount . ' production projects shipped across ' . $countryCount . ' countries — from Switzerland and Germany to the UK and the Gulf. Click any card to see the live site.' }}</p>
            <div class="portfolio-stats">
                <div class="stat"><div class="num" data-counter="{{ $projectCount }}">0</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'مشروع مباشر' : 'Live Projects' }}</div></div>
                <div class="stat"><div class="num" data-counter="{{ $countryCount }}">0</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'دول' : 'Countries' }}</div></div>
                <div class="stat"><div class="num" data-counter="{{ count($categories) }}">0</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'صناعات' : 'Industries' }}</div></div>
                <div class="stat"><div class="num">5+</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'سنوات' : 'Years' }}</div></div>
            </div>
        @endif
    </div>
</section>

@if(isset($projectsByCountry) && !isset($category))
<div class="country-nav">
    <div class="container">
        <div class="country-nav-inner">
            @foreach($projectsByCountry as $group)
                <a href="#country-{{ $group['code'] }}" class="country-chip">
                    <span class="fi fi-{{ $group['code'] }}" role="img" aria-label="{{ $group['country_en'] }} flag"></span>
                    <span>{{ $group['country'] }}</span>
                    <span class="count">{{ count($group['projects']) }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="portfolio-cat-nav">
    <div class="container">
        <a href="{{ route('portfolios') }}" class="{{ !isset($category) ? 'active' : '' }}">{{ app()->getLocale() === 'ar' ? 'الكل' : 'All' }} ({{ $projectCount }})</a>
        @foreach($categories as $slug => $cat)
            <a href="{{ route('portfolios.category', $slug) }}"
               class="{{ (isset($categorySlug) && $categorySlug === $slug) ? 'active' : '' }}">
                {{ $cat['name'] }} ({{ $cat['count'] }})
            </a>
        @endforeach
    </div>
</div>

<section class="section pt-4">
    <div class="container">
        @if(isset($projectsByCountry) && !isset($category))
            {{-- Grouped-by-country layout (default /portfolios view) --}}
            @foreach($projectsByCountry as $group)
                @php
                    $hasFeatured = collect($group['projects'])->contains(fn($p) => !empty($p['featured']));
                @endphp
                <div class="country-section" id="country-{{ $group['code'] }}">
                    <div class="country-section-header">
                        <div class="cs-flag-wrap"><span class="fi fi-{{ $group['code'] }} fis" role="img" aria-label="{{ $group['country_en'] }} flag"></span></div>
                        <div class="cs-info">
                            <h2 class="cs-name">{{ $group['country'] }}</h2>
                            <div class="cs-meta">
                                <span class="cs-count">{{ count($group['projects']) }} {{ app()->getLocale() === 'ar' ? 'مشروع' : (count($group['projects']) === 1 ? 'project' : 'projects') }}</span>
                                @if($hasFeatured)
                                    <span class="cs-featured-hint">★ {{ app()->getLocale() === 'ar' ? 'يحتوي على مشاريع مميّزه' : 'Featured project inside' }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach($group['projects'] as $project)
                            @include('partials.portfolio-card', ['project' => $project])
                        @endforeach
                    </div>
                </div>
            @endforeach
        @elseif(count($projects))
            {{-- Flat grid (category filter active) --}}
            <div class="row g-4">
                @foreach($projects as $project)
                    @include('partials.portfolio-card', ['project' => $project])
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted mb-4">{{ app()->getLocale() === 'ar' ? 'لا توجد مشاريع في هذا التخصص بعد.' : 'No projects in this category yet.' }}</p>
                <a href="{{ route('portfolios') }}" class="primary-btn"><span class="text">{{ app()->getLocale() === 'ar' ? 'عرض كل المشاريع' : 'View All Projects' }}</span><span class="icon"><i class="fa fa-arrow-right"></i></span></a>
            </div>
        @endif

        <div class="portfolio-cta">
            <h2>{{ app()->getLocale() === 'ar' ? 'تحب تكون المشروع رقم #' . ($projectCount + 1) . '؟' : 'Want to Be Project #' . ($projectCount + 1) . '?' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'باقبل 2–3 عملاء جدد كل ربع سنه. لو عندك مشروع جاد، خلينا نتكلم — استشاره مجانيه 30 دقيقه، رد خلال 24 ساعه.' : 'I take 2–3 new clients per quarter. If you have a serious project, let\'s talk — free 30-minute consultation, 24-hour response.' }}</p>
            <a href="{{ route('contact') }}" class="btn-cta">{{ __('site.start_your_project') }} <i class="fa fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
(function() {
    // Card fade-in on scroll (IntersectionObserver — no library)
    const cards = document.querySelectorAll('.project-card');
    if (cards.length && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('in-view'), i * 60);
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -60px 0px', threshold: 0.05 });
        cards.forEach(c => io.observe(c));
    } else {
        // Fallback: show all immediately
        cards.forEach(c => c.classList.add('in-view'));
    }

    // Counter animation for hero stats
    const counters = document.querySelectorAll('[data-counter]');
    if (counters.length && 'IntersectionObserver' in window) {
        const co = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = parseInt(el.dataset.counter, 10) || 0;
                const duration = 1100;
                const start = performance.now();
                function step(now) {
                    const t = Math.min(1, (now - start) / duration);
                    const eased = 1 - Math.pow(1 - t, 3);
                    el.textContent = Math.round(target * eased);
                    if (t < 1) requestAnimationFrame(step);
                    else el.textContent = target;
                }
                requestAnimationFrame(step);
                co.unobserve(el);
            });
        }, { threshold: 0.3 });
        counters.forEach(c => co.observe(c));
    } else {
        counters.forEach(c => c.textContent = c.dataset.counter);
    }

    // Smooth scroll for country anchor chips (accounts for sticky nav)
    document.querySelectorAll('.country-chip[href^="#country-"]').forEach(chip => {
        chip.addEventListener('click', (e) => {
            const id = chip.getAttribute('href').slice(1);
            const target = document.getElementById(id);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', '#' + id);
            }
        });
    });
})();
</script>
@endpush
