<!-- Header -->
<header class="nycha-header">
    <div class="header-container">
        <nav class="navbar">
            <a href="{{ secure_asset('/') }}" class="navbar-brand">
                <img src="{{ secure_asset('images/NYCHA-Logo.jpg') }}" alt="NEW YORK CITY HOUSING AUTHORITY">
            </a>
            <div class="nav-links">
                <a href="{{ secure_asset('/') }}" class="nav-link">Home</a>
                <a href="{{ secure_asset('/community') }}" class="nav-link">Community</a>
                <a href="{{ secure_asset('/gallery') }}" class="nav-link">Gallery</a>
                <a href="{{ secure_asset('/resources') }}" class="nav-link">Resources</a>
            </div>
            <div class="header-actions">
                <select class="language-select">
                    <option value="en">English</option>
                    <option value="es">Español</option>
                </select>
                <a href="{{ secure_asset('/survey') }}" class="take-survey-btn">Take a Survey</a>
            </div>
        </nav>
    </div>
</header>
