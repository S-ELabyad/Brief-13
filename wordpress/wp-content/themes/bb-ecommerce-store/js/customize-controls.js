( function( api ) {

	// Extends our custom "bb-ecommerce-store" section.
	api.sectionConstructor['bb-ecommerce-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );