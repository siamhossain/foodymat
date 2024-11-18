<?php
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodymat
 */

use RT\Foodymat\Options\Opt;

$logo_h1 = ! is_singular( [ 'post' ] );
$menu_classes = foodymat_option( 'rt_menu_alignment' );
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

<div class="main-header-section">
	<div class="header-container rt-container<?php echo esc_attr($_fullwidth) ?> rt-container-lg">
		<div class="row navigation-menu-wrap align-middle m-0">
			<?php if (foodymat_option( 'rt_header_phone' ) && foodymat_option( 'rt_phone' )) { ?>
				<div class="phone-item phone-item--style-2 d-flex align-items-center gap-10">
					<div class="wrap-content">
						<i class="icon-delivary"></i>
						<div class="phone-text">
							<p class="phone-label mb-0">call and Order in</p>
							<a href="tel:<?php echo esc_attr( foodymat_option( 'rt_phone' ) );?>"><?php foodymat_html( foodymat_option( 'rt_phone' ) , false );?></a>
						</div>
					</div>
				</div>
			<?php } ?>

			<!-- .foodymat-navigation -->
			<nav class="foodymat-navigation pl-15 pr-15 <?php echo esc_attr( $menu_classes ) ?>" role="navigation">
				<?php
					wp_nav_menu( [
						'theme_location' => 'primary_left',
						'menu_class'     => 'foodymat-navbar',
						'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
						'fallback_cb'    => 'foodymat_custom_menu_cb',
						'walker'         => has_nav_menu( 'primary_left' ) ? new RT\Foodymat\Core\WalkerNav() : '',
					] );
				?>
			</nav>

			<!-- site-branding -->
			<div class="site-branding">
				<?php echo foodymat_site_logo( $logo_h1 ); ?>
			</div>

			<!-- .foodymat-navigation -->
			<nav class="foodymat-navigation pl-15 pr-15 <?php echo esc_attr( $menu_classes ) ?>" role="navigation">
				<?php
					wp_nav_menu( [
						'theme_location' => 'primary_right',
						'menu_class'     => 'foodymat-navbar',
						'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
						'fallback_cb'    => 'foodymat_custom_menu_cb',
						'walker'         => has_nav_menu( 'primary_right' ) ? new RT\Foodymat\Core\WalkerNav() : '',
					] );
				?>
			</nav>


<!--			<div class="phone-with-menu-icon-wrapper d-flex align-items-center">-->

				<?php foodymat_menu_icons_group(); ?>
<!--			</div>-->
		</div><!-- .row -->
	</div><!-- .container -->
</div>
<?php

