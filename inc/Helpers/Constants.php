<?php

namespace RT\Foodymat\Helpers;

class Constants {

	const FOODYMAT_VERSION = '1.0.0';

	public static function get_version() {
		return WP_DEBUG ? time() : self::FOODYMAT_VERSION;
	}
}

