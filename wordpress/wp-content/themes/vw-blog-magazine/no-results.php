<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package VW Blog Magazine
 */
?>

<header>
	<h2 class="entry-title"><?php echo esc_html(get_theme_mod('vw_blog_magazine_no_results_page_title',__('Nothing Found','vw-blog-magazine')));?></h2>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'vw-blog-magazine' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php echo esc_html(get_theme_mod('vw_blog_magazine_no_results_page_content',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','vw-blog-magazine')));?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-blog-magazine' ); ?></p><br />
	<div class="read-moresec">
		<a href="<?php echo esc_url(); ?>" class="button"><?php esc_html_e( 'Return to Home Page', 'vw-blog-magazine' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Return to Home Page','vw-blog-magazine' );?></span></a>
	</div>
<?php endif; ?>