<?php
/**
 * Displays footer widgets if assigned
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 * @version 1.4
 */
?>

<?php //Set widget areas classes based on user choice
    $adventure_trekking_camp_footer_columns = get_theme_mod('adventure_trekking_camp_footer_widget', '4');
    if ($adventure_trekking_camp_footer_columns == '3') {
      $adventure_trekking_camp_cols = 'col-lg-4 col-md-4';
    } elseif ($adventure_trekking_camp_footer_columns == '4') {
      $adventure_trekking_camp_cols = 'col-lg-3 col-md-3';
    } elseif ($adventure_trekking_camp_footer_columns == '2') {
      $adventure_trekking_camp_cols = 'col-lg-6 col-md-6';
    } else {
      $adventure_trekking_camp_cols = 'col-lg-12 col-md-12';
    }
  ?>
	<?php
  if ( is_active_sidebar( 'footer-1' ) ||
    is_active_sidebar( 'footer-2' ) ||
    is_active_sidebar( 'footer-3' ) ||
    is_active_sidebar( 'footer-4' ) ) :
  ?>
		<aside class="widget-area" role="complementary">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="widget-column footer-widget-1 <?php echo esc_attr( $adventure_trekking_camp_cols ); ?>">
            <?php dynamic_sidebar( 'footer-1'); ?>
          </div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
          <div class="widget-column footer-widget-2 <?php echo esc_attr( $adventure_trekking_camp_cols ); ?>">
            <?php dynamic_sidebar( 'footer-2'); ?>
          </div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
          <div class="widget-column footer-widget-3 <?php echo esc_attr( $adventure_trekking_camp_cols ); ?>">
            <?php dynamic_sidebar( 'footer-3'); ?>
          </div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
          <div class="widget-column footer-widget-4 <?php echo esc_attr( $adventure_trekking_camp_cols ); ?>">
            <?php dynamic_sidebar( 'footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
		</aside>
  <?php endif; ?>
