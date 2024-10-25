<?php
/**
 * Template part for displaying header offcanvas
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodymat
 */
use RT\Foodymat\Options\Opt;
use RT\Foodymat\Helpers\Fns;
$logo_h1 = ! is_singular( [ 'post' ] );
$topinfo = ( foodymat_option( 'rt_contact_address' ) || foodymat_option( 'rt_phone' ) || foodymat_option( 'rt_email' ) || foodymat_option( 'rt_email' ) ) ? true : false;
?>


<div class="foodymat-offcanvas-drawer">
	<div class="offcanvas-logo">
		<?php echo foodymat_site_logo( $logo_h1 ); ?>
		<a class="trigger-icon trigger-off-canvas" href="#">×</a>
	</div>
	<?php if( foodymat_option( 'rt_about_label' ) || foodymat_option( 'rt_about_text' ) ) { ?>
	<div class="offcanvas-about offcanvas-address">
		<?php if( foodymat_option( 'rt_about_label' ) ) { ?><label><?php echo foodymat_option( 'rt_about_label' ) ?></label><?php } ?>
		<?php if( foodymat_option( 'rt_about_text' ) ) { ?><p><?php echo foodymat_option( 'rt_about_text' ) ?></p><?php } ?>
	</div>
	<?php } ?>
	<nav class="offcanvas-navigation" role="navigation">
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'walker'         => new RT\Foodymat\Core\WalkerNav(),
				)
			);
		endif;
		?>
	</nav><!-- .foodymat-navigation -->

	<div class="offcanvas-address">
		<?php if( $topinfo ) { ?>
			<?php if( foodymat_option( 'rt_contact_info_label' ) ) { ?><label><?php echo foodymat_option( 'rt_contact_info_label' ) ?></label><?php } ?>
			<ul class="offcanvas-info">
				<?php if( foodymat_option( 'rt_contact_address' ) ) { ?>
					<li><i class="icon-rt-location-4"></i><?php foodymat_html( foodymat_option( 'rt_contact_address' ) , false );?> </li>
				<?php } if( foodymat_option( 'rt_phone' ) ) { ?>
					<li><i class="icon-rt-phone-2"></i><a href="tel:<?php echo esc_attr( foodymat_option( 'rt_phone' ) );?>"><?php foodymat_html( foodymat_option( 'rt_phone' ) , false );?></a> </li>
				<?php } if( foodymat_option( 'rt_email' ) ) { ?>
					<li><i class="icon-rt-email"></i><a href="mailto:<?php echo esc_attr( foodymat_option( 'rt_email' ) );?>"><?php foodymat_html( foodymat_option( 'rt_email' ) , false );?></a> </li>
				<?php } if( foodymat_option( 'rt_website' ) ) { ?>
					<li><i class="icon-rt-development-service"></i><?php foodymat_html( foodymat_option( 'rt_website' ) , false );?></li>
				<?php } ?>
			</ul>
		<?php } ?>

		<?php if( foodymat_option( 'rt_offcanvas_social' ) ) { ?>
			<div class="offcanvas-social-icon">
				<?php foodymat_get_social_html( '#555' ); ?>
			</div>
		<?php } ?>
	</div>

</div><!-- .container -->

<div class="foodymat-body-overlay"></div>
