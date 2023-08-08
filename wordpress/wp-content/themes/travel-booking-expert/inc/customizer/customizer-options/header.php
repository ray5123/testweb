<?php
function travel_booking_expert_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'travel-booking-expert'),
		) 
	);

	/*=========================================
	Travel Booking Expert Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','travel-booking-expert'),
			'panel'  		=> 'header_section',
		)
    );    

	/*=========================================
	Top header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','travel-booking-expert'),
			'panel'  		=> 'header_section',
		)
    );

	// general setting

   	$wp_customize->add_setting(
    	'topheader_email',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);	
	$wp_customize->add_control( 
		'topheader_email',
		array(
		    'label'   		=> __('Email Address','travel-booking-expert'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'topheader_phoneno',
    	array(
			'default' => '',
			'sanitize_callback' => 'travel_booking_expert_sanitize_phone_number',
		)
	);	
	$wp_customize->add_control( 
		'topheader_phoneno',
		array(
		    'label'   		=> __('Phone Number','travel-booking-expert'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'topheader_offer_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'topheader_offer_text',
		array(
		    'label'   		=> __('Offer Text','travel-booking-expert'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->register_panel_type( 'Travel_Booking_Expert_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Travel_Booking_Expert_WP_Customize_Section' );

}
add_action( 'customize_register', 'travel_booking_expert_header_settings' );


if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Travel_Booking_Expert_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'travel_booking_expert_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Travel_Booking_Expert_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'travel_booking_expert_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}