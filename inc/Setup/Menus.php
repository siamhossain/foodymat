<?php

namespace RT\Foodymat\Setup;

use RT\Foodymat\Traits\SingletonTraits;

/**
 * Menus
 */
class Menus {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'menus' ] );
	}

	public function menus() {
		/*
			Register all your menus here
		*/
		register_nav_menus( [
			'primary' => esc_html__( 'Primary', 'foodymat' ),
			'secondary' => esc_html__( 'Secondary', 'foodymat' ),
			'primary_left' => esc_html__( 'Primary Left', 'foodymat' ),
			'primary_right' => esc_html__( 'Primary Right', 'foodymat' ),
		] );
	}
}
