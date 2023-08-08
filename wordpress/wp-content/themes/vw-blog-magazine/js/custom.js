function vw_blog_magazine_menu_open_nav() {
	window.vw_blog_magazine_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_blog_magazine_menu_close_nav() {
	window.vw_blog_magazine_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
  	});
});

jQuery(document).ready(function () {
	window.vw_blog_magazine_currentfocus=null;
  	vw_blog_magazine_checkfocusdElement();
	var vw_blog_magazine_body = document.querySelector('body');
	vw_blog_magazine_body.addEventListener('keyup', vw_blog_magazine_check_tab_press);
	var vw_blog_magazine_gotoHome = false;
	var vw_blog_magazine_gotoClose = false;
	window.vw_blog_magazine_responsiveMenu=false;
 	function vw_blog_magazine_checkfocusdElement(){
	 	if(window.vw_blog_magazine_currentfocus=document.activeElement.className){
		 	window.vw_blog_magazine_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_blog_magazine_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_blog_magazine_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_blog_magazine_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_blog_magazine_gotoHome = true;
			} else {
				vw_blog_magazine_gotoHome = false;
			}

		}else{

			if(window.vw_blog_magazine_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_blog_magazine_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_blog_magazine_responsiveMenu){
				if(vw_blog_magazine_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_blog_magazine_gotoClose = true;
				} else {
					vw_blog_magazine_gotoClose = false;
				}
			
			}else{

			if(window.vw_blog_magazine_responsiveMenu){
			}}}}
		}
	 	vw_blog_magazine_checkfocusdElement();
	}
});

(function( $ ) {
	jQuery('document').ready(function($){
	    setTimeout(function () {
    		jQuery("#preloader").fadeOut("slow");
	    },1000);
	});

	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});

	jQuery(document).ready(function() {
		var owl = jQuery('#categry .owl-carousel');
			owl.owlCarousel({
				margin: 25,
				nav: true,
				autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:true,
				loop: true,
				navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
				responsive: {
				  0: {
				    items: 1
				  },
				  600: {
				    items: 3
				  },
				  1000: {
				    items: 3
				}
			}
		})
	})

	$(document).ready(function () {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});

		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});
	});

})( jQuery );