<?php
/**
 * Theme Customizer - Header
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RT\Foodymat\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class BlogSingle extends Customizer {
	protected $section_blog_single = 'rt_blog_single_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog_single,
			'title'       => __( 'Blog Single', 'foodymat' ),
			'description' => __( 'Blog Single Section', 'foodymat' ),
			'priority'    => 26
		] );

		Customize::add_controls( $this->section_blog_single, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_single_controls', [

			'rt_single_post_style' => [
				'type'    => 'select',
				'label'   => __( 'Post View Style', 'foodymat' ),
				'default' => '1',
				'choices' => Fns::single_post_style()
			],

			'rt_single_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Single Meta', 'foodymat' ),
				'description' => __( 'You can sort meta by drag and drop', 'foodymat' ),
				'placeholder' => __( 'Choose Meta', 'foodymat' ),
				'multiselect' => true,
				'default'     => 'author,date,category,comment',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_single_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'foodymat' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_post_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'foodymat' ),
				'default' => __( 'Post Details', 'foodymat' ),
			],

			'rt_single_visibility_heading' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'foodymat' ),
			],

			'rt_single_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_single_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Above Meta Visibility', 'foodymat' ),
			],
			'rt_single_tag_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Tag Visibility', 'foodymat' ),
			],
			'rt_single_share_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Share Visibility', 'foodymat' ),
			],
			'rt_single_profile_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Author Profile Visibility', 'foodymat' ),
			],
			'rt_single_caption_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Caption Visibility', 'foodymat' ),
			],
			'rt_single_navigation_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Navigation Visibility', 'foodymat' ),
			],
			'rt_post_share' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Share Media', 'foodymat' ),
				'description' => __( 'You can sort meta by drag and drop', 'foodymat' ),
				'placeholder' => __( 'Choose Media', 'foodymat' ),
				'multiselect' => true,
				'default'     => 'facebook,twitter,linkedin',
				'choices'     => Fns::post_share_list(),
				'condition' => [ 'rt_single_share_visibility' ]
			],

			'rt_post_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Single Related Option', 'foodymat' ),
			],

			'rt_post_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_post_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Post Related Title', 'foodymat' ),
				'default' => __( 'Related Post', 'foodymat' ),
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'foodymat' ),
				'default' => 4,
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'foodymat' ),
				'description' => __( 'Post Query Type', 'foodymat' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'foodymat' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'foodymat' ),
					'author' => esc_html__( 'Posts by the same Author', 'foodymat' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'foodymat' ),
				'description' => __( 'Display Post Order', 'foodymat' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'foodymat' ),
					'rand' => esc_html__( 'Random Posts', 'foodymat' ),
					'modified' => esc_html__( 'Last Modified Posts', 'foodymat' ),
					'popular' => esc_html__( 'Most Commented posts', 'foodymat' ),
					'views' => esc_html__( 'Most Viewed posts', 'foodymat' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

		] );
	}


}
