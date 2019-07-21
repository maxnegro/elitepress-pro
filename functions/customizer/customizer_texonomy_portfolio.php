<?php // Adding customizer texonomy portfolio settings
function elitepress_texonomy_portfolio_customizer( $wp_customize ){
	
	/* texonomy portfolio Panel */
	$wp_customize->add_panel( 'texonomy_portfolio', array(
		'priority'       => 650,
		'capability'     => 'edit_theme_options',
		'title'      => __('Project Archive page setting', 'elitepress'),
	) );
	
	/* texonomy portfolio section */
	$wp_customize->add_section( 'texonomy_portfolio_section' , array(
		'title'      => __('Project Archive page setting', 'elitepress'),
		'panel'  => 'texonomy_portfolio',
		'priority'   => 1,
   	) );
	
	$wp_customize->add_setting(
		'elitepress_lite_options[taxonomy_portfolio_list]',
		array(
			'default'           =>  2,
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[taxonomy_portfolio_list]', array(
			'label' => __('Select column layout','elitepress'),
			'section' => 'texonomy_portfolio_section',
			'type'    =>  'select',
			'choices'=>array(2=>2,3=>3,4=>4)
	));	 // texonomy portfolio
	
}
add_action( 'customize_register', 'elitepress_texonomy_portfolio_customizer' );