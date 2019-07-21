//Main Slider

jQuery(function(){
	jQuery('.flexslider').flexslider({	
	animation: slider_settings.animation,
	animationSpeed:slider_settings.animationSpeed,
	direction: slider_settings.slide_direction,
	slideshowSpeed:slider_settings.slideshowSpeed,
	directionNav: true, 
	controlNav: false,
	pauseOnHover: true, 
	slideshow: true,
	start: function(slider){
	jQuery('body').removeClass('loading');
		}			
	});
});



