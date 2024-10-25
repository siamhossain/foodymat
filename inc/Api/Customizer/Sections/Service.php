<?php
/**
 * Theme Customizer - Service
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
class Service extends Customizer {

	protected $section_service = 'rt_service_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_service,
			'title'       => __( 'Service Option', 'foodymat' ),
			'description' => __( 'Service Section', 'foodymat' ),
			'priority'    => 36
		] );

		Customize::add_controls( $this->section_service, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_service_controls', [

			'rt_service_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Archive Option', 'foodymat' ),
			],

			'rt_service_style' => [
				'type'        => 'select',
				'label'       => __( 'Service Layout', 'foodymat' ),
				'description' => __( 'This service 02 layout only icon show', 'foodymat' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Service 01', 'foodymat' ),
					'2'    => __( 'Service 02', 'foodymat' ),
					'3'    => __( 'Service 03', 'foodymat' ),
					'4'    => __( 'Service 04', 'foodymat' ),
					'5'    => __( 'Service 05', 'foodymat' ),
				]
			],

			'rt_service_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Service Archive Item Limit', 'foodymat' ),
				'default' => '8',
			],

			'rt_service_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_service_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'foodymat' ),
				'default' => '15',
				'condition' => [ 'rt_service_ar_excerpt' ]
			],

			'rt_service_read_more' => [
				'type'    => 'switch',
				'label'   => __( 'Read More Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_service_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'foodymat' ),
				'default' => __( 'Our Services', 'foodymat' ),
			],

			'rt_service_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'foodymat' ),
				'default' => 'service',
			],

			'rt_service_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'foodymat' ),
				'default' => 'service-category',
			],

			'rt_service_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Single Related Option', 'foodymat' ),
			],

			'rt_service_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'foodymat' ),
				'default' => __( 'Service Details', 'foodymat' ),
			],

			'rt_service_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'foodymat' ),
				'default' => 0
			],

			'rt_service_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Service Related Title', 'foodymat' ),
				'default' => __( 'Related Service', 'foodymat' ),
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'foodymat' ),
				'default' => 3,
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'foodymat' ),
				'description' => __( 'Service Query Type', 'foodymat' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'foodymat' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'foodymat' ),
					'author' => esc_html__( 'Posts by the same Author', 'foodymat' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'foodymat' ),
				'description' => __( 'Display Service Order', 'foodymat' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'foodymat' ),
					'rand' => esc_html__( 'Random Posts', 'foodymat' ),
					'modified' => esc_html__( 'Last Modified Posts', 'foodymat' ),
					'popular' => esc_html__( 'Most Commented posts', 'foodymat' ),
					'views' => esc_html__( 'Most Viewed posts', 'foodymat' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

		] );
	}


}
