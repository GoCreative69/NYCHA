/**
 * Smooth Gallery Slider Functionality
 * Shows 3 images at once, slides 1 at a time
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get all necessary elements
    const track = document.querySelector('.gallery-track');
    const items = document.querySelectorAll('.gallery-item');
    const indicators = document.querySelectorAll('.indicator');
    const prevBtn = document.querySelector('.gallery-control.prev');
    const nextBtn = document.querySelector('.gallery-control.next');
    
    if (!track || !items.length) return;
    
    // Initialize variables
    let currentSlide = 0;
    const totalSlides = items.length - 2; // Accounting for showing 3 at once
    
    // Set initial item width based on viewport
    let itemWidth = 0;
    
    // Function to calculate item width
    function calculateItemWidth() {
        const isMobile = window.innerWidth <= 768;
        
        if (isMobile) {
            // For mobile, each item is full width
            itemWidth = track.clientWidth;
        } else {
            // For desktop, calculate width based on the actual item width including margin
            const itemStyle = window.getComputedStyle(items[0]);
            const marginRight = parseInt(itemStyle.marginRight);
            itemWidth = items[0].offsetWidth + marginRight;
        }
    }
    
    // Calculate initial width
    calculateItemWidth();
    
    // Function to update the slider position
    function updateSlider() {
        // Move the track
        track.style.transform = `translateX(-${currentSlide * itemWidth}px)`;
        
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
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentSlide > 0) {
                currentSlide--;
            } else {
                // Loop back to the end
                currentSlide = totalSlides - 1;
            }
            updateSlider();
        });
    }
    
    // Event listener for next button
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
            } else {
                // Loop back to the start
                currentSlide = 0;
            }
            updateSlider();
        });
    }
    
    // Event listeners for indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            const slideIndex = this.getAttribute('data-slide');
            currentSlide = slideIndex ? parseInt(slideIndex) : index;
            
            // Make sure we don't go beyond the limit
            if (currentSlide > totalSlides - 1) {
                currentSlide = totalSlides - 1;
            }
            
            updateSlider();
        });
    });
    
    // Auto-slide functionality
    let autoSlideInterval;
    
    function startAutoSlide() {
        autoSlideInterval = setInterval(function() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
            updateSlider();
        }, 5000); // Change slide every 5 seconds
    }
    
    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }
    
    // Start auto-sliding
    startAutoSlide();
    
    // Pause auto-sliding when user interacts with controls
    const navigation = document.querySelector('.gallery-navigation');
    if (navigation) {
        navigation.addEventListener('mouseenter', stopAutoSlide);
        navigation.addEventListener('mouseleave', startAutoSlide);
    }
    
    // Touch events for mobile swiping
    let touchStartX = 0;
    let touchEndX = 0;
    
    track.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoSlide();
    });
    
    track.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        startAutoSlide();
    });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left - next slide
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right - previous slide
            if (currentSlide > 0) {
                currentSlide--;
            } else {
                currentSlide = totalSlides - 1;
            }
        }
        updateSlider();
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        calculateItemWidth();
        updateSlider();
    });
    
    // Initialize slider position
    updateSlider();
});
