document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById("carousel-track");
    if (!track) return;

    const items = track.querySelectorAll(".flex-shrink-0"); // Target carousel items specifically
    const prev = document.getElementById("prev");
    const next = document.getElementById("next");
    const dotsContainer = document.getElementById("carousel-dots");
    const total = items.length;
    if (prev) prev.style.zIndex = "30";
    if (next) next.style.zIndex = "30";

    if (total === 0) {
        [prev, next, dotsContainer].forEach(
            (el) => el && (el.style.display = "none")
        );
        return;
    }

    const getItemsPerSlide = () => {
        if (window.innerWidth >= 1024) return 3; // lg:w-1/3
        if (window.innerWidth >= 640) return 2; // sm:w-1/2
        return 1; // w-full
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
        const maxScroll = track.scrollWidth - track.offsetWidth;
        let newScrollLeft = track.scrollLeft + direction * itemWidth;

        if (newScrollLeft > maxScroll - 5) {
            newScrollLeft = 0;
        } else if (newScrollLeft < 0) {
            newScrollLeft = maxScroll;
        }

        track.scrollTo({ left: newScrollLeft, behavior: "smooth" });

        currentIndex = Math.round(newScrollLeft / itemWidth) % total;
        updateDots(currentIndex);
    };

    next?.addEventListener("click", () => {
        console.log("Next clicked", currentIndex, itemsPerSlide);
        scrollCarousel(1);
    });

    prev?.addEventListener("click", () => {
        console.log("Prev clicked", currentIndex, itemsPerSlide);
        scrollCarousel(-1);
    });

    // Touch support
    track.addEventListener("touchstart", (e) => {
        const touchStartX = e.touches[0].clientX;
        track.addEventListener(
            "touchend",
            (e2) => {
                const touchEndX = e2.changedTouches[0].clientX;
                const swipeDistance = touchStartX - touchEndX;
                if (swipeDistance > 50) {
                    console.log("Swipe left", currentIndex, itemsPerSlide);
                    scrollCarousel(1); // Swipe left -> next
                } else if (swipeDistance < -50) {
                    console.log("Swipe right", currentIndex, itemsPerSlide);
                    scrollCarousel(-1); // Swipe right -> prev
                }
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
