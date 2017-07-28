    <?php get_header(); ?>
    <div class="inner">
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div><!-- /.sidebar -->
      <div class="page-content typography">
        <?php if ( have_posts() ) : the_post(); ?>
        <h1 class="page-content__caption"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php endif; ?>
      </div><!-- /.page-content typography -->
    </div><!-- /.inner -->
  <?php get_footer(); ?>