@extends('layouts.app')

@php $isAr = app()->getLocale() === 'ar'; @endphp

@section('title', app()->getLocale() === 'ar' ? 'باقات الصيانه والدعم — ما الذي تشمله فعليا' : 'Maintenance & Support Plans — What\'s Actually Included')
@section('description', app()->getLocale() === 'ar' ? 'اشتراكات شهريه للتحديثات وترقيعات الأمان والنسخ الاحتياطي والإصلاحات. ساعات واضحه، بلا ارتباط طويل، ويمكن الإلغاء أي شهر.' : 'Monthly retainers for updates, security patches, backups and fixes. Transparent hours, no lock-in, cancel any month.')
@section('keywords', 'website maintenance plans monthly, what is included in website maintenance, website support retainer, web development pricing, باقات صيانة المواقع, أسعار تصميم المواقع')

@push('styles')
<style>
    .pl-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .pl-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events: none; }
    .pl-hero > .container { position: relative; z-index: 1; }
    .pl-hero .lead { color: var(--text-2); font-size: 17.5px; max-width: 720px; margin: 0 auto; }
    .pl-hero { text-align: center; }
    .pl-hero h1 { margin-bottom: var(--sp-4); }

    .pl-card { position: relative; display: flex; flex-direction: column; height: 100%; padding: 36px 30px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-xl); transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; }
    .pl-card:hover { transform: translateY(-6px); border-color: var(--border-3); box-shadow: var(--shadow-md); }
    .pl-card--featured { border-color: var(--brand); box-shadow: 0 0 0 1px var(--brand), 0 20px 50px -15px rgba(96,165,250,0.40); transform: translateY(-4px); }
    .pl-card--featured:hover { transform: translateY(-10px); }
    .pl-card__badge { position: absolute; top: -14px; left: 50%; transform: translateX(-50%); padding: 6px 14px; background: var(--gradient-2); color: #fff; font-size: 11.5px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; border-radius: var(--r-full); box-shadow: 0 8px 20px -6px rgba(96,165,250,0.55); }
    .pl-card__ico { width: 50px; height: 50px; border-radius: var(--r-md); display: grid; place-items: center; background: rgba(96,165,250,0.10); color: var(--brand); font-size: 22px; margin-bottom: 18px; border: 1px solid rgba(96,165,250,0.20); }
    .pl-card h3 { font-size: 22px; margin: 0 0 6px; }
    .pl-card__desc { color: var(--text-3); font-size: 14px; line-height: 1.6; margin: 0 0 22px; }
    .pl-card__price { margin-bottom: 22px; padding-bottom: 22px; border-bottom: 1px solid var(--border-1); }
    .pl-card__price .num { font-size: 40px; font-weight: 800; color: var(--text-1); line-height: 1; }
    .pl-card__price .num span { background: var(--gradient-1); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .pl-card__price .per { display: block; font-size: 13px; color: var(--text-3); margin-top: 8px; }
    .pl-card__features { padding: 0; margin: 0 0 28px; list-style: none; flex: 1; }
    .pl-card__features li { display: flex; align-items: flex-start; gap: 10px; padding: 8px 0; color: var(--text-2); font-size: 14.5px; line-height: 1.55; }
    .pl-card__features li i { flex-shrink: 0; color: var(--success); font-size: 14px; margin-top: 3px; }
    .pl-card__features li.is-off { color: var(--text-4); }
    .pl-card__features li.is-off i { color: var(--text-4); }
    .pl-card .ks-btn { width: 100%; justify-content: center; padding: 13px; }

    .pl-faq { margin-top: var(--sp-7); padding: 28px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-lg); }
    .pl-faq h3 { font-size: 16px; margin: 0 0 8px; color: var(--text-1); }
    .pl-faq p { color: var(--text-3); font-size: 14px; line-height: 1.7; margin: 0; }
</style>
@endpush

@section('content')

<section class="pl-hero">
    <div class="container">
        <span class="ks-eyebrow"><span class="ks-dot"></span> {{ $isAr ? 'أسعار شفافة' : 'Transparent pricing' }}</span>
        <h1 class="mt-3">{{ $isAr ? 'باقات تناسب كل مشروع' : 'Plans that fit every project' }}</h1>
        <p class="lead">{{ $isAr ? 'ثلاث باقات بأسعار ثابتة لكل احتياج، من موقع تسويقي إلى منصة SaaS كاملة. كل شيء يشمل ضمان 30 يوم ودعم ما بعد الإطلاق.' : 'Three fixed-fee plans for every need, from a marketing site to a full SaaS platform. Everything includes a 30-day warranty and post-launch support.' }}</p>
    </div>
</section>

<section class="ks-section">
    <div class="container">
        <div class="row g-4">
            @php
            $plans = [
                [
                    'icon' => 'fas fa-rocket',
                    'name' => $isAr ? 'Starter' : 'Starter',
                    'desc' => $isAr ? 'لرواد الأعمال والمشاريع الصغيرة التي تحتاج وجودا قويا على الإنترنت.' : 'For solo founders and small projects that need a strong online presence.',
                    'price' => '$1,500',
                    'per' => $isAr ? 'يبدأ من، مشروع كامل' : 'starting at, full project',
                    'featured' => false,
                    'features' => [
                        [$isAr ? 'موقع تسويقي حتى 5 صفحات' : 'Marketing site up to 5 pages', true],
                        [$isAr ? 'تصميم مخصص وموبايل أولا' : 'Custom design, mobile-first', true],
                        [$isAr ? 'تحسين Lighthouse 95+' : 'Lighthouse 95+ performance', true],
                        [$isAr ? 'تكامل نموذج التواصل والإيميل' : 'Contact form + email integration', true],
                        [$isAr ? 'SEO تقني أساسي' : 'Basic technical SEO', true],
                        [$isAr ? 'استضافه وSSL وdomain setup' : 'Hosting, SSL, domain setup', true],
                        [$isAr ? '30 يوم إصلاح أخطاء مجاني' : '30 days free bug fixes', true],
                        [$isAr ? 'تكاملات معقدة (Stripe, CRM)' : 'Complex integrations', false],
                        [$isAr ? 'نظام إدارة محتوى متقدم' : 'Advanced CMS', false],
                    ],
                ],
                [
                    'icon' => 'fas fa-bolt',
                    'name' => $isAr ? 'Professional' : 'Professional',
                    'desc' => $isAr ? 'الباقة الأكثر طلبا. مناسبة للشركات والمتاجر الإلكترونية والمنصات المتوسطة.' : 'Most popular. For businesses, e-commerce stores, and mid-size platforms.',
                    'price' => '$5,000',
                    'per' => $isAr ? 'يبدأ من، مشروع كامل' : 'starting at, full project',
                    'featured' => true,
                    'features' => [
                        [$isAr ? 'موقع أو تطبيق ويب حتى 25 صفحة' : 'Site or web app up to 25 pages', true],
                        [$isAr ? 'تصميم Figma كامل بمراجعتين' : 'Full Figma design + 2 revisions', true],
                        [$isAr ? 'نظام إدارة محتوى (Filament/Strapi)' : 'CMS (Filament/Strapi)', true],
                        [$isAr ? 'تكامل دفع Stripe أو Paymob' : 'Stripe or Paymob integration', true],
                        [$isAr ? 'تكامل API خارجية (مثل Mailchimp)' : 'External API integrations', true],
                        [$isAr ? 'لوحة تحكم للأدمن مخصصة' : 'Custom admin dashboard', true],
                        [$isAr ? 'SEO تقني متقدم + schema markup' : 'Advanced technical SEO + schema', true],
                        [$isAr ? 'نشر آلي عبر GitHub Actions' : 'CI/CD via GitHub Actions', true],
                        [$isAr ? '60 يوم إصلاح أخطاء مجاني' : '60 days free bug fixes', true],
                    ],
                ],
                [
                    'icon' => 'fas fa-crown',
                    'name' => $isAr ? 'Enterprise' : 'Enterprise',
                    'desc' => $isAr ? 'لمنصات SaaS الكبيرة، التطبيقات متعددة المستأجرين، أو المشاريع المعقدة.' : 'For full SaaS platforms, multi-tenant apps, or complex enterprise projects.',
                    'price' => '$15,000+',
                    'per' => $isAr ? 'حسب النطاق والمده' : 'depending on scope',
                    'featured' => false,
                    'features' => [
                        [$isAr ? 'منصة SaaS متعددة المستأجرين' : 'Multi-tenant SaaS platform', true],
                        [$isAr ? 'فوترة Stripe + إدارة الاشتراكات' : 'Stripe Cashier + subscription mgmt', true],
                        [$isAr ? 'مصادقة متقدمة + 2FA + RBAC' : 'Advanced auth + 2FA + RBAC', true],
                        [$isAr ? 'تكاملات API غير محدودة' : 'Unlimited API integrations', true],
                        [$isAr ? 'تحليلات وتقارير قابلة للتخصيص' : 'Custom analytics & reporting', true],
                        [$isAr ? 'تصميم بنية قابلة للتوسع' : 'Scalable architecture design', true],
                        [$isAr ? 'مراجعات أمنية ربع سنوية' : 'Quarterly security audits', true],
                        [$isAr ? 'دعم ذو أولوية + SLA' : 'Priority support + SLA', true],
                        [$isAr ? '90 يوم إصلاح أخطاء + تدريب' : '90 days bug fixes + training', true],
                    ],
                ],
            ];
            @endphp

            @foreach($plans as $p)
                <div class="col-md-6 col-lg-4 ks-fadeup">
                    <div class="pl-card {{ $p['featured'] ? 'pl-card--featured' : '' }}">
                        @if($p['featured'])<div class="pl-card__badge">{{ $isAr ? 'الأكثر طلبا' : 'Most popular' }}</div>@endif
                        <div class="pl-card__ico"><i class="{{ $p['icon'] }}"></i></div>
                        <h3>{{ $p['name'] }}</h3>
                        <p class="pl-card__desc">{{ $p['desc'] }}</p>
                        <div class="pl-card__price">
                            <span class="num"><span>{{ $p['price'] }}</span></span>
                            <span class="per">{{ $p['per'] }}</span>
                        </div>
                        <ul class="pl-card__features">
                            @foreach($p['features'] as [$txt, $on])
                                <li class="{{ $on ? '' : 'is-off' }}"><i class="fas fa-{{ $on ? 'check' : 'times' }}"></i> {{ $txt }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('contact') }}" class="ks-btn {{ $p['featured'] ? 'ks-btn--primary' : 'ks-btn--ghost' }}">
                            {{ $isAr ? 'احصل على عرض' : 'Get a quote' }} <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="pl-faq ks-fadeup">
                    <h3>{{ $isAr ? 'لماذا الأسعار تبدأ من؟' : 'Why do prices start at?' }}</h3>
                    <p>{{ $isAr ? 'لأن كل مشروع له نطاق مختلف. السعر النهائي بعد مكالمه الاستكشاف 30 دقيقه (مجانيه) وقبل أي عمل، تستلم عرضا ثابت السعر مكتوبا.' : 'Every project has a different scope. The final price is set after a free 30-minute discovery call. Before any work starts, you receive a written fixed-fee proposal.' }}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="pl-faq ks-fadeup">
                    <h3>{{ $isAr ? 'الصيانه بعد الإطلاق؟' : 'Maintenance after launch?' }}</h3>
                    <p>{{ $isAr ? 'عقود شهرية تبدأ من $200/شهر للمواقع الصغيره وحتى $800/شهر للتطبيقات النشطه. تشمل التحديثات والنسخ الاحتياطي والمراقبه وتغييرات صغيره.' : 'Monthly retainers start at $200/mo for small sites up to $800/mo for active web apps. Includes updates, backups, monitoring, and small change requests.' }}</p>
                </div>
            </div>
        </div>

        <div class="home-cta ks-fadeup" style="margin-top: var(--sp-7);">
            <h2>{{ $isAr ? 'مش لاقي الباقه المناسبة؟' : 'Not sure which plan fits?' }}</h2>
            <p>{{ $isAr ? 'احجز مكالمه استكشاف 30 دقيقه مجانية، وسأقترح عليك الباقه المناسبة لمشروعك.' : 'Book a free 30-minute discovery call and I will recommend the right plan for your project.' }}</p>
            <div class="home-cta__row">
                <a href="{{ route('contact') }}" class="ks-btn ks-btn--primary">{{ $isAr ? 'احجز مكالمه' : 'Book a call' }} <i class="fa fa-arrow-right"></i></a>
                <a href="{{ route('faqs') }}" class="ks-btn ks-btn--ghost">{{ $isAr ? 'الأسئلة الشائعة' : 'See FAQs' }} <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection
