      <div class="news">
        <h1 class="caption">Новости</h1>
        <?php
          $args = array(
            'cat' => 7,
            'posts_per_page' => 6
          );
          $q = new WP_Query( $args );
        ?>
        <?php if ( $q->have_posts() ) : ?>
        <?php while ( $q->have_posts() ) : $q->the_post(); ?>
        <div class="news__item">
          <h3 class="title"><?php the_title(); ?></h3><!-- /.title -->
          <div class="desc">
            <?php the_excerpt(); ?>
          </div><!-- /.desc -->
          <div class="read-more"><a href="<?php the_permalink(); ?>">Подробнее</a></div><!-- /.read-more -->
        </div><!-- /.news__item -->
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div><!-- /.news -->