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
class Footer extends Customizer {
	protected $section_footer = 'rt_footer_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer,
			'title'       => __( 'Footer', 'foodymat' ),
			'description' => __( 'Footer Section', 'foodymat' ),
			'priority'    => 38
		] );

		Customize::add_controls( $this->section_footer, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_footer_controls', [

			'rt_footer_display' => [
				'type'        => 'switch',
				'label'       => __( 'Footer Display', 'foodymat' ),
				'description' => __( 'Show footer display', 'foodymat' ),
				'default' => 1,
			],

			'rt_footer_style' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'foodymat' ),
				'default' => '1',
				'choices' => Fns::image_placeholder( 'footer', 1 )
			],

			'rt_footer_width' => [
				'type'    => 'select',
				'label'   => __( 'Footer Width', 'foodymat' ),
				'default' => '',
				'choices' => [
					''       => __( 'Box Width', 'foodymat' ),
					'-fluid' => __( 'Full Width', 'foodymat' ),
				]
			],

			'rt_footer_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Footer Max Width (PX)', 'foodymat' ),
				'description' => __( 'Enter a number greater than 992.', 'foodymat' ),
				'condition'   => [ 'rt_footer_width', '==', '-fluid' ]
			],

			'rt_sticky_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Footer', 'foodymat' ),
				'description' => __( 'Show footer at the top when scrolling down', 'foodymat' ),
			],

			'rt_social_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Social Icon', 'foodymat' ),
				'description' => __( 'Show footer at the social icon, This options available for only Footer layout.', 'foodymat' ),
			],

			'rt_footer_copyright' => [
				'type'        => 'tinymce',
				'label'       => __( 'Footer Copyright Text', 'foodymat' ),
				'default'     => __( 'Copyright© [y] Foodymat by RadiusTheme', 'foodymat' ),
				'description' => __( 'Add [y] flag anywhere for dynamic year.', 'foodymat' ),
			],

		] );

	}


}
