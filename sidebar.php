<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package foodymat
 */


use RT\Foodymat\Helpers\Fns;

if ( is_singular() && is_active_sidebar( Fns::default_sidebar('single') ) ) {
	foodymat_sidebar( Fns::default_sidebar('single')  );
} else {
	foodymat_sidebar( Fns::default_sidebar('main') );
}
