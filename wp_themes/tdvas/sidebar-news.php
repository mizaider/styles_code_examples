<h3 class="news-sidebar__caption">Новости</h3>
<?php
 $args = array(
   'cat' => 2,
   'posts_per_page' => -1
 );
 $q = new WP_Query( $args );
?>
<?php if ( $q->have_posts() ) : ?>
<?php while ( $q->have_posts() ) : $q->the_post(); ?>
<div class="news-sidebar-item">
  <h4 class="news-sidebar-item__title"><?php the_title(); ?></h4>
  <div class="news-sidebar-item__desc">
    <?php the_excerpt(); ?>
  </div><!-- /.news-sidebar-item__desc -->
  <div class="news-sidebar-item__extra">
    <div class="news-sidebar-item__data"><?php the_time('j F Y'); ?></div>
    <div class="news-sidebar-item__read-more"><a href="<?php the_permalink(); ?>">Читать далее</a></div>
  </div><!-- /.news-sidebar-item__extra -->
</div><!-- /.news-sidebar-item -->
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>