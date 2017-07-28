////////////////////
// Magnific Popup //
////////////////////

jQuery(document).ready(function( $ ) {

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
});