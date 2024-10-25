<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodymat
 */

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( foodymat_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php foodymat_single_entry_header(); ?>
		<?php foodymat_post_single_thumbnail(); ?>
		<div class="entry-wrapper">
				<div class="entry-content">
					<?php foodymat_entry_content() ?>
				</div>
			<?php foodymat_post_single_video(); ?>
			<?php foodymat_entry_footer(); ?>
			<?php foodymat_entry_profile(); ?>
		</div>
	</div>
</article>
