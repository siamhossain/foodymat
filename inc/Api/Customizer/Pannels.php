<?php
/**
 * Theme Customizer Pannels
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer;

use RT\Foodymat\Traits\SingletonTraits;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Pannels {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		$this->add_panels();
	}

	/**
	 * Add Panels
	 * @return void
	 */
	public function add_panels() {
		Customize::add_panels(
			[
				[
					'id'          => 'rt_header_panel',
					'title'       => esc_html__( 'Header - Topbar - Menu', 'foodymat' ),
					'description' => esc_html__( 'Foodymat Header', 'foodymat' ),
					'priority'    => 22,
				],
				[
					'id'          => 'rt_typography_panel',
					'title'       => esc_html__( 'Typography', 'foodymat' ),
					'description' => esc_html__( 'Foodymat Typography', 'foodymat' ),
					'priority'    => 24,
				],
				[
					'id'          => 'rt_color_panel',
					'title'       => esc_html__( 'Colors', 'foodymat' ),
					'description' => esc_html__( 'Foodymat Color Settings', 'foodymat' ),
					'priority'    => 28,
				],
				[
					'id'          => 'rt_layouts_panel',
					'title'       => esc_html__( 'Layout Settings', 'foodymat' ),
					'description' => esc_html__( 'Foodymat Layout Settings', 'foodymat' ),
					'priority'    => 34,
				],
				[
					'id'          => 'rt_contact_social_panel',
					'title'       => esc_html__( 'Contact & Socials', 'foodymat' ),
					'description' => esc_html__( 'Foodymat Contact & Socials', 'foodymat' ),
					'priority'    => 24,
				],

			]
		);
	}

}
