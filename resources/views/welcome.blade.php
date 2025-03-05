@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="container">
        <h1>Cloudburst Management at Breukelen Houses</h1>
        <p class="hero-subtitle">Innovative stormwater solutions for a resilient community</p>
        <button class="primary-btn">Learn more about the project</button>
    </div>
</div>

<div class="container">
    <section class="about-project">
        <h2>About the project</h2>
        <div class="project-content">
            <div class="project-text">
                <p>The Cloudburst Management project at Breukelen Houses is a groundbreaking initiative to address flooding challenges through innovative stormwater management solutions. This project aims to enhance community resilience while creating sustainable and beautiful spaces for residents.</p>
                <ul class="project-highlights">
                    <li>Innovative stormwater management solutions</li>
                    <li>Enhanced community spaces</li>
                    <li>Improved flood protection</li>
                    <li>Sustainable infrastructure</li>
                </ul>
            </div>
            <div class="project-image">
                <img src="{{ asset('images/aerial-map.jpg') }}" alt="Aerial view of Breukelen Houses development" class="map-image">
                <p class="image-caption">Aerial view of the development area</p>
            </div>
        </div>
    </section>

    <section class="existing-conditions">
        <h2>Existing Conditions</h2>
        <div class="conditions-gallery">
            <div class="gallery-item">
                <img src="{{ asset('images/condition-1.jpg') }}" alt="Current drainage patterns">
                <p>Current drainage patterns showing flooding risk areas</p>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/condition-2.jpg') }}" alt="Existing infrastructure">
                <p>Existing stormwater infrastructure assessment</p>
            </div>
        </div>
        <div class="conditions-text">
            <p>Our assessment has identified key areas that require immediate attention to prevent flooding and improve water management.</p>
            <a href="#" class="text-link">View detailed assessment report →</a>
        </div>
    </section>

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
            <img src="{{ asset('images/diagram.png') }}" alt="Cloudburst management diagram" class="full-width-image">
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
                <img src="{{ asset('images/community.jpg') }}" alt="Community members discussing the project">
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: rgba(255, 255, 255, 0.9);
    }

    .project-highlights {
        list-style: none;
        margin: 2rem 0;
    }

    .project-highlights li {
        margin-bottom: 1rem;
        padding-left: 2rem;
        position: relative;
    }

    .project-highlights li::before {
        content: "✓";
        color: var(--nycha-red);
        position: absolute;
        left: 0;
    }

    .image-caption {
        text-align: center;
        color: #666;
        margin-top: 1rem;
        font-style: italic;
    }

    .conditions-text {
        margin-top: 2rem;
        text-align: center;
    }

    .text-link {
        color: var(--nycha-red);
        text-decoration: none;
        font-weight: 500;
        display: inline-block;
        margin-top: 1rem;
    }

    .icon-circle {
        width: 80px;
        height: 80px;
        background-color: rgba(172, 1, 54, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .management-diagram {
        margin-top: 4rem;
        text-align: center;
    }

    .full-width-image {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
