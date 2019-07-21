<?php function elitepress_scripts()
{	
	$current_options = wp_parse_args( get_option('elitepress_lite_options',array()),theme_data_setup());
	
	wp_enqueue_style('elitepress-bootstrap', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	wp_enqueue_style('elitepress-style', get_stylesheet_uri() );
	if($current_options['link_color_enable'] == true) {
		custom_light();
	}
	else
	{
	$class=$current_options['webriti_stylesheet'];
	wp_enqueue_style('default', WEBRITI_TEMPLATE_DIR_URI . '/css/'.$class);
	}
	wp_enqueue_style('elitepress-theme-menu', WEBRITI_TEMPLATE_DIR_URI . '/css/theme-menu.css');
	wp_enqueue_style('elitepress-media-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	wp_enqueue_style('elitepress-font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css');	
	wp_enqueue_style('elitepress-font-awesome', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('elitepress-tool-tip', WEBRITI_TEMPLATE_DIR_URI . '/css/css-tooltips.css');
	wp_enqueue_style('elitepress-switcher', WEBRITI_TEMPLATE_DIR_URI . '/css/switcher/switcher.css');
	
	wp_enqueue_script('elitepress-menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
	wp_enqueue_script('elitepress-bootstrap-min', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');
    wp_enqueue_script('jquery');
	
	
	// Portfolio js and css
	 if(is_page_template('portfolio-2-column.php') || is_page_template('portfolio-3-column.php') || is_page_template('portfolio-4-column.php') || is_tax('portfolio_categories') )
	{
		wp_enqueue_style('elitepress-lightbox', WEBRITI_TEMPLATE_DIR_URI . '/css/lightbox.css');	
		wp_enqueue_script('elitepress-lightbox', WEBRITI_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
	}
	if(is_page_template('aboutus.php') || is_page_template('service.php')){
		wp_enqueue_style('elitepress-lightbox', WEBRITI_TEMPLATE_DIR_URI . '/css/lightbox.css');	
		wp_enqueue_style('elitepress-flexslider', WEBRITI_TEMPLATE_DIR_URI . '/css/flexslider/flexslider.css');
		wp_enqueue_script('elitepress-lightbox', WEBRITI_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
		wp_enqueue_script('elitepress-jquery-flexslider', WEBRITI_TEMPLATE_DIR_URI .'/js/flexslider/jquery.flexslider.js');
	}
	if( is_front_page() || is_page_template('template-homepage.php') )
	{
		wp_enqueue_style('elitepress-lightbox', WEBRITI_TEMPLATE_DIR_URI . '/css/lightbox.css');	
		wp_enqueue_style('elitepress-flexslider', WEBRITI_TEMPLATE_DIR_URI . '/css/flexslider/flexslider.css');
		wp_enqueue_script('elitepress-lightbox', WEBRITI_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
		wp_enqueue_script('elitepress-jquery-flexslider', WEBRITI_TEMPLATE_DIR_URI .'/js/flexslider/jquery.flexslider.js');
		//wp_enqueue_script('elitepress-jquery-flexslider-element', WEBRITI_TEMPLATE_DIR_URI .'/js/flexslider/flexslider-element.js');
	}
}
add_action('wp_enqueue_scripts', 'elitepress_scripts');

if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}


// Adding custom enqueue scripts
function custom_scripts(){
	
	$current_options = wp_parse_args( get_option('elitepress_lite_options',array()),theme_data_setup());
  ?>
	<style>
	<?php echo $current_options['webrit_custom_css']; ?>
	</style>
	<?php
	echo $current_options['google_analytics']; 
 }
add_action( 'wp_head', 'custom_scripts' ); 


function footer_custom_script()
{
$elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options);
	if($current_options['link_color_enable'] == true) {
		custom_light();
	}
}
add_action('wp_footer','footer_custom_script'); 
?>