<?php
if ( ! function_exists( 'travel_booking_expert_setup' ) ) :
function travel_booking_expert_setup() {

// Root path/URI.
define( 'TRAVEL_BOOKING_EXPERT_PARENT_DIR', get_template_directory() );
define( 'TRAVEL_BOOKING_EXPERT_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR', TRAVEL_BOOKING_EXPERT_PARENT_DIR . '/inc');
define( 'TRAVEL_BOOKING_EXPERT_PARENT_INC_URI', TRAVEL_BOOKING_EXPERT_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

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
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'travel-booking-expert' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-left'  => esc_html__( 'Left Menu', 'travel-booking-expert' ),
		'primary-right'  => esc_html__( 'Right Menu', 'travel-booking-expert' ),
		'responsive-menu'  => esc_html__( 'Responsive Menu', 'travel-booking-expert' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', travel_booking_expert_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'travel_booking_expert_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'travel_booking_expert_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_booking_expert_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_booking_expert_content_width', 1170 );
}
add_action( 'after_setup_theme', 'travel_booking_expert_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function travel_booking_expert_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'travel-booking-expert' ),
		'id' => 'travel-booking-expert-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'travel-booking-expert' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'travel-booking-expert' ),
		'id' => 'travel-booking-expert-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'travel-booking-expert' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );

	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'travel-booking-expert' ),
		'id' => 'travel-booking-expert-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'travel-booking-expert' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
}
add_action( 'widgets_init', 'travel_booking_expert_widgets_init' );

/**
 * All Styles & Scripts.
 */

require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/wptt-webfont-loader.php';

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

/* Excerpt Limit Begin */
function travel_booking_expert_string_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
    array_pop($words);
    return implode(' ', $words);
}

add_filter( 'nav_menu_link_attributes', 'travel_booking_expert_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function travel_booking_expert_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function travel_booking_expert_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="travel-booking-expert-getting-started-notice clearfix">
            <div class="travel-booking-expert-theme-notice-content">
                <h2 class="travel-booking-expert-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'travel-booking-expert' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>
               
                <a class="travel-booking-expert-btn-get-started button button-primary button-hero travel-booking-expert-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=travel-booking-expert-about' )); ?>" ><?php esc_html_e( 'Get started', 'travel-booking-expert' ) ?></a><span class="travel-booking-expert-push-down">
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'travel_booking_expert_activation_notice' );