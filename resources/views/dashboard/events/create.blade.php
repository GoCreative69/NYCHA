@extends('layouts.dashboard')

@section('title', 'Create New Event')

@section('content')
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Create New Event</h2>
            <div class="section-actions">
                <a href="{{ asset('/dashboard/events') }}" class="action-btn secondary">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>
            </div>
        </div>
        
        <div class="dashboard-card">
            <form class="dashboard-form" id="event-form">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="event-title">Event Title</label>
                        <input type="text" class="form-control" id="event-title" name="title" required data-error-message="Event title is required">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="event-date">Event Date</label>
                        <input type="date" class="form-control" id="event-date" name="date" required data-error-message="Event date is required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="event-time">Event Time</label>
                        <input type="time" class="form-control" id="event-time" name="time" required data-error-message="Event time is required">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="event-end-time">End Time</label>
                        <input type="time" class="form-control" id="event-end-time" name="end_time" required data-error-message="End time is required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="event-capacity">Capacity</label>
                        <input type="number" class="form-control" id="event-capacity" name="capacity" min="1" required data-error-message="Capacity is required">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="event-location">Location</label>
                        <input type="text" class="form-control" id="event-location" name="location" required data-error-message="Location is required">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="event-description">Description</label>
                        <textarea class="form-control" id="event-description" name="description" rows="5" required data-error-message="Description is required"></textarea>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="event-image">Event Image</label>
                        <div class="file-upload">
                            <input type="file" class="file-upload-input" id="event-image" name="image">
                            <label for="event-image" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Choose an image
                            </label>
                            <div class="file-preview"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="event-status">Status</label>
                        <select class="form-control" id="event-status" name="status">
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Event Settings</label>
                        <div class="checkbox-group">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="registration-required" name="registration_required">
                                <label for="registration-required">Registration Required</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="limit-registrations" name="limit_registrations">
                                <label for="limit-registrations">Limit Registrations</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="show-attendees" name="show_attendees">
                                <label for="show-attendees">Show Attendees</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="action-btn">Create Event</button>
                    <button type="button" class="action-btn secondary">Save as Draft</button>
                </div>
            </form>
        </div>
    </div>
@endsection
