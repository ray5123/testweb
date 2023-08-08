<?php

	/*-------------------------First highlight color-------------------*/

	$vw_blog_magazine_first_color = get_theme_mod('vw_blog_magazine_first_color');

	$vw_blog_magazine_custom_css = '';

	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.footer .tagcloud a:hover,.blogbutton-small, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .sidebar input[type="submit"], .footer input[type="submit"], .scrollup i, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination .current, .pagination a:hover, nav.woocommerce-MyAccount-navigation ul li, #comments a.comment-reply-link, input[type="submit"], .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .sidebar a.custom_read_more, .footer a.custom_read_more, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button,.bradcrumbs a,.bradcrumbs span,.post-categories li a{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='#comments input[type="submit"].submit{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_first_color).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='a, .custom-social-icons i:hover, .logo h1 a, .logo p, .postbox:hover h4, .postbox:hover i, .metabox i, .blogbutton-small:hover, .blog-icon i:hover, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer h3, .woocommerce-message::before, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, h4.section-title a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, h2.section-title a, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover, .logo h1 a, .logo p, .logo p.site-title a, .sidebar ul li a:hover, .footer li a:hover, .postbox:hover h2 a, .postbox:hover .metabox a, .single-post .metabox:hover a, .copyright a:hover, .imagebox h2 a:hover, .footer .wp-block-search .wp-block-search__label.bradcrumbs a:hover,.post-categories li a:hover{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.blogbutton-small, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, input[type="submit"], .sidebar a.custom_read_more, .footer a.custom_read_more,.post-categories li a,.bradcrumbs a,.bradcrumbs span{';
			$vw_blog_magazine_custom_css .='border-color: '.esc_attr($vw_blog_magazine_first_color).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='hr.big, .footer-2, .logo, .main-navigation ul ul, .page-template-custom-home-page .logo{';
			$vw_blog_magazine_custom_css .='border-top-color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_first_color != false){
		$vw_blog_magazine_custom_css .='.logo, .header-fixed, .main-navigation ul ul, .page-template-custom-home-page .logo{';
			$vw_blog_magazine_custom_css .='border-bottom-color: '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_blog_magazine_theme_lay = get_theme_mod( 'vw_blog_magazine_width_option','Full Width');
    if($vw_blog_magazine_theme_lay == 'Boxed'){
		$vw_blog_magazine_custom_css .='body{';
			$vw_blog_magazine_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.logo{';
			$vw_blog_magazine_custom_css .='width: 97.4%;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup i{';
		  $vw_blog_magazine_custom_css .='right: 100px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup.left i{';
		  $vw_blog_magazine_custom_css .='left: 100px;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_theme_lay == 'Wide Width'){
		$vw_blog_magazine_custom_css .='body{';
			$vw_blog_magazine_custom_css .='width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.logo{';
			$vw_blog_magazine_custom_css .='width: 97.7%;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup i{';
		  $vw_blog_magazine_custom_css .='right: 30px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.scrollup.left i{';
		  $vw_blog_magazine_custom_css .='left: 30px;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_theme_lay == 'Full Width'){
		$vw_blog_magazine_custom_css .='body{';
			$vw_blog_magazine_custom_css .='max-width: 100%;';
		$vw_blog_magazine_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_blog_magazine_slider = get_theme_mod('vw_blog_magazine_category');
	if($vw_blog_magazine_slider == false){
		$vw_blog_magazine_custom_css .='.page-template-custom-home-page .logo{';
			$vw_blog_magazine_custom_css .='position: static; padding:0; border-top: 2px solid '.esc_attr($vw_blog_magazine_first_color).'; border-bottom: 1px solid '.esc_attr($vw_blog_magazine_first_color).';';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='#header{';
			$vw_blog_magazine_custom_css .='margin-top: 30px;';
		$vw_blog_magazine_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_blog_magazine_theme_lay = get_theme_mod( 'vw_blog_magazine_blog_layout_option','Default');
    if($vw_blog_magazine_theme_lay == 'Default'){
		$vw_blog_magazine_custom_css .='.postbox smallpostimage{';
			$vw_blog_magazine_custom_css .='';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.new-text{';
			$vw_blog_magazine_custom_css .='padding: 10px 25px;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_theme_lay == 'Center'){
		$vw_blog_magazine_custom_css .='.postbox smallpostimage, .postbox h2, .inner-service .metabox, .box-content p, .testbutton,.box-image, .box-content h3, .inner-service .read-btn {';
			$vw_blog_magazine_custom_css .='text-align:center;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.inner-service hr.big{';
			$vw_blog_magazine_custom_css .='margin:10px auto 0;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.box-image{';
			$vw_blog_magazine_custom_css .='margin-bottom: 10px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.box-content p{';
			$vw_blog_magazine_custom_css .='margin-top: 10px;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_theme_lay == 'Left'){
		$vw_blog_magazine_custom_css .='.postbox smallpostimage, .postbox h2, .metabox, .box-content p, .testbutton{';
			$vw_blog_magazine_custom_css .='text-align:Left;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.box-content p{';
			$vw_blog_magazine_custom_css .='margin-top: 10px;';
		$vw_blog_magazine_custom_css .='}';
		$vw_blog_magazine_custom_css .='.postbox h2{';
			$vw_blog_magazine_custom_css .='margin-top: 10px;';
		$vw_blog_magazine_custom_css .='}';
	}

	// featured image dimention
	$vw_blog_magazine_blog_post_featured_image_dimension = get_theme_mod('vw_blog_magazine_blog_post_featured_image_dimension', 'default');
	$vw_blog_magazine_blog_post_featured_image_custom_width = get_theme_mod('vw_blog_magazine_blog_post_featured_image_custom_width',250);
	$vw_blog_magazine_blog_post_featured_image_custom_height = get_theme_mod('vw_blog_magazine_blog_post_featured_image_custom_height',250);
	if($vw_blog_magazine_blog_post_featured_image_dimension == 'custom'){
		$vw_blog_magazine_custom_css .='.postbox img{';
			$vw_blog_magazine_custom_css .='width: '.esc_attr($vw_blog_magazine_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_blog_magazine_blog_post_featured_image_custom_height).';';
		$vw_blog_magazine_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_blog_magazine_blog_page_posts_settings = get_theme_mod( 'vw_blog_magazine_blog_page_posts_settings','Into Blocks');
		if($vw_blog_magazine_blog_page_posts_settings == 'Without Blocks'){
		$vw_blog_magazine_custom_css .='.postbox{';
			$vw_blog_magazine_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_blog_magazine_custom_css .='}';
	}

	/*--------------------- Share link ------------------------*/

	if(get_theme_mod('vw_blog_magazine_toggle_share_link',false) == 0){
		if($vw_blog_magazine_theme_lay == 'Center'){
			$vw_blog_magazine_custom_css .='.read-btn{';
				$vw_blog_magazine_custom_css .='text-align:center; margin: 12px 0 20px;';
			$vw_blog_magazine_custom_css .='}';
		}
	}

	/*---------------------Responsive Media -----------------------*/

	$vw_blog_magazine_resp_stickyheader = get_theme_mod( 'vw_blog_magazine_stickyheader_hide_show',false);
	if($vw_blog_magazine_resp_stickyheader == true && get_theme_mod( 'vw_blog_magazine_sticky_header',false) != true){
    	$vw_blog_magazine_custom_css .='.header-fixed{';
			$vw_blog_magazine_custom_css .='position:static;';
		$vw_blog_magazine_custom_css .='} ';
	}
    if($vw_blog_magazine_resp_stickyheader == true){
    	$vw_blog_magazine_custom_css .='@media screen and (max-width:575px) {';
		$vw_blog_magazine_custom_css .='.header-fixed{';
			$vw_blog_magazine_custom_css .='position:fixed;';
		$vw_blog_magazine_custom_css .='} }';
	}else if($vw_blog_magazine_resp_stickyheader == false){
		$vw_blog_magazine_custom_css .='@media screen and (max-width:575px){';
		$vw_blog_magazine_custom_css .='.header-fixed{';
			$vw_blog_magazine_custom_css .='position:static;';
		$vw_blog_magazine_custom_css .='} }';
	}

	$vw_blog_magazine_res_sidebar = get_theme_mod( 'vw_blog_magazine_sidebar_hide_show',true);
    if($vw_blog_magazine_res_sidebar == true){
    	$vw_blog_magazine_custom_css .='@media screen and (max-width:575px) {';
		$vw_blog_magazine_custom_css .='.sidebar{';
			$vw_blog_magazine_custom_css .='display:block;';
		$vw_blog_magazine_custom_css .='} }';
	}else if($vw_blog_magazine_res_sidebar == false){
		$vw_blog_magazine_custom_css .='@media screen and (max-width:575px) {';
		$vw_blog_magazine_custom_css .='.sidebar{';
			$vw_blog_magazine_custom_css .='display:none;';
		$vw_blog_magazine_custom_css .='} }';
	}

	$vw_blog_magazine_resp_scroll_top = get_theme_mod( 'vw_blog_magazine_resp_scroll_top_hide_show',true);
	if($vw_blog_magazine_resp_scroll_top == true && get_theme_mod( 'vw_blog_magazine_hide_show_scroll',true) != true){
    	$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='visibility:hidden !important;';
		$vw_blog_magazine_custom_css .='} ';
	}
    if($vw_blog_magazine_resp_scroll_top == true){
    	$vw_blog_magazine_custom_css .='@media screen and (max-width:575px) {';
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='visibility:visible !important;';
		$vw_blog_magazine_custom_css .='} }';
	}else if($vw_blog_magazine_resp_scroll_top == false){
		$vw_blog_magazine_custom_css .='@media screen and (max-width:575px){';
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='visibility:hidden !important;';
		$vw_blog_magazine_custom_css .='} }';
	}

	$vw_blog_magazine_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_blog_magazine_resp_menu_toggle_btn_bg_color');
	if($vw_blog_magazine_resp_menu_toggle_btn_bg_color != false){
		$vw_blog_magazine_custom_css .='.toggle-nav i{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_resp_menu_toggle_btn_bg_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	/*-------------- Menus Settings ----------------*/

	$vw_blog_magazine_navigation_menu_font_size = get_theme_mod('vw_blog_magazine_navigation_menu_font_size');
	if($vw_blog_magazine_navigation_menu_font_size != false){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_navigation_menu_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_navigation_menu_font_weight = get_theme_mod('vw_blog_magazine_navigation_menu_font_weight','700');
	if($vw_blog_magazine_navigation_menu_font_weight != false){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='font-weight: '.esc_attr($vw_blog_magazine_navigation_menu_font_weight).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_theme_lay = get_theme_mod( 'vw_blog_magazine_menu_text_transform','Uppercase');
	if($vw_blog_magazine_theme_lay == 'Capitalize'){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='text-transform:Capitalize;';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_theme_lay == 'Lowercase'){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='text-transform:Lowercase;';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_theme_lay == 'Uppercase'){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='text-transform:Uppercase;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_header_menus_color = get_theme_mod('vw_blog_magazine_header_menus_color');
	if($vw_blog_magazine_header_menus_color != false){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_header_menus_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_header_menus_hover_color = get_theme_mod('vw_blog_magazine_header_menus_hover_color');
	if($vw_blog_magazine_header_menus_hover_color != false){
		$vw_blog_magazine_custom_css .='.main-navigation a:hover{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_header_menus_hover_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_header_submenus_color = get_theme_mod('vw_blog_magazine_header_submenus_color');
	if($vw_blog_magazine_header_submenus_color != false){
		$vw_blog_magazine_custom_css .='.main-navigation ul ul a{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_header_submenus_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_header_submenus_hover_color = get_theme_mod('vw_blog_magazine_header_submenus_hover_color');
	if($vw_blog_magazine_header_submenus_hover_color != false){
		$vw_blog_magazine_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_header_submenus_hover_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_menus_item = get_theme_mod( 'vw_blog_magazine_menus_item_style','None');
    if($vw_blog_magazine_menus_item == 'None'){
		$vw_blog_magazine_custom_css .='.main-navigation a{';
			$vw_blog_magazine_custom_css .='';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_menus_item == 'Zoom In'){
		$vw_blog_magazine_custom_css .='.main-navigation a:hover{';
			$vw_blog_magazine_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #25c5b7;';
		$vw_blog_magazine_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_blog_magazine_sticky_header_padding = get_theme_mod('vw_blog_magazine_sticky_header_padding');
	if($vw_blog_magazine_sticky_header_padding != false){
		$vw_blog_magazine_custom_css .='.header-fixed{';
			$vw_blog_magazine_custom_css .='padding: '.esc_attr($vw_blog_magazine_sticky_header_padding).';';
		$vw_blog_magazine_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_blog_magazine_button_padding_top_bottom = get_theme_mod('vw_blog_magazine_button_padding_top_bottom');
	$vw_blog_magazine_button_padding_left_right = get_theme_mod('vw_blog_magazine_button_padding_left_right');
	if($vw_blog_magazine_button_padding_top_bottom != false || $vw_blog_magazine_button_padding_left_right != false){
		$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
			$vw_blog_magazine_custom_css .='padding-top: '.esc_attr($vw_blog_magazine_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_blog_magazine_button_padding_top_bottom).';padding-left: '.esc_attr($vw_blog_magazine_button_padding_left_right).';padding-right: '.esc_attr($vw_blog_magazine_button_padding_left_right).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_button_border_radius = get_theme_mod('vw_blog_magazine_button_border_radius');
	if($vw_blog_magazine_button_border_radius != false){
		$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_button_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_button_font_size = get_theme_mod('vw_blog_magazine_button_font_size',14);
	$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
		$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_button_font_size).';';
	$vw_blog_magazine_custom_css .='}';

	$vw_blog_magazine_theme_lay = get_theme_mod( 'vw_blog_magazine_button_text_transform','Uppercase');
	if($vw_blog_magazine_theme_lay == 'Capitalize'){
		$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
			$vw_blog_magazine_custom_css .='text-transform:Capitalize;';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_theme_lay == 'Lowercase'){
		$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
			$vw_blog_magazine_custom_css .='text-transform:Lowercase;';
		$vw_blog_magazine_custom_css .='}';
	}
	if($vw_blog_magazine_theme_lay == 'Uppercase'){
		$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
			$vw_blog_magazine_custom_css .='text-transform:Uppercase;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_button_letter_spacing = get_theme_mod('vw_blog_magazine_button_letter_spacing',14);
	$vw_blog_magazine_custom_css .='#our-services .blogbutton-small{';
		$vw_blog_magazine_custom_css .='letter-spacing: '.esc_attr($vw_blog_magazine_button_letter_spacing).';';
	$vw_blog_magazine_custom_css .='}';

	/*------------- Single Blog Page------------------*/

	$vw_blog_magazine_featured_image_border_radius = get_theme_mod('vw_blog_magazine_featured_image_border_radius', 0);
	if($vw_blog_magazine_featured_image_border_radius != false){
		$vw_blog_magazine_custom_css .='.service-image img, .feature-box img{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_featured_image_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_featured_image_box_shadow = get_theme_mod('vw_blog_magazine_featured_image_box_shadow',0);
	if($vw_blog_magazine_featured_image_box_shadow != false){
		$vw_blog_magazine_custom_css .='.service-image img, .feature-box img, #content-vw img{';
			$vw_blog_magazine_custom_css .='box-shadow: '.esc_attr($vw_blog_magazine_featured_image_box_shadow).'px '.esc_attr($vw_blog_magazine_featured_image_box_shadow).'px '.esc_attr($vw_blog_magazine_featured_image_box_shadow).'px #cccccc;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_single_blog_post_navigation_show_hide = get_theme_mod('vw_blog_magazine_single_blog_post_navigation_show_hide',true);
	if($vw_blog_magazine_single_blog_post_navigation_show_hide != true){
		$vw_blog_magazine_custom_css .='.post-navigation{';
			$vw_blog_magazine_custom_css .='display: none;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_single_blog_comment_title = get_theme_mod('vw_blog_magazine_single_blog_comment_title', 'Leave a Reply');
	if($vw_blog_magazine_single_blog_comment_title == ''){
		$vw_blog_magazine_custom_css .='#comments h2#reply-title {';
			$vw_blog_magazine_custom_css .='display: none;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_single_blog_comment_button_text = get_theme_mod('vw_blog_magazine_single_blog_comment_button_text', 'Post Comment');
	if($vw_blog_magazine_single_blog_comment_button_text == ''){
		$vw_blog_magazine_custom_css .='#comments p.form-submit {';
			$vw_blog_magazine_custom_css .='display: none;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_comment_width = get_theme_mod('vw_blog_magazine_single_blog_comment_width');
	if($vw_blog_magazine_comment_width != false){
		$vw_blog_magazine_custom_css .='#comments textarea{';
			$vw_blog_magazine_custom_css .='width: '.esc_attr($vw_blog_magazine_comment_width).';';
		$vw_blog_magazine_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_blog_magazine_footer_background_color = get_theme_mod('vw_blog_magazine_footer_background_color');
	if($vw_blog_magazine_footer_background_color != false){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_footer_background_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_widgets_heading = get_theme_mod( 'vw_blog_magazine_footer_widgets_heading','Left');
    if($vw_blog_magazine_footer_widgets_heading == 'Left'){
		$vw_blog_magazine_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
		$vw_blog_magazine_custom_css .='text-align: left;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_footer_widgets_heading == 'Center'){
		$vw_blog_magazine_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_blog_magazine_custom_css .='text-align: center;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_footer_widgets_heading == 'Right'){
		$vw_blog_magazine_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_blog_magazine_custom_css .='text-align: right;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_widgets_content = get_theme_mod( 'vw_blog_magazine_footer_widgets_content','Left');
    if($vw_blog_magazine_footer_widgets_content == 'Left'){
		$vw_blog_magazine_custom_css .='.footer .widget{';
		$vw_blog_magazine_custom_css .='text-align: left;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_footer_widgets_content == 'Center'){
		$vw_blog_magazine_custom_css .='.footer .widget{';
			$vw_blog_magazine_custom_css .='text-align: center;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_footer_widgets_content == 'Right'){
		$vw_blog_magazine_custom_css .='.footer .widget{';
			$vw_blog_magazine_custom_css .='text-align: right;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_copyright_font_size = get_theme_mod('vw_blog_magazine_copyright_font_size');
	if($vw_blog_magazine_copyright_font_size != false){
		$vw_blog_magazine_custom_css .='.copyright p{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_copyright_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_copyright_padding_top_bottom = get_theme_mod('vw_blog_magazine_copyright_padding_top_bottom');
	if($vw_blog_magazine_copyright_padding_top_bottom != false){
		$vw_blog_magazine_custom_css .='.footer-2{';
			$vw_blog_magazine_custom_css .='padding-top: '.esc_attr($vw_blog_magazine_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_blog_magazine_copyright_padding_top_bottom).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_copyright_alignment = get_theme_mod('vw_blog_magazine_copyright_alignment');
	if($vw_blog_magazine_copyright_alignment != false){
		$vw_blog_magazine_custom_css .='.copyright p{';
			$vw_blog_magazine_custom_css .='text-align: '.esc_attr($vw_blog_magazine_copyright_alignment).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_padding = get_theme_mod('vw_blog_magazine_footer_padding');
	if($vw_blog_magazine_footer_padding != false){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='padding: '.esc_attr($vw_blog_magazine_footer_padding).' 0;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_icon = get_theme_mod('vw_blog_magazine_footer_icon');
	if($vw_blog_magazine_footer_icon == false){
		$vw_blog_magazine_custom_css .='.copyright p{';
			$vw_blog_magazine_custom_css .='width:100%; text-align:center; float:none;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_background_image = get_theme_mod('vw_blog_magazine_footer_background_image');
	if($vw_blog_magazine_footer_background_image != false){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='background: url('.esc_attr($vw_blog_magazine_footer_background_image).');';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_theme_lay = get_theme_mod( 'vw_blog_magazine_img_footer','scroll');
	if($vw_blog_magazine_theme_lay == 'fixed'){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='background-attachment: fixed !important;';
		$vw_blog_magazine_custom_css .='}';
	}elseif ($vw_blog_magazine_theme_lay == 'scroll'){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='background-attachment: scroll !important;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_footer_img_position = get_theme_mod('vw_blog_magazine_footer_img_position','center center');
	if($vw_blog_magazine_footer_img_position != false){
		$vw_blog_magazine_custom_css .='.footer{';
			$vw_blog_magazine_custom_css .='background-position: '.esc_attr($vw_blog_magazine_footer_img_position).'!important;';
		$vw_blog_magazine_custom_css .='}';
	} 

	/*----------------Sroll to top Settings ------------------*/

	$vw_blog_magazine_scroll_to_top_font_size = get_theme_mod('vw_blog_magazine_scroll_to_top_font_size');
	if($vw_blog_magazine_scroll_to_top_font_size != false){
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_scroll_to_top_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_scroll_to_top_padding = get_theme_mod('vw_blog_magazine_scroll_to_top_padding');
	$vw_blog_magazine_scroll_to_top_padding = get_theme_mod('vw_blog_magazine_scroll_to_top_padding');
	if($vw_blog_magazine_scroll_to_top_padding != false){
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='padding-top: '.esc_attr($vw_blog_magazine_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_blog_magazine_scroll_to_top_padding).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_scroll_to_top_width = get_theme_mod('vw_blog_magazine_scroll_to_top_width');
	if($vw_blog_magazine_scroll_to_top_width != false){
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='width: '.esc_attr($vw_blog_magazine_scroll_to_top_width).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_scroll_to_top_height = get_theme_mod('vw_blog_magazine_scroll_to_top_height');
	if($vw_blog_magazine_scroll_to_top_height != false){
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='height: '.esc_attr($vw_blog_magazine_scroll_to_top_height).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_scroll_to_top_border_radius = get_theme_mod('vw_blog_magazine_scroll_to_top_border_radius');
	if($vw_blog_magazine_scroll_to_top_border_radius != false){
		$vw_blog_magazine_custom_css .='.scrollup i{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_scroll_to_top_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_blog_magazine_social_icon_font_size = get_theme_mod('vw_blog_magazine_social_icon_font_size');
	if($vw_blog_magazine_social_icon_font_size != false){
		$vw_blog_magazine_custom_css .='.sidebar .custom-social-icons i, .footersec .custom-social-icons i{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_social_icon_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_social_icon_padding = get_theme_mod('vw_blog_magazine_social_icon_padding');
	if($vw_blog_magazine_social_icon_padding != false){
		$vw_blog_magazine_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_blog_magazine_custom_css .='padding: '.esc_attr($vw_blog_magazine_social_icon_padding).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_social_icon_width = get_theme_mod('vw_blog_magazine_social_icon_width');
	if($vw_blog_magazine_social_icon_width != false){
		$vw_blog_magazine_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_blog_magazine_custom_css .='width: '.esc_attr($vw_blog_magazine_social_icon_width).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_social_icon_height = get_theme_mod('vw_blog_magazine_social_icon_height');
	if($vw_blog_magazine_social_icon_height != false){
		$vw_blog_magazine_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_blog_magazine_custom_css .='height: '.esc_attr($vw_blog_magazine_social_icon_height).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_social_icon_border_radius = get_theme_mod('vw_blog_magazine_social_icon_border_radius');
	if($vw_blog_magazine_social_icon_border_radius != false){
		$vw_blog_magazine_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_social_icon_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_blog_magazine_products_padding_top_bottom = get_theme_mod('vw_blog_magazine_products_padding_top_bottom');
	if($vw_blog_magazine_products_padding_top_bottom != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_blog_magazine_custom_css .='padding-top: '.esc_attr($vw_blog_magazine_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_blog_magazine_products_padding_top_bottom).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_products_padding_left_right = get_theme_mod('vw_blog_magazine_products_padding_left_right');
	if($vw_blog_magazine_products_padding_left_right != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_blog_magazine_custom_css .='padding-left: '.esc_attr($vw_blog_magazine_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_blog_magazine_products_padding_left_right).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_products_box_shadow = get_theme_mod('vw_blog_magazine_products_box_shadow');
	if($vw_blog_magazine_products_box_shadow != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_blog_magazine_custom_css .='box-shadow: '.esc_attr($vw_blog_magazine_products_box_shadow).'px '.esc_attr($vw_blog_magazine_products_box_shadow).'px '.esc_attr($vw_blog_magazine_products_box_shadow).'px #ddd;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_products_border_radius = get_theme_mod('vw_blog_magazine_products_border_radius', 0);
	if($vw_blog_magazine_products_border_radius != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_products_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_products_button_border_radius = get_theme_mod('vw_blog_magazine_products_button_border_radius', 0);
	if($vw_blog_magazine_products_button_border_radius != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_products_button_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_woocommerce_sale_position = get_theme_mod( 'vw_blog_magazine_woocommerce_sale_position','right');
    if($vw_blog_magazine_woocommerce_sale_position == 'left'){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_blog_magazine_custom_css .='left: -10px; right: auto;';
		$vw_blog_magazine_custom_css .='}';
	}else if($vw_blog_magazine_woocommerce_sale_position == 'right'){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_blog_magazine_custom_css .='left: auto; right: 0;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_woocommerce_sale_font_size = get_theme_mod('vw_blog_magazine_woocommerce_sale_font_size');
	if($vw_blog_magazine_woocommerce_sale_font_size != false){
		$vw_blog_magazine_custom_css .='.woocommerce span.onsale{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_woocommerce_sale_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_woocommerce_sale_border_radius = get_theme_mod('vw_blog_magazine_woocommerce_sale_border_radius', 100);
	if($vw_blog_magazine_woocommerce_sale_border_radius != false){
		$vw_blog_magazine_custom_css .='.woocommerce span.onsale{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_woocommerce_sale_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_related_product_show_hide = get_theme_mod('vw_blog_magazine_related_product_show_hide',true);
	if($vw_blog_magazine_related_product_show_hide != true){
		$vw_blog_magazine_custom_css .='.related.products{';
			$vw_blog_magazine_custom_css .='display: none;';
		$vw_blog_magazine_custom_css .='}';
	}
	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_blog_magazine_site_title_font_size = get_theme_mod('vw_blog_magazine_site_title_font_size');
	if($vw_blog_magazine_site_title_font_size != false){
		$vw_blog_magazine_custom_css .='.logo h1, .logo p.site-title{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_site_title_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_blog_magazine_site_tagline_font_size = get_theme_mod('vw_blog_magazine_site_tagline_font_size');
	if($vw_blog_magazine_site_tagline_font_size != false){
		$vw_blog_magazine_custom_css .='.logo p.site-description{';
			$vw_blog_magazine_custom_css .='font-size: '.esc_attr($vw_blog_magazine_site_tagline_font_size).';';
		$vw_blog_magazine_custom_css .='}';
	}


	$vw_blog_magazine_site_title_color = get_theme_mod('vw_blog_magazine_site_title_color');
	if($vw_blog_magazine_site_title_color != false){
		$vw_blog_magazine_custom_css .='p.site-title a{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_site_title_color).' !important;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_site_tagline_color = get_theme_mod('vw_blog_magazine_site_tagline_color');
	if($vw_blog_magazine_site_tagline_color != false){
		$vw_blog_magazine_custom_css .='.logo p.site-description{';
			$vw_blog_magazine_custom_css .='color: '.esc_attr($vw_blog_magazine_site_tagline_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_logo_width = get_theme_mod('vw_blog_magazine_logo_width');
	if($vw_blog_magazine_logo_width != false){
		$vw_blog_magazine_custom_css .='.logo img{';
			$vw_blog_magazine_custom_css .='width: '.esc_attr($vw_blog_magazine_logo_width).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_logo_height = get_theme_mod('vw_blog_magazine_logo_height');
	if($vw_blog_magazine_logo_height != false){
		$vw_blog_magazine_custom_css .='.logo img{';
			$vw_blog_magazine_custom_css .='height: '.esc_attr($vw_blog_magazine_logo_height).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_logo_padding = get_theme_mod('vw_blog_magazine_logo_padding');
	if($vw_blog_magazine_logo_padding != false){
		$vw_blog_magazine_custom_css .='.logo, .page-template-custom-home-page .logo{';
			$vw_blog_magazine_custom_css .='padding: '.esc_attr($vw_blog_magazine_logo_padding).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_logo_margin = get_theme_mod('vw_blog_magazine_logo_margin');
	if($vw_blog_magazine_logo_margin != false){
		$vw_blog_magazine_custom_css .='.logo{';
			$vw_blog_magazine_custom_css .='margin: '.esc_attr($vw_blog_magazine_logo_margin).';';
		$vw_blog_magazine_custom_css .='}';
	}

	// Woocommerce img

	$vw_blog_magazine_shop_featured_image_border_radius = get_theme_mod('vw_blog_magazine_shop_featured_image_border_radius', 0);
	if($vw_blog_magazine_shop_featured_image_border_radius != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product a img{';
			$vw_blog_magazine_custom_css .='border-radius: '.esc_attr($vw_blog_magazine_shop_featured_image_border_radius).'px;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_shop_featured_image_box_shadow = get_theme_mod('vw_blog_magazine_shop_featured_image_box_shadow');
	if($vw_blog_magazine_shop_featured_image_box_shadow != false){
		$vw_blog_magazine_custom_css .='.woocommerce ul.products li.product a img{';
				$vw_blog_magazine_custom_css .='box-shadow: '.esc_attr($vw_blog_magazine_shop_featured_image_box_shadow).'px '.esc_attr($vw_blog_magazine_shop_featured_image_box_shadow).'px '.esc_attr($vw_blog_magazine_shop_featured_image_box_shadow).'px #ddd;';
		$vw_blog_magazine_custom_css .='}';
	}

		$vw_blog_magazine_copyright_background_color = get_theme_mod('vw_blog_magazine_copyright_background_color');
	if($vw_blog_magazine_copyright_background_color != false){
		$vw_blog_magazine_custom_css .='.footer-2{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_copyright_background_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_blog_magazine_preloader_bg_color = get_theme_mod('vw_blog_magazine_preloader_bg_color');
	if($vw_blog_magazine_preloader_bg_color != false){
		$vw_blog_magazine_custom_css .='#preloader{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_preloader_bg_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_preloader_border_color = get_theme_mod('vw_blog_magazine_preloader_border_color');
	if($vw_blog_magazine_preloader_border_color != false){
		$vw_blog_magazine_custom_css .='.loader-line{';
			$vw_blog_magazine_custom_css .='border-color: '.esc_attr($vw_blog_magazine_preloader_border_color).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_preloader_bg_img = get_theme_mod('vw_blog_magazine_preloader_bg_img');
	if($vw_blog_magazine_preloader_bg_img != false){
		$vw_blog_magazine_custom_css .='#preloader{';
			$vw_blog_magazine_custom_css .='background: url('.esc_attr($vw_blog_magazine_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_blog_magazine_custom_css .='}';
	}
 
	// Header Background Color
	$vw_blog_magazine_header_background_color = get_theme_mod('vw_blog_magazine_header_background_color');
	if($vw_blog_magazine_header_background_color != false){
		$vw_blog_magazine_custom_css .='.header, .logo{';
			$vw_blog_magazine_custom_css .='background-color: '.esc_attr($vw_blog_magazine_header_background_color).';';
		$vw_blog_magazine_custom_css .='}';
	}

	$vw_blog_magazine_header_img_position = get_theme_mod('vw_blog_magazine_header_img_position','center top');
	if($vw_blog_magazine_header_img_position != false){
		$vw_blog_magazine_custom_css .='.header, .logo{';
			$vw_blog_magazine_custom_css .='background-position: '.esc_attr($vw_blog_magazine_header_img_position).'!important;';
		$vw_blog_magazine_custom_css .='}';
	}

	
