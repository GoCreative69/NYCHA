<!-- Header -->
<header class="nycha-header">
    <div class="header-container">
        <nav class="navbar">
            <!-- Logo on the left -->
            <a href="{{ asset('/') }}" class="navbar-brand">
                <img src="{{ asset('images/NYCHA-Logo.jpg') }}" alt="NEW YORK CITY HOUSING AUTHORITY">
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
