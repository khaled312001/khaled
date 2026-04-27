<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget">
                        <h6 class="footer-title">{{ __('site.about_me') }}</h6>
                        <a href="{{ route('home') }}" aria-label="Khaled Ahmed Home">
                            <img src="{{ asset('images/logo.png') }}" alt="Khaled Ahmed - Full Stack Web Developer" class="img-fluid footer-logo" loading="lazy" width="180" height="73">
                        </a>
                        <p class="footer-desc">
                            {{ __('site.about_footer_desc') }}
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
                        <h6 class="footer-title">{{ __('site.quick_links') }}</h6>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}">{{ __('site.home') }}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('site.about') }}</a></li>
                            <li><a href="{{ route('services') }}">{{ __('site.services') }}</a></li>
                            <li><a href="{{ route('portfolios') }}">{{ __('site.portfolio') }}</a></li>
                            <li><a href="{{ route('blogs') }}">{{ __('site.blog') }}</a></li>
                            <li><a href="{{ route('faqs') }}">{{ __('site.faqs') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('site.contact') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget">
                        <h6 class="footer-title">{{ __('site.popular_articles') }}</h6>
                        <ul class="footer-links">
                            <li><a href="{{ route('blog.show', 'hire-full-stack-web-developer-egypt') }}">Hire a Full Stack Developer</a></li>
                            <li><a href="{{ route('blog.show', 'laravel-vs-nodejs-2026') }}">Laravel vs Node.js 2026</a></li>
                            <li><a href="{{ route('blog.show', 'react-vs-vue-2026') }}">React vs Vue 2026</a></li>
                            <li><a href="{{ route('blog.show', 'how-much-does-website-cost-2026') }}">Real Website Costs</a></li>
                            <li><a href="{{ route('blog.show', 'website-seo-checklist-2026') }}">47-Point SEO Checklist</a></li>
                            <li><a href="{{ route('blog.show', 'why-your-website-loads-slowly') }}">Why Sites Load Slowly</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer-widget-resp">
                    <div class="footer-widget">
                        <h6 class="footer-title">{{ __('site.contact_info') }}</h6>
                        <div class="footer-contact-info-wrap">
                            <ul class="footer-contact-info-list">
                                <li>
                                    <h6><i class="far fa-map custom-color-orange"></i> {{ __('site.location') }}</h6>
                                    <p>{{ __('site.location_value') }}</p>
                                </li>
                                <li>
                                    <h6><i class="far fa-envelope custom-color-orange"></i> {{ __('site.email') }}</h6>
                                    <div class="text">
                                        <p><a class="text-white" href="mailto:khaledahmedhaggagy@gmail.com">khaledahmedhaggagy@gmail.com</a></p>
                                    </div>
                                </li>
                                <li>
                                    <h6><i class="fas fa-phone custom-color-orange"></i> {{ __('site.phone_whatsapp') }}</h6>
                                    <div class="text">
                                        <p>
                                            <a class="text-white" href="tel:+201204593124">+20 120 459 3124</a><br>
                                            <a class="text-white" href="tel:+201010254819">+20 101 025 4819</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <h6><i class="fas fa-clock custom-color-orange"></i> {{ __('site.response_time_label') }}</h6>
                                    <div class="text">
                                        <p>{{ __('site.response_time_value') }}</p>
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
            <p class="copyright-text">© {{ date('Y') }} Khaled Ahmed. {{ __('site.all_rights') }} <a href="{{ route('blogs') }}" class="text-white">{{ __('site.blog') }}</a> · <a href="{{ route('faqs') }}" class="text-white">{{ __('site.faqs') }}</a> · <a href="/sitemap.xml" class="text-white">{{ __('site.sitemap') }}</a></p>
        </div>
    </div>
</footer>
