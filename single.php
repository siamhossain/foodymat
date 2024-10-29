<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foodymat
 */

use RT\Foodymat\Helpers\Fns;
use RT\Foodymat\Options\Opt;
use RT\Foodymat\Modules\PostRelated;

get_header();
$classes = Fns::class_list( [
	'single-post-container',
	Fns::is_single_fullwidth() ? 'should-full-width' : ''
] );
?>
	<div id="primary" class="content-area">
		<div class="<?php echo esc_attr( $classes ) ?>">
			<?php while ( have_posts() ) :
				the_post(); ?>
				<?php do_action( 'foodymat_before_single_content', get_the_ID() ); ?>
				<div class="container">
					<div class="row content-row">
						<div class="content-col <?php echo esc_attr( Fns::single_content_colums() ); ?>">
							<main id="main" class="site-main single-content" role="main">
								<?php
								get_template_part( 'views/content-single', Opt::$single_style );
								get_template_part( 'views/custom/single', 'pagination' );
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>
							</main><!-- #main -->
						</div><!-- .col- -->
						<?php get_sidebar(); ?>
					</div><!-- .row -->
				</div><!-- .container -->
				<?php do_action( 'foodymat_after_single_content' ); ?>
			<?php endwhile; ?>
			<?php PostRelated::rt_post_related(); ?>
		</div>
	</div><!-- #primary -->
<?php
get_footer();