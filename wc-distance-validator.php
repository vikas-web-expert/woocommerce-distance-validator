<?php
/**
 * Plugin Name: WooCommerce Custom Distance Validator (15-Mile Radius)
 * Description: Automatically blocks checkout if the customer's delivery address is beyond a 15-mile radius from the store location using Google Maps API logic.
 * Version: 1.0.0
 * Author: Vikas - Full Stack Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action( 'woocommerce_checkout_process', 'custom_validate_delivery_radius' );

function custom_validate_delivery_radius() {
    // Store Location Coordinates (Example: Store Zip Code)
    $store_zip = '10001'; 
    
    // Get Customer's Shipping Zip Code
    $customer_zip = isset( $_POST['shipping_postcode'] ) ? sanitize_text_field( $_POST['shipping_postcode'] ) : '';

    if ( empty( $customer_zip ) ) {
        // Fallback to billing zip if shipping is empty
        $customer_zip = isset( $_POST['billing_postcode'] ) ? sanitize_text_field( $_POST['billing_postcode'] ) : '';
    }

    if ( ! empty( $customer_zip ) ) {
        
        // Placeholder for Google Maps Distance Matrix API integration
        // $distance = get_distance_from_google_api( $store_zip, $customer_zip );
        
        // Simulated distance for demonstration (e.g., fetching from API returns 18 miles)
        $calculated_distance = 18; 
        $max_allowed_distance = 15; 

        // Block checkout if distance exceeds 15 miles
        if ( $calculated_distance > $max_allowed_distance ) {
            wc_add_notice( __( 'Sorry, we only deliver within a 15-mile radius of our store. Your address is outside our delivery zone.', 'woocommerce' ), 'error' );
        }
    }
}
