@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Edit User: {{ $user->name }}</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.users.index') }}" class="action-btn secondary">
                    <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>
        </div>
        
        <div class="dashboard-card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form class="dashboard-form" action="{{ route('dashboard.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password (leave blank to keep current)</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                            <option value="">Select a role</option>
                            <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>Administrator</option>
                            <option value="editor" {{ (old('role', $user->role) == 'editor') ? 'selected' : '' }}>Editor</option>
                            <option value="member" {{ (old('role', $user->role) == 'member') ? 'selected' : '' }}>Member</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="active" {{ (old('status', $user->status) == 'active') ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ (old('status', $user->status) == 'inactive') ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="avatar">Profile Picture</label>
                        @if($user->avatar)
                            <div class="current-avatar mb-2">
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" style="max-width: 100px; border-radius: 50%;">
                                <p class="small text-muted mt-1">Current profile picture</p>
                            </div>
                        @endif
                        <div class="file-upload">
                            <input type="file" class="file-upload-input" id="avatar" name="avatar">
                            <label for="avatar" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Choose a new image
                            </label>
                            <div class="file-preview"></div>
                        </div>
                        <small class="form-text text-muted">Max file size: 2MB. Supported formats: JPG, PNG.</small>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn">Update User</button>
                    <a href="{{ route('dashboard.users.index') }}" class="action-btn secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
