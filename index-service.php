
<?php $service_options = get_option('elitepress_lite_options');
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
$elitepress_lite_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
?>
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

		<?php elitepress_service_content( $elitepress_service_content ); ?>

	</div>
</section>
<!-- End of Service Section -->

<div class="clearfix"></div>
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

			?>
			<div class="col-md-6 col-sm-6">
				<div class="media service-area">
					<?php if ( ! empty( $image ) ) : ?>
						<?php if ( ! empty( $link ) ) : ?>
						<div class="service-box">
							<img class="img-responsive" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
						</div>
						<?php endif; ?>
					<?php endif; ?>
						<?php if ( empty($image) && ! empty( $icon ) ) :?>
							<div class="service-box">
									<i class="fa <?php echo esc_html( $icon ); ?>"></i>
							</div>
					<?php endif; ?>
					<div class="media-body">
					<?php if ( ! empty( $link ) ) { ?>
					<h4 class="entry-title"><a href="<?php echo esc_url( $link ); ?>">
					<?php echo esc_html( $title ); ?>
					<?php if ( ! empty( $link ) ) : ?>
					</a></h4>
					<?php endif; } else { ?>
					<h4 class="entry-title">
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
}
?>
