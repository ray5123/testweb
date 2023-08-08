<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel Hiking
 */

?>

<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('travel-hiking-footer-sidebar')) {
        echo '<div class="row footer-area">';
          dynamic_sidebar('travel-hiking-footer-sidebar');
        echo '</div>';
      }
    ?>
    <div class="row">
      <div class="col-lg-6 col-md-6 align-self-center">
        <p class="mb-0 py-3 text-center text-md-left">
          <?php
            if (!get_theme_mod('travel_hiking_footer_text') ) { ?>
              <a href="<?php echo esc_url(__('https://www.wpelemento.com/elementor/free-travel-wordpress-theme/', 'travel-hiking' )); ?>" target="_blank">
              <?php esc_html_e('Travel Hiking WordPress Theme','travel-hiking'); ?>
              </a>
         <?php } else {
              echo esc_html(get_theme_mod('travel_hiking_footer_text'));
            }
          ?>
          <?php if ( get_theme_mod('travel_hiking_copyright_enable', true) == true ) : ?>
          <?php
            /* translators: %s: WP Elemento */
            printf( esc_html__( ' By %s', 'travel-hiking' ), 'WP Elemento' ); ?>
          <?php endif; ?>
        </p>
      </div>
      <div class="col-lg-6 col-md-6 align-self-center text-center text-md-right">
        <?php if ( get_theme_mod('travel_hiking_copyright_enable', true) == true ) : ?>
          <a href="<?php echo esc_url(__('https://wordpress.org','travel-hiking') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'travel-hiking' ), 'WordPress' ); ?></a>
        <?php endif; ?>
      </div>
    </div>
    <?php if ( get_theme_mod('travel_hiking_scroll_enable_setting')) : ?>
      <div class="scroll-up">
        <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
      </div>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>