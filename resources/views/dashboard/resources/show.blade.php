@extends('layouts.dashboard')

@section('title', 'View Resource')

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Resource Details</h2>
        <div class="section-actions">
            <a href="{{ route('dashboard.resources.index') }}" class="action-btn secondary">
                <i class="fas fa-arrow-left"></i> Back to Resources
            </a>
            <a href="{{ route('dashboard.resources.edit', $resource ?? '1') }}" class="action-btn">
                <i class="fas fa-edit"></i> Edit Resource
            </a>
        </div>
    </div>
    
    <div class="dashboard-content">
        <div class="resource-detail-card">
            <div class="resource-header">
                <h3 class="resource-title">{{ $resource->title ?? 'Cloudburst Design Guidelines' }}</h3>
                <div class="resource-meta">
                    <span class="resource-category">
                        <i class="fas fa-folder"></i> {{ ucfirst($resource->category ?? 'Technical') }}
                    </span>
                    <span class="resource-type">
                        <i class="fas fa-file-alt"></i> {{ ucfirst($resource->type ?? 'PDF Document') }}
                    </span>
                    <span class="resource-status">
                        @if($resource->active ?? true)
                            <span class="status-badge active">Active</span>
                        @else
                            <span class="status-badge inactive">Inactive</span>
                        @endif
                    </span>
                </div>
            </div>
            
            <div class="resource-body">
                <div class="resource-description">
                    <h4>Description</h4>
                    <p>{{ $resource->description ?? 'Comprehensive design guidelines for implementing cloudburst infrastructure at NYCHA developments.' }}</p>
                </div>
                
                <div class="resource-stats">
                    <div class="stat-item">
                        <span class="stat-label">Downloads</span>
                        <span class="stat-value">{{ $resource->downloads ?? '128' }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Last Updated</span>
                        <span class="stat-value">{{ $resource->updated_at ? $resource->updated_at->format('M d, Y') : 'Feb 25, 2025' }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Created On</span>
                        <span class="stat-value">{{ $resource->created_at ? $resource->created_at->format('M d, Y') : 'Feb 15, 2025' }}</span>
                    </div>
                </div>
                
                <div class="resource-preview">
                    @if(isset($resource) && $resource->type === 'pdf')
                        <div class="pdf-preview">
                            <iframe src="{{ asset('storage/' . ($resource->file_path ?? 'resources/sample.pdf')) }}" width="100%" height="500px"></iframe>
                        </div>
                    @elseif(isset($resource) && $resource->type === 'video')
                        <div class="video-preview">
                            <iframe width="100%" height="500px" src="{{ $resource->external_url ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @elseif(isset($resource) && $resource->type === 'link')
                        <div class="link-preview">
                            <a href="{{ $resource->external_url ?? '#' }}" class="preview-link" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Open External Resource
                            </a>
                        </div>
                    @else
                        <div class="placeholder-preview">
                            <img src="{{ asset('images/pdf-preview.png') }}" alt="PDF Preview" class="preview-image">
                            <a href="#" class="download-link">
                                <i class="fas fa-download"></i> Download Resource
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="resource-actions">
                <form action="{{ route('dashboard.resources.destroy', $resource ?? '1') }}" method="POST" class="d-inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn danger" onclick="return confirm('Are you sure you want to delete this resource?')">
                        <i class="fas fa-trash"></i> Delete Resource
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
