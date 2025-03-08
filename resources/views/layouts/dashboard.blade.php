<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - NYCHA Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @yield('styles')
</head>
@auth
<body class="dashboard-body">
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <!-- Logo -->
            <div class="dashboard-logo">
                <a href="{{ route('dashboard.index') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="NYCHA Logo">
                </a>
            </div>
            <nav class="dashboard-nav">
                <ul class="dashboard-menu">
                    <li class="dashboard-menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="dashboard-menu-item {{ request()->is('dashboard/events*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.events.index') }}">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li class="dashboard-menu-item {{ request()->is('dashboard/gallery*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.gallery.index') }}">
                            <i class="fas fa-images"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    <li class="dashboard-menu-item {{ request()->is('dashboard/resources*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.resources.index') }}">
                            <i class="fas fa-file-alt"></i>
                            <span>Resources</span>
                        </a>
                    </li>
                    <li class="dashboard-menu-item {{ request()->is('dashboard/users*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.index') }}">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="dashboard-menu-item {{ request()->is('dashboard/profile*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.profile.show') }}">
                            <i class="fas fa-user-circle"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="dashboard-footer">
                <a href="{{ url('/') }}" class="view-site-link">
                    <i class="fas fa-globe"></i>
                    <span>View Site</span>
                </a>
                <div class="dashboard-user">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="dashboard-avatar">
                    @else
                        <img src="{{ asset('images/avatar-placeholder.png') }}" alt="{{ Auth::user()->name }}" class="dashboard-avatar">
                    @endif
                    <div class="dashboard-user-info">
                        <p class="dashboard-user-name">{{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}" class="logout-form">
                            @csrf
                            <button type="submit" class="dashboard-logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="dashboard-header-left">
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="dashboard-title">@yield('title', 'Dashboard')</h1>
                </div>
                <div class="dashboard-header-right">
                    <div class="dashboard-search">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="dashboard-notifications">
                        <a href="#" class="notification-icon">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="dashboard-content">
                @yield('content')
            </div>
        </main>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @yield('scripts')
</body>
@endauth
</html>
