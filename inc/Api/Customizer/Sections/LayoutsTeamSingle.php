<?php
/**
 * Theme Customizer - Team single
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
class LayoutsTeamSingle extends Customizer {

	use LayoutControlsTraits;

	protected $section_team_single_layout = 'rt_team_single_layout_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_team_single_layout,
			'title' => __( 'Team Single Layout', 'foodymat' ),
			'panel' => 'rt_layouts_panel',
		] );

		Customize::add_controls( $this->section_team_single_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'team-single' );
	}

}
