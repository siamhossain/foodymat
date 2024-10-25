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
class Error extends Customizer {
	protected $section_labels = 'rt_error_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Error Page', 'foodymat' ),
			'description' => __( 'Error section.', 'foodymat' ),
			'priority'    => 39
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_error_image' => [
				'type'         => 'image',
				'label'        => __( 'Error Image', 'foodymat' ),
				'description'  => __( 'Upload error image for your site.', 'foodymat' ),
				'button_label' => __( 'Error image', 'foodymat' ),
			],

			'rt_error_heading' => [
				'type'        => 'text',
				'label'       => __( 'Error Heading', 'foodymat' ),
				'default'     => __( 'Oops, something went wrong.', 'foodymat' ),
			],

			'rt_error_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Text', 'foodymat' ),
				'default'     => __( 'Sorry! This Page Is Not Available!', 'foodymat' ),
			],

			'rt_error_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Button Text', 'foodymat' ),
				'default'     => __( 'Back To Home Page', 'foodymat' ),
			],

		] );
	}


}
