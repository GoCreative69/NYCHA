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
<section class="faqs-section">
    <div class="container">
        <div class="faq-header">
            <h2>NYCHA FAQs:</h2>
            <h3>Your Questions, Answered</h3>
            <p>Have questions about NYCHA programs, services, or events? Find clear and helpful answers to the most frequently asked questions. Whether you're looking for housing information, resident resources, or community initiatives, we've got you covered!</p>
        </div>
        
        <div class="faq-grid">
            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>How long will this project take?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>The Breukelen Houses cloudburst management project is scheduled to be completed over a 24-month period. Construction will be phased to minimize disruption to residents.</p>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Will this project affect my apartment or utilities?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>The project is focused on outdoor spaces and infrastructure improvements. There should be minimal to no disruption to individual apartments or utility services during the construction process.</p>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Will these improvements also help with standing water and pests?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, the cloudburst management solutions are specifically designed to eliminate standing water issues, which will significantly reduce mosquito breeding areas and related pest problems.</p>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Will there be noise or road closures?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Some construction noise is inevitable, but work will be limited to daytime hours. Temporary pathway detours may be necessary, but we'll ensure all buildings remain accessible throughout the project.</p>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>How can I share my thoughts on the project?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>We welcome your input! You can share your thoughts at community meetings, through our online survey, or by contacting your resident association representative.</p>
                </div>
            </div>
            
            <!-- FAQ Item 6 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Will this project create jobs for Breukelen residents?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, we're working with contractors to create local employment opportunities. Residents interested in project-related jobs should contact the NYCHA Resident Economic Empowerment & Sustainability office.</p>
                </div>
            </div>
            
            <!-- FAQ Item 7 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Will residents have a say in what changes are made?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Absolutely. Community engagement is a cornerstone of this project. We've already incorporated resident feedback into the designs and will continue to consult with the community as the project progresses.</p>
                </div>
            </div>
            
            <!-- FAQ Item 8 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Will there be construction at Breukelen Houses?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, construction will take place throughout the Breukelen Houses campus, primarily focusing on outdoor areas to implement the cloudburst management features.</p>
                </div>
            </div>
            
            <!-- FAQ Item 9 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>How will I get updates about the project?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Updates will be provided through resident newsletters, community meetings, the NYCHA website, and direct communications to affected buildings prior to work in specific areas.</p>
                </div>
            </div>
            
            <!-- FAQ Item 10 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Who can I contact if I have concerns or questions?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>You can contact the Breukelen Houses Management Office or our dedicated community liaison for this project. Contact information is available on our website and in all project communications.</p>
                </div>
            </div>
        </div>
        
        <div class="more-questions">
            <h3>Still Have Questions?</h3>
            <h4>We're Here to Help!</h4>
            <p>If you didn't find the answer you were looking for, reach out to us! Our team is ready to assist you with any additional inquiries.</p>
            <a href="#" class="contact-btn">Contact</a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ toggle functionality
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const toggle = item.querySelector('.faq-toggle');
            const answer = item.querySelector('.faq-answer');
            
            // Initially hide all answers
            answer.style.display = 'none';
            
            question.addEventListener('click', function() {
                // Toggle the answer visibility
                if (answer.style.display === 'none') {
                    answer.style.display = 'block';
                    toggle.textContent = '−';
                } else {
                    answer.style.display = 'none';
                    toggle.textContent = '+';
                }
            });
        });
    });
</script>
@endsection