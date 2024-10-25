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
class ColorSite extends Customizer {
	protected $section_site_color = 'rt_site_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_site_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Site Colors', 'foodymat' ),
			'description' => __( 'Site Color Section', 'foodymat' ),
			'priority'    => 2
		] );
		Customize::add_controls( $this->section_site_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_site_color_controls', [

			'rt_site_color1'   => [
				'type'  => 'heading',
				'label' => __( 'Site Ascent Color', 'foodymat' ),
			],
			'rt_primary_color' => [
				'type'    => 'color',
				'label'   => __( 'Primary Color', 'foodymat' ),
			],

			'rt_color_separator2' => [
				'type' => 'separator',
			],

			'rt_secondary_color' => [
				'type'    => 'color',
				'label'   => __( 'Secondary Color', 'foodymat' ),
			],

			'rt_color_separator3' => [
				'type' => 'separator',
			],

			'rt_tertiary_color' => [
				'type'    => 'color',
				'label'   => __( 'Tertiary Color', 'foodymat' ),
			],

			'rt_site_color2' => [
				'type'  => 'heading',
				'label' => __( 'Others Color', 'foodymat' ),
			],

			'rt_body_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Body BG Color', 'foodymat' ),
			],

			'rt_body_color' => [
				'type'    => 'color',
				'label'   => __( 'Body Color', 'foodymat' ),
			],

			'rt_border_color' => [
				'type'    => 'color',
				'label'   => __( 'Border Color', 'foodymat' ),
			],

			'rt_title_color' => [
				'type'    => 'color',
				'label'   => __( 'Title Color', 'foodymat' ),
			],

			'rt_button_color' => [
				'type'    => 'color',
				'label'   => __( 'Button Color', 'foodymat' ),
			],

			'rt_button_text_color' => [
				'type'    => 'color',
				'label'   => __( 'Button Text Color', 'foodymat' ),
			],

			'rt_meta_color' => [
				'type'    => 'color',
				'label'   => __( 'Meta Color', 'foodymat' ),
			],

			'rt_meta_light' => [
				'type'    => 'color',
				'label'   => __( 'Meta Light', 'foodymat' ),
			],

			'rt_gray10_color' => [
				'type'    => 'color',
				'label'   => __( 'Gray # 1', 'foodymat' ),
			],

			'rt_gray20_color' => [
				'type'    => 'color',
				'label'   => __( 'Gray # 2', 'foodymat' ),
			],

		] );


	}

}
