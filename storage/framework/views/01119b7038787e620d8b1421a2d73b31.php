<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget">
                        <h6 class="footer-title"><?php echo e(__('site.about_me')); ?></h6>
                        <a href="<?php echo e(route('home')); ?>" aria-label="Khaled Ahmed Home">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Khaled Ahmed - Full Stack Web Developer" class="img-fluid footer-logo" loading="lazy" width="180" height="73">
                        </a>
                        <p class="footer-desc">
                            <?php echo e(__('site.about_footer_desc')); ?>

                        </p>
                        <div class="footer-social-links">
                            <a href="https://github.com/khaled312001" target="_blank" rel="noopener" aria-label="GitHub"><i class="fab fa-github"></i></a>
                            <a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="https://wa.me/201204593124" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            <a href="mailto:khaledahmedhaggagy@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget footer-widget-pl">
                        <h6 class="footer-title"><?php echo e(__('site.quick_links')); ?></h6>
                        <ul class="footer-links">
                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('site.home')); ?></a></li>
                            <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('site.about')); ?></a></li>
                            <li><a href="<?php echo e(route('services')); ?>"><?php echo e(__('site.services')); ?></a></li>
                            <li><a href="<?php echo e(route('portfolios')); ?>"><?php echo e(__('site.portfolio')); ?></a></li>
                            <li><a href="<?php echo e(route('blogs')); ?>"><?php echo e(__('site.blog')); ?></a></li>
                            <li><a href="<?php echo e(route('faqs')); ?>"><?php echo e(__('site.faqs')); ?></a></li>
                            <li><a href="<?php echo e(route('contact')); ?>"><?php echo e(__('site.contact')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget">
                        <h6 class="footer-title"><?php echo e(__('site.popular_articles')); ?></h6>
                        <ul class="footer-links">
                            <li><a href="<?php echo e(route('blog.show', 'hire-full-stack-web-developer-egypt')); ?>">Hire a Full Stack Developer</a></li>
                            <li><a href="<?php echo e(route('blog.show', 'laravel-vs-nodejs-2026')); ?>">Laravel vs Node.js 2026</a></li>
                            <li><a href="<?php echo e(route('blog.show', 'react-vs-vue-2026')); ?>">React vs Vue 2026</a></li>
                            <li><a href="<?php echo e(route('blog.show', 'how-much-does-website-cost-2026')); ?>">Real Website Costs</a></li>
                            <li><a href="<?php echo e(route('blog.show', 'website-seo-checklist-2026')); ?>">47-Point SEO Checklist</a></li>
                            <li><a href="<?php echo e(route('blog.show', 'why-your-website-loads-slowly')); ?>">Why Sites Load Slowly</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget">
                        <h6 class="footer-title"><?php echo e(__('site.contact_info')); ?></h6>
                        <div class="footer-contact-info-wrap">
                            <ul class="footer-contact-info-list">
                                <li>
                                    <h6><i class="far fa-map custom-color-orange"></i> <?php echo e(__('site.location')); ?></h6>
                                    <p><?php echo e(__('site.location_value')); ?></p>
                                </li>
                                <li>
                                    <h6><i class="far fa-envelope custom-color-orange"></i> <?php echo e(__('site.email')); ?></h6>
                                    <div class="text">
                                        <p><a class="text-white" href="mailto:khaledahmedhaggagy@gmail.com">khaledahmedhaggagy@gmail.com</a></p>
                                    </div>
                                </li>
                                <li>
                                    <h6><i class="fas fa-phone custom-color-orange"></i> <?php echo e(__('site.phone_whatsapp')); ?></h6>
                                    <div class="text">
                                        <p>
                                            <a class="text-white" href="tel:+201204593124">+20 120 459 3124</a><br>
                                            <a class="text-white" href="tel:+201010254819">+20 101 025 4819</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <h6><i class="fas fa-clock custom-color-orange"></i> <?php echo e(__('site.response_time_label')); ?></h6>
                                    <div class="text">
                                        <p><?php echo e(__('site.response_time_value')); ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p class="copyright-text">© <?php echo e(date('Y')); ?> Khaled Ahmed. <?php echo e(__('site.all_rights')); ?> <a href="<?php echo e(route('blogs')); ?>" class="text-white"><?php echo e(__('site.blog')); ?></a> · <a href="<?php echo e(route('faqs')); ?>" class="text-white"><?php echo e(__('site.faqs')); ?></a> · <a href="/sitemap.xml" class="text-white"><?php echo e(__('site.sitemap')); ?></a></p>
        </div>
    </div>
</footer>
<?php /**PATH F:\Certificates\khaled\resources\views\partials\footer.blade.php ENDPATH**/ ?>