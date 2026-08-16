@extends('layouts.app')

@php $isAr = app()->getLocale() === 'ar'; @endphp

@php
    $catTitle = $categoryMeta['title'] ?? '';
    $catIntro = $categoryMeta['intro'] ?? '';
    $catLabel = $catTitle !== '' ? $catTitle : (isset($category) ? ucfirst($category) : '');
@endphp

@section('title', isset($category)
    ? $catLabel . ($isAr ? ' | مدونه خالد أحمد' : ' | Khaled Ahmed')
    : ($isAr ? 'مدونه تطوير الويب — Laravel و React والسيو والأداء | خالد أحمد' : 'Web Development Blog — Laravel, React, SEO & Performance | Khaled Ahmed'))
@section('description', isset($category)
    ? \Illuminate\Support\Str::limit(strip_tags($catIntro), 150)
    : ($isAr ? 'مقالات معمقه في تطوير الويب من مطور Full Stack محترف: Laravel و React و Node.js، والسيو، والأداء، والتوظيف، والأسعار.' : 'In-depth web development articles from a senior full stack developer. Laravel, React, Node.js, SEO, performance, hiring, and pricing.'))

{{-- Thin archives stay out of the index but keep passing link equity to the posts. --}}
@if(!empty($noindex))
    @section('robots', 'noindex, follow, max-image-preview:large')
@endif
@section('keywords', 'web development blog, Laravel tutorials, React tutorials, web developer Egypt, hire web developer, SEO guide, web performance, Khaled Ahmed')

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Blog","name":"Khaled Ahmed — Web Development Blog","url":"{{ route('blogs') }}","description":"In-depth web development articles by senior full stack developer Khaled Ahmed.","author":{"@type":"Person","name":"Khaled Ahmed","url":"https://khaledahmed.net"},"blogPost":[@foreach($posts as $i => $post){"@type":"BlogPosting","headline":@json($post['title']),"description":@json($post['excerpt']),"url":"{{ route('blog.show', $post['slug']) }}","datePublished":"{{ $post['date'] }}","author":{"@type":"Person","name":"Khaled Ahmed"}}@if(!$loop->last),@endif @endforeach]}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},{"@type":"ListItem","position":2,"name":"Blog","item":"{{ route('blogs') }}"}@if(isset($category)),{"@type":"ListItem","position":3,"name":@json($catLabel),"item":"{{ route('blog.category', isset($categorySlug) ? $categorySlug : $category) }}"}@endif]}
</script>
@endsection

@push('styles')
<style>
    .bl-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .bl-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events: none; }
    .bl-hero > .container { position: relative; z-index: 1; }
    .bl-hero h1 { margin: 0 0 var(--sp-3); }
    .bl-hero .lead { color: var(--text-2); font-size: 17.5px; max-width: 720px; margin: 0; }

    .bl-cats { padding: 18px 0; border-bottom: 1px solid var(--border-1); text-align: center; }
    .bl-cats a { display: inline-block; margin: 4px; padding: 7px 14px; border-radius: var(--r-full); background: var(--surface-1); border: 1px solid var(--border-1); color: var(--text-1); font-size: 13px; font-weight: 600; text-decoration: none; transition: all .2s ease; }
    .bl-cats a:hover { border-color: var(--border-3); color: var(--brand); transform: translateY(-2px); }
    .bl-cats a.is-active { background: var(--brand); color: var(--bg-1); border-color: var(--brand); }

    .bl-card { display: flex; flex-direction: column; height: 100%; padding: 28px 26px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-lg); text-decoration: none; transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; position: relative; overflow: hidden; }
    .bl-card::before { content:''; position: absolute; top: 0; inset-inline-start: 0; right: 0; height: 3px; background: var(--gradient-1); transform: scaleX(0); transform-origin: left; transition: transform .4s ease; }
    html[dir="rtl"] .bl-card::before { transform-origin: right; }
    .bl-card:hover { transform: translateY(-6px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
    .bl-card:hover::before { transform: scaleX(1); }
    .bl-card__cat { display: inline-block; font-size: 11px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; padding: 4px 10px; background: rgba(96,165,250,0.10); border: 1px solid rgba(96,165,250,0.20); border-radius: var(--r-full); margin-bottom: 14px; align-self: flex-start; }
    .bl-card__title { font-size: 18px; font-weight: 700; color: var(--text-1) !important; line-height: 1.4; margin: 0 0 10px; }
    .bl-card__meta { display: flex; align-items: center; gap: 14px; font-size: 12.5px; color: var(--text-3); margin-bottom: 12px; }
    .bl-card__meta i { color: var(--brand); font-size: 11px; }
    .bl-card__excerpt { color: var(--text-2); font-size: 14.5px; line-height: 1.65; margin: 0 0 14px; flex: 1; }
    .bl-card__more { display: inline-flex; align-items: center; gap: 6px; color: var(--brand); font-weight: 700; font-size: 13.5px; transition: gap .2s ease; }
    .bl-card:hover .bl-card__more { gap: 10px; color: var(--brand-2); }
</style>
@endpush

@section('content')

<section class="bl-hero">
    <div class="container">
        <div class="d-inline-flex align-items-center gap-2 mb-3" style="font-size:13px;color:var(--text-3);">
            <a href="{{ route('home') }}" style="color:var(--text-2);text-decoration:none;">{{ __('site.home') }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}" style="font-size:10px;color:var(--text-4);"></i>
            <span>{{ $isAr ? 'المدوّنة' : 'Blog' }}</span>
        </div>
        @if(isset($category))
            <span class="ks-eyebrow">{{ $isAr ? 'تخصص' : 'Category' }}</span>
            <h1 class="mt-3">{{ $catLabel }}</h1>
            @if($catIntro !== '')
                <p class="lead">{{ $catIntro }}</p>
            @else
                <p class="lead">{{ $isAr ? 'مقالات عمليه ومعمقه في' : 'In-depth practical articles on' }} <strong>{{ $catLabel }}</strong>.</p>
            @endif
            <p style="color:var(--text-3);font-size:14.5px;margin-top:14px;">
                {{ trans_choice(
                    $isAr ? '{1} مقال واحد في هذا القسم|{2} مقالان في هذا القسم|[3,10] :count مقالات في هذا القسم|[11,*] :count مقالا في هذا القسم'
                          : '{1} :count article in this category|[2,*] :count articles in this category',
                    count($posts), ['count' => count($posts)]
                ) }}
            </p>
        @else
            <span class="ks-eyebrow"><span class="ks-dot"></span> {{ $isAr ? 'مدوّنة تطوير الويب' : 'Web development blog' }}</span>
            <h1 class="mt-3">{{ $isAr ? 'مقالات عملية' : 'Practical articles' }} <span class="ks-grad-text">{{ $isAr ? 'لمبرمجين حقيقيين' : 'for real builders' }}</span></h1>
            <p class="lead">{{ $isAr ? 'دلائل عميقة حول Laravel و React و Node.js و SEO والأداء والتوظيف، يكتبها مطوّر ينشر في الإنتاج كل أسبوع.' : 'Deep guides on Laravel, React, Node.js, SEO, performance, and hiring — written by a senior developer who ships in production every week.' }}</p>
        @endif
    </div>
</section>

@if(!isset($category))
<div class="container" style="margin-top: calc(-1 * var(--sp-5)); margin-bottom: var(--sp-6);">
    <div class="ks-media ks-fadeup" style="max-width: 1000px; margin: 0 auto;">
        <img src="{{ asset('images/site/blog-cover.png') }}"
             alt="{{ $isAr ? 'مدوّنة تطوير الويب — مقالات Laravel و React و SEO والأداء' : 'Web development blog — Laravel, React, SEO and performance articles' }}"
             width="1536" height="1024" loading="lazy" decoding="async">
    </div>
</div>
@endif

<div class="bl-cats">
    <div class="container">
        <a href="{{ route('blogs') }}" class="{{ !isset($category) ? 'is-active' : '' }}">{{ $isAr ? 'كل المقالات' : 'All posts' }}</a>
        @foreach($categories as $slug => $cat)
            <a href="{{ route('blog.category', $slug) }}" class="{{ (isset($categorySlug) && $categorySlug === $slug) ? 'is-active' : '' }}">{{ $cat['name'] }} ({{ $cat['count'] }})</a>
        @endforeach
    </div>
</div>

<section class="ks-section">
    <div class="container">
        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 ks-fadeup">
                    <a href="{{ route('blog.show', $post['slug']) }}" class="bl-card">
                        <span class="bl-card__cat">{{ $post['category'] }}</span>
                        <h3 class="bl-card__title">{{ $post['title'] }}</h3>
                        <div class="bl-card__meta">
                            <span><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($post['date'])->locale(app()->getLocale())->translatedFormat($isAr ? 'd F Y' : 'M d, Y') }}</span>
                            <span><i class="far fa-clock"></i> {{ $post['read_time'] }}</span>
                        </div>
                        <p class="bl-card__excerpt">{{ $post['excerpt'] }}</p>
                        <span class="bl-card__more">{{ $isAr ? 'اقرأ المقال' : 'Read article' }} <i class="fas fa-arrow-{{ $isAr ? 'left' : 'right' }}"></i></span>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="home-cta ks-fadeup" style="margin-top: var(--sp-9);">
            <h2>{{ $isAr ? 'تحتاج مطوّر ويب خبير لمشروعك؟' : 'Need a senior developer for your project?' }}</h2>
            <p>{{ $isAr ? 'استشارة مجانية وعرض ثابت السعر خلال 24 ساعة.' : 'Free consultation and fixed-fee quote within 24 hours.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'تواصل معي' : 'Contact me' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection
