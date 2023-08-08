<section id="slider-section" class="slider-area home-slider">
  <!-- start of hero -->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <?php $travel_booking_expert_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'slider' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $travel_booking_expert_pages[] = $mod;
        }
      }
      if( !empty($travel_booking_expert_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $travel_booking_expert_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()) {
            the_post_thumbnail();
          } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <p><?php $travel_booking_expert_excerpt = get_the_excerpt(); echo esc_html( travel_booking_expert_string_limit_words( $travel_booking_expert_excerpt, 30)); ?></p>
              <div class="read-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html('Explore Now','expert-travel-vlogger'); ?><span class="screen-reader-text"><?php echo esc_html('Explore Now','expert-travel-vlogger'); ?></span></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
    <i class="fas fa-angle-left" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Previous','expert-travel-vlogger'); ?></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
    <i class="fas fa-angle-right" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Next','expert-travel-vlogger'); ?></span>
    </button>
  </div>
  <!-- end of hero slider -->
</section>