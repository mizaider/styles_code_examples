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

<?php // if ( $price_html = $product->get_price_html() ) : ?>
	<!-- <span class="price"><?php // echo $price_html; ?></span> -->
<?php // endif; ?>

<?php
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price = get_post_meta( get_the_ID(), '_regular_price', true);
// $sale = get_post_meta( get_the_ID(), '_sale_price', true);
?>

<?php // if($sale) : ?>
<!-- <p class="product-price-tickr"><del><?php // echo $currency; echo $price; ?></del> <?php // echo $currency; echo $sale; ?></p>     -->
<?php if($price) : ?>
<span class="price"><?php echo $price; ?>&nbsp;<span>руб.</span></span>
<?php endif; ?>