/*
 * Created by webriti
 */
 
jQuery(window).load(function(){
		  
	// Testimonial scroll Js
	jQuery('#testimonial').flexslider({
		animation: "fade",
		animationSpeed: 1500,
		slideshowSpeed: 4000,
		direction: "horizontal",
		controlNav: true,
		pauseOnHover: true, 
		slideshow: true,
		directionNav: false,	
		easing: "swing"   
	});
		  
 
	// Clients scroll Js
	jQuery('#clients').flexslider({
		animation: "slide",
		animationSpeed: 1500,
		slideshowSpeed: 2000,
		direction: "horizontal",
		controlNav: false,
		pauseOnHover: true, 
		slideshow: true,
		directionNav: false,
		itemWidth: 190,
		itemMargin: 0,
		minItems: 1,
		maxItems: 6,
		move: 1
	});
		  		  
});