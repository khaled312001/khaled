

<?php $__env->startSection('title', 'Portfolio — 25+ Web Development Projects Across 7 Countries | Khaled Ahmed'); ?>
<?php $__env->startSection('description', 'Explore my portfolio of 25+ web development projects delivered across the UK, Switzerland, France, UAE, Saudi Arabia, Egypt, and Iraq. Full stack solutions for healthcare, e-commerce, education, tourism, and more.'); ?>
<?php $__env->startSection('keywords', 'Web Development Portfolio, Laravel Projects, React.js Projects, Full Stack Projects, E-Commerce Websites, Healthcare Systems, Education Platforms, International Projects'); ?>
<?php $__env->startSection('canonical', 'https://khaledahmed.net/portfolios'); ?>
<?php $__env->startSection('og_image', asset('images/logo.png')); ?>
<?php $__env->startSection('og_image_alt', 'Portfolio - Khaled Ahmed Web Development Projects'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .portfolio-item-img { display: none !important; }
    .portfolio-item-inner {
        background: #fff; border: 1px solid #e5e7eb; border-radius: 12px;
        padding: 20px; transition: all 0.3s ease; height: 100%;
    }
    .portfolio-item-inner:hover {
        border-color: var(--main-color);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
        transform: translateY(-3px);
    }
    .portfolio-item-inner .body {
        display: flex; justify-content: space-between; align-items: center;
    }
    .portfolio-details span { font-size: 12px; color: var(--main-color); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
    .portfolio-details h5 { margin-bottom: 0; font-size: 16px; }
    .portfolio-link {
        width: 40px; height: 40px; border-radius: 50%; background: var(--main-color);
        display: flex; align-items: center; justify-content: center; color: #fff;
        text-decoration: none; flex-shrink: 0; transition: background 0.3s;
    }
    .portfolio-link:hover { background: #1e40af; color: #fff; }
    .portfolio-links { display: flex; gap: 8px; }
    .portfolio-item { margin-bottom: 20px; }
    .country-header {
        background: #1e3a5f; color: #fff; padding: 8px 16px; border-radius: 6px;
        font-weight: 700; font-size: 16px; margin-bottom: 15px; margin-top: 25px;
        display: inline-block;
    }
    .country-header:first-of-type { margin-top: 0; }
    .sector-label { font-size: 13px; font-weight: 700; color: #2563eb; margin-bottom: 8px; padding-left: 4px; }
    .portfolio-tech small { margin-right: 10px; color: #6b7280; font-size: 12px; }
    .identity-cards { display: flex; gap: 16px; margin-bottom: 20px; flex-wrap: wrap; }
    .identity-card {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border: 1px solid #bfdbfe; border-radius: 10px; padding: 14px 20px; flex: 1; min-width: 200px;
    }
    .identity-card h6 { color: #1e3a5f; font-size: 13px; font-weight: 700; margin-bottom: 4px; }
    .identity-card a { color: #2563eb; text-decoration: none; font-weight: 500; font-size: 15px; }
    .identity-card a:hover { text-decoration: underline; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>Portfolio</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-primary-light">
    <div class="container">

        <!-- Identity Cards -->
        <div class="identity-cards">
            <div class="identity-card">
                <h6><i class="fas fa-globe"></i> Personal Website</h6>
                <a href="https://khaledahmed.net/" target="_blank">khaledahmed.net</a>
            </div>
            <div class="identity-card">
                <h6><i class="fas fa-building"></i> My Company — Swiss Tech Partnership</h6>
                <a href="https://barmagly.tech/" target="_blank">barmagly.tech</a>
            </div>
        </div>

        <!-- United Kingdom -->
        <div class="country-header">🇬🇧 United Kingdom</div>
        <p style="font-size:13px;color:#6b7280;font-style:italic;margin-bottom:12px;margin-top:-8px;">WordPress projects — currently developing and maintaining at Xappee</p>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Tech Company</span><h5>Xappee</h5></div><a href="https://xappee.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Services</span><h5>Ant Assist</h5></div><a href="https://ant-assist.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Medical</span><h5>Dr. Cem Baysal</h5></div><a href="https://drcembaysal.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Hospitality</span><h5>Grand Botanical Suite</h5></div><a href="https://grandbotanicalsuite.co.uk/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Automotive</span><h5>Quote My Ride</h5></div><a href="http://quotemyride.co.uk/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Restaurant</span><h5>Rasa Lichfield</h5></div><a href="https://rasalichfield.co.uk/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Healthcare</span><h5>Stand Up Straight</h5></div><a href="https://standupstraight.co.uk/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Business</span><h5>Mossodor</h5></div><a href="https://www.mossodor.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>

        <!-- Switzerland -->
        <div class="country-header">🇨🇭 Switzerland</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Law Firm</span><h5>Aman Law</h5></div><a href="https://amanlaw.ch/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Education</span><h5>Swiss Bridge Academy</h5></div><a href="http://swissbridgeacademy.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>

        <!-- France -->
        <div class="country-header">🇫🇷 France</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Restaurant</span><h5>King Kebab Le Pouzin</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-laravel me-1"></i>Laravel</small><small><i class="fab fa-bootstrap me-1"></i>Bootstrap</small><small><i class="fas fa-database me-1"></i>MySQL</small></p>
                </div><a href="https://kingkebablepouzin.fr/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div>
            </div>
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Building Maintenance</span><h5>BN Batiment</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-laravel me-1"></i>Laravel</small><small><i class="fab fa-react me-1"></i>React.js</small><small><i class="fas fa-database me-1"></i>MySQL</small></p>
                </div><a href="https://bnbatiment.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div>
            </div>
        </div>

        <!-- UAE -->
        <div class="country-header">🇦🇪 United Arab Emirates</div>
        <div class="sector-label">Healthcare</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Dental</span><h5>Smile House Dental Center</h5></div><a href="https://smilehousedentalcenter.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Medical System</span><h5>InfyCare Medical</h5></div><a href="https://infycare.infyom.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Medical System</span><h5>Doxe Medical</h5></div><a href="https://doxe.originlabsoft.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>
        <div class="sector-label">E-Commerce & Services</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>E-Commerce</span><h5>Bloomingdales Arabia</h5></div><a href="https://ar.bloomingdales.ae/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>E-Commerce</span><h5>Sharaf DG</h5></div><a href="https://uae.sharafdg.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Marketing</span><h5>Egessia</h5></div><a href="https://egessia.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Academy</span><h5>Ejada Education</h5></div><a href="https://www.ejadaedu.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>

        <!-- Saudi Arabia -->
        <div class="country-header">🇸🇦 Saudi Arabia</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Tourism</span><h5>World Trip Agency</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-vuejs me-1"></i>Nuxt.js</small><small><i class="fab fa-js me-1"></i>TypeScript</small><small><i class="fas fa-cloud me-1"></i>Supabase</small></p>
                </div><a href="https://worldtripagency.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div>
            </div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Manufacturing</span><h5>Infinity Wear</h5></div><a href="https://infinitywearsa.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>
        <div class="sector-label">Service Systems — Makkah</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Umrah System</span><h5>Hadih Platform</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-laravel me-1"></i>Laravel</small><small><i class="fab fa-bootstrap me-1"></i>Bootstrap</small><small><i class="fas fa-shield-alt me-1"></i>Sanctum</small></p>
                </div><div class="portfolio-links"><a href="https://github.com/khaled312001/Hadih-Agency-Uomra" target="_blank" class="portfolio-link"><i class="fab fa-github"></i></a><a href="https://hadih.itegypt.org/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            </div>
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Water & Mosque Services</span><h5>Wasela</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-laravel me-1"></i>Laravel</small><small><i class="fab fa-bootstrap me-1"></i>Bootstrap 5</small><small><i class="fas fa-shield-alt me-1"></i>Sanctum</small></p>
                </div><div class="portfolio-links"><a href="https://github.com/khaled312001/wasila-website" target="_blank" class="portfolio-link"><i class="fab fa-github"></i></a><a href="http://wasiila.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            </div>
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Water Foundation</span><h5>Makkah Water Foundation</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-laravel me-1"></i>Laravel</small><small><i class="fab fa-bootstrap me-1"></i>Bootstrap</small><small><i class="fas fa-database me-1"></i>MySQL</small></p>
                </div><div class="portfolio-links"><a href="https://github.com/khaled312001/Water_Website" target="_blank" class="portfolio-link"><i class="fab fa-github"></i></a><a href="https://water.itegypt.org/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            </div>
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Education</span><h5>Green Arrow Academy</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-laravel me-1"></i>Laravel</small><small><i class="fab fa-css3-alt me-1"></i>Tailwind CSS</small><small><i class="fas fa-credit-card me-1"></i>MyFatoorah</small></p>
                </div><div class="portfolio-links"><a href="https://github.com/khaled312001/green_arrow_website" target="_blank" class="portfolio-link"><i class="fab fa-github"></i></a><a href="https://greenarrow.itegypt.org/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            </div>
        </div>

        <!-- Egypt -->
        <div class="country-header">🇪🇬 Egypt</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Education Platform</span><h5>Infix LMS</h5></div><a href="https://infixlms.ischooll.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>E-Commerce</span><h5>Mizanoo Store</h5></div><a href="https://www.mizanoo.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>

        <!-- Iraq -->
        <div class="country-header">🇮🇶 Iraq</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Automotive & Parts</span><h5>Ghiarati</h5></div><a href="https://ghiarati.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>

        <!-- Platforms -->
        <div class="country-header">🚗 Automotive & Restaurant Platforms</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>European Car Platform</span><h5>CarBaz</h5></div><a href="https://carbaz.mamunuiux.com/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Restaurant System</span><h5>Fastifo</h5></div><a href="https://eordar.xyz/fastifo/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
            <div class="col-md-6 col-lg-4 portfolio-item"><div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>Restaurant Management</span><h5>FoodKing</h5></div><a href="https://demo.foodking.dev/" target="_blank" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a></div></div></div>
        </div>

        <!-- AI & IoT -->
        <div class="country-header">🎓 AI & Graduation Projects</div>
        <div class="row portfolio-grid">
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>AI Computer Vision · Qatar</span><h5>Focus Tracker — AI Attention Monitoring</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-python me-1"></i>Python</small><small><i class="fas fa-eye me-1"></i>OpenCV</small><small><i class="fab fa-node-js me-1"></i>Node.js</small></p>
                </div><a href="https://github.com/khaled312001/focus-tracker" target="_blank" class="portfolio-link"><i class="fab fa-github"></i></a></div></div>
            </div>
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner"><div class="body"><div class="portfolio-details"><span>IoT · Flutter · Arduino</span><h5>Smart Wheelchair IoT</h5>
                    <p class="portfolio-tech mb-0"><small><i class="fab fa-android me-1"></i>Flutter</small><small><i class="fas fa-microchip me-1"></i>Arduino</small><small><i class="fas fa-bluetooth me-1"></i>IoT</small></p>
                </div><a href="https://github.com/khaled312001/Smart-Wheelchair-Graduation-Project" target="_blank" class="portfolio-link"><i class="fab fa-github"></i></a></div></div>
            </div>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\portfolios.blade.php ENDPATH**/ ?>