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
class Blog extends Customizer {

	protected $section_blog = 'rt_blog_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog,
			'title'       => __( 'Blog Archive', 'foodymat' ),
			'description' => __( 'Blog Section', 'foodymat' ),
			'priority'    => 25
		] );

		Customize::add_controls( $this->section_blog, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_blog_controls', [

			'rt_blog_style' => [
				'type'        => 'select',
				'label'       => __( 'Blog Style', 'foodymat' ),
				'description' => __( 'This option works only for blog layout', 'foodymat' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'foodymat' ),
					'list'    => __( 'List', 'foodymat' ),
					'list-2'    => __( 'List 2', 'foodymat' ),
					'grid-2'    => __( 'Grid 2', 'foodymat' ),
					'grid-3'    => __( 'Grid 3', 'foodymat' ),
					'grid-4'    => __( 'Grid 4', 'foodymat' ),
				]
			],

			'rt_blog_column' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column', 'foodymat' ),
				'description' => __( 'This option works only for large device', 'foodymat' ),
				'default'     => 'default',
				'choices'     => [
					'default'   => __( 'Default From Theme', 'foodymat' ),
					'col-lg-12' => __( '1 Column', 'foodymat' ),
					'col-lg-6'  => __( '2 Column', 'foodymat' ),
					'col-lg-4'  => __( '3 Column', 'foodymat' ),
					'col-lg-3'  => __( '4 Column', 'foodymat' ),
				]
			],

			'rt_blog_column_gap' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column Gap', 'foodymat' ),
				'description' => __( 'This option works only for blog grid gap', 'foodymat' ),
				'default'     => 'g-4',
				'choices'     => [
					'g-1'  => __( 'Gap 1', 'foodymat' ),
					'g-2'  => __( 'Gap 2', 'foodymat' ),
					'g-3'  => __( 'Gap 3', 'foodymat' ),
					'g-4'  => __( 'Gap 4', 'foodymat' ),
					'g-5'  => __( 'Gap 5', 'foodymat' ),
					'g-6'  => __( 'Gap 6', 'foodymat' ),
				]
			],

			'rt_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'foodymat' ),
				'default' => '25',
			],

			'rt_blog_btn_style' => [
				'type'        => 'select',
				'label'       => __( 'Button Style', 'foodymat' ),
				'description' => __( 'This option works only for blog button style', 'foodymat' ),
				'default'     => 'button-6',
				'choices'     => [
					'button-1'  => __( 'Default', 'foodymat' ),
					'button-2'  => __( 'Button 2', 'foodymat' ),
					'button-3'  => __( 'Button 3', 'foodymat' ),
					'button-4'  => __( 'Button 4', 'foodymat' ),
					'button-5'  => __( 'Button 5', 'foodymat' ),
					'button-6'  => __( 'Button 6', 'foodymat' ),
				]
			],

			'rt_blog_btn_radius' => [
				'type'    => 'number',
				'label'   => __( 'Button Radius', 'foodymat' ),
				'default' => 50,
			],

			'rt_blog_pagination_style' => [
				'type'        => 'select',
				'label'       => __( 'Pagination Style', 'foodymat' ),
				'description' => __( 'This option works only for blog pagination style', 'foodymat' ),
				'default'     => 'pagination-area',
				'choices'     => [
					'pagination-area'  => __( 'Default', 'foodymat' ),
					'pagination-area-2'  => __( 'Style 2', 'foodymat' ),
				]
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'foodymat' ),
			],

			'rt_blog_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'foodymat' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_above_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Title Above Meta Style', 'foodymat' ),
				'default' => 'meta-style-dash',
				'choices' => Fns::meta_style( [ 'meta-style-dash-bg', 'meta-style-pipe' ] )
			],

			'rt_blog_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'foodymat' ),
				'description' => __( 'You can sort meta by drag and drop', 'foodymat' ),
				'placeholder' => __( 'Choose Meta', 'foodymat' ),
				'multiselect' => true,
				'default'     => 'author,date,category',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_visibility' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'foodymat' ),
			],

			'rt_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_blog_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Title Above Meta Visibility', 'foodymat' ),
			],

			'rt_blog_content_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Content Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_video_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Video Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_blog_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_animation_heading' => [
				'type'  => 'heading',
				'label' => __( 'Animation', 'foodymat' ),
			],

			'rt_animation' => [
				'type'      => 'switch',
				'label'       => __( 'Animation', 'foodymat' ),
				'default'     => 0,
			],

			'rt_animation_effect' => [
				'type'        => 'select',
				'label' => __( 'Entrance Animation', 'foodymat' ),
				'description' => __( 'This option works only for blog animation effect', 'foodymat' ),
				'default'     => 'fadeInUp',
				'choices'     => [
					'bounce' => esc_html__( 'bounce', 'foodymat' ),
					'flash' => esc_html__( 'flash', 'foodymat' ),
					'pulse' => esc_html__( 'pulse', 'foodymat' ),
					'rubberBand' => esc_html__( 'rubberBand', 'foodymat' ),
					'shakeX' => esc_html__( 'shakeX', 'foodymat' ),
					'shakeY' => esc_html__( 'shakeY', 'foodymat' ),
					'headShake' => esc_html__( 'headShake', 'foodymat' ),
					'swing' => esc_html__( 'swing', 'foodymat' ),
					'fadeIn' => esc_html__( 'fadeIn', 'foodymat' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'foodymat' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'foodymat' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'foodymat' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'foodymat' ),
					'bounceIn' => esc_html__( 'bounceIn', 'foodymat' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'foodymat' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'foodymat' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'foodymat' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'foodymat' ),
					'slideInUp' => esc_html__( 'slideInUp', 'foodymat' ),
					'slideInDown' => esc_html__( 'slideInDown', 'foodymat' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'foodymat' ),
					'slideInRight' => esc_html__( 'slideInRight', 'foodymat' ),
				],
				'condition' => [ 'rt_animation' ],
			],

			'delay' => [
				'type'  => 'text',
				'label' => __( 'Delay', 'foodymat' ),
				'default' => '200',
				'condition' => [ 'rt_animation' ],
			],

			'duration' => [
				'type'  => 'text',
				'label' => __( 'Duration', 'foodymat' ),
				'default' => '1200',
				'condition' => [ 'rt_animation' ],
			],

		] );
	}


}
