<?php
/**
 * Displays footer site info
 *
 * @subpackage Trekking Sports
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info py-4 text-center">
	<?php
		echo esc_html( get_theme_mod( 'adventure_trekking_camp_footer_text' ) );

		printf(
            /* translators: %s: Trekking Sports WordPress Theme. */
            esc_html__( ' %s ', 'trekking-sports' ),
            'Trekking Sports WordPress Theme'
        );
	?>
</div>