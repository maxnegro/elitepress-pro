<?php get_header();?>
<?php get_template_part('banner','header'); ?>
<!-- Page Title Section -->
<div class="clearfix"></div>
<!-- /Page Title Section -->

<!-- Blog Full Width Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">
			<!--Blog Area-->
			<div class="<?php elitepress_post_layout_class(); ?>" >
				<div class="site-content">
					<?php if ( have_posts() ) : ?>
					<h1 class="archive-title">
						Clientes
					</h1>
					<div class="row">
					<?php
					if ( have_posts() ) :
						// Start the Loop.
						while (have_posts()) : the_post(); ?>
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
							<?php  endwhile; ?>
					<?php endif;?>
					<div class="paginations">
					<?php
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					) );
					?>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
			<!--/Blog Area-->
			<div class="col-md-4">
				<div class="sidebar-section-right">
				<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<!-- /Blog Full Width Section -->
<div class="clearfix"></div>
