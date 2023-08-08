( function( api ) {

	// Extends our custom "travel-booking-expert" section.
	api.sectionConstructor['travel-booking-expert'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );