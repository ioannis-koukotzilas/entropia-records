/*
App JS
*/

// Store a template variable to pass later different template names into different arrays
let template;

/*
Swiper
*/

// Spotlight
const spotlight = new Swiper('.spotlight', {
  wrapperClass: 'container',
  slideClass: 'slide',
  speed: 500,
  spaceBetween: 0,
  autoHeight: true,
  // freeMode: {
  //   enabled: true,
  //   sticky: true,
  // },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

// Product gallery
const swiper = new Swiper('.product-gallery .slider', {
  speed: 500,
  spaceBetween: 0,
  autoHeight: true,
  freeMode: {
    enabled: true,
    // minimumVelocity: 0.5,
  },
  navigation: {
    nextEl: '.next',
    prevEl: '.prev',
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },
});

// Products slider

const ioannis = new Swiper('.products-slider', {
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
    sticky: true,
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

/*
Cursor Area
*/

const cursorArea = document.querySelectorAll('.cursor-area');

cursorArea.forEach(function (e) {
  e.addEventListener('mousemove', function (t) {
    let s = t.offsetX,
      a = t.offsetY,
      i = e.firstElementChild;
    (i.style.display = 'block'), (i.style.top = a + 'px'), (i.style.left = s + 'px');
  });
});
cursorArea.forEach(function (e) {
  e.addEventListener('mouseout', function () {
    e.firstElementChild.style.display = 'none';
  });
});

/**
 * DotDotDot
 */

template = ['single-product'];

// Check the body className
if (template.some((className) => document.body.classList.contains(className))) {
  // Check if product description exists
  if (document.querySelector('.woocommerce-product-details__short-description')) {
    const description = document.querySelector('.woocommerce-product-details__short-description');

    // Check if description height is greater from 120px
    if (description.offsetHeight >= 120) {
      console.log('Screen width is at least 2000px');

      // Create the read more button
      const readMore = document.createElement('div');
      readMore.classList.add('read-more', 'underline');
      description.appendChild(readMore);

      // DDD options
      const options = {
        height: 120,
        keep: '.read-more',
        watch: true,
        tolerance: 0,
      };

      // Set DDD
      const dot = new Dotdotdot(description, options);
      const api = dot.API;

      // Add event listener to read more button
      description.addEventListener('click', (event) => {
        if (event.target.closest('.read-more')) {
          event.preventDefault();

          //	When truncated, restore
          if (description.matches('.ddd-truncated')) {
            api.restore();
            description.classList.add('active');
          }

          //	Not truncated, truncate
          else {
            api.truncate();
            api.watch();
            description.classList.remove('active');
          }
        }
      });
    } else {
      console.log('Screen less than 2000px');
    }
  }
}

/*
Facets
*/

(function ($) {
  $(document).on('facetwp-loaded', function () {
    var qs = FWP.buildQueryString();
    if ('' === qs) {
      // no facets are selected
      $('.facetwp-reset-button').hide();
    } else {
      $('.facetwp-reset-button').show();
    }
  });
})(jQuery);

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
