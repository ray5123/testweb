<?php

add_action( 'admin_menu', 'adventure_trekking_camp_gettingstarted' );
function adventure_trekking_camp_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'adventure-trekking-camp'), esc_html__('Theme Documentation', 'adventure-trekking-camp'), 'edit_theme_options', 'adventure-trekking-camp-guide-page', 'adventure_trekking_camp_guide');
}

function adventure_trekking_camp_admin_theme_style() {
   wp_enqueue_style('adventure-trekking-camp-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'adventure_trekking_camp_admin_theme_style');

if ( ! defined( 'ADVENTURE_TREKKING_CAMP_SUPPORT' ) ) {
define('ADVENTURE_TREKKING_CAMP_SUPPORT',__('https://wordpress.org/support/theme/adventure-trekking-camp/','adventure-trekking-camp'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_REVIEW' ) ) {
define('ADVENTURE_TREKKING_CAMP_REVIEW',__('https://wordpress.org/support/theme/adventure-trekking-camp/reviews/','adventure-trekking-camp'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_LIVE_DEMO' ) ) {
define('ADVENTURE_TREKKING_CAMP_LIVE_DEMO',__('https://www.ovationthemes.com/demos/adventure-trekking-camp/','adventure-trekking-camp'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_BUY_PRO' ) ) {
define('ADVENTURE_TREKKING_CAMP_BUY_PRO',__('https://www.ovationthemes.com/wordpress/trekking-wordpress-theme/','adventure-trekking-camp'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_PRO_DOC' ) ) {
define('ADVENTURE_TREKKING_CAMP_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-adventure-trekking-camp-pro-doc/','adventure-trekking-camp'));
}
if ( ! defined( 'ADVENTURE_TREKKING_CAMP_THEME_NAME' ) ) {
define('ADVENTURE_TREKKING_CAMP_THEME_NAME',__('Premium Adventure Theme','adventure-trekking-camp'));
}

/**
 * Theme Info Page
 */
function adventure_trekking_camp_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( '' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'adventure-trekking-camp'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'adventure-trekking-camp'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'adventure-trekking-camp'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','adventure-trekking-camp'); ?></h3>
					<p><?php esc_html_e('To step the adventure theme follow the below steps.','adventure-trekking-camp'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','adventure-trekking-camp'); ?></a>

					<h4><?php esc_html_e('2. Setup Header Info','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Header >> Add your phone number and email address.','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_trekking_camp_header') ); ?>" target="_blank"><?php esc_html_e('Add Header Info','adventure-trekking-camp'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','adventure-trekking-camp'); ?></a>

					<h4><?php esc_html_e('4. Setup Footer','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','adventure-trekking-camp'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_trekking_camp_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','adventure-trekking-camp'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','adventure-trekking-camp'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','adventure-trekking-camp'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates. >> Publish it.','adventure-trekking-camp'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','adventure-trekking-camp'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','adventure-trekking-camp'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_trekking_camp_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','adventure-trekking-camp'); ?></a>

					<h4><?php esc_html_e('3. Setup Activities','adventure-trekking-camp'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Select category >> Publish it.','adventure-trekking-camp'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Explore Activity Section Settings >> Select Category','adventure-trekking-camp'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_trekking_camp_our_activities_section') ); ?>" target="_blank"><?php esc_html_e('Add Explore Activity','adventure-trekking-camp'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(ADVENTURE_TREKKING_CAMP_THEME_NAME); ?></h3>
				<img class="adventure_trekking_camp_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'adventure-trekking-camp'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'adventure-trekking-camp'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( ADVENTURE_TREKKING_CAMP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'adventure-trekking-camp'); ?></a>
					<hr>
				</div>
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
		</div>
	</div>

<?php }?>
