<?php if(get_theme_mod('travel_booking_expert_small_title') != '' || get_theme_mod('travel_booking_expert_section_title') != '' || get_theme_mod('travel_booking_expert_section_text') != '' || get_theme_mod('travel_booking_expert_product_category') != '') {?>
	<section id="tourist-section" class="py-5">
		<div class="container"> 
			<div class="tourist-head text-center mb-5">
				<?php if(get_theme_mod('travel_booking_expert_small_title') != '') {?>
					<span class="small-title"><?php echo esc_html(get_theme_mod('travel_booking_expert_small_title')); ?></span>
				<?php }?>
				<?php if(get_theme_mod('travel_booking_expert_section_title') != '') {?>
					<h2><?php echo esc_html(get_theme_mod('travel_booking_expert_section_title')); ?></h2>
				<?php }?>
				<?php if(get_theme_mod('travel_booking_expert_section_text') != '') {?>
					<p><?php echo esc_html(get_theme_mod('travel_booking_expert_section_text')); ?></p>
				<?php }?>
			</div>
			<div class="row m-0">
				<?php if ( class_exists( 'WooCommerce' ) && get_theme_mod('travel_booking_expert_product_category') != '' ) {?>
			        <div class="products-category">
			            <div class="row">
			              	<?php $args = array( 
				                'post_type' => 'product',
				                'product_cat' => get_theme_mod('travel_booking_expert_product_category'),
				                'order' => 'ASC'
			              	);
			              	$loop = new WP_Query( $args );
			              	while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
			                <div class="col-lg-3 col-md-6">
			                  	<div class="product-box position-relative mb-3">
			                    	<div class="product-image">
			                      		<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
			                    	</div>
				                    <div class="dest-name row mx-0 py-2 mb-2">
				                    	<div class="col-lg-7 col-md-7 col-7 align-self-center px-2">
					                    	<h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
					                    </div>
					                    <div class="col-lg-5 col-md-5 col-5 align-self-center px-2">
					                    	<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></p>
					                    </div>
					                </div>
			                    	<p><?php $travel_booking_expert_excerpt = get_the_excerpt(); echo esc_html( travel_booking_expert_string_limit_words( $travel_booking_expert_excerpt, 8)); ?></p>
			                    	<?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
				                    <div class="more-button">
				                      	<a href="<?php the_permalink(); ?>"><?php echo esc_html('More Info', 'travel-booking-expert'); ?><span class="screen-reader-text"><?php echo esc_html('More Info', 'travel-booking-expert'); ?></span></a>
				                    </div>
			                  	</div>
			                </div>
			              <?php endwhile; wp_reset_query(); ?>
			            </div>
			        </div>
		        <?php } ?>
		    </div>
		</div>
	</section>
<?php }?>