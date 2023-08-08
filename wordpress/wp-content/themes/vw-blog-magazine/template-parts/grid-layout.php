<?php
/**
 * The template part for displaying grid layout
 *
 * @package VW Blog Magazine
 * @subpackage vw-blog-magazine
 * @since VW Blog Magazine 1.0
 */
?>
<?php
  $vw_blog_magazine_archive_year  = get_the_time('Y');
  $vw_blog_magazine_archive_month = get_the_time('m');
  $vw_blog_magazine_archive_day   = get_the_time('d');
?>
<div class="col-lg-6 col-md-6">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  	<div class="postbox smallpostimage wow zoomInDown delay-1000" data-wow-duration="2s">
      <?php
        if(has_post_thumbnail() && get_theme_mod( 'vw_blog_magazine_featured_image_hide_show',true) == 1) { ?>
        <div class="padd-box">
            <div class="box-image">
              <?php the_post_thumbnail();  ?>
            </div>
        </div>
      <?php } ?>
      <div class="new-text">
        <div class="box-content">
          <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <div class="metabox">
            <?php if(get_theme_mod('vw_blog_magazine_grid_postdate',true)==1){ ?>
              <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_grid_postdate_icon','far fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_blog_magazine_archive_year, $vw_blog_magazine_archive_month, $vw_blog_magazine_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_blog_magazine_grid_author',true)==1){ ?>
              <span class="entry-author"><span><?php echo esc_html(get_theme_mod('vw_blog_magazine_grid_post_meta_field_separator', '|'));?></span><i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_grid_author_icon','fas fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_blog_magazine_grid_comments',true)==1){ ?>
              <span class="entry-comments"><span><?php echo esc_html(get_theme_mod('vw_blog_magazine_grid_post_meta_field_separator', '|'));?></span><i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_grid_comments_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','vw-blog-magazine'), __('0 Comments','vw-blog-magazine'), __('% Comments','vw-blog-magazine') ); ?></span>
            <?php } ?>
 
            <?php if(get_theme_mod('vw_blog_magazine_grid_time',true)==1){ ?><span><?php echo esc_html(get_theme_mod('vw_blog_magazine_grid_post_meta_field_separator', '|'));?></span>
              <i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_grid_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
          <hr class="big">
          <hr class="small">
          <div class="entry-content">
            <p>
              <?php $vw_blog_magazine_excerpt = get_the_excerpt(); echo esc_html( vw_blog_magazine_string_limit_words( $vw_blog_magazine_excerpt, esc_attr(get_theme_mod('vw_blog_magazine_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_blog_magazine_excerpt_suffix','') ); ?>
            </p>
            </div>
          <div class="read-btn">
            <?php if( get_theme_mod('vw_blog_magazine_button_text','Read Full') != ''){ ?>
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html(get_theme_mod('vw_blog_magazine_button_text',__('Read Full','vw-blog-magazine')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_blog_magazine_button_text',__('Read Full','vw-blog-magazine')));?></span></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </article>
</div>
