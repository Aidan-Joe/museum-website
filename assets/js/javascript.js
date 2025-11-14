document.addEventListener("DOMContentLoaded", function () {
    function setupCarousel(containerSelector, trackSelector, itemSelector, prevSelector, nextSelector) {
        const container = document.querySelector(containerSelector);
        if (!container) return;

        const track = container.querySelector(trackSelector);
        const prevButton = container.querySelector(prevSelector);
        const nextButton = container.querySelector(nextSelector);
        const items = container.querySelectorAll(itemSelector);

        if (!track || !prevButton || !nextButton || items.length === 0) return;

        const itemWidth = items[0].offsetWidth + 20; // Include gap spacing
        let index = 0;

        nextButton.addEventListener("click", function () {
            const visibleItems = Math.floor(container.offsetWidth / itemWidth);
            if (index < items.length - visibleItems) {
                index++;
                track.style.transform = `translateX(-${index * itemWidth}px)`;
            }
        });

        prevButton.addEventListener("click", function () {
            if (index > 0) {
                index--;
                track.style.transform = `translateX(-${index * itemWidth}px)`;
            }
        });
    }

    // Initialize Collection carousel
    setupCarousel(".collection", ".carousel-track", ".carousel-item", ".collection .prev", ".collection .next");

    // Initialize Shop carousel
    setupCarousel(".shop", ".carousel-tracks", ".carousels-item", ".shop .prev", ".shop .next");
});