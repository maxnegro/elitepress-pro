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
					<?php if ( is_day() ) : ?>
					<?php  _e( "Daily Archive", 'elitepress' ); echo ' '; echo (get_the_date()); ?>
					<?php elseif ( is_month() ) : ?>
					<?php  _e( "Monthly Archive", 'elitepress' ); echo ' '; echo (get_the_date( 'F Y' )); ?>
					<?php elseif ( is_year() ) : ?>
					<?php  _e( "Yearly Archive", 'elitepress' ); echo ' ';  echo (get_the_date( 'Y' )); ?>
					<?php else : ?>
					<?php _e( "Blog Archive", 'elitepress' ); ?>
					<?php endif; ?>
					</h1>
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
			<?php endif; ?>
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