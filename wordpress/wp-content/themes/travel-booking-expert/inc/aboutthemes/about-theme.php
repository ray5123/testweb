<?php
/**
 * Theme Page
 *
 * @package Travel Booking Expert
 */

if ( ! defined( 'TRAVEL_BOOKING_EXPERT_FREE_THEME_URL' ) ) {
	define( 'TRAVEL_BOOKING_EXPERT_FREE_THEME_URL', 'https://www.seothemesexpert.com/wordpress/free-travel-wordpress-themes/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_PRO_THEME_URL' ) ) {
	define( 'TRAVEL_BOOKING_EXPERT_PRO_THEME_URL', 'https://www.seothemesexpert.com/wordpress/travel-booking-website-template/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_DEMO_THEME_URL' ) ) {
	define( 'TRAVEL_BOOKING_EXPERT_DEMO_THEME_URL', 'https://seothemesexpert.com/demo/travel-booking-expert/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_DOCS_THEME_URL' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_DOCS_THEME_URL', 'https://www.seothemesexpert.com/docs/travel-booking-website-template-pro/' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_RATE_THEME_URL' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_RATE_THEME_URL', 'https://wordpress.org/support/theme/travel-booking-expert/reviews/#new-post' );
}
if ( ! defined( 'TRAVEL_BOOKING_EXPERT_SUPPORT_THEME_URL' ) ) {
    define( 'TRAVEL_BOOKING_EXPERT_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/travel-booking-expert/' );
}

/**
 * Add theme page
 */
function travel_booking_expert_menu() {
	add_theme_page( esc_html__( 'About Theme', 'travel-booking-expert' ), esc_html__( 'About Theme', 'travel-booking-expert' ), 'edit_theme_options', 'travel-booking-expert-about', 'travel_booking_expert_about_display' );
}
add_action( 'admin_menu', 'travel_booking_expert_menu' );

/**
 * Display About page
 */
function travel_booking_expert_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'travel-booking-expert' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'travel-booking-expert-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'travel-booking-expert-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'travel-booking-expert' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'travel-booking-expert-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'travel-booking-expert' ); ?></a>
		</nav>

		<?php
			travel_booking_expert_main_screen();

			travel_booking_expert_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'travel-booking-expert' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'travel-booking-expert' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'travel-booking-expert' ) : esc_html_e( 'Go to Dashboard', 'travel-booking-expert' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function travel_booking_expert_main_screen() {
	if ( isset( $_GET['page'] ) && 'travel-booking-expert-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'travel-booking-expert' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'travel-booking-expert' ) ?><span class="usecode">" STEPro10 "</span></p>
					<p><a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'travel-booking-expert' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'travel-booking-expert' ); ?></h2>
					<p><?php esc_html_e( 'Know more about travel booking expert.', 'travel-booking-expert' ) ?></p>
					<p><a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'travel-booking-expert' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'travel-booking-expert' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'travel-booking-expert' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'travel-booking-expert' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'travel-booking-expert' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'travel-booking-expert' ) ?></p>
					<p><a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'travel-booking-expert' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'travel-booking-expert' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'travel-booking-expert' ) ?></p>
					<p><a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'travel-booking-expert' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $travel_booking_expert_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $travel_booking_expert_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'travel-booking-expert' ); ?>: <?php echo esc_html($travel_booking_expert_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'travel-booking-expert' ); ?></a>

						<a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'travel-booking-expert' ); ?></a>

						<a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'travel-booking-expert' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $travel_booking_expert_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function travel_booking_expert_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'travel-booking-expert' ); ?></a>

					<a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'travel-booking-expert' ); ?></a>

					<a href="<?php echo esc_url( TRAVEL_BOOKING_EXPERT_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'travel-booking-expert' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'travel-booking-expert' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'travel-booking-expert' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'travel-booking-expert' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'travel-booking-expert' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'travel-booking-expert' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(TRAVEL_BOOKING_EXPERT_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'travel-booking-expert' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
