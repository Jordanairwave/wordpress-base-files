var site = {
	init: function() {

		/* Navigation */
		jQuery('.responsive-menu').click(function(e) {
			e.preventDefault();
			jQuery('header nav').slideToggle();
		}); 
		/* END - JS nav slide toggle */
	  
		/*** Remove inline styles at media queries ***/
		jQuery(window).resize(function() {
			if (window.innerWidth > 640) {
				jQuery("header nav").removeAttr("style");
			}
		}); 
		/* END - JS to remove inline styles to nav */
	  
		jQuery(".responsive-menu").click(function() {
			jQuery(".down").toggleClass('downstart');
			jQuery(".fade").toggleClass("fadestart");
			jQuery(".up").toggleClass("upstart");
		});

    }
};

( function( $ ) {
	jQuery(document).ready(function(){ site.init(); });
} )( jQuery );
