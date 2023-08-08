<?php
//about theme info
add_action( 'admin_menu', 'travel_hiking_gettingstarted' );
function travel_hiking_gettingstarted() {
	add_theme_page( esc_html__('Travel Hiking', 'travel-hiking'), esc_html__('Travel Hiking', 'travel-hiking'), 'edit_theme_options', 'travel_hiking_about', 'travel_hiking_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function travel_hiking_admin_theme_style() {
	wp_enqueue_style('travel-hiking-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('travel-hiking-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'travel_hiking_admin_theme_style');

// Changelog
if ( ! defined( 'TRAVEL_HIKING_CHANGELOG_URL' ) ) {
    define( 'TRAVEL_HIKING_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function travel_hiking_changelog_screen() {	
	global $wp_filesystem;
	$changelog_file = apply_filters( 'travel_hiking_changelog_file', TRAVEL_HIKING_CHANGELOG_URL );
	if ( $changelog_file && is_readable( $changelog_file ) ) {
		WP_Filesystem();
		$changelog = $wp_filesystem->get_contents( $changelog_file );
		$changelog_list = travel_hiking_parse_changelog( $changelog );
		echo wp_kses_post( $changelog_list );
	}
}

function travel_hiking_parse_changelog( $content ) {
	$content = explode ( '== ', $content );
	$changelog_isolated = '';
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}
	$changelog_array = explode( '= ', $changelog_isolated );
	unset( $changelog_array[0] );
	$changelog = '<div class="changelog">';
	foreach ( $changelog_array as $value) {
		$value = preg_replace( '/\n+/', '</span><span>', $value );
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div><hr>';
		$changelog .= str_replace( '<span></span>', '', $value );
	}
	$changelog .= '</div>';
	return wp_kses_post( $changelog );
}

//guidline for about theme
function travel_hiking_mostrar_guide() { 
	//custom function about theme customizer
	$travel_hiking_return = add_query_arg( array()) ;
	$travel_hiking_theme = wp_get_theme( 'travel-hiking' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Travel Hiking', 'travel-hiking' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'travel-hiking' ); ?>: <?php echo esc_html($travel_hiking_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="travel_hiking_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'travel-hiking' ); ?></button>
				<button class="tablinks" onclick="travel_hiking_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Demo Import', 'travel-hiking' ); ?></button>
				<button class="tablinks" onclick="travel_hiking_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'travel-hiking' ); ?></button>
			</div>

			<div id="setup_customizer" class="tabcontent open">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'travel-hiking'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'travel-hiking'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'travel-hiking'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'travel-hiking'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'travel-hiking'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( TRAVEL_HIKING_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'travel-hiking'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'travel-hiking'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'travel-hiking'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( TRAVEL_HIKING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'travel-hiking'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'travel-hiking'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'travel-hiking'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( TRAVEL_HIKING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'travel-hiking'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'travel-hiking' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','travel-hiking'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','travel-hiking'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','travel-hiking'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','travel-hiking'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$plugin_ins = Travel_Hiking_Plugin_Activation_WPElemento_Importer::get_instance();
					$travel_hiking_actions = $plugin_ins->recommended_actions;
					?>
					<div class="travel-hiking-recommended-plugins ">
							<div class="travel-hiking-action-list">
								<?php if ($travel_hiking_actions): foreach ($travel_hiking_actions as $key => $travel_hiking_actionValue): ?>
										<div class="travel-hiking-action" id="<?php echo esc_attr($travel_hiking_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($travel_hiking_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($travel_hiking_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($travel_hiking_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h2><?php esc_html_e( 'Welcome to Elemento Theme!', 'travel-hiking' ); ?></h2>
						<p><?php esc_html_e( 'For setup the theme, First you need to click on the Begin activating plugins', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '1. Install Kirki Customizer Framework ', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '>> Then click to Return to Required Plugins Installer ', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '2. Install WPElemento Importer', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '>> Then click to Return to Required Plugins Installer ', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '3. Activate Kirki Customizer Framework ', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '4. Activate WPElemento Importer ', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '>> Then click to Return to the Dashboard', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '>> Click on the start now button', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '>> Click install plugins', 'travel-hiking' ); ?></p>
						<p><?php esc_html_e( '>> Click import demo button to setup the theme and click visit your site button', 'travel-hiking' ); ?></p>
					</div>
				<?php } ?>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php travel_hiking_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'travel-hiking'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Travel Hiking WordPress Theme', 'travel-hiking'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( TRAVEL_HIKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'travel-hiking'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( TRAVEL_HIKING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'travel-hiking'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( TRAVEL_HIKING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Doc', 'travel-hiking'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'travel-hiking'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'travel-hiking' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'travel-hiking' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'travel-hiking' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'travel-hiking' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'travel-hiking' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'travel-hiking' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'travel-hiking'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( TRAVEL_HIKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'travel-hiking'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'travel-hiking' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>