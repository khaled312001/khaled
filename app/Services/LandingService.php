<?php

namespace App\Services;

/**
 * High-commercial-intent SEO landing pages (hire-intent keywords).
 * Each page targets Gulf + global markets. Data-driven; rendered by
 * resources/views/pages/landing.blade.php via PageController::landing().
 */
class LandingService
{
    /** Ordered list of landing slugs (used for routes, sitemap, nav). */
    public static function slugs(): array
    {
        return array_keys(self::pages());
    }

    public static function find(string $slug): ?array
    {
        return self::pages()[$slug] ?? null;
    }

    /** Lightweight list for nav/footer/sitemap (slug + localized label). */
    public static function index(): array
    {
        $isAr = function_exists('app') && app()->getLocale() === 'ar';
        $out = [];
        foreach (self::pages() as $slug => $p) {
            $out[] = [
                'slug'  => $slug,
                'label' => $isAr && !empty($p['nav_ar']) ? $p['nav_ar'] : $p['nav'],
            ];
        }
        return $out;
    }

    private static function pages(): array
    {
        return [
            'hire-laravel-developer' => [
                'slug' => 'hire-laravel-developer',
                'nav' => 'Hire a Laravel Developer',
                'nav_ar' => 'مطور Laravel',
                'service_type' => 'Laravel Development',
                'related_category' => 'Tech / SaaS',
                'image' => 'site/laravel-code.png',
                'image_alt' => 'Laravel backend architecture with API endpoints and database — expert Laravel development',
                'keywords' => 'hire Laravel developer, Laravel development services, Laravel developer for hire, expert Laravel developer, Laravel API development, hire Laravel developer Saudi Arabia, hire Laravel developer UAE, Khaled Ahmed',
                'meta_title' => 'Hire a Laravel Developer | Senior Full-Stack, 25+ Projects',
                'meta_title_ar' => 'وظّف مطور Laravel خبير | خبرة 5 سنوات و25 مشروعاً',
                'meta_description' => "Hire a Laravel developer with 5+ years and 25+ shipped projects across 8 countries. Expert Laravel APIs, dashboards & MVPs from $30/hr. Let's build yours.",
                'meta_description_ar' => 'وظّف مطور Laravel خبير بخبرة تتجاوز 5 سنوات و25 مشروعاً منجزاً في 8 دول. واجهات برمجية ولوحات تحكم ونسخ أولية احترافية بدءاً من 30 دولاراً للساعة.',
                'h1' => 'Hire a Laravel Developer Who Ships Production-Ready Apps',
                'h1_ar' => 'وظّف مطور Laravel يبني تطبيقات جاهزة للإطلاق',
                'hero_sub' => 'Senior full stack developer, 5+ years, 25+ projects across 8 countries — clean code, clear English, and on-time delivery for Gulf and global clients.',
                'hero_sub_ar' => 'مطور full stack أول، خبرة تتجاوز 5 سنوات و25 مشروعاً في 8 دول — كود نظيف وتواصل واضح وتسليم في الموعد لعملاء الخليج والعالم.',
                'intro_html' => '<p>Looking to hire a Laravel developer who can take your project from idea to launch without hand-holding? I am Khaled Ahmed, a senior full stack developer based in Cairo with 5+ years building production Laravel applications and 25+ shipped projects across 8 countries. Whether you need a REST API, an admin dashboard, a SaaS MVP, or a rescue mission on an inherited codebase, I write clean, tested, maintainable code and communicate in clear English from kickoff to launch.</p><p>My Laravel development services cover the full lifecycle — architecture, database design, API integrations, payment gateways, queues, and deployment. Clients in Saudi Arabia, the UAE, Kuwait, and across the US, UK, and EU hire me because I deliver on time and explain the trade-offs in plain language, not jargon. If you want an expert Laravel developer for hire who treats your budget like his own, you are in the right place.</p>',
                'intro_html_ar' => '<p>هل تبحث عن توظيف مطور Laravel قادر على نقل مشروعك من الفكرة إلى الإطلاق دون حاجة إلى متابعة مستمرة؟ أنا خالد أحمد، مطور full stack أول مقيم في القاهرة، أمتلك أكثر من 5 سنوات في بناء تطبيقات Laravel الإنتاجية، وأنجزت أكثر من 25 مشروعاً في 8 دول. سواء كنت بحاجة إلى واجهة برمجية (API) أو لوحة تحكم أو نسخة أولية من منتجك (MVP) أو إنقاذ مشروع متعثر، فأنا أكتب كوداً نظيفاً ومختبراً وقابلاً للصيانة، وأتواصل بوضوح طوال الرحلة.</p><p>تغطي خدمات تطوير Laravel التي أقدمها دورة العمل كاملة: تصميم البنية وقواعد البيانات وربط الواجهات البرمجية وبوابات الدفع والطوابير والنشر. يختارني عملاء من السعودية والإمارات والكويت، ومن الولايات المتحدة وبريطانيا وأوروبا، لأنني ألتزم بالمواعيد وأشرح الخيارات بلغة بسيطة بعيداً عن التعقيد. وإن كنت تبحث عن مطور Laravel خبير يتعامل مع ميزانيتك وكأنها ميزانيته، فأنت في المكان الصحيح.</p>',
                'deliverables' => [
                    'Custom Laravel web apps built from scratch with clean, documented code',
                    'RESTful & JSON APIs with authentication (Sanctum/Passport) and full documentation',
                    'Admin dashboards & control panels with Filament, Livewire, or Inertia + Vue/React',
                    'Payment gateway integration (Stripe, PayPal, Tap, HyperPay, Paymob)',
                    'Database design, optimization, and complex query tuning (MySQL/PostgreSQL)',
                    'Third-party, ERP/CRM integrations, webhooks, and background jobs with queues',
                    'Legacy Laravel upgrades, bug fixes, and codebase rescue/refactoring',
                    'Deployment, CI/CD, server setup, and ongoing maintenance & support',
                ],
                'deliverables_ar' => [
                    'تطبيقات Laravel مخصّصة تُبنى من الصفر بكود نظيف وموثّق',
                    'واجهات برمجية REST وJSON مع مصادقة (Sanctum/Passport) وتوثيق كامل',
                    'لوحات تحكم وإدارة باستخدام Filament أو Livewire أو Inertia مع Vue/React',
                    'ربط بوابات الدفع (Stripe وPayPal وTap وHyperPay وPaymob)',
                    'تصميم قواعد البيانات وتحسينها وضبط الاستعلامات المعقدة (MySQL/PostgreSQL)',
                    'التكامل مع أنظمة الطرف الثالث وERP/CRM والويب هوك والمهام الخلفية عبر الطوابير',
                    'ترقية مشاريع Laravel القديمة وإصلاح الأخطاء وإنقاذ الكود وإعادة هيكلته',
                    'النشر وCI/CD وإعداد الخوادم والصيانة والدعم المستمر',
                ],
                'why_html' => '<p>When you hire a Laravel developer, you are really buying judgment — knowing which package to trust, when to cache, and how to keep a database fast at scale. I have made those calls on 25+ real projects, including e-commerce platforms, logistics systems, and delivery apps, and I founded Barmagly to help teams ship software the right way. You get a senior engineer, not a junior learning on your dime.</p><p>Communication is where most freelance relationships fail, so I over-communicate: a clear scope up front, short async updates, and a working demo you can click every week. I work comfortably across Gulf and Western time zones, reply within hours, and never disappear mid-project. Hiring an expert Laravel developer should feel calm, not stressful.</p><p>My rates are transparent — typically $30-$60/hr depending on scope, or a fixed price once we lock requirements. A focused MVP usually takes 8-16 weeks. That combination of senior skill, honest pricing, and reliable delivery is why clients keep coming back, and why hiring a Laravel developer like me pays for itself.</p>',
                'why_html_ar' => '<p>عندما توظّف مطور Laravel، فأنت في الحقيقة تشتري حسن التقدير: معرفة أي حزمة تستحق الثقة، ومتى تلجأ إلى التخزين المؤقت، وكيف تُبقي قاعدة البيانات سريعة عند التوسع. لقد اتخذت هذه القرارات في أكثر من 25 مشروعاً حقيقياً، منها منصات تجارة إلكترونية وأنظمة لوجستية وتطبيقات توصيل، وأسست شركة Barmagly لمساعدة الفرق على بناء البرمجيات بالطريقة الصحيحة. أنت تحصل على مهندس أول، لا على مبتدئ يتعلّم على حسابك.</p><p>التواصل هو ما يُفشل معظم علاقات العمل الحر، لذلك أبالغ فيه: نطاق واضح منذ البداية، وتحديثات قصيرة غير متزامنة، ونموذج يعمل يمكنك تجربته كل أسبوع. أعمل بمرونة عبر توقيت الخليج والغرب، وأردّ خلال ساعات، ولا أختفي في منتصف المشروع أبداً. توظيف مطور Laravel خبير يجب أن يكون تجربة مريحة لا مصدر توتر.</p><p>أسعاري شفافة، تتراوح غالباً بين 30 و60 دولاراً في الساعة حسب النطاق، أو بسعر ثابت بعد تحديد المتطلبات. وتستغرق النسخة الأولية المركزة عادةً من 8 إلى 16 أسبوعاً. هذا المزيج من الخبرة العالية والتسعير الصادق والتسليم الموثوق هو سبب عودة العملاء إليّ.</p>',
                'tech' => ['Laravel 11', 'PHP 8.3', 'MySQL', 'PostgreSQL', 'Redis', 'Inertia.js', 'Livewire', 'Filament'],
                'faq' => [
                    ['q' => 'How much does it cost to hire a Laravel developer?', 'a' => 'My rate is typically $30-$60 per hour depending on complexity and how senior the work is. For well-defined projects I also offer fixed pricing once we agree on scope, so you know the total upfront with no surprises. A small API or dashboard might run a few thousand dollars, while a full SaaS MVP is larger. I always give you an honest estimate and flag anything that could push cost up before I start.'],
                    ['q' => 'How long does it take to build a Laravel MVP?', 'a' => 'A focused MVP usually takes 8 to 16 weeks, depending on the number of features, integrations, and how quickly you can give feedback. I break the work into weekly milestones with a clickable demo at the end of each one, so you see progress instead of waiting months in the dark. Simple APIs or dashboards can ship in 2 to 4 weeks.'],
                    ['q' => 'Can you work with clients in Saudi Arabia and the UAE?', 'a' => 'Yes — a large share of my clients are in the Gulf, including Saudi Arabia, the UAE, and Kuwait. I have delivered projects across 8 countries and work comfortably in Gulf time zones, with overlap for calls during your business hours. I can invoice in USD and communicate in English or Arabic, and I understand local market expectations including payments and RTL support.'],
                    ['q' => 'Do you build Laravel APIs for mobile apps?', 'a' => 'Absolutely. Laravel API development is one of my core services. I build clean, versioned REST or JSON APIs secured with Laravel Sanctum or Passport, complete with rate limiting, validation, and clear documentation your mobile or frontend team can consume immediately. I have powered iOS, Android, Flutter, and React/Vue apps with Laravel backends.'],
                    ['q' => 'Can you fix or take over an existing Laravel project?', 'a' => 'Yes, taking over existing Laravel projects is something I do often. I start with a short audit of the codebase, database, and dependencies, then give you an honest report on what is solid, what is risky, and what it will take to move forward. From there I can fix urgent bugs, upgrade an old Laravel version, refactor messy areas, or add new features.'],
                    ['q' => 'What is your process for starting a new project?', 'a' => 'It is simple. We start with a short call or message where you describe your goals, and I ask the questions that matter. I then send a clear proposal with scope, timeline, and price. Once we agree, I set up the repo and give you access so you can watch progress in real time. I share weekly demos and am happy to sign an NDA. When the project ends, you own 100% of the code.'],
                ],
                'faq_ar' => [
                    ['q' => 'ما تكلفة توظيف مطور Laravel؟', 'a' => 'يتراوح سعري عادةً بين 30 و60 دولاراً في الساعة حسب تعقيد العمل ومستواه. وللمشاريع المحددة المعالم أقدّم سعراً ثابتاً بعد الاتفاق على النطاق، لتعرف التكلفة الإجمالية مسبقاً دون مفاجآت. قد تكلّف واجهة برمجية صغيرة بضعة آلاف من الدولارات، بينما تكون النسخة الأولية الكاملة أكبر. سأمنحك دائماً تقديراً صادقاً قبل أن أبدأ.'],
                    ['q' => 'كم يستغرق بناء نسخة أولية بLaravel؟', 'a' => 'تستغرق النسخة الأولية المركزة عادةً بين 8 و16 أسبوعاً، بحسب عدد الميزات وعمليات الربط وسرعة تزويدك بالملاحظات. أقسّم العمل إلى مراحل أسبوعية، وأسلّم في نهاية كل مرحلة نموذجاً قابلاً للتجربة، لترى التقدّم بدل الانتظار لأشهر. أما الواجهات البرمجية أو لوحات التحكم البسيطة فيمكن تسليمها خلال أسبوعين إلى أربعة.'],
                    ['q' => 'هل تعمل مع عملاء في السعودية والإمارات؟', 'a' => 'نعم، نسبة كبيرة من عملائي في الخليج، وتشمل السعودية والإمارات والكويت. أنجزت مشاريع في 8 دول وأعمل بمرونة ضمن توقيت الخليج مع تداخل كافٍ للمكالمات. ويمكنني إصدار الفواتير بالدولار والتواصل بالعربية أو الإنجليزية، وأفهم توقعات السوق المحلي من بوابات الدفع إلى دعم الاتجاه من اليمين لليسار.'],
                    ['q' => 'هل تبني واجهات برمجية بLaravel لتطبيقات الجوال؟', 'a' => 'بالتأكيد، فتطوير واجهات Laravel البرمجية من صميم خدماتي. أبني واجهات REST أو JSON نظيفة ومؤمّنة عبر Sanctum أو Passport، مع تحديد للمعدل والتحقق من المدخلات وتوثيق واضح يستطيع فريقك استهلاكه فوراً. شغّلت تطبيقات iOS وأندرويد وفلاتر وReact/Vue بخلفيات Laravel.'],
                    ['q' => 'هل يمكنك إصلاح مشروع Laravel قائم أو استلامه؟', 'a' => 'نعم، استلام مشاريع Laravel القائمة أمر أقوم به كثيراً. أبدأ بمراجعة سريعة للكود وقاعدة البيانات والاعتماديات، ثم أمنحك تقريراً صادقاً عمّا هو متين وما هو محفوف بالمخاطر. بعدها أستطيع إصلاح الأخطاء العاجلة أو ترقية إصدار Laravel القديم أو إعادة هيكلة الأجزاء المتشابكة أو إضافة ميزات جديدة.'],
                    ['q' => 'كيف نبدأ العمل معاً؟', 'a' => 'الأمر بسيط. نبدأ بمكالمة أو رسالة قصيرة تصف فيها أهدافك، وأطرح أنا الأسئلة المهمة. بعدها أرسل عرضاً واضحاً يتضمن النطاق والجدول الزمني والسعر. وبمجرد الاتفاق، أجهّز المستودع وأمنحك صلاحية الوصول لتتابع التقدّم لحظياً. أشارك نماذج أسبوعية ويسعدني توقيع اتفاقية عدم إفصاح. وعند انتهاء المشروع، تملك 100% من الكود.'],
                ],
            ],

            'hire-react-developer' => [
                'slug' => 'hire-react-developer',
                'nav' => 'Hire a React Developer',
                'nav_ar' => 'مطور React',
                'service_type' => 'React & Next.js Development',
                'related_category' => 'Tech / SaaS',
                'image' => 'site/react-frontend.png',
                'image_alt' => 'Modern React and Next.js frontend interfaces — hire an expert React developer',
                'keywords' => 'hire React developer, React development services, Next.js developer for hire, React.js expert, hire Next.js developer, frontend developer for hire, Khaled Ahmed',
                'meta_title' => 'Hire React Developer | React.js & Next.js Expert — Khaled',
                'meta_title_ar' => 'وظّف مطوّر React | خبير React.js و Next.js',
                'meta_description' => 'Hire a React developer with 5+ years and 25+ shipped projects across 8 countries. I build fast, scalable React & Next.js apps for Gulf and global teams.',
                'meta_description_ar' => 'وظّف مطوّر React خبير يمتلك أكثر من 5 سنوات وأكثر من 25 مشروعاً منجزاً في 8 دول. أبني تطبيقات React و Next.js سريعة وقابلة للتوسّع لعملاء الخليج والعالم.',
                'h1' => 'Hire a React Developer Who Ships Fast, Scalable Apps',
                'h1_ar' => 'وظّف مطوّر React يبني تطبيقات سريعة وقابلة للتوسّع',
                'hero_sub' => 'I am Khaled Ahmed, a senior full stack developer in Cairo with 5+ years building React and Next.js products for 25+ clients across 8 countries.',
                'hero_sub_ar' => 'أنا خالد أحمد، مطوّر full stack خبير من القاهرة، أمتلك أكثر من 5 سنوات في بناء منتجات React و Next.js لأكثر من 25 عميلاً في 8 دول.',
                'intro_html' => '<p>Looking to hire a React developer who can turn your idea into a fast, reliable product? I am Khaled Ahmed, a senior full stack developer based in Cairo with 5+ years of experience and 25+ shipped projects across 8 countries. I provide focused React development services for startups, agencies, and established businesses in the Gulf and worldwide, from single landing pages to full-scale web applications.</p><p>Whether you need a React.js expert to rebuild a slow interface, a Next.js developer for hire to launch an SEO-ready site, or a frontend developer for hire to join your team, I write clean, tested, production-grade code. Every project ships with performance, accessibility, and long-term maintainability built in, so you hire once and scale for years.</p>',
                'intro_html_ar' => '<p>هل تبحث عن توظيف مطوّر React قادر على تحويل فكرتك إلى منتج سريع وموثوق؟ أنا خالد أحمد، مطوّر full stack خبير مقيم في القاهرة، أمتلك أكثر من 5 سنوات من الخبرة وأكثر من 25 مشروعاً منجزاً في 8 دول. أقدّم خدمات تطوير React مخصّصة للشركات الناشئة والوكالات والشركات القائمة في الخليج وحول العالم، من صفحات الهبوط الفردية إلى تطبيقات الويب المتكاملة.</p><p>سواء كنت بحاجة إلى خبير React.js لإعادة بناء واجهة بطيئة، أو مطوّر Next.js لإطلاق موقع جاهز لمحركات البحث، أو مطوّر واجهات أمامية للانضمام إلى فريقك، فأنا أكتب كوداً نظيفاً ومختبراً وجاهزاً للإنتاج. كل مشروع يُسلَّم بأداء عالٍ وإتاحة وصول وقابلية صيانة على المدى الطويل.</p>',
                'deliverables' => [
                    'Custom React & Next.js web applications built for speed and scale',
                    'SEO-optimized, server-rendered pages with the Next.js App Router',
                    'Responsive, pixel-perfect UI from Figma or design files',
                    'TypeScript codebases with reusable, well-documented components',
                    'REST and GraphQL API integration with secure authentication',
                    'Performance audits and Core Web Vitals optimization',
                    'Migration from legacy React or other frameworks to modern React 19',
                    'Post-launch support, maintenance, and feature development',
                ],
                'deliverables_ar' => [
                    'تطبيقات ويب مخصّصة بـ React و Next.js مبنية للسرعة والتوسّع',
                    'صفحات مُحسّنة لمحركات البحث ومعروضة من الخادم عبر Next.js App Router',
                    'واجهات مستخدم متجاوبة ودقيقة انطلاقاً من ملفات Figma أو التصميم',
                    'قواعد كود بـ TypeScript مع مكوّنات قابلة لإعادة الاستخدام وموثّقة جيداً',
                    'تكامل واجهات REST و GraphQL مع مصادقة آمنة',
                    'تدقيق الأداء وتحسين مؤشرات Core Web Vitals',
                    'الترحيل من React القديم أو أطر أخرى إلى React 19 الحديث',
                    'دعم ما بعد الإطلاق والصيانة وتطوير الميزات',
                ],
                'why_html' => '<p>When you hire a React developer, you are trusting someone with the core of your product. Over 5+ years I have delivered 25+ projects across 8 countries, which means I have already solved the problems that slow most teams down: messy state, poor performance, broken builds, and code no one wants to touch six months later.</p><p>I work directly with you, no account managers, no hand-offs. You talk to the person writing the code. That means faster decisions, honest timelines, and a build that matches what you actually asked for. My React development services cover the full journey: architecture, UI, API integration, testing, and deployment.</p><p>I am fluent in both English and Arabic and comfortable across Gulf, European, and US time zones. Clients in Saudi Arabia, the UAE, Kuwait, and beyond hire me because I combine senior React and Next.js skills with clear communication and a genuine commitment to shipping work I am proud of.</p>',
                'why_html_ar' => '<p>عندما توظّف مطوّر React، فأنت تأتمن شخصاً على قلب منتجك. على مدى أكثر من 5 سنوات أنجزت أكثر من 25 مشروعاً في 8 دول، ما يعني أنني حللت مسبقاً المشكلات التي تُبطئ معظم الفرق: الحالة الفوضوية، وضعف الأداء، والبناء المعطّل، والكود الذي لا يجرؤ أحد على لمسه بعد ستة أشهر.</p><p>أعمل معك مباشرة، دون مديري حسابات ودون وسطاء؛ أنت تتحدث إلى الشخص الذي يكتب الكود فعلاً. هذا يعني قرارات أسرع، ومواعيد صادقة، ومنتجاً يطابق ما طلبته بالضبط. تغطّي خدمات تطوير React لديّ الرحلة الكاملة: التصميم المعماري، والواجهات، وتكامل واجهات البرمجة، والاختبار، والنشر.</p><p>أتقن الإنجليزية والعربية وأعمل بمرونة عبر توقيت الخليج وأوروبا والولايات المتحدة. يوظّفني عملاء في السعودية والإمارات والكويت وغيرها لأنني أجمع بين مهارات React و Next.js المتقدمة والتواصل الواضح والالتزام الحقيقي بتسليم عمل أفخر به.</p>',
                'tech' => ['React 19', 'Next.js 15', 'TypeScript', 'Tailwind CSS', 'Redux Toolkit', 'React Query', 'Vite', 'Framer Motion'],
                'faq' => [
                    ['q' => 'Why should I hire you as a React developer?', 'a' => 'I bring 5+ years of hands-on React experience and 25+ shipped projects across 8 countries. When you hire me as a React developer, you get clean, tested code, honest timelines, and direct communication with the person actually writing it. I specialize in React and Next.js, so I cover both dynamic interfaces and SEO-friendly server-rendered pages. I care about performance, accessibility, and maintainability, not just a quick demo.'],
                    ['q' => 'How much does it cost to hire a React developer?', 'a' => 'React development rates vary by scope, timeline, and complexity. I offer flexible engagement models: fixed-price for well-defined projects, and monthly retainers for ongoing work. I always give a written estimate before any work begins, so there are no surprises. Book a free 30-minute call and I will send a clear proposal within 48 hours.'],
                    ['q' => 'Do you work with Gulf and international clients across time zones?', 'a' => 'Yes. I am based in Cairo (GMT+2), which overlaps comfortably with Gulf business hours and gives solid working overlap with Europe and part of the US day. I have delivered React projects for clients in Saudi Arabia, the UAE, Kuwait, the US, and the UK, with daily updates, shared boards, and quick video calls when needed.'],
                    ['q' => 'Can you build with Next.js as well as React?', 'a' => 'Absolutely. Next.js is my primary framework for production apps that need SEO, fast load times, and server-side rendering. I build with the latest Next.js App Router, React Server Components, and TypeScript. Whether you need a marketing site that ranks on Google, a SaaS dashboard, or an e-commerce storefront, I choose between plain React and Next.js based on your goals.'],
                    ['q' => 'How long does a typical React project take?', 'a' => 'It depends on scope. A polished landing page takes about 1-2 weeks. A mid-size web app with authentication, a dashboard, and an API integration usually runs 4-8 weeks. Larger platforms are delivered in phased milestones so you see working features early and often. After our first call, I break the work into clear stages with dates.'],
                    ['q' => 'Do you provide support after launch?', 'a' => 'Yes. Launch is the start, not the end. I offer post-launch support packages that cover bug fixes, performance tuning, dependency updates, and new features. I also hand over clean documentation and a walkthrough so your team can maintain the code confidently. Many clients keep me on a monthly retainer for ongoing React development.'],
                ],
                'faq_ar' => [
                    ['q' => 'لماذا يجب أن أوظّفك كمطوّر React؟', 'a' => 'أمتلك أكثر من 5 سنوات من الخبرة العملية في React وأكثر من 25 مشروعاً منجزاً في 8 دول. عندما توظّفني كمطوّر React، تحصل على كود نظيف ومختبر، ومواعيد صادقة، وتواصل مباشر مع الشخص الذي يكتب الكود فعلاً. أتخصّص في React و Next.js، لذا أغطّي الواجهات التفاعلية والصفحات المعروضة من الخادم الصديقة لمحركات البحث معاً.'],
                    ['q' => 'كم تكلفة توظيف مطوّر React؟', 'a' => 'تتفاوت أسعار تطوير React حسب النطاق والمدة والتعقيد. أوفّر نماذج تعاقد مرنة: سعر ثابت للمشاريع المحدّدة جيداً، واشتراكات شهرية للعمل المستمر. أقدّم دائماً عرض سعر مكتوباً قبل بدء أي عمل، فلا مفاجآت. احجز مكالمة مجانية مدتها 30 دقيقة وسأرسل لك عرضاً واضحاً خلال 48 ساعة.'],
                    ['q' => 'هل تعمل مع عملاء الخليج والعالم عبر مناطق زمنية مختلفة؟', 'a' => 'نعم. أنا مقيم في القاهرة (GMT+2)، ما يتداخل بشكل مريح مع ساعات العمل في الخليج ويمنح تداخلاً جيداً مع أوروبا وجزء من يوم العمل الأمريكي. سلّمت مشاريع React لعملاء في السعودية والإمارات والكويت والولايات المتحدة وبريطانيا، عبر تحديثات يومية ولوحات مشتركة ومكالمات فيديو سريعة عند الحاجة.'],
                    ['q' => 'هل يمكنك البناء بـ Next.js إلى جانب React؟', 'a' => 'بالتأكيد. Next.js هو إطاري الأساسي لتطبيقات الإنتاج التي تحتاج إلى تحسين محركات البحث وسرعة تحميل عالية وعرض من جانب الخادم. أبني بأحدث Next.js App Router ومكوّنات React Server Components و TypeScript. سواء كنت بحاجة إلى موقع تسويقي يتصدّر نتائج Google، أو لوحة تحكم SaaS، أو متجر إلكتروني، أختار بين React العادي و Next.js حسب أهدافك.'],
                    ['q' => 'كم يستغرق مشروع React النموذجي؟', 'a' => 'يعتمد ذلك على النطاق. صفحة هبوط متقنة تستغرق نحو أسبوع إلى أسبوعين. تطبيق ويب متوسط الحجم يتضمّن تسجيل دخول ولوحة تحكم وتكامل واجهة برمجة يستغرق عادة من 4 إلى 8 أسابيع. المنصات الأكبر تُسلَّم على مراحل مجدولة لترى ميزات عاملة مبكراً وباستمرار.'],
                    ['q' => 'هل تقدّم دعماً بعد الإطلاق؟', 'a' => 'نعم. الإطلاق هو البداية وليس النهاية. أقدّم باقات دعم بعد الإطلاق تشمل إصلاح الأخطاء وضبط الأداء وتحديث الاعتماديات وإضافة ميزات جديدة. كما أسلّم توثيقاً نظيفاً وجولة تعريفية ليتمكّن فريقك من صيانة الكود بثقة. يبقى كثير من العملاء معي على اشتراك شهري لتطوير React المستمر.'],
                ],
            ],

            'saas-development' => [
                'slug' => 'saas-development',
                'nav' => 'SaaS Development',
                'nav_ar' => 'تطوير SaaS',
                'service_type' => 'SaaS Development',
                'related_category' => 'Tech / SaaS',
                'image' => 'site/saas-dashboard.png',
                'image_alt' => 'Multi-tenant SaaS admin dashboard with analytics and billing — SaaS development company',
                'keywords' => 'SaaS development company, build a SaaS MVP, SaaS development services, hire SaaS developer, MVP development, multi-tenant SaaS development, Khaled Ahmed',
                'meta_title' => 'SaaS Development Company | Build a SaaS MVP in 8-16 Weeks',
                'meta_title_ar' => 'شركة تطوير SaaS | ابنِ نسخة MVP خلال 8-16 أسبوعاً',
                'meta_description' => "I build production-ready SaaS for founders: multi-tenant apps, Stripe billing and admin dashboards. Launch your SaaS MVP in 8-16 weeks from \$8k. Let's ship.",
                'meta_description_ar' => 'أبني منتجات SaaS جاهزة للإنتاج: بنية multi-tenant واشتراكات Stripe ولوحة تحكم. أطلق نسخة MVP خلال 8-16 أسبوعاً بدءاً من 8 آلاف دولار.',
                'h1' => 'SaaS Development Company Built for Founders Who Want to Ship',
                'h1_ar' => 'شركة تطوير SaaS مصمّمة لأصحاب المشاريع الجادّين في الإطلاق',
                'hero_sub' => 'I turn your idea into a production-ready, multi-tenant SaaS MVP in 8-16 weeks — with subscription billing, secure auth, and an admin dashboard ready on day one.',
                'hero_sub_ar' => 'أحوّل فكرتك إلى منتج SaaS متعدد المستأجرين جاهز للإنتاج خلال 8-16 أسبوعاً، مع نظام اشتراكات ومصادقة آمنة ولوحة تحكم منذ اليوم الأول.',
                'intro_html' => '<p>I am Khaled Ahmed, a senior full stack developer based in Cairo with 5+ years of experience and 25+ shipped projects across 8 countries. I run a boutique SaaS development company built around one goal: turning a founder idea into a live, revenue-ready product. Whether you need to build a SaaS MVP fast or scale an existing platform, I handle architecture, code, subscription billing, and deployment end to end — so you ship without hiring and managing a whole team.</p><p>My SaaS development services cover everything a modern subscription business needs: secure multi-tenant SaaS development, Stripe billing, role-based authentication, a clean admin dashboard, and a documented API. If you are looking to hire a SaaS developer who has actually launched products — not just prototypes — you are in the right place. I have built, shipped, and maintained real platforms in production, and I will bring that same rigor to yours from the first sprint.</p>',
                'intro_html_ar' => '<p>أنا خالد أحمد، مطوّر Full Stack أعمل من القاهرة، بخبرة تزيد عن 5 سنوات وأكثر من 25 مشروعاً مُنجَزاً في 8 دول. أدير شركة تطوير SaaS متخصّصة بهدف واحد: تحويل فكرة صاحب المشروع إلى منتج حيّ وجاهز لتحقيق الإيرادات. سواء أردت بناء نسخة MVP سريعاً أو توسيع منصّة قائمة، أتولّى المعمارية والبرمجة ونظام الاشتراكات والنشر من البداية إلى النهاية، لتطلق منتجك دون الحاجة إلى تكوين فريق كامل.</p><p>تغطّي خدمات تطوير SaaS لديّ كل ما يحتاجه أي نشاط اشتراكات حديث: تطوير SaaS متعدد المستأجرين بشكل آمن، اشتراكات Stripe، مصادقة قائمة على الصلاحيات، لوحة تحكم واضحة، وواجهة API موثّقة. وإذا كنت تبحث عن توظيف مطوّر SaaS أطلق منتجات حقيقية لا مجرّد نماذج، فأنت في المكان الصحيح.</p>',
                'deliverables' => [
                    'Multi-tenant architecture with fully isolated data and billing per customer',
                    'Stripe subscription billing, plans, invoicing and trials (Laravel Cashier)',
                    'Admin dashboard with analytics, user management and role controls',
                    'Secure authentication, roles and granular permissions',
                    'RESTful, documented API ready for integrations and mobile apps',
                    'Automated CI/CD pipeline and containerized cloud deployment',
                    'Scalable database design with PostgreSQL and Redis caching',
                    'Responsive marketing site plus in-app onboarding for new users',
                ],
                'deliverables_ar' => [
                    'بنية متعددة المستأجرين مع عزل كامل للبيانات والفوترة لكل عميل',
                    'اشتراكات Stripe وخطط وفواتير وفترات تجريبية (Laravel Cashier)',
                    'لوحة تحكم إدارية مع تحليلات وإدارة مستخدمين وتحكم بالصلاحيات',
                    'مصادقة آمنة مع أدوار وصلاحيات دقيقة',
                    'واجهة API موثّقة بنمط REST جاهزة للتكاملات وتطبيقات الجوال',
                    'خط أنابيب CI/CD آلي ونشر سحابي عبر الحاويات',
                    'تصميم قاعدة بيانات قابل للتوسّع مع PostgreSQL وتخزين مؤقت عبر Redis',
                    'موقع تسويقي متجاوب مع دليل إعداد داخل التطبيق للمستخدمين الجدد',
                ],
                'why_html' => '<p>Most agencies talk about SaaS in theory. I have shipped it. I built Barmagly POS, a multi-tenant point-of-sale platform where every business gets its own isolated workspace, data, and billing — the exact multi-tenant SaaS development architecture your product needs to scale to hundreds of customers without a rewrite. I also built Barmagly Salon, a booking-and-management SaaS, so I understand the onboarding, roles, and payment flows real subscription businesses depend on.</p><p>Then there is Omnixtrack CRM, a full customer-relationship platform I designed and built with sales pipelines, automation, team roles, and reporting. These are not demos gathering dust — they are production systems handling real users and real money. When you work with my SaaS development company, you are hiring someone who has already solved the hard problems: tenant isolation, secure billing, background jobs, and zero-downtime deploys.</p><p>Because I am one senior developer accountable for the entire stack, you skip the overhead, the handoffs, and the junior guesswork. You get direct communication, weekly progress on a live staging URL, and code you fully own. That is how I help founders build a SaaS MVP that is ready for paying customers — not just a slide deck.</p>',
                'why_html_ar' => '<p>معظم الشركات تتحدّث عن SaaS نظرياً، أما أنا فقد أطلقته فعلاً. بنيت Barmagly POS، وهي منصّة نقاط بيع متعددة المستأجرين يحصل فيها كل نشاط تجاري على مساحة عمل وبيانات وفوترة معزولة تماماً — وهي بالضبط بنية تطوير SaaS متعددة المستأجرين التي يحتاجها منتجك للتوسّع إلى مئات العملاء دون إعادة بناء. كما بنيت Barmagly Salon لإدارة الحجوزات، لذا أفهم تدفّقات الإعداد والصلاحيات والمدفوعات التي تعتمد عليها أنشطة الاشتراكات الحقيقية.</p><p>ثم هناك Omnixtrack CRM، وهي منصّة كاملة لإدارة علاقات العملاء صمّمتها وبنيتها بمسارات مبيعات وأتمتة وأدوار للفرق وتقارير. هذه ليست نماذج تجريبية مهملة، بل أنظمة إنتاج تخدم مستخدمين حقيقيين وأموالاً حقيقية. حين تتعامل مع شركة تطوير SaaS لديّ فأنت توظّف من حلّ بالفعل المشكلات الصعبة: عزل المستأجرين، والفوترة الآمنة، والمهام الخلفية، والنشر دون توقّف.</p><p>ولأنني مطوّر واحد كبير مسؤول عن المنظومة بأكملها، فأنت تتجنّب الأعباء الإدارية وتعدّد التسليمات. تحصل على تواصل مباشر، وتقدّم أسبوعي على رابط تجريبي حيّ، وشيفرة تملكها بالكامل. بهذه الطريقة أساعد أصحاب المشاريع على بناء نسخة MVP جاهزة لعملاء يدفعون فعلاً.</p>',
                'tech' => ['Laravel', 'Next.js', 'Stripe', 'PostgreSQL', 'Redis', 'Docker', 'AWS', 'Laravel Cashier'],
                'faq' => [
                    ['q' => 'What does a SaaS development company actually do?', 'a' => 'As a SaaS development company, I take your idea from a whiteboard to a live product. That means product architecture, UI, backend, multi-tenancy, Stripe billing, authentication, an admin dashboard, and cloud deployment. I also handle security, backups, and CI/CD, so you can focus on customers. Most founders come to me to build a SaaS MVP in 8-16 weeks, then I stay on to add features as you grow.'],
                    ['q' => 'How much does it cost to build a SaaS MVP?', 'a' => 'A focused SaaS MVP typically runs $8k-$35k depending on scope. A lean MVP with authentication, one core workflow, Stripe billing, and an admin panel sits near the $8k-$15k range and ships in 8-12 weeks. A more complex, multi-tenant platform with integrations lands closer to $20k-$35k over 12-16 weeks. I give you a fixed, milestone-based quote before we start, and you own 100% of the code.'],
                    ['q' => 'How long does it take to launch a SaaS MVP?', 'a' => 'Most MVPs take 8-16 weeks. A lean build — core workflow, authentication, Stripe billing, and a basic admin dashboard — is usually ready in 8-12 weeks. Multi-tenant SaaS development with several roles, integrations, and analytics runs 12-16 weeks. I work in weekly sprints with a live staging URL, so you see progress every week and can test with real users early.'],
                    ['q' => 'What is multi-tenant SaaS development and do I need it?', 'a' => 'Multi-tenant SaaS development means one codebase serves many customers, with each customer data fully isolated. It is how almost every subscription product scales affordably. I built exactly this for Barmagly POS. If you plan to sell to more than a handful of companies, you need it from the start; retrofitting it later is expensive and risky. I design your database and auth for multi-tenancy on day one.'],
                    ['q' => 'Can I hire you as a dedicated SaaS developer?', 'a' => 'Yes. You can hire me as your dedicated SaaS developer on a project or monthly basis. As a senior full stack developer with 5+ years and 25+ shipped projects across 8 countries, I act as your technical co-founder without taking equity. Many founders start with a fixed-scope MVP ($8k-$35k, 8-16 weeks), then move to a monthly retainer as they grow.'],
                    ['q' => 'What tech stack do you use for SaaS development?', 'a' => 'I use a battle-tested stack: Laravel and Next.js for backend and frontend, Laravel Cashier and Stripe for subscription billing, PostgreSQL for reliable multi-tenant data, and Redis for caching and queues. I deploy with Docker and CI/CD to AWS or your cloud of choice. This same stack powers real products I have shipped, like Omnixtrack CRM. It scales from your first user to thousands without a rewrite.'],
                ],
                'faq_ar' => [
                    ['q' => 'ماذا تفعل شركة تطوير SaaS فعلياً؟', 'a' => 'بصفتي شركة تطوير SaaS، آخذ فكرتك من مجرّد تصوّر إلى منتج حيّ. يشمل ذلك معمارية المنتج والواجهة والخادم والبنية متعددة المستأجرين واشتراكات Stripe والمصادقة ولوحة التحكم والنشر السحابي. كما أتولّى الأمان والنسخ الاحتياطي وخطوط CI/CD. يأتيني معظم أصحاب المشاريع لبناء نسخة MVP خلال 8-16 أسبوعاً، ثم أستمرّ معهم لإضافة الميزات.'],
                    ['q' => 'كم تكلفة بناء نسخة SaaS MVP؟', 'a' => 'تتراوح تكلفة نسخة MVP المركّزة عادةً بين 8 آلاف و35 ألف دولار حسب النطاق. النسخة الخفيفة التي تضم مصادقة ومساراً أساسياً واشتراكات Stripe ولوحة تحكم تكون قرب 8-15 ألف دولار وتُطلق خلال 8-12 أسبوعاً. أما المنصّة الأكثر تعقيداً ومتعددة المستأجرين فتقترب من 20-35 ألف دولار خلال 12-16 أسبوعاً. أقدّم عرضاً ثابتاً قبل البدء، وتملك 100% من الشيفرة.'],
                    ['q' => 'كم يستغرق إطلاق نسخة SaaS MVP؟', 'a' => 'تستغرق معظم نسخ MVP بين 8 و16 أسبوعاً. النسخة الخفيفة تكون جاهزة عادةً خلال 8-12 أسبوعاً. أما تطوير SaaS متعدد المستأجرين بعدّة أدوار وتكاملات وتحليلات فيستغرق 12-16 أسبوعاً. أعمل بدورات أسبوعية مع رابط تجريبي حيّ، فترى التقدّم كل أسبوع وتختبر مع مستخدمين حقيقيين مبكراً.'],
                    ['q' => 'ما هو تطوير SaaS متعدد المستأجرين وهل أحتاجه؟', 'a' => 'تطوير SaaS متعدد المستأجرين يعني أن شيفرة واحدة تخدم عملاء كثيرين مع عزل كامل لبيانات كل عميل. هكذا تتوسّع معظم منتجات الاشتراك باقتصادية. بنيت هذا بالضبط في Barmagly POS. إذا كنت تنوي البيع لأكثر من حفنة شركات فأنت تحتاجه من البداية؛ إضافته لاحقاً مكلفة ومحفوفة بالمخاطر. أصمّم قاعدة بياناتك ومصادقتك لدعم تعدّد المستأجرين منذ اليوم الأول.'],
                    ['q' => 'هل يمكنني توظيفك كمطوّر SaaS مخصّص؟', 'a' => 'نعم. يمكنك توظيفي كمطوّر SaaS مخصّص على أساس المشروع أو شهرياً. بصفتي مطوّر Full Stack بخبرة تزيد عن 5 سنوات وأكثر من 25 مشروعاً في 8 دول، أعمل كشريك تقني مؤسّس دون أخذ حصص. يبدأ كثير من أصحاب المشاريع بنسخة MVP ذات نطاق ثابت ثم ينتقلون إلى عقد شهري مع نموّهم.'],
                    ['q' => 'ما حزمة التقنيات التي تستخدمها؟', 'a' => 'أستخدم حزمة مجرّبة: Laravel وNext.js للخادم والواجهة، وLaravel Cashier وStripe لاشتراكات الفوترة، وPostgreSQL لبيانات متعددة المستأجرين، وRedis للتخزين المؤقت والطوابير. أنشر عبر Docker وخطوط CI/CD إلى AWS. تشغّل هذه الحزمة منتجات حقيقية أطلقتها مثل Omnixtrack CRM، وتتوسّع من مستخدمك الأول إلى الآلاف دون إعادة بناء.'],
                ],
            ],

            'ecommerce-development' => [
                'slug' => 'ecommerce-development',
                'nav' => 'E-commerce Development',
                'nav_ar' => 'تطوير المتاجر',
                'service_type' => 'E-commerce Development',
                'related_category' => 'E-commerce',
                'image' => 'site/ecommerce-store.png',
                'image_alt' => 'Custom online store with cart and checkout — ecommerce development company',
                'keywords' => 'ecommerce development company, hire ecommerce developer, Shopify developer for hire, WooCommerce development, custom ecommerce development, online store development, Khaled Ahmed',
                'meta_title' => 'Ecommerce Development Company | Online Stores That Sell',
                'meta_title_ar' => 'شركة تطوير متاجر إلكترونية | متاجر مخصصة تبيع فعلاً',
                'meta_description' => "I'm Khaled Ahmed, a senior ecommerce developer building custom online stores that convert. Hire me for Shopify, WooCommerce and Laravel builds across the Gulf.",
                'meta_description_ar' => 'أنا خالد أحمد، مطوّر متاجر إلكترونية محترف أبني متاجر مخصصة تحقّق مبيعات. وظّفني لتطوير متجرك على Shopify وWooCommerce وLaravel في الخليج والعالم.',
                'h1' => 'Ecommerce Development Company Built for Stores That Convert',
                'h1_ar' => 'شركة تطوير متاجر إلكترونية مبنية لمتاجر تحقّق مبيعات حقيقية',
                'hero_sub' => 'I design and build fast, secure online stores that turn visitors into paying customers across the Gulf, Europe and the US.',
                'hero_sub_ar' => 'أصمّم وأبني متاجر إلكترونية سريعة وآمنة تحوّل الزوّار إلى عملاء يدفعون، في الخليج وأوروبا والولايات المتحدة.',
                'intro_html' => '<p>Looking for an ecommerce development company that actually understands sales, not just code? I am Khaled Ahmed, a senior full stack developer based in Cairo with 5+ years of experience and 25+ shipped projects across 8 countries. From Shopify and WooCommerce to fully custom ecommerce development on Laravel and Next.js, I build online stores engineered to load fast, rank on Google and convert traffic into revenue.</p><p>When you hire an ecommerce developer, you want more than a pretty theme. You want secure payment gateways, reliable inventory, multi-currency checkout and a store that scales as you grow. Whether you need a Shopify developer for hire, WooCommerce development for an existing catalog, or custom ecommerce development from scratch, I handle the full build end to end so you can focus on selling.</p>',
                'intro_html_ar' => '<p>تبحث عن شركة تطوير متاجر إلكترونية تفهم البيع فعلاً وليس البرمجة فقط؟ أنا خالد أحمد، مطوّر full stack محترف مقيم في القاهرة، بخبرة أكثر من 5 سنوات وأكثر من 25 مشروعاً منفّذاً في 8 دول. من Shopify وWooCommerce إلى تطوير متاجر إلكترونية مخصصة بالكامل عبر Laravel وNext.js، أبني متاجر تعمل بسرعة، وتتصدّر نتائج جوجل، وتحوّل الزيارات إلى أرباح.</p><p>عندما توظّف مطوّر متاجر إلكترونية، فأنت تريد أكثر من قالب جميل. تريد بوابات دفع آمنة، ومخزوناً موثوقاً، ودفعاً متعدد العملات، ومتجراً ينمو معك. سواء احتجت مطوّر Shopify، أو تطوير WooCommerce لكتالوج قائم، أو تطوير متجر إلكتروني مخصص من الصفر، أتولّى المشروع كاملاً من البداية للنهاية لتتفرّغ أنت للبيع.</p>',
                'deliverables' => [
                    'Secure payment gateways: Stripe, Paymob, PayPal, Apple Pay, Mada and cash on delivery',
                    'Real-time inventory and stock management with low-stock alerts',
                    'Smart cart, wishlist and a fast one-page checkout to cut cart abandonment',
                    'Shipping and tax automation with Aramex, DHL and local courier integrations',
                    'Multi-currency and bilingual storefronts (Arabic RTL + English) for Gulf and global buyers',
                    'Product catalog with advanced filters, search and category management',
                    'Admin dashboard with sales analytics, orders and customer insights',
                    'SEO, Core Web Vitals speed tuning and mobile-first performance',
                ],
                'deliverables_ar' => [
                    'بوابات دفع آمنة: Stripe وPaymob وPayPal وApple Pay ومدى والدفع عند الاستلام',
                    'إدارة مخزون فورية مع تنبيهات نفاد الكمية',
                    'سلة ذكية وقائمة رغبات ودفع سريع بخطوة واحدة لتقليل هجر السلة',
                    'أتمتة الشحن والضرائب مع تكامل Aramex وDHL وشركات الشحن المحلية',
                    'متاجر متعددة العملات وثنائية اللغة (عربي RTL + إنجليزي) للخليج والعالم',
                    'كتالوج منتجات بفلاتر متقدمة وبحث وإدارة أقسام',
                    'لوحة تحكم بتحليلات المبيعات والطلبات وبيانات العملاء',
                    'تحسين محركات البحث وسرعة Core Web Vitals وأداء يركّز على الجوال أولاً',
                ],
                'why_html' => '<p>Experience is the difference between a store that launches and a store that sells. I have shipped real, revenue-generating ecommerce stores in multiple markets: EgySims for global connectivity, Mossodor, a UK lighting store built for European buyers, Infinity Wear, a fashion brand serving Saudi Arabia, and Game Street in Kuwait for gaming products. Each one taught me what Gulf and global shoppers expect at checkout.</p><p>As a hands-on ecommerce development company of one, you work directly with the developer who writes your code, no account managers, no outsourcing, no lost details. I have delivered 25+ projects across 8 countries, so I know how to handle Arabic RTL layouts, Mada and Paymob for the Gulf, Stripe for the US and UK, and the shipping quirks of Aramex and local couriers. That local knowledge is exactly why custom ecommerce development succeeds instead of stalling.</p><p>Whether you want to hire an ecommerce developer for a quick Shopify launch, need WooCommerce development to scale an existing shop, or a custom Laravel and Next.js platform, I build for speed, security and search rankings from day one. The result is online store development that pays for itself in conversions.</p>',
                'why_html_ar' => '<p>الخبرة هي الفرق بين متجر يُطلَق ومتجر يبيع. لقد أطلقت متاجر إلكترونية حقيقية تحقّق أرباحاً في أسواق متعددة: EgySims للاتصال أثناء السفر عالمياً، وMossodor وهو متجر إضاءة بريطاني موجّه للسوق الأوروبي، وInfinity Wear وهي علامة أزياء تخدم السعودية، وGame Street في الكويت لمنتجات الألعاب. كل مشروع علّمني ما يتوقّعه المتسوّق الخليجي والعالمي عند الدفع.</p><p>بصفتي شركة تطوير متاجر إلكترونية بشخص واحد يعمل بيده، تتعامل مباشرة مع المطوّر الذي يكتب الكود، بلا مديري حسابات، ولا إسناد خارجي، ولا تفاصيل ضائعة. نفّذت أكثر من 25 مشروعاً في 8 دول، لذا أعرف كيف أتعامل مع تخطيطات RTL العربية، ومدى وPaymob للخليج، وStripe لأمريكا وبريطانيا، وتفاصيل الشحن مع Aramex وشركات الشحن المحلية.</p><p>سواء أردت توظيف مطوّر متاجر إلكترونية لإطلاق سريع على Shopify، أو احتجت تطوير WooCommerce لتوسيع متجر قائم، أو منصة مخصصة على Laravel وNext.js، أبني منذ اليوم الأول من أجل السرعة والأمان وترتيب البحث. والنتيجة تطوير متجر إلكتروني يعوّض تكلفته بالمبيعات.</p>',
                'tech' => ['Shopify', 'WooCommerce', 'Laravel', 'Next.js', 'Stripe', 'Paymob', 'MySQL'],
                'faq' => [
                    ['q' => 'How much does ecommerce development cost?', 'a' => 'It depends on scope and platform. A focused Shopify or WooCommerce development project typically runs $3,000 to $8,000, covering theme setup, payment gateways and product configuration. A mid-size custom store lands around $8,000 to $15,000. Full custom ecommerce development on Laravel or Next.js with complex inventory, multi-currency and integrations ranges from $15,000 to $25,000. I send a fixed quote after we scope your features.'],
                    ['q' => 'Which ecommerce platform should I choose?', 'a' => 'It comes down to your goals. Shopify is fastest to launch and great for lean teams. WooCommerce development fits WordPress sites that need flexibility on a budget. For unique workflows, marketplaces or heavy integrations, custom ecommerce development on Laravel and Next.js gives full control. In our first call I recommend the platform that matches your catalog, budget and growth plan, not the one that is easiest for me.'],
                    ['q' => 'Can you handle payments for the Gulf and global markets?', 'a' => 'Yes. I integrate the right payment gateways for each market: Paymob and Mada for Saudi Arabia and the Gulf, Stripe and PayPal for the US, UK and EU, plus Apple Pay and cash on delivery where shoppers expect it. As an ecommerce development company serving 8 countries, I have configured secure, PCI-compliant checkout flows that reduce failed payments and cart abandonment.'],
                    ['q' => 'How long does it take to build an online store?', 'a' => 'A Shopify or WooCommerce store is usually ready in 2 to 4 weeks. A mid-size store with custom features takes about 4 to 8 weeks. Full custom ecommerce development on Laravel or Next.js with multi-currency, complex inventory and third-party integrations typically runs 8 to 12 weeks. I work in weekly milestones so you see progress early and can start loading products before launch day.'],
                    ['q' => 'Do you offer support after launch?', 'a' => 'Absolutely. Online store development does not end at launch. I offer monthly maintenance covering security updates, backups, speed monitoring, bug fixes and small feature additions. If you would rather manage the store yourself, I hand over clean documentation and train your team. Many clients keep me on retainer to add features and improve conversion rates as sales grow.'],
                    ['q' => 'Why hire you instead of a big agency?', 'a' => 'When you hire an ecommerce developer directly, you skip agency overhead and talk to the person building your store. I have shipped 25+ projects across 8 countries, including EgySims, Mossodor UK, Infinity Wear Saudi and Game Street Kuwait, so you get senior full stack work at a fair price. You get faster decisions, honest timelines and code you fully own.'],
                ],
                'faq_ar' => [
                    ['q' => 'كم تكلفة تطوير متجر إلكتروني؟', 'a' => 'تعتمد التكلفة على نطاق العمل والمنصة. مشروع تطوير Shopify أو WooCommerce محدّد الأهداف يتراوح عادة بين 3,000 و8,000 دولار، ويشمل إعداد القالب وبوابات الدفع وضبط المنتجات. المتجر المخصص متوسط الحجم يكون بين 8,000 و15,000 دولار. أما تطوير المتاجر المخصصة بالكامل على Laravel أو Next.js فيتراوح بين 15,000 و25,000 دولار. أرسل عرضاً ثابتاً بعد تحديد المزايا.'],
                    ['q' => 'أي منصة متاجر إلكترونية أختار؟', 'a' => 'يعتمد ذلك على أهدافك. Shopify هو الأسرع للإطلاق ومناسب للفرق الصغيرة. تطوير WooCommerce يناسب مواقع WordPress التي تحتاج مرونة بميزانية محدودة. وللمهام الفريدة أو الأسواق المتعددة أو التكاملات الثقيلة، يمنحك تطوير المتجر المخصص على Laravel وNext.js تحكماً كاملاً. في مكالمتنا الأولى أرشّح المنصة التي تناسب كتالوجك وميزانيتك وخطة نموّك.'],
                    ['q' => 'هل تتعامل مع المدفوعات للخليج والأسواق العالمية؟', 'a' => 'نعم. أدمج بوابات الدفع المناسبة لكل سوق: Paymob ومدى للسعودية والخليج، وStripe وPayPal لأمريكا وبريطانيا وأوروبا، إضافة إلى Apple Pay والدفع عند الاستلام. بصفتي شركة تطوير متاجر إلكترونية تخدم 8 دول، أعددت مسارات دفع آمنة ومتوافقة مع معايير PCI تقلّل المدفوعات الفاشلة وهجر السلة.'],
                    ['q' => 'كم يستغرق بناء متجر إلكتروني؟', 'a' => 'متجر Shopify أو WooCommerce يكون جاهزاً عادة خلال 2 إلى 4 أسابيع. المتجر متوسط الحجم بمزايا مخصصة يستغرق نحو 4 إلى 8 أسابيع. أما تطوير المتجر المخصص بالكامل على Laravel أو Next.js مع تعدد العملات ومخزون معقّد فيستغرق عادة من 8 إلى 12 أسبوعاً. أعمل بمراحل أسبوعية لترى التقدّم مبكراً.'],
                    ['q' => 'هل تقدّم دعماً بعد الإطلاق؟', 'a' => 'بالتأكيد. تطوير المتجر الإلكتروني لا ينتهي عند الإطلاق. أقدّم صيانة شهرية تشمل تحديثات الأمان والنسخ الاحتياطي ومراقبة السرعة وإصلاح الأعطال وإضافة مزايا صغيرة. وإن فضّلت إدارة المتجر بنفسك، أسلّمك توثيقاً واضحاً وأدرّب فريقك. يبقى كثير من العملاء معي بعقد شهري لرفع معدلات التحويل مع نمو المبيعات.'],
                    ['q' => 'لماذا أوظّفك بدل وكالة كبيرة؟', 'a' => 'عند توظيف مطوّر متاجر إلكترونية مباشرة، تتجنّب تكاليف الوكالة وتتحدّث مع من يبني متجرك فعلاً. نفّذت أكثر من 25 مشروعاً في 8 دول، منها EgySims وMossodor في بريطانيا وInfinity Wear في السعودية وGame Street في الكويت، فتحصل على عمل full stack محترف بسعر عادل، وقرارات أسرع، وكود تملكه بالكامل.'],
                ],
            ],

            'mobile-app-development' => [
                'slug' => 'mobile-app-development',
                'nav' => 'Mobile App Development',
                'nav_ar' => 'تطبيقات الجوال',
                'service_type' => 'Mobile App Development',
                'related_category' => 'Tech / SaaS',
                'image' => 'site/mobile-apps.png',
                'image_alt' => 'iOS and Android mobile apps built with Flutter and React Native — mobile app development company',
                'keywords' => 'mobile app development company, hire mobile app developer, Flutter developer for hire, React Native developer, iOS Android app development, build a mobile app, Khaled Ahmed',
                'meta_title' => 'Mobile App Development Company | Flutter & React Native',
                'meta_title_ar' => 'شركة تطوير تطبيقات الجوال | فلاتر و React Native',
                'meta_description' => "I'm Khaled Ahmed — 5+ years, 25+ projects, 5 apps published on Google Play. Hire a Flutter / React Native developer for iOS & Android across the Gulf & globally.",
                'meta_description_ar' => 'أنا خالد أحمد: خبرة +5 سنوات و+25 مشروعاً و5 تطبيقات منشورة على Google Play. وظّف مطوّر فلاتر و React Native لتطبيقات iOS وأندرويد في الخليج والعالم.',
                'h1' => 'Mobile App Development Company That Ships Real Apps',
                'h1_ar' => 'شركة تطوير تطبيقات جوال تُطلق تطبيقات حقيقية',
                'hero_sub' => 'I design, build, and publish iOS and Android apps that go live on the App Store and Google Play — not prototypes that sit in a drawer.',
                'hero_sub_ar' => 'أصمّم وأبرمج وأنشر تطبيقات iOS وأندرويد تعمل فعلياً على App Store وGoogle Play — لا نماذج تجريبية تبقى حبيسة الأدراج.',
                'intro_html' => '<p>Looking for a mobile app development company that actually ships? I am Khaled Ahmed, a senior full stack developer based in Cairo with 5+ years of experience and 25+ projects delivered across 8 countries. I build iOS and Android apps for businesses in the Gulf and worldwide — from a first MVP to a full production app on the App Store and Google Play.</p><p>Whether you want to hire a mobile app developer for a one-off build or a long-term product partner, I handle the whole journey: strategy, UI, cross-platform development in Flutter or React Native, a secure backend API, and app store submission. No handoffs, no juniors, no agency markup — just one experienced developer turning your idea into a real, downloadable app.</p>',
                'intro_html_ar' => '<p>هل تبحث عن شركة تطوير تطبيقات جوال تُطلق تطبيقات فعلية لا مجرد وعود؟ أنا خالد أحمد، مطوّر full stack خبير مقيم في القاهرة، بخبرة تتجاوز 5 سنوات وأكثر من 25 مشروعاً سلّمتها في 8 دول. أبني تطبيقات iOS وأندرويد للشركات في الخليج وحول العالم — من أول نسخة MVP إلى تطبيق إنتاجي كامل على App Store وGoogle Play.</p><p>سواء أردت توظيف مطوّر تطبيقات جوال لمشروع واحد أو شريك منتج طويل الأمد، أتولّى الرحلة كاملة: الاستراتيجية، وتصميم الواجهات، والتطوير متعدد المنصات باستخدام Flutter أو React Native، وواجهة برمجية خلفية آمنة، ونشر التطبيق على المتاجر. بلا تسليمات متقطعة، وبلا مبتدئين، وبلا عمولة وكالات.</p>',
                'deliverables' => [
                    'Native-feeling iOS and Android apps from a single cross-platform codebase',
                    'App Store and Google Play submission handled end to end',
                    'Push notifications powered by Firebase Cloud Messaging',
                    'Offline mode with local data sync so the app works without a connection',
                    'Secure backend REST API built in Laravel',
                    'Real-time data, authentication, and analytics with Firebase',
                    'Admin dashboard to manage users, content, and orders',
                    'Post-launch updates, monitoring, and ongoing support',
                ],
                'deliverables_ar' => [
                    'تطبيقات iOS وأندرويد بإحساس أصلي من قاعدة كود واحدة متعددة المنصات',
                    'نشر كامل على App Store وGoogle Play من البداية إلى النهاية',
                    'إشعارات فورية (Push) عبر Firebase Cloud Messaging',
                    'وضع عدم الاتصال مع مزامنة محلية للبيانات ليعمل التطبيق دون إنترنت',
                    'واجهة برمجية خلفية آمنة (REST API) مبنية بـ Laravel',
                    'بيانات لحظية وتسجيل دخول وتحليلات عبر Firebase',
                    'لوحة تحكم إدارية لإدارة المستخدمين والمحتوى والطلبات',
                    'تحديثات ما بعد الإطلاق والمراقبة والدعم المستمر',
                ],
                'why_html' => '<p>As a one-person mobile app development company, I do not just talk about apps — I ship and maintain them in production. I have five apps live on Google Play right now: Omnixtrack CRM for field sales teams, POS Barmagly for retail point of sale, Barmagly Order Food for restaurant ordering, Klipp Salon Booking for appointment scheduling, and Holy Quran for daily readers. Every one is a real product with real users, built and published by me end to end.</p><p>That track record matters when you hire a mobile app developer. Over 5+ years I have delivered 25+ projects for clients across 8 countries — from the Gulf (Saudi Arabia, the UAE, and Kuwait) to the US, UK, and Europe. I work as your Flutter developer, React Native developer, backend engineer, and app store manager in one, so nothing falls through the cracks between separate teams.</p><p>When you build a mobile app with me, you deal directly with the person writing the code. I own the whole stack: Flutter or React Native on the front end, a Laravel API and Firebase on the back end, push notifications, and offline mode. That is why my apps ship on time, pass store review, and keep running long after launch.</p>',
                'why_html_ar' => '<p>بصفتي شركة تطوير تطبيقات جوال بشخص واحد، أنا لا أتحدث عن التطبيقات فحسب — بل أطلقها وأصونها في بيئة الإنتاج. لديّ خمسة تطبيقات منشورة الآن على Google Play: Omnixtrack CRM لفرق المبيعات الميدانية، وPOS Barmagly لنقاط البيع، وBarmagly Order Food لطلب الطعام، وKlipp Salon Booking لحجز مواعيد الصالونات، وHoly Quran للقرّاء اليوميين. كل تطبيق منها منتج حقيقي بمستخدمين حقيقيين، بنيته ونشرته بنفسي من الألف إلى الياء.</p><p>هذا السجل الحافل يُحدث فرقاً عند توظيف مطوّر تطبيقات جوال. على مدى أكثر من 5 سنوات سلّمت ما يزيد على 25 مشروعاً لعملاء في 8 دول — من الخليج (السعودية والإمارات والكويت) إلى الولايات المتحدة وبريطانيا وأوروبا. أعمل مطوّر فلاتر ومطوّر React Native ومهندس backend ومدير نشر على المتاجر في آنٍ واحد.</p><p>عندما تبني تطبيق جوال معي، تتعامل مباشرةً مع من يكتب الكود. أمتلك المنظومة بالكامل: Flutter أو React Native في الواجهة، وواجهة Laravel مع Firebase في الخلفية، والإشعارات الفورية، ووضع عدم الاتصال. لهذا تُطلق تطبيقاتي في موعدها، وتجتاز مراجعة المتاجر، وتستمر في العمل طويلاً بعد الإطلاق.</p>',
                'tech' => ['Flutter', 'React Native', 'Laravel API', 'Firebase', 'Google Play', 'App Store', 'Push Notifications'],
                'faq' => [
                    ['q' => 'How much does it cost to build a mobile app?', 'a' => 'Most mobile apps I build land between $6,000 and $25,000, depending on features, backend complexity, and whether you need iOS, Android, or both. A simple MVP with authentication, a few screens, and a REST API sits at the lower end; a full product with payments and real-time data reaches the top. Choosing Flutter or React Native for cross-platform keeps one codebase serving both stores, which typically cuts cost by 30-40% versus two native apps.'],
                    ['q' => 'How long does mobile app development take?', 'a' => 'A cross-platform app usually takes 6 to 12 weeks from kickoff to store submission. A lean MVP can go live in 4 to 6 weeks; a feature-rich product with custom backend, push notifications, and offline mode runs 3 to 4 months. Native iOS and Android built separately roughly doubles the timeline. I ship in weekly builds so you test on a real device throughout.'],
                    ['q' => 'Should I choose cross-platform or native app development?', 'a' => 'For most businesses, cross-platform wins. With Flutter or React Native I maintain one codebase that runs on both iOS and Android, ship faster, and spend less — often 30-40% below the cost of two native apps. Native (Swift or Kotlin) only pays off when you need heavy device-specific features. All five of my published Google Play apps are cross-platform and run smoothly, so I usually recommend it and advise honestly per project.'],
                    ['q' => 'Can you publish my app to the App Store and Google Play?', 'a' => 'Yes — app store submission is included. I handle the full process: developer account setup, app icons and screenshots, store listings, privacy policy, content ratings, and the review back-and-forth with Apple and Google. Having published five apps on Google Play myself, I know the rejection triggers and how to avoid them. I also set up over-the-air updates so you can push fixes fast.'],
                    ['q' => 'Why hire you instead of a big app development agency?', 'a' => 'When you hire me you get a senior full stack developer who writes the code, not a sales team that hands your project to juniors. I have shipped 25+ projects across 8 countries and published five apps on Google Play, including Omnixtrack CRM and the Barmagly POS and food-ordering apps. You get direct communication, faster decisions, and no agency overhead inflating the bill.'],
                    ['q' => 'What do I need to provide to start building a mobile app?', 'a' => 'Not much to begin. Ideally a short description of what the app should do, who it is for, and any designs or references you like — even rough sketches work. If you have branding or an existing backend, share those; if not, I build from scratch, including the Laravel API and Firebase setup. We start with a scoping call to lock features, timeline, and a fixed price, then I deliver a clear plan before writing code.'],
                ],
                'faq_ar' => [
                    ['q' => 'كم تبلغ تكلفة بناء تطبيق جوال؟', 'a' => 'معظم التطبيقات التي أبنيها تتراوح تكلفتها بين 6,000 و25,000 دولار، تبعاً للمزايا وتعقيد الواجهة الخلفية وما إذا كنت تحتاج iOS أو أندرويد أو كليهما. نسخة MVP بسيطة تقع في الحد الأدنى، أما منتج كامل بمدفوعات وبيانات لحظية فيبلغ الحد الأعلى. اختيار Flutter أو React Native متعدد المنصات يبقي قاعدة كود واحدة تخدم المتجرين، ما يخفض التكلفة عادةً بنسبة 30-40%.'],
                    ['q' => 'كم يستغرق تطوير تطبيق الجوال؟', 'a' => 'عادةً ما يستغرق التطبيق متعدد المنصات من 6 إلى 12 أسبوعاً من الانطلاق حتى النشر على المتجر. نسخة MVP مبسّطة قد تُطلق خلال 4 إلى 6 أسابيع، أما منتج غني بالمزايا مع backend مخصص فيستغرق من 3 إلى 4 أشهر. بناء iOS وأندرويد أصليين بشكل منفصل يضاعف المدة تقريباً. أسلّم نسخاً أسبوعية لتختبر على جهاز حقيقي طوال الوقت.'],
                    ['q' => 'هل أختار التطوير متعدد المنصات أم الأصلي؟', 'a' => 'بالنسبة لمعظم الشركات، يتفوّق التطوير متعدد المنصات. باستخدام Flutter أو React Native أحافظ على قاعدة كود واحدة تعمل على iOS وأندرويد، وأُطلق أسرع وأنفق أقل — غالباً بنسبة 30-40% دون تكلفة تطبيقين أصليين. لا يستحق الأصلي العناء إلا عند الحاجة إلى مزايا ثقيلة خاصة بالجهاز. تطبيقاتي الخمسة المنشورة جميعها متعددة المنصات وتعمل بسلاسة.'],
                    ['q' => 'هل تنشر تطبيقي على App Store وGoogle Play؟', 'a' => 'نعم — نشر التطبيق على المتاجر مشمول. أتولّى العملية كاملة: إعداد حساب المطوّر، وأيقونات التطبيق ولقطات الشاشة، وقوائم المتجر، وسياسة الخصوصية، وتصنيف المحتوى، وجولات المراجعة مع Apple وGoogle. وبما أنني نشرت خمسة تطبيقات على Google Play بنفسي، أعرف أسباب الرفض وكيفية تجنّبها. كما أُعدّ التحديثات عبر الهواء لتدفع الإصلاحات بسرعة.'],
                    ['q' => 'لماذا أوظّفك بدلاً من وكالة كبيرة؟', 'a' => 'عند توظيفي تحصل على مطوّر full stack خبير يكتب الكود بنفسه، لا فريق مبيعات يسلّم مشروعك لمبتدئين. سلّمت أكثر من 25 مشروعاً في 8 دول، ونشرت خمسة تطبيقات على Google Play من بينها Omnixtrack CRM وتطبيقا Barmagly لنقاط البيع وطلب الطعام. تحصل على تواصل مباشر وقرارات أسرع وبلا نفقات وكالة تضخّم الفاتورة.'],
                    ['q' => 'ماذا أحتاج لأبدأ بناء تطبيق جوال؟', 'a' => 'لا تحتاج الكثير للبدء. يكفي وصف موجز لما يجب أن يفعله التطبيق ولمن هو موجّه، وأي تصميمات أو مراجع تعجبك. إن كان لديك هوية بصرية أو backend قائم فشاركها، وإن لم يوجد فأنا أبني من الصفر بما في ذلك واجهة Laravel وإعداد Firebase. نبدأ بمكالمة تحديد نطاق لتثبيت المزايا والمدة وسعر ثابت، ثم أسلّم خطة واضحة قبل كتابة أي كود.'],
                ],
            ],
        ];
    }
}
