@extends('layouts.app')

@section('content')
<!-- Community Events Section -->
<div class="container">
    <section class="events-section">
        <h2>Upcoming NYCHA Events</h2>
        <p class="events-intro">Stay informed and get involved! Discover NYCHA's latest events designed to empower residents, promote sustainability, and drive innovation in public housing.</p>
        
        <div class="events-filter">
            <button class="filter-btn active" data-filter="all">View all</button>
            <button class="filter-btn" data-filter="education">Education</button>
            <button class="filter-btn" data-filter="employment">Employment</button>
            <button class="filter-btn" data-filter="events">Events</button>
            <button class="filter-btn" data-filter="housing">Housing</button>
        </div>
        
        <div class="events-grid">
            <div class="event-card" data-category="events">
                <div class="event-image">
                    <img src="{{ asset('images/event1.jpg') }}" alt="NYCHA Community Event">
                    <span class="category-tag">Events</span>
                </div>
                <div class="event-details">
                    <div class="event-date">15/03/2025</div>
                    <h3 class="event-title">NYCHA Community Empowerment Fair</h3>
                    <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <button class="save-spot-btn" onclick="scrollToWorkshop()">Save my spot</button>
                </div>
            </div>
            
            <div class="event-card" data-category="education">
                <div class="event-image">
                    <img src="{{ asset('images/event2.jpg') }}" alt="NYCHA Community Event">
                    <span class="category-tag">Education</span>
                </div>
                <div class="event-details">
                    <div class="event-date">15/03/2025</div>
                    <h3 class="event-title">NYCHA Community Empowerment Fair</h3>
                    <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <button class="save-spot-btn" onclick="scrollToWorkshop()">Save my spot</button>
                </div>
            </div>
            
            <div class="event-card" data-category="housing">
                <div class="event-image">
                    <img src="{{ asset('images/event3.jpg') }}" alt="NYCHA Community Event">
                    <span class="category-tag">Housing</span>
                </div>
                <div class="event-details">
                    <div class="event-date">15/03/2025</div>
                    <h3 class="event-title">NYCHA Community Empowerment Fair</h3>
                    <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <button class="save-spot-btn" onclick="scrollToWorkshop()">Save my spot</button>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Workshop Registration Section -->
<section class="workshop-registration">
    <div class="workshop-container">
        <div class="workshop-left">
            <h2>Sign up to join the next Community Workshop!</h2>
            <p>Fill in all the fields to join the community and stay informed of our latest information.</p>
            <div class="workshop-image">
                <img src="{{ asset('images/workshop.jpg') }}" alt="Community Workshop">
            </div>
        </div>
        <div class="workshop-right">
            <form class="workshop-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First name</label>
                        <input type="text" id="firstName" placeholder="Jhon">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" placeholder="Doe">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="example@nycha.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" id="phone" placeholder="123-456-7891">
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="topic">Choose a topic</label>
                    <div class="select-wrapper">
                        <select id="topic">
                            <option disabled selected>Select one...</option>
                            <option>Climate Resilience</option>
                            <option>Community Engagement</option>
                            <option>Housing Innovation</option>
                            <option>Sustainability Initiatives</option>
                        </select>
                    </div>
                </div>
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="terms">
                    <label for="terms">I accept the <a href="#">Terms</a></label>
                </div>
                <div class="form-group">
                    <button type="submit" class="register-btn">Register for Workshop</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Past Events Section -->
<section class="past-events-section" id="past-events">
    <div class="container">
        <h2>Past NYCHA Events</h2>
        <p class="past-events-intro">Take a look back at the impactful events that have brought NYCHA residents together.</p>
        
        <div class="past-events-filter">
            <button class="filter-btn active" data-filter="all">View all</button>
            <button class="filter-btn" data-filter="housing-support">Housing Support</button>
            <button class="filter-btn" data-filter="sustainability">Sustainability</button>
            <button class="filter-btn" data-filter="innovation">Innovation</button>
        </div>
        
        <div class="past-events-list">
            <div class="past-event-item" data-category="housing-support">
                <div class="past-event-info">
                    <h3 class="past-event-title">NYCHA Community Empowerment Fair</h3>
                    <p class="past-event-location">478 East Fordham Road (1 Fordham Plaza), 2nd Floor<br>Bronx, NY 10458</p>
                </div>
                <div class="past-event-meta">
                    <span class="past-event-tag">HousingSupport</span>
                    <a href="#" class="download-pdf-btn">Download PDF</a>
                </div>
            </div>
            
            <div class="past-event-item" data-category="sustainability">
                <div class="past-event-info">
                    <h3 class="past-event-title">Safe & Green: NYCHA Sustainability Expo</h3>
                    <p class="past-event-location">478 East Fordham Road (1 Fordham Plaza), 2nd Floor<br>Bronx, NY 10458</p>
                </div>
                <div class="past-event-meta">
                    <span class="past-event-tag">Sustainability</span>
                    <a href="#" class="download-pdf-btn">Download PDF</a>
                </div>
            </div>
            
            <div class="past-event-item" data-category="innovation">
                <div class="past-event-info">
                    <h3 class="past-event-title">Future Forward: NYCHA Innovation Summit</h3>
                    <p class="past-event-location">478 East Fordham Road (1 Fordham Plaza), 2nd Floor<br>Bronx, NY 10458</p>
                </div>
                <div class="past-event-meta">
                    <span class="past-event-tag">Innovation</span>
                    <a href="#" class="download-pdf-btn">Download PDF</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Event filtering for upcoming events
    document.addEventListener('DOMContentLoaded', function() {
        // Event filtering
        const filterButtons = document.querySelectorAll('.events-filter .filter-btn');
        const eventCards = document.querySelectorAll('.event-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get the filter value
                const filterValue = this.getAttribute('data-filter');
                
                // Show or hide event cards based on filter
                eventCards.forEach(card => {
                    if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
        
        // Past events filtering
        const pastFilterButtons = document.querySelectorAll('.past-events-filter .filter-btn');
        const pastEventItems = document.querySelectorAll('.past-event-item');
        
        pastFilterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                pastFilterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get the filter value
                const filterValue = this.getAttribute('data-filter');
                
                // Show or hide past event items based on filter
                pastEventItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
    
    // Function to scroll to workshop section when "Save my spot" is clicked
    function scrollToWorkshop() {
        const workshopSection = document.querySelector('.workshop-registration');
        if (workshopSection) {
            workshopSection.scrollIntoView({ behavior: 'smooth' });
            
            // Focus on the first name input field for better UX
            setTimeout(() => {
                document.getElementById('firstName').focus();
            }, 1000);
        }
    }
</script>
@endsection
