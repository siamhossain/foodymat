<?php
/**
 * Theme Customizer - Header
 *
 * @package foodymat
 */

namespace RT\Foodymat\Api\Customizer\Sections;

use RT\Foodymat\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class ZControllerExample extends Customizer {

	protected $section_test = 'rt_test_test_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_test,
			'title'       => __( 'Test Controls', 'foodymat' ),
			'description' => __( 'Customize the Test', 'foodymat' ),
			'priority'    => 9999
		] );
		Customize::add_controls( $this->section_test, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_test_test_controls', [

			//Reset button
			'rt_reset_customize' => [
				'type'  => 'heading',
				'reset' => '1',
			],
			//Reset button

			'rt_test_heading1' => [
				'type'        => 'heading',
				'label'       => __( 'All controls', 'foodymat' ),
				'description' => __( 'All controls are here', 'foodymat' ),
			],

			'rt_test_switch' => [
				'type'  => 'switch',
				'label' => __( 'Choose switch', 'foodymat' ),
			],

			'rt_test_text' => [
				'type'      => 'text',
				'label'     => __( 'Text Default', 'foodymat' ),
				'default'   => __( 'Text Default', 'foodymat' ),
				'transport' => '',
				'condition' => [ 'rt_test_switch' ]
			],


			'rt_test_switch2' => [
				'type'  => 'switch',
				'label' => __( 'Choose switch2', 'foodymat' ),
			],
			'rt_test_url'     => [
				'type'      => 'url',
				'label'     => __( 'url', 'foodymat' ),
				'default'   => __( 'url Default', 'foodymat' ),
				'transport' => '',
				'condition' => [ 'rt_test_switch2', '!==', 1 ]
			],

			'rt_test_select'   => [
				'type'        => 'select',
				'label'       => __( 'Select a Val', 'foodymat' ),
				'description' => __( 'Select Discription', 'foodymat' ),
				'default'     => 'menu-left',
				'choices'     => [
					'menu-left'   => __( 'Left Alignment', 'foodymat' ),
					'menu-center' => __( 'Center Alignment', 'foodymat' ),
					'menu-right'  => __( 'Right Alignment', 'foodymat' ),
				]
			],
			'rt_test_textarea' => [
				'type'      => 'textarea',
				'label'     => __( 'Textarea', 'foodymat' ),
				'default'   => __( 'Textarea Default', 'foodymat' ),
				'transport' => '',
			],

			'rt_test_select5' => [
				'type'        => 'select',
				'label'       => __( 'Select a Val2', 'foodymat' ),
				'description' => __( 'Select Discription', 'foodymat' ),
				'default'     => 'menu-center',
				'choices'     => [
					'menu-left'   => __( 'Left Alignment', 'foodymat' ),
					'menu-center' => __( 'Center Alignment', 'foodymat' ),
					'menu-right'  => __( 'Right Alignment', 'foodymat' ),
				]
			],

			'rt_test_textarea2' => [
				'type'      => 'textarea',
				'label'     => __( 'Textarea2', 'foodymat' ),
				'default'   => __( 'Textarea Default', 'foodymat' ),
				'transport' => '',
			],


			'rt_test_checkbox' => [
				'type'  => 'checkbox',
				'label' => __( 'Choose checkbox', 'foodymat' ),
			],

			'rt_test_textarea22' => [
				'type'      => 'textarea',
				'label'     => __( 'Checkbox Textarea2', 'foodymat' ),
				'transport' => '',
				'condition' => [ 'rt_test_checkbox', '==', '1' ]
			],


			'rt_test_radio' => [
				'type'    => 'radio',
				'label'   => __( 'Choose radio', 'foodymat' ),
				'choices' => [
					'menu-left'   => __( 'Left Alignment', 'foodymat' ),
					'menu-center' => __( 'Center Alignment', 'foodymat' ),
					'menu-right'  => __( 'Right Alignment', 'foodymat' ),
				]
			],

			'rt_test_textarea222' => [
				'type'      => 'textarea',
				'label'     => __( 'rt_test_radio Textarea2 - menu-center', 'foodymat' ),
				'transport' => '',
			],

			'rt_test_image_choose' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'foodymat' ),
				'default' => '1',
				'choices' => $this->get_header_presets()
			],

			'rt_test_image' => [
				'type'         => 'image',
				'label'        => __( 'Choose Image', 'foodymat' ),
				'button_label' => __( 'Logo', 'foodymat' ),
			],

			'rt_test_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'auto',
					]
				)
			],

			'rt_test_number' => [
				'type'        => 'number',
				'label'       => __( 'Select a Number', 'foodymat' ),
				'description' => __( 'Select Number', 'foodymat' ),
				'default'     => '5',
			],

			'rt_test_pages' => [
				'type'  => 'pages',
				'label' => __( 'Choose page', 'foodymat' ),
			],

			'rt_test_color'      => [
				'type'  => 'color',
				'label' => __( 'Choose color', 'foodymat' ),
			],
			'rt_test_alfa_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Choose alfa_color', 'foodymat' ),
			],
			'rt_test_datetime'   => [
				'type'  => 'datetime',
				'label' => __( 'Choose datetime', 'foodymat' ),
			],

			'rt_test_select2' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'foodymat' ),
				'placeholder' => __( 'Choose Meta', 'foodymat' ),
				'multiselect' => true,
				'choices'     => [
					'author'   => __( 'Author', 'foodymat' ),
					'date'     => __( 'Date', 'foodymat' ),
					'category' => __( 'Category', 'foodymat' ),
					'tag'      => __( 'Tag', 'foodymat' ),
					'comment'  => __( 'Comment', 'foodymat' ),
				],
			],

			'rt_test_repeater' => [
				'type'  => 'repeater',
				'label' => __( 'Choose repeater', 'foodymat' ),
			],

			'rt_test_blog_meta_order1' => [
				'type'    => 'repeater',
				'label'   => __( 'Meta Order', 'foodymat' ),
				'default' => 'one, two, three, four',
				'use_as'  => 'sort',
			],

			'rt_test_blog_meta_order2' => [
				'type'    => 'repeater',
				'label'   => __( 'Meta Order', 'foodymat' ),
				'default' => 'one, two, three, four',
			],

			'rt_test_typography2' => [
				'type'    => 'typography',
				'label'   => __( 'Typography', 'foodymat' ),
				'default' => json_encode(
					[
						'font'          => 'Open Sans',
						'regularweight' => 'normal',
						'size'          => '16',
						'lineheight'    => '26',
					]
				)
			],

			'rt_test_typography3' => [
				'type'    => 'typography',
				'label'   => __( 'Typography', 'foodymat' ),
				'default' => json_encode(
					[
						'font'          => 'Open Sans',
						'regularweight' => 'normal',
						'size'          => '16',
						'lineheight'    => '26',
					]
				)
			],
		] );
	}

	/**
	 * Get Header Presets
	 * @return array[]
	 */
	public function get_header_presets() {
		if ( ! defined( 'RT_FRAMEWORK_DIR_URL' ) ) {
			return [];
		}

		return [
			'1' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 1', 'foodymat' ),
			],
			'2' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 2', 'foodymat' ),
			],
			'3' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 3', 'foodymat' ),
			],
		];
	}

}
