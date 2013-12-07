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



<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product-gallery"></div>
	<div class="product-description Gothic720BT-RomanB">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<?php woocommerce_template_single_price(); ?>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->

