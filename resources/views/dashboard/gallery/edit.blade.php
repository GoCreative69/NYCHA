@extends('layouts.dashboard')

@section('title', 'Edit Gallery Item')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Edit Gallery Item</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.gallery.index') }}" class="action-btn secondary">
                    <i class="fas fa-arrow-left"></i> Back to Gallery
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
                <form action="{{ route('dashboard.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="gallery-form">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="title">Title <span class="required">*</span></label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="type">Type <span class="required">*</span></label>
                            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" required>
                                <option value="regular" {{ old('type', $gallery->type) == 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="featured" {{ old('type', $gallery->type) == 'featured' ? 'selected' : '' }}>Featured</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="required">*</span></label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="image">Image</label>
                            <div class="custom-file-upload">
                                <input type="file" id="image" name="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*">
                                <div class="file-preview">
                                    <img id="image-preview" src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" style="max-width: 200px; margin-top: 10px;">
                                </div>
                            </div>
                            <small class="form-text text-muted">Leave empty to keep current image. Upload a JPG, PNG or GIF image (max 2MB)</small>
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="order">Order</label>
                            <input type="number" id="order" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $gallery->order) }}" min="0">
                            <small class="form-text text-muted">Lower numbers appear first</small>
                            @error('order')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="d-block">Status</label>
                            <div class="form-check">
                                <input type="checkbox" id="active" name="active" class="form-check-input" value="1" {{ old('active', $gallery->active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="action-btn">
                            <i class="fas fa-save"></i> Update Gallery Item
                        </button>
                        <a href="{{ route('dashboard.gallery.index') }}" class="action-btn outline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview functionality
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const currentImage = imagePreview.src;
        
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                
                reader.readAsDataURL(this.files[0]);
            } else {
                imagePreview.src = currentImage;
            }
        });
    });
</script>
@endsection
