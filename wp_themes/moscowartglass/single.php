    <?php get_header(); ?>
    <div class="inner">
      <div class="blog-content typography">
        <?php if ( have_posts() ) : the_post(); ?>
        <img src="<?php $thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-content-thumb' ); echo $thumbnail_attributes[0]; ?>" alt="<?php the_title(); ?>" class="blog-content__thumb">
        <h1 class="blog-content__caption"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php endif; ?>
      </div><!-- /.blog-content typography -->
      <div class="main-cat-caption">
        <h2>Смотрите также</h2>
        <div class="main-cat-caption__hr"></div>
      </div><!-- /.main-cat-caption -->
      <div class="main-blog-list">
        <?php
         $getcat = get_the_category();
         $cat = $getcat[0]->cat_ID;
         $args = array(
           'cat' => $cat,
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
  <?php get_footer(); ?>