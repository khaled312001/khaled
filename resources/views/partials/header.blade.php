@php
    $khLocale = app()->getLocale();
    $khOther  = $khLocale === 'ar' ? 'en' : 'ar';
@endphp
<header class="ks-nav" id="ksNav">
    <div class="ks-nav__inner">
        <a href="{{ route('home') }}" class="ks-nav__brand" aria-label="Khaled Ahmed Home">
            <img src="{{ asset('images/logo.webp') }}" alt="Khaled Ahmed" width="180" height="38">
        </a>

        <nav class="ks-nav__links" aria-label="Primary">
            <a class="ks-nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">{{ __('site.home') }}</a>
            <a class="ks-nav__link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}">{{ __('site.about') }}</a>
            <a class="ks-nav__link {{ request()->routeIs('services') ? 'is-active' : '' }}" href="{{ route('services') }}">{{ __('site.services') }}</a>
            <a class="ks-nav__link {{ request()->routeIs('portfolios') || request()->routeIs('portfolios.category') ? 'is-active' : '' }}" href="{{ route('portfolios') }}">{{ __('site.portfolio') }}</a>
            <a class="ks-nav__link {{ request()->routeIs('blogs') || request()->routeIs('blog.show') || request()->routeIs('blog.category') ? 'is-active' : '' }}" href="{{ route('blogs') }}">{{ __('site.blog') }}</a>
        </nav>

        <div class="ks-nav__actions">
            <a href="{{ route('lang.switch', $khOther) }}" class="ks-nav__lang" title="{{ __('site.language') }}">
                <i class="fas fa-globe"></i>
                <span>{{ $khOther === 'ar' ? 'العربية' : 'English' }}</span>
            </a>
            <a href="{{ route('contact') }}" class="ks-nav__cta">
                <span>{{ __('site.contact_me') }}</span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>

        <button type="button" class="ks-nav__burger" data-ks-drawer-open aria-label="Open menu" aria-controls="ksDrawer">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>
