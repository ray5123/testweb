<?php
/**
 * The header for our theme
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adventure-trekking-camp' ); ?></a>
	<?php if( get_option('adventure_trekking_camp_theme_loader') == '1'){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div class="menu-header fixed_header py-2">
			<div class="container-fluid">
				<div class="menu-header-inner">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-4 col-4 mb-2 mb-md-0">
							<div class="logo text-center py-3 py-lg-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $adventure_trekking_camp_blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $adventure_trekking_camp_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
												<?php if( get_option('adventure_trekking_camp_logo_title','') != 'off' ){ ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
																	<?php }?>
						                  	<?php else : ?>
												<?php if( get_option('adventure_trekking_camp_logo_title','') != 'off' ){ ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
																		<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>
						                <?php
					                  		$adventure_trekking_camp_description = get_bloginfo( 'description', 'display' );
						                  	if ( $adventure_trekking_camp_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('adventure_trekking_camp_logo_text','') != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($adventure_trekking_camp_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
						    </div>							
						</div>
						<div class="col-lg-3 col-md-4 col-sm-8 col-8 align-self-center">
							<?php if( get_theme_mod('adventure_trekking_camp_location_text') != '' || get_theme_mod('adventure_trekking_camp_location_address') != ''){ ?>
								<div class="row address-box">
									<div class="col-lg-2 col-md-2 col-sm-2 align-self-center text-md-right">
										<i class="fas fa-map-marker-alt"></i>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 align-self-center">
										<h6 class="mb-0"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_location_text','')); ?></h6>
										<p class="mb-md-0"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_location_address','')); ?></p>
									</div>
								</div>
							<?php }?>
						</div>
						<div class="col-lg-5 col-md-2 col-sm-2 col-6 p-0 align-self-center">
							<?php if(has_nav_menu('primary')){?>
								<div class="toggle-menu gb_menu text-center text-md-left">
									<button onclick="adventure_trekking_camp_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','adventure-trekking-camp'); ?></p></button>
								</div>
							<?php }?>
							<?php get_template_part('template-parts/navigation/navigation'); ?>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-3 col-6 align-self-center">
		                  	<div class="linksbox text-md-right text-center">
								<?php if( get_theme_mod('adventure_trekking_camp_button_link') != '' || get_theme_mod('adventure_trekking_camp_button_text') != ''){ ?>
									<a href="<?php echo esc_url(get_theme_mod('adventure_trekking_camp_button_link','')); ?>"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_button_text','')); ?></a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>