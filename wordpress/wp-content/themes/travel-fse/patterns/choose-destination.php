<?php
/**
 * Title: Choose Destination
 * Slug: travel-fse/choose-destination
 * Categories: travel-fse
 *
 * @package Travel Fse
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"70px","bottom":"0"},"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"choose-destination","layout":{"type":"default"}} -->
<div class="wp-block-group choose-destination" style="margin-top:70px;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() );?>/assets/images/choose-dest.jpg","id":646,"dimRatio":80,"overlayColor":"primary","focalPoint":{"x":0.5,"y":0.5},"minHeight":600,"minHeightUnit":"px"} -->
<div class="wp-block-cover" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-646" alt="" src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/choose-dest.jpg" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70","margin":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--80);margin-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","textColor":"background","fontFamily":"red-hat-display"} -->
<h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-red-hat-display-font-family"><?php echo esc_html__( 'Choose Your Destination', 'travel-fse' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"background"} -->
<p class="has-text-align-center has-background-color has-text-color"><?php echo esc_html__( 'Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla.', 'travel-fse' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"destination-button","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons destination-button"><!-- wp:button {"textAlign":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-text-align-center wp-element-button" href="#" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Find Destination', 'travel-fse' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->