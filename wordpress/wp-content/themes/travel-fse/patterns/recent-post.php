<?php
/**
 * Title: Recent Post
 * Slug: travel-fse/recent-post
 * Categories: text
 * inserter: no
 *
 * @package Travel FSE
 * @since 1.0.0
 */

?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"70px","bottom":"60px"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:70px;margin-bottom:60px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"29px"},"blockGap":"var:preset|spacing|30"}},"className":"gallery-section-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group gallery-section-header" style="margin-top:29px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"10px"}},"textColor":"body-text","className":"recent-content","fontSize":"medium"} -->
<p class="has-text-align-center recent-content has-body-text-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:600;letter-spacing:10px"><?php echo esc_html__( 'LATEST POST', 'travel-fse' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","textColor":"body-text","className":"recent"} -->
<h2 class="wp-block-heading has-text-align-center recent has-body-text-color has-text-color"><?php echo esc_html__( 'Get Ready For Travel', 'travel-fse' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"75%"} -->
<div class="wp-block-column" style="flex-basis:75%"><!-- wp:query {"queryId":22,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:post-featured-image {"isLink":true} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:post-title {"isLink":true,"fontSize":"content-heading"} /-->

<!-- wp:post-excerpt /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-date /-->
</div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:image {"id":632,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/gallery14.jpg" alt="" class="wp-image-632"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->