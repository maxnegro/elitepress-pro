<?php function theme_data_setup()
{	$feature_theme_image= WEBRITI_TEMPLATE_DIR_URI . "/images/features-img.jpg";
	return $theme_options=array(
			//Logo and Fevicon header
			'webriti_stylesheet'=>'default.css',
			'webriti_back_image' =>'bg-img5.png',
			'custom_background_enabled'=>'off',
			'upload_image_favicon'=>'',
			'google_analytics'=>'',
			'webrit_custom_css'=>'',
			'link_color_enable'=> false,
			'link_color' => '#31a3dd',
			'layout_selector' => 'wide',
			'header_column_layout' => 4,
			'logo_alignment' => 'left',
			'footer_back_color' => '#1d1d1d',
			
			//Slider
			'home_banner_enabled'=>true,
			'animation' => 'slide',
			'animationSpeed' => '1500',
			'slide_direction' => 'horizontal',
			'slideshowSpeed' => '2500',
			'slider_list'=>'',
			'total_slide'=>'',
			'slider_total' => 4,
			'slider_radio' => 'demo',
			'slider_select_category' => 'Uncategorized',
			'featured_slider_post' => '',
			
			
			// Social media links
			'header_social_media_enabled'=> true,
			'facebook_media_link_target'=> true,
			'twitter_media_link_target'=> true,
			'google_media_link_target'=> true,
			'linkedin_media_link_target'=> true,
			'skype_media_link_target'=> true,
			'dribble_media_link_target'=> true,
			'youtube_media_link_target'=> true,
			'viemo_media_link_target'=> true,
			'pagelines_media_link_target'=> true,
			'social_media_facebook_link' => "#",
			'social_media_twitter_link' => "#",
			'social_media_googleplus_link' => "#",
			'social_media_linkedin_link' => "#",
			'social_media_skype_link' => "#",
			'social_media_dribbble_link' => "#",
			'social_media_youtube_link' => "#",
			'social_media_vimeo_link' => "#",
			'social_media_pagelines_link' => "#",
			
			
			//Contact Address Settings
			'contact_address_settings' => true,
			'contact_phone_number' => '+48-0987-654-321',
			'contact_email' => 'info@elitepresstheme.com',
			
			//header logo setting
			'logo_section_settings' => true,
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'250',
			'text_title'=>'on',
			
			//header search Bar setting
			'header_search_bar_enabled' => true,
			
			//Home Top Call Out Area
			'header_call_out_area_enabled' => true,
			'header_call_out_title'=> __('Want to say Hey or find out more?','elitepress'),
			'header_call_out_description'=> 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs  sint occaecat proidentse.',
			'header_call_out_btn_text'=> __('Read More','elitepress'),
			'header_call_out_btn_link'=> '#',
			'header_call_out_btn_link_target'=>true,
			
			// front page
			'front_page_data'=>'top-call-out-section,service,portfolio,testimonial,blog,client,contact',
			
			//Footer Copyright custmization
			'footer_copyright_text' => '<p>'.__('©2017 All Rights Reserved - Webriti. - Designed and Developed by','elitepress').'<a href="http://www.webriti.com/" target="_blank">'.__('Webriti','elitepress').'</a></p>',
			
			//Footer Menu bar Setting			
			'footer_menu_bar_enabled' => true,
			
			// Elitepress Google map setting
			'contact_google_map_enabled'=>'on',
			'contact_google_map_url' => '<iframe src="https://snazzymaps.com/embed/36778" width="100%" height="550px" frameborder="0" style="border:none;"></iframe>',
			'front_contact_add_setting' => __('<div id="google-map-overlay">
					<div class="elite-contact-info">
						<h2 class="contact-title">Contact Us</h2>
						<address>
							<strong><i class="fa fa-map-marker" style="padding: 0 10px 0 0;"></i>500 North Side Boulevard,</strong><br>
							San Francisco, CA, USA <br>
						</address>
						<address>
							<i class="fa fa-phone" style="padding: 0 10px 0 0;"></i>1-555-123-4567<br>
							<i class="fa fa-mobile" style="padding: 0 10px 0 0;"></i>+1 800 555 1234
						</address>
						<address>
							<a href="mailto:#"><i class="fa fa-envelope-o" style="padding: 0 10px 0 0;"></i>info@elitesupport.com</a><br>
							<a href="#"><i class="fa fa-globe" style="padding: 0 10px 0 0;"></i>www.elitepress.com</a>
						</address>
					</div>
				</div>','elitepress'), 
			'front_contact_enable' => true,
			'front_contact_map_enable' => true,
			'front_contact_map'=> '<iframe src="https://snazzymaps.com/embed/9272" width="100%" height="550px" frameborder="0" style="border:none;"></iframe>',			
			
			//About Us Page Titles
			'about_team_title' => __('Meet our great team','elitepress'),
			'about_team_description' => __('We provide the best WordPress solutions for your business. Through our products you will be able to deliver more quality and gain more happy customers.','elitepress'),
			'about_image_description_title' => __('About Us','elitepress'),
			'about_client_disable'=>false,
			'about_team_disable'=>false,
			'about_footer_callout_disable'=>false,
			
			//Blog post page
			'blog_meta_section_settings' => true,
			'blog_page_footer'=>false,
			
			
			//Contact page settings
			'send_usmessage' => __('Send us a message','elitepress'),
			'contact_text' =>'',
			'contact_page_footer_callout_disble'=>false,
			
			// service page template 
			'service_page_team_disable'=>false,
			'service_page_client_disable'=>false,
			'service_page_footer_callout_disable'=>false,
			
			
			//client
			'client_logo_enabled'=> 'on',
			'client_list'=>'',
			'total_client'=>'',
			
			
			//Portfolio setting
			'portfolio_section_enabled' => true,
			'view_all_projects_btn_enabled' => true,
			'portfolio_list' => 3,
			'portfolio_more_text' => __('All Projects','elitepress'),
			'portfolio_more_link' => '#',
			'portfolio_more_lnik_target' => true,
			'portfolio_selected_category_id' => array(get_option('elitepress_webriti_default_term_id')),
			
			'portfolio_title' => __('Latest projects','elitepress'),
			'portfolio_description' =>  'Maecenas a mi nibh, eu euismod orc vivamus viverra lacus vitae tortor molestie malesuada. eu euismod orci. Vivamus viverra lacus vitae tortor molestie.',
			'portfolio_footer_callout_disable'=>false,
			
			// Blog Settings
			'blog_section_enabled' => true,
			'post_display_count' => 3,
			'blog_selected_category_id' => array(get_option('default_category')),
			
			
			'blog_title' => __('Latest News','elitepress'),
			'blog_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.',
			
			// service Settings
			'service_section_enabled' => true,
			'service_list' => 4,
			
			'service_title' => __('Our services','elitepress'),
			'service_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			
			
			
			
			
			//Testimonial Settings			
			'testi_slide_type' => 'scroll',
			'testi_scroll_items' => '1',
			'testi_timeout_dura' => '2000',
			'testi_scroll_dura' => '1500',
			'testimonial_background' => '',
			
			'testimonial_title' => __('What our clients say','elitepress'),
			'testimonial_description' =>  'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.',
			
			
			//Post Type slug Options
			'webriti_service_slug' => 'webriti_service',
			'webriti_portfolio_slug' => 'webriti_project',
			'webriti_team_slug' => 'webriti_team',
			'webriti_testimonial_slug' => 'webriti_testimonial',
			
			
			//Banner Heading
			
			'banner_title_category' => __('Title','elitepress'),
			'banner_description_category' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
			
			'banner_title_archive' => __('Title','elitepress'),
			'banner_description_archive' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
			
			'banner_title_author' => __('Title','elitepress'),
			'banner_description_author' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
			
			'banner_title_404' => __('404 title','elitepress'),
			'banner_description_404' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
								
			'banner_title_tag' => __('Title','elitepress'),
			'banner_description_tag' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
								
			'banner_title_search' => __('Title','elitepress'),
			'banner_description_search' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
			
			'banner_title_portfolio_category' => __('Title','elitepress'),
			'banner_desc_portfolio_category' => 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait.',
			
			//Taxonomy Archive Portfolio
			'taxonomy_portfolio_list' => 2,
			);
}
?>