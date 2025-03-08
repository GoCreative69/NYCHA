@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Dashboard</h2>
    </div>
    
    <div class="dashboard-content">
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-image"></i>
                </div>
                <div class="stat-details">
                    <h3 class="stat-value">{{ $galleryCount }}</h3>
                    <p class="stat-label">Gallery Items</p>
                </div>
                <a href="{{ route('dashboard.gallery.index') }}" class="stat-link">
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-details">
                    <h3 class="stat-value">0</h3>
                    <p class="stat-label">Resources</p>
                </div>
                <a href="{{ route('dashboard.resources.index') }}" class="stat-link">
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Additional stat cards can be added here as more features are implemented -->
        </div>
        
        <div class="dashboard-cards">
            <div class="dashboard-row">
                <div class="dashboard-col">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-image"></i> Gallery Management
                            </h3>
                        </div>
                        <div class="card-body">
                            <p>Manage the gallery items displayed on the website. Upload new images, edit descriptions, and control which images appear in the featured slider.</p>
                            <div class="card-actions">
                                <a href="{{ route('dashboard.gallery.index') }}" class="action-btn">
                                    <i class="fas fa-list"></i> View All Items
                                </a>
                                <a href="{{ route('dashboard.gallery.create') }}" class="action-btn">
                                    <i class="fas fa-plus"></i> Add New Item
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-col">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-file-alt"></i> Resources Management
                            </h3>
                        </div>
                        <div class="card-body">
                            <p>Manage downloadable resources and documents for the website. Upload new files, organize by categories, and control visibility.</p>
                            <div class="card-actions">
                                <a href="{{ route('dashboard.resources.index') }}" class="action-btn">
                                    <i class="fas fa-list"></i> View All Resources
                                </a>
                                <a href="{{ route('dashboard.resources.create') }}" class="action-btn">
                                    <i class="fas fa-plus"></i> Add New Resource
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-row">
                <div class="dashboard-col">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user"></i> Your Profile
                            </h3>
                        </div>
                        <div class="card-body">
                            <p>Update your profile information, change your password, and manage your account settings.</p>
                            <div class="card-actions">
                                <a href="{{ route('dashboard.profile.show') }}" class="action-btn">
                                    <i class="fas fa-user-edit"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
