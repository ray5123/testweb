<?php
function travel_booking_expert_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
			'travel_booking_expert_frontpage_sections', array(
				'priority' => 32,
				'title' => esc_html__( 'Frontpage Sections', 'travel-booking-expert' ),
			)
		);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'travel-booking-expert' ),
			'priority' => 13,
			'panel' => 'travel_booking_expert_frontpage_sections',
		)
	);
	
	// Slider 1
	$wp_customize->add_setting( 
    	'slider1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'slider1',
		array(
		    'label'   		=> __('Slider 1','travel-booking-expert'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		

	// Slider 2
	$wp_customize->add_setting(
    	'slider2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'slider2',
		array(
		    'label'   		=> __('Slider 2','travel-booking-expert'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'slider3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider3',
		array(
		    'label'   		=> __('Slider 3','travel-booking-expert'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	

	/*=========================================
	Tourist Section
	=========================================*/
	
	$wp_customize->add_section(
		'tourist_section', array(
			'title' => esc_html__( 'Tourist Section', 'travel-booking-expert' ),
			'priority' => 14,
			'panel' => 'travel_booking_expert_frontpage_sections',
		)
	);

	$wp_customize->add_setting('travel_booking_expert_small_title',array(
		'default'	=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('travel_booking_expert_small_title',array(
		'type'    => 'text',
		'label' => __('Small Title','travel-booking-expert'),
		'section' => 'tourist_section',
	));

	$wp_customize->add_setting('travel_booking_expert_section_title',array(
		'default'	=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('travel_booking_expert_section_title',array(
		'type'    => 'text',
		'label' => __('Section Title','travel-booking-expert'),
		'section' => 'tourist_section',
	));

	$wp_customize->add_setting('travel_booking_expert_section_text',array(
		'default'	=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('travel_booking_expert_section_text',array(
		'type'    => 'text',
		'label' => __('Section Text','travel-booking-expert'),
		'section' => 'tourist_section',
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
	$categories = get_categories( $args );
	$cat_posts = array();
	$i = 0;
	$cat_posts1[]='Select';	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('travel_booking_expert_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'travel_booking_expert_sanitize_choices',
	));
	$wp_customize->add_control('travel_booking_expert_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts1,
		'label' => __('Select Category to display Products','travel-booking-expert'),
		'section' => 'tourist_section',
	));

}

add_action( 'customize_register', 'travel_booking_expert_blog_setting' );

// service selective refresh
function travel_booking_expert_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'travel_booking_expert_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'travel_booking_expert_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'travel_booking_expert_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'travel_booking_expert_blog_section_partials' );

// blog_title
function travel_booking_expert_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function travel_booking_expert_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function travel_booking_expert_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}