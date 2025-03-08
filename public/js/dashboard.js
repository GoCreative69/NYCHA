/**
 * NYCHA Dashboard JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar Toggle Functionality
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.dashboard-sidebar');
    const mainContent = document.querySelector('.dashboard-main');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
    }
    
    // File Upload Preview
    const fileInputs = document.querySelectorAll('.file-upload-input');
    
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const fileUpload = this.closest('.file-upload');
            const preview = fileUpload.querySelector('.file-preview');
            
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    if (preview) {
                        preview.innerHTML = `<img src="${e.target.result}" alt="File Preview">`;
                        preview.style.display = 'block';
                    }
                };
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    
    // Table Row Actions
    const tableActionButtons = document.querySelectorAll('.row-actions button');
    
    tableActionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const action = this.dataset.action;
            const itemId = this.closest('tr').dataset.id;
            
            if (action === 'delete') {
                if (confirm('Are you sure you want to delete this item?')) {
                    console.log(`Delete item with ID: ${itemId}`);
                    // Will implement actual delete functionality later
                }
            } else if (action === 'edit') {
                console.log(`Edit item with ID: ${itemId}`);
                // Will implement actual edit functionality later
            } else if (action === 'view') {
                console.log(`View item with ID: ${itemId}`);
                // Will implement actual view functionality later
            }
        });
    });
    
    // Form Validation Example
    const forms = document.querySelectorAll('.dashboard-form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    
                    const errorMessage = field.dataset.errorMessage || 'This field is required';
                    let errorElement = field.nextElementSibling;
                    
                    if (!errorElement || !errorElement.classList.contains('error-message')) {
                        errorElement = document.createElement('span');
                        errorElement.classList.add('error-message');
                        field.parentNode.insertBefore(errorElement, field.nextSibling);
                    }
                    
                    errorElement.textContent = errorMessage;
                } else {
                    field.classList.remove('error');
                    const errorElement = field.nextElementSibling;
                    if (errorElement && errorElement.classList.contains('error-message')) {
                        errorElement.remove();
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
    
    // Image Gallery Preview
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    galleryItems.forEach(item => {
        const viewButton = item.querySelector('.gallery-view');
        if (viewButton) {
            viewButton.addEventListener('click', function() {
                const imgSrc = item.querySelector('.gallery-img').src;
                const modal = document.createElement('div');
                modal.classList.add('gallery-modal');
                modal.innerHTML = `
                    <div class="gallery-modal-content">
                        <span class="gallery-modal-close">&times;</span>
                        <img src="${imgSrc}" alt="Gallery Image">
                    </div>
                `;
                document.body.appendChild(modal);
                
                const closeBtn = modal.querySelector('.gallery-modal-close');
                closeBtn.addEventListener('click', function() {
                    modal.remove();
                });
                
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.remove();
                    }
                });
            });
        }
    });
    
    // Notification Dropdown
    const notificationIcon = document.querySelector('.notification-icon');
    
    if (notificationIcon) {
        notificationIcon.addEventListener('click', function(e) {
            e.preventDefault();
            // Will implement notifications dropdown
        });
    }
});
