<?php
/**Theme Name	: elitepress
 * Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');	
	
	// include default data
	require_once('theme_setup_data.php');
	
	//includes all customizer file
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_texonomy_portfolio.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_footer_customization.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_layout_manager.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_template_settings.php');
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/elitepress_header_widget.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/elitepress_social_icon.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/elitepress_contact_widget.php');
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/post-type/custom-post-type.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/meta-box/post-meta.php');
	require_once(WEBRITI_THEME_FUNCTIONS_PATH . '/scripts/scripts.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/taxonomies/taxonomies.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/pagination/webriti_pagination.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
	require( WEBRITI_TEMPLATE_DIR . '/css/custom-light.php');
	
	// Adding customizer files
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_home_page.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_banner.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/custom-controls/select/taxonomy-dropdown-custom-control.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer.php' );
	
	// WPML Translation
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/wpml-pll/functions.php' );
	
	
	//wp title tag starts here
	function elitepress_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
	                $title = "$title $sep " . sprintf( _e( 'Page', 'elitepress' ), max( $paged, $page ) );
        return $title;
}	
	add_filter( 'wp_title', 'elitepress_head', 10, 2);
	
	add_action( 'after_setup_theme', 'elitepress_setup' ); 	
	function elitepress_setup()
	{
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 600;//In PX */
		
		// Load text domain for translation-ready
		load_theme_textdomain( 'elitepress', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'elitepress' ) ); //Navigation
		register_nav_menu( 'footer_menu', __( 'Footer Menu', 'elitepress' ) );
		add_theme_support( 'automatic-feed-links');
		add_theme_support( 'title-tag' );
		//add_theme_support( 'custom-background', $args  ); 
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args  );
	}
	
	function elitepress_content_more($more)
	{  global $post;
	   return '<a href="' . get_permalink() . '" class="more-link">'.__('Read More','elitepress').'</a>';
	}   
	add_filter( 'the_content_more_link', 'elitepress_content_more' );

//this will by default select the all category
	function elitepress_mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' == $post->post_status && $post->post_type == 'elitepress_portfolio' ) {
        $taxonomies = get_object_taxonomies( $post->post_type,'object' );
        foreach ( $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy->name );
			$myid = get_option('elitepress_webriti_default_term_id');
			$a=get_term_by('id',$myid,'portfolio_categories');
            if ( empty( $terms )) {
                wp_set_object_terms( $post_id,$a->slug , $taxonomy->name );
            }
        }
    }
}
add_action( 'save_post', 'elitepress_mfields_set_default_object_terms', 100, 2 );

if ( function_exists( 'add_image_size' ) ) 
	{ 
	add_image_size('elitepress_testimonial_img',150,150,true);
	}


function elitepress_get_portfolio_terms()
{
//wp_die('in funciton');
	$post_type = 'elitepress_portfolio';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => true,'orderby' => 'id');
	$tax_terms = get_terms($tax, $term_args);
	return $tax_terms;
}
function elitepress_get_custom_link($url,$target,$title)
{
	if($title)
	{?>
			<a href="<?php echo $url; ?>" <?php if($target=='on' || $target==true){ echo 'target="_blank"'; } ?> >
			<?php echo $title; ?>
			</a>
<?php } } 

	

		
/*--------------------------------------------*/
/*    admin enqueue script function 
/*--------------------------------------------*/

function elitepress_excerpt_length($length ) {
	        return 25;
	        }
	        add_filter( 'excerpt_length', 'elitepress_excerpt_length', 999 );
	       
	        //add_filter('get_the_excerpt','elitepress_post_slider_excerpt');
	        add_filter('excerpt_more','__return_false');
			//function elitepress_post_slider_excerpt($output){
			//return '<div class="slide-text-bg2">' .'<h3>'.$output.'</h3>'.'</div>'.
									  // '<div class="flex-btn-div"><a href="' . get_permalink() . '" class="btn1 flex-btn">'.__("Read More","elitepress").'</a></div>';		   
								//}
					
function get_home_slider_excerpt()
	{
		global $post;
		$excerpt = get_the_excerpt();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = str_word_count($excerpt);
		$len=strlen($excerpt);
		if($original_len>25) {
		$excerpt = $excerpt;
		return '<div class="slide-text-bg2">' .'<h3>'.$excerpt.'</h3>'.'</div>'.
	                       '<div class="flex-btn-div"><a href="' . get_permalink() . '" class="btn1 flex-btn">'.__("Read More","elitepress").'</a></div>';	
		}
		else
		{ return '<div class="slide-text-bg2">' .'<h3>'.$excerpt.'</h3>'.'</div>'; }
	}
					
					

function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 145);
		$len=strlen($excerpt);
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt . '<p><a href="' . get_permalink() . '" class="more-link">'.__('Read More','elitepress').'</a></p>';
		}
		else
		{ return $excerpt; }
	}


function get_home_service_excerpt()
	{
		global $post;
		$excerpt = get_the_excerpt();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 245);
		$len=strlen($excerpt);
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt;
		}
		else
		{ return $excerpt; }
	}	

/*--------------------------------------------*/
/*    admin enqueue script function 
/*--------------------------------------------*/

function elitepress_enqueue_scripts(){
	wp_enqueue_style('drag-drop-css', WEBRITI_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}
add_action( 'admin_enqueue_scripts', 'elitepress_enqueue_scripts' );

// custom background
function custom_background_function()
{
	$elitepress_lite_options=theme_data_setup(); 
    $current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
	$page_bg_image_url = $current_options['webriti_back_image'];
	if($page_bg_image_url!='')
	{
	echo '<style>body{ background-image:url("'.WEBRITI_TEMPLATE_DIR_URI.'/images/bg-patterns/'.$page_bg_image_url.'");}</style>';
	}
}
add_action('wp_head','custom_background_function',10,0);
?>