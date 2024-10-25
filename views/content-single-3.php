<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodymat
 */

$meta_list = foodymat_option( 'rt_single_meta', '', true );
$meta      = foodymat_option( 'rt_blog_above_meta_visibility' );
$meta      = foodymat_option( 'rt_single_above_meta_style' );
if ( foodymat_option( 'rt_single_above_meta_visibility' ) ) {
	$category_index = array_search( 'category', $meta_list );
	unset( $meta_list[ $category_index ] );
}
?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( foodymat_post_class() ); ?>>
	<div class="single-inner-wrapper">
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
