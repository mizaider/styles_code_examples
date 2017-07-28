<div class="cat-menu">
  <h3>Что вы конкретно ищете?</h3>
    <?php
     $args = array(
      'theme_location' => 'side_bottom_menu',
      'container'   => false,
      'echo'        => true,
      'fallback_cb' => false,
      'items_wrap'  => '<ul>%3$s</ul>',
      'depth'       => 1,
     );

     wp_nav_menu( $args );
    ?>
</div><!-- /.cat-menu -->