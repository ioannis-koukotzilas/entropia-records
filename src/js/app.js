/*
 *	Theme Toggle
 *
 *	Copyright (c) Monoscopic Studio
 *
 *	License: CC-BY-NC-4.0
 *	http://creativecommons.org/licenses/by-nc/4.0/
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

/*
 *	Navigation Panels
 *
 *	Copyright (c) Monoscopic Studio
 *
 *	License: CC-BY-NC-4.0
 *	http://creativecommons.org/licenses/by-nc/4.0/
 */

// Create the top level function
function monoscopicNav(target) {
  // Get the HTML elements

  const nav = document.querySelector(target);
  const navItem = nav.querySelectorAll('.has-panel > a');
  const panel = nav.querySelectorAll('.panel');

  // Loop through nav items
  for (let i = 0; i < navItem.length; i++) {
    // Create mouseover event for each nav item
    navItem[i].onmouseover = () => {
      for (let t = 0; t < navItem.length; t++) {
        if (i == t) {
          navItem[t].classList.add('active');
          panel[t].classList.add('active');
        }
      }
    };

    // Create mouseleave event for each nav item
    navItem[i].onmouseleave = () => {
      for (let t = 0; t < navItem.length; t++) {
        if (i == t) {
          navItem[t].classList.remove('active');
          panel[t].classList.remove('active');
        }
      }
    };
  }

  // Loop through panels
  for (let i = 0; i < panel.length; i++) {
    // Create mouseover event for each panel
    panel[i].onmouseover = () => {
      for (let t = 0; t < panel.length; t++) {
        if (i == t) {
          navItem[t].classList.add('active');
          panel[t].classList.add('active');
        }
      }
    };

    // Create mouseleave event for each panel
    panel[i].onmouseleave = () => {
      for (let t = 0; t < panel.length; t++) {
        if (i == t) {
          navItem[t].classList.remove('active');
          panel[t].classList.remove('active');
        }
      }
    };
  }
}

// Init menu
monoscopicNav('.site-header');

/*
 *	Products Slider
 */

// Create navigation buttons
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

swiperNavigation('.new-arrivals .products-slider');
swiperNavigation('.featured .products-slider');
swiperNavigation('.upsells .products-slider');
swiperNavigation('.related .products-slider');

// Init swiper
const productsSlider = new Swiper('.products-slider', {
  wrapperClass: 'products',
  slideClass: 'product',
  watchSlidesVisibility: true,
  preloadImages: false,
  lazy: false,
  slidesPerView: 'auto',
  navigation: {
    nextEl: '.next',
    prevEl: '.prev',
  },
  freeMode: {
    enabled: true,
  },
  breakpoints: {
    720: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});

/*
 *	Facet WP Settings
 */

// Reset button
document.addEventListener('facetwp-loaded', () => {
  console.log('DOM fully loaded and parsed');

  const qs = FWP.buildQueryString();
  const resetButton = document.querySelector('.facetwp-reset-button');

  if (resetButton) {
    if ('' === qs) {
      // no facets are selected

      resetButton.style.display = 'none';
    } else {
      resetButton.style.display = 'block';
    }
  }
});

/**
 * Test
 */

let modal;
document.addEventListener('click', (e) => {
  if (e.target.className === 'modal-open') {
    modal = document.getElementById(e.target.dataset.id);
    openModal(modal);
  } else if (e.target.className === 'modal-close') {
    closeModal(modal);
  } else {
    return;
  }
});

const openModal = (modal) => {
  document.body.style.overflow = 'hidden';
  modal.setAttribute('open', 'true');
  document.addEventListener('keydown', escClose);
  let overlay = document.createElement('div');
  overlay.id = 'modal-overlay';
  document.body.appendChild(overlay);
};

const closeModal = (modal) => {
  document.body.style.overflow = 'auto';
  modal.removeAttribute('open');
  document.removeEventListener('keydown', escClose);
  document.body.removeChild(document.getElementById('modal-overlay'));
};

const escClose = (e) => {
  if (e.keyCode == 27) {
    closeModal(modal);
  }
};
