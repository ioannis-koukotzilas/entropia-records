const swiper = new Swiper('.product-images', {
  // speed: 500,

  spaceBetween: 10,

  navigation: {
    nextEl: '#s-next',
    prevEl: '#s-prev',
  },

  scrollbar: {
    el: '.swiper-scrollbar',
    draggable: true,
  },

  autoHeight: true,

  // freeMode: true,
  // cssMode: true,

  freeMode: {
    enabled: true,
    minimumVelocity: 0.5,
  },
});

var e = document.querySelectorAll('.cursor-area');

e.forEach(function (e) {
  e.addEventListener('mousemove', function (t) {
    var s = t.offsetX,
      a = t.offsetY,
      i = e.firstElementChild;
    (i.style.display = 'block'), (i.style.top = a + 'px'), (i.style.left = s + 'px');
  });
}),
  e.forEach(function (e) {
    e.addEventListener('mouseout', function (t) {
      e.firstElementChild.style.display = 'none';
    });
  });

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

if (window.innerWidth < 768) {
  const testSwiper = new Swiper('.products-slider', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    wrapperClass: 'products',
    slideClass: 'product',
    freeMode: true,
    // centeredSlides: true,
    // cssMode: true,
  });
}
