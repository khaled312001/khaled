@extends('layouts.app')

@section('title', isset($category) ? ucfirst($category) . ' Articles | Khaled Ahmed Blog' : 'Web Development Blog — Laravel, React, SEO & Performance | Khaled Ahmed')
@section('description', isset($category) ? 'Read in-depth ' . strtolower($category) . ' articles by Khaled Ahmed — senior full stack web developer. Practical guides on Laravel, React, Node.js, and modern web technologies.' : 'In-depth web development articles from a senior full stack developer. Laravel, React, Node.js, SEO, performance, hiring, and pricing — written for builders, not beginners.')
@section('keywords', 'web development blog, full stack developer blog, Laravel tutorials, React tutorials, web developer Egypt, hire web developer, SEO guide, web performance, Khaled Ahmed')
@section('canonical', isset($category) ? url('/blog/category/' . strtolower($category)) : url('/blogs'))

@push('styles')
<style>
    .blog-hero { padding: 80px 0 40px; background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%); color: #fff; }
    .blog-hero h1 { color: #fff; font-weight: 700; margin-bottom: 12px; }
    .blog-hero p { color: #cbd5e1; max-width: 720px; margin: 0 auto; font-size: 17px; }
    .blog-filter-bar { padding: 16px 0; border-bottom: 1px solid #e5e7eb; margin-bottom: 30px; }
    .blog-filter-bar a { display: inline-block; padding: 6px 14px; margin: 4px 4px; border-radius: 999px; background: #f1f5f9; color: #1e293b; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s; }
    .blog-filter-bar a:hover, .blog-filter-bar a.active { background: var(--main-color); color: #fff; }
    .blog-card { border: 1px solid #e5e7eb; border-radius: 14px; overflow: hidden; transition: all 0.3s; height: 100%; display: flex; flex-direction: column; background: #fff; position: relative; }
    .blog-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #2563eb, #7c3aed); transform: scaleX(0); transform-origin: left; transition: transform 0.4s ease; }
    .blog-card:hover::before { transform: scaleX(1); }
    .blog-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(15,23,42,0.10); border-color: rgba(37,99,235,0.30); }
    .blog-card .blog-body { padding: 26px 24px; flex: 1; display: flex; flex-direction: column; }
    .blog-card .cat-pill { display: inline-block; align-self: flex-start; padding: 5px 12px; border-radius: 999px; background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(124,58,237,0.10)); color: #2563eb; font-size: 11.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 14px; border: 1px solid rgba(37,99,235,0.18); }
    .blog-card .meta { font-size: 13px; color: #64748b; margin-bottom: 10px; }
    .blog-card .meta .cat { color: var(--main-color); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
    .blog-card h3 { font-size: 19px; line-height: 1.4; margin-bottom: 10px; font-weight: 600; }
    .blog-card h3 a { color: #0f172a; text-decoration: none; }
    .blog-card h3 a:hover { color: var(--main-color); }
    .blog-card p { color: #475569; font-size: 14px; line-height: 1.6; margin-bottom: 16px; flex: 1; }
    .blog-card .read-more { color: var(--main-color); font-weight: 600; text-decoration: none; font-size: 14px; }
    .blog-card .read-more i { margin-left: 6px; transition: margin 0.2s; }
    .blog-card .read-more:hover i { margin-left: 12px; }
    .blog-cta { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 50px 40px; border-radius: 16px; text-align: center; margin: 60px 0 40px; }
    .blog-cta h2 { color: #fff; font-size: 28px; margin-bottom: 14px; }
    .blog-cta p { color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 24px; max-width: 580px; margin-left: auto; margin-right: auto; }
    .blog-cta .btn-cta { background: #fff; color: #1e40af; padding: 14px 32px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.2s; }
    .blog-cta .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    @media (max-width: 768px) {
        .blog-hero { padding: 60px 0 30px; }
        .blog-hero h1 { font-size: 26px; }
        .blog-cta { padding: 32px 20px; }
        .blog-cta h2 { font-size: 22px; }
    }
</style>
@endpush

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Khaled Ahmed — Web Development Blog",
    "url": "{{ url('/blogs') }}",
    "description": "In-depth web development articles by senior full stack developer Khaled Ahmed.",
    "author": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "url": "https://khaledahmed.net",
        "jobTitle": "Senior Full Stack Web Developer",
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ]
    },
    "blogPost": [
        @foreach($posts as $i => $post)
        {
            "@type": "BlogPosting",
            "headline": @json($post['title']),
            "description": @json($post['excerpt']),
            "url": "{{ url('/blog/' . $post['slug']) }}",
            "datePublished": "{{ $post['date'] }}",
            "image": "{{ asset('images/' . $post['image']) }}",
            "author": { "@type": "Person", "name": "Khaled Ahmed" }
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"{{ url('/') }}"},
        {"@type":"ListItem","position":2,"name":"Blog","item":"{{ url('/blogs') }}"}
        @if(isset($category))
        ,{"@type":"ListItem","position":3,"name":"{{ ucfirst($category) }}","item":"{{ url('/blog/category/' . strtolower($category)) }}"}
        @endif
    ]
}
</script>
@endsection

@section('content')
<section class="blog-hero">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                @if(isset($category))
                    <h1>{{ ucfirst($category) }} Articles</h1>
                    <p>Deep, practical articles on {{ strtolower($category) }} from a working senior full stack web developer with 5+ years of experience and 25+ shipped projects.</p>
                @else
                    <h1>{{ app()->getLocale() === 'ar' ? 'مدوّنه تطوير الويب' : 'Web Development Blog' }}</h1>
                    <p>{{ app()->getLocale() === 'ar' ? 'مقالات عمليه بدون كلام كثير عن Laravel و React و Node.js و SEO والأداء والتوظيف — مكتوبه بقلم مطور ويب متكامل خبير ينشر إنتاجي كل أسبوع.' : 'Practical, no-fluff articles on Laravel, React, Node.js, SEO, performance, and hiring — written by a senior full stack developer who ships in production every week.' }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section pt-4">
    <div class="container">
        <div class="blog-filter-bar text-center">
            <a href="{{ route('blogs') }}" class="{{ !isset($category) ? 'active' : '' }}">All Posts</a>
            @foreach($categories as $catName => $count)
                <a href="{{ route('blog.category', strtolower($catName)) }}"
                   class="{{ isset($category) && strtolower($category) === strtolower($catName) ? 'active' : '' }}">
                   {{ $catName }} ({{ $count }})
                </a>
            @endforeach
        </div>

        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6">
                <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class="blog-body">
                        <span class="cat-pill" itemprop="articleSection">{{ $post['category'] }}</span>
                        <h3 itemprop="headline">
                            <a href="{{ route('blog.show', $post['slug']) }}" itemprop="url">{{ $post['title'] }}</a>
                        </h3>
                        <div class="meta">
                            <i class="far fa-calendar"></i>
                            <time datetime="{{ $post['date'] }}" itemprop="datePublished">{{ \Carbon\Carbon::parse($post['date'])->locale(app()->getLocale())->translatedFormat(app()->getLocale() === 'ar' ? 'd F Y' : 'M d, Y') }}</time>
                            &nbsp;&bull;&nbsp;
                            <i class="far fa-clock"></i> {{ $post['read_time'] }}
                        </div>
                        <p itemprop="description">{{ $post['excerpt'] }}</p>
                        <a href="{{ route('blog.show', $post['slug']) }}" class="read-more">
                            {{ __('site.read_full_article') }} <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <div class="blog-cta">
            <h2>Need a Senior Full Stack Developer for Your Project?</h2>
            <p>I help businesses build fast, secure, and scalable web applications. Let's discuss your project — I respond within 24 hours with an honest recommendation.</p>
            <a href="{{ route('contact') }}" class="btn-cta">Get a Free Consultation <i class="fa fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
@endsection
