////////////////////////////
// Show element by scroll //
////////////////////////////

$(window).scroll(function() {
	var scroll = $(window).scrollTop();
	
	if (scroll >= 200) {
		$(".s-style-view").addClass("s-style-view_show");
	} else {
		$(".s-style-view").addClass("s-style-view_hide");
	}

	if (scroll >= 2282) {
		$(".s-gallery__image").addClass("s-gallery__image_show");
	} else {
		$(".s-gallery__image").addClass("s-gallery__image_hide");
	}

	if (scroll >= 3917) {
		$(".s-features-item").addClass("s-features-item_show");
	} else {
		$(".s-features-item").addClass("s-features-item_hide");
	} 

	if (scroll >= 5400) {
		$(".s-types-item").addClass("s-types-item_show");
	} else {
		$(".s-types-item").addClass("s-types-item_hide");
	}
});



////////////
// Sticky //
////////////

$(document).ready(function() {
	$(".header").stick_in_parent();
});



///////////////////
// Smooth scroll //
///////////////////

$(function() {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});



////////////////////
// Magnific Popup //
////////////////////

$(document).ready(function() {

	/**
	 * Gallery
	 */

	$('.s-gallery').magnificPopup({
		tClose: 'Закрыть (Esc)',
		tLoading: 'Загрузка...',
		delegate: 'a',
		type: 'image',
		mainClass: 'mfp-with-zoom',
		gallery: {
			tPrev: 'Назад (Стрелочка влево)',
			tNext: 'Вперёд (Стрелочка вправо)',
			tCounter: '%curr% из %total%',
			enabled: true,
			preload: [1,3],
			navigateByImgClick: true,
		},
		zoom: {
			enabled: true,
			duration: 300,
			easing: 'ease-in-out',
			opener: function(openerElement) {
			return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		},
		image: {
			tError: '<a href="%url%">Это изображение</a> не может быть загружено.'
		},
		ajax: {
			tError: '<a href="%url%">Запрос</a> не увенчался успехом.'
		}
	});


	/**
	 * Pop-up dialogs
	 */

	$('.popup-with-move-anim').magnificPopup({
		tClose: 'Закрыть (Esc)',

		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom'
	});


	/**
	 * Pop-up videos
	 */
	
	$('.popup-youtube').magnificPopup({
		tClose: 'Закрыть (Esc)',

		disableOn: 0,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});
});



///////////////
// Preloader //
///////////////

$(window).load(function() { // makes sure the whole site is loaded
	$('#status').fadeOut(); // will first fade out the loading animation
	$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	// $('.layout').delay(350).css({'overflow':'visible'});
});



/////////////////
//Slick Slider //
/////////////////

$(document).ready(function(){
	$('.slider').slick({
		autoplay: true,
		autoplaySpeed: 2000
	});
});

