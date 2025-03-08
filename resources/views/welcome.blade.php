@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-image">
        <img src="{{ asset('images/hero-image.jpg') }}" alt="NYCHA Project">
    </div>
    <div class="hero-content">
        <div class="container">
            <h1>NYCHA Project Dashboard</h1>
            <p>Breukelen Houses Cloudburst Project</p>
            
            @if (Auth::check())
                <a href="{{ route('dashboard.index') }}" class="cta-button">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="cta-button">Login to Dashboard</a>
            @endif
        </div>
    </div>
</section>

<!-- About Project Section -->
<section class="about-project">
    <div class="container">
        <div class="about-project-row">
            <div class="about-project-left">
                <h2>About the project</h2>
                <a href="{{ route('login') }}" class="learn-more-btn">Login <span class="arrow">></span></a>
            </div>
            <div class="about-project-right">
                <p>The project focuses on developing comprehensive Cloudburst Management at Breukelen Houses through nature-based solutions, hydrographic and topographic modeling, and community-driven stormwater management strategies. Aligned with New York City's broader infrastructure and climate resilience goals, the initiative emphasizes sustainability and resilience to support communities affected by extreme weather events.</p>
            </div>
        </div>
    </div>
</section>
@endsection
