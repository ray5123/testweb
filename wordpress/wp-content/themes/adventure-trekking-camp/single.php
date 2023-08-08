<?php
/**
 * The template for displaying all single posts
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */

get_header(); ?>

<?php
	$adventure_trekking_camp_post_sidebar = get_option( 'adventure_trekking_camp_single_post_sidebar' );
	if ( '1' == $adventure_trekking_camp_post_sidebar ) {
	$adventure_trekking_camp_column = 'col-lg-12 col-md-12';
	} else { 
	$adventure_trekking_camp_column = 'col-lg-8 col-md-8';
	}
?>

<main id="content" class="mt-5">
	<div class="container">
		<div class="content-area entry-content">
			<div id="main" class="site-main" role="main">
		       	<div class="row m-0">
		    		<div class="content_area <?php echo esc_attr( $adventure_trekking_camp_column ); ?>">
				    	<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/single-page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'adventure-trekking-camp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'adventure-trekking-camp' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'adventure-trekking-camp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'adventure-trekking-camp' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<?php if ( '1' != $adventure_trekking_camp_post_sidebar ) {?>
						<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer();
