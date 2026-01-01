//----------------------------------------------------------------
// Toggle Navbar
$(".nav-mobile-icon").on("click", function () {
    $(".big-nav").toggleClass("big-nav-hiddin");
    $(".close-overlay").addClass("open-over");
});
// $(".header .nav-logo .nav-search-icon").on("click", function () {
//   $(".big-nav").toggleClass("big-nav-hiddin");
//   $(".big-nav .big-nav-search .form-control").focus();
//   $(".close-overlay").addClass("open-over");
// });
$(".li-link .li-link-icon").on("click", function () {
    $(this)
        .parent()
        .parent()
        .find(".nav-link-popup")
        .removeClass("big-nav-hiddin");
});
//----------------------------------------------------------------

$(".big-nav .close-big-nav").on("click", function () {
    $(".big-nav").addClass("big-nav-hiddin");
    $(".close-overlay").removeClass("open-over");
});

// Add big-nav-hiddin class when clicking on any link inside big-nav
$(".big-nav a").on("click", function () {
    $(".big-nav").addClass("big-nav-hiddin");
    $(".close-overlay").removeClass("open-over");
});

$(".close-link-popup").on("click", function () {
    $(".nav-link-popup").addClass("big-nav-hiddin");
});

// All Popups
$(".close-overlay").on("click", function () {
    $(this).removeClass("open-over");
    $(".big-nav").addClass("big-nav-hiddin");
    $(".nav-link-popup").addClass("big-nav-hiddin");
    $(".order-service").removeClass("open-popup");
    $(".contact-container").removeClass("open-popup");
});

// Toggle Language
if ($("html").attr("lang") == "en") {
    $(".page-lang").text("العربية");
} else {
    $(".page-lang").text("English");
}

// Video Autoplay
$(document).ready(function () {
    const video = document.querySelector(".index-header video");
    if (video) {
        // Ensure video plays when page loads
        video.play().catch(function (error) {
            console.log("Video autoplay failed:", error);
            // If autoplay fails, try to play on user interaction
            document.addEventListener(
                "click",
                function () {
                    video.play().catch(function (err) {
                        console.log("Video play failed:", err);
                    });
                },
                { once: true }
            );
        });

        // Ensure video is muted for autoplay
        video.muted = true;

        // Handle video loading
        video.addEventListener("loadeddata", function () {
            console.log("Video loaded successfully");
        });

        video.addEventListener("error", function (e) {
            console.log("Video error:", e);
        });
    }
});

// WhatsApp Popup Functionality
$(document).ready(function () {
    const whatsappFloat = document.getElementById("whatsappFloat");
    const whatsappPopup = document.getElementById("whatsappPopup");
    const whatsappClose = document.getElementById("whatsappClose");

    // Show popup after 3 seconds
    setTimeout(function () {
        if (whatsappPopup && !localStorage.getItem("whatsappPopupClosed")) {
            whatsappPopup.classList.add("show");
        }
    }, 3000);

    // Toggle popup on float button click
    if (whatsappFloat) {
        whatsappFloat.addEventListener("click", function () {
            if (whatsappPopup) {
                whatsappPopup.classList.toggle("show");
            }
        });
    }

    // Close popup on close button click
    if (whatsappClose) {
        whatsappClose.addEventListener("click", function () {
            if (whatsappPopup) {
                whatsappPopup.classList.remove("show");
                localStorage.setItem("whatsappPopupClosed", "true");
            }
        });
    }

    // Close popup when clicking outside
    document.addEventListener("click", function (event) {
        if (whatsappPopup && whatsappFloat) {
            const isClickInsidePopup = whatsappPopup.contains(event.target);
            const isClickOnFloat = whatsappFloat.contains(event.target);

            if (
                !isClickInsidePopup &&
                !isClickOnFloat &&
                whatsappPopup.classList.contains("show")
            ) {
                whatsappPopup.classList.remove("show");
            }
        }
    });

    // Auto-hide popup after 10 seconds if not interacted with
    let popupTimer;
    if (whatsappPopup) {
        whatsappPopup.addEventListener("mouseenter", function () {
            clearTimeout(popupTimer);
        });

        whatsappPopup.addEventListener("mouseleave", function () {
            popupTimer = setTimeout(function () {
                whatsappPopup.classList.remove("show");
            }, 10000);
        });
    }
});

// Instagram Popup Functionality
$(document).ready(function () {
    const instagramFloat = document.getElementById("instagramFloat");
    const instagramPopup = document.getElementById("instagramPopup");
    const instagramClose = document.getElementById("instagramClose");

    // Show popup after 4 seconds
    setTimeout(function () {
        if (instagramPopup && !localStorage.getItem("instagramPopupClosed")) {
            instagramPopup.classList.add("show");
        }
    }, 4000);

    // Toggle popup on float button click
    if (instagramFloat) {
        instagramFloat.addEventListener("click", function () {
            if (instagramPopup) {
                instagramPopup.classList.toggle("show");
            }
        });
    }

    // Close popup on close button click
    if (instagramClose) {
        instagramClose.addEventListener("click", function () {
            if (instagramPopup) {
                instagramPopup.classList.remove("show");
                localStorage.setItem("instagramPopupClosed", "true");
            }
        });
    }

    // Close popup when clicking outside
    document.addEventListener("click", function (event) {
        if (instagramPopup && instagramFloat) {
            const isClickInsidePopup = instagramPopup.contains(event.target);
            const isClickOnFloat = instagramFloat.contains(event.target);

            if (
                !isClickInsidePopup &&
                !isClickOnFloat &&
                instagramPopup.classList.contains("show")
            ) {
                instagramPopup.classList.remove("show");
            }
        }
    });

    // Auto-hide popup after 10 seconds if not interacted with
    let instagramPopupTimer;
    if (instagramPopup) {
        instagramPopup.addEventListener("mouseenter", function () {
            clearTimeout(instagramPopupTimer);
        });

        instagramPopup.addEventListener("mouseleave", function () {
            instagramPopupTimer = setTimeout(function () {
                instagramPopup.classList.remove("show");
            }, 10000);
        });
    }
});

// Facebook Popup Functionality
$(document).ready(function () {
    const facebookFloat = document.getElementById("facebookFloat");
    const facebookPopup = document.getElementById("facebookPopup");
    const facebookClose = document.getElementById("facebookClose");

    // Show popup after 5 seconds
    setTimeout(function () {
        if (facebookPopup && !localStorage.getItem("facebookPopupClosed")) {
            facebookPopup.classList.add("show");
        }
    }, 5000);

    // Toggle popup on float button click
    if (facebookFloat) {
        facebookFloat.addEventListener("click", function () {
            if (facebookPopup) {
                facebookPopup.classList.toggle("show");
            }
        });
    }

    // Close popup on close button click
    if (facebookClose) {
        facebookClose.addEventListener("click", function () {
            if (facebookPopup) {
                facebookPopup.classList.remove("show");
                localStorage.setItem("facebookPopupClosed", "true");
            }
        });
    }

    // Close popup when clicking outside
    document.addEventListener("click", function (event) {
        if (facebookPopup && facebookFloat) {
            const isClickInsidePopup = facebookPopup.contains(event.target);
            const isClickOnFloat = facebookFloat.contains(event.target);

            if (
                !isClickInsidePopup &&
                !isClickOnFloat &&
                facebookPopup.classList.contains("show")
            ) {
                facebookPopup.classList.remove("show");
            }
        }
    });

    // Auto-hide popup after 10 seconds if not interacted with
    let facebookPopupTimer;
    if (facebookPopup) {
        facebookPopup.addEventListener("mouseenter", function () {
            clearTimeout(facebookPopupTimer);
        });

        facebookPopup.addEventListener("mouseleave", function () {
            facebookPopupTimer = setTimeout(function () {
                facebookPopup.classList.remove("show");
            }, 10000);
        });
    }
});

// Initialize WOW.js for scroll animations
new WOW().init();

// Tilt.js
// $(document).ready(function () {
//   $(
//     ".service-card-tilt, .project-card-tilt, .blog-card-tilt, .tes-card-tilt, .review-card-tilt, .num-card-tilt, .feat-card-tilt"
//   ).tilt({
//     maxTilt: 7,
//     perspective: 300,
//     glare: true,
//     maxGlare: 0.1,
//   });
// });

// $(".tilt-effect").tilt({
//   scale: 1,
//   maxTilt: 7,
// });

// CountTo Animation for Testimonials Section
$(document).ready(function () {
    let countToTriggered = false;

    function triggerCountTo() {
        if (!countToTriggered) {
            $(".count-to").each(function () {
                const $this = $(this);
                const to = parseInt($this.data("to"));
                const from = parseInt($this.data("from")) || 0;
                const speed = parseInt($this.data("speed")) || 2000;
                const suffix = $this.data("suffix") || "";

                $this.countTo({
                    from: from,
                    to: to,
                    speed: speed,
                    refreshInterval: 50,
                    formatter: function (value, options) {
                        return Math.floor(value).toLocaleString() + suffix;
                    },
                    onUpdate: function (value) {
                        // Optional: Add any custom logic during animation
                    },
                    onComplete: function (value) {
                        // Optional: Add any custom logic when animation completes
                    },
                });
            });
            countToTriggered = true;
        }
    }

    // Check if testimonials section is in view
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <=
                (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Trigger animation when testimonials section comes into view
    $(window).on("scroll", function () {
        const testimonialsSection = document.querySelector(".num-cards");
        if (testimonialsSection && isInViewport(testimonialsSection)) {
            triggerCountTo();
        }
    });

    // Also trigger on page load if section is already visible
    $(window).on("load", function () {
        const testimonialsSection = document.querySelector(".num-cards");
        if (testimonialsSection && isInViewport(testimonialsSection)) {
            triggerCountTo();
        }
    });
});

// Partners Slider - Pause on Hover
$(document).ready(function () {
    const partnersSlider = document.getElementById("partnersSlider");
    const partnersWrapper = document.querySelector(".partners-slider-wrapper");

    if (partnersSlider && partnersWrapper) {
        // Pause animation on hover
        partnersWrapper.addEventListener("mouseenter", function () {
            partnersSlider.classList.add("paused");
        });

        // Resume animation on mouse leave
        partnersWrapper.addEventListener("mouseleave", function () {
            partnersSlider.classList.remove("paused");
        });
    }
});

// Hero Slider with Fade Effect, Swipe Support, and Infinite Loop
$(document).ready(function () {
    const heroSlides = document.querySelectorAll(".hero-slide");
    const heroSliderSection = document.querySelector(".hero-slider-section");
    let currentSlide = 0;
    let slideInterval;
    let touchStartX = 0;
    let touchEndX = 0;
    let isSwiping = false;

    // Function to animate slide content
    function animateSlideContent(slide) {
        const content = slide.querySelector(".hero-slide-content");
        if (!content) return;

        // Get all animated elements
        const title = content.querySelector(".hero-title");
        const subtitle = content.querySelector(".hero-subtitle");
        const link = content.querySelector(".hero-link");
        const overlay = slide.querySelector(".hero-slide-overlay");

        // Helper function to reset and re-animate an element
        function resetAndAnimate(element) {
            if (!element) return;

            // Store original classes before removing
            const allClasses = Array.from(element.classList);
            const animationClasses = allClasses.filter(
                (cls) =>
                    cls === "fadeIn" ||
                    cls === "fadeInUp" ||
                    cls === "fadeInDown" ||
                    cls === "fadeInLeft" ||
                    cls === "fadeInRight" ||
                    cls === "zoomIn" ||
                    cls === "bounceIn" ||
                    cls === "pulse" ||
                    cls === "slideInUp" ||
                    cls === "slideInDown" ||
                    cls === "slideInLeft" ||
                    cls === "slideInRight"
            );

            const animationClass =
                animationClasses.length > 0 ? animationClasses[0] : "fadeInUp";
            const duration = element.getAttribute("data-wow-duration") || "1s";
            const delay = element.getAttribute("data-wow-delay") || "0.3s";

            // Remove animation-related classes and reset styles
            element.classList.remove(
                "wow",
                "animated",
                "fadeIn",
                "fadeInUp",
                "fadeInLeft",
                "fadeInRight",
                "fadeInDown",
                "zoomIn",
                "bounceIn",
                "pulse",
                "slideInUp",
                "slideInDown",
                "slideInLeft",
                "slideInRight"
            );
            element.style.visibility = "hidden";
            element.style.animation = "none";
            element.style.opacity = "0";

            // Re-add animation classes and trigger animations
            setTimeout(() => {
                element.classList.add("wow", animationClass);
                element.style.visibility = "visible";
                element.style.opacity = "1";
                element.style.animation = "";

                // Force reflow to trigger animation
                void element.offsetWidth;

                element.classList.add("animated");
            }, 150);
        }

        // Reset and animate overlay
        if (overlay) {
            overlay.classList.remove("wow", "animated", "fadeIn");
            overlay.style.visibility = "hidden";
            overlay.style.opacity = "0";
            setTimeout(() => {
                overlay.classList.add("wow", "fadeIn");
                overlay.style.visibility = "visible";
                overlay.style.opacity = "1";
                void overlay.offsetWidth;
                overlay.classList.add("animated");
            }, 100);
        }

        // Reset and animate content elements with staggered delays
        resetAndAnimate(title);
        setTimeout(() => resetAndAnimate(subtitle), 50);
        setTimeout(() => resetAndAnimate(link), 100);
    }

    // Function to show a specific slide
    function showSlide(index) {
        // Remove active class from all slides
        heroSlides.forEach((slide) => slide.classList.remove("active"));

        // Ensure index is within bounds (infinite loop)
        const slideIndex =
            ((index % heroSlides.length) + heroSlides.length) %
            heroSlides.length;

        // Add active class to current slide
        if (heroSlides[slideIndex]) {
            heroSlides[slideIndex].classList.add("active");
            // Animate the content of the active slide
            animateSlideContent(heroSlides[slideIndex]);
        }

        currentSlide = slideIndex;
    }

    // Function to go to next slide (infinite)
    function nextSlide() {
        currentSlide = (currentSlide + 1) % heroSlides.length;
        showSlide(currentSlide);
    }

    // Function to go to previous slide (infinite)
    function prevSlide() {
        currentSlide =
            (currentSlide - 1 + heroSlides.length) % heroSlides.length;
        showSlide(currentSlide);
    }

    // Auto-advance slides (infinite loop)
    function startAutoSlide() {
        slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }

    function stopAutoSlide() {
        clearInterval(slideInterval);
    }

    // Swipe detection for touch devices
    function handleSwipe() {
        const swipeThreshold = 50; // Minimum distance for a swipe
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe left - next slide
                nextSlide();
            } else {
                // Swipe right - previous slide
                prevSlide();
            }
            // Restart auto-slide after manual swipe
            stopAutoSlide();
            startAutoSlide();
        }
    }

    // Initialize slider
    if (heroSlides.length > 0 && heroSliderSection) {
        showSlide(0);
        // Animate first slide on page load
        setTimeout(() => {
            animateSlideContent(heroSlides[0]);
        }, 100);
        startAutoSlide();

        // Touch events for mobile
        heroSliderSection.addEventListener("touchstart", function (e) {
            touchStartX = e.changedTouches[0].screenX;
            isSwiping = true;
            stopAutoSlide();
        });

        heroSliderSection.addEventListener("touchmove", function (e) {
            if (isSwiping) {
                touchEndX = e.changedTouches[0].screenX;
            }
        });

        heroSliderSection.addEventListener("touchend", function (e) {
            if (isSwiping) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                isSwiping = false;
            }
        });

        // Mouse events for desktop (drag/swipe)
        let mouseStartX = 0;
        let mouseEndX = 0;
        let isMouseDown = false;

        heroSliderSection.addEventListener("mousedown", function (e) {
            mouseStartX = e.clientX;
            isMouseDown = true;
            stopAutoSlide();
        });

        heroSliderSection.addEventListener("mousemove", function (e) {
            if (isMouseDown) {
                mouseEndX = e.clientX;
            }
        });

        heroSliderSection.addEventListener("mouseup", function (e) {
            if (isMouseDown) {
                mouseEndX = e.clientX;
                const diff = mouseStartX - mouseEndX;
                const swipeThreshold = 50;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        // Swipe left - next slide
                        nextSlide();
                    } else {
                        // Swipe right - previous slide
                        prevSlide();
                    }
                }
                isMouseDown = false;
                startAutoSlide();
            }
        });

        // Prevent auto-slide pause on hover (since we removed controls)
        // Keep it running continuously for infinite effect
    }
});
