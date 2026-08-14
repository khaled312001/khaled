<?php

namespace App\Services;

class PortfolioService
{
    public static function all(): array
    {
        return array_map([self::class, 'localize'], self::projects());
    }

    /**
     * Projects grouped by country, with countries ordered by importance
     * (international/European markets first, local markets last) and
     * featured projects bubbled to the top within each country group.
     */
    public static function byCountry(): array
    {
        $priority = self::countryPriority();
        $projects = self::projects();

        usort($projects, function ($a, $b) use ($priority) {
            $cmp = ($priority[$a['country']] ?? 99) - ($priority[$b['country']] ?? 99);
            if ($cmp !== 0) return $cmp;
            $fa = !empty($a['featured']) ? 0 : 1;
            $fb = !empty($b['featured']) ? 0 : 1;
            return $fa - $fb;
        });

        $isAr = function_exists('app') && app()->getLocale() === 'ar';
        $groups = [];
        foreach ($projects as $p) {
            $key = $p['country'];
            if (!isset($groups[$key])) {
                $groups[$key] = [
                    'country'    => $isAr && !empty($p['country_ar']) ? $p['country_ar'] : $p['country'],
                    'country_en' => $p['country'],
                    'flag'       => $p['country_flag'] ?? '',
                    'code'       => $p['country_code'] ?? '',
                    'projects'   => [],
                ];
            }
            $groups[$key]['projects'][] = self::localize($p);
        }
        return array_values($groups);
    }

    public static function countryCount(): int
    {
        return count(array_unique(array_column(self::projects(), 'country')));
    }

    /**
     * Mobile apps published on Google Play (developer: Barmagly).
     * Localized name/tagline based on the current locale.
     */
    public static function apps(): array
    {
        $isAr = function_exists('app') && app()->getLocale() === 'ar';
        return array_map(function ($a) use ($isAr) {
            if ($isAr) {
                if (!empty($a['name_ar']))    $a['name'] = $a['name_ar'];
                if (!empty($a['tagline_ar'])) $a['tagline'] = $a['tagline_ar'];
                if (!empty($a['category_ar'])) $a['category'] = $a['category_ar'];
            }
            return $a;
        }, self::appsData());
    }

    public static function appCount(): int
    {
        return count(self::appsData());
    }

    private static function appsData(): array
    {
        // grad: two-color CSS gradient for the icon tile. icon: Font Awesome class.
        return [
            [
                'name' => 'Omnixtrack CRM',
                'name_ar' => 'Omnixtrack CRM',
                'tagline' => 'Multi-tenant CRM: leads, sales pipelines, WhatsApp and tasks — on the go.',
                'tagline_ar' => 'إدارة علاقات عملاء متعددة المستأجرين: العملاء المحتملون، المبيعات، الواتساب والمهام — من هاتفك.',
                'category' => 'Business / CRM',
                'category_ar' => 'أعمال / CRM',
                'icon' => 'fas fa-chart-line',
                'grad' => 'linear-gradient(135deg, #0ea5e9, #1e3a8a)',
                'store' => 'https://play.google.com/store/apps/details?id=com.omnixtrack.app',
                'website' => 'https://omnixtrack.com',
                'featured' => true,
            ],
            [
                'name' => 'POS Barmagly',
                'name_ar' => 'POS Barmagly',
                'tagline' => 'Cloud point-of-sale for restaurants, cafes and retail — offline-ready.',
                'tagline_ar' => 'نقاط بيع سحابيه للمطاعم والمقاهي والتجزئه — تعمل بدون إنترنت.',
                'category' => 'Business / POS',
                'category_ar' => 'أعمال / نقاط بيع',
                'icon' => 'fas fa-cash-register',
                'grad' => 'linear-gradient(135deg, #7c3aed, #4c1d95)',
                'store' => 'https://play.google.com/store/apps/details?id=tech.barmagly.pos',
                'website' => 'https://kassenta.com',
                'featured' => true,
            ],
            [
                'name' => 'Barmagly — Order Food',
                'name_ar' => 'Barmagly — طلب الطعام',
                'tagline' => 'Online food ordering and delivery with live order tracking.',
                'tagline_ar' => 'طلب وتوصيل الطعام أونلاين مع تتبع لحظي للطلب.',
                'category' => 'Food & Delivery',
                'category_ar' => 'طعام وتوصيل',
                'icon' => 'fas fa-utensils',
                'grad' => 'linear-gradient(135deg, #f97316, #b91c1c)',
                'store' => 'https://play.google.com/store/apps/details?id=com.barmagly.customer',
                'website' => null,
                'featured' => false,
            ],
            [
                'name' => 'Klipp — Salon Booking',
                'name_ar' => 'Klipp — حجز الصالونات',
                'tagline' => 'Book salon and barber appointments, manage staff and services.',
                'tagline_ar' => 'حجز مواعيد الصالونات والحلاقه، وإدارة الموظفين والخدمات.',
                'category' => 'Beauty & Booking',
                'category_ar' => 'تجميل وحجوزات',
                'icon' => 'fas fa-scissors',
                'grad' => 'linear-gradient(135deg, #ec4899, #831843)',
                'store' => 'https://play.google.com/store/apps/details?id=tech.barmagly.barber',
                'website' => 'https://klippsalon.com',
                'featured' => false,
            ],
            [
                'name' => 'Holy Quran — Barmagly',
                'name_ar' => 'القرآن الكريم — برمجلي',
                'tagline' => 'Read and listen to the Holy Quran — ad-free, tracker-free, privacy-first.',
                'tagline_ar' => 'قراءه واستماع القرآن الكريم — بدون إعلانات ولا تتبع، يحترم الخصوصيه.',
                'category' => 'Islamic',
                'category_ar' => 'إسلامي',
                'icon' => 'fas fa-book-quran',
                'grad' => 'linear-gradient(135deg, #10b981, #065f46)',
                'store' => 'https://play.google.com/store/apps/details?id=tech.barmagly.quran',
                'website' => 'https://quran.khaledahmed.net',
                'featured' => false,
            ],
            [
                'name' => 'Tamem Delivery',
                'name_ar' => 'تميم للتوصيل',
                'tagline' => 'Order food, pharmacy and supermarket delivery across Upper Egypt with live tracking.',
                'tagline_ar' => 'اطلب توصيل مطاعم وصيدليات وسوبر ماركت في صعيد مصر مع تتبع لحظي.',
                'category' => 'Food & Delivery',
                'category_ar' => 'طعام وتوصيل',
                'icon' => 'fas fa-motorcycle',
                'grad' => 'linear-gradient(135deg, #ef4444, #7f1d1d)',
                'store' => 'https://play.google.com/store/apps/details?id=com.tamem.delivery',
                'website' => 'https://deliverytamem.com',
                'featured' => false,
            ],
            [
                'name' => 'Omnixtrack Calls',
                'name_ar' => 'Omnixtrack Calls',
                'tagline' => 'Log and sync sales calls straight into your Omnixtrack CRM pipeline on the go.',
                'tagline_ar' => 'سجّل مكالمات المبيعات وزامنها مباشره مع نظام Omnixtrack CRM من هاتفك.',
                'category' => 'Business / CRM',
                'category_ar' => 'أعمال / CRM',
                'icon' => 'fas fa-phone-volume',
                'grad' => 'linear-gradient(135deg, #0ea5e9, #1e3a8a)',
                'store' => 'https://play.google.com/store/apps/details?id=com.omnixtrack.calls',
                'website' => 'https://omnixtrack.com',
                'featured' => false,
            ],
        ];
    }

    private static function countryPriority(): array
    {
        return [
            'Switzerland'    => 1,
            'United Kingdom' => 2,
            'Germany'        => 3,
            'France'         => 4,
            'Turkey'         => 5,
            'Kuwait'         => 6,
            'Saudi Arabia'   => 7,
            'Egypt'          => 8,
        ];
    }

    /**
     * Filter projects by stable English category slug, then localize.
     * Use this from controllers — it works regardless of current locale.
     */
    public static function byCategorySlug(string $slug): array
    {
        $slug = strtolower($slug);
        $filtered = array_filter(
            self::projects(),
            fn ($p) => self::categorySlug($p['category']) === $slug
        );
        return array_values(array_map([self::class, 'localize'], $filtered));
    }

    public static function categories(): array
    {
        $isAr = function_exists('app') && app()->getLocale() === 'ar';
        $cats = [];
        foreach (self::projects() as $p) {
            $slug = self::categorySlug($p['category']);
            $name = $isAr ? self::categoryToAr($p['category']) : $p['category'];
            if (!isset($cats[$slug])) {
                $cats[$slug] = ['name' => $name, 'count' => 0, 'en' => $p['category']];
            }
            $cats[$slug]['count']++;
        }
        ksort($cats);
        return $cats;
    }

    /**
     * Stable slug for a category — locale-independent.
     * URLs use these slugs so the filter works in any language.
     */
    public static function categorySlug(string $enCategory): string
    {
        return [
            'Tech / SaaS' => 'tech',
            'Law Firm' => 'law',
            'Education' => 'education',
            'E-commerce' => 'ecommerce',
            'Marketing' => 'marketing',
            'Restaurant' => 'restaurant',
            'Construction' => 'construction',
            'Healthcare' => 'healthcare',
            'Hotel / Events' => 'events',
            'Religious / Quran' => 'religious',
        ][$enCategory] ?? strtolower(preg_replace('/[^a-z0-9]+/i', '-', $enCategory));
    }

    /**
     * Reverse lookup: slug -> English category name.
     * Used by the controller to filter projects when given a URL slug.
     */
    public static function categoryFromSlug(string $slug): ?string
    {
        $map = [
            'tech' => 'Tech / SaaS',
            'law' => 'Law Firm',
            'education' => 'Education',
            'ecommerce' => 'E-commerce',
            'marketing' => 'Marketing',
            'restaurant' => 'Restaurant',
            'construction' => 'Construction',
            'healthcare' => 'Healthcare',
            'events' => 'Hotel / Events',
            'religious' => 'Religious / Quran',
        ];
        return $map[$slug] ?? null;
    }

    public static function find(string $slug): ?array
    {
        foreach (self::projects() as $p) {
            if ($p['slug'] === $slug) {
                return self::localize($p);
            }
        }
        return null;
    }

    private static function localize(array $p): array
    {
        $isAr = function_exists('app') && app()->getLocale() === 'ar';
        if (!$isAr) return $p;
        if (!empty($p['title_ar'])) $p['title'] = $p['title_ar'];
        if (!empty($p['summary_ar'])) $p['summary'] = $p['summary_ar'];
        if (!empty($p['country_ar'])) $p['country'] = $p['country_ar'];
        $p['category'] = self::categoryToAr($p['category']);
        $p['role'] = self::roleToAr($p['role']);
        return $p;
    }

    private static function categoryToAr(string $en): string
    {
        return [
            'Tech / SaaS' => 'تقنيه / SaaS',
            'Law Firm' => 'مكتب محاماه',
            'Education' => 'تعليم',
            'E-commerce' => 'تجاره إلكترونيه',
            'Marketing' => 'تسويق',
            'Restaurant' => 'مطعم',
            'Construction' => 'مقاولات',
            'Healthcare' => 'الرعايه الصحيه',
            'Hotel / Events' => 'فندقه / فعاليات',
            'Religious / Quran' => 'إسلامي / قرآني',
        ][$en] ?? $en;
    }

    private static function roleToAr(string $en): string
    {
        return [
            'Founder, Architect, Lead Developer' => 'مؤسس ومهندس ومطوّر رئيسي',
            'Lead Developer' => 'مطوّر رئيسي',
            'Full Stack Developer' => 'مطور ويب متكامل',
            'Solo Developer' => 'مطوّر منفرد',
        ][$en] ?? $en;
    }

    /**
     * 39 real production projects shipped by Khaled Ahmed.
     * Curated from live deployments — duplicates removed.
     */
    private static function projects(): array
    {
        return [
            [
                'slug' => 'united-aviators',
                'title' => 'United Aviators — Pilot Training Academy',
                'summary' => 'Aviation training academy website with course catalog, student admissions and instructor profiles. Modern presentation for prospective pilot trainees.',
                'title_ar' => 'United Aviators — أكاديميه تدريب طيارين',
                'summary_ar' => 'موقع أكاديميه تدريب طيران بكتالوج كورسات وقبول طلاب وملفات مدربين. عرض حديث للطيارين المحتملين.',
                'category' => 'Education',
                'tech' => ['React', 'Next.js', 'Tailwind CSS', 'TypeScript'],
                'url' => 'https://www.unitedaviators.com',
                'image' => 'projects/united-aviators.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
                'featured' => true,
            ],
            [
                'slug' => 'skyteam-aviation',
                'title' => 'SkyTeam Aviation — Aviation Services',
                'summary' => 'Aviation services company website featuring fleet, services and contact channels for charter and training inquiries.',
                'title_ar' => 'SkyTeam Aviation — خدمات طيران',
                'summary_ar' => 'موقع شركه خدمات طيران بأسطول وخدمات وقنوات تواصل لاستفسارات الشحن والتدريب.',
                'category' => 'Education',
                'tech' => ['React', 'Next.js', 'Tailwind CSS'],
                'url' => 'https://skyteamaviation.com',
                'image' => 'projects/skyteam-aviation.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'egysims',
                'title' => 'EgySims — Egyptian Flight Simulators Store',
                'summary' => 'E-commerce platform for flight simulator hardware in Egypt. Product catalog, cart, checkout and account management.',
                'title_ar' => 'EgySims — متجر محاكيات طيران مصري',
                'summary_ar' => 'منصه تجاره إلكترونيه لأجهزه محاكيات الطيران في مصر. كتالوج منتجات وسله ودفع وإداره حسابات.',
                'category' => 'E-commerce',
                'tech' => ['WordPress', 'WooCommerce', 'Custom Theme'],
                'url' => 'https://egysims.com',
                'image' => 'projects/egysims.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'dr-mohamed-dental',
                'title' => 'Dr. Mohamed Dental — Clinic Booking Site',
                'summary' => 'Dental clinic website with services overview, doctor profile and online appointment booking. Built with Next.js for fast performance.',
                'title_ar' => 'د. محمد للأسنان — موقع حجز عيادات',
                'summary_ar' => 'موقع عياده أسنان بنظره عامه على الخدمات وملف الطبيب وحجز مواعيد أونلاين. مبني بـ Next.js لأداء سريع.',
                'category' => 'Healthcare',
                'tech' => ['Next.js', 'React', 'Tailwind CSS', 'Vercel'],
                'url' => 'https://dr-mohamed-dental.vercel.app',
                'image' => 'projects/dr-mohamed-dental.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'pharmacy-app',
                'title' => 'Pharmacy — Online Pharmacy Web App',
                'summary' => 'Modern online pharmacy web app with product browsing, cart and order management. Built with Next.js and deployed on Vercel.',
                'title_ar' => 'صيدليه — تطبيق ويب صيدليه أونلاين',
                'summary_ar' => 'تطبيق ويب صيدليه أونلاين عصري بتصفح منتجات وسله وإداره طلبات. مبني بـ Next.js ومنشور على Vercel.',
                'category' => 'Healthcare',
                'tech' => ['Next.js', 'React', 'TypeScript', 'Tailwind CSS'],
                'url' => 'https://pharmcy.vercel.app',
                'image' => 'projects/pharmacy-app.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'barmagly-tech',
                'title' => 'Barmagly — Swiss-Licensed Software House',
                'summary' => 'Founder & lead developer. Enterprise web, mobile, POS and business automation systems delivered to clients across Europe and the Middle East.',
                'title_ar' => 'برمجلي — شركه برمجيات سويسريه',
                'summary_ar' => 'مؤسس ومطوّر رئيسي. أنظمه مؤسسيه للويب والموبايل و POS وأتمته الأعمال لعملاء في أوروبا والشرق الأوسط.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'Next.js', 'Node.js', 'TypeScript', 'PostgreSQL'],
                'url' => 'https://barmagly.tech',
                'image' => 'projects/barmagly-tech.jpg',
                'role' => 'Founder, Architect, Lead Developer',
                'language' => 'en',
                'country' => 'Switzerland',
                'country_ar' => 'سويسرا',
                'country_flag' => '🇨🇭',
                'country_code' => 'ch',
                'featured' => true,
            ],
            [
                'slug' => 'barmagly-pos',
                'title' => 'Kassenta — Cloud Multi-Tenant POS System',
                'summary' => 'Cloud-based, multi-tenant point-of-sale system for restaurants, cafés and retail — with inventory, multi-branch and reporting.',
                'title_ar' => 'Kassenta — كاشير سحابي متعدد المستأجرين',
                'summary_ar' => 'نظام نقاط بيع سحابي متعدد المستأجرين للمطاعم والكافيهات والتجزئه، مع مخزون وتعدد فروع وتقارير.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe'],
                'url' => 'https://kassenta.com',
                'image' => 'projects/barmagly-pos.png',
                'role' => 'Lead Developer',
                'language' => 'de',
                'country' => 'Germany',
                'country_ar' => 'ألمانيا',
                'country_flag' => '🇩🇪',
                'country_code' => 'de',
                'featured' => true,
            ],
            [
                'slug' => 'barmagly-salon',
                'title' => 'Klipp — AI-Powered Salon Management',
                'summary' => 'SaaS platform for salons and barbershops: bookings, POS, inventory, staff scheduling, AI hair-makeover previews and analytics — all in one platform.',
                'title_ar' => 'Klipp — منصه إداره صالونات بالذكاء الاصطناعي',
                'summary_ar' => 'منصه SaaS للصالونات ومحلات الحلاقه: حجوزات، POS، مخزون، جدوله موظفين، معاينات تسريحات بالذكاء الاصطناعي وتحليلات — كله في منصه واحده.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'React', 'AI/OpenAI', 'PostgreSQL'],
                'url' => 'https://klippsalon.com',
                'image' => 'projects/barmagly-salon.png',
                'role' => 'Lead Developer',
                'language' => 'en',
                'country' => 'Switzerland',
                'country_ar' => 'سويسرا',
                'country_flag' => '🇨🇭',
                'country_code' => 'ch',
                'featured' => true,
            ],
            [
                'slug' => 'amanlaw',
                'title' => 'Aman Law — Swiss-Managed Legal Platform',
                'summary' => 'Swiss-managed legal platform connecting Syrian and Swiss lawyers with international clients across multiple practice areas.',
                'title_ar' => 'Aman Law — منصه قانونيه سويسريه',
                'summary_ar' => 'منصه قانونيه تُدار من سويسرا تربط محامين سوريين وسويسريين بعملاء دوليين في تخصصات قانونيه متعدده.',
                'category' => 'Law Firm',
                'tech' => ['Laravel', 'Inertia.js', 'React', 'MySQL'],
                'url' => 'https://amanlaw.ch',
                'image' => 'projects/amanlaw.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Switzerland',
                'country_ar' => 'سويسرا',
                'country_flag' => '🇨🇭',
                'country_code' => 'ch',
            ],
            [
                'slug' => 'swissbridge-academy',
                'title' => 'Swiss Bridge Academy — E-Learning Platform',
                'summary' => 'Swiss-managed e-learning academy teaching programming, AI, design, marketing and sales — full LMS with student dashboards.',
                'title_ar' => 'Swiss Bridge Academy — منصه تعليم إلكتروني',
                'summary_ar' => 'أكاديميه تعليم إلكتروني تُدار من سويسرا تدرّس البرمجه والذكاء الاصطناعي والتصميم والتسويق والمبيعات — LMS كامل بلوحات تحكّم للطلاب.',
                'category' => 'Education',
                'tech' => ['Laravel', 'Livewire', 'Tailwind', 'MySQL'],
                'url' => 'https://swissbridgeacademy.com',
                'image' => 'projects/swissbridge-academy.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Switzerland',
                'country_ar' => 'سويسرا',
                'country_flag' => '🇨🇭',
                'country_code' => 'ch',
            ],
            [
                'slug' => 'mossodor',
                'title' => 'Mossodor — UK Premium Lighting Store',
                'summary' => 'UK e-commerce retailer specializing in premium chandeliers, pendant lighting and wall sconces with free delivery.',
                'title_ar' => 'Mossodor — متجر إضاءه فاخر بريطاني',
                'summary_ar' => 'متجر إلكتروني بريطاني متخصص في الثريات الفاخره والمصابيح المعلّقه والجداريه مع توصيل مجاني.',
                'category' => 'E-commerce',
                'tech' => ['Shopify', 'Liquid', 'Custom Theme'],
                'url' => 'https://mossodor.com',
                'image' => 'projects/mossodor.jpg',
                'role' => 'Lead Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'xappee',
                'title' => 'Xappee — E-Commerce Fulfillment Platform',
                'summary' => 'E-commerce fulfillment, sourcing, digital marketing and virtual assistant services for online sellers worldwide.',
                'title_ar' => 'Xappee — منصه تشغيل التجاره الإلكترونيه',
                'summary_ar' => 'تشغيل التجاره الإلكترونيه، التوريد، التسويق الرقمي، وخدمات المساعدين الافتراضيين للبائعين عبر الإنترنت حول العالم.',
                'category' => 'Tech / SaaS',
                'tech' => ['WordPress', 'WooCommerce', 'Custom Plugins'],
                'url' => 'https://xappee.com',
                'image' => 'projects/xappee.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'ant-assist',
                'title' => 'Ant Assist — UK Virtual Assistant Agency',
                'summary' => 'UK virtual assistant agency providing offshore admin and marketing support staff to UK businesses and entrepreneurs.',
                'title_ar' => 'Ant Assist — وكاله مساعدين افتراضيين بريطانيه',
                'summary_ar' => 'وكاله مساعدين افتراضيين بريطانيه بتوفّر دعم إداري وتسويقي للشركات البريطانيه ورواد الأعمال.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'Custom Theme', 'PHP'],
                'url' => 'https://ant-assist.com',
                'image' => 'projects/ant-assist.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'rasa-lichfield',
                'title' => 'Rasa Lichfield — Halal Pan-Asian Restaurant',
                'summary' => 'UK halal Pan-Asian restaurant inside the historic Corn Exchange, blending modern Asian cooking with reservations and online ordering.',
                'title_ar' => 'Rasa Lichfield — مطعم آسيوي حلال',
                'summary_ar' => 'مطعم بريطاني حلال للمأكولات الآسيويه داخل Corn Exchange التاريخي، بيدمج الطبخ الآسيوي العصري مع نظام الحجز والطلب أونلاين.',
                'category' => 'Restaurant',
                'tech' => ['WordPress', 'WooCommerce', 'Custom Theme'],
                'url' => 'https://rasalichfield.co.uk',
                'image' => 'projects/rasa-lichfield.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'kingkebab',
                'title' => 'King Kebab Le Pouzin — French Restaurant Site',
                'summary' => 'Authentic halal kebab restaurant in Le Pouzin, France — serving tacos, burgers and online delivery to local clientele.',
                'title_ar' => 'King Kebab Le Pouzin — موقع مطعم فرنسي',
                'summary_ar' => 'مطعم كباب حلال أصيل في Le Pouzin بفرنسا — يقدّم تاكو وبرغر وتوصيل أونلاين للعملاء المحليين.',
                'category' => 'Restaurant',
                'tech' => ['Laravel', 'Tailwind', 'MySQL'],
                'url' => 'https://kingkebablepouzin.fr',
                'image' => 'projects/kingkebab.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'fr',
                'country' => 'France',
                'country_ar' => 'فرنسا',
                'country_flag' => '🇫🇷',
                'country_code' => 'fr',
            ],
            [
                'slug' => 'bnbatiment',
                'title' => 'BN Bâtiment — French Roofing Company',
                'summary' => 'Professional roofing company in Lyon, Saint-Étienne and Valence offering installation, repair and 24/7 emergency service.',
                'title_ar' => 'BN Bâtiment — شركه تسقيف فرنسيه',
                'summary_ar' => 'شركه تسقيف احترافيه في Lyon و Saint-Étienne و Valence تقدّم خدمات التركيب والإصلاح والطوارئ 24 ساعه.',
                'category' => 'Construction',
                'tech' => ['Laravel', 'Inertia.js', 'React', 'MySQL'],
                'url' => 'https://bnbatiment.com',
                'image' => 'projects/bnbatiment.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'fr',
                'country' => 'France',
                'country_ar' => 'فرنسا',
                'country_flag' => '🇫🇷',
                'country_code' => 'fr',
                'featured' => true,
            ],
            [
                'slug' => 'drcembaysal',
                'title' => 'Dr. Cem Baysal — Istanbul Dental Clinic',
                'summary' => 'Istanbul dental clinic specializing in implants, veneers and cosmetic dentistry — booking system and multilingual patient pages.',
                'title_ar' => 'د. جم بيسال — عياده أسنان في إسطنبول',
                'summary_ar' => 'عياده أسنان في إسطنبول متخصصه في الزرع والقشور وطب الأسنان التجميلي — نظام حجز وصفحات مرضى متعدده اللغات.',
                'category' => 'Healthcare',
                'tech' => ['WordPress', 'Elementor', 'Custom CSS'],
                'url' => 'https://drcembaysal.com',
                'image' => 'projects/drcembaysal.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'Turkey',
                'country_ar' => 'تركيا',
                'country_flag' => '🇹🇷',
                'country_code' => 'tr',
            ],
            [
                'slug' => 'grandbotanicalsuite',
                'title' => 'Grand Botanical Suite — Birmingham Wedding Venue',
                'summary' => 'Premium Birmingham wedding venue offering customizable halls, catering and full event planning with online inquiry system.',
                'title_ar' => 'Grand Botanical Suite — قاعه أفراح في برمنغهام',
                'summary_ar' => 'قاعه أفراح فاخره في برمنغهام تقدّم قاعات قابله للتخصيص وتموين وتخطيط فعاليات كامل مع نظام استفسار أونلاين.',
                'category' => 'Hotel / Events',
                'tech' => ['WordPress', 'Custom Theme', 'WP Forms'],
                'url' => 'https://grandbotanicalsuite.com',
                'image' => 'projects/grandbotanicalsuite.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'jovero',
                'title' => 'JOVERO — Premier Marketing & Digital Growth Agency',
                'summary' => 'Engineering enterprise-grade marketing and software solutions — full agency site with case studies and lead-gen funnels.',
                'title_ar' => 'JOVERO — وكاله تسويق رقمي رائده',
                'summary_ar' => 'هندسه حلول تسويق وبرمجيات بمستوى مؤسسي — موقع وكاله كامل بدراسات حالات وقمع جذب عملاء.',
                'category' => 'Marketing',
                'tech' => ['Laravel', 'Tailwind', 'Alpine.js'],
                'url' => 'https://jovero.net',
                'image' => 'projects/jovero.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'qinawy',
                'title' => 'Qinawy — Comprehensive Qena Local Directory',
                'summary' => 'Comprehensive local-business and services directory for Qena governorate, Egypt — hospitals, doctors, hotels, restaurants and more.',
                'title_ar' => 'قناوي — دليل قنا الشامل',
                'summary_ar' => 'دليل شامل للأعمال والخدمات المحليه في محافظه قنا، مصر — مستشفيات وأطباء وفنادق ومطاعم والمزيد.',
                'category' => 'Marketing',
                'tech' => ['Laravel', 'Filament', 'MySQL', 'Redis'],
                'url' => 'https://qinawy.com',
                'image' => 'projects/qinawy.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'hotel-timestay',
                'title' => 'TimeStay — Hourly Hotel Booking',
                'summary' => 'Hourly hotel-room booking platform offering short-term stays from 2–12 hours with real-time availability and payment integration.',
                'title_ar' => 'TimeStay — حجز غرف فندقيه بالساعه',
                'summary_ar' => 'منصه حجز غرف فندقيه بالساعه لإقامات قصيره من 2-12 ساعه مع توفّر وقت حقيقي وتكامل دفع.',
                'category' => 'Hotel / Events',
                'tech' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe'],
                'url' => 'https://hotel.khaledahmed.net',
                'image' => 'projects/hotel-timestay.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
                'featured' => true,
            ],
            [
                'slug' => 'syanatech',
                'title' => 'SyanaTech — Home Maintenance Marketplace',
                'summary' => 'Platform connecting clients with trusted licensed technicians for home maintenance — bookings, ratings, dispatch.',
                'title_ar' => 'SyanaTech — سوق صيانه منزليه',
                'summary_ar' => 'منصه بتربط العملاء بفنيين موثوقين مرخصين لخدمات الصيانه المنزليه — حجوزات، تقييمات، إرسال.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'Livewire', 'MySQL', 'Pusher'],
                'url' => 'https://syanatech.khaledahmed.net',
                'image' => 'projects/syanatech.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'salesman-marketing',
                'title' => 'Sales Man — STC Business Communication',
                'summary' => 'STC enterprise communication and connectivity solutions for Saudi businesses — service catalog, lead capture and CRM integration.',
                'title_ar' => 'سيلز مان — اتصالات أعمال STC',
                'summary_ar' => 'حلول الاتصالات والربط للأعمال السعوديه من STC — كتالوج خدمات والتقاط عملاء وتكامل CRM.',
                'category' => 'Marketing',
                'tech' => ['Laravel', 'Inertia.js', 'React', 'MySQL'],
                'url' => 'https://salesman.marketing',
                'image' => 'projects/salesman-marketing.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'wasiila',
                'title' => 'Wasiila — Mecca Pilgrim Services Platform',
                'summary' => 'Platform serving Mecca pilgrims with water distribution and mosque-care supplies — multi-vendor marketplace.',
                'title_ar' => 'وسيله — منصه خدمات حجاج مكه',
                'summary_ar' => 'منصه بتخدم حجاج بيت الله الحرام بتوزيع المياه ومستلزمات العنايه بالمساجد — سوق متعدد البائعين.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'Livewire', 'Tailwind', 'MySQL'],
                'url' => 'https://wasiila.com',
                'image' => 'projects/wasiila.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'hadiah-umrah',
                'title' => 'Hadiah — Digital Umrah Service App',
                'summary' => 'Digital Umrah service app connecting pilgrims with sharia-qualified service providers — booking, payments and verification.',
                'title_ar' => 'هديه — تطبيق خدمات عمره رقمي',
                'summary_ar' => 'تطبيق خدمات عمره رقمي بيربط الحجاج بمزودي خدمات شرعيين مؤهلين — حجز ودفع وتحقّق.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe'],
                'url' => 'https://hadiah.wasiila.com',
                'image' => 'projects/hadiah-umrah.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'quran-platform',
                'title' => 'Quran Reader — Free, Ad-Free Quran Platform',
                'summary' => 'Free, ad-free and tracker-free online Quran reading and recitation platform — privacy-first design.',
                'title_ar' => 'قارئ القرآن — منصه قرآن مجانيه بدون إعلانات',
                'summary_ar' => 'منصه قراءه وتلاوه القرآن مجانيه بدون إعلانات وبدون تتبّع — تصميم يحترم الخصوصيه أولًا.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'Alpine.js', 'Tailwind'],
                'url' => 'https://quran.khaledahmed.net',
                'image' => 'projects/quran-platform.jpg',
                'role' => 'Solo Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'infinitywearsa',
                'title' => 'Infinity Wear — Professional Sportswear Brand',
                'summary' => 'Saudi manufacturer of professional sportswear and uniforms for sports teams, schools and corporations — bulk-order workflows.',
                'title_ar' => 'Infinity Wear — علامه ملابس رياضيه احترافيه',
                'summary_ar' => 'مصنع سعودي للملابس الرياضيه الاحترافيه والزي الموحد للفرق الرياضيه والمدارس والشركات — تدفقات طلبات بالجمله.',
                'category' => 'E-commerce',
                'tech' => ['WordPress', 'WooCommerce', 'Custom Theme'],
                'url' => 'https://infinitywearsa.com',
                'image' => 'projects/infinitywearsa.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'standupstraight',
                'title' => 'Stand Up Straight — UK Posture Brand',
                'summary' => 'UK posture and back-care wellness brand — direct-to-consumer e-commerce with educational content and testimonials.',
                'title_ar' => 'Stand Up Straight — علامه عنايه بالظهر بريطانيه',
                'summary_ar' => 'علامه بريطانيه للوقفه السليمه والعنايه بالظهر — متجر مباشر للمستهلكين بمحتوى تعليمي وشهادات.',
                'category' => 'E-commerce',
                'tech' => ['Shopify', 'Liquid', 'Custom Theme'],
                'url' => 'https://standupstraight.co.uk',
                'image' => 'projects/standupstraight.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكه المتحده',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'gamestreet-q8',
                'title' => 'Game Street Kuwait — Gaming E-Commerce',
                'summary' => 'Kuwaiti retailer of video games, gaming consoles, accessories and PC peripherals — bilingual store with local payments.',
                'title_ar' => 'Game Street Kuwait — متجر ألعاب',
                'summary_ar' => 'متجر كويتي لألعاب الفيديو والكونسولات والإكسسوارات وأجهزه الكمبيوتر — متجر ثنائي اللغه بمدفوعات محليه.',
                'category' => 'E-commerce',
                'tech' => ['WordPress', 'WooCommerce', 'Arabic Localization'],
                'url' => 'https://gamestreetq8.com',
                'image' => 'projects/gamestreet-q8.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Kuwait',
                'country_ar' => 'الكويت',
                'country_flag' => '🇰🇼',
                'country_code' => 'kw',
            ],
            [
                'slug' => 'bankelarb',
                'title' => 'Bank El Arab — Arabic Financial Aid Guide',
                'summary' => 'Arabic guide to instant financial-aid programs and charitable services across Arab countries — content directory.',
                'title_ar' => 'بنك العرب — دليل مساعدات ماليه عربي',
                'summary_ar' => 'دليل عربي لبرامج المساعدات الماليه الفوريه والخدمات الخيريه عبر الدول العربيه — دليل محتوى.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'Custom Theme', 'Arabic SEO'],
                'url' => 'https://bankelarb.net',
                'image' => 'projects/bankelarb.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'services-researcher',
                'title' => 'Services Researcher — Academic Consultation',
                'summary' => 'Academic research, translation and statistical analysis services for graduate students — order workflow and consultation booking.',
                'title_ar' => 'مركز الباحث — استشارات أكاديميه',
                'summary_ar' => 'خدمات بحث أكاديمي وترجمه وتحليل إحصائي لطلاب الدراسات العليا — تدفق طلبات وحجز استشارات.',
                'category' => 'Education',
                'tech' => ['WordPress', 'Custom Theme', 'WP Forms'],
                'url' => 'https://servicesresearcher.com',
                'image' => 'projects/services-researcher.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'lotus-sharm',
                'title' => 'Lotus Sharm — Sharm El-Sheikh Tourism Platform',
                'summary' => 'Tourism and hotel-booking platform for Sharm El-Sheikh — tour packages, transfers, hotel bookings and itinerary management with separate API backend.',
                'title_ar' => 'Lotus Sharm — منصه سياحه وحجوزات شرم الشيخ',
                'summary_ar' => 'منصه سياحه وحجوزات فنادق في شرم الشيخ — باقات سياحيه ونقل وحجز فنادق وإداره برامج رحلات مع API منفصل.',
                'category' => 'Hotel / Events',
                'tech' => ['Next.js', 'TypeScript', 'Node.js', 'Express', 'MongoDB'],
                'url' => 'https://lotussharm.com',
                'image' => 'projects/lotus-sharm.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'masaary',
                'title' => 'Masaary — AI Career Skills Platform',
                'summary' => 'AI-powered platform that analyzes career skill gaps against the actual hiring requirements of Saudi enterprises (Aramco, SABIC, Al Rajhi, Neom) and generates personalized upskilling paths.',
                'title_ar' => 'مساري — منصه تحليل المهارات الوظيفيه بالذكاء الاصطناعي',
                'summary_ar' => 'منصه ذكاء اصطناعي بتقارن مهاراتك بمتطلّبات وظائف الشركات السعوديه الكبرى (أرامكو، سابك، الراجحي، نيوم) وبتولّد مسار تعلّم شخصي يسدّ الفجوه.',
                'category' => 'Tech / SaaS',
                'tech' => ['Next.js', 'TypeScript', 'Node.js', 'AI / OpenAI', 'PostgreSQL'],
                'url' => 'https://masaary.com',
                'image' => 'projects/masaary.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'ogs-academy',
                'title' => 'OGS Academy — Certified Industrial Training',
                'summary' => 'B2B training academy delivering TVTC-certified programs to oil, gas and heavy-industry companies in Saudi Arabia — corporate training catalog with partnerships including Umm Al-Qura University.',
                'title_ar' => 'أكاديميه OGS — التدريب الصناعي المعتمد للشركات',
                'summary_ar' => 'أكاديميه تدريب صناعي معتمده من المؤسسه العامه للتدريب التقني (TVTC) للشركات في قطاعات النفط والغاز والصناعات الثقيله بالسعوديه — كتالوج تدريب مؤسسي وشراكات مع جامعه أم القرى.',
                'category' => 'Education',
                'tech' => ['Laravel', 'Blade', 'Filament', 'MySQL'],
                'url' => 'https://ogs-academy.com',
                'image' => 'projects/ogs-academy.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'daamny',
                'title' => 'Da3many — Arabic Aid & Grants Portal',
                'summary' => 'Arabic content portal covering financial aid, grants and social support programs across Gulf and Arab countries — SEO-focused information hub.',
                'title_ar' => 'دعمى — بوابه الدعم والمنح الماليه',
                'summary_ar' => 'بوابه محتوى عربيه عن المنح والمساعدات الماليه والدعم الاجتماعي في دول الخليج والوطن العربي — مركز معلومات مُحسّن لمحركات البحث.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'Custom Theme', 'Arabic SEO'],
                'url' => 'https://d3mnakdi.com',
                'image' => 'projects/daamny.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'omnixtrack',
                'title' => 'Omnixtrack — Arabic Multi-Tenant CRM',
                'summary' => 'Made-in-Egypt multi-tenant CRM platform for Arabic-speaking businesses — lead pipelines, sales tracking, WhatsApp integration, task management, and team analytics — all in one localized platform, hosted inside Egypt.',
                'title_ar' => 'Omnixtrack — منصه CRM عربيه متعددة المستأجرين',
                'summary_ar' => 'منصه CRM متعددة المستأجرين صُنعت في مصر ومُستضافه داخل مصر — إدارة العملاء المحتملين، تتبع المبيعات، تكامل الواتساب، وإدارة المهام والفرق في منصه واحده معربه بالكامل.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'WhatsApp API'],
                'url' => 'https://omnixtrack.com',
                'image' => 'projects/omnixtrack.png',
                'role' => 'Lead Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
                'featured' => true,
            ],
            [
                'slug' => 'tamem-delivery',
                'title' => 'Tamem Delivery — Upper Egypt Delivery & Logistics Platform',
                'summary' => 'Integrated last-mile delivery and shipping platform serving Upper Egypt (Qift, Qena, Luxor, Aswan, Red Sea) — food, pharmacy and supermarket delivery, inter-governorate shipping, B2B merchant tools, live tracking, and a companion mobile app.',
                'title_ar' => 'تميم للتوصيل — منصه توصيل وشحن لصعيد مصر',
                'summary_ar' => 'منصه توصيل وشحن متكامله تخدم الصعيد (قفط · قنا · الأقصر · أسوان · البحر الأحمر) — توصيل مطاعم وصيدليات وسوبر ماركت، شحن بين المحافظات، حلول تجار B2B، تتبع لحظي، وتطبيق موبايل مصاحب.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'Flutter', 'MySQL', 'Google Maps API', 'Real-time Tracking'],
                'url' => 'https://deliverytamem.com',
                'image' => 'projects/deliverytamem.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'maeyn',
                'title' => 'Maeyn — Pilgrim Water & Meals Supply Platform',
                'summary' => 'Saudi platform for supplying purified drinking water and meals to pilgrims at the holy sites in Mecca — service catalog, ordering, and delivery management.',
                'title_ar' => 'مَعين — منصه توريد المياه والوجبات للحجاج',
                'summary_ar' => 'منصه سعوديه لتوريد مياه الشرب النقيه والوجبات للحجاج والمعتمرين في المشاعر المقدسه بمكه المكرمه — كتالوج خدمات وطلبات وإداره توصيل.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'Livewire', 'MySQL', 'Tailwind'],
                'url' => 'https://maeyn.wasiila.com',
                'image' => 'projects/maeyn.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'taffweed',
                'title' => 'Taffweed — Umrah Packages & Booking Platform',
                'summary' => 'Saudi platform offering flexible year-round Umrah packages and pilgrim services — package catalog, online booking, payments, and itinerary management.',
                'title_ar' => 'تفويض — منصه باقات وحجوزات العمره',
                'summary_ar' => 'منصه سعوديه تقدّم باقات عمره مرنه على مدار العام وخدمات للمعتمرين — كتالوج باقات وحجز أونلاين ومدفوعات وإداره برامج الرحلات.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'Livewire', 'MySQL', 'Stripe'],
                'url' => 'https://taffweed.wasiila.com',
                'image' => 'projects/taffweed.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
        ];
    }
}
