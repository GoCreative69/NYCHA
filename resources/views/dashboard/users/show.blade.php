@extends('layouts.dashboard')

@section('title', 'User Details')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">User Details</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="action-btn">
                    <i class="fas fa-edit"></i> Edit User
                </a>
                <a href="{{ route('dashboard.users.index') }}" class="action-btn secondary">
                    <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>
        </div>
        
        <div class="dashboard-card">
            <div class="user-profile">
                <div class="user-profile-header">
                    <div class="user-avatar-large">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
                        @else
                            <img src="{{ asset('images/avatar-placeholder.png') }}" alt="{{ $user->name }}">
                        @endif
                    </div>
                    <div class="user-info-large">
                        <h3 class="user-name-large">{{ $user->name }}</h3>
                        <div class="user-meta-large">
                            <span class="role-badge {{ $user->role }}">{{ ucfirst($user->role) }}</span>
                            <span class="status-badge {{ $user->status }}">{{ ucfirst($user->status) }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="user-profile-details">
                    <div class="detail-group">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ $user->email }}</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">User ID</div>
                        <div class="detail-value">#{{ $user->id }}</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Account Created</div>
                        <div class="detail-value">{{ $user->created_at->format('F j, Y') }}</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Last Updated</div>
                        <div class="detail-value">{{ $user->updated_at->format('F j, Y') }}</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Last Login</div>
                        <div class="detail-value">
                            {{ $user->last_login_at ? $user->last_login_at->format('F j, Y h:i A') : 'Never' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-actions mt-4">
            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="action-btn">
                <i class="fas fa-edit"></i> Edit User
            </a>
            
            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-btn danger">
                    <i class="fas fa-trash"></i> Delete User
                </button>
            </form>
            
            <form action="{{ route('dashboard.users.update.status', $user->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                @if($user->status == 'active')
                    <input type="hidden" name="status" value="inactive">
                    <button type="submit" class="action-btn warning">
                        <i class="fas fa-user-slash"></i> Deactivate User
                    </button>
                @else
                    <input type="hidden" name="status" value="active">
                    <button type="submit" class="action-btn success">
                        <i class="fas fa-user-check"></i> Activate User
                    </button>
                @endif
            </form>
        </div>
    </div>
    
    <style>
        .user-profile {
            padding: 20px;
        }
        
        .user-profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .user-avatar-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }
        
        .user-avatar-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .user-name-large {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .user-meta-large {
            display: flex;
            gap: 10px;
        }
        
        .user-profile-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        .detail-group {
            margin-bottom: 15px;
        }
        
        .detail-label {
            font-weight: 500;
            color: #666;
            margin-bottom: 5px;
        }
        
        .detail-value {
            font-size: 16px;
        }
        
        .form-actions {
            display: flex;
            gap: 10px;
        }
        
        .d-inline {
            display: inline-block;
        }
        
        .mt-4 {
            margin-top: 25px;
        }
        
        .action-btn.danger {
            background-color: #f44336;
        }
        
        .action-btn.warning {
            background-color: #ff9800;
        }
        
        .action-btn.success {
            background-color: #4caf50;
        }
    </style>
@endsection
