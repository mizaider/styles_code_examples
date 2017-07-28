<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<div class="shop-item__price-buy">
    <?php
      /**
       * woocommerce_after_shop_loop_item hook.
       *
       * @hooked woocommerce_template_loop_product_link_close - 5
       * @hooked woocommerce_template_loop_add_to_cart - 10
       */
      do_action( 'woocommerce_after_shop_loop_item' );
     ?>
    <span><?php echo $price_html; ?></span>
  </div><!-- /.shop-item-price-buy -->
<?php endif; ?>
