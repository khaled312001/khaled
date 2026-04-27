<?php $__env->startSection('title', 'Hire a Senior Full Stack Web Developer | Laravel, React, Node.js — Khaled Ahmed'); ?>
<?php $__env->startSection('description', 'Hire Khaled Ahmed — Senior Full Stack Web Developer with 5+ years and 25+ shipped projects across 7 countries. Expert in Laravel, React.js, Node.js, Vue.js, and modern web technologies. Free consultation, 24-hour response.'); ?>
<?php $__env->startSection('keywords', 'hire full stack developer, web developer for hire, senior web developer, Laravel developer, React developer, Node.js developer, freelance web developer, web development services, custom web application, e-commerce developer, SaaS developer, web developer Egypt, Cairo developer, Khaled Ahmed, Barmagly'); ?>
<?php $__env->startSection('canonical', 'https://khaledahmed.net'); ?>
<?php $__env->startSection('og_image', asset('images/logo.png')); ?>
<?php $__env->startSection('og_image_alt', 'Khaled Ahmed — Senior Full Stack Web Developer'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* === HERO with personal photo + creative animations === */
    .hero-banner {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%);
        padding: 110px 0 60px;
        min-height: 720px;
        display: flex;
        align-items: center;
    }
    .hero-banner h1 { color: #fff; font-size: 48px; line-height: 1.2; font-weight: 800; margin-bottom: 18px; }
    .hero-banner h1 span { color: #60a5fa; }
    .hero-banner h2 { color: #cbd5e1; font-size: 18px; line-height: 1.6; font-weight: 400; margin-bottom: 30px; max-width: 640px; }
    .hero-stats { display: flex; gap: 36px; margin: 24px 0; flex-wrap: wrap; }
    .hero-stats .stat { color: #fff; }
    .hero-stats .stat .num { font-size: 34px; font-weight: 800; color: #60a5fa; line-height: 1; }
    .hero-stats .stat .lbl { font-size: 13px; color: #cbd5e1; margin-top: 4px; }
    .hero-cta-row { display: flex; gap: 14px; flex-wrap: wrap; margin-top: 26px; }
    .hero-cta-row .btn-primary-cta { background: linear-gradient(135deg, #60a5fa, #2563eb) !important; color: #fff !important; padding: 14px 28px; border-radius: 10px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; }
    .hero-cta-row .btn-primary-cta:hover { background: linear-gradient(135deg, #3b82f6, #1e40af) !important; transform: translateY(-2px); box-shadow: 0 12px 28px rgba(96,165,250,0.4); }
    .hero-cta-row .btn-secondary-cta { background: rgba(255,255,255,0.05); color: #fff; border: 2px solid rgba(255,255,255,0.30); padding: 12px 28px; border-radius: 10px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; }
    .hero-cta-row .btn-secondary-cta:hover { border-color: #fff; background: rgba(255,255,255,0.12); }

    /* === Photo column === */
    .hero-photo-wrap {
        position: relative;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        height: 100%;
        min-height: 540px;
    }
    /* Animated multi-layer ring */
    .hero-photo-ring {
        position: absolute;
        top: 50%; left: 50%;
        width: 460px; height: 460px;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        background:
            conic-gradient(from 0deg, #60a5fa, #7c3aed, #ec4899, #60a5fa);
        animation: ringSpin 18s linear infinite;
        opacity: 0.55;
        filter: blur(2px);
    }
    .hero-photo-ring::after {
        content: '';
        position: absolute;
        inset: 8px;
        background: radial-gradient(circle, #1e3a5f 0%, #0f172a 70%);
        border-radius: 50%;
    }
    .hero-photo-ring-2 {
        position: absolute;
        top: 50%; left: 50%;
        width: 510px; height: 510px;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        border: 1.5px dashed rgba(96,165,250,0.40);
        animation: ringSpin 28s linear infinite reverse;
    }
    @keyframes ringSpin {
        from { transform: translate(-50%, -50%) rotate(0deg); }
        to   { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* The actual photo */
    .hero-photo {
        position: relative;
        z-index: 2;
        max-height: 580px;
        width: auto;
        filter: drop-shadow(0 30px 50px rgba(0,0,0,0.45));
        animation: heroFloat 6s ease-in-out infinite;
    }
    @keyframes heroFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-14px); }
    }

    /* Floating tech-stack pills around the photo */
    .float-pill {
        position: absolute;
        background: rgba(255, 255, 255, 0.95);
        color: #1e293b;
        padding: 9px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 14px 30px rgba(15,23,42,0.35);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        z-index: 3;
        backdrop-filter: blur(6px);
        animation: pillFloat 6s ease-in-out infinite;
    }
    .float-pill i { font-size: 16px; }
    .float-pill.fp-laravel { top: 8%; left: -10%; animation-delay: 0s; color: #f55247; }
    .float-pill.fp-react   { top: 22%; right: -8%; animation-delay: 1.2s; color: #61dafb; }
    .float-pill.fp-node    { bottom: 30%; left: -12%; animation-delay: 2.4s; color: #5fa04e; }
    .float-pill.fp-mysql   { bottom: 12%; right: -6%; animation-delay: 3.6s; color: #00758f; }
    @keyframes pillFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Hero text intro animation */
    .hero-fadeup { opacity: 0; transform: translateY(28px); animation: heroFadeUp 0.9s cubic-bezier(.2,.8,.2,1) forwards; }
    .hero-fadeup.d1 { animation-delay: 0.05s; }
    .hero-fadeup.d2 { animation-delay: 0.20s; }
    .hero-fadeup.d3 { animation-delay: 0.35s; }
    .hero-fadeup.d4 { animation-delay: 0.50s; }
    @keyframes heroFadeUp {
        to { opacity: 1; transform: translateY(0); }
    }

    /* Other site-wide CSS continues below — kept identical */
    /* === Trust bar — modern card-based === */
    .trust-bar {
        background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
        padding: 36px 0;
        border-bottom: 1px solid #e0e7ff;
        position: relative;
    }
    .trust-bar .trust-card {
        background: #fff;
        border-radius: 14px;
        padding: 22px 24px;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
        border: 1px solid rgba(37, 99, 235, 0.08);
        display: flex;
        align-items: center;
        gap: 16px;
        height: 100%;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .trust-bar .trust-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.10);
    }
    .trust-bar .trust-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .trust-bar .trust-card:nth-child(2) .trust-icon { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .trust-bar .trust-card:nth-child(3) .trust-icon { background: linear-gradient(135deg, #10b981, #059669); }
    .trust-bar .trust-body { flex: 1; min-width: 0; }
    .trust-bar .label {
        color: #64748b;
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 4px;
    }
    .trust-bar .countries {
        color: #0f172a;
        font-weight: 600;
        font-size: 14.5px;
        line-height: 1.4;
    }
    @media (max-width: 768px) {
        .trust-bar { padding: 24px 0; }
        .trust-bar .trust-card { padding: 16px 18px; gap: 12px; }
        .trust-bar .trust-icon { width: 40px; height: 40px; font-size: 16px; }
        .trust-bar .countries { font-size: 13.5px; }
    }

    /* === About section — modernized === */
    #about { padding: 80px 0 !important; background: #fff; }
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1.6fr;
        gap: 60px;
        align-items: center;
    }
    @media (max-width: 991px) {
        .about-grid { grid-template-columns: 1fr; gap: 40px; }
    }
    .about-photo-wrap {
        position: relative;
        text-align: center;
    }
    .about-photo-wrap::before {
        content: '';
        position: absolute;
        top: 50%; left: 50%;
        width: 90%; aspect-ratio: 1;
        transform: translate(-50%, -50%);
        background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(124,58,237,0.10));
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: blobMorph 12s ease-in-out infinite;
        z-index: 0;
    }
    @keyframes blobMorph {
        0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        50% { border-radius: 70% 30% 50% 50% / 50% 70% 30% 50%; }
    }
    .about-photo {
        position: relative;
        z-index: 1;
        max-width: 100%;
        max-height: 480px;
        width: auto;
        filter: drop-shadow(0 24px 40px rgba(15, 23, 42, 0.20));
    }
    .about-content h2.section-title-h2 {
        font-size: 32px !important;
        margin-bottom: 18px;
    }
    .about-content p { font-size: 16px; line-height: 1.8; color: #475569; margin-bottom: 16px; }
    .about-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin: 24px 0 28px;
    }
    @media (max-width: 576px) {
        .about-info-grid { grid-template-columns: 1fr; }
    }
    .about-info-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    .about-info-item:hover {
        border-color: #2563eb;
        background: #fff;
        box-shadow: 0 6px 14px rgba(37, 99, 235, 0.06);
    }
    .about-info-item .ai-icon {
        width: 38px; height: 38px;
        border-radius: 10px;
        background: linear-gradient(135deg, #2563eb, #1e40af);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }
    .about-info-item:nth-child(2) .ai-icon { background: linear-gradient(135deg, #7c3aed, #5b21b6); }
    .about-info-item:nth-child(3) .ai-icon { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .about-info-item:nth-child(4) .ai-icon { background: linear-gradient(135deg, #10b981, #059669); }
    .about-info-item:nth-child(5) .ai-icon { background: linear-gradient(135deg, #f97316, #ea580c); }
    .about-info-item:nth-child(6) .ai-icon { background: linear-gradient(135deg, #ec4899, #db2777); }
    .about-info-item .ai-body { min-width: 0; flex: 1; }
    .about-info-item .ai-label {
        font-size: 11.5px;
        color: #64748b;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 2px;
    }
    .about-info-item .ai-value {
        font-size: 14px;
        color: #0f172a;
        font-weight: 600;
        line-height: 1.4;
    }
    .about-info-item .ai-value a { color: inherit; text-decoration: none; }
    .about-info-item .ai-value a:hover { color: #2563eb; }
    .services-grid { padding: 70px 0; }
    .service-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 28px; transition: all 0.3s; height: 100%; }
    .service-card:hover { border-color: var(--main-color); transform: translateY(-4px); box-shadow: 0 12px 30px rgba(37,99,235,0.08); }
    .service-card .icon { width: 56px; height: 56px; background: linear-gradient(135deg, #2563eb, #1e40af); color: #fff; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 18px; }
    .service-card h3 { font-size: 19px; font-weight: 700; margin-bottom: 10px; color: #0f172a; }
    .service-card p { color: #475569; font-size: 14.5px; line-height: 1.65; margin-bottom: 14px; }
    .service-card .features { list-style: none; padding: 0; margin: 0; }
    .service-card .features li { font-size: 13.5px; color: #334155; padding: 4px 0 4px 22px; position: relative; }
    .service-card .features li::before { content: "✓"; color: var(--main-color); font-weight: 700; position: absolute; left: 0; }
    .why-section { background: #f8fafc; padding: 70px 0; }
    .why-card { padding: 24px; }
    .why-card .num { width: 48px; height: 48px; background: var(--main-color); color: #fff; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 800; font-size: 18px; margin-bottom: 14px; }
    .why-card h3 { font-size: 18px; font-weight: 700; margin-bottom: 8px; color: #0f172a; }
    .why-card p { color: #475569; font-size: 14.5px; line-height: 1.65; }
    .stack-section { padding: 70px 0; }
    .stack-pill { display: inline-block; background: #f1f5f9; color: #1e293b; padding: 8px 16px; border-radius: 999px; font-size: 14px; font-weight: 500; margin: 4px; }
    .stack-pill.primary { background: var(--main-color); color: #fff; }
    .testimonial-section { padding: 70px 0; background: #f8fafc; }
    .testimonial-card { background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); height: 100%; }
    .testimonial-card .stars { color: #fbbf24; margin-bottom: 12px; }
    .testimonial-card p { color: #334155; font-style: italic; line-height: 1.7; margin-bottom: 16px; }
    .testimonial-card .author { font-weight: 700; color: #0f172a; }
    .testimonial-card .role { font-size: 13px; color: #64748b; }
    .final-cta { background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%); color: #fff; padding: 80px 0; text-align: center; }
    .final-cta h2 { color: #fff; font-size: 36px; font-weight: 800; margin-bottom: 16px; }
    .final-cta p { color: #cbd5e1; font-size: 18px; max-width: 640px; margin: 0 auto 30px; }
    .final-cta .btn-cta { background: #60a5fa; color: #0f172a; padding: 16px 36px; border-radius: 8px; font-weight: 700; font-size: 17px; text-decoration: none; display: inline-block; transition: all 0.2s; }
    .final-cta .btn-cta:hover { background: #93c5fd; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(96,165,250,0.4); }
    @media (max-width: 991px) {
        .hero-banner { min-height: auto !important; padding: 100px 0 50px; }
        .hero-photo-wrap { display: none !important; }
    }
    @media (max-width: 768px) {
        .hero-banner h1 { font-size: 30px; }
        .hero-banner h2 { font-size: 16px; }
        .hero-stats { gap: 24px; }
        .hero-stats .stat .num { font-size: 26px; }
        .final-cta h2 { font-size: 26px; }
        .final-cta p { font-size: 15px; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Full Stack Web Development",
    "provider": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "url": "https://khaledahmed.net"
    },
    "areaServed": ["Worldwide"],
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Web Development Services",
        "itemListElement": [
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "Custom Web Application Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "Laravel Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "React.js Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "Node.js Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "E-commerce Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "SaaS Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "API Development"}},
            {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "Website SEO Optimization"}}
        ]
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-banner" data-scroll-index="1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <h1 class="hero-fadeup d1"><?php echo e(__('site.hero_title_1')); ?> <span><?php echo e(__('site.hero_title_2')); ?></span> <?php echo e(__('site.hero_title_3')); ?></h1>
                <h2 class="hero-fadeup d2"><?php echo e(__('site.hero_subtitle')); ?></h2>

                <div class="hero-stats hero-fadeup d3">
                    <div class="stat"><div class="num">25+</div><div class="lbl"><?php echo e(__('site.projects_shipped')); ?></div></div>
                    <div class="stat"><div class="num">7</div><div class="lbl"><?php echo e(__('site.countries_served')); ?></div></div>
                    <div class="stat"><div class="num">5+</div><div class="lbl"><?php echo e(__('site.years_experience')); ?></div></div>
                    <div class="stat"><div class="num">24h</div><div class="lbl"><?php echo e(__('site.response_time')); ?></div></div>
                </div>

                <div class="hero-cta-row hero-fadeup d4">
                    <a href="<?php echo e(route('contact')); ?>" class="btn-primary-cta">
                        <?php echo e(__('site.get_free_consultation')); ?> <i class="fa fa-arrow-right"></i>
                    </a>
                    <a href="<?php echo e(route('portfolios')); ?>" class="btn-secondary-cta">
                        <?php echo e(__('site.view_my_work')); ?> <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="hero-photo-wrap">
                    <div class="hero-photo-ring-2"></div>
                    <div class="hero-photo-ring"></div>
                    <span class="float-pill fp-laravel"><i class="fab fa-laravel"></i> Laravel</span>
                    <span class="float-pill fp-react"><i class="fab fa-react"></i> React</span>
                    <span class="float-pill fp-node"><i class="fab fa-node-js"></i> Node.js</span>
                    <span class="float-pill fp-mysql"><i class="fas fa-database"></i> MySQL</span>
                    <img src="<?php echo e(asset('images/khaled-hero.png')); ?>"
                         alt="Khaled Ahmed — Senior Full Stack Web Developer"
                         class="hero-photo"
                         width="490" height="1000"
                         loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trust-bar">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="trust-card">
                    <div class="trust-icon"><i class="fas fa-globe-americas"></i></div>
                    <div class="trust-body">
                        <div class="label"><?php echo e(__('site.trust_label_1')); ?></div>
                        <div class="countries"><?php echo e(__('site.trust_value_1')); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="trust-card">
                    <div class="trust-icon"><i class="fas fa-bullseye"></i></div>
                    <div class="trust-body">
                        <div class="label"><?php echo e(__('site.trust_label_2')); ?></div>
                        <div class="countries"><?php echo e(__('site.trust_value_2')); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="trust-card">
                    <div class="trust-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="trust-body">
                        <div class="label"><?php echo e(__('site.trust_label_3')); ?></div>
                        <div class="countries"><?php echo e(__('site.trust_value_3')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-photo-wrap">
                <img src="<?php echo e(asset('images/khaled-hero.png')); ?>"
                     alt="<?php echo e(__('site.about_h2')); ?>"
                     class="about-photo"
                     loading="lazy" decoding="async">
            </div>
            <div class="about-content">
                <span class="section-badge"><i class="fas fa-user-tie"></i> <?php echo e(__('site.about_me')); ?></span>
                <h2 class="section-title-h2"><?php echo e(__('site.about_h2')); ?></h2>
                <p><?php echo e(__('site.about_p1')); ?></p>
                <p><?php echo __('site.about_p2'); ?></p>

                <div class="about-info-grid">
                    <div class="about-info-item">
                        <div class="ai-icon"><i class="fas fa-user"></i></div>
                        <div class="ai-body">
                            <div class="ai-label"><?php echo e(__('site.name_label')); ?></div>
                            <div class="ai-value"><?php echo e(__('site.name_value')); ?></div>
                        </div>
                    </div>
                    <div class="about-info-item">
                        <div class="ai-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="ai-body">
                            <div class="ai-label"><?php echo e(__('site.location_label')); ?></div>
                            <div class="ai-value"><?php echo e(__('site.location_value')); ?></div>
                        </div>
                    </div>
                    <div class="about-info-item">
                        <div class="ai-icon"><i class="fas fa-graduation-cap"></i></div>
                        <div class="ai-body">
                            <div class="ai-label"><?php echo e(__('site.education_label')); ?></div>
                            <div class="ai-value"><?php echo e(__('site.education_value')); ?></div>
                        </div>
                    </div>
                    <div class="about-info-item">
                        <div class="ai-icon"><i class="fas fa-language"></i></div>
                        <div class="ai-body">
                            <div class="ai-label"><?php echo e(__('site.languages_label')); ?></div>
                            <div class="ai-value"><?php echo e(__('site.languages_value')); ?></div>
                        </div>
                    </div>
                    <div class="about-info-item">
                        <div class="ai-icon"><i class="fas fa-briefcase"></i></div>
                        <div class="ai-body">
                            <div class="ai-label"><?php echo e(__('site.freelance_label')); ?></div>
                            <div class="ai-value"><?php echo e(__('site.freelance_value')); ?></div>
                        </div>
                    </div>
                    <div class="about-info-item">
                        <div class="ai-icon"><i class="fas fa-phone"></i></div>
                        <div class="ai-body">
                            <div class="ai-label"><?php echo e(__('site.phone_label')); ?></div>
                            <div class="ai-value">
                                <a href="tel:+201204593124">+20 120 459 3124</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo e(route('contact')); ?>" class="primary-btn">
                        <span class="text"><?php echo e(__('site.hire_me')); ?></span>
                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                    </a>
                    <a href="/Khaled_Ahmed.pdf" class="primary-btn primary-btn--outline" download rel="nofollow">
                        <span class="text"><?php echo e(__('site.download_cv')); ?></span>
                        <span class="icon"><i class="fa fa-download"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-grid">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge"><i class="fas fa-bolt"></i> <?php echo e(__('site.what_i_build')); ?></span>
            <h2 class="section-title-h2"><?php echo e(__('site.web_dev_services')); ?></h2>
            <p class="section-subtitle"><?php echo e(__('site.web_dev_subtitle')); ?></p>
        </div>

        <?php
        $services = [
            ['fas fa-code', 'srv_custom_title', 'srv_custom_desc', ['srv_custom_f1','srv_custom_f2','srv_custom_f3','srv_custom_f4']],
            ['fas fa-shopping-cart', 'srv_ecom_title', 'srv_ecom_desc', ['srv_ecom_f1','srv_ecom_f2','srv_ecom_f3','srv_ecom_f4']],
            ['fas fa-rocket', 'srv_saas_title', 'srv_saas_desc', ['srv_saas_f1','srv_saas_f2','srv_saas_f3','srv_saas_f4']],
            ['fab fa-laravel', 'srv_laravel_title', 'srv_laravel_desc', ['srv_laravel_f1','srv_laravel_f2','srv_laravel_f3','srv_laravel_f4']],
            ['fab fa-react', 'srv_react_title', 'srv_react_desc', ['srv_react_f1','srv_react_f2','srv_react_f3','srv_react_f4']],
            ['fas fa-search', 'srv_seo_title', 'srv_seo_desc', ['srv_seo_f1','srv_seo_f2','srv_seo_f3','srv_seo_f4']],
            ['fas fa-mobile-alt', 'srv_pwa_title', 'srv_pwa_desc', ['srv_pwa_f1','srv_pwa_f2','srv_pwa_f3','srv_pwa_f4']],
            ['fas fa-server', 'srv_devops_title', 'srv_devops_desc', ['srv_devops_f1','srv_devops_f2','srv_devops_f3','srv_devops_f4']],
            ['fas fa-graduation-cap', 'srv_training_title', 'srv_training_desc', ['srv_training_f1','srv_training_f2','srv_training_f3','srv_training_f4']],
        ];
        ?>
        <div class="row g-4">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon"><i class="<?php echo e($svc[0]); ?>"></i></div>
                    <h3><?php echo e(__('site.' . $svc[1])); ?></h3>
                    <p><?php echo e(__('site.' . $svc[2])); ?></p>
                    <ul class="features">
                        <?php $__currentLoopData = $svc[3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e(__('site.' . $featKey)); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo e(route('services')); ?>" class="primary-btn">
                <span class="text"><?php echo e(__('site.view_all_services')); ?></span>
                <span class="icon"><i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
    </div>
</section>

<section class="why-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge"><i class="fas fa-award"></i> <?php echo e(__('site.why_choose_me')); ?></span>
            <h2 class="section-title-h2"><?php echo e(__('site.why_clients_hire')); ?></h2>
        </div>
        <div class="row g-4">
            <?php for($i = 1; $i <= 6; $i++): ?>
            <div class="col-lg-4 col-md-6">
                <div class="why-card">
                    <div class="num"><?php echo e($i); ?></div>
                    <h3><?php echo e(__('site.why_' . $i . '_title')); ?></h3>
                    <p><?php echo e(__('site.why_' . $i . '_desc')); ?></p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<section class="stack-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge"><i class="fas fa-layer-group"></i> <?php echo e(__('site.my_stack')); ?></span>
            <h2 class="section-title-h2"><?php echo e(__('site.technologies_i_use')); ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 14px;"><?php echo e(__('site.stack_backend')); ?></h3>
                <span class="stack-pill primary">Laravel 11</span>
                <span class="stack-pill primary">PHP 8.3</span>
                <span class="stack-pill primary">Node.js</span>
                <span class="stack-pill">Express</span>
                <span class="stack-pill">NestJS</span>
                <span class="stack-pill">REST APIs</span>
                <span class="stack-pill">GraphQL</span>
                <span class="stack-pill">tRPC</span>
            </div>
            <div class="col-lg-4 mb-4">
                <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 14px;"><?php echo e(__('site.stack_frontend')); ?></h3>
                <span class="stack-pill primary">React 19</span>
                <span class="stack-pill primary">Next.js</span>
                <span class="stack-pill">Vue 3</span>
                <span class="stack-pill">Nuxt</span>
                <span class="stack-pill">TypeScript</span>
                <span class="stack-pill">Tailwind CSS</span>
                <span class="stack-pill">Inertia.js</span>
                <span class="stack-pill">Livewire</span>
            </div>
            <div class="col-lg-4 mb-4">
                <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 14px;"><?php echo e(__('site.stack_db_devops')); ?></h3>
                <span class="stack-pill primary">MySQL</span>
                <span class="stack-pill primary">PostgreSQL</span>
                <span class="stack-pill">MongoDB</span>
                <span class="stack-pill">Redis</span>
                <span class="stack-pill">Docker</span>
                <span class="stack-pill">Nginx</span>
                <span class="stack-pill">DigitalOcean</span>
                <span class="stack-pill">AWS</span>
                <span class="stack-pill">Cloudflare</span>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge"><i class="fas fa-star"></i> <?php echo e(__('site.testimonials')); ?></span>
            <h2 class="section-title-h2"><?php echo e(__('site.what_clients_say')); ?></h2>
        </div>
        <div class="row g-4">
            <?php for($i = 1; $i <= 3; $i++): ?>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p><?php echo e(__('site.testi_' . $i)); ?></p>
                    <div class="author"><?php echo e(__('site.testi_' . $i . '_author')); ?></div>
                    <div class="role"><?php echo e(__('site.testi_' . $i . '_role')); ?></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container">
        <h2><?php echo e(__('site.ready_to_build')); ?></h2>
        <p><?php echo e(__('site.ready_subtitle')); ?></p>
        <a href="<?php echo e(route('contact')); ?>" class="btn-cta"><?php echo e(__('site.book_consultation')); ?> <i class="fa fa-arrow-right ms-2"></i></a>
        <div style="margin-top: 18px; color: #94a3b8; font-size: 14px;">
            <i class="far fa-clock"></i> <?php echo e(__('site.reply_24h_chip')); ?> &nbsp; · &nbsp;
            <i class="fas fa-globe"></i> <?php echo e(__('site.worldwide_remote_chip')); ?> &nbsp; · &nbsp;
            <i class="fas fa-shield-alt"></i> <?php echo e(__('site.nda_on_request_chip')); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\home.blade.php ENDPATH**/ ?>