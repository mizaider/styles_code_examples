<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=1080">
  <link href="css-min/style.min.css" rel="stylesheet">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <div class="layout">
    <div class="inner">
      <div class="header">
        <div class="b-left">
          <div class="logo"><a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="" /></a></div><!-- /.logo -->
          <div class="address">
            <p>г. Екатеринбург,</p>
            <p>ул. Сони Морозовой, д. 180, оф. 100</p>
          </div><!-- /.address -->
        </div><!-- /.b-left -->
        <div class="b-right">
          <div class="contacts">
            <div class="phone"><a href="tel:+7 (343) 297-42-13"><span>+7 (343)</span> 297-42-13</a></div><!-- /.phone -->
            <div class="email"><a href="mailto:ooo_for_you@mail.ru">ooo_for_you@mail.ru</a></div><!-- /.email -->
          </div><!-- /.contacts -->
        </div><!-- /.b-right -->
        <div class="header-menu">
          <div class="header-menu__level-0">
            <?php
             $args = array(
              'theme_location' => 'top_menu_lvl_0',
              'container'   => false,
              'echo'        => true,
              'fallback_cb' => false,
              'items_wrap'  => '<ul>%3$s</ul>',
              'depth'       => 1,
             );

             wp_nav_menu( $args );
            ?>
          </div><!-- /.header-menu__level-0 -->
          <div class="header-menu__level-1">
            <?php
             $args = array(
              'theme_location' => 'top_menu_lvl_1',
              'container'   => false,
              'echo'        => true,
              'fallback_cb' => false,
              'items_wrap'  => '<ul>%3$s</ul>',
              'depth'       => 1,
             );

             wp_nav_menu( $args );
            ?>
          </div><!-- /.header-menu__level-1 -->
        </div><!-- /.header-menu -->
      </div><!-- /.header -->
      <div class="slider"></div><!-- /.slider -->