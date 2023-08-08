<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travel Booking Expert
 */

get_header(); ?>

<section class="error-area">
	<div class="container">
		<div class="error-item text-center">
			<h2><?php esc_html_e('Page Not Found','travel-booking-expert'); ?></h2>
			<p><?php esc_html_e('The page you were looking for could not be found.','travel-booking-expert'); ?></p>
			<a class="theme-button back-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Go to Home','travel-booking-expert'); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>