//==================================================
// Swiper
//==================================================

jQuery(document).ready(function ($) {
  var swiper = new Swiper('.swiper-container', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 3,
    slidesPerColumn: 2,
    paginationClickable: true,
    spaceBetween: 5
  });
});