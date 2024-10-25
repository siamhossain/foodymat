<?php
/**
 * Theme Customizer - Header
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RT\Foodymat\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Header extends Customizer {
	protected $section_header = 'rt_header_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_header,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Menu', 'foodymat' ),
			'description' => __( 'Header Section', 'foodymat' ),
			'priority'    => 2,
			'edit-point'  => ''
		] );
		Customize::add_controls( $this->section_header, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_header_controls', [

			'rt_header_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Choose Layout', 'foodymat' ),
				'default'   => '1',
				'edit-link' => '.site-branding',
				'choices'   => Fns::image_placeholder( 'header', 2 )
			],

			'rt_menu_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Menu Alignment', 'foodymat' ),
				'default' => 'justify-content-center',
				'choices' => [
					''                       => __( 'Menu Alignment', 'foodymat' ),
					'justify-content-start'  => __( 'Left Alignment', 'foodymat' ),
					'justify-content-center' => __( 'Center Alignment', 'foodymat' ),
					'justify-content-end'    => __( 'Right Alignment', 'foodymat' ),
				]
			],

			'rt_header_width' => [
				'type'    => 'select',
				'label'   => __( 'Header Width', 'foodymat' ),
				'default' => 'box',
				'choices' => [
					'box'       => __( 'Box Width', 'foodymat' ),
					'full' => __( 'Full Width', 'foodymat' ),
				]
			],

			'rt_header_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Header Max Width (PX)', 'foodymat' ),
				'description' => __( 'Enter a number greater than 1440. Remove value for 100%', 'foodymat' ),
				'condition'   => [ 'rt_header_width', '==', 'full' ]
			],

			'rt_sticy_header' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Header', 'foodymat' ),
				'description' => __( 'Show header at the top when scrolling down', 'foodymat' ),
			],

			'rt_tr_header' => [
				'type'  => 'switch',
				'label' => __( 'Transparent Header', 'foodymat' ),
			],

			'rt_tr_header_color' => [
				'type'    => 'select',
				'label'   => __( 'Transparent color', 'foodymat' ),
				'default' => 'tr-header-dark',
				'choices' => [
					'tr-header-light'   => __( 'Light Color', 'foodymat' ),
					'tr-header-dark'    => __( 'Dark Color', 'foodymat' ),
				],
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_tr_header_shadow' => [
				'type'  => 'switch',
				'label' => __( 'Header Dark Shadow', 'foodymat' ),
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_header_border' => [
				'type'    => 'switch',
				'label'   => __( 'Header Border', 'foodymat' ),
				'default' => 0
			],
			'rt_header_sep1'   => [
				'type' => 'separator',
				'edit-link' => '.menu-icon-wrapper',
			],

			'rt_header_phone' => [
				'type'    => 'switch',
				'label'   => __( 'Header Phone ?', 'foodymat' ),
				'default' => 1,
			],

			'rt_header_login_link' => [
				'type'    => 'switch',
				'label'   => __( 'User Login ?', 'foodymat' ),
				'default' => 0,
			],

			'rt_header_search' => [
				'type'    => 'switch',
				'label'   => __( 'Search Icon ?', 'foodymat' ),
				'default' => 1,
			],

			'rt_header_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Hamburger Menu', 'foodymat' ),
				'description' => __( 'It will be hide only for desktop.', 'foodymat' ),
				'default'     => 0,
			],

			'rt_header_cart' => [
				'type'        => 'switch',
				'label'       => __( 'Cart', 'foodymat' ),
				'default'     => 0,
			],

			'rt_header_separator' => [
				'type'    => 'switch',
				'label'   => __( 'Icon Separator', 'foodymat' ),
				'default' => 0,
			],

			'rt_offcanvas_social' => [
				'type'    => 'switch',
				'label'   => __( 'Offcanvas Social', 'foodymat' ),
				'default' => 0,
			],

			'rt_header_sep2' => [
				'type' => 'separator',
			],

			'rt_get_started_button' => [
				'type'    => 'switch',
				'label'   => __( 'Get Started Button ?', 'foodymat' ),
				'default' => 0
			],

			'rt_get_started_button_url' => [
				'type'    => 'text',
				'label'   => __( 'Button Link', 'foodymat' ),
				'condition' => [ 'rt_get_started_button' ],
			],

		] );

	}
}
