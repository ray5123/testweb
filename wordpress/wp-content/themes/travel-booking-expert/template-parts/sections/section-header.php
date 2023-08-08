<header class="main-header">
  <div class="upper-header-area">
  	<div class="container">
    	<?php 
				$topheader_offer_text = get_theme_mod('topheader_offer_text');
				$topheader_email = get_theme_mod( 'topheader_email' );
				$topheader_phoneno = get_theme_mod( 'topheader_phoneno' );
			?>
			<div class="row">
				<div class="col-lg-5 col-md-12 contact text-lg-start text-center">
					<?php if( $topheader_email != ''){?>
						<a href="mailto:<?php echo esc_html( apply_filters('travel_booking_expert_topheader', $topheader_email)); ?>" class="me-3"><i class="fas fa-envelope me-2"></i><?php echo esc_html( apply_filters('travel_booking_expert_topheader', $topheader_email)); ?></a>
					<?php }?>
					<?php if( $topheader_phoneno != ''){?>
						<a href="tel:<?php echo esc_html( apply_filters('travel_booking_expert_topheader', $topheader_phoneno)); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( apply_filters('travel_booking_expert_topheader', $topheader_phoneno)); ?></a>
					<?php }?>
				</div>
				<div class="offset-lg-2 col-lg-5 col-md-12 text-lg-end text-center mt-lg-0 mt-md-0 mt-2">
					<?php if( $topheader_offer_text != ''){?>
						<p class="offer-text"><?php echo esc_html( apply_filters('travel_booking_expert_topheader', $topheader_offer_text)); ?></p>
					<?php }?>
					<?php if ( class_exists('woocommerce') ) { ?>
        		<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="ms-3 myaccount-icon"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','travel-booking-expert' );?></span></a>
        	<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-header-area">	
		<div class="container">
      <nav class="navbar navbar-expand-lg navbaroffcanvase">
    		<div class="navbar-menubar responsive-menu">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','travel-booking-expert'); ?>"> 
          	<i class="fa fa-bars"></i>
          </button>
        	<div class="collapse navbar-collapse navbar-menu">
          	<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php esc_attr_e('Toggle navigation','travel-booking-expert'); ?>"> 
              <i class="fa fa-times"></i>
          	</button> 
						<?php 
		          if(has_nav_menu('responsive-menu')){
		            wp_nav_menu( array( 
		              'theme_location' => 'responsive-menu',
		              'container_class' => 'main-menu clearfix' ,
		              'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
		            ) ); 
		          }
		        ?>
     			</div>
				</div>
      	<div class="row">
      		<div class="col-lg-5">
      			<div class="navbar-menubar left-menu">
              <div class="collapse navbar-collapse navbar-menu">
								<?php 
			              if(has_nav_menu('primary-left')){
			                wp_nav_menu( array( 
			                  'theme_location' => 'primary-left',
			                  'container_class' => 'main-menu clearfix' ,
			                  'menu_class' => 'clearfix',
			                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                  'fallback_cb' => 'wp_page_menu',
			                ) ); 
			              }
			            ?>
                </div>
              </div>
      			</div>
		    		<div class="col-lg-2 col-md-12 px-0 position-relative text-center">
							<div class="logo">
								<?php if(has_custom_logo()) {	
									the_custom_logo();
								} else { ?>
									<h4 class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<?php 
												esc_html(bloginfo('name'));
											?>
										</a>
									</h4>
									<?php
										$travel_booking_expert_site_desc = get_bloginfo( 'description');
										if ($travel_booking_expert_site_desc) : ?>
											
										<p class="site-description"><?php echo esc_html($travel_booking_expert_site_desc); ?></p>
									<?php endif; ?>
								<?php }?>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="navbar-menubar right-menu">
	              <div class="collapse navbar-collapse navbar-menu">
									<?php 
			              if(has_nav_menu('primary-right')){
			                wp_nav_menu( array( 
			                  'theme_location' => 'primary-right',
			                  'container_class' => 'main-menu clearfix' ,
			                  'menu_class' => 'clearfix',
			                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                  'fallback_cb' => 'wp_page_menu',
			                ) ); 
			              }
			            ?>
	              </div>
	            </div>
	          </div>
      	</div>
      </nav>
    </div>
  </div>
</header>