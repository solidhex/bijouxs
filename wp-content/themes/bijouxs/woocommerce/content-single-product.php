<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product-gallery"></div>
	<div class="product-description Gothic720BT-RomanB">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<?php woocommerce_template_single_price(); ?>
		<?php woocommerce_simple_add_to_cart(); ?>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->

