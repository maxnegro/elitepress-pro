<?php get_header(); 
$elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
$h1=$current_options['banner_title_portfolio_category'];
$bd=$current_options['banner_desc_portfolio_category'];
?>
<div class="page-title-section">
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-title">
					<h1><?php if($h1!=''){ echo $h1; } else{ 
					_e("Title",'elitepress');} ?></h1>
					<div class="page-title-seprator"></div>
					 <p><?php if($bd!=''){ echo $bd;}  else { 
					echo 'Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et dolore feugait';}?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); ?>
<!-- call template -->
<!-- Portfolio Section -->
<div class="portfolio bg-white">
	<div class="container">
	<!-- Portfolio Area -->
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<?php $norecord=0;
			$args = array (
			'post_status' => 'publish');
		$portfolio_query = null;		
		$portfolio_query = new WP_Query($args);				
		if( have_posts() )
		{ ?>
		<div class="row">
			<?php
			while (have_posts()) { the_post();
			if(get_post_meta( get_the_ID(),'project_more_btn_link', true )) 
			{ $project_more_btn_link = get_post_meta( get_the_ID(),'project_more_btn_link', true );
			} else {
			$project_more_btn_link = '';
			} ?>
			
			<?php if($current_options['taxonomy_portfolio_list']==2) { ?>
			<div class="col-md-6 col-sm-6">
			<?php } else if($current_options['taxonomy_portfolio_list']==3) { ?>
			<div class="col-md-4 col-sm-6">
			<?php } else if($current_options['taxonomy_portfolio_list']==4) { ?>
			<div class="col-md-3 col-sm-6">
			<?php } ?>
					
			<div class="portfolio-area">			
				<div class="portfolio-image">
					<?php if($current_options['taxonomy_portfolio_list']==2) { 
					elitepress_image_thumbnail('','img-responsive');
					} ?>

					<?php   if($current_options['taxonomy_portfolio_list']==3) {
					elitepress_image_thumbnail('','img-responsive');
					} ?>

					<?php if($current_options['taxonomy_portfolio_list']==4) { 
					elitepress_image_thumbnail('','img-responsive');
					} ?>  

					<?php
					if(has_post_thumbnail())
					{  
					$post_thumbnail_id = get_post_thumbnail_id();
					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
					} ?>

					<div class="portfolio-showcase-overlay">
						<div class="portfolio-showcase-overlay-inner">
							<div class="portfolio-showcase-icons">
								<?php if(isset($post_thumbnail_url)){ ?>
								<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-search"></i></a>
								<?php } 
								elitepress_get_custom_link($project_more_btn_link,get_post_meta( get_the_ID(), 'project_more_btn_target', true ),'<i class="fa fa-link"></i>'); ?>
							</div>
						</div>
					</div>
				</div>
							
				<div class="portfolio-info">
					<header class="entry-header">
						<h4 class="entry-title">
						<?php
						elitepress_get_custom_link($project_more_btn_link,get_post_meta( get_the_ID(), 'project_more_btn_target', true ),get_the_title()); ?>
						</h4>
					</header>	
					<div class="entry-content">
						<?php if(get_post_meta( get_the_ID(), 'project_description', true )){ ?>
						<p><?php echo get_post_meta( get_the_ID(), 'project_description', true ); ?></p>
						<?php }
						if (get_post_meta( get_the_ID(), 'project_more_btn_text', true )){ ?>
						<a class="port-more-link" href="<?php echo $project_more_btn_link; ?>" <?php if(get_post_meta( get_the_ID(), 'project_more_btn_target', true )) { echo "target='_blank'"; } ?> title="Read More"><?php echo get_post_meta( get_the_ID(), 'project_more_btn_text', true ); ?></a>
					<?php } ?>
					</div>
				</div>								
			</div>
		</div>
		<?php  $norecord=1;} ?>
		</div>	
		</div>
		</div>
		<?php }  
		wp_reset_query(); ?>
	</div>
</div>
<!-- /Portfolio Section -->
<?php get_footer(); ?>
<!-- /Portfolio Section -->