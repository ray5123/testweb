<?php
/**
 * Custom header
 */

function adventure_trekking_camp_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adventure_trekking_camp_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'wp-head-callback'       => 'adventure_trekking_camp_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'adventure_trekking_camp_custom_header_setup' );

if ( ! function_exists( 'adventure_trekking_camp_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see adventure_trekking_camp_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'adventure_trekking_camp_header_style' );
function adventure_trekking_camp_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .menu-header{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'adventure-trekking-camp-style', $custom_css );
	endif;
}
endif;

// Heading

if( class_exists( 'WP_Customize_Control' ) ) {
	class Adventure_Trekking_Camp_Customizer_Customcontrol_Section_Heading extends WP_Customize_Control {
 
 		// Declare the control type.
		public $type = 'section';

		// Render the control to be displayed in the Customizer.
		public function render_content() {
		?>
			<div class="head-customize-section-description cus-head">
				<span class="title head-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( !empty( $this->description ) ) : ?>
				<span class="description-customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
			</div>
		<?php
		}
	}
}