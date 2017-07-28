  <?php get_header(); ?>
  <div class="layout">
    <div class="inner">
      <div class="post-content typography">
        <?php if ( have_posts() ) : the_post(); ?>
        <h1 class="content-caption"><?php the_title(); ?></h1>
        <div class="content"><?php the_content(); ?></div><!-- /.content -->
        <?php endif; ?>
      </div><!-- /.post-content typography -->
      <?php get_sidebar(); ?>
    </div><!-- /.inner -->
  </div><!-- /.layout -->
  <?php get_footer(); ?>