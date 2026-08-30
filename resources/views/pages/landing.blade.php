@extends('layouts.app')

@php
    $isAr = app()->getLocale() === 'ar';
    // $page is the landing data array; localized fields resolved here.
    $h1      = $isAr && !empty($page['h1_ar'])      ? $page['h1_ar']      : $page['h1'];
    $heroSub = $isAr && !empty($page['hero_sub_ar'])? $page['hero_sub_ar']: $page['hero_sub'];
    $intro   = $isAr && !empty($page['intro_html_ar']) ? $page['intro_html_ar'] : $page['intro_html'];
    $why     = $isAr && !empty($page['why_html_ar'])   ? $page['why_html_ar']   : $page['why_html'];
    $deliver = $isAr && !empty($page['deliverables_ar']) ? $page['deliverables_ar'] : $page['deliverables'];
    $faq     = $isAr && !empty($page['faq_ar']) ? $page['faq_ar'] : $page['faq'];
    $mTitle  = $isAr && !empty($page['meta_title_ar']) ? $page['meta_title_ar'] : $page['meta_title'];
    $mDesc   = $isAr && !empty($page['meta_description_ar']) ? $page['meta_description_ar'] : $page['meta_description'];
    $related = $related ?? [];
@endphp

@section('title', $mTitle)
@section('description', $mDesc)
@section('keywords', $page['keywords'] ?? '')

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Service","serviceType":@json($page['service_type'] ?? $page['h1']),"provider":{"@type":"Person","name":"Khaled Ahmed","jobTitle":"Senior Full Stack Web Developer","url":"https://khaledahmed.net","sameAs":["https://linkedin.com/in/khaled-ahmed-82368819b","https://github.com/khaled312001"]},"areaServed":["SA","AE","KW","QA","EG","GB","US","DE","CH","FR"],"url":"https://khaledahmed.net/{{ $page['slug'] }}","description":@json($page['meta_description'])}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[@foreach(($faq ?? []) as $i => $f){"@type":"Question","name":@json($f['q']),"acceptedAnswer":{"@type":"Answer","text":@json($f['a'])}}@if(!$loop->last),@endif @endforeach]}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},{"@type":"ListItem","position":2,"name":"Services","item":"{{ route('services') }}"},{"@type":"ListItem","position":3,"name":@json($page['h1']),"item":"{{ route('landing', $page['slug']) }}"}]}
</script>
@endsection

@push('styles')
<style>
    .lp-hero { padding: calc(var(--nav-h) + var(--sp-8)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .lp-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events:none; }
    .lp-hero::after { content:''; position:absolute; inset:0; background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 28px 28px; opacity:.5; pointer-events:none; }
    .lp-hero > .container { position: relative; z-index: 1; }
    .lp-hero h1 { margin: 0 0 var(--sp-4); max-width: 900px; }
    .lp-hero .lp-sub { color: var(--text-2); font-size: 18px; line-height: 1.6; max-width: 720px; margin: 0 0 var(--sp-6); }
    .lp-hero .home-cta__row, .lp-cta-row { display: flex; gap: 12px; flex-wrap: wrap; }

    .lp-intro { font-size: 17px; line-height: 1.85; color: var(--text-2); max-width: 860px; }
    .lp-intro p { margin: 0 0 var(--sp-4); }

    .lp-deliver { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 14px; }
    @media (max-width: 768px){ .lp-deliver { grid-template-columns: 1fr; } }
    .lp-deliver__item { display: flex; gap: 12px; align-items: flex-start; padding: 16px 18px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); transition: border-color .2s ease, transform .2s ease; }
    .lp-deliver__item:hover { border-color: var(--border-3); transform: translateY(-2px); }
    .lp-deliver__item i { flex-shrink: 0; color: var(--success); font-size: 15px; margin-top: 3px; }
    .lp-deliver__item span { color: var(--text-2); font-size: 14.5px; line-height: 1.55; }

    .lp-tech { display: flex; flex-wrap: wrap; gap: 10px; }
    .lp-tech span { padding: 9px 16px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-full); color: var(--text-1); font-size: 13.5px; font-weight: 600; }

    .lp-why { font-size: 16.5px; line-height: 1.85; color: var(--text-2); max-width: 860px; }
    .lp-why p { margin: 0 0 var(--sp-4); }

    .lp-faq details { background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); margin-bottom: 10px; transition: border-color .2s ease; }
    .lp-faq details[open], .lp-faq details:hover { border-color: var(--border-3); }
    .lp-faq summary { cursor: pointer; padding: 18px 22px; font-weight: 600; color: var(--text-1); list-style: none; display: flex; justify-content: space-between; align-items: center; gap: 14px; font-size: 15.5px; }
    .lp-faq summary::-webkit-details-marker { display: none; }
    .lp-faq summary::after { content: '+'; font-size: 22px; color: var(--brand); line-height: 1; flex-shrink: 0; }
    .lp-faq details[open] summary::after { content: '−'; }
    .lp-faq .ans { padding: 0 22px 20px; color: var(--text-2); line-height: 1.75; font-size: 15px; }

    .lp-related-card { display:flex; flex-direction:column; height:100%; padding: 22px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); border-inline-start: 3px solid var(--brand); text-decoration: none; transition: all .2s ease; }
    .lp-related-card:hover { transform: translateY(-3px); border-color: var(--border-3); }
    .lp-related-card .cat { font-size: 11px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
    .lp-related-card h3 { font-size: 16px; color: var(--text-1); margin: 0 0 6px; line-height: 1.4; }
    .lp-related-card p { font-size: 13px; color: var(--text-3); margin: 0; }
</style>
@endpush

@section('content')

<section class="lp-hero">
    <div class="container">
        <div class="d-inline-flex align-items-center gap-2 mb-3" style="font-size:13px;color:var(--text-3);">
            <a href="{{ route('home') }}" style="color:var(--text-2);text-decoration:none;">{{ __('site.home') }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}" style="font-size:10px;color:var(--text-4);"></i>
            <a href="{{ route('services') }}" style="color:var(--text-2);text-decoration:none;">{{ $isAr ? 'الخدمات' : 'Services' }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}" style="font-size:10px;color:var(--text-4);"></i>
            <span>{{ $isAr ? ($page['nav_ar'] ?? $page['nav'] ?? '') : ($page['nav'] ?? '') }}</span>
        </div>
        <span class="ks-eyebrow"><span class="ks-dot"></span> {{ $isAr ? 'متاح لمشاريع جديدة' : 'Available for new projects' }}</span>
        <h1 class="mt-3">{{ $h1 }}</h1>
        <p class="lp-sub">{{ $heroSub }}</p>
        <div class="lp-cta-row">
            <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'احصل على عرض سعر' : 'Get a free quote' }} <i class="fa fa-arrow-right"></i></a>
            <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost">{{ $isAr ? 'شاهد أعمالي' : 'See my work' }} <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="ks-stats mt-5" style="max-width:720px;">
            <div class="ks-stat"><div class="ks-stat__num">39+</div><div class="ks-stat__lbl">{{ $isAr ? 'مشروع' : 'Projects' }}</div></div>
            <div class="ks-stat"><div class="ks-stat__num">8</div><div class="ks-stat__lbl">{{ $isAr ? 'دول' : 'Countries' }}</div></div>
            <div class="ks-stat"><div class="ks-stat__num">5+</div><div class="ks-stat__lbl">{{ $isAr ? 'سنوات' : 'Years' }}</div></div>
            <div class="ks-stat"><div class="ks-stat__num">24h</div><div class="ks-stat__lbl">{{ $isAr ? 'رد' : 'Response' }}</div></div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        @if(!empty($page['image']))
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <div class="lp-intro ks-fadeup">{!! $intro !!}</div>
                </div>
                <div class="col-lg-5">
                    <div class="ks-media ks-fadeup">
                        <img src="{{ asset('images/' . $page['image']) }}"
                             alt="{{ $page['image_alt'] ?? $page['h1'] }}"
                             width="1536" height="1024" loading="lazy" decoding="async">
                    </div>
                </div>
            </div>
        @else
            <div class="lp-intro ks-fadeup">{!! $intro !!}</div>
        @endif
    </div>
</section>

<section class="ks-section ks-section--tight" style="background: rgba(255,255,255,0.02);">
    <div class="container">
        <div class="ks-shead" style="text-align:start;margin-bottom:var(--sp-5);">
            <h2>{{ $isAr ? 'ما الذي تحصل عليه' : 'What you get' }}</h2>
        </div>
        <div class="lp-deliver ks-fadeup">
            @foreach($deliver as $d)
                <div class="lp-deliver__item"><i class="fas fa-check-circle"></i> <span>{{ $d }}</span></div>
            @endforeach
        </div>
        <div class="mt-5">
            <h3 style="font-size:18px;margin-bottom:16px;">{{ $isAr ? 'التقنيات المستخدمة' : 'Tech stack' }}</h3>
            <div class="lp-tech">
                @foreach(($page['tech'] ?? []) as $t)<span>{{ $t }}</span>@endforeach
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="ks-shead" style="text-align:start;margin-bottom:var(--sp-5);">
            <h2>{{ $isAr ? 'لماذا تعمل معي' : 'Why work with me' }}</h2>
        </div>
        <div class="lp-why ks-fadeup">{!! $why !!}</div>
    </div>
</section>

@if(count($related))
<section class="ks-section ks-section--tight" style="background: rgba(255,255,255,0.02);">
    <div class="container">
        <div class="ks-shead" style="text-align:start;margin-bottom:var(--sp-5);">
            <h2>{{ $isAr ? 'أعمال ذات صلة' : 'Related work' }}</h2>
            <p style="margin:0;">{{ $isAr ? 'مشاريع حقيقية منشورة في نفس المجال.' : 'Real shipped projects in this space.' }}</p>
        </div>
        <div class="row g-4">
            @foreach($related as $rp)
                <div class="col-lg-4 col-md-6 ks-fadeup">
                    @php $rpOff = !empty($rp['offline']); @endphp
                    <{{ $rpOff ? 'div' : 'a' }} @if(!$rpOff) href="{{ $rp['url'] }}" target="_blank" rel="noopener" @endif class="lp-related-card" @if($rpOff) style="cursor:default;opacity:.82;" @endif>
                        <span class="cat">{{ $rp['category'] }} · {{ $rp['country'] }}</span>
                        <h3>{{ $rp['title'] }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($rp['summary'], 90) }}</p>
                        @if($rpOff)
                            <p style="margin-top:8px;color:var(--text-4);font-size:12px;font-weight:600;">{{ $isAr ? 'الموقع غير متاح حاليا' : 'Site is currently offline' }}</p>
                        @endif
                    </{{ $rpOff ? 'div' : 'a' }}>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@php
    // Supporting posts for this pillar. Landing pages are the most crawl-trusted URLs on
    // the domain and previously linked only outward to client sites, leaving the blog
    // posts with almost no internal equity — a main cause of Crawled-not-indexed.
    $guideSlugs = $page['related_posts'] ?? [];
    $guides = [];
    foreach ($guideSlugs as $gs) {
        if ($g = \App\Services\BlogService::find($gs)) { $guides[] = $g; }
    }
@endphp
@if(count($guides))
<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="ks-shead" style="text-align:start;margin-bottom:var(--sp-5);">
            <span class="ks-eyebrow">{{ $isAr ? 'اقرأ أيضا' : 'Read next' }}</span>
            <h2>{{ $isAr ? 'أدله معمقه في هذا المجال' : 'In-depth guides on this' }}</h2>
            <p style="margin:0;">{{ $isAr ? 'مقالات عمليه تشرح القرارات والتكاليف قبل أن تتعاقد مع أي شخص.' : 'Practical articles on the decisions and the costs, before you hire anyone.' }}</p>
        </div>
        <div class="row g-4">
            @foreach($guides as $g)
                <div class="col-lg-4 col-md-6 ks-fadeup">
                    <a href="{{ route('blog.show', $g['slug']) }}" class="lp-related-card">
                        <span class="cat">{{ $g['category'] }} · {{ $g['read_time'] }}</span>
                        <h3>{{ $g['title'] }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($g['excerpt']), 100) }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div style="margin-top:var(--sp-5);">
            <a href="{{ route('blogs') }}" class="ks-btn ks-btn--ghost">{{ $isAr ? 'كل المقالات' : 'All articles' }} <i class="fa fa-arrow-{{ $isAr ? 'left' : 'right' }}"></i></a>
        </div>
    </div>
</section>
@endif

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="ks-shead" style="margin-bottom:var(--sp-5);">
            <span class="ks-eyebrow">{{ $isAr ? 'أسئلة شائعة' : 'FAQ' }}</span>
            <h2>{{ $isAr ? 'أسئلة قبل التعاقد' : 'Questions before you hire' }}</h2>
        </div>
        <div class="lp-faq" style="max-width:820px;margin:0 auto;">
            @foreach($faq as $i => $f)
                <details @if($i === 0) open @endif>
                    <summary>{{ $f['q'] }}</summary>
                    <div class="ans">{{ $f['a'] }}</div>
                </details>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="home-cta ks-fadeup">
            <h2>{{ $isAr ? 'جاهز نبدأ مشروعك؟' : 'Ready to start your project?' }}</h2>
            <p>{{ $isAr ? 'ابعتلي تفاصيل المشروع وهترد عليك خلال 24 ساعة بعرض مكتوب وخطه واضحه. استشاره أولى مجانية.' : 'Send your brief. You will get a written quote and a clear plan within 24 hours. First consultation is free.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'احجز استشاره مجانية' : 'Book a free consultation' }} <i class="fa fa-arrow-right"></i></a>
                <a href="https://wa.me/201204593124" target="_blank" rel="noopener" class="ks-btn ks-btn--ghost"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </div>
</section>

@endsection
