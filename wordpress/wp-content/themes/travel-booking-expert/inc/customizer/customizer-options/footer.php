<?php

function travel_booking_expert_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'travel-booking-expert'),
		) 
	);

	// Footer Bottom // 
	$wp_customize->add_section(
        'footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','travel-booking-expert'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'travel_booking_expert_sanitize_text',
			'priority'  => 3,
		)
	);
	
	// Footer Copyright 
	$travel_booking_expert_foo_copy = esc_html__('Copyright &copy; 2023,Travel Booking Expert WordPress Theme', 'travel-booking-expert' );
	$wp_customize->add_setting(
    	'footer_copyright',
    	array(
			'default' => $travel_booking_expert_foo_copy,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'footer_copyright',
		array(
		    'label'   		=> __('Copytight','travel-booking-expert'),
		    'section'		=> 'footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);
}
add_action( 'customize_register', 'travel_booking_expert_footer' );

// Footer selective refresh
function travel_booking_expert_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'travel_booking_expert_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'travel_booking_expert_footer_partials' );

// copyright_content
function travel_booking_expert_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}