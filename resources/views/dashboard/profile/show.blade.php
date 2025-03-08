@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">My Profile</h2>
        </div>
        
        <div class="dashboard-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="row">
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
                                <div class="avatar-upload">
                                    <label for="avatar-input" class="avatar-upload-label">
                                        <i class="fas fa-camera"></i> Change Photo
                                    </label>
                                    <input type="file" id="avatar-input" name="avatar" class="avatar-input" accept="image/*">
                                </div>
                            </form>
                        </div>
                        
                        <div class="profile-info">
                            <h3 class="profile-name">{{ Auth::user()->name }}</h3>
                            <p class="profile-role">{{ ucfirst(Auth::user()->role) }}</p>
                            <p class="profile-status {{ Auth::user()->status }}">
                                <span class="status-indicator"></span>
                                {{ ucfirst(Auth::user()->status) }}
                            </p>
                            
                            @if(Auth::user()->last_login_at)
                                <p class="profile-last-login">
                                    <i class="fas fa-clock"></i> Last login: {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->diffForHumans() }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="dashboard-card">
                        <div class="card-title">
                            <h3>Update Profile</h3>
                        </div>
                        
                        <form action="{{ route('dashboard.profile.update') }}" method="POST" class="profile-form">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="action-btn">Update Profile</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="card-title">
                            <h3>Change Password</h3>
                        </div>
                        
                        <form action="{{ route('dashboard.profile.change-password') }}" method="POST" class="profile-form">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                                    @error('current_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm New Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="action-btn">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit the avatar form when a file is selected
        const avatarInput = document.getElementById('avatar-input');
        const avatarForm = document.getElementById('avatar-form');
        
        avatarInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                avatarForm.submit();
            }
        });
    });
</script>
@endsection
