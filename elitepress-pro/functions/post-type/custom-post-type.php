<?php /************* Home slider custom post type ************************/
	$elitepress_lite_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
	$slug_testimonial = $current_options['webriti_testimonial_slug'];
	$slug_service = $current_options['webriti_service_slug'];
	$slug_portfolio = $current_options['webriti_portfolio_slug'];
	$slug_team = $current_options['webriti_team_slug'];
	

function webriti_testimonial_type()
{	register_post_type( 'webriti_testimonial');
}
add_action( 'init', 'webriti_testimonial_type' );

//portfolio Custom post type
function webriti_portfolio_type()
{	register_post_type( 'elitepress_portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio / Project',
				'add_new' => __('Add New', 'elitepress'),
				'add_new_item' => __('Add New Portfolio / Project','elitepress'),
				'edit_item' => __('Add New','elitepress'),
				'new_item' => __('New Link','elitepress'),
				'all_items' => __('All Portfolio / Projects','elitepress'),
				'view_item' => __('View Link','elitepress'),
				'search_items' => __('Search Links','elitepress'),
				'not_found' =>  __('No Links found','elitepress'),
				'not_found_in_trash' => __('No Links found in Trash','elitepress'), 
			),
			'supports' => array('title','thumbnail'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			
			'public' => true,
			'menu_position' =>20,
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/portfolio.png',
		)
	);
}
add_action( 'init', 'webriti_portfolio_type' );


// add custom post type services with icon
function webriti_service_type_icon()
{	register_post_type( 'elitepress_service');
}
add_action( 'init', 'webriti_service_type_icon' );

//add custom post type Team
function elitepress_team_type()
{	register_post_type( 'elitepress_team',
		array(
			'labels' => array(
				'name' => 'Our Team',
				'add_new' => __('Add New', 'elitepress'),
                'add_new_item' => __('Add New Team','elitepress'),
				'edit_item' => __('Add New','elitepress'),
				'new_item' => __('New Link','elitepress'),
				'all_items' => __('All Teams','elitepress'),
				'view_item' => __('View Link','elitepress'),
				'search_items' => __('Search Links','elitepress'),
				'not_found' =>  __('No Links found','elitepress'),
				'not_found_in_trash' => __('No Links found in Trash','elitepress'), 
				),
			'supports' => array('title', 'thumbnail', 'comments'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			'public' => true,
			'menu_position' => 20,
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/team.png',
			)
	);
}
add_action( 'init', 'elitepress_team_type' );

function elitepress_client()
{	register_post_type( 'elitepress_client',
		array(
			'labels' => array(

			'name' => __('Clients', 'elitepress'),
				//'singular_name' => 'Featured Services',
				'add_new' => __('Add New', 'elitepress'),
                'add_new_item' => __('Add New Client','elitepress'),
				'edit_item' => __('Add New','elitepress'),
				'new_item' => __('New Link','elitepress'),
				'all_items' => __('All Clients','elitepress'),
				'view_item' => __('View Link','elitepress'),
				'search_items' => __('Search Links','elitepress'),
				'not_found' =>  __('No Links found','elitepress'),
				'not_found_in_trash' => __('No Links found in Trash','elitepress'), 
				),
			'supports' => array('title','thumbnail'),
			'show_in' => true,
			'public' => true,
			'menu_position' => 20,
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/satisfied-clients.jpg',
			)
	);
}
add_action( 'init', 'elitepress_client' );
?>