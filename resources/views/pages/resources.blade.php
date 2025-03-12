@extends('layouts.app')

@section('content')
<!-- Resources Section -->
<section class="resources-section">
    <div class="container">
        <div class="resources-header">
            <h1>Resources</h1>
            <p>Access important reports, guidelines, and documents related to stormwater management and sustainability.</p>
        </div>
        
        <div class="resources-grid">
            <!-- Resource 1 -->
            <div class="resource-card">
                <div class="resource-image">
                    <img src="{{ asset('images/resources/1.png') }}" alt="Flood Resilience at NYCHA">
                </div>
                <div class="resource-content">
                    <h3>Flood Resilience at NYCHA</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
            
            <!-- Resource 2 -->
            <div class="resource-card">
                <div class="resource-image">
                    <img src="{{ asset('images/resources/2.png') }}" alt="Climate Change at NYCHA">
                </div>
                <div class="resource-content">
                    <h3>Climate Change at NYCHA</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
            
            <!-- Resource 3 -->
            <div class="resource-card">
                <div class="resource-image">
                    <img src="{{ asset('images/resources/3.png') }}" alt="Cloudburst Management">
                </div>
                <div class="resource-content">
                    <h3>Cloudburst Management</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
            
            <!-- Resource 4 -->
            <div class="resource-card">
                <div class="resource-image">
                    <img src="{{ asset('images/resources/4.png') }}" alt="NYC Stormwater Manual">
                </div>
                <div class="resource-content">
                    <h3>NYC Stormwater Manual</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
            
            <!-- Resource 5 -->
            <div class="resource-card">
                <div class="resource-image">
                    <img src="{{ asset('images/resources/5.png') }}" alt="Climate Resiliency Design Guidelines">
                </div>
                <div class="resource-content">
                    <h3>Climate Resiliency Design Guidelines</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
            
            <!-- Resource 6 -->
            <div class="resource-card">
                <div class="resource-image">
                    <img src="{{ asset('images/resources/6.png') }}" alt="Rehabilitation of NYCHA">
                </div>
                <div class="resource-content">
                    <h3>Rehabilitation of NYCHA</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQs Section -->
<section class="faqs-section" style="background-color: #f9f9f9; padding: 60px 0;">
    <div class="container">
        <div class="faq-header">
            <h2>NYCHA FAQs:</h2>
            <h3>Your Questions, Answered</h3>
            <p>Have questions about NYCHA programs, services, or events? Find clear and helpful answers to the most frequently asked questions. Whether you're looking for housing information, resident resources, or community initiatives, we've got you covered!</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-container">
                <div class="faq-item">How long will this project take? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">The Breukelen Houses cloudburst management project is scheduled to be completed over a 24-month period. Construction will be phased to minimize disruption to residents.</div>
                
                <div class="faq-item">Will this project affect my apartment or utilities? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">The project is focused on outdoor spaces and infrastructure improvements. There should be minimal to no disruption to individual apartments or utility services during the construction process.</div>
                
                <div class="faq-item">Will these improvements also help with standing water and pests? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">Yes, the cloudburst management solutions are specifically designed to eliminate standing water issues, which will significantly reduce mosquito breeding areas and related pest problems.</div>
                
                <div class="faq-item">Will there be noise or road closures? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">Some construction noise is inevitable, but work will be limited to daytime hours. Temporary pathway detours may be necessary, but we'll ensure all buildings remain accessible throughout the project.</div>
                
                <div class="faq-item">How can I share my thoughts on the project? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">We welcome your input! You can share your thoughts at community meetings, through our online survey, or by contacting your resident association representative.</div>
            </div>
            
            <div class="faq-container">
                <div class="faq-item">Will this project create jobs for Breukelen residents? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">Yes, we're working with contractors to create local employment opportunities. Residents interested in project-related jobs should contact the NYCHA Resident Economic Empowerment & Sustainability office.</div>
                
                <div class="faq-item">Will residents have a say in what changes are made? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">Absolutely. Community engagement is a cornerstone of this project. We've already incorporated resident feedback into the designs and will continue to consult with the community as the project progresses.</div>
                
                <div class="faq-item">Will there be construction at Breukelen Houses? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">Yes, construction will take place throughout the Breukelen Houses campus, primarily focusing on outdoor areas to implement the cloudburst management features.</div>
                
                <div class="faq-item">How will I get updates about the project? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">Updates will be provided through resident newsletters, community meetings, the NYCHA website, and direct communications to affected buildings prior to work in specific areas.</div>
                
                <div class="faq-item">Who can I contact if I have concerns or questions? <span class="faq-toggle">+</span></div>
                <div class="faq-answer">You can contact the Breukelen Houses Management Office or our dedicated community liaison for this project. Contact information is available on our website and in all project communications.</div>
            </div>
        </div>
        
        <div class="more-questions">
            <h3>Still Have Questions?</h3>
            <h4>We're Here to Help!</h4>
            <p>If you didn't find the answer you were looking for, reach out to us! Our team is ready to assist you with any additional inquiries.</p>
            
            <div class="contact-form">
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactName">Your Name</label>
                            <input type="text" id="contactName" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email Address</label>
                            <input type="email" id="contactEmail" placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactSubject">Subject</label>
                        <input type="text" id="contactSubject" placeholder="Subject of your inquiry">
                    </div>
                    <div class="form-group">
                        <label for="contactMessage">Message</label>
                        <textarea id="contactMessage" rows="4" placeholder="How can we help you?"></textarea>
                    </div>
                    <button type="submit" class="contact-submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const faqItems = document.querySelectorAll(".faq-item");

        faqItems.forEach((item) => {
            item.addEventListener("click", function() {
                // Close all answers first
                faqItems.forEach(faq => {
                    if (faq !== this) {
                        faq.classList.remove("active");
                        const nextAnswer = faq.nextElementSibling;
                        if (nextAnswer && nextAnswer.classList.contains("faq-answer")) {
                            nextAnswer.style.display = "none";
                        }
                        // Reset toggle icon to +
                        const toggleIcon = faq.querySelector('.faq-toggle');
                        if (toggleIcon) {
                            toggleIcon.textContent = '+';
                        }
                    }
                });

                // Toggle current answer
                this.classList.toggle("active");
                const answer = this.nextElementSibling;
                if (answer && answer.classList.contains("faq-answer")) {
                    const isOpen = answer.style.display === "block";
                    answer.style.display = isOpen ? "none" : "block";
                    
                    // Toggle the + - icon
                    const toggleIcon = this.querySelector('.faq-toggle');
                    if (toggleIcon) {
                        toggleIcon.textContent = isOpen ? '+' : '−';
                    }
                }
            });
        });
    });
</script>
@endsection