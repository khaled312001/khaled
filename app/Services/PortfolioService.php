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
                'name' => 'Interprova — Interview Practice',
                'name_ar' => 'Interprova — تدريب مقابلات العمل',
                'tagline' => 'Practise a job interview with an AI interviewer in Arabic or English, and get scored on every answer.',
                'tagline_ar' => 'تدرّب على مقابلة عمل مع محاوِر ذكاء اصطناعي بالعربية أو الإنجليزية، واحصل على تقييم لكل إجابة.',
                'category' => 'Education / Careers',
                'category_ar' => 'تعليم / وظائف',
                'icon' => 'fas fa-comments',
                'grad' => 'linear-gradient(135deg, #2D73FD, #0736A8)',
                'store' => 'https://play.google.com/store/apps/details?id=com.interprova.app',
                'shot' => 'app-interprova',
                'project' => 'interprova',
                'website' => 'https://interprova.com',
                'featured' => true,
            ],
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
                'shot' => 'app-omnixtrack-crm',
                'project' => 'omnixtrack',
                'website' => 'https://omnixtrack.com',
                'featured' => true,
            ],
            [
                'name' => 'POS Barmagly',
                'name_ar' => 'POS Barmagly',
                'tagline' => 'Cloud point-of-sale for restaurants, cafes and retail — offline-ready.',
                'tagline_ar' => 'نقاط بيع سحابية للمطاعم والمقاهي والتجزئة — تعمل بدون إنترنت.',
                'category' => 'Business / POS',
                'category_ar' => 'أعمال / نقاط بيع',
                'icon' => 'fas fa-cash-register',
                'grad' => 'linear-gradient(135deg, #7c3aed, #4c1d95)',
                'store' => 'https://play.google.com/store/apps/details?id=tech.barmagly.pos',
                'shot' => 'app-barmagly-pos',
                'project' => 'barmagly-pos',
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
                'shot' => 'app-barmagly-customer',
                'project' => 'barmagly-pos',
                'website' => null,
                'featured' => false,
            ],
            [
                'name' => 'Klipp — Salon Booking',
                'name_ar' => 'Klipp — حجز الصالونات',
                'tagline' => 'Book salon and barber appointments, manage staff and services.',
                'tagline_ar' => 'حجز مواعيد الصالونات والحلاقة، وإدارة الموظفين والخدمات.',
                'category' => 'Beauty & Booking',
                'category_ar' => 'تجميل وحجوزات',
                'icon' => 'fas fa-scissors',
                'grad' => 'linear-gradient(135deg, #ec4899, #831843)',
                'store' => 'https://play.google.com/store/apps/details?id=tech.barmagly.barber',
                'shot' => 'app-klipp-salon',
                'project' => 'barmagly-salon',
                'website' => 'https://klippsalon.com',
                'featured' => false,
            ],
            [
                'name' => 'Holy Quran — Barmagly',
                'name_ar' => 'القرآن الكريم — Barmagly',
                'tagline' => 'Read and listen to the Holy Quran — ad-free, tracker-free, privacy-first.',
                'tagline_ar' => 'قراءة واستماع القرآن الكريم — بدون إعلانات ولا تتبع، يحترم الخصوصية.',
                'category' => 'Islamic',
                'category_ar' => 'إسلامي',
                'icon' => 'fas fa-book-quran',
                'grad' => 'linear-gradient(135deg, #10b981, #065f46)',
                'store' => 'https://play.google.com/store/apps/details?id=tech.barmagly.quran',
                'shot' => 'app-quran',
                'project' => 'quran-platform',
                'tech' => ['Kotlin', 'Java'],
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
                'shot' => 'app-tamem-delivery',
                'project' => 'tamem-delivery',
                'website' => 'https://deliverytamem.com',
                'featured' => false,
            ],
            [
                'name' => 'Omnixtrack Calls',
                'name_ar' => 'Omnixtrack Calls',
                'tagline' => 'Log and sync sales calls straight into your Omnixtrack CRM pipeline on the go.',
                'tagline_ar' => 'سجّل مكالمات المبيعات وزامنها مباشرة مع نظام Omnixtrack CRM من هاتفك.',
                'category' => 'Business / CRM',
                'category_ar' => 'أعمال / CRM',
                'icon' => 'fas fa-phone-volume',
                'grad' => 'linear-gradient(135deg, #0ea5e9, #1e3a8a)',
                'store' => 'https://play.google.com/store/apps/details?id=com.omnixtrack.calls',
                'shot' => 'app-omnixtrack-calls',
                'project' => 'omnixtrack',
                'website' => 'https://omnixtrack.com',
                'featured' => false,
            ],

            [
                'name' => 'Dr. Hussein Kamal Pharmacy',
                'name_ar' => 'صيدلية د/ حسين كمال',
                'tagline' => 'Arabic-first online pharmacy: 2,900+ products across 7 categories, with pharmacist consultation and 24/7 support.',
                'tagline_ar' => 'صيدلية أونلاين بالعربية أولا: أكثر من 2900 منتج في 7 أقسام، مع استشارة صيدلي ودعم على مدار الساعة.',
                'category' => 'Healthcare / Pharmacy',
                'category_ar' => 'صحة / صيدلية',
                'icon' => 'fas fa-kit-medical',
                'grad' => 'linear-gradient(135deg, #14b8a6, #0f766e)',
                'store' => 'https://play.google.com/store/apps/details?id=com.husseinkamal.pharmacy',
                'shot' => 'app-pharmacy-hussein',
                'website' => null,
                'featured' => false,
            ],        ];
    }

    private static function countryPriority(): array
    {
        return [
            'Switzerland'    => 1,
            'United Kingdom' => 2,
            'Germany'        => 3,
            'France'         => 4,
            'Turkey'         => 5,
            'UAE'            => 6,
            'Kuwait'         => 7,
            'Saudi Arabia'   => 8,
            'Egypt'          => 9,
            'Pan-Arab'       => 10,
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

    /**
     * A single project, localized, with its long-form case-study block merged in.
     * The detail route is the only caller that needs the case study, so the two
     * data sets stay in separate services and are joined here.
     */
    public static function find(string $slug): ?array
    {
        foreach (self::projects() as $p) {
            if ($p['slug'] === $slug) {
                $p = self::localize($p);
                if ($detail = ProjectDetailService::get($slug)) {
                    $p = array_merge($p, $detail);
                }
                return $p;
            }
        }
        return null;
    }

    /**
     * Up to $limit other projects to link to from a detail page: same category
     * first, then same country, then anything. Detail pages that only link back
     * to the index are a dead end for both readers and crawlers.
     */
    public static function related(string $slug, int $limit = 3): array
    {
        $current = null;
        foreach (self::projects() as $p) {
            if ($p['slug'] === $slug) { $current = $p; break; }
        }
        if (!$current) return [];

        $score = function (array $p) use ($current) {
            if ($p['category'] === $current['category']) return 0;
            if ($p['country'] === $current['country'])   return 1;
            return 2;
        };

        $pool = array_values(array_filter(self::projects(), fn ($p) => $p['slug'] !== $slug));
        usort($pool, function ($a, $b) use ($score) {
            $cmp = $score($a) - $score($b);
            if ($cmp !== 0) return $cmp;
            return (empty($a['featured']) ? 1 : 0) - (empty($b['featured']) ? 1 : 0);
        });

        return array_map([self::class, 'localize'], array_slice($pool, 0, $limit));
    }

    /**
     * The homepage strip: strongest work first, apps ahead of everything else.
     *
     * A project with a published app is the most persuasive thing to lead with —
     * it proves the work reached real users on a store, not just a URL. The Quran
     * platform is deliberately excluded despite having an app: it is a no-revenue
     * personal project and it does not belong in a commercial showcase.
     *
     * Offline projects are excluded too — the strip is built around screenshots,
     * and there is no live page left to show for those.
     */
    public static function showcase(int $limit = 12): array
    {
        $priority = self::countryPriority();

        $pool = array_values(array_filter(self::projects(), function ($p) {
            return empty($p['offline']) && ScreenshotService::has($p['slug']);
        }));

        // Excluded from the homepage strip by choice, not by rule: the Quran platform
        // is a no-revenue personal project, and the rest are builds the owner does not
        // want leading the site. They all keep their full case-study pages.
        $skip = [
            'quran-platform', 'united-aviators', 'mossodor',
            'bankelarb', 'services-researcher', 'salesman-marketing',
        ];
        $pool = array_values(array_filter($pool, fn ($p) => !in_array($p['slug'], $skip, true)));

        $tier = function (array $p): int {
            if (ProjectDetailService::hasApps($p['slug']))      return 0;
            if (!empty($p['featured']))                         return 1;
            return 2;
        };

        // usort is not stable across every PHP build, so carry the original index.
        $indexed = [];
        foreach ($pool as $i => $p) $indexed[] = [$i, $p];

        usort($indexed, function ($a, $b) use ($tier, $priority) {
            $cmp = $tier($a[1]) - $tier($b[1]);
            if ($cmp !== 0) return $cmp;
            $cmp = ($priority[$a[1]['country']] ?? 99) - ($priority[$b[1]['country']] ?? 99);
            if ($cmp !== 0) return $cmp;
            return $a[0] - $b[0];
        });

        // Apps lead, in their own order. The remaining slots go round-robin by country
        // so the strip reads as international rather than as four British sites in a
        // row — and so Saudi and UAE work actually appears, which straight priority
        // ordering pushed off the end entirely.
        $apps = [];
        $byCountry = [];
        foreach ($indexed as [$i, $p]) {
            if ($tier($p) === 0) {
                $apps[] = $p;
            } else {
                $byCountry[$p['country']][] = $p;
            }
        }

        $picked = array_slice($apps, 0, $limit);
        while (count($picked) < $limit && $byCountry) {
            foreach (array_keys($byCountry) as $country) {
                if (count($picked) >= $limit) break;
                $picked[] = array_shift($byCountry[$country]);
                if (!$byCountry[$country]) unset($byCountry[$country]);
            }
        }

        $out = [];
        foreach ($picked as $p) {
            $p['app_count'] = count(ProjectDetailService::get($p['slug'])['apps'] ?? []);
            $out[] = self::localize($p);
        }
        return $out;
    }

    /** Every project slug, in listing order — used by the sitemap. */
    public static function slugs(): array
    {
        return array_column(self::projects(), 'slug');
    }

    /**
     * Raw, unlocalized project rows. The sitemap builds both language trees in one
     * pass, so it cannot use the request locale that localize() would apply.
     */
    public static function projects_for_sitemap(): array
    {
        return self::projects();
    }

    private static function localize(array $p): array
    {
        // Keep the English category alongside the localized one: category slugs are
        // locale-independent, so a view that builds a /portfolio/category/... URL on
        // an Arabic page needs the original value, not the translated one.
        $p['category_en'] = $p['category'];
        $p['country_en']  = $p['country'];

        $isAr = function_exists('app') && app()->getLocale() === 'ar';
        if (!$isAr) return $p;
        if (!empty($p['title_ar'])) $p['title'] = $p['title_ar'];
        if (!empty($p['summary_ar'])) $p['summary'] = $p['summary_ar'];
        if (!empty($p['country_ar'])) $p['country'] = $p['country_ar'];
        $p['category'] = self::categoryToAr($p['category']);
        $p['role'] = self::roleToAr($p['role']);
        return $p;
    }

    /** Public wrapper: the sitemap translates categories outside a request locale. */
    public static function categoryToArabic(string $en): string
    {
        return self::categoryToAr($en);
    }

    private static function categoryToAr(string $en): string
    {
        return [
            'Tech / SaaS' => 'تقنية / SaaS',
            'Law Firm' => 'مكتب محاماة',
            'Education' => 'تعليم',
            'E-commerce' => 'تجارة إلكترونية',
            'Marketing' => 'تسويق',
            'Restaurant' => 'مطعم',
            'Construction' => 'مقاولات',
            'Healthcare' => 'الرعاية الصحية',
            'Hotel / Events' => 'فندقة / فعاليات',
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
     * 40 real production projects shipped by Khaled Ahmed.
     * Curated from live deployments — duplicates removed.
     */
    private static function projects(): array
    {
        return [
            [
                'slug' => 'united-aviators',
                'title' => 'United Aviators — Pilot Training Academy',
                'summary' => 'Aviation training academy website with course catalog, student admissions and instructor profiles. Modern presentation for prospective pilot trainees.',
                'title_ar' => 'United Aviators — أكاديمية تدريب طيارين',
                'summary_ar' => 'موقع أكاديمية تدريب طيران بكتالوج كورسات وقبول طلاب وملفات مدربين. عرض حديث للطيارين المحتملين.',
                'category' => 'Education',
                'tech' => ['WordPress', 'WooCommerce', 'PHP', 'MySQL'],
                'url' => 'https://www.unitedaviators.com',
                'image' => 'projects/united-aviators.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
                'featured' => true,
            ],
            [
                'slug' => 'skyteam-aviation',
                'title' => 'SkyTeam Aviation — Aviation Services',
                'summary' => 'Aviation services company website featuring fleet, services and contact channels for charter and training inquiries.',
                'title_ar' => 'SkyTeam Aviation — خدمات طيران',
                'summary_ar' => 'موقع شركة خدمات طيران بأسطول وخدمات وقنوات تواصل لاستفسارات الشحن والتدريب.',
                'category' => 'Education',
                'tech' => ['WordPress', 'WooCommerce', 'Elementor', 'PHP'],
                'url' => 'https://skyteamaviation.com',
                'image' => 'projects/skyteam-aviation.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],
            [
                'slug' => 'egysims',
                'title' => 'EgySims — Egyptian Flight Simulators Store',
                'summary' => 'E-commerce platform for flight simulator hardware in Egypt. Product catalog, cart, checkout and account management.',
                'title_ar' => 'EgySims — متجر محاكيات طيران مصري',
                'summary_ar' => 'منصة تجارة إلكترونية لأجهزة محاكيات الطيران في مصر. كتالوج منتجات وسلة ودفع وإدارة حسابات.',
                'category' => 'E-commerce',
                'tech' => ['WordPress', 'WooCommerce', 'PHP', 'MySQL'],
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
                'summary_ar' => 'موقع عيادة أسنان بنظرة عامة على الخدمات وملف الطبيب وحجز مواعيد أونلاين. مبني بـ Next.js لأداء سريع.',
                'category' => 'Healthcare',
                'tech' => ['Next.js', 'React', 'TypeScript', 'Tailwind CSS', 'Vercel'],
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
                'title_ar' => 'صيدلية — تطبيق ويب صيدلية أونلاين',
                'summary_ar' => 'تطبيق ويب صيدلية أونلاين عصري بتصفح منتجات وسلة وإدارة طلبات. مبني بـ Next.js ومنشور على Vercel.',
                'category' => 'Healthcare',
                'tech' => ['Next.js', 'React', 'TypeScript', 'Tailwind CSS'],
                'url' => 'https://pharmcy.vercel.app',
                'image' => 'projects/pharmacy-app.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
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
                'title_ar' => 'Barmagly — شركة برمجيات سويسرية',
                'summary_ar' => 'مؤسس ومطوّر رئيسي. أنظمة مؤسسية للويب والموبايل و POS وأتمتة الأعمال لعملاء في أوروبا والشرق الأوسط.',
                'category' => 'Tech / SaaS',
                'tech' => ['Next.js', 'TypeScript', 'Node.js', 'Laravel', 'PHP', 'PostgreSQL'],
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
                'summary_ar' => 'نظام نقاط بيع سحابي متعدد المستأجرين للمطاعم والكافيهات والتجزئة، مع مخزون وتعدد فروع وتقارير.',
                'category' => 'Tech / SaaS',
                'tech' => ['TypeScript', 'JavaScript', 'Node.js', 'MySQL', 'Stripe'],
                'url' => 'https://kassenta.com',
                'image' => 'projects/barmagly-pos.png',
                'role' => 'Lead Developer',
                'language' => 'de',
                'country' => 'Switzerland',
                'country_ar' => 'سويسرا',
                'country_flag' => '🇨🇭',
                'country_code' => 'ch',
                'featured' => true,
            ],
            [
                'slug' => 'barmagly-salon',
                'title' => 'Klipp — AI-Powered Salon Management',
                'summary' => 'SaaS platform for salons and barbershops: bookings, POS, inventory, staff scheduling, AI hair-makeover previews and analytics — all in one platform.',
                'title_ar' => 'Klipp — منصة إدارة صالونات بالذكاء الاصطناعي',
                'summary_ar' => 'منصة SaaS للصالونات ومحلات الحلاقة: حجوزات، POS، مخزون، جدولة موظفين، معاينات تسريحات بالذكاء الاصطناعي وتحليلات — كله في منصة واحدة.',
                'category' => 'Tech / SaaS',
                'tech' => ['TypeScript', 'React', 'Node.js', 'OpenAI API', 'PostgreSQL'],
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
                'title_ar' => 'Aman Law — منصة قانونية سويسرية',
                'summary_ar' => 'منصة قانونية تُدار من سويسرا تربط محامين سوريين وسويسريين بعملاء دوليين في تخصصات قانونية متعددة.',
                'category' => 'Law Firm',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Inertia.js', 'React', 'MySQL'],
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
                'title_ar' => 'Swiss Bridge Academy — منصة تعليم إلكتروني',
                'summary_ar' => 'أكاديمية تعليم إلكتروني تُدار من سويسرا تدرّس البرمجة والذكاء الاصطناعي والتصميم والتسويق والمبيعات — LMS كامل بلوحات تحكّم للطلاب.',
                'category' => 'Education',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Livewire', 'MySQL'],
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
                'title_ar' => 'Mossodor — متجر إضاءة فاخر بريطاني',
                'summary_ar' => 'متجر إلكتروني بريطاني متخصص في الثريات الفاخرة والمصابيح المعلّقه والجدارية مع توصيل مجاني.',
                'category' => 'E-commerce',
                'tech' => ['Next.js', 'React', 'TypeScript'],
                'url' => 'https://mossodor.com',
                'image' => 'projects/mossodor.jpg',
                'role' => 'Lead Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكة المتحدة',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'xappee',
                'title' => 'Xappee — E-Commerce Fulfillment Platform',
                'summary' => 'E-commerce fulfillment, sourcing, digital marketing and virtual assistant services for online sellers worldwide.',
                'title_ar' => 'Xappee — منصة تشغيل التجارة الإلكترونية',
                'summary_ar' => 'تشغيل التجارة الإلكترونية، التوريد، التسويق الرقمي، وخدمات المساعدين الافتراضيين للبائعين عبر الإنترنت حول العالم.',
                'category' => 'Tech / SaaS',
                'tech' => ['WordPress', 'WooCommerce', 'PHP', 'TypeScript', 'Node.js'],
                'url' => 'https://xappee.com',
                'image' => 'projects/xappee.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكة المتحدة',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'ant-assist',
                'title' => 'Ant Assist — UK Virtual Assistant Agency',
                'summary' => 'UK virtual assistant agency providing offshore admin and marketing support staff to UK businesses and entrepreneurs.',
                'title_ar' => 'Ant Assist — وكالة مساعدين افتراضيين بريطانية',
                'summary_ar' => 'وكالة مساعدين افتراضيين بريطانية بتوفّر دعم إداري وتسويقي للشركات البريطانية ورواد الأعمال.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'PHP', 'Tailwind CSS'],
                'url' => 'https://ant-assist.com',
                'image' => 'projects/ant-assist.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكة المتحدة',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'rasa-lichfield',
                'title' => 'Rasa Lichfield — Halal Pan-Asian Restaurant',
                'summary' => 'UK halal Pan-Asian restaurant inside the historic Corn Exchange, blending modern Asian cooking with reservations and online ordering.',
                'title_ar' => 'Rasa Lichfield — مطعم آسيوي حلال',
                'summary_ar' => 'مطعم بريطاني حلال للمأكولات الآسيوية داخل Corn Exchange التاريخي، بيدمج الطبخ الآسيوي العصري مع نظام الحجز والطلب أونلاين.',
                'category' => 'Restaurant',
                'tech' => ['WordPress', 'WooCommerce', 'PHP'],
                'url' => 'https://rasalichfield.co.uk',
                'image' => 'projects/rasa-lichfield.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكة المتحدة',
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
                'tech' => ['Laravel', 'PHP', 'Blade', 'Tailwind CSS', 'MySQL'],
                'url' => 'https://kingkebablepouzin.fr',
                'image' => 'projects/kingkebab.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
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
                'title_ar' => 'BN Bâtiment — شركة تسقيف فرنسية',
                'summary_ar' => 'شركة تسقيف احترافية في Lyon و Saint-Étienne و Valence تقدّم خدمات التركيب والإصلاح والطوارئ 24 ساعة.',
                'category' => 'Construction',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Inertia.js', 'React', 'MySQL'],
                'url' => 'https://bnbatiment.com',
                'image' => 'projects/bnbatiment.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
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
                'title_ar' => 'د. جم بيسال — عيادة أسنان في إسطنبول',
                'summary_ar' => 'عيادة أسنان في إسطنبول متخصصة في الزرع والقشور وطب الأسنان التجميلي — نظام حجز وصفحات مرضى متعددة اللغات.',
                'category' => 'Healthcare',
                'tech' => ['WordPress', 'WooCommerce', 'Elementor', 'PHP'],
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
                'title_ar' => 'Grand Botanical Suite — قاعة أفراح في برمنغهام',
                'summary_ar' => 'قاعة أفراح فاخرة في برمنغهام تقدّم قاعات قابلة للتخصيص وتموين وتخطيط فعاليات كامل مع نظام استفسار أونلاين.',
                'category' => 'Hotel / Events',
                'tech' => ['WordPress', 'PHP', 'MySQL'],
                'url' => 'https://grandbotanicalsuite.com',
                'image' => 'projects/grandbotanicalsuite.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكة المتحدة',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'jovero',
                'title' => 'JOVERO — Premier Marketing & Digital Growth Agency',
                'summary' => 'Engineering enterprise-grade marketing and software solutions — full agency site with case studies and lead-gen funnels.',
                'title_ar' => 'JOVERO — وكالة تسويق رقمي رائدة',
                'summary_ar' => 'هندسة حلول تسويق وبرمجيات بمستوى مؤسسي — موقع وكالة كامل بدراسات حالات وقمع جذب عملاء.',
                'category' => 'Marketing',
                'tech' => ['TypeScript', 'Node.js', 'React'],
                'url' => 'https://jovero.net',
                'image' => 'projects/jovero.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
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
                'summary_ar' => 'دليل شامل للأعمال والخدمات المحلية في محافظة قنا، مصر — مستشفيات وأطباء وفنادق ومطاعم والمزيد.',
                'category' => 'Marketing',
                'tech' => ['JavaScript', 'Node.js'],
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
                'title_ar' => 'TimeStay — حجز غرف فندقية بالساعة',
                'summary_ar' => 'منصة حجز غرف فندقية بالساعة لإقامات قصيرة من 2-12 ساعة مع توفّر وقت حقيقي وتكامل دفع.',
                'category' => 'Hotel / Events',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Vue.js', 'MySQL', 'Stripe'],
                'url' => 'https://hotel.khaledahmed.net',
                'image' => 'projects/hotel-timestay.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
                'featured' => true,
            ],
            [
                'slug' => 'syanatech',
                'title' => 'SyanaTech — Home Maintenance Marketplace',
                'summary' => 'Platform connecting clients with trusted licensed technicians for home maintenance — bookings, ratings, dispatch.',
                'title_ar' => 'SyanaTech — سوق صيانة منزلية',
                'summary_ar' => 'منصة بتربط العملاء بفنيين موثوقين مرخصين لخدمات الصيانة المنزلية — حجوزات، تقييمات، إرسال.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Livewire', 'Pusher', 'MySQL'],
                'url' => 'https://syanatech.khaledahmed.net',
                'image' => 'projects/syanatech.jpg',
                'role' => 'Full Stack Developer',
                'offline' => true,
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'salesman-marketing',
                'title' => 'Sales Man — STC Business Communication',
                'summary' => 'STC enterprise communication and connectivity solutions for Saudi businesses — service catalog, lead capture and CRM integration.',
                'title_ar' => 'سيلز مان — اتصالات أعمال STC',
                'summary_ar' => 'حلول الاتصالات والربط للأعمال السعودية من STC — كتالوج خدمات والتقاط عملاء وتكامل CRM.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'WooCommerce', 'Elementor', 'PHP'],
                'url' => 'https://salesman.marketing',
                'image' => 'projects/salesman-marketing.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'wasiila',
                'title' => 'Wasiila — Mecca Pilgrim Services Platform',
                'summary' => 'Platform serving Mecca pilgrims with water distribution and mosque-care supplies — multi-vendor marketplace.',
                'title_ar' => 'وسيلة — منصة خدمات حجاج مكه',
                'summary_ar' => 'منصة بتخدم حجاج بيت الله الحرام بتوزيع المياه ومستلزمات العناية بالمساجد — سوق متعدد البائعين.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Livewire', 'Tailwind CSS', 'MySQL'],
                'url' => 'https://wasiila.com',
                'image' => 'projects/wasiila.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'hadiah-umrah',
                'title' => 'Hadiah — Digital Umrah Service App',
                'summary' => 'Digital Umrah service app connecting pilgrims with sharia-qualified service providers — booking, payments and verification.',
                'title_ar' => 'هدية — تطبيق خدمات عمرة رقمي',
                'summary_ar' => 'تطبيق خدمات عمرة رقمي بيربط الحجاج بمزودي خدمات شرعيين مؤهلين — حجز ودفع وتحقّق.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Vue.js', 'MySQL', 'Stripe'],
                'url' => 'https://hadiah.wasiila.com',
                'image' => 'projects/hadiah-umrah.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'quran-platform',
                'title' => 'Quran Reader — Free, Ad-Free Quran Platform',
                'summary' => 'Free, ad-free and tracker-free online Quran reading and recitation platform — privacy-first design.',
                'title_ar' => 'قارئ القرآن — منصة قرآن مجانية بدون إعلانات',
                'summary_ar' => 'منصة قراءة وتلاوة القرآن مجانية بدون إعلانات وبدون تتبّع — تصميم يحترم الخصوصية أولًا.',
                'category' => 'Religious / Quran',
                'tech' => ['Kotlin', 'Java', 'Laravel', 'PHP', 'Tailwind CSS'],
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
                'title_ar' => 'Infinity Wear — علامة ملابس رياضية احترافية',
                'summary_ar' => 'مصنع سعودي للملابس الرياضية الاحترافية والزي الموحد للفرق الرياضية والمدارس والشركات — تدفقات طلبات بالجملة.',
                'category' => 'E-commerce',
                'tech' => ['Laravel', 'PHP', 'Blade', 'JavaScript', 'MySQL'],
                'url' => 'https://infinitywearsa.com',
                'image' => 'projects/infinitywearsa.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'standupstraight',
                'title' => 'Stand Up Straight — UK Posture Brand',
                'summary' => 'UK posture and back-care wellness brand — direct-to-consumer e-commerce with educational content and testimonials.',
                'title_ar' => 'Stand Up Straight — علامة عناية بالظهر بريطانية',
                'summary_ar' => 'علامة بريطانية للوقفة السليمة والعناية بالظهر — متجر مباشر للمستهلكين بمحتوى تعليمي وشهادات.',
                'category' => 'E-commerce',
                'tech' => ['WordPress', 'WooCommerce', 'Elementor', 'PHP'],
                'url' => 'https://standupstraight.co.uk',
                'image' => 'projects/standupstraight.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'en',
                'country' => 'United Kingdom',
                'country_ar' => 'المملكة المتحدة',
                'country_flag' => '🇬🇧',
                'country_code' => 'gb',
            ],
            [
                'slug' => 'gamestreet-q8',
                'title' => 'Game Street Kuwait — Gaming E-Commerce',
                'summary' => 'Kuwaiti retailer of video games, gaming consoles, accessories and PC peripherals — bilingual store with local payments.',
                'title_ar' => 'Game Street Kuwait — متجر ألعاب',
                'summary_ar' => 'متجر كويتي لألعاب الفيديو والكونسولات والإكسسوارات وأجهزة الكمبيوتر — متجر ثنائي اللغة بمدفوعات محلية.',
                'category' => 'E-commerce',
                'tech' => ['WordPress', 'WooCommerce', 'Elementor', 'PHP'],
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
                'title_ar' => 'بنك العرب — دليل مساعدات مالية عربي',
                'summary_ar' => 'دليل عربي لبرامج المساعدات المالية الفورية والخدمات الخيرية عبر الدول العربية — دليل محتوى.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'PHP', 'MySQL'],
                'url' => 'https://bankelarb.net',
                'image' => 'projects/bankelarb.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Pan-Arab',
                'country_ar' => 'الوطن العربي',
                'country_flag' => '🌍',
                'country_code' => 'arab',
            ],
            [
                'slug' => 'services-researcher',
                'title' => 'Services Researcher — Academic Consultation',
                'summary' => 'Academic research, translation and statistical analysis services for graduate students — order workflow and consultation booking.',
                'title_ar' => 'مركز الباحث — استشارات أكاديمية',
                'summary_ar' => 'خدمات بحث أكاديمي وترجمة وتحليل إحصائي لطلاب الدراسات العليا — تدفق طلبات وحجز استشارات.',
                'category' => 'Education',
                'tech' => ['Laravel', 'PHP', 'Blade'],
                'url' => 'https://servicesresearcher.com',
                'image' => 'projects/services-researcher.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'UAE',
                'country_ar' => 'الإمارات',
                'country_flag' => '🇦🇪',
                'country_code' => 'ae',
            ],
            [
                'slug' => 'lotus-sharm',
                'title' => 'Lotus Sharm — Sharm El-Sheikh Tourism Platform',
                'summary' => 'Tourism and hotel-booking platform for Sharm El-Sheikh — tour packages, transfers, hotel bookings and itinerary management with separate API backend.',
                'title_ar' => 'Lotus Sharm — منصة سياحة وحجوزات شرم الشيخ',
                'summary_ar' => 'منصة سياحة وحجوزات فنادق في شرم الشيخ — باقات سياحية ونقل وحجز فنادق وإدارة برامج رحلات مع API منفصل.',
                'category' => 'Hotel / Events',
                'tech' => ['Next.js', 'TypeScript', 'React', 'Node.js', 'Express', 'MongoDB'],
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
                'title_ar' => 'مساري — منصة تحليل المهارات الوظيفية بالذكاء الاصطناعي',
                'summary_ar' => 'منصة ذكاء اصطناعي بتقارن مهاراتك بمتطلّبات وظائف الشركات السعودية الكبرى (أرامكو، سابك، الراجحي، نيوم) وبتولّد مسار تعلّم شخصي يسدّ الفجوة.',
                'category' => 'Tech / SaaS',
                'tech' => ['Next.js', 'TypeScript', 'React', 'Node.js', 'OpenAI API', 'PostgreSQL'],
                'url' => 'https://masaary.com',
                'image' => 'projects/masaary.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'ogs-academy',
                'title' => 'OGS Academy — Certified Industrial Training',
                'summary' => 'B2B training academy delivering TVTC-certified programs to oil, gas and heavy-industry companies in Saudi Arabia — corporate training catalog with partnerships including Umm Al-Qura University.',
                'title_ar' => 'أكاديمية OGS — التدريب الصناعي المعتمد للشركات',
                'summary_ar' => 'أكاديمية تدريب صناعي معتمدة من المؤسسة العامة للتدريب التقني (TVTC) للشركات في قطاعات النفط والغاز والصناعات الثقيلة بالسعودية — كتالوج تدريب مؤسسي وشراكات مع جامعة أم القرى.',
                'category' => 'Education',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Filament', 'Alpine.js', 'MySQL'],
                'url' => 'https://ogs-academy.com',
                'image' => 'projects/ogs-academy.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'daamny',
                'title' => 'Da3many — Arabic Aid & Grants Portal',
                'summary' => 'Arabic content portal covering financial aid, grants and social support programs across Gulf and Arab countries — SEO-focused information hub.',
                'title_ar' => 'دعمى — بوابة الدعم والمنح المالية',
                'summary_ar' => 'بوابة محتوى عربية عن المنح والمساعدات المالية والدعم الاجتماعي في دول الخليج والوطن العربي — مركز معلومات مُحسّن لمحركات البحث.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'WooCommerce', 'Elementor', 'PHP'],
                'url' => 'https://d3mnakdi.com',
                'image' => 'projects/daamny.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'omnixtrack',
                'title' => 'Omnixtrack — Arabic Multi-Tenant CRM',
                'summary' => 'Made-in-Egypt multi-tenant CRM platform for Arabic-speaking businesses — lead pipelines, sales tracking, WhatsApp integration, task management, and team analytics — all in one localized platform, hosted inside Egypt.',
                'title_ar' => 'Omnixtrack — منصة CRM عربية متعددة المستأجرين',
                'summary_ar' => 'منصة CRM متعددة المستأجرين صُنعت في مصر ومُستضافة داخل مصر — إدارة العملاء المحتملين، تتبع المبيعات، تكامل الواتساب، وإدارة المهام والفرق في منصة واحدة معربة بالكامل.',
                'category' => 'Tech / SaaS',
                'tech' => ['Laravel', 'PHP', 'Vue.js', 'MySQL', 'Redis', 'WhatsApp API'],
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
                'title_ar' => 'تميم للتوصيل — منصة توصيل وشحن لصعيد مصر',
                'summary_ar' => 'منصة توصيل وشحن متكاملة تخدم الصعيد (قفط · قنا · الأقصر · أسوان · البحر الأحمر) — توصيل مطاعم وصيدليات وسوبر ماركت، شحن بين المحافظات، حلول تجار B2B، تتبع لحظي، وتطبيق موبايل مصاحب.',
                'category' => 'Tech / SaaS',
                'tech' => ['Astro', 'TypeScript', 'JavaScript', 'PHP', 'Google Maps API'],
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
                'title_ar' => 'مَعين — منصة توريد المياه والوجبات للحجاج',
                'summary_ar' => 'منصة سعودية لتوريد مياه الشرب النقية والوجبات للحجاج والمعتمرين في المشاعر المقدسة بمكة المكرمة — كتالوج خدمات وطلبات وإدارة توصيل.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Livewire', 'Tailwind CSS', 'MySQL'],
                'url' => 'https://maeyn.wasiila.com',
                'image' => 'projects/maeyn.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'taffweed',
                'title' => 'Taffweed — Umrah Packages & Booking Platform',
                'summary' => 'Saudi platform offering flexible year-round Umrah packages and pilgrim services — package catalog, online booking, payments, and itinerary management.',
                'title_ar' => 'تفويض — منصة باقات وحجوزات العمرة',
                'summary_ar' => 'منصة سعودية تقدّم باقات عمرة مرنة على مدار العام وخدمات للمعتمرين — كتالوج باقات وحجز أونلاين ومدفوعات وإدارة برامج الرحلات.',
                'category' => 'Religious / Quran',
                'tech' => ['Laravel', 'PHP', 'Blade', 'Livewire', 'MySQL', 'Stripe'],
                'url' => 'https://taffweed.wasiila.com',
                'image' => 'projects/taffweed.png',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعودية',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],
            [
                'slug' => 'interprova',
                'title' => 'Interprova — Arabic AI Interview Coach',
                'summary' => 'My own product: an AI interviewer that runs a full job interview in Arabic or English — by voice and camera, or in writing. It builds its questions from the candidate\'s CV and the job advert, then scores each answer out of 10 with a written reason behind every point. One Node process serves the marketing site, the web app, the admin dashboard and the API, and the same codebase ships the Android app on Google Play.',
                'title_ar' => 'Interprova — مدرّب مقابلات العمل بالذكاء الاصطناعي',
                'summary_ar' => 'منتجي الخاص: محاوِر ذكاء اصطناعي يدير مقابلة عمل كاملة بالعربية أو الإنجليزية، بالصوت والكاميرا أو كتابةً. يبني أسئلته من السيرة الذاتية للمرشّح ومن إعلان الوظيفة، ثم يقيّم كل إجابة بدرجة من عشرة مع سبب مكتوب لكل نقطة. عملية Node واحدة تخدم الموقع التعريفي وتطبيق الويب ولوحة الإدارة وواجهة الـ API، ونفس الكود يُنتج تطبيق أندرويد المنشور على Google Play.',
                'category' => 'Tech / SaaS',
                'tech' => ['Node.js', 'Express', 'Prisma', 'MySQL', 'React Native', 'Expo'],
                'url' => 'https://interprova.com',
                'image' => 'projects/interprova.png',
                'role' => 'Founder, Architect, Lead Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
                'featured' => true,
            ],
        ];
    }
}
