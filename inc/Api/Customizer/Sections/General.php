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
class General extends Customizer {
	protected $section_general = 'rt_general_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_general,
			'title'       => __( 'General', 'foodymat' ),
			'description' => __( 'General Section', 'foodymat' ),
			'priority'    => 20
		] );
		Customize::add_controls( $this->section_general, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_general_controls', [

			'rt_svg_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable SVG Upload', 'foodymat' ),
				'default' => 1,
			],

			'rt_preloader' => [
				'type'  => 'switch',
				'label' => __( 'Preloader', 'foodymat' ),
			],

			'rt_preloader_logo' => [
				'type'         => 'image',
				'label'        => __( 'Preloader Logo', 'foodymat' ),
				'description'  => __( 'Upload preloader logo for your site.', 'foodymat' ),
				'button_label' => __( 'Logo', 'foodymat' ),
				'condition' => [ 'rt_preloader' ]
			],

			'preloader_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Preloader Background Color', 'foodymat' ),
				'condition' => [ 'rt_preloader' ]
			],

			'rt_back_to_top' => [
				'type'  => 'switch',
				'label' => __( 'Back to Top', 'foodymat' ),
			],

			'rt_remove_admin_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Remove Admin Bar', 'foodymat' ),
				'description' => __( 'This option not work for administrator role.', 'foodymat' ),
			],

			'container_width' => [
				'type'    => 'select',
				'label'   => __( 'Container Width', 'foodymat' ),
				'default' => '1344',
				'choices' => [
					'1554' => esc_html__( '1554px', 'foodymat' ),
					'1344' => esc_html__( '1344px', 'foodymat' ),
					'1240' => esc_html__( '1240px', 'foodymat' ),
					'1200' => esc_html__( '1200px', 'foodymat' ),
					'1140' => esc_html__( '1140px', 'foodymat' ),
				]
			],

			'rt_blend' => [
				'type'        => 'switch',
				'label'       => __( 'Image Blend', 'foodymat' ),
				'default' => 0,
				'description' => __( 'This option for use all image blend mode.', 'foodymat' ),
			],

		] );

	}

}
