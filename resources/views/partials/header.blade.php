@php $currentLocale = app()->getLocale(); $otherLocale = $currentLocale === 'ar' ? 'en' : 'ar'; @endphp
<header class="nav-bar" id="header">
    <div class="container nav-bar-inner">
        <a class="nav-brand" href="{{ route('home') }}" aria-label="Khaled Ahmed Home">
            <span class="nav-brand-mark">KH</span>
            <span class="nav-brand-text">Khaled <span>Ahmed</span></span>
        </a>

        <button type="button" class="nav-burger kh-drawer-trigger" data-kh-drawer-open aria-controls="khDrawer" aria-expanded="false" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>

        <nav class="nav-links" aria-label="Primary">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('site.home') }}</a>
            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('site.about') }}</a>
            <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">{{ __('site.services') }}</a>
            <a class="nav-link {{ request()->routeIs('portfolios') || request()->routeIs('portfolios.category') ? 'active' : '' }}" href="{{ route('portfolios') }}">{{ __('site.portfolio') }}</a>
            <a class="nav-link {{ request()->routeIs('blogs') || request()->routeIs('blog.show') || request()->routeIs('blog.category') ? 'active' : '' }}" href="{{ route('blogs') }}">{{ __('site.blog') }}</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('lang.switch', $otherLocale) }}" class="nav-lang" title="{{ __('site.language') }}">
                <i class="fas fa-globe"></i>
                <span>{{ $otherLocale === 'ar' ? 'العربية' : 'English' }}</span>
            </a>
            <a href="{{ route('contact') }}" class="nav-cta">
                <span>{{ __('site.contact_me') }}</span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</header>
