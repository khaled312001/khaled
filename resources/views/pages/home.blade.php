@extends('layouts.app')

@section('title', 'Hire a Senior Full Stack Web Developer | Laravel, React, Node.js — Khaled Ahmed')
@section('description', 'Hire Khaled Ahmed — Senior Full Stack Web Developer with 5+ years and 25+ shipped projects across 8 countries. Expert in Laravel, React, Node.js. Free consultation, 24-hour response.')
@section('keywords', 'hire full stack developer, senior web developer, Laravel developer, React developer, Node.js developer, freelance web developer Egypt, custom web application, SaaS developer, Khaled Ahmed')
@section('canonical', 'https://khaledahmed.net')
@section('og_image', asset('images/logo.png'))

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Khaled Ahmed",
  "url": "https://khaledahmed.net",
  "jobTitle": "Senior Full Stack Web Developer",
  "worksFor": {"@type":"Organization","name":"Barmagly","url":"https://barmagly.tech"},
  "description": "Senior full stack web developer with 5+ years of experience and 25+ shipped projects across 8 countries.",
  "address": {"@type":"PostalAddress","addressLocality":"Cairo","addressCountry":"EG"},
  "sameAs": ["https://linkedin.com/in/khaled-ahmed-82368819b","https://github.com/khaled312001"],
  "knowsAbout": ["Laravel","React","Next.js","Node.js","TypeScript","PHP","MySQL","PostgreSQL","SEO","Web Performance"]
}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"WebSite","url":"https://khaledahmed.net","name":"Khaled Ahmed","potentialAction":{"@type":"SearchAction","target":"https://khaledahmed.net/blogs?q={search_term_string}","query-input":"required name=search_term_string"}}
</script>
@endsection

@push('styles')
<style>
    /* Hero */
    .home-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-9); position: relative; overflow: hidden; }
    .home-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events:none; }
    .home-hero::after { content:''; position:absolute; inset:0; background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 28px 28px; opacity: 0.5; pointer-events: none; }
    .home-hero > .container { position: relative; z-index: 1; }
    .home-hero h1 { margin: 0 0 var(--sp-5); opacity: 0; animation: ks-fadeup .7s ease .15s forwards; }
    .home-hero .home-lead { color: var(--text-2); font-size: 19px; max-width: 680px; margin: 0 0 var(--sp-6); opacity: 0; animation: ks-fadeup .7s ease .25s forwards; }
    .home-hero .ks-eyebrow { opacity: 0; animation: ks-fadeup .6s ease .05s forwards; margin-bottom: var(--sp-4); }
    .home-hero .ks-stats { max-width: 720px; margin-bottom: var(--sp-6); opacity: 0; animation: ks-fadeup .7s ease .35s forwards; }
    .home-hero .home-cta-row { display: flex; gap: 12px; flex-wrap: wrap; opacity: 0; animation: ks-fadeup .7s ease .45s forwards; }

    /* Code card */
    .home-code { max-width: 480px; margin-inline-start: auto; background: linear-gradient(160deg, #0b1220 0%, #131a2c 100%); border: 1px solid var(--border-3); border-radius: var(--r-xl); overflow: hidden; box-shadow: var(--shadow-lg); opacity: 0; animation: ks-fadeup .8s ease .4s forwards; }
    .home-code__bar { display:flex; align-items:center; gap:8px; padding:12px 16px; background: rgba(255,255,255,0.04); border-bottom: 1px solid var(--border-1); }
    .home-code__bar i { width: 12px; height: 12px; border-radius: 50%; display:inline-block; }
    .home-code__bar .r { background: #ef4444; } .home-code__bar .y { background: #f59e0b; } .home-code__bar .g { background: #10b981; }
    .home-code__file { margin-inline-start: auto; font-family: var(--font-mono); font-size: 12px; color: var(--text-3); }
    .home-code pre { margin: 0; padding: 22px 26px; font-family: var(--font-mono); font-size: 14.5px; line-height: 1.85; color: var(--text-2); background: transparent; overflow-x: auto; direction: ltr; text-align: left; unicode-bidi: isolate; }
    .home-code .c { color: #64748b; font-style: italic; } .home-code .k { color: #c084fc; } .home-code .v { color: var(--brand); } .home-code .p { color: #f0abfc; } .home-code .s { color: var(--success); } .home-code .n { color: var(--warning); }

    /* Trust */
    .home-trust { padding: var(--sp-5) 0; background: rgba(255,255,255,0.02); border-top: 1px solid var(--border-1); border-bottom: 1px solid var(--border-1); }
    .home-trust-card { display:flex; gap:14px; align-items:center; padding: 16px 20px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); transition: border-color .25s ease; }
    .home-trust-card:hover { border-color: var(--border-3); }
    .home-trust-card__ico { flex-shrink:0; width: 44px; height: 44px; display:grid; place-items:center; border-radius: var(--r-sm); background: rgba(96,165,250,0.10); color: var(--brand); font-size: 18px; border: 1px solid rgba(96,165,250,0.20); }
    .home-trust-card .lbl { font-size: 11.5px; color: var(--text-3); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 3px; }
    .home-trust-card .val { font-size: 14.5px; color: var(--text-1); font-weight: 600; line-height: 1.4; }

    /* Service card */
    .home-svc { padding: 28px 26px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-lg); height: 100%; transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; position: relative; overflow: hidden; }
    .home-svc::before { content:''; position:absolute; inset:0; background: linear-gradient(135deg, rgba(96,165,250,0.06), transparent 60%); opacity: 0; transition: opacity .3s ease; pointer-events: none; }
    .home-svc:hover { transform: translateY(-6px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
    .home-svc:hover::before { opacity: 1; }
    .home-svc__ico { width: 52px; height: 52px; border-radius: var(--r-md); display:grid; place-items:center; background: linear-gradient(135deg, rgba(96,165,250,0.18), rgba(124,58,237,0.18)); color: var(--brand); font-size: 22px; margin-bottom: 18px; border: 1px solid rgba(96,165,250,0.20); }
    .home-svc h3 { color: var(--text-1); font-size: 18px; font-weight: 700; margin: 0 0 10px; }
    .home-svc p { color: var(--text-3); font-size: 14.5px; line-height: 1.65; margin: 0 0 18px; }
    .home-svc__more { color: var(--brand); font-weight: 700; font-size: 13.5px; text-decoration:none; display:inline-flex; align-items:center; gap: 6px; transition: gap .2s ease; }
    .home-svc__more:hover { gap: 10px; color: var(--brand-2); }

    /* CTA */
    .home-cta { padding: 64px 40px; background: radial-gradient(circle at 30% 50%, rgba(96,165,250,0.20) 0%, transparent 60%), linear-gradient(135deg, var(--bg-2) 0%, #1e1b4b 100%); border: 1px solid var(--border-3); border-radius: var(--r-2xl); text-align: center; }
    .home-cta h2 { margin: 0 0 12px; }
    .home-cta p { color: var(--text-2); font-size: 17px; max-width: 620px; margin: 0 auto 24px; }
    .home-cta .home-cta__row { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }

    @media (max-width: 991.98px) {
        .home-code { margin-top: 36px; max-width: 100%; }
    }

    /* Hero image */
    .home-hero-img { position: relative; border-radius: var(--r-xl); overflow: hidden; border: 1px solid var(--border-3); box-shadow: var(--shadow-lg); opacity: 0; animation: ks-fadeup .8s ease .4s forwards; }
    .home-hero-img::after { content: ''; position: absolute; inset: 0; box-shadow: inset 0 0 60px rgba(96,165,250,0.12); border-radius: var(--r-xl); pointer-events: none; }
    .home-hero-img img { width: 100%; height: auto; display: block; }

    /* Section image (landing / content pages) */
    .ks-media { position: relative; border-radius: var(--r-lg); overflow: hidden; border: 1px solid var(--border-2); box-shadow: var(--shadow-md); }
    .ks-media img { width: 100%; height: auto; display: block; }

    /* Rapid delivery band */
    .home-speed__band { padding: 48px 44px; background: radial-gradient(circle at 15% 20%, rgba(96,165,250,0.12) 0%, transparent 55%), radial-gradient(circle at 85% 90%, rgba(167,139,250,0.12) 0%, transparent 55%), linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-3); border-radius: var(--r-2xl); }
    .home-speed__head { text-align: center; max-width: 760px; margin: 0 auto; }
    .home-speed__head h2 { margin: 14px 0 12px; }
    .home-speed__head p { color: var(--text-2); font-size: 16.5px; line-height: 1.7; margin: 0; }
    .home-speed__card { height: 100%; padding: 24px 22px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-1); border-radius: var(--r-lg); transition: transform .3s ease, border-color .3s ease; }
    .home-speed__card:hover { transform: translateY(-4px); border-color: var(--border-3); }
    .home-speed__ico { width: 48px; height: 48px; border-radius: var(--r-md); display: grid; place-items: center; font-size: 20px; color: var(--brand); background: linear-gradient(135deg, rgba(96,165,250,0.18), rgba(124,58,237,0.18)); border: 1px solid rgba(96,165,250,0.20); margin-bottom: 16px; }
    .home-speed__card h3 { font-size: 16.5px; margin: 0 0 8px; color: var(--text-1); }
    .home-speed__card p { font-size: 13.5px; line-height: 1.6; color: var(--text-3); margin: 0; }
    .home-speed__cta { display: flex; align-items: center; justify-content: space-between; gap: 18px; flex-wrap: wrap; margin-top: 32px; padding-top: 26px; border-top: 1px solid var(--border-1); }
    .home-speed__note { color: var(--text-2); font-size: 15px; font-weight: 500; }
    @media (max-width: 768px) {
        .home-speed__band { padding: 32px 22px; }
        .home-speed__cta { flex-direction: column; align-items: stretch; text-align: center; }
    }
</style>
@endpush

@section('content')

<section class="home-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="ks-eyebrow"><span class="ks-dot"></span> {{ app()->getLocale() === 'ar' ? 'متاح لمشاريع جديدة' : 'Available for new projects' }}</span>
                <h1>
                    {{ app()->getLocale() === 'ar' ? 'مطور ويب' : 'Senior Full Stack' }}
                    <span class="ks-grad-text">{{ app()->getLocale() === 'ar' ? 'Full Stack خبير' : 'Web Developer' }}</span>
                    {{ app()->getLocale() === 'ar' ? 'ينشر في الإنتاج' : 'who ships in production' }}
                </h1>
                <p class="home-lead">{{ app()->getLocale() === 'ar' ? 'أنا خالد أحمد، مطور ويب من القاهرة بخبرة تتجاوز خمس سنوات وأكثر من 25 مشروعا منشورا في 8 دول. متخصص في Laravel و React و Node.js. استشارة مجانية ورد خلال 24 ساعة.' : 'I am Khaled Ahmed, a Cairo-based web developer with 5+ years and 25+ shipped projects across 8 countries. Specialized in Laravel, React, and Node.js. Free consultation, response within 24 hours.' }}</p>

                <div class="ks-stats">
                    <div class="ks-stat"><div class="ks-stat__num">25+</div><div class="ks-stat__lbl">{{ app()->getLocale() === 'ar' ? 'مشروع' : 'Projects' }}</div></div>
                    <div class="ks-stat"><div class="ks-stat__num">8</div><div class="ks-stat__lbl">{{ app()->getLocale() === 'ar' ? 'دول' : 'Countries' }}</div></div>
                    <div class="ks-stat"><div class="ks-stat__num">5+</div><div class="ks-stat__lbl">{{ app()->getLocale() === 'ar' ? 'سنوات' : 'Years' }}</div></div>
                    <div class="ks-stat"><div class="ks-stat__num">24h</div><div class="ks-stat__lbl">{{ app()->getLocale() === 'ar' ? 'سرعة الرد' : 'Response' }}</div></div>
                </div>

                <div class="home-cta-row">
                    <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ app()->getLocale() === 'ar' ? 'احصل على استشارة مجانية' : 'Get a free consultation' }} <i class="fa fa-arrow-right"></i></a>
                    <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost">{{ app()->getLocale() === 'ar' ? 'تصفح أعمالي' : 'View my work' }} <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block">
                <div class="home-hero-img">
                    <img src="{{ asset('images/site/hero-workspace.png') }}"
                         alt="{{ app()->getLocale() === 'ar' ? 'مطور ويب Full Stack يبني تطبيقات Laravel و React احترافية' : 'Senior full stack developer building professional Laravel and React web applications' }}"
                         width="1536" height="1024" loading="eager" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-trust">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="home-trust-card">
                    <div class="home-trust-card__ico"><i class="fas fa-globe"></i></div>
                    <div>
                        <div class="lbl">{{ app()->getLocale() === 'ar' ? 'البلدان' : 'Coverage' }}</div>
                        <div class="val">{{ app()->getLocale() === 'ar' ? 'مصر، المملكة المتحدة، السعودية، الإمارات، سويسرا، ألمانيا، فرنسا، الكويت' : 'Egypt, UK, Saudi, UAE, Switzerland, Germany, France, Kuwait' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-trust-card">
                    <div class="home-trust-card__ico"><i class="fas fa-rocket"></i></div>
                    <div>
                        <div class="lbl">{{ app()->getLocale() === 'ar' ? 'مشاريع منشورة' : 'Live projects' }}</div>
                        <div class="val">{{ app()->getLocale() === 'ar' ? 'أكثر من 35 موقع إنتاج فعال' : '35+ shipped production sites' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-trust-card">
                    <div class="home-trust-card__ico"><i class="fas fa-comments"></i></div>
                    <div>
                        <div class="lbl">{{ app()->getLocale() === 'ar' ? 'الرد' : 'Response' }}</div>
                        <div class="val">{{ app()->getLocale() === 'ar' ? 'خلال 24 ساعة وعرض سعر مكتوب' : 'Within 24 hours, written fixed-fee quote' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="container">
        <div class="ks-shead ks-fadeup">
            <span class="ks-eyebrow">{{ app()->getLocale() === 'ar' ? 'خدمات' : 'Services' }}</span>
            <h2>{{ app()->getLocale() === 'ar' ? 'كل ما تحتاجه لمشروع ويب احترافي' : 'Everything you need for a production-grade web project' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'من تصميم الواجهة إلى النشر، كل المراحل بفريق واحد دون تعقيدات.' : 'From API design to deployment — every stage handled by one accountable senior, no agency overhead.' }}</p>
        </div>
        <div class="row g-4">
            @php
              $services = [
                ['fab fa-laravel',  app()->getLocale() === 'ar' ? 'تطوير Laravel للخلفية' : 'Laravel Backend',            app()->getLocale() === 'ar' ? 'تطبيقات ويب قوية: واجهات برمجية، مصادقة، طوابير، فوترة، تعدد المستأجرين.' : 'Solid web apps: REST/GraphQL APIs, auth, queues, billing, multi-tenant.'],
                ['fab fa-react',    app()->getLocale() === 'ar' ? 'React و Next.js للواجهة' : 'React & Next.js Frontend',  app()->getLocale() === 'ar' ? 'واجهات سريعة جاهزة لمحركات البحث بـ Next.js و RSC و TypeScript.' : 'Fast, SEO-ready frontends with Next.js 15, RSC, Tailwind, and TypeScript.'],
                ['fas fa-rocket',   app()->getLocale() === 'ar' ? 'بناء MVP لـ SaaS' : 'SaaS MVP Development',            app()->getLocale() === 'ar' ? 'إطلاق MVP خلال 8-16 أسبوعا: فوترة Stripe، لوحات تحكم، API، نشر آلي.' : 'Ship your SaaS MVP in 8-16 weeks: Stripe billing, dashboards, API, CI/CD.'],
                ['fas fa-shopping-cart', app()->getLocale() === 'ar' ? 'متاجر إلكترونية' : 'E-commerce',                  app()->getLocale() === 'ar' ? 'WooCommerce أو Shopify أو متجر Laravel مخصص بدفع وشحن وتكاملات CRM.' : 'WooCommerce, Shopify, or custom Laravel with payment, shipping, CRM.'],
                ['fas fa-bolt',     app()->getLocale() === 'ar' ? 'أداء وتحسين محركات البحث' : 'Performance & SEO',         app()->getLocale() === 'ar' ? 'تحسين Core Web Vitals، Lighthouse فوق 95، schema، sitemap، canonical.' : 'Core Web Vitals tuning, Lighthouse 95+, structured data, sitemap hygiene.'],
                ['fas fa-shield-alt', app()->getLocale() === 'ar' ? 'صيانة وأمان' : 'Maintenance & Security',              app()->getLocale() === 'ar' ? 'تعاقد شهري: تحديثات، نسخ احتياطي، مراقبة، إصلاح ثغرات، إضافات صغيرة.' : 'Monthly retainers: updates, backups, monitoring, security patches.'],
              ];
            @endphp
            @foreach($services as [$icon, $title, $desc])
                <div class="col-md-6 col-lg-4 ks-fadeup">
                    <div class="home-svc">
                        <div class="home-svc__ico"><i class="{{ $icon }}"></i></div>
                        <h3>{{ $title }}</h3>
                        <p>{{ $desc }}</p>
                        <a href="{{ route('services') }}" class="home-svc__more">{{ app()->getLocale() === 'ar' ? 'التفاصيل' : 'Learn more' }} <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight home-speed">
    <div class="container">
        <div class="home-speed__band ks-fadeup">
            <div class="home-speed__head">
                <span class="ks-eyebrow"><i class="fas fa-bolt"></i> {{ app()->getLocale() === 'ar' ? 'سرعة التسليم' : 'Rapid delivery' }}</span>
                <h2>{{ app()->getLocale() === 'ar' ? 'من الفكرة إلى الإطلاق في أيام، مش شهور' : 'From idea to launch in days — not months' }}</h2>
                <p>{{ app()->getLocale() === 'ar' ? 'أسلّم مشاريع احترافية بسرعة مهما كان حجمها أو توسّعها — بفضل بنية جاهزة، ووحدات قابلة لإعادة الاستخدام، ومطوّر واحد خبير مسؤول عن كل شيء. تشوف نسخة تشتغل من أول أيام، مش بعد شهور.' : 'I ship professional projects fast — whatever the size or scale — thanks to battle-tested architecture, reusable modules, and one senior developer accountable for everything. You see a working version in the first days, not after months.' }}</p>
            </div>
            <div class="row g-4 mt-2">
                @php
                    $isAr = app()->getLocale() === 'ar';
                    $speed = [
                        ['fas fa-layer-group', $isAr ? 'بنية جاهزة ومجرّبة' : 'Battle-tested architecture', $isAr ? 'أبدأ من أساس إنتاجي جاهز (مصادقة، فوترة، صلاحيات، API) بدل الصفر — يوفّر أسابيع.' : 'I start from a production-ready foundation (auth, billing, roles, API) instead of scratch — saving weeks.'],
                        ['fas fa-cubes', $isAr ? 'وحدات قابلة لإعادة الاستخدام' : 'Reusable modules', $isAr ? 'مكتبة مكوّنات ولوحات تحكم بنيتها عبر 39 مشروع، أركّبها وأخصّصها لمشروعك بسرعة.' : 'A library of components and dashboards built across 39 projects, assembled and customized fast for you.'],
                        ['fas fa-gauge-high', $isAr ? 'نسخة تشتغل من أول يوم' : 'Working build from day one', $isAr ? 'رابط staging حيّ من اليوم الأول وعروض متكرّرة — تتابع التقدّم لحظياً بدل الانتظار.' : 'A live staging URL from day one with frequent demos — you track progress live, no waiting.'],
                        ['fas fa-user-check', $isAr ? 'مطوّر واحد مسؤول' : 'One accountable senior', $isAr ? 'بدون طبقات وكالة ولا تسليمات بين فرق — قرارات أسرع وتنفيذ مباشر بجودة عالية.' : 'No agency layers or hand-offs between teams — faster decisions and direct, high-quality execution.'],
                    ];
                @endphp
                @foreach($speed as [$icon, $t, $dsc])
                    <div class="col-md-6 col-lg-3 ks-fadeup">
                        <div class="home-speed__card">
                            <div class="home-speed__ico"><i class="{{ $icon }}"></i></div>
                            <h3>{{ $t }}</h3>
                            <p>{{ $dsc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="home-speed__cta">
                <span class="home-speed__note">{{ $isAr ? 'موقع تعريفي احترافي؟ أيام. متجر أو MVP؟ أسابيع قليلة بخطة واضحة.' : 'A professional marketing site? Days. A store or an MVP? A few focused weeks with a clear plan.' }}</span>
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'ابدأ بسرعة' : 'Start fast' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="ks-shead ks-fadeup">
            <span class="ks-eyebrow">{{ app()->getLocale() === 'ar' ? 'الأدوات' : 'Tech stack' }}</span>
            <h2>{{ app()->getLocale() === 'ar' ? 'تقنيات حديثة وقوية' : 'Modern, production-ready stack' }}</h2>
        </div>
        <div class="d-flex flex-wrap justify-content-center" style="gap:10px; max-width: 900px; margin: 0 auto;">
            @foreach([
                ['fab fa-laravel', 'Laravel'],
                ['fab fa-react', 'React'],
                ['fab fa-node-js', 'Node.js'],
                ['fab fa-js', 'TypeScript'],
                ['fab fa-vuejs', 'Vue.js'],
                ['fab fa-php', 'PHP 8.3'],
                ['fas fa-database', 'MySQL'],
                ['fas fa-database', 'PostgreSQL'],
                ['fas fa-database', 'MongoDB'],
                ['fas fa-server', 'Redis'],
                ['fab fa-aws', 'AWS'],
                ['fab fa-docker', 'Docker'],
                ['fab fa-git-alt', 'Git / CI'],
                ['fas fa-credit-card', 'Stripe'],
            ] as [$icon, $name])
                <span class="ks-chip"><i class="{{ $icon }}"></i> {{ $name }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="home-cta ks-fadeup">
            <h2>{{ app()->getLocale() === 'ar' ? 'مستعد لنبدأ مشروعك؟' : 'Ready to start your project?' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'أرسل تفاصيل المشروع وستحصل على عرض مكتوب وخطة واضحة خلال 24 ساعة. دون التزام ودون مكالمات مبيعات.' : 'Send the project brief. You will get a written, fixed-fee quote and a realistic timeline within 24 hours. No commitment, no sales calls.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ app()->getLocale() === 'ar' ? 'تواصل معي' : 'Contact me' }} <i class="fa fa-arrow-right"></i></a>
                <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost">{{ app()->getLocale() === 'ar' ? 'تصفح المعرض' : 'View portfolio' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection
