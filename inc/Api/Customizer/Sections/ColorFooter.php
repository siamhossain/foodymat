<?php
/**
 * Theme Customizer - Header
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class ColorFooter extends Customizer {
	protected $section_footer_color = 'rt_footer_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Footer Colors', 'foodymat' ),
			'description' => __( 'Footer Color Section', 'foodymat' ),
			'priority'    => 8
		] );

		Customize::add_controls( $this->section_footer_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_footer_color_controls', [
			'rt_footer_color1'           => [
				'type'  => 'heading',
				'label' => __( 'Main Footer', 'foodymat' ),
			],
			'rt_footer_bg'               => [
				'type'  => 'color',
				'label' => __( 'Footer Background', 'foodymat' ),
			],
			'rt_footer_text_color'             => [
				'type'  => 'color',
				'label' => __( 'Footer Text', 'foodymat' ),
			],
			'rt_footer_link_color'             => [
				'type'  => 'color',
				'label' => __( 'Footer Link', 'foodymat' ),
			],
			'rt_footer_link_hover_color'       => [
				'type'  => 'color',
				'label' => __( 'Footer Link - Hover', 'foodymat' ),
			],
			'rt_footer_widget_title_color'     => [
				'type'  => 'color',
				'label' => __( 'Widget Title', 'foodymat' ),
			],
			'rt_footer_input_border_color'     => [
				'type'  => 'color',
				'label' => __( 'Input/List/Table Border Color', 'foodymat' ),
			],
			'rt_footer_copyright_color1' => [
				'type'  => 'heading',
				'label' => __( 'Copyright Area', 'foodymat' ),
			],
			'rt_copyright_bg'            => [
				'type'  => 'color',
				'label' => __( 'Copyright Background', 'foodymat' ),
			],
			'rt_copyright_text_color'          => [
				'type'  => 'color',
				'label' => __( 'Copyright Text', 'foodymat' ),
			],
			'rt_copyright_link_color'          => [
				'type'  => 'color',
				'label' => __( 'Copyright Link', 'foodymat' ),
			],
			'rt_copyright_link_hover_color'    => [
				'type'  => 'color',
				'label' => __( 'Copyright Link - Hover', 'foodymat' ),
			],
		] );


	}

}
