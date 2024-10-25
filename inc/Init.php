<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `config/custom/custom.php` to write your custom functions
 *
 * @package foodymat
 */

namespace RT\Foodymat;

use RT\Foodymat\Traits\SingletonTraits;

final class Init {

	use SingletonTraits;

	/**
	 * Class constructor
	 */
	public function __construct() {
		$this->register();
	}

	/**
	 * Instantiate all class
	 * @return void
	 */
	public function register() {
		Core\Tags::instance();
		Core\Sidebar::instance();
		Options\Opt::instance();
		Options\Layouts::instance();
		Setup\Setup::instance();
		Setup\Menus::instance();
		Setup\Enqueue::instance();
		Custom\Hooks::instance();
		Custom\Extras::instance();
		Custom\DynamicStyles::instance();
		Api\Customizer::instance();
		Api\Gutenberg::instance();
		Plugins\ThemeJetpack::instance();
		Modules\TgmConfig::instance();
		Modules\AjaxSearch::instance();
	}

}
