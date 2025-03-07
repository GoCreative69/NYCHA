@extends('layouts.app')

@section('content')
<!-- Hero Section with Image -->
<div class="hero-banner">
    <div class="hero-image" style="background-image: url('{{ secure_asset('images/hero-bg-building.jpg') }}');"></div>
    
    <!-- Red Content Section -->
    <div class="hero-content-container">
        <div class="container">
            <div class="hero-content-row">
                <div class="hero-title">
                    <h1>Cloudburst Management at Breukelen Houses</h1>
                </div>
                <div class="hero-right">
                    <p>Leveraging nature-based solutions, hydrologic and hydraulic modeling, and community-oriented stormwater management strategies.</p>
                    <div class="hero-buttons">
                        <a href="{{ secure_asset('/community-meeting') }}" class="hero-btn">Join the Next Community Meeting</a>
                        <a href="{{ secure_asset('/survey') }}" class="hero-btn hero-btn-light">Take the Community Survey</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- About Project Section -->
    <section class="about-project">
        <div class="about-project-row">
            <div class="about-project-left">
                <h2>About the project</h2>
                <a href="{{ secure_asset('/about') }}" class="learn-more-btn">Learn more <span class="arrow">></span></a>
            </div>
            <div class="about-project-right">
                <p>The project focuses on developing comprehensive Cloudburst Management at Breukelen Houses through nature-based solutions, hydrographic and topographic modeling, and community-driven stormwater management strategies. Aligned with New York City's broader infrastructure and climate resilience goals, the initiative emphasizes sustainability and resilience to support communities affected by extreme weather events. This project builds on studies initiated during the 2021 Building Resilient Infrastructure and Communities (BRIC) grant cycle, by refining previous research while integrating regional development practices and social considerations. With $19.8 million awarded through BRIC and an additional $14 million in city funding, the project aims to identify and implement targeted solutions that address the unique flood-related challenges at Breukelen Houses.</p>
            </div>
        </div>
        <div class="about-project-map">
            <div class="video-overlay">
                <button class="play-button" data-video-id="MquNP8RQUpY">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="11" fill="rgba(0,0,0,0.5)"/>
                        <path d="M9.5 7.5v9l7-4.5-7-4.5z" fill="white"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>
</div>

<!-- Existing Conditions Section -->
<section class="existing-conditions">
    <div class="container">
        <h2>Existing Conditions</h2>
        
        <div class="gallery-slider-container">
            <div class="gallery-slider">
                <div class="gallery-slide">
                    <div class="gallery-slide-items">
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-1.jpg') }}" alt="Existing Condition 1" class="gallery-image">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-2.jpg') }}" alt="Existing Condition 2" class="gallery-image">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-3.jpg') }}" alt="Existing Condition 3" class="gallery-image">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-slide">
                    <div class="gallery-slide-items">
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-1.jpg') }}" alt="Existing Condition 4" class="gallery-image">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-1.jpg') }}" alt="Existing Condition 5" class="gallery-image">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-1.jpg') }}" alt="Existing Condition 6" class="gallery-image">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="gallery-indicators">
                <span class="indicator active"></span>
                <span class="indicator"></span>
            </div>
            
            <div class="gallery-controls">
                <button class="gallery-control prev">&#8249;</button>
                <button class="gallery-control next">&#8250;</button>
            </div>
    </div>
</section>

<!-- Cloudburst Management Section -->
<section class="cloudburst-management-section">
    <div class="container">
        <div class="cloudburst-header">
            <div class="cloudburst-title">
                <h2>What is Cloudburst Management?</h2>
            </div>
            <div class="cloudburst-description">
                <p>Cloudburst Management is a way of absorbing, storing, and transferring stormwater to minimize flooding from heavy rain events. Cloudburst Management uses a combination of grey infrastructure, like drainage pipes and underground tanks, and green infrastructure, like trees and rain gardens. During heavy rain events, Cloudburst Management can minimize damage to property and infrastructure by reducing pressure on the sewer system.</p>
            </div>
        </div>
    </div>
    
    <div class="cloudburst-visual">
        <div class="container">
            <div class="cloudburst-cards">
                <div class="cloudburst-card absorb">
                    <div class="card-icon">
                        <img src="{{ secure_asset('images/icons/1.png') }}" alt="Absorb">
                    </div>
                    <h3>Capture and infiltrate first 1.25" of runoff</h3>
                    <p>Our first defense focuses on detaining water in permeable surfaces, rain gardens, and bioswales that naturally absorb water.</p>
                </div>
                
                <div class="cloudburst-card store">
                    <div class="card-icon">
                        <img src="{{ secure_asset('images/icons/2.png') }}" alt="Store">
                    </div>
                    <h3>Employ subsurface options once surface storage is fully saturated</h3>
                    <p>When surface systems reach capacity, we engage subsurface storage solutions including underground detention tanks and reservoirs.</p>
                </div>
                
                <div class="cloudburst-card transfer">
                    <div class="card-icon">
                        <img src="{{ secure_asset('images/icons/3.png') }}" alt="Transfer">
                    </div>
                    <h3>Storage is full and volumes must be directed offsite</h3>
                    <p>During extreme events when storage capacity is exhausted, we implement controlled water pathways that direct excess water away from critical infrastructure and residential areas.</p>
                </div>
                
                <div class="cloudburst-card convey">
                    <div class="card-icon">
                        <img src="{{ secure_asset('images/icons/4.png') }}" alt="Convey">
                    </div>
                    <h3>Leverage secondary floodable spaces and strategic infrastructural improvements</h3>
                    <p>Our final tier utilizes designated secondary spaces that can temporarily handle excess water.</p>
                </div>
            </div>
        </div>
        
        <div class="cloudburst-diagram">
            <img src="{{ secure_asset('images/diagram.png') }}" alt="Cloudburst Management Diagram">
        </div>
    </div>
</section>

<!-- Feedback Section -->
<section class="feedback-section">
    <div class="container">
        <div class="feedback-content">
            <h2>Help us prevent floods with your feedback</h2>
            <p>The Cloudburst Management approach prioritizes resilience by addressing vulnerabilities and managing storm volumes hierarchically through the ABSORB, STORE, CONVEY, and TRANSFER framework for Cloudburst Storm Events today and in future climate conditions.</p>
            <a href="#" class="btn-survey">Take a Survey</a>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="video-modal" id="videoModal">
    <span class="close-video">&times;</span>
    <div class="video-container">
        <iframe id="youtubeIframe" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<!-- Lightbox Gallery Modal -->
<div class="lightbox" id="imageLightbox">
    <div class="lightbox-content">
        <span class="close-lightbox">&times;</span>
        <img id="lightboxImage" src="" alt="Enlarged Image">
        <div class="lightbox-caption" id="lightboxCaption"></div>
        <div class="lightbox-nav">
            <button id="prevImage">&lsaquo;</button>
            <button id="nextImage">&rsaquo;</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle functionality
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileNav = document.querySelector('.mobile-nav');
        
        if (mobileMenuToggle && mobileNav) {
            mobileMenuToggle.addEventListener('click', function() {
                mobileNav.classList.toggle('active');
                mobileMenuToggle.classList.toggle('active');
            });
        }
        
        // YouTube Video Modal
        const videoModal = document.getElementById('videoModal');
        const youtubeIframe = document.getElementById('youtubeIframe');
        const playButton = document.querySelector('.play-button');
        const closeVideo = document.querySelector('.close-video');
        
        // Open video modal when play button is clicked
        playButton.addEventListener('click', function() {
            const videoId = this.getAttribute('data-video-id');
            youtubeIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            videoModal.classList.add('active');
        });
        
        // Close video modal
        closeVideo.addEventListener('click', function() {
            videoModal.classList.remove('active');
            youtubeIframe.src = '';
        });
        
        // Close modal when clicking outside the video container
        videoModal.addEventListener('click', function(e) {
            if (e.target === videoModal) {
                videoModal.classList.remove('active');
                youtubeIframe.src = '';
            }
        });
        
        // Lightbox Gallery
        const galleryImages = document.querySelectorAll('.gallery-image');
        const lightbox = document.getElementById('imageLightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        const lightboxCaption = document.getElementById('lightboxCaption');
        const closeLightbox = document.querySelector('.close-lightbox');
        const prevButton = document.getElementById('prevImage');
        const nextButton = document.getElementById('nextImage');
        
        let currentImageIndex = 0;
        const imageList = [];
        
        // Populate the image list
        galleryImages.forEach((image, index) => {
            imageList.push({
                src: image.src,
                alt: image.alt,
                caption: image.closest('.gallery-item').querySelector('p').textContent
            });
            
            // Add click event to open lightbox
            image.addEventListener('click', function() {
                openLightbox(index);
            });
        });
        
        function openLightbox(index) {
            currentImageIndex = index;
            updateLightboxContent();
            lightbox.classList.add('active');
        }
        
        function updateLightboxContent() {
            const currentImage = imageList[currentImageIndex];
            lightboxImage.src = currentImage.src;
            lightboxImage.alt = currentImage.alt;
            lightboxCaption.textContent = currentImage.caption;
        }
        
        // Previous image
        prevButton.addEventListener('click', function() {
            currentImageIndex = (currentImageIndex - 1 + imageList.length) % imageList.length;
            updateLightboxContent();
        });
        
        // Next image
        nextButton.addEventListener('click', function() {
            currentImageIndex = (currentImageIndex + 1) % imageList.length;
            updateLightboxContent();
        });
        
        // Close lightbox
        closeLightbox.addEventListener('click', function() {
            lightbox.classList.remove('active');
        });
        
        // Close lightbox when clicking outside the image
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!lightbox.classList.contains('active')) return;
            
            if (e.key === 'ArrowLeft') {
                currentImageIndex = (currentImageIndex - 1 + imageList.length) % imageList.length;
                updateLightboxContent();
            } else if (e.key === 'ArrowRight') {
                currentImageIndex = (currentImageIndex + 1) % imageList.length;
                updateLightboxContent();
            } else if (e.key === 'Escape') {
                lightbox.classList.remove('active');
            }
        });
    });
</script>
@endsection
