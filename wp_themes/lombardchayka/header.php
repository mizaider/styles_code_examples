<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=1080">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <?php my_layout_change_from_type(); ?>
    <div class="inner">
      <div class="header">
        <div class="header-info">
          <div class="logo">
            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="" /></a>
          </div><!-- /.logo -->
          <div class="site-desc">
            <p>ООО «Ломбард берём всё»</p>
          </div><!-- /.site-desc -->
          <div class="phone">
            <a href="tel:+73433618480">+7 (343) 361 84 80</a>
          </div><!-- /.phone -->
          <div class="back-call">
            <a href="#">заказать звонок</a>
          </div><!-- /.back-call -->
          <div class="pay-debt">
            <a href="#">оплатить задолженность онлайн</a>
          </div><!-- /.pay-debt -->
        </div><!-- /.header-info -->
        <div class="header-menu">
          <ul>
            <li><a href="<?php echo get_page_link( 14 ) ?>">Сдать</a></li>
            <li><a href="/shop">Купить</a></li>
            <li><a href="<?php echo get_page_link( 36 ) ?>">Акции</a></li>
            <li><a href="<?php echo get_page_link( 38 ) ?>">О нас</a></li>
            <li><a href="<?php echo get_page_link( 40 ) ?>">Онлайн оценка</a></li>
            <li><a href="<?php echo get_page_link( 42 ) ?>">Контакты</a></li>
          </ul>
        </div><!-- /.header-menu -->
      </div><!-- /.header -->
      <div class="header-slogan">
        <p>Срочно нужны деньги?</p>
        <p>Берём всё!</p>
        <p><?php my_page_slogan_change(); ?></p>
        <div class="header-slogan-add">
          <span>Ставки от 0,2%</span>
          <span>Золото до 5 000 руб.</span>
        </div><!-- /.header-slogan-add -->
      </div><!-- /.header-slogan -->
      <div class="header-form">
        <h3 class="header-form__caption">Оставьте заявку<br /> на <span>бесплатную</span> оценку</h3>
        <form class="wpcf7-form">
          <input type="text" name="name" placeholder="Ваше имя" required>
          <input type="tel" name="tel" placeholder="Ваш телефон" required>
          <input type="submit" value="Оставить заявку">
        </form>
      </div><!-- /.header-form -->
    </div><!-- /.inner -->
  </div><!-- /.layout -->