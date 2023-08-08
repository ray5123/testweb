<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Travel Booking Expert
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function travel_booking_expert_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function travel_booking_expert_switch_sanitization( $input ) {
    if ( true === $input ) {
        return 1;
    } else {
        return 0;
    }
}

function travel_booking_expert_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function travel_booking_expert_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function travel_booking_expert_sanitize_html( $html ) {
	return wp_kses_post( force_balance_tags( $html ) );
}

/* Sanitization Text*/
function travel_booking_expert_sanitize_text( $text ) {
	return wp_filter_post_kses( $text );
}

function travel_booking_expert_sanitize_phone_number( $phone ) {
    return preg_replace( '/[^\d+]/', '', $phone );
}