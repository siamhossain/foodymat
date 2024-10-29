<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodymat
 */

use RT\Foodymat\Helpers\Fns;
use RT\Foodymat\Modules\Pagination;
use RT\Foodymat\Modules\ProjectRelated;

$content_columns = Fns::content_columns();

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $content_columns ); ?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'views/content', 'single-project' ); ?>
							<?php endwhile; ?>
					<?php else:?>
						<?php get_template_part( 'views/content', 'none' );?>
					<?php endif;?>
					<?php Pagination::pagination(); ?>
				</main>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php ProjectRelated::rt_project_related(); ?>
</div>
<?php get_footer(); ?>
