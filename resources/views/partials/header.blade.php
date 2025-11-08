<header class="header fixed-top" id="header">
    <div id="nav-menu-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand" title="Home" href="{{ route('home') }}">
                    <img src="{{ asset('images/your-logo.jpg') }}" alt="Logo White" class="img-fluid logo-transparent">
                    <img src="{{ asset('images/your-logo.jpg') }}" alt="Logo Black" class="img-fluid logo-normal">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="togler-icon-inner">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('portfolios') ? 'active' : '' }}" href="{{ route('portfolios') }}">Portfolio</a>
                        </li>
                      
                        <li class="nav-item navbar-btn-resp d-flex align-items-center">
                            <a href="{{ route('contact') }}" class="primary-btn">
                                <span class="text">contact With Me</span>
                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

