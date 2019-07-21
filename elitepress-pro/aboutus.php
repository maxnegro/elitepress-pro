<?php 
/**
Template Name: About Us
*/
get_header(); ?>
<!-- /Header Section -->
<!-- Page Title Section -->
<?php get_template_part('index','banner'); ?>
<!-- /Page Title Section -->
<!-- About Section -->
<section class="about-section">		
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
				the_post();
				the_content(); ?>
			</div>
			
		</div>
	</div>
</section>
<!-- /End of About Section -->

<div class="clearfix"></div>

<?php 
$elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); ?>
<?php if( $current_options['about_team_disable'] == false ) { ?>
<!-- Team Section -->
<section class="team-section">		
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
					<?php if($current_options['about_team_title']) { ?>
					<h3 class="section-title"><?php echo esc_html($current_options['about_team_title']); ?></h3>
					<?php } ?>
					<?php if($current_options['about_team_description']) { ?>
					<p class="section-subtitle"><?php echo esc_html($current_options['about_team_description']); ?></p>
					<?php } ?>
				</div>
			</div>		
		</div>
		<!-- /Section Title -->
	
		<!-- Team Area -->
		<div class="row">
			<?php
		$count_posts = wp_count_posts( 'elitepress_team')->publish;		
		$arg = array( 'post_type' => 'elitepress_team','posts_per_page' =>$count_posts);
		$team = new WP_Query( $arg );
		$i=1;
		if($team->have_posts())
		{	while($team->have_posts() ) : $team->the_post();

	$designation_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'designation_meta_save', true ));
	$description_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'description_meta_save', true ));
	$fb_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save', true ));
	$fb_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save_chkbx', true ));
	$lnkd_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save', true ));
	$lnkd_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save_chkbx', true ));
	$twt_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save', true ));
	$twt_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save_chkbx', true ));

		?>
			<div class="col-md-6">
				<?php
				$defalt_arg =array('class' => "media-object img-responsive",'style'=>'width:155px; height:155px;');
				if(has_post_thumbnail()){
				?>
				<div class="team-area">
					<div class="media">
						<div class="team-img">
							<?php the_post_thumbnail('webriti_team_member', $defalt_arg); ?>
						</div>
						<?php } ?>
						<div class="media-body">
							<h3 class="name"><?php the_title(); ?></h3>
							<h5 class="designation"><?php if(!empty($designation_meta_save)){ 
							echo $designation_meta_save; } ?></h5>
							<p><?php if(!empty($description_meta_save)){ 
							echo $description_meta_save; } ?></p>
							<ul class="team-social">
								<?php
						if($twt_meta_save){ 
						if($twt_meta_save_chkbx)
						{	$target ="_blank";  } else { $target ="_self";  } ?>
						<li><a href="<?php if($twt_meta_save){ echo esc_html($twt_meta_save); } ?>" target="<?php echo $target; ?>"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						<?php
						if($fb_meta_save){ 
						if($fb_meta_save_chkbx)
						{	$target ="_blank";  } else { $target ="_self";  } ?>
								<li><a href="<?php if($fb_meta_save){ echo esc_html($fb_meta_save); } ?>" target="<?php echo $target; ?>"><i class="fa fa-facebook"></i></a></li>
						<?php } ?>
						<?php
						if($lnkd_meta_save){ 
						if($lnkd_meta_save_chkbx)
						{	$target ="_blank";  } else { $target ="_self";  } ?>
								<li><a href="<?php if($lnkd_meta_save){ echo esc_html($lnkd_meta_save); } ?>" target="<?php echo $target; ?>"><i class="fa fa-linkedin"></i></a></li>			   
						<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; 
		} else { 
				$team_title = array('Danial Creg','Alexia Doe','John Doe','Beatrix Doe');
			$team_designation = array(__('DEVELOPER','elitepress'), __('DESIGNER','elitepress'), __('DEVELOPER','elitepress'), __('DESIGNER','elitepress'));
			for($i=1 ; $i<=4 ; $i++ )
			{ ?>
			<div class="col-md-6">
				<div class="team-area">
					<div class="media">
						<div class="team-img">
							<img class="media-object img-responsive" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/thumb<?php echo $i; ?>.jpg">
						</div>
						<div class="media-body">
							<h3 class="name"><?php echo $team_title[$i-1];?></h3>
							<h5 class="designation"><?php echo $team_designation[$i-1];?></h5>
							<p>
								<?php 
								echo 'Lorem ipsum dolor sit amet, conet adipis cing. Lorem ipsum dolore sit amet, consectetur adipisicings elit'; 
								?>.
							</p>
							<ul class="team-social">
								<li class="twitter"><a><i class="fa fa-twitter"></i></a></li>
								<li class="facebook"><a><i class="fa fa-facebook"></i></a></li>
								<li class="linkedin"><a><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php 	}
		} ?>
			</div>
		<!-- /Team Area -->
		
	</div>
</section>
<!-- /Team Section -->
<?php } ?>

<div class="clearfix"></div>

<!-- Clients Section -->
<?php 
if( $current_options['about_client_disable'] == false ){
		get_template_part('index','client');
}
?>
<!-- /Clients Section -->

<!-- Footer Section -->
<?php get_footer(); ?>
<!-- /Footer Copyright Section -->