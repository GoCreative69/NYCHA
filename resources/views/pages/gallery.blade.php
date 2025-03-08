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
            <div class="gallery-col">
                <div class="gallery-img large">
                    <img src="{{ asset('images/gallery/g-1.jpg') }}" alt="Stormwater management pathway">
                    <div class="img-caption">Innovative drainage pathways directing stormwater away from buildings</div>
                </div>
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-5.jpg') }}" alt="Waste management with water capture">
                    <div class="img-caption">Retrofitted drainage system with decorative blue elements</div>
                </div>
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-8.jpg') }}" alt="Urban drainage channel">
                    <div class="img-caption">Urban drainage channel designed to handle overflow during severe storms</div>
                </div>
             
            </div>
            <div class="gallery-col">
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-2.jpg') }}" alt="Community garden plots">
                    <div class="img-caption">Community garden plots designed for water absorption and food production</div>
                </div>
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-3.jpg') }}" alt="Waste management infrastructure">
                    <div class="img-caption">Sustainable waste management infrastructure with water capture elements</div>
                </div>
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-4.jpg') }}" alt="Basketball court with permeable surfaces">
                    <div class="img-caption">Basketball court with permeable surfaces to reduce runoff</div>
                </div>
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-6.jpg') }}" alt="Public seating area">
                    <div class="img-caption">Public seating area with integrated water management features</div>
                </div>
            </div>
            <div class="gallery-col">
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-7.jpg') }}" alt="Stormwater capture basin">
                    <div class="img-caption">Stormwater capture basin integrated into building entrance pathway</div>
                </div>
                <div class="gallery-img large">
                    <img src="{{ asset('images/gallery/g-5.jpg') }}" alt="Green infrastructure integration">
                    <div class="img-caption">Integrated green infrastructure creating pleasant recreational spaces</div>
                </div>
                <div class="gallery-img">
                    <img src="{{ asset('images/gallery/g-7.jpg') }}" alt="Urban drainage channel">
                    <div class="img-caption">Urban drainage channel designed to handle overflow during severe storms</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox for Gallery Images -->
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
        // Gallery lightbox functionality
        const galleryImages = document.querySelectorAll('.gallery-img img');
        const lightbox = document.getElementById('imageLightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        const lightboxCaption = document.getElementById('lightboxCaption');
        const closeLightbox = document.querySelector('.close-lightbox');
        const prevButton = document.getElementById('prevImage');
        const nextButton = document.getElementById('nextImage');
        
        let currentImageIndex = 0;
        const imagesArray = [];
        
        // Populate images array
        galleryImages.forEach((img, index) => {
            const caption = img.nextElementSibling ? img.nextElementSibling.textContent : '';
            imagesArray.push({
                src: img.src,
                caption: caption,
                index: index
            });
            
            // Add click event to open lightbox
            img.addEventListener('click', function() {
                currentImageIndex = index;
                openLightbox(currentImageIndex);
            });
        });
        
        function openLightbox(index) {
            lightboxImage.src = imagesArray[index].src;
            lightboxCaption.textContent = imagesArray[index].caption;
            lightbox.classList.add('active');
        }
        
        // Close lightbox
        closeLightbox.addEventListener('click', function() {
            lightbox.classList.remove('active');
        });
        
        // Close when clicking outside the image
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });
        
        // Previous image
        prevButton.addEventListener('click', function() {
            currentImageIndex = (currentImageIndex - 1 + imagesArray.length) % imagesArray.length;
            openLightbox(currentImageIndex);
        });
        
        // Next image
        nextButton.addEventListener('click', function() {
            currentImageIndex = (currentImageIndex + 1) % imagesArray.length;
            openLightbox(currentImageIndex);
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!lightbox.classList.contains('active')) return;
            
            if (e.key === 'ArrowLeft') {
                currentImageIndex = (currentImageIndex - 1 + imagesArray.length) % imagesArray.length;
                openLightbox(currentImageIndex);
            } else if (e.key === 'ArrowRight') {
                currentImageIndex = (currentImageIndex + 1) % imagesArray.length;
                openLightbox(currentImageIndex);
            } else if (e.key === 'Escape') {
                lightbox.classList.remove('active');
            }
        });
    });
</script>
@endsection