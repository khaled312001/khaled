

<?php $__env->startSection('title', 'Contact Khaled Ahmed — Free 30-Min Consultation | Web Developer'); ?>
<?php $__env->startSection('description', 'Hire Khaled Ahmed — senior full stack web developer. Free 30-minute consultation, 24-hour response. Email khaledahmedhaggagy@gmail.com or call +20 120 459 3124. Based in Cairo, working worldwide.'); ?>
<?php $__env->startSection('keywords', 'contact web developer, hire full stack developer, web developer consultation, Khaled Ahmed contact, Laravel developer hire, freelance web developer Egypt, web development quote'); ?>
<?php $__env->startSection('canonical', 'https://khaledahmed.net/contact'); ?>
<?php $__env->startSection('og_image', asset('images/logo.png')); ?>
<?php $__env->startSection('og_image_alt', 'Contact Khaled Ahmed - Full-Stack Developer'); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "url": "<?php echo e(url('/contact')); ?>",
    "name": "Contact Khaled Ahmed — Senior Full Stack Web Developer",
    "mainEntity": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "telephone": "+20-1204593124",
        "email": "khaledahmedhaggagy@gmail.com",
        "url": "https://khaledahmed.net",
        "address": {"@type":"PostalAddress","addressLocality":"Cairo","addressCountry":"EG"},
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ]
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"<?php echo e(url('/')); ?>"},
        {"@type":"ListItem","position":2,"name":"Contact","item":"<?php echo e(url('/contact')); ?>"}
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>Contact Me</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="active">
                            Contact Me
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Contact Section Start //-->
<section class="section contact-section-enhanced">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="section-heading-left wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <span>Contact</span>
                    <h2>Get In Touch</h2>
                    <p class="mt-3">Feel free to reach out to me for any inquiries, collaborations, or just to say hello. I'm always open to discussing new projects and opportunities.</p>
                </div>
                <div class="contact-info-enhanced">
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="body">
                            <h5>Address</h5>
                            <p>Cairo, Egypt</p>
                        </div>
                    </div>
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="body">
                            <h5>Email</h5>
                            <p><a href="mailto:khaledahmedhaggagy@gmail.com">khaledahmedhaggagy@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="body">
                            <h5>Phone</h5>
                            <p>
                                <a href="tel:+201204593124">+20 1204593124</a> / 
                                <a href="tel:+201010254819">+20 1010254819</a>
                            </p>
                        </div>
                    </div>
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="body">
                            <h5>Website</h5>
                            <p><a href="https://khaledahmed.net" target="_blank">https://khaledahmed.net</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-enhanced wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                    <h4 class="form-title">Send a Message</h4>
                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="contact-form-modern">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <input type="text" class="form-control-modern" name="name" placeholder="Your Name" required>
                                    <i class="fas fa-user form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <input type="email" class="form-control-modern" name="email" placeholder="Your Email" required>
                                    <i class="fas fa-envelope form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group-modern">
                                    <input type="text" class="form-control-modern" name="subject" placeholder="Subject" required>
                                    <i class="fas fa-tag form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group-modern">
                                    <textarea class="form-control-modern" name="message" rows="5" placeholder="Your Message" required></textarea>
                                    <i class="fas fa-comment form-icon form-icon-textarea"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="primary-btn btn-enhanced">
                                    <span class="text">Send Message</span>
                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Contact Section End //-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\contact.blade.php ENDPATH**/ ?>