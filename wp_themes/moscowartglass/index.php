    <?php get_header(); ?>
    <div class="slider" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/slider.jpg);"></div><!-- /.slider -->
    <div class="inner">
      <div class="main-cat-caption">
        <h2>Украшения</h2>
        <div class="main-cat-caption__hr"></div>
      </div><!-- /.main-cat-caption -->
      <div class="main-cat-children-list">
        <?php
         $args = array(
          'theme_location' => 'index_top_wc_menu',
          'container'   => false,
          'echo'        => true,
          'fallback_cb' => false,
          'link_before' => '<h3><p>',
          'link_after'  => '</p></h3>',
          'items_wrap'  => '<ul>%3$s</ul>',
          'depth'       => 1,
          'walker'      => new WooCommerce_Menu_for_index_page_Walker_Nav_Menu()
         );

         wp_nav_menu( $args );
        ?>
      </div><!-- /.main-cat-children-list -->
      <a href="#" class="main-cat-link">Перейти в раздел</a>
    </div><!-- /.inner -->
    <div class="b-wide" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/b-wide-1.jpg);">
      <div class="b-wide__overlay"></div>
      <div class="inner inner_b-wide">
        <h4 class="b-wide__caption">Интерьеры заголовок</h4>
        <p class="b-wide__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, maiores, officia? Id impedit sint, delectus assumenda consequuntur praesentium labore similique minima.</p>
        <a href="#" class="b-wide__link">Сделать заказ</a>
      </div><!-- /.inner inner_b-wide -->
    </div><!-- /.b-wide -->
    <div class="inner">
      <div class="main-cat-caption">
        <h2>Декор</h2>
        <div class="main-cat-caption__hr"></div>
      </div><!-- /.main-cat-caption -->
      <div class="main-cat-children-list">
        <?php
         $args = array(
          'theme_location' => 'index_bottom_wc_menu',
          'container'   => false,
          'echo'        => true,
          'fallback_cb' => false,
          'link_before' => '<h3><p>',
          'link_after'  => '</p></h3>',
          'items_wrap'  => '<ul>%3$s</ul>',
          'depth'       => 1,
          'walker'      => new WooCommerce_Menu_for_index_page_Walker_Nav_Menu()
         );

         wp_nav_menu( $args );
        ?>
      </div><!-- /.main-cat-children-list -->
      <a href="#" class="main-cat-link">Перейти в раздел</a>
      <div class="main-cat-caption">
        <h2>Блог</h2>
        <div class="main-cat-caption__hr"></div>
      </div><!-- /.main-cat-caption -->
      <div class="main-blog-list">
        <?php
         $args = array(
           'cat' => 2,
           'posts_per_page' => 3
         );
         $q = new WP_Query( $args );
        ?>
        <?php if ( $q->have_posts() ) : ?>
        <?php while ( $q->have_posts() ) : $q->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="blog-item">
          <h3 class="blog-item__caption"><p><?php the_title(); ?></p></h3>
          <div class="blog-item__date"><?php the_time('F j, Y'); ?></div>
          <img src="<?php $thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-thumb' ); echo $thumbnail_attributes[0]; ?>" alt="<?php the_title(); ?>">
          <div class="blog-item__desc">
            <?php the_excerpt(); ?>
          </div>
        </a><!-- /.blog-item -->
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div><!-- /.main-blog-list -->
      <a href="<?php echo get_category_link( 2 ) ?>" class="main-cat-link">Читать все статьи</a>
    </div><!-- /.inner -->
    <div class="b-wide" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/b-wide-2.jpg);">
      <div class="b-wide__overlay"></div>
      <div class="inner inner_b-wide">
        <h4 class="b-wide__caption">Школа заголовок</h4>
        <p class="b-wide__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, maiores, officia? Id impedit sint, delectus assumenda consequuntur praesentium labore similique minima.</p>
        <a href="#" class="b-wide__link">Смотреть расписание</a>
      </div><!-- /.inner inner_b-wide -->
    </div><!-- /.b-wide -->
  <?php get_footer(); ?>