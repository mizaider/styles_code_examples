jQuery(document).ready(function($) {

  //==================================================
  // Настройки слайдера
  //==================================================

  if ( $('.swiper-container').length ) {
    var mySwiper = new Swiper ('.swiper-container_promo', {
      // Optional parameters
      loop: true,
      autoplay: 5000,
      grabCursor: true,

      // Navigation arrows
      nextButton: '.index-slider-button-next_promo',
      prevButton: '.index-slider-button-prev_promo',
    });

    var mySwiper = new Swiper ('.swiper-container_hit', {
      // Optional parameters
      loop: true,
      autoplay: 5000,
      grabCursor: true,

      // Navigation arrows
      nextButton: '.index-slider-button-next_hit',
      prevButton: '.index-slider-button-prev_hit',
    });
  }



  //==================================================
  // Кнопка `Показать ещё` в списке товаров
  //==================================================

  $('#my-wc-load-more').click(function(){
    $(this).text('Загружаю...');
    var data = {
      'action': 'loadmore',
      'query': true_posts,
      'page' : current_page
    };
    $.ajax({
      url:ajaxurl, // обработчик
      data:data, // данные
      type:'POST', // тип запроса
      success:function(data){
        if( data ) {
          $('#my-wc-load-more').text('Показать ещё').before(data); // вставляем новые посты
          current_page++; // увеличиваем номер страницы на единицу
          if (current_page == max_pages) $('#my-wc-load-more').remove(); // если последняя страница, удаляем кнопку
        } else {
          $('#my-wc-load-more').remove(); // если мы дошли до последней страницы постов, скроем кнопку
        }
      }
    });
  });



  //==================================================
  // UI-Kit
  //==================================================

  /**
   * Select
   */

  // Сначала проверим подключена ли jQuery библиотека к страице,
  // иначе, без проверки этот код сломает нам весь остальной JS код
  if ( jQuery().niceSelect ) {
    $('select').niceSelect();
  }



  //==================================================
  // Dropdown Menu
  //==================================================

  var $dropdownCheckbox = $('.header-menu-dropdown-btn>input:checkbox');
  var $dropdownMenu = $('.header-dropdown-menu');

  $dropdownCheckbox.on('change', function() {
    if ($dropdownCheckbox.is(':checked')) {
      $dropdownMenu.fadeIn();
    } else {
      $dropdownMenu.fadeOut();
    }
  });



  //==================================================
  // Magnific Popup
  //==================================================

  /**
   * Pop-up dialogs
   */

  if ( jQuery().magnificPopup ) {
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
  }



  //==================================================
  // Contact Form 7
  //==================================================

  /**
   * Переадресация на страницы `Thank you page`
   */

  var wpcf7ElmModalFeedback = document.querySelector( '.modal-feedback' );
  var wpcf7ElmModalRequestBackCall = document.querySelector( '.modal-request-back-call' );

  wpcf7ElmModalFeedback.addEventListener( 'wpcf7mailsent', function( event ) {
      location = '/?p=301';
  }, false );

  wpcf7ElmModalRequestBackCall.addEventListener( 'wpcf7mailsent', function( event ) {
      location = '/?p=304';
  }, false );



  //==================================================
  // VIN form
  //==================================================

  $('.vin-cnt-vash-zapros__clone').clone().removeClass('vin-cnt-vash-zapros__clone').addClass('vin-cnt-vash-zapros').appendTo('.vin-cnt__hr-zapros-hook');
  $('.vin-cnt-vash-zapros__clone').remove();

  $('.vin-cnt-vash-zapros__add-button').on('click', function(){
    if ($('.vin-cnt-vash-zapros__input').val()) {
      $('.vin-cnt-vash-zapros__list').append('<li class="vin-cnt-vash-zapros__item">' + $('.vin-cnt-vash-zapros__input').val() + '<a class="vin-cnt-vash-zapros__delete">&#10005;</a></li>');
      $('.vin-cnt-vash-zapros__input').val('');

      $('.vin-cnt-vash-zapros__delete').on('click', function() {
        $(this).parent().remove();
      });
    }
  });

  $('.vin-cnt-vash-zapros__submit').on('click', function() {
    $('.vin-cnt-vash-zapros__textarea').val($('.vin-cnt-vash-zapros__list > li').clone().append('\n').text().replace(/✕/g, ''));
    $('.vin-cnt-vash-zapros__list > li').remove();
  });

  /**
   * Валидация
   */

   //== VIN номер

   $('input[name="wpcf7-vin"]').inputmask({
     mask: "*{0,17}",
     greedy: false,
     definitions: {
       '*': {
         validator: "[0-9A-Za-z]",
         cardinality: 1,
         casing: "upper"
       }
     }
   });



  //==================================================
  // Cookie compliance
  //==================================================

  $('.cookie-compliance .cookie-compliance__btn').on('click', function() {
    $.cookie('cookie-compliance', 'yes', { expires: 30, path: '/' });
    $('.cookie-compliance').css('display', 'none');
  });

  if ($.cookie('cookie-compliance') == null) {
    $('.cookie-compliance').css('display', 'block');
  }



  //==================================================
  // Клеим политику конфиденциальности к ФОС-ам
  //==================================================

  $('<div class="contacts-privacy-policy">Отправляя Ваши данные через эту форму Вы соглашаетесь с нашей&nbsp;<a href="/politika-konfidentsialnosti/" target="_blank" rel="noopener">политикой конфиденциальности</a>.</div>').insertBefore('.wpcf7-form-control.wpcf7-submit');

});
