@extends('layouts.app')

@section('title', 'About Me - Khaled Ahmed | Full-Stack Developer & Instructor')
@section('description', 'Learn more about Khaled Ahmed, a Full Stack Developer and Certified Instructor based in Qena, Egypt. Specializing in web development, programming education, and building modern web applications.')
@section('keywords', 'About Khaled Ahmed, Full Stack Developer Egypt, Web Developer Qena, Programming Instructor, Laravel Expert, React.js Developer, Vue.js Developer')
@section('canonical', 'https://khaledahmed.net/about')
@section('og_image', asset('images/your-logo.jpg'))
@section('og_image_alt', 'About Khaled Ahmed - Full-Stack Developer')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>About Us</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">
                            About Us
                        </li>
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
            <div class="col-lg-6">
                <div class="about-img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                    <img src="{{ asset('images/480x600.jpg') }}" alt="About image" title="About image" class="img-fluid">
                    <a class="about-video-btn" href="https://www.youtube.com/watch?v=KVdidEV8nbg"><i class="fa fa-play"></i></a>
                    <div class="video-border-line"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <h6>About Me</h6>
                    <h2>Full-Stack Developer & Certified Instructor</h2>
                    <p>
                        Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training. Skilled in PHP/Laravel, JavaScript, Python, React, and modern development practices. Experienced in Agile/Scrum, team leadership, and mentoring students. Passionate about problem solving, high-quality development, and empowering learners.
                    </p>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="mb-resp-15">
                                <li>
                                    <div class="text">
                                        <h5>Name :</h5>
                                        <p>Khaled Ahmed</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <h5>Location :</h5>
                                        <p>Qena, Egypt</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <h5>Freelance :</h5>
                                        <p>Available</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul>
                                <li>
                                    <div class="text">
                                        <h5>Education :</h5>
                                        <p>Luxor University, ITI</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <h5>Languages :</h5>
                                        <p>Arabic (Native), English (Fluent), French (Intermediate)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <h5>Phone :</h5>
                                        <p>+20 1204593124 / +20 1010254819</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="primary-btn me-3 mb-3">
                        <span class="text">Get Started</span>
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

