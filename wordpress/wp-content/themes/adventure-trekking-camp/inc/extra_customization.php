<?php

	$adventure_trekking_camp_custom_style= "";
	//-----------------------------sticky header---------------------------------------

	if( get_option( 'adventure_trekking_camp_sticky_header',true) != 'on') {

		$adventure_trekking_camp_custom_style .='.fixed_header.fixed{';

			$adventure_trekking_camp_custom_style .='position: static;';
			
		$adventure_trekking_camp_custom_style .='}';
	}

	if( get_option( 'adventure_trekking_camp_sticky_header',true) != 'off') {

		$adventure_trekking_camp_custom_style .='.fixed_header.fixed{';

			$adventure_trekking_camp_custom_style .='position: fixed;';
			
		$adventure_trekking_camp_custom_style .='}';
	}

	//--------------------Logo max-width----------------------------

	$adventure_trekking_camp_logo_max_height = get_theme_mod('adventure_trekking_camp_logo_max_height');

	if($adventure_trekking_camp_logo_max_height != false){

		$adventure_trekking_camp_custom_style .='.custom-logo-link img{';

			$adventure_trekking_camp_custom_style .='max-height: '.esc_html($adventure_trekking_camp_logo_max_height).'px;';

		$adventure_trekking_camp_custom_style .='}';
	}

	/*---------------------------Scroll-top-position -------------------*/

	$adventure_trekking_camp_scroll_options = get_theme_mod( 'adventure_trekking_camp_scroll_options','right_align');

    if($adventure_trekking_camp_scroll_options == 'right_align'){

		$adventure_trekking_camp_custom_style .='.scroll-top button{';

			$adventure_trekking_camp_custom_style .='';

		$adventure_trekking_camp_custom_style .='}';

	}else if($adventure_trekking_camp_scroll_options == 'center_align'){

		$adventure_trekking_camp_custom_style .='.scroll-top button{';

			$adventure_trekking_camp_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$adventure_trekking_camp_custom_style .='}';

	}else if($adventure_trekking_camp_scroll_options == 'left_align'){

		$adventure_trekking_camp_custom_style .='.scroll-top button{';

			$adventure_trekking_camp_custom_style .='right: auto; left:5%; margin: 0 auto';

		$adventure_trekking_camp_custom_style .='}';
	}
				/*---------------------------text-transform-------------------*/

	$adventure_trekking_camp_text_transform = get_theme_mod( 'adventure_trekking_camp_menu_text_transform','CAPITALISE');
    if($adventure_trekking_camp_text_transform == 'CAPITALISE'){

		$adventure_trekking_camp_custom_style .='nav#top_gb_menu ul li a{';

			$adventure_trekking_camp_custom_style .='text-transform: capitalize ; font-size: 14px;';

		$adventure_trekking_camp_custom_style .='}';

	}else if($adventure_trekking_camp_text_transform == 'UPPERCASE'){

		$adventure_trekking_camp_custom_style .='nav#top_gb_menu ul li a{';

			$adventure_trekking_camp_custom_style .='text-transform: uppercase ; font-size: 14px;';

		$adventure_trekking_camp_custom_style .='}';

	}else if($adventure_trekking_camp_text_transform == 'LOWERCASE'){

		$adventure_trekking_camp_custom_style .='nav#top_gb_menu ul li a{';

			$adventure_trekking_camp_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$adventure_trekking_camp_custom_style .='}';
	}

				/*-------------------------Slider-content-alignment-------------------*/

		$adventure_trekking_camp_slider_content_alignment = get_theme_mod( 'adventure_trekking_camp_slider_content_alignment','LEFT-ALIGN');

		 if($adventure_trekking_camp_slider_content_alignment == 'LEFT-ALIGN'){

				$adventure_trekking_camp_custom_style .='.slider-inner{';

					$adventure_trekking_camp_custom_style .='text-align:left;';

				$adventure_trekking_camp_custom_style .='}';


			}else if($adventure_trekking_camp_slider_content_alignment == 'CENTER-ALIGN'){

				$adventure_trekking_camp_custom_style .='.slider-inner{';

					$adventure_trekking_camp_custom_style .='text-align:center;';

				$adventure_trekking_camp_custom_style .='}';


			}else if($adventure_trekking_camp_slider_content_alignment == 'RIGHT-ALIGN'){

				$adventure_trekking_camp_custom_style .='.slider-inner{';

					$adventure_trekking_camp_custom_style .='text-align:right;';

				$adventure_trekking_camp_custom_style .='}';

			}

//---------------------------------Logo-Max-height------------------------------	
			$adventure_trekking_camp_logo_max_height = get_theme_mod('adventure_trekking_camp_logo_max_height','50');

			if($adventure_trekking_camp_logo_max_height != false){

				$adventure_trekking_camp_custom_style .='.custom-logo-link img{';

					$adventure_trekking_camp_custom_style .='max-width: '.esc_html($adventure_trekking_camp_logo_max_height).'px;';

				$adventure_trekking_camp_custom_style .='}';
			}
//---------------------theme-button-color-------------//

	

	$adventure_trekking_camp_theme_button_color = get_theme_mod('adventure_trekking_camp_theme_button_color');

			if($adventure_trekking_camp_theme_button_color != false){

		$adventure_trekking_camp_custom_style .='button,input[type="button"],
		input[type="submit"],.home-btn a, .box-button a,.linksbox a,.slider-button a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, button.search-submit,.toggle-menu button,a.more-link, .prev.page-numbers,
		.next.page-numbers,button.search-submit,.site-footer .search-form .search-submit,.page-numbers.current{';

			$adventure_trekking_camp_custom_style .='background-color: '.esc_attr($adventure_trekking_camp_theme_button_color).';';

		$adventure_trekking_camp_custom_style .='}';
	}
	$adventure_trekking_camp_button_border = get_theme_mod('adventure_trekking_camp_button_border_radius','30');
		
		if($adventure_trekking_camp_button_border != false){

				$adventure_trekking_camp_custom_style .='button,input[type="button"],
		input[type="submit"],.home-btn a, .box-button a,.linksbox a,.slider-button a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, button.search-submit,a.more-link, .prev.page-numbers,
		.next.page-numbers,#sidebar input[type="search"], input[type="search"],#sidebar .search-form .search-submit{';

		$adventure_trekking_camp_custom_style .='border-radius: '.esc_attr(

			$adventure_trekking_camp_button_border).'px;';
				
				$adventure_trekking_camp_custom_style .='}';
		}