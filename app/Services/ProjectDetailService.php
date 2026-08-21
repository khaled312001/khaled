<?php

namespace App\Services;

/**
 * Long-form, bilingual case-study content for the 39 projects in PortfolioService.
 *
 * This exists as a separate service because PortfolioService is the *index*: the
 * short fields every card and listing needs. The detail pages need several
 * paragraphs per project in two languages, and mixing the two would make the
 * index array unreadable for the sake of data that only one route ever reads.
 *
 * Every stack claim behind this copy was verified against the project's GitHub
 * repository language breakdown, or — where no repository exists — against
 * framework-emitted markers on the live site. Nothing here is inferred from the
 * old portfolio listing, which was wrong about 38 of the 39 stacks.
 */
class ProjectDetailService
{
    /**
     * Localized case-study block for a slug, or null if the project has no
     * long-form content yet (the detail page degrades to the summary alone).
     */
    public static function get(string $slug): ?array
    {
        $d = self::data()[$slug] ?? null;
        if (!$d) return null;

        $isAr = function_exists('app') && app()->getLocale() === 'ar';

        return [
            'lead'     => $isAr ? $d['lead_ar']     : $d['lead'],
            'built'    => $isAr ? $d['built_ar']    : $d['built'],
            'decision' => $isAr ? $d['decision_ar'] : $d['decision'],
            'keywords' => $isAr ? $d['keywords_ar'] : $d['keywords'],
            'apps'     => array_map(
                fn ($a) => ['name' => $isAr ? $a['name_ar'] : $a['name'], 'url' => $a['url']],
                $d['apps'] ?? []
            ),
        ];
    }

    /** Did this project ship a mobile app? Read straight off the case-study data. */
    public static function hasApps(string $slug): bool
    {
        return !empty(self::data()[$slug]['apps'] ?? []);
    }

    /** Slugs that have full case-study content — used by the sitemap. */
    public static function slugs(): array
    {
        return array_keys(self::data());
    }

    public static function count(): int
    {
        return count(self::data());
    }

    private static function data(): array
    {
        return [

            'barmagly-tech' => [
                'lead' => 'I founded Barmagly and I still architect every system that leaves it. It is a Swiss-licensed software house delivering enterprise web platforms, mobile applications, POS systems and business automation to clients across Europe and the Middle East.',
                'lead_ar' => 'أسّست شركة Barmagly ولا أزال المهندس المسؤول عن معمارية كل نظام يخرج منها. هي شركة برمجيات مرخّصة في سويسرا تبني منصات ويب مؤسسية وتطبيقات جوال وأنظمة نقاط بيع وحلول أتمتة أعمال لعملاء في أوروبا والشرق الأوسط.',
                'built' => [
                    'Company-wide architecture standards every project is held to',
                    'Enterprise web platforms in Laravel and Next.js',
                    'Mobile applications shipped to Google Play',
                    'Multi-tenant POS and business automation systems',
                    'Delivery across Switzerland, Germany, the UK, Saudi Arabia, Egypt and beyond',
                ],
                'built_ar' => [
                    'معايير معمارية موحّدة تُقاس عليها كل المشاريع',
                    'منصات ويب مؤسسية بـ Laravel و Next.js',
                    'تطبيقات جوال منشورة على Google Play',
                    'أنظمة نقاط بيع متعددة المستأجرين وأتمتة عمليات',
                    'تنفيذ لعملاء في سويسرا وألمانيا وبريطانيا والسعودية ومصر وغيرها',
                ],
                'decision' => [
                    'What changed for me was the nature of the responsibility. Writing good code is one skill. Owning an architecture a client will still be running in five years — and being the person they call when it breaks at 2am — is a completely different one.',
                    'That second skill is the one nobody teaches you, and it is the one clients are actually paying for.',
                ],
                'decision_ar' => [
                    'ما تغيّر بالنسبة لي هو طبيعة المسؤولية نفسها. كتابة كود جيّد مهارة. أما امتلاك معمارية سيظل العميل يشغّلها بعد خمس سنوات، وأن تكون أنت من يتصل به حين تتعطّل في الثانية فجرًا، فهي مهارة مختلفة تمامًا.',
                    'المهارة الثانية هي التي لا يعلّمها أحد، وهي بالضبط ما يدفع العملاء مقابله.',
                ],
                'keywords' => 'swiss software house, enterprise web development company, laravel development agency, next.js development company, custom software switzerland',
                'keywords_ar' => 'شركة برمجيات سويسرية, تطوير منصات مؤسسية, شركة تطوير Laravel, برمجة أنظمة مخصصة, شركة برمجة أوروبية',
                'apps' => [],
            ],

            'barmagly-pos' => [
                'lead' => 'I built Kassenta as a cloud, multi-tenant POS for restaurants, cafés and retail. A café losing connectivity for ten minutes cannot stop serving, so offline capability could not be a feature added later — it had to sit underneath the data model from the first commit.',
                'lead_ar' => 'بنيت Kassenta كنظام نقاط بيع سحابي متعدد المستأجرين للمطاعم والمقاهي ومتاجر التجزئة. المقهى الذي ينقطع عنه الإنترنت عشر دقائق لا يستطيع التوقف عن الخدمة، لذلك لم يكن العمل دون اتصال ميزة تُضاف لاحقًا، بل أساسًا تحت نموذج البيانات منذ أول سطر.',
                'built' => [
                    'Multi-tenant backend: one codebase, isolated data per business',
                    'Staff Android app that keeps taking orders offline and reconciles on reconnect',
                    'Separate customer app for online ordering direct from the venue',
                    'Inventory tracking with multi-branch stock',
                    'Reporting across branches, Stripe billing for subscriptions',
                    'Background job queues so reporting never blocks a live sale',
                ],
                'built_ar' => [
                    'خلفية متعددة المستأجرين: قاعدة كود واحدة وبيانات معزولة لكل منشأة',
                    'تطبيق أندرويد للموظفين يواصل استقبال الطلبات دون إنترنت ويزامنها عند عودة الاتصال',
                    'تطبيق منفصل للعميل للطلب أونلاين مباشرة من المطعم',
                    'تتبّع مخزون مع إدارة فروع متعددة',
                    'تقارير موحّدة عبر الفروع، واشتراكات عبر Stripe',
                    'طوابير مهام خلفية حتى لا تُعطّل التقارير عملية بيع جارية',
                ],
                'decision' => [
                    'Multi-tenancy is the decision founders underestimate most. Whether tenants share one database or each get their own affects backups, migrations, per-customer performance and compliance — and it is close to impossible to reverse cheaply once you have 200 businesses live.',
                    'The honest answer is that neither option is universally right. It depends on how much data isolation your customers will contractually demand, and that is a business question long before it is a technical one.',
                ],
                'decision_ar' => [
                    'تعدد المستأجرين هو القرار الذي يستهين به المؤسسون أكثر من غيره. كون كل المستأجرين يتشاركون قاعدة بيانات واحدة أو يملك كل واحد قاعدته الخاصة يؤثّر في النسخ الاحتياطي والترحيلات وأداء كل عميل والامتثال، ويكاد يكون من المستحيل التراجع عنه بتكلفة معقولة بعد أن يصبح لديك 200 منشأة تعمل فعليًا.',
                    'الإجابة الصادقة أن أيًّا من الخيارين ليس صحيحًا على إطلاقه. الأمر يتوقف على حجم عزل البيانات الذي سيطلبه عملاؤك تعاقديًا، وهذا سؤال تجاري قبل أن يكون سؤالًا تقنيًا بوقت طويل.',
                ],
                'keywords' => 'cloud pos system development, multi tenant saas pos, offline first point of sale, restaurant pos software, stripe subscription billing',
                'keywords_ar' => 'تطوير نظام نقاط بيع سحابي, برنامج كاشير للمطاعم, نظام SaaS متعدد المستأجرين, نقاط بيع تعمل بدون إنترنت, برنامج نقاط بيع للمقاهي',
                'apps' => [
                    ['name' => 'Staff POS app', 'name_ar' => 'تطبيق نقاط البيع للموظفين', 'url' => 'https://play.google.com/store/apps/details?id=tech.barmagly.pos'],
                    ['name' => 'Customer ordering app', 'name_ar' => 'تطبيق الطلب للعملاء', 'url' => 'https://play.google.com/store/apps/details?id=com.barmagly.customer'],
                ],
            ],

            'barmagly-salon' => [
                'lead' => 'I built Klipp to put an AI hair-makeover preview at exactly the moment of hesitation. But a preview on its own is a demo, not a business — so it sits inside a full operations platform the salon uses all day.',
                'lead_ar' => 'بنيت Klipp لأضع معاينة تغيير الشعر بالذكاء الاصطناعي في لحظة التردد نفسها. لكن المعاينة وحدها عرض تقني لا نموذج عمل، لذلك وضعتها داخل منصة تشغيل كاملة يستخدمها الصالون طوال اليوم.',
                'built' => [
                    'AI hair-makeover previews so clients see a result before committing',
                    'Booking engine with staff scheduling and shift handling',
                    'Integrated POS for payments at the chair',
                    'Inventory tracking for products and stock',
                    'Analytics on bookings, staff utilisation and revenue',
                    'Android app for booking on the go',
                ],
                'built_ar' => [
                    'معاينة تغيير الشعر بالذكاء الاصطناعي ليرى العميل النتيجة قبل أن يقرر',
                    'محرك حجوزات مع جدولة الموظفين وإدارة الورديات',
                    'نقاط بيع مدمجة للدفع عند الكرسي مباشرة',
                    'تتبّع مخزون المنتجات والمستلزمات',
                    'تحليلات للحجوزات ومعدل استغلال الموظفين والإيرادات',
                    'تطبيق أندرويد للحجز من الجوال',
                ],
                'decision' => [
                    'The lesson I keep relearning: an AI feature is only ever as good as the boring system around it. A beautiful preview attached to a scheduler that double-books at 6pm on a Friday is worth nothing — the salon will stop using both.',
                    'So the scheduling engine got more of my time than the AI did. That is usually the right ratio, and it is almost never the one in the pitch deck.',
                ],
                'decision_ar' => [
                    'الدرس الذي أعيد تعلّمه دائمًا: ميزة الذكاء الاصطناعي لا تساوي أكثر من النظام المملّ المحيط بها. معاينة جميلة مربوطة بمُجدول يحجز موعدين في وقت واحد مساء الجمعة لا قيمة لها، لأن الصالون سيتوقف عن استخدام الاثنين معًا.',
                    'لذلك أخذ محرك الجدولة من وقتي أكثر مما أخذ الذكاء الاصطناعي. هذه هي النسبة الصحيحة عادة، وهي تقريبًا ليست أبدًا النسبة الموجودة في العرض التقديمي.',
                ],
                'keywords' => 'salon booking software, ai hair makeover app, salon management saas, barber booking system, salon pos and scheduling',
                'keywords_ar' => 'برنامج إدارة صالونات, تطبيق حجز مواعيد حلاقة, نظام حجوزات للصالونات, ذكاء اصطناعي لتجربة تسريحات, برنامج صالون تجميل',
                'apps' => [
                    ['name' => 'Booking app', 'name_ar' => 'تطبيق الحجز', 'url' => 'https://play.google.com/store/apps/details?id=tech.barmagly.barber'],
                ],
            ],

            'omnixtrack' => [
                'lead' => 'I built Omnixtrack Arabic-first: a multi-tenant CRM for Arabic-speaking businesses, hosted inside Egypt. Not an English product with an Arabic file bolted on, but a system designed right-to-left from the schema up.',
                'lead_ar' => 'بنيت Omnixtrack بالعربية أولًا: نظام إدارة علاقات عملاء متعدد المستأجرين للشركات العربية، مُستضاف داخل مصر. ليس منتجًا إنجليزيًا أُلحق به ملف ترجمة، بل نظام صُمّم من اليمين إلى اليسار ابتداءً من بنية قاعدة البيانات.',
                'built' => [
                    'Multi-tenant architecture: isolated data per business on shared infrastructure',
                    'Lead pipelines and sales tracking built for Arabic naming and workflows',
                    'WhatsApp integration, because here the deal closes on WhatsApp not email',
                    'Task management and team analytics',
                    'Android CRM app, plus a second app that logs and syncs sales calls into the pipeline',
                    'Hosted inside Egypt — a requirement for many local clients',
                ],
                'built_ar' => [
                    'معمارية متعددة المستأجرين: بيانات معزولة لكل شركة على بنية تحتية مشتركة',
                    'مسارات عملاء محتملين وتتبّع مبيعات مبنية على أسماء وسير عمل عربية',
                    'تكامل مع واتساب، لأن الصفقة هنا تُغلق على واتساب لا على البريد الإلكتروني',
                    'إدارة مهام وتحليلات لأداء الفريق',
                    'تطبيق أندرويد لإدارة العملاء، وتطبيق ثانٍ يسجّل مكالمات المبيعات ويزامنها مع المسار',
                    'استضافة داخل مصر، وهو شرط أساسي لكثير من العملاء المحليين',
                ],
                'decision' => [
                    'Right-to-left is not a stylesheet flag. It is mirrored layouts, bidirectional text inside table cells where an Arabic company name sits next to a Latin product code, number and date formatting in reports, and PDF export that does not silently reverse itself.',
                    'You either carry that through the entire build or you retrofit it badly, forever. I have been called in to do the retrofit version. Building it in from the start costs a fraction as much.',
                ],
                'decision_ar' => [
                    'الاتجاه من اليمين إلى اليسار ليس خيارًا في ملف التنسيق. هو تخطيطات معكوسة، ونصوص ثنائية الاتجاه داخل خلايا جداول يجاور فيها اسم شركة عربي رمز منتج لاتيني، وتنسيق أرقام وتواريخ في التقارير، وتصدير PDF لا ينقلب ترتيبه بصمت.',
                    'إما أن تحمل ذلك عبر البناء كله، أو تُرقّعه لاحقًا ترقيعًا سيّئًا إلى الأبد. استُدعيت لأنفّذ نسخة الترقيع أكثر من مرة، وبناؤه من البداية يكلّف جزءًا يسيرًا من ذلك.',
                ],
                'keywords' => 'arabic crm software, multi tenant crm development, whatsapp crm integration, rtl saas platform, crm hosted in egypt',
                'keywords_ar' => 'نظام إدارة علاقات عملاء عربي, برنامج CRM بالعربية, تكامل واتساب مع CRM, نظام مبيعات متعدد الفروع, برنامج متابعة عملاء',
                'apps' => [
                    ['name' => 'CRM app', 'name_ar' => 'تطبيق إدارة العملاء', 'url' => 'https://play.google.com/store/apps/details?id=com.omnixtrack.app'],
                    ['name' => 'Calls app', 'name_ar' => 'تطبيق تسجيل المكالمات', 'url' => 'https://play.google.com/store/apps/details?id=com.omnixtrack.calls'],
                ],
            ],

            'tamem-delivery' => [
                'lead' => 'I built Tamem for Upper Egypt from the first line of code — Qift, Qena, Luxor, Aswan and the Red Sea. Serving those governorates properly meant solving problems that simply do not exist in a dense capital city.',
                'lead_ar' => 'بنيت تمّم لصعيد مصر من أول سطر كود: قفط وقنا والأقصر وأسوان والبحر الأحمر. خدمة هذه المحافظات كما ينبغي تعني حلّ مشكلات لا وجود لها أصلًا في عاصمة مكتظة.',
                'built' => [
                    'Food, pharmacy and supermarket delivery in one platform',
                    'Inter-governorate shipping across Upper Egypt',
                    'B2B merchant tools so shops manage their own orders',
                    'Live order tracking through Google Maps integration',
                    'Companion mobile app serving both customers and drivers',
                    'Dispatch logic tuned for long inter-city routes, not city blocks',
                ],
                'built_ar' => [
                    'توصيل طعام وصيدليات وسوبر ماركت في منصة واحدة',
                    'شحن بين المحافظات في صعيد مصر',
                    'أدوات للتجار لإدارة طلباتهم بأنفسهم',
                    'تتبّع لحظي للطلب عبر تكامل خرائط Google',
                    'تطبيق جوال مرافق يخدم العملاء والسائقين معًا',
                    'منطق توزيع مضبوط على المسارات الطويلة بين المدن لا على شوارع داخل مدينة',
                ],
                'decision' => [
                    'The hard problems were not glamorous. Addresses in much of Upper Egypt are landmarks, not street numbers — "behind the mosque, next to the pharmacy" is a real delivery address and the system has to accept it. Drivers work on intermittent mobile data. And a route between two governorates is priced completely wrong by a generic distance API that assumes urban traffic.',
                    'Building for a region you actually understand beats building for one you have only read about in a market report.',
                ],
                'decision_ar' => [
                    'المشكلات الصعبة هنا لم تكن براقة. العناوين في معظم الصعيد معالم لا أرقام شوارع، فـ«خلف الجامع بجوار الصيدلية» عنوان توصيل حقيقي وعلى النظام أن يقبله. والسائقون يعملون على بيانات جوال متقطعة. ومسار بين محافظتين تُسعّره واجهة مسافات عامة تسعيرًا خاطئًا تمامًا لأنها تفترض زحام مدينة.',
                    'أن تبني لمنطقة تفهمها فعلًا أفضل من أن تبني لمنطقة قرأت عنها في تقرير سوق.',
                ],
                'keywords' => 'delivery platform development, last mile logistics software, multi vendor delivery app, courier dispatch system, google maps order tracking',
                'keywords_ar' => 'تطوير منصة توصيل, برنامج إدارة شحن ولوجستيات, تطبيق دليفري متعدد المتاجر, نظام توزيع طلبات للسائقين, تتبع الطلبات لحظيًا',
                'apps' => [
                    ['name' => 'Delivery app', 'name_ar' => 'تطبيق التوصيل', 'url' => 'https://play.google.com/store/apps/details?id=com.tamem.delivery'],
                ],
            ],

            'masaary' => [
                'lead' => 'I built Masaary to start from the requirements instead of from the course catalogue. It analyses the gap between a person\'s current skills and what Saudi enterprises are genuinely hiring for — Aramco, SABIC, Al Rajhi, Neom — then generates a personalised upskilling path from that measured gap.',
                'lead_ar' => 'بنيت «مسارِي» ليبدأ من المتطلبات لا من قائمة الدورات. يحلّل الفجوة بين مهارات الشخص الحالية وما تطلبه الشركات السعودية فعليًا عند التوظيف — أرامكو وسابك والراجحي ونيوم — ثم يولّد مسار تطوير مهني مخصصًا انطلاقًا من تلك الفجوة المقاسة.',
                'built' => [
                    'Skill-gap analysis against real enterprise hiring requirements',
                    'Personalised upskilling paths generated per user',
                    'Next.js front end with a TypeScript Node backend',
                    'PostgreSQL modelling of skills, roles and requirement mappings',
                    'OpenAI used for interpretation, never for inventing the underlying data',
                ],
                'built_ar' => [
                    'تحليل فجوة المهارات مقابل متطلبات توظيف حقيقية في شركات كبرى',
                    'مسارات تطوير مهني مخصصة تُولَّد لكل مستخدم',
                    'واجهة Next.js مع خلفية Node مكتوبة بـ TypeScript',
                    'نمذجة المهارات والأدوار الوظيفية وربطها بالمتطلبات في PostgreSQL',
                    'استخدام OpenAI في التفسير فقط، لا في اختلاق البيانات الأساسية',
                ],
                'decision' => [
                    'The interesting engineering here was restraint. Letting a language model free-associate a curriculum would have taken an afternoon and demoed beautifully. Grounding every single recommendation in real, current hiring requirements is slower, less impressive on stage, and the only version worth shipping.',
                    'An AI product that confidently invents a career path is worse than no product at all — because someone will follow it.',
                ],
                'decision_ar' => [
                    'الهندسة المثيرة هنا كانت في ضبط النفس. ترك نموذج لغوي يؤلّف خطة تعليمية بحرية كان سيستغرق بعد ظهيرة واحدة، وكان سيبدو رائعًا في العرض. أما إسناد كل توصية إلى متطلبات توظيف حقيقية ومحدّثة فهو أبطأ وأقل إبهارًا على المنصة، وهو النسخة الوحيدة التي تستحق الإطلاق.',
                    'منتج ذكاء اصطناعي يخترع مسارًا مهنيًا بثقة أسوأ من عدم وجود منتج أصلًا، لأن شخصًا ما سيمشي فيه.',
                ],
                'keywords' => 'ai career platform saudi arabia, skill gap analysis software, upskilling platform development, openai product development, next.js saas saudi',
                'keywords_ar' => 'منصة تطوير مهني بالذكاء الاصطناعي, تحليل فجوة المهارات, منصة تدريب وتأهيل السعودية, برمجة منصات ذكاء اصطناعي, تطوير منصات توظيف',
                'apps' => [],
            ],

            'lotus-sharm' => [
                'lead' => 'I built Lotus Sharm for Sharm El-Sheikh — tour packages, transfers, hotel bookings and itinerary management — deliberately split into a Next.js front end and a separate Node/Express API behind it.',
                'lead_ar' => 'بنيت Lotus Sharm لشرم الشيخ: باقات سياحية وانتقالات وحجوزات فنادق وإدارة برامج الرحلات، مقسومة عن قصد إلى واجهة Next.js وواجهة برمجية منفصلة على Node/Express خلفها.',
                'built' => [
                    'Tour package catalogue with availability and pricing rules',
                    'Hotel booking and airport transfer scheduling',
                    'Itinerary management that keeps a multi-day trip coherent',
                    'Separate Express API so the booking engine scales independently',
                    'MongoDB modelling for flexible package structures',
                    'Server-rendered front end for search visibility and fast first load',
                ],
                'built_ar' => [
                    'كتالوج باقات سياحية بقواعد إتاحة وتسعير',
                    'حجز فنادق وجدولة انتقالات المطار',
                    'إدارة برنامج الرحلة بحيث تبقى رحلة متعددة الأيام متماسكة',
                    'واجهة برمجية Express منفصلة ليتوسّع محرك الحجز بشكل مستقل',
                    'نمذجة MongoDB لهياكل باقات مرنة',
                    'واجهة مُصيَّرة على الخادم لظهور أفضل في البحث وتحميل أول سريع',
                ],
                'decision' => [
                    'Splitting them was the whole architectural decision. The public site has to be fast and indexable — a traveller comparing options at midnight will not wait. The booking engine has to be correct: availability, pricing rules, and itineraries that stay valid when someone changes one leg of a trip.',
                    'Speed and correctness are different jobs with different failure modes. Serving both from one monolithic layer usually gets you a site that is slow AND bookings that are wrong.',
                ],
                'decision_ar' => [
                    'الفصل بينهما كان القرار المعماري كله. الموقع العام يجب أن يكون سريعًا وقابلًا للأرشفة، فالمسافر الذي يقارن الخيارات منتصف الليل لن ينتظر. ومحرك الحجز يجب أن يكون صحيحًا: الإتاحة وقواعد التسعير وبرامج رحلات تظل صالحة حين يغيّر أحدهم جزءًا واحدًا من الرحلة.',
                    'السرعة والصحة مهمتان مختلفتان بأنماط فشل مختلفة. تقديمهما من طبقة واحدة متجانسة ينتهي غالبًا بموقع بطيء وحجوزات خاطئة في آن واحد.',
                ],
                'keywords' => 'travel booking platform development, tour operator software, hotel and transfer booking system, next.js express booking engine, sharm el sheikh tourism platform',
                'keywords_ar' => 'تطوير منصة حجوزات سياحية, برنامج إدارة رحلات ومكاتب سياحة, نظام حجز فنادق وانتقالات, منصة باقات سياحية, برمجة موقع سياحي',
                'apps' => [],
            ],

            'amanlaw' => [
                'lead' => 'I built Aman Law, a Swiss-managed platform connecting Syrian and Swiss lawyers with international clients across multiple practice areas. The clients, the lawyers and the applicable law are frequently in three different places.',
                'lead_ar' => 'بنيت Aman Law، منصة تُدار من سويسرا تربط محامين سوريين وسويسريين بعملاء دوليين عبر مجالات قانونية متعددة. العميل والمحامي والقانون الواجب التطبيق يكونون في ثلاثة أماكن مختلفة في أغلب الأحيان.',
                'built' => [
                    'Lawyer profiles organised by practice area and qualifying jurisdiction',
                    'Client intake that routes a matter to a lawyer actually qualified for it',
                    'Multilingual interface for clients arriving in different languages',
                    'Confidential-by-default permission model on every case record',
                    'Laravel with Inertia and React, so the app feels immediate without a separate SPA build',
                ],
                'built_ar' => [
                    'ملفات محامين مصنّفة حسب مجال الممارسة والاختصاص القضائي المؤهِّل',
                    'استقبال قضايا يوجّه كل قضية إلى محامٍ مؤهَّل لها فعلًا',
                    'واجهة متعددة اللغات لعملاء يصلون بلغات مختلفة',
                    'نموذج صلاحيات سرّي افتراضيًا على كل سجل قضية',
                    'Laravel مع Inertia و React ليصبح التطبيق فوري الاستجابة دون بناء تطبيق أحادي الصفحة منفصل',
                ],
                'decision' => [
                    'The hard part of legal software is never the interface. It is modelling who is permitted to see what — and being able to demonstrate that afterwards.',
                    'Most directory-style sites treat access as a display concern: hide the button. In legal work it is a data concern. If the record can be reached, it does not matter that the link was hidden. That distinction shaped the entire permission layer.',
                ],
                'decision_ar' => [
                    'الجزء الصعب في برمجيات المحاماة ليس الواجهة أبدًا، بل نمذجة من يُسمح له برؤية ماذا، والقدرة على إثبات ذلك لاحقًا.',
                    'معظم المواقع من نوع الدليل تتعامل مع الصلاحيات كمسألة عرض: أخفِ الزر. في العمل القانوني هي مسألة بيانات. إذا كان السجل قابلًا للوصول، فلا قيمة لكون الرابط مخفيًا. هذا التمييز هو ما شكّل طبقة الصلاحيات كلها.',
                ],
                'keywords' => 'legal tech platform development, law firm software, cross border legal platform, multilingual legal website, laravel inertia react application',
                'keywords_ar' => 'منصة خدمات قانونية, برمجة موقع مكتب محاماة, نظام إدارة قضايا, منصة استشارات قانونية دولية, تطوير منصات قانونية',
                'apps' => [],
            ],

            'swissbridge-academy' => [
                'lead' => 'I built Swiss Bridge Academy as a full learning platform — programming, AI, design, marketing and sales — for a Swiss-managed academy, with student dashboards throughout.',
                'lead_ar' => 'بنيت Swiss Bridge Academy كمنصة تعلّم متكاملة تغطي البرمجة والذكاء الاصطناعي والتصميم والتسويق والمبيعات، لأكاديمية تُدار من سويسرا، مع لوحات تحكم للطلاب في كل مسار.',
                'built' => [
                    'Course catalogue with modules, lessons and ordering',
                    'Enrolment and payment states, including mid-course purchases',
                    'Progress tracking that survives a browser crash or device switch',
                    'Student dashboards showing position across multiple courses',
                    'Instructor tooling for editing content without breaking live enrolments',
                    'Certificate issuance tied to genuine completion',
                ],
                'built_ar' => [
                    'كتالوج دورات بوحدات ودروس وترتيب قابل للتعديل',
                    'حالات تسجيل ودفع تشمل الشراء في منتصف الدورة',
                    'تتبّع تقدّم يصمد أمام تعطّل المتصفح أو تغيير الجهاز',
                    'لوحات تحكم للطالب تُظهر موقعه في عدة دورات معًا',
                    'أدوات للمدرّب لتعديل المحتوى دون كسر التسجيلات الجارية',
                    'إصدار شهادات مرتبط بإتمام حقيقي للدورة',
                ],
                'decision' => [
                    'The requirements that actually consume the budget: a student who pays halfway through, an instructor who reorders a module after fifty people have started it, and progress that must not evaporate when a laptop dies.',
                    'If you are scoping an LMS, the course player is maybe 20% of the work. Enrolment states, progress tracking and instructor tooling are the rest — and they decide whether the platform is still usable in month six or quietly abandoned.',
                ],
                'decision_ar' => [
                    'المتطلبات التي تلتهم الميزانية فعلًا هي: طالب يدفع في منتصف الدورة، ومدرّب يعيد ترتيب وحدة بعد أن بدأها خمسون شخصًا، وتقدّم يجب ألا يتبخّر حين يتعطّل حاسوب الطالب.',
                    'إذا كنت تحدّد نطاق منصة تعليمية، فمشغّل الدروس يمثّل نحو 20% من العمل. حالات التسجيل وتتبّع التقدّم وأدوات المدرّب هي الباقي، وهي التي تقرّر إن كانت المنصة ما تزال صالحة للاستخدام في الشهر السادس أم هُجرت بهدوء.',
                ],
                'keywords' => 'lms development, custom learning management system, online academy platform, course platform laravel livewire, e-learning software development',
                'keywords_ar' => 'تطوير منصة تعليم إلكتروني, برمجة نظام إدارة تعلم LMS, منصة دورات أونلاين, موقع أكاديمية تدريب, نظام شهادات إلكترونية',
                'apps' => [],
            ],

            'wasiila' => [
                'lead' => 'I built Wasiila to serve pilgrims in Mecca — water distribution and mosque-care supplies — as a multi-vendor marketplace where independent suppliers list and fulfil orders.',
                'lead_ar' => 'بنيت «وسيلة» لخدمة الحجاج والمعتمرين في مكة المكرمة، في توزيع المياه ومستلزمات العناية بالمساجد، كسوق متعدد الموردين ينشر فيه كل مورّد مستقل عروضه وينفّذ طلباته بنفسه.',
                'built' => [
                    'Multi-vendor marketplace with independent supplier accounts',
                    'Vendor onboarding a non-technical supplier can finish without help',
                    'Catalogue and ordering for water distribution and mosque-care supplies',
                    'Order states that survive dropped connections in crowded areas',
                    'Capacity planning around calendar-driven demand spikes',
                ],
                'built_ar' => [
                    'سوق متعدد الموردين بحسابات مستقلة لكل مورّد',
                    'تسجيل مورّد يستطيع صاحب المحل غير التقني إتمامه دون مساعدة',
                    'كتالوج وطلبات لتوزيع المياه ومستلزمات العناية بالمساجد',
                    'حالات طلب تصمد أمام انقطاع الاتصال في المناطق المزدحمة',
                    'تخطيط سعة يستوعب ذروات الطلب المرتبطة بالتقويم الهجري',
                ],
                'decision' => [
                    'One requirement shaped everything: demand does not arrive evenly. It arrives in waves tied to the religious calendar. The system either holds during those windows or it fails at the exact moment it matters most, to people who travelled a very long way.',
                    'So the effort went into the parts nobody photographs — onboarding, order-state durability, and capacity that does not assume an average month. Knowing real people depend on it during Hajj changes how carefully you write the error paths.',
                ],
                'decision_ar' => [
                    'شرط واحد شكّل كل شيء: الطلب لا يأتي بانتظام، بل يأتي موجات مرتبطة بالتقويم الهجري. إما أن يصمد النظام في تلك النوافذ، أو يفشل في اللحظة التي يكون فيها أهمّ ما يكون، أمام أناس قطعوا مسافات طويلة جدًا.',
                    'لذلك ذهب الجهد إلى الأجزاء التي لا يصوّرها أحد: تسجيل الموردين، ومتانة حالات الطلب، وسعة لا تفترض شهرًا متوسطًا. معرفتك أن أشخاصًا حقيقيين يعتمدون عليه في الحج تغيّر مقدار العناية التي تكتب بها مسارات الخطأ.',
                ],
                'keywords' => 'multi vendor marketplace development, hajj and umrah services platform, supplier marketplace software, pilgrim services system, laravel marketplace saudi arabia',
                'keywords_ar' => 'منصة خدمات الحجاج والمعتمرين, تطوير سوق متعدد الموردين, برمجة منصة توريد, نظام طلبات مكة المكرمة, منصة خدمات عمرة',
                'apps' => [],
            ],

            'hadiah-umrah' => [
                'lead' => 'I built Hadiah to connect pilgrims with sharia-qualified service providers, with booking, payments and provider verification handled in a single flow.',
                'lead_ar' => 'بنيت «هدية» لربط المعتمرين بمقدّمي خدمات مؤهَّلين شرعًا، مع الحجز والدفع والتحقق من المزوّد في مسار واحد متصل.',
                'built' => [
                    'Provider verification with qualified status visible and checkable',
                    'Booking flow for services performed on a pilgrim\'s behalf',
                    'Stripe payment integration with refund and dispute paths',
                    'Vue.js front end on a Laravel backend',
                    'Provider and customer records kept clearly separated',
                ],
                'built_ar' => [
                    'توثيق المزوّدين بحيث تكون صفة التأهيل ظاهرة وقابلة للتحقق',
                    'مسار حجز للخدمات التي تُؤدّى نيابة عن المعتمر',
                    'تكامل دفع عبر Stripe مع مسارات استرداد ونزاع',
                    'واجهة Vue.js فوق خلفية Laravel',
                    'فصل واضح بين سجلات المزوّدين وسجلات العملاء',
                ],
                'decision' => [
                    'Verification was the design centre, not a feature added at the end. A marketplace where anyone can list is easy to build and worthless in this category — the entire value is the vetting. So qualified status had to be visible in the interface, checkable by the user, and impossible to fake.',
                    'Payments carry the same weight. Taking money for a service performed hundreds of kilometres away means the refund and dispute paths deserved more design attention than the happy path did.',
                ],
                'decision_ar' => [
                    'كان التوثيق مركز التصميم لا ميزة أُضيفت في النهاية. سوق يستطيع أي أحد أن يُدرج فيه نفسه سهل البناء وعديم القيمة في هذا المجال، لأن القيمة كلها في التدقيق. لذلك وجب أن تكون صفة التأهيل ظاهرة في الواجهة، وقابلة للتحقق من المستخدم، ويستحيل تزويرها.',
                    'المدفوعات تحمل الوزن نفسه. أخذ المال مقابل خدمة تُؤدّى على بعد مئات الكيلومترات يعني أن مسارات الاسترداد والنزاع تستحق عناية تصميمية أكبر مما يستحقه المسار الناجح.',
                ],
                'keywords' => 'umrah services platform, verified provider marketplace, religious services booking system, stripe marketplace payments, laravel vue booking platform',
                'keywords_ar' => 'منصة خدمات العمرة, حجز خدمات دينية موثقة, توثيق مقدمي خدمات, نظام حجز ودفع إلكتروني, تطوير منصات عمرة وحج',
                'apps' => [],
            ],

            'taffweed' => [
                'lead' => 'I built Taffweed for flexible year-round Umrah packages and pilgrim services — catalogue, online booking, payments and itinerary management.',
                'lead_ar' => 'بنيت «تفويد» لباقات عمرة مرنة على مدار السنة وخدمات المعتمرين: كتالوج وحجز أونلاين ومدفوعات وإدارة برنامج الرحلة.',
                'built' => [
                    'Package catalogue with dated, interdependent components',
                    'Year-round flexible scheduling rather than fixed departures',
                    'Online booking with Stripe payment handling',
                    'Itinerary management across the length of a trip',
                    'Livewire interfaces so complex forms stay responsive without a separate SPA',
                ],
                'built_ar' => [
                    'كتالوج باقات بمكوّنات مؤرَّخة ومترابطة',
                    'جدولة مرنة على مدار السنة بدل مواعيد مغادرة ثابتة',
                    'حجز أونلاين مع معالجة مدفوعات عبر Stripe',
                    'إدارة برنامج الرحلة على امتداد مدتها',
                    'واجهات Livewire لتبقى النماذج المعقّدة سريعة الاستجابة دون تطبيق أحادي الصفحة منفصل',
                ],
                'decision' => [
                    'The complexity lives entirely in the package model. A package is not a product with a price — it is a bundle of dated components where changing one shifts the others. Move the arrival date and accommodation, transfers and scheduled services all have to follow.',
                    'Model it as a simple catalogue item because that ships fastest, and you will spend the next year patching edge cases that all trace back to the same wrong assumption.',
                ],
                'decision_ar' => [
                    'التعقيد كله يسكن في نموذج الباقة. الباقة ليست منتجًا له سعر، بل حزمة من مكوّنات مؤرَّخة يؤدي تغيير أحدها إلى تحريك البقية. حرّك تاريخ الوصول، وسيتبعه السكن والانتقالات والخدمات المجدولة كلها.',
                    'نمذجها كصنف بسيط في كتالوج لأن ذلك أسرع إطلاقًا، وستقضي السنة التالية ترقّع حالات حدّية ترجع كلها إلى الافتراض الخاطئ نفسه.',
                ],
                'keywords' => 'umrah package booking system, travel package software, pilgrimage booking platform, laravel livewire booking, itinerary management software',
                'keywords_ar' => 'نظام حجز باقات عمرة, برنامج إدارة مكاتب عمرة, منصة حجز رحلات دينية, برمجة نظام باقات سياحية, إدارة برامج الرحلات',
                'apps' => [],
            ],

            'maeyn' => [
                'lead' => 'I built Maeyn as a service catalogue, ordering system and delivery management platform for purified water and meals supplied to pilgrims in Mecca.',
                'lead_ar' => 'بنيت «معين» ككتالوج خدمات ونظام طلبات ومنصة إدارة توصيل للمياه النقية والوجبات المقدَّمة للحجاج والمعتمرين في مكة المكرمة.',
                'built' => [
                    'Service catalogue for water and meal supply',
                    'Ordering with scheduled delivery windows rather than open-ended shipping',
                    'Delivery management and dispatch coordination',
                    'Livewire interfaces for operations staff working at speed',
                    'Order states designed around time-critical fulfilment',
                ],
                'built_ar' => [
                    'كتالوج خدمات لتوريد المياه والوجبات',
                    'طلبات بنوافذ توصيل مجدولة بدل شحن مفتوح المدة',
                    'إدارة التوصيل وتنسيق التوزيع',
                    'واجهات Livewire لموظفي التشغيل الذين يعملون بسرعة',
                    'حالات طلب مصمّمة حول تنفيذ حرِج زمنيًا',
                ],
                'decision' => [
                    'The difference from a normal store is that the delivery window is not a convenience — it is the product. An order arriving an hour late has failed completely, no matter how smooth the checkout was.',
                    'So the entire system is organised around scheduling and dispatch rather than around a cart. That inversion changes the data model, the admin interface and what you choose to show the customer.',
                ],
                'decision_ar' => [
                    'الفرق عن متجر عادي أن نافذة التوصيل ليست وسيلة راحة، بل هي المنتج نفسه. الطلب الذي يصل متأخرًا ساعة قد فشل تمامًا، مهما كانت عملية الدفع سلسة.',
                    'لذلك نُظّم النظام كله حول الجدولة والتوزيع لا حول سلة الشراء. هذا القلب يغيّر نموذج البيانات وواجهة الإدارة وما تختار عرضه على العميل.',
                ],
                'keywords' => 'delivery scheduling software, catering supply platform, water distribution management system, time critical fulfilment software, laravel operations platform',
                'keywords_ar' => 'نظام إدارة توصيل مجدول, منصة توريد مياه ووجبات, برنامج إدارة عمليات التوصيل, نظام طلبات للمعتمرين, برمجة نظام تشغيل ميداني',
                'apps' => [],
            ],

            'ogs-academy' => [
                'lead' => 'I built OGS Academy to deliver TVTC-certified training programmes to oil, gas and heavy-industry companies in Saudi Arabia, including partnerships with Umm Al-Qura University.',
                'lead_ar' => 'بنيت أكاديمية OGS لتقديم برامج تدريبية معتمدة من المؤسسة العامة للتدريب التقني والمهني لشركات النفط والغاز والصناعات الثقيلة في السعودية، بما في ذلك شراكات مع جامعة أم القرى.',
                'built' => [
                    'Corporate training catalogue organised for comparison, not impulse',
                    'Accreditation and certification details surfaced on every programme',
                    'Enquiry flow producing something a manager can forward internally',
                    'Partnership and credential presentation',
                    'Filament admin so the client updates the catalogue without a developer',
                ],
                'built_ar' => [
                    'كتالوج تدريب مؤسسي منظّم للمقارنة لا للشراء الاندفاعي',
                    'تفاصيل الاعتماد والشهادات ظاهرة على كل برنامج',
                    'مسار استفسار يُنتج مستندًا يستطيع المدير تمريره داخليًا',
                    'عرض الشراكات والاعتمادات بشكل واضح',
                    'لوحة إدارة Filament ليحدّث العميل الكتالوج دون الحاجة إلى مبرمج',
                ],
                'decision' => [
                    'The corporate buyer changes the whole design. A training manager is not adding to cart — they are assembling a proposal for a procurement committee, comparing accreditation between providers, and needing a document they can send to someone who will never visit the site.',
                    'So the catalogue is built around enquiry and evidence rather than checkout. And the admin side got equal attention, because a corporate catalogue only a developer can update is a catalogue that goes stale within three months.',
                ],
                'decision_ar' => [
                    'المشتري المؤسسي يغيّر التصميم كله. مدير التدريب لا يضيف إلى سلة شراء، بل يجمّع عرضًا للجنة مشتريات، ويقارن اعتمادات المزوّدين، ويحتاج مستندًا يرسله إلى شخص لن يزور الموقع أبدًا.',
                    'لذلك بُني الكتالوج حول الاستفسار والإثبات لا حول الدفع. ونالت لوحة الإدارة العناية نفسها، لأن كتالوجًا مؤسسيًا لا يستطيع تحديثه إلا مبرمج هو كتالوج سيصبح قديمًا خلال ثلاثة أشهر.',
                ],
                'keywords' => 'corporate training platform, tvtc accredited training website, b2b training catalogue software, industrial training portal saudi arabia, filament admin laravel',
                'keywords_ar' => 'منصة تدريب مؤسسي, موقع أكاديمية تدريب معتمدة, برامج تدريب النفط والغاز, تطوير بوابة تدريب للشركات, منصة تدريب تقني ومهني',
                'apps' => [],
            ],

            'syanatech' => [
                'lead' => 'I built SyanaTech to connect clients with licensed technicians — bookings, ratings and real-time dispatch, with Pusher driving live updates so neither side is left refreshing a page.',
                'lead_ar' => 'بنيت «صيانتك» لربط العملاء بفنيين مرخّصين: حجوزات وتقييمات وتوزيع فوري للطلبات، مع Pusher لتحديثات لحظية حتى لا يضطر أي طرف إلى إعادة تحميل الصفحة.',
                'built' => [
                    'Two-sided marketplace: client booking and technician dispatch',
                    'Real-time updates over Pusher for booking and job status',
                    'Technician licensing and verification records',
                    'Ratings feeding back into dispatch priority',
                    'Job lifecycle from request through completion',
                ],
                'built_ar' => [
                    'سوق ثنائي الجانب: حجز من العميل وتوزيع على الفنيين',
                    'تحديثات لحظية عبر Pusher لحالة الحجز وحالة المهمة',
                    'سجلات تراخيص الفنيين والتحقق منها',
                    'تقييمات تعود لتؤثر في أولوية التوزيع',
                    'دورة حياة كاملة للمهمة من الطلب حتى الإنجاز',
                ],
                'decision' => [
                    'Two-sided marketplaces are deceptively hard because you are building two products with opposing incentives and launching them simultaneously. The client wants the cheapest fast option; the technician wants the most profitable nearby job. Dispatch has to satisfy both or one side leaves.',
                    'And whichever side has fewer users decides whether the whole thing works. You can have a thousand clients and still have a dead marketplace.',
                ],
                'decision_ar' => [
                    'الأسواق ثنائية الجانب أصعب مما تبدو، لأنك تبني منتجين بحوافز متعارضة وتطلقهما في وقت واحد. العميل يريد الخيار الأسرع والأرخص، والفني يريد المهمة الأعلى ربحًا والأقرب مسافة. على نظام التوزيع أن يُرضي الطرفين وإلا انسحب أحدهما.',
                    'والجانب الأقل عددًا هو الذي يقرّر إن كان المشروع كله ناجحًا. قد يكون لديك ألف عميل ويبقى السوق ميتًا.',
                ],
                'keywords' => 'home maintenance marketplace, on demand services platform, technician dispatch software, two sided marketplace development, real time booking pusher laravel',
                'keywords_ar' => 'منصة صيانة منزلية, تطبيق طلب فنيين, نظام توزيع مهام فورية, تطوير سوق خدمات إلكتروني, برنامج حجز خدمات منزلية',
                'apps' => [],
            ],

            'hotel-timestay' => [
                'lead' => 'I built TimeStay for hotel stays of 2 to 12 hours, with real-time availability and integrated payments — the same domain as nightly hotel booking, and almost none of the same code.',
                'lead_ar' => 'بنيت TimeStay لحجوزات فندقية تتراوح بين ساعتين و12 ساعة، بإتاحة لحظية ومدفوعات مدمجة. المجال نفسه الذي يعمل فيه الحجز الفندقي بالليلة، وتقريبًا لا شيء من الكود نفسه.',
                'built' => [
                    'Hourly availability with overlapping-slot detection',
                    'Turnaround buffers between guests built into availability',
                    'Block-based pricing rather than nightly rates',
                    'Real-time availability updates during booking',
                    'Stripe payment integration',
                ],
                'built_ar' => [
                    'إتاحة بالساعة مع كشف تداخل الفترات',
                    'فترات تجهيز بين نزيل وآخر مدمجة داخل حساب الإتاحة',
                    'تسعير بالكتل الزمنية بدل الأسعار الليلية',
                    'تحديث لحظي للإتاحة أثناء عملية الحجز',
                    'تكامل مدفوعات عبر Stripe',
                ],
                'decision' => [
                    'Hourly booking turns a simple date-range comparison into a genuine scheduling problem. You are no longer asking "is this room free on the 14th" — you are asking whether a three-hour block starting at 14:30 fits between two existing bookings with cleaning time on either side.',
                    'That single change invalidates most of what a standard booking library gives you for free.',
                ],
                'decision_ar' => [
                    'الحجز بالساعة يحوّل مقارنة بسيطة بين تواريخ إلى مسألة جدولة حقيقية. لم يعد السؤال «هل هذه الغرفة شاغرة يوم 14»، بل هل تتّسع كتلة من ثلاث ساعات تبدأ 14:30 بين حجزين قائمين مع وقت تنظيف على الجانبين.',
                    'هذا التغيير وحده يُبطل معظم ما تمنحك إياه مكتبة حجز جاهزة مجانًا.',
                ],
                'keywords' => 'hourly hotel booking system, day use hotel software, time slot booking engine, hotel reservation system development, laravel booking availability engine',
                'keywords_ar' => 'نظام حجز فنادق بالساعة, برنامج حجوزات فندقية, محرك حجز بالفترات الزمنية, تطوير نظام حجز غرف, برمجة موقع فندق',
                'apps' => [],
            ],

            'qinawy' => [
                'lead' => 'I built Qinawy as a comprehensive directory for Qena governorate in Egypt — hospitals, doctors, hotels, restaurants and local services in one searchable place.',
                'lead_ar' => 'بنيت «قناوي» كدليل شامل لمحافظة قنا في مصر: مستشفيات وأطباء وفنادق ومطاعم وخدمات محلية في مكان واحد قابل للبحث.',
                'built' => [
                    'Categorised listings across healthcare, hospitality and services',
                    'A custom admin so non-developers maintain hundreds of listings',
                    'Caching throughout to keep a data-heavy directory fast on mobile',
                    'Search and filtering across categories',
                    'Structure built for local search visibility',
                ],
                'built_ar' => [
                    'قوائم مصنّفة تشمل الرعاية الصحية والضيافة والخدمات',
                    'لوحة إدارة مخصصة ليحافظ غير المبرمجين على دقة مئات المدخلات',
                    'تخزين مؤقت في كل الطبقات ليبقى دليل ثقيل البيانات سريعًا على الجوال',
                    'بحث وتصفية عبر التصنيفات',
                    'بنية مصمّمة للظهور في البحث المحلي',
                ],
                'decision' => [
                    'The real build was the admin side, not the public one. Tooling that lets a non-technical editor keep hundreds of listings accurate is what determines whether the directory is still worth visiting in a year.',
                    'Nobody ever praises a directory for being up to date. They just quietly stop using it when it is not — and by then you have lost them permanently.',
                ],
                'decision_ar' => [
                    'العمل الحقيقي كان في جانب الإدارة لا في الواجهة العامة. الأدوات التي تمكّن محرّرًا غير تقني من إبقاء مئات المدخلات دقيقة هي التي تقرّر إن كان الدليل ما يزال يستحق الزيارة بعد سنة.',
                    'لا أحد يمدح دليلًا لأنه محدَّث، لكنهم يتوقفون بهدوء عن استخدامه حين لا يكون كذلك، وتكون قد خسرتهم نهائيًا.',
                ],
                'keywords' => 'local business directory development, city directory website, listings platform with admin, local seo directory, node.js directory application',
                'keywords_ar' => 'تطوير دليل خدمات محلي, موقع دليل مدينة, منصة قوائم وأدلة, برمجة موقع دليل تجاري, سيو محلي للأدلة',
                'apps' => [],
            ],

            'salesman-marketing' => [
                'lead' => 'I built Sales Man to present STC enterprise communication and connectivity solutions to Saudi businesses, with a service catalogue, lead capture and CRM integration.',
                'lead_ar' => 'بنيت «سيلز مان» لعرض حلول الاتصالات والربط المؤسسي من STC على الشركات السعودية، مع كتالوج خدمات ونماذج التقاط عملاء محتملين وتكامل مع نظام إدارة العلاقات.',
                'built' => [
                    'Service catalogue for enterprise connectivity products',
                    'Qualification-focused lead capture forms',
                    'Direct CRM integration so leads arrive complete, not partial',
                    'WordPress build the client\'s marketing team controls directly',
                    'Structure aimed at business buyers rather than consumers',
                ],
                'built_ar' => [
                    'كتالوج خدمات لمنتجات الاتصال المؤسسي',
                    'نماذج التقاط عملاء مركّزة على التأهيل لا على العدد',
                    'تكامل مباشر مع نظام إدارة العلاقات لتصل البيانات كاملة لا ناقصة',
                    'بناء على ووردبريس يتحكم به فريق التسويق لدى العميل مباشرة',
                    'بنية موجّهة لمشترٍ مؤسسي لا لمستهلك فرد',
                ],
                'decision' => [
                    'The design job was resisting the urge to make it a store. The site has exactly one measurable task: qualify a business visitor and deliver a clean, complete lead into the CRM. Anything that did not serve that came out.',
                    'A half-filled lead form is worse than no lead — it costs a salesperson a call to discover the enquiry was never serious.',
                ],
                'decision_ar' => [
                    'مهمة التصميم كانت مقاومة الرغبة في تحويله إلى متجر. للموقع مهمة واحدة قابلة للقياس: تأهيل زائر مؤسسي وتسليم عميل محتمل كامل ونظيف إلى نظام إدارة العلاقات. وكل ما لا يخدم ذلك حُذف.',
                    'نموذج عميل محتمل نصف ممتلئ أسوأ من لا شيء، لأنه يكلّف مندوب المبيعات مكالمة كاملة ليكتشف أن الاستفسار لم يكن جادًا أصلًا.',
                ],
                'keywords' => 'b2b lead generation website, enterprise connectivity services site, crm integrated wordpress, saudi business website development, telecom services website',
                'keywords_ar' => 'موقع خدمات اتصالات للشركات, تصميم موقع لتوليد العملاء, ربط الموقع بنظام CRM, تطوير مواقع الشركات السعودية, موقع حلول مؤسسية',
                'apps' => [],
            ],

            'xappee' => [
                'lead' => 'I built Xappee — a UK platform offering e-commerce fulfilment, sourcing, digital marketing and virtual assistant services to online sellers worldwide — on WordPress and WooCommerce, with custom plugins wherever the standard behaviour was not enough.',
                'lead_ar' => 'بنيت Xappee، وهي منصة بريطانية تقدّم خدمات تنفيذ الطلبات والتوريد والتسويق الرقمي والمساعدة الافتراضية للبائعين أونلاين حول العالم، على ووردبريس وووكومرس، مع إضافات مخصصة في كل موضع لم يكفِ فيه السلوك الافتراضي.',
                'built' => [
                    'Service presentation across fulfilment, sourcing and marketing',
                    'WooCommerce configured for a service business rather than retail',
                    'Custom plugins for the behaviour no existing plugin covered properly',
                    'Client-editable content across the whole site',
                    'PHP work kept in version-controlled custom code, not theme hacks',
                ],
                'built_ar' => [
                    'عرض للخدمات يغطي تنفيذ الطلبات والتوريد والتسويق',
                    'تهيئة ووكومرس لنشاط خدمي لا لتجارة تجزئة',
                    'إضافات مخصصة للسلوك الذي لم تغطّه أي إضافة جاهزة بشكل سليم',
                    'محتوى قابل للتحرير من العميل في كل أنحاء الموقع',
                    'كود PHP مخصص تحت إدارة إصدارات، لا تعديلات مباشرة على القالب',
                ],
                'decision' => [
                    'The right question is never "is this stack impressive". It is "will the client still be able to run this in two years without me".',
                    'Here the answer was WordPress. The team publishes and updates without touching code, and the parts that genuinely needed engineering got custom-built instead of forced through a plugin that almost fits. Choosing the boring stack deliberately is a senior decision, not a junior one — the junior move is choosing the exciting stack and leaving the client stranded.',
                ],
                'decision_ar' => [
                    'السؤال الصحيح ليس أبدًا «هل هذه التقنية مبهرة»، بل «هل سيظل العميل قادرًا على تشغيل هذا بعد سنتين من دوني».',
                    'هنا كانت الإجابة ووردبريس. الفريق ينشر ويحدّث دون لمس الكود، والأجزاء التي احتاجت هندسة فعلية بُنيت خصيصًا بدل حشرها في إضافة تكاد تناسب. اختيار التقنية المملّة عن قصد قرار خبرة لا قرار مبتدئ، فالمبتدئ هو من يختار التقنية المثيرة ويترك العميل عالقًا.',
                ],
                'keywords' => 'ecommerce fulfilment website, sourcing and va agency site, woocommerce for service business, custom wordpress plugin development, uk ecommerce platform',
                'keywords_ar' => 'موقع خدمات تنفيذ طلبات, منصة توريد وتجارة إلكترونية, تطوير إضافات ووردبريس مخصصة, تهيئة ووكومرس للخدمات, موقع وكالة خدمات بريطانية',
                'apps' => [],
            ],

            'mossodor' => [
                'lead' => 'I built Mossodor — a UK retailer of premium chandeliers, pendant lighting and wall sconces — on Next.js with a fully custom front end rather than a themed template.',
                'lead_ar' => 'بنيت Mossodor، متجر بريطاني للثريات الفاخرة ووحدات الإضاءة المعلّقة والإنارة الجدارية، على Next.js بواجهة مخصصة بالكامل بدل قالب جاهز.',
                'built' => [
                    'Custom Next.js storefront built around high-consideration purchases',
                    'Product photography presentation that holds up at full zoom',
                    'Detailed specifications surfaced before the customer has to ask',
                    'Product pages designed for repeat visits over days, not one session',
                    'Delivery and returns information positioned to remove hesitation',
                ],
                'built_ar' => [
                    'واجهة متجر مخصصة بـ Next.js مبنية حول عمليات شراء عالية التفكير',
                    'عرض تصوير المنتجات بجودة تصمد عند التكبير الكامل',
                    'مواصفات تفصيلية معروضة قبل أن يضطر العميل إلى السؤال',
                    'صفحات منتج مصمّمة لزيارات متكررة على مدى أيام لا لجلسة واحدة',
                    'معلومات الشحن والإرجاع موضوعة في مكان يزيل التردد',
                ],
                'decision' => [
                    'At this price point nobody impulse-buys. They return three or four times over a fortnight, often on different devices, before committing. So the work went into what survives that consideration period: imagery that rewards zooming, specifications that answer the unasked question, and a page that respects someone spending real money on an object they cannot touch.',
                    'Conversion at the high end is not a louder call-to-action. It is the systematic removal of doubt.',
                ],
                'decision_ar' => [
                    'عند هذا المستوى السعري لا أحد يشتري باندفاع. العميل يعود ثلاث أو أربع مرات خلال أسبوعين، غالبًا من أجهزة مختلفة، قبل أن يقرر. لذلك ذهب العمل إلى ما يصمد خلال فترة التفكير تلك: صور تكافئ من يكبّرها، ومواصفات تجيب عن السؤال غير المطروح، وصفحة تحترم شخصًا ينفق مالًا حقيقيًا على شيء لا يستطيع لمسه.',
                    'التحويل في الفئة الفاخرة ليس نداءً أعلى صوتًا للشراء، بل إزالة منهجية للشك.',
                ],
                'keywords' => 'luxury ecommerce development, next.js storefront, premium lighting online store, high consideration ecommerce ux, headless commerce uk',
                'keywords_ar' => 'تطوير متجر إلكتروني فاخر, برمجة متجر Next.js, متجر إضاءة وثريات, تصميم صفحات منتجات احترافية, تجارة إلكترونية للمنتجات الفاخرة',
                'apps' => [],
            ],

            'standupstraight' => [
                'lead' => 'I built Stand Up Straight, a UK posture and back-care brand, as a WordPress and WooCommerce store where educational content and testimonials sit inside the buying path rather than in a blog nobody reaches.',
                'lead_ar' => 'بنيت Stand Up Straight، وهي علامة بريطانية للعناية بالقوام وصحة الظهر، كمتجر على ووردبريس وووكومرس يوضع فيه المحتوى التوعوي وآراء العملاء داخل مسار الشراء نفسه لا في مدونة لا يصلها أحد.',
                'built' => [
                    'Custom WordPress theme with content woven into product pages',
                    'Educational sections positioned before the purchase decision',
                    'Testimonial presentation integrated rather than siloed',
                    'Direct-to-consumer checkout flow',
                    'Mobile-first layout, since most traffic in this category arrives on a phone',
                ],
                'built_ar' => [
                    'قالب ووردبريس مخصص بمحتوى منسوج داخل صفحات المنتجات',
                    'أقسام توعوية موضوعة قبل لحظة قرار الشراء',
                    'عرض آراء العملاء مدمجًا لا معزولًا في صفحة منفصلة',
                    'مسار شراء مباشر من العلامة إلى المستهلك',
                    'تصميم يبدأ من الجوال، لأن معظم زوار هذا المجال يأتون من الهاتف',
                ],
                'decision' => [
                    'That structure is the entire design. A product page on its own converts the visitor who already decided — and in wellness, almost nobody has. The content has to do the convincing before the cart ever appears.',
                    'Putting that content in a separate blog is the standard mistake. It measures well in traffic reports and converts nothing, because the people who need it never navigate there.',
                ],
                'decision_ar' => [
                    'هذه البنية هي التصميم كله. صفحة المنتج وحدها تحوّل الزائر الذي حسم قراره سلفًا، وفي مجال الصحة والعافية لا أحد تقريبًا قد حسمه. المحتوى هو ما يجب أن يُقنع قبل أن تظهر السلة أصلًا.',
                    'وضع ذلك المحتوى في مدونة منفصلة هو الخطأ المعتاد. يبدو جيدًا في تقارير الزيارات ولا يحوّل شيئًا، لأن من يحتاجه لا يصل إليه أبدًا.',
                ],
                'keywords' => 'direct to consumer store development, wellness ecommerce website, woocommerce custom theme, content led ecommerce, uk dtc brand website',
                'keywords_ar' => 'متجر إلكتروني للعلامات التجارية, تطوير متجر ووكومرس, تصميم متجر منتجات صحية, دمج المحتوى بمسار الشراء, قالب ووردبريس مخصص',
                'apps' => [],
            ],

            'gamestreet-q8' => [
                'lead' => 'I built Game Street, a Kuwaiti retailer of video games, consoles, accessories and PC peripherals, as a genuinely bilingual store with local payment methods.',
                'lead_ar' => 'بنيت Game Street، متجر كويتي لألعاب الفيديو والأجهزة والملحقات وطرفيات الحاسب، كمتجر ثنائي اللغة فعليًا مع وسائل دفع محلية.',
                'built' => [
                    'Full Arabic and English storefronts, not a partial translation',
                    'Right-to-left layout with mirrored grid, filters and cart',
                    'Mixed-script product titles handled without breaking text direction',
                    'Local Kuwaiti payment methods integrated',
                    'Prices, stock counts and dates rendering correctly in both directions',
                ],
                'built_ar' => [
                    'واجهتا متجر كاملتان بالعربية والإنجليزية، لا ترجمة جزئية',
                    'تخطيط من اليمين إلى اليسار بشبكة ومرشّحات وسلة معكوسة بالكامل',
                    'أسماء منتجات مختلطة الحروف تُعرض دون كسر اتجاه النص',
                    'وسائل دفع كويتية محلية مدمجة',
                    'أسعار وكميات وتواريخ تُعرض بشكل صحيح في الاتجاهين',
                ],
                'decision' => [
                    'The hard parts only appear in production. Product names mixing Arabic and Latin script in a single line break text direction in ways that look fine in a mockup. A right-to-left layout means the grid, the filters, the cart and the checkout progress indicator all have to mirror — and any one of them getting it wrong makes the whole store feel broken.',
                    'Gulf customers abandon a checkout that feels foreign. The Arabic experience is not a nice-to-have in this market. It is the market.',
                ],
                'decision_ar' => [
                    'الأجزاء الصعبة لا تظهر إلا في بيئة التشغيل. أسماء منتجات تخلط العربية واللاتينية في سطر واحد تكسر اتجاه النص بطرق تبدو سليمة تمامًا في التصميم الأولي. والتخطيط من اليمين إلى اليسار يعني أن الشبكة والمرشّحات والسلة ومؤشّر خطوات الدفع يجب أن تنعكس كلها، وخطأ واحد في أيٍّ منها يجعل المتجر كله يبدو مكسورًا.',
                    'عميل الخليج يترك عملية دفع تبدو غريبة عنه. التجربة العربية ليست ميزة إضافية في هذا السوق، بل هي السوق نفسه.',
                ],
                'keywords' => 'bilingual ecommerce store, arabic rtl woocommerce, kuwait online store development, gaming ecommerce website, local payment gateway integration gulf',
                'keywords_ar' => 'متجر إلكتروني ثنائي اللغة, تصميم متجر عربي RTL, تطوير متاجر إلكترونية الكويت, متجر ألعاب فيديو أونلاين, ربط بوابات دفع خليجية',
                'apps' => [],
            ],

            'infinitywearsa' => [
                'lead' => 'I built Infinity Wear for a Saudi manufacturer of professional sportswear and uniforms supplying sports teams, schools and corporations — a business where a single order is a spreadsheet, not a line item.',
                'lead_ar' => 'بنيت Infinity Wear لمصنع سعودي للملابس الرياضية والزي الموحد يورّد للأندية والمدارس والشركات، وهو نشاط يكون فيه الطلب الواحد جدول بيانات كاملًا لا سطرًا في سلة.',
                'built' => [
                    'Bulk-order workflow replacing the standard single-item cart',
                    'Size breakdown entry across a full team or school',
                    'Customisation options captured per order',
                    'Quantity tiers and quote requests instead of fixed checkout',
                    'Presentation aimed at procurement rather than consumers',
                ],
                'built_ar' => [
                    'مسار طلبات بالجملة يحل محل سلة الشراء أحادية الصنف',
                    'إدخال توزيع المقاسات لفريق كامل أو مدرسة كاملة',
                    'خيارات تخصيص تُلتقط مع كل طلب',
                    'شرائح كميات وطلبات عروض أسعار بدل دفع بسعر ثابت',
                    'عرض موجّه لإدارات المشتريات لا للمستهلك الفرد',
                ],
                'decision' => [
                    'The flow is not a normal cart at all. It is size breakdowns, customisation choices, quantity tiers and a quote request — because a procurement officer ordering team kit needs a document to get approved, not a checkout confirmation email.',
                    'Forcing B2B volume through a B2C cart is one of the most common e-commerce mistakes I get called in to fix. The symptom is always the same: the client says orders come in by WhatsApp instead.',
                ],
                'decision_ar' => [
                    'المسار هنا ليس سلة شراء عادية إطلاقًا، بل توزيع مقاسات وخيارات تخصيص وشرائح كميات وطلب عرض سعر، لأن موظف المشتريات الذي يطلب أطقم فريق يحتاج مستندًا يُعتمد داخليًا لا رسالة تأكيد شراء.',
                    'إجبار طلبات الجملة على المرور عبر سلة مخصصة للمستهلك الفرد من أكثر أخطاء التجارة الإلكترونية التي أُستدعى لإصلاحها. والعَرَض دائمًا واحد: العميل يقول إن الطلبات تصله على واتساب بدلًا من الموقع.',
                ],
                'keywords' => 'b2b ecommerce development, bulk order system, uniform manufacturer website, quote request ecommerce, wholesale ordering platform saudi arabia',
                'keywords_ar' => 'نظام طلبات بالجملة, متجر إلكتروني للشركات B2B, موقع مصنع ملابس رياضية, نظام طلب عروض أسعار, تطوير متجر جملة السعودية',
                'apps' => [],
            ],

            'egysims' => [
                'lead' => 'I built EgySims, an e-commerce platform for flight simulator hardware in Egypt — a specialised category where the customer arrives already informed.',
                'lead_ar' => 'بنيت EgySims، منصة تجارة إلكترونية لأجهزة محاكاة الطيران في مصر، وهي فئة متخصصة يصل إليها العميل وهو مطّلع سلفًا.',
                'built' => [
                    'Product catalogue organised by specification and compatibility',
                    'Cart, checkout and account management',
                    'Custom WooCommerce theme suited to technical products',
                    'Compatibility information surfaced on the product page',
                    'Structure that supports a growing hardware catalogue',
                ],
                'built_ar' => [
                    'كتالوج منتجات منظّم حسب المواصفات والتوافق',
                    'سلة شراء ودفع وإدارة حسابات',
                    'قالب ووكومرس مخصص يناسب المنتجات التقنية',
                    'معلومات التوافق معروضة على صفحة المنتج نفسها',
                    'بنية تستوعب كتالوج أجهزة متنامٍ',
                ],
                'decision' => [
                    'The design decision was to lead with specifications and compatibility rather than lifestyle imagery. In a category this specialised, the fastest route to a sale is answering a precise technical question accurately — not evoking a feeling.',
                    'Enthusiast buyers reward accuracy and punish marketing language. That is a genuinely easier brief than it sounds, as long as you resist decorating it.',
                ],
                'decision_ar' => [
                    'قرار التصميم كان أن نبدأ بالمواصفات والتوافق لا بصور نمط الحياة. في فئة بهذا التخصص، أسرع طريق إلى البيع هو الإجابة الدقيقة عن سؤال تقني محدد، لا إثارة شعور.',
                    'المشتري الهاوي يكافئ الدقة ويعاقب لغة التسويق. وهذا مطلب أسهل مما يبدو، بشرط أن تقاوم رغبة تزيينه.',
                ],
                'keywords' => 'niche ecommerce development, technical product store, woocommerce custom theme egypt, flight simulator hardware store, specification led product pages',
                'keywords_ar' => 'متجر إلكتروني متخصص, تطوير متجر منتجات تقنية, متجر أجهزة محاكاة طيران, تصميم صفحات منتجات بالمواصفات, برمجة متجر ووكومرس مصر',
                'apps' => [],
            ],

            'quran-platform' => [
                'lead' => 'A Quran reading and recitation platform with no advertising, no trackers, and no analytics on what any individual reads — available on the web and as a native Android app. It is the only project in my portfolio with no business model.',
                'lead_ar' => 'منصة لقراءة القرآن الكريم والاستماع إلى تلاوته، بلا إعلانات ولا أدوات تتبّع ولا أي تحليلات على ما يقرؤه أي شخص، متاحة على الويب وكتطبيق أندرويد أصلي. وهو المشروع الوحيد في أعمالي بلا نموذج ربحي.',
                'built' => [
                    'Full Quran reading interface with recitation playback',
                    'No advertising and no third-party tracking scripts at all',
                    'No per-user reading analytics collected',
                    'A native Kotlin Android app alongside the Laravel web platform',
                    'Lightweight stack so it loads fast on poor connections',
                ],
                'built_ar' => [
                    'واجهة قراءة كاملة للمصحف مع تشغيل التلاوة',
                    'بلا إعلانات وبلا أي سكربتات تتبّع من طرف ثالث إطلاقًا',
                    'لا تُجمع أي تحليلات عن قراءة أي مستخدم',
                    'تطبيق أندرويد أصلي بلغة Kotlin إلى جانب منصة الويب بـ Laravel',
                    'حزمة تقنية خفيفة ليُحمّل بسرعة على الاتصالات الضعيفة',
                ],
                'decision' => [
                    'This is the only project where the primary engineering constraint was what I refused to add.',
                    'Every analytics package, every ad network and every convenience SDK would have made it easier to build and impossible to make the privacy claim honestly. Deciding not to include them was most of the work.',
                ],
                'decision_ar' => [
                    'هذا هو المشروع الوحيد الذي كان القيد الهندسي الأول فيه هو ما رفضت إضافته.',
                    'كل حزمة تحليلات، وكل شبكة إعلانات، وكل حزمة تطوير تسهّل العمل، كانت ستجعل البناء أسهل وتجعل ادّعاء الخصوصية غير صادق. قرار عدم إضافتها كان معظم العمل.',
                ],
                'keywords' => 'privacy first app development, quran app development, ad free islamic platform, native kotlin android app, laravel islamic web platform',
                'keywords_ar' => 'تطبيق قرآن كريم بدون إعلانات, تطوير تطبيقات إسلامية, منصة قرآن تحترم الخصوصية, تطبيق أندرويد بلغة Kotlin, برمجة موقع إسلامي',
                'apps' => [
                    ['name' => 'Android app', 'name_ar' => 'تطبيق أندرويد', 'url' => 'https://play.google.com/store/apps/details?id=tech.barmagly.quran'],
                ],
            ],

            'united-aviators' => [
                'lead' => 'I built United Aviators as an aviation training academy site presenting courses, admissions and the instructors themselves, so a prospective trainee can judge the people before they enquire.',
                'lead_ar' => 'بنيت United Aviators كموقع أكاديمية تدريب طيران يعرض الدورات وشروط القبول والمدربين أنفسهم، حتى يستطيع المتدرب المحتمل أن يحكم على الأشخاص قبل أن يرسل استفساره.',
                'built' => [
                    'Course catalogue with training programme detail',
                    'Student admissions information and enquiry route',
                    'Instructor profiles, because trainees are choosing people not curricula',
                    'Built on WordPress so the academy updates courses without a developer',
                    'Structure suited to a visitor comparing several academies at once',
                ],
                'built_ar' => [
                    'كتالوج دورات بتفاصيل كل برنامج تدريبي',
                    'معلومات القبول ومسار واضح لإرسال الاستفسار',
                    'ملفات تعريف بالمدربين، لأن المتدرب يختار أشخاصًا لا مناهج',
                    'مبني على ووردبريس لتحدّث الأكاديمية دوراتها دون مبرمج',
                    'بنية تناسب زائرًا يقارن بين عدة أكاديميات في الوقت نفسه',
                ],
                'decision' => [
                    'Instructor profiles were the part I pushed for. For a training academy, the qualification of the person teaching is the product — and most competitor sites bury it or omit it entirely.',
                    'When the purchase is high-value and trust-led, showing your people is not vanity. It is the strongest evidence you have.',
                ],
                'decision_ar' => [
                    'ملفات المدربين كانت الجزء الذي أصررت عليه. في أكاديمية تدريب، مؤهّل من يُدرّس هو المنتج نفسه، ومعظم مواقع المنافسين تدفنه أو تحذفه تمامًا.',
                    'حين يكون الشراء مرتفع القيمة وقائمًا على الثقة، فإن إظهار فريقك ليس تباهيًا، بل أقوى دليل تملكه.',
                ],
                'keywords' => 'aviation academy website, pilot training school site, education website development egypt, instructor led course catalogue, wordpress academy website',
                'keywords_ar' => 'موقع أكاديمية طيران, تصميم موقع مركز تدريب, تطوير مواقع تعليمية, موقع أكاديمية تدريب طيارين, برمجة موقع دورات',
                'apps' => [],
            ],

            'skyteam-aviation' => [
                'lead' => 'I built SkyTeam Aviation to present the fleet and services clearly, and to keep the enquiry route in front of the visitor at every stage of the site.',
                'lead_ar' => 'بنيت SkyTeam Aviation لعرض الأسطول والخدمات بوضوح، وللإبقاء على مسار الاستفسار أمام الزائر في كل مرحلة من مراحل تصفح الموقع.',
                'built' => [
                    'Fleet presentation with service detail',
                    'Charter and training service pages',
                    'Contact and enquiry routes available from every section',
                    'WordPress build the team maintains themselves',
                    'Layout organised around a single conversion goal',
                ],
                'built_ar' => [
                    'عرض الأسطول مع تفاصيل الخدمات',
                    'صفحات لخدمات الرحلات الخاصة والتدريب',
                    'مسارات تواصل واستفسار متاحة من كل قسم',
                    'بناء على ووردبريس يتولى الفريق صيانته بنفسه',
                    'تخطيط منظّم حول هدف تحويل واحد',
                ],
                'decision' => [
                    'For a services business with no online checkout, the entire site has one measurable job: turn a visitor into a conversation. Everything that does not move someone toward that is decoration, however good it looks.',
                    'That is a clarifying constraint. It makes most design arguments answerable with evidence rather than taste.',
                ],
                'decision_ar' => [
                    'في نشاط خدمي بلا عملية شراء أونلاين، للموقع كله مهمة واحدة قابلة للقياس: تحويل الزائر إلى محادثة. وكل ما لا يقرّب أحدًا من ذلك زخرفة مهما بدا جميلًا.',
                    'وهذا قيد يوضّح الرؤية، لأنه يجعل معظم الخلافات التصميمية قابلة للحسم بالدليل لا بالذوق.',
                ],
                'keywords' => 'aviation services website, charter and training company site, lead focused website design, wordpress business website, conversion oriented layout',
                'keywords_ar' => 'موقع شركة خدمات طيران, تصميم موقع شركة خدمات, موقع موجّه للاستفسارات, تطوير مواقع الشركات, تصميم موقع رحلات خاصة',
                'apps' => [],
            ],

            'grandbotanicalsuite' => [
                'lead' => 'I built Grand Botanical Suite for a premium Birmingham wedding and events venue offering customisable halls, catering and full event planning, where every page leads toward an enquiry rather than a transaction.',
                'lead_ar' => 'بنيت Grand Botanical Suite لقاعة أفراح ومناسبات فاخرة في برمنغهام تقدّم قاعات قابلة للتخصيص وخدمات ضيافة وتنظيم فعاليات كامل، حيث تقود كل صفحة إلى استفسار لا إلى عملية شراء.',
                'built' => [
                    'Hall presentation with capacity and layout options',
                    'Catering and event-planning service detail',
                    'Enquiry forms placed throughout rather than only on a contact page',
                    'Custom WordPress theme suited to a premium venue',
                    'Client-editable content for seasonal changes',
                ],
                'built_ar' => [
                    'عرض القاعات مع خيارات السعة والتوزيع الداخلي',
                    'تفاصيل خدمات الضيافة وتنظيم الفعاليات',
                    'نماذج استفسار موزّعة في كل الصفحات لا في صفحة اتصال وحدها',
                    'قالب ووردبريس مخصص يليق بقاعة فاخرة',
                    'محتوى قابل للتحرير من العميل لتغييرات المواسم',
                ],
                'decision' => [
                    'Getting that right meant answering the capacity, layout and catering questions on the page itself. The enquiry only comes after those are settled in the visitor\'s head — ask for it before, and you get a form submission that wastes both sides\' time.',
                    'For venues, the site\'s job is to disqualify as much as to attract. A couple who learns the capacity does not suit them has been served well.',
                ],
                'decision_ar' => [
                    'إتقان ذلك يعني الإجابة عن أسئلة السعة والتوزيع والضيافة على الصفحة نفسها. الاستفسار لا يأتي إلا بعد أن تُحسم هذه الأسئلة في ذهن الزائر، وطلبه قبل ذلك يعطيك نموذجًا يضيّع وقت الطرفين.',
                    'مهمة موقع القاعة أن يستبعد بقدر ما يجذب. فالعروسان اللذان يعرفان أن السعة لا تناسبهما قد خُدما جيدًا.',
                ],
                'keywords' => 'wedding venue website, event venue web design, enquiry led website, birmingham venue website, custom wordpress theme hospitality',
                'keywords_ar' => 'موقع قاعة أفراح, تصميم موقع قاعة مناسبات, موقع تنظيم فعاليات, تطوير موقع ضيافة, موقع حجز قاعات',
                'apps' => [],
            ],

            'rasa-lichfield' => [
                'lead' => 'I built Rasa Lichfield — a halal Pan-Asian restaurant inside the historic Corn Exchange — with reservations and online ordering both reachable from anywhere on the site.',
                'lead_ar' => 'بنيت Rasa Lichfield، مطعم آسيوي حلال داخل مبنى Corn Exchange التاريخي، بحيث يمكن الوصول إلى الحجز والطلب أونلاين من أي مكان في الموقع.',
                'built' => [
                    'Menu presentation across a Pan-Asian range',
                    'Table reservation flow',
                    'Online ordering through WooCommerce on WordPress',
                    'Custom theme balancing a listed historic building with a modern kitchen',
                    'Mobile-first, since most restaurant traffic is on a phone',
                ],
                'built_ar' => [
                    'عرض قائمة طعام تغطي مطبخًا آسيويًا متنوعًا',
                    'مسار حجز طاولات',
                    'طلب أونلاين عبر ووكومرس على ووردبريس',
                    'قالب مخصص يوازن بين مبنى تاريخي مسجَّل ومطبخ عصري',
                    'تصميم يبدأ من الجوال، لأن معظم زوار المطاعم يأتون من الهاتف',
                ],
                'decision' => [
                    'The design challenge was carrying a listed historic building and a contemporary Asian kitchen at the same time, without either looking like an afterthought. Lean too far toward heritage and the food reads as dated; lean too modern and you waste the single most distinctive thing about the venue.',
                    'Restaurant sites fail more often on navigation than on aesthetics. If booking takes more than one tap from any page, the design has already lost.',
                ],
                'decision_ar' => [
                    'التحدي التصميمي كان حمل مبنى تاريخي مسجَّل ومطبخ آسيوي معاصر في آن واحد، دون أن يبدو أحدهما إضافة متأخرة. الميل الزائد نحو التراث يجعل الطعام يبدو قديمًا، والميل الزائد نحو الحداثة يهدر أكثر ما يميّز المكان.',
                    'مواقع المطاعم تفشل في التنقل أكثر مما تفشل في الجماليات. إذا احتاج الحجز أكثر من نقرة واحدة من أي صفحة، فقد خسر التصميم سلفًا.',
                ],
                'keywords' => 'restaurant website development, table reservation system, online food ordering woocommerce, halal restaurant website uk, mobile first restaurant site',
                'keywords_ar' => 'تصميم موقع مطعم, نظام حجز طاولات, طلب طعام أونلاين, تطوير موقع مطعم حلال, موقع مطعم متجاوب',
                'apps' => [],
            ],

            'drcembaysal' => [
                'lead' => 'I built this site for an Istanbul clinic specialising in implants, veneers and cosmetic dentistry, with a booking system and multilingual patient pages aimed at international patients.',
                'lead_ar' => 'بنيت هذا الموقع لعيادة في إسطنبول متخصصة في الزراعة والفينير وطب الأسنان التجميلي، مع نظام حجز وصفحات معلومات متعددة اللغات موجّهة للمرضى الدوليين.',
                'built' => [
                    'Multilingual patient information pages',
                    'Procedure explanations written for non-specialists',
                    'Booking system usable from abroad',
                    'Treatment and process transparency throughout',
                    'Custom styling over Elementor so the client can still edit content',
                ],
                'built_ar' => [
                    'صفحات معلومات للمرضى بعدة لغات',
                    'شروح للإجراءات مكتوبة لغير المتخصصين',
                    'نظام حجز يعمل من خارج البلد',
                    'شفافية كاملة في تفاصيل العلاج ومراحله',
                    'تنسيق مخصص فوق Elementor ليظل العميل قادرًا على تحرير المحتوى',
                ],
                'decision' => [
                    'Everything is aimed at reducing distance — clear procedure explanations, a transparent process, and a booking route that works identically whether the patient is in Istanbul or another country.',
                    'In medical tourism, ambiguity is the competitor. Every question you leave unanswered is a reason to book somewhere that answered it.',
                ],
                'decision_ar' => [
                    'كل شيء هنا موجّه لتقليص المسافة: شروح واضحة للإجراءات، ومسار علاجي شفاف، وطريق حجز يعمل بالطريقة نفسها سواء كان المريض في إسطنبول أو في بلد آخر.',
                    'في السياحة العلاجية، الغموض هو المنافس. وكل سؤال تتركه بلا إجابة سبب كافٍ ليحجز المريض في مكان أجاب عنه.',
                ],
                'keywords' => 'dental clinic website development, medical tourism website, multilingual clinic site, dental implant clinic istanbul, online appointment booking clinic',
                'keywords_ar' => 'تصميم موقع عيادة أسنان, موقع سياحة علاجية, حجز مواعيد أونلاين للعيادات, موقع عيادة متعدد اللغات, تطوير مواقع طبية',
                'apps' => [],
            ],

            'dr-mohamed-dental' => [
                'lead' => 'I built this one to actually take the appointment — services overview, doctor profile and online booking, built in Next.js so it loads instantly on a phone.',
                'lead_ar' => 'بنيت هذا الموقع ليأخذ الموعد فعليًا: عرض للخدمات، وملف تعريف بالطبيب، وحجز أونلاين، مبني بـ Next.js ليُحمَّل فورًا على الجوال.',
                'built' => [
                    'Services overview with treatment detail',
                    'Doctor profile establishing credentials',
                    'Online appointment booking',
                    'Next.js on Vercel for fast loading and simple deployment',
                    'Mobile-first layout',
                ],
                'built_ar' => [
                    'عرض للخدمات مع تفاصيل كل علاج',
                    'ملف تعريف بالطبيب يوضّح مؤهلاته',
                    'حجز مواعيد أونلاين',
                    'Next.js على Vercel لتحميل سريع ونشر بسيط',
                    'تصميم يبدأ من الجوال',
                ],
                'decision' => [
                    'For a single-practitioner clinic, the site replaces the receptionist for every enquiry arriving outside working hours — evenings, weekends, and the moment someone\'s tooth starts hurting at 11pm.',
                    'That is the entire return on the project, and it is easy to measure: count the bookings that arrive when the clinic is closed.',
                ],
                'decision_ar' => [
                    'في عيادة يديرها طبيب واحد، يحل الموقع محل موظف الاستقبال في كل استفسار يصل خارج ساعات العمل: المساء، والعطلات، واللحظة التي يبدأ فيها ألم الأسنان في الحادية عشرة ليلًا.',
                    'هذا هو العائد كله من المشروع، وقياسه سهل: احسب عدد الحجوزات التي تصل والعيادة مغلقة.',
                ],
                'keywords' => 'dental clinic booking website, next.js clinic site, online appointment system, healthcare web development egypt, fast mobile clinic website',
                'keywords_ar' => 'موقع حجز مواعيد عيادة, تصميم موقع طبيب أسنان, نظام حجز مواعيد إلكتروني, برمجة موقع عيادة, موقع طبي سريع',
                'apps' => [],
            ],

            'ant-assist' => [
                'lead' => 'I built Ant Assist for a UK virtual assistant agency providing admin and marketing support, where the site leads with process and accountability rather than with rates.',
                'lead_ar' => 'بنيت Ant Assist لوكالة بريطانية للمساعدة الافتراضية تقدّم دعمًا إداريًا وتسويقيًا، وصمّمت الموقع ليبدأ بآلية العمل والمساءلة لا بالأسعار.',
                'built' => [
                    'Service presentation across admin and marketing support',
                    'Process and accountability explained before pricing',
                    'Lead-generation flow aimed at qualified enquiries',
                    'Custom WordPress theme with client-editable content',
                    'Structure designed to build confidence before asking for contact',
                ],
                'built_ar' => [
                    'عرض للخدمات يغطي الدعم الإداري والتسويقي',
                    'شرح آلية العمل والمساءلة قبل عرض الأسعار',
                    'مسار لتوليد عملاء محتملين يستهدف الاستفسارات المؤهلة',
                    'قالب ووردبريس مخصص بمحتوى يحرّره العميل',
                    'بنية مصمّمة لبناء الثقة قبل طلب بيانات التواصل',
                ],
                'decision' => [
                    'Price-led positioning attracts clients who leave for the next cheaper option the moment one appears. The site is deliberately built to attract the other kind — businesses choosing on reliability, who stay.',
                    'That means putting the least exciting content, the process and the accountability model, in the most prominent position. It reads as boring and it converts the right people.',
                ],
                'decision_ar' => [
                    'التموضع القائم على السعر يجذب عملاء يرحلون إلى الخيار الأرخص التالي فور ظهوره. وقد بُني هذا الموقع عن قصد ليجذب النوع الآخر: شركات تختار بناءً على الاعتمادية، وتبقى.',
                    'وهذا يعني وضع المحتوى الأقل إثارة — آلية العمل ونموذج المساءلة — في أبرز موضع. يبدو مملًا، ويحوّل الأشخاص الصحيحين.',
                ],
                'keywords' => 'virtual assistant agency website, service business web design, lead generation website uk, trust led website copy, custom wordpress agency site',
                'keywords_ar' => 'موقع وكالة مساعدة افتراضية, تصميم موقع شركة خدمات, موقع لتوليد عملاء محتملين, تطوير موقع وكالة, موقع خدمات إدارية وتسويقية',
                'apps' => [],
            ],

            'services-researcher' => [
                'lead' => 'I built Services Researcher for academic research, translation and statistical analysis services, with an order workflow and consultation booking designed to get from landing page to submitted brief in as few steps as possible.',
                'lead_ar' => 'بنيت «باحث الخدمات» لخدمات البحث الأكاديمي والترجمة والتحليل الإحصائي، مع مسار طلب وحجز استشارة مصمّم للوصول من صفحة الهبوط إلى طلب مُرسَل بأقل عدد ممكن من الخطوات.',
                'built' => [
                    'Service pages for research, translation and statistical analysis',
                    'Order workflow with brief submission',
                    'Consultation booking for scoping conversations',
                    'Custom Laravel build with form handling',
                    'Flow optimised for a visitor arriving under time pressure',
                ],
                'built_ar' => [
                    'صفحات خدمات للبحث العلمي والترجمة والتحليل الإحصائي',
                    'مسار طلب يتضمن إرسال تفاصيل المشروع',
                    'حجز استشارة لمحادثات تحديد النطاق',
                    'بناء Laravel مخصص مع معالجة كاملة للنماذج',
                    'مسار محسّن لزائر يصل تحت ضغط الوقت',
                ],
                'decision' => [
                    'Every extra field on that form is a student who gives up and sends an email instead — which is worse for both sides, because now the request arrives incomplete and the work starts with three clarifying messages.',
                    'Form length is not a neutral choice. It is a direct trade between data quality and completion rate, and the right balance depends entirely on how urgent the visitor is.',
                ],
                'decision_ar' => [
                    'كل حقل إضافي في ذلك النموذج يعني باحثًا يستسلم ويرسل بريدًا إلكترونيًا بدلًا منه، وهو أسوأ للطرفين، لأن الطلب يصل ناقصًا ويبدأ العمل بثلاث رسائل توضيحية.',
                    'طول النموذج ليس خيارًا محايدًا، بل مقايضة مباشرة بين جودة البيانات ومعدل الإكمال، والتوازن الصحيح يعتمد كليًا على مدى استعجال الزائر.',
                ],
                'keywords' => 'academic services website, research and translation platform, consultation booking website, laravel form workflow, academic consulting uae',
                'keywords_ar' => 'موقع خدمات بحث أكاديمي, منصة ترجمة وتحليل إحصائي, حجز استشارات أكاديمية, تطوير موقع خدمات تعليمية, برمجة نظام طلبات',
                'apps' => [],
            ],

            'bankelarb' => [
                'lead' => 'I built Bank El Arab as an Arabic guide to financial-aid programmes and charitable services across Arab countries — a content directory built for search from the ground up rather than optimised afterwards.',
                'lead_ar' => 'بنيت «بنك العرب» كدليل عربي لبرامج المساعدات المالية والخدمات الخيرية في الدول العربية، وهو دليل محتوى بُني لمحركات البحث من الأساس لا حُسّن لها لاحقًا.',
                'built' => [
                    'Structured content directory across countries and programmes',
                    'Arabic URL structure and heading hierarchy done properly',
                    'Schema markup and internal linking built for Arabic content',
                    'Custom WordPress theme with RTL as the default, not an override',
                    'Performance tuned for readers on mobile connections',
                ],
                'built_ar' => [
                    'دليل محتوى منظّم عبر الدول والبرامج',
                    'بنية روابط عربية وتسلسل عناوين مضبوط بشكل صحيح',
                    'ترميز Schema وربط داخلي مبني خصيصًا للمحتوى العربي',
                    'قالب ووردبريس مخصص يكون فيه الاتجاه من اليمين لليسار هو الأصل لا استثناءً',
                    'أداء مضبوط لقارئ يتصفح عبر بيانات الجوال',
                ],
                'decision' => [
                    'Getting the fundamentals right in Arabic specifically is where the work is: URL structure, heading hierarchy, schema, and internal linking that still makes sense when the text runs the other way.',
                    'Most Arabic content sites are built as English sites with the direction flipped at the end. Search engines are not fooled by that, and neither are readers.',
                ],
                'decision_ar' => [
                    'العمل الحقيقي هو ضبط الأساسيات في العربية تحديدًا: بنية الروابط، وتسلسل العناوين، والترميز المنظّم، والربط الداخلي الذي يظل منطقيًا حين يسير النص في الاتجاه الآخر.',
                    'معظم مواقع المحتوى العربي تُبنى كمواقع إنجليزية ثم يُقلب اتجاهها في النهاية. محركات البحث لا تنخدع بذلك، ولا القارئ كذلك.',
                ],
                'keywords' => 'arabic seo website, arabic content directory, rtl wordpress theme development, arabic schema markup, financial aid guide website',
                'keywords_ar' => 'سيو عربي, موقع محتوى عربي, دليل مساعدات مالية, تطوير قالب ووردبريس عربي, تحسين المواقع العربية لمحركات البحث',
                'apps' => [],
            ],

            'daamny' => [
                'lead' => 'I built Da3many as an Arabic content portal covering financial aid, grants and social support programmes across Gulf and Arab countries.',
                'lead_ar' => 'بنيت «دعمني» كبوابة محتوى عربية تغطي المساعدات المالية والمنح وبرامج الدعم الاجتماعي في دول الخليج والدول العربية.',
                'built' => [
                    'Programme information organised by country and category',
                    'Search-intent-led content structure',
                    'Fast retrieval prioritised over visual complexity',
                    'Arabic SEO fundamentals applied throughout',
                    'Mobile performance treated as a requirement, not a nice-to-have',
                ],
                'built_ar' => [
                    'معلومات البرامج منظّمة حسب الدولة والتصنيف',
                    'بنية محتوى قائمة على نية البحث',
                    'أولوية للوصول السريع للمعلومة على التعقيد البصري',
                    'أساسيات السيو العربي مطبَّقة في كل الموقع',
                    'أداء الجوال معامَل كشرط أساسي لا كتحسين إضافي',
                ],
                'decision' => [
                    'The entire build is organised around search intent and fast retrieval rather than visual impact, because the person arriving here is not browsing for pleasure. They are looking for one specific answer, often on a slow connection, often in a difficult moment.',
                    'That reframes what "good design" means for the project. Restraint is the feature.',
                ],
                'decision_ar' => [
                    'البناء كله منظّم حول نية البحث وسرعة الوصول للمعلومة لا حول الأثر البصري، لأن من يصل إلى هنا لا يتصفح للمتعة. هو يبحث عن إجابة واحدة محددة، غالبًا على اتصال بطيء، وغالبًا في لحظة صعبة.',
                    'وهذا يعيد تعريف معنى «التصميم الجيد» في هذا المشروع: الاقتصاد في كل شيء هو الميزة.',
                ],
                'keywords' => 'arabic content portal, gulf financial aid guide, search intent content architecture, arabic seo development, fast mobile content site',
                'keywords_ar' => 'بوابة محتوى عربية, دليل منح ومساعدات الخليج, هيكلة محتوى حسب نية البحث, تحسين محركات البحث العربية, موقع محتوى سريع',
                'apps' => [],
            ],

            'bnbatiment' => [
                'lead' => 'I built BN Bâtiment for a roofing company covering Lyon, Saint-Étienne and Valence, offering installation, repair and 24/7 emergency call-out.',
                'lead_ar' => 'بنيت BN Bâtiment لشركة أسقف ومقاولات تغطي ليون وسانت إتيان وفالنس، وتقدّم التركيب والإصلاح وخدمة الطوارئ على مدار الساعة.',
                'built' => [
                    'Service pages across installation, repair and emergency work',
                    'Emergency contact route reachable in one tap from anywhere',
                    'Coverage-area presentation across three cities',
                    'Laravel with Inertia and React for a fast, app-like experience',
                    'Mobile-first, because emergency searches happen on a phone',
                ],
                'built_ar' => [
                    'صفحات خدمات تغطي التركيب والإصلاح وأعمال الطوارئ',
                    'مسار اتصال طارئ يُدرَك بنقرة واحدة من أي صفحة',
                    'عرض لمناطق التغطية في ثلاث مدن',
                    'Laravel مع Inertia و React لتجربة سريعة تشبه التطبيقات',
                    'تصميم يبدأ من الجوال، لأن عمليات البحث الطارئة تحدث على الهاتف',
                ],
                'decision' => [
                    'The emergency route is never more than one tap from anywhere on the site. Somebody with water coming through their ceiling is not going to read a services page first, and any design that makes them look for the phone number has failed at its only urgent job.',
                    'For trades, the site has two entirely separate audiences: the planner comparing quotes, and the person in an emergency. Designing for only one of them is the common mistake.',
                ],
                'decision_ar' => [
                    'مسار الطوارئ لا يبعد أكثر من نقرة واحدة من أي مكان في الموقع. من يتسرّب الماء من سقف منزله لن يقرأ صفحة خدمات أولًا، وأي تصميم يجعله يبحث عن رقم الهاتف قد فشل في مهمته العاجلة الوحيدة.',
                    'في مهن المقاولات، للموقع جمهوران منفصلان تمامًا: من يخطّط ويقارن العروض، ومن هو في حالة طارئة. والتصميم لأحدهما فقط هو الخطأ الشائع.',
                ],
                'keywords' => 'roofing company website, trades business web design, emergency call out website, laravel inertia react site, local service area pages',
                'keywords_ar' => 'موقع شركة مقاولات, تصميم موقع خدمات صيانة, موقع خدمة طوارئ, تطوير موقع شركة أسقف, صفحات مناطق الخدمة',
                'apps' => [],
            ],

            'kingkebab' => [
                'lead' => 'I built King Kebab Le Pouzin on Laravel with its own online ordering system, so the restaurant keeps the margin that a delivery marketplace would otherwise take.',
                'lead_ar' => 'بنيت King Kebab Le Pouzin على Laravel بنظام طلبات أونلاين خاص به، ليحتفظ المطعم بهامش الربح الذي كانت ستأخذه منصة توصيل وسيطة.',
                'built' => [
                    'Menu presentation for tacos, burgers and kebab range',
                    'Own online ordering built directly into the site',
                    'Order management for the kitchen',
                    'Laravel with Tailwind for a fast, lightweight build',
                    'Local delivery information and coverage',
                ],
                'built_ar' => [
                    'عرض قائمة الطعام من تاكوس وبرغر وكباب',
                    'نظام طلبات أونلاين خاص مدمج في الموقع مباشرة',
                    'إدارة الطلبات لفريق المطبخ',
                    'Laravel مع Tailwind لبناء سريع وخفيف',
                    'معلومات التوصيل المحلي ونطاق التغطية',
                ],
                'decision' => [
                    'For a small local business, the difference between owning the ordering flow and renting it from a marketplace is the difference between a profitable order and a break-even one. On thin restaurant margins, a 30% commission is frequently the entire profit.',
                    'The site does not need to compete with the marketplace on reach. It only needs to capture the customers who already know the restaurant — and those are the majority of repeat orders.',
                ],
                'decision_ar' => [
                    'بالنسبة لنشاط محلي صغير، الفرق بين امتلاك مسار الطلب واستئجاره من منصة وسيطة هو الفرق بين طلب مربح وطلب بلا ربح. وعلى هوامش المطاعم الضيقة، تكون عمولة 30% في كثير من الأحيان هي الربح كله.',
                    'الموقع لا يحتاج أن ينافس المنصة الوسيطة في الانتشار، بل يكفي أن يلتقط العملاء الذين يعرفون المطعم أصلًا، وهم أغلبية الطلبات المتكررة.',
                ],
                'keywords' => 'restaurant online ordering system, commission free food ordering, laravel restaurant website, local delivery website, restaurant order management',
                'keywords_ar' => 'نظام طلب أونلاين للمطاعم, موقع مطعم بنظام توصيل, بديل تطبيقات التوصيل, تطوير موقع مطعم بـ Laravel, إدارة طلبات المطعم',
                'apps' => [],
            ],

            'jovero' => [
                'lead' => 'I built JOVERO\'s full agency site in TypeScript — service pages, case studies and lead-generation funnels for a marketing and digital growth agency.',
                'lead_ar' => 'بنيت موقع وكالة JOVERO بالكامل بـ TypeScript: صفحات خدمات ودراسات حالة ومسارات لتوليد العملاء المحتملين، لوكالة تسويق ونمو رقمي.',
                'built' => [
                    'Service pages across marketing and software offerings',
                    'Case study presentation with structured results',
                    'Lead-generation funnels with staged capture',
                    'A TypeScript front end and API, kept light so the site itself is the demo',
                    'Performance treated as part of the pitch',
                ],
                'built_ar' => [
                    'صفحات خدمات تغطي التسويق والحلول البرمجية',
                    'عرض دراسات حالة بنتائج منظّمة',
                    'مسارات توليد عملاء بالتقاط تدريجي للبيانات',
                    'واجهة وواجهة برمجية بـ TypeScript، خفيفة عمدًا ليكون الموقع نفسه هو العرض',
                    'الأداء معامَل كجزء من العرض التجاري لا كتفصيل تقني',
                ],
                'decision' => [
                    'Agency sites carry an unfair burden. If the site is slow or awkward to use, no amount of written credibility survives it — the visitor has already sampled the work, and the sample was the website.',
                    'That is why performance was treated as a positioning decision rather than a technical one. For an agency, the site is not marketing collateral. It is the portfolio piece everyone sees first.',
                ],
                'decision_ar' => [
                    'مواقع الوكالات تحمل عبئًا غير عادل. إذا كان الموقع بطيئًا أو صعب الاستخدام، فلن ينجو أي قدر من المصداقية المكتوبة، لأن الزائر قد جرّب العمل بالفعل، والعينة كانت الموقع نفسه.',
                    'لهذا عُومل الأداء كقرار تموضع لا كقرار تقني. فموقع الوكالة ليس مادة تسويقية، بل هو العمل الأول الذي يراه الجميع.',
                ],
                'keywords' => 'marketing agency website, typescript agency site, case study presentation website, lead generation funnel development, high performance agency web design',
                'keywords_ar' => 'موقع وكالة تسويق رقمي, تصميم موقع وكالة إبداعية, عرض دراسات حالة, مسارات توليد عملاء محتملين, تطوير موقع سريع الأداء',
                'apps' => [],
            ],

            'pharmacy-app' => [
                'lead' => 'I built this pharmacy web app in Next.js with product browsing, cart and order management, designed so the path from search to placed order is as short as the category allows.',
                'lead_ar' => 'بنيت تطبيق الصيدلية هذا بـ Next.js مع تصفح للمنتجات وسلة وإدارة طلبات، مصمّمًا ليكون الطريق من البحث إلى إتمام الطلب أقصر ما تسمح به طبيعة هذا المجال.',
                'built' => [
                    'Product browsing with search across a pharmacy catalogue',
                    'Cart and order management',
                    'Next.js and TypeScript for a fast, type-safe build',
                    'Ordering flow shortened for users under time pressure',
                    'Mobile-first layout',
                ],
                'built_ar' => [
                    'تصفح للمنتجات مع بحث في كتالوج صيدلية كامل',
                    'سلة شراء وإدارة طلبات',
                    'Next.js و TypeScript لبناء سريع وآمن من ناحية الأنواع',
                    'مسار طلب مختصر لمستخدمين تحت ضغط الوقت',
                    'تصميم يبدأ من الجوال',
                ],
                'decision' => [
                    'Every unnecessary step in a pharmacy flow is a real cost to someone who did not want to be there in the first place. The usual e-commerce playbook — upsells, related products, account creation before checkout — actively works against the user here.',
                    'Knowing which conventions to discard is more valuable than knowing them all.',
                ],
                'decision_ar' => [
                    'كل خطوة زائدة في مسار طلب من صيدلية تكلفة حقيقية على شخص لم يكن يريد أن يكون هنا أصلًا. ودليل التجارة الإلكترونية المعتاد — العروض الإضافية والمنتجات المقترحة وإنشاء حساب قبل الدفع — يعمل هنا ضد المستخدم فعليًا.',
                    'معرفة أي الأعراف يجب التخلي عنها أثمن من معرفتها كلها.',
                ],
                'keywords' => 'pharmacy web app development, online pharmacy ordering system, next.js ecommerce app, healthcare ordering ux, typescript web application',
                'keywords_ar' => 'تطبيق صيدلية أونلاين, تطوير متجر أدوية إلكتروني, نظام طلب من الصيدلية, برمجة تطبيق ويب صحي, متجر Next.js',
                'apps' => [],
            ],
        ];
    }
}
