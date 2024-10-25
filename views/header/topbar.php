<?php
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodymat
 */

use RT\Foodymat\Options\Opt;

if(! Opt::$has_top_bar ) {
	return;
}
$topinfo = ( foodymat_option( 'rt_contact_address' ) || foodymat_option( 'rt_phone' ) || foodymat_option( 'rt_email' ) || foodymat_option( 'rt_website' ) ) ? true : false;
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

<div class="foodymat-topbar">
	<div class="topbar-container rt-container<?php echo esc_attr($_fullwidth) ?>">
		<div class="topbar-row d-flex flex-wrap column-gap-30 align-items-center">
			<?php if( $topinfo ) { ?>
			<div class="topbar-left d-flex flex-wrap column-gap-30 align-items-center">
				<?php if( foodymat_option( 'rt_topbar_address' ) && foodymat_option( 'rt_contact_address' )  ) { ?>
					<span><i class="icon-rt-location-4"></i><?php foodymat_html( foodymat_option( 'rt_contact_address' ) , false );?></span>
				<?php } if( foodymat_option( 'rt_topbar_phone' ) && foodymat_option( 'rt_phone' ) ) { ?>
					<span><i class="icon-rt-phone-2"></i><a href="tel:<?php echo esc_attr( foodymat_option( 'rt_phone' ) );?>"><?php foodymat_html( foodymat_option( 'rt_phone' ) , false );?></a></span>
				<?php } if( foodymat_option( 'rt_topbar_email' ) && foodymat_option( 'rt_email' ) ) { ?>
					<span><i class="icon-rt-email"></i><a href="mailto:<?php echo esc_attr( foodymat_option( 'rt_email' ) );?>"><?php foodymat_html( foodymat_option( 'rt_email' ) , false );?></a></span>
				<?php } if( foodymat_option( 'rt_topbar_website' ) && foodymat_option( 'rt_website' ) ) { ?>
					<span><i class="icon-rt-development-service"></i><?php foodymat_html( foodymat_option( 'rt_website' ) , false );?></span>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( foodymat_option( 'rt_topbar_social' ) ) { ?>
			<div class="topbar-right d-flex gap-30 align-items-center">
				<div class="social-icon">
					<?php if( foodymat_option( 'rt_follow_us_label' ) ) { ?><label><?php echo foodymat_option( 'rt_follow_us_label' ) ?></label><?php } ?>
					<?php foodymat_get_social_html( '#555' ); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
