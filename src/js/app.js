/*
Swiper
*/

function swiperNavigation(target) {
  const slider = document.querySelector(target);

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

// Products slider

const productsSlider = new Swiper('.products-slider', {
  // Default parameters
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
