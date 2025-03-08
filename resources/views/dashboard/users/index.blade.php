@extends('layouts.dashboard')

@section('title', 'Users Management')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Users Management</h2>
            <div class="section-actions">
                <a href="{{ route('dashboard.users.create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Add New User
                </a>
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
        
        <!-- Filter Options -->
        <div class="filter-container">
            <form action="{{ route('dashboard.users.index') }}" method="GET">
                <div class="filter-group">
                    <label for="role-filter">Role:</label>
                    <select id="role-filter" name="role" class="form-control">
                        <option value="all">All Roles</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrators</option>
                        <option value="editor" {{ request('role') == 'editor' ? 'selected' : '' }}>Editors</option>
                        <option value="member" {{ request('role') == 'member' ? 'selected' : '' }}>Members</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="status-filter">Status:</label>
                    <select id="status-filter" name="status" class="form-control">
                        <option value="all">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="search-user">Search:</label>
                    <input type="text" id="search-user" name="search" class="form-control" placeholder="Name or Email" value="{{ request('search') }}">
                </div>
                <div class="filter-group">
                    <button type="submit" class="action-btn secondary">
                        <i class="fas fa-filter"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Users Table -->
        <form action="{{ route('dashboard.users.bulk.action') }}" method="POST" id="users-form">
            @csrf
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th width="3%"><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date Joined</th>
                        <th>Last Login</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="user-checkbox"></td>
                            <td>
                                <div class="user-info">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="user-avatar">
                                    @else
                                        <img src="{{ asset('images/avatar-placeholder.png') }}" alt="{{ $user->name }}" class="user-avatar">
                                    @endif
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-meta">ID: #{{ $user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td><span class="role-badge {{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>{{ $user->last_login_at ? $user->last_login_at->format('M d, Y') : 'Never' }}</td>
                            <td><span class="status-badge {{ $user->status }}">{{ ucfirst($user->status) }}</span></td>
                            <td>
                                <div class="row-actions">
                                    <a href="{{ route('dashboard.users.show', $user->id) }}" class="view"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="edit"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="{{ $user->id }}" class="delete delete-user"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <!-- Bulk Actions -->
            <div class="bulk-actions">
                <select class="form-control" name="action" id="bulk-action">
                    <option value="">Bulk Actions</option>
                    <option value="activate">Activate</option>
                    <option value="deactivate">Deactivate</option>
                    <option value="delete">Delete</option>
                    <option value="change-role">Change Role</option>
                </select>
                
                <div id="role-select-container" style="display: none;">
                    <select class="form-control" name="new_role">
                        <option value="admin">Administrator</option>
                        <option value="editor">Editor</option>
                        <option value="member">Member</option>
                    </select>
                </div>
                
                <button type="submit" class="action-btn secondary" id="apply-bulk-action">Apply</button>
            </div>
        </form>
        
        <!-- Pagination -->
        <div class="dashboard-pagination">
            {{ $users->links() }}
        </div>
    </div>
    
    <!-- Delete User Modal (Hidden) -->
    <div id="delete-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h3>Confirm Delete</h3>
            <p>Are you sure you want to delete this user? This action cannot be undone.</p>
            <div class="modal-actions">
                <form id="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn danger">Delete</button>
                </form>
                <button class="action-btn secondary modal-cancel">Cancel</button>
            </div>
        </div>
    </div>
    
    <!-- Additional styles for user management -->
    <style>
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        
        .user-name {
            font-weight: 500;
        }
        
        .user-meta {
            font-size: 12px;
            color: #777;
        }
        
        .role-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .role-badge.admin {
            background-color: rgba(156, 39, 176, 0.1);
            color: #9c27b0;
        }
        
        .role-badge.editor {
            background-color: rgba(33, 150, 243, 0.1);
            color: #2196f3;
        }
        
        .role-badge.member {
            background-color: rgba(76, 175, 80, 0.1);
            color: #4caf50;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .modal {
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            position: relative;
        }
        
        .modal-close {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 24px;
            cursor: pointer;
        }
        
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-end;
        }
        
        #role-select-container {
            margin: 0 10px;
        }
        
        .text-center {
            text-align: center;
        }
    </style>
    
    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select All Checkbox
            const selectAllCheckbox = document.getElementById('select-all');
            const userCheckboxes = document.querySelectorAll('.user-checkbox');
            
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    userCheckboxes.forEach(checkbox => {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });
            }
            
            // User checkboxes change logic
            userCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // If any checkbox is unchecked, uncheck the "select all" checkbox
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    }
                    
                    // If all checkboxes are checked, check the "select all" checkbox
                    const allChecked = Array.from(userCheckboxes).every(c => c.checked);
                    if (allChecked) {
                        selectAllCheckbox.checked = true;
                    }
                });
            });
            
            // Bulk Action Change
            const bulkActionSelect = document.getElementById('bulk-action');
            const roleSelectContainer = document.getElementById('role-select-container');
            
            if (bulkActionSelect) {
                bulkActionSelect.addEventListener('change', function() {
                    if (this.value === 'change-role') {
                        roleSelectContainer.style.display = 'block';
                    } else {
                        roleSelectContainer.style.display = 'none';
                    }
                });
            }
            
            // Delete User Modal
            const deleteButtons = document.querySelectorAll('.delete-user');
            const deleteModal = document.getElementById('delete-modal');
            const modalClose = document.querySelector('.modal-close');
            const modalCancel = document.querySelector('.modal-cancel');
            const deleteForm = document.getElementById('delete-form');
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    deleteForm.action = '/dashboard/users/' + userId;
                    deleteModal.style.display = 'flex';
                });
            });
            
            if (modalClose) {
                modalClose.addEventListener('click', function() {
                    deleteModal.style.display = 'none';
                });
            }
            
            if (modalCancel) {
                modalCancel.addEventListener('click', function() {
                    deleteModal.style.display = 'none';
                });
            }
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === deleteModal) {
                    deleteModal.style.display = 'none';
                }
            });
            
            // Form submission validation
            const usersForm = document.getElementById('users-form');
            const applyBulkAction = document.getElementById('apply-bulk-action');
            
            if (applyBulkAction) {
                applyBulkAction.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Check if any user is selected
                    const checkedUsers = document.querySelectorAll('.user-checkbox:checked');
                    if (checkedUsers.length === 0) {
                        alert('Please select at least one user.');
                        return;
                    }
                    
                    // Check if an action is selected
                    const selectedAction = bulkActionSelect.value;
                    if (!selectedAction) {
                        alert('Please select an action to perform.');
                        return;
                    }
                    
                    // Confirm deletion
                    if (selectedAction === 'delete') {
                        if (!confirm('Are you sure you want to delete the selected users? This action cannot be undone.')) {
                            return;
                        }
                    }
                    
                    // Submit the form
                    usersForm.submit();
                });
            }
        });
    </script>
    @endsection
@endsection
