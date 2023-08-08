<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Adventure Trekking Camp
 * @since 1.0
 */
?>

<div id="single-post-section" class="single-post-page entry-content">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="postbox smallpostimage">
	        <div class="padd-box">
	        	<h2><?php the_title();?></h2>
            	<?php the_post_thumbnail(); ?>
        		<div class="date-box my-3">
        			<?php if( get_option('adventure_trekking_camp_date',false) != '1'){ ?>
        				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
        			<?php } ?>
        			<?php if( get_option('adventure_trekking_camp_admin',false) != '1'){ ?>
        				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        			<?php }?>
        			<?php if( get_option('adventure_trekking_camp_comment',false) != '1'){ ?>
      					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','adventure-trekking-camp'), __('0 Comments','adventure-trekking-camp'), __('% Comments','adventure-trekking-camp')); ?></span>
      				<?php }?>
    			</div>
            	<p><?php the_content(); ?></p>
	        </div>
	      	<div class="clearfix"></div> 
	  	</div>
	</div>
</div>