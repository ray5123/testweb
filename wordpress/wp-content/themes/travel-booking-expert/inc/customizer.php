<?php
/**
 * Travel Booking Expert Theme Customizer.
 *
 * @package Travel Booking Expert
 */

 if ( ! class_exists( 'Travel_Booking_Expert_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Travel_Booking_Expert_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'travel_booking_expert_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'travel_booking_expert_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'travel_booking_expert_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'travel_booking_expert_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function travel_booking_expert_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function travel_booking_expert_customize_preview_js() {
			wp_enqueue_script( 'travel-booking-expert-customizer', TRAVEL_BOOKING_EXPERT_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		
		function travel_booking_expert_customizer_script() {
			 wp_enqueue_script( 'travel-booking-expert-customizer-section', TRAVEL_BOOKING_EXPERT_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function travel_booking_expert_customizer_settings() {	
			require TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR . '/customizer/customizer-options/header.php';
			require TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR . '/customizer/customizer-options/frontpage.php';
			require TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR . '/customizer/customizer-options/general.php';
			require TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR . '/customizer/customizer-options/footer.php';
			require TRAVEL_BOOKING_EXPERT_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Travel_Booking_Expert_Customizer::get_instance();