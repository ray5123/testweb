<?php
/**
 * Theme functions and definitions
 *
 * @package adventure_tour
 */

if ( ! function_exists( 'adventure_tour_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function adventure_tour_enqueue_styles() {
		wp_enqueue_style( 'adventure-trekking-camp-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'adventure-tour-style', get_stylesheet_directory_uri() . '/style.css', array( 'adventure-trekking-camp-style-parent' ), '1.0.0' );

		// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'adventure-tour-style',$adventure_trekking_camp_custom_style );

	}
endif;
add_action( 'wp_enqueue_scripts', 'adventure_tour_enqueue_styles', 99 );

function adventure_tour_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'adventure-tour-featured-image', 2000, 1200, true );
	add_image_size( 'adventure-tour-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'adventure-tour' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'adventure_tour_setup' );

function adventure_tour_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'adventure-tour' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'adventure-tour' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'adventure-tour' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'adventure-tour' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'adventure-tour' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'adventure-tour' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'adventure-tour' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'adventure-tour' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'adventure-tour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'adventure_tour_widgets_init' );

function adventure_tour_customize_register() {
  	global $wp_customize;
	$wp_customize->remove_section( 'adventure_trekking_camp_pro' );
	$wp_customize->remove_section( 'adventure_trekking_camp_product_box_section' );
}
add_action( 'customize_register', 'adventure_tour_customize_register', 11 );

function adventure_tour_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	$wp_customize->add_section('adventure_tour_pro', array(
		'title'    => __('UPGRADE ADVENTURE PREMIUM', 'adventure-tour'),
		'priority' => 1,
	));

	$wp_customize->add_setting('adventure_tour_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Adventure_Tour_Pro_Control($wp_customize, 'adventure_tour_pro', array(
		'label'    => __('ADVENTURE TOUR PREMIUM', 'adventure-tour'),
		'section'  => 'adventure_tour_pro',
		'settings' => 'adventure_tour_pro',
		'priority' => 1,
	)));

	// Services Section
	$wp_customize->add_section( 'adventure_tour_services_section' , array(
    	'title'      => __( 'Services Settings', 'adventure-tour' ),
		'priority'   => 4,
	) );

	$adventure_tour_args = array('numberposts' => -1);
	$adventure_tour_post_list = get_posts($adventure_tour_args);
	$s = 0;
	$adventure_tour_pst_sls[]= __('Select','adventure-tour');
	foreach ($adventure_tour_post_list as $key => $adventure_tour_p_post) {
		$adventure_tour_pst_sls[$adventure_tour_p_post->ID]=$adventure_tour_p_post->post_title;
	}
	for ( $s = 1; $s <= 4; $s++ ) {
		$wp_customize->add_setting('adventure_tour_mid_section_icon'.$s,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('adventure_tour_mid_section_icon'.$s,array(
			'label' => esc_html__('Icon','adventure-tour'),
			'description' => esc_html__('Add the fontawesome class to add icon ex: fas fa-envelope','adventure-tour'),
			'section' => 'adventure_tour_services_section',
			'setting' => 'adventure_tour_mid_section_icon',
			'type'    => 'text'
		));

		$wp_customize->add_setting('adventure_tour_services_sec_settigs'.$s,array(
			'sanitize_callback' => 'adventure_trekking_camp_sanitize_select',
		));
		$wp_customize->add_control('adventure_tour_services_sec_settigs'.$s,array(
			'type'    => 'select',
			'choices' => $adventure_tour_pst_sls,
			'label' => __('Select post','adventure-tour'),
			'section' => 'adventure_tour_services_section',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting( 'adventure_tour_services_images', array(
       'default' => '',
       'transport' => 'refresh',
       'sanitize_callback' => 'esc_url_raw'
    ));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'adventure_tour_services_images', array(
       'label'	=> esc_html__('Service Right Image ','adventure-tour'),
       'section' => 'adventure_tour_services_section',
    ) ) );
    //theme width
	$wp_customize->add_section('adventure_tour_theme_width_settings',array(
        'title' => __('Theme Width Option', 'adventure-tour'),
        'priority' => 2,
    ) );

}
add_action( 'customize_register', 'adventure_tour_customize' );

function adventure_tour_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action('wp_enqueue_scripts', 'adventure_tour_enqueue_comments_reply');

if ( ! defined( 'ADVENTURE_TOUR_PRO_LINK' ) ) {
	define('ADVENTURE_TOUR_PRO_LINK',__('https://www.ovationthemes.com/wordpress/adventure-tour-wordpress-theme/','adventure-tour'));
}

if ( ! defined( 'ADVENTURE_TREKKING_CAMP_SUPPORT' ) ) {
define('ADVENTURE_TREKKING_CAMP_SUPPORT',__('https://wordpress.org/support/theme/adventure-tour','adventure-tour'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_REVIEW' ) ) {
define('ADVENTURE_TREKKING_CAMP_REVIEW',__('https://wordpress.org/support/theme/adventure-tour/reviews/','adventure-tour'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_LIVE_DEMO' ) ) {
define('ADVENTURE_TREKKING_CAMP_LIVE_DEMO',__('https://www.ovationthemes.com/demos/adventure-tour/','adventure-tour'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_BUY_PRO' ) ) {
define('ADVENTURE_TREKKING_CAMP_BUY_PRO',__('https://www.ovationthemes.com/wordpress/adventure-tour-wordpress-theme/','adventure-tour'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_PRO_DOC' ) ) {
define('ADVENTURE_TREKKING_CAMP_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-adventure-tour-pro-doc/','adventure-tour'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_THEME_NAME' ) ) {
define('ADVENTURE_TREKKING_CAMP_THEME_NAME',__('Premium Adventure Theme','adventure-tour'));
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Adventure_Tour_Pro_Control')):
    class Adventure_Tour_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( ADVENTURE_TOUR_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ADVENTURE PREMIUM','adventure-tour');?> </a>
            </div>
            <div class="col-md">
                <img class="adventure_tour_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('ADVENTURE TOUR PREMIUM - Features', 'adventure-tour'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'adventure-tour');?> </li>
                    <li class="upsell-adventure_tour"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'adventure-tour');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( ADVENTURE_TOUR_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ADVENTURE PREMIUM','adventure-tour');?> </a>
            </div>
        </label>
    <?php } }
endif;

// search bar

add_filter('get_search_form', 'adventure_tour_search_form');

function adventure_tour_search_form($form) {
    $form = '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" class="search-form">
        <input type="search" name="s" tabindex="-1" class="search-field" placeholder="Search" value="' . esc_attr( get_search_query() ) . '" required>
        <button type="submit" id="search-submit" class="search-submit" tabindex="-1"><i class="fa fa-search"></i></button>
        </form>';
return $form;
}
