@extends('layouts.app')

@php
    $isAr    = app()->getLocale() === 'ar';
    $offline = !empty($portfolio['offline']);
    $catSlug = \App\Services\PortfolioService::categorySlug($portfolio['category_en'] ?? $portfolio['category']);
    $stack   = $portfolio['tech'] ?? [];
    $apps    = $portfolio['apps'] ?? [];

    // The listing already carries a tight bilingual summary; reusing it as the meta
    // description keeps the snippet and the page's own lead paragraph consistent.
    $khDesc  = $portfolio['summary'];
    $khTitle = $isAr
        ? $portfolio['title'] . ' — دراسة حالة | خالد أحمد'
        : $portfolio['title'] . ' — Case Study | Khaled Ahmed';

    $khKeywords = trim(($portfolio['keywords'] ?? '') . ', ' . implode(', ', $stack));
    $khShot     = \App\Services\ScreenshotService::large($portfolio['slug']);
@endphp

@section('title', $khTitle)
@section('description', $khDesc)
@section('keywords', $khKeywords)
@section('og_type', 'article')
@section('og_title', $portfolio['title'])
@section('og_description', $khDesc)
@if($khShot)
@section('lcp_image', asset($khShot['src']))
@section('og_image', asset($khShot['src']))
@section('og_image_alt', $portfolio['title'])
@endif

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"CreativeWork","name":@json($portfolio['title']),"description":@json($khDesc),"inLanguage":"{{ $isAr ? 'ar' : 'en' }}","genre":@json($portfolio['category']),"keywords":@json($khKeywords),"locationCreated":{"@type":"Place","name":@json($portfolio['country'])},"creator":{"@type":"Person","name":"Khaled Ahmed","url":"https://khaledahmed.net","jobTitle":"Senior Full Stack Web Developer","sameAs":["https://linkedin.com/in/khaled-ahmed-82368819b","https://github.com/khaled312001"]}@if(!$offline),"url":@json($portfolio['url'])@endif,"mainEntityOfPage":{"@type":"WebPage","@id":"{{ route('portfolio.show', $portfolio['slug']) }}"}@if($khShot),"image":{"@type":"ImageObject","url":"{{ asset($khShot['src']) }}","width":{{ $khShot['w'] }},"height":{{ $khShot['h'] }}}@endif @if(!empty($stack)),"about":[@foreach($stack as $t){"@type":"Thing","name":@json($t)}@if(!$loop->last),@endif @endforeach]@endif}
</script>
@if(!empty($apps))
{{-- The Play Store releases are separate entities from the web platform. Declaring them
     lets a project page surface for app-related queries, not only web-development ones. --}}
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"ItemList","name":@json($portfolio['title'] . ($isAr ? ' — التطبيقات' : ' — mobile apps')),"itemListElement":[@foreach($apps as $i => $a){"@type":"ListItem","position":{{ $i + 1 }},"item":{"@type":"SoftwareApplication","name":@json($portfolio['title'] . ' — ' . $a['name']),"operatingSystem":"Android","applicationCategory":"BusinessApplication","installUrl":@json($a['url']),"author":{"@type":"Person","name":"Khaled Ahmed"}}}@if(!$loop->last),@endif @endforeach]}
</script>
@endif
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"{{ $isAr ? 'الرئيسية' : 'Home' }}","item":"{{ route('home') }}"},{"@type":"ListItem","position":2,"name":"{{ $isAr ? 'الأعمال' : 'Portfolio' }}","item":"{{ route('portfolios') }}"},{"@type":"ListItem","position":3,"name":@json($portfolio['category']),"item":"{{ route('portfolios.category', $catSlug) }}"},{"@type":"ListItem","position":4,"name":@json($portfolio['title']),"item":"{{ route('portfolio.show', $portfolio['slug']) }}"}]}
</script>
@endsection

@push('styles')
@include('partials.flag-css')
<style>
    .pj-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-6); position: relative; overflow: hidden; }
    .pj-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events:none; }
    .pj-hero > .container { position: relative; z-index: 1; }
    .pj-bread { display:flex; align-items:center; gap:8px; font-size:13px; color:var(--text-3); margin-bottom:var(--sp-4); flex-wrap:wrap; }
    .pj-bread a { color:var(--text-2); text-decoration:none; }
    .pj-bread a:hover { color:var(--brand); }
    .pj-bread i { font-size:10px; color:var(--text-4); }
    .pj-bread span[aria-current] { color:var(--text-3); }

    .pj-badges { display:flex; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:var(--sp-4); }
    .pj-badge { display:inline-flex; align-items:center; gap:7px; font-size:12px; font-weight:700; letter-spacing:.6px; text-transform:uppercase; padding:6px 13px; border-radius:var(--r-full); }
    .pj-badge--cat { color:var(--brand); background:rgba(96,165,250,.10); border:1px solid rgba(96,165,250,.22); text-decoration:none; transition:background .2s ease; }
    .pj-badge--cat:hover { background:rgba(96,165,250,.18); color:var(--brand-2); }
    .pj-badge--geo { color:var(--text-2); background:var(--surface-1); border:1px solid var(--border-1); text-transform:none; letter-spacing:0; font-weight:600; }
    .pj-badge--geo .fi, .pj-facts .fi { width: 19px; height: 14px; border-radius: 2px; display: inline-block; vertical-align: -2px; box-shadow: 0 0 0 1px rgba(255,255,255,.10); }
    .pj-badge--live { color:#34d399; background:rgba(52,211,153,.10); border:1px solid rgba(52,211,153,.24); }
    .pj-badge--off { color:#fbbf24; background:rgba(251,191,36,.10); border:1px solid rgba(251,191,36,.24); }
    .pj-badge--feat { color:var(--accent); background:rgba(167,139,250,.10); border:1px solid rgba(167,139,250,.24); }

    .pj-hero h1 { color:var(--text-1); font-size:clamp(27px,3.6vw,44px); line-height:1.16; margin:0 0 var(--sp-4); max-width:940px; letter-spacing:-.015em; }
    .pj-sum { font-size:clamp(16px,1.5vw,18.5px); line-height:1.75; color:var(--text-2); max-width:760px; margin:0; }

    /* Screenshot. Same pan mechanic as the listing cards: the frame is a fixed
       aspect ratio and the capture slides through it by exactly the overflow, which
       ScreenshotService precomputes as a percentage of the image's own height. */
    /* The <figure> is a plain wrapper so the caption sits outside the clipped area;
       the frame is the inner element that crops and pans the capture. */
    .pj-shot { margin: 0 0 var(--sp-6); }
    .pj-shot__frame { position: relative; aspect-ratio: 16 / 9; overflow: hidden; border-radius: var(--r-lg); border: 1px solid var(--border-1); background: var(--bg-2); }
    .pj-shot__frame img { display: block; width: 100%; height: auto; transform: translateY(0); transition: transform .7s cubic-bezier(.4, 0, .2, 1); }
    .pj-shot__frame:hover img, .pj-shot__frame.is-panning img { transition-duration: var(--dur, 8s); transition-timing-function: cubic-bezier(.42, 0, .3, 1); }
    .pj-shot__frame:hover img, .pj-shot__frame.is-panning img { transform: translateY(calc(-1 * var(--shift, 0%))); }
    .pj-shot__hint { position: absolute; inset-inline-end: 12px; bottom: 12px; z-index: 2; display: inline-flex; align-items: center; gap: 7px; padding: 7px 13px; border-radius: var(--r-full); background: rgba(10,14,26,.82); border: 1px solid var(--border-2); color: var(--text-2); font-size: 12px; font-weight: 600; backdrop-filter: blur(6px); transition: opacity .4s ease; }
    .pj-shot__frame:hover .pj-shot__hint, .pj-shot__frame.is-panning .pj-shot__hint { opacity: 0; }
    .pj-shot__fade { position: absolute; inset-inline: 0; bottom: 0; height: 60px; background: linear-gradient(to top, rgba(10,14,26,.85), rgba(10,14,26,0)); pointer-events: none; transition: opacity .5s ease; }
    .pj-shot__frame:hover .pj-shot__fade, .pj-shot__frame.is-panning .pj-shot__fade { opacity: 0; }
    .pj-shot__cap { margin-top: 11px; font-size: 13px; line-height: 1.65; color: var(--text-4); }
    @media (prefers-reduced-motion: reduce) {
        .pj-shot__frame img { transition: none; }
        .pj-shot__frame:hover img, .pj-shot__frame.is-panning img { transform: none; }
    }

    /* Body */
    .pj-body { padding:var(--sp-7) 0 var(--sp-6); }
    .pj-grid { display:grid; grid-template-columns:minmax(0,1fr) 330px; gap:var(--sp-7); align-items:start; }
    @media (max-width:991px) { .pj-grid { grid-template-columns:minmax(0,1fr); gap:var(--sp-6); } }

    .pj-main { font-size:17px; line-height:1.85; color:var(--text-2); }
    .pj-lead { font-size:19px; line-height:1.8; color:var(--text-1); padding:22px 26px; background:rgba(96,165,250,.06); border-inline-start:4px solid var(--brand); border-radius:var(--r-md); margin:0 0 var(--sp-6); }
    .pj-h2 { color:var(--text-1); font-size:clamp(21px,2.4vw,28px); font-weight:800; letter-spacing:-.01em; margin:0 0 var(--sp-4); padding-bottom:12px; border-bottom:1px solid var(--border-1); }
    .pj-sec { margin-bottom:var(--sp-7); }
    .pj-sec:last-child { margin-bottom:0; }

    .pj-built { list-style:none; margin:0; padding:0; display:grid; gap:12px; }
    .pj-built li { display:flex; gap:13px; align-items:flex-start; padding:15px 18px; background:var(--surface-1); border:1px solid var(--border-1); border-radius:var(--r-md); color:var(--text-2); font-size:16px; line-height:1.65; }
    .pj-built i { color:#34d399; font-size:14px; margin-top:5px; flex-shrink:0; }

    .pj-note { padding:24px 28px; background:rgba(167,139,250,.055); border:1px solid rgba(167,139,250,.22); border-radius:var(--r-lg); }
    .pj-note p { margin:0 0 16px; color:var(--text-2); }
    .pj-note p:last-child { margin-bottom:0; }

    .pj-stackrow { display:flex; flex-wrap:wrap; gap:9px; }
    .pj-stackrow span { padding:8px 15px; background:var(--surface-1); border:1px solid var(--border-2); border-radius:var(--r-full); color:var(--text-1); font-size:13.5px; font-weight:600; font-family:var(--font-mono); }

    /* Sidebar */
    .pj-side { position:sticky; top:calc(var(--nav-h) + 20px); display:grid; gap:var(--sp-4); }
    @media (max-width:991px) { .pj-side { position:static; } }
    .pj-card { background:var(--surface-1); border:1px solid var(--border-1); border-radius:var(--r-lg); padding:24px; }
    .pj-card__t { font-size:12px; font-weight:800; letter-spacing:1.2px; text-transform:uppercase; color:var(--text-3); margin:0 0 16px; }
    .pj-facts { list-style:none; margin:0; padding:0; }
    .pj-facts li { display:flex; justify-content:space-between; gap:14px; padding:11px 0; border-bottom:1px solid var(--border-1); font-size:14px; }
    .pj-facts li:last-child { border-bottom:none; padding-bottom:0; }
    .pj-facts dt, .pj-facts .k { color:var(--text-3); flex-shrink:0; }
    .pj-facts .v { color:var(--text-1); font-weight:600; text-align:end; }

    .pj-links { display:grid; gap:10px; }
    .pj-link { display:flex; align-items:center; gap:11px; padding:13px 16px; border-radius:var(--r-md); font-size:14.5px; font-weight:600; text-decoration:none; border:1px solid var(--border-1); background:var(--bg-2); color:var(--text-1); transition:border-color .2s ease, transform .2s ease; }
    .pj-link:hover { border-color:var(--border-3); transform:translateY(-2px); color:var(--brand); }
    .pj-link i:first-child { color:var(--brand); width:16px; text-align:center; }
    .pj-link--play i:first-child { color:#34d399; }
    .pj-link__go { margin-inline-start:auto; font-size:11px; color:var(--text-4); }
    .pj-dead { padding:14px 16px; border-radius:var(--r-md); background:rgba(251,191,36,.07); border:1px solid rgba(251,191,36,.22); color:var(--text-2); font-size:13.5px; line-height:1.6; }

    /* Related */
    .pj-rel { padding:var(--sp-6) 0 var(--sp-8); border-top:1px solid var(--border-1); }
    .pj-rel h2 { font-size:clamp(20px,2.2vw,26px); color:var(--text-1); margin:0 0 var(--sp-5); font-weight:800; }
    .pj-relgrid { display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:var(--sp-4); }
    .pj-relcard { display:flex; flex-direction:column; gap:9px; padding:22px; background:var(--surface-1); border:1px solid var(--border-1); border-radius:var(--r-lg); text-decoration:none; transition:transform .25s ease, border-color .25s ease; }
    .pj-relcard:hover { transform:translateY(-4px); border-color:var(--border-3); }
    .pj-relcard__c { font-size:11.5px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:var(--brand); }
    .pj-relcard__t { font-size:16.5px; font-weight:700; color:var(--text-1); line-height:1.4; margin:0; }
    .pj-relcard__s { font-size:14px; color:var(--text-3); line-height:1.6; margin:0; }
</style>
@endpush

@section('content')

<section class="pj-hero">
    <div class="container">
        <nav class="pj-bread" aria-label="{{ $isAr ? 'مسار التنقل' : 'Breadcrumb' }}">
            <a href="{{ route('home') }}">{{ $isAr ? 'الرئيسية' : 'Home' }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}"></i>
            <a href="{{ route('portfolios') }}">{{ $isAr ? 'الأعمال' : 'Portfolio' }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}"></i>
            <a href="{{ route('portfolios.category', $catSlug) }}">{{ $portfolio['category'] }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}"></i>
            <span aria-current="page">{{ $portfolio['title'] }}</span>
        </nav>

        <div class="pj-badges">
            <a class="pj-badge pj-badge--cat" href="{{ route('portfolios.category', $catSlug) }}">{{ $portfolio['category'] }}</a>
            <span class="pj-badge pj-badge--geo">@include('partials.flag', ['p' => $portfolio]) {{ $portfolio['country'] }}</span>
            @if($offline)
                <span class="pj-badge pj-badge--off"><i class="fas fa-circle-minus"></i> {{ $isAr ? 'الموقع متوقف حاليا' : 'Currently offline' }}</span>
            @else
                <span class="pj-badge pj-badge--live"><i class="fas fa-circle-check"></i> {{ $isAr ? 'يعمل الآن' : 'Live in production' }}</span>
            @endif
            @if(!empty($portfolio['featured']))
                <span class="pj-badge pj-badge--feat"><i class="fas fa-star"></i> {{ $isAr ? 'مميّز' : 'Featured' }}</span>
            @endif
        </div>

        <h1>{{ $portfolio['title'] }}</h1>
        <p class="pj-sum">{{ $portfolio['summary'] }}</p>
    </div>
</section>

<section class="pj-body">
    <div class="container">
        <div class="pj-grid">

            <div class="pj-main">
                @if($khShot)
                    <figure class="pj-shot">
                        <div class="pj-shot__frame" style="--shift:{{ $khShot['shift'] }};--dur:{{ $khShot['dur'] }}">
                            <img src="{{ asset($khShot['src']) }}"
                                 width="{{ $khShot['w'] }}" height="{{ $khShot['h'] }}"
                                 fetchpriority="high" decoding="async"
                                 alt="{{ $isAr
                                    ? 'لقطة شاشة كاملة للصفحة الرئيسية لموقع ' . $portfolio['title'] . ' — مشروع ' . $portfolio['category'] . ' في ' . $portfolio['country'] . ' مبني بـ ' . implode(' و', array_slice($stack, 0, 3)) . ' من تطوير خالد أحمد'
                                    : 'Full-page screenshot of the ' . $portfolio['title'] . ' homepage — ' . $portfolio['category'] . ' project in ' . $portfolio['country'] . ' built with ' . implode(', ', array_slice($stack, 0, 3)) . ' by Khaled Ahmed' }}">
                            <span class="pj-shot__fade"></span>
                            <span class="pj-shot__hint" aria-hidden="true">
                                <i class="fas fa-up-down"></i>
                                {{ $isAr ? 'مرّر لعرض الصفحة كاملة' : 'Hover or scroll for the full page' }}
                            </span>
                        </div>
                        {{-- A real caption, not only the interaction hint: a figcaption is a
                             stronger signal about image content than alt, and it tells a reader
                             what they are looking at. --}}
                        <figcaption class="pj-shot__cap">
                            {{ $isAr
                                ? 'الصفحة الرئيسية لموقع ' . $portfolio['title'] . ' كما تظهر مباشرة — ' . $portfolio['category'] . ' · ' . $portfolio['country'] . ' · ' . implode('، ', array_slice($stack, 0, 4))
                                : $portfolio['title'] . ' homepage as it renders live — ' . $portfolio['category'] . ' · ' . $portfolio['country'] . ' · ' . implode(', ', array_slice($stack, 0, 4)) }}
                        </figcaption>
                    </figure>
                @endif

                @if(!empty($portfolio['lead']))
                    <p class="pj-lead">{{ $portfolio['lead'] }}</p>
                @endif

                @if(!empty($portfolio['built']))
                <div class="pj-sec">
                    <h2 class="pj-h2">{{ $isAr ? 'ما الذي بنيته' : 'What I built' }}</h2>
                    <ul class="pj-built">
                        @foreach($portfolio['built'] as $item)
                            <li><i class="fas fa-check"></i><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(!empty($portfolio['decision']))
                <div class="pj-sec">
                    <h2 class="pj-h2">{{ $isAr ? 'القرار الهندسي' : 'The engineering decision' }}</h2>
                    <div class="pj-note">
                        @foreach($portfolio['decision'] as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!empty($stack))
                <div class="pj-sec">
                    <h2 class="pj-h2">{{ $isAr ? 'التقنيات المستخدمة' : 'Technologies used' }}</h2>
                    <div class="pj-stackrow">
                        @foreach($stack as $t)<span>{{ $t }}</span>@endforeach
                    </div>
                </div>
                @endif
            </div>

            <aside class="pj-side">
                <div class="pj-card">
                    <h2 class="pj-card__t">{{ $isAr ? 'تفاصيل المشروع' : 'Project details' }}</h2>
                    <ul class="pj-facts">
                        <li><span class="k">{{ $isAr ? 'دوري' : 'Role' }}</span><span class="v">{{ $portfolio['role'] }}</span></li>
                        <li><span class="k">{{ $isAr ? 'التصنيف' : 'Category' }}</span><span class="v">{{ $portfolio['category'] }}</span></li>
                        <li><span class="k">{{ $isAr ? 'الدولة' : 'Country' }}</span><span class="v">@include('partials.flag', ['p' => $portfolio]) {{ $portfolio['country'] }}</span></li>
                        <li><span class="k">{{ $isAr ? 'لغة الواجهة' : 'Interface' }}</span><span class="v">{{ ($portfolio['language'] ?? 'en') === 'ar' ? ($isAr ? 'العربية' : 'Arabic') : ($isAr ? 'الإنجليزية' : 'English') }}</span></li>
                        @if(!empty($apps))
                            <li><span class="k">{{ $isAr ? 'تطبيقات الجوال' : 'Mobile apps' }}</span><span class="v">{{ count($apps) }}</span></li>
                        @endif
                        <li><span class="k">{{ $isAr ? 'الحالة' : 'Status' }}</span><span class="v">{{ $offline ? ($isAr ? 'متوقف' : 'Offline') : ($isAr ? 'يعمل' : 'Live') }}</span></li>
                    </ul>
                </div>

                <div class="pj-card">
                    <h2 class="pj-card__t">{{ $isAr ? 'روابط' : 'Links' }}</h2>
                    <div class="pj-links">
                        @if($offline)
                            <p class="pj-dead">{{ $isAr
                                ? 'الموقع المباشر لهذا المشروع متوقف حاليا من جهة العميل. أُبقيه هنا لأن العمل نُفّذ وسُلّم فعلا.'
                                : 'The live site for this project is currently down on the client side. It stays listed here because the work was built and delivered.' }}</p>
                        @else
                            <a class="pj-link" href="{{ $portfolio['url'] }}" target="_blank" rel="noopener nofollow">
                                <i class="fas fa-external-link-alt"></i>
                                <span>{{ $isAr ? 'زيارة الموقع' : 'Visit the live site' }}</span>
                                <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }} pj-link__go"></i>
                            </a>
                        @endif

                        @foreach($apps as $a)
                            <a class="pj-link pj-link--play" href="{{ $a['url'] }}" target="_blank" rel="noopener nofollow">
                                <i class="fab fa-google-play"></i>
                                <span>{{ $a['name'] }}</span>
                                <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }} pj-link__go"></i>
                            </a>
                        @endforeach

                        <a class="pj-link" href="{{ route('portfolios.category', $catSlug) }}">
                            <i class="fas fa-layer-group"></i>
                            <span>{{ $isAr ? 'مشاريع مشابهة' : 'More ' . strtolower($portfolio['category']) . ' work' }}</span>
                            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }} pj-link__go"></i>
                        </a>
                    </div>
                </div>

                <div class="pj-card">
                    <h2 class="pj-card__t">{{ $isAr ? 'مشروع مشابه؟' : 'Need something like this?' }}</h2>
                    <p style="font-size:14.5px; line-height:1.7; color:var(--text-2); margin:0 0 16px;">
                        {{ $isAr
                            ? 'أقبل 2 إلى 3 عملاء جدد كل ربع سنة. لو عندك مشروع جاد، احك لي عنه.'
                            : 'I take on 2–3 new clients per quarter. If you have a serious project, tell me about it.' }}
                    </p>
                    <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary" style="width:100%; justify-content:center;">
                        {{ $isAr ? 'تواصل معي' : 'Start a conversation' }} <i class="fa fa-arrow-{{ $isAr ? 'left' : 'right' }}"></i>
                    </a>
                </div>
            </aside>

        </div>
    </div>
</section>

@if(!empty($related))
<section class="pj-rel">
    <div class="container">
        <h2>{{ $isAr ? 'مشاريع أخرى' : 'Other projects' }}</h2>
        <div class="pj-relgrid">
            @foreach($related as $r)
                <a class="pj-relcard" href="{{ route('portfolio.show', $r['slug']) }}">
                    <span class="pj-relcard__c">{{ $r['category'] }} · {{ $r['country'] }}</span>
                    <h3 class="pj-relcard__t">{{ $r['title'] }}</h3>
                    <p class="pj-relcard__s">{{ \Illuminate\Support\Str::limit($r['summary'], 110) }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
(function () {
    var shot = document.querySelector('.pj-shot__frame');
    if (!shot || !('IntersectionObserver' in window)) return;
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    // See the listing page: the transition needs a painted starting frame, and the
    // observer fires before the screenshot has rendered on a first load.
    function arm() {
        if (shot.classList.contains('is-panning')) return;
        var img = shot.querySelector('img');
        var go = function () {
            requestAnimationFrame(function () {
                requestAnimationFrame(function () { shot.classList.add('is-panning'); });
            });
        };
        if (!img || img.complete) go();
        else img.addEventListener('load', go, { once: true });
    }
    new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) arm();
            else shot.classList.remove('is-panning');
        });
    }, { threshold: 0.5 }).observe(shot);
})();
</script>
@endpush
