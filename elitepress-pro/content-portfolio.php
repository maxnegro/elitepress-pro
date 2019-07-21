<!-- Portfolio Section -->
<section class="portfolio bg-white">
	<div class="container">
	<?php 
		$post_type = 'elitepress_portfolio';
		$tax = 'portfolio_categories'; 
		$term_args=array( 'hide_empty' => true,'orderby' => 'id');
		$tax_terms = get_terms($tax, $term_args);
		$defualt_tex_id = get_option('elitepress_webriti_default_term_id');
	?>
	<!-- Tabs -->	
	<div class="row">
		<div class="col-md-12">
			<div class="portfolio-tabs-section">
				<ul class="portfolio-tabs" id="mytabs">
					<?php	foreach ($tax_terms  as $tax_term) { 
					$tax_term_name = str_replace(' ', '_', $tax_term->name);
					$tax_term_name = preg_replace('~[^A-Za-z\d\s-]+~u', 'elitepress', $tax_term_name);
					?>
					<li class="<?php if($tax_term->name=='Show All'){echo 'active';}?>"><a href="#<?php echo $tax_term_name; ?>" data-toggle="tab"><i class="fa fa-stop"></i><?php echo $tax_term->name; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>		
	</div>	
	<!-- /Tabs -->	
	
	<!-- Portfolio Area -->
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<?php $norecord=0;
		if ($tax_terms) 
		{ 	foreach ($tax_terms  as $tax_term)
			{	$count_posts = wp_count_posts( $post_type)->publish; 
				$args = array (
				'post_type' => $post_type,
				'portfolio_categories' => $tax_term->slug,
				'posts_per_page' =>$count_posts,
				'post_status' => 'publish');
			$portfolio_query = null;		
			$portfolio_query = new WP_Query($args);				
			if( $portfolio_query->have_posts() )
			{ 
			$tax_term_name = str_replace(' ', '_', $tax_term->name);
			$tax_term_name = preg_replace('~[^A-Za-z\d\s-]+~u', 'elitepress', $tax_term_name); ?>
			<div id="<?php echo $tax_term_name; ?>" class="tab-pane fade in <?php if($tax_term->name=='Show All'){echo 'active';}?>">
				<div class="row">
					<?php
					while ($portfolio_query->have_posts()) { $portfolio_query->the_post();
					if(get_post_meta( get_the_ID(),'project_more_btn_link', true )) 
					{ $project_more_btn_link = get_post_meta( get_the_ID(),'project_more_btn_link', true );
					} else {
					$project_more_btn_link = '';
					} ?>
					
					<?php if(is_page_template('portfolio-2-column.php')) { ?>
					<div class="col-md-6 col-sm-6">
					<?php } ?>
					
					<?php if(is_page_template('portfolio-3-column.php')) { ?>
					<div class="col-md-4 col-sm-6">
					<?php } ?>
					
					<?php if(is_page_template('portfolio-4-column.php')) { ?>
					<div class="col-md-3 col-sm-6">
						<?php } ?>
						<article class="portfolio-area">
					
					
							<figure class="portfolio-image">
								<?php if(is_page_template('portfolio-2-column.php')) { 
									elitepress_image_thumbnail('','img-responsive');
									} ?>
											
								<?php if(is_page_template('portfolio-3-column.php')) {
									 elitepress_image_thumbnail('','img-responsive');
								} ?>
											
								<?php if(is_page_template('portfolio-4-column.php')) { 
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
							</figure>
						
						
							<div class="portfolio-info">
								<header class="entry-header">
									<h4 class="entry-title">
										<?php
										elitepress_get_custom_link($project_more_btn_link,get_post_meta( get_the_ID(), 'project_more_btn_target', true ),get_the_title()); ?>
									</h4>
								</header>
								<?php if(get_post_meta( get_the_ID(), 'project_description', true )){ ?>
								<div class="entry-content">
									<p><?php echo get_post_meta( get_the_ID(), 'project_description', true ); ?></p>
									<?php if (get_post_meta( get_the_ID(), 'project_more_btn_text', true )){ ?>
									<p><a class="port-more-link" href="<?php echo $project_more_btn_link; ?>" <?php if(get_post_meta( get_the_ID(), 'project_more_btn_target', true )) { echo "target='_blank'"; } ?> title="Read More"><?php echo get_post_meta( get_the_ID(), 'project_more_btn_text', true ); ?></a></p>
									<?php } ?>
								</div>
								<?php } ?>
								
							</div>
						</article>
					</div>
					<?php $norecord=1; } ?>
				</div>
			</div>
			<?php } } }
			wp_reset_query(); ?>
	</div>
	<!-- /Portfolio Area -->		

	</div>
</section>
<!-- /Portfolio Section -->
<?php get_footer(); ?>