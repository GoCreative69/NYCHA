@extends('layouts.app')

@section('content')
<!-- Hero Section with Image -->
<div class="hero-banner">
    <div class="hero-image" style="background-image: url('{{ secure_asset('images/hero-bg.png') }}');"></div>
    
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
            <img src="{{ secure_asset('images/about-img.png') }}" alt="Breukelen Houses Flood Map" class="flood-map-image">
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
                            <img src="{{ secure_asset('images/gallery/g-1.jpg') }}" alt="Flooding condition">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-2.jpg') }}" alt="Flooding condition">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-3.jpg') }}" alt="Flooding condition">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-slide">
                    <div class="gallery-slide-items">
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-1.jpg') }}" alt="Flooding condition">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-2.jpg') }}" alt="Flooding condition">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ secure_asset('images/gallery/g-3.jpg') }}" alt="Flooding condition">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="gallery-indicators">
                <span class="indicator active" data-slide="0"></span>
                <span class="indicator" data-slide="1"></span>
                <span class="indicator" data-slide="2"></span>
            </div>
            <div class="gallery-controls">
                <button class="gallery-control prev" aria-label="Previous slide">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button class="gallery-control next" aria-label="Next slide">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                </button>
            </div>
    </div>
</section>
<!-- What is Cloudburst Management Section -->
<section class="cloudburst-management">
    <div class="container">
        <div class="cloudburst-intro">
            <h2>What is Cloudburst Management?</h2>
            <div class="cloudburst-intro-text">
                <p>Cloudburst Management is a way of absorbing, storing, and transferring stormwater to minimize flooding from heavy rain events. Cloudburst Management uses a combination of grey infrastructure, like drainage pipes and underground tanks, and green infrastructure, like trees and rain gardens. During heavy rain events, Cloudburst Management can minimize damage to property and infrastructure by reducing pressure on the sewer system.</p>
            </div>
        </div>
        
        <div class="cloudburst-grid">
            <div class="cloudburst-card">
                <div class="card-icon">
                    <img src="{{ secure_asset('images/icons/1.png') }}" alt="Absorb">
                </div>
                <h3>Capture and infiltrate first 1.25" of runoff</h3>
                <p>Our first defense focuses on detaining water in permeable surfaces, rain gardens, and bioswales that naturally absorb water.</p>
            </div>
            
            <div class="cloudburst-card">
                <div class="card-icon">
                    <img src="{{ secure_asset('images/icons/2.png') }}" alt="Store">
                </div>
                <h3>Employ subsurface options once surface storage is fully saturated</h3>
                <p>When surface systems reach capacity, we engage subsurface storage solutions including underground detention tanks and reservoirs.</p>
            </div>
            
            <div class="cloudburst-card">
                <div class="card-icon">
                    <img src="{{ secure_asset('images/icons/3.png') }}" alt="Transfer">
                </div>
                <h3>Storage is full and volumes must be directed offsite</h3>
                <p>During extreme events when storage capacity is exhausted, we implement controlled water pathways that direct excess water away from critical infrastructure and residential areas.</p>
            </div>
            
            <div class="cloudburst-card">
                <div class="card-icon">
                    <img src="{{ secure_asset('images/icons/4.png') }}" alt="Convey">
                </div>
                <h3>Leverage secondary floodable spaces and strategic infrastructural improvements</h3>
                <p>Our final tier utilizes designated secondary spaces that can temporarily handle excess water.</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <section class="cloudburst-management">
        <h2>What is Cloudburst Management?</h2>
        <div class="info-grid">
            <div class="info-card">
                <div class="icon-circle">
                    <i class="fas fa-cloud-rain"></i>
                </div>
                <h3>Stormwater Collection</h3>
                <p>Advanced systems to collect and manage heavy rainfall events</p>
            </div>
            <div class="info-card">
                <div class="icon-circle">
                    <i class="fas fa-water"></i>
                </div>
                <h3>Water Storage</h3>
                <p>Strategic storage solutions to handle excess water during storms</p>
            </div>
            <div class="info-card">
                <div class="icon-circle">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Green Infrastructure</h3>
                <p>Natural solutions for sustainable water management</p>
            </div>
            <div class="info-card">
                <div class="icon-circle">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Community Benefits</h3>
                <p>Enhanced living spaces with improved flood protection</p>
            </div>
        </div>
        <div class="management-diagram">
            <img src="{{ secure_asset('images/diagram.png') }}" alt="Cloudburst management diagram" class="full-width-image">
        </div>
    </section>

    <section class="feedback-section">
        <div class="feedback-content">
            <div class="feedback-text">
                <h2>Help us prevent floods with your feedback</h2>
                <p>Your input is valuable in shaping effective solutions for our community. Share your experiences and suggestions to help us create a more resilient Breukelen Houses.</p>
                <button class="secondary-btn">Share your thoughts</button>
            </div>
            <div class="feedback-image">
                <img src="{{ secure_asset('images/community.jpg') }}" alt="Community members discussing the project">
            </div>
        </div>
    </section>
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
    });
</script>
@endsection
