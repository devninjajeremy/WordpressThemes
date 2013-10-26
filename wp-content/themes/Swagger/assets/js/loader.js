
//hides the body until the window is loaded
jQuery(document).ready(function() {
	jQuery('body').addClass('hidden_body');
});


//remove loader
jQuery(window).load(function() { //Make sure the entire site is loaded
	jQuery('#status').fadeOut();
	jQuery('#preloader').delay(350).fadeOut('slow');
	jQuery('body').removeClass('hidden_body');
})