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
class Banner extends Customizer {

	protected $section_breadcrumb = 'rt_breadcrumb_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_breadcrumb,
			'title'       => __( 'Banner - Breadcrumb', 'foodymat' ),
			'description' => __( 'Banner Section', 'foodymat' ),
			'priority'    => 23
		] );

		Customize::add_controls( $this->section_breadcrumb, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_top_bar_controls', [

			'rt_banner' => [
				'type'    => 'switch',
				'label'   => __( 'Banner Visibility', 'foodymat' ),
				'default' => 1
			],

			'rt_banner_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Banner Style', 'foodymat' ),
				'default'   => 1,
				'choices'   => Fns::image_placeholder( 'banner', 1 ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Banner Alignment', 'foodymat' ),
				'default' => 'align-items-center',
				'choices' => [
					'default'               => __( 'Alignment Default', 'foodymat' ),
					'align-items-center'    => __( 'Alignment Center', 'foodymat' ),
					'align-items-end'       => __( 'Alignment right', 'foodymat' ),
				],
				'condition' => [ 'rt_banner' ]
			],

			'rt_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Background Image', 'foodymat' ),
				'description'  => __( 'Upload Banner Image', 'foodymat' ),
				'button_label' => __( 'Banner', 'foodymat' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_color' => [
				'type'         => 'alfa_color',
				'label'        => __( 'Banner Background Color', 'foodymat' ),
				'description'  => __( 'Inter Banner Color', 'foodymat' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'cover',
					]
				)
			],

			'rt_banner_color_opacity' => [
				'type'         => 'number',
				'label'        => __( 'Background Opacity', 'foodymat' ),
				'description'  => __( 'Inter Banner Opacity', 'foodymat' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_padding_top' => [
				'type'        => 'number',
				'label'       => __( 'Banner Padding Top (px)', 'foodymat' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner_padding_bottom' => [
				'type'        => 'number',
				'label'       => __( 'Banner Padding Bottom (px)', 'foodymat' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner_color_mode' => [
				'type'    => 'select',
				'label'   => __( 'Banner Color Mode', 'foodymat' ),
				'default' => 'banner-dark',
				'choices' => [
					'banner-dark'    => __( 'Dark Color', 'foodymat' ),
					'banner-light'   => __( 'Light Color', 'foodymat' ),
				],
				'condition' => [ 'rt_banner' ]
			],

			'rt_banner1' => [
				'type'      => 'heading',
				'label'     => __( 'Breadcrumb Settings', 'foodymat' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_title' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Title', 'foodymat' ),
				'default'   => 1,
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Breadcrumb', 'foodymat' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_border' => [
				'type'      => 'switch',
				'label'     => __( 'Breadcrumb Border', 'foodymat' ),
				'default'   => 0,
				'condition' => [ 'rt_banner' ]
			],

		] );

	}

}
