<?php
/**
 * LayoutControls
 */

namespace RT\Foodymat\Traits;

// Do not allow directly accessing this file.
use RT\Foodymat\Helpers\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

trait LayoutControlsTraits {
	public function get_layout_controls( $prefix = '' ) {

		$_left_text  = __( 'Left Sidebar', 'foodymat' );
		$_right_text = __( 'Right Sidebar', 'foodymat' );
		$left_text   = $_left_text;
		$right_text  = $_right_text;
		$image_left  = 'sidebar-left.png';
		$image_right = 'sidebar-right.png';

		if ( is_rtl() ) {
			$left_text   = $_right_text;
			$right_text  = $_left_text;
			$image_left  = 'sidebar-right.png';
			$image_right = 'sidebar-left.png';
		}

		return apply_filters( "foodymat_{$prefix}_layout_controls", [

			$prefix . '_layout' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'foodymat' ),
				'default' => 'right-sidebar',
				'choices' => [
					'left-sidebar'  => [
						'image' => foodymat_get_img( $image_left ),
						'name'  => $left_text,
					],
					'full-width'    => [
						'image' => foodymat_get_img( 'sidebar-full.png' ),
						'name'  => __( 'Full Width', 'foodymat' ),
					],
					'right-sidebar' => [
						'image' => foodymat_get_img( $image_right ),
						'name'  => $right_text,
					],
				]
			],

			$prefix . '_sidebar' => [
				'type'    => 'select',
				'label'   => __( 'Choose a Sidebar', 'foodymat' ),
				'default' => 'default',
				'choices' => Fns::sidebar_lists()
			],

			$prefix . '_page_bg_image' => [
				'type'         => 'image',
				'label'        => __( 'Page Background Image', 'foodymat' ),
				'description'  => __( 'Upload Background Image', 'foodymat' ),
				'button_label' => __( 'Background Image', 'foodymat' ),
			],

			$prefix . '_page_bg_color' => [
				'type'         => 'color',
				'label'        => __( 'Page Background Color', 'foodymat' ),
				'description'  => __( 'Inter Background Color', 'foodymat' ),
			],

			$prefix . '_header_heading' => [
				'type'  => 'heading',
				'label' => __( 'Header Settings', 'foodymat' ),
			],

			$prefix . '_header_style' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Header Layout', 'foodymat' ),
				'choices' => [
					'default' => __( '--Default--', 'foodymat' ),
					'1'       => __( 'Layout 1', 'foodymat' ),
					'2'       => __( 'Layout 2', 'foodymat' ),
				],
			],

			$prefix . '_top_bar' => [
				'type'    => 'select',
				'label'   => __( 'Top Bar', 'foodymat' ),
				'default' => 'default',
				'choices' => [
					'default' => __( '--Default--', 'foodymat' ),
					'on'      => __( 'On', 'foodymat' ),
					'off'     => __( 'Off', 'foodymat' ),
				]
			],

			$prefix . '_banner_heading' => [
				'type'  => 'heading',
				'label' => __( 'Banner Settings', 'foodymat' ),
			],

			$prefix . '_banner' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Visibility', 'foodymat' ),
				'choices' => [
					'default' => __( '--Default--', 'foodymat' ),
					'on'      => __( 'On', 'foodymat' ),
					'off'     => __( 'Off', 'foodymat' ),
				],
			],

			$prefix . '_breadcrumb_title' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Title', 'foodymat' ),
				'choices' => [
					'default' => __( '--Default--', 'foodymat' ),
					'on'      => __( 'On', 'foodymat' ),
					'off'     => __( 'Off', 'foodymat' ),
				],
			],

			$prefix . '_breadcrumb' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Breadcrumb', 'foodymat' ),
				'choices' => [
					'default' => __( '--Default--', 'foodymat' ),
					'on'      => __( 'On', 'foodymat' ),
					'off'     => __( 'Off', 'foodymat' ),
				],
			],

			$prefix . '_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Image', 'foodymat' ),
				'description'  => __( 'Upload Banner Image', 'foodymat' ),
				'button_label' => __( 'Banner Image', 'foodymat' ),
			],

			$prefix . '_banner_color' => [
				'type'         => 'color',
				'label'        => __( 'Banner Background Color', 'foodymat' ),
				'description'  => __( 'Inter Background Color', 'foodymat' ),
			],

			$prefix . '_footer_heading' => [
				'type'  => 'heading',
				'label' => __( 'Footer Settings', 'foodymat' ),
			],

			$prefix . '_footer_style'  => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Footer Layout', 'foodymat' ),
				'choices' => [
					'default' => __( '--Default--', 'foodymat' ),
					'1'       => __( 'Layout 1', 'foodymat' ),
					'2'       => __( 'Layout 2', 'foodymat' ),
				],
			],

		] );


	}


}
