@extends('layouts.dashboard')

@section('title', 'Add New Resource')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Add New Resource</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.resources.index') }}" class="action-btn secondary">
                    <i class="fas fa-arrow-left"></i> Back to Resources
                </a>
            </div>
        </div>
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="dashboard-content">
            <div class="dashboard-card">
                <form action="{{ route('dashboard.resources.store') }}" method="POST" enctype="multipart/form-data" class="resource-form">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="title">Title <span class="required">*</span></label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="category">Category <span class="required">*</span></label>
                            <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                <option value="community" {{ old('category') == 'community' ? 'selected' : '' }}>Community</option>
                                <option value="educational" {{ old('category') == 'educational' ? 'selected' : '' }}>Educational</option>
                                <option value="technical" {{ old('category') == 'technical' ? 'selected' : '' }}>Technical</option>
                                <option value="project" {{ old('category') == 'project' ? 'selected' : '' }}>Project Documents</option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="required">*</span></label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type">Resource Type <span class="required">*</span></label>
                            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" required>
                                <option value="">Select Type</option>
                                <option value="pdf" {{ old('type') == 'pdf' ? 'selected' : '' }}>PDF Document</option>
                                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video Content</option>
                                <option value="presentation" {{ old('type') == 'presentation' ? 'selected' : '' }}>Presentation</option>
                                <option value="link" {{ old('type') == 'link' ? 'selected' : '' }}>External Link</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6 file-upload-section">
                            <label for="file">Upload File</label>
                            <div class="custom-file-upload">
                                <input type="file" id="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
                                <small class="form-text text-muted">Upload PDFs, presentations, documents (max 10MB)</small>
                            </div>
                            @error('file')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6 external-link-section" style="display: none;">
                            <label for="external_url">External URL <span class="required">*</span></label>
                            <input type="url" id="external_url" name="external_url" class="form-control @error('external_url') is-invalid @enderror" value="{{ old('external_url') }}">
                            <small class="form-text text-muted">Full URL including https://</small>
                            @error('external_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="active" name="active" class="form-check-input" value="1" {{ old('active', '1') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Publish this resource</label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="action-btn">
                            <i class="fas fa-save"></i> Save Resource
                        </button>
                        <a href="{{ route('dashboard.resources.index') }}" class="action-btn outline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('type');
        const fileUploadSection = document.querySelector('.file-upload-section');
        const externalLinkSection = document.querySelector('.external-link-section');
        
        // Handle showing/hiding appropriate fields based on resource type
        typeSelect.addEventListener('change', function() {
            if (this.value === 'link') {
                fileUploadSection.style.display = 'none';
                externalLinkSection.style.display = 'block';
                document.getElementById('external_url').setAttribute('required', 'required');
                document.getElementById('file').removeAttribute('required');
            } else {
                fileUploadSection.style.display = 'block';
                externalLinkSection.style.display = 'none';
                document.getElementById('external_url').removeAttribute('required');
                document.getElementById('file').setAttribute('required', 'required');
            }
        });
        
        // Set initial state
        if (typeSelect.value === 'link') {
            fileUploadSection.style.display = 'none';
            externalLinkSection.style.display = 'block';
            document.getElementById('external_url').setAttribute('required', 'required');
        } else {
            externalLinkSection.style.display = 'none';
        }
    });
</script>
@endsection
