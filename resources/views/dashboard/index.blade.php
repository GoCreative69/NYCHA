@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <!-- Dashboard Overview -->
    <div class="dashboard-metrics">
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3 class="metric-title">Total Events</h3>
            <p class="metric-value">24</p>
            <div class="metric-change">
                <i class="fas fa-arrow-up"></i> 12% from last month
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-images"></i>
            </div>
            <h3 class="metric-title">Gallery Images</h3>
            <p class="metric-value">156</p>
            <div class="metric-change">
                <i class="fas fa-arrow-up"></i> 8% from last month
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <h3 class="metric-title">Resources</h3>
            <p class="metric-value">38</p>
            <div class="metric-change">
                <i class="fas fa-arrow-up"></i> 5% from last month
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-users"></i>
            </div>
            <h3 class="metric-title">Registered Users</h3>
            <p class="metric-value">1,245</p>
            <div class="metric-change">
                <i class="fas fa-arrow-up"></i> 15% from last month
            </div>
        </div>
    </div>
    
    <!-- Recent Events -->
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Recent Events</h2>
            <div class="section-actions">
                <a href="{{ asset('/dashboard/events/create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Add New Event
                </a>
            </div>
        </div>
        
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>Community Planning Workshop</td>
                    <td>March 15, 2025</td>
                    <td>Breukelen Community Center</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>Design Review Meeting</td>
                    <td>March 20, 2025</td>
                    <td>Virtual (Zoom)</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>Community Feedback Session</td>
                    <td>April 5, 2025</td>
                    <td>Breukelen Houses Courtyard</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="section-footer">
            <a href="{{ asset('/dashboard/events') }}" class="view-all-link">View All Events <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    
    <!-- Recent Gallery Uploads -->
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Recent Gallery Uploads</h2>
            <div class="section-actions">
                <a href="{{ asset('/dashboard/gallery/create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Upload Images
                </a>
            </div>
        </div>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="{{ asset('images/gallery/cloudburst-1.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/gallery/cloudburst-2.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/gallery/cloudburst-3.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/gallery/cloudburst-4.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-footer">
            <a href="{{ asset('/dashboard/gallery') }}" class="view-all-link">View All Images <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
@endsection
