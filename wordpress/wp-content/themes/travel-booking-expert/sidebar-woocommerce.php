<?php
/**
 * side bar template
 *
 * @package Travel Booking Expert
 */
?>
<?php if ( ! is_active_sidebar( 'travel-booking-expert-woocommerce-sidebar' ) ) {	return; } ?>
<div class="col-lg-4 pl-lg-4 my-5 order-0">
	<div class="sidebar">
		<?php dynamic_sidebar('travel-booking-expert-woocommerce-sidebar'); ?>
	</div>
</div>