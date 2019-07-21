<?php 
/**
Template Name: Blog-Full-width
*/
get_header(); ?>
<!-- /Header Section -->	
<!-- Page Title Section -->
<?php get_template_part('index','banner'); ?>
<!-- /Page Title Section -->

<div class="clearfix"></div>
<!-- Blog Full Width Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">
			<!--Blog Area-->
			<div class="col-md-12">
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
						$Webriti_pagination->Webriti_page($paged, $post_type_data); ?>
					</div>
				</div>
			</div>
			<!--/Blog Area-->
		</div>	
	</div>
</section>
<!-- /Blog Full Width Section -->
<div class="clearfix"></div>
<!-- Footer Section -->
<?php get_footer(); ?>
<!-- /Footer Copyright Section -->