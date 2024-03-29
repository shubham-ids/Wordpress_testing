<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $woocommerce_loop;

$position = woodmart_get_opt( 'upsells_position' );

$related_product_view = woodmart_get_opt( 'related_product_view' );

if ( $upsells ) : ?>

	<?php if ( $position == 'sidebar' ): ?>
		
	<div class="upsells-widget">
		
		<h5 class="widget-title"><?php echo esc_html__( 'You may also like&hellip;', 'woocommerce' ); ?></h5>
		
		<?php woodmart_products_widget_template( $upsells, true ); ?>
		
	</div>
	
	<?php else: ?>
		
	<div class="upsells-carousel">
		
		<h3 class="title slider-title"><?php echo esc_html__( 'You may also like&hellip;', 'woocommerce' ); ?></h3>
		
		<?php 
		
			if ( $related_product_view == 'slider' ) {
				$slider_args = array(
					'slides_per_view' => ( woodmart_get_opt( 'related_product_columns' ) ) ? woodmart_get_opt( 'related_product_columns' ) : apply_filters( 'woodmart_cross_sells_products_per_view', 4 ),
					'hide_pagination_control' => false,
					'img_size' => 'shop_catalog'
				);

				echo woodmart_generate_posts_slider( $slider_args, false, $upsells );
			}elseif ( $related_product_view == 'grid' ) {
				
				$woocommerce_loop['is_shortcode'] = true;
				
				if ( WC()->version < '3.3.0' ){
					$woocommerce_loop['columns'] = woodmart_get_opt( 'related_product_columns' );
				}else{
					wc_set_loop_prop( 'columns', woodmart_get_opt( 'related_product_columns' ) );
				}
				
				$woocommerce_loop['products_view'] = 'grid';
				
				woocommerce_product_loop_start();

				foreach ( $upsells as $upsell ) {
					$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] = $post_object );

					wc_get_template_part( 'content', 'product' );
				}

				woocommerce_product_loop_end();

				woocommerce_reset_loop();
			}
			
		?>
		
	</div>
	
	<?php endif ?>

<?php endif;


wp_reset_postdata();
