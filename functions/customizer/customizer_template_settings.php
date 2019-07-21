<?php // Adding customizer template settings
function elitepress_template_settings_customizer( $wp_customize ){
	
	/* template settings Panel */
	$wp_customize->add_panel( 'template_settings', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template settings', 'elitepress'),
	) );
	
	
	/* about page section */
	$wp_customize->add_section( 'about_page' , array(
		'title'      => __('About Us page settings', 'elitepress'),
		'panel'  => 'template_settings',
		'priority'   => 2,
   	) );
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_image_description_title]',
		array(
			'default'           => __('About Us','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_image_description_title]', array(
			'label' => __('Title','elitepress'),
			'section' => 'about_page',
			'type'    =>  'text'
	));	 // About Us Page Featured Image Description Title
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_team_title]',
		array(
			'default'           => __('Meet our great team','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_team_title]', array(
			'label' => __('Team Title','elitepress'),
			'section' => 'about_page',
			'type'    =>  'text'
	));	 // About team title
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_team_description]',
		array(
			'default'           => __('We provide the best WordPress solutions for your business. Through our products you will be able to deliver more quality and gain more happy customers.','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_team_description]', array(
			'label' => __('Team Description','elitepress'),
			'section' => 'about_page',
			'type'    =>  'textarea'
	));	 // About team description
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_client_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_client_disable]', array(
			'label' => __('Hide client section from About Us page','elitepress'),
			'section' => 'about_page',
			'type'    =>  'checkbox'
	));	 // about client section disable
	
	$wp_customize->add_setting(
		'elitepress_lite_options[about_team_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[about_team_disable]', array(
			'label' => __('Hide team section from About Us page','elitepress'),
			'section' => 'about_page',
			'type'    =>  'checkbox'
	));	 // about team section disable
	
	/* Blog page section */
	$wp_customize->add_section( 'blog_page' , array(
		'title'      => __('Blog page settings', 'elitepress'),
		'panel'  => 'template_settings',
		'priority'   => 3,
   	) );
	
	$wp_customize->add_setting(
		'elitepress_lite_options[blog_meta_section_settings]',
		array(
			'default'           => true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[blog_meta_section_settings]', array(
			'label' => __('Hide post meta from blog pages, archive pages, categories, author, etc.','elitepress'),
			'section' => 'blog_page',
			'type'    =>  'checkbox'
	));	 // enable meta on blog page
	
	
	/* service page section */
	$wp_customize->add_section( 'service_page' , array(
		'title'      => __('Service page settings', 'elitepress'),
		'panel'  => 'template_settings',
		'priority'   => 4,
   	) );
	
	$wp_customize->add_setting(
		'elitepress_lite_options[service_page_team_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[service_page_team_disable]', array(
			'label' => __('Hide Team section from Service page','elitepress'),
			'section' => 'service_page',
			'type'    =>  'checkbox'
	));	 // disable team section on service page
	
	$wp_customize->add_setting(
		'elitepress_lite_options[service_page_client_disable]',
		array(
			'default'           => false,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[service_page_client_disable]', array(
			'label' => __('Hide Client section from Service page','elitepress'),
			'section' => 'service_page',
			'type'    =>  'checkbox'
	));	 // disable client section on service page
	
	
	/* contact page section */
	$wp_customize->add_section( 'contact_page' , array(
		'title'      => __('Contact page setting', 'elitepress'),
		'panel'  => 'template_settings',
   	) );
	
	$wp_customize->add_setting(
		'elitepress_lite_options[send_usmessage]',
		array(
			'default'           => __('Send us a message','elitepress'),
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[send_usmessage]', array(
			'label' => __('Contact form title','elitepress'),
			'section' => 'contact_page',
			'type'    =>  'text'
	));	 // contact form title
	
	$wp_customize->add_setting(
		'elitepress_lite_options[contact_google_map_enabled]',
		array(
			'default'           => true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[contact_google_map_enabled]', array(
			'label' => __('Enable Google Maps','elitepress'),
			'section' => 'contact_page',
			'type'    =>  'checkbox'
	));	 // google map enable / disable
	
	$wp_customize->add_setting(
		'elitepress_lite_options[contact_google_map_url]',
		array(
			'default'           => '<iframe src="https://snazzymaps.com/embed/9272" width="100%" height="550px" frameborder="0" style="border:none;"></iframe>',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[contact_google_map_url]', array(
			'label' => __('Google map URL','elitepress'),
			'section' => 'contact_page',
			'type'    =>  'textarea'
	));	 // google map url
}
add_action( 'customize_register', 'elitepress_template_settings_customizer' );