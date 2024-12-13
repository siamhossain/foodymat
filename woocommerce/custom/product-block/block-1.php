<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
use RadiusTheme\SB\Helpers\Fns;
use RT\Foodymat\Plugins\FoodymatWcFunctions;
global $product;
$product_id  = $product->get_id();
$categories = foodymat_option('wc_woo_cat') ? FoodymatWcFunctions::get_top_category_name() : false;


?>
<div class="rt-product-block rt-product-grid product">
	<div class="rt-product-thumb">
		<?php if ( foodymat_option( 'wc_shop_sale_flash' ) ) woocommerce_show_product_loop_sale_flash(); ?>
		<a href="<?php the_permalink();?>">
			<?php woocommerce_template_loop_product_thumbnail(); ?>
		</a>
		<?php do_action('foodymat_shop_layout_after_image'); ?>
		<?php do_action('foodymat_shop_layout_before_cart_button'); ?>
		<?php do_action('foodymat_shop_layout_after_cart_button'); ?>
		<div class="rt-shop-meta rtsb-action-buttons">
			<?php
				$module_data = [
					'wc_shop_quickview_icon' => foodymat_option( 'wc_shop_quickview_icon' ),
					'wc_shop_wishlist_icon'  => foodymat_option( 'wc_shop_wishlist_icon' ),
					'wc_shop_compare_icon'   => foodymat_option( 'wc_shop_compare_icon' ),
					'wc_shop_qcheckout_icon' => foodymat_option( 'wc_shop_qcheckout_icon' ),
				];
				do_action('rdtheme_after_actions_button', $product, $module_data);
			?>
		</div>
	</div>

	<div class="rt-content-area">
		<?php if ( foodymat_option('rt_woo_variation_attr') ) { ?>
			<?php do_action('rtwpvs_show_archive_variation'); ?>
		<?php } ?>

		<?php if ( $categories ) : ?>
			<div class="shop-cat">
				<?php echo $categories; ?>
			</div>
		<?php endif; ?>

		<h3 class="rt-shop-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

		<div class="rating-custom">
			<?php if( function_exists( 'rtsb' ) ){
				Fns::get_product_rating_html();
				$rating_count = $product->get_rating_count(); ?>
			<?php } else {
				wc_get_template( 'rating.php' );
			} ?>
		</div>

		<div class="rt-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 9, '...' ); ?></div>

		<?php if ( foodymat_option('wc_shop_rating') == 1 ) { ?>
			<div class="price-cart-wrap d-flex">
				<?php if ( $price_html = $product->get_price_html() ) { ?>
					<div class="rt-price price"><?php foodymat_html( $price_html, false ); ?></div>
				<?php } ?>

				<div class="add-to-cart-btn rt-button">
					<?php if ( foodymat_option('wc_woo_cart') ) FoodymatWcFunctions::print_add_to_cart_icon( $product_id, true, true ); ?>
				</div>
			</div>
		<?php } ?>
	</div>

</div>
