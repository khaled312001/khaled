@extends('layouts.app')

@section('title', isset($category) ? ucfirst($category) . ' Projects | Khaled Ahmed Portfolio' : 'Portfolio — 32 Real Projects Shipped Across 7 Countries | Khaled Ahmed')
@section('description', isset($category) ? 'See ' . strtolower($category) . ' web development projects shipped by Khaled Ahmed — senior full stack developer.' : '32 real production projects shipped across 7 countries — Laravel, React, Node.js. SaaS, e-commerce, restaurants, hotels, healthcare, education and more.')
@section('keywords', 'web developer portfolio, Laravel projects, React projects, full stack developer Egypt, hire web developer, custom web application portfolio, Khaled Ahmed projects')
@section('canonical', isset($category) ? url('/portfolio/category/' . $category) : url('/portfolios'))

@push('styles')
<style>
    .portfolio-hero {
        padding: 110px 0 50px;
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%);
        color: #fff;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .portfolio-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
        background-size: 26px 26px;
    }
    .portfolio-hero h1 { color: #fff; font-weight: 800; margin-bottom: 14px; font-size: 40px; position: relative; z-index: 1; letter-spacing: -0.02em; }
    .portfolio-hero p { color: #cbd5e1; max-width: 700px; margin: 0 auto; font-size: 17px; position: relative; z-index: 1; }
    .portfolio-stats { display: inline-flex; gap: 36px; margin-top: 24px; flex-wrap: wrap; justify-content: center; position: relative; z-index: 1; }
    .portfolio-stats .stat { color: #fff; }
    .portfolio-stats .stat .num { font-size: 28px; font-weight: 800; color: #60a5fa; line-height: 1; }
    .portfolio-stats .stat .lbl { font-size: 13px; color: #cbd5e1; margin-top: 2px; }

    .portfolio-filter {
        padding: 24px 0;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
        background: rgba(255,255,255,0.94);
        backdrop-filter: blur(12px);
    }
    .portfolio-filter a {
        display: inline-block; margin: 4px;
        padding: 8px 18px;
        border-radius: 999px;
        background: #f1f5f9; color: #1e293b;
        text-decoration: none;
        font-size: 14px; font-weight: 500;
        transition: all 0.2s ease;
    }
    .portfolio-filter a:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(15,23,42,0.08); }
    .portfolio-filter a.active { background: var(--main-color); color: #fff; box-shadow: 0 6px 16px rgba(37,99,235,0.30); }

    .project-card {
        position: relative;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        transition: transform 0.4s cubic-bezier(.2,.8,.2,1), box-shadow 0.4s ease, border-color 0.2s ease;
        height: 100%;
        display: flex; flex-direction: column;
    }
    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 48px rgba(15,23,42,0.12);
        border-color: var(--main-color);
    }
    /* Browser-frame preview window with scrolling screenshot */
    .project-card .project-img {
        position: relative;
        height: 260px;
        overflow: hidden;
        background: #0f172a;
        border-bottom: 1px solid #e5e7eb;
    }
    /* Fake browser chrome (the row of dots) */
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
    /* The screenshot itself — tall image that scrolls down on hover */
    .project-card .project-img img {
        position: absolute;
        top: 26px; left: 0;
        width: 100%;
        height: auto;
        display: block;
        transform: translateY(0);
        transition: transform 4.5s cubic-bezier(.22,.61,.36,1);
        will-change: transform;
    }
    /* On hover, scroll the image up so its bottom comes into view */
    .project-card:hover .project-img img,
    .project-card:focus-within .project-img img {
        transform: translateY(calc(-100% + 234px)); /* container = 260px - 26px chrome = 234px viewport */
    }
    /* Subtle vignette at top/bottom of the preview window */
    .project-card .project-img > .preview-mask {
        position: absolute;
        top: 26px; left: 0; right: 0; bottom: 0;
        pointer-events: none;
        background:
            linear-gradient(180deg, rgba(15,23,42,0.10), transparent 16%, transparent 88%, rgba(15,23,42,0.06));
        z-index: 2;
    }
    /* "Hover to scroll" hint — fades on hover */
    .project-card .scroll-hint {
        position: absolute;
        bottom: 12px; right: 12px;
        background: rgba(15,23,42,0.75);
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 999px;
        z-index: 5;
        backdrop-filter: blur(6px);
        opacity: 0.95;
        transition: opacity 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .project-card:hover .scroll-hint { opacity: 0; }
    .project-card .scroll-hint i {
        animation: hintBounce 1.6s ease-in-out infinite;
    }
    @keyframes hintBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(3px); }
    }
    .project-card .lang-badge {
        position: absolute; top: 14px; left: 14px;
        background: rgba(255,255,255,0.92);
        backdrop-filter: blur(8px);
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px; font-weight: 700;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }
    .project-card .featured-badge {
        position: absolute; top: 14px; right: 14px;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #fff;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px; font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(245,158,11,0.4);
    }
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
        font-size: 17.5px;
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
    .project-card .role {
        font-size: 11.5px;
        color: #94a3b8;
    }

    .portfolio-cta {
        background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
        color: #fff;
        padding: 50px 40px;
        border-radius: 18px;
        text-align: center;
        margin: 60px 0 30px;
        position: relative;
        overflow: hidden;
    }
    .portfolio-cta h2 { color: #fff; font-size: 28px; font-weight: 800; margin-bottom: 14px; position: relative; }
    .portfolio-cta p { color: rgba(255,255,255,0.92); margin-bottom: 24px; max-width: 580px; margin-left: auto; margin-right: auto; position: relative; }
    .portfolio-cta .btn-cta {
        background: #fff; color: #1e40af;
        padding: 14px 32px; border-radius: 10px;
        font-weight: 700; text-decoration: none;
        display: inline-block;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        position: relative;
    }
    .portfolio-cta .btn-cta:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0,0,0,0.25); }

    @media (max-width: 768px) {
        .portfolio-hero { padding: 80px 0 30px; }
        .portfolio-hero h1 { font-size: 26px; }
        .portfolio-hero p { font-size: 15px; }
        .portfolio-cta { padding: 32px 20px; }
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
    "description": "32 real production projects shipped across 7 countries.",
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
            <h1>{{ ucfirst(str_replace('-', ' ', $category)) }} Projects</h1>
            <p>Real production work in <strong>{{ strtolower(str_replace('-', ' ', $category)) }}</strong> — built and shipped by Khaled Ahmed.</p>
        @else
            <h1>{{ app()->getLocale() === 'ar' ? 'سابقة الأعمال — مشاريع حقيقيه، نتائج حقيقيه' : 'Portfolio — Real Projects, Real Results' }}</h1>
            <p>{{ app()->getLocale() === 'ar' ? '32 مشروع إنتاجي تم تسليمها في 7 دول. اضغط على أي بطاقه لتشوف الموقع المباشر — كلها أعمال حقيقيه تخدم عملاء حقيقيين دلوقتي.' : '32 production projects shipped across 7 countries. Click any card to see the live site — these are real businesses serving real customers right now.' }}</p>
            <div class="portfolio-stats">
                <div class="stat"><div class="num">32</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'مشروع مباشر' : 'Live Projects' }}</div></div>
                <div class="stat"><div class="num">7</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'دول' : 'Countries' }}</div></div>
                <div class="stat"><div class="num">{{ count($categories) }}</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'صناعات' : 'Industries' }}</div></div>
                <div class="stat"><div class="num">5+</div><div class="lbl">{{ app()->getLocale() === 'ar' ? 'سنوات' : 'Years' }}</div></div>
            </div>
        @endif
    </div>
</section>

<div class="portfolio-filter">
    <div class="container">
        <a href="{{ route('portfolios') }}" class="{{ !isset($category) ? 'active' : '' }}">All</a>
        @foreach($categories as $catName => $count)
            @php $slug = strtolower(str_replace([' ', '/'], ['-', ''], $catName)); @endphp
            <a href="{{ route('portfolios.category', $slug) }}"
               class="{{ isset($category) && strtolower(str_replace('-', ' ', $category)) === strtolower($catName) ? 'active' : '' }}">
                {{ $catName }} ({{ $count }})
            </a>
        @endforeach
    </div>
</div>

<section class="section pt-5">
    <div class="container">
        @if(count($projects))
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-lg-4 col-md-6">
                <article class="project-card" tabindex="0">
                    <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="project-img" aria-label="Visit {{ $project['title'] }}">
                        <img src="{{ asset('images/' . $project['image']) }}"
                             alt="{{ $project['title'] }} — full-page screenshot"
                             loading="lazy" decoding="async">
                        <span class="preview-mask"></span>
                        <span class="lang-badge">{{ strtoupper($project['language']) }}</span>
                        @if(!empty($project['featured']))
                            <span class="featured-badge">★ Featured</span>
                        @endif
                        <span class="scroll-hint"><i class="fas fa-arrow-down"></i> {{ app()->getLocale() === 'ar' ? 'مرّر لتصفّح' : 'Hover to scroll' }}</span>
                    </a>
                    <div class="project-body">
                        <div class="cat">{{ $project['category'] }}</div>
                        <h3>{{ $project['title'] }}</h3>
                        <p class="summary">{{ $project['summary'] }}</p>
                        <div class="tech-stack">
                            @foreach($project['tech'] as $t)
                                <span>{{ $t }}</span>
                            @endforeach
                        </div>
                        <div class="actions">
                            <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="visit">
                                Visit Live Site <i class="fa fa-external-link-alt" style="font-size:11px;"></i>
                            </a>
                            <span class="role">{{ $project['role'] }}</span>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted mb-4">No projects in this category yet.</p>
                <a href="{{ route('portfolios') }}" class="primary-btn"><span class="text">View All Projects</span><span class="icon"><i class="fa fa-arrow-right"></i></span></a>
            </div>
        @endif

        <div class="portfolio-cta">
            <h2>{{ app()->getLocale() === 'ar' ? 'تحب تكون المشروع رقم #33؟' : 'Want to Be Project #33?' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'باقبل 2–3 عملاء جدد كل ربع سنه. لو عندك مشروع جاد، خلينا نتكلم — استشاره مجانيه 30 دقيقه، رد خلال 24 ساعه.' : 'I take 2–3 new clients per quarter. If you have a serious project, let\'s talk — free 30-minute consultation, 24-hour response.' }}</p>
            <a href="{{ route('contact') }}" class="btn-cta">{{ __('site.start_your_project') }} <i class="fa fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
@endsection
