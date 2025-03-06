/**
 * Gallery Slider Functionality
 * Handles the image slider for the Existing Conditions section
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get all necessary elements
    const slider = document.querySelector('.gallery-slider');
    const slides = document.querySelectorAll('.gallery-slide');
    const indicators = document.querySelectorAll('.indicator');
    const prevBtn = document.querySelector('.gallery-control.prev');
    const nextBtn = document.querySelector('.gallery-control.next');
    
    // Initialize current slide index
    let currentSlide = 0;
    const slideCount = slides.length;
    
    // Function to update the slider position
    function updateSlider() {
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        
        // Update active indicator
        indicators.forEach((indicator, index) => {
            if (index === currentSlide) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }
    
    // Event listener for previous button
    prevBtn.addEventListener('click', function() {
        currentSlide = (currentSlide - 1 + slideCount) % slideCount;
        updateSlider();
    });
    
    // Event listener for next button
    nextBtn.addEventListener('click', function() {
        currentSlide = (currentSlide + 1) % slideCount;
        updateSlider();
    });
    
    // Event listeners for indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            currentSlide = index;
            updateSlider();
        });
    });
    
    // Optional: Auto-slide functionality
    let autoSlideInterval;
    
    function startAutoSlide() {
        autoSlideInterval = setInterval(function() {
            currentSlide = (currentSlide + 1) % slideCount;
            updateSlider();
        }, 5000); // Change slide every 5 seconds
    }
    
    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }
    
    // Start auto-sliding
    startAutoSlide();
    
    // Pause auto-sliding when user interacts with controls
    const controls = document.querySelector('.gallery-controls');
    const indicatorContainer = document.querySelector('.gallery-indicators');
    
    controls.addEventListener('mouseenter', stopAutoSlide);
    controls.addEventListener('mouseleave', startAutoSlide);
    indicatorContainer.addEventListener('mouseenter', stopAutoSlide);
    indicatorContainer.addEventListener('mouseleave', startAutoSlide);
    
    // Touch events for mobile swiping
    let touchStartX = 0;
    let touchEndX = 0;
    
    slider.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoSlide();
    });
    
    slider.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        startAutoSlide();
    });
    
    function handleSwipe() {
        if (touchEndX < touchStartX - 50) {
            // Swipe left - next slide
            currentSlide = (currentSlide + 1) % slideCount;
        } else if (touchEndX > touchStartX + 50) {
            // Swipe right - previous slide
            currentSlide = (currentSlide - 1 + slideCount) % slideCount;
        }
        updateSlider();
    }
    
    // Initialize slider position
    updateSlider();
});
