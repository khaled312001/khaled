@extends('layouts.app')

@section('title', 'Services')

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
                    <span>Courses & Services</span>
                    <h2>Courses I Can Teach</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                <div class="services-item">
                    <img src="{{ asset('images/1710763075-services-bg-img-1.jpg') }}" alt="Services image" class="services-bg-img">
                    <div class="body">
                    <h4>01</h4>
                    <h5>Web Development</h5>
                    <p>Frontend (HTML, CSS, JavaScript), Backend (PHP, MySQL), and Full-Stack Development with Laravel. Learn to build complete web applications from scratch.</p>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}">Contact Me  <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                    <div class="icon">
                        <span class="fas fa-tablet-alt"></span>
                    </div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="services-item">
                    <img src="{{ asset('images/1710763115-services-bg-img-2.jpg') }}" alt="Services image" class="services-bg-img">
                    <div class="body">
                    <h4>02</h4>
                    <h5>Kids & Teens Programming</h5>
                    <p>Programming with Scratch, Game development, and Robotics & IoT for kids using Arduino. Fun and interactive learning for young minds.</p>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}">Contact Me  <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                    <div class="icon">
                        <span class="fas fa-adjust"></span>
                    </div>
                    <div class="icon-border"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="services-item">
                    <img src="{{ asset('images/1710763151-services-bg-img-3.jpg') }}" alt="Services image" class="services-bg-img">
                    <div class="body">
                    <h4>03</h4>
                    <h5>Beginner Programming</h5>
                    <p>Python or JavaScript basics, Arduino programming & IoT. Perfect starting point for those new to programming and technology.</p>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}">Contact Me  <i class="fa fa-arrow-right"></i></a>
                    </div>
                    </div>
                    <div class="icon">
                        <span class="fab fa-uikit"></span>
                    </div>
                    <div class="icon-border"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Services Section End //-->
@endsection

