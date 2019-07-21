<?php function elitepress_portfolio_taxonomy() {
    register_taxonomy('portfolio_categories', 'elitepress_portfolio',
    array(  'hierarchical' => true,
			'show_in_nav_menus' => true,
            'label' => __('Portfolio Categories', 'elitepress'),
            'query_var' => true));
	if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
		wp_update_term($_POST['tax_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug']
		));
	} 
	else 
	{
	$myterms = get_terms( 'portfolio_categories',array('hide_empty'=>false) );
		if(empty($myterms)){
			$defaultterm=wp_insert_term('Show All','portfolio_categories', array('description'=> 'Default Category','slug' => 'show-all'));
			update_option('elitepress_webriti_default_term_id', $defaultterm['term_id']);
		}
	}
	//update category
	if(isset($_POST['action']) && isset($_POST['taxonomy']) )
	{	wp_update_term($_POST['tag_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug'],
		  'description' =>$_POST['description']
		));
	}
	// Delete default category
	if(isset($_POST['action']) && isset($_POST['tag_ID']) )
	{	if(($_POST['tag_ID'] == $defualt_tex_id) &&$_POST['action']	 =="delete-tag")
		{	
			delete_option('custom_texo_elitepress'); 
		} 
	}	
	
}
add_action( 'init', 'elitepress_portfolio_taxonomy' );
?>