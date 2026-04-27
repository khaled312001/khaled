@php $currentLocale = app()->getLocale(); $otherLocale = $currentLocale === 'ar' ? 'en' : 'ar'; @endphp
<header class="header fixed-top" id="header">
    <div id="nav-menu-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand site-logo" title="Khaled Ahmed — Senior Full Stack Web Developer" href="{{ route('home') }}" aria-label="Khaled Ahmed Home">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="Khaled Ahmed - Full Stack Web Developer"
                         width="180" height="73"
                         class="img-fluid"
                         loading="eager" decoding="async">
                </a>

                {{-- Hamburger trigger for the kh-drawer (mobile only) --}}
                <button type="button" class="kh-drawer-trigger" data-kh-drawer-open aria-controls="khDrawer" aria-expanded="false" aria-label="Open menu">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse main-menu" id="fixedNavbar">
                    <ul class="navbar-nav align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('site.about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">{{ __('site.services') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('portfolios') || request()->routeIs('portfolios.category') ? 'active' : '' }}" href="{{ route('portfolios') }}">{{ __('site.portfolio') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('blogs') || request()->routeIs('blog.show') || request()->routeIs('blog.category') ? 'active' : '' }}" href="{{ route('blogs') }}">{{ __('site.blog') }}</a>
                        </li>
                        <li class="nav-item navbar-btn-resp d-none d-lg-flex align-items-center" style="gap: 10px;">
                            <a href="{{ route('lang.switch', $otherLocale) }}" class="lang-switch" title="{{ __('site.language') }}">
                                <i class="fas fa-globe"></i>
                                {{ $otherLocale === 'ar' ? 'العربية' : 'English' }}
                            </a>
                            <a href="{{ route('contact') }}" class="primary-btn">
                                <span class="text">{{ __('site.contact_me') }}</span>
                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
