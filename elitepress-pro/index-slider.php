<?php $slide_options = get_theme_mod('elitepress_slider_content');
if(empty($slide_options))
{
	$lite_slider_data = get_option('elitepress_lite_options');
	
	$pro_slider_data1 = get_option('elitepress_lite_options');
	$pro_slider_data = ( !isset($pro_slider_data1['testimonial_title']) ) ? 'no' : $pro_slider_data1['testimonial_title'];
	
	if($pro_slider_data!= 'no')
	{
			
		$elitepress_lite_options=theme_data_setup(); 
		$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
		$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
		$slider = new WP_Query( $query_args ); 
		if( $slider->have_posts() )
			{
				while ( $slider->have_posts() ) : $slider->the_post();
				if( strpos( wp_strip_all_tags(get_home_slider_excerpt()), 'Read More' ) !== false ) $button_text = 'Read More';
					$pro_slider_data_old[] = array(
						'title'      => get_the_title(),
						'text'       => rtrim(wp_strip_all_tags(get_home_slider_excerpt()),'Read More'),
						'button_text'      => isset($button_text)? $button_text : '',
						'link'       => get_permalink(),
						'image_url'  => get_the_post_thumbnail_url(),
						'open_new_tab' => false,
						'id'         => 'customizer_repeater_56d7ea7f40b50',
				);
				unset($button_text);
				endwhile; 
				$slide_options = json_encode($pro_slider_data_old);
			}
				
	}
	elseif(!empty($lite_slider_data))
	{
		
		$page = get_option( 'theme_mods_elitepress','');
			
			if(isset($page['elitepress_slider_content'])){
				foreach($page as $key => $value) 
		{
			if($key == 'elitepress_slider_content')
				{
					set_theme_mod( 'elitepress_slider_content', $value );
				}
		}
			} else{
				$elitepress_lite_options=theme_data_setup(); 
		$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
		$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
		$slider = new WP_Query( $query_args ); 
		if( $slider->have_posts() )
			{
				while ( $slider->have_posts() ) : $slider->the_post();
				if( strpos( wp_strip_all_tags(get_home_slider_excerpt()), 'Read More' ) !== false ) $button_text = 'Read More';
					$pro_slider_data_old[] = array(
						'title'      => get_the_title(),
						'text'       => rtrim(wp_strip_all_tags(get_home_slider_excerpt()),'Read More'),
						'button_text'      => isset($button_text)? $button_text : '',
						'link'       => get_permalink(),
						'image_url'  => get_the_post_thumbnail_url(),
						'open_new_tab' => false,
						'id'         => 'customizer_repeater_56d7ea7f40b50',
				);
				unset($button_text);
				endwhile; 
				$slide_options = json_encode($pro_slider_data_old);
			}
			}
		
	}
}
$elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
$settings= array();
$settings=array('animation'=>$current_options['animation'],'animationSpeed'=>$current_options['animationSpeed'],'slide_direction'=>$current_options['slide_direction'],'slideshowSpeed' =>$current_options['slideshowSpeed']);
 
wp_register_script('elitepress-slider',get_template_directory_uri().'/js/front-page/slider.js',array('jquery'));
wp_localize_script('elitepress-slider','slider_settings',$current_options);
wp_enqueue_script('elitepress-slider');
?>
<?php if($current_options['home_banner_enabled'] == true) { ?>
<!-- Slider -->
<section class="homepage-mycarousel">

		<div class="flexslider">
		 <div class="flex-viewport">
			<ul class="slides">
			<?php 
				$slide_options = json_decode($slide_options);
				if( $slide_options!='' )
				{
					foreach($slide_options as $slide_iteam){?>
				<li>
					<?php if($slide_iteam->image_url!=''){ ?>
					<img alt="img" class="img-responsive" src="<?php echo $slide_iteam->image_url; ?>" draggable="false">
					
					<?php
					}
					
					$title = ! empty( $slide_iteam->title ) ? apply_filters( 'elitepress_translate_single_string', $slide_iteam->title, 'Slider section' ) : ''; 
					$img_description = ! empty( $slide_iteam->text ) ? apply_filters( 'elitepress_translate_single_string', $slide_iteam->text, 'Slider section' ) : '';
					$readmorelink = $slide_iteam->link;
					$readmore_button = ! empty( $slide_iteam->button_text ) ? apply_filters( 'elitepress_translate_single_string', $slide_iteam->button_text, 'Slider section' ) : '';
					$open_new_tab = $slide_iteam->open_new_tab;
					?>
					
					<div class="container flex-slider-center">
						<?php if($title != '') { ?>
						<div class="slide-text-bg1"><h1><?php echo $title; ?></h1></div>
						<?php }?>
						<?php  
							if($img_description !=''){?>
							<div class="slide-text-bg2">
							<h3><?php echo $img_description ?></h3>
							</div>
							<?php } ?>
						
						<?php if($readmore_button != '') {?>
						<div class="flex-btn-div">
							<a href="<?php echo $readmorelink ?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?> class="btn1 flex-btn"><?php echo $readmore_button ?></a>
						</div>	
						<?php }?>						
                    </div>
				</li>	
				<?php } 
				} else {
					$slider_default_title = array(__('ElitePress by webriti themes','elitepress'), __('Clean & fresh design','elitepress'), __('ElitePress by webriti themes','elitepress'), __('Clean & fresh design','elitepress'), __('ElitePress by webriti themes','elitepress'),__('Clean & fresh design','elitepress'));
						for($i=1; $i<=5; $i++) 
						{  ?>
						<li>
							<img class="img-responsive" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slide/slide<?php echo $i; ?>.jpg">
							<div class="container flex-slider-center">
								<div class="slide-text-bg1"><h1><?php echo $slider_default_title[$i-1]; ?></h1>
								</div>
								<div class="slide-text-bg2"><h3><?php _e('Create fresh website fast with us', 'elitepress'); ?></h3></div>
								<div class="flex-btn-div"><a class="btn1 flex-btn" href="#"><?php _e('Read More', 'elitepress'); ?></a></div>
							</div>
						</li>
				<?php }
				}?>
			</ul>
		</div>
		</div>
</section>
<?php } ?>
<!-- /Slider -->