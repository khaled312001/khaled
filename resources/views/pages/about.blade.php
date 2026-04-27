@extends('layouts.app')

@section('title', 'About Me — Khaled Ahmed | Full Stack Web Developer')
@section('description', 'Learn about Khaled Ahmed — Full Stack Web Developer with 5+ years experience, BSc in IT from Luxor University, ITI Diploma, and 25+ production projects delivered across 7 countries.')
@section('keywords', 'About Khaled Ahmed, Full Stack Developer Egypt, Web Developer Cairo, Programming Instructor, Laravel Expert, React.js Developer, Node.js Developer')
@section('canonical', 'https://khaledahmed.net/about')
@section('og_image', asset('images/logo.png'))
@section('og_image_alt', 'About Khaled Ahmed - Full Stack Web Developer')

@push('styles')
<style>
    .about-img { display: none !important; }
    #about .col-lg-6:last-child { flex: 0 0 100%; max-width: 100%; }
</style>
@endpush

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>{{ __('site.page_about_h1') }}</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ route('home') }}">{{ __('site.home') }}</a></li>
                        <li class="active">{{ __('site.page_about_h1') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// About Section Start //-->
<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <span class="section-badge"><i class="fas fa-user-tie"></i> {{ __('site.about_me') }}</span>
                    <h2 class="section-title-h2">{{ __('site.about_h2') }}</h2>
                    <p style="font-size: 16.5px; line-height: 1.75;">{{ __('site.about_p1') }}</p>
                    <p style="font-size: 16.5px; line-height: 1.75;">{!! __('site.about_p2') !!}</p>
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

<!--// Experience Section Start //-->
<section class="section pb-minus-76 bg-primary-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading-left">
                    <span>Career</span>
                    <h2>Professional Experience</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-code"></span></div></div>
                        <div class="text"><h6>XAPPEE</h6><h5>Web Developer</h5><span>Dec 2025 – Present · Full-time</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-chalkboard-teacher"></span></div></div>
                        <div class="text"><h6>GREEN ARROW ACADEMY</h6><h5>Coding Instructor</h5><span>May 2025 – Oct 2025 · Saudi Arabia</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-laptop-code"></span></div></div>
                        <div class="text"><h6>NILE INTERNATIONAL SCHOOLS</h6><h5>ICT Teacher</h5><span>Jul 2024 – May 2025 · Egypt</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.4s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-server"></span></div></div>
                        <div class="text"><h6>NEO SOFT HUB</h6><h5>Web Developer</h5><span>Feb 2022 – Feb 2024 · Switzerland</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-database"></span></div></div>
                        <div class="text"><h6>ALBAHITH ACADEMY</h6><h5>Full Stack Developer</h5><span>Jun 2022 – Aug 2023 · UAE</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.6s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-rocket"></span></div></div>
                        <div class="text"><h6>BARMAGLY</h6><h5>Founder & Lead Developer</h5><span>May 2021 – Present · Egypt</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Experience Section End //-->

<!--// Skills Section Start //-->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span>Skills</span>
                    <h2>Technologies & Tools</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                <div class="skills-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="mb-resp-15">
                                <li>React.js & JavaScript (ES6+)</li>
                                <li>PHP / Laravel Framework</li>
                                <li>Node.js & Express.js</li>
                                <li>HTML5, CSS3, Bootstrap</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul>
                                <li>MySQL, MongoDB, Firebase</li>
                                <li>Git, GitHub, VS Code</li>
                                <li>cPanel, VPS, Linux Servers</li>
                                <li>Figma, Adobe XD, Postman</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 skills-item-resp">
                            <div class="skills-item">
                                <div class="skills-item-text"><h5>Frontend</h5></div>
                                <div class="body"><h2 class="counter">95</h2>
                                    <div class="skills-progress-bar"><div class="skills-progress-value slideInLeft wow" data-percent="95"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 skills-item-resp">
                            <div class="skills-item">
                                <div class="skills-item-text"><h5>Backend</h5></div>
                                <div class="body"><h2 class="counter">90</h2>
                                    <div class="skills-progress-bar"><div class="skills-progress-value slideInLeft wow" data-percent="90"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Skills Section End //-->

<!--// Education Section Start //-->
<section class="section bg-primary-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span>Education</span>
                    <h2>Academic Background</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-graduation-cap"></span></div></div>
                        <div class="text"><h6>LUXOR UNIVERSITY</h6><h5>BSc in Information Technology</h5><span>2018 – 2022 · Luxor, Egypt</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="resume-item">
                    <div class="body">
                        <div class="icon-outer-line"><div class="icon-inner-line"><span class="fas fa-certificate"></span></div></div>
                        <div class="text"><h6>ITI — INFORMATION TECHNOLOGY INSTITUTE</h6><h5>Full Stack Development Diploma (PHP/Laravel)</h5><span>Intensive Track · Egypt</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Education Section End //-->
@endsection
