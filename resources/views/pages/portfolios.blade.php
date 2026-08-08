@extends('layouts.app')

@php
    $isAr = app()->getLocale() === 'ar';
    $projectCount = count(\App\Services\PortfolioService::all());
    $countryCount = $countryCount ?? \App\Services\PortfolioService::countryCount();
@endphp

@section('title', isset($category) ? ucfirst(str_replace('-', ' ', $category)) . ' Projects | Khaled Ahmed Portfolio' : $projectCount . ' Real Projects Shipped Across ' . $countryCount . ' Countries | Khaled Ahmed Portfolio')
@section('description', isset($category) ? 'See ' . strtolower(str_replace('-', ' ', $category)) . ' web development projects shipped by Khaled Ahmed.' : $projectCount . ' real production projects shipped across ' . $countryCount . ' countries — Laravel, React, Node.js. SaaS, e-commerce, restaurants, hotels, healthcare, education.')
@section('keywords', 'web developer portfolio, Laravel projects, React projects, full stack developer portfolio, custom web application portfolio, Khaled Ahmed projects')
@section('canonical', isset($category) ? 'https://khaledahmed.net/portfolio/category/' . $category : 'https://khaledahmed.net/portfolios')

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"CollectionPage","name":"Khaled Ahmed — Portfolio","description":"{{ $projectCount }} real production projects shipped across {{ $countryCount }} countries.","url":"{{ url('/portfolios') }}","mainEntity":{"@type":"ItemList","numberOfItems":{{ count($projects) }},"itemListElement":[@foreach($projects as $i => $p){"@type":"ListItem","position":{{ $i + 1 }},"item":{"@type":"CreativeWork","name":@json($p['title']),"description":@json($p['summary']),"url":@json($p['url'])}}@if(!$loop->last),@endif @endforeach]}}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"{{ url('/') }}"},{"@type":"ListItem","position":2,"name":"Portfolio","item":"{{ url('/portfolios') }}"}@if(isset($category)),{"@type":"ListItem","position":3,"name":"{{ ucfirst($category) }}","item":"{{ url('/portfolio/category/' . $category) }}"}@endif]}
</script>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">
<style>
    .pf-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .pf-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events: none; }
    .pf-hero > .container { position: relative; z-index: 1; }
    .pf-hero h1 { margin: 0 0 var(--sp-4); }
    .pf-hero .lead { color: var(--text-2); font-size: 18px; max-width: 720px; margin: 0 0 var(--sp-6); }
    .pf-hero .ks-stats { max-width: 720px; }

    /* Sticky country / category nav */
    .pf-nav { position: sticky; top: var(--nav-h); z-index: 30; background: rgba(10,14,26,0.95); backdrop-filter: blur(14px); border-bottom: 1px solid var(--border-1); padding: 14px 0; }
    .pf-nav__inner { display: flex; gap: 8px; overflow-x: auto; padding-bottom: 4px; justify-content: center; flex-wrap: wrap; }
    .pf-nav__inner::-webkit-scrollbar { height: 4px; } .pf-nav__inner::-webkit-scrollbar-thumb { background: var(--border-2); border-radius: 2px; }

    /* Country anchor chip */
    .pf-cchip { display: inline-flex; align-items: center; gap: 7px; padding: 7px 14px; background: var(--surface-1); border: 1px solid var(--border-1); color: var(--text-1); border-radius: var(--r-full); text-decoration: none; font-size: 13.5px; font-weight: 600; white-space: nowrap; transition: all .2s ease; }
    .pf-cchip:hover { transform: translateY(-2px); border-color: var(--border-3); color: var(--brand); background: rgba(96,165,250,0.06); }
    .pf-cchip .fi { width: 22px; height: 16px; border-radius: 3px; flex-shrink: 0; background-size: cover; box-shadow: 0 1px 2px rgba(0,0,0,0.20); }
    .pf-cchip .cnt { font-size: 11px; background: rgba(255,255,255,0.06); padding: 2px 7px; border-radius: var(--r-full); margin-inline-start: 2px; color: var(--text-3); }

    /* Category filter */
    .pf-cats { padding: 18px 0; border-bottom: 1px solid var(--border-1); text-align: center; }
    .pf-cats a { display: inline-block; margin: 4px; padding: 7px 14px; border-radius: var(--r-full); background: var(--surface-1); border: 1px solid var(--border-1); color: var(--text-1); font-size: 13px; font-weight: 600; text-decoration: none; transition: all .2s ease; }
    .pf-cats a:hover { border-color: var(--border-3); color: var(--brand); transform: translateY(-2px); }
    .pf-cats a.is-active { background: var(--brand); color: var(--bg-1); border-color: var(--brand); }

    /* Country section header */
    .pf-section { padding-top: var(--sp-7); scroll-margin-top: calc(var(--nav-h) + 80px); }
    .pf-section:first-child { padding-top: var(--sp-5); }
    .pf-section__hd { display: flex; align-items: center; gap: 16px; margin-bottom: var(--sp-5); padding-bottom: 14px; border-bottom: 2px solid var(--border-1); position: relative; }
    .pf-section__hd::after { content: ''; position: absolute; bottom: -2px; inset-inline-start: 0; width: 80px; height: 2px; background: var(--gradient-1); }
    .pf-flag-box { flex-shrink: 0; width: 56px; height: 56px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); display: grid; place-items: center; box-shadow: var(--shadow-sm); }
    .pf-flag-box .fi { width: 40px; height: 40px; border-radius: 50%; box-shadow: 0 1px 3px rgba(0,0,0,0.20); background-size: cover; }
    .pf-section__title { font-size: 24px; margin: 0 0 4px; color: var(--text-1); }
    .pf-section__meta { display: flex; align-items: center; gap: 10px; font-size: 13px; color: var(--text-3); flex-wrap: wrap; }
    .pf-section__cnt { background: rgba(96,165,250,0.10); color: var(--brand); padding: 3px 10px; border-radius: var(--r-full); font-weight: 700; font-size: 12px; border: 1px solid rgba(96,165,250,0.20); }
    .pf-section__feat { color: var(--warning); font-weight: 600; font-size: 12.5px; }

    /* Project card */
    .pf-card { display: flex; flex-direction: column; height: 100%; padding: 26px 24px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-lg); text-decoration: none; transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; position: relative; overflow: hidden; opacity: 0; transform: translateY(20px); }
    .pf-card.is-in { opacity: 1; transform: translateY(0); transition: opacity .5s ease, transform .5s ease, border-color .3s ease, box-shadow .3s ease; }
    .pf-card:hover { transform: translateY(-6px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
    .pf-card__top { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 14px; }
    .pf-card__cat { font-size: 11px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; padding: 4px 10px; background: rgba(96,165,250,0.10); border: 1px solid rgba(96,165,250,0.20); border-radius: var(--r-full); }
    .pf-card__feat { font-size: 10.5px; color: var(--warning); font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px; padding: 4px 9px; background: rgba(251,191,36,0.10); border: 1px solid rgba(251,191,36,0.25); border-radius: var(--r-full); display: inline-flex; align-items: center; gap: 4px; }
    .pf-card__title { font-size: 18px; font-weight: 700; line-height: 1.35; margin: 0 0 10px; color: var(--text-1); }
    .pf-card__sum { color: var(--text-3); font-size: 14px; line-height: 1.65; margin: 0 0 14px; flex: 1; }
    .pf-card__tech { display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 14px; }
    .pf-card__tech span { font-size: 11px; color: var(--text-2); padding: 3px 8px; background: rgba(255,255,255,0.04); border-radius: var(--r-sm); border: 1px solid var(--border-1); }
    .pf-card__foot { display: flex; align-items: center; justify-content: space-between; gap: 10px; padding-top: 14px; border-top: 1px solid var(--border-1); }
    .pf-card__role { font-size: 12px; color: var(--text-4); }
    .pf-card__visit { color: var(--brand); font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; transition: gap .2s ease; }
    .pf-card__visit i { font-size: 11px; }
    .pf-card:hover .pf-card__visit { gap: 10px; color: var(--brand-2); }

    /* Websites / Apps toggle */
    .pf-toggle { padding: 20px 0 4px; }
    .pf-toggle__inner { display: inline-flex; gap: 4px; padding: 5px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-full); }
    .pf-toggle { text-align: center; }
    .pf-toggle__btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: transparent; border: none; color: var(--text-3); font-size: 14px; font-weight: 600; border-radius: var(--r-full); cursor: pointer; font-family: var(--font-sans); transition: all .2s ease; }
    .pf-toggle__btn:hover { color: var(--text-1); }
    .pf-toggle__btn.is-active { background: var(--gradient-2); color: #fff; box-shadow: 0 8px 20px -8px rgba(96,165,250,0.55); }
    .pf-toggle__btn i { font-size: 14px; }
    .pf-toggle__cnt { font-size: 12px; padding: 1px 8px; background: rgba(255,255,255,0.14); border-radius: var(--r-full); }
    .pf-toggle__btn:not(.is-active) .pf-toggle__cnt { background: rgba(255,255,255,0.05); }

    /* App card */
    .app-card { display: flex; flex-direction: column; height: 100%; padding: 26px 24px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-lg); transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; opacity: 0; transform: translateY(20px); }
    .app-card.is-in { opacity: 1; transform: translateY(0); transition: opacity .5s ease, transform .5s ease, border-color .3s ease, box-shadow .3s ease; }
    .app-card:hover { transform: translateY(-6px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
    .app-card__top { display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; margin-bottom: 16px; }
    .app-card__ico { width: 60px; height: 60px; border-radius: 16px; display: grid; place-items: center; color: #fff; font-size: 26px; box-shadow: var(--shadow-sm); }
    .app-card__feat { font-size: 10.5px; color: var(--warning); font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px; padding: 4px 9px; background: rgba(251,191,36,0.10); border: 1px solid rgba(251,191,36,0.25); border-radius: var(--r-full); display: inline-flex; align-items: center; gap: 4px; height: fit-content; }
    .app-card__cat { display: inline-block; align-self: flex-start; font-size: 11px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; padding: 4px 10px; background: rgba(96,165,250,0.10); border: 1px solid rgba(96,165,250,0.20); border-radius: var(--r-full); margin-bottom: 12px; }
    .app-card__name { font-size: 18px; font-weight: 700; color: var(--text-1); margin: 0 0 8px; }
    .app-card__tag { color: var(--text-3); font-size: 14px; line-height: 1.6; margin: 0 0 16px; flex: 1; }
    .app-card__foot { display: flex; align-items: center; gap: 10px; padding-top: 16px; border-top: 1px solid var(--border-1); }
    .app-card__store { display: inline-flex; align-items: center; gap: 8px; padding: 9px 16px; background: #fff; color: #0a0e1a !important; font-size: 13px; font-weight: 700; border-radius: var(--r-sm); text-decoration: none; transition: transform .2s ease, box-shadow .2s ease; flex: 1; justify-content: center; }
    .app-card__store:hover { transform: translateY(-2px); box-shadow: 0 8px 18px -6px rgba(0,0,0,0.4); color: #0a0e1a !important; }
    .app-card__store i { font-size: 15px; color: #0a0e1a; }
    .app-card__web { flex-shrink: 0; width: 40px; height: 40px; display: grid; place-items: center; background: rgba(255,255,255,0.04); border: 1px solid var(--border-2); border-radius: var(--r-sm); color: var(--text-2); transition: all .2s ease; }
    .app-card__web:hover { border-color: var(--border-3); color: var(--brand); transform: translateY(-2px); }
    .app-card__web i { font-size: 13px; }
</style>
@endpush

@section('content')

<section class="pf-hero">
    <div class="container">
        <div class="d-inline-flex align-items-center gap-2 mb-3" style="font-size:13px;color:var(--text-3);">
            <a href="{{ route('home') }}" style="color:var(--text-2);text-decoration:none;">{{ __('site.home') }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}" style="font-size:10px;color:var(--text-4);"></i>
            <span>{{ $isAr ? 'سابقة الأعمال' : 'Portfolio' }}</span>
        </div>
        @if(isset($category))
            <span class="ks-eyebrow">{{ $isAr ? 'تخصص' : 'Category' }}</span>
            <h1 class="mt-3">{{ ucfirst(str_replace('-', ' ', $category)) }} <span class="ks-grad-text">Projects</span></h1>
            <p class="lead">{{ $isAr ? 'مشاريع إنتاج حقيقية في' : 'Real production work in' }} <strong>{{ strtolower(str_replace('-', ' ', $category)) }}</strong>.</p>
        @else
            <span class="ks-eyebrow"><span class="ks-dot"></span> {{ $isAr ? 'سابقة الأعمال' : 'Portfolio' }}</span>
            <h1 class="mt-3">{{ $isAr ? 'مشاريع حقيقية،' : 'Real projects,' }} <span class="ks-grad-text">{{ $isAr ? 'نتائج حقيقية' : 'real results' }}</span></h1>
            <p class="lead">{{ $isAr ? $projectCount . ' مشروع إنتاجي تم تسليمها في ' . $countryCount . ' دول، من سويسرا وألمانيا إلى المملكة المتحدة والخليج. اضغط على أي بطاقة لتشاهد الموقع المباشر.' : $projectCount . ' production projects shipped across ' . $countryCount . ' countries — from Switzerland and Germany to the UK and the Gulf. Click any card to see the live site.' }}</p>
            <div class="ks-stats">
                <div class="ks-stat"><div class="ks-stat__num">{{ $projectCount }}</div><div class="ks-stat__lbl">{{ $isAr ? 'مشروع' : 'Projects' }}</div></div>
                <div class="ks-stat"><div class="ks-stat__num">{{ $countryCount }}</div><div class="ks-stat__lbl">{{ $isAr ? 'دول' : 'Countries' }}</div></div>
                <div class="ks-stat"><div class="ks-stat__num">{{ count($categories) }}</div><div class="ks-stat__lbl">{{ $isAr ? 'صناعات' : 'Industries' }}</div></div>
                <div class="ks-stat"><div class="ks-stat__num">5+</div><div class="ks-stat__lbl">{{ $isAr ? 'سنوات' : 'Years' }}</div></div>
            </div>
        @endif
    </div>
</section>

@if(!isset($category))
<div class="pf-toggle">
    <div class="container">
        <div class="pf-toggle__inner" role="tablist">
            <button type="button" class="pf-toggle__btn is-active" data-pf-view="websites" role="tab" aria-selected="true">
                <i class="fas fa-globe"></i> {{ $isAr ? 'المواقع' : 'Websites' }} <span class="pf-toggle__cnt">{{ $projectCount }}</span>
            </button>
            <button type="button" class="pf-toggle__btn" data-pf-view="apps" role="tab" aria-selected="false">
                <i class="fas fa-mobile-screen-button"></i> {{ $isAr ? 'التطبيقات' : 'Mobile Apps' }} <span class="pf-toggle__cnt">{{ count($apps ?? []) }}</span>
            </button>
        </div>
    </div>
</div>
@endif

<div id="pfWebsites">
@if(isset($projectsByCountry) && !isset($category))
<div class="pf-nav">
    <div class="container">
        <div class="pf-nav__inner">
            @foreach($projectsByCountry as $g)
                <a href="#country-{{ $g['code'] }}" class="pf-cchip">
                    <span class="fi fi-{{ $g['code'] }}" role="img" aria-label="{{ $g['country_en'] }} flag"></span>
                    <span>{{ $g['country'] }}</span>
                    <span class="cnt">{{ count($g['projects']) }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="pf-cats">
    <div class="container">
        <a href="{{ route('portfolios') }}" class="{{ !isset($category) ? 'is-active' : '' }}">{{ $isAr ? 'الكل' : 'All' }} ({{ $projectCount }})</a>
        @foreach($categories as $slug => $cat)
            <a href="{{ route('portfolios.category', $slug) }}" class="{{ (isset($categorySlug) && $categorySlug === $slug) ? 'is-active' : '' }}">{{ $cat['name'] }} ({{ $cat['count'] }})</a>
        @endforeach
    </div>
</div>

<section class="ks-section">
    <div class="container">
        @if(isset($projectsByCountry) && !isset($category))
            @foreach($projectsByCountry as $g)
                @php $hasFeat = collect($g['projects'])->contains(fn($p) => !empty($p['featured'])); @endphp
                <div class="pf-section" id="country-{{ $g['code'] }}">
                    <div class="pf-section__hd">
                        <div class="pf-flag-box"><span class="fi fi-{{ $g['code'] }} fis" role="img" aria-label="{{ $g['country_en'] }} flag"></span></div>
                        <div>
                            <h2 class="pf-section__title">{{ $g['country'] }}</h2>
                            <div class="pf-section__meta">
                                <span class="pf-section__cnt">{{ count($g['projects']) }} {{ $isAr ? 'مشروع' : (count($g['projects']) === 1 ? 'project' : 'projects') }}</span>
                                @if($hasFeat)<span class="pf-section__feat">★ {{ $isAr ? 'يحتوي مشاريع مميزة' : 'Featured inside' }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach($g['projects'] as $project)
                            @include('partials.portfolio-card', ['project' => $project])
                        @endforeach
                    </div>
                </div>
            @endforeach
        @elseif(count($projects))
            <div class="row g-4">
                @foreach($projects as $project)
                    @include('partials.portfolio-card', ['project' => $project])
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <p style="color:var(--text-3);">{{ $isAr ? 'لا توجد مشاريع في هذا التصنيف.' : 'No projects in this category.' }}</p>
                <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost mt-3">{{ $isAr ? 'كل المشاريع' : 'View all projects' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        @endif
    </div>
</section>
</div>{{-- /#pfWebsites --}}

@if(!isset($category) && !empty($apps))
<div id="pfApps" hidden>
    <section class="ks-section">
        <div class="container">
            <div class="pf-section__hd" style="margin-bottom: var(--sp-6);">
                <div class="pf-flag-box"><i class="fas fa-mobile-screen-button" style="color: var(--brand); font-size: 24px;"></i></div>
                <div>
                    <h2 class="pf-section__title">{{ $isAr ? 'تطبيقات الموبايل' : 'Mobile Apps' }}</h2>
                    <div class="pf-section__meta">
                        <span class="pf-section__cnt">{{ count($apps) }} {{ $isAr ? 'تطبيق على Google Play' : 'apps on Google Play' }}</span>
                        <span class="pf-section__feat"><i class="fab fa-google-play"></i> {{ $isAr ? 'منشوره ومباشره' : 'Published & live' }}</span>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach($apps as $app)
                    <div class="col-lg-4 col-md-6 ks-fadeup">
                        <div class="app-card">
                            <div class="app-card__top">
                                <div class="app-card__ico" style="background: {{ $app['grad'] }};"><i class="{{ $app['icon'] }}"></i></div>
                                @if(!empty($app['featured']))<span class="app-card__feat"><i class="fas fa-star"></i> {{ $isAr ? 'مميّز' : 'Featured' }}</span>@endif
                            </div>
                            <span class="app-card__cat">{{ $app['category'] }}</span>
                            <h3 class="app-card__name">{{ $app['name'] }}</h3>
                            <p class="app-card__tag">{{ $app['tagline'] }}</p>
                            <div class="app-card__foot">
                                <a href="{{ $app['store'] }}" target="_blank" rel="noopener" class="app-card__store">
                                    <i class="fab fa-google-play"></i> {{ $isAr ? 'حمّل من Google Play' : 'Google Play' }}
                                </a>
                                @if(!empty($app['website']))
                                    <a href="{{ $app['website'] }}" target="_blank" rel="noopener" class="app-card__web" aria-label="{{ $isAr ? 'الموقع' : 'Website' }}"><i class="fas fa-external-link-alt"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>{{-- /#pfApps --}}
@endif

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="home-cta ks-fadeup">
            <h2>{{ $isAr ? 'عندك فكره مشروع أو تطبيق؟' : 'Have a project or app in mind?' }}</h2>
            <p>{{ $isAr ? 'أقبل 2 إلى 3 عملاء جدد كل ربع سنة. لو عندك مشروع جاد، فلنتحدث.' : 'I take 2–3 new clients per quarter. If you have a serious project, let us talk.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'تواصل معي' : 'Contact me' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    // Reveal cards on scroll
    function reveal(scope) {
        var cards = (scope || document).querySelectorAll('.pf-card:not(.is-in), .app-card:not(.is-in)');
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e, i) {
                    if (e.isIntersecting) { setTimeout(function () { e.target.classList.add('is-in'); }, i * 40); io.unobserve(e.target); }
                });
            }, { rootMargin: '0px 0px -60px 0px', threshold: 0.05 });
            cards.forEach(function (c) { io.observe(c); });
        } else { cards.forEach(function (c) { c.classList.add('is-in'); }); }
    }
    reveal();

    // Country anchor smooth-scroll
    document.querySelectorAll('.pf-cchip[href^="#country-"]').forEach(function (chip) {
        chip.addEventListener('click', function (e) {
            var id = chip.getAttribute('href').slice(1);
            var t = document.getElementById(id);
            if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth', block: 'start' }); history.replaceState(null, '', '#' + id); }
        });
    });

    // Websites / Apps toggle
    var websites = document.getElementById('pfWebsites');
    var apps = document.getElementById('pfApps');
    var btns = document.querySelectorAll('.pf-toggle__btn');
    function setView(view) {
        btns.forEach(function (b) {
            var on = b.getAttribute('data-pf-view') === view;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        if (websites) websites.hidden = (view !== 'websites');
        if (apps) apps.hidden = (view !== 'apps');
        if (view === 'apps' && apps) reveal(apps);
        try { history.replaceState(null, '', view === 'apps' ? '#apps' : location.pathname); } catch (e) {}
    }
    btns.forEach(function (b) {
        b.addEventListener('click', function () { setView(b.getAttribute('data-pf-view')); });
    });
    // Deep-link: /portfolios#apps opens the apps view
    if (location.hash === '#apps' && apps) setView('apps');
})();
</script>
@endpush
