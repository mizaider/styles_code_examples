  <?php get_header(); ?>
  <div class="layout">
    <div class="man"></div><!-- /.man -->
    <div class="promo"></div><!-- /.promo -->
    <div class="inner">
      <div class="middle-menu">
        <ul class="middle-menu-list">
          <li class="have-child-menu">
            <a href="#" class="have-child-menu__link">Сдать</a>
            <ul class="sub-menu">
              <li><a href="<?php echo get_page_link( 14 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/antikvariat.png" alt="" /><span>Антиквариат</span></a></li>
              <li><a href="<?php echo get_page_link( 16 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/mehovie.png" alt="" /><span>Меховые изделия</span></a></li>
              <li><a href="<?php echo get_page_link( 18 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chasi.png" alt="" /><span>Часы</span></a></li>
              <li><a href="<?php echo get_page_link( 20 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/stroi-instrument.png" alt="" /><span>Строй-инструмент</span></a></li>
              <li><a href="<?php echo get_page_link( 22 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nedvizhimost.png" alt="" /><span>Недвижимость</span></a></li>
              <li><a href="<?php echo get_page_link( 24 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/telefoni.png" alt="" /><span>Сотовые телефоны, планшеты</span></a></li>
              <li><a href="<?php echo get_page_link( 26 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/komputeri.png" alt="" /><span>Компьютеры</span></a></li>
              <li><a href="<?php echo get_page_link( 28 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/tv.png" alt="" /><span>TV, аудио, видео</span></a></li>
              <li><a href="<?php echo get_page_link( 30 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/torgovoe-oborydovanie.png" alt="" /><span>Торговое оборудование</span></a></li>
              <li><a href="<?php echo get_page_link( 32 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ofisnaya-tehnika.png" alt="" /><span>Офисная техника</span></a></li>
              <li><a href="<?php echo get_page_link( 34 ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bitovaya-tehnika.png" alt="" /><span>Бытовая техника</span></a></li>
            </ul><!-- /.sub-menu -->
          </li>
          <li class="have-child-menu">
            <a href="#" class="have-child-menu__link">Купить</a>
            <ul class="sub-menu">
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/antikvariat.png" alt="" /><span>Антиквариат</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/mehovie.png" alt="" /><span>Меховые изделия</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chasi.png" alt="" /><span>Часы</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/stroi-instrument.png" alt="" /><span>Строй-инструмент</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nedvizhimost.png" alt="" /><span>Недвижимость</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/telefoni.png" alt="" /><span>Сотовые телефоны, планшеты</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/komputeri.png" alt="" /><span>Компьютеры</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/tv.png" alt="" /><span>TV, аудио, видео</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/torgovoe-oborydovanie.png" alt="" /><span>Торговое оборудование</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ofisnaya-tehnika.png" alt="" /><span>Офисная техника</span></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bitovaya-tehnika.png" alt="" /><span>Бытовая техника</span></a></li>
            </ul><!-- /.sub-menu -->
          </li>
        </ul>
      </div><!-- /.middle-menu -->
    </div><!-- /.inner -->
    <div class="inner">
      <div class="girl"></div><!-- /.girl -->
      <?php get_sidebar(); ?>
    </div><!-- /.inner -->
    <div class="index-footer-map">
      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=uJDk0s3_2zvOMu2IDd2gQcB1TIWLpQMi&amp;width=100%25&amp;height=720&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
    </div><!-- /.index-footer-map -->
  </div><!-- /.layout -->
  <?php get_footer(); ?>