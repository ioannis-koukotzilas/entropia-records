/**
 * Products Slider
 */

// Add swiper navigation buttons

function swiperNavigation(target) {
  const slider = document.querySelector(target);

  // Check if slider exists
  if (slider) {
    const navigation = document.createElement('div');
    const prevBtn = document.createElement('div');
    const nextBtn = document.createElement('div');

    navigation.classList.add('navigation');
    prevBtn.classList.add('prev', 'icon');
    nextBtn.classList.add('next', 'icon');

    slider.appendChild(navigation);
    navigation.appendChild(prevBtn);
    navigation.appendChild(nextBtn);
  }
}

swiperNavigation('.upsells .products-slider');
swiperNavigation('.related .products-slider');
swiperNavigation('.featured .products-slider');



const productsSlider = new Swiper('.products-slider', {
  // Default parameters

// Disable preloading of all images
watchSlidesVisibility : true,
      // preloadImages: false,
      lazy: false,

  wrapperClass: 'products',
  slideClass: 'product',
  slidesPerView: 'auto',
  spaceBetween: 10,
  navigation: {
    nextEl: '.next',
    prevEl: '.prev',
  },
  freeMode: {
    enabled: true,
  },
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 640px
    640: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});

/**
 * Theme Toggle
 */

function toggleTheme(target) {
  const toggleBtn = document.querySelector(target);

  if (localStorage.getItem('dark-mode')) {
    document.body.classList.add('dark-mode');
  }

  toggleBtn.addEventListener('click', (e) => {
    e.preventDefault();

    if (document.body.classList.contains('dark-mode')) {
      document.body.classList.remove('dark-mode');
      localStorage.removeItem('dark-mode');
    } else {
      document.body.classList.add('dark-mode');
      localStorage.setItem('dark-mode', true);
    }
  });
}

toggleTheme('#toggle-theme');

/**
 * Test
 */

 let modal;
 document.addEventListener("click", (e) => {
   if (e.target.className === "modal-open") {
     modal = document.getElementById(e.target.dataset.id);
     openModal(modal);
   } else if (e.target.className === "modal-close") {
     closeModal(modal);
   } else {
     return;
   }
 });
 
 const openModal = (modal) => {
   document.body.style.overflow = "hidden";
   modal.setAttribute("open", "true");
   document.addEventListener("keydown", escClose);
   let overlay = document.createElement("div");
   overlay.id = "modal-overlay";
   document.body.appendChild(overlay);
 };
 
 const closeModal = (modal) => {
   document.body.style.overflow = "auto";
   modal.removeAttribute("open");
   document.removeEventListener("keydown", escClose);
   document.body.removeChild(document.getElementById("modal-overlay"));
 };
 
 const escClose = (e) => {
   if (e.keyCode == 27) {
     closeModal(modal);
   }
 };
 