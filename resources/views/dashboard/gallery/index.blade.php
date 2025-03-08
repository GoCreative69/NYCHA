@extends('layouts.dashboard')

@section('title', 'Gallery Management')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Gallery Management</h2>
            <div class="section-actions">
                <a href="{{ asset('/dashboard/gallery/create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Upload Images
                </a>
            </div>
        </div>
        
        <!-- Filter Options -->
        <div class="filter-container">
            <div class="filter-group">
                <label for="category-filter">Category:</label>
                <select id="category-filter" class="form-control">
                    <option value="all">All Categories</option>
                    <option value="cloudburst">Cloudburst Solutions</option>
                    <option value="community">Community Events</option>
                    <option value="construction">Construction Progress</option>
                    <option value="design">Design Concepts</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="date-filter">Date Added:</label>
                <select id="date-filter" class="form-control">
                    <option value="all">All Time</option>
                    <option value="recent">Last 30 Days</option>
                    <option value="past-month">Past Month</option>
                    <option value="past-year">Past Year</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="action-btn secondary">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>
            </div>
        </div>
        
        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <div class="gallery-item" data-id="1">
                <img src="{{ asset('images/gallery/cloudburst-1.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="2">
                <img src="{{ asset('images/gallery/cloudburst-2.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="3">
                <img src="{{ asset('images/gallery/cloudburst-3.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="4">
                <img src="{{ asset('images/gallery/cloudburst-4.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="5">
                <img src="{{ asset('images/gallery/cloudburst-5.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="6">
                <img src="{{ asset('images/gallery/cloudburst-6.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="7">
                <img src="{{ asset('images/gallery/community-1.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="8">
                <img src="{{ asset('images/gallery/community-2.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="9">
                <img src="{{ asset('images/gallery/design-1.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="10">
                <img src="{{ asset('images/gallery/design-2.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="11">
                <img src="{{ asset('images/gallery/construction-1.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-id="12">
                <img src="{{ asset('images/gallery/construction-2.jpg') }}" alt="Gallery Image" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="gallery-actions">
                        <button class="gallery-view"><i class="fas fa-eye"></i></button>
                        <button class="gallery-edit"><i class="fas fa-edit"></i></button>
                        <button class="gallery-delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bulk Actions -->
        <div class="bulk-actions">
            <select class="form-control">
                <option value="">Bulk Actions</option>
                <option value="delete">Delete Selected</option>
                <option value="category">Change Category</option>
            </select>
            <button class="action-btn secondary">Apply</button>
        </div>
        
        <!-- Pagination -->
        <div class="dashboard-pagination">
            <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
@endsection
