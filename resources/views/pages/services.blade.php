@extends('layouts.app')

@section('title', 'Web Development Services — Laravel, React, Node.js, SaaS, E-commerce | Khaled Ahmed')
@section('description', 'Hire a senior full stack developer for custom web apps, SaaS MVPs, e-commerce, Laravel and React projects. Fixed-fee quotes, 24-hour response, 5+ years experience.')
@section('keywords', 'web development services, hire full stack developer, Laravel developer, React developer, Node.js developer, SaaS MVP development, e-commerce developer, Khaled Ahmed services')
@section('canonical', 'https://khaledahmed.net/services')

@section('structured_data')
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"ProfessionalService","name":"Khaled Ahmed — Web Development Services","url":"https://khaledahmed.net/services","image":"{{ asset('images/logo.png') }}","priceRange":"$$","areaServed":["EG","SA","AE","KW","QA","GB","CH","DE","FR"],"provider":{"@type":"Person","name":"Khaled Ahmed","jobTitle":"Senior Full Stack Web Developer","url":"https://khaledahmed.net","sameAs":["https://linkedin.com/in/khaled-ahmed-82368819b","https://github.com/khaled312001"]},"hasOfferCatalog":{"@type":"OfferCatalog","name":"Web Development Services","itemListElement":[{"@type":"Offer","itemOffered":{"@type":"Service","name":"Laravel Backend Development"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"React & Next.js Frontend"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"SaaS MVP Development"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"E-commerce Solutions"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Performance & SEO"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Maintenance & DevOps"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"AI Integration"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"UI/UX Implementation"}}]}}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://khaledahmed.net/"},{"@type":"ListItem","position":2,"name":"Services","item":"https://khaledahmed.net/services"}]}
</script>
@endsection

@push('styles')
<style>
    .svc-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .svc-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events:none; }
    .svc-hero > .container { position: relative; z-index: 1; }
    .svc-hero .lead { color: var(--text-2); font-size: 18px; max-width: 740px; margin: 0 0 var(--sp-5); }

    .svc-card { padding: 32px 28px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-lg); height: 100%; transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; position: relative; overflow: hidden; }
    .svc-card:hover { transform: translateY(-6px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
    .svc-card__ico { width: 54px; height: 54px; border-radius: var(--r-md); display:grid; place-items:center; background: linear-gradient(135deg, rgba(96,165,250,0.20), rgba(124,58,237,0.20)); color: var(--brand); font-size: 22px; margin-bottom: 18px; border: 1px solid rgba(96,165,250,0.20); }
    .svc-card h3 { color: var(--text-1); font-size: 19px; font-weight: 700; margin: 0 0 10px; }
    .svc-card p { color: var(--text-3); font-size: 14.5px; line-height: 1.7; margin: 0 0 14px; }
    .svc-card ul { padding: 0; margin: 0 0 16px; list-style: none; }
    .svc-card ul li { position: relative; padding-inline-start: 22px; color: var(--text-2); font-size: 13.5px; line-height: 1.6; margin-bottom: 6px; }
    .svc-card ul li::before { content: ''; position: absolute; inset-inline-start: 4px; top: 9px; width: 6px; height: 6px; border-radius: 50%; background: var(--brand); }
    .svc-card__stack { display:flex; flex-wrap: wrap; gap: 6px; padding-top: 14px; border-top: 1px solid var(--border-1); margin-top: auto; }
    .svc-card__stack span { font-size: 11.5px; color: var(--text-3); padding: 3px 9px; background: rgba(255,255,255,0.04); border-radius: var(--r-full); }
    .svc-card__cta { display: inline-flex; align-items: center; gap: 6px; color: var(--brand); font-weight: 700; font-size: 13.5px; text-decoration: none; margin-top: 14px; transition: gap .2s ease; }
    .svc-card__cta:hover { gap: 10px; color: var(--brand-2); }

    /* Process steps */
    .svc-step { padding: 24px 22px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-lg); height: 100%; transition: border-color .3s ease, transform .3s ease; }
    .svc-step:hover { border-color: var(--border-3); transform: translateY(-3px); }
    .svc-step__num { display: inline-grid; place-items: center; width: 42px; height: 42px; border-radius: var(--r-md); background: var(--gradient-2); color: #fff; font-weight: 800; font-size: 15px; margin-bottom: 14px; }
    .svc-step h3 { font-size: 17px; margin: 0 0 8px; }
    .svc-step p { color: var(--text-3); font-size: 14px; line-height: 1.65; margin: 0; }

    /* FAQ accordion */
    .svc-faq details { background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); margin-bottom: 10px; transition: border-color .2s ease; }
    .svc-faq details:hover { border-color: var(--border-3); }
    .svc-faq details[open] { border-color: var(--border-3); }
    .svc-faq summary { cursor: pointer; padding: 18px 22px; font-weight: 600; color: var(--text-1); list-style: none; display: flex; justify-content: space-between; align-items: center; gap: 14px; font-size: 15.5px; }
    .svc-faq summary::-webkit-details-marker { display: none; }
    .svc-faq summary::after { content: '+'; font-size: 22px; color: var(--brand); line-height: 1; transition: transform .2s ease; }
    .svc-faq details[open] summary::after { content: '−'; }
    .svc-faq .ans { padding: 0 22px 20px; color: var(--text-2); line-height: 1.75; font-size: 15px; }
</style>
@endpush

@section('content')

@php
    $isAr = app()->getLocale() === 'ar';
    $services = [
        ['fab fa-laravel', $isAr ? 'تطوير الخلفية بـ Laravel' : 'Laravel Backend Development',
            $isAr ? 'تطبيقات ويب ثابتة قابلة للتوسع: واجهات API، أنظمة مصادقة، طوابير معالجة، أنظمة فوترة وتعدد المستأجرين.' : 'Solid scalable web apps: REST/GraphQL APIs, auth systems, queue workers, billing engines, multi-tenant architecture.',
            $isAr ? ['تصميم قواعد البيانات وعلاقاتها','واجهات API موثقة بـ OpenAPI','تكاملات Stripe و PayPal و Paymob','جدولة المهام وطوابير Redis','معالجة الأخطاء والمراقبة'] : ['Database schema and migrations','API documented with OpenAPI','Stripe / PayPal / Paymob integrations','Scheduled jobs and Redis queues','Error handling and observability'],
            ['Laravel 11','PHP 8.3','MySQL','PostgreSQL','Redis'], 'hire-laravel-developer'],
        ['fab fa-react', $isAr ? 'واجهات React و Next.js' : 'React & Next.js Frontend',
            $isAr ? 'واجهات سريعة جاهزة لمحركات البحث بـ Next.js 15 و React Server Components و TypeScript و Tailwind.' : 'Fast, SEO-ready frontends with Next.js 15, React Server Components, TypeScript, and Tailwind.',
            $isAr ? ['تصميم متجاوب لكل الأجهزة','تحسين الصور والخطوط تلقائيا','أداء Lighthouse 95 فأعلى','إمكانية الوصول WCAG 2.2','تكامل ساعات CMS أو Headless'] : ['Pixel-perfect responsive design','Auto image & font optimization','Lighthouse 95+ performance','WCAG 2.2 accessibility','Headless CMS integration'],
            ['Next.js 15','React 19','TypeScript','Tailwind','Vercel'], 'hire-react-developer'],
        ['fas fa-rocket', $isAr ? 'بناء MVP لـ SaaS' : 'SaaS MVP Development',
            $isAr ? 'إطلاق منتج SaaS أولي خلال 8 إلى 16 أسبوعا مع كل الأساسيات: التسجيل، الاشتراكات، لوحة التحكم، الفوترة، النشر الآلي.' : 'Ship a SaaS MVP in 8-16 weeks with all essentials: signup, subscriptions, dashboards, billing, CI/CD deployment.',
            $isAr ? ['أنظمة فوترة Stripe كاملة','لوحة تحكم متعددة المستأجرين','أنظمة دور المستخدم والصلاحيات','تحليلات وتقارير','نشر على VPS أو Vercel'] : ['Stripe Cashier billing','Multi-tenant admin dashboard','Roles and permissions','Analytics dashboards','VPS or Vercel deployment'],
            ['Laravel','Next.js','Stripe','PostgreSQL','Docker'], 'saas-development'],
        ['fas fa-shopping-cart', $isAr ? 'متاجر إلكترونية' : 'E-commerce Solutions',
            $isAr ? 'متاجر WooCommerce أو Shopify أو Laravel مخصصة مع دفع متعدد ومخزون وشحن وتقارير وتكاملات CRM.' : 'WooCommerce, Shopify, or custom Laravel storefronts with multi-gateway payments, inventory, shipping, CRM integrations.',
            $isAr ? ['سله متقدمة بمنطق ضريبي وشحن','تكامل بوابات الدفع المحلية والعالمية','إدارة المخزون والمنتجات','نظام نقاط الولاء','تكامل مع شركات الشحن'] : ['Tax and shipping rule engine','Local + global payment gateways','Inventory + product management','Loyalty points system','Shipping carrier integrations'],
            ['Shopify','WooCommerce','Laravel','Stripe','Paymob'], 'ecommerce-development'],
        ['fas fa-bolt', $isAr ? 'الأداء وتحسين محركات البحث' : 'Performance & SEO',
            $isAr ? 'تحسين Core Web Vitals، تحقيق درجات Lighthouse فوق 95، schema markup، sitemap، canonical hygiene.' : 'Core Web Vitals tuning, Lighthouse 95+ scores, structured data, sitemap and canonical hygiene, technical SEO.',
            $isAr ? ['تدقيق فني كامل بتقرير مكتوب','إصلاحات أداء قابلة للقياس','schema.org و JSON-LD','sitemap و robots و canonical','تحليل Search Console'] : ['Full technical audit with report','Measurable performance fixes','Schema.org and JSON-LD','Sitemap, robots, canonical','Search Console analysis'],
            ['Lighthouse','Search Console','Schema.org','WebPageTest','GTmetrix'], null],
        ['fas fa-shield-alt', $isAr ? 'الصيانة والأمان و DevOps' : 'Maintenance, Security & DevOps',
            $isAr ? 'تعاقد شهري: تحديثات أمنية، نسخ احتياطي، مراقبة، حل ثغرات، نشر آلي، وإضافة ميزات صغيرة.' : 'Monthly retainers: security patches, backups, monitoring, vulnerability fixes, CI/CD, small feature additions.',
            $isAr ? ['تحديث المكتبات أسبوعيا','نسخ احتياطي يومي مشفر','مراقبة 24/7 بتنبيهات','تدقيقات أمنية ربع سنوية','استجابه طوارئ خلال 4 ساعات'] : ['Weekly dependency updates','Daily encrypted backups','24/7 monitoring with alerts','Quarterly security audits','4-hour emergency response'],
            ['GitHub Actions','Docker','AWS','Sentry','UptimeRobot'], null],
        ['fas fa-brain', $isAr ? 'تكامل الذكاء الاصطناعي' : 'AI Integration',
            $isAr ? 'دمج OpenAI و Anthropic Claude في تطبيقاتك: روبوتات محادثة، استرجاع محسن (RAG)، تلخيص، توليد محتوى.' : 'Integrate OpenAI, Anthropic Claude and other LLMs into your apps: chatbots, retrieval-augmented generation (RAG), summarization, content generation.',
            $isAr ? ['روبوتات محادثة للموقع','بحث دلالي على البيانات','تلخيص الوثائق','توليد المحتوى المساعد','حماية بيانات العملاء'] : ['Customer chatbots','Semantic search over docs','Document summarization','Content generation','Privacy-first design'],
            ['OpenAI','Anthropic','Pinecone','LangChain','Vector DB'], null],
        ['fas fa-paint-brush', $isAr ? 'تصميم وتطبيق UI/UX' : 'UI/UX Implementation',
            $isAr ? 'تحويل تصاميم Figma و Adobe XD إلى كود إنتاج عالي الجودة مع تفاعلية وانتقالات وميكرو-أنميشن.' : 'Convert Figma and Adobe XD designs into pixel-perfect production code with interactions, transitions, and micro-animations.',
            $isAr ? ['دقه pixel-perfect','تفاعلية وانتقالات لطيفه','تجربه RTL/LTR كاملة','دعم الوضع الداكن','مكونات قابلة لإعاده الاستخدام'] : ['Pixel-perfect implementation','Smooth interactions','Full RTL/LTR support','Dark mode support','Reusable components'],
            ['Figma','Adobe XD','Tailwind','Framer Motion','GSAP'], null],
    ];
@endphp

<section class="svc-hero">
    <div class="container">
        <div class="d-inline-flex align-items-center gap-2 mb-3" style="font-size:13px;color:var(--text-3);">
            <a href="{{ route('home') }}" style="color:var(--text-2);text-decoration:none;">{{ __('site.home') }}</a>
            <i class="fas fa-chevron-{{ $isAr ? 'left' : 'right' }}" style="font-size:10px;color:var(--text-4);"></i>
            <span>{{ $isAr ? 'الخدمات' : 'Services' }}</span>
        </div>
        <span class="ks-eyebrow"><span class="ks-dot"></span> {{ $isAr ? 'ما أقدمه' : 'What I deliver' }}</span>
        <h1 class="mt-3">{{ $isAr ? 'خدمات تطوير ويب' : 'Web development services' }} <span class="ks-grad-text">{{ $isAr ? 'تنشر في الإنتاج' : 'that ship to production' }}</span></h1>
        <p class="lead">{{ $isAr ? 'من تصميم البنية حتى النشر، 8 خدمات متخصصة لمشاريع ويب جادة. سعر ثابت، عرض مكتوب خلال 24 ساعة، ولا مكالمات مبيعات.' : 'From architecture to deployment — 8 specialized services for serious web projects. Fixed-fee quotes, written proposal within 24 hours, no sales calls.' }}</p>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'احصل على عرض سعر' : 'Get a quote' }} <i class="fa fa-arrow-right"></i></a>
            <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost">{{ $isAr ? 'تصفح أعمالي' : 'See my work' }} <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="container">
        <div class="row g-4">
            @foreach($services as $i => [$icon, $title, $desc, $items, $stack, $lp])
                <div class="col-md-6 col-lg-4 ks-fadeup">
                    <div class="svc-card d-flex flex-column">
                        <div class="svc-card__ico"><i class="{{ $icon }}"></i></div>
                        <h3>@if($lp)<a href="{{ url('/' . $lp) }}" style="color:inherit;text-decoration:none;">{{ $title }}</a>@else{{ $title }}@endif</h3>
                        <p>{{ $desc }}</p>
                        <ul>
                            @foreach($items as $it)<li>{{ $it }}</li>@endforeach
                        </ul>
                        <div class="svc-card__stack">@foreach($stack as $s)<span>{{ $s }}</span>@endforeach</div>
                        <a href="{{ $lp ? url('/' . $lp) : route('contact') }}" class="svc-card__cta">{{ $lp ? ($isAr ? 'اعرف المزيد' : 'Learn more') : ($isAr ? 'ابدأ مشروع' : 'Start a project') }} <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight" style="background: rgba(255,255,255,0.02);">
    <div class="container">
        <div class="ks-shead">
            <span class="ks-eyebrow">{{ $isAr ? 'كيف نشتغل' : 'How it works' }}</span>
            <h2>{{ $isAr ? 'عملية واضحة بأربع خطوات' : 'A simple four-step process' }}</h2>
            <p>{{ $isAr ? 'بدون عقود معقدة. نفس الخطوات التي اتبعتها في كل واحد من 25 مشروع نشرتهم.' : 'No 10-page contracts. The same four steps I used for every one of my 25+ shipped projects.' }}</p>
        </div>
        <div class="ks-media ks-fadeup" style="max-width: 920px; margin: 0 auto var(--sp-6);">
            <img src="{{ asset('images/site/process-workflow.png') }}"
                 alt="{{ $isAr ? 'مراحل العمل الأربع: اكتشاف، عرض سعر، تطوير، إطلاق' : 'Four-step delivery process: discovery, quote, build, launch' }}"
                 width="1536" height="1024" loading="lazy" decoding="async">
        </div>
        <div class="row g-4">
            @foreach([
                [$isAr ? 'مكالمة استكشافية مجانية' : 'Free discovery call',         $isAr ? 'مكالمة 30 دقيقة لفهم الهدف والمستخدمين والقيود. أخرج برأي صريح في ما إذا كان المشروع يستحق التنفيذ.' : '30-minute call to understand the goal, users, and constraints. I leave with enough to write a quote; you leave with an honest opinion.'],
                [$isAr ? 'عرض ثابت السعر خلال 24 ساعة' : 'Fixed-fee quote in 24h', $isAr ? 'مقترح مكتوب بمراحل وجدول دفع وموعد نهائي. لا فواتير بالساعة، ولا مفاجآت. أي تغيير نطاق نتفق على سعره أولا.' : 'A scoped fixed-fee proposal with milestones, payment schedule, and a hard deadline. No hourly games, no surprises.'],
                [$isAr ? 'تطوير بمعاينات أسبوعية' : 'Build with weekly demos',      $isAr ? 'رابط staging من أول يوم وعرض 15 دقيقة كل جمعة. تشوف التقدم في المتصفح، لا في لوحة Trello. التعديلات تحصل أسبوعيا.' : 'A staging URL on day one and a 15-minute demo every Friday. Course-corrections happen weekly, not at the end.'],
                [$isAr ? 'إطلاق ومتابعة' : 'Launch and stay close',                  $isAr ? 'نشر إنتاج، تحويل DNS، إعداد مراقبة، وضمان 30 يوم على كل سطر كود. معظم العملاء يستمرون بعقد صيانه.' : 'Production deploy, DNS cutover, monitoring set up, and a 30-day warranty on every line of code. Most clients stay on a retainer.'],
            ] as $i => [$title, $desc])
                <div class="col-md-6 col-lg-3 ks-fadeup">
                    <div class="svc-step">
                        <div class="svc-step__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <h3>{{ $title }}</h3>
                        <p>{{ $desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="ks-shead">
            <span class="ks-eyebrow">{{ $isAr ? 'أسئلة شائعة' : 'FAQ' }}</span>
            <h2>{{ $isAr ? 'الأسئلة التي تأتيني قبل التعاقد' : 'Questions I get before signing' }}</h2>
        </div>
        <div class="svc-faq" style="max-width: 820px; margin: 0 auto;">
            @foreach([
                [$isAr ? 'كم يكلف موقع مخصص؟' : 'How much does a custom web application cost?',                $isAr ? 'معظم تطبيقات الويب المخصصة بين 2,000 و 15,000 دولار حسب النطاق والتكاملات والمدة. موقع تسويقي بسيط في الحد الأدنى، ومنصة SaaS متعددة المستأجرين في الحد الأعلى. أرسل عرض ثابت السعر خلال 24 ساعة.' : 'Most custom web apps land between $2,000 and $15,000 depending on scope, integrations, and timeline. A marketing site is at the lower end; a multi-tenant SaaS sits at the higher end. I send a fixed-fee quote within 24 hours.'],
                [$isAr ? 'هل تعمل مع عملاء دوليين؟' : 'Do you work with international clients?',                  $isAr ? 'نعم، نشرت أكثر من 25 مشروعا في 8 دول (مصر، السعودية، الإمارات، الكويت، قطر، المملكة المتحدة، سويسرا، ألمانيا). التواصل بالإنجليزية أو العربية وتحديثات يومية واحترام فروق التوقيت.' : 'Yes — 25+ shipped projects across 8 countries (Egypt, Saudi, UAE, Kuwait, Qatar, UK, Switzerland, Germany). English or Arabic, daily updates, time-zone aware.'],
                [$isAr ? 'ما هي التقنيات التي تستخدمها؟' : 'Which stack do you use?',                              $isAr ? 'Laravel أو Node.js للخلفية، React أو Next.js للواجهة، MySQL أو PostgreSQL لقواعد البيانات، Redis للذاكرة المؤقتة، VPS لينكس أو Vercel للنشر. أختار التقنية التي تناسب مشروعك، لا التي أحبها.' : 'Laravel or Node.js for backend, React or Next.js for frontend, MySQL or PostgreSQL, Redis for cache and queues, Linux VPS or Vercel for hosting. I pick the stack that fits the project, not the other way around.'],
                [$isAr ? 'هل تستلم مشروع غير منتهي؟' : 'Can you take over a half-finished project?',              $isAr ? 'نعم، أنقذت عدة مشاريع تركها مطورون آخرون. أبدأ بتدقيق كود لمده يوم بتقرير مكتوب، ولا أعطي سعرا حتى نتفق على النطاق. لا ضغط عاطفي للاحتفاظ بكود سيء.' : 'Yes. I rescue projects abandoned mid-build. I start with a one-day code audit, deliver a written report, and only quote the rebuild after we agree on scope.'],
                [$isAr ? 'هل تقدم خدمات صيانة مستمرة؟' : 'Do you provide ongoing maintenance?',                    $isAr ? 'نعم، عقود شهرية تشمل إصلاح الأخطاء، تحديثات أمنية، مراقبة الاستضافة، نسخ احتياطي، وإضافات صغيرة. معظم العملاء يبقون على عقد صيانه بعد الإطلاق.' : 'Yes — monthly retainers cover bug fixes, security patches, hosting monitoring, backups, and small feature additions. Most clients stay on retainer after launch.'],
                [$isAr ? 'متى يمكن أن نبدأ؟' : 'How fast can you start?',                                          $isAr ? 'مكالمات الاستكشاف عادة خلال 24 ساعة من التواصل. معظم المشاريع تبدأ خلال أسبوع. إصلاحات الطوارئ (مواقع متعطلة، حوادث أمنية) عادة نفس اليوم.' : 'Discovery calls happen within 24 hours. Most projects start within 1 week. Emergency fixes (downed sites, security incidents) are usually addressed the same day.'],
                [$isAr ? 'هل توقع NDA؟' : 'Do you sign NDAs?',                                                      $isAr ? 'نعم، أوقع NDA متبادل لأي عميل يحتاج. للمشاريع التي تتعامل مع بيانات حساسة أو خوارزميات سرية أوقع NDA قبل مكالمة الاستكشاف.' : 'Yes — I sign mutual NDAs for any client that needs one. For projects with sensitive user data, payments, or proprietary algorithms, I default to NDA-first.'],
            ] as [$q, $a])
                <details>
                    <summary>{{ $q }}</summary>
                    <div class="ans">{{ $a }}</div>
                </details>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--tight">
    <div class="container">
        <div class="home-cta ks-fadeup">
            <h2>{{ $isAr ? 'لديك مشروع في بالك؟' : 'Have a project in mind?' }}</h2>
            <p>{{ $isAr ? 'أرسل ملف المشروع، وستحصل على رأي صريح، عرض ثابت السعر، وجدول زمني واقعي خلال 24 ساعة. دون التزام.' : 'Send the project brief. You will get an honest assessment, a fixed-fee quote, and a realistic timeline within 24 hours. No commitment.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'ابدأ مشروع' : 'Start a project' }} <i class="fa fa-arrow-right"></i></a>
                <a href="{{ route('portfolios') }}" class="ks-btn ks-btn--ghost">{{ $isAr ? 'تصفح الأعمال' : 'View portfolio' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection
