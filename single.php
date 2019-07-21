<?php get_header();
get_template_part('banner','header');
 ?>
<!-- Blog Detail Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">
			<!--Blog Detail Area-->
			<div class="<?php elitepress_post_layout_class(); ?>" >
				<div class="site-content">
				<?php
					while(have_posts()) { the_post();
					 get_template_part('content',''); ?>
				<?php } ?>
				</div>
			</div>
			<!--Sidebar Area-->
			<div class="col-md-4">
				<div class="sidebar-section-right">
				<?php get_sidebar(); ?>
				</div>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</section>
<!-- Footer Section -->
<?php get_footer(); ?>
<!-- /Close of wrapper -->
