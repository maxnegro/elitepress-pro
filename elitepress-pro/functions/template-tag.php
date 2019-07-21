<?php
// function for post meta
if ( ! function_exists( 'elitepress_post_meta_content' ) ) :

function elitepress_post_meta_content()
{ $elitepress_lite_options=theme_data_setup();
					$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
						if($current_options['blog_meta_section_settings'] == true ) { ?>
					
						<div class="entry-meta">
							<span class="author">
							<?php _e('By','elitepress'); echo ' '; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_link(); ?></a>
							</span>
							<span class="tag-links">
							<?php 	$tag_list = get_the_tag_list();
							if(!empty($tag_list)) { ?>
							<?php _e('In','elitepress'); echo ' '; ?><?php the_tags('', ', ', ''); ?>
							<?php } ?>
							</span>
						</div>
					
					<?php } ?>
			
			
<?php } endif; 
// this functions accepts two parameters first is the preset size of the image and second  is for additional classes, you can also add yours 
if(!function_exists( 'elitepress_post_thumbnail')) : 

function elitepress_post_thumbnail(){
if(has_post_thumbnail()){ 
$defalt_arg =array('class' => "img-responsive");
?>
	<figure class="post-thumbnail">
				<?php if(is_active_sidebar('sidebar_primary')){ the_post_thumbnail('', $defalt_arg); } ?>
				<div class="entry-date"><h2><?php echo get_the_date('j'); ?></h2><span><?php echo get_the_date('M'); ?></span></div>
	</figure>
<?php } } endif;
// this functions accepts one parameters for image class
if(!function_exists( 'elitepress_post_layout_class' )) :
	function elitepress_post_layout_class(){
				if(is_active_sidebar('sidebar_primary'))
					{ echo 'col-md-8'; } 
				else 
					{ echo 'col-md-12'; }  
			 
} endif; 

// this functions accepts one parameters for image class
if(!function_exists( 'elitepress_full_thumbnail')) : 					
			function elitepress_image_thumbnail($preset,$class){
			if(has_post_thumbnail()){ 
			$defalt_arg =array('class' => $class);
						the_post_thumbnail($preset, $defalt_arg); } } endif;
			// This Function Check whether Sidebar active or Not
			if(!function_exists( 'elitepress_post_layout_class' )) :

			function elitepress_post_layout_class(){
				if(is_active_sidebar('sidebar_primary'))
					{ echo 'col-md-8'; } 
				else 
					{ echo 'col-md-12'; }  
			 
			} endif; 

//get taxonomy term id
if(!function_exists( 'elitepress_portfolio_term_id' )) :
function elitepress_portfolio_term_id($tax_terms,$post_type,$defualt_tex_id)
{
        //global declaration: accessable in another file
		global $tax_terms,$post_type,$defualt_tex_id; 
		
		$post_type = 'elitepress_portfolio';
		$tax = 'portfolio_categories'; 
		$term_args=array( 'hide_empty' => true,'orderby' => 'id');
		$tax_terms = get_terms($tax, $term_args);
		$defualt_tex_id = get_option('elitepress_webriti_default_term_id');
		} endif;
?>