<?php $elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
?>
<!-- Blog Section -->
<section class="home-blog">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
					<?php if($current_options['blog_title']) { ?>
					<h3 class="section-title"><?php echo $current_options['blog_title']; ?></h3>
					<?php }
					if($current_options['blog_description']) { ?>
					<p class="section-subtitle"><?php echo $current_options['blog_description']; ?></p>
					<?php } ?>
				</div>
			</div>		
		</div>
		<!-- /Section Title -->
		
		<!-- blog -->
		<div class="row">
			<?php 
			$post_type = 'post';
			$args = array(
			'post_type' => $post_type,
			'category__in' => $current_options['blog_selected_category_id'],
			'posts_per_page' => $current_options['post_display_count']);
			$j=1;
			$blog_query = null;
			$blog_query = new WP_Query($args);
			if($blog_query->have_posts())
			{	while($blog_query->have_posts()): $blog_query->the_post();
			?>
			<div class="col-md-4 col-sm-6">
				<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
				<?php if(has_post_thumbnail()){
				$defalt_arg =array('class' => "img-responsive"); ?>
					<figure class="post-thumbnail">
					<?php the_post_thumbnail('', $defalt_arg); ?>
						<div class="entry-date"><h2><?php echo get_the_date('j'); ?></h2><span><?php echo get_the_date('M'); ?></span></div>
					</figure>
					<?php } ?>
					<div class="blog-info">
						<header class="entry-header">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</header>						
						<div class="entry-content">
							<p><?php echo get_home_blog_excerpt(); ?></p>
						</div>
					</div>
				</article>
			</div>
			<?php if($j%3==0){ echo "<div class='clearfix'></div>"; } $j++; endwhile;
			}  else  {
			echo "<div class='post_message'>".__('No Posts to show','elitepress')."</div>";
			} ?>

		</div>
		<!-- /blog -->
	</div>
</section>
<!-- /End of Blog Section -->
<div class="clearfix"></div>