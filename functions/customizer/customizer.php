<?php if ( ! function_exists( 'elitpress_slider_default_customize_register' ) ) :
	
	function elitpress_slider_default_customize_register( $wp_customize ) {
	
		
			// Elitepress default slider data.
			$pro_slider_data1 = get_option('elitepress_lite_options');
			$pro_slider_data = ( !isset($pro_slider_data1['testimonial_title']) ) ? 'no' : $pro_slider_data1['testimonial_title'];
			if($pro_slider_data!='no'){
					
				$elitepress_slider_content_control = $wp_customize->get_setting( 'elitepress_slider_content' );
					if ( ! empty( $elitepress_slider_content_control ) ) {
						$elitepress_lite_options=theme_data_setup(); 
						$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
						$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
						$slider = new WP_Query( $query_args ); 
						if( $slider->have_posts() )
							{	
								$elitepress_slider_content_control->default = json_encode( array() );
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
								$elitepress_slider_content_control->default = json_encode($pro_slider_data_old);
							}
							update_option( 'elitepress_slider_data', 'Datasave' );
					}
			 
		 } 
		 elseif(get_option('elitepress_lite_options')!='')
		 {
			$page = get_option( 'theme_mods_elitepress','');
			
			if(isset($page['elitepress_slider_content']))
			{
					
				foreach($page as $key => $value) 
				{
					if($key == 'elitepress_slider_content')
						{
							set_theme_mod( 'elitepress_slider_content', $value );
						}
				}
				update_option( 'elitepress_slider_data', 'Datasave' );
					
			} else {
				
				$elitepress_slider_content_control = $wp_customize->get_setting( 'elitepress_slider_content' );
					if ( ! empty( $elitepress_slider_content_control ) ) {
						$elitepress_lite_options=theme_data_setup(); 
						$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
						$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
						$slider = new WP_Query( $query_args ); 
						if( $slider->have_posts() )
							{	
								$elitepress_slider_content_control->default = json_encode( array() );
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
								$elitepress_slider_content_control->default = json_encode($pro_slider_data_old);
							}
								update_option( 'elitepress_slider_data', 'Datasave' );
					}
			}
		 } else
				{
						
				$elitepress_slider_content_control = $wp_customize->get_setting( 'elitepress_slider_content' );
				if ( ! empty( $elitepress_slider_content_control ) ) {
				$elitepress_slider_content_control->default = json_encode( array(
				array(
				'title'      => esc_html__( 'ElitePress by webriti themes', 'elitepress' ),
				'text'       => esc_html__( 'With our themes, you can create a stunning website in no time.', 'elitepress' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  => get_template_directory_uri().'/images/slide/slide1.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				),
				array(
				'title'      => esc_html__( 'Clean & fresh design', 'elitepress' ),
				'text'       => esc_html__( 'With our themes, you can create a stunning website in no time.', 'elitepress' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  => get_template_directory_uri().'/images/slide/slide2.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				),
				array(
				'title'      => esc_html__( 'ElitePress by webriti themes', 'elitepress' ),
				'text'       => esc_html__( 'With our themes, you can create a stunning website in no time.', 'elitepress' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  =>  get_template_directory_uri().'/images/slide/slide3.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b98',
				),
				array(
				'title'      => esc_html__( 'Clean & fresh design', 'elitepress' ),
				'text'       => esc_html__( 'With our themes, you can create a stunning website in no time.', 'elitepress' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  =>  get_template_directory_uri().'/images/slide/slide4.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b98',
				),
				array(
				'title'      => esc_html__( 'ElitePress by webriti themes', 'elitepress' ),
				'text'       => esc_html__( 'With our themes, you can create a stunning website in no time.', 'elitepress' ),
				'button_text'      => 'Read more',
				'link'       => '#',
				'image_url'  =>  get_template_directory_uri().'/images/slide/slide5.jpg',
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b98',
				),
			) );
			
			update_option( 'elitepress_slider_data', 'Datasave' );

		} 
		 }
		
	}
	
	 $elitepress_slider_data = get_option('elitepress_slider_data'); 
    if(!$elitepress_slider_data){
	
	add_action( 'customize_register', 'elitpress_slider_default_customize_register' );
    }
	
endif;

if ( ! function_exists( 'elitpress_testimonial_default_customize_register' ) ) :
	
	function elitpress_testimonial_default_customize_register( $wp_customize ) {
		update_option( 'elitepress_testimonial_data', 'Datasave' );
			// Elitepress default testimonial data.
		
		$pro_testimonial_data = get_option('elitepress_lite_options');
			$pro_testimonial_title = ( !isset($pro_testimonial_data['testimonial_title']) ) ? 'no' : $pro_testimonial_data['testimonial_title'];
			if($pro_testimonial_title!='no'){
			
			$elitepress_testimonial_content_control = $wp_customize->get_setting( 'elitepress_testimonial_content' );
			if ( ! empty( $elitepress_testimonial_content_control ) ) {
			
						$count_posts = wp_count_posts( 'webriti_testimonial')->publish;
						$args = array( 'post_type' => 'webriti_testimonial','posts_per_page' =>$count_posts);
						$testimonial = new WP_Query( $args ); 
						
						if( $testimonial->have_posts() )
							{
								$elitepress_testimonial_content_control->default = json_encode( array() );
								
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
								$elitepress_testimonial_content_control->default = json_encode($pro_testimonial_data_old);
							}
		
				}} else {
			$elitepress_testimonial_content_control = $wp_customize->get_setting( 'elitepress_testimonial_content' );
			if ( ! empty( $elitepress_testimonial_content_control ) ) 
			{
				$elitepress_testimonial_content_control->default = json_encode( array(
					array(
					'title'      => esc_html__( 'Mitchell Doe', 'elitepress' ),
					'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design, it's great for any blogger who wants a new look for their site. The theme is built using Twitter bootstrap.", "elitepress"),
					'designation' => 'DESIGNER',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/thumb1.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					
					),
					array(
					'title'      => esc_html__( 'Anna Culan', 'elitepress' ),
					'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design, it's great for any blogger who wants a new look for their site. The theme is built using Twitter bootstrap.", "elitepress"),
					'designation' => 'DEVELOPER',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/thumb2.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b97',
					),
					array(
					'title'      => esc_html__( 'Rocky Doe', 'elitepress' ),
					'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design, it's great for any blogger who wants a new look for their site. The theme is built using Twitter bootstrap.", "elitepress" ),
					'designation' => 'DESIGNER',
					'link'       => '#',
					'image_url'  => get_template_directory_uri().'/images/thumb3.jpg',
					'id'         => 'customizer_repeater_56d7ea7f40b98',
					'open_new_tab' => 'no',
					),
					
				) );

			}
				}
		
		
	}
	$elitepress_testimonial_data = get_option('elitepress_testimonial_data'); 
    if(!$elitepress_testimonial_data){
	add_action( 'customize_register', 'elitpress_testimonial_default_customize_register' );
    }
endif;


if ( ! function_exists( 'elitpress_service_default_customize_register' ) ) :
	
	function elitpress_service_default_customize_register( $wp_customize ) {
		
		// Elitepress default service content data
		
			$pro_service_data1 = get_option('elitepress_lite_options');
			$pro_service_data = ( !isset($pro_service_data1['testimonial_title']) ) ? 'no' : $pro_service_data1['testimonial_title'];
			if($pro_service_data!='no')
			{
				
			$elitepress_service_content_control = $wp_customize->get_setting( 'elitepress_service_content' );
			if ( ! empty( $elitepress_service_content_control ) ) {
			$args = array( 'post_type' => 'elitepress_service') ; 	
						$service = new WP_Query( $args ); 
						if( $service->have_posts() )
							{
								$elitepress_service_content_control->default = json_encode( array() );
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
								'color'      => '#2A7BC1',
								);
								unset($open_link_new_tab_value);
								endwhile; 
								$elitepress_service_content_control->default = json_encode($pro_service_data_old);
							}
							update_option( 'elitepress_service_data', 'Datasave' );
		
			} 
			} elseif(get_option('elitepress_lite_options')!='')
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
				update_option( 'elitepress_service_data', 'Datasave' );	
			} 
			
			else
		 { 
		 	
		 	
			$data = get_option('elitepress_lite_options');
		
					$elitepress_service_content_control = $wp_customize->get_setting( 'elitepress_service_content' );
					if ( ! empty( $elitepress_service_content_control ) ) {
						$elitepress_service_content_control->default = json_encode( array(
							array(
							'icon_value' => isset($data['service_one_icon'])? $data['service_one_icon']:'fa fa-shield',
							'title'      => isset($data['service_one_title'])? $data['service_one_title']:'Responsive design',
							'text'       => isset($data['service_one_description'])? $data['service_one_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
							'open_new_tab' => false,
							'button_text' => '',
							'link'       => '',
							'color'      => '#2A7BC1',
							'id'         => 'customizer_repeater_56d7ea7f40b50',
							),
							
							array(
							'icon_value' => isset($data['service_two_icon'])? $data['service_two_icon']:'fa fa-tablet',
							'title'      => isset($data['service_two_title'])? $data['service_two_title']:'Twitter Bootstrap 3.2.0',
							'text'       => isset($data['service_two_description'])? $data['service_two_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
							'open_new_tab' => false,
							'button_text' => '',
							'link'       => '',
							'color'      => '#2A7BC1',
							'id'         => 'customizer_repeater_56d7ea7f40b56',
							),
							
							array(
							'icon_value' => isset($data['service_three_icon'])? $data['service_three_icon']:'fa fa-edit',
							'title'      => isset($data['service_three_title'])? $data['service_three_title']:'Exclusive support',
							'text'       => isset($data['service_three_description'])? $data['service_three_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
							'open_new_tab' => false,
							'button_text' => '',
							'link'       => '',
							'color'      => '#2A7BC1',
							'id'         => 'customizer_repeater_56d7ea7f40b56',
							),
							
							array(
							'icon_value' => isset($data['service_four_icon'])? $data['service_four_icon']:'fa fa-star-half-o',
							'title'      => isset($data['service_four_title'])? $data['service_four_title']:'Incredibly flexible',
							'text'       => isset($data['service_four_description'])? $data['service_four_description'] :'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.',
							'open_new_tab' => false,
							'button_text' => '',
							'link'       => '',
							'color'      => '#2A7BC1',
							'id'         => 'customizer_repeater_56d7ea7f40b56',
							),
						) );
						
						update_option( 'elitepress_service_data', 'Datasave' );

					}
		 }
		 }
			else
			{
			$elitepress_service_content_control = $wp_customize->get_setting( 'elitepress_service_content' );
			if ( ! empty( $elitepress_service_content_control ) ) 
			{
					
				$elitepress_service_content_control->default = json_encode( array(
							array(
							'icon_value' => 'fa-laptop',
							'title'      => esc_html__( 'Responsive design', 'elitepress' ),
							'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design", "elitepress"),
							'button_text'      => 'Read more',
							'link'       => '#',
							'open_new_tab' => 'no',
							'id'         => 'customizer_repeater_56d7ea7f40b56',
							'color'      => '#e91e63',
							),
							array(
							'icon_value' => 'fa fa-gift',
							'title'      => esc_html__( 'Twitter Bootstrap 3.2.0', 'elitepress' ),
							'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design", "elitepress" ),
							'button_text'      => 'Read more',
							'link'       => '#',
							'open_new_tab' => 'no',
							'id'         => 'customizer_repeater_56d7ea7f40b66',
							'color'      => '#00bcd4',
							),
							array(
							'icon_value' => 'fa-thumbs-o-up',
							'title'      => esc_html__( 'Exclusive support', 'elitepress' ),
							'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design", "elitepress" ),
							'button_text'      => 'Read more',
							'link'       => '#',
							'open_new_tab' => 'no',
							'id'         => 'customizer_repeater_56d7ea7f40b86',
							'color'      => '#4caf50',
							),
							
							array(
							'icon_value' => 'fa fa-mobile',
							'title'      => esc_html__( 'Incredibly flexible', 'elitepress' ),
							'text'       => esc_html__( "A responsive theme for all type of business that features multiple nav menus, several sidebars, and more. With pixel-perfect design", "elitepress" ),
							'button_text'      => 'Read more',
							'open_new_tab' => 'no',
							'link'       => '#',
							'id'         => 'customizer_repeater_56d7ea7f40b96',
							'color'      => '#4caf50',
							),
					
				) );
				update_option( 'elitepress_service_data', 'Datasave' );
			}
		}
		
	}
	$elitepress_service_data = get_option('elitepress_service_data'); 
    if(!$elitepress_service_data){
	add_action( 'customize_register', 'elitpress_service_default_customize_register' );
    }
endif;