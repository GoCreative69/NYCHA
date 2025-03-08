@extends('layouts.app')

@section('content')
<!-- Sustainability Snapshots Section -->
<section class="sustainability-snapshots">
    <div class="container">
        <div class="snapshots-content">
            <div class="snapshots-left">
                <h2>Snapshots of Sustainability</h2>
            </div>
            <div class="snapshots-right">
                <p>Explore the transformation of Breukelen Houses through our cloudburst management project. Witness the community's involvement, innovative flood mitigation strategies, and the impact of sustainable infrastructure in action.</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="photo-gallery">
    <div class="container">
        <div class="gallery-container">
            @php
                $itemCount = count($galleryItems);
                $itemsInFirstCol = ceil($itemCount / 3);
                $itemsInSecondCol = ceil(($itemCount - $itemsInFirstCol) / 2);
                $itemsInThirdCol = $itemCount - $itemsInFirstCol - $itemsInSecondCol;
                
                $firstColItems = $galleryItems->take($itemsInFirstCol);
                $secondColItems = $galleryItems->slice($itemsInFirstCol, $itemsInSecondCol);
                $thirdColItems = $galleryItems->slice($itemsInFirstCol + $itemsInSecondCol);
            @endphp
            
            <div class="gallery-col">
                @foreach($firstColItems as $index => $item)
                    <div class="gallery-img {{ $index === 0 ? 'large' : '' }}">
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}">
                        <div class="img-caption">{{ $item->description }}</div>
                    </div>
                @endforeach
            </div>
            
            <div class="gallery-col">
                @foreach($secondColItems as $item)
                    <div class="gallery-img">
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}">
                        <div class="img-caption">{{ $item->description }}</div>
                    </div>
                @endforeach
            </div>
            
            <div class="gallery-col">
                @foreach($thirdColItems as $item)
                    <div class="gallery-img">
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}">
                        <div class="img-caption">{{ $item->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Image Lightbox -->
<div id="imageLightbox" class="lightbox">
    <span class="close-lightbox">&times;</span>
    <img class="lightbox-image" alt="Enlarged gallery image">
    <div class="lightbox-caption"></div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gallery lightbox functionality
        const galleryImages = document.querySelectorAll('.gallery-img img');
        const lightbox = document.getElementById('imageLightbox');
        const lightboxImage = lightbox.querySelector('.lightbox-image');
        const lightboxCaption = lightbox.querySelector('.lightbox-caption');
        const closeLightbox = lightbox.querySelector('.close-lightbox');
        
        // Open lightbox when clicking on an image
        galleryImages.forEach(function(img) {
            img.addEventListener('click', function() {
                lightboxImage.src = this.src;
                lightboxImage.alt = this.alt;
                lightboxCaption.textContent = this.nextElementSibling.textContent;
                lightbox.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
        });
        
        // Close lightbox when clicking on close button or anywhere outside the image
        closeLightbox.addEventListener('click', function() {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
        // Handle keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (lightbox.style.display === 'flex') {
                if (e.key === 'Escape') {
                    lightbox.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            }
        });
    });
</script>
@endsection