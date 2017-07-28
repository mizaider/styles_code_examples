<div class="main-menu">
  <?php
   $args = array(
    'theme_location' => 'side_top_menu',
    'container'   => false,
    'echo'        => true,
    'fallback_cb' => false,
    'items_wrap'  => '<ul>%3$s</ul>',
    'depth'       => 1,
   );

   wp_nav_menu( $args );
  ?>
</div><!-- /.main-menu -->
<a href="#" class="sidebar-make-order">Оформить заказ</a>