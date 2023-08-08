<?php

if ( ! defined( 'TRAVEL_BOOKING_EXPERT_PREMIUM' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_PREMIUM', 'https://www.seothemesexpert.com/wordpress/travel-vlogger-website-template/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_FREE_THEME_URL' ) ) {
	define( 'TRAVEL_BOOKING_EXPERT_FREE_THEME_URL', 'https://www.seothemesexpert.com/wordpress/free-travel-vlogger-wordpress-theme/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_PRO_THEME_URL' ) ) {
	define( 'TRAVEL_BOOKING_EXPERT_PRO_THEME_URL', 'https://www.seothemesexpert.com/wordpress/travel-vlogger-website-template/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_DEMO_THEME_URL' ) ) {
	define( 'TRAVEL_BOOKING_EXPERT_DEMO_THEME_URL', 'https://seothemesexpert.com/demo/expert-travel-vlogger/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_DOCS_THEME_URL' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_DOCS_THEME_URL', 'https://www.seothemesexpert.com/docs/expert-travel-vlogger-pro/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_RATE_THEME_URL' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_RATE_THEME_URL', 'https://wordpress.org/support/theme/expert-travel-vlogger/reviews/#new-post' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_SUPPORT_THEME_URL' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/expert-travel-vlogger/' );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parent_style = 'travel-booking-expert-main'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'expert-travel-vlogger-style', get_stylesheet_uri(), array( $parent_style ) );
}

if ( ! function_exists( 'expert_travel_vlogger_setup' ) ) :
function expert_travel_vlogger_setup() {

	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'expert_travel_vlogger_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'expert_travel_vlogger_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function expert_travel_vlogger_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'expert_travel_vlogger_content_width', 1170 );
}
add_action( 'after_setup_theme', 'expert_travel_vlogger_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function expert_travel_vlogger_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'expert-travel-vlogger' ),
		'id' => 'travel-booking-expert-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'expert-travel-vlogger' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'expert-travel-vlogger' ),
		'id' => 'travel-booking-expert-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'expert-travel-vlogger' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );

	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'expert-travel-vlogger' ),
		'id' => 'travel-booking-expert-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'expert-travel-vlogger' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
}
add_action( 'widgets_init', 'expert_travel_vlogger_widgets_init' );

function expert_travel_vlogger_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

   	$wp_customize->add_setting(
    	'header_button_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'header_button_text',
		array(
		    'label'   		=> __('Header Button Text','expert-travel-vlogger'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

	$wp_customize->add_setting(
    	'header_button_url',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'header_button_url',
		array(
		    'label'   		=> __('Header Button URL','expert-travel-vlogger'),
		    'section'		=> 'top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	/*=========================================
	Social Media
	=========================================*/
	$wp_customize->add_section(
        'social_media_url',
        array(
            'title' 		=> __('Social Media','expert-travel-vlogger'),
			'panel'  		=> 'header_section',
		)
    );

	$wp_customize->add_setting(
    	'topheader_pintrest',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_pintrest',
		array(
		    'label'   		=> __('Pintrest url','expert-travel-vlogger'),
		    'section'		=> 'social_media_url',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'topheader_facebook',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_facebook',
		array(
		    'label'   		=> __('Facebook url','expert-travel-vlogger'),
		    'section'		=> 'social_media_url',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'topheader_twitter',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_twitter',
		array(
		    'label'   		=> __('Twitter url','expert-travel-vlogger'),
		    'section'		=> 'social_media_url',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'topheader_linkdin',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_linkdin',
		array(
		    'label'   		=> __('Linkdin url','expert-travel-vlogger'),
		    'section'		=> 'social_media_url',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	/*=========================================
	Hotel Section
	=========================================*/
	$wp_customize->add_section(
		'hotel_section', array(
			'title' => esc_html__( 'Top Hotel Section', 'expert-travel-vlogger' ),
			'priority' => 14,
			'panel' => 'travel_booking_expert_frontpage_sections',
		)
	);

	$wp_customize->add_setting(
    	'hotel_section_title',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'hotel_section_title',
		array(
		    'label'   		=> __('Title','expert-travel-vlogger'),
		    'section'		=> 'hotel_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$expert_travel_vlogger_args = array('numberposts' => -1);
	$post_list = get_posts($expert_travel_vlogger_args);
	$s = 0;
	$pst_sls[]= __('Select','expert-travel-vlogger');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 3; $s++ ) {
		$wp_customize->add_setting(
			'hotel_section_settigs'.$s,
			array(
				'sanitize_callback' => 'expert_travel_vlogger_sanitize_choices',
			)
		);

		$wp_customize->add_control(
			'hotel_section_settigs'.$s,
			array(
				'type'    => 'select',
				'choices' => $pst_sls,
				'label' => __('Select post','expert-travel-vlogger'),
				'section' => 'hotel_section',
			)
		);
	}
	wp_reset_postdata();
}
add_action( 'customize_register', 'expert_travel_vlogger_header_settings' );

function expert_travel_vlogger_remove_custom($wp_customize) {
 	$wp_customize->remove_setting('topheader_offer_text');
  	$wp_customize->remove_control('topheader_offer_text');
	$wp_customize->remove_section('tourist_section');
}
add_action( 'customize_register', 'expert_travel_vlogger_remove_custom', 1000 );

add_action( 'after_setup_theme', 'expert_travel_vlogger_remove_default_menu', 11 );
function expert_travel_vlogger_remove_default_menu(){
    unregister_nav_menu('primary-left');
}

function expert_travel_vlogger_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}