/*
Swiper
*/

// Product gallery
const swiper = new Swiper('.product-gallery .slider', {
  preloadImages: false,
  speed: 300,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  autoHeight: true,
  breakpoints: {
    768: {
      autoHeight: false,
    },
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

const template = ['single-product'];

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
