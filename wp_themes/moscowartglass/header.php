<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=1200">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png?v=1">
  <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png?v=1" sizes="32x32">
  <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png?v=1" sizes="16x16">
  <link rel="manifest" href="/favicons/manifest.json?v=1">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=1" color="#5bbad5">
  <link rel="shortcut icon" href="/favicons/favicon.ico?v=1">
  <meta name="apple-mobile-web-app-title" content="Moscow Art Glass">
  <meta name="application-name" content="Moscow Art Glass">
  <meta name="msapplication-config" content="/favicons/browserconfig.xml?v=1">
  <meta name="theme-color" content="#ffffff">
</head>
<body>
  <div class="layout">
    <div class="inner">
      <div class="header">
        <div class="header__b-left">
          <div class="header__contacts">
            <p>тел.: <a href="tel:+79772501177">+7 977 250 11 77</a></p>
            <p>e-mail: <a href="mailto:zakaz@moscowartglass.com">zakaz@moscowartglass.com</a></p>
            <p>адрес: ВДНХ, павильон 47</p>
            <div class="header__social">
              <ul class="soc-list">
                <li class="soc-sprite soc-sprite-fb"><a href="#"></a></li>
                <li class="soc-sprite soc-sprite-vk"><a href="#"></a></li>
                <li class="soc-sprite soc-sprite-inst"><a href="#"></a></li>
                <li class="soc-sprite soc-sprite-yt"><a href="#"></a></li>
              </ul><!-- /.soc-list -->
            </div><!-- /.header__social -->
          </div><!-- /.header__contacts -->
        </div><!-- /.header__b-left -->
        <div class="header__b-center"><a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="«Moscow Art Glass»"></a></div>
        <div class="header__b-right">
          <div class="header__legend">
            <p>Изготовление и продажа изделий из стекла. Уникальные украшения и предметы декора. Дизайн и оформление интерьеров квартир, загородных резиденций, отелей и ресторанов. Парковая скульптура и арт-объекты. Выставки и фестивали. Школа стекла.</p>
          </div><!-- /.header__legend -->
        </div><!-- /.header__b-right -->
        <div class="header__hr"></div>
        <div class="header__menu">
          <ul>
            <li><a href="<?php echo get_page_link( 2 ) ?>"><i></i><span>Студия</span></a></li>
            <li><a href="<?php // echo get_term_link( 19 , 'product_cat' ); ?>"><i></i><span>Украшения</span></a></li>
            <li><a href="<?php // echo get_term_link( 20 , 'product_cat' ); ?>"><i></i><span>Декор</span></a></li>
            <li><a href="<?php // echo get_page_link( 227 ) ?>"><i></i><span>Интерьеры</span></a></li>
            <li><a href="<?php echo get_category_link( 13 ) ?>"><i></i><span>Школа</span></a></li>
            <li><a href="<?php echo get_category_link( 2 ) ?>"><i></i><span>Блог</span></a></li>
          </ul>
        </div><!-- /.header__menu -->
      </div><!-- /.header -->
    </div><!-- /.inner -->