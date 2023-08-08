<?php
/**
 * Template Name: Custom Home
 */
get_header(); ?>

<?php 
  $vw_blog_magazine_archive_year  = get_the_time('Y'); 
  $vw_blog_magazine_archive_month = get_the_time('m'); 
  $vw_blog_magazine_archive_day   = get_the_time('d'); 
?>

<main id="maincontent" role="main">
	<div class="header-image"></div>

	<?php do_action( 'vw_blog_magazine_above_slider_category' ); ?>

	<?php /** Category section **/ ?>
	<?php if( get_theme_mod('vw_blog_magazine_category') != ''){ ?>
		<section id="categry" class="wow zoomInDown delay-1000" data-wow-duration="3s">
			<div class="container">
				<div class="owl-carousel">
			  	<?php 
			  	$vw_blog_magazine_catData1=  get_theme_mod('vw_blog_magazine_category');if($vw_blog_magazine_catData1){
			    $page_query = new WP_Query(array( 'category_name' => esc_html($vw_blog_magazine_catData1 ,'vw-blog-magazine')));?>
			    <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
		        <div class="imagebox">
		        	<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
		        	<div class="cat-tag">
			        	<?php
                  if( $tags = get_the_tags() ) {
                    echo '<span class="meta-sep"></span>';
                   	foreach( $tags as $blog_tag ) {
                      $sep = ( $blog_tag === end( $tags ) ) ? '' : ' ';
                      echo '<a href="' . esc_url(get_term_link( $blog_tag, $blog_tag->taxonomy )) . '">' . esc_html($blog_tag->name) . '</a>' . esc_html($sep);
                    }
                  }
                ?>
			        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
		        	</div>
		        </div>
			      <?php endwhile; 
			      wp_reset_postdata();
			  	}?>	
		  	</div>
			</div>
		</section>
	<?php }?>
	<div class="clearfix"></div>

	<?php do_action( 'vw_blog_magazine_below_slider_category' ); ?>

	<?php /** Category section **/ ?>
	<?php if( get_theme_mod('vw_blog_magazine_section_two') != ''){ ?>
		<section id="our_blog" class="wow slideInLeft delay-1000" data-wow-duration="2s">
			<div class="container">
			  	<div class="row">
				    <div class="col-lg-9 col-md-9">
				    	<div class="row">
				      		<?php
				      		$vw_blog_magazine_catData2=  get_theme_mod('vw_blog_magazine_section_two');if($vw_blog_magazine_catData2){ 
				      		$page_query = new WP_Query(array( 'category_name' => esc_html($vw_blog_magazine_catData2 ,'vw-blog-magazine')));?>
				        	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
					          	<div class="col-lg-6 col-md-12">
					          		<div class="postbox smallpostimage">
								      	<?php 
								          if(has_post_thumbnail()) { ?>
									        <div class="padd-box">
									          	<div class="box-image">
									            	<?php the_post_thumbnail();  ?>
									            	<div class="overlay">
									              		<div class="text"><i class="fas fa-camera"></i></div>
									            	</div>
									          	</div>
									        </div>
								      	<?php } ?>
								      	<div class="new-text">
								          	<div class="box-content">
								            	<h3><?php the_title();?></h3>
								            	<div class="metabox">
										            <?php if(get_theme_mod('vw_blog_magazine_toggle_postdate',true)==1){ ?>
										                <span class="entry-date"><i class="far fa-calendar-alt"></i><a target="_blank" href="<?php echo esc_url( get_day_link( $vw_blog_magazine_archive_year, $vw_blog_magazine_archive_month, $vw_blog_magazine_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
										            <?php } ?>

										            <?php if(get_theme_mod('vw_blog_magazine_toggle_author',true)==1){ ?>
										                <span class="entry-author"><i class="fas fa-user"></i><a target="_blank" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
										            <?php } ?>

										            <?php if(get_theme_mod('vw_blog_magazine_toggle_comments',true)==1){ ?>
										                <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','vw-blog-magazine'), __('0 Comments','vw-blog-magazine'), __('% Comments','vw-blog-magazine') ); ?></span>
										            <?php } ?>

										            <?php if(get_theme_mod('vw_blog_magazine_toggle_time',true)==1){ ?>
              											<i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
           								 			<?php } ?>
		        								</div>
									            <hr class="big">
									            <hr class="small">
									            <p><?php $vw_blog_magazine_excerpt = get_the_excerpt(); echo esc_html( vw_blog_magazine_string_limit_words( $vw_blog_magazine_excerpt, esc_attr(get_theme_mod('vw_blog_magazine_category_excerpt_number','30')))); ?></p>
									            <div class="row">
										            <div class="col-lg-5 col-md-4 read-btn">
										              	<a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read Full', 'vw-blog-magazine' ); ?>"><?php esc_html_e('Read Full','vw-blog-magazine'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read Full','vw-blog-magazine' );?></span></a>
										            </div>
										            <div class="col-lg-7 col-md-8">
										              	<div class="blog-icon">
											                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php  the_permalink(); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','vw-blog-magazine' );?></span></a>
											                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php  the_permalink(); ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','vw-blog-magazine' );?></span></a>
											                <a target="_blank" href="https://plus.google.com/share?url=<?php  the_permalink(); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Google','vw-blog-magazine' );?></span></a>
											                <a target="_blank" href="https://twitter.com/share?url=<?php  the_permalink(); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','vw-blog-magazine' );?></span></a>
											                <a target="_blank" href="http://www.instagram.com/submit?url=<?php  the_permalink(); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','vw-blog-magazine' );?></span></a>
										              	</div> 
										            </div>
										        </div>
								          	</div>
								      	</div>
								      	<div class="clearfix"></div> 
								  	</div>
					          	</div>	          	
				          		<?php endwhile; 
				          	wp_reset_postdata();
				      		}?>
				      	</div>
				    </div>
				    <div class="col-lg-3 col-md-3">
			      		<div class="sidebar"><?php dynamic_sidebar('home'); ?></div>
				    </div>
				</div>
			</div>
		</section>
	<?php }?>
	<?php do_action( 'vw_blog_magazine_below_blog_category' ); ?>

	<div class="content-vw">
		<div class="container">
		 	<?php while ( have_posts() ) : the_post(); ?>
		        <?php the_content(); ?>
		    <?php endwhile; // end of the loop. ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>