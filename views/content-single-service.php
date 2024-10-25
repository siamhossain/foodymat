<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foodymat
 */
use RT\Foodymat\Options\Opt;

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'service-single' ); ?>>
	<div class="service-single-item">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail-wrap single-post-thumbnail">
			<figure class="post-thumbnail">
				<?php the_post_thumbnail( 'full' ); ?>
			</figure><!-- .post-thumbnail -->
		</div>
		<?php } ?>
		<div class="service-heading">
			<?php if ( ! Opt::$breadcrumb_title ) { ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php } else { ?>
				<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php } ?>
		</div>
		<?php the_content(); ?>
	</div>
</div>
