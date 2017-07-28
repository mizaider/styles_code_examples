    <?php get_header(); ?>
    <div class="inner">
      <div class="main-cat-caption">
        <h1><?php echo get_cat_name( $cat ); ?></h1>
        <div class="main-cat-caption__hr"></div>
      </div><!-- /.main-cat-caption -->
      <div class="main-blog-list">
        <?php
         $args = array(
           'cat' => $cat,
           'posts_per_page' => -1
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
    </div><!-- /.inner -->
  <?php get_footer(); ?>