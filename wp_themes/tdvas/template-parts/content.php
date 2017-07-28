      <?php get_header(); ?>
      <div class="content-wrapper">
        <div class="content content_align-left typography">
          <?php if ( have_posts() ) : the_post(); ?>
          <div class="content__title">
            <h1><?php the_title(); ?></h1>
          </div><!-- /.content__title -->
          <?php the_content(); ?>
          <?php endif; ?>
        </div><!-- /.content content_align-left typography -->
        <div class="news-sidebar">
          <?php get_sidebar( 'news' ); ?>
        </div><!-- /.news-sidebar -->
      </div><!-- /.content-wrapper -->
    <?php get_footer(); ?>