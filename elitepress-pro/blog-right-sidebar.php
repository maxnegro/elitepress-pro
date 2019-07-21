<?php 
/**
Template Name: Blog-Right-Sidebar
*/
get_header(); ?>
<!-- /Header Section -->
<!-- Page Title Section -->
<?php get_template_part('index','banner'); ?>
<!-- /Page Title Section -->
<!-- Blog with Right Sidebar Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">
		
			<!--Blog Area-->
			
			<div class="<?php if(is_active_sidebar('sidebar_primary')){ echo 'col-md-8'; } else { echo 'col-md-12'; } ?>" >
				<div class="site-content">
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$paged);		
					$post_type_data = new WP_Query( $args );
					while($post_type_data->have_posts()){
					$post_type_data->the_post();
					global $more;
					$more = 0;
					get_template_part('content','');
					} ?>
					<div class="paginations">
					<?php 				
						$Webriti_pagination = new Webriti_pagination();
						$Webriti_pagination->Webriti_page($paged, $post_type_data);					
					?>
					</div>
				</div>
			<!--/Blog Area-->
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
<!-- /Blog with Right Sidebar Section -->
<!-- Footer Section -->
<?php get_footer(); ?>