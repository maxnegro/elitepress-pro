<!-- Testimonial Section -->
<?php $testimonial_options = get_theme_mod('elitepress_testimonial_content');
if(empty($testimonial_options))
{
	$pro_testimonial_data = get_option('elitepress_lite_options');
			$pro_testimonial_title = ( !isset($pro_testimonial_data['testimonial_title']) ) ? 'no' : $pro_testimonial_data['testimonial_title'];
			if($pro_testimonial_title!='no'){
				
						$count_posts = wp_count_posts( 'webriti_testimonial')->publish;
						$args = array( 'post_type' => 'webriti_testimonial','posts_per_page' =>$count_posts);
						$testimonial = new WP_Query( $args ); 
						
						if( $testimonial->have_posts() )
							{
								while ( $testimonial->have_posts() ) : $testimonial->the_post();
								$pro_testimonial_data_old[] = array(
								'title'      => get_the_title(),
								'text'       => get_post_meta( get_the_ID(), 'testimonial_role_description', true ),
								'designation' => get_post_meta( get_the_ID(), 'testimonial_designation', true ),
								'link'       => '#',
								'image_url'  => get_the_post_thumbnail_url(),
								'open_new_tab' => false,
								'id'    => 'customizer_repeater_56d7ea7f40b96',
								);
							
								endwhile; 
								$testimonial_options = json_encode($pro_testimonial_data_old);
							}
}
}
$elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
$settings= array();
$settings=array('testi_slide_type'=>$current_options['testi_slide_type'],'animationSpeed'=>$current_options['animationSpeed'],'slide_direction'=>$current_options['slide_direction'],'slideshowSpeed' =>$current_options['slideshowSpeed']);
wp_register_script('elitepress-testimonial',get_template_directory_uri().'/js/front-page/testimonial.js',array('jquery'));
wp_localize_script('elitepress-testimonial','testimonial_settings',$current_options);
wp_enqueue_script('elitepress-testimonial');
$imgURL = $current_options['testimonial_background'];
if($imgURL != '') { ?>
<section class="testimonial-section" style="background-image:url('<?php echo $imgURL;?>'); background-repeat: no-repeat; background-position: top left; background-attachment: fixed;">
<?php } else { ?>
<section class="testimonial-section">
<?php } ?>
<div class="overlay">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
				<?php if($current_options['testimonial_title']) { ?>
				<h3 class="section-title"><?php echo esc_html($current_options['testimonial_title']); ?></h3>
				<?php }
				if($current_options['testimonial_description']) { ?>
				<p class="section-subtitle text-color"><?php echo esc_html($current_options['testimonial_description']); ?></p>
				<?php } ?>	
				</div>
			</div>		
		</div>
		<!-- /Section Title -->
		<!-- Testimonial -->
		<div id="testimonial" class="flexslider col-md-12">
		<ul class="slides">	
		<?php
					$testimonial_options = json_decode($testimonial_options);
					if( $testimonial_options!='' )
						{
					foreach($testimonial_options as $testimonial_iteam){ 
							
							$testimonial_title = ! empty( $testimonial_iteam->title ) ? apply_filters( 'elitepress_translate_single_string', $testimonial_iteam->title, 'Testimonial section' ) : '';
							$text_desc = ! empty( $testimonial_iteam->text ) ? apply_filters( 'elitepress_translate_single_string', $testimonial_iteam->text, 'Testimonial section' ) : '';
							$text_link = $testimonial_iteam->link;
							$open_new_tab = $testimonial_iteam->open_new_tab;
							
							$designation = ! empty( $testimonial_iteam->designation ) ? apply_filters( 'elitepress_translate_single_string', $testimonial_iteam->designation, 'Testimonial section' ) : '';
						?>
			
			  <li>			
				<div class="media testmonial-area">
					<?php
					
					if($testimonial_iteam->image_url !=''){ ?>
					<div class="author-box">
					<?php if($text_link!=''){?>
					<a href="<?php echo $text_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
					<?php }?>
							<img class="img-responsive img-circle" alt="Author"  src="<?php echo $testimonial_iteam->image_url; ?>" draggable="false">
							<?php if($text_link!=''){?>
							</a>
							<?php }?>
					</div>
					<?php } ?>
					<div class="media-body">
					<?php if($text_desc!=''){ ?>
					<div class="client-description"><p><?php echo $text_desc; ?></p></div>
					<?php } ?>	
						<h4 class="author-name"><?php if($text_link!=''){?>
						<a href="<?php echo $text_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>><?php }?>
						<?php echo $testimonial_title; ?> 
						<?php if($text_link!=''){?></a><?php }?>
						<?php echo '&nbsp;&#45;&nbsp;'; ?><small class="designation"><?php if($designation !='') { echo $designation; } ?></small></h4>
					</div>	
				</div>
			</li>
			
			
			<?php } } else { 
			$default_title = array('Mitchell Doe','Anna Culan','Rocky Doe');
			$default_designation = array(__('DEVELOPER','elitepress'), __('DESIGNER','elitepress'), __('DEVELOPER','elitepress'));
			for($i=1; $i<=3 ; $i++)
			{
			?>
			
			<li>			
				<div class="media testmonial-area">
					<div class="author-box">
						<a href="#" target="_blank">
						<img class="img-responsive img-circle" alt="Author" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/thumb<?php echo $i; ?>.jpg">
						</a>
					</div>
					<div class="media-body">
						<div class="client-description"><p><?php echo 'Auste irure dolor in reprehender in voluptate velit esse cillum  duis dolor fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. dolore eu fugiat nulla pariatur. Excepteur sint non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'; ?></p></div>
						<h4 class="author-name"><a href="#" target="_blank"><?php echo $default_title[$i-1]; ?></a><?php echo '&nbsp;&#45;&nbsp;'; ?><small class="designation"><?php echo $default_designation[$i-1]; ?></small></h4>
					</div>
				</div>
			</li>
			
			
			<?php } } ?>
			
			
		</ul>	
			
		</div>
		<!-- Testimonial -->
	</div>
</div>
</section>	
</section>
<!-- /End of Testimonial Section -->
<div class="clearfix"></div>