<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <div id="slider"> 
    <div class="slider">
      <?php
      $adventure_trekking_camp_slider_image = get_theme_mod('adventure_trekking_camp_slider_counter','');
      for ( $i = 1; $i <= $adventure_trekking_camp_slider_image; $i++ ){ ?>
        <div class="slider-image-box" data-dot-img="<?php echo esc_url(get_theme_mod('adventure_trekking_camp_slider_images'.$i)); ?>">
          <img src="<?php echo esc_url(get_theme_mod('adventure_trekking_camp_slider_images'.$i)); ?>" class="slide-image"/>
          <div class="slider-content slider-inner align-self-center">
            <?php if ( get_theme_mod('adventure_trekking_camp_slider_sub_heading'.$i) ) : ?>
              <h2><?php echo esc_html(get_theme_mod('adventure_trekking_camp_slider_sub_heading'.$i));?></h2>
            <?php endif; ?>
            <?php if ( get_theme_mod('adventure_trekking_camp_slider_main_heading'.$i) ) : ?>
              <h1 class="my-md-3"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_slider_main_heading'.$i));?></h1>
            <?php endif; ?>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
                <div class="slider-button my-3 my-md-5">
                  <?php if ( get_theme_mod('adventure_trekking_camp_slider_button_url'.$i, true) == true || get_theme_mod('adventure_trekking_camp_slider_button_text'.$i, true) == true ) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('adventure_trekking_camp_slider_button_url'.$i));?>"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_slider_button_text'.$i));?></a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
                <?php if( get_theme_mod('adventure_trekking_camp_call_text') != '' || get_theme_mod('adventure_trekking_camp_call_phone_number') != ''){ ?>
                  <div class="row phone-call">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
                      <i class="fas fa-phone"></i>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-9 align-self-center">
                      <h6 class="mb-0"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_call_text','')); ?></h6>
                      <p class="mb-0"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_call_phone_number','')); ?></p>
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="search-box">
            <?php if ( get_theme_mod('adventure_trekking_camp_search_heading') ) : ?>
              <h6 class="mb-md-3"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_search_heading'));?></h6>
            <?php endif; ?>
            <?php get_search_form(); ?>
          </div>
        </div>
      <?php }?>
    </div>
  </div>

  <section id="home-about" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('adventure_trekking_camp_activities_text') != ''){ ?>
        <h6 class="text-center"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_activities_text','')); ?></h6>
      <?php }?>
      <?php if( get_theme_mod('adventure_trekking_camp_activities_heading') != ''){ ?>
        <h3 class="text-center mb-5"><?php echo esc_html(get_theme_mod('adventure_trekking_camp_activities_heading','')); ?></h3>
      <?php }?>
      <div class="row">
        <?php
          $adventure_trekking_camp_slider_category=  get_theme_mod('adventure_trekking_camp_activities_setting');if($adventure_trekking_camp_slider_category){
          $adventure_trekking_camp_page_query = new WP_Query(array( 'category_name' => esc_html($adventure_trekking_camp_slider_category ,'adventure-trekking-camp')));?>
            <?php while( $adventure_trekking_camp_page_query->have_posts() ) : $adventure_trekking_camp_page_query->the_post(); ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="activities-box mb-4">
                  <?php the_post_thumbnail(); ?>
                  <?php if( get_post_meta($post->ID, 'adventure_trekking_camp_trekking_rating', true) ) {?>
                    <div class="rating-box">
                      <h5><?php echo esc_html(get_post_meta($post->ID,'adventure_trekking_camp_trekking_rating',true)); ?></h5>
                      <p class="mb-0"><?php esc_html_e('Rating','adventure-trekking-camp'); ?></p>
                    </div>
                  <?php }?>
                  <div class="activities-inner-box">
                    <?php if( get_post_meta($post->ID, 'adventure_trekking_camp_trekking_amount', true) ) {?>
                      <h5><?php echo esc_html(get_post_meta($post->ID,'adventure_trekking_camp_trekking_amount',true)); ?></h5>
                    <?php }?>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                    <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                  </div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>