<?php
/**
 * Displays footer site info
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">

    <?php
        echo esc_html( get_theme_mod( 'adventure_trekking_camp_footer_text' ) );
        printf(
            /* translators: %s: Adventure WordPress Theme. */
            '<a target="_blank" href="' . esc_url( 'https://www.ovationthemes.com/wordpress/free-adventure-wordpress-theme/') . '"> %s</a>',
            esc_html__( 'Adventure WordPress Theme', 'adventure-trekking-camp' )
        );
    ?>

</div>
