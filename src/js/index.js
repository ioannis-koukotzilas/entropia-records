/*
Spotlight
*/

const spotlight = new Swiper('.spotlight', {
  wrapperClass: 'container',
  slideClass: 'slide',
  watchSlidesVisibility: true,
  preloadImages: false,
  lazy: false,
  autoHeight: true,
  speed: 600,
  spaceBetween: 0,
  autoplay: { delay: 8000 },
  navigation: {
    nextEl: '.next',
    prevEl: '.prev',
  },
  breakpoints: {
    768: {
      autoHeight: false,
    },
  },
});
