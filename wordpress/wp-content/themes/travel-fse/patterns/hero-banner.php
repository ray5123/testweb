<?php
/**
 * Title: Hero Banner
 * Slug: travel-fse/hero-banner
 * Categories: travel-fse
 *
 * @package Travel Fse
 * @since 1.0.0
 */

?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0","margin":{"top":"0","bottom":"0"}},"color":{"background":"var(--wp--preset--color--primary)"}},"className":"trip-search-main","layout":{"type":"default"}} -->
<div class="wp-block-group trip-search-main has-background" style="background-color:var(--wp--preset--color--primary);margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() );?>/assets/images/gallery8.jpg","id":649,"dimRatio":50,"isDark":false,"align":"full","className":"banner-video"} -->
<div class="wp-block-cover alignfull is-light banner-video"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-649" alt="" src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/gallery8.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"typography":{"lineHeight":"2.5"},"spacing":{"blockGap":"var:preset|spacing|60"}},"className":"text-button","layout":{"type":"constrained"}} -->
<div class="wp-block-group text-button" style="line-height:2.5"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"82px","fontStyle":"normal","fontWeight":"900"}},"textColor":"background","fontFamily":"oregano"} -->
<h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-oregano-font-family" style="font-size:82px;font-style:normal;font-weight:900"><?php echo esc_html__( 'Make Your Life Extraordinary', 'travel-fse' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="#"><?php echo esc_html__( 'Find Destination', 'travel-fse' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->