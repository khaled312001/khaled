@extends('layouts.app')

@section('title', 'Portfolio')

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

            <!-- Project 1 -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="portfolio-item-img">
                        <img 
                            src="https://www.google.com/s2/favicons?sz=256&domain=bnbatiment.com"
                            onerror="this.onerror=null;this.src='{{ asset('images/projects/placeholder.jpg') }}';"
                            alt="Couvreur Roofing Website" class="img-fluid">
                        <a href="https://www.google.com/s2/favicons?sz=256&domain=bnbatiment.com" 
                           class="portfolio-zoom-link">
                           <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="body">
                        <div class="portfolio-details">
                            <span>Full Website</span>
                            <h5>Couvreur Roofing Company Website</h5>
                        </div>
                        <a href="https://bnbatiment.com" class="portfolio-link"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="portfolio-item-img">
                        <img 
                            src="https://www.google.com/s2/favicons?sz=256&domain=kingkebablepouzin.fr"
                            onerror="this.onerror=null;this.src='{{ asset('images/projects/placeholder.jpg') }}';"
                            alt="King Kebab System" class="img-fluid">
                        <a href="https://www.google.com/s2/favicons?sz=256&domain=kingkebablepouzin.fr" 
                           class="portfolio-zoom-link">
                           <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="body">
                        <div class="portfolio-details">
                            <span>Restaurant System</span>
                            <h5>King Kebab Restaurant Management System</h5>
                        </div>
                        <a href="https://kingkebablepouzin.fr/" class="portfolio-link"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="portfolio-item-img">
                        <img 
                            src="https://www.google.com/s2/favicons?sz=256&domain=greenarrow.itegypt.org"
                            onerror="this.onerror=null;this.src='{{ asset('images/projects/placeholder.jpg') }}';"
                            alt="Green Arrow Academy" class="img-fluid">
                        <a href="https://www.google.com/s2/favicons?sz=256&domain=greenarrow.itegypt.org" 
                           class="portfolio-zoom-link">
                           <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="body">
                        <div class="portfolio-details">
                            <span>Academy Website</span>
                            <h5>Green Arrow Academy Website</h5>
                        </div>
                        <a href="https://greenarrow.itegypt.org/" class="portfolio-link"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="portfolio-item-img">
                        <img 
                            src="https://opengraph.githubassets.com/1/khaled312001/focus-tracker"
                            onerror="this.onerror=null;this.src='{{ asset('images/projects/placeholder.jpg') }}';"
                            alt="Focus Tracker AI System" class="img-fluid">
                        <a href="https://opengraph.githubassets.com/1/khaled312001/focus-tracker" 
                           class="portfolio-zoom-link">
                           <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="body">
                        <div class="portfolio-details">
                            <span>AI Computer Vision</span>
                            <h5>Focus Tracker Attention Monitoring</h5>
                        </div>
                        <a href="https://github.com/khaled312001/focus-tracker" class="portfolio-link"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="col-md-6 col-lg-4 portfolio-item">
                <div class="portfolio-item-inner">
                    <div class="portfolio-item-img">
                        <img 
                            src="https://www.google.com/s2/favicons?sz=256&domain=water.itegypt.org"
                            onerror="this.onerror=null;this.src='{{ asset('images/projects/placeholder.jpg') }}';"
                            alt="Water Delivery Platform" class="img-fluid">
                        <a href="https://www.google.com/s2/favicons?sz=256&domain=water.itegypt.org" 
                           class="portfolio-zoom-link">
                           <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="body">
                        <div class="portfolio-details">
                            <span>Delivery Platform</span>
                            <h5>Salsabeel Makkah Water Delivery</h5>
                        </div>
                        <a href="https://water.itegypt.org/" class="portfolio-link"><i class="fa fa-arrow-right"></i></a>
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
