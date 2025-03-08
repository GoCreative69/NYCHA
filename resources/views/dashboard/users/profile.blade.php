@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">My Profile</h2>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="profile-container">
            <div class="row">
                <!-- Left Column: Avatar and Basic Info -->
                <div class="col-md-4">
                    <div class="dashboard-card profile-sidebar">
                        <div class="profile-avatar-container">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="profile-avatar">
                            @else
                                <img src="{{ asset('images/avatar-placeholder.png') }}" alt="{{ Auth::user()->name }}" class="profile-avatar">
                            @endif
                            
                            <form action="{{ route('dashboard.profile.update-avatar') }}" method="POST" enctype="multipart/form-data" id="avatar-form">
                                @csrf
                                <div class="avatar-upload-container">
                                    <label for="avatar-upload" class="avatar-upload-label">
                                        <i class="fas fa-camera"></i>
                                        <span>Change Photo</span>
                                    </label>
                                    <input type="file" id="avatar-upload" name="avatar" class="avatar-upload-input" accept="image/*" onchange="document.getElementById('avatar-form').submit();">
                                </div>
                            </form>
                        </div>
                        
                        <div class="profile-info">
                            <h3 class="profile-name">{{ Auth::user()->name }}</h3>
                            <div class="profile-meta">
                                <span class="role-badge {{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span>
                                <p class="profile-email">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <div class="profile-stats">
                                <div class="stat-item">
                                    <div class="stat-label">Member Since</div>
                                    <div class="stat-value">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">Last Login</div>
                                    <div class="stat-value">{{ Auth::user()->last_login_at ? Auth::user()->last_login_at->format('M d, Y') : 'Never' }}</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-label">Status</div>
                                    <div class="stat-value">
                                        <span class="status-badge {{ Auth::user()->status }}">{{ ucfirst(Auth::user()->status) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Edit Forms -->
                <div class="col-md-8">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h3>Update Profile Information</h3>
                        </div>
                        
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <form class="dashboard-form" action="{{ route('dashboard.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="action-btn">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="dashboard-card mt-4">
                        <div class="card-header">
                            <h3>Change Password</h3>
                        </div>
                        
                        <div class="card-body">
                            <form class="dashboard-form" action="{{ route('dashboard.profile.change-password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="action-btn">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .profile-container {
            margin-top: 20px;
        }
        
        .profile-sidebar {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .profile-avatar-container {
            position: relative;
            text-align: center;
            padding: 30px 0;
            background-color: #f8f9fa;
        }
        
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .avatar-upload-container {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: -15px;
        }
        
        .avatar-upload-label {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .avatar-upload-input {
            display: none;
        }
        
        .profile-info {
            padding: 20px;
            text-align: center;
        }
        
        .profile-name {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .profile-meta {
            margin-bottom: 20px;
        }
        
        .profile-email {
            color: #6c757d;
            margin-top: 10px;
        }
        
        .profile-stats {
            display: flex;
            flex-direction: column;
            gap: 15px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        
        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 14px;
        }
        
        .stat-value {
            font-weight: 500;
        }
        
        .dashboard-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .card-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            background-color: #f8f9fa;
        }
        
        .card-header h3 {
            margin: 0;
            font-size: 18px;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .mt-4 {
            margin-top: 25px;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        /* Role and Status Badges */
        .role-badge, .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .role-badge.admin {
            background-color: rgba(156, 39, 176, 0.1);
            color: #9c27b0;
        }
        
        .role-badge.editor {
            background-color: rgba(33, 150, 243, 0.1);
            color: #2196f3;
        }
        
        .role-badge.member {
            background-color: rgba(76, 175, 80, 0.1);
            color: #4caf50;
        }
        
        .status-badge.active {
            background-color: rgba(76, 175, 80, 0.1);
            color: #4caf50;
        }
        
        .status-badge.inactive {
            background-color: rgba(244, 67, 54, 0.1);
            color: #f44336;
        }
        
        /* Forms */
        .dashboard-form .form-group {
            margin-bottom: 20px;
        }
        
        .dashboard-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }
    </style>
@endsection
