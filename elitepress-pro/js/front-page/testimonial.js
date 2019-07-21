// Testimonial scroll Js
	jQuery('#testimonial').flexslider({
		
		animation: testimonial_settings.testi_slide_type,
		animationSpeed:testimonial_settings.testi_scroll_dura,
		slideshowSpeed:testimonial_settings.testi_timeout_dura,
		direction: "horizontal",
		controlNav: true,
		pauseOnHover: true,
		slideshow: true,
		directionNav: false,	
		easing: "swing"   
	});