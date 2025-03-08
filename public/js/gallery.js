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
    const itemsPerView = window.innerWidth <= 768 ? 1 : 3; // Mobile shows 1, desktop shows 3
    const totalSlides = Math.max(0, items.length - itemsPerView + 1); // Corrected calculation
    
    // Set initial item width based on viewport
    let itemWidth = 0;
    let gapWidth = 20; // Default gap width between items
    
    // Function to calculate item width
    function calculateItemWidth() {
        const isMobile = window.innerWidth <= 768;
        const container = track.parentElement;
        const containerWidth = container.clientWidth;
        
        if (isMobile) {
            // For mobile, each item is full width
            itemWidth = containerWidth;
            gapWidth = 0; // No gap on mobile
        } else {
            // For desktop, calculate width precisely
            const isTablet = window.innerWidth <= 992;
            const itemsToShow = isTablet ? 2 : 3;
            gapWidth = isTablet ? 15 : 20; // Tablet uses 15px gap, desktop 20px
            
            // Calculate the exact width needed for each item
            // The formula ensures items fill exactly the container width with correct gaps
            itemWidth = (containerWidth - (gapWidth * (itemsToShow - 1))) / itemsToShow;
            
            // Apply the calculated width to all items for consistency
            items.forEach(item => {
                item.style.flex = `0 0 ${itemWidth}px`;
                item.style.maxWidth = `${itemWidth}px`;
                item.style.marginRight = `${gapWidth}px`;
            });
            
            // Remove margin from the last visible item
            if (items[items.length - 1]) {
                items[items.length - 1].style.marginRight = '0';
            }
        }
    }
    
    // Calculate initial width
    calculateItemWidth();
    
    // Function to update the slider position
    function updateSlider() {
        // Calculate the precise offset
        let offset = currentSlide * (itemWidth + gapWidth);
        
        // Ensure the offset is never negative and doesn't overscroll
        offset = Math.max(0, offset);
        const maxOffset = (items.length - itemsPerView) * (itemWidth + gapWidth);
        offset = Math.min(offset, maxOffset);
        
        // Apply the transform with the calculated offset
        track.style.transform = `translateX(-${offset}px)`;
        
        // Update active indicator
        indicators.forEach((indicator, index) => {
            if (index === currentSlide) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
        
        // Update button states (optional)
        if (prevBtn) prevBtn.disabled = currentSlide === 0;
        if (nextBtn) nextBtn.disabled = currentSlide >= totalSlides - 1;
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
        stopAutoSlide(); // Clear any existing interval first
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
        // Recalculate everything on resize
        const oldItemsPerView = itemsPerView;
        const newItemsPerView = window.innerWidth <= 768 ? 1 : (window.innerWidth <= 992 ? 2 : 3);
        
        if (oldItemsPerView !== newItemsPerView) {
            // Recalculate total slides and adjust current slide if needed
            const newTotalSlides = Math.max(0, items.length - newItemsPerView + 1);
            if (currentSlide >= newTotalSlides) {
                currentSlide = Math.max(0, newTotalSlides - 1);
            }
        }
        
        // Recalculate widths and update
        calculateItemWidth();
        updateSlider();
    });
    
    // Initialize slider position
    updateSlider();
});
