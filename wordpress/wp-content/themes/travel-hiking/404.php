<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travel Hiking
 */

get_header(); ?>

<div class="header-image-box text-center">
  <div class="container">
    <?php if ( get_theme_mod('travel_hiking_header_page_title')) : ?>
      <h1><?php esc_html_e('404 Error!', 'travel-hiking'); ?></h1>
    <?php endif; ?>
    <?php if ( get_theme_mod('travel_hiking_header_breadcrumb')) : ?>
      <div class="crumb-box mt-3">
        <?php travel_hiking_the_breadcrumb(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div id="content">
	<div class="container">
		<div class="py-5 text-center">
			<p><?php esc_html_e('The page you are looking for may have been moved, deleted, or possibly never existed.', 'travel-hiking'); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>