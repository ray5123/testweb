<?php 
	$travel_booking_expert_hs_breadcrumb = get_theme_mod('hs_breadcrumb','1');
	
	if($travel_booking_expert_hs_breadcrumb == '1') {
?>
	<?php if ( get_header_image() ) : ?>
		<section class="slider-area breadcrumb-section">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</a>
	        <div class="about-banner-text">
	        	<ol class="breadcrumb-list">
					<?php travel_booking_expert_breadcrumbs(); ?>
				</ol>
				<h1><?php travel_booking_expert_breadcrumb_title(); ?></h1>
	        </div>
	    </section>
    <?php endif; ?>
<?php }else{  ?>
	<section style="padding: 15px 0 15px;"></section>
<?php } ?>