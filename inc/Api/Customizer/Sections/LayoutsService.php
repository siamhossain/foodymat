<?php
/**
 * Theme Customizer - Service Archive
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RTFramework\Customize;
use RT\Foodymat\Traits\LayoutControlsTraits;

/**
 * Customizer class
 */
class LayoutsService extends Customizer {

	use LayoutControlsTraits;

	protected $section_service_archive_layout = 'rt_service_archive_layout_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_service_archive_layout,
			'title' => __( 'Service Archive Layout', 'foodymat' ),
			'panel' => 'rt_layouts_panel',
		] );

		Customize::add_controls( $this->section_service_archive_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'rt-service' );
	}

}
