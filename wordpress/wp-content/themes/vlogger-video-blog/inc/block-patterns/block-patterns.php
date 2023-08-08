<?php
/**
 * Vlogger Video Blog: Block Patterns
 *
 * @package Vlogger Video Blog
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vlogger-video-blog',
		array( 'label' => __( 'Vlogger Video Blog', 'vlogger-video-blog' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vlogger-video-blog/banner-section',
		array(
			'title'      => __( 'Video Section', 'vlogger-video-blog' ),
			'categories' => array( 'vlogger-video-blog' ),
			'content'    => "<!-- wp:columns {\"align\":\"full\",\"className\":\"vlogger-video-blog main-video-box mb-0\"} -->\n<div class=\"wp-block-columns alignfull vlogger-video-blog main-video-box mb-0\"><!-- wp:column {\"width\":\"60%\",\"className\":\"vlogger-video-blog videobox mb-0\"} -->\n<div class=\"wp-block-column vlogger-video-blog videobox mb-0\" style=\"flex-basis:60%\"><!-- wp:embed {\"url\":\"https://youtu.be/yAoLSRbwxL8\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"mb-0 wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube mb-0 wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/yAoLSRbwxL8\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"40%\",\"className\":\"vlogger-video-blog video-content-box ms-0\"} -->\n<div class=\"wp-block-column vlogger-video-blog video-content-box ms-0\" style=\"flex-basis:40%\"><!-- wp:columns {\"className\":\"mb-0\"} -->\n<div class=\"wp-block-columns mb-0\"><!-- wp:column {\"className\":\".vlogger-video-blog.video-content mb-0 ms-0\"} -->\n<div class=\"wp-block-column .vlogger-video-blog.video-content mb-0 ms-0\"><!-- wp:embed {\"url\":\"https://youtu.be/yAoLSRbwxL8\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"my-0 wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube my-0 wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/yAoLSRbwxL8\n</div></figure>\n<!-- /wp:embed -->\n\n<!-- wp:embed {\"url\":\"https://youtu.be/yAoLSRbwxL8\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"my-0 wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube my-0 wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/yAoLSRbwxL8\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'vlogger-video-blog/about-section',
		array(
			'title'      => __( ' Video Playlist Section', 'vlogger-video-blog' ),
			'categories' => array( 'vlogger-video-blog' ),
			'content'    => "<!-- wp:columns {\"align\":\"wide\",\"className\":\"vlogger-video-blog playlist-box mx-2 my-5\"} -->\n<div class=\"wp-block-columns alignwide vlogger-video-blog playlist-box mx-2 my-5\"><!-- wp:column {\"className\":\"mx-2\"} -->\n<div class=\"wp-block-column mx-2\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":32},\"color\":{\"text\":\"#222222\"}},\"className\":\"mb-0\"} -->\n<h3 class=\"mb-0 has-text-color\" style=\"color:#222222;font-size:32px\">Most Liked Playlist</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#909090\"},\"typography\":{\"fontSize\":15}}} -->\n<p class=\"has-text-color\" style=\"color:#909090;font-size:15px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"text\":\"#222222\"}},\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color no-border-radius\" style=\"color:#222222\">VIEW ALL</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"mx-2\"} -->\n<div class=\"wp-block-column mx-2\"><!-- wp:embed {\"url\":\"https://youtu.be/yAoLSRbwxL8\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/yAoLSRbwxL8\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"mx-2\"} -->\n<div class=\"wp-block-column mx-2\"><!-- wp:embed {\"url\":\"https://youtu.be/yAoLSRbwxL8\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/yAoLSRbwxL8\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}