<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travel Fse
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'TRAVEL_FSE_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'TRAVEL_FSE_DIR', trailingslashit( get_template_directory_uri() ) );

if( !class_exists( 'Travel_Fse_Theme' ) ){
    class Travel_Fse_Theme{

        protected static $instance = null;

        public static function get_instance(){
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct(){

            add_action( 'after_setup_theme', array( $this, 'travel_fse_setup' ) );
            add_filter( 'excerpt_length', array( $this, 'travel_fse_excerpt_length' ) );
            add_filter( 'post_thumbnail_html', array( $this, 'fallback_post_thumbnail_html' ), 20, 5 );

            $modules = array(
                'script',
                'admin-info'
            );

            $this->require($modules);

            $modules = array( 
                'script-loader',
                'pattern-category'
            );
            $this->require( $modules, 'inc' );

            $modules = array( 
                'tgmpa-hook'
            );
            $this->require( $modules, 'inc/tgm-plugin' );

        }

        /**
         * Add theme support.
         */
        public function travel_fse_setup() {

            load_theme_textdomain( 'travel-fse', get_template_directory() . '/languages' );

             // Add support for block styles.
            add_theme_support( 'wp-block-styles' );
            // Enqueue editor styles.
            add_editor_style('./style.css');

        }

        public function travel_fse_excerpt_length( $length ){ 

            $excerpt_length = 30;
            if ( is_admin() ) return $length;
            return $excerpt_length;
        }

                /**
         * Set the default image if none exists.
         *
         * @param string $html              The post thumbnail HTML.
         * @param int    $post_id           The post ID.
         * @param int    $post_thumbnail_id The post thumbnail ID.
         * @return html
         */
        public function fallback_post_thumbnail_html( $html, $post_id, $post_thumbnail_id ) {
            
            if ( empty( $html ) ) {
                $html = '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/default-image.jpg" loading="lazy" alt="' . get_the_title( $post_id ) . '" style="height:'. 'auto' . ';object-fit:inherit;" />';
            }

            return $html;
        }


        /**
         * Require files dynamically.
         *
         * @param array  $files Files to require.
         * @param string $base  Base directory.
         */
        public function require( $files, $base = 'class' ) { 
            foreach( $files as $file ) {
                $path = $base . '/' . $file . '.php';
                require_once get_theme_file_path( $path );
            }
        }

    }
}

if( !function_exists( "travel_fse_theme" ) ){
    function travel_fse_theme(){
        return Travel_Fse_Theme::get_instance();
    }
    travel_fse_theme();
}