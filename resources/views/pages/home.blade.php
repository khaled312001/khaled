@extends('layouts.app')

@section('title', 'Khaled Ahmed — Full Stack Web Developer | 25+ Projects Across 7 Countries')
@section('description', 'Full Stack Web Developer with 5+ years of experience delivering 25+ production projects across 7 countries. Expert in React.js, Node.js, PHP/Laravel, MySQL, MongoDB and modern web technologies.')
@section('keywords', 'Khaled Ahmed, Full Stack Developer, Web Developer, React, Laravel, Node.js, PHP, JavaScript, Portfolio, Egypt Developer, Barmagly')
@section('canonical', 'https://khaledahmed.net')
@section('og_image', asset('images/logo.png'))
@section('og_image_alt', 'Khaled Ahmed — Full Stack Web Developer')

@push('styles')
<style>
    .hero-img { display: none !important; }
    .hero-banner .col-lg-7 { flex: 0 0 100%; max-width: 100%; }
    .about-img { display: none !important; }
    #about .col-lg-6:last-child { flex: 0 0 100%; max-width: 100%; }
    .hero-banner { background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%); }
</style>
@endpush

@section('content')
<!--// Hero Section Start //-->
<section class="hero-banner" data-scroll-index="1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-10 wow fadeInUp">
                <div class="hero-inner">
                    <h1>
                        Hi, I'm <span style="color:var(--main-color)">Khaled Ahmed</span>
                    </h1>
                    <h2>
                        Full Stack Web Developer with 5+ years of professional experience delivering 25+ production projects across 7 countries. Specialized in React.js, Node.js, PHP/Laravel, and modern web technologies.
                    </h2>
                    <a href="{{ route('portfolios') }}" class="white-btn">
                        <span class="text">View My Work</span>
                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <ul class="hero-social-list">
        <li><a href="https://github.com/khaled312001" target="_blank"><i class="fab fa-github"></i></a></li>
        <li><a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank"><i class="fab fa-linkedin"></i></a></li>
        <li><a href="https://khaledahmed.net" target="_blank"><i class="fas fa-globe"></i></a></li>
    </ul>
    <a href="mailto:khaledahmedhaggagy@gmail.com" class="hero-email-link">khaledahmedhaggagy@gmail.com</a>
</section>
<!--// Hero Section End //-->

<!--// About Section Start //-->
<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <h6>About Me</h6>
                    <h2>Full Stack Developer & Founder of Barmagly</h2>
                    <p>
                        Results-driven Full Stack Web Developer with a Bachelor's degree in Information Technology from Luxor University, an ITI Diploma in Full Stack Development (PHP/Laravel), and 5+ years of hands-on experience building scalable web applications and teaching software development. Proficient in modern frontend and backend technologies including React.js, Node.js, PHP/Laravel, and databases (MySQL, MongoDB). Experienced in web hosting, server configuration, domain management, and deployment pipelines. Proven track record of delivering pixel-perfect, responsive websites and leading cross-functional teams across international organizations. Founder of Barmagly software startup, combining entrepreneurial vision with strong technical execution.
                    </p>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="mb-resp-15">
                                <li><div class="text"><h5>Name :</h5><p>Khaled Ahmed</p></div></li>
                                <li><div class="text"><h5>Location :</h5><p>Cairo, Egypt</p></div></li>
                                <li><div class="text"><h5>Freelance :</h5><p>Available</p></div></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul>
                                <li><div class="text"><h5>Education :</h5><p>Luxor University — IT, ITI Diploma</p></div></li>
                                <li><div class="text"><h5>Languages :</h5><p>English (Fluent), Arabic (Native)</p></div></li>
                                <li><div class="text"><h5>Phone :</h5><p>+20 120 459 3124 / +20 101 025 4819</p></div></li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="primary-btn me-3 mb-3">
                        <span class="text">Contact Me</span>
                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                    </a>
                    <a href="/Khaled_Ahmed.pdf" class="primary-btn" download>
                        <span class="text">Download CV</span>
                        <span class="icon"><i class="fa fa-download"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// About Section End //-->
@endsection