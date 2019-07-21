<?php get_header();
get_template_part('index', 'banner');
?>
<!-- Blog Full Width Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">
			<!--Blog Area-->
			<div class="<?php elitepress_post_layout_class(); ?>" >
				<div class="site-content">
					<?php 
					if ( have_posts() ) :
						// Start the Loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'content','');
						endwhile;
					endif;?>			
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
			<!--/Blog Area-->
			<div class="col-md-4 sidebar-section-right">
			<?php get_sidebar(); ?>
			</div>
		</div>	
	</div>
</section>
<?php get_footer(); ?>
<!-- /Blog Full Width Section -->	