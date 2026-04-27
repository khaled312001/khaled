<?php $__env->startSection('title', 'Web Development FAQs — Pricing, Timelines, Process | Khaled Ahmed'); ?>
<?php $__env->startSection('description', 'Honest answers to the most common questions about hiring a full stack web developer. Pricing, timelines, technologies, support, and process — from a senior developer with 25+ shipped projects.'); ?>
<?php $__env->startSection('keywords', 'web developer FAQ, hire web developer, web development cost, Laravel developer FAQ, React developer FAQ, web developer Egypt, freelance web developer, Khaled Ahmed'); ?>
<?php $__env->startSection('canonical', url('/faqs')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .faq-hero { padding: 90px 0 40px; background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%); color: #fff; text-align: center; }
    .faq-hero h1 { color: #fff; font-weight: 700; margin-bottom: 14px; }
    .faq-hero p { color: #cbd5e1; max-width: 720px; margin: 0 auto; font-size: 17px; }
    .faq-section { padding: 50px 0; }
    .faq-section h2 { font-size: 24px; font-weight: 700; margin: 30px 0 18px; color: #0f172a; padding-bottom: 10px; border-bottom: 2px solid var(--main-color); }
    .faq-item { border: 1px solid #e5e7eb; border-radius: 10px; margin-bottom: 14px; background: #fff; overflow: hidden; transition: all 0.2s; }
    .faq-item:hover { border-color: var(--main-color); box-shadow: 0 4px 12px rgba(37,99,235,0.06); }
    .faq-item summary { padding: 18px 22px; font-weight: 600; font-size: 17px; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; color: #0f172a; }
    .faq-item summary::-webkit-details-marker { display: none; }
    .faq-item summary::after { content: '+'; font-size: 24px; color: var(--main-color); transition: transform 0.2s; line-height: 1; }
    .faq-item[open] summary::after { content: '−'; }
    .faq-item .answer { padding: 0 22px 22px; color: #475569; line-height: 1.75; font-size: 15.5px; }
    .faq-item .answer p { margin-bottom: 12px; }
    .faq-item .answer ul { padding-left: 20px; margin-bottom: 12px; }
    .faq-item .answer li { margin-bottom: 6px; }
    .faq-cta { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 50px 40px; border-radius: 16px; text-align: center; margin-top: 40px; }
    .faq-cta h2 { color: #fff; font-size: 26px; margin-bottom: 14px; border: none; padding: 0; }
    .faq-cta p { color: rgba(255,255,255,0.92); margin-bottom: 24px; max-width: 580px; margin-left: auto; margin-right: auto; }
    .faq-cta .btn-cta { background: #fff; color: #1e40af; padding: 14px 32px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; }
    .faq-cta .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    @media (max-width: 768px) {
        .faq-hero { padding: 70px 0 30px; }
        .faq-hero h1 { font-size: 26px; }
        .faq-section h2 { font-size: 20px; }
        .faq-item summary { font-size: 15px; padding: 16px 18px; }
        .faq-item .answer { padding: 0 18px 18px; font-size: 15px; }
        .faq-cta { padding: 32px 20px; }
        .faq-cta h2 { font-size: 21px; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php
$faqGroupsAr = [
    'الأسعار والميزانيه' => [
        ['كم يكلّف الموقع المخصص في 2026؟', 'تكلفه الموقع المخصص في 2026 بتتراوح من $1,500 لموقع تسويقي بتصميم مخصص حتى $50,000+ لمنصه SaaS كامله. السعر العادل لموقع شركه صغيره $3,000–$8,000، متجر إلكتروني $5,000–$25,000، تطبيق ويب مخصص $8,000–$35,000. المتغيرات اللي بتحرّك السعر: وضوح النطاق، تعقيد التكاملات، والمده الزمنيه. ببعت عرض مكتوب بمراحل وتسليمات ثابته قبل أي شغل.'],
        ['بتحاسب بالساعه أم بسعر ثابت؟', 'الاتنين، حسب المشروع. سعر ثابت للشغل واضح النطاق اللي التسليمات فيه واضحه — أحسن للعملاء اللي عايزين تأكيد للميزانيه. بالساعه ($30–$60/ساعه لفُل ستاك خبير) للشغل الغامض أو الاستكشافي أو الصيانه. مدفوعات بمراحل للمشاريع المتوسطه والكبيره عشان تدفع بس على المراحل المكتمله.'],
        ['إيه اللي مشمول في السعر؟', 'الاكتشاف والتخطيط، تصميم UI/UX، تطوير الواجهات والخلفيه، تصميم قواعد البيانات، إعداد النشر، تركيب SSL، SEO أساسي (meta tags, sitemap, schema)، 30 يوم إصلاح أخطاء بعد الإطلاق، ووثائق تسليم كامله. كتابه المحتوى والتصوير والصيانه المستمره بتتسعّر لوحدها.'],
        ['إيه جدول الدفع؟', 'عاده 30% مقدمًا للبدء، 40% على مرحله محدده في منتصف المشروع، و 30% عند الإطلاق. للارتباطات الأطول بفوتر شهريًا حسب نطاق مكتوب. عمري ما باطلب 100% مقدّمًا — ده علامه تحذير من أي مطوّر.'],
        ['في تكاليف خفيه بعد الإطلاق؟', 'مفيش مفاجآت مني. التكاليف المتكرره اللي تتوقعها: استضافه ($5–$50/شهر لمعظم المواقع)، تسجيل دومين ($10–$25/سنه)، خدمه إيميل لو حبيت ($6/مستخدم/شهر)، والصيانه — احسب 10–20% من تكلفه البناء سنويًا للتحديثات الأمنيه وضبط الأداء وتغييرات صغيره.'],
    ],
    'الجدول الزمني وطريقه العمل' => [
        ['كم بياخد بناء الموقع؟', 'الجداول الواقعيه: موقع تسويقي بسيط 2–4 أسابيع، موقع شركه بتصميم مخصص 4–8 أسابيع، متجر إلكتروني 6–12 أسبوع، تطبيق ويب مخصص 3–6 شهور. دي واقعيه بنطاق صحيح. أي حد بيوعد بتطبيق معقّد في "أسبوعين" بيكذب أو بيسلّم حاجه مكسوره.'],
        ['إيه طريقه عملك في التطوير؟', 'طريقتي 5 مراحل: <strong>1) الاكتشاف</strong> — مكالمه 30 دقيقه لفهم الأهداف والقيود. <strong>2) العرض</strong> — نطاق وجدول ومراحل وسعر مكتوب. <strong>3) التصميم</strong> — Figma mockups للموافقه قبل الكود. <strong>4) التطوير</strong> — demo أسبوعي على staging URL تشوف فيه التقدم كل جمعه. <strong>5) الإطلاق</strong> — نشر، تدريب، و 30 يوم إصلاح مجاني.'],
        ['هتشوف التقدم خلال المشروع؟', 'أيوه. كل مشروع بياخد staging URL من الأسبوع الأول، بيتحدّث أسبوعيًا. تشوف تقدم حقيقي مش screenshots. demos كل جمعه عبر Zoom أو Loom عشان تقدر تدّي feedback وقت ما يكون التغيير رخيص.'],
        ['لو محتاج تغييرات خلال المشروع؟', 'التعديلات الصغيره ضمن النطاق مشموله. تغييرات النطاق الأكبر بتاخد طلب تغيير مكتوب فيه السعر وتأثير الجدول. ده بيحمي الاتنين من "scope creep" — السبب الأول لفشل المشاريع.'],
        ['بتوقّع NDA؟', 'أيوه. باوقّع NDAs متبادله كافتراضي لأي مشروع بتشارك فيه منطق الأعمال أو بيانات العملاء أو خطط استراتيجيه.'],
    ],
    'أسئله تقنيه' => [
        ['إيه التقنيات اللي بتتخصّص فيها؟', '<strong>الخلفيه:</strong> PHP/Laravel (Eloquent, Sanctum, Filament, Inertia)، Node.js (Express, NestJS)، MySQL، PostgreSQL، MongoDB، Redis. <strong>الواجهه:</strong> React.js (Next.js, Vite)، Vue.js (Nuxt)، TypeScript، Tailwind CSS، Bootstrap. <strong>DevOps:</strong> Linux، Nginx، Docker، GitHub Actions، Cloudflare، استضافه على DigitalOcean و AWS و Hostinger.'],
        ['تقدر تشتغل على codebase موجود؟', 'أيوه. باستلم مشاريع Laravel و WordPress و React و Node.js موجوده باستمرار. الخطوه الأولى تدقيق مدفوع لمده أسبوع باسلّم فيه تقرير مكتوب عن صحه الكود والأمن وتحسينات بأولويات. بعدها بنتفق على النطاق.'],
        ['بتبني تطبيقات موبايل؟', 'بابني مواقع ويب mobile-first responsive و PWA (تطبيقات ويب تقدميه) بتتثبت على الموبايل بدون متجر تطبيقات. للتطبيقات الـ native iOS و Android، باشتغل مع متخصصين React Native في شبكتي — أنا باعمل project management وباسلّم النتيجه.'],
        ['الموقع هيشتغل على الموبايل؟', 'أيوه — كل موقع بابنيه mobile-first. حركه الموبايل دلوقتي 65%+ من الويب في 2026؛ البناء "للديسكتوب أولًا" خطأ احترافي. باختبر على أجهزه Android و iOS حقيقيه قبل الإطلاق، مش بس Chrome DevTools.'],
        ['بتحسّن SEO؟', 'أيوه — SEO تقني مشمول في كل مشروع. ده يعني: HTTPS، canonicals صحيحه، XML sitemap، schema markup (JSON-LD)، تحسين Core Web Vitals، توافق موبايل، HTML دلالي، وإمكانيه الوصول (WCAG 2.2 AA). للـ SEO المحتوي وبناء الروابط المستمر، باحيل لمتخصصين موثوقين أو باشتغل مع فريق SEO عندك.'],
        ['كيف بتتعامل مع الأمن؟', 'الأمن مدمج، مش مضاف. كل مشروع فيه: bcrypt/argon2 لتشفير كلمات السر، حمايه CSRF، parameterized queries، منع XSS، rate limiting، security headers (CSP, HSTS, X-Frame-Options)، أسرار مشفّره، وحمايه من OWASP Top 10. تحديثات منتظمه للـ dependencies عبر Dependabot.'],
    ],
    'الدعم والصيانه' => [
        ['بتقدّم صيانه مستمره؟', 'أيوه. بعد فتره الـ 30 يوم المجانيه لإصلاح الأخطاء، باعرض عقود صيانه شهريه تبدأ من $200/شهر للمواقع الصغيره و $800/شهر لتطبيقات الويب النشطه. شامله تحديثات أمنيه، تحديث dependencies، التحقق من النسخ الاحتياطيه، مراقبه الأداء، وميزانيه ساعات للتغييرات الصغيره.'],
        ['لو الموقع نزل؟', 'عملاء الصيانه بياخدوا رد في نفس اليوم في أيام العمل وخلال 4 ساعات للمشاكل الحرجه. باراقب الـ uptime عبر UptimeRobot و Sentry على كل مشروع باستضيفه. معظم الانقطاعات بتتحل قبل ما العملاء يلاحظوا.'],
        ['هتدرّب فريقي؟', 'أيوه. كل مشروع فيه جلسه تسليم ساعه واحده باشرح فيها لفريقك لوحه التحكم وعمليه النشر والمهام الشائعه. بسجّل الجلسه كمرجع دائم. وقت التدريب الإضافي بياخد فاتوره.'],
        ['مين يملك الكود بعد الإطلاق؟', 'أنت — 100%. الكود بيتسلّم عبر GitHub repository بتاعك، الاستضافه على حسابات أنت تملكها، الدومينات مسجله باسمك. عمري ما خلّيت عميل رهينه بأدوات مملوكه.'],
        ['بتقدّم وثائق؟', 'أيوه. كل مشروع بيخرج بـ README بيشرح التركيب والنشر و environment variables والقرارات المعماريه. منطق الأعمال الحرج موثّق inline. نقاط الـ API بتاخد OpenAPI/Swagger docs مولّده تلقائيًا من الكود.'],
    ],
    'التعاون معًا' => [
        ['في أي توقيتات بتشتغل؟', 'موجود في مصر (UTC+2) لكن باتقاطع مع معظم التوقيتات العالميه. سلّمت مشاريع لعملاء في الولايات المتحده والمملكه المتحده والسعوديه والإمارات وألمانيا وكندا ومصر. تواصل async أولًا عبر Slack أو Notion أو إيميل — daily standups متاحه للمشاريع النشطه.'],
        ['بتشتغل مع عملاء دوليين؟', 'أيوه. 60% من شغلي دولي. بافوتر بالدولار أو اليورو، باقبل مدفوعات عبر Wise و PayPal و wire دولي. مرتاح مع عقود US/UK/EU وباقدّم W-8BEN أو ما يعادله.'],
        ['تقدر تشتغل كجزء من فريقي الموجود؟', 'أيوه. عملت عقود embedded انضميت فيها لفريق العميل عبر Slack، حضرت standups، اشتغلت في GitHub repo بتاعهم، وسلّمت زي ما لو كنت موظف بدوام كامل. أقل ارتباط: شهر بـ 20+ ساعه/أسبوع.'],
        ['بتاخد مشاريع صغيره؟', 'أيوه — landing pages وإصلاح أخطاء ومكالمات استشاريه أقل من $1,000 مرحب بها. أقل ارتباط استشاره مدفوعه 30 دقيقه ($75) باسلّم فيها توصيه مكتوبه. من هنا بنقرر لو المشروع منطقي.'],
        ['لو مش الاختيار المناسب لبعض؟', 'هاقولك. مكالمه الاكتشاف مجانيه تحديدًا عشان نقرر بصدق. لو مشروعك محتاج تخصص مختلف، هاحيلك لحد أنسب. باحب أخسر مشروع على أن أسلّم شغل أنا مش الشخص المناسب له.'],
    ],
    'التوظيف والارتباط' => [
        ['كيف ابدأ شغل معاك؟', 'ثلاث خطوات: <strong>1)</strong> ابعت ملخص مشروعك عبر <a href="/contact">صفحه التواصل</a> — حتى فقره واحده تكفي. <strong>2)</strong> بارد خلال 24 ساعه إما بمكالمه اكتشاف 30 دقيقه أو "ده مش تخصصي، ده الشخص اللي تكلّمه." <strong>3)</strong> لو مناسبين، بتاخد عرض مكتوب خلال 3 أيام عمل. مفيش عروض، مفيش التزام لحد ما تقول "ابدأ."'],
        ['متاح للعمل بدوام كامل؟', 'دلوقتي باخد 2–3 عملاء طويلي الأمد في نفس الوقت، باشتغل 20–40 ساعه/أسبوع لكل عميل. عقود embedded بدوام كامل متاحه؛ التوظيف بدوام كامل لأ.'],
        ['تقدر تبدأ فورًا؟', 'وقت البدء النموذجي 2–4 أسابيع للمشاريع الجديده. الشغل العاجل ممكن أحيانًا — اسأل. الصيانه وإصلاح الأخطاء لعملاء حاليين دايمًا أولويه.'],
        ['كيف أعرف إنك تقدر تسلّم اللي بتوعد بيه؟', 'ثلاث طرق للتحقق: <strong>1)</strong> روابط مباشره من مشاريع سابقه في <a href="/portfolios">سابقه أعمالي</a>. <strong>2)</strong> مراجع عملاء عند الطلب. <strong>3)</strong> تجربه مدفوعه أسبوع للارتباطات الأكبر — اشتغل جنبي على جزء صغير قبل ما تلتزم بالمشروع كامل.'],
        ['إيه ضمانك؟', 'باسلّم على النطاق المكتوب، في الجدول المتفق عليه، بالسعر المتفق عليه. الأخطاء في الميزات المسلّمه بتتصلّح مجانًا خلال فتره الـ 30 يوم بعد الإطلاق. لو ما سلّمتش، ما بتدفعش المرحله الأخيره — ده الضمان كله.'],
    ],
];

$faqGroupsEn = [
    'Pricing & Budget' => [
        ['How much does a custom website cost in 2026?', 'Custom website costs in 2026 range from $1,500 for a designed marketing site to $50,000+ for a full SaaS platform. The fair price for a small-business website is $3,000–$8,000, an e-commerce site $5,000–$25,000, a custom web application $8,000–$35,000. The variables that move the price are scope clarity, integration complexity, and timeline. I send a written proposal with milestones and fixed deliverables before any work starts.'],
        ['Do you charge hourly or fixed-price?', 'Both, depending on the project. Fixed-price for well-scoped work where the deliverables are clear upfront — better for clients who want budget certainty. Hourly ($30–$60/hour for senior full stack) for ambiguous, exploratory, or maintenance work. Milestone-based payments for medium-to-large projects so you only pay for completed phases.'],
        ['What is included in the price?', 'Discovery and planning, UI/UX design, frontend and backend development, database design, deployment setup, SSL configuration, basic SEO (meta tags, sitemap, schema), 30 days of post-launch bug fixes, and full handoff documentation. Additional content writing, photography, and ongoing maintenance are quoted separately.'],
        ['What is the payment schedule?', 'Typically 30% upfront to start, 40% on a defined mid-project milestone, and 30% on launch. For longer engagements I bill monthly against a written scope. I never ask for 100% upfront — that is a red flag from any developer.'],
        ['Are there hidden costs after launch?', 'No surprises from me. The recurring costs you should expect: hosting ($5–$50/month for most sites), domain registration ($10–$25/year), email service if needed ($6/user/month), and maintenance — budget 10–20% of build cost per year for security updates, performance tuning, and small feature changes.'],
    ],
    'Timeline & Process' => [
        ['How long does it take to build a website?', 'Real timelines: a simple marketing site takes 2–4 weeks, a designed business site 4–8 weeks, an e-commerce site 6–12 weeks, and a custom web application 3–6 months. These are realistic with proper scope. Anyone promising a complex application in "2 weeks" is either lying or about to deliver something broken.'],
        ['What is your development process?', 'My process has five phases: <strong>1) Discovery</strong> — a 30-minute call to understand goals and constraints. <strong>2) Proposal</strong> — written scope, timeline, milestones, and price. <strong>3) Design</strong> — Figma mockups for your approval before code. <strong>4) Development</strong> — weekly demo on a staging URL so you see progress every Friday. <strong>5) Launch</strong> — deployment, training, and 30 days of free bug fixes.'],
        ['Will I see progress along the way?', 'Yes. Every project gets a staging URL from week 1, updated weekly. You see real progress, not screenshots. Weekly Friday demos via Zoom or Loom so you can give feedback while it is cheap to change.'],
        ['What if I need changes during the project?', 'Small tweaks within scope are included. Larger scope changes get a written change request with a price and timeline impact. This protects both of us from "scope creep" — the #1 reason projects fail.'],
        ['Do you sign an NDA?', 'Yes. I sign mutual NDAs as a default for any project where you share business logic, customer data, or strategic plans.'],
    ],
    'Technical Questions' => [
        ['What technologies do you specialize in?', '<strong>Backend:</strong> PHP/Laravel (Eloquent, Sanctum, Filament, Inertia), Node.js (Express, NestJS), MySQL, PostgreSQL, MongoDB, Redis. <strong>Frontend:</strong> React.js (Next.js, Vite), Vue.js (Nuxt), TypeScript, Tailwind CSS, Bootstrap. <strong>DevOps:</strong> Linux, Nginx, Docker, GitHub Actions, Cloudflare, hosting on DigitalOcean, AWS, Hostinger.'],
        ['Can you work with my existing codebase?', 'Yes. I take over existing Laravel, WordPress, React, and Node.js projects regularly. The first step is a 1-week paid audit where I deliver a written report on code health, security, and prioritized improvements. After that we agree on scope.'],
        ['Do you build mobile apps?', 'I build mobile-first responsive websites and Progressive Web Apps (PWAs) that install on phones without an app store. For native iOS and Android, I work with trusted React Native specialists in my network — I project-manage and deliver the result.'],
        ['Will my website work on mobile?', 'Yes — every website I build is mobile-first. Mobile traffic is 65%+ of the web in 2026; building "desktop first" is professional malpractice. I test on real Android and iOS devices before launch, not just Chrome DevTools.'],
        ['Do you optimize for SEO?', 'Yes — technical SEO is included in every project. That means: HTTPS, proper canonicals, XML sitemap, schema markup (JSON-LD), Core Web Vitals optimization, mobile-friendliness, semantic HTML, and accessibility (WCAG 2.2 AA). For ongoing content SEO and link building, I refer trusted specialists or work alongside your SEO team.'],
        ['How do you handle security?', 'Security is built in, not bolted on. Every project includes: bcrypt/argon2 password hashing, CSRF protection, parameterized queries, XSS prevention, rate limiting, security headers (CSP, HSTS, X-Frame-Options), encrypted secrets, and OWASP Top 10 mitigation. Regular dependency updates via Dependabot.'],
    ],
    'Support & Maintenance' => [
        ['Do you offer ongoing maintenance?', 'Yes. After the 30-day free bug-fix period, I offer monthly maintenance retainers starting at $200/month for small sites and $800/month for active web apps. Includes security patches, dependency updates, backups verification, performance monitoring, and a budget of hours for small changes.'],
        ['What happens if my site goes down?', 'Maintenance clients get same-day response on weekdays and within 4 hours on critical issues. I monitor uptime via UptimeRobot and Sentry on every project I host. Most outages are resolved before clients notice.'],
        ['Will you train my team?', 'Yes. Every project includes a 1-hour handoff session where I walk your team through the admin panel, deployment process, and common tasks. I record the session as a permanent reference. Additional training time is billable.'],
        ['Who owns the code after launch?', 'You do — 100%. Code is delivered via your own GitHub repository, hosting is on accounts you own, domains stay registered to you. I never hold a client hostage with proprietary tooling.'],
        ['Do you provide documentation?', 'Yes. Every project ships with a README covering setup, deployment, environment variables, and architecture decisions. Critical business logic is documented inline. API endpoints get OpenAPI/Swagger docs auto-generated from the code.'],
    ],
    'Working Together' => [
        ['What time zones do you work in?', 'I am based in Egypt (UTC+2) but I overlap with most global time zones. I have shipped projects for clients in the United States, United Kingdom, Saudi Arabia, UAE, Germany, Canada, and Egypt. Async-first communication via Slack, Notion, or email — daily standups available for active projects.'],
        ['Do you work with international clients?', 'Yes. 60% of my work is international. I invoice in USD or EUR, accept payments via Wise, PayPal, or international wire. I am comfortable with US/UK/EU contracts and provide W-8BEN or equivalent forms.'],
        ['Can you work as part of my existing team?', 'Yes. I have done embedded contracts where I join a client team via Slack, attend standups, work in their GitHub repo, and ship as if I were a full-time hire. Minimum engagement: 1 month at 20+ hours/week.'],
        ['Do you take on small projects?', 'Yes — landing pages, bug fixes, and consulting calls under $1,000 are welcome. The minimum engagement is a 30-minute paid consultation ($75) where I deliver a written recommendation. From there we decide if a project makes sense.'],
        ['What if we are not a good fit?', 'I will tell you. The discovery call is free precisely so we can both decide honestly. If your project needs a different specialty, I will refer you to someone better suited. I would rather lose a project than deliver work I am not the right person for.'],
    ],
    'Hiring & Engagement' => [
        ['How do I start working with you?', 'Three steps: <strong>1)</strong> Send your project brief via the <a href="/contact">contact page</a> — even a paragraph is enough. <strong>2)</strong> I respond within 24 hours with either a 30-minute discovery call or a quick "this is not my specialty, here is who you should call." <strong>3)</strong> If we are a fit, you get a written proposal within 3 business days. No proposals, no commitment until you say "go."'],
        ['Are you available for full-time roles?', 'I currently take on 2–3 long-term clients at a time, working 20–40 hours/week per client. Full-time embedded contracts are available; full-time employment is not.'],
        ['Can you start immediately?', 'My typical lead time is 2–4 weeks for new projects. Urgent work is sometimes possible — ask. Maintenance and bug fixes for existing clients always have priority.'],
        ['How do I know you can deliver what you promise?', 'Three ways to verify: <strong>1)</strong> Live URLs from past projects in my <a href="/portfolios">portfolio</a>. <strong>2)</strong> Client references on request. <strong>3)</strong> A paid 1-week pilot for larger engagements — work alongside me on a small piece before committing to the full project.'],
        ['What is your guarantee?', 'I deliver on the written scope, on the agreed timeline, at the agreed price. Bugs in delivered features get fixed for free during the 30-day post-launch period. If I do not deliver, I do not get paid the final milestone — that is the whole guarantee.'],
    ],
];

$faqGroups = app()->getLocale() === 'ar' ? $faqGroupsAr : $faqGroupsEn;
?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php $first = true; ?>
        <?php $__currentLoopData = $faqGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$first): ?>,<?php endif; ?>
                {
                    "@type": "Question",
                    "name": <?php echo json_encode($item[0], 15, 512) ?>,
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": <?php echo json_encode(strip_tags($item[1]), 15, 512) ?>
                    }
                }
                <?php $first = false; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"<?php echo e(url('/')); ?>"},
        {"@type":"ListItem","position":2,"name":"FAQs","item":"<?php echo e(url('/faqs')); ?>"}
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="faq-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h1><?php echo e(app()->getLocale() === 'ar' ? 'الأسئلة الشائعة' : 'Frequently Asked Questions'); ?></h1>
                <p><?php echo e(app()->getLocale() === 'ar' ? 'إجابات صريحه على أكثر الأسئله شيوعًا حول توظيف مطوّر ويب فُل ستاك خبير. الأسعار، المدد الزمنيه، التقنيات، طريقه العمل والدعم — كأنك على مكالمه استكشافيه.' : 'Honest answers to the most common questions about hiring a senior full stack web developer. Pricing, timelines, technologies, process, and support — answered the way I would answer them on a discovery call.'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="faq-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <?php $__currentLoopData = $faqGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2><?php echo e($group); ?></h2>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <details class="faq-item" <?php if($loop->parent->first && $i === 0): ?> open <?php endif; ?>>
                            <summary><?php echo e($item[0]); ?></summary>
                            <div class="answer">
                                <p><?php echo $item[1]; ?></p>
                            </div>
                        </details>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="faq-cta">
                    <h2>Still Have Questions?</h2>
                    <p>The fastest way to get an answer is a 30-minute discovery call. No sales pitch — just an honest conversation about your project.</p>
                    <a href="<?php echo e(route('contact')); ?>" class="btn-cta">Book a Free Call <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\faqs.blade.php ENDPATH**/ ?>