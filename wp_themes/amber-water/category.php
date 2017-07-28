    <?php get_header(); ?>
    <div class="inner inner_b-content">
      <div class="b-content">
        <div class="category-content">
          <!-- Всплывающее окно "Заказать" -->
          <div id="checkout-dialog" class="checkout-dialog-form zoom-anim-dialog mfp-hide">
            <form class="wpcf7-form">
              <input type="text" name="your-name" placeholder="Имя" required>
              <input type="tel" name="tel" placeholder="Ваш телефон" required>
              <input type="email" name="email" placeholder="E-mail" required>
              <textarea name="your-message" placeholder="…" required></textarea>
              <input type="submit" value="Заказать">
            </form>
          </div>
          <!-- /Всплывающее окно "Заказать" -->
          <div class="b-left">
            <div class="left-menu">
              <?php
               $args = array(
                'theme_location' => 'left_menu',
                'container'   => false,
                'echo'        => true,
                'fallback_cb' => false,
                'items_wrap'  => '<ul>%3$s</ul>',
                'depth'       => 2,
               );

               wp_nav_menu( $args );
              ?>
            </div><!-- /.left-menu -->
          </div><!-- /.b-left -->
          <div class="b-right">
            <div class="slider">
              <?php echo do_shortcode("[metaslider id=156]"); ?>
            </div><!-- /.slider -->
            <div class="product-list">
              <?php
               $args = array(
                 'cat' => $cat,
                 'posts_per_page' => -1
               );
               $q = new WP_Query( $args );
              ?>
              <?php if ( $q->have_posts() ) : ?>
              <?php while ( $q->have_posts() ) : $q->the_post(); ?>
              <div class="product-item">
                <div class="product-item__img-and-price">
                  <img src="<?php $thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'cat-item-thumb' ); echo $thumbnail_attributes[0]; ?>" alt="<?php the_title(); ?>" class="product-item__img" />
                  <div class="product-item__price">—</div>
                </div><!-- /.product-item__img-and-price -->
                <h3 class="product-item__title"><?php the_title(); ?></h3>
                <div class="product-item__desc"><?php the_excerpt(); ?></div>
                <a href="#checkout-dialog" class="product-item__link popup-with-move-anim">Заказать</a>
              </div><!-- /.product-item -->
              <?php endwhile; ?>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
            </div><!-- /.product-list -->
          </div><!-- /.b-right -->
          <div class="advantage">
            <div class="advantage__item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/advantage-ico-a.png" alt="" />
              <span>Высочайшее качество питьевой воды</span>
            </div><!-- /.advantage__item -->
            <div class="advantage__item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/advantage-ico-b.png" alt="" />
              <span>Доставка заказа в день заявки</span>
            </div><!-- /.advantage__item -->
            <div class="advantage__item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/advantage-ico-c.png" alt="" />
              <span>Бесплатное оборудование</span>
            </div><!-- /.advantage__item -->
            <div class="advantage__item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/advantage-ico-d.png" alt="" />
              <span>Специальные предложения для корпоративных клиентов</span>
            </div><!-- /.advantage__item -->
          </div><!-- /.advantage -->
        </div><!-- /.category-content -->
      </div><!-- /.b-content -->
    </div><!-- /.inner inner_b-content -->
  <?php get_footer(); ?>