jQuery(document).ready(function() {

	new WOW().init();

	// Colour scheme
	jQuery( "#colour-picker a" ).textresizer({
		target: "body",
		type: "cssClass",
		sizes: [ // Colour schemes really
			"full-colour-style",
			"black-white-style",
			"black-yellow-style",
			"yellow-black-style",
			"black-cream-style"
		],
		selectedIndex: 0
	});

	// Font size
	jQuery( "#font-resizer a" ).textresizer({
		target: "body",
		type: "cssClass",
		sizes: [
			"small-style",
			"medium-style",
			"large-style"
		],
		selectedIndex: 0
	});

	// Responsive Navigation (switch top drop down for select)
	jQuery('ul#top-nav').mobileMenu({
		switchWidth: 1,                   //width (in px to switch at)
		topOptionText: 'Select a sub-page or scroll down for main menu',     //first option text
		indentString: '&nbsp;&nbsp;&nbsp;'  //string for indenting nested items
	});

	/*-----------------------------------------------------------------------------------*/
	/* GENERAL SCRIPTS */
	/*-----------------------------------------------------------------------------------*/

	// Fix dropdowns in Android
	if ( /Android/i.test( navigator.userAgent ) && jQuery( window ).width() > 769 ) {
		$( '.nav li:has(ul)' ).doubleTapToGo();
	}

	// Table alt row styling
	jQuery( '.entry table tr:odd' ).addClass( 'alt-table-row' );

	// FitVids - Responsive Videos
	jQuery( ".post, .widget, .panel" ).fitVids();

	// Add class to parent menu items with JS until WP does this natively
	jQuery("ul.sub-menu").parents('li').addClass('parent');


  	// Show/hide the main navigation
  	jQuery('.nav-toggle').click(function() {
	  jQuery('#navigation').slideToggle('fast', function() {
	  	return false;
	    // Animation complete.
	  });
	});

	// Stop the navigation link moving to the anchor (Still need the anchor for semantic markup)
	jQuery('.nav-toggle a').click(function(e) {
        e.preventDefault();
    });

    // Add parent class to nav parents
	jQuery("ul.sub-menu, ul.children").parents().addClass('parent');

});