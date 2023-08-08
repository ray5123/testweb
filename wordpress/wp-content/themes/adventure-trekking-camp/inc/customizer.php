<?php
/**
 * Adventure Trekking Camp: Customizer
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */

function adventure_trekking_camp_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
 	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

 	require get_parent_theme_file_path( 'inc/custom-control.php' );

 	$wp_customize->add_section('adventure_trekking_camp_pro', array(
        'title'    => __('UPGRADE TREKKING CAMP PREMIUM', 'adventure-trekking-camp'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('adventure_trekking_camp_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Adventure_Trekking_Camp_Pro_Control($wp_customize, 'adventure_trekking_camp_pro', array(
        'label'    => __('TREKKING CAMP PREMIUM', 'adventure-trekking-camp'),
        'section'  => 'adventure_trekking_camp_pro',
        'settings' => 'adventure_trekking_camp_pro',
        'priority' => 1,
    )));

    //Logo
    $wp_customize->add_setting('adventure_trekking_camp_logo_max_height',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_integer'
	));
	$wp_customize->add_control(new Adventure_Trekking_Camp_Slider_Custom_Control( $wp_customize, 'adventure_trekking_camp_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','adventure-trekking-camp'),
		'section'=> 'title_tagline',
		'settings'=>'adventure_trekking_camp_logo_max_height',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('adventure_trekking_camp_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_logo_title',
			array(
				'settings'        => 'adventure_trekking_camp_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('adventure_trekking_camp_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_logo_text',
			array(
				'settings'        => 'adventure_trekking_camp_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);
    

	// Theme General Settings
    $wp_customize->add_section('adventure_trekking_camp_theme_settings',array(
        'title' => __('Theme General Settings', 'adventure-trekking-camp'),
        'priority' => 1,
    ) );
    $wp_customize->add_setting(
		'adventure_trekking_camp_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_sticky_header',
			array(
				'settings'        => 'adventure_trekking_camp_sticky_header',
				'section'         => 'adventure_trekking_camp_theme_settings',
				'label'           => __( 'Show Sticky Header', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'adventure_trekking_camp_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_theme_loader',
			array(
				'settings'        => 'adventure_trekking_camp_theme_loader',
				'section'         => 'adventure_trekking_camp_theme_settings',
				'label'           => __( 'Show Site Loader', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('adventure_trekking_camp_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'adventure_trekking_camp_sanitize_choices'
	));
	$wp_customize->add_control('adventure_trekking_camp_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','adventure-trekking-camp'),
        'section' => 'adventure_trekking_camp_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','adventure-trekking-camp'),
            'UPPERCASE' => __('UPPERCASE','adventure-trekking-camp'),
            'LOWERCASE' => __('LOWERCASE','adventure-trekking-camp'),
        ),
	) );

	$wp_customize->add_setting( 'adventure_trekking_camp_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading( $wp_customize, 'adventure_trekking_camp_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'adventure-trekking-camp' ),
		'section'     => 'adventure_trekking_camp_theme_settings',
		'settings'    => 'adventure_trekking_camp_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'adventure_trekking_camp_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_scroll_enable',
			array(
				'settings'        => 'adventure_trekking_camp_scroll_enable',
				'section'         => 'adventure_trekking_camp_theme_settings',
				'label'           => __( 'Hide Scroll Top', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('adventure_trekking_camp_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'adventure_trekking_camp_sanitize_choices'
	));
	$wp_customize->add_control('adventure_trekking_camp_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','adventure-trekking-camp'),
        'section' => 'adventure_trekking_camp_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','adventure-trekking-camp'),
            'center_align' => __('Center Align','adventure-trekking-camp'),
            'left_align' => __('Left Align','adventure-trekking-camp'),
        ),
	) );

	$wp_customize->add_setting( 'adventure_trekking_camp_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading( $wp_customize, 'adventure_trekking_camp_section_shoppage_heading', array(
		'label'       => esc_html__( 'Shop Page Settings', 'adventure-trekking-camp' ),
		'section'     => 'adventure_trekking_camp_theme_settings',
		'settings'    => 'adventure_trekking_camp_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'adventure_trekking_camp_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_shop_page_sidebar',
			array(
				'settings'        => 'adventure_trekking_camp_shop_page_sidebar',
				'section'         => 'adventure_trekking_camp_theme_settings',
				'label'           => __( 'Hide Shop Page Sidebar', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'adventure_trekking_camp_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'adventure_trekking_camp_wocommerce_single_page_sidebar',
				'section'         => 'adventure_trekking_camp_theme_settings',
				'label'           => __( 'Hide Single Product Page Sidebar', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);
	//button
	$wp_customize->add_section('adventure_trekking_camp_button_options',array(
        'title' => __('Button settings', 'adventure-trekking-camp'),
        'priority' => 1,
    ) );
    $wp_customize->add_setting( 'adventure_trekking_camp_theme_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_trekking_camp_theme_button_color', array(
	    'description' => __('It will change the complete theme  Buttton color in one click.', 'adventure-trekking-camp'),
	    'section' => 'adventure_trekking_camp_button_options',
	    'settings' => 'adventure_trekking_camp_theme_button_color',
  	)));
  	$wp_customize->add_setting('adventure_trekking_camp_button_border_radius',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_integer'
	));
	$wp_customize->add_control(new Adventure_Trekking_Camp_Slider_Custom_Control( $wp_customize, 'adventure_trekking_camp_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','adventure-trekking-camp' ),
		'section'=> 'adventure_trekking_camp_button_options',
		'settings'=>'adventure_trekking_camp_button_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));
	
	// Post Layouts
    $wp_customize->add_section('adventure_trekking_camp_layout',array(
        'title' => __('Post Layout', 'adventure-trekking-camp'),
        'priority' => 1
    ) );

     $wp_customize->add_setting( 'adventure_trekking_camp_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading( $wp_customize, 'adventure_trekking_camp_section_post_heading', array(
		'label'       => esc_html__( 'Post Structure', 'adventure-trekking-camp' ),
		 'description' => __( 'Change the post layout from below options', 'adventure-trekking-camp' ),
		'section'     => 'adventure_trekking_camp_layout',
		'settings'    => 'adventure_trekking_camp_section_post_heading',
	) ) );

	$wp_customize->add_setting(
		'adventure_trekking_camp_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_post_sidebar',
			array(
				'settings'        => 'adventure_trekking_camp_post_sidebar',
				'section'         => 'adventure_trekking_camp_layout',
				'label'           => __( 'Show Fullwidth', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'adventure_trekking_camp_single_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_single_post_sidebar',
			array(
				'settings'        => 'adventure_trekking_camp_single_post_sidebar',
				'section'         => 'adventure_trekking_camp_layout',
				'label'           => __( 'Show Single Post Fullwidth', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

    $wp_customize->add_setting('adventure_trekking_camp_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_select'
	));
	$wp_customize->add_control('adventure_trekking_camp_post_option',array(
		'label' => esc_html__('Select Layout','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_layout',
		'setting' => 'adventure_trekking_camp_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','adventure-trekking-camp'),
            'grid_post' => __('Grid Post','adventure-trekking-camp'),
        ),
	));

    $wp_customize->add_setting('adventure_trekking_camp_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_select'
	));
	$wp_customize->add_control('adventure_trekking_camp_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_layout',
		'setting' => 'adventure_trekking_camp_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','adventure-trekking-camp'),
            '2_column' => __('2','adventure-trekking-camp'),
            '3_column' => __('3','adventure-trekking-camp'),
            '4_column' => __('4','adventure-trekking-camp'),
            '5_column' => __('6','adventure-trekking-camp'),
        ),
	));

	$wp_customize->add_setting('adventure_trekking_camp_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_date',
			array(
				'settings'        => 'adventure_trekking_camp_date',
				'section'         => 'adventure_trekking_camp_layout',
				'label'           => __( 'Hide Date', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'adventure_trekking_camp_date', array(
		'selector' => '.date-box',
		'render_callback' => 'adventure_trekking_camp_customize_partial_adventure_trekking_camp_date',
	) );

	$wp_customize->add_setting('adventure_trekking_camp_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_admin',
			array(
				'settings'        => 'adventure_trekking_camp_admin',
				'section'         => 'adventure_trekking_camp_layout',
				'label'           => __( 'Hide Author/Admin', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'adventure_trekking_camp_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'adventure_trekking_camp_customize_partial_adventure_trekking_camp_admin',
	) );

	$wp_customize->add_setting('adventure_trekking_camp_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'adventure_trekking_camp_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Adventure_Trekking_Camp_Customizer_Customcontrol_Switch(
			$wp_customize,
			'adventure_trekking_camp_comment',
			array(
				'settings'        => 'adventure_trekking_camp_comment',
				'section'         => 'adventure_trekking_camp_layout',
				'label'           => __( 'Hide Comment', 'adventure-trekking-camp' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'adventure-trekking-camp' ),
					'off'    => __( 'Off', 'adventure-trekking-camp' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'adventure_trekking_camp_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'adventure_trekking_camp_customize_partial_adventure_trekking_camp_comment',
	) );

	// Header
    $wp_customize->add_section('adventure_trekking_camp_header',array(
        'title' => __('Header', 'adventure-trekking-camp'),
        'priority' => 3
    ) );

    $wp_customize->add_setting( 'adventure_trekking_camp_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading( $wp_customize, 'adventure_trekking_camp_section_contact_heading', array(
		'label'       => esc_html__( 'Header Settings', 'adventure-trekking-camp' ),	
		'description' => __( 'Add header information in the below feilds', 'adventure-trekking-camp' ),		
		'section'     => 'adventure_trekking_camp_header',
		'settings'    => 'adventure_trekking_camp_section_contact_heading',
	) ) );


	$wp_customize->add_setting('adventure_trekking_camp_location_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_location_text',array(
		'label' => esc_html__('Location Text','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_header',
		'setting' => 'adventure_trekking_camp_location_text',
		'type'    => 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_location_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_location_address',array(
		'label' => esc_html__('Location Adreess','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_header',
		'setting' => 'adventure_trekking_camp_location_address',
		'type'    => 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_button_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_button_text',array(
		'label' => esc_html__('Button Text','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_header',
		'setting' => 'adventure_trekking_camp_button_text',
		'type'    => 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_button_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_trekking_camp_button_link',array(
		'label' => esc_html__('Button Link','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_header',
		'setting' => 'adventure_trekking_camp_button_link',
		'type'    => 'url'
	));

	$wp_customize->add_setting('adventure_trekking_camp_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_call_text',array(
		'label' => esc_html__('Call Text','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_header',
		'setting' => 'adventure_trekking_camp_call_text',
		'type'    => 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_call_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_phone_number'
	));
	$wp_customize->add_control('adventure_trekking_camp_call_phone_number',array(
		'label' => esc_html__('Phone Number','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_header',
		'setting' => 'adventure_trekking_camp_call_phone_number',
		'type'    => 'text'
	));

    //Slider
	$wp_customize->add_section( 'adventure_trekking_camp_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'adventure-trekking-camp' ),
    	'priority'   => 3,
	) );

	$wp_customize->add_setting( 'adventure_trekking_camp_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading( $wp_customize, 'adventure_trekking_camp_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'adventure-trekking-camp' ),
		'description' => __( 'Slider Image Dimension ( 1600px x 650px )', 'adventure-trekking-camp' ),		
		'section'     => 'adventure_trekking_camp_slider_section',
		'settings'    => 'adventure_trekking_camp_section_slide_heading',
	) ) );

	$wp_customize->add_setting('adventure_trekking_camp_slider_counter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_slider_counter',array(
		'label'	=> esc_html__('Slider Increament','adventure-trekking-camp'),
		'section'	=> 'adventure_trekking_camp_slider_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 3,
		),
	));

	$adventure_trekking_camp_slider = get_theme_mod('adventure_trekking_camp_slider_counter');
	for ($adventure_trekking_camp_i=1; $adventure_trekking_camp_i <= $adventure_trekking_camp_slider ; $adventure_trekking_camp_i++) {
		
	    $wp_customize->add_setting( 'adventure_trekking_camp_slider_images'.$adventure_trekking_camp_i, array(
	       'default' => '',
	       'transport' => 'refresh',
	       'sanitize_callback' => 'esc_url_raw'
	    ));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'adventure_trekking_camp_slider_images'.$adventure_trekking_camp_i, array(
	       'label'	=> esc_html__('Slider Image ','adventure-trekking-camp').$adventure_trekking_camp_i,
	       'section' => 'adventure_trekking_camp_slider_section',
	    ) ) );

	    $wp_customize->add_setting('adventure_trekking_camp_slider_sub_heading'.$adventure_trekking_camp_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('adventure_trekking_camp_slider_sub_heading'.$adventure_trekking_camp_i,array(
			'label'   => esc_html__('Slider Sub Title ','adventure-trekking-camp').$adventure_trekking_camp_i,
			'section' => 'adventure_trekking_camp_slider_section',
			'type'    => 'text'
		));

	    $wp_customize->add_setting('adventure_trekking_camp_slider_main_heading'.$adventure_trekking_camp_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('adventure_trekking_camp_slider_main_heading'.$adventure_trekking_camp_i,array(
			'label'	=> esc_html__('Slider Title ','adventure-trekking-camp').$adventure_trekking_camp_i,
			'section'	=> 'adventure_trekking_camp_slider_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('adventure_trekking_camp_slider_button_text'.$adventure_trekking_camp_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('adventure_trekking_camp_slider_button_text'.$adventure_trekking_camp_i,array(
			'label'	=> esc_html__('Slider Button Text ','adventure-trekking-camp').$adventure_trekking_camp_i,
			'section'	=> 'adventure_trekking_camp_slider_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('adventure_trekking_camp_slider_button_url'.$adventure_trekking_camp_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));
		$wp_customize->add_control('adventure_trekking_camp_slider_button_url'.$adventure_trekking_camp_i,array(
			'label'	=> esc_html__('Slider Button Url ','adventure-trekking-camp').$adventure_trekking_camp_i,
			'section'	=> 'adventure_trekking_camp_slider_section',
			'type'		=> 'url'
		));
	}

	$wp_customize->add_setting('adventure_trekking_camp_search_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_search_heading',array(
		'label' => esc_html__('Search Form Text','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_slider_section',
		'setting' => 'adventure_trekking_camp_search_heading',
		'type'    => 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'adventure_trekking_camp_sanitize_choices'
	));
	$wp_customize->add_control('adventure_trekking_camp_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','adventure-trekking-camp'),
        'section' => 'adventure_trekking_camp_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','adventure-trekking-camp'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','adventure-trekking-camp'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','adventure-trekking-camp'),),
	) );

	// Project Section
	$wp_customize->add_section( 'adventure_trekking_camp_our_activities_section' , array(
    	'title'      => __( 'Explore Activities Section Settings', 'adventure-trekking-camp' ),
		'priority'   => 4,
	) );

    $wp_customize->add_setting('adventure_trekking_camp_activities_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_activities_text',array(
		'label'	=> esc_html__('Add Short Heading','adventure-trekking-camp'),
		'section'	=> 'adventure_trekking_camp_our_activities_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_activities_heading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_trekking_camp_activities_heading',array(
		'label'	=> esc_html__('Add Heading','adventure-trekking-camp'),
		'section'	=> 'adventure_trekking_camp_our_activities_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('adventure_trekking_camp_activities_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_select',
	));
	$wp_customize->add_control('adventure_trekking_camp_activities_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display projects','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_our_activities_section',
	));

	//Footer
    $wp_customize->add_section( 'adventure_trekking_camp_footer_copyright', array(
    	'title' => esc_html__( 'Footer Text', 'adventure-trekking-camp' ),
    	'priority' => 6
	) );

    $wp_customize->add_setting( 'adventure_trekking_camp_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading( $wp_customize, 'adventure_trekking_camp_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Settings', 'adventure-trekking-camp' ),		
			'section'     => 'adventure_trekking_camp_footer_copyright',
			'settings'    => 'adventure_trekking_camp_section_footer_heading',
		) ) );


    $wp_customize->add_setting('adventure_trekking_camp_footer_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
		$wp_customize->add_control('adventure_trekking_camp_footer_text',array(
			'label'	=> esc_html__('Copyright Text','adventure-trekking-camp'),
			'section'	=> 'adventure_trekking_camp_footer_copyright',
			'type'		=> 'text'
	));

	$wp_customize->add_setting('adventure_trekking_camp_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'adventure_trekking_camp_sanitize_select'
	));
	$wp_customize->add_control('adventure_trekking_camp_footer_widget',array(
		'label' => esc_html__('Footer Per Column','adventure-trekking-camp'),
		'section' => 'adventure_trekking_camp_footer_copyright',
		'setting' => 'adventure_trekking_camp_footer_widget',
		'type' => 'radio',
		'choices' => array(
			'1'   => __('1 Column', 'adventure-trekking-camp'),
			'2'  => __('2 Column', 'adventure-trekking-camp'),
			'3' => __('3 Column', 'adventure-trekking-camp'),
			'4' => __('4 Column', 'adventure-trekking-camp')
		),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'adventure_trekking_camp_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'adventure_trekking_camp_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'adventure_trekking_camp_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'adventure_trekking_camp_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'adventure-trekking-camp' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'adventure-trekking-camp' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'adventure_trekking_camp_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'adventure_trekking_camp_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'adventure_trekking_camp_customize_register' );

function adventure_trekking_camp_customize_partial_blogname() {
	bloginfo( 'name' );
}
function adventure_trekking_camp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function adventure_trekking_camp_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function adventure_trekking_camp_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('ADVENTURE_TREKKING_CAMP_PRO_LINK',__('https://www.ovationthemes.com/wordpress/trekking-wordpress-theme/','adventure-trekking-camp'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Adventure_Trekking_Camp_Pro_Control')):
    class Adventure_Trekking_Camp_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE TREKKING CAMP PREMIUM','adventure-trekking-camp');?> </a>
	        </div>
            <div class="col-md">
                <img class="adventure_trekking_camp_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('TREKKING CAMP PREMIUM - Features', 'adventure-trekking-camp'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'adventure-trekking-camp');?> </li>
                    <li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'adventure-trekking-camp');?> </li>
                   	<li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'adventure-trekking-camp');?> </li>
                   	<li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'adventure-trekking-camp');?> </li>
                   	<li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'adventure-trekking-camp');?> </li>
                   	<li class="upsell-adventure_trekking_camp"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'adventure-trekking-camp');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE TREKKING CAMP PREMIUM','adventure-trekking-camp');?> </a>
		    </div>
        </label>
    <?php } }
endif;