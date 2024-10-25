<?php
/**
 * Theme Customizer - Team
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
class Team extends Customizer {

	protected $section_team = 'rt_team_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_team,
			'title'       => __( 'Team Option', 'foodymat' ),
			'description' => __( 'Team Section', 'foodymat' ),
			'priority'    => 35
		] );

		Customize::add_controls( $this->section_team, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_team_controls', [

			'rt_team_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Archive Option', 'foodymat' ),
			],

			'rt_team_style' => [
				'type'        => 'select',
				'label'       => __( 'Team Layout', 'foodymat' ),
				'description' => __( 'This option works only for team layout', 'foodymat' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Team 01', 'foodymat' ),
					'2'    => __( 'Team 02', 'foodymat' ),
					'3'    => __( 'Team 03', 'foodymat' ),
					'4'    => __( 'Team 04', 'foodymat' ),
				]
			],

			'rt_team_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Team Archive Item Limit', 'foodymat' ),
				'default' => '8',
			],

			'rt_team_ar_designation' => [
				'type'    => 'switch',
				'label'   => __( 'Designation Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_team_ar_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_team_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_team_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'foodymat' ),
				'default' => '12',
				'condition' => [ 'rt_team_ar_excerpt' ]
			],

			'rt_team_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'foodymat' ),
				'default' => __( 'Our Teams', 'foodymat' ),
			],

			'rt_team_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'foodymat' ),
				'default' => __( 'team', 'foodymat' ),
			],

			'rt_team_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'foodymat' ),
				'default' => 'team-category',
			],

			'rt_team_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Option', 'foodymat' ),
			],

			'rt_team_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'foodymat' ),
				'default' => __( 'Team Details', 'foodymat' ),
			],

			'rt_team_single_author' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Layout', 'foodymat' ),
				'default'     => 'team-thumb-square',
				'choices'     => [
					'team-thumb-square'    => __( 'Thumb Square', 'foodymat' ),
					'team-thumb-round'    => __( 'Thumb Round', 'foodymat' ),
				]
			],

			'rt_team_single_author_order' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Order', 'foodymat' ),
				'default'     => 'thumb-left',
				'choices'     => [
					'thumb-left'    => __( 'Thumb Left', 'foodymat' ),
					'thumb-right'    => __( 'Thumb Right', 'foodymat' ),
				]
			],

			'rt_team_single_info' => [
				'type'    => 'switch',
				'label'   => __( 'Info Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_team_single_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_team_single_skill' => [
				'type'    => 'switch',
				'label'   => __( 'Skill Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_team_single_contact' => [
				'type'    => 'switch',
				'label'   => __( 'Contact Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_team_contact_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Contact Title', 'foodymat' ),
				'default' => __( 'Team Contact', 'foodymat' ),
				'condition' => [ 'rt_team_single_contact' ]
			],

			'rt_team_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Related Option', 'foodymat' ),
			],

			'rt_team_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_team_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Related Title', 'foodymat' ),
				'default' => __( 'Related Team', 'foodymat' ),
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'foodymat' ),
				'default' => 4,
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'foodymat' ),
				'description' => __( 'Team Query Type', 'foodymat' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'foodymat' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'foodymat' ),
					'author' => esc_html__( 'Posts by the same Author', 'foodymat' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'foodymat' ),
				'description' => __( 'Display Team Order', 'foodymat' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'foodymat' ),
					'rand' => esc_html__( 'Random Posts', 'foodymat' ),
					'modified' => esc_html__( 'Last Modified Posts', 'foodymat' ),
					'popular' => esc_html__( 'Most Commented posts', 'foodymat' ),
					'views' => esc_html__( 'Most Viewed posts', 'foodymat' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

		] );
	}


}
