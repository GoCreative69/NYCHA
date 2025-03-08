@extends('layouts.dashboard')

@section('title', 'Create New User')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Create New User</h2>
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
            
            <form class="dashboard-form" action="{{ route('dashboard.users.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                            <option value="">Select a role</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                            <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="avatar">Profile Picture</label>
                        <div class="file-upload">
                            <input type="file" class="file-upload-input" id="avatar" name="avatar">
                            <label for="avatar" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Choose an image
                            </label>
                            <div class="file-preview"></div>
                        </div>
                        <small class="form-text text-muted">Max file size: 2MB. Supported formats: JPG, PNG.</small>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn">Create User</button>
                    <a href="{{ route('dashboard.users.index') }}" class="action-btn secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
