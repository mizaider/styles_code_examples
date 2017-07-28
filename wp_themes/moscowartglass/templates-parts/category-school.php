    <?php get_header(); ?>
    <div class="inner">
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div><!-- /.sidebar -->
      <div class="school-list">
        <h1 class="school-list__caption"><?php echo get_cat_name( $cat ); ?></h1>
        <div class="category-desc typography">
          <?php echo category_description(); ?>
        </div><!-- /.category__desc typography -->
        <?php
         $args = array(
           'cat' => $cat,
           'posts_per_page' => -1
         );
         $q = new WP_Query( $args );
        ?>
        <?php if ( $q->have_posts() ) : ?>
        <?php while ( $q->have_posts() ) : $q->the_post(); ?>
        <div class="school-item">
          <div class="school__img"><img src="<?php $thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'school-thumb' ); echo $thumbnail_attributes[0]; ?>" alt="<?php the_title(); ?>"></div>
          <div class="school__content">
            <h2 class="school__title"><?php the_title(); ?></h2>
            <div class="school__desc"><?php the_content(); ?></div><!-- /.school__desc -->

            <div class="school__hr"></div>

            <dl class="school__dl">
              <dt class="school__dt">Преподаватель</dt>
              <dd class="school__dd"><?php the_field('prepod'); ?></dd>
            </dl><!-- /.school-dl -->

            <div class="school__dl">
              <dt class="school__dt">Когда проводится</dt>
              <dd class="school__dd"><?php the_field('kogda-provoditsa'); ?></dd>
            </div><!-- /.school__dl -->

            <div class="school__dl">
              <dt class="school__dt">Длительность</dt>
              <dd class="school__dd"><?php the_field('dlitelnost'); ?></dd>
            </div><!-- /.school__dl -->

            <a href="#" class="school__btn">Записаться</a>
          </div><!-- /.school__content -->
        </div><!-- /.school-item -->
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div><!-- /.school-list -->
    </div><!-- /.inner -->
  <?php get_footer(); ?>