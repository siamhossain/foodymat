<?php
/**
 * Theme Customizer - Project
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Project extends Customizer {

	protected $section_project = 'rt_project_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_project,
			'title'       => __( 'Project Option', 'foodymat' ),
			'description' => __( 'Project Section', 'foodymat' ),
			'priority'    => 37
		] );

		Customize::add_controls( $this->section_project, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_project_controls', [

			'rt_project_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Archive Option', 'foodymat' ),
			],

			'rt_project_style' => [
				'type'        => 'select',
				'label'       => __( 'Project Layout', 'foodymat' ),
				'description' => __( 'This option works only for project layout', 'foodymat' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Project 01', 'foodymat' ),
					'2'    => __( 'Project 02', 'foodymat' ),
					'3'    => __( 'Project 03', 'foodymat' ),
					'4'    => __( 'Project 04', 'foodymat' ),
					'5'    => __( 'Project 05', 'foodymat' ),
				]
			],

			'rt_project_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Archive Item Limit', 'foodymat' ),
				'default' => '6',
			],

			'rt_project_filter' => [
				'type'        => 'select',
				'label'       => __( 'Image Filter', 'foodymat' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default', 'foodymat' ),
					'grayscale'    => __( 'Grayscale', 'foodymat' ),
				]
			],

			'rt_project_ar_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_ar_button' => [
				'type'    => 'switch',
				'label'   => __( 'Button Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_project_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'foodymat' ),
				'default' => '12',
				'condition' => [ 'rt_project_ar_excerpt' ]
			],

			'rt_project_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'foodymat' ),
				'default' => __( 'Our Projects', 'foodymat' ),
			],

			'rt_project_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'foodymat' ),
				'default' => 'project',
			],

			'rt_project_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'foodymat' ),
				'default' => 'project-category',
			],

			'rt_project_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Option', 'foodymat' ),
			],

			'rt_project_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'foodymat' ),
				'default' => __( 'Project Details', 'foodymat' ),
			],

			'rt_project_title' => [
				'type'    => 'switch',
				'label'   => __( 'Info Title Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_text' => [
				'type'    => 'switch',
				'label'   => __( 'Text Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_client' => [
				'type'    => 'switch',
				'label'   => __( 'Client Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_start' => [
				'type'    => 'switch',
				'label'   => __( 'Start Time Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_end' => [
				'type'    => 'switch',
				'label'   => __( 'End Time Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_weblink' => [
				'type'    => 'switch',
				'label'   => __( 'Weblink Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_project_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_project_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Related Option', 'foodymat' ),
			],

			'rt_project_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_project_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Project Related Title', 'foodymat' ),
				'default' => __( 'Related Projects', 'foodymat' ),
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'foodymat' ),
				'default' => 3,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_title_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Title Limit', 'foodymat' ),
				'default' => 5,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'foodymat' ),
				'description' => __( 'Project Query Type', 'foodymat' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'foodymat' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'foodymat' ),
					'author' => esc_html__( 'Posts by the same Author', 'foodymat' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'foodymat' ),
				'description' => __( 'Display Project Order', 'foodymat' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'foodymat' ),
					'rand' => esc_html__( 'Random Posts', 'foodymat' ),
					'modified' => esc_html__( 'Last Modified Posts', 'foodymat' ),
					'popular' => esc_html__( 'Most Commented posts', 'foodymat' ),
					'views' => esc_html__( 'Most Viewed posts', 'foodymat' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

		] );
	}


}
