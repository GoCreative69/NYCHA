@extends('layouts.dashboard')

@section('title', 'Resources Management')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Resources Management</h2>
            <div class="section-actions">
                <a href="{{ asset('/dashboard/resources/create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Add New Resource
                </a>
            </div>
        </div>
        
        <!-- Filter Options -->
        <div class="filter-container">
            <div class="filter-group">
                <label for="category-filter">Category:</label>
                <select id="category-filter" class="form-control">
                    <option value="all">All Categories</option>
                    <option value="community">Community</option>
                    <option value="educational">Educational</option>
                    <option value="technical">Technical</option>
                    <option value="project">Project Documents</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="type-filter">Type:</label>
                <select id="type-filter" class="form-control">
                    <option value="all">All Types</option>
                    <option value="pdf">PDF Documents</option>
                    <option value="video">Video Content</option>
                    <option value="presentation">Presentations</option>
                    <option value="link">External Links</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="action-btn secondary">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>
            </div>
        </div>
        
        <!-- Resources Table -->
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Date Added</th>
                    <th>Downloads</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>Cloudburst Design Guidelines</td>
                    <td>Technical</td>
                    <td>PDF Document</td>
                    <td>Feb 15, 2025</td>
                    <td>245</td>
                    <td><span class="status-badge active">Published</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>Community Engagement Plan</td>
                    <td>Community</td>
                    <td>PDF Document</td>
                    <td>Feb 20, 2025</td>
                    <td>178</td>
                    <td><span class="status-badge active">Published</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>Breukelen Houses Stormwater Analysis</td>
                    <td>Technical</td>
                    <td>PDF Document</td>
                    <td>Mar 01, 2025</td>
                    <td>132</td>
                    <td><span class="status-badge active">Published</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>Project Introduction Video</td>
                    <td>Educational</td>
                    <td>Video Content</td>
                    <td>Mar 05, 2025</td>
                    <td>320</td>
                    <td><span class="status-badge active">Published</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>Stakeholder Presentation</td>
                    <td>Project</td>
                    <td>Presentation</td>
                    <td>Mar 08, 2025</td>
                    <td>95</td>
                    <td><span class="status-badge active">Published</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="6">
                    <td>Construction Schedule</td>
                    <td>Project</td>
                    <td>PDF Document</td>
                    <td>Mar 10, 2025</td>
                    <td>0</td>
                    <td><span class="status-badge pending">Draft</span></td>
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
