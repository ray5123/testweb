<?php
/**
 * Template for displaying search forms in Adventure Trekking Camp
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */
?>

<?php $adventure_trekking_camp_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'adventure-trekking-camp' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'adventure-trekking-camp' ); ?></button>
</form>