// Cache DOM elements and constants
const $swiperSlides = $(".swiper-slide");
const $slideInnerElements = $swiperSlides.find(".slide-inner");
const INTERLEAVE_OFFSET = 0.5;
const TRANSITION_SPEED = 1000;

// Build menu array more efficiently
const menu = $slideInnerElements.map((_, el) => $(el).attr("data-text")).get();

// Optimized swiper configuration
const swiperOptions = {
  loop: true,
  speed: TRANSITION_SPEED,
  parallax: true,
  autoplay: {
    delay: 6500,
    disableOnInteraction: false
  },
  watchSlidesProgress: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  
  on: {
    progress() {
      const { slides, width } = this;
      const innerOffset = width * INTERLEAVE_OFFSET;
      
      // Use requestAnimationFrame for better performance
      requestAnimationFrame(() => {
        for (let i = 0; i < slides.length; i++) {
          const slide = slides[i];
          const slideProgress = slide.progress;
          const innerTranslate = slideProgress * innerOffset;
          const slideInner = slide.querySelector(".slide-inner");
          
          if (slideInner) {
            slideInner.style.transform = `translate3d(${innerTranslate}px, 0, 0)`;
          }
        }
      });
    },

    touchStart() {
      // Clear transitions more efficiently
      for (let i = 0; i < this.slides.length; i++) {
        const slide = this.slides[i];
        slide.style.transition = "";
        const slideInner = slide.querySelector(".slide-inner");
        if (slideInner) slideInner.style.transition = "";
      }
    },

    setTransition(speed) {
      const transitionValue = `${speed}ms`;
      
      // Batch DOM updates
      for (let i = 0; i < this.slides.length; i++) {
        const slide = this.slides[i];
        slide.style.transition = transitionValue;
        const slideInner = slide.querySelector(".slide-inner");
        if (slideInner) slideInner.style.transition = transitionValue;
      }
    }
  }
};

// Initialize Swiper
const swiper = new Swiper(".swiper-container", swiperOptions);

// Optimize background image setting
$(".slide-bg-image").each(function() {
  const $this = $(this);
  const backgroundUrl = $this.data("background");
  
  if (backgroundUrl) {
    $this.css("background-image", `url(${backgroundUrl})`);
  }
});