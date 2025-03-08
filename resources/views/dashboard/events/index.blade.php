@extends('layouts.dashboard')

@section('title', 'Events Management')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Events Management</h2>
            <div class="section-actions">
                <a href="{{ asset('/dashboard/events/create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Add New Event
                </a>
            </div>
        </div>
        
        <!-- Filter Options -->
        <div class="filter-container">
            <div class="filter-group">
                <label for="status-filter">Status:</label>
                <select id="status-filter" class="form-control">
                    <option value="all">All</option>
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                    <option value="past">Past Events</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="date-filter">Date Range:</label>
                <select id="date-filter" class="form-control">
                    <option value="all">All Time</option>
                    <option value="upcoming">Upcoming</option>
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
        
        <!-- Events Table -->
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>Community Planning Workshop</td>
                    <td>March 15, 2025</td>
                    <td>6:00 PM - 8:00 PM</td>
                    <td>Breukelen Community Center</td>
                    <td>50 people</td>
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
                    <td>2:00 PM - 4:00 PM</td>
                    <td>Virtual (Zoom)</td>
                    <td>100 people</td>
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
                    <td>1:00 PM - 3:00 PM</td>
                    <td>Breukelen Houses Courtyard</td>
                    <td>75 people</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>Project Update Presentation</td>
                    <td>April 15, 2025</td>
                    <td>5:30 PM - 7:30 PM</td>
                    <td>Breukelen Community Center</td>
                    <td>50 people</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>Construction Kickoff Celebration</td>
                    <td>May 1, 2025</td>
                    <td>11:00 AM - 1:00 PM</td>
                    <td>Breukelen Houses Main Plaza</td>
                    <td>200 people</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <div class="row-actions">
                            <button data-action="view" class="view"><i class="fas fa-eye"></i></button>
                            <button data-action="edit" class="edit"><i class="fas fa-edit"></i></button>
                            <button data-action="delete" class="delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="6">
                    <td>Initial Planning Meeting</td>
                    <td>February 10, 2025</td>
                    <td>1:00 PM - 3:00 PM</td>
                    <td>NYCHA Administrative Office</td>
                    <td>30 people</td>
                    <td><span class="status-badge inactive">Past</span></td>
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
