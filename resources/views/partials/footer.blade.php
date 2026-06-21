@php
    $khLocale = app()->getLocale();
    $year = date('Y');
@endphp
<footer class="ks-foot" role="contentinfo">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="ks-foot__brand">
                    <img src="{{ asset('images/logo.png') }}" alt="Khaled Ahmed" width="180" height="38">
                </div>
                <p class="ks-foot__about">
                    {{ $khLocale === 'ar' ? 'مطور ويب فل ستاك خبير في Laravel و React و Node.js. أكثر من خمس سنوات خبرة و25 مشروعا منشورا في ثماني دول.' : 'Senior full stack web developer specialized in Laravel, React, and Node.js. 5+ years of experience and 25+ shipped production projects across 8 countries.' }}
                </p>
                <div class="ks-foot__social">
                    <a href="https://github.com/khaled312001" target="_blank" rel="me noopener" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" rel="me noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://wa.me/201204593124" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:khaledahmedhaggagy@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2 offset-lg-1">
                <h4>{{ $khLocale === 'ar' ? 'الموقع' : 'Site' }}</h4>
                <ul class="ks-foot__links">
                    <li><a href="{{ route('home') }}">{{ __('site.home') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('site.about') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('site.services') }}</a></li>
                    <li><a href="{{ route('portfolios') }}">{{ __('site.portfolio') }}</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <h4>{{ $khLocale === 'ar' ? 'الموارد' : 'Resources' }}</h4>
                <ul class="ks-foot__links">
                    <li><a href="{{ route('blogs') }}">{{ __('site.blog') }}</a></li>
                    <li><a href="{{ route('faqs') }}">{{ __('site.faqs') ?? 'FAQs' }}</a></li>
                    <li><a href="{{ route('plans') }}">{{ $khLocale === 'ar' ? 'الباقات' : 'Plans' }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('site.contact') }}</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h4>{{ $khLocale === 'ar' ? 'تواصل' : 'Get in touch' }}</h4>
                <ul class="ks-foot__links">
                    <li><a href="mailto:khaledahmedhaggagy@gmail.com"><i class="fas fa-envelope" style="color:var(--brand);width:16px;"></i> khaledahmedhaggagy@gmail.com</a></li>
                    <li><a href="tel:+201204593124" dir="ltr"><i class="fas fa-phone-alt" style="color:var(--brand);width:16px;"></i> +20 120 459 3124</a></li>
                    <li><a href="https://wa.me/201204593124" target="_blank" rel="noopener"><i class="fab fa-whatsapp" style="color:var(--success);width:16px;"></i> WhatsApp</a></li>
                    <li><span style="color:var(--text-3);"><i class="fas fa-map-marker-alt" style="color:var(--brand);width:16px;"></i> {{ $khLocale === 'ar' ? 'القاهرة، مصر' : 'Cairo, Egypt' }}</span></li>
                </ul>
            </div>
        </div>
        <div class="ks-foot__bot">
            <div>&copy; {{ $year }} Khaled Ahmed. {{ $khLocale === 'ar' ? 'جميع الحقوق محفوظة.' : 'All rights reserved.' }}</div>
            <div>
                <a href="{{ route('sitemap') }}">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
