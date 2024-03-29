<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $cross_sells ) : ?>

	<div class="cross-sells">

		<h3 class="title slider-title"><?php esc_html_e( 'You may be interested in&hellip;', 'woocommerce' ) ?></h3>
		
		<?php 

			$slider_args = array(
				'slides_per_view' => apply_filters( 'woodmart_cross_sells_products_per_view', 4 ),
				'hide_pagination_control' => true,
				'hide_prev_next_buttons' => true,
				'carousel_js_inline' => 'yes',
				'img_size' => 'shop_catalog'
			);
			
			echo woodmart_generate_posts_slider( $slider_args, false, $cross_sells );
			
		?>

	</div>

<?php endif;

wp_reset_postdata();