

<?php $__env->startSection('title', 'Web Development Services — Laravel, React, Node.js, Hosting & Training | Khaled Ahmed'); ?>
<?php $__env->startSection('description', 'Hire a senior full stack developer. Services: custom web apps with Laravel & Node.js, React frontends, e-commerce builds, SEO-ready websites, web hosting & DevOps, and 1-on-1 coding mentorship. 5+ years, 25+ shipped projects, 7 countries.'); ?>
<?php $__env->startSection('keywords', 'web development services, hire full stack developer, Laravel developer, React developer, Node.js developer, web hosting services, DevOps services, coding mentor, programming instructor, e-commerce developer, custom web application, SEO web development, Khaled Ahmed services'); ?>
<?php $__env->startSection('canonical', 'https://khaledahmed.net/services'); ?>
<?php $__env->startSection('og_title', 'Web Development Services — Laravel, React & Node.js by Khaled Ahmed'); ?>
<?php $__env->startSection('og_description', 'Custom web apps, e-commerce, hosting/DevOps, and coding mentorship from a senior full stack developer with 25+ shipped projects.'); ?>
<?php $__env->startSection('og_image', asset('images/logo.png')); ?>
<?php $__env->startSection('og_image_alt', 'Web Development Services - Khaled Ahmed'); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "Khaled Ahmed — Web Development Services",
    "url": "https://khaledahmed.net/services",
    "image": "<?php echo e(asset('images/logo.png')); ?>",
    "description": "Senior full stack web development services: Laravel, React, Node.js, hosting, DevOps and coding mentorship.",
    "priceRange": "$$",
    "areaServed": ["EG","SA","AE","KW","QA","US","GB"],
    "provider": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "jobTitle": "Senior Full Stack Web Developer",
        "url": "https://khaledahmed.net",
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ]
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Web Development Services",
        "itemListElement": [
            {"@type":"Offer","itemOffered":{"@type":"Service","name":"Full Stack Web Development","description":"End-to-end web application development from frontend to backend, database, and deployment using Laravel, Node.js, and React."}},
            {"@type":"Offer","itemOffered":{"@type":"Service","name":"Frontend Development","description":"Pixel-perfect, responsive UI implementation using React.js, HTML5, CSS3, JavaScript ES6+, and Bootstrap. Figma/Adobe XD to production code."}},
            {"@type":"Offer","itemOffered":{"@type":"Service","name":"Backend Development","description":"Robust server-side development with PHP/Laravel and Node.js. RESTful API design, database management (MySQL, MongoDB), authentication, and queues."}},
            {"@type":"Offer","itemOffered":{"@type":"Service","name":"Web Hosting and DevOps","description":"cPanel, VPS configuration, domain setup, SSL, DNS, deployments on Vercel, Netlify, and Linux servers."}},
            {"@type":"Offer","itemOffered":{"@type":"Service","name":"UI/UX Implementation","description":"Translating design mockups into interactive, accessible web experiences. Responsive design, cross-browser, and smooth micro-animations."}},
            {"@type":"Offer","itemOffered":{"@type":"Service","name":"Coding Training and Mentoring","description":"1-on-1 mentorship and live training in modern web technologies for beginners to intermediate developers."}}
        ]
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"https://khaledahmed.net/"},
        {"@type":"ListItem","position":2,"name":"Services","item":"https://khaledahmed.net/services"}
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {"@type":"Question","name":"How much does a custom web application cost?","acceptedAnswer":{"@type":"Answer","text":"Most custom web apps land between $2,000 and $15,000 depending on scope, integrations, and timeline. A simple marketing site with a CMS is closer to the lower end, a SaaS MVP with auth, billing, and an admin panel is in the middle, and complex multi-tenant platforms are at the higher end. I send a fixed-fee quote within 24 hours of a project brief."}},
        {"@type":"Question","name":"Do you work with international clients?","acceptedAnswer":{"@type":"Answer","text":"Yes — I have shipped 25+ production projects for clients across 7 countries (Egypt, Saudi Arabia, UAE, Kuwait, Qatar, US, and UK). Communication in English or Arabic, daily updates, and async-friendly handoffs."}},
        {"@type":"Question","name":"Which stack do you use?","acceptedAnswer":{"@type":"Answer","text":"Laravel or Node.js for backend, React for frontend, MySQL or PostgreSQL for relational data, Redis for cache and queues, and Linux/cPanel/VPS for hosting. I pick the stack that fits the project — not the other way around."}},
        {"@type":"Question","name":"Can you take over a half-finished project?","acceptedAnswer":{"@type":"Answer","text":"Yes. I have rescued multiple projects abandoned by previous developers. I start with a one-day audit, deliver a written report on what is salvageable, and only quote the rebuild work after we agree on scope."}},
        {"@type":"Question","name":"Do you provide ongoing maintenance?","acceptedAnswer":{"@type":"Answer","text":"Yes — monthly retainers cover bug fixes, security patches, hosting monitoring, backups, and small feature additions. Most clients keep me on retainer after launch."}},
        {"@type":"Question","name":"How fast can you start?","acceptedAnswer":{"@type":"Answer","text":"Discovery calls typically happen within 24 hours of contact. Most projects start within 1 week. Urgent fixes (down sites, security incidents) are usually addressed the same day."}}
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .services-bg-img { display: none !important; }
    .services-trust { background: #f8fafc; padding: 50px 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; }
    .services-trust .stat { text-align: center; }
    .services-trust .num { font-size: 36px; font-weight: 800; color: var(--main-color); line-height: 1; }
    .services-trust .lbl { font-size: 14px; color: #475569; margin-top: 6px; }
    .services-faq { background: #fff; padding: 60px 0; }
    .services-faq h2 { font-size: 28px; font-weight: 700; margin-bottom: 30px; text-align: center; }
    .services-faq details { background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 12px; padding: 18px 22px; margin-bottom: 12px; }
    .services-faq details[open] { border-color: var(--main-color); }
    .services-faq summary { cursor: pointer; font-weight: 600; color: #0f172a; font-size: 16px; }
    .services-faq summary::marker { color: var(--main-color); }
    .services-faq details p { color: #475569; margin-top: 12px; line-height: 1.7; }
    .services-cta { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 50px 40px; border-radius: 16px; text-align: center; margin: 50px 0; }
    .services-cta h2 { color: #fff; font-size: 28px; margin-bottom: 14px; }
    .services-cta p { color: rgba(255,255,255,0.92); margin-bottom: 24px; max-width: 620px; margin-left: auto; margin-right: auto; }
    .services-cta a { background: #fff; color: #1e40af; padding: 14px 32px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1><?php echo e(__('site.page_services_h1')); ?></h1>
                    <ul class="breadcrumb-links">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a></li>
                        <li class="active"><?php echo e(__('site.page_services_h1')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Services Section Start //-->
<section class="section pb-minus-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading text-center">
                    <span class="section-badge"><i class="fas fa-bolt"></i> <?php echo e(__('site.page_services_h1')); ?></span>
                    <h2 class="section-title-h2"><?php echo e(__('site.services_what_offer')); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                <div class="services-item">
                    <div class="body">
                        <h4>01</h4>
                        <h5>Full Stack Web Development</h5>
                        <p>End-to-end web application development from frontend interfaces to backend APIs and database design. Building scalable, production-ready solutions using modern technologies.</p>
                        <div class="btn-box">
                            <a href="<?php echo e(route('contact')); ?>">Contact Me <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="icon"><span class="fas fa-code"></span></div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="services-item">
                    <div class="body">
                        <h4>02</h4>
                        <h5>Frontend Development</h5>
                        <p>Pixel-perfect, responsive UI implementation using React.js, HTML5, CSS3, JavaScript (ES6+), and Bootstrap. Converting Figma/Adobe XD designs into production code.</p>
                        <div class="btn-box">
                            <a href="<?php echo e(route('contact')); ?>">Contact Me <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="icon"><span class="fab fa-react"></span></div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="services-item">
                    <div class="body">
                        <h4>03</h4>
                        <h5>Backend Development</h5>
                        <p>Robust server-side development using PHP/Laravel, Node.js, and Express.js. RESTful API design, database management (MySQL, MongoDB), and authentication systems.</p>
                        <div class="btn-box">
                            <a href="<?php echo e(route('contact')); ?>">Contact Me <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="icon"><span class="fab fa-laravel"></span></div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.4s">
                <div class="services-item">
                    <div class="body">
                        <h4>04</h4>
                        <h5>Web Hosting & DevOps</h5>
                        <p>Complete hosting management including cPanel, VPS configuration, domain setup, SSL certificates, DNS management. Deployments on Vercel, Netlify, and Linux servers.</p>
                        <div class="btn-box">
                            <a href="<?php echo e(route('contact')); ?>">Contact Me <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="icon"><span class="fas fa-server"></span></div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="services-item">
                    <div class="body">
                        <h4>05</h4>
                        <h5>UI/UX Implementation</h5>
                        <p>Translating design mockups into interactive, accessible web experiences. Focus on responsive design, cross-browser compatibility, and smooth micro-animations.</p>
                        <div class="btn-box">
                            <a href="<?php echo e(route('contact')); ?>">Contact Me <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="icon"><span class="fas fa-paint-brush"></span></div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.6s">
                <div class="services-item">
                    <div class="body">
                        <h4>06</h4>
                        <h5>Coding Training & Mentoring</h5>
                        <p>Professional coding instruction for beginners to intermediate developers. Live sessions, curriculum development, and one-on-one mentorship in web technologies.</p>
                        <div class="btn-box">
                            <a href="<?php echo e(route('contact')); ?>">Contact Me <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="icon"><span class="fas fa-graduation-cap"></span></div>
                    <div class="icon-border"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Services Section End //-->

<!--// Trust Strip //-->
<section class="services-trust">
    <div class="container">
        <div class="row g-4">
            <div class="col-6 col-md-3 stat">
                <div class="num">25+</div>
                <div class="lbl">Production Projects</div>
            </div>
            <div class="col-6 col-md-3 stat">
                <div class="num">7</div>
                <div class="lbl">Countries Served</div>
            </div>
            <div class="col-6 col-md-3 stat">
                <div class="num">5+</div>
                <div class="lbl">Years Shipping</div>
            </div>
            <div class="col-6 col-md-3 stat">
                <div class="num">24h</div>
                <div class="lbl">Quote Turnaround</div>
            </div>
        </div>
    </div>
</section>

<!--// How It Works //-->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 style="font-weight:700;letter-spacing:-0.02em;">How working with me actually works</h2>
                <p style="color:#475569;max-width:680px;margin:14px auto 0;">No 10-page contracts and no surprise scope creep. The same 4-step process I have used for every one of my 25+ shipped projects.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:26px;height:100%;">
                    <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#2563eb,#7c3aed);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;margin-bottom:16px;">01</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:10px;">Discovery call (free)</h3>
                    <p style="color:#475569;font-size:14px;line-height:1.7;margin:0;">30-minute call to understand the goal, the users, and the constraints. I leave with enough to write a fixed-fee quote — you leave with an honest opinion on whether the project is worth doing.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:26px;height:100%;">
                    <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#2563eb,#7c3aed);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;margin-bottom:16px;">02</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:10px;">Written quote in 24h</h3>
                    <p style="color:#475569;font-size:14px;line-height:1.7;margin:0;">A scoped fixed-fee proposal with milestones, payment schedule, and a hard deadline. No hourly games. If new scope appears, we agree the price before any work happens.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:26px;height:100%;">
                    <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#2563eb,#7c3aed);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;margin-bottom:16px;">03</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:10px;">Build with weekly demos</h3>
                    <p style="color:#475569;font-size:14px;line-height:1.7;margin:0;">A staging URL on day one and a 15-minute demo every Friday. You see progress in your browser, not just in a Trello board. Course-corrections happen weekly, not at the end.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:26px;height:100%;">
                    <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#2563eb,#7c3aed);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;margin-bottom:16px;">04</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:10px;">Launch and stay close</h3>
                    <p style="color:#475569;font-size:14px;line-height:1.7;margin:0;">Production deploy, DNS cutover, monitoring set up, and a 30-day warranty on every line of code. Most clients keep me on retainer for ongoing maintenance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--// FAQ //-->
<section class="services-faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h2>Frequently asked questions</h2>
                <details>
                    <summary>How much does a custom web application cost?</summary>
                    <p>Most custom web apps land between <strong>$2,000 and $15,000</strong> depending on scope, integrations, and timeline. A simple marketing site with a CMS is at the lower end, a SaaS MVP with auth, billing, and an admin panel is in the middle, and complex multi-tenant platforms are at the higher end. I send a fixed-fee quote within 24 hours of a project brief — no hourly billing, no surprise invoices.</p>
                </details>
                <details>
                    <summary>Do you work with international clients?</summary>
                    <p>Yes — I have shipped 25+ production projects across <strong>7 countries</strong> (Egypt, Saudi Arabia, UAE, Kuwait, Qatar, US, and UK). Communication in English or Arabic, daily updates over Slack/Email/WhatsApp, and an async-friendly workflow that respects time-zone differences.</p>
                </details>
                <details>
                    <summary>Which stack do you use?</summary>
                    <p>Laravel or Node.js for backend, <strong>React</strong> for frontend, MySQL or PostgreSQL for relational data, Redis for cache and queues, and Linux/cPanel/VPS for hosting. I pick the stack that fits the project — not the other way around. If you already have a stack, I will work in it rather than push my preferences.</p>
                </details>
                <details>
                    <summary>Can you take over a half-finished project from another developer?</summary>
                    <p>Yes. I have rescued multiple projects abandoned mid-build. I start with a <strong>one-day code audit</strong>, deliver a written report on what is salvageable and what is not, and only quote the rebuild after we agree on scope. No sunk-cost emotional pressure to keep bad code.</p>
                </details>
                <details>
                    <summary>Do you provide ongoing maintenance after launch?</summary>
                    <p>Yes — monthly retainers cover bug fixes, security patches, hosting monitoring, backups, and small feature additions. Most clients keep me on retainer after launch because nothing is more expensive than re-onboarding a new developer every 6 months.</p>
                </details>
                <details>
                    <summary>How fast can you start?</summary>
                    <p>Discovery calls typically happen within 24 hours of contact. Most projects kick off within <strong>1 week</strong>. Urgent fixes (downed sites, security incidents) are usually addressed the same day.</p>
                </details>
                <details>
                    <summary>Do you sign NDAs?</summary>
                    <p>Yes — I sign mutual NDAs for any client that needs one. For projects involving sensitive user data, payments, or proprietary algorithms, I default to NDA-first before the discovery call.</p>
                </details>
            </div>
        </div>
    </div>
</section>

<!--// CTA //-->
<section class="container">
    <div class="services-cta">
        <h2>Have a project in mind?</h2>
        <p>Send the brief — I will reply within 24 hours with an honest assessment, a fixed-fee quote, and a realistic timeline. No commitment, no sales call.</p>
        <a href="<?php echo e(route('contact')); ?>">Start a project <i class="fa fa-arrow-right ms-2"></i></a>
    </div>
</section>

<!--// Cross-links to drive internal authority to other indexable pages //-->
<section class="section pt-0">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <a href="<?php echo e(route('portfolios')); ?>" style="display:block;padding:24px;background:#fff;border:1px solid #e5e7eb;border-radius:12px;text-decoration:none;color:inherit;height:100%;">
                    <div style="font-size:13px;font-weight:700;color:var(--main-color);text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">Portfolio</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:8px;">See real shipped work</h3>
                    <p style="color:#475569;font-size:14px;margin:0;">25+ live projects across SaaS, e-commerce, restaurants, hotels, healthcare, and education.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo e(route('blogs')); ?>" style="display:block;padding:24px;background:#fff;border:1px solid #e5e7eb;border-radius:12px;text-decoration:none;color:inherit;height:100%;">
                    <div style="font-size:13px;font-weight:700;color:var(--main-color);text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">Blog</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:8px;">Read in-depth articles</h3>
                    <p style="color:#475569;font-size:14px;margin:0;">Practical guides on Laravel, React, Node.js, SEO, performance, and hiring — written for builders.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo e(route('faqs')); ?>" style="display:block;padding:24px;background:#fff;border:1px solid #e5e7eb;border-radius:12px;text-decoration:none;color:inherit;height:100%;">
                    <div style="font-size:13px;font-weight:700;color:var(--main-color);text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">FAQ</div>
                    <h3 style="font-size:18px;font-weight:700;margin-bottom:8px;">30+ answered questions</h3>
                    <p style="color:#475569;font-size:14px;margin:0;">Pricing, process, contracts, hosting, and timelines — all the questions clients ask before hiring.</p>
                </a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views/pages/services.blade.php ENDPATH**/ ?>