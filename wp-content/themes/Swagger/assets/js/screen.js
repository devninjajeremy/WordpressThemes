var $j = jQuery.noConflict();

$j(document).ready(function($) {
	
	//Portfolio
	var $container = $j('#portfolio-content');
	var toFilter = '*';
	
	$container.isotope({
		filter: toFilter,
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		}
	});
	
	$container.attr('data-current',toFilter);
	
	checkActive();

	jQuery('#navsort a').click(function(){
		var title = jQuery(this).attr('title');
		var text = jQuery(this).text();
		if(text == "All"){
			var selector = title;
		}
		else {
			var selector = "." + title;
		}
		
		$container.attr('data-current',selector);
		
		$container.isotope({ 
			filter: selector,
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
				
			}
		});
		
		checkActive();
		
		return false;
	});
	
	function checkActive(){
	
	jQuery('#navsort a').each(function(){
		
		jQuery(this).parent().removeClass(
			'selected'
		);
	
		var title = jQuery(this).attr('title');
				
		title = '.'+title;
		
		if(title=='.*'){
			title = '*';
		}
		
		
		var currentCat = $container.attr('data-current');
		
		if(title==currentCat){
			jQuery(this).parent().addClass(
			'selected'
		);
		}
		
	});
	
	}
	
	
	
	//Testimonials
	jQuery('ul#button_quotes').bxSlider({
		mode: 'fade',
		useCSS: true,
  		easing: 'easeInSine',
		speed: 1000,
		randomStart: false,
		controls: true,
		nextText: '>>',
		prevText: '<<',
		auto: true,
		pause: 3500,
		autoStart: true,
		autoDirection: 'next',
		autoHover: true
	});
	
	//About Slider
	jQuery('ul#about_slider').bxSlider({
		
		useCSS: false,
  		easing: 'easeOutExpo',
		speed: 1500,
		randomStart: false,
		controls: false,
		nextText: '>>',
		prevText: '<<',
		auto: true,
		pause: 3000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: true,
		pager: true
		
	});
	
	//Home Parallax Intro Slider Vertical Text
	jQuery('ul#home_parallax_intro1').bxSlider({
		
		useCSS: false,
  		easing: 'easeOutBounce',
		speed: 500,
		randomStart: false,
		controls: false,
		nextText: '>>',
		prevText: '<<',
		auto: true,
		pause: 3000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: true,
		pager: false,
		mode: 'vertical',
		slideMargin: 20
		
	});
	
	//Home Parallax Intro Slider Horizontal Text Elastic
	jQuery('ul#home_parallax_intro2').bxSlider({
		
		useCSS: false,
  		easing: 'easeOutElastic',
		speed: 1500,
		randomStart: false,
		controls: false,
		nextText: '>>',
		prevText: '<<',
		auto: true,
		pause: 3000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: true,
		pager: false,
		mode: 'horizontal',
		slideMargin: 20
		
	});
	
	//Home Parallax Intro Slider Text Fade
	jQuery('ul#home_parallax_intro3').bxSlider({
		mode: 'fade',
		useCSS: false,
  		easing: 'easeOutElastic',
		speed: 1400,
		randomStart: false,
		controls: false,
		nextText: '>>',
		prevText: '<<',
		auto: true,
		pause: 5000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: true,
		pager: false
	
	});
	
	//Home Parallax Intro Slider Text Fade with icon
	jQuery('ul#home_parallax_intro4').bxSlider({
		mode: 'fade',
		useCSS: false,
  		easing: 'easeOutElastic',
		speed: 1400,
		randomStart: false,
		controls: false,
		nextText: '>>',
		prevText: '<<',
		auto: true,
		pause: 5000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: true,
		pager: false
	
	});

	if (jQuery.isFunction($.fn.camera)){
	//Camera Slider
	jQuery('#camera_wrap_1').camera({
		pagination: false,
		thumbnails: false,
		loader: 'bar',
		barPosition: 'bottom'
	});
	}
	
	//FitVids
	jQuery(".container").fitVids();
	
	//Fancybox
	jQuery('.fancybox,a.instagram-photo').fancybox({
		openEffect	: 'elastic',
		helpers : { overlay : { css : {  'background' : 'rgba(0, 0,0, 0.8)'  }   } }
	});
	
	//Fancybox Other
	jQuery(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'none',
		helpers : { overlay : { css : {  'background' : 'rgba(0, 0,0, 0.8)'  }   } }
	});
	jQuery(".fancybox-gallery").click(function() {
	jQuery.fancybox(["images/demo/fullscreen-images/walking.jpg",		
		"images/demo/fullscreen-images/ghosts.jpg",
		"images/demo/fullscreen-images/girl.jpg"], 
	{"padding"		: 0,
	"transitionIn"		: "none",
	"transitionOut"		: "none",
	"type"              : "image",
	"changeFade"        : 0,
	helpers : { overlay : { css : {  'background' : 'rgba(0, 0,0, 0.8)'  }   } }
		});
	});
	jQuery(".fancybox-gmap").fancybox({
					fitToView	: false,
					width		: '60%',
					height		: '70%',
					autoSize	: false,
					openEffect	: 'elastic',
					closeEffect	: 'none',
					helpers : { overlay : { css : {  'background' : 'rgba(0, 0,0, 0.8)'  }   } }
		});
	jQuery(".fancybox-inline").fancybox({
					width		: 600,
					height		: 400,
					autoSize	: false,
					openEffect	: "elastic",
					closeEffect	: "none",
					autoDimensions:false,
					helpers : { overlay : { css : {  'background' : 'rgba(0, 0,0, 0.8)'  }   } }
		});
	jQuery(".fancybox-flash").fancybox({
	    padding           : 0,
        autoScale     	: false,
        transitionIn	: 'none',
		transitionOut		: 'none',
		width	: 680,
		height		: 495,
		helpers : { overlay : { css : {  'background' : 'rgba(0, 0,0, 0.8)'  }   } }
	});
	jQuery('#map-1').gMap({scrollwheel:true,  zoom:  14,markers: [{ latitude: 42.3676, longitude: -71.0705 }]  });
	
	//Navigation
	
	jQuery('.level-1 li').append('<span>*</span>');

	jQuery(".level-1 li:last-child").addClass("last");

	//Twitter
	JQTWEET.loadTweets();
	
	
	//Single Portfolio Slider
	jQuery(".rslides").responsiveSlides({
        auto: false,
        nav: true,
        speed: 500,
        namespace: "callbacks"
     });
	  
	//Contact Map
	jQuery('#map').gMap({
			 zoom: 14,
			 scrollwheel:false,
	markers: [{ latitude: 42.3605722, longitude: -71.0651046 }]  
	});	
	
	// Back to Top
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-top').fadeIn();
		} else {
			jQuery('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	jQuery('#back-top a').click(function () {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
	
	
	//Regular navigation
var lastId,
    topMenu = jQuery(".slide-nav"),
    topMenuHeight = 0,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
     	var hrf = jQuery(this).attr("href");
     	if(hrf.charAt(0)=="#"){
     	var item = jQuery(hrf);
      if (item.length) { return item; }
      }
   	});
	
	
	//Regular navigation
var lastId,
    topMenu = jQuery(".slide-nav"),
    topMenuHeight = 0,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
     	var hrf = jQuery(this).attr("href");
     	if(hrf.charAt(0)=="#"){
     	var item = jQuery(hrf);
      if (item.length) { return item; }
      }
   	});
	

	// Bind click handler to menu items
	// so we can get a fancy scroll animation
	menuItems.click(function(e){
 	 var href = jQuery(this).attr("href"),
      	offsetTop = href === "#" ? 0 : jQuery(href).offset().top-topMenuHeight+1;
  	jQuery('html, body').stop().animate({ 
      	scrollTop: offsetTop
  	}, '');
  	e.preventDefault();
	});

	// Bind to scroll
	jQuery(window).scroll(function(){
   	// Get container scroll position
   	var fromTop = jQuery(this).scrollTop()+topMenuHeight;
   
   	// Get id of current scroll item
   	var cur = scrollItems.map(function(){
     	if (jQuery(this).offset().top < fromTop)
       	return this;
   	});
   	// Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   
   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
       menuItems
         .parent().removeClass("selected")
         .end().filter("[href=#"+id+"]").parent().addClass("selected");
   	}  
	                 
});
	
		
	
jQuery(window).load(function(){
		
	//Full screen slideshows or images - backstretch
	jQuery(".home-section .home-full-screen").backstretch([
	
		"images/demo/fullscreen-images/city.jpg",
		"images/demo/demo-intro-slider/girl-run.jpg",
		"images/demo/demo-intro-slider/impact.jpg",
		"images/demo/demo-intro-slider/photog.jpg",
		"images/demo/demo-intro-slider/river11.jpg"
		
	], {duration: 3000, fade: 750});
	
	jQuery(".twitter-section").backstretch([
		
		"images/demo/fullscreen-images/walking.jpg",		
		"images/demo/fullscreen-images/ghosts.jpg",
		"images/demo/fullscreen-images/girl.jpg"

	], {duration: 3000, fade: 750});


});

 
	// TinyNav.js 1
      jQuery('#mainnav').tinyNav({
        active: 'selected',
		header: 'Menu'
      });
});





// revslider code
var tpj=jQuery;
				tpj.noConflict();

				tpj(window).load(function() {

				if (tpj.fn.cssOriginal!=undefined)
					tpj.fn.css = tpj.fn.cssOriginal;
					
		//	if (typeof(revolution) == 'function'){
			
			if (jQuery(".fullscreenbanner").length){
					var api = tpj('.fullscreenbanner').revolution(
						{
							delay:9000,
							startwidth:1200,
							startheight:660,

							onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off

							thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
							thumbHeight:50,
							thumbAmount:3,

							hideThumbs:0,
							navigationType:"none",				// bullet, thumb, none
							navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

							navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


							navigationHAlign:"center",				// Vertical Align top,center,bottom
							navigationVAlign:"bottom",					// Horizontal Align left,center,right
							navigationHOffset:30,
							navigationVOffset:-40,

							soloArrowLeftHalign:"left",
							soloArrowLeftValign:"center",
							soloArrowLeftHOffset:20,
							soloArrowLeftVOffset:0,

							soloArrowRightHalign:"right",
							soloArrowRightValign:"center",
							soloArrowRightHOffset:20,
							soloArrowRightVOffset:0,

							touchenabled:"on",						// Enable Swipe Function : on/off


							stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
							stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

							hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
							hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
							hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


							
							fullWidth:"on",							// Same time only Enable FullScreen of FullWidth !!
							fullScreen:"on",						// Same time only Enable FullScreen of FullWidth !!

							shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

						});


						// TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
						// YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
							api.bind("revolution.slide.onloaded",function (e) {


								jQuery('.tparrows').each(function() {
									var arrows=jQuery(this);

									var timer = setInterval(function() {

										if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
										  arrows.fadeOut(300);
									},3000);
								})

								jQuery('.tp-simpleresponsive, .tparrows').hover(function() {
									jQuery('.tp-simpleresponsive').addClass("mouseisover");
									jQuery('body').find('.tparrows').each(function() {
										jQuery(this).fadeIn(300);
									});
								}, function() {
									if (!jQuery(this).hasClass("tparrows"))
										jQuery('.tp-simpleresponsive').removeClass("mouseisover");
								})
							});
						// END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
}
			});
			
			
jQuery(window).load(function() {

	//Detect if mobile (touch) because parallax doesn't work on mobile, use backstretch instead
	//Display select nav on touch devices
	if ( Modernizr.touch ) {

		jQuery("#testimonial-section").backstretch("images/demo/fullscreen-images/smiling-people.jpg");
		jQuery("#instagram-section").backstretch("images/demo/fullscreen-images/cars.jpg");
		jQuery("#contact-section").backstretch("images/backgrounds/wavegrid.png");
		jQuery("#blog-top-section").backstretch("images/demo/fullscreen-images/office1.jpg");
		jQuery("#blog-bot-section").backstretch("images/demo/fullscreen-images/office2.jpg");
		jQuery("#port-top-section").backstretch("images/demo/fullscreen-images/graff.jpg");
		jQuery("#port-bot-section").backstretch("images/demo/fullscreen-images/graff2.jpg");
		jQuery("#facebook-section").backstretch("images/demo/fullscreen-images/office.jpg");
		jQuery("#pricing-section").backstretch("images/demo/fullscreen-images/office1.jpg");
		jQuery("#footer-social-section").backstretch("images/demo/fullscreen-images/city3.jpg");
		
		jQuery('.demo-parallax-section-home1').backstretch("images/backgrounds/frosted/79.jpg");
		jQuery('.demo-parallax-section-home2').backstretch("images/backgrounds/frosted/66.jpg");
		jQuery('.demo-parallax-section-home3').backstretch("images/demo/fullscreen-images/truck.jpg");
		jQuery('.demo-parallax-section-home4').backstretch("images/demo/fullscreen-images/desk.jpg");
		jQuery('.demo-parallax-section-home5').backstretch("images/backgrounds/frosted/55.jpg");
		
		jQuery(".demo-parallax-section-1").backstretch("images/demo/fullscreen-images/office1.jpg");
		jQuery(".demo-parallax-section-2").backstretch("images/demo/fullscreen-images/office2.jpg");
		jQuery(".demo-parallax-section-3").backstretch("images/demo/fullscreen-images/graff2.jpg");
		jQuery(".demo-parallax-section-4").backstretch("images/demo/fullscreen-images/graff.jpg");
		
		jQuery(".demo-parallax-section-5").backstretch("images/demo/fullscreen-images/pub.jpg");
		jQuery(".demo-parallax-section-6").backstretch("images/demo/fullscreen-images/bikini.jpg");
		jQuery(".demo-parallax-section-7").backstretch("images/demo/fullscreen-images/bakery.jpg");
		jQuery(".demo-parallax-section-8").backstretch("images/demo/fullscreen-images/drum.jpg");
		jQuery(".demo-parallax-section-9").backstretch("images/demo/fullscreen-images/angeles.jpg");
		jQuery(".demo-parallax-section-10").backstretch("images/demo/fullscreen-images/coffee.jpg");
		
		
		jQuery("ul#mainnav").addClass("hideTiny");
		jQuery("#tinynav1").addClass("showTiny");
	
	//If not mobile use parallax
	} else {
   		jQuery('#testimonial-section').parallax("50%", .2);
		jQuery('#instagram-section').parallax("50%", 0.2);
		jQuery('#contact-section').parallax("50%", 0.6);
		jQuery('#blog-top-section').parallax("10%", 0.3);
		jQuery('#blog-bot-section').parallax("10%", 0.3); 
		jQuery('#port-top-section').parallax("10%", 0.3);
		jQuery('#port-bot-section').parallax("10%", 0.3);
		jQuery('#facebook-section').parallax("50%", 0.3);
		jQuery('#pricing-section').parallax("50%", 0.4);
		jQuery('#footer-social-section').parallax("10%", 0.1);
		
		jQuery('.demo-parallax-section-home1').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-home2').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-home3').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-home4').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-home5').parallax("10%", 0.3);
	
		jQuery('.demo-parallax-section-1').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-2').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-3').parallax("10%", 0.3);
		jQuery('.demo-parallax-section-4').parallax("10%", 0.3);	
	
		jQuery('.demo-parallax-section-5').parallax("10%", 0.2);
		jQuery('.demo-parallax-section-6').parallax("10%", 0.2);
		jQuery('.demo-parallax-section-7').parallax("10%", 0.2);
		jQuery('.demo-parallax-section-8').parallax("10%", 0.2);
		jQuery('.demo-parallax-section-9').parallax("10%", 0.2);
		jQuery('.demo-parallax-section-10').parallax("10%", 0.2);
	}
});

