/*
Main JS
*/

// Store a template variable to pass later different template names into different arrays
let template;

/*
Swiper
*/

// Home

// Product gallery
const spotlight = new Swiper('.spotlight', {
  wrapperClass: 'container',
  slideClass: 'slide',
  speed: 300,
  spaceBetween: 0,
  autoHeight: true,
  freeMode: {
    enabled: true,
    sticky: true,
  },
  updateOnImagesReady: true,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

// Product gallery
const swiper = new Swiper('.product-images', {
  speed: 500,
  spaceBetween: 0,
  autoHeight: true,
  freeMode: {
    enabled: true,
    // minimumVelocity: 0.5,
  },
  navigation: {
    nextEl: '#s-next',
    prevEl: '#s-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },
});

// Cursor area
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

// Products Slider
// if (window.innerWidth < 768) {
//   const testSwiper = new Swiper('.products-slider', {
//     slidesPerView: 'auto',
//     spaceBetween: 10,
//     wrapperClass: 'products',
//     slideClass: 'product',
//     freeMode: true,
//   });
// }

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

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

// function swiperMode() {

//   const mediaQuerie = window.matchMedia('(max-width: 600px)');

//   let ioannis;

//   if (mediaQuerie.matches) {
//     ioannis = new Swiper('.products-slider', {
//       slidesPerView: 'auto',
//       spaceBetween: 10,
//       wrapperClass: 'products',
//       slideClass: 'product',
//       freeMode: true,
//     });
//   } else {
//     ioannis.destroy();
//   }
// }

// window.addEventListener('load', function () {
//   swiperMode();
// });

// window.addEventListener('resize', function () {
//   swiperMode();
// });

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

// let ioannis;

// function init() {
//   ioannis = new Swiper('.products-slider', {
//     slidesPerView: 'auto',
//     spaceBetween: 10,
//     wrapperClass: 'products',
//     slideClass: 'product',
//     freeMode: true,
//   });
// }

// function destroy() {
//   ioannis.destroy;
// }

// function swiperMode() {
//   let mobile = window.matchMedia('(max-width: 600px)');

//   // Enable (for mobile)
//   if (mobile.matches) {
//     init();
//   }

//   // Disable (for desktop)
//   else {
//     destroy();
//   }
// }

// // console.log(swiper);

// window.addEventListener('load', () => {
//   swiperMode();
// });

// window.addEventListener('resize', () => {
//   swiperMode();
// });

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

// breakpoint where swiper will be destroyed
// and switches to a dual-column layout
// const breakpoint = window.matchMedia('(min-width: 600px)');

// let mySwiper;

// const breakpointChecker = function () {

//   if (breakpoint.matches == true) {

//     return closeSwiper();

//   } else if (breakpoint.matches == false) {

//     return enableSwiper();

//   }
// };

// const closeSwiper = function () {
//   mySwiper.destroy(true, true);
// };

// const enableSwiper = function () {
//   mySwiper = new Swiper('.products-slider', {
//     slidesPerView: 'auto',
//     spaceBetween: 10,
//     wrapperClass: 'products',
//     slideClass: 'product',
//     freeMode: true,
//   });
// };

// window.addEventListener('resize', () => {
//   breakpointChecker();
// });

// breakpointChecker();

/* Swiper
 **************************************************************/
// let ioannis;

// /* Which media query
//  **************************************************************/
// function swiperMode() {
//   let mobile = window.matchMedia('(min-width: 0px) and (max-width: 768px)');

//   // Enable (for mobile)
//   if (mobile.matches) {

//       const ioannis = new Swiper('.products-slider', {
//         slidesPerView: 'auto',
//         spaceBetween: 10,
//         wrapperClass: 'products',
//         slideClass: 'product',
//         freeMode: true,
//       });

//   }

//   // Disable (for tablet)
//   else {
//     swiper.destroy();
//     // init = false;
//   }
// }

// /* On Load
//  **************************************************************/
// // window.addEventListener('load', function () {
// //   swiperMode();
// // });

// swiperMode();

// /* On Resize
//  **************************************************************/
// window.addEventListener('resize', function () {
//   swiperMode();
// });

const ioannis = new Swiper('.products-slider', {
  // Default parameters
  wrapperClass: 'products',
  slideClass: 'product',
  slidesPerView: 'auto',
  spaceBetween: 10,
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
