document.addEventListener("DOMContentLoaded", function () {
    const carousels = [
        {
            trackId: "jadwal-track",
            prevId: "jadwal-prev",
            nextId: "jadwal-next",
            dotsId: "jadwal-dots",
        },
        {
            trackId: "info-track",
            prevId: "info-prev",
            nextId: "info-next",
            dotsId: "info-dots",
        },
    ];

    carousels.forEach((carousel) => {
        const track = document.getElementById(carousel.trackId);
        if (!track) return;

        const items = track.querySelectorAll(".flex-shrink-0");
        const prev = document.getElementById(carousel.prevId);
        const next = document.getElementById(carousel.nextId);
        const dotsContainer = document.getElementById(carousel.dotsId);
        const total = items.length;

        if (total === 0) {
            [prev, next, dotsContainer].forEach(
                (el) => el && (el.style.display = "none")
            );
            return;
        }

        const getItemsPerSlide = () => {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 640) return 2;
            return 1;
        };
        let itemsPerSlide = getItemsPerSlide();

        const getItemWidth = () => {
            if (items[0]) {
                const style = getComputedStyle(items[0]);
                return (
                    items[0].getBoundingClientRect().width +
                    parseInt(style.marginRight)
                );
            }
            return 0;
        };
        let itemWidth = getItemWidth();

        const createDots = () => {
            if (!dotsContainer) return;
            dotsContainer.innerHTML = "";
            const totalDots = Math.ceil(total / itemsPerSlide);
            for (let i = 0; i < totalDots; i++) {
                const dot = document.createElement("button");
                dot.classList.add(
                    "w-3",
                    "h-3",
                    "rounded-full",
                    "mx-1",
                    "bg-gray-400",
                    i === 0 ? "bg-blue-600" : ""
                );
                dot.setAttribute("aria-label", `Slide ${i + 1}`);
                dot.addEventListener("click", () => {
                    currentIndex = i * itemsPerSlide;
                    scrollToIndex(currentIndex);
                });
                dotsContainer.appendChild(dot);
            }
        };

        const updateDots = (activeIndex) => {
            if (!dotsContainer) return;
            const dots = dotsContainer.children;
            const activeDotIndex = Math.floor(activeIndex / itemsPerSlide);
            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.toggle("bg-blue-600", i === activeDotIndex);
                dots[i].classList.toggle("bg-gray-400", i !== activeDotIndex);
            }
        };

        let currentIndex = 0;

        const scrollToIndex = (index) => {
            const normalizedIndex = ((index % total) + total) % total;
            const scrollPos = normalizedIndex * itemWidth;
            track.scrollTo({ left: scrollPos, behavior: "smooth" });
            currentIndex = normalizedIndex;
            updateDots(normalizedIndex);
        };

        const scrollCarousel = (direction) => {
            let newIndex = currentIndex + direction * itemsPerSlide;
            if (newIndex >= total) newIndex = 0;
            if (newIndex < 0)
                newIndex = total - (total % itemsPerSlide || itemsPerSlide);
            scrollToIndex(newIndex);
        };

        next?.addEventListener("click", () => scrollCarousel(1));
        prev?.addEventListener("click", () => scrollCarousel(-1));

        track.addEventListener("touchstart", (e) => {
            const touchStartX = e.touches[0].clientX;
            track.addEventListener(
                "touchend",
                (e2) => {
                    const touchEndX = e2.changedTouches[0].clientX;
                    const swipeDistance = touchStartX - touchEndX;
                    if (swipeDistance > 50) scrollCarousel(1);
                    if (swipeDistance < -50) scrollCarousel(-1);
                },
                { once: true }
            );
        });

        window.addEventListener("resize", () => {
            itemsPerSlide = getItemsPerSlide();
            itemWidth = getItemWidth();
            createDots();
            scrollToIndex(currentIndex);
        });

        createDots();
        scrollToIndex(currentIndex);
    });
});
