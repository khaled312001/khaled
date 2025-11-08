

<?php $__env->startSection('title', 'Homepage'); ?>

<?php $__env->startSection('content'); ?>
<!--// Hero Section Start //-->
<section class="hero-banner" data-scroll-index="1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                <div class="hero-inner">
                    <h1>
                        Khaled Ahmed
                        Full-Stack Developer & Certified Instructor
                    </h1>
                    <h2>
                        Full Stack Developer and Instructor with strong experience in building full web applications, teaching programming, and delivering interactive training. Skilled in PHP/Laravel, JavaScript, Python, React, and modern development practices.
                    </h2>
                    <a href="#" data-scroll-nav="4" class="white-btn">
                        <span class="text">View Works</span>
                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                <div class="hero-img">
                    <div class="border-line-outer">
                        <div class="border-line-inner">
                            <img src="<?php echo e(asset('images/354x354.jpg')); ?>" title="banner image" alt="banner image" class="img-fluid">
                        </div>
                    </div>
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
            <div class="col-lg-6">
                <div class="about-img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                    <img src="<?php echo e(asset('images/480x600.jpg')); ?>" alt="About image" title="About image" class="img-fluid">
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
                    <a href="<?php echo e(route('contact')); ?>" class="primary-btn me-3 mb-3">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\AIA\Downloads\khaled\resources\views/pages/home.blade.php ENDPATH**/ ?>