@extends('layouts.app')

@section('title', $post['meta_title'] ?? $post['title'])
@section('description', $post['meta_description'] ?? $post['excerpt'])
@section('keywords', implode(', ', $post['tags']) . ', Khaled Ahmed, web developer, full stack')
@section('canonical', 'https://khaledahmed.net/blog/' . $post['slug'])
@section('og_type', 'article')
@section('og_title', $post['title'])
@section('og_description', $post['excerpt'])
@section('og_image', asset('images/' . $post['image']))
@section('twitter_title', $post['title'])
@section('twitter_description', $post['excerpt'])
@section('twitter_image', asset('images/' . $post['image']))

@push('styles')
<style>
    .article-hero { padding: 100px 0 40px; background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%); color: #fff; }
    .article-hero .breadcrumbs { font-size: 14px; color: #cbd5e1; margin-bottom: 16px; }
    .article-hero .breadcrumbs a { color: #93c5fd; text-decoration: none; }
    .article-hero .breadcrumbs a:hover { color: #fff; }
    .article-hero .cat-badge { display: inline-block; background: rgba(255,255,255,0.15); color: #fff; padding: 6px 14px; border-radius: 999px; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 14px; }
    .article-hero h1 { color: #fff; font-weight: 700; font-size: 36px; line-height: 1.25; max-width: 900px; margin-bottom: 18px; }
    .article-hero .article-meta { color: #cbd5e1; font-size: 14px; }
    .article-hero .article-meta span { margin-inline-end: 18px; }
    .article-hero .article-meta i { margin-inline-end: 6px; color: #93c5fd; }
    .article-body { padding: 50px 0; }
    .article-content { font-size: 17px; line-height: 1.8; color: #1e293b; }
    /* Logical properties so border + indents flip correctly under html[dir="rtl"] */
    .article-content .lead { font-size: 19px; color: #334155; margin-bottom: 30px; padding: 18px 22px; background: #f8fafc; border-inline-start: 4px solid var(--main-color); border-radius: 4px; }
    .article-content h2 { margin-top: 40px; margin-bottom: 18px; font-size: 26px; font-weight: 700; color: #0f172a; }
    .article-content h3 { margin-top: 30px; margin-bottom: 14px; font-size: 21px; font-weight: 600; color: #0f172a; }
    .article-content p { margin-bottom: 18px; }
    .article-content ul, .article-content ol { margin-bottom: 22px; padding-inline-start: 24px; }
    .article-content li { margin-bottom: 8px; }
    .article-content code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 0.92em; color: #be185d; }
    .article-content a { color: var(--main-color); font-weight: 600; }
    .article-content a:hover { text-decoration: underline; }
    /* Defensive: any parent stylesheet that forces direction: ltr or unicode-bidi: bidi-override
       must NOT bleed into the article body. Anchor the bidi context here. */
    .article-content { direction: inherit; unicode-bidi: isolate; }
    .article-tags { padding: 24px 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; margin: 40px 0 30px; }
    .article-tags .tag { display: inline-block; background: #f1f5f9; color: #1e293b; padding: 6px 14px; border-radius: 999px; font-size: 13px; margin-inline-end: 8px; margin-bottom: 6px; text-decoration: none; }
    .article-tags .tag:hover { background: var(--main-color); color: #fff; }
    .author-box { display: flex; gap: 20px; align-items: center; padding: 30px; background: #f8fafc; border-radius: 12px; margin: 30px 0; }
    .author-box .author-mark { flex: 0 0 auto; width: 72px; height: 72px; border-radius: 50%; display: grid; place-items: center; background: linear-gradient(135deg, var(--main-color), #7c3aed); color: #fff; font-weight: 800; font-size: 22px; letter-spacing: 1px; box-shadow: 0 8px 20px rgba(37,99,235,0.30); }
    .author-box h4 { margin: 0 0 6px; font-size: 18px; }
    .author-box p { margin: 0; color: #64748b; font-size: 14px; }
    .author-box .author-cta { margin-top: 10px; }
    .author-box .author-cta a { color: var(--main-color); font-weight: 600; text-decoration: none; font-size: 14px; }
    .article-cta { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 50px 40px; border-radius: 16px; text-align: center; margin: 50px 0 40px; }
    .article-cta h2 { color: #fff; font-size: 26px; margin-bottom: 14px; }
    .article-cta p { color: rgba(255,255,255,0.92); margin-bottom: 24px; max-width: 580px; margin-left: auto; margin-right: auto; }
    .article-cta .btn-cta { background: #fff; color: #1e40af; padding: 14px 32px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.2s; }
    .article-cta .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    .related-posts { padding: 40px 0; background: #f8fafc; }
    .related-posts h2 { font-size: 28px; font-weight: 700; margin-bottom: 30px; text-align: center; }
    .related-card { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: all 0.2s; padding: 22px 22px 20px; border-inline-start: 3px solid var(--main-color); height: 100%; }
    .related-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .related-card .body { padding: 0; }
    .related-card h3 { font-size: 17px; line-height: 1.4; margin: 8px 0 0; }
    .related-card h3 a { color: #0f172a; text-decoration: none; }
    .related-card h3 a:hover { color: var(--main-color); }
    .related-card .cat { font-size: 12px; color: var(--main-color); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }
    @media (max-width: 768px) {
        .article-hero { padding: 80px 0 28px; }
        .article-hero h1 { font-size: 25px; line-height: 1.3; }
        .article-content { font-size: 16px; }
        .article-content h2 { font-size: 22px; }
        .article-content h3 { font-size: 18px; }
        .author-box { flex-direction: column; text-align: center; }
        .article-cta { padding: 32px 20px; }
        .article-cta h2 { font-size: 21px; }
    }
</style>
@endpush

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": @json($post['title']),
    "description": @json($post['excerpt']),
    "image": "{{ asset('images/' . $post['image']) }}",
    "url": "{{ url('/blog/' . $post['slug']) }}",
    "datePublished": "{{ $post['date'] }}",
    "dateModified": "{{ $post['date'] }}",
    "author": {
        "@type": "Person",
        "@id": "https://khaledahmed.net/#person",
        "name": "Khaled Ahmed",
        "url": "https://khaledahmed.net",
        "jobTitle": "Senior Full Stack Web Developer",
        "sameAs": [
            "https://www.linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001",
            "https://en.wikipedia.org/w/index.php?title=Khaled_Ahmed&oldid=1352803089"
        ]
    },
    "publisher": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "logo": { "@type": "ImageObject", "url": "{{ asset('images/logo.png') }}" }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url('/blog/' . $post['slug']) }}"
    },
    "keywords": @json(implode(', ', $post['tags']))
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"{{ url('/') }}"},
        {"@type":"ListItem","position":2,"name":"Blog","item":"{{ url('/blogs') }}"},
        {"@type":"ListItem","position":3,"name":@json($post['title']),"item":"{{ url('/blog/' . $post['slug']) }}"}
    ]
}
</script>
@endsection

@section('content')
<article itemscope itemtype="https://schema.org/BlogPosting">
    <header class="article-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <a href="{{ url('/') }}">Home</a>
                        &raquo; <a href="{{ route('blogs') }}">Blog</a>
                        &raquo; <span>{{ $post['title'] }}</span>
                    </nav>
                    <span class="cat-badge">{{ $post['category'] }}</span>
                    <h1 itemprop="headline">{{ $post['title'] }}</h1>
                    <div class="article-meta">
                        <span><i class="far fa-user"></i> Khaled Ahmed</span>
                        <span><i class="far fa-calendar"></i> <time datetime="{{ $post['date'] }}" itemprop="datePublished">{{ \Carbon\Carbon::parse($post['date'])->format('F d, Y') }}</time></span>
                        <span><i class="far fa-clock"></i> {{ $post['read_time'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="article-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="article-content" itemprop="articleBody">
                        {!! $post['content'] !!}
                    </div>

                    <div class="article-tags">
                        <strong>Tags:</strong>
                        @foreach($post['tags'] as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="author-box" itemscope itemtype="https://schema.org/Person" itemprop="author">
                        <div class="author-mark" aria-hidden="true">KH</div>
                        <div>
                            <h4 itemprop="name">About <a href="https://khaledahmed.net" itemprop="url" style="color:inherit;text-decoration:none;">Khaled Ahmed</a></h4>
                            <p itemprop="description">Senior Full Stack Web Developer based in Cairo, Egypt with 5+ years of experience and 25+ shipped projects across 7 countries. Founder of Barmagly. Specialized in Laravel, React, Node.js, and modern web technologies.</p>
                            <div class="author-cta" style="display:flex;flex-wrap:wrap;gap:14px;align-items:center;margin-top:12px;">
                                <a href="{{ route('contact') }}">Hire Khaled <i class="fa fa-arrow-right"></i></a>
                                <a href="{{ route('services') }}">View Services <i class="fa fa-arrow-right"></i></a>
                                <a href="https://www.linkedin.com/in/khaled-ahmed-82368819b" rel="me noopener" target="_blank" itemprop="sameAs" aria-label="Khaled Ahmed on LinkedIn"><i class="fab fa-linkedin"></i> LinkedIn</a>
                                <a href="https://github.com/khaled312001" rel="me noopener" target="_blank" itemprop="sameAs" aria-label="Khaled Ahmed on GitHub"><i class="fab fa-github"></i> GitHub</a>
                            </div>
                        </div>
                    </div>

                    <div class="article-cta">
                        <h2>Ready to Start Your Project?</h2>
                        <p>If this article was helpful, imagine what we could do together. Get a free 30-minute consultation and an honest recommendation for your project — no sales pitch.</p>
                        <a href="{{ route('contact') }}" class="btn-cta">Book Free Consultation <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($related))
    <section class="related-posts">
        <div class="container">
            <h2>Related Articles</h2>
            <div class="row g-4 justify-content-center">
                @foreach($related as $rel)
                <div class="col-lg-4 col-md-6">
                    <article class="related-card">
                        <div class="body">
                            <span class="cat">{{ $rel['category'] }}</span>
                            <h3><a href="{{ route('blog.show', $rel['slug']) }}">{{ $rel['title'] }}</a></h3>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</article>
@endsection
