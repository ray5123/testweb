<?php

	$adventure_trekking_camp_custom_style= "";

				/*---------------------------text-transform-------------------*/

	$adventure_trekking_camp_text_transform = get_theme_mod( 'adventure_trekking_camp_menu_text_transform','CAPITALISE');
    if($adventure_trekking_camp_text_transform == 'CAPITALISE'){

		$adventure_trekking_camp_custom_style .='.gb_nav_menu li a{';

			$adventure_trekking_camp_custom_style .='text-transform: capitalize !important ; font-size: 14px;';

		$adventure_trekking_camp_custom_style .='}';

	}else if($adventure_trekking_camp_text_transform == 'UPPERCASE'){

		$adventure_trekking_camp_custom_style .='.gb_nav_menu li a{';

			$adventure_trekking_camp_custom_style .='text-transform: uppercase !important ; font-size: 14px;';

		$adventure_trekking_camp_custom_style .='}';

	}else if($adventure_trekking_camp_text_transform == 'LOWERCASE'){

		$adventure_trekking_camp_custom_style .='.gb_nav_menu li a{';

			$adventure_trekking_camp_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$adventure_trekking_camp_custom_style .='}';
	}
	//*----------------------------
	
