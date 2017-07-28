//==================================================
// Accordion Sidebar Menu
//==================================================

jQuery(document).ready(function($) {
  jQuery(function( $ ) {
    jQuery( ".menu-item-has-children" ).has( "a" ).accordion({
      event: "hoverintent",
      collapsible: true,
      active: false,
      heightStyle: "content"
    });
  });

  /*
   * hoverIntent | Copyright 2011 Brian Cherne
   * http://cherne.net/brian/resources/jquery.hoverIntent.html
   * modified by the jQuery UI team
   */
  $.event.special.hoverintent = {
    setup: function() {
      $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = $( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;

      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };

      function clear() {
        target
          .unbind( "mousemove", track )
          .unbind( "mouseout", clear );
        clearTimeout( timeout );
      }

      function handler() {
        var prop,
          orig = event;

        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();

          event = $.Event( "hoverintent" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;

          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }

      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };
});



//==================================================
// Magnific Popup
//==================================================

jQuery(document).ready(function( $ ) {

  /**
   * Gallery
   */

  jQuery('.gallery').magnificPopup({
    tClose: 'Закрыть (Esc)',
    tLoading: 'Загрузка...',
    delegate: 'a',
    type: 'image',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    gallery: {
      tPrev: 'Назад (Стрелочка влево)',
      tNext: 'Вперёд (Стрелочка вправо)',
      tCounter: '%curr% из %total%',
      enabled: true,
      preload: [1,3],
      navigateByImgClick: true,
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

  jQuery('.popup-with-move-anim').magnificPopup({
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