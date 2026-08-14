@extends('layouts.app')

@php $isAr = app()->getLocale() === 'ar'; @endphp

@section('title', $post['meta_title'] ?? $post['title'])
@section('description', $post['meta_description'] ?? $post['excerpt'])
@section('keywords', implode(', ', $post['tags']) . ', Khaled Ahmed')
@section('canonical', 'https://khaledahmed.net/blog/' . $post['slug'])
@section('og_type', 'article')
@section('og_title', $post['title'])
@section('og_description', $post['excerpt'])

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BlogPosting","headline":@json($post['title']),"description":@json($post['excerpt']),"datePublished":"{{ $post['date'] }}","dateModified":"{{ $post['date'] }}","author":{"@type":"Person","name":"Khaled Ahmed","url":"https://khaledahmed.net"},"publisher":{"@type":"Organization","name":"Khaled Ahmed","logo":{"@type":"ImageObject","url":"{{ asset('images/logo.png') }}"}},"mainEntityOfPage":{"@type":"WebPage","@id":"{{ url('/blog/' . $post['slug']) }}"},"keywords":@json(implode(', ', $post['tags']))}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"{{ url('/') }}"},{"@type":"ListItem","position":2,"name":"Blog","item":"{{ url('/blogs') }}"},{"@type":"ListItem","position":3,"name":@json($post['title']),"item":"{{ url('/blog/' . $post['slug']) }}"}]}
</script>
@endsection

@push('styles')
<style>
    .pd-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-5); position: relative; overflow: hidden; }
    .pd-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events: none; }
    .pd-hero > .container { position: relative; z-index: 1; }
    .pd-bread { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-3); margin-bottom: var(--sp-3); flex-wrap: wrap; }
    .pd-bread a { color: var(--text-2); text-decoration: none; }
    .pd-bread a:hover { color: var(--brand); }
    .pd-bread i { font-size: 10px; color: var(--text-4); }
    .pd-cat { display: inline-block; font-size: 12px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; padding: 5px 12px; background: rgba(96,165,250,0.10); border: 1px solid rgba(96,165,250,0.20); border-radius: var(--r-full); margin-bottom: var(--sp-3); }
    .pd-hero h1 { color: var(--text-1); font-size: clamp(26px, 3.4vw, 40px); line-height: 1.18; margin: 0 0 var(--sp-4); max-width: 900px; }
    .pd-meta { display: flex; align-items: center; gap: 18px; color: var(--text-3); font-size: 14px; flex-wrap: wrap; }
    .pd-meta i { color: var(--brand); font-size: 12px; margin-inline-end: 6px; }

    /* Article body */
    .pd-body { padding: var(--sp-7) 0; }
    .pd-content { font-size: 17px; line-height: 1.85; color: var(--text-2); direction: inherit; unicode-bidi: isolate; }
    .pd-content .lead { font-size: 19px; color: var(--text-1); margin-bottom: var(--sp-6); padding: 20px 26px; background: rgba(96,165,250,0.06); border-inline-start: 4px solid var(--brand); border-radius: var(--r-md); }
    .pd-content h2 { color: var(--text-1); margin: 50px 0 18px; font-size: clamp(22px, 2.6vw, 30px); font-weight: 800; letter-spacing: -0.01em; padding-bottom: 12px; border-bottom: 1px solid var(--border-1); }
    .pd-content h3 { color: var(--text-1); margin: 36px 0 14px; font-size: clamp(19px, 2vw, 23px); font-weight: 700; }
    .pd-content h4 { color: var(--text-1); margin: 28px 0 10px; font-size: 17px; font-weight: 700; }
    .pd-content p { margin: 0 0 18px; color: var(--text-2); }
    .pd-content ul, .pd-content ol { margin: 0 0 22px; padding-inline-start: 26px; color: var(--text-2); }
    .pd-content li { margin-bottom: 10px; line-height: 1.75; }
    .pd-content li::marker { color: var(--brand); }
    .pd-content strong { color: var(--text-1); font-weight: 700; }
    .pd-content em { color: var(--text-2); }
    .pd-content a { color: var(--brand); font-weight: 600; border-bottom: 1px dashed rgba(96,165,250,0.40); transition: color .2s ease, border-color .2s ease; }
    .pd-content a:hover { color: var(--brand-2); border-color: var(--brand-2); }
    .pd-content code { background: rgba(255,255,255,0.06); padding: 2px 8px; border-radius: 5px; font-size: 0.9em; color: var(--warning); font-family: var(--font-mono); border: 1px solid var(--border-1); }
    .pd-content pre { background: #0b1220; border: 1px solid var(--border-1); padding: 20px 24px; border-radius: var(--r-md); margin: 24px 0; overflow-x: auto; font-family: var(--font-mono); font-size: 14px; line-height: 1.7; direction: ltr; text-align: left; unicode-bidi: isolate; }
    .pd-content pre code { background: transparent; color: var(--text-2); padding: 0; border: none; }
    .pd-content blockquote { margin: 28px 0; padding: 20px 26px; background: var(--surface-1); border-inline-start: 4px solid var(--accent); border-radius: var(--r-md); font-size: 17.5px; color: var(--text-1); font-style: italic; }
    .pd-content .post-callout { margin: 28px 0; padding: 20px 26px; background: rgba(167,139,250,0.06); border: 1px solid rgba(167,139,250,0.25); border-radius: var(--r-md); color: var(--text-1); }
    .pd-content .post-callout p:last-child { margin-bottom: 0; }
    .pd-content .post-callout strong { color: var(--accent); }

    /* Tags */
    .pd-tags { padding: var(--sp-5) 0; border-top: 1px solid var(--border-1); border-bottom: 1px solid var(--border-1); margin: var(--sp-7) 0 var(--sp-5); display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .pd-tags strong { color: var(--text-3); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; margin-inline-end: 4px; }
    .pd-tags span { padding: 6px 12px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-full); color: var(--text-2); font-size: 12.5px; font-weight: 600; }

    /* Author */
    .pd-author { display: flex; align-items: center; gap: 18px; padding: 26px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-lg); margin: var(--sp-5) 0; }
    .pd-author__mark { flex-shrink: 0; width: 64px; height: 64px; border-radius: 50%; display: grid; place-items: center; background: var(--gradient-1); color: var(--bg-1); font-weight: 800; font-size: 22px; letter-spacing: 1px; }
    .pd-author h4 { font-size: 17px; margin: 0 0 4px; color: var(--text-1); }
    .pd-author h4 a { color: inherit; border: none; }
    .pd-author p { font-size: 14px; color: var(--text-3); margin: 0 0 10px; line-height: 1.65; }
    .pd-author__links { display: flex; gap: 10px; flex-wrap: wrap; }
    .pd-author__links a { font-size: 13px; color: var(--text-2); padding: 6px 12px; background: rgba(255,255,255,0.04); border: 1px solid var(--border-1); border-radius: var(--r-full); border-bottom: 1px solid var(--border-1) !important; }
    .pd-author__links a:hover { color: var(--brand); border-color: var(--border-3) !important; }

    /* Related */
    .pd-related { padding: var(--sp-7) 0; background: rgba(255,255,255,0.02); margin-top: var(--sp-7); }
    .pd-related h2 { text-align: center; margin-bottom: var(--sp-6); }
    .pd-rel-card { display: flex; flex-direction: column; height: 100%; padding: 22px 22px 20px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); border-inline-start: 3px solid var(--brand); text-decoration: none; transition: all .2s ease; }
    .pd-rel-card:hover { transform: translateY(-3px); border-color: var(--border-3); border-inline-start-color: var(--accent); }
    .pd-rel-card .cat { font-size: 11px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
    .pd-rel-card h3 { color: var(--text-1); font-size: 16px; line-height: 1.4; margin: 0; }

    @media (max-width: 768px) {
        .pd-content { font-size: 16px; }
        .pd-content .lead { font-size: 17px; padding: 16px 20px; }
        .pd-author { flex-direction: column; text-align: center; align-items: stretch; }
        .pd-author__mark { margin: 0 auto; }
        .pd-author__links { justify-content: center; }
    }
</style>
@endpush

@section('content')

<article>
    <header class="pd-hero">
        <div class="container">
            <div class="pd-bread">
                <a href="{{ route('home') }}">{{ __('site.home') }}</a>
                <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}"></i>
                <a href="{{ route('blogs') }}">{{ $isAr ? 'المدوّنة' : 'Blog' }}</a>
                <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}"></i>
                <span>{{ $post['category'] }}</span>
            </div>
            <span class="pd-cat">{{ $post['category'] }}</span>
            <h1 itemprop="headline">{{ $post['title'] }}</h1>
            <div class="pd-meta">
                <span><i class="far fa-user"></i> Khaled Ahmed</span>
                <span><i class="far fa-calendar"></i> <time datetime="{{ $post['date'] }}" itemprop="datePublished">{{ \Carbon\Carbon::parse($post['date'])->locale(app()->getLocale())->translatedFormat($isAr ? 'd F Y' : 'F d, Y') }}</time></span>
                <span><i class="far fa-clock"></i> {{ $post['read_time'] }}</span>
            </div>
        </div>
    </header>

    <section class="pd-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="pd-content" itemprop="articleBody">
                        {!! $post['content'] !!}
                    </div>

                    <div class="pd-tags">
                        <strong>{{ $isAr ? 'كلمات مفتاحية' : 'Tags' }}:</strong>
                        @foreach($post['tags'] as $tag)<span>{{ $tag }}</span>@endforeach
                    </div>

                    <div class="pd-author" itemscope itemtype="https://schema.org/Person" itemprop="author">
                        <div class="pd-author__mark" aria-hidden="true">KH</div>
                        <div>
                            <h4 itemprop="name">{{ $isAr ? 'كتبه' : 'Written by' }} <a href="{{ route('about') }}" itemprop="url">Khaled Ahmed</a></h4>
                            <p itemprop="description">{{ $isAr ? 'مطور ويب Full Stack خبير من القاهرة، أكثر من 5 سنوات خبرة و25 مشروع منشور في 8 دول. مؤسس Barmagly.' : 'Senior full stack web developer based in Cairo with 5+ years of experience and 25+ shipped projects across 8 countries. Founder of Barmagly.' }}</p>
                            <div class="pd-author__links">
                                <a href="{{ route('contact') }}">{{ $isAr ? 'تواصل معي' : 'Hire me' }}</a>
                                <a href="{{ route('services') }}">{{ $isAr ? 'الخدمات' : 'Services' }}</a>
                                <a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" rel="me noopener" itemprop="sameAs"><i class="fab fa-linkedin"></i> LinkedIn</a>
                                <a href="https://github.com/khaled312001" target="_blank" rel="me noopener" itemprop="sameAs"><i class="fab fa-github"></i> GitHub</a>
                            </div>
                        </div>
                    </div>

                    <div class="home-cta ks-fadeup" style="margin-top: var(--sp-7);">
                        <h2>{{ $isAr ? 'مستعد لتطبيق ما قرأته؟' : 'Ready to apply what you just read?' }}</h2>
                        <p>{{ $isAr ? 'استشاره مجانية 30 دقيقة، رد خلال 24 ساعة، وعرض سعر مكتوب.' : 'Free 30-minute consultation, 24-hour response, written fixed-fee quote.' }}</p>
                        <div class="home-cta__row">
                            <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'احجز استشارة' : 'Book a consultation' }} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($related))
    <section class="pd-related">
        <div class="container">
            <h2>{{ $isAr ? 'مقالات ذات صلة' : 'Related articles' }}</h2>
            <div class="row g-4 justify-content-center">
                @foreach($related as $rel)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('blog.show', $rel['slug']) }}" class="pd-rel-card">
                            <span class="cat">{{ $rel['category'] }}</span>
                            <h3>{{ $rel['title'] }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</article>

@endsection
