!function(t){var n={};function e(i){if(n[i])return n[i].exports;var o=n[i]={i:i,l:!1,exports:{}};return t[i].call(o.exports,o,o.exports,e),o.l=!0,o.exports}e.m=t,e.c=n,e.d=function(t,n,i){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:i})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(e.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var o in t)e.d(i,o,function(n){return t[n]}.bind(null,o));return i},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="/",e(e.s=0)}({"//zx":function(t,n){},0:function(t,n,e){e("H0l3"),t.exports=e("//zx")},Asnn:function(t,n){wp.customize.sectionConstructor["wptrt-button"]=wp.customize.Section.extend({attachEvents:function(){},isContextuallyActive:function(){return!0}})},H0l3:function(t,n,e){"use strict";e.r(n),e("Asnn")}}),jQuery(document).ready(function(t){t("body").on("click",".travel-booking-expert-icon-list li",function(){var n=t(this).find("i").attr("class");t(this).addClass("icon-active").siblings().removeClass("icon-active"),t(this).parent(".travel-booking-expert-icon-list").prev(".travel-booking-expert-selected-icon").children("i").attr("class","").addClass(n),t(this).parent(".travel-booking-expert-icon-list").next("input").val(n).trigger("change")}),t("body").on("click",".travel-booking-expert-selected-icon",function(){t(this).next().slideToggle()})});
  
( function( $ ) {
  var this_obj = travel_booking_expert_customizer_params;
  var api = wp.customize;

  api.bind( 'pane-contents-reflowed', function() {

    // Reflow sections
    var sections = [];

    api.section.each( function( section ) {

      if (
        'travel_booking_expert_section' !== section.params.type ||
        'undefined' === typeof section.params.section
      ) {
        return;
      }

      sections.push( section );
    });

    sections.sort( api.utils.prioritySort ).reverse();

    $.each( sections, function( i, section ) {
      var parentContainer = $( '#sub-accordion-section-' + section.params.section );
      parentContainer.children( '.section-meta' ).after( section.headContainer );
    });

    // Reflow panels
    var panels = [];

    api.panel.each( function( panel ) {

      if (
        'travel_booking_expert_panel' !== panel.params.type ||
        'undefined' === typeof panel.params.panel
      ) {
        return;
      }

      panels.push( panel );
    });

    panels.sort( api.utils.prioritySort ).reverse();

    $.each( panels, function( i, panel ) {
      var parentContainer = $( '#sub-accordion-panel-' + panel.params.panel );
      parentContainer.children( '.panel-meta' ).after( panel.headContainer );
    });

  });


  // Extend Panel
  var _panelEmbed = wp.customize.Panel.prototype.embed;
  var _panelIsContextuallyActive = wp.customize.Panel.prototype.isContextuallyActive;
  var _panelAttachEvents = wp.customize.Panel.prototype.attachEvents;

  wp.customize.Panel = wp.customize.Panel.extend({
    attachEvents: function() {

      if (
        'travel_booking_expert_panel' !== this.params.type ||
        'undefined' === typeof this.params.panel
      ) {
        _panelAttachEvents.call( this );
        return;
      }

      _panelAttachEvents.call( this );

      var panel = this;

      panel.expanded.bind( function( expanded ) {

        var parent = api.panel( panel.params.panel );

        if ( expanded ) {
          parent.contentContainer.addClass( 'current-panel-parent' );
        } else {
          parent.contentContainer.removeClass( 'current-panel-parent' );
        }

      });

      panel.container.find( '.customize-panel-back' )
        .off( 'click keydown' )
        .on( 'click keydown', function( event ) {

          if ( api.utils.isKeydownButNotEnterEvent( event ) ) {
            return;
          }

          event.preventDefault(); // Keep this AFTER the key filter above

          if ( panel.expanded() ) {
            api.panel( panel.params.panel ).expand();
          }

        });

    },
    embed: function() {

      if (
        'travel_booking_expert_panel' !== this.params.type ||
        'undefined' === typeof this.params.panel
      ) {
        _panelEmbed.call( this );
        return;
      }

      _panelEmbed.call( this );

      var panel = this;
      var parentContainer = $( '#sub-accordion-panel-' + this.params.panel );

      parentContainer.append( panel.headContainer );

    },
    isContextuallyActive: function() {

      if (
        'travel_booking_expert_panel' !== this.params.type
      ) {
        return _panelIsContextuallyActive.call( this );
      }

      var panel = this;
      var children = this._children( 'panel', 'section' );

      api.panel.each( function( child ) {

        if ( ! child.params.panel ) {
          return;
        }

        if ( child.params.panel !== panel.id ) {
          return;
        }

        children.push( child );

      });

      children.sort( api.utils.prioritySort );

      var activeCount = 0;

      _( children ).each( function ( child ) {

        if ( child.active() && child.isContextuallyActive() ) {
          activeCount += 1;
        }

      });
      return ( activeCount !== 0 );
    }

  });


  // Extend Section
  var _sectionEmbed = wp.customize.Section.prototype.embed;
  var _sectionIsContextuallyActive = wp.customize.Section.prototype.isContextuallyActive;
  var _sectionAttachEvents = wp.customize.Section.prototype.attachEvents;

  wp.customize.Section = wp.customize.Section.extend({
    attachEvents: function() {
      if (
        'travel_booking_expert_section' !== this.params.type ||
        'undefined' === typeof this.params.section
      ) {
        _sectionAttachEvents.call( this );
        return;
      }

      _sectionAttachEvents.call( this );

      var section = this;

      section.expanded.bind( function( expanded ) {

        var parent = api.section( section.params.section );

        if ( expanded ) {
          parent.contentContainer.addClass( 'current-section-parent' );
        } else {
          parent.contentContainer.removeClass( 'current-section-parent' );
        }

      });

      section.container.find( '.customize-section-back' )
        .off( 'click keydown' )
        .on( 'click keydown', function( event ) {

          if ( api.utils.isKeydownButNotEnterEvent( event ) ) {
            return;
          }

          event.preventDefault(); // Keep this AFTER the key filter above

          if ( section.expanded() ) {
            api.section( section.params.section ).expand();
          }

        });

    },
    embed: function() {

      if (
        'travel_booking_expert_section' !== this.params.type ||
        'undefined' === typeof this.params.section
      ) {
        _sectionEmbed.call( this );
        return;
      }

      _sectionEmbed.call( this );

      var section = this;
      var parentContainer = $( '#sub-accordion-section-' + this.params.section );

      parentContainer.append( section.headContainer );

    },
    isContextuallyActive: function() {

      if (
        'travel_booking_expert_section' !== this.params.type
      ) {
        return _sectionIsContextuallyActive.call( this );
      }

      var section = this;
      var children = this._children( 'section', 'control' );

      api.section.each( function( child ) {

        if ( ! child.params.section ) {
          return;
        }

        if ( child.params.section !== section.id ) {
          return;
        }

        children.push( child );

      });

      children.sort( api.utils.prioritySort );

      var activeCount = 0;

      _( children ).each( function ( child ) {

        if ( 'undefined' !== typeof child.isContextuallyActive ) {
          if ( child.active() && child.isContextuallyActive() ) {
            activeCount += 1;
          }
        } else {
          if ( child.active() ) {
            activeCount += 1;
          }
        }
      });
      return ( activeCount !== 0 );
    }
  });
  
})( jQuery );

(function (api) {
  // Tab Control
  api.Tabs = [];
  api.Tab = api.Control.extend({
    ready: function () {
      var control = this;
      control.container.find('a.travel-booking-expert-customizer-tab').click(function (evt) {
        var tab = jQuery(this).data('tab');
        evt.preventDefault();
        control.container.find('a.travel-booking-expert-customizer-tab').removeClass('active');
        jQuery(this).addClass('active');
        control.toggleActiveControls(tab);
      });
      api.Tabs.push(control.id);
    },
    toggleActiveControls: function (tab) {
      var control = this,
      currentFields = control.params.buttons[tab].fields;
      _.each(control.params.fields, function (id) {
        var tabControl = api.control(id);
        if (undefined !== tabControl) {
          if (tabControl.active() && jQuery.inArray(id, currentFields) >= 0) {
            tabControl.toggle(true);
          } else {
            tabControl.toggle(false);
          }
        }
      });
    }
  });
  jQuery.extend(api.controlConstructor, {
    'travel-booking-expert-tab': api.Tab
  });
  api.bind('ready', function () {
    _.each(api.Tabs, function (id) {
      var control = api.control(id);
      control.toggleActiveControls(0);
    });
  });
})(wp.customize);

jQuery( document ).ready(function($) {
  // Set our slider defaults and initialise the slider
  $('.slider-custom-control').each(function(){
    var sliderValue = $(this).find('.customize-control-slider-value').val();
    var newSlider = $(this).find('.slider');
    var sliderMinValue = parseFloat(newSlider.attr('slider-min-value'));
    var sliderMaxValue = parseFloat(newSlider.attr('slider-max-value'));
    var sliderStepValue = parseFloat(newSlider.attr('slider-step-value'));

    newSlider.slider({
      value: sliderValue,
      min: sliderMinValue,
      max: sliderMaxValue,
      step: sliderStepValue,
      change: function(e,ui){
        // Important! When slider stops moving make sure to trigger change event so Customizer knows it has to save the field
        $(this).parent().find('.customize-control-slider-value').trigger('change');
        }
    });
  });

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if ($(event.target).hasClass('kt-modal')) {
      $('.kt-modal').hide();
    }
  }

});