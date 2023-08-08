<?php
/**
 * The template part for displaying single post
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
<article id="post-<?php the_ID(); ?>">
    <div class="single-post">
        <div class="content-vw">
            <h1><?php the_title(); ?></h1>
            <?php if( get_theme_mod( 'vw_blog_magazine_single_postdate',true) == 1 || get_theme_mod( 'vw_blog_magazine_single_author',true) == 1 || get_theme_mod( 'vw_blog_magazine_single_comments',true) == 1 || get_theme_mod( 'vw_blog_magazine_single_time',true) == 1) { ?>
                <div class="metabox">
                    <?php if(get_theme_mod('vw_blog_magazine_single_postdate',true)==1){ ?>
                        <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_single_postdate_icon','far fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_blog_magazine_archive_year, $vw_blog_magazine_archive_month, $vw_blog_magazine_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                    <?php } ?>

                    <?php if(get_theme_mod('vw_blog_magazine_single_author',true)==1){ ?>
                        <span><?php echo esc_html(get_theme_mod('vw_blog_magazine_meta_field_separator'));?></span> <span class="entry-author"><i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_single_author_icon','fas fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
                    <?php } ?>

                    <?php if(get_theme_mod('vw_blog_magazine_single_comments',true)==1){ ?>
                        <span><?php echo esc_html(get_theme_mod('vw_blog_magazine_meta_field_separator'));?></span> <span class="entry-comments"><i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_single_comments_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','vw-blog-magazine'), __('0 Comments','vw-blog-magazine'), __('% Comments','vw-blog-magazine') ); ?></span>
                    <?php } ?>

                    <?php if(get_theme_mod('vw_blog_magazine_single_time',true)==1){ ?>
                      <span><?php echo esc_html(get_theme_mod('vw_blog_magazine_meta_field_separator'));?></span> <i class="<?php echo esc_attr(get_theme_mod('vw_blog_magazine_single_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
                    <?php } ?> 
                </div>
            <?php } ?>
            <hr class="big">
            <hr class="small">
            <?php if(has_post_thumbnail()) { ?>
                <div class="feature-box">
                  <?php the_post_thumbnail(); ?>
                </div>
            <hr>
            <?php } ?>
            <?php if( get_theme_mod( 'vw_blog_magazine_single_post_category',true) == 1) { ?>
                <div class="single-post-category mt-3">
                    <span class="category"><?php esc_html_e('Categories:','vw-blog-magazine'); ?></span>
                    <?php the_category(); ?>
                </div>
            <?php }?>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php if(get_theme_mod('vw_blog_magazine_toggle_tags',true)==1){ ?>
                    <div class="tags"><?php the_tags(); ?></div>
                <?php } ?>
            </div>
            <?php

                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                comments_template();

                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-blog-magazine' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_blog_magazine_single_blog_next_navigation_text','NEXT')) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Next post:', 'vw-blog-magazine' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_blog_magazine_single_blog_prev_navigation_text','PREVIOUS')) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-blog-magazine' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ));
                }
            ?>
        </div>
    </div>
    <?php get_template_part('template-parts/related-posts'); ?>
</article>
