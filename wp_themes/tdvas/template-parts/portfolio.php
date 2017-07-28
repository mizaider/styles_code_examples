<?php
/*
Template Name: Для портфолио
*/
?>
      <?php get_header(); ?>
      <div class="content-wrapper">
        <div class="portfolio-menu-sidebar">
          <?php get_sidebar( 'portfolio-menu' ); ?>
        </div><!-- /.portfolio-menu-sidebar -->
        <div class="content content_portfolio content_align-right typography">
          <?php if ( have_posts() ) : the_post(); ?>
          <div class="content__title">
            <h1><?php the_title(); ?></h1>
          </div><!-- /.content__title -->
          <?php the_content(); ?>
          <?php endif; ?>
        </div><!-- /.content content_portfolio content_align-right typography -->
      </div><!-- /.content-wrapper -->
    <?php get_footer(); ?>