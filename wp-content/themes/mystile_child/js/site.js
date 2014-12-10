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

});