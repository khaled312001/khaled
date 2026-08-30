@extends('layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'عن خالد أحمد — مطور Laravel و React من القاهره' : 'About Khaled Ahmed — Laravel & React Developer, Cairo')
@section('description', app()->getLocale() === 'ar' ? 'خمس سنوات و40 مشروعا في بيئه الإنتاج عبر 8 دول، و8 تطبيقات على Google Play. كيف أعمل، وكم أتقاضى، وأي المشاريع أعتذر عنها.' : 'Five years, 40 production builds across 8 countries, 8 apps on Google Play. How I work, what I charge, and the projects I turn down.')
@section('keywords', 'Khaled Ahmed web developer, about Khaled Ahmed, Laravel expert Cairo, React developer Egypt, senior full stack developer, خالد أحمد مطور ويب')

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"AboutPage","name":"About Khaled Ahmed","url":"https://khaledahmed.net/about","mainEntity":{"@type":"Person","name":"Khaled Ahmed","jobTitle":"Senior Full Stack Web Developer","url":"https://khaledahmed.net","address":{"@type":"PostalAddress","addressLocality":"Cairo","addressCountry":"EG"},"alumniOf":[{"@type":"CollegeOrUniversity","name":"Luxor University"},{"@type":"EducationalOrganization","name":"ITI — Information Technology Institute"}],"sameAs":["https://linkedin.com/in/khaled-ahmed-82368819b","https://github.com/khaled312001"]}}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://khaledahmed.net/"},{"@type":"ListItem","position":2,"name":"About","item":"https://khaledahmed.net/about"}]}
</script>
@endsection

@push('styles')
<style>
    .about-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .about-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events: none; }
    .about-hero > .container { position: relative; z-index: 1; }
    .about-hero h1 { margin: 0 0 var(--sp-4); }
    .about-hero .lead { color: var(--text-2); font-size: 18px; max-width: 760px; }
    .about-bread { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-3); margin-bottom: var(--sp-3); }
    .about-bread a { color: var(--text-2); text-decoration: none; }
    .about-bread a:hover { color: var(--brand); }
    .about-bread i { font-size: 10px; color: var(--text-4); }

    /* Info grid */
    .about-info { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap: var(--sp-4); margin-top: var(--sp-6); }
    .about-info__row { padding: 16px 18px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); }
    .about-info__lbl { font-size: 12px; color: var(--text-3); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
    .about-info__val { font-size: 15px; color: var(--text-1); font-weight: 600; }
    .about-info__val a { color: inherit; }

    /* Profiles row */
    .about-profiles { display: flex; flex-wrap: wrap; gap: 10px; margin-top: var(--sp-5); }
    .about-profile { display: inline-flex; align-items: center; gap: 8px; padding: 11px 16px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); color: var(--text-1); font-weight: 600; font-size: 14px; text-decoration: none; transition: all .2s ease; }
    .about-profile:hover { border-color: var(--border-3); transform: translateY(-2px); color: var(--brand); }
    .about-profile.lin i { color: #0a66c2; }
    .about-profile.git i { color: #fff; }
    .about-profile.wa  i { color: var(--success); }
    .about-profile.mail i { color: var(--brand); }

    /* Timeline */
    .about-tl { position: relative; padding-inline-start: 26px; margin-top: var(--sp-5); }
    .about-tl::before { content:''; position:absolute; top:0; bottom:0; inset-inline-start: 8px; width: 2px; background: linear-gradient(180deg, var(--border-3), transparent); }
    .about-tl__item { position: relative; padding: 0 0 var(--sp-5) 0; }
    .about-tl__item::before { content:''; position:absolute; inset-inline-start: -22px; top: 8px; width: 12px; height: 12px; border-radius: 50%; background: var(--brand); box-shadow: 0 0 0 4px rgba(96,165,250,0.20); }
    .about-tl__role { font-size: 16px; font-weight: 700; color: var(--text-1); margin: 0 0 4px; }
    .about-tl__co { font-size: 13px; color: var(--brand); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
    .about-tl__when { font-size: 13px; color: var(--text-3); }

    /* Skills */
    .about-skill { padding: 18px 20px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); transition: border-color .2s ease, transform .2s ease; }
    .about-skill:hover { border-color: var(--border-3); transform: translateY(-2px); }
    .about-skill__head { display:flex; justify-content: space-between; align-items: baseline; margin-bottom: 10px; }
    .about-skill__name { font-weight: 700; color: var(--text-1); }
    .about-skill__pct { font-size: 13px; color: var(--brand); font-weight: 700; font-feature-settings: "tnum"; }
    .about-skill__bar { width: 100%; height: 6px; background: rgba(255,255,255,0.05); border-radius: 3px; overflow: hidden; }
    .about-skill__fill { height: 100%; background: var(--gradient-1); border-radius: 3px; transition: width 1.2s cubic-bezier(.2,.8,.2,1); width: 0; }
    .about-skill.is-in .about-skill__fill { width: var(--pct); }
</style>
@endpush

@section('content')

<section class="about-hero">
    <div class="container">
        <div class="about-bread">
            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
            <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
            <span>{{ app()->getLocale() === 'ar' ? 'عن خالد' : 'About' }}</span>
        </div>
        <span class="ks-eyebrow"><span class="ks-dot"></span> {{ app()->getLocale() === 'ar' ? 'تعرف علي' : 'Get to know me' }}</span>
        <h1>{{ app()->getLocale() === 'ar' ? 'أنا خالد أحمد، أصمم وأبني تطبيقات ويب' : 'I am Khaled Ahmed — I design and ship web applications' }} <span class="ks-grad-text">{{ app()->getLocale() === 'ar' ? 'تعمل فعلا' : 'that actually ship' }}</span></h1>
        <p class="lead">{{ app()->getLocale() === 'ar' ? 'مطور ويب Full Stack من القاهرة بأكثر من خمس سنوات من الخبرة العملية. سلمت 25 مشروع إنتاج في 8 دول، من شركات ناشئة سعودية إلى وكالات أوروبية. تخصصي: Laravel و React و Node.js وتصميم البنية القابلة للتوسع.' : 'Cairo-based full stack web developer with 5+ years of hands-on experience. Shipped 25+ production projects across 8 countries — from Saudi startups to European agencies. Specialized in Laravel, React, Node.js, and scalable architecture.' }}</p>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-7">
                <h2>{{ app()->getLocale() === 'ar' ? 'نبذة عني' : 'A bit about me' }}</h2>
                <p>{{ app()->getLocale() === 'ar' ? 'بدأت البرمجة في 2018 خلال دراستي تكنولوجيا المعلومات بجامعة الأقصر. خلال السنوات الخمس الأولى، التحقت بدبلومة معهد تكنولوجيا المعلومات (ITI) في مسار التطوير الشامل بـ PHP و Laravel، وعملت في خمس شركات بين مصر وسويسرا والإمارات والسعودية. حاليا أؤسس شركة Barmagly المرخصة من سويسرا، وأعمل بالتوازي على مشاريع حرة لعملاء دوليين.' : 'I started programming in 2018 while studying Information Technology at Luxor University. Within five years I completed an intensive Full Stack Diploma (PHP / Laravel) at ITI, and worked across five companies in Egypt, Switzerland, UAE, and Saudi Arabia. Today I run Swiss-licensed Barmagly while taking on freelance projects for international clients.' }}</p>
                <p>{{ app()->getLocale() === 'ar' ? 'فلسفتي بسيطة: الكود الجيد يخدم العميل، لا يخدم نفسه. لا أكتب أكواد معقدة لإثبات الذكاء، وأركز على الحلول التي تنشر بثبات، تكلف أقل في الصيانة، وتعمل لسنوات. كل عميل يحصل على عرض ثابت السعر مع تسليمات واضحة وموعد نهائي صارم.' : 'My philosophy is simple: good code serves the client, not itself. I do not write clever code to prove intelligence; I focus on solutions that ship reliably, cost less to maintain, and work for years. Every client gets a fixed-fee quote with clear deliverables and a hard deadline.' }}</p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ app()->getLocale() === 'ar' ? 'تواصل معي' : 'Contact me' }} <i class="fa fa-arrow-right"></i></a>
                    <a href="/Khaled_Ahmed.pdf" class="ks-btn ks-btn--ghost" download><i class="fa fa-download"></i> {{ app()->getLocale() === 'ar' ? 'تحميل السيرة الذاتية' : 'Download CV' }}</a>
                </div>

                <div class="about-profiles">
                    <a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" rel="me noopener" class="about-profile lin"><i class="fab fa-linkedin"></i> LinkedIn</a>
                    <a href="https://github.com/khaled312001" target="_blank" rel="me noopener" class="about-profile git"><i class="fab fa-github"></i> GitHub</a>
                    <a href="https://wa.me/201204593124" target="_blank" rel="noopener" class="about-profile wa"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    <a href="mailto:khaledahmedhaggagy@gmail.com" class="about-profile mail"><i class="fas fa-envelope"></i> Email</a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="ks-media ks-fadeup" style="margin-bottom: 20px;">
                    <img src="{{ asset('images/site/about-developer.webp') }}"
                         alt="{{ app()->getLocale() === 'ar' ? 'مساحة عمل مطور ويب خبير — أكواد وشاشات وتصميم معماري' : 'Senior web developer workspace — clean code, multiple monitors, architecture' }}"
                         width="1536" height="1024" loading="lazy" decoding="async">
                </div>
                <div class="about-info">
                    <div class="about-info__row"><div class="about-info__lbl">{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}</div><div class="about-info__val">Khaled Ahmed</div></div>
                    <div class="about-info__row"><div class="about-info__lbl">{{ app()->getLocale() === 'ar' ? 'الموقع' : 'Location' }}</div><div class="about-info__val">{{ app()->getLocale() === 'ar' ? 'القاهرة، مصر' : 'Cairo, Egypt' }}</div></div>
                    <div class="about-info__row"><div class="about-info__lbl">{{ app()->getLocale() === 'ar' ? 'العمل الحر' : 'Freelance' }}</div><div class="about-info__val" style="color:var(--success);"><i class="fas fa-circle" style="font-size:8px;"></i> {{ app()->getLocale() === 'ar' ? 'متاح' : 'Available' }}</div></div>
                    <div class="about-info__row"><div class="about-info__lbl">{{ app()->getLocale() === 'ar' ? 'التعليم' : 'Education' }}</div><div class="about-info__val">Luxor University · ITI Diploma</div></div>
                    <div class="about-info__row"><div class="about-info__lbl">{{ app()->getLocale() === 'ar' ? 'اللغات' : 'Languages' }}</div><div class="about-info__val">{{ app()->getLocale() === 'ar' ? 'العربية والإنجليزية' : 'English & Arabic' }}</div></div>
                    <div class="about-info__row"><div class="about-info__lbl">{{ app()->getLocale() === 'ar' ? 'الهاتف' : 'Phone' }}</div><div class="about-info__val" dir="ltr"><a href="tel:+201204593124">+20 120 459 3124</a></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight" style="background: rgba(255,255,255,0.02);">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <span class="ks-eyebrow">{{ app()->getLocale() === 'ar' ? 'المسيرة' : 'Career' }}</span>
                <h2 class="mt-3">{{ app()->getLocale() === 'ar' ? 'الخبرة المهنية' : 'Professional experience' }}</h2>
                <div class="about-tl">
                    @php
                    $jobs = [
                        ['XAPPEE',                  app()->getLocale() === 'ar' ? 'مطور ويب' : 'Web Developer',                  app()->getLocale() === 'ar' ? 'ديسمبر 2025 — حتى الآن · دوام كامل' : 'Dec 2025 — Present · Full-time'],
                        ['GREEN ARROW ACADEMY',     app()->getLocale() === 'ar' ? 'مدرب برمجة' : 'Coding Instructor',             app()->getLocale() === 'ar' ? 'مايو — أكتوبر 2025 · السعودية' : 'May — Oct 2025 · Saudi Arabia'],
                        ['NILE INTERNATIONAL SCHOOLS', app()->getLocale() === 'ar' ? 'معلم تكنولوجيا المعلومات' : 'ICT Teacher',  app()->getLocale() === 'ar' ? 'يوليو 2024 — مايو 2025 · مصر' : 'Jul 2024 — May 2025 · Egypt'],
                        ['NEO SOFT HUB',            app()->getLocale() === 'ar' ? 'مطور ويب' : 'Web Developer',                  app()->getLocale() === 'ar' ? 'فبراير 2022 — فبراير 2024 · سويسرا' : 'Feb 2022 — Feb 2024 · Switzerland'],
                        ['ALBAHITH ACADEMY',        app()->getLocale() === 'ar' ? 'مطور Full Stack' : 'Full Stack Developer',         app()->getLocale() === 'ar' ? 'يونيو 2022 — أغسطس 2023 · الإمارات' : 'Jun 2022 — Aug 2023 · UAE'],
                        ['BARMAGLY',                app()->getLocale() === 'ar' ? 'مؤسس ومطور رئيسي' : 'Founder & Lead Developer', app()->getLocale() === 'ar' ? 'مايو 2021 — حتى الآن · مصر' : 'May 2021 — Present · Egypt'],
                    ];
                    @endphp
                    @foreach($jobs as [$co, $role, $when])
                        <div class="about-tl__item ks-fadeup">
                            <div class="about-tl__co">{{ $co }}</div>
                            <div class="about-tl__role">{{ $role }}</div>
                            <div class="about-tl__when">{{ $when }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6">
                <span class="ks-eyebrow">{{ app()->getLocale() === 'ar' ? 'التعليم' : 'Education' }}</span>
                <h2 class="mt-3">{{ app()->getLocale() === 'ar' ? 'الخلفية الأكاديمية' : 'Academic background' }}</h2>
                <div class="about-tl">
                    <div class="about-tl__item ks-fadeup">
                        <div class="about-tl__co">LUXOR UNIVERSITY</div>
                        <div class="about-tl__role">{{ app()->getLocale() === 'ar' ? 'بكالوريوس تكنولوجيا المعلومات' : 'BSc in Information Technology' }}</div>
                        <div class="about-tl__when">{{ app()->getLocale() === 'ar' ? '2018 — 2022 · الأقصر، مصر' : '2018 — 2022 · Luxor, Egypt' }}</div>
                    </div>
                    <div class="about-tl__item ks-fadeup">
                        <div class="about-tl__co">ITI — INFORMATION TECHNOLOGY INSTITUTE</div>
                        <div class="about-tl__role">{{ app()->getLocale() === 'ar' ? 'دبلومة التطوير الشامل (PHP / Laravel)' : 'Full Stack Development Diploma (PHP / Laravel)' }}</div>
                        <div class="about-tl__when">{{ app()->getLocale() === 'ar' ? 'مسار مكثف · مصر' : 'Intensive Track · Egypt' }}</div>
                    </div>
                </div>

                <h2 class="mt-5">{{ app()->getLocale() === 'ar' ? 'مستويات المهارة' : 'Skill levels' }}</h2>
                <div class="d-flex flex-column gap-3">
                    @foreach([
                        ['Frontend (React / Next.js / Vue)', 95],
                        ['Backend (Laravel / Node.js)', 95],
                        ['Database & DevOps', 88],
                        ['Performance & SEO', 90],
                        ['UI / UX Implementation', 85],
                    ] as [$name, $pct])
                        <div class="about-skill ks-fadeup" style="--pct: {{ $pct }}%;">
                            <div class="about-skill__head"><span class="about-skill__name">{{ $name }}</span><span class="about-skill__pct">{{ $pct }}%</span></div>
                            <div class="about-skill__bar"><div class="about-skill__fill"></div></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="ks-shead ks-fadeup">
            <span class="ks-eyebrow">{{ app()->getLocale() === 'ar' ? 'الأدوات' : 'Stack' }}</span>
            <h2>{{ app()->getLocale() === 'ar' ? 'التقنيات والأدوات' : 'Technologies & tools' }}</h2>
        </div>
        <div class="d-flex flex-wrap justify-content-center" style="gap:10px; max-width: 900px; margin: 0 auto;">
            @foreach([
                ['fab fa-react', 'React'],['fab fa-vuejs', 'Vue.js'],['fab fa-js', 'TypeScript'],['fab fa-laravel', 'Laravel'],['fab fa-php', 'PHP 8.3'],
                ['fab fa-node-js', 'Node.js'],['fas fa-server', 'Express'],['fas fa-database', 'MySQL'],['fas fa-database', 'PostgreSQL'],['fas fa-database', 'MongoDB'],
                ['fas fa-server', 'Redis'],['fab fa-aws', 'AWS'],['fab fa-docker', 'Docker'],['fab fa-git-alt', 'Git'],['fab fa-figma', 'Figma'],['fas fa-credit-card', 'Stripe'],
            ] as [$icon, $name])
                <span class="ks-chip"><i class="{{ $icon }}"></i> {{ $name }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="home-cta ks-fadeup">
            <h2>{{ app()->getLocale() === 'ar' ? 'هل لديك مشروع في بالك؟' : 'Have a project in mind?' }}</h2>
            <p>{{ app()->getLocale() === 'ar' ? 'استشارة مجانية لمدة 30 دقيقة، وعرض ثابت السعر خلال 24 ساعة، ودون أي مكالمات مبيعات.' : 'Free 30-minute discovery call, fixed-fee quote within 24 hours, no sales calls — ever.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ app()->getLocale() === 'ar' ? 'احجز استشارة' : 'Book a consultation' }} <i class="fa fa-arrow-right"></i></a>
                <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost">{{ app()->getLocale() === 'ar' ? 'تصفح المعرض' : 'View portfolio' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection
