//==================================================
// Materialize
//==================================================

$('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'right', // Choose the horizontal origin
    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true // Choose whether you can drag to open on touch screens
  }
);

$(document).ready(function(){
  $('.materialboxed').materialbox();
});

$('.modal').modal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: .5, // Opacity of modal background
    inDuration: 300, // Transition in duration
    outDuration: 200, // Transition out duration
    startingTop: '4%', // Starting top style attribute
    endingTop: '10%', // Ending top style attribute
    // ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
    //   alert("Ready");
    //   console.log(modal, trigger);
    // },
    // complete: function() { alert('Closed'); } // Callback for Modal close
  }
);



//==================================================
// Swiper
//==================================================

$(document).ready(function () {
  var mySwiper = new Swiper ('.swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 3,
    spaceBetween: 30,
    grabCursor: true,
    scrollbar: '.swiper-scrollbar',
    scrollbarHide: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    mousewheelControl: true,
    breakpoints: {
        993: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        601: {
            slidesPerView: 1,
            spaceBetween: 10
        }
    }
  })
});