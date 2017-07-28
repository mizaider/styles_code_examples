    <?php get_header(); ?>
    <div class="index-content">
      <div class="inner">
        <div class="b-left">
          <?php get_sidebar( 'top-left' ); ?>
        </div><!-- /.b-left -->
        <div class="b-right">
          <div class="index-content-slider">
            <div class="swiper-container">
              <?php
                $args = array(
                  'theme_location' => 'slider_menu',
                  'container'      => false,
                  'echo'           => true,
                  'fallback_cb'    => false,
                  'menu_class'     => 'swiper-wrapper',
                  'link_before'    => '<h3>',
                  'link_after'     => '</h3>',
                  'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                  'depth'          => 1,
                  'walker'         => new WooCommerce_Menu_for_index_slider_menu_Walker_Nav_Menu()
                );

                wp_nav_menu( $args );
              ?>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div><!-- /.swiper-container -->
          </div><!-- /.index-content-slider -->
          <div class="index-content-search">
            <form action="">
              <input type="text" name="" id="" placeholder="Поиск товара по сайту">
              <input type="submit" value="Найти">
            </form>
          </div><!-- /.index-content-search -->
        </div><!-- /.b-right -->
        <div class="index-post-content typography">
          <?php
            $page_id = 44;
            $page_data = get_post( $page_id );

            echo apply_filters( 'the_content' , $page_data->post_content );
           ?>
        </div><!-- /.index-post-content typography -->
        <div class="index-request-banner">
          <div class="b-left">
            <div class="index-request-banner__text-block">
              <p>Не нашли нужную деталь?</p>
              <p>Опишите её и мы найдём её для вас!</p>
            </div><!-- /.index-request-banner__text-block -->
          </div><!-- /.b-left -->
          <div class="b-right">
            <a href="#" class="index-request-banner__link">Оставить заявку</a>
          </div><!-- /.b-right -->
        </div><!-- /.index-request-banner -->
      </div><!-- /.inner -->
    </div><!-- /.index-content -->
  <?php get_footer(); ?>