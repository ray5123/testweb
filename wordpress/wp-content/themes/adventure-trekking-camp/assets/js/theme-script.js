jQuery(function($){

    "use strict";
    jQuery('.gb_navigation > ul').superfish({
      delay:       500,
      animation:   {opacity:'show',height:'show'},
      speed:       'fast'
    });

    const options = {
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      adaptiveHeight: true,
      autoplay: true
    };

    // my slick slider as constant object
    const mySlider = jQuery('.slider').on('init', function(slick) {

      // constant var
      const slider = this;
      
      // slight delay so init completes render
      setTimeout(function() {

        // dot buttons
        let dots = jQuery('.slick-dots > li > button', slider);

        // each dot button function
        jQuery.each(dots, function(i,e) {

          // slide id
          let slide_id = jQuery(this).attr('aria-controls');
          
          // custom dot image
          let dot_img = jQuery('#'+slide_id +' .slider-image-box').data('dot-img');
          
          jQuery(this).html('<img src="' + dot_img + '" alt="" />');

        });

      }, 100);

    }).slick(options);
});

function adventure_trekking_camp_gb_Menu_open() {
	jQuery(".side_gb_nav").addClass('show');
}
function adventure_trekking_camp_gb_Menu_close() {
	jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
	$('.gb_toggle').click(function () {
        adventure_trekking_camp_Keyboard_loop($('.side_gb_nav'));
    });
});

jQuery(window).load(function() {
	jQuery(".preloader").delay(2000).fadeOut("slow");
});

jQuery(window).scroll(function(){
  if (jQuery(this).scrollTop() > 120) {
    jQuery('.fixed_header').addClass('fixed');
  } else {
      jQuery('.fixed_header').removeClass('fixed');
  }
});

jQuery(window).scroll(function(){
  if (jQuery(this).scrollTop() > 100) {
    jQuery('.scrollup').addClass('is-active');
  } else {
      jQuery('.scrollup').removeClass('is-active');
  }
});

jQuery( document ).ready(function() {
  jQuery('#adventure-trekking-camp-scroll-to-top').click(function (argument) {
    jQuery("html, body").animate({
           scrollTop: 0
       }, 600);
  })
})