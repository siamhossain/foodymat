<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `inc/Custom/Custom.php` to write your custom functions
 *
 * @package foodymat
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( class_exists( 'RT\\Foodymat\\Init' ) ) :
	RT\Foodymat\Init::instance();
	do_action('foodymat_theme_init');
endif;

add_editor_style( 'style-editor.css' );



//Discount based on min-purchase

//	add_action('woocommerce_cart_calculate_fees', 'apply_discount_if_minimum_spent', 20, 1);
//	function apply_discount_if_minimum_spent($cart) {
//		if (is_admin() || !did_action('woocommerce_before_calculate_totals')) {
//			return;
//		}
//
//		$min_subtotal = 5000; // Minimum subtotal required for discount (in Taka)
//		$max_discount = 175; // Set maximum discount cap
//		$percentage_discount = 0.35; // Set discount percentage (35%)
//
//		$subtotal = $cart->get_subtotal();
//
//		// Check if subtotal meets the minimum requirement
//		if ($subtotal >= $min_subtotal) {
//			// Calculate the discount based on the percentage
//			$discount_amount = $subtotal * $percentage_discount;
//
//			// Cap the discount if it exceeds the maximum limit
//			if ($discount_amount > $max_discount) {
//				$discount_amount = $max_discount;
//			}
//
//			// Apply the discount as a negative fee
//			$cart->add_fee(__('Automatic Discount', 'your-text-domain'), -$discount_amount);
//		}
//	}


//add field

	add_action('woocommerce_product_options_general_product_data', 'add_discount_fields_to_product');
	function add_discount_fields_to_product() {
		global $post;

		echo '<div class="options_group">';

		// Minimum Subtotal Field
		woocommerce_wp_text_input( array(
			'id'          => '_min_subtotal',
			'label'       => __('Minimum Purchase (Taka)', 'your-text-domain'),
			'desc_tip'    => 'true',
			'description' => __('Enter the minimum cart subtotal required for discount.', 'your-text-domain'),
			'type'        => 'number',
			'custom_attributes' => array(
				'step'  => 'any',
				'min'   => '0',
			),
		));

		// Percentage Discount Field
		woocommerce_wp_text_input( array(
			'id'          => '_percentage_discount',
			'label'       => __('Percentage Discount (%)', 'your-text-domain'),
			'desc_tip'    => 'true',
			'description' => __('Enter the discount percentage.', 'your-text-domain'),
			'type'        => 'number',
			'custom_attributes' => array(
				'step'  => 'any',
				'min'   => '0',
				'max'   => '100',
			),
		));

		// Maximum Discount Field
		woocommerce_wp_text_input( array(
			'id'          => '_max_discount',
			'label'       => __('Maximum Discount (Taka)', 'your-text-domain'),
			'desc_tip'    => 'true',
			'description' => __('Enter the maximum discount amount.', 'your-text-domain'),
			'type'        => 'number',
			'custom_attributes' => array(
				'step'  => 'any',
				'min'   => '0',
			),
		));

		echo '</div>';
	}


	//save data

	add_action('woocommerce_process_product_meta', 'save_discount_fields');
	function save_discount_fields($post_id) {
		// Save Minimum Subtotal
		$min_subtotal = isset($_POST['_min_subtotal']) ? sanitize_text_field($_POST['_min_subtotal']) : '';
		update_post_meta($post_id, '_min_subtotal', $min_subtotal);

		// Save Percentage Discount
		$percentage_discount = isset($_POST['_percentage_discount']) ? sanitize_text_field($_POST['_percentage_discount']) : '';
		update_post_meta($post_id, '_percentage_discount', $percentage_discount);

		// Save Maximum Discount
		$max_discount = isset($_POST['_max_discount']) ? sanitize_text_field($_POST['_max_discount']) : '';
		update_post_meta($post_id, '_max_discount', $max_discount);
	}



	//discount logic
	add_action('woocommerce_cart_calculate_fees', 'apply_dynamic_discount_based_on_product', 20, 1);
	function apply_dynamic_discount_based_on_product($cart) {
		if (is_admin() || !did_action('woocommerce_before_calculate_totals')) {
			return;
		}

		// Initialize variables for the dynamic fields
		$min_subtotal = 0;
		$percentage_discount = 0;
		$max_discount = null; // Set to null to check if no max discount is provided

		// Loop through cart items to fetch the dynamic discount settings from the product
		foreach ($cart->get_cart() as $cart_item) {
			$product_id = $cart_item['product_id'];

			// Fetch values from product custom fields
			$product_min_subtotal = get_post_meta($product_id, '_min_subtotal', true);
			$product_percentage_discount = get_post_meta($product_id, '_percentage_discount', true);
			$product_max_discount = get_post_meta($product_id, '_max_discount', true);

			// Apply the highest discount logic (or customize as needed)
			if ($product_min_subtotal > $min_subtotal) {
				$min_subtotal = $product_min_subtotal;
			}

			if ($product_percentage_discount > $percentage_discount) {
				$percentage_discount = $product_percentage_discount;
			}

			// Only set max_discount if a value is provided
			if (!empty($product_max_discount) && $product_max_discount > $max_discount) {
				$max_discount = $product_max_discount;
			}
		}

		// Apply discount if the cart subtotal meets the minimum subtotal
		$subtotal = $cart->get_subtotal();
		if ($subtotal >= $min_subtotal) {
			// Calculate the discount based on the percentage
			$discount_amount = $subtotal * ($percentage_discount / 100);

			// Apply max discount cap if a max discount is set
			if ($max_discount !== null && $discount_amount > $max_discount) {
				$discount_amount = $max_discount;
			}

			// Apply the discount as a negative fee
			$cart->add_fee(sprintf(__('purchase Discount', 'your-text-domain')), -$discount_amount);
//			$cart->add_fee(sprintf(__('purchase Discount (%s%%)', 'your-text-domain'), $percentage_discount), -$discount_amount);
		}
	}




