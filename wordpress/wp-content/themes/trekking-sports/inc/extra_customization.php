<?php

// ================sticky header============================

	$adventure_trekking_camp_custom_style= "";

	if( get_option( 'adventure_trekking_camp_sticky_header',true) != 'on') {

		$adventure_trekking_camp_custom_style .='.menu-header.fixed{';

			$adventure_trekking_camp_custom_style .='position: static;';
			
		$adventure_trekking_camp_custom_style .='}';
	}

	if( get_option( 'adventure_trekking_camp_sticky_header',true) != 'off') {

		$adventure_trekking_camp_custom_style .='.menu-header.fixed{';

			$adventure_trekking_camp_custom_style .='position: fixed;';
			
		$adventure_trekking_camp_custom_style .='}';
	}
