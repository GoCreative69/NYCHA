@extends('layouts.dashboard')

@section('title', 'Gallery Management')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Gallery Management</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.gallery.create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Upload Images
                </a>
            </div>
        </div>
        
        <!-- Filter Options -->
        <div class="filter-container">
            <div class="filter-group">
                <label for="type-filter">Type:</label>
                <select id="type-filter" class="form-control">
                    <option value="all">All Types</option>
                    <option value="regular">Regular</option>
                    <option value="featured">Featured</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="status-filter">Status:</label>
                <select id="status-filter" class="form-control">
                    <option value="all">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="filter-group">
                <button id="apply-filters" class="action-btn secondary">Apply Filters</button>
                <button id="reset-filters" class="action-btn outline">Reset</button>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <!-- Gallery Grid -->
        <div class="gallery-grid">
            @forelse($galleryItems as $item)
                <div class="gallery-item" data-id="{{ $item->id }}">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="gallery-img">
                    <div class="gallery-overlay">
                        <div class="gallery-actions">
                            <button class="gallery-view" data-id="{{ $item->id }}"><i class="fas fa-eye"></i></button>
                            <a href="{{ route('dashboard.gallery.edit', $item->id) }}" class="gallery-edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('dashboard.gallery.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gallery-delete" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                        <div class="gallery-status">
                            <form action="{{ route('dashboard.gallery.toggle.status', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="status-toggle {{ $item->active ? 'active' : 'inactive' }}" title="{{ $item->active ? 'Active (Click to Deactivate)' : 'Inactive (Click to Activate)' }}">
                                    <i class="fas {{ $item->active ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="gallery-details">
                        <h3 class="gallery-title">{{ $item->title }}</h3>
                        <div class="gallery-info">
                            <span class="gallery-type {{ $item->type }}">{{ ucfirst($item->type) }}</span>
                            <span class="gallery-date">{{ $item->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-items">
                    <p>No gallery items found. <a href="{{ route('dashboard.gallery.create') }}">Upload some images</a> to get started.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="pagination-container">
            {{ $galleryItems->links() }}
        </div>
        
        <!-- Bulk Actions -->
        <div class="bulk-actions">
            <select class="form-control bulk-action-select">
                <option value="">Bulk Actions</option>
                <option value="activate">Activate Selected</option>
                <option value="deactivate">Deactivate Selected</option>
                <option value="delete">Delete Selected</option>
            </select>
            <button class="action-btn apply-bulk-action">Apply</button>
        </div>
    </div>
    
    <!-- Gallery Item Preview Modal -->
    <div class="modal" id="galleryPreviewModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-header">
                <h3 id="previewTitle"></h3>
            </div>
            <div class="modal-body">
                <img id="previewImage" src="" alt="Gallery preview">
                <p id="previewDescription"></p>
                <div class="preview-meta">
                    <div id="previewType" class="preview-type"></div>
                    <div id="previewStatus" class="preview-status"></div>
                    <div id="previewDate" class="preview-date"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview modal functionality
        const previewButtons = document.querySelectorAll('.gallery-view');
        const modal = document.getElementById('galleryPreviewModal');
        const closeModal = document.querySelector('.close-modal');
        const previewTitle = document.getElementById('previewTitle');
        const previewImage = document.getElementById('previewImage');
        const previewDescription = document.getElementById('previewDescription');
        const previewType = document.getElementById('previewType');
        const previewStatus = document.getElementById('previewStatus');
        const previewDate = document.getElementById('previewDate');
        
        previewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                const item = document.querySelector(`.gallery-item[data-id="${itemId}"]`);
                
                previewTitle.textContent = item.querySelector('.gallery-title').textContent;
                previewImage.src = item.querySelector('.gallery-img').src;
                previewDescription.textContent = item.querySelector('.gallery-title').getAttribute('data-description') || 'No description available';
                
                const typeEl = item.querySelector('.gallery-type');
                previewType.textContent = typeEl.textContent;
                previewType.className = 'preview-type ' + typeEl.className.split(' ')[1];
                
                const status = item.querySelector('.status-toggle').classList.contains('active') ? 'Active' : 'Inactive';
                previewStatus.textContent = status;
                previewStatus.className = 'preview-status ' + status.toLowerCase();
                
                previewDate.textContent = item.querySelector('.gallery-date').textContent;
                
                modal.style.display = 'flex';
            });
        });
        
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
        
        // Bulk actions
        const bulkActionSelect = document.querySelector('.bulk-action-select');
        const applyBulkAction = document.querySelector('.apply-bulk-action');
        const checkboxes = document.querySelectorAll('.gallery-select input[type="checkbox"]');
        
        applyBulkAction.addEventListener('click', function() {
            const action = bulkActionSelect.value;
            if (!action) {
                alert('Please select an action to perform');
                return;
            }
            
            const selectedItems = document.querySelectorAll('.gallery-select input[type="checkbox"]:checked');
            if (selectedItems.length === 0) {
                alert('Please select at least one item');
                return;
            }
            
            const itemIds = Array.from(selectedItems).map(checkbox => checkbox.value);
            
            if (action === 'delete' && !confirm('Are you sure you want to delete the selected items? This action cannot be undone.')) {
                return;
            }
            
            // Submit the bulk action via AJAX or form
            // Implementation depends on your backend handling
        });
    });
</script>
@endsection
