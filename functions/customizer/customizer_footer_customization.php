<?php // Adding customizer footer customization settings

function elitepress_footer_customization_customizer( $wp_customize ){
	
	/* footer customization */
	$wp_customize->add_panel( 'footer_customization', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer copyright settings', 'elitepress'),
	) );
	
	/* footer customization section */
	$wp_customize->add_section('footer_customization_section' , array(
		'title'      => __('Footer copyright settings', 'elitepress'),
		'panel'  => 'footer_customization',
		'priority'   => 1,
   	) );
	
	
	$wp_customize->add_setting(
	'elitepress_lite_options[footer_back_color]',
	array('default' => '#1d1d1d',
	'capability'        =>  'edit_theme_options',
			//'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
	
	)
	
	);
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'elitepress_lite_options[footer_back_color]', 
	array(
		'label'      => __( 'Footer background color', 'elitepress' ),
		'section'    => 'footer_customization_section',
		'settings'   => 'elitepress_lite_options[footer_back_color]',
	) ) );
	
	
	$wp_customize->add_setting(
		'elitepress_lite_options[footer_copyright_text]',
		array(
			'default'           =>  '<p>'.__('©2017 All Rights Reserved - Webriti. - Designed and Developed by','elitepress').'<a href="http://www.webriti.com/" target="_blank">'.__('Webriti','elitepress').'</a></p>',
			'capability'        =>  'edit_theme_options',
			//'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[footer_copyright_text]', array(
			'label' => __('Copyright text','elitepress'),
			'section' => 'footer_customization_section',
			'type'    =>  'textarea'
	));	 // footer customization text
	
	$wp_customize->add_setting(
		'elitepress_lite_options[footer_menu_bar_enabled]',
		array(
			'default'           =>  true,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[footer_menu_bar_enabled]', array(
			'label' => __('Enable Footer Menu Bar','elitepress'),
			'section' => 'footer_customization_section',
			'type'    =>  'checkbox'
	));	 // enable / disable footer menu bar
	
}
add_action( 'customize_register', 'elitepress_footer_customization_customizer' );