@extends('layouts.dashboard')

@section('title', 'Resources Management')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Resources Management</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.resources.create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Add New Resource
                </a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
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
                    <th>Downloads</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder resource items -->
                <tr data-id="1">
                    <td>Cloudburst Design Guidelines</td>
                    <td>Technical</td>
                    <td>PDF Document</td>
                    <td>128</td>
                    <td>Feb 25, 2025</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('dashboard.resources.show', 1) }}" class="view"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('dashboard.resources.edit', 1) }}" class="edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('dashboard.resources.destroy', 1) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>Community Engagement Plan</td>
                    <td>Community</td>
                    <td>PDF Document</td>
                    <td>87</td>
                    <td>Feb 18, 2025</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('dashboard.resources.show', 2) }}" class="view"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('dashboard.resources.edit', 2) }}" class="edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('dashboard.resources.destroy', 2) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>Stormwater Management Best Practices</td>
                    <td>Educational</td>
                    <td>Video Content</td>
                    <td>213</td>
                    <td>Feb 10, 2025</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('dashboard.resources.show', 3) }}" class="view"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('dashboard.resources.edit', 3) }}" class="edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('dashboard.resources.destroy', 3) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"><i class="fas fa-trash"></i></button>
                            </form>
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
