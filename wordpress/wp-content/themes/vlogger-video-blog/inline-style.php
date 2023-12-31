<?php

	$vw_blog_magazine_first_color = get_theme_mod('vw_blog_magazine_first_color');

	$vw_blog_magazine_custom_css = '';

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.more-btn a:hover,.sidebar td#today,#playlist_sec button.owl-prev:hover, #playlist_sec button.owl-next:hover,#categry button.owl-prev:hover,#categry button.owl-next:hover,.imagebox .cat-tag:hover,a.post-tag,.footer-2, a.button:hover, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_first_color).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.video-content h2 a:hover,.box-content h4 a:hover,.sidebar td#prev a,.imagebox .cat-tag:hover a.post-tag,
		.search-box i:hover, .footer li a:hover, .sidebar ul li a:hover, .metabox:hover .entry-date a, .metabox:hover .entry-author a, .footer .wp-block-search .wp-block-search__label, .playlist-box h4 a:hover, .logo .site-title a:hover{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.woocommerce-product-details__short-description p a, .textwidget p a, .sidebar p a, #comments p a, .comment-meta.commentmetadata a, #playlist_sec .metabox:hover a, .entry-content a{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_first_color).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.more-btn a:hover, a.button:hover, .footer .custom-social-icons i, .sidebar .custom-social-icons i{';
			$vw_blog_magazine_custom_css .='border-color: '.esc_attr($vw_blog_magazine_first_color).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='#header, .header-fixed, .woocommerce-message{';
			$vw_blog_magazine_custom_css .='border-top-color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='
		@media screen and (max-width: 1000px){
			.search-box i{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='} }';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_blog_magazine_theme_lay = get_theme_mod( 'vw_blog_magazine_width_option','Full Width');
    if($vw_blog_magazine_theme_lay == 'Boxed'){
		$vw_blog_magazine_custom_css .='body{';
			$vw_blog_magazine_custom_css .='margin-right: auto !important; margin-left: auto !important;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.logo{';
			$vw_blog_magazine_custom_css .='width: 100%;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.read-btn{';
			$vw_blog_magazine_custom_css .='padding-right: 0 !important;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.top-video .row{';
			$vw_blog_magazine_custom_css .='margin-right:0px; margin-left:0px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='right: 100px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup.left i{';
			$vw_blog_magazine_custom_css .='left: 100px;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_theme_lay == 'Wide Width'){
		$vw_blog_magazine_custom_css .='.logo{';
			$vw_blog_magazine_custom_css .='width: 100%;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.top-video .row{';
			$vw_blog_magazine_custom_css .='margin-right:0px; margin-left:0px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='right: 30px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup.left i{';
			$vw_blog_magazine_custom_css .='left: 30px;';
		$vw_blog_magazine_custom_css .='}';
	}

	// Header Background Color

	$vw_blog_magazine_header_background_color = get_theme_mod('vw_blog_magazine_header_background_color');
	if($vw_blog_magazine_header_background_color != false){
		$vw_blog_magazine_custom_css .='#header{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_header_background_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_img_position = get_theme_mod('vw_blog_magazine_footer_img_position','center center');
	if($vw_blog_magazine_footer_img_position != false){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='background-position: '.esc_attr($vw_blog_magazine_footer_img_position).'!important;';
		$vw_blog_magazine_custom_css .='}';
	} 

	$vw_blog_magazine_header_img_position = get_theme_mod('vw_blog_magazine_header_img_position','center top');
	if($vw_blog_magazine_header_img_position != false){
		$vw_blog_magazine_custom_css .='#header{';
			$vw_blog_magazine_custom_css .='background-position: '.esc_attr($vw_blog_magazine_header_img_position).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}