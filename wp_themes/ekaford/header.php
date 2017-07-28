<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=1190">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <div class="layout">
    <div class="header-bg">
      <div class="inner">
        <div class="header">
          <div class="header__logo"><a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-logo.png" alt="" /></a></div><!-- /.header__logo -->
          <div class="header__legend">
            <h3>Интернет-магазин <br />автомобильных запчастей</h3>
          </div><!-- /.header__legend -->
          <div class="header-contacts">
            <h3 class="header-contacts__caption">Контакты</h3>
            <div class="header-contacts__phone">
              <a href="tel:+73432065715">+7 (343) 206-57-15</a>
              <a href="tel:+79920275715">+7 992 027-57-15</a>
            </div><!-- /.header-contacts__phone -->
            <div class="header-contacts__address">
              <p>г. Екатеринбург, <br >ул. Карьерная, 24, офис 6</p>
            </div><!-- /.header-contacts__address -->
          </div><!-- /.header-contacts -->
          <div class="header-work-time">
            <h3 class="header-work-time__caption">Режим работы</h3>
            <p>пн-пт 9:00 - 19:00 <br>сб 10:00 - 17:00 <br>вс выходной</p>
            <a href="#" class="header-work-time__make-call">Заказать звонок</a>
          </div><!-- /.header-work-time -->
          <div class="header-cart">
            <div class="header-cart__count">
              <div class="header-cart__count-sticker">
                <span class="header-cart__counter">2</span>
              </div><!-- /.header-cart__count-sticker -->
              <div class="header-cart__count-uppercase">
                <p>В корзине</p>
                <p>1 товар</p>
              </div><!-- /.header-cart__count-uppercase -->
            </div><!-- /.header-cart__count -->
            <div class="header-cart__total">
              <span>20 000</span><span>&nbsp;руб.</span>
            </div><!-- /.header-cart__total -->
            <a href="#" class="header-cart__checkout">Оформить заказ</a>
          </div><!-- /.header-cart -->
        </div><!-- /.header -->
      </div><!-- /.inner -->
    </div><!-- /.header -->