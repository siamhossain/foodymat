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
class Labels extends Customizer {
	protected $section_labels = 'rt_labels_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Modify Static Text', 'foodymat' ),
			'description' => __( 'You can change all static text of the theme.', 'foodymat' ),
			'priority'    => 999
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_header_labels' => [
				'type'  => 'heading',
				'label' => __( 'Header Labels', 'foodymat' ),
			],

			'rt_get_menu_label' => [
				'type'        => 'text',
				'label'       => __( 'Menu Text', 'foodymat' ),
				'description' => __( 'Content: Menu Button', 'foodymat' ),
			],

//			'rt_get_login_label' => [
//				'type'        => 'text',
//				'label'       => __( 'Log In', 'foodymat' ),
//				'default'     => __( 'Log In', 'foodymat' ),
//				'description' => __( 'Content: SignIn Button', 'foodymat' ),
//			],

			'rt_get_started_label' => [
				'type'        => 'text',
				'label'       => __( 'Get Started', 'foodymat' ),
				'default'     => __( 'Get Started', 'foodymat' ),
				'description' => __( 'Content: Get Started', 'foodymat' ),
				'condition' => [ 'rt_get_started_button' ],
			],

			'rt_contact_info_label' => [
				'type'        => 'text',
				'label'       => __( 'Contact Info', 'foodymat' ),
				'default'     => __( 'Contact Info', 'foodymat' ),
				'description' => __( 'Content: Contact Info', 'foodymat' ),
			],

			'rt_follow_us_label' => [
				'type'        => 'text',
				'label'       => __( 'Follow Us On', 'foodymat' ),
				'default'     => __( 'Follow Us On', 'foodymat' ),
				'description' => __( 'Content: Follow Us On', 'foodymat' ),
			],

			'rt_about_label' => [
				'type'        => 'text',
				'label'       => __( 'About Us', 'foodymat' ),
				'description' => __( 'Content: About Us', 'foodymat' ),
			],

			'rt_about_text' => [
				'type'        => 'textarea',
				'label'       => __( 'About Text', 'foodymat' ),
				'description' => __( 'Enter about text here.', 'foodymat' ),
			],

			'rt_footer_labels' => [
				'type'  => 'heading',
				'label' => __( 'Footer Labels', 'foodymat' ),
			],

			'rt_ready_label' => [
				'type'        => 'text',
				'label'       => __( 'Are You Ready', 'foodymat' ),
				'default'     => __( 'ARE YOU READY TO GET STARTED?', 'foodymat' ),
				'description' => __( 'Content: Footer Are You Ready', 'foodymat' ),
			],

			'rt_contact_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Contact Us', 'foodymat' ),
				'default'     => __( 'Contact Us', 'foodymat' ),
				'description' => __( 'Content: Footer contact button', 'foodymat' ),
			],

			'rt_blog_labels' => [
				'type'  => 'heading',
				'label' => __( 'Blog Labels', 'foodymat' ),
			],
			'rt_author_prefix' => [
				'type'        => 'text',
				'label'       => __( 'By', 'foodymat' ),
				'default'     => 'by',
				'description' => __( 'Content: Meta Author Prefix', 'foodymat' ),
			],
			'rt_tags'         => [
				'type'        => 'text',
				'label'       => __( 'Tags:', 'foodymat' ),
				'default'     => __( 'Tags:', 'foodymat' ),
				'description' => __( 'Content: Single blog footer tags label', 'foodymat' ),
			],
			'rt_social' => [
				'type'        => 'text',
				'label'       => __( 'Socials:', 'foodymat' ),
				'default'     => __( 'Socials:', 'foodymat' ),
				'description' => __( 'Content: Single blog footer Socials label', 'foodymat' ),
			],
			'rt_blog_read_more' => [
				'type'        => 'text',
				'label'       => __( 'Blog Read More:', 'foodymat' ),
				'default'     => __( 'Continue Reading', 'foodymat' ),
				'description' => __( 'Content: Single blog footer read more text', 'foodymat' ),
			],

		] );
	}


}
