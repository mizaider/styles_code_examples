    <div class="post-content">
      <div class="inner">
        <div class="b-left">
          <?php get_sidebar( 'top-left' ); ?>
          <?php get_sidebar( 'bottom-left' ); ?>
        </div><!-- /.b-left -->
        <div class="b-right">
          <?php if ( have_posts() ) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <div class="post-cnt typography">
            <?php the_content(); ?>
          </div><!-- /.post-cnt typography -->
          <?php endif; ?>
        </div><!-- /.b-right -->
      </div><!-- /.inner -->
    </div><!-- /.post-content -->