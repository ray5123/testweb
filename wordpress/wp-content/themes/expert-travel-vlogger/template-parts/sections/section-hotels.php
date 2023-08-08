<section id="top-hotel-section" class="second-main-box py-5">
  <div class="container">
    <?php
      $hotel_section_title = get_theme_mod( 'hotel_section_title' );
    ?>
    <?php if( $hotel_section_title != ''){?>
      <h3 class="text-center pb-4"><?php echo apply_filters('travel_booking_expert_hotel_section', $hotel_section_title); ?></h3>
    <?php }?>
    <?php
      for ( $s = 1; $s <= 3; $s++ ) {
        $expert_travel_vlogger_mod =  get_theme_mod( 'hotel_section_settigs' .$s );
        if ( 'page-none-selected' != $expert_travel_vlogger_mod ) {
          $expert_travel_vlogger_post[] = $expert_travel_vlogger_mod;
        }
      }
       if( !empty($expert_travel_vlogger_post) ) :
      $expert_travel_vlogger_args = array(
        'post_type' =>array('post','page'),
        'post__in' => $expert_travel_vlogger_post
      );
      $expert_travel_vlogger_query = new WP_Query( $expert_travel_vlogger_args );
      if ( $expert_travel_vlogger_query->have_posts() ) :
        $s = 1;
    ?>
    <div class="row">
      <?php  while ( $expert_travel_vlogger_query->have_posts() ) : $expert_travel_vlogger_query->the_post(); ?>
        <div class="col-lg-4 col-md-4 mb-4">
          <div class="inner-box-image ">
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="inner-box-icon">
              <i class="fas fa-play"></i>
            </div>
          </div>
          <div class="inner-box p-3">
            <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
            <p><?php $travel_booking_expert_excerpt = get_the_excerpt(); echo esc_html( travel_booking_expert_string_limit_words( $travel_booking_expert_excerpt, 10)); ?></p>
          </div>
        </div>
      <?php $s++; endwhile; ?>
    </div>
    <?php wp_reset_postdata();
    else : ?>
    <div class="no-postfound"></div>
      <?php endif;
    endif;?>
  </div>
</section>