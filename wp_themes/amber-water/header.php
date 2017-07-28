<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=1220">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <div class="layout">
    <div class="header">
      <div class="header__menu">
        <div class="inner">
          <?php
           $args = array(
            'theme_location' => 'top_menu',
            'container'   => false,
            'echo'        => true,
            'fallback_cb' => false,
            'items_wrap'  => '<ul>%3$s</ul>',
            'depth'       => 2,
           );

           wp_nav_menu( $args );
          ?>
        </div><!-- /.inner -->
      </div><!-- /.header__menu -->
      <div class="inner">
        <div class="header__links">
          <a href="/" class="header__logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-logo.png" alt="" /></a>
          <a href="tel:+73432066633" class="header__phone">+7 (343) 206 66 33</a>
          <div class="header__rasp">
            <p>Режим работы пн-пт: 8:00 – 22:00</p>
          </div><!-- /.header__rasp -->
        </div><!-- /.header__links -->
        <div class="header__slogan">
          <p>Питьевая артезианская вода высшей категории</p>
        </div><!-- /.header__slogan -->
      </div><!-- /.inner -->
    </div><!-- /.header -->