( function( api ) {

	// Extends our custom "travel-hiking" section.
	api.sectionConstructor['travel-hiking'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );