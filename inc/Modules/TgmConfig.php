<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.1.0
 */

namespace RT\Foodymat\Modules;
use RT\Foodymat\Traits\SingletonTraits;

require_once get_template_directory() . '/inc/Lib/class-tgm-plugin-activation.php';
class TgmConfig {

	use SingletonTraits;

	public $base;
	public $path;

	public function __construct() {
		$this->base = 'foodymat';
		$this->path = get_template_directory() . '/plugin-bundle/';

		add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );
	}

	public function register_required_plugins() {
		$plugins = [
			// Bundled
			[
				'name'     => 'Foodymat Core',
				'slug'     => 'foodymat-core',
				'source'   => 'foodymat-core.zip',
				'required' => true,
				'version'  => '1.0.3'
			],
			[
				'name'     => 'RT Framework',
				'slug'     => 'rt-framework',
				'source'   => 'rt-framework.zip',
				'required' => true,
				'version'  => '3.0.0'
			],

			// Repository
			[
				'name'     => esc_html__('Breadcrumb NavXT','foodymat'),
				'slug'     => 'breadcrumb-navxt',
				'required' => false,
			],
			[
				'name'     => esc_html__('Elementor Page Builder','foodymat'),
				'slug'     => 'elementor',
				'required' => false,
			],
			[
				'name'     => esc_html__('WP Fluent Forms','foodymat'),
				'slug'     => 'fluentform',
				'required' => false,
			],
			[
				'name'     => esc_html__('One Click Demo Import','foodymat'),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			],
		];

		$config = [
			'id'           => $this->base,
			'default_path' => $this->path,
			'menu'         => $this->base . '-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		];

		tgmpa( $plugins, $config );
	}
}
