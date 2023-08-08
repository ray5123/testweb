<?php
/**
 * The template for displaying search results pages
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */

get_header(); ?>

<?php
	$adventure_trekking_camp_post_sidebar = get_option( 'adventure_trekking_camp_post_sidebar' );
	
	if ( '1' == $adventure_trekking_camp_post_sidebar ) {

	$adventure_trekking_camp_column = 'col-lg-12 col-md-12';
	} else { 
	$adventure_trekking_camp_column = 'col-lg-8 col-md-8';
	}
?>

<main id="content" class="mt-5">
	<div class="container">
		<header class="page-header">
			<?php if ( have_posts() ) : ?>
				<h1 class="entry-title"><span><?php /* translators: %s: search term */
	            	printf( esc_html__( 'Results For: %s','adventure-trekking-camp'), esc_html( get_search_query() ) ); ?>  </span>
	            </h1>
			<?php else : ?>
				<h2 class="page-title"><span><?php esc_html_e( 'Nothing Found', 'adventure-trekking-camp' ); ?></span></h2>
			<?php endif; ?>
		</header>
		<div class="content-area">
			<div id="main" class="site-main" role="main">
		      	<div class="row m-0">
		    		<div class="content_area <?php echo esc_attr( $adventure_trekking_camp_column ); ?>">
				    	<section id="post_section">
							<?php
								if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									$adventure_trekking_camp_post_option = get_theme_mod( 'adventure_trekking_camp_post_option','simple_post');
									if($adventure_trekking_camp_post_option == 'simple_post'){

										get_template_part( 'template-parts/post/content',get_post_format() );

									}else if($adventure_trekking_camp_post_option == 'grid_post'){

										get_template_part( 'template-parts/post/grid',get_post_format() );
									}

								endwhile; // End of the loop.

								else : ?>

								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'adventure-trekking-camp' ); ?></p>
								<?php
									get_search_form();

								endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'adventure-trekking-camp' ),
				                        'next_text'          => __( 'Next page', 'adventure-trekking-camp' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'adventure-trekking-camp' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
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
