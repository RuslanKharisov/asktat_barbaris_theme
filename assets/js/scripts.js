document.addEventListener('DOMContentLoaded', function () {
  
  document.getElementById('burger').addEventListener('click', function () {
    const mobileMenu = document.querySelector('#mobile-menu');
    mobileMenu.classList.toggle('hidden');
    
    const burgerIcon = document.querySelector('.burger-icon');
    const closeIcon = document.querySelector('.close-icon');
    burgerIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
  })

  // var mainCarousel = document.querySelectorAll('.main-carousel');
  // var thumbnailCarousel = document.querySelectorAll('.thumbnail-carousel');

  // try {
  //   if (mainCarousel) {
  //     var flktyMain = new Flickity(mainCarousel, {
  //       pageDots: false,
  //       prevNextButtons: false,
  //       wrapAround: true,
  //     });
  //   }
  //   if (thumbnailCarousel.length > 0) {
  //   var flktyThumb = new Flickity(thumbnailCarousel, {
  //     asNavFor: '.main-carousel',
  //     contain: true,
  //     pageDots: false,
  //     prevNextButtons: false,
  //   });
  // }
  // } catch (error) {}

});
