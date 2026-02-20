@extends('layouts.app')

@section('title', 'Services — Web Development, Hosting & Training | Khaled Ahmed')
@section('description', 'Professional web development services: Full Stack Development, Frontend (React.js), Backend (Laravel/Node.js), Web Hosting & DevOps, UI/UX Implementation, and Coding Training & Mentoring.')
@section('keywords', 'Web Development Services, Full Stack Development, React Development, Laravel Development, Node.js Development, Web Hosting, DevOps, Coding Training, Programming Instructor')
@section('canonical', 'https://khaledahmed.net/services')
@section('og_image', asset('images/logo.png'))
@section('og_image_alt', 'Web Development Services - Khaled Ahmed')

@push('styles')
<style>
    .services-bg-img { display: none !important; }
</style>
@endpush

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>Services</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Services</li>
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
                <div class="section-heading">
                    <span>Services</span>
                    <h2>What I Offer</h2>
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
                            <a href="{{ route('contact') }}">Contact Me <i class="fa fa-arrow-right"></i></a>
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
                            <a href="{{ route('contact') }}">Contact Me <i class="fa fa-arrow-right"></i></a>
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
                            <a href="{{ route('contact') }}">Contact Me <i class="fa fa-arrow-right"></i></a>
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
                            <a href="{{ route('contact') }}">Contact Me <i class="fa fa-arrow-right"></i></a>
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
                            <a href="{{ route('contact') }}">Contact Me <i class="fa fa-arrow-right"></i></a>
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
                            <a href="{{ route('contact') }}">Contact Me <i class="fa fa-arrow-right"></i></a>
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
@endsection
