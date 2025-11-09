@extends('layouts.app')

@section('title', 'Portfolio - Web Development Projects | Khaled Ahmed')
@section('description', 'View my portfolio of web development projects including Couvreur Roofing Website, King Kebab Restaurant System, Green Arrow Academy, Wasila Charity Platform, Focus Tracker AI System, and more.')
@section('keywords', 'Web Development Portfolio, Laravel Projects, React.js Projects, Vue.js Projects, Full-Stack Projects, E-Commerce Websites, Restaurant Management Systems, Academy Websites')
@section('canonical', 'https://khaledahmed.net/portfolios')
@section('og_image', asset('images/your-logo.jpg'))
@section('og_image_alt', 'Portfolio - Khaled Ahmed Web Development Projects')

@section('content')
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>Portfolio</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-primary-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mb-5 custom-category-link">
                    <a href="{{ route('portfolios') }}" class="current mb-2">All Portfolio</a>
                </div>
            </div>
        </div>

        <div class="row portfolio-grid" id="portfolio-masonry-wrap">

            <!-- Project 1: Couvreur Roofing Company Website -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-globe me-1"></i> Full Website (France)</span>
                            <h5>Couvreur Roofing Company Website</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-laravel me-1"></i> Laravel</small>
                                <small><i class="fab fa-react me-1"></i> React.js</small>
                                <small><i class="fas fa-database me-1"></i> MySQL</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/Couvreur-website" target="_blank" class="portfolio-link me-2" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://bnbatiment.com" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 2: King Kebab Restaurant Management System -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-utensils me-1"></i> Restaurant System (France)</span>
                            <h5>King Kebab Restaurant Management System</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-laravel me-1"></i> Laravel</small>
                                <small><i class="fab fa-bootstrap me-1"></i> Bootstrap</small>
                                <small><i class="fas fa-database me-1"></i> MySQL</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://kingkebablepouzin.fr/" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 3: Green Arrow Academy Website -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-graduation-cap me-1"></i> Academy Website (Saudi Arabia)</span>
                            <h5>Green Arrow Academy Website</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-laravel me-1"></i> Laravel</small>
                                <small><i class="fab fa-css3-alt me-1"></i> Tailwind CSS</small>
                                <small><i class="fas fa-credit-card me-1"></i> MyFatoorah</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/green_arrow_website" target="_blank" class="portfolio-link me-2" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://greenarrow.itegypt.org/" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 4: Wasila Charity Platform -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-hands-helping me-1"></i> Charity Platform (Saudi Arabia)</span>
                            <h5>Wasila Charity – Humanitarian Services</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-laravel me-1"></i> Laravel</small>
                                <small><i class="fab fa-bootstrap me-1"></i> Bootstrap 5</small>
                                <small><i class="fas fa-shield-alt me-1"></i> Sanctum</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/wasila-website" target="_blank" class="portfolio-link me-2" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://wasela.itegypt.org" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 5: Focus Tracker AI System -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-brain me-1"></i> AI Computer Vision (Qatar)</span>
                            <h5>Focus Tracker – AI Attention Monitoring</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-python me-1"></i> Python</small>
                                <small><i class="fas fa-eye me-1"></i> OpenCV</small>
                                <small><i class="fab fa-node-js me-1"></i> Node.js</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/focus-tracker" target="_blank" class="portfolio-link" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 6: Salsabeel Makkah Water Delivery -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-truck me-1"></i> Delivery Platform (Saudi Arabia)</span>
                            <h5>Salsabeel Makkah Water Delivery</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-laravel me-1"></i> Laravel</small>
                                <small><i class="fab fa-bootstrap me-1"></i> Bootstrap</small>
                                <small><i class="fas fa-database me-1"></i> MySQL</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/Water_Website" target="_blank" class="portfolio-link me-2" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://water.itegypt.org/" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 7: Hadih Umrah System -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-kaaba me-1"></i> Umrah System (Saudi Arabia)</span>
                            <h5>Hadih Umrah System</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-laravel me-1"></i> Laravel</small>
                                <small><i class="fab fa-bootstrap me-1"></i> Bootstrap</small>
                                <small><i class="fas fa-shield-alt me-1"></i> Sanctum</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/Hadih-Agency-Uomra" target="_blank" class="portfolio-link me-2" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://hadih.itegypt.org" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 8: WorldTripAgency -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-plane me-1"></i> Tourism Platform (Saudi Arabia)</span>
                            <h5>WorldTripAgency – Travel Booking</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-vuejs me-1"></i> Nuxt.js</small>
                                <small><i class="fab fa-js me-1"></i> TypeScript</small>
                                <small><i class="fas fa-cloud me-1"></i> Supabase</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/TravelAgency" target="_blank" class="portfolio-link me-2" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.worldtripagency.com/" target="_blank" class="portfolio-link" title="Live Site">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 9: Smart Wheelchair IoT System -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="body">
                        <div class="portfolio-details">
                            <span><i class="fas fa-wheelchair me-1"></i> IoT System (Graduation Project)</span>
                            <h5>Smart Wheelchair IoT System</h5>
                            <p class="portfolio-tech mb-2">
                                <small><i class="fab fa-android me-1"></i> Flutter</small>
                                <small><i class="fas fa-microchip me-1"></i> Arduino</small>
                                <small><i class="fas fa-bluetooth me-1"></i> IoT</small>
                            </p>
                        </div>
                        <div class="portfolio-links">
                            <a href="https://github.com/khaled312001/Smart-Wheelchair-Graduation-Project" target="_blank" class="portfolio-link" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    jQuery(document).ready(function($) {
        if (typeof Filaous_MyWorks !== 'undefined') {
            Filaous_MyWorks();
        }
    });
</script>
@endpush
