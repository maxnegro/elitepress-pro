jQuery(function() {

			//	This js For Homepage Testimonial Section
			jQuery('#testimonial_scroll').carouFredSel({
				width: '100%',
				responsive : true,
				circular: true,
				pagination: "#pager2",
				items: {
						height : 'variable',
                        visible: {
                            min: 1,
                            max: 2
                        }
                    },
				directon: 'left',
				auto: true,
				 scroll : {
						items : 1,
						duration : 2000,
						//fx:"crossfade",
						//easing: "elastic",
						timeoutDuration : 1500
					},
			}).trigger('resize');

			//	This js For Homepage Clients Logo Scroll
			jQuery('#clients_logo').carouFredSel({
				width: '100%',
				responsive : true,
				circular: true,
				align: 'center',
				pagination: "#pager3",
				items: {
						height : 'variable',
                        visible: {
                            min: 1,
                            max: 6
                        }
                    },
				directon: 'left',
				auto: true,
				 scroll : {
						items : 1,
						duration : 2000,
						//fx:"crossfade",
						//easing: "elastic",
						timeoutDuration : 1500
					},
			}).trigger('resize');

			//	This js For Portfolio Related Projects Section
			jQuery('#related_project_scroll').carouFredSel({
				width: '100%',
				responsive : true,
				circular: true,
				items: {
						height : '85%',
                        visible: {
                            min: 1,
                            max: 3,
                        }
                    },
				directon: 'left',
				auto: true,
				prev: '#project_prev',
				next: '#project_next',
				 scroll : {
						items : 1,
						duration : 1200,
						//fx:"fade",
						//easing: "elastic",
						timeoutDuration : 2000
					},
			});
			
	
		});