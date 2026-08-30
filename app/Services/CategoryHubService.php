<?php

namespace App\Services;

/**
 * Real content for the ten portfolio category pages.
 *
 * Those pages used to be ten filtered grids with an auto-generated title and no
 * copy of their own — near-duplicates in Google's eyes, and useless to a visitor
 * who arrived searching for "a system like this one" rather than for a brand name.
 *
 * Nobody searches "Kassenta". They search "برنامج كاشير للمطاعم" or "cloud POS
 * developer". Each hub therefore carries the phrasing people actually type, an
 * honest description of who the work suits, and the questions they ask before
 * they contact anyone — which is also what makes each page different from the
 * other nine rather than a templated clone.
 */
class CategoryHubService
{
    /** Localized hub content for a category slug, or null if it has none. */
    public static function get(string $slug): ?array
    {
        $d = self::data()[$slug] ?? null;
        if (!$d) return null;

        $isAr = function_exists('app') && app()->getLocale() === 'ar';

        return [
            'h1'          => $isAr ? $d['h1_ar']          : $d['h1'],
            'meta_title'  => $isAr ? $d['meta_title_ar']  : $d['meta_title'],
            'meta_desc'   => $isAr ? $d['meta_desc_ar']   : $d['meta_desc'],
            'keywords'    => $isAr ? $d['keywords_ar']    : $d['keywords'],
            'intro'       => $isAr ? $d['intro_ar']       : $d['intro'],
            'suits'       => $isAr ? $d['suits_ar']       : $d['suits'],
            'intents'     => $isAr ? $d['intents_ar']     : $d['intents'],
            'faq'         => $isAr ? $d['faq_ar']         : $d['faq'],
        ];
    }

    public static function slugs(): array
    {
        return array_keys(self::data());
    }

    private static function data(): array
    {
        return [

            'tech' => [
                'h1' => 'SaaS Platforms, POS and CRM Systems Built to Run for Years',
                'h1_ar' => 'منصات SaaS وأنظمة نقاط بيع وإدارة عملاء مبنية لتعمل سنوات',
                'meta_title' => 'SaaS, POS & CRM Development — 9 Systems Running in Production',
                'meta_title_ar' => 'تطوير أنظمة SaaS ونقاط بيع وCRM — 9 أنظمة تعمل فعليا',
                'meta_desc' => 'Multi-tenant SaaS, cloud POS, CRM and operations platforms built and running for real businesses in Switzerland, Egypt and Saudi Arabia.',
                'meta_desc_ar' => 'أنظمة SaaS متعددة المستأجرين ونقاط بيع سحابية وCRM ومنصات تشغيل، مبنية وتعمل فعليا لشركات في سويسرا ومصر والسعودية.',
                'keywords' => 'saas development, multi tenant saas, cloud pos system development, crm development, custom business software, subscription billing stripe, operations platform',
                'keywords_ar' => 'تطوير نظام SaaS, برنامج كاشير سحابي, نظام نقاط بيع للمطاعم, برمجة نظام CRM, برنامج إدارة عملاء, نظام متعدد الفروع, برمجة نظام إداري مخصص',
                'intro' => [
                    'This is the hardest category to get right and the easiest to get wrong. A business system is not a website with a login — it is a set of rules about who may do what, what happens when two people act at the same second, and what the numbers mean six months from now when someone audits them.',
                    'The nine systems here are all running in production. Between them they handle tills that keep taking orders when the internet drops, sales pipelines in Arabic, delivery dispatch across Egyptian governorates, and subscription billing. What they have in common is that the architecture was decided before the screens were drawn.',
                ],
                'intro_ar' => [
                    'هذا أصعب تصنيف في إتقانه وأسهله في الفشل. نظام الأعمال ليس موقعا فيه تسجيل دخول، بل مجموعة قواعد عن من يحق له أن يفعل ماذا، وماذا يحدث حين يتصرف شخصان في الثانية نفسها، وماذا تعني الأرقام بعد ستة أشهر حين يراجعها محاسب.',
                    'الأنظمة التسعة هنا كلها تعمل في بيئة إنتاج حقيقية. تشمل نقاط بيع تواصل استقبال الطلبات حين ينقطع الإنترنت، ومسارات مبيعات بالعربية، وتوزيع طلبات توصيل بين محافظات مصر، واشتراكات وفوترة. والقاسم المشترك بينها أن المعمارية حُسمت قبل رسم الشاشات.',
                ],
                'suits' => [
                    'A business outgrowing spreadsheets, WhatsApp groups and a shared Excel file',
                    'A founder validating a SaaS idea who needs a real first version, not a prototype',
                    'A retailer or restaurant group that needs one system across several branches',
                    'A company whose current software cannot be changed without calling the original vendor',
                    'A team that needs its tools to talk to each other instead of being re-keyed by hand',
                ],
                'suits_ar' => [
                    'نشاط تجاوز مرحلة ملفات الإكسل ومجموعات الواتساب',
                    'مؤسس يريد نسخة أولى حقيقية من فكرة SaaS لا نموذجا تجريبيا',
                    'متجر أو مجموعة مطاعم تحتاج نظاما واحدا يغطي عدة فروع',
                    'شركة لا تستطيع تعديل نظامها الحالي إلا بالرجوع للمورّد الأصلي',
                    'فريق يحتاج أنظمته أن تتحدث مع بعضها بدل إعادة إدخال البيانات يدويا',
                ],
                'intents' => [
                    'build a SaaS platform from scratch', 'multi-tenant SaaS architecture developer',
                    'cloud POS system for restaurants', 'offline-first point of sale',
                    'custom CRM instead of Salesforce', 'inventory system for multiple branches',
                    'Stripe subscription billing integration', 'internal operations dashboard',
                    'replace spreadsheets with a real system', 'connect POS to an accounting system',
                    'developer for a business management system', 'booking and scheduling SaaS',
                ],
                'intents_ar' => [
                    'برمجة نظام SaaS من الصفر', 'مطور أنظمة متعددة المستأجرين',
                    'برنامج كاشير سحابي للمطاعم', 'نظام نقاط بيع يعمل بدون إنترنت',
                    'نظام CRM مخصص بدل الجاهز', 'برنامج مخازن لعدة فروع',
                    'ربط الاشتراكات ببوابة دفع', 'لوحة تحكم لإدارة العمليات',
                    'بديل ملفات الإكسل في إدارة الشركة', 'ربط الكاشير بالنظام المحاسبي',
                    'مبرمج نظام إداري متكامل', 'نظام حجوزات ومواعيد للشركات',
                ],
                'faq' => [
                    ['q' => 'Should tenants share one database or get their own?',
                     'a' => 'It depends on how much data isolation your customers will demand contractually, not on which is technically nicer. Shared is cheaper to run and migrate; separate is easier to back up, restore and audit per customer. It is close to impossible to reverse once a couple of hundred businesses are live, so it is decided before the first table is created.'],
                    ['q' => 'How long does a first usable version take?',
                     'a' => 'For a focused scope, eight to sixteen weeks. The variable is not the code, it is how quickly decisions come back. The projects here that shipped fastest had one decision-maker and a written scope for phase one, with everything else logged for phase two.'],
                    ['q' => 'Can it work when the internet drops?',
                     'a' => 'Only if that was designed in from the first commit. Offline capability sits underneath the data model — it cannot be bolted on later. The POS system in this category takes orders offline and reconciles them on reconnect without duplicating sales.'],
                ],
                'faq_ar' => [
                    ['q' => 'هل يتشارك العملاء قاعدة بيانات واحدة أم لكل واحد قاعدته؟',
                     'a' => 'يتوقف الأمر على حجم عزل البيانات الذي سيطلبه عملاؤك تعاقديا، لا على أيهما أجمل تقنيا. المشتركة أرخص في التشغيل والترحيل، والمنفصلة أسهل في النسخ الاحتياطي والاسترجاع والتدقيق لكل عميل. ويكاد يستحيل التراجع بعد أن تعمل مئتا منشأة فعليا، لذلك يُحسم القرار قبل إنشاء أول جدول.'],
                    ['q' => 'كم تستغرق أول نسخة قابلة للاستخدام؟',
                     'a' => 'لنطاق محدد، من ثمانية إلى ستة عشر أسبوعا. المتغير ليس الكود بل سرعة رجوع القرارات. أسرع المشاريع هنا تسليما كان لها صاحب قرار واحد ونطاق مكتوب للمرحلة الأولى، وكل ما عداه مسجّل للمرحلة الثانية.'],
                    ['q' => 'هل يعمل النظام عند انقطاع الإنترنت؟',
                     'a' => 'فقط إذا صُمم لذلك من أول سطر. العمل دون اتصال يسكن تحت نموذج البيانات ولا يُضاف لاحقا. نظام نقاط البيع في هذا التصنيف يستقبل الطلبات دون إنترنت ويزامنها عند عودة الاتصال دون تكرار عمليات البيع.'],
                ],
            ],

            'ecommerce' => [
                'h1' => 'Online Stores Built Around How People Actually Buy',
                'h1_ar' => 'متاجر إلكترونية مبنية على طريقة الشراء الحقيقية',
                'meta_title' => 'E-commerce Development — Custom Stores, B2B Ordering & RTL',
                'meta_title_ar' => 'تطوير المتاجر الإلكترونية — متاجر مخصصة وطلبات جملة ودعم عربي',
                'meta_desc' => 'Custom online stores: bulk B2B ordering, genuinely bilingual Arabic storefronts, local payment gateways, and product pages built for high-consideration purchases.',
                'meta_desc_ar' => 'متاجر إلكترونية مخصصة: طلبات جملة للشركات، وواجهات عربية حقيقية لا مترجمة، وبوابات دفع محلية، وصفحات منتجات مبنية لعمليات شراء تحتاج تفكيرا.',
                'keywords' => 'ecommerce development, custom online store, woocommerce developer, b2b bulk ordering system, arabic rtl store, local payment gateway integration, headless commerce',
                'keywords_ar' => 'تصميم متجر إلكتروني, تطوير متجر ووكومرس, متجر بالجملة للشركات, متجر عربي RTL, ربط بوابة دفع محلية, متجر إلكتروني مخصص, برمجة متجر أونلاين',
                'intro' => [
                    'Most store projects fail on one of three things, and none of them is the design: the checkout does not match how the customer actually buys, the Arabic experience is a translated afterthought, or the payment methods the market trusts are missing.',
                    'The five stores here each solved a different version of that. One replaced the single-item cart entirely because its customers order four hundred shirts at a time. One mirrors every grid, filter and checkout step for right-to-left. One leads with specifications instead of lifestyle photography because its buyers arrive already informed.',
                ],
                'intro_ar' => [
                    'أغلب مشاريع المتاجر تفشل في واحد من ثلاثة، وليس أي منها التصميم: مسار الدفع لا يطابق طريقة الشراء الفعلية، أو التجربة العربية ترجمة أُضيفت لاحقا، أو وسائل الدفع التي يثق بها السوق غير موجودة.',
                    'المتاجر الخمسة هنا عالج كل منها نسخة مختلفة من ذلك. واحد استبدل سلة الصنف الواحد بالكامل لأن عملاءه يطلبون أربعمئة قطعة دفعة واحدة. وواحد يعكس الشبكة والمرشّحات وخطوات الدفع كلها للاتجاه من اليمين لليسار. وثالث يبدأ بالمواصفات لا بصور نمط الحياة لأن مشتريه يصل وهو مطّلع.',
                ],
                'suits' => [
                    'A manufacturer or wholesaler whose orders arrive as spreadsheets, not carts',
                    'A Gulf or Egyptian retailer who needs a real Arabic store, not a flipped English one',
                    'A brand selling high-value items people research for days before buying',
                    'A shop losing sales because the payment methods customers trust are missing',
                    'A store on a platform that has become a ceiling rather than a help',
                ],
                'suits_ar' => [
                    'مصنع أو تاجر جملة تصله الطلبات كجداول بيانات لا كسلة شراء',
                    'تاجر خليجي أو مصري يحتاج متجرا عربيا حقيقيا لا متجرا إنجليزيا مقلوبا',
                    'علامة تبيع منتجات عالية القيمة يبحث عنها العميل أياما قبل الشراء',
                    'متجر يخسر مبيعات لغياب وسائل الدفع التي يثق بها عملاؤه',
                    'متجر على منصة جاهزة تحولت من مساعدة إلى سقف يحدّه',
                ],
                'intents' => [
                    'custom online store development', 'B2B wholesale ordering system',
                    'bulk order with size breakdown', 'quote request instead of checkout',
                    'Arabic RTL ecommerce store', 'bilingual store Arabic and English',
                    'local payment gateway integration Gulf', 'WooCommerce custom theme developer',
                    'Next.js storefront developer', 'move from a platform to a custom store',
                    'product page for expensive items', 'ecommerce for technical products',
                ],
                'intents_ar' => [
                    'تصميم متجر إلكتروني مخصص', 'نظام طلبات جملة للشركات',
                    'طلب بالجملة بتوزيع مقاسات', 'طلب عرض سعر بدل الدفع المباشر',
                    'متجر إلكتروني عربي RTL', 'متجر ثنائي اللغة عربي وإنجليزي',
                    'ربط بوابات الدفع الخليجية', 'مبرمج قوالب ووكومرس مخصصة',
                    'متجر إلكتروني بـ Next.js', 'الانتقال من منصة جاهزة لمتجر مخصص',
                    'صفحة منتج للمنتجات الفاخرة', 'متجر إلكتروني لمنتجات تقنية',
                ],
                'faq' => [
                    ['q' => 'Custom store or a ready platform like Shopify, Salla or Zid?',
                     'a' => 'For most merchants the platform is the right call and I will say so. Custom becomes worth it when the platform is charging you a percentage of revenue you could keep, when your ordering flow is not a normal cart, or when an integration you need is not possible. Below that line, a custom build is a more expensive way to get less.'],
                    ['q' => 'Why does B2B need a different flow?',
                     'a' => 'Because a procurement officer needs a document to get approved, not a checkout confirmation email. Size breakdowns, quantity tiers, customisation options and a quote request replace the cart. Forcing volume orders through a consumer cart is the most common fix I get called in for, and the symptom is always the same: orders arrive by WhatsApp instead.'],
                    ['q' => 'Is Arabic support just a translation file?',
                     'a' => 'No. It is mirrored layouts, bidirectional text where an Arabic product name sits beside a Latin part number, number and date formatting, and a checkout progress indicator that flips correctly. Get one of those wrong and the whole store feels broken to a Gulf customer, who then abandons the cart.'],
                ],
                'faq_ar' => [
                    ['q' => 'متجر مخصص أم منصة جاهزة مثل سلة أو زد أو Shopify؟',
                     'a' => 'لأغلب التجار المنصة هي القرار الصحيح وسأقولها بصراحة. المتجر المخصص يستحق حين تأخذ المنصة نسبة من إيرادك كان يمكنك الاحتفاظ بها، أو حين لا يكون مسار طلبك سلة شراء عادية، أو حين يكون التكامل الذي تحتاجه مستحيلا عليها. دون هذا الحد، البناء المخصص طريقة أغلى للحصول على أقل.'],
                    ['q' => 'لماذا تحتاج طلبات الشركات مسارا مختلفا؟',
                     'a' => 'لأن موظف المشتريات يحتاج مستندا يُعتمد داخليا لا رسالة تأكيد شراء. توزيع المقاسات وشرائح الكميات وخيارات التخصيص وطلب عرض السعر تحل محل السلة. وإجبار طلبات الجملة على سلة المستهلك أكثر ما أُستدعى لإصلاحه، والعَرَض دائما واحد: الطلبات تصل على واتساب بدلا من الموقع.'],
                    ['q' => 'هل دعم العربية مجرد ملف ترجمة؟',
                     'a' => 'لا. هو تخطيطات معكوسة، ونصوص ثنائية الاتجاه يجاور فيها اسم منتج عربي رقم قطعة لاتيني، وتنسيق أرقام وتواريخ، ومؤشر خطوات دفع ينقلب بشكل صحيح. خطأ واحد في أي منها يجعل المتجر كله يبدو مكسورا أمام العميل الخليجي، فيترك السلة.'],
                ],
            ],

            'education' => [
                'h1' => 'Learning Platforms, Academy Sites and Student Systems',
                'h1_ar' => 'منصات تعلم ومواقع أكاديميات وأنظمة طلاب',
                'meta_title' => 'LMS & Education Platform Development — Built by a Former Teacher',
                'meta_title_ar' => 'تطوير منصات التعليم وأنظمة LMS — من مطوّر عمل مدرّسا',
                'meta_desc' => 'Learning platforms, academy websites and student-facing systems: enrolment states, progress tracking, certificates and instructor tooling that survives month six.',
                'meta_desc_ar' => 'منصات تعلم ومواقع أكاديميات وأنظمة للطلاب: حالات التسجيل وتتبع التقدم والشهادات وأدوات المدرّب التي تظل صالحة بعد الشهر السادس.',
                'keywords' => 'lms development, learning management system developer, online academy platform, course platform, student information system, e-learning website, training centre website',
                'keywords_ar' => 'تطوير منصة تعليم إلكتروني, برمجة نظام LMS, موقع أكاديمية تدريب, منصة دورات أونلاين, نظام معلومات الطلاب, موقع مركز تدريب, منصة تعليمية بالعربية',
                'intro' => [
                    'The course player is maybe a fifth of the work in a learning platform. The budget goes to the requirements nobody lists at the start: a student who pays halfway through, an instructor who reorders a module after fifty people have started it, and progress that must not evaporate when a laptop dies.',
                    'I built the five platforms here, and separately spent a year teaching ICT in an international school and training in academies. That second half matters more than it sounds: it is the difference between a system that models a syllabus and one that survives the regulation changing in the middle of a term.',
                ],
                'intro_ar' => [
                    'مشغّل الدروس يمثّل نحو خُمس العمل في منصة تعليمية. الميزانية تذهب للمتطلبات التي لا يذكرها أحد في البداية: طالب يدفع في منتصف الدورة، ومدرّب يعيد ترتيب وحدة بعد أن بدأها خمسون شخصا، وتقدّم يجب ألا يتبخر حين يتعطل جهاز الطالب.',
                    'بنيت المنصات الخمس هنا، وعملت بالتوازي سنة معلّم تكنولوجيا معلومات في مدرسة دولية ومدرّبا في أكاديميات. النصف الثاني أهم مما يبدو: هو الفرق بين نظام يحاكي مقررا ونظام يصمد حين تتغير اللائحة في منتصف الفصل.',
                ],
                'suits' => [
                    'A training academy that wants to sell and deliver courses without a middleman platform',
                    'A university or college office building an internal student-facing system',
                    'A school moving admissions, grades or attendance off paper and Excel',
                    'A centre that needs certificates issued against genuine completion, with verification',
                    'An institution whose regulations change and whose system must not need a rewrite each time',
                ],
                'suits_ar' => [
                    'أكاديمية تدريب تريد بيع دوراتها وتقديمها دون منصة وسيطة',
                    'جامعة أو مكتب كلية يبني نظاما داخليا يخدم الطلاب',
                    'مدرسة تنقل القبول أو الدرجات أو الحضور من الورق والإكسل',
                    'مركز يحتاج إصدار شهادات مرتبطة بإتمام حقيقي مع رابط تحقق',
                    'مؤسسة تتغير لوائحها ولا يصح أن يحتاج نظامها إعادة كتابة كل مرة',
                ],
                'intents' => [
                    'LMS development company', 'build an online course platform',
                    'custom learning management system', 'student information system developer',
                    'training academy website', 'online exam system with question bank',
                    'certificate generation with QR verification', 'Moodle customisation and integration',
                    'attendance and grades system', 'SCORM and LTI integration',
                    'student portal development', 'e-learning platform in Arabic',
                ],
                'intents_ar' => [
                    'شركة تطوير منصات تعليمية', 'إنشاء منصة دورات أونلاين',
                    'برمجة نظام إدارة تعلم مخصص', 'مطور نظام معلومات طلاب',
                    'تصميم موقع أكاديمية تدريب', 'نظام امتحانات إلكترونية ببنك أسئلة',
                    'إصدار شهادات برمز تحقق QR', 'تخصيص وتكامل مودل Moodle',
                    'نظام حضور ودرجات للطلاب', 'ربط SCORM و LTI',
                    'برمجة بوابة الطالب', 'منصة تعليم إلكتروني بالعربية',
                ],
                'faq' => [
                    ['q' => 'Should we build an LMS or use Moodle?',
                     'a' => 'If your teaching model is standard, Moodle or a hosted platform will beat anything custom on cost and on day-one features. Custom earns its place where your regulations are unusual — credit-hour rules, prerequisite logic, a grading scale nobody else uses — or where the platform cannot integrate with the systems you already run. The common answer is hybrid: a ready core plus a custom layer.'],
                    ['q' => 'What is the difference between an LMS and an SIS?',
                     'a' => 'An SIS is the institution\'s official record — admission, enrolment, courses, grades, GPA, transcripts, fees, graduation. An LMS is the teaching itself — content, assignments, quizzes, discussions. Put simply: the SIS says who is registered and what their result officially is; the LMS says how they learned. They have to talk to each other, and deciding which one owns each field is the first conversation.'],
                    ['q' => 'What happens when the regulations change mid-year?',
                     'a' => 'The rules get stored as data, not code: credit limits, grade scales and prerequisites live in configurable tables with an effective date and a version, and each student belongs to the regulation of their intake year. Old students stay on their rules and new ones on the new rules, without touching code or breaking historical calculations.'],
                ],
                'faq_ar' => [
                    ['q' => 'نبني نظام تعلم أم نستخدم مودل؟',
                     'a' => 'إن كان نموذجك التعليمي معياريا، فمودل أو منصة جاهزة ستتفوق على أي بناء مخصص في التكلفة وفي مزايا اليوم الأول. المخصص يستحق حين تكون لوائحك غير معتادة — قواعد ساعات معتمدة، ومنطق متطلبات سابقة، وسلّم تقديرات لا يستخدمه غيرك — أو حين تعجز المنصة عن التكامل مع أنظمتك القائمة. والإجابة الشائعة هجينة: نواة جاهزة وطبقة مخصصة فوقها.'],
                    ['q' => 'ما الفرق بين نظام LMS ونظام SIS؟',
                     'a' => 'نظام SIS هو السجل الرسمي للمؤسسة: القبول والقيد والمقررات والدرجات والمعدل وكشف الدرجات والمصروفات والتخرج. ونظام LMS هو العملية التعليمية نفسها: المحتوى والواجبات والاختبارات والنقاشات. باختصار: SIS يقول من مسجَّل وما نتيجته رسميا، وLMS يقول كيف تعلّم. ولا بد أن يتحدثا معا، وتحديد أيهما يملك كل حقل هو أول نقاش.'],
                    ['q' => 'ماذا يحدث إذا تغيرت اللائحة في منتصف السنة؟',
                     'a' => 'تُخزَّن القواعد كبيانات لا ككود: حدود الساعات وسلالم التقديرات والمتطلبات السابقة في جداول قابلة للتهيئة لها تاريخ سريان ورقم إصدار، وينتمي كل طالب للائحة سنة قيده. فيبقى القديم على لائحته والجديد على الجديدة، دون لمس الكود أو كسر حسابات سابقة.'],
                ],
            ],

            'healthcare' => [
                'h1' => 'Clinic Sites, Booking Systems and Pharmacy Platforms',
                'h1_ar' => 'مواقع عيادات وأنظمة حجز ومنصات صيدليات',
                'meta_title' => 'Healthcare Web Development — Clinic Booking & Pharmacy Systems',
                'meta_title_ar' => 'تطوير مواقع القطاع الصحي — حجز العيادات وأنظمة الصيدليات',
                'meta_desc' => 'Clinic websites that actually take the appointment, medical-tourism pages that remove doubt, and pharmacy ordering built for people who did not want to be there.',
                'meta_desc_ar' => 'مواقع عيادات تأخذ الموعد فعليا، وصفحات سياحة علاجية تزيل الغموض، ونظام طلب من الصيدلية مبني لمن لم يكن يريد أن يكون هنا أصلا.',
                'keywords' => 'clinic website development, online appointment booking system, dental clinic website, medical tourism website, online pharmacy platform, healthcare web developer',
                'keywords_ar' => 'تصميم موقع عيادة, نظام حجز مواعيد أونلاين, موقع عيادة أسنان, موقع سياحة علاجية, منصة صيدلية إلكترونية, مطور مواقع طبية',
                'intro' => [
                    'A clinic site has one measurable job: take the appointment that arrives at eleven at night, when the practice is closed and the tooth has started hurting. Everything else on the page is there to make that moment easy or it does not need to be there.',
                    'For medical tourism the job is different — ambiguity is the competitor. Every question left unanswered about the procedure, the process or the cost is a reason to book with a clinic that answered it. And for pharmacy ordering, the usual e-commerce playbook of upsells and account-creation-before-checkout works actively against a user who is unwell.',
                ],
                'intro_ar' => [
                    'لموقع العيادة مهمة واحدة قابلة للقياس: أن يأخذ الموعد الذي يصل الحادية عشرة ليلا، والعيادة مغلقة والألم قد بدأ. وكل ما عدا ذلك في الصفحة موجود ليُسهّل تلك اللحظة وإلا فلا داعي له.',
                    'وفي السياحة العلاجية تختلف المهمة، فالغموض هو المنافس. كل سؤال تتركه بلا إجابة عن الإجراء أو المسار أو التكلفة سبب كافٍ ليحجز المريض عند من أجاب عنه. وفي الطلب من الصيدلية، دليل التجارة الإلكترونية المعتاد من عروض إضافية وإنشاء حساب قبل الدفع يعمل ضد مستخدم متعب.',
                ],
                'suits' => [
                    'A clinic losing enquiries that arrive outside working hours',
                    'A practice treating international patients who need the process spelled out',
                    'A pharmacy moving ordering online without turning it into a supermarket',
                    'A doctor whose credentials are the product and are currently buried on the site',
                    'Any health provider handling personal data that must not sit behind a public link',
                ],
                'suits_ar' => [
                    'عيادة تفقد الاستفسارات التي تصل خارج ساعات العمل',
                    'مركز يعالج مرضى من الخارج يحتاجون شرحا واضحا للمسار',
                    'صيدلية تنقل الطلب أونلاين دون أن تحوّله إلى سوبر ماركت',
                    'طبيب مؤهّلاته هي المنتج وهي مدفونة حاليا في الموقع',
                    'أي جهة صحية تتعامل مع بيانات شخصية لا يصح أن تكون خلف رابط مكشوف',
                ],
                'intents' => [
                    'clinic website with online booking', 'dental clinic website development',
                    'appointment booking system for doctors', 'medical tourism website',
                    'online pharmacy ordering system', 'multilingual patient information pages',
                    'healthcare website GDPR and patient data', 'doctor profile and credentials page',
                    'clinic website that takes bookings at night', 'pharmacy app and website',
                ],
                'intents_ar' => [
                    'موقع عيادة بحجز أونلاين', 'تصميم موقع عيادة أسنان',
                    'نظام حجز مواعيد للأطباء', 'موقع سياحة علاجية',
                    'نظام طلب من صيدلية أونلاين', 'صفحات معلومات للمرضى بعدة لغات',
                    'حماية بيانات المرضى في المواقع الطبية', 'صفحة تعريف بالطبيب ومؤهلاته',
                    'موقع عيادة يستقبل الحجوزات ليلا', 'تطبيق وموقع صيدلية',
                ],
                'faq' => [
                    ['q' => 'How do I know the site is worth what it cost?',
                     'a' => 'For a single-practitioner clinic there is one number that settles it: count the bookings that arrive while the clinic is closed. Those are appointments that previously did not happen, or that a receptionist would have had to take. It is measurable from week one and it is the whole return on the project.'],
                    ['q' => 'Where do patient documents and ID photos get stored?',
                     'a' => 'Never behind a direct public link. Files like identity documents and medical records are stored outside the web root and served through a route that checks who is asking. A URL that anyone can guess or forward is the single most common serious mistake I find on healthcare sites.'],
                    ['q' => 'Do international patients need a separate site?',
                     'a' => 'Not a separate site — separate content paths. Procedure explanations written for non-specialists, a transparent process, and a booking route that works identically from abroad. What removes doubt is answering the cost, duration and recovery questions on the page rather than making someone email to find out.'],
                ],
                'faq_ar' => [
                    ['q' => 'كيف أعرف أن الموقع يستحق ما دفعته فيه؟',
                     'a' => 'في عيادة يديرها طبيب واحد هناك رقم واحد يحسم الأمر: احسب الحجوزات التي تصل والعيادة مغلقة. هذه مواعيد لم تكن لتحدث أصلا، أو كان موظف الاستقبال سيضطر لأخذها. وهي قابلة للقياس من الأسبوع الأول وهي العائد كله من المشروع.'],
                    ['q' => 'أين تُخزَّن مستندات المرضى وصور الهوية؟',
                     'a' => 'ليس خلف رابط عام مباشر أبدا. الملفات مثل وثائق الهوية والسجلات الطبية تُخزَّن خارج جذر الموقع وتُقدَّم عبر مسار يتحقق من هوية الطالب. والرابط الذي يمكن لأي أحد تخمينه أو تمريره هو أكثر خطأ خطير أجده في المواقع الطبية.'],
                    ['q' => 'هل يحتاج المرضى الدوليون موقعا منفصلا؟',
                     'a' => 'ليس موقعا منفصلا بل مسارات محتوى منفصلة: شروح للإجراءات مكتوبة لغير المتخصصين، ومسار علاجي شفاف، وطريق حجز يعمل بالطريقة نفسها من الخارج. وما يزيل الشك هو الإجابة عن أسئلة التكلفة والمدة والتعافي على الصفحة بدل إجبار المريض على المراسلة ليعرف.'],
                ],
            ],

            'religious' => [
                'h1' => 'Hajj, Umrah and Islamic Service Platforms',
                'h1_ar' => 'منصات خدمات الحج والعمرة والخدمات الإسلامية',
                'meta_title' => 'Umrah & Hajj Platform Development — Booking, Vetting and Supply',
                'meta_title_ar' => 'تطوير منصات العمرة والحج — الحجز والتوثيق والتوريد',
                'meta_desc' => 'Pilgrim service platforms built for calendar-driven demand: verified providers, package models that hold together, and order states that survive a crowded Mecca connection.',
                'meta_desc_ar' => 'منصات خدمات المعتمرين مبنية لطلب مرتبط بالتقويم: مزوّدون موثّقون، ونماذج باقات متماسكة، وحالات طلب تصمد أمام اتصال ضعيف في مكة المكرمة.',
                'keywords' => 'umrah booking platform, hajj services system, pilgrim services marketplace, umrah package booking software, islamic app development, quran app development',
                'keywords_ar' => 'منصة حجز عمرة, نظام خدمات الحج والعمرة, سوق خدمات المعتمرين, برنامج إدارة باقات العمرة, تطوير تطبيقات إسلامية, برمجة تطبيق قرآن',
                'intro' => [
                    'This sector has one property that changes every technical decision: demand does not arrive evenly. It arrives in waves tied to the religious calendar. The system either holds during those windows or it fails at the exact moment it matters most, to people who travelled a very long way.',
                    'The five platforms here cover a marketplace of vetted providers, year-round flexible packages, water and meal supply to pilgrims in Mecca, and an ad-free, tracker-free Quran platform. The effort in all of them went to the parts nobody photographs — supplier onboarding, order-state durability, and capacity that does not assume an average month.',
                ],
                'intro_ar' => [
                    'لهذا القطاع خاصية واحدة تغيّر كل قرار تقني: الطلب لا يأتي بانتظام، بل يأتي موجات مرتبطة بالتقويم الهجري. وإما أن يصمد النظام في تلك النوافذ أو يفشل في اللحظة التي يكون فيها أهم ما يكون، أمام أناس قطعوا مسافات طويلة.',
                    'المنصات الخمس هنا تغطي سوقا لمزوّدين موثّقين، وباقات مرنة على مدار السنة، وتوريد المياه والوجبات للمعتمرين في مكة المكرمة، ومنصة قرآن بلا إعلانات ولا تتبّع. والجهد فيها كلها ذهب للأجزاء التي لا يصوّرها أحد: تسجيل الموردين، ومتانة حالات الطلب، وسعة لا تفترض شهرا متوسطا.',
                ],
                'suits' => [
                    'An Umrah or Hajj operator selling packages that are more than a product with a price',
                    'A marketplace connecting pilgrims with providers who must be genuinely vetted',
                    'A supplier delivering to Mecca on scheduled windows rather than open-ended shipping',
                    'An organisation taking payment for a service performed hundreds of kilometres away',
                    'Anyone building an Islamic app who wants it free of advertising and tracking',
                ],
                'suits_ar' => [
                    'مكتب عمرة أو حج يبيع باقات ليست مجرد منتج له سعر',
                    'سوق يربط المعتمرين بمزوّدين لا بد أن يكونوا موثّقين فعلا',
                    'مورّد يسلّم في مكة بنوافذ مجدولة لا بشحن مفتوح المدة',
                    'جهة تتقاضى مالا مقابل خدمة تُؤدّى على بعد مئات الكيلومترات',
                    'من يبني تطبيقا إسلاميا ويريده خاليا من الإعلانات والتتبّع',
                ],
                'intents' => [
                    'umrah booking platform development', 'hajj services management system',
                    'pilgrim services marketplace', 'umrah package booking with payment',
                    'multi-vendor marketplace Saudi Arabia', 'provider verification system',
                    'scheduled delivery management Mecca', 'islamic app development',
                    'ad-free quran app', 'travel package booking software',
                ],
                'intents_ar' => [
                    'تطوير منصة حجز عمرة', 'نظام إدارة خدمات الحج',
                    'سوق إلكتروني لخدمات المعتمرين', 'حجز باقات عمرة مع الدفع',
                    'منصة متعددة الموردين في السعودية', 'نظام توثيق مقدمي الخدمات',
                    'إدارة توصيل مجدول في مكة', 'تطوير تطبيقات إسلامية',
                    'تطبيق قرآن بدون إعلانات', 'برنامج حجز باقات سفر',
                ],
                'faq' => [
                    ['q' => 'Why is a package harder to model than a product?',
                     'a' => 'Because a package is not a product with a price — it is a bundle of dated components where changing one shifts the others. Move the arrival date and accommodation, transfers and scheduled services all have to follow. Modelling it as a simple catalogue item ships fastest and then costs a year of patching edge cases that all trace back to the same wrong assumption.'],
                    ['q' => 'How do you handle the Hajj and Ramadan traffic spike?',
                     'a' => 'By designing for the peak rather than the average: caching the catalogue and schedules, queueing anything that is not immediate, capacity that does not assume a normal month, and order states that survive a dropped connection in a crowded area. Load testing happens before the window opens, not after it breaks.'],
                    ['q' => 'How is a provider actually verified rather than just listed?',
                     'a' => 'Qualified status has to be visible in the interface, checkable by the user, and impossible to set by the provider themselves. A marketplace where anyone can list is easy to build and worthless in this category — the entire value is the vetting, so it is the design centre rather than a feature added at the end.'],
                ],
                'faq_ar' => [
                    ['q' => 'لماذا نمذجة الباقة أصعب من نمذجة المنتج؟',
                     'a' => 'لأن الباقة ليست منتجا له سعر، بل حزمة من مكوّنات مؤرَّخة يؤدي تغيير أحدها إلى تحريك البقية. حرّك تاريخ الوصول فيتبعه السكن والانتقالات والخدمات المجدولة. ونمذجتها كصنف بسيط في كتالوج أسرع إطلاقا ثم تكلّف سنة من ترقيع حالات حدّية ترجع كلها للافتراض الخاطئ نفسه.'],
                    ['q' => 'كيف تتعاملون مع ذروة الحج ورمضان؟',
                     'a' => 'بالتصميم للذروة لا للمتوسط: تخزين مؤقت للكتالوج والجداول، وطوابير لكل ما ليس فوريا، وسعة لا تفترض شهرا عاديا، وحالات طلب تصمد أمام انقطاع الاتصال في منطقة مزدحمة. واختبار التحميل يكون قبل فتح النافذة لا بعد انهيارها.'],
                    ['q' => 'كيف يُوثَّق المزوّد فعليا بدل أن يُدرج فقط؟',
                     'a' => 'يجب أن تكون صفة التأهيل ظاهرة في الواجهة، وقابلة للتحقق من المستخدم، ويستحيل أن يضعها المزوّد لنفسه. وسوق يستطيع أي أحد أن يُدرج فيه نفسه سهل البناء وعديم القيمة في هذا المجال، لأن القيمة كلها في التدقيق، فيكون مركز التصميم لا ميزة تُضاف في النهاية.'],
                ],
            ],

            'marketing' => [
                'h1' => 'Agency Sites, Lead Generation and Content Platforms',
                'h1_ar' => 'مواقع وكالات ومسارات جذب عملاء ومنصات محتوى',
                'meta_title' => 'Lead Generation Websites & Arabic Content Platforms',
                'meta_title_ar' => 'مواقع لجذب العملاء ومنصات محتوى عربية',
                'meta_desc' => 'Sites with one measurable job: turn a visitor into a qualified enquiry. Plus Arabic content platforms built for search from the ground up, not translated afterwards.',
                'meta_desc_ar' => 'مواقع لها مهمة واحدة قابلة للقياس: تحويل الزائر إلى استفسار مؤهّل. ومنصات محتوى عربية مبنية للبحث من الأساس لا مترجمة لاحقا.',
                'keywords' => 'lead generation website, b2b enquiry website, marketing agency website, arabic seo website, content directory platform, crm integrated website, conversion focused web design',
                'keywords_ar' => 'موقع لجذب العملاء المحتملين, موقع شركة خدمات, تصميم موقع وكالة تسويق, سيو عربي, منصة محتوى ودليل, ربط الموقع بنظام CRM, تصميم موقع يحوّل الزوار',
                'intro' => [
                    'A site in this category is judged on one number, and it is not traffic. It is qualified enquiries. Everything that does not move a visitor toward that is decoration, however good it looks — and that is a clarifying constraint, because it makes most design arguments answerable with evidence rather than taste.',
                    'The six here split into two kinds. Some capture leads for a service business and push them into a CRM complete rather than half-filled. Others are Arabic content platforms where the entire build is organised around search intent and fast retrieval, because the visitor is not browsing for pleasure — they want one specific answer, often on a slow connection.',
                ],
                'intro_ar' => [
                    'الموقع في هذا التصنيف يُحكم عليه برقم واحد، وليس عدد الزيارات، بل الاستفسارات المؤهَّلة. وكل ما لا يقرّب الزائر من ذلك زخرفة مهما بدا جميلا. وهذا قيد يوضّح الرؤية لأنه يجعل معظم الخلافات التصميمية قابلة للحسم بالدليل لا بالذوق.',
                    'الستة هنا تنقسم لنوعين. بعضها يلتقط عملاء محتملين لنشاط خدمي ويدفعهم لنظام إدارة العلاقات كاملين لا نصف ممتلئين. وبعضها منصات محتوى عربية بُني فيها كل شيء حول نية البحث وسرعة الوصول للمعلومة، لأن الزائر لا يتصفح للمتعة بل يريد إجابة محددة، وغالبا على اتصال بطيء.',
                ],
                'suits' => [
                    'A service business whose leads arrive incomplete and waste a salesperson\'s call',
                    'An agency whose own site is the first work sample every prospect sees',
                    'A B2B seller who needs qualification built into the form, not after it',
                    'An Arabic publisher who wants search structure done properly rather than flipped at the end',
                    'A company whose website and CRM currently do not talk to each other',
                ],
                'suits_ar' => [
                    'نشاط خدمي تصله بيانات ناقصة تضيّع مكالمة مندوب المبيعات',
                    'وكالة موقعها هو أول عيّنة عمل يراها كل عميل محتمل',
                    'بائع للشركات يحتاج التأهيل مبنيا داخل النموذج لا بعده',
                    'ناشر عربي يريد بنية بحث مضبوطة من الأساس لا مقلوبة في النهاية',
                    'شركة موقعها ونظام إدارة عملائها لا يتحدثان مع بعضهما',
                ],
                'intents' => [
                    'lead generation website development', 'website that integrates with CRM',
                    'B2B enquiry form that qualifies leads', 'marketing agency website design',
                    'Arabic SEO website structure', 'content directory website',
                    'landing page that converts', 'service business website',
                    'local business directory platform', 'fast content site for mobile',
                ],
                'intents_ar' => [
                    'تصميم موقع لجذب العملاء', 'ربط الموقع بنظام إدارة العملاء',
                    'نموذج استفسار يؤهّل العملاء', 'تصميم موقع وكالة تسويق',
                    'هيكلة موقع عربي للسيو', 'موقع دليل ومحتوى',
                    'صفحة هبوط عالية التحويل', 'موقع شركة خدمات',
                    'منصة دليل خدمات محلي', 'موقع محتوى سريع على الجوال',
                ],
                'faq' => [
                    ['q' => 'Should the enquiry form be short or detailed?',
                     'a' => 'It is a direct trade between data quality and completion rate, and the right balance depends entirely on how urgent the visitor is. Every extra field is someone who gives up and emails instead — which is worse for both sides, because the request then arrives incomplete and the work starts with three clarifying messages. For B2B, a half-filled lead is worse than no lead: it costs a salesperson a call to find out the enquiry was never serious.'],
                    ['q' => 'Why does Arabic SEO need different work?',
                     'a' => 'Because most Arabic content sites are built as English sites with the direction flipped at the end. Search engines are not fooled and neither are readers. The work is in the fundamentals done in Arabic specifically: URL structure, heading hierarchy, schema markup, and internal linking that still makes sense when the text runs the other way.'],
                    ['q' => 'Is a fast site really worth it for an agency?',
                     'a' => 'For an agency it is a positioning decision, not a technical one. If the site is slow or awkward, no amount of written credibility survives it — the visitor has already sampled the work, and the sample was the website.'],
                ],
                'faq_ar' => [
                    ['q' => 'هل يكون نموذج الاستفسار قصيرا أم مفصّلا؟',
                     'a' => 'هي مقايضة مباشرة بين جودة البيانات ومعدل الإكمال، والتوازن الصحيح يعتمد كليا على مدى استعجال الزائر. كل حقل إضافي يعني شخصا يستسلم ويرسل بريدا بدلا منه، وهو أسوأ للطرفين لأن الطلب يصل ناقصا ويبدأ العمل بثلاث رسائل توضيحية. وفي بيع الشركات، العميل نصف الممتلئ أسوأ من لا شيء: يكلّف مندوبا مكالمة ليكتشف أن الاستفسار لم يكن جادا.'],
                    ['q' => 'لماذا يحتاج السيو العربي عملا مختلفا؟',
                     'a' => 'لأن معظم مواقع المحتوى العربي تُبنى كمواقع إنجليزية ثم يُقلب اتجاهها في النهاية. محركات البحث لا تنخدع بذلك ولا القارئ كذلك. والعمل الحقيقي في ضبط الأساسيات بالعربية تحديدا: بنية الروابط، وتسلسل العناوين، والترميز المنظّم، والربط الداخلي الذي يظل منطقيا حين يسير النص في الاتجاه الآخر.'],
                    ['q' => 'هل تستحق سرعة الموقع هذا الاهتمام لوكالة؟',
                     'a' => 'بالنسبة للوكالة هو قرار تموضع لا قرار تقني. إذا كان الموقع بطيئا أو صعب الاستخدام فلن ينجو أي قدر من المصداقية المكتوبة، لأن الزائر قد جرّب العمل بالفعل، والعينة كانت الموقع نفسه.'],
                ],
            ],

            'restaurant' => [
                'h1' => 'Restaurant Sites With Their Own Ordering — Not a Marketplace\'s',
                'h1_ar' => 'مواقع مطاعم بنظام طلب خاص بها لا بمنصة وسيطة',
                'meta_title' => 'Restaurant Website & Online Ordering Development',
                'meta_title_ar' => 'تصميم مواقع المطاعم وأنظمة الطلب أونلاين',
                'meta_desc' => 'Restaurant websites with built-in ordering and table reservations, so the kitchen keeps the margin a delivery marketplace would otherwise take.',
                'meta_desc_ar' => 'مواقع مطاعم بنظام طلب وحجز طاولات مدمج، ليحتفظ المطعم بهامش الربح الذي كانت ستأخذه منصة التوصيل الوسيطة.',
                'keywords' => 'restaurant website development, online food ordering system, commission free ordering, table reservation system, restaurant menu website, cafe website',
                'keywords_ar' => 'تصميم موقع مطعم, نظام طلب طعام أونلاين, طلب بدون عمولة, نظام حجز طاولات, موقع قائمة طعام, تصميم موقع كافيه',
                'intro' => [
                    'For a small restaurant the difference between owning the ordering flow and renting it from a marketplace is the difference between a profitable order and a break-even one. On thin restaurant margins, a thirty per cent commission is frequently the entire profit.',
                    'The site does not need to compete with the marketplace on reach. It only needs to capture the customers who already know the restaurant — and those are the majority of repeat orders. What it does need is a booking or ordering route that is never more than one tap from any page, because restaurant sites fail on navigation far more often than on aesthetics.',
                ],
                'intro_ar' => [
                    'بالنسبة لمطعم صغير، الفرق بين امتلاك مسار الطلب واستئجاره من منصة وسيطة هو الفرق بين طلب مربح وطلب بلا ربح. وعلى هوامش المطاعم الضيقة، تكون عمولة الثلاثين بالمئة في كثير من الأحيان هي الربح كله.',
                    'الموقع لا يحتاج أن ينافس المنصة في الانتشار، بل يكفي أن يلتقط العملاء الذين يعرفون المطعم أصلا، وهم أغلبية الطلبات المتكررة. لكنه يحتاج مسار حجز أو طلب لا يبعد أكثر من نقرة واحدة من أي صفحة، لأن مواقع المطاعم تفشل في التنقل أكثر بكثير مما تفشل في الجماليات.',
                ],
                'suits' => [
                    'A restaurant handing a third of every delivery order to a marketplace',
                    'A venue whose regulars already know them and would order direct if it were easy',
                    'A kitchen that needs incoming orders in a usable form, not a phone call mid-service',
                    'A restaurant in a distinctive building whose character is not showing on the site',
                    'Any food business whose customers are almost entirely on phones',
                ],
                'suits_ar' => [
                    'مطعم يسلّم ثلث كل طلب توصيل لمنصة وسيطة',
                    'مكان يعرفه زبائنه الدائمون وسيطلبون منه مباشرة لو كان الأمر سهلا',
                    'مطبخ يحتاج الطلبات بشكل قابل للاستخدام لا كمكالمة في ذروة الخدمة',
                    'مطعم في مبنى مميز لا تظهر شخصيته على الموقع',
                    'أي نشاط طعام يأتي عملاؤه من الهواتف تقريبا بالكامل',
                ],
                'intents' => [
                    'restaurant website with online ordering', 'commission free food ordering system',
                    'table reservation system for restaurants', 'restaurant menu website design',
                    'alternative to delivery apps commission', 'cafe website with ordering',
                    'kitchen order management screen', 'local delivery zone setup',
                ],
                'intents_ar' => [
                    'موقع مطعم بنظام طلب أونلاين', 'نظام طلب طعام بدون عمولة',
                    'نظام حجز طاولات للمطاعم', 'تصميم موقع قائمة طعام',
                    'بديل عمولة تطبيقات التوصيل', 'موقع كافيه مع طلب أونلاين',
                    'شاشة إدارة طلبات المطبخ', 'ضبط مناطق التوصيل المحلي',
                ],
                'faq' => [
                    ['q' => 'Will my own site really replace the delivery apps?',
                     'a' => 'It should not try to. The apps are a discovery channel and they are good at it. Your own ordering exists to serve the customers who already know you and would happily order direct — those are the majority of repeat orders, and they are the ones where the commission hurts most.'],
                    ['q' => 'How do orders reach the kitchen?',
                     'a' => 'Through an order management view built for the pace of service, not an email. Orders arrive with state — received, preparing, ready, out — so nobody has to remember what was said on a phone call three minutes ago.'],
                    ['q' => 'How many taps should booking take?',
                     'a' => 'One, from anywhere on the site. If a customer has to navigate to find the reservation or the menu, the design has already lost. This is the single most common failure in restaurant sites and it is entirely avoidable.'],
                ],
                'faq_ar' => [
                    ['q' => 'هل سيحل موقعي فعلا محل تطبيقات التوصيل؟',
                     'a' => 'لا ينبغي أن يحاول. التطبيقات قناة اكتشاف وهي جيدة في ذلك. ونظام الطلب الخاص بك موجود ليخدم من يعرفك أصلا وسيسعد بالطلب مباشرة، وهؤلاء أغلبية الطلبات المتكررة، وهم بالضبط من تؤلم فيهم العمولة أكثر.'],
                    ['q' => 'كيف تصل الطلبات للمطبخ؟',
                     'a' => 'عبر شاشة إدارة طلبات مبنية على إيقاع الخدمة لا عبر بريد إلكتروني. تصل الطلبات ولها حالة — مستلم، قيد التحضير، جاهز، خرج — فلا يضطر أحد لتذكّر ما قيل في مكالمة قبل ثلاث دقائق.'],
                    ['q' => 'كم نقرة يجب أن يستغرق الحجز؟',
                     'a' => 'نقرة واحدة من أي مكان في الموقع. إذا اضطر العميل للتنقل ليجد الحجز أو القائمة فقد خسر التصميم سلفا. وهذا أكثر إخفاق شائع في مواقع المطاعم وهو قابل للتفادي تماما.'],
                ],
            ],

            'events' => [
                'h1' => 'Venue, Hotel and Tourism Booking Platforms',
                'h1_ar' => 'منصات حجز القاعات والفنادق والسياحة',
                'meta_title' => 'Venue & Hotel Booking System Development',
                'meta_title_ar' => 'تطوير أنظمة حجز القاعات والفنادق والرحلات',
                'meta_desc' => 'Booking platforms where availability has to be correct: hourly hotel slots, tour packages with interdependent dates, and venue sites that qualify enquiries before they arrive.',
                'meta_desc_ar' => 'منصات حجز يجب أن تكون الإتاحة فيها صحيحة: حجز فندقي بالساعة، وباقات سياحية بمكوّنات مؤرَّخة مترابطة، ومواقع قاعات تؤهّل الاستفسار قبل وصوله.',
                'keywords' => 'hotel booking system development, hourly booking engine, tour package booking software, wedding venue website, event venue booking, availability and scheduling system',
                'keywords_ar' => 'تطوير نظام حجز فندقي, محرك حجز بالساعة, برنامج حجز باقات سياحية, موقع قاعة أفراح, نظام حجز قاعات مناسبات, نظام إتاحة ومواعيد',
                'intro' => [
                    'Booking looks like a solved problem until the requirements stop being nightly. Ask for stays of two to twelve hours and a simple date-range comparison becomes a genuine scheduling problem: does a three-hour block starting at 14:30 fit between two existing bookings with cleaning time on either side? That single change invalidates most of what a standard booking library gives you free.',
                    'For venues the job is different again. The site\'s work is to disqualify as much as to attract — a couple who learns early that the capacity does not suit them has been served well, and an enquiry that arrives before the capacity, layout and catering questions are settled wastes both sides\' time.',
                ],
                'intro_ar' => [
                    'يبدو الحجز مسألة محلولة حتى تتوقف المتطلبات عن كونها بالليلة. اطلب إقامة من ساعتين إلى اثنتي عشرة ساعة فتتحول المقارنة البسيطة بين تواريخ إلى مسألة جدولة حقيقية: هل تتّسع كتلة من ثلاث ساعات تبدأ 14:30 بين حجزين قائمين مع وقت تنظيف على الجانبين؟ هذا التغيير وحده يُبطل معظم ما تمنحك إياه مكتبة حجز جاهزة مجانا.',
                    'ومهمة موقع القاعة مختلفة تماما. عمله أن يستبعد بقدر ما يجذب، فالعروسان اللذان يعرفان مبكرا أن السعة لا تناسبهما قد خُدما جيدا، والاستفسار الذي يصل قبل حسم أسئلة السعة والتوزيع والضيافة يضيّع وقت الطرفين.',
                ],
                'suits' => [
                    'A hotel selling by the hour, the day-use block or anything other than a night',
                    'A tour operator whose packages are dated components, not products with prices',
                    'A wedding or events venue drowning in enquiries that were never a fit',
                    'A property where double-booking is not an inconvenience but a serious incident',
                    'An operator who needs the public site fast and the booking engine correct',
                ],
                'suits_ar' => [
                    'فندق يبيع بالساعة أو بفترة نهارية أو بأي وحدة غير الليلة',
                    'مكتب سياحة باقاته مكوّنات مؤرَّخة لا منتجات لها أسعار',
                    'قاعة أفراح أو مناسبات تغرق في استفسارات لم تكن مناسبة أصلا',
                    'منشأة يكون فيها الحجز المزدوج حادثة خطيرة لا مجرد إزعاج',
                    'مشغّل يحتاج الموقع العام سريعا ومحرك الحجز صحيحا',
                ],
                'intents' => [
                    'hotel booking system development', 'hourly hotel booking software',
                    'day use booking engine', 'tour package booking system',
                    'wedding venue website with enquiry', 'event hall booking system',
                    'real time availability calendar', 'prevent double booking system',
                    'travel agency website with booking', 'transfer and itinerary management',
                ],
                'intents_ar' => [
                    'تطوير نظام حجز فندقي', 'برنامج حجز فنادق بالساعة',
                    'محرك حجز بفترات نهارية', 'نظام حجز باقات سياحية',
                    'موقع قاعة أفراح باستفسارات', 'نظام حجز قاعات مناسبات',
                    'تقويم إتاحة لحظي', 'منع الحجز المزدوج',
                    'موقع مكتب سياحة مع حجز', 'إدارة الانتقالات وبرامج الرحلات',
                ],
                'faq' => [
                    ['q' => 'Why is hourly booking harder than nightly?',
                     'a' => 'Because you stop asking "is this room free on the 14th" and start asking whether a specific block fits between two existing bookings, with turnaround time reserved on either side. Availability becomes a scheduling calculation with overlap detection, and pricing becomes block-based rather than per night.'],
                    ['q' => 'How do you stop two people booking the same slot?',
                     'a' => 'Checking in code alone is not enough — two requests can read the same value in the same instant. The row gets locked inside a transaction while the booking is written, with a unique constraint in the database as a second layer. Application and database, not one or the other.'],
                    ['q' => 'Should the website and the booking engine be one system?',
                     'a' => 'Usually not. The public site has to be fast and indexable — a traveller comparing options at midnight will not wait. The booking engine has to be correct. Those are different jobs with different failure modes, and serving both from one monolithic layer typically gets you a site that is slow and bookings that are wrong.'],
                ],
                'faq_ar' => [
                    ['q' => 'لماذا الحجز بالساعة أصعب من الحجز بالليلة؟',
                     'a' => 'لأنك تتوقف عن سؤال «هل هذه الغرفة شاغرة يوم 14» وتبدأ بسؤال هل تتّسع كتلة محددة بين حجزين قائمين مع وقت تجهيز محجوز على الجانبين. فتصبح الإتاحة عملية جدولة بكشف تداخل، ويصبح التسعير بالكتل الزمنية لا بالليلة.'],
                    ['q' => 'كيف تمنعون حجز شخصين للفترة نفسها؟',
                     'a' => 'التحقق في الكود وحده لا يكفي، فقد يقرأ طلبان القيمة نفسها في اللحظة ذاتها. يُقفل الصف داخل معاملة أثناء كتابة الحجز، مع قيد فريد في قاعدة البيانات كطبقة ثانية. تطبيق وقاعدة بيانات معا لا أحدهما.'],
                    ['q' => 'هل يكون الموقع ومحرك الحجز نظاما واحدا؟',
                     'a' => 'غالبا لا. الموقع العام يجب أن يكون سريعا وقابلا للأرشفة، فالمسافر الذي يقارن منتصف الليل لن ينتظر. ومحرك الحجز يجب أن يكون صحيحا. وهاتان مهمتان مختلفتان بأنماط فشل مختلفة، وتقديمهما من طبقة واحدة متجانسة ينتهي عادة بموقع بطيء وحجوزات خاطئة.'],
                ],
            ],

            'law' => [
                'h1' => 'Legal Platforms Where Confidentiality Is a Data Problem',
                'h1_ar' => 'منصات قانونية تكون فيها السرية مسألة بيانات لا عرض',
                'meta_title' => 'Legal Tech & Law Firm Platform Development',
                'meta_title_ar' => 'تطوير منصات المحاماة والخدمات القانونية',
                'meta_desc' => 'Platforms for law firms and cross-border legal services: lawyer profiles by qualifying jurisdiction, intake that routes correctly, and confidential-by-default permissions.',
                'meta_desc_ar' => 'منصات لمكاتب المحاماة والخدمات القانونية العابرة للحدود: ملفات محامين حسب الاختصاص، واستقبال قضايا يوجّهها بشكل صحيح، وصلاحيات سرّية افتراضيا.',
                'keywords' => 'legal tech development, law firm website, case management system, cross border legal platform, multilingual legal website, client intake system',
                'keywords_ar' => 'تطوير منصات قانونية, موقع مكتب محاماة, نظام إدارة قضايا, منصة استشارات قانونية دولية, موقع قانوني متعدد اللغات, نظام استقبال قضايا',
                'intro' => [
                    'The hard part of legal software is never the interface. It is modelling who is permitted to see what — and being able to demonstrate that afterwards, to a client or a regulator.',
                    'Most directory-style sites treat access as a display concern: hide the button. In legal work it is a data concern. If the record can be reached, it does not matter that the link was hidden. That distinction shapes the entire permission layer, and it is the first thing I check when reviewing an existing legal platform.',
                ],
                'intro_ar' => [
                    'الجزء الصعب في برمجيات المحاماة ليس الواجهة أبدا، بل نمذجة من يُسمح له برؤية ماذا، والقدرة على إثبات ذلك لاحقا أمام عميل أو جهة رقابية.',
                    'ومعظم المواقع من نوع الدليل تتعامل مع الصلاحيات كمسألة عرض: أخفِ الزر. وفي العمل القانوني هي مسألة بيانات. فإذا كان السجل قابلا للوصول فلا قيمة لكون الرابط مخفيا. هذا التمييز يشكّل طبقة الصلاحيات كلها، وهو أول ما أفحصه عند مراجعة منصة قانونية قائمة.',
                ],
                'suits' => [
                    'A firm whose clients, lawyers and applicable law sit in three different countries',
                    'A practice that needs matters routed to a lawyer actually qualified for them',
                    'An office where "who saw this file" must be answerable months later',
                    'A legal service receiving clients in several languages',
                    'Any platform holding case records that must be confidential by default, not by convention',
                ],
                'suits_ar' => [
                    'مكتب يكون فيه العميل والمحامي والقانون الواجب التطبيق في ثلاث دول مختلفة',
                    'مكتب يحتاج توجيه كل قضية لمحامٍ مؤهَّل لها فعلا',
                    'جهة يجب أن يكون سؤال «من اطّلع على هذا الملف» قابلا للإجابة بعد شهور',
                    'خدمة قانونية تستقبل عملاء بعدة لغات',
                    'أي منصة تحفظ سجلات قضايا يجب أن تكون سرّية افتراضيا لا عُرفا',
                ],
                'intents' => [
                    'law firm website development', 'legal case management system',
                    'client intake and routing system', 'multilingual legal platform',
                    'lawyer directory by jurisdiction', 'confidential document permissions',
                    'legal consultation booking platform', 'audit log for case access',
                ],
                'intents_ar' => [
                    'تصميم موقع مكتب محاماة', 'نظام إدارة قضايا',
                    'نظام استقبال وتوجيه القضايا', 'منصة قانونية متعددة اللغات',
                    'دليل محامين حسب الاختصاص', 'صلاحيات المستندات السرية',
                    'منصة حجز استشارات قانونية', 'سجل تدقيق للاطلاع على القضايا',
                ],
                'faq' => [
                    ['q' => 'Is hiding a button enough to protect a case file?',
                     'a' => 'No, and this is the most common serious flaw in legal platforms. If the record can be reached by anyone who knows or guesses the address, it is exposed regardless of what the interface shows. Permission has to be enforced where the data is fetched, not where the button is drawn.'],
                    ['q' => 'How do you handle clients and lawyers in different jurisdictions?',
                     'a' => 'Lawyer profiles are organised by practice area and qualifying jurisdiction, and intake routes a matter to someone actually qualified for it rather than to whoever is next in a list. The interface is multilingual because clients arrive in different languages, and the applicable law is often a third country again.'],
                    ['q' => 'Can we prove afterwards who accessed a file?',
                     'a' => 'Only if an audit log was built in from the start, append-only, recording who, when and from where. Retrofitting one gives you records from the day you added it and silence before that, which is exactly the period anyone will ask about.'],
                ],
                'faq_ar' => [
                    ['q' => 'هل يكفي إخفاء الزر لحماية ملف قضية؟',
                     'a' => 'لا، وهذا أكثر خلل خطير شيوعا في المنصات القانونية. إذا كان السجل قابلا للوصول لمن يعرف العنوان أو يخمّنه فهو مكشوف مهما أظهرت الواجهة. ويجب فرض الصلاحية عند جلب البيانات لا عند رسم الزر.'],
                    ['q' => 'كيف تتعاملون مع عملاء ومحامين في اختصاصات مختلفة؟',
                     'a' => 'تُنظَّم ملفات المحامين حسب مجال الممارسة والاختصاص القضائي المؤهِّل، ويوجّه استقبال القضايا كل قضية لمن هو مؤهَّل لها فعلا لا لمن يأتي دوره في قائمة. والواجهة متعددة اللغات لأن العملاء يصلون بلغات مختلفة، والقانون الواجب التطبيق غالبا يكون بلدا ثالثا.'],
                    ['q' => 'هل نستطيع إثبات من اطّلع على ملف لاحقا؟',
                     'a' => 'فقط إذا بُني سجل التدقيق من البداية، بالإضافة فقط، يسجّل من ومتى ومن أين. وإضافته لاحقا تعطيك سجلات من يوم إضافته وصمتا قبل ذلك، وهي بالضبط الفترة التي سيسأل عنها أي أحد.'],
                ],
            ],

            'construction' => [
                'h1' => 'Trades and Construction Sites With Two Different Visitors',
                'h1_ar' => 'مواقع المقاولات والحرف لجمهورين مختلفين تماما',
                'meta_title' => 'Construction & Trades Website Development',
                'meta_title_ar' => 'تطوير مواقع المقاولات وشركات الصيانة',
                'meta_desc' => 'Sites for contractors and trades: the emergency route one tap from anywhere, coverage areas done properly, and a planner path for people comparing quotes.',
                'meta_desc_ar' => 'مواقع للمقاولين وشركات الصيانة: مسار الطوارئ على بعد نقرة من أي مكان، ومناطق تغطية مضبوطة، ومسار منفصل لمن يقارن العروض.',
                'keywords' => 'construction company website, contractor website development, emergency call out website, service area pages, roofing company website, maintenance company website',
                'keywords_ar' => 'تصميم موقع شركة مقاولات, موقع مقاول, موقع خدمة طوارئ, صفحات مناطق الخدمة, موقع شركة أسقف, موقع شركة صيانة',
                'intro' => [
                    'A trades site has two entirely separate audiences and designing for only one of them is the common mistake. There is the planner comparing quotes over a week, and there is the person whose ceiling is leaking right now.',
                    'The second one is not going to read a services page first. The emergency route is never more than one tap from anywhere on the site, and any design that makes that person look for the phone number has failed at its only urgent job. The planner gets the coverage areas, the process and the evidence — but never at the expense of the tap.',
                ],
                'intro_ar' => [
                    'لموقع المقاولات جمهوران منفصلان تماما، والتصميم لأحدهما فقط هو الخطأ الشائع. هناك من يخطّط ويقارن العروض على مدى أسبوع، وهناك من يتسرب الماء من سقفه الآن.',
                    'الثاني لن يقرأ صفحة خدمات أولا. مسار الطوارئ لا يبعد أكثر من نقرة واحدة من أي مكان في الموقع، وأي تصميم يجعل ذلك الشخص يبحث عن رقم الهاتف قد فشل في مهمته العاجلة الوحيدة. أما المخطِّط فيحصل على مناطق التغطية والمنهجية والأدلة، لكن ليس على حساب تلك النقرة.',
                ],
                'suits' => [
                    'A contractor offering emergency call-out alongside planned work',
                    'A firm covering several cities that needs each area to be findable',
                    'A trade business whose enquiries currently all arrive by phone with no record',
                    'A company competing on reliability rather than on being the cheapest quote',
                    'Any service whose customers search on a phone, in a hurry, often at night',
                ],
                'suits_ar' => [
                    'مقاول يقدّم خدمة طوارئ إلى جانب الأعمال المجدولة',
                    'شركة تغطي عدة مدن وتحتاج أن تكون كل منطقة قابلة للإيجاد',
                    'نشاط تصله كل الاستفسارات حاليا بالهاتف دون أي سجل',
                    'شركة تنافس على الاعتمادية لا على أرخص عرض سعر',
                    'أي خدمة يبحث عملاؤها من الهاتف على عجل وغالبا ليلا',
                ],
                'intents' => [
                    'construction company website design', 'contractor website with quote request',
                    'emergency call out website', '24/7 service website',
                    'service area pages for local SEO', 'roofing company website',
                    'maintenance company website', 'trades business lead generation',
                ],
                'intents_ar' => [
                    'تصميم موقع شركة مقاولات', 'موقع مقاول بطلب عرض سعر',
                    'موقع خدمة طوارئ على مدار الساعة', 'موقع خدمات 24 ساعة',
                    'صفحات مناطق الخدمة للسيو المحلي', 'موقع شركة أسقف وترميم',
                    'موقع شركة صيانة', 'جذب عملاء لشركات المقاولات',
                ],
                'faq' => [
                    ['q' => 'Do I need a separate page per city I cover?',
                     'a' => 'Only if each page says something genuinely different — the team, the response time, the work actually done there. Ten pages that differ by a swapped city name are the textbook definition of doorway pages and Google treats them as spam. One honest coverage page usually outperforms ten thin ones.'],
                    ['q' => 'Where should the emergency number sit?',
                     'a' => 'Reachable in one tap from every page, on mobile especially — a sticky call action rather than a number buried in a footer. Someone with water coming through a ceiling is not navigating your services menu.'],
                    ['q' => 'Should I publish prices?',
                     'a' => 'Publish the basis, not a fixed figure you cannot honour: what drives cost, what a typical range looks like, and what changes it. Leading with reliability and process rather than price attracts clients who stay, whereas price-led positioning attracts clients who leave for the next cheaper option.'],
                ],
                'faq_ar' => [
                    ['q' => 'هل أحتاج صفحة منفصلة لكل مدينة أغطّيها؟',
                     'a' => 'فقط إذا كانت كل صفحة تقول شيئا مختلفا فعلا: الفريق، وزمن الاستجابة، والأعمال المنفَّذة هناك. عشر صفحات تختلف باسم مدينة مستبدَل هي التعريف الحرفي لصفحات المدخل وتعاملها Google كسبام. وصفحة تغطية واحدة صادقة تتفوق عادة على عشر صفحات ضعيفة.'],
                    ['q' => 'أين يجب أن يكون رقم الطوارئ؟',
                     'a' => 'قابلا للوصول بنقرة واحدة من كل صفحة، وعلى الجوال خصوصا، كزر اتصال ثابت لا رقم مدفون في تذييل الصفحة. فمن يتسرب الماء من سقفه لا يتصفح قائمة خدماتك.'],
                    ['q' => 'هل أنشر الأسعار؟',
                     'a' => 'انشر أساس التسعير لا رقما ثابتا لا تستطيع الالتزام به: ما الذي يحرّك التكلفة، وما النطاق المعتاد، وما الذي يغيّره. والبدء بالاعتمادية والمنهجية بدل السعر يجذب عملاء يبقون، بينما التموضع على السعر يجذب من يرحل لأول خيار أرخص.'],
                ],
            ],
        ];
    }
}
