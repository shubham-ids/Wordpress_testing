<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( woodmart_is_woo_ajax() == 'fragments' ) {
	woodmart_woocommerce_main_loop( true );
	die();
}

if ( ! woodmart_is_woo_ajax() ) {
	get_header( 'shop' ); 
} else {
	woodmart_page_top_part();
}

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

do_action( 'woodmart_before_shop_page' );

/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action( 'woocommerce_archive_description' );

?>
		
<div class="shop-loop-head">
	<div class="woodmart-woo-breadcrumbs">
		<?php woocommerce_breadcrumb(); ?>
		<?php woocommerce_result_count(); ?>
	</div>
	<div class="woodmart-shop-tools">
		<?php
			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked wc_print_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );
		?>
	</div>
</div>
	
<?php if ( woodmart_get_opt( 'shop_filters' ) ) : ?>
	<div class="filters-area">
		<div class="filters-inner-area row">
			<?php 

				do_action( 'woodmart_before_filters_widgets' );

				dynamic_sidebar( 'filters-area' ); 

				do_action( 'woodmart_after_filters_widgets' );

			?>
		</div><!-- .filters-inner-area -->
	</div><!-- .filters-area -->
<?php endif; ?>

<div class="woodmart-active-filters">
	<?php the_widget( 'WC_Widget_Layered_Nav_Filters', array(), array() ); ?>
</div>

<div class="woodmart-shop-loader"></div>

<?php 

do_action( 'woodmart_woocommerce_main_loop' );

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );


if ( ! woodmart_is_woo_ajax() ) {
	get_footer( 'shop' ); 
} else {
	woodmart_page_bottom_part();
}

