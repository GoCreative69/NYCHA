<!-- Header -->
<header class="nycha-header">
    <div class="header-container">
        <nav class="navbar">
            <!-- Logo on the left -->
            <a href="{{ asset('/') }}" class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="NYCHA Logo">
            </a>
            
            <!-- Navigation links in the middle -->
            <div class="nav-links">
                <a href="{{ asset('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ asset('/community') }}" class="nav-link {{ Request::is('community') ? 'active' : '' }}">Community</a>
                <a href="{{ asset('/gallery') }}" class="nav-link {{ Request::is('gallery') ? 'active' : '' }}">Gallery</a>
                <a href="{{ asset('/resources') }}" class="nav-link {{ Request::is('resources') ? 'active' : '' }}">Resources</a>
            </div>
            
            <!-- Actions on the right -->
            <div class="header-actions">
                <div class="language-dropdown">
                    <select class="language-select">
                        <option value="en">English</option>
                        <option value="es">Español</option>
                    </select>
                </div>
                <a href="{{ asset('/survey') }}" class="take-survey-btn">Take a Survey</a>
            </div>
            
            <!-- Mobile menu toggle -->
            <div class="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
</header>
<!-- Hero Section with Image -->
@if(!Request::is('gallery'))
<div class="hero-banner">
    <div class="hero-image" style="background-image: url('{{ asset('images/hero-bg-building.jpg') }}');"></div>
    
    <!-- Red Content Section -->
    <div class="hero-content-container">
        <div class="container">
            <div class="hero-content-row">
                <div class="hero-title">
                    <h1>Cloudburst Management at Breukelen Houses</h1>
                </div>
                <div class="hero-right">
                    <p>Leveraging nature-based solutions, hydrologic and hydraulic modeling, and community-oriented stormwater management strategies.</p>
                    <div class="hero-buttons">
                        <a href="{{ asset('/community-meeting') }}" class="hero-btn">Join the Next Community Meeting</a>
                        <a href="{{ asset('/survey') }}" class="hero-btn hero-btn-light">Take the Community Survey</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Mobile Navigation Menu (Hidden by default) -->
<div class="mobile-nav">
    <div class="mobile-nav-links">
        <a href="{{ asset('/') }}" class="mobile-nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ asset('/community') }}" class="mobile-nav-link {{ Request::is('community') ? 'active' : '' }}">Community</a>
        <a href="{{ asset('/gallery') }}" class="mobile-nav-link {{ Request::is('gallery') ? 'active' : '' }}">Gallery</a>
        <a href="{{ asset('/resources') }}" class="mobile-nav-link {{ Request::is('resources') ? 'active' : '' }}">Resources</a>
        <div class="mobile-header-actions">
            <div class="mobile-language-dropdown">
                <select class="mobile-language-select">
                    <option value="en">English</option>
                    <option value="es">Español</option>
                </select>
            </div>
            <a href="{{ asset('/survey') }}" class="mobile-take-survey-btn">Take a Survey</a>
        </div>
    </div>
</div>
