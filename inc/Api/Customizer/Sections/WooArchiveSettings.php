<?php
namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RTFramework\Customize;
/**
 * Customizer class
 */
class WooArchiveSettings extends Customizer {
	protected $section_wooarchive_settins = 'foodymat_woo_archive_settings';
	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_wooarchive_settins,
			'title'       => __( 'Woocommerce Settings', 'foodymat' ),
			'description' => __( 'foodymat Woocommerce Archive Settings', 'foodymat' ),
			'priority'    => 1,
			'panel' => 'woocommerce',
		] );

		Customize::add_controls( $this->section_wooarchive_settins, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'foodymat_service_controls', [

			'rt_woo_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Woocommerce Archive Option', 'foodymat' ),
			],

			'products_cols_width' => [
				'type'    => 'number',
				'label'   => __( 'Products Per Column', 'foodymat' ),
				'description' => __('Use product per col default 4', 'foodymat'),
				'default' => '4',
			],

			'products_per_page' => [
				'type'    => 'number',
				'label'   => __( 'Number of items per page', 'foodymat' ),
				'description' => __( 'Effect only for Shop custom page template', 'foodymat' ),
				'default' => '12',
			],

			'wc_woo_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category', 'foodymat' ),
				'default' => 1
			],

			'wc_woo_cart' => [
				'type'    => 'switch',
				'label'   => __( 'Cart', 'foodymat' ),
				'default' => 0
			],

			'wc_shop_quickview_icon' => [
				'type'    => 'switch',
				'label'   => __( 'QuickView', 'foodymat' ),
				'default' => 0
			],

			'wc_shop_compare_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Compare', 'foodymat' ),
				'default' => 0
			],

			'wc_shop_wishlist_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Wishlist', 'foodymat' ),
				'default' => 0
			],

			'wc_shop_qcheckout_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Quick Checkout', 'foodymat' ),
				'default' => 0
			],

			'wc_shop_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating', 'foodymat' ),
				'default' => 1
			],

			'rt_woo_variation_attr' => [
				'type'    => 'switch',
				'label'   => __( 'Variation Attribute', 'foodymat' ),
				'default' => 0
			],

			'wc_shop_sale_flash' => [
				'type'    => 'switch',
				'label'   => __( 'Sale Flash', 'foodymat' ),
				'default' => 1
			],

			'wc_sale_label' => [
				'type'    => 'select',
				'default' => 'text',
				'label'   => __( 'Sale Product Label', 'foodymat' ),
				'condition' => [ 'wc_shop_sale_flash' ],
				'choices' => [
					'percentage'       => __( 'Percentage', 'foodymat' ),
					'text'       => __( 'Text', 'foodymat' ),
				],
			],

			'rt_shop_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Shop Banner Title', 'foodymat' ),
				'default' => __( 'Shop Page', 'foodymat' ),
			],

		] );
	}
}
