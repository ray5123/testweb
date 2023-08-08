<?php
/**
 * VW Blog Magazine Theme Customizer
 *
 * @package VW Blog Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_blog_magazine_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_blog_magazine_custom_controls' );

function vw_blog_magazine_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_blog_magazine_customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_blog_magazine_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$VWBlogMagazineParentPanel = new VW_Blog_Magazine_WP_Customize_Panel( $wp_customize, 'vw_blog_magazine_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-blog-magazine' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWBlogMagazineParentPanel );

	$HomePageParentPanel = new VW_Blog_Magazine_WP_Customize_Panel( $wp_customize, 'vw_blog_magazine_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-blog-magazine' ),
		'panel' => 'vw_blog_magazine_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Menus Settings
	$wp_customize->add_section( 'vw_blog_magazine_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-blog-magazine' ),
		'panel' => 'vw_blog_magazine_homepage_panel',
		'priority'	=>	40,
	) );

	$wp_customize->add_setting('vw_blog_magazine_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_menu_section',
        'choices' => array(
        	'100' => __('100','vw-blog-magazine'),
            '200' => __('200','vw-blog-magazine'),
            '300' => __('300','vw-blog-magazine'),
            '400' => __('400','vw-blog-magazine'),
            '500' => __('500','vw-blog-magazine'),
            '600' => __('600','vw-blog-magazine'),
            '700' => __('700','vw-blog-magazine'),
            '800' => __('800','vw-blog-magazine'),
            '900' => __('900','vw-blog-magazine'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_blog_magazine_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','vw-blog-magazine'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-blog-magazine'),
            'Capitalize' => __('Capitalize','vw-blog-magazine'),
            'Lowercase' => __('Lowercase','vw-blog-magazine'),
        ),
		'section'=> 'vw_blog_magazine_menu_section',
	));

	$wp_customize->add_setting('vw_blog_magazine_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_blog_magazine_menu_section',
		'label' => __('Menu Item Hover Style','vw-blog-magazine'),
		'choices' => array(
            'None' => __('None','vw-blog-magazine'),
            'Zoom In' => __('Zoom In','vw-blog-magazine'),
        ),
	) );

	$wp_customize->add_setting('vw_blog_magazine_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_menu_section',
	)));

	$wp_customize->add_setting('vw_blog_magazine_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_menu_section',
	)));

	$wp_customize->add_setting('vw_blog_magazine_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_menu_section',
	)));

	$wp_customize->add_setting('vw_blog_magazine_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'vw_blog_magazine_social_links', array(
		'title'		=>	__('Social Links', 'vw-blog-magazine'),
		'priority'	=>	40,
		'panel'		=>	'vw_blog_magazine_homepage_panel'
	));

	$wp_customize->add_setting('vw_blog_magazine_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-blog-magazine'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Icon area.</p>
			<p>3. Add social icons url and save.</p>','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_blog_magazine_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_blog_magazine_social_links',
		'type'=> 'hidden'
	));

	//Our Blog Category section
  	$wp_customize->add_section('vw_blog_magazine_category_section',array(
	    'title' => __('Category Section','vw-blog-magazine'),
	    'description' => "For more options of category section </br><a class='go-pro-btn' target='_blank' href='". esc_url(VW_BLOG_MAGAZINE_GO_PRO) ." '>GO PRO</a>",
	    'priority'  => 40,
	    'panel' => 'vw_blog_magazine_homepage_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_blog_magazine_category', array(
		'selector' => '.imagebox h2 a',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_category',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_blog_magazine_category',array(
	    'default' => 'select',
	    'sanitize_callback' => 'vw_blog_magazine_sanitize_choices',
  	));

  	$wp_customize->add_control('vw_blog_magazine_category',array(
	    'type'    => 'select',
	    'choices' => $cat_pst,
	    'label' => __('Select Category to display Latest Post','vw-blog-magazine'),
	    'section' => 'vw_blog_magazine_category_section',
	));

	//Category section 2
  	$wp_customize->add_section('vw_blog_magazine_cat_two_sec',array(
	    'title' => __('Category section 2','vw-blog-magazine'),
	    'description' => "For more options of category section </br><a class='go-pro-btn' target='_blank' href='". esc_url(VW_BLOG_MAGAZINE_GO_PRO) ." '>GO PRO</a>",
	    'priority'  => 60,
	    'panel' => 'vw_blog_magazine_homepage_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_blog_magazine_section_two', array(
		'selector' => '#our_blog .box-content h3',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_section_two',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst1[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_blog_magazine_section_two',array(
	    'default' => 'select',
	    'sanitize_callback' => 'vw_blog_magazine_sanitize_choices',
  	));

  	$wp_customize->add_control('vw_blog_magazine_section_two',array(
	    'type'    => 'select',
	    'choices' => $cat_pst1,
	    'label' => __('Select Category to display Latest Post','vw-blog-magazine'),
	    'section' => 'vw_blog_magazine_cat_two_sec',
	));

	//Category 2 excerpt
	$wp_customize->add_setting( 'vw_blog_magazine_category_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_blog_magazine_category_excerpt_number', array(
		'label'       => esc_html__( 'Category Excerpt length','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_cat_two_sec',
		'type'        => 'range',
		'settings'    => 'vw_blog_magazine_category_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Latest Post Section
	$wp_customize->add_section('vw_blog_magazine_latest_post', array(
		'title'       => __('Latest Post Section', 'vw-blog-magazine'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-blog-magazine'),
		'priority'    => null,
		'panel'       => 'vw_blog_magazine_homepage_panel',
	));

	$wp_customize->add_setting('vw_blog_magazine_latest_post_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_latest_post_text',array(
		'description' => __('<p>1. More options for latest post section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest post section.</p>','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_latest_post',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_blog_magazine_latest_post_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_latest_post_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_BLOG_MAGAZINE_GETSTARTED_URL) ." '>More Info</a>",
		'section'=> 'vw_blog_magazine_latest_post',
		'type'=> 'hidden'
	));

	//Recent Post Section
	$wp_customize->add_section('vw_blog_magazine_recent_post', array(
		'title'       => __('Recent Post Section', 'vw-blog-magazine'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-blog-magazine'),
		'priority'    => null,
		'panel'       => 'vw_blog_magazine_homepage_panel',
	));

	$wp_customize->add_setting('vw_blog_magazine_recent_post_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_recent_post_text',array(
		'description' => __('<p>1. More options for recent post section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for recent post section.</p>','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_recent_post',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_blog_magazine_recent_post_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_recent_post_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_BLOG_MAGAZINE_GETSTARTED_URL) ." '>More Info</a>",
		'section'=> 'vw_blog_magazine_recent_post',
		'type'=> 'hidden'
	));

	//Instagram Section
	$wp_customize->add_section('vw_blog_magazine_instagram', array(
		'title'       => __('Instagram Section', 'vw-blog-magazine'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-blog-magazine'),
		'priority'    => null,
		'panel'       => 'vw_blog_magazine_homepage_panel',
	));

	$wp_customize->add_setting('vw_blog_magazine_instagram_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_instagram_text',array(
		'description' => __('<p>1. More options for instagram section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for instagram section.</p>','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_instagram',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_blog_magazine_instagram_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_instagram_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_BLOG_MAGAZINE_GETSTARTED_URL) ." '>More Info</a>",
		'section'=> 'vw_blog_magazine_instagram',
		'type'=> 'hidden'
	));

	//Newsletter Section
	$wp_customize->add_section('vw_blog_magazine_newsletter', array(
		'title'       => __('Newsletter Section', 'vw-blog-magazine'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-blog-magazine'),
		'priority'    => null,
		'panel'       => 'vw_blog_magazine_homepage_panel',
	));

	$wp_customize->add_setting('vw_blog_magazine_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_newsletter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_blog_magazine_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_BLOG_MAGAZINE_GETSTARTED_URL) ." '>More Info</a>",
		'section'=> 'vw_blog_magazine_newsletter',
		'type'=> 'hidden'
	));

	//Video Section
	$wp_customize->add_section('vw_blog_magazine_video', array(
		'title'       => __('Video Section', 'vw-blog-magazine'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-blog-magazine'),
		'priority'    => null,
		'panel'       => 'vw_blog_magazine_homepage_panel',
	));

	$wp_customize->add_setting('vw_blog_magazine_video_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_video_text',array(
		'description' => __('<p>1. More options for video section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video section.</p>','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_video',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_blog_magazine_video_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_video_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_BLOG_MAGAZINE_GETSTARTED_URL) ." '>More Info</a>",
		'section'=> 'vw_blog_magazine_video',
		'type'=> 'hidden'
	));

	//footer
	$wp_customize->add_section('vw_blog_magazine_footer_section',array(
		'title'	=> __('Footer Text','vw-blog-magazine'),
		'description' => "For more options of footer section </br><a class='go-pro-btn' target='_blank' href='". esc_url(VW_BLOG_MAGAZINE_GO_PRO) ." '>GO PRO</a>",
		'priority'	=> null,
		'panel' => 'vw_blog_magazine_homepage_panel',
	));

	$wp_customize->add_setting( 'vw_blog_magazine_footer_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_blog_magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_footer_section'
    )));

	$wp_customize->add_setting('vw_blog_magazine_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_footer_section',
	)));

	$wp_customize->add_setting('vw_blog_magazine_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_blog_magazine_footer_background_image',array(
        'label' => __('Footer Background Image','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_footer_section'
	)));

	$wp_customize->add_setting('vw_blog_magazine_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-blog-magazine'),
		'section' => 'vw_blog_magazine_footer_section',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-blog-magazine' ),
			'center top'   => esc_html__( 'Top', 'vw-blog-magazine' ),
			'right top'   => esc_html__( 'Top Right', 'vw-blog-magazine' ),
			'left center'   => esc_html__( 'Left', 'vw-blog-magazine' ),
			'center center'   => esc_html__( 'Center', 'vw-blog-magazine' ),
			'right center'   => esc_html__( 'Right', 'vw-blog-magazine' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-blog-magazine' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-blog-magazine' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-blog-magazine' ),
		),
	)); 

	// Footer
	$wp_customize->add_setting('vw_blog_magazine_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-blog-magazine'),
		'choices' => array(
            'fixed' => __('fixed','vw-blog-magazine'),
            'scroll' => __('scroll','vw-blog-magazine'),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
	));

	$wp_customize->add_setting('vw_blog_magazine_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_footer_section',
        'choices' => array(
        	'Left' => __('Left','vw-blog-magazine'),
            'Center' => __('Center','vw-blog-magazine'),
            'Right' => __('Right','vw-blog-magazine')
        ),
	) );

	$wp_customize->add_setting('vw_blog_magazine_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_footer_section',
        'choices' => array(
        	'Left' => __('Left','vw-blog-magazine'),
            'Center' => __('Center','vw-blog-magazine'),
            'Right' => __('Right','vw-blog-magazine')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('vw_blog_magazine_footer_padding',array(
		'default'=> '',
		'priority'    => null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-blog-magazine' ),
    ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

    // footer social icon
  	$wp_customize->add_setting( 'vw_blog_magazine_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_footer_section'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_blog_magazine_footer_copy', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_footer_copy',
	));

	$wp_customize->add_setting( 'vw_blog_magazine_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_blog_magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-blog-magazine' ),
      'section' => 'vw_blog_magazine_footer_section'
    )));

	$wp_customize->add_setting('vw_blog_magazine_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_footer_section',
	)));

	$wp_customize->add_setting('vw_blog_magazine_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_blog_magazine_footer_copy',array(
		'label'	=> __('Copyright Text','vw-blog-magazine'),
		'section'	=> 'vw_blog_magazine_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Image_Radio_Control($wp_customize, 'vw_blog_magazine_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_footer_section',
        'settings' => 'vw_blog_magazine_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_blog_magazine_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-blog-magazine' ),
      	'section' => 'vw_blog_magazine_footer_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_blog_magazine_scroll_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_scroll_top_icon',
	));

    $wp_customize->add_setting('vw_blog_magazine_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_footer_section',
		'setting'	=> 'vw_blog_magazine_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_blog_magazine_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_blog_magazine_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_footer_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_blog_magazine_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Image_Radio_Control($wp_customize, 'vw_blog_magazine_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_footer_section',
        'settings' => 'vw_blog_magazine_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));


	//Blog Post
	$wp_customize->add_panel( $VWBlogMagazineParentPanel );

	$BlogPostParentPanel = new VW_Blog_Magazine_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-blog-magazine' ),
		'panel' => 'vw_blog_magazine_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_blog_magazine_post_settings', array(
		'title' => __( 'Post Settings', 'vw-blog-magazine' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_blog_magazine_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Blog_Magazine_Image_Radio_Control($wp_customize, 'vw_blog_magazine_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_blog_magazine_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-blog-magazine'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-blog-magazine'),
            'Right Sidebar' => __('Right Sidebar','vw-blog-magazine'),
            'One Column' => __('One Column','vw-blog-magazine'),
            'Three Columns' => __('Three Columns','vw-blog-magazine'),
            'Four Columns' => __('Four Columns','vw-blog-magazine'),
            'Grid Layout' => __('Grid Layout','vw-blog-magazine')
        ),
	));
	
	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_blog_magazine_toggle_postdate', array(
		'selector' => '.postbox h2 a',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_toggle_postdate',
	));

  	$wp_customize->add_setting('vw_blog_magazine_toggle_postdate_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_post_settings',
		'setting'	=> 'vw_blog_magazine_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_blog_magazine_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-blog-magazine' ),
        'section' => 'vw_blog_magazine_post_settings'
    )));

	$wp_customize->add_setting('vw_blog_magazine_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_post_settings',
		'setting'	=> 'vw_blog_magazine_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_post_settings'
    )));

    $wp_customize->add_setting('vw_blog_magazine_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_post_settings',
		'setting'	=> 'vw_blog_magazine_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_post_settings'
    )));

  	$wp_customize->add_setting('vw_blog_magazine_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_post_settings',
		'setting'	=> 'vw_blog_magazine_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_post_settings'
    )));

    $wp_customize->add_setting( 'vw_blog_magazine_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_post_settings'
    )));

    $wp_customize->add_setting( 'vw_blog_magazine_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_blog_magazine_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_blog_magazine_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_blog_magazine_sanitize_choices'
	));
  	$wp_customize->add_control('vw_blog_magazine_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-blog-magazine'),
		'section'	=> 'vw_blog_magazine_post_settings',
		'choices' => array(
		  	'default' => __('Default','vw-blog-magazine'),
	  		'custom' => __('Custom Image Size','vw-blog-magazine'),
      ),
  	));

	$wp_customize->add_setting('vw_blog_magazine_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_blog_magazine_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-blog-magazine' ),),
		'section'=> 'vw_blog_magazine_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_blog_magazine_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_blog_magazine_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
		'placeholder' => __( '10px', 'vw-blog-magazine' ),),
		'section'=> 'vw_blog_magazine_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_blog_magazine_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_blog_magazine_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_blog_magazine_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_blog_magazine_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('vw_blog_magazine_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-blog-magazine'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_post_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_blog_magazine_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-blog-magazine'),
            'Without Blocks' => __('Without Blocks','vw-blog-magazine')
        ),
	) );

    $wp_customize->add_setting('vw_blog_magazine_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-blog-magazine'),
            'Excerpt' => __('Excerpt','vw-blog-magazine'),
            'No Content' => __('No Content','vw-blog-magazine')
        ),
	));

	$wp_customize->add_setting('vw_blog_magazine_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_blog_magazine_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_post_settings'
    )));

	$wp_customize->add_setting( 'vw_blog_magazine_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_blog_magazine_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_blog_magazine_blog_pagination_type', array(
        'section' => 'vw_blog_magazine_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-blog-magazine' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-blog-magazine' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-blog-magazine' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_blog_magazine_button_settings', array(
		'title' => __( 'Button Settings', 'vw-blog-magazine' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_blog_magazine_button_text', array(
		'selector' => '.box-content .read-btn a',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_button_text',
	));

    $wp_customize->add_setting('vw_blog_magazine_button_text',array(
		'default'=> esc_html__('Read Full','vw-blog-magazine'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_button_text',array(
		'label'	=> __('Add Button Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Read Full', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_blog_magazine_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_button_font_size',array(
		'label'	=> __('Button Font Size','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-blog-magazine' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_blog_magazine_button_settings',
	));

	$wp_customize->add_setting( 'vw_blog_magazine_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_blog_magazine_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-blog-magazine' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_blog_magazine_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_blog_magazine_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-blog-magazine'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-blog-magazine'),
            'Capitalize' => __('Capitalize','vw-blog-magazine'),
            'Lowercase' => __('Lowercase','vw-blog-magazine'),
        ),
		'section'=> 'vw_blog_magazine_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_blog_magazine_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-blog-magazine' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_blog_magazine_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_related_post_title',
	));

    $wp_customize->add_setting( 'vw_blog_magazine_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_blog_magazine_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_blog_magazine_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_blog_magazine_sanitize_float'
	));
	$wp_customize->add_control('vw_blog_magazine_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-blog-magazine'),
		'input_attrs' => array(
        'placeholder' => __( '3', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_blog_magazine_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_blog_magazine_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_blog_magazine_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-blog-magazine' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_blog_magazine_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_single_blog_settings',
		'setting'	=> 'vw_blog_magazine_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_blog_magazine_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','vw-blog-magazine' ),
	   'section' => 'vw_blog_magazine_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_blog_magazine_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_single_blog_settings',
		'setting'	=> 'vw_blog_magazine_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-blog-magazine' ),
	    'section' => 'vw_blog_magazine_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_blog_magazine_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_single_blog_settings',
		'setting'	=> 'vw_blog_magazine_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_blog_magazine_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-blog-magazine' ),
	    'section' => 'vw_blog_magazine_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_blog_magazine_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_single_blog_settings',
		'setting'	=> 'vw_blog_magazine_single_time_icon',
		'type'		=> 'icon'
	)));
 
	$wp_customize->add_setting( 'vw_blog_magazine_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	) );

	$wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-blog-magazine' ),
	    'section' => 'vw_blog_magazine_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_blog_magazine_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_blog_magazine_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_blog_magazine_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_single_blog_settings'
    )));

   	$wp_customize->add_setting( 'vw_blog_magazine_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Show / Hide Post Navigation','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_blog_magazine_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS PAGE', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT PAGE', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_blog_magazine_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_blog_magazine_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-blog-magazine'),
		'description'	=> __('Enter a value in %. Example:50%','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_blog_magazine_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-blog-magazine' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_blog_magazine_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_grid_layout_settings',
		'setting'	=> 'vw_blog_magazine_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_blog_magazine_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-blog-magazine' ),
        'section' => 'vw_blog_magazine_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_blog_magazine_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_grid_layout_settings',
		'setting'	=> 'vw_blog_magazine_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_grid_layout_settings'
    )));

   	$wp_customize->add_setting('vw_blog_magazine_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_grid_layout_settings',
		'setting'	=> 'vw_blog_magazine_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_grid_layout_settings'
    )));

  	$wp_customize->add_setting('vw_blog_magazine_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_grid_time_icon',array(
		'label'	=> __('Add Time Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_grid_layout_settings',
		'setting'	=> 'vw_blog_magazine_grid_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_blog_magazine_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_grid_layout_settings'
    )));

 	$wp_customize->add_setting('vw_blog_magazine_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-blog-magazine'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-blog-magazine'),
		'section'=> 'vw_blog_magazine_grid_layout_settings',
		'type'=> 'text'
	)); 

   // other settings
	$OtherParentPanel = new VW_Blog_Magazine_WP_Customize_Panel( $wp_customize, 'vw_blog_magazine_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-blog-magazine' ),
		'panel' => 'vw_blog_magazine_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_blog_magazine_left_right', array(
    	'title'      => esc_html__('General Settings','vw-blog-magazine'),
		'priority'   => 30,
		'panel' => 'vw_blog_magazine_other_panel_id'
	) );

   	// Header Background color
	$wp_customize->add_setting('vw_blog_magazine_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-blog-magazine'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_blog_magazine_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-blog-magazine'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-blog-magazine' ),
			'center top'   => esc_html__( 'Top', 'vw-blog-magazine' ),
			'right top'   => esc_html__( 'Top Right', 'vw-blog-magazine' ),
			'left center'   => esc_html__( 'Left', 'vw-blog-magazine' ),
			'center center'   => esc_html__( 'Center', 'vw-blog-magazine' ),
			'right center'   => esc_html__( 'Right', 'vw-blog-magazine' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-blog-magazine' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-blog-magazine' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-blog-magazine' ),
		),
	));

	$wp_customize->add_setting('vw_blog_magazine_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Image_Radio_Control($wp_customize, 'vw_blog_magazine_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-blog-magazine'),
        'description' => __('Here you can change the width layout of Website.','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_blog_magazine_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-blog-magazine'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-blog-magazine'),
            'Right Sidebar' => __('Right Sidebar','vw-blog-magazine'),
            'One Column' => __('One Column','vw-blog-magazine')
        ),
	) );

	$wp_customize->add_setting( 'vw_blog_magazine_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_left_right'
    )));

	//Sticky Header
	$wp_customize->add_setting( 'vw_blog_magazine_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-blog-magazine' ),
        'section' => 'vw_blog_magazine_left_right'
    )));

    $wp_customize->add_setting('vw_blog_magazine_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_left_right',
		'type'=> 'text'
	));

	//Wow Animation
	$wp_customize->add_setting( 'vw_blog_magazine_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_animation',array(
        'label' => esc_html__( 'Show / Hide Animations','vw-blog-magazine' ),
        'description' => __('Here you can disable overall site animation effect','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_left_right'
    )));

    $wp_customize->add_setting('vw_blog_magazine_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Blog_Magazine_Reset_Custom_Control($wp_customize, 'vw_blog_magazine_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset Footer Settings', 'vw-blog-magazine'),
      'description' => 'vw_blog_magazine_reset_all_settings',
      'section' => 'vw_blog_magazine_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_blog_magazine_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','vw-blog-magazine' ),
        'section' => 'vw_blog_magazine_left_right'
    )));

    $wp_customize->add_setting('vw_blog_magazine_preloader_bg_color', array(
		'default'           => '#25c5b7',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_left_right',
	)));

	$wp_customize->add_setting('vw_blog_magazine_preloader_border_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_left_right',
	)));

	$wp_customize->add_setting('vw_blog_magazine_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_blog_magazine_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_left_right'
	)));

    //404 Page  Setting
	$wp_customize->add_section('vw_blog_magazine_404_page',array(
		'title'	=> __('404 Page Settings','vw-blog-magazine'),
		'panel' => 'vw_blog_magazine_other_panel_id',
	));

	$wp_customize->add_setting('vw_blog_magazine_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_blog_magazine_404_page_title',array(
		'label'	=> __('Add Title','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_blog_magazine_404_page_content',array(
		'label'	=> __('Add Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to Home Page', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_blog_magazine_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-blog-magazine'),
		'panel' => 'vw_blog_magazine_other_panel_id',
	));

	$wp_customize->add_setting('vw_blog_magazine_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_blog_magazine_no_results_page_title',array(
		'label'	=> __('Add Title','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_blog_magazine_no_results_page_content',array(
		'label'	=> __('Add Text','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_blog_magazine_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-blog-magazine'),
		'panel' => 'vw_blog_magazine_other_panel_id',
	));

	$wp_customize->add_setting('vw_blog_magazine_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_social_icon_width',array(
		'label'	=> __('Icon Width','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_social_icon_height',array(
		'label'	=> __('Icon Height','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_blog_magazine_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_blog_magazine_responsive_media',array(
		'title'	=> __('Responsive Media','vw-blog-magazine'),
		'panel' => 'vw_blog_magazine_other_panel_id',
	));

    $wp_customize->add_setting( 'vw_blog_magazine_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-blog-magazine' ),
      'section' => 'vw_blog_magazine_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_blog_magazine_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-blog-magazine' ),
      'section' => 'vw_blog_magazine_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_blog_magazine_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-blog-magazine' ),
      'section' => 'vw_blog_magazine_responsive_media'
    )));

    $wp_customize->add_setting('vw_blog_magazine_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_blog_magazine_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Color', 'vw-blog-magazine'),
		'section'  => 'vw_blog_magazine_responsive_media',
	)));

    $wp_customize->add_setting('vw_blog_magazine_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_responsive_media',
		'setting'	=> 'vw_blog_magazine_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_blog_magazine_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Blog_Magazine_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_blog_magazine_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-blog-magazine'),
		'transport' => 'refresh',
		'section'	=> 'vw_blog_magazine_responsive_media',
		'setting'	=> 'vw_blog_magazine_res_close_menu_icon',
		'type'		=> 'icon'
	)));

   //Woocommerce settings
	$wp_customize->add_section('vw_blog_magazine_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-blog-magazine'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'vw_blog_magazine_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_blog_magazine_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_blog_magazine_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar',
		'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_woocommerce_shop_page_sidebar', ) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_blog_magazine_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_blog_magazine_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-blog-magazine'),
            'Right Sidebar' => __('Right Sidebar','vw-blog-magazine'),
        ),
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'vw_blog_magazine_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar',
    	'render_callback' => 'vw_blog_magazine_customize_partial_vw_blog_magazine_woocommerce_single_product_page_sidebar', ));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_blog_magazine_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-blog-magazine' ),
		'section' => 'vw_blog_magazine_woocommerce_section'
    )));

   	$wp_customize->add_setting('vw_blog_magazine_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-blog-magazine'),
            'Right Sidebar' => __('Right Sidebar','vw-blog-magazine'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_blog_magazine_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_blog_magazine_sanitize_float'
	));
	$wp_customize->add_control('vw_blog_magazine_products_per_page',array(
		'label'	=> __('Products Per Page','vw-blog-magazine'),
		'description' => __('Display on shop page','vw-blog-magazine'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_blog_magazine_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_blog_magazine_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_products_per_row',array(
		'label'	=> __('Products Per Row','vw-blog-magazine'),
		'description' => __('Display on shop page','vw-blog-magazine'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_blog_magazine_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_blog_magazine_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_blog_magazine_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_blog_magazine_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_blog_magazine_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_blog_magazine_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_blog_magazine_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_blog_magazine_sanitize_choices'
	));
	$wp_customize->add_control('vw_blog_magazine_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-blog-magazine'),
        'section' => 'vw_blog_magazine_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-blog-magazine'),
            'right' => __('Right','vw-blog-magazine'),
        ),
	) );

	$wp_customize->add_setting('vw_blog_magazine_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_blog_magazine_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-blog-magazine'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-blog-magazine'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-blog-magazine' ),
        ),
		'section'=> 'vw_blog_magazine_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_blog_magazine_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_blog_magazine_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_blog_magazine_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-blog-magazine' ),
		'section'     => 'vw_blog_magazine_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vw_blog_magazine_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_blog_magazine_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Blog_Magazine_Toggle_Switch_Custom_Control( $wp_customize, 'vw_blog_magazine_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','vw-blog-magazine' ),
        'section' => 'vw_blog_magazine_woocommerce_section'
    )));

	// Has to be at the top
	$wp_customize->register_panel_type( 'VW_Blog_Magazine_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Blog_Magazine_WP_Customize_Section' );
}
add_action( 'customize_register', 'vw_blog_magazine_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Blog_Magazine_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_blog_magazine_panel';
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
  	class VW_Blog_Magazine_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_blog_magazine_section';
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

// Enqueue our scripts and styles
function vw_blog_magazine_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_blog_magazine_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
if ( ! class_exists ( 'VW_Blog_Magazine_Customize' ) ) {
final class VW_Blog_Magazine_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Blog_Magazine_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Blog_Magazine_Customize_Section_Pro($manager,'vw_blog_magazine_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Premium Blog Theme', 'vw-blog-magazine' ),
			'pro_text' => esc_html__( 'Upgrade Pro','vw-blog-magazine' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/best-premium-wordpress-blog-theme/')
		)));

		// Register sections.
		$manager->add_section(new VW_Blog_Magazine_Customize_Section_Pro($manager,'vw_blog_magazine_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-blog-magazine' ),
			'pro_text' => esc_html__( 'Docs', 'vw-blog-magazine' ),
			'pro_url'  => esc_url( 'https://www.vwthemesdemo.com/docs/free-vw-blog-magazine/' )
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-blog-magazine-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-blog-magazine-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );

		wp_localize_script(
		'vw-blog-magazine-customize-controls',
		'vw_blog_magazine_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Blog_Magazine_Customize::get_instance();
}
