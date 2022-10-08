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
