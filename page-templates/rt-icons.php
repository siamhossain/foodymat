<?php
/**
 * Template Name: RT Icons
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package foodymat
 */

get_header(); ?>
	<div class="container">
		<div class="row pt-50 pb-50 d-flex gap-15">
			<?php
			echo foodymat_get_svg( 'search' );
			echo foodymat_get_svg( 'facebook' );
			echo foodymat_get_svg( 'twitter' );
			echo foodymat_get_svg( 'linkedin' );
			echo foodymat_get_svg( 'instagram' );
			echo foodymat_get_svg( 'pinterest' );
			echo foodymat_get_svg( 'tiktok' );
			echo foodymat_get_svg( 'youtube' );
			echo foodymat_get_svg( 'snapchat' );
			echo foodymat_get_svg( 'whatsapp' );
			echo foodymat_get_svg( 'reddit' );
			?>
		</div>
	</div>
<?php
get_footer();
