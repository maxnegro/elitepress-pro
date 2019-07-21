<?php
$elitepress_lite_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
?>
<!-- Portfolio Section -->
<section class="portfolio">
	<div class="container">

		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
				<?php if($current_options['portfolio_title']) { ?>
				<h3 class="section-title"><?php echo esc_html($current_options['portfolio_title']); ?></h3>
				<?php }
				if($current_options['portfolio_description']) { ?>
				<p class="section-subtitle"><?php echo esc_html($current_options['portfolio_description']); ?></p>
				<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->

		<!-- Portfolio Area -->
		<div class="row">
		<?php
		$post_type = 'portfolio';

		$args = array (
			'post_type' => $post_type,
			// 'tax_query' => array(
			// 						array(
			// 							'taxonomy' => 'portfolio_categories',
			// 							'field'    => 'id',
			// 							'terms'    => $current_options['portfolio_selected_category_id'],
			// 							//'operator' => 'NOT IN',
			// 						),
			// 					),
			'posts_per_page' => $current_options['portfolio_list'],
			'post_status' => 'publish',
			'orderby' => 'rand',
		);
		$j=1;
		$portfolio_query = null;
		$portfolio_query = new WP_Query($args);
		if( $portfolio_query->have_posts() )
		{
		while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
		<?php
			if(get_permalink(get_the_ID())) {
				$project_more_btn_link = get_permalink(get_the_ID());
			} else {
				$project_more_btn_link = '';
			} ?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<article class="portfolio-area">
					<figure class="portfolio-image">
						<?php
						if(has_post_thumbnail())
						{
						$class=array('class'=>'img-responsive');
						the_post_thumbnail('', $class);
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
						}
						?>
						<div class="portfolio-showcase-overlay">
							<div class="portfolio-showcase-overlay-inner">
								<div class="portfolio-showcase-icons">
									<?php if(false && isset($post_thumbnail_url)){ ?>
										<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-search"></i></a>
									<?php } ?>
									<?php elitepress_get_custom_link($project_more_btn_link,get_post_meta( get_the_ID(), 'project_more_btn_target', true ),'<i class="fa fa-link"></i>'); ?>
								</div>
							</div>
						</div>
					</figure>
					<div class="portfolio-info">
						<header class="entry-header">
							<h4 class="entry-title">
								<a href="<?php echo $project_more_btn_link; ?>" <?php  if(get_post_meta( get_the_ID(),'project_more_btn_target', true )) { echo "target='_blank'"; }  ?> ><?php echo the_title(); ?></a>
							</h4>
						</header>
						<?php  if(get_post_meta( get_the_ID(),'project_description', true ))
							{ ?>
						<div class="entry-content">
							<p><?php echo get_post_meta( get_the_ID(),'project_description', true ); ?></p>
							<?php } ?>
							<?php if(get_post_meta( get_the_ID(), 'project_more_btn_text', true )) { ?>
							<p>
								<?php if($project_more_btn_link){ ?>
								<a class="port-more-link" href="<?php echo $project_more_btn_link; ?>" <?php  if(get_post_meta( get_the_ID(),'project_more_btn_target', true )) { echo "target='_blank'"; }  ?> title="<?php the_title(); ?>"><?php echo get_post_meta( get_the_ID(), 'project_more_btn_text', true ); ?></a>
								<?php } else { ?><div class="portfolio_btn_text"><?php echo get_post_meta( get_the_ID(), 'project_more_btn_text', true ); ?><i class="fa fa-angle-right"></i></div><?php } ?>
							</p>
						</div>
						<?php } ?>
					</div>
				</article>
			</div>
			<?php $j++; endwhile; } ?>

		</div>
		<?php
		$total = $portfolio_query->post_count;
		if( $total >= 3 )
		{
			if($current_options['view_all_projects_btn_enabled']==true)
			{
				if($current_options['portfolio_more_text'])
				{	?>
					<div class="row">
						<div class="col-md-12">
							<div class="project-more-btn">
							<?php if($current_options['portfolio_more_link']) { ?>
								<a class="project-btn" href="<?php if($current_options['portfolio_more_link'] !='') { echo $current_options['portfolio_more_link']; } ?>" <?php if($current_options['portfolio_more_lnik_target'] ==true) { echo "target='_blank'"; } ?> ><?php echo $current_options['portfolio_more_text']; ?></a>
							<?php } else { ?>
							<div class="view_all_project_button"><?php echo $current_options['portfolio_more_text']; ?></div> <?php } ?>
							</div>
						</div>
					</div>
		<?php } } } ?>
		<!-- /Portfolio Area -->

	</div>
</section>
<!-- /End of Portfolio Section -->
<div class="clearfix"></div>
