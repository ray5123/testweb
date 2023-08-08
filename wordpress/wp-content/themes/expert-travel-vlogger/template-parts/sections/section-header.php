<header class="main-header">
  <div class="upper-header-area">
  	<div class="container">
    	<?php
    		$topheader_facebook = get_theme_mod( 'topheader_facebook' );
    		$topheader_twitter = get_theme_mod( 'topheader_twitter' );
    		$topheader_pintrest = get_theme_mod( 'topheader_pintrest' );
    		$topheader_linkdin = get_theme_mod( 'topheader_linkdin' );
				$topheader_email = get_theme_mod( 'topheader_email' );
				$topheader_phoneno = get_theme_mod( 'topheader_phoneno' );
				$header_button_url = get_theme_mod( 'header_button_url' );
				$header_button_text = get_theme_mod( 'header_button_text' );
			?>
			<div class="row">
				<div class="col-lg-7 col-md-7 text-lg-start text-center mt-lg-0 mt-md-0 mt-2">
					<?php if( $topheader_pintrest != ''){?>
						<a href="<?php echo apply_filters('travel_booking_expert_topheader', $topheader_pintrest); ?>" class="me-3"><i class="fab fa-pinterest-p"></i></a>
					<?php }?>
					<?php if( $topheader_facebook != ''){?>
						<a href="<?php echo apply_filters('travel_booking_expert_topheader', $topheader_facebook); ?>" class="me-3"><i class="fab fa-facebook-f"></i></a>
					<?php }?>
					<?php if( $topheader_twitter != ''){?>
						<a href="<?php echo apply_filters('travel_booking_expert_topheader', $topheader_twitter); ?>" class="me-3"><i class="fab fa-twitter"></i></a>
					<?php }?>
					<?php if( $topheader_linkdin != ''){?>
						<a href="<?php echo apply_filters('travel_booking_expert_topheader', $topheader_linkdin); ?>" class="me-3"><i class="fab fa-linkedin-in"></i></a>
					<?php }?>
				</div>
				<div class="col-lg-5 col-md-5 contact text-lg-end text-center">
					<?php if( $topheader_email != ''){?>
						<a href="mailto:<?php echo apply_filters('travel_booking_expert_topheader', $topheader_email); ?>" class="me-3"><i class="fas fa-envelope me-2"></i><?php echo apply_filters('travel_booking_expert_topheader', $topheader_email); ?></a>
					<?php }?>
					<?php if( $topheader_phoneno != ''){?>
						<a href="tel:<?php echo apply_filters('travel_booking_expert_topheader', $topheader_phoneno); ?>"><i class="fas fa-phone me-2"></i><?php echo apply_filters('travel_booking_expert_topheader', $topheader_phoneno); ?></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-header-area mb-2">	
		<div class="container">
      <nav class="navbar navbar-expand-lg navbaroffcanvase">
    		<div class="navbar-menubar responsive-menu">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','expert-travel-vlogger'); ?>"> 
          	<i class="fa fa-bars"></i>
          </button>
        	<div class="collapse navbar-collapse navbar-menu">
          	<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','expert-travel-vlogger'); ?>"> 
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
	    		<div class="col-lg-3 col-md-3 px-0 align-self-center">
						<div class="logo">
							<?php if(has_custom_logo()) {	
								the_custom_logo();
							} else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<h4 class="site-title">
										<?php 
											echo esc_html(bloginfo('name'));
										?>
									</h4>
								</a>	
								<?php
									$travel_booking_expert_site_desc = get_bloginfo( 'description');
									if ($travel_booking_expert_site_desc) : ?>
									<p class="site-description"><?php echo esc_html($travel_booking_expert_site_desc); ?></p>
								<?php endif; ?>
							<?php }?>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 align-self-center">
						<div class="row">
							<div class="col-lg-9 align-self-center">
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
		          <div class="col-lg-3 align-self-center text-lg-end text-center">
		          	<?php if( $header_button_url != '' || $header_button_text != '' ){?>
									<a class="topheader_btn" href="<?php echo apply_filters('travel_booking_expert_topheader', $header_button_url); ?>" class="me-3"></i><?php echo apply_filters('travel_booking_expert_topheader', $header_button_text); ?></a>
								<?php }?>
		          </div>
	          </div>
          </div>
      	</div>
      </nav>
    </div>
  </div>
</header>