<?php
 $args = array(
  'theme_location' => 'left_menu_portfolio',
  'container'   => false,
  'echo'        => true,
  'fallback_cb' => false,
  'items_wrap'  => '<ul>%3$s</ul>',
  'depth'       => 1,
 );

 wp_nav_menu( $args );
?>