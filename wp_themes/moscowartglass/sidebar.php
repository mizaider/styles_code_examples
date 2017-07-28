<h3>Меню</h3>
<?php
 $args = array(
  'theme_location' => 'side_menu',
  'container'   => false,
  'echo'        => true,
  'fallback_cb' => false,
  'link_before' => '<p>',
  'link_after'  => '</p>',
  'items_wrap'  => '<ul>%3$s</ul>',
  'depth'       => 3,
 );

 wp_nav_menu( $args );
?>