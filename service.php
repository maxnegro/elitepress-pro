<?php // Template Name: Service
get_header();
get_template_part('index','banner'); ?>

<!-- Service Section 1 -->
<?php
$service_options = get_option('elitepress_lite_options');
$elitepress_service_content  = get_theme_mod( 'elitepress_service_content');
if(empty($elitepress_service_content)){
if(!empty($service_options))
{
	$pro_service_data1 = get_option('elitepress_lite_options');
	$pro_service_data = ( !isset($pro_service_data1['testimonial_title']) ) ? 'no' : $pro_service_data1['testimonial_title'];
	if($pro_service_data!= 'no')
	{
		$args = array( 'post_type' => 'elitepress_service') ;
		$service = new WP_Query( $args );
		if( $service->have_posts() )
			{
				while ( $service->have_posts() ) : $service->the_post();
					$open_link_new_tab = get_post_meta( get_the_ID(),'service_more_btn_target', true );
					if($open_link_new_tab='on'){$open_link_new_tab_value = true;}
					$pro_service_data_old[] = array(
							'icon_value' => get_post_meta( get_the_ID(),'service_icon_image', true ),
							'image_url' => get_the_post_thumbnail_url(),
							'title'      => get_the_title(),
							'text'       => get_home_service_excerpt(),
							'open_new_tab' => $open_link_new_tab_value,
							'button_text' => get_post_meta( get_the_ID(), 'service_more_btn_text', true),
							'link'       => get_post_meta( get_the_ID(),'service_more_btn_link', true ),
							'id'         => 'customizer_repeater_56d7ea7f40b96',
							);
				endwhile;
				$elitepress_service_content = json_encode($pro_service_data_old);
			}
	}
	else
	{
		$page = get_option( 'theme_mods_elitepress','');

			if(isset($page['elitepress_service_content']))
			{
				foreach($page as $key => $value)
				{
					if($key == 'elitepress_service_content')
						{
							set_theme_mod( 'elitepress_service_content', $value );
						}
				}

			} else{

		$lite_service_data = get_option('elitepress_lite_options');
		$elitepress_service_content = json_encode( array(
		array(
		'icon_value' => isset($lite_service_data['service_one_icon'])? $lite_service_data['service_one_icon']:'fa fa-shield',
		'title'      => isset($lite_service_data['service_one_title'])? $lite_service_data['service_one_title']:'Responsive design',
		'text'       => isset($lite_service_data['service_one_description'])? $lite_service_data['service_one_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
		'open_new_tab' => false,
		'button_text' => '',
		'link'       => '',
		'id'         => 'customizer_repeater_56d7ea7f40b50',
		),

		array(
		'icon_value' => isset($lite_service_data['service_two_icon'])? $lite_service_data['service_two_icon']:'fa fa-tablet',
		'title'      => isset($lite_service_data['service_two_title'])? $lite_service_data['service_two_title']:'Twitter Bootstrap 3.2.0',
		'text'       => isset($lite_service_data['service_two_description'])? $lite_service_data['service_two_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
		'open_new_tab' => false,
		'button_text' => '',
		'link'       => '',
		'id'         => 'customizer_repeater_56d7ea7f40b56',
		),

		array(
		'icon_value' => isset($lite_service_data['service_three_icon'])? $lite_service_data['service_three_icon']:'fa fa-edit',
		'title'      => isset($lite_service_data['service_three_title'])? $lite_service_data['service_three_title']:'Exclusive support',
		'text'       => isset($lite_service_data['service_three_description'])? $lite_service_data['service_three_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
		'open_new_tab' => false,
		'button_text' => '',
		'link'       => '',
		'id'         => 'customizer_repeater_56d7ea7f40b56',
		),

		array(
		'icon_value' => isset($lite_service_data['service_four_icon'])? $lite_service_data['service_four_icon']:'fa fa-star-half-o',
		'title'      => isset($lite_service_data['service_four_title'])? $lite_service_data['service_four_title']:'Incredibly flexible',
		'text'       => isset($lite_service_data['service_four_description'])? $lite_service_data['service_four_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
		'open_new_tab' => false,
		'button_text' => '',
		'link'       => '',
		'id'         => 'customizer_repeater_56d7ea7f40b56',
		),
	) );
	}}

}
}

$elitepress_lite_options = theme_data_setup();
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); ?>
<!-- Service Section -->
<section class="service">
	<div class="container">

		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
				<?php if($current_options['service_title']) { ?>
				<h3 class="section-title"><?php echo esc_html($current_options['service_title']); ?></h3>
				<?php }
				if($current_options['service_description']) { ?>
				<p class="section-subtitle"><?php echo esc_html($current_options['service_description']); ?></p>
				<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->

		<!-- Service Area -->
		<?php elitepress_service_content( $elitepress_service_content ); ?>
		<!-- /Service Area -->
	</div>
</section>
<?php
function elitepress_service_content( $elitepress_service_content, $is_callback = false ) {
	if ( ! $is_callback ) { ?>
		<div class="row">
	    <?php
	}
	if ( ! empty( $elitepress_service_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$elitepress_service_content = json_decode( $elitepress_service_content );
		foreach ( $elitepress_service_content as $features_item ) :
			$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'elitepress_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
			$title = ! empty( $features_item->title ) ? apply_filters( 'elitepress_translate_single_string', $features_item->title, 'Features section' ) : '';
			$text = ! empty( $features_item->text ) ? apply_filters( 'elitepress_translate_single_string', $features_item->text, 'Features section' ) : '';
			$link = ! empty( $features_item->link ) ? apply_filters( 'elitepress_translate_single_string', $features_item->link, 'Features section' ) : '';
			$image = ! empty( $features_item->image_url ) ? apply_filters( 'elitepress_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			$button_text = !empty( $features_item->button_text ) ? apply_filters( 'elitepress_translate_single_string', $features_item->button_text, 'Features section' ) : '';
			$open_new_tab = !empty( $features_item->open_new_tab ) ? apply_filters( 'elitepress_translate_single_string', $features_item->open_new_tab, 'Features section' ) : '';

			if ( is_customize_preview() ) {
			}
			?>
			<div class="col-md-6 col-sm-6">
				<div class="media service-area">
					<?php if ( ! empty( $image ) ) : ?>
						<?php if ( ! empty( $link ) ) : ?>
							<!-- <div class="service-featured-img"> -->
							<div class="service-box">
							<img class="img-responsive" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
						</div>
						<?php endif; ?>
					<?php endif; ?>
						<?php if ( empty ($image) && ! empty( $icon ) ) :?>
							<div class="service-box">
									<i class="fa <?php echo esc_html( $icon ); ?>"></i>
							</div>
					<?php endif; ?>
					<div class="media-body">
					<?php if ( ! empty( $link ) ) { ?>
					<h4><a href="<?php echo esc_url( $link ); ?>">
					<?php echo esc_html( $title ); ?>
					<?php if ( ! empty( $link ) ) : ?>
					</a></h4>
					<?php endif; } else { ?>
					<h4>
					<?php if ( ! empty( $title ) ) : ?>
					<?php echo esc_html( $title ); ?>
					<?php endif; ?>
					<?php } ?>
					</h4>
					<?php if ( ! empty( $text ) ) : ?>


							<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>

							<?php endif; ?>

							<?php if($button_text != '') {?>
							<div class="service-btn">
								<a href="<?php echo $link ?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?>><?php echo $button_text ?></a>
							</div>
							<?php }?>

					</div>
				</div>
			</div>
			<?php
			endforeach;
			}
			else {
			$service_defualttext = array(__('Responsive design','elitepress'), __('Twitter Bootstrap 3.2.0','elitepress'),
			__('Exclusive support','elitepress'), __('Incredibly flexible','elitepress'));
			$font_awesome_icon = array('fa-laptop', 'fa-gift', '
			fa-thumbs-o-up', 'fa-mobile');
			for($i=0; $i<=3; $i++) { ?>
			<div class="col-md-6 col-sm-6">
				<div class="media service-area">
					<div class="service-box"><i class="fa <?php echo $font_awesome_icon[$i]; ?>"></i></div>
					<div class="media-body">
						<h4><a href="#"><?php echo $service_defualttext[$i]; ?></a></h4>
						<p><?php echo 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.'; ?></p>
						<div class="service-btn"><a title="Read More" href="#"><?php _e('Read More', 'elitepress'); ?><i class="fa fa-angle-right"></i></a></div>
					</div>
				</div>
			</div>
			<?php } }
			if ( ! $is_callback ) { ?>
		</div>
		<?php
	}
}?>
<!-- /Service Section -->
<!-- /Service Section 1 -->

<?php if( $current_options['service_page_team_disable'] == false ){

$testimonial_options = get_theme_mod('elitepress_testimonial_content');
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

	?>
<!-- Static Clients Section -->
<section class="static-clients-section">
	<div class="container">

		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
					<?php if($current_options['testimonial_title']) { ?>
					<h3 class="section-title"><?php echo esc_html($current_options['testimonial_title']); ?></h3>
					<?php }
					if($current_options['testimonial_description']) { ?>
					<p class="section-subtitle"><?php echo esc_html($current_options['testimonial_description']); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->

		<!-- Clients -->
		<div class="row">
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
			<div class="col-md-6">
				<div class="static-client-area">
					<div class="media">
							<?php if($testimonial_iteam->image_url !=''){ ?>
						<div class="static-client-img">

							<?php if($text_link!=''){?>
								<a href="<?php echo $text_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
							<?php }?>
								<img class="img-responsive img-circle" alt="Author"  src="<?php echo $testimonial_iteam->image_url; ?>" draggable="false">
							<?php if($text_link!=''){?>
								</a>
								<?php }?>

						</div>
						<?php } ?>
						<div class="media-body client-border">
							<?php if($text_desc!=''){ ?>
					<p><?php echo $text_desc; ?></p>
					<?php } ?>
						<h3 class="author-name">
						<?php if($text_link!=''){?>
						<a href="<?php echo $text_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>><?php }?>
						<?php echo $testimonial_title; ?>
						<?php if($text_link!=''){?></a><?php }?>
						<?php echo '&nbsp;&#45;&nbsp;'; ?><small class="designation"><?php if($designation !='') { echo $designation; } ?></small></h3>
						</div>
					</div>
				</div>
			</div>
						<?php }} else {
			$static_client_title = array('Laura Doe','Danial Creg','Roxen Macky','Anna Bullock');
			$static_client_designation = array(__('DEVELOPER','elitepress'), __('DESIGNER','elitepress'), __('DEVELOPER','elitepress'),__('DESIGNER','elitepress'));
			for($i=1; $i<=4 ; $i++)
			{
			?>
			<div class="col-md-6">
				<div class="static-client-area">
					<div class="media">
						<div class="static-client-img">
							<img class="media-object img-responsive" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/thumb<?php echo $i; ?>.jpg">
						</div>
						<div class="media-body client-border">
							<p><?php echo 'Auste irure dolor in reprehender in voluptate velit essele proident, sunt in culpa qui officia deserunt mollit anime proident, sunt in culpa qui officia.'; ?></p>
							<h3 class="author-name"><?php echo $static_client_title[$i-1]; ?>-<small class="designation"><?php echo $static_client_designation[$i-1]; ?></small></h3>
						</div>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
		<!-- /Clients -->

	</div>
</section>
<!-- /End of Static Clients Section -->
<?php } ?>

<!-- Clients Section -->
<?php
if( $current_options['service_page_client_disable'] == false ){
		get_template_part('index','client');
}
?>
<!-- /Clients Section -->

<!-- Footer Section -->
<?php get_footer(); ?>
<!-- /Footer Section -->
