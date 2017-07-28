    <div class="inner inner_b-content">
      <div class="b-content">
        <div class="page-content typography">
          <?php if ( have_posts() ) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div><!-- /.page-content typography -->
        <?php if ( comments_open() || get_comments_number() ) {
            comments_template();
          } ?>
        <?php endif; ?>
      </div><!-- /.b-content -->
    </div><!-- /.inner inner_b-content -->