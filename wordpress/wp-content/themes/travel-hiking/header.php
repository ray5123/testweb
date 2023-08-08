<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel Hiking
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travel-hiking' ); ?></a>

<div class="topheader">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-6 text-md-left text-center align-self-center adver-text py-2">
				<?php if ( get_theme_mod('travel_hiking_header_advertisement_text') ) : ?>
					<p class="mb-0"><?php echo esc_html( get_theme_mod('travel_hiking_header_advertisement_text' ) ); ?><a href="<?php echo esc_url( get_theme_mod('travel_hiking_header_hiring_url' ) ); ?>"><?php echo esc_html( get_theme_mod('travel_hiking_header_hiring_text' ) ); ?></a></p>
				<?php endif; ?>
			</div>
			<div class="col-lg-5 col-md-6 col-sm-6 align-self-center text-center text-md-right py-2">
				<?php if ( get_theme_mod('travel_hiking_header_email') ) : ?>
					<span class="mr-4" ><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('travel_hiking_header_email' ) ); ?></span>
				<?php endif; ?>
				<?php if ( get_theme_mod('travel_hiking_header_phone_number') ) : ?>
					<span ><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('travel_hiking_header_phone_number' ) ); ?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<header id="site-navigation" class="header text-center  py-2 <?php if( get_theme_mod( 'travel_hiking_sticky_header',false) != '') { ?>sticky-header<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-3 align-self-center">
				<div class="logo text-center text-md-left mb-3 mb-md-0">
		    		<div class="logo-image">
		    			<?php the_custom_logo(); ?>
			    	</div>
			    	<div class="logo-content">
						<?php
							if ( get_theme_mod('travel_hiking_display_header_title', true) == true ) :
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
								echo esc_attr(get_bloginfo('name'));
								echo '</a>';
							endif;
							if ( get_theme_mod('travel_hiking_display_header_text', true) == true ) :
								echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
							endif;
						?>
					</div>
				</div>
		   	</div>
			<div class="col-lg-8 col-md-7 col-sm-6 align-self-center">
				<?php if(has_nav_menu('main-menu')){ ?>
					<button class="menu-toggle my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><?php esc_html_e( 'Menu', 'travel-hiking' ); ?></span>
					</button>
					<nav id="main-menu" class="close-panal">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => 'false'
							));
						?>
						<button class="close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				<?php }?>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 align-self-center mt-2 mt-md-0">	
				<?php if ( get_theme_mod('travel_hiking_login_enable', 'on' ) == true ) : ?>
					<span class="my-account mr-2">
						<?php if(class_exists('woocommerce')){ ?>
							<?php if ( is_user_logged_in() ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','travel-hiking'); ?>"><i class="fas fa-user"></i></a>
							<?php }
							else { ?>
								<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','travel-hiking'); ?>"><i class="fas fa-sign-in-alt"></i></a>
							<?php } ?>
						<?php }?>
					</span>
				<?php endif; ?>	
				<?php if ( get_theme_mod('travel_hiking_cart_box_enable', 'on' ) == true ) : ?>
					<?php if ( class_exists( 'woocommerce' ) ) {?>
						<span class="header-cart">
							<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','travel-hiking' ); ?>"><i class="fas fa-shopping-bag mr-1"></i></a>
						</span>
					<?php }?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>