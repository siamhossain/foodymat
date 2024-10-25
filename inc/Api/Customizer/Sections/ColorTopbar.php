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
class ColorTopbar extends Customizer {
	protected $section_topbar_color = 'rt_top_bar_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_topbar_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Top Bar Colors', 'foodymat' ),
			'description' => __( 'Top Bar Color Section', 'foodymat' ),
			'priority'    => 3
		] );

		Customize::add_controls( $this->section_topbar_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_header_color_controls', [


			'rt_topbar_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Topbar Color', 'foodymat' ),
			],

			'rt_topbar_active_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Hover Color', 'foodymat' ),
			],

			'rt_topbar_bg_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Topbar Background', 'foodymat' ),
			],


		] );


	}

}
