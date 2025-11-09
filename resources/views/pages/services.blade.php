@extends('layouts.app')

@section('title', 'Services - Web Development & Programming Courses | Khaled Ahmed')
@section('description', 'Professional web development services including Full-Stack Web Development, E-Commerce Platforms, and Programming Courses & Training. Expert in Laravel, React.js, Vue.js, and modern web technologies.')
@section('keywords', 'Web Development Services, Full-Stack Development, E-Commerce Development, Programming Courses, Laravel Development, React.js Development, Vue.js Development, Web Development Training, Programming Instructor')
@section('canonical', 'https://khaledahmed.net/services')
@section('og_image', asset('images/your-logo.jpg'))
@section('og_image_alt', 'Web Development Services - Khaled Ahmed')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>Services</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">
                            Services
                        </li>
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
                    <span>Services & Courses</span>
                    <h2>What I Offer</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                <div class="services-item">
                    <img src="{{ asset('images/1710763075-services-bg-img-1.jpg') }}" alt="Services image" class="services-bg-img">
                    <div class="body">
                    <h4>01</h4>
                    <h5>Full-Stack Web Development</h5>
                    <p>Complete web application development using Laravel, React.js, Vue.js, Nuxt.js, MySQL, and modern frameworks. Building responsive, scalable, and secure web solutions from frontend to backend.</p>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}">Contact Me  <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                    <div class="icon">
                        <span class="fas fa-code"></span>
                    </div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="services-item">
                    <img src="{{ asset('images/1710763115-services-bg-img-2.jpg') }}" alt="Services image" class="services-bg-img">
                    <div class="body">
                    <h4>02</h4>
                    <h5>E-Commerce & Business Platforms</h5>
                    <p>Custom e-commerce solutions, restaurant management systems, delivery platforms, and business websites with payment gateway integration, admin dashboards, and real-time order management.</p>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}">Contact Me  <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                    <div class="icon">
                        <span class="fas fa-shopping-cart"></span>
                    </div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="services-item">
                    <img src="{{ asset('images/1710763115-services-bg-img-2.jpg') }}" alt="Services image" class="services-bg-img">
                    <div class="body">
                    <h4>03</h4>
                    <h5>Programming Courses & Training</h5>
                    <p>Teaching web development, programming basics (Python, JavaScript), kids & teens programming with Scratch, Arduino & IoT, and full-stack development courses. Interactive and hands-on learning.</p>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}">Contact Me  <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                    <div class="icon">
                        <span class="fas fa-chalkboard-teacher"></span>
                    </div>
                    <div class="icon-border"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Services Section End //-->
@endsection

