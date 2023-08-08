jQuery(function($){
    "use strict";
    jQuery('.main-menu > ul').superfish({
        delay:       500,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast'
    });
});

"use strict";

//* Navbar Fixed  
function navbarFixed(){
    if ( jQuery('.main-header.is-sticky-on').length ){ 
        $(window).on('scroll', function() {
            var scroll = jQuery($).scrollTop();   
            if (scroll >= 295) {
                $(".main-header.is-sticky-on").addClass("header-fixed");
            } else {
                $(".main-header.is-sticky-on").removeClass("header-fixed");
            }
        });  
    };
};

jQuery('.navbar-menubar.responsive-menu .navbar-nav').find( 'a' ).on( 'focus blur', function() {
    jQuery( this ).parents( 'ul, li' ).toggleClass( 'focus' );
});   
    
/*Function Calls*/ 

jQuery(document).ready(function() {
    jQuery(".navbar-toggler").on("click", function(n) {
        if (jQuery(this).attr('aria-expanded') == 'false' ) {
            jQuery(".navbar-menubar").removeClass('active');
            jQuery(".navbar-toggler:not(.navbar-toggler-close)").focus();
        } else {
            jQuery(".navbar-menubar").addClass('active');
            jQuery(".navbar-toggler.navbar-toggler-close").focus();
            n.preventDefault();
            var t, a, c, o = document.querySelector(".navbar-menu");
            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
                m = document.querySelector(".navbar-toggler-close"),
                u = o.querySelectorAll(e),
                r = u[u.length - 1];
            if (!o) return !1;
            for (a = 0, c = (t = o.getElementsByTagName("button")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

            function l() {
                for (var e = this; - 1 === e.className.indexOf("navbar-menu");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
            })
        }
    });
    jQuery(".top-header-toggler").on("click", function(n) {
        if (jQuery(this).attr('aria-expanded') == 'false' ) {
            jQuery(".top-header-wrap").removeClass('active');
            jQuery(".top-header-toggler:not(.top-header-close)").focus();
        } else {
            jQuery(".top-header-wrap").addClass('active');
            jQuery(".navbar-toggler.navbar-toggler-close").focus();
            n.preventDefault();
            var t, a, c, o = document.querySelector(".top-header-wrap");
            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
                m = document.querySelector(".top-header-close"),
                u = o.querySelectorAll(e),
                r = u[u.length - 1];
            if (!o) return !1;
            for (a = 0, c = (t = o.getElementsByTagName("button")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

            function l() {
                for (var e = this; - 1 === e.className.indexOf("top-header-wrap");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
            })
        }
    });
    jQuery(".search-menu .nav-link").on("click", function(n) {
        if (jQuery(this).attr('aria-expanded') == 'false' ) {
            jQuery(".search-menu .nav-link").focus();
        } else {
            jQuery(".searchinput-form input.form-control").focus();
            n.preventDefault();
            var t, a, c, o = document.querySelector(".searchinput-form");
            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
                m = document.querySelector(".form-control"),
                u = o.querySelectorAll(e),
                r = u[u.length - 1];
            if (!o) return !1;
            for (a = 0, c = (t = o.getElementsByTagName("button")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

            function l() {
                for (var e = this; - 1 === e.className.indexOf("searchinput-form");) "*" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
            })
        }
    });
    var dropdownToggle = jQuery('.navbar-nav.main-nav .dropdown > a.nav-link');
    dropdownToggle.after('<button type="button" class="dropdown-icon"></button>');
    dropdownToggle.removeAttr('data-bs-toggle').removeAttr('data-bs-target').removeAttr('aria-expanded').removeAttr('data-bs-name').removeAttr('aria-haspopup');
    jQuery(document).on('click', '.navbar-nav.main-nav .dropdown > button.dropdown-icon', function() {
        jQuery(this).parent(".menu-item").toggleClass("show");
        jQuery(this).next(".sub-menu").slideToggle();
    });
    jQuery(window).on('resize', desktopmenu);
    function desktopmenu() {
        if (window.matchMedia("(min-width: 992px)").matches) {
            jQuery('.sub-menu.collapse').removeAttr('style');
        }
    }
    jQuery(document).on('click', '.navbar-nav.main-nav .dropdown > a', function() {
        location.href = this.href;
    });
});