<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'travel-hiking' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'travel-hiking' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'travel-hiking' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'travel_hiking_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'travel_hiking_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// HEADER SECTION

	Kirki::add_section( 'travel_hiking_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'travel-hiking' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'travel-hiking' ),
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'travel-hiking' ),
		'section'     => 'travel_hiking_section_header',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Advertisement Text', 'travel-hiking' ),
		'settings' => 'travel_hiking_header_advertisement_text',
		'section'  => 'travel_hiking_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Button Text', 'travel-hiking' ),
		'settings' => 'travel_hiking_header_hiring_text',
		'section'  => 'travel_hiking_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    =>  esc_html__( 'Button Url', 'travel-hiking' ),
		'settings' => 'travel_hiking_header_hiring_url',
		'section'  => 'travel_hiking_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_header_phone_number_heading',
		'section'     => 'travel_hiking_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Phone Number', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'travel_hiking_header_phone_number',
		'section'  => 'travel_hiking_section_header',
		'default'  => '',
		'sanitize_callback' => 'travel_hiking_sanitize_phone_number',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_enable_email_heading',
		'section'     => 'travel_hiking_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Email Address', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'travel_hiking_header_email',
		'section'  => 'travel_hiking_section_header',
		'default'  => '',
		'sanitize_callback' => 'sanitize_email',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_login_enable',
		'label'       => esc_html__( 'Enable/Disable Login', 'travel-hiking' ),
		'section'     => 'travel_hiking_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'travel-hiking' ),
		'section'     => 'travel_hiking_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'travel-hiking' ),
		'section'     => 'travel_hiking_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );

	// TYPOGRAPHY SETTINGS
	Kirki::add_panel( 'travel_hiking_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'travel-hiking' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'travel_hiking_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_h1_typography_heading',
		'section'     => 'travel_hiking_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_h1_typography_font',
		'section'   =>  'travel_hiking_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Delicious Handrawn',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  array('.header-image-box h1'),
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'travel_hiking_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_h2_typography_heading',
		'section'     => 'travel_hiking_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_h2_typography_font',
		'section'   =>  'travel_hiking_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'travel_hiking_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_h3_typography_heading',
		'section'     => 'travel_hiking_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_h3_typography_font',
		'section'   =>  'travel_hiking_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'travel_hiking_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_h4_typography_heading',
		'section'     => 'travel_hiking_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_h4_typography_font',
		'section'   =>  'travel_hiking_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'travel_hiking_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_h5_typography_heading',
		'section'     => 'travel_hiking_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_h5_typography_font',
		'section'   =>  'travel_hiking_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'travel_hiking_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_h6_typography_heading',
		'section'     => 'travel_hiking_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_h6_typography_font',
		'section'   =>  'travel_hiking_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'travel_hiking_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'travel-hiking' ),
		'panel'    => 'travel_hiking_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_body_typography_heading',
		'section'     => 'travel_hiking_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'travel_hiking_body_typography_font',
		'section'   =>  'travel_hiking_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'travel_hiking_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'travel-hiking' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'travel-hiking' ),
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'travel-hiking' ),
		'section'     => 'travel_hiking_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'travel-hiking' ),
		'settings'    => 'travel_hiking_shop_page_layout',
		'section'     => 'travel_hiking_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'travel-hiking' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'travel-hiking' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'travel_hiking_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'travel-hiking' ),
		'settings'    => 'travel_hiking_products_per_row',
		'section'     => 'travel_hiking_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'travel-hiking' ),
		'settings'    => 'travel_hiking_products_per_page',
		'section'     => 'travel_hiking_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'travel-hiking' ),
		'section'     => 'travel_hiking_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'travel-hiking' ),
		'settings'    => 'travel_hiking_single_product_sidebar_layout',
		'section'     => 'travel_hiking_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'travel-hiking' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'travel-hiking' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'travel_hiking_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'travel_hiking_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'travel-hiking' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'travel-hiking' ),
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'travel-hiking' ),
		'section'     => 'travel_hiking_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_header_background_attachment_heading',
		'section'     => 'travel_hiking_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'travel_hiking_header_background_attachment',
		'section'     => 'travel_hiking_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'travel-hiking' ),
			'fixed' => esc_html__( 'Fixed', 'travel-hiking' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'travel-hiking' ),
		'section'     => 'travel_hiking_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'travel-hiking' ),
		'section'     => 'travel_hiking_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'travel_hiking_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'travel-hiking' ),
		'description'    => esc_html__( 'Here you can add post information.', 'travel-hiking' ),
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'travel-hiking' ),
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'travel-hiking' ),
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'travel-hiking' ),
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'travel-hiking' ),
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_length_setting_heading',
		'section'     => 'travel_hiking_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'travel_hiking_length_setting',
		'section'     => 'travel_hiking_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'travel-hiking' ),
		'settings'    => 'travel_hiking_single_post_tag',
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'travel-hiking' ),
		'settings'    => 'travel_hiking_single_post_category',
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'travel_hiking_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'travel-hiking' ),
		'section'     => 'travel_hiking_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_single_post_radius',
		'section'     => 'travel_hiking_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'travel-hiking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'travel_hiking_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'travel-hiking' ),
		'type'        => 'text',
		'section'     => 'travel_hiking_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// FOOTER SECTION

	Kirki::add_section( 'travel_hiking_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'travel-hiking' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'travel-hiking' ),
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_footer_text_heading',
		'section'     => 'travel_hiking_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'travel-hiking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'travel_hiking_footer_text',
		'section'  => 'travel_hiking_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'travel_hiking_footer_enable_heading',
		'section'     => 'travel_hiking_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'travel-hiking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'travel_hiking_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'travel-hiking' ),
		'section'     => 'travel_hiking_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'travel-hiking' ),
			'off' => esc_html__( 'Disable', 'travel-hiking' ),
		],
	] );
}
