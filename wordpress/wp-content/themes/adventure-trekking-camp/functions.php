<?php
/**
 * Adventure Trekking Camp functions and definitions
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'adventure_trekking_camp_loop_columns', 999);
if (!function_exists('adventure_trekking_camp_loop_columns')) {
	function adventure_trekking_camp_loop_columns() {
		return 3;
	}
}

function adventure_trekking_camp_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}

function adventure_trekking_camp_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function adventure_trekking_camp_callback_sanitize_switch( $value ) {
	
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );

}
function adventure_trekking_camp_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function adventure_trekking_camp_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

if ( ! function_exists( 'adventure_trekking_camp_sanitize_integer' ) ) {
	function adventure_trekking_camp_sanitize_integer( $input ) {
		return (int) $input;
	}
}

function adventure_trekking_camp_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function adventure_trekking_camp_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function adventure_trekking_camp_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<div class="link-more text-center"><a href="%1$s" class="more-link py-2 px-4">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'adventure-trekking-camp' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'adventure_trekking_camp_excerpt_more' );
// post format functions
function adventure_trekking_camp_get_attachment(){
	$output ='';
    if(has_post_thumbnail()):
		 $output =wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
	else:
		$attachments = get_posts(array(
		'post_type' => 'attachment',
		'posts_per_page' => 1,
		'post_parent' => get_the_ID()
	));
		if ($attachments):
			foreach ($attachments as $attachment):
				$output = wp_get_attachment_url($attachment -> ID);
			endforeach;
		endif;
		wp_reset_postdata();
	endif;
	return $output;
	}
//media post format
function adventure_trekking_camp_get_media($type = array()){
	$content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get media from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $content, $type );
    return $output;
  }

}
function adventure_trekking_camp_setup() {

	load_theme_textdomain( 'adventure-trekking-camp', get_template_directory() . '/languages' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'adventure-trekking-camp-featured-image', 2000, 1200, true );
	add_image_size( 'adventure-trekking-camp-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'adventure-trekking-camp' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio','quote',) );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'adventure_trekking_camp_setup' );

function adventure_trekking_camp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'adventure-trekking-camp' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'adventure-trekking-camp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'adventure-trekking-camp' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'adventure-trekking-camp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'adventure-trekking-camp' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-trekking-camp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'adventure-trekking-camp' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-trekking-camp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'adventure-trekking-camp' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-trekking-camp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'adventure-trekking-camp' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'adventure-trekking-camp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'adventure_trekking_camp_widgets_init' );

//Enqueue scripts and styles.
function adventure_trekking_camp_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'adventure-trekking-camp-style', get_stylesheet_uri() );

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'adventure-trekking-camp-style',$adventure_trekking_camp_custom_style );

	//Slick CSS
	wp_enqueue_style( 'slick-style', get_template_directory_uri().'/assets/css/slick.css' );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Block Style
	wp_enqueue_style( 'adventure-trekking-camp-block-style', get_template_directory_uri().'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'adventure-trekking-camp-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Slick JS
	wp_enqueue_script( 'slick-js', get_theme_file_uri( '/assets/js/slick.js' ), array( 'jquery' ),true );

	//Nav Focus JS
	wp_enqueue_script( 'adventure-trekking-camp-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Superfish JS
	wp_enqueue_script( 'superfish-js', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ),true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'adventure-trekking-camp-style', get_stylesheet_uri() );
	wp_style_add_data( 'adventure-trekking-camp-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'adventure_trekking_camp_scripts' );

function adventure_trekking_camp_enqueue_admin_script( $hook ) {

	// Admin JS
	wp_enqueue_script( 'adventure-trekking-camp-admin.js', get_theme_file_uri( '/assets/js/adventure-trekking-camp-admin.js' ), array( 'jquery' ), true );

	wp_localize_script('adventure-trekking-camp-admin.js', 'adventure_trekking_camp_scripts_localize',
        array(
            'ajax_url' => esc_url(admin_url('admin-ajax.php'))
        )
    );
}
add_action( 'admin_enqueue_scripts', 'adventure_trekking_camp_enqueue_admin_script' );

// Enqueue editor styles for Gutenberg
function adventure_trekking_camp_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'adventure-trekking-camp-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );
}
add_action( 'enqueue_block_editor_assets', 'adventure_trekking_camp_block_editor_styles' );

function adventure_trekking_camp_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'adventure_trekking_camp_front_page_template' );

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );

function adventure_trekking_camp_bn_custom_meta_offer() {
  add_meta_box( 'bn_meta', __( 'Trekking Custom Feilds', 'adventure-trekking-camp' ), 'adventure_trekking_camp_meta_callback_trekking', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'adventure_trekking_camp_bn_custom_meta_offer');
}

function adventure_trekking_camp_meta_callback_trekking( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'adventure_trekking_camp_offer_trekking_meta_nonce' );
  $adventure_trekking_camp_bn_stored_meta = get_post_meta( $post->ID );
  $adventure_trekking_camp_trekking_amount = get_post_meta( $post->ID, 'adventure_trekking_camp_trekking_amount', true );
  $adventure_trekking_camp_trekking_rating = get_post_meta( $post->ID, 'adventure_trekking_camp_trekking_rating', true );
  ?>
  <table id="list">
    <tbody id="the-list" data-wp-lists="list:meta">
      <tr id="meta-8">
        <td class="left">
          <?php esc_html_e( 'Trekking Amount', 'adventure-trekking-camp' )?>
        </td>
        <td class="left">
          <input type="text" name="adventure_trekking_camp_trekking_amount" id="adventure_trekking_camp_trekking_amount" value="<?php echo esc_attr($adventure_trekking_camp_trekking_amount); ?>" />
        </td>
      </tr>
      <tr id="meta-8">
        <td class="left">
          <?php esc_html_e( 'Rating', 'adventure-trekking-camp' )?>
        </td>
        <td class="left">
          <input type="text" name="adventure_trekking_camp_trekking_rating" id="adventure_trekking_camp_trekking_rating" value="<?php echo esc_attr($adventure_trekking_camp_trekking_rating); ?>" />
        </td>
      </tr>
    </tbody>
  </table>
  <?php
}

/* Saves the custom meta input */
function adventure_trekking_camp_custom_feild_save( $post_id ) {
  if (!isset($_POST['adventure_trekking_camp_offer_trekking_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['adventure_trekking_camp_offer_trekking_meta_nonce']) ), basename(__FILE__))) {
      return;
  }

  if (!current_user_can('edit_post', $post_id)) {
      return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
  }

  // Save Trip Amount
  if( isset( $_POST[ 'adventure_trekking_camp_trekking_amount' ] ) ) {
      update_post_meta( $post_id, 'adventure_trekking_camp_trekking_amount', strip_tags( wp_unslash( $_POST[ 'adventure_trekking_camp_trekking_amount' ]) ) );
  }
  // Save Trip Days
  if( isset( $_POST[ 'adventure_trekking_camp_trekking_rating' ] ) ) {
      update_post_meta( $post_id, 'adventure_trekking_camp_trekking_rating', strip_tags( wp_unslash( $_POST[ 'adventure_trekking_camp_trekking_rating' ]) ) );
  }
}
add_action( 'save_post', 'adventure_trekking_camp_custom_feild_save' );

function adventure_trekking_camp_notice(){
    global $pagenow;
   	$theme_name = wp_get_theme();
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) && $theme_name->get( 'TextDomain' ) === 'adventure-trekking-camp' ) {
   		wp_safe_redirect( admin_url("themes.php?page=adventure-trekking-camp-guide-page") );
   	}
}
add_action('after_setup_theme', 'adventure_trekking_camp_notice');

function adventure_trekking_camp_add_new_page() {
  $edit_page = admin_url().'post-new.php?post_type=page';
  echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);
  exit;
}
add_action( 'wp_ajax_adventure_trekking_camp_add_new_page','adventure_trekking_camp_add_new_page' );

