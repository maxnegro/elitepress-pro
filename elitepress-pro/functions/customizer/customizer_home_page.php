<?php $repeater_path = trailingslashit( get_template_directory() ) . '/functions/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}
// Adding customizer home page settings
function elitepress_home_page_customizer( $wp_customize ){
	
/**
 * The radio image customize control extends the WP_Customize_Control class.  This class allows
 * developers to create a list of image radio inputs.
 *
 * Note, the `$choices` array is slightly different than normal and should be in the form of
 * `array(
 *  $value => array( 'url' => $image_url, 'label' => $text_label ),
 *  $value => array( 'url' => $image_url, 'label' => $text_label ),
 * )
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Radio image customize control.
 *
 * @since  1.1.24
 * @access public
 */
class Elitepress_Customize_Control_Radio_Image extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.1.24
	 * @var   string
	 */
	public $type = 'radio-image';
	/**
	 * Displays the control content.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function render_content() {
		/* If no choices are provided, bail. */
		if ( empty( $this->choices ) ) {
			return;
		} ?>

		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<div id="<?php echo esc_attr( "input_{$this->id}" ); ?>">

			<?php foreach ( $this->choices as $value => $args ) : ?>

				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />

				<label for="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>">
					<?php if ( ! empty( $args['label'] ) ) { ?>
						<span class="screen-reader-text"><?php echo esc_html( $args['label'] ); ?></span>
						<?php
}
?>
					<img src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" 
											<?php
											if ( ! empty( $args['label'] ) ) {
												echo 'alt="' . esc_attr( $args['label'] ) . '"'; }
?>
	/>
				</label>

			<?php endforeach; ?>

		</div><!-- .image -->

		<script type="text/javascript">
			jQuery( document ).ready( function() {
				jQuery( '#<?php echo esc_attr( "input_{$this->id}" ); ?>' ).buttonset();
			} );
		</script>
	<?php
	}
	/**
	 * Loads the jQuery UI Button script and hooks our custom styles in.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'jquery-ui-button' );
		add_action( 'customize_controls_print_styles', array( $this, 'print_styles' ) );
	}
	/**
	 * Outputs custom styles to give the selected image a visible border.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function print_styles() {
	?>

		<style type="text/css" id="hybrid-customize-radio-image-css">
			.customize-control-radio-image .ui-buttonset {
				text-align: center;
			}

			.customize-control-radio-image label {
				display: inline-block;
				max-width: 33.3%;
				padding: 3px;
				font-size: inherit;
				line-height: inherit;
				height: auto;
				cursor: pointer;
				border-width: 0;
				-webkit-appearance: none;
				-webkit-border-radius: 0;
				border-radius: 0;
				white-space: nowrap;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				color: inherit;
				background: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				vertical-align: inherit;
			}

			.customize-control-radio-image label:first-of-type {
				float: left;
			}
			.customize-control-radio-image label:nth-of-type(n + 3){
				float: right;
			}

			.customize-control-radio-image label:hover {
				background: none;
				border-color: inherit;
				color: inherit;
			}

			.customize-control-radio-image label:active {
				background: none;
				border-color: inherit;
				-webkit-box-shadow: none;
				box-shadow: none;
				-webkit-transform: none;
				-ms-transform: none;
				transform: none;
			}

			.customize-control-radio-image img { border: 1px solid transparent; }
			.customize-control-radio-image .ui-state-active img {
				border-color: #5b9dd9;
				-webkit-box-shadow: 0 0 3px rgba(0,115,170,.8);
				box-shadow: 0 0 3px rgba(0,115,170,.8);
			}
		</style>
	<?php
	}
}

//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined colors','elitepress').'</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked="checked"'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-patterns/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  }
		  ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-elitepress_lite_options-webriti_stylesheet label img").click(function(){
					$("#customize-control-elitepress_lite_options-webriti_stylesheet label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		  <?php
       }

}


// list control categories	
if ( ! class_exists( 'WP_Customize_Control' ) ) return NULL;

 class Category_Dropdown_Custom_Control1 extends WP_Customize_Control
 {
    private $cats = false;
	
    public function __construct($wp_customize, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);
        parent::__construct( $wp_customize, $id, $args );
    }

    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple="multiple" <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            } 
        }
 }
// list contro categories

//class WP_back_Customize_Control extends WP_Customize_Control {
class WP_back_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';
       function render_content()
	   {
	   echo '<h3>'.__('Predefined default background','elitepress').'</h3>';
		  $name = '_customize-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img src="<?php echo get_template_directory_uri(); ?>/images/bg-patterns/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-elitepress_lite_options-webriti_back_image label img").click(function(){
					$("#customize-control-elitepress_lite_options-webriti_back_image label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		  <?php
       }
}
	/* Home Page Panel */
	$wp_customize->add_panel( 'home_page', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => __('Homepage section settings','elitepress'),
	) );
	
	/* Quick Start */
	$wp_customize->add_section( 'quick_start' , array(
		'title'      => __('Quick start', 'elitepress'),
		'panel'  => 'home_page',
		'priority'   => 0,
   	) );
	
	
	$wp_customize->add_setting(
	'elitepress_lite_options[text_title]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[text_title]', array(
        'label'   => __('Show Logo text', 'elitepress'),
        'section' => 'quick_start',
        'type'    => 'checkbox',
		'priority'   => 2,
    )); // enable / disable logo text
	
	
	$wp_customize->add_setting(
	'elitepress_lite_options[upload_image_logo]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'elitepress_lite_options[upload_image_logo]', array(
      'label'    => __( 'Upload logo', 'elitepress' ),
      'section'  => 'quick_start',
	  'priority'   => 3,
     ))
	 ); // theme logo upload
	 
	 $wp_customize->add_setting(
	'elitepress_lite_options[width]', array(
        'default'        => 100,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[width]', array(
        'label'   => __('Enter Logo width', 'elitepress'),
        'section' => 'quick_start',
        'type'    => 'text',
		'priority'   => 4,
    )); // logo width
	
	$wp_customize->add_setting(
	'elitepress_lite_options[height]', array(
        'default'        => 50,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[height]', array(
        'label'   => __('Enter Logo height', 'elitepress'),
        'section' => 'quick_start',
        'type'    => 'text',
		'priority'   => 5,
    )); // logo hieght
	
	
	if ( class_exists( 'Elitepress_Customize_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'logo_alignment', array(
				'default'           => 'left',
			)
		);

		$wp_customize->add_control(
			new Elitepress_Customize_Control_Radio_Image(
				$wp_customize, 'logo_alignment', array(
					'label'    => esc_html__('Header Layout', 'elitepress' ),
					'priority' => 6,
					'section' => 'quick_start',
					'choices' => array(
						'left' => array(
							'url' => trailingslashit( get_template_directory_uri() ) . 'images/left.png',
						),
						'center' => array(
							'url' => trailingslashit( get_template_directory_uri() ) . 'images/center.png',
						),
						'right' => array(
							'url' => trailingslashit( get_template_directory_uri() ) . 'images/right.png',
						),
					),
				)
			)
		);
	}
	
	
	
	
	
	$wp_customize->add_setting(
	'elitepress_lite_options[upload_image_favicon]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'elitepress_lite_options[upload_image_favicon]', array(
      'label'    => __('Site Favicon', 'elitepress' ),
      'section'  => 'quick_start',
	  'priority'   => 6,
     ))
	 ); // favicon icon
	 
	 $wp_customize->add_setting(
	'elitepress_lite_options[google_analytics]', array(
		'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[google_analytics]', array(
        'label'   => __('Google tracking code', 'elitepress'),
        'section' => 'quick_start',
        'type'    => 'textarea',
		'priority'   => 7,
    )); // Google analysis code
	
	$wp_customize->add_setting(
	'elitepress_lite_options[webrit_custom_css]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[webrit_custom_css]', array(
        'label'   => __('Custom CSS', 'elitepress'),
        'section' => 'quick_start',
        'type'    => 'textarea',
		'priority'   => 8,
    )); // custom css
	
	
	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Theme style settings', 'elitepress'),
		'panel'  => 'home_page',
		'priority'   => 1,
   	) );
	
	$wp_customize->add_setting(
    'elitepress_lite_options[layout_selector]',
    array(
        'default' => __('wide','elitepress'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'elitepress_lite_options[layout_selector]',
    array(
        'type' => 'select',
        'label' => __('Theme Layout','elitepress'),
        'section' => 'header_image',
		'choices' => array('wide'=>'wide', 'boxed'=>'boxed'),
	));
	
    $wp_customize->add_setting(
	'elitepress_lite_options[webriti_stylesheet]', array(
        'default'        => 'default.css',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'elitepress_lite_options[webriti_stylesheet]',
	array(
        'label'   => 'Theme Color Schemes',
        'section' => 'header_image',
		'type' => 'radio',
		'choices' => array(
			'default.css' => 'blue.png',
			'bittersweet.css' => 'default.png',
			'red.css' => 'red.png',
			'light-teal.css' => 'light-teal.png',
			'purple.css'=>'purple.png',
			'golden.css' => 'golden.png',
			'green.css' => 'green.png',
    )
	)));
	
	
	$wp_customize->add_setting(
    'elitepress_lite_options[link_color_enable]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[link_color_enable]',
    array(
        'label' => __('Enable custom color skin','elitepress'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
	'elitepress_lite_options[link_color]', array(
	'capability'     => 'edit_theme_options',
	'default' => '#31a3dd',
	'type' => 'option',
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'elitepress_lite_options[link_color]', 
	array(
		'label'      => __( 'Skin color', 'elitepress' ),
		'section'    => 'header_image',
		'settings'   => 'elitepress_lite_options[link_color]',
	) ) );
	
	//Background image
	$wp_customize->add_setting(
	'elitepress_lite_options[webriti_back_image]', array(
	'default' => 'bg-img5.png',  
	'capability'     => 'edit_theme_options',
	'type' => 'option',
    ));
	$wp_customize->add_control(new WP_back_Customize_Control($wp_customize,'elitepress_lite_options[webriti_back_image]',
	array(
        'label'   => __('Predefined default background', 'elitepress'),
        'section' => 'header_image',
		'priority'   => 160,
		'type' => 'radio',
		'choices' => array(
            'bg-img1.jpg' => 'sm1.png',
            'bg-img2.png' => 'sm2.png',
			'bg-img3.png' => 'sm3.png',
			'bg-img4.png' => 'sm4.png',
			'bg-img5.png' => 'sm5.png',
    )
	
	)));
	
	//Header widget section
	$wp_customize->add_section('header_widget_settings' , array(
	'title'      => __('Header widget section', 'elitepress'),
	'panel'  => 'home_page',
	'priority'   => 2,
	) );
	
		// Site Intro Column Layout
		$wp_customize->add_setting('elitepress_lite_options[header_column_layout]',array(
		'default' => 4,
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control('elitepress_lite_options[header_column_layout]',array(
		'type' => 'select',
		'label' => __('Select column layout','elitepress'),
		'section' => 'header_widget_settings',
		'choices' => array(1=>'1',2=>'2',3=>'3',4=>'4'),
		) );
		
	//Header widget
	class WP_header_widget_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="<?php bloginfo ( 'url' );?>/wp-admin/widgets.php" class="button"  
	target="_blank"><?php _e('Click here to add a header widget','elitepress'); ?></a>
    <?php
    }
	}

	$wp_customize->add_setting(
		'header_widget',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_header_widget_Customize_Control( $wp_customize, 'header_widget', array(	
			'section' => 'header_widget_settings',
			'priority'   => 500,
		))
	);	
	
	
	$wp_customize->add_section(
        'header_Serach_bar',
        array(
            'title' => __('Search bar settings','elitepress'),
			'panel' => 'home_page',
			'priority'   => 3,
        )
    );
	
	//Show and hide Header Search Bar
	$wp_customize->add_setting(
	'elitepress_lite_options[header_search_bar_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[header_search_bar_enabled]',
    array(
        'label' => __('Enable search bar on header','elitepress'),
        'section' => 'header_Serach_bar',
        'type' => 'checkbox',
    )
	);
	
	/* slider settings */
	$wp_customize->add_section( 'slider_settings' , array(
		'title'      => __('Slider settings', 'elitepress'),
		'panel'  => 'home_page',
		'priority'   => 4,
   	) );
	
	$wp_customize->add_setting(
	'elitepress_lite_options[home_banner_enabled]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[home_banner_enabled]', array(
        'label'   => __('Enable slider', 'elitepress'),
        'section' => 'slider_settings',
        'type'    => 'checkbox',
		'priority'   => 1,
    )); // enable / disable home banner
	
	
	if ( class_exists( 'Elitepress_Repeater' ) ) {
			$wp_customize->add_setting( 'elitepress_slider_content', array(
			) );

			$wp_customize->add_control( new Elitepress_Repeater( $wp_customize, 'elitepress_slider_content', array(
				'label'                             => esc_html__( 'Slider Content', 'elitepress' ),
				'priority'   => 2,
				'section'                           => 'slider_settings',
				'add_field_label'                   => esc_html__( 'Add new slide', 'elitepress' ),
				'item_name'                         => esc_html__( 'slide', 'elitepress' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
	
	
	
	$wp_customize->add_setting(
	'elitepress_lite_options[animation]', array(
        'default'        => 'slide',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[animation]', array(
        'label'   => __('Animation', 'elitepress'),
        'section' => 'slider_settings',
        'type'    => 'select',
		'choices'=>array('slide' =>__('slide','elitepress'), 'fade'=> __('fade','elitepress')),
		'priority'   => 4,
    )); // slider animation
	
	$wp_customize->add_setting(
	'elitepress_lite_options[animationSpeed]', array(
        'default'        => 2000,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[animationSpeed]', array(
        'label'   => __('Animation speed', 'elitepress'),
        'section' => 'slider_settings',
        'type'    => 'select',
		'choices'=>array('500'=>'0.5',
		                 '1000'=>'1.0',
						 '1500'=>'1.5',
						 '2000'=>'2.0',
						 '2500'=>'2.5',
						 '3000'=>'3.0',
						 '3500'=>'3.5',
						 '4000'=>'4.0',
						 '4500'=>'4.5',
						 '5000'=>'5.0',
						 '5500'=>'5.5'),
		'priority'   => 5,
    )); // slider animation speed
	
	$wp_customize->add_setting(
	'elitepress_lite_options[slideshowSpeed]', array(
        'default'        => 2500,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[slideshowSpeed]', array(
        'label'   => __('Slideshow speed', 'elitepress'),
        'section' => 'slider_settings',
        'type'    => 'select',
		'choices'=>array('500'=> '0.5',
		                 '1000'=>'1.0',
						 '1500'=>'1.5',
						 '2000'=>'2.0',
						 '2500'=>'2.5',
						 '3000'=>'3.0',
						 '3500'=>'3.5',
						 '4000'=>'4.0',
						 '4500'=>'4.5',
						 '5000'=>'5.0',
						 '5500'=>'5.5'),
		'priority'   => 6,
    )); // slider Slideshow speed
	
	
//Home top callout
$wp_customize->add_section(
        'header_home_callout',
        array(
            'title' => __('Home header callout setting','elitepress'),
           'priority'    => 5,
			'panel' => 'home_page',
        )
    );
	
	
	//Header Top Call Out Title
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_title]', array(
        'default'        => __('Want to say hey or find out more?','elitepress'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_title]', array(
        'label'   => __('Title', 'elitepress'),
        'section' => 'header_home_callout',
        'type'    => 'text',
    ));
	
	
	//Header Top Call Out Description
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_description]', array(
        'default'        => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs  sint occaecat proidentse.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_description]', array(
        'label'   => __('Description', 'elitepress'),
        'section' => 'header_home_callout',
        'type'    => 'textarea',
    ));
	
	//Home callout read more button
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_btn_text]', array(
        'default'        => __('Read More','elitepress'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_btn_text]', array(
        'label'   => __('Button Text', 'elitepress'),
        'section' => 'header_home_callout',
        'type'    => 'text',
    ));
	
	//Home callout read more button link
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_btn_link]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_btn_link]', array(
        'label'   => __('Button Link', 'elitepress'),
        'section' => 'header_home_callout',
        'type'    => 'text',
    ));
	
	//Home callout read more button link target
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_btn_link_target]', array(
        'default'        => true ,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_btn_link_target]', array(
        'label'   => __('Open link in new tab', 'elitepress'),
        'section' => 'header_home_callout',
        'type'    => 'checkbox',
    ));

	
	
	
	
	
	
	
	/* Service Settings */
	$wp_customize->add_section( 'service_settings' , array(
		'title'      => __('Service settings', 'elitepress'),
		'panel'  => 'home_page',
		'priority'   => 6,
   	) );
	
	$wp_customize->add_setting(
	'elitepress_lite_options[service_title]', array(
        'default'        => 'Our services',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[service_title]', array(
        'label'   => __('Title', 'elitepress'),
        'section' => 'service_settings',
        'type'    => 'text',
		'priority'   => 2,
    )); // service title
	
	$wp_customize->add_setting(
	'elitepress_lite_options[service_description]', array(
        'default'        => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[service_description]', array(
        'label'   => __('Description', 'elitepress'),
        'section' => 'service_settings',
        'type'    => 'textarea',
		'priority'   => 3,
    )); 
	
	
	if ( class_exists( 'Elitepress_Repeater' ) ) {
			$wp_customize->add_setting( 'elitepress_service_content', array(
			) );

			$wp_customize->add_control( new Elitepress_Repeater( $wp_customize, 'elitepress_service_content', array(
				'label'                             => esc_html__( 'Service Content', 'elitepress' ),
				'section'                           => 'service_settings',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add new service', 'elitepress' ),
				'item_name'                         => esc_html__( 'Service', 'elitepress' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_image_control' => true,
				) ) );
		}
	
	
	/* Portfolio Settings */
	$wp_customize->add_section('portfolio_settings' , array(
		'title'      => __('Project settings', 'elitepress'),
		'panel'  => 'home_page',
		'priority'   => 7,
   	) );
	
	
	//portfolio title
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_title]', array(
        'default'        => __('Latest projects','elitepress'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[portfolio_title]', array(
        'label'   => __('Title','elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'text',
    )); // portfolio title
	
	//portfolio description
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_description]', array(
        'default'        => 'Maecenas a mi nibh, eu euismod orc vivamus viverra lacus vitae tortor molestie malesuada. eu euismod orci. Vivamus viverra lacus vitae tortor molestie.',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[portfolio_description]', array(
        'label'   => __('Description', 'elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'textarea',
    ));

	//portfolio list
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_list]', array(
        'default'        => 3,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[portfolio_list]', array(
        'label'   => __('Input number of projects','elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'select',
		'choices'=>array( 3=>'3',
		                  6=>'6',
						  9=>'9',
						  12=>'12',
						  15=>'15',
						  18=>'18')
    ));
	// portfolio list
	
	//All portfolio Button enable
	$wp_customize->add_setting(
	'elitepress_lite_options[view_all_projects_btn_enabled]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[view_all_projects_btn_enabled]', array(
        'label'   => __('Display all project buttons', 'elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'checkbox',

));
	//All portfolio button text
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_more_text]', array(
        'default'        => __('All Projects','elitepress'),
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[portfolio_more_text]', array(
        'label'   => __('Button Text','elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'text',
    )); // All portfolio button text
	
	
	//All portfolio button text link
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_more_link]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[portfolio_more_link]', array(
        'label'   => __('Button Link', 'elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'text',
    )); // All portfolio button text
	
	
	//All portfolio button text link target
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_more_lnik_target]', array(
        'default'        => true,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[portfolio_more_lnik_target]', array(
        'label'   => __('Open link in new tab', 'elitepress'),
        'section' => 'portfolio_settings',
        'type'    => 'checkbox',
    )); //All portfolio button text link target
	
	class WP_portfolio_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=elitepress_portfolio" class="button"  target="_blank"><?php _e( 'Click here to add project','elitepress' ); ?></a>
    <?php
    }
	}

	$wp_customize->add_setting(
		'portfolio',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'portfolio', array(	
			'section' => 'portfolio_settings',
			'priority'   => 500,
		))
	);
	
	
	$wp_customize->add_setting(
     'elitepress_lite_options[portfolio_selected_category_id]',
    array(
       'capability'     => 'edit_theme_options',
	   'type' => 'option',
		)
	);	
	$wp_customize->add_control( new Taxonomy_Dropdown_Custom_Control( $wp_customize, 'elitepress_lite_options[portfolio_selected_category_id]', array(
    'label'   => __('Select category for project','elitepress'),
    'section' => 'portfolio_settings',
    'settings'   => 'elitepress_lite_options[portfolio_selected_category_id]',
	'sanitize_callback' => 'sanitize_text_field',
	) ) );
	
	// portfolio description
	
	//testimonial section
	$wp_customize->add_section(
        'testimonial_setting',
        array(
            'title' => __('Testimonials settings','elitepress'),
			'priority'   => 8,
			'panel'=>'home_page'
			)
    );
	
	//Testimonial Background image
    $wp_customize->add_setting( 'elitepress_lite_options[testimonial_background]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'elitepress_lite_options[testimonial_background]', array('label'    => __( 'Background Image', 'elitepress' ),
      'section'  => 'testimonial_setting',
      'settings' => 'elitepress_lite_options[testimonial_background]',
    ) ) );
	
	
	//Testimonail title
	$wp_customize->add_setting(
    'elitepress_lite_options[testimonial_title]',
    array(
        'default' => __('What our clients say','elitepress'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[testimonial_title]',array(
    'label'   => __('Title','elitepress'),
    'section' => 'testimonial_setting',
	 'type' => 'text',));
	 
	 //Testimonial description
	
	$wp_customize->add_setting(
    'elitepress_lite_options[testimonial_description]',
    array(
        'default' => 'Lorem ipsum dolor sit ametconsectetuer adipiscing elit.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[testimonial_description]',array(
    'label'   =>  __('Description','elitepress'),
    'section' => 'testimonial_setting',
	 'type' => 'textarea',));
	 
	 if ( class_exists( 'Elitepress_Repeater' ) ) {
			$wp_customize->add_setting( 'elitepress_testimonial_content', array(
			) );

			$wp_customize->add_control( new Elitepress_Repeater( $wp_customize, 'elitepress_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial Content', 'elitepress' ),
				'section'                           => 'testimonial_setting',
				'add_field_label'                   => esc_html__( 'Add New Testimonial', 'elitepress' ),
				'item_name'                         => esc_html__( 'Testimonial', 'elitepress' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_designation_control' => true,
				
				) ) );
		}
	
	//Slide Type Variations
	$wp_customize->add_setting(
    'elitepress_lite_options[testi_slide_type]',
    array(
		'type' => 'option',
        'default' => 'scroll',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'elitepress_lite_options[testi_slide_type]',
    array(
        'type' => 'select',
        'label' => __('Slide type variations','elitepress'),
        'section' => 'testimonial_setting',
		 'choices' => array('scroll'=>__('scroll', 'elitepress'), 'fade'=>__('fade', 'elitepress')),
		));
		
	//Testimonial Animation speed
	$wp_customize->add_setting(
    'elitepress_lite_options[testi_scroll_dura]',
    array(
        'default' => '1500',
		'type' => 'option',
    )
	);

	$wp_customize->add_control(
    'elitepress_lite_options[testi_scroll_dura]',
    array(
        'type' => 'select',
        'label' => __('Scroll duration','elitepress'),
        'section' => 'testimonial_setting',
		'priority'   => 300,
		 'choices' => array('500'=> '0.5',
		                    '1000'=>'1.0',
							'1500'=>'1.5',
							'2000' =>'2.0',
							'2500' =>'2.5',
							'3000' =>'3.0',
							'3500' =>'3.5',
							'4000' =>'4.0',
							'4500' =>'4.5',
							'5000' =>'5.0',
							'5500' =>'5.5')));	
		 
	//Testimonail Time out Duration
	$wp_customize->add_setting(
    'elitepress_lite_options[testi_timeout_dura]',
    array(
        'default' => '2000',
		'type' => 'option',
		
    )
	);

	$wp_customize->add_control(
    'elitepress_lite_options[testi_timeout_dura]',
    array(
        'type' => 'select',
        'label' => __('Time out duration','elitepress'),
        'section' => 'testimonial_setting',
		'priority'   => 300,
		 'choices' => array('500'=>'0.5',
		                    '1000'=>'1.0',
							'1500'=>'1.5',
							'2000' =>'2.0',
							'2500' =>'2.5',
							'3000' =>'3.0',
							'3500' =>'3.5',
							'4000' =>'4.0',
							'4500' =>'4.5',
							'5000' =>'5.0',
							'5500' =>'5.5' )));

		 
		
	
	
	/*Blog Heading section*/
	$wp_customize->add_section(
        'blog_setting',
        array(
            'title' => __('Latest News Settings','elitepress'),
			'priority'   => 9,
			'panel'=>'home_page'
			)
    );
	
	
	$wp_customize->add_setting(
    'elitepress_lite_options[blog_title]',
    array(
        'default' => __('Latest News','elitepress'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[blog_title]',array(
    'label'   => __('Title','elitepress'),
    'section' => 'blog_setting',
	 'type' => 'text',));
	
	$wp_customize->add_setting(
    'elitepress_lite_options[blog_description]',
    array(
        'default' =>  'Lorem ipsum dolor sit ametconsectetuer adipiscing elit.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[blog_description]',array(
    'label'   =>  __('Description','elitepress'),
    'section' => 'blog_setting',
	 'type' => 'textarea',));	
	 
	 
	 // add section to manage featured Latest blog on category basis	
	$wp_customize->add_setting(
	'elitepress_lite_options[blog_selected_category_id]', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	$wp_customize->add_control( new Category_Dropdown_Custom_Control1( $wp_customize,'elitepress_lite_options[blog_selected_category_id]', array(
    'label'   => __('Select category for Latest News','elitepress'),
    'section' => 'blog_setting',
    'settings'   =>  'elitepress_lite_options[blog_selected_category_id]',
	) ) ); // blog category
	
	$wp_customize->add_setting(
    'elitepress_lite_options[post_display_count]',
    array(
		'type' => 'option',
        'default' => '3',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'elitepress_lite_options[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select the Number of Posts','elitepress'),
        'section' => 'blog_setting',
		 'choices' => array('3'=>'3', '6'=>'6', '9' => '9', '12' => '12','15'=>'15'),
		));
	
	 
	 //Client setting
	 $wp_customize->add_section(
        'client_section_settings',
        array(
            'title' => __('Client settings','elitepress'),
            'description' => '',
			'priority'   => 10,
			'panel'  => 'home_page',)
    );
	
	//Client link
	class WP_client_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=elitepress_client" class="button"  
	target="_blank"><?php _e('Click here to add client','elitepress'); ?></a>
    <?php
    }
	}

	$wp_customize->add_setting(
		'client',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'client', array(	
			'section' => 'client_section_settings',
			'priority'   => 500,
		))
	);
	
	
	/* Index Contact*/
	$wp_customize->add_section(
        'front_conatct_setting',
        array(
            'title' => __('Contact settings','elitepress'),
			'priority'   => 12,
			'panel'=>'home_page'
			)
    );
	
	$wp_customize->add_setting(
	'elitepress_lite_options[front_contact_enable]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[front_contact_enable]',
    array(
        'label' => __('Enable front page contact details','elitepress'),
        'section' => 'front_conatct_setting',
        'type' => 'checkbox',
    )
	);
	
	
	
	
	
	$wp_customize->add_setting(
    'elitepress_lite_options[front_contact_add_setting]',
    array(
        'default' =>  __('<div id="google-map-overlay">
					<div class="elite-contact-info">
						<h2 class="contact-title">Contact Us</h2>
						<address>
							<strong><i class="fa fa-map-marker" style="padding: 0 10px 0 0;"></i>500 North Side Boulevard,</strong><br>
							San Francisco, CA, USA <br>
						</address>
						<address>
							<i class="fa fa-phone" style="padding: 0 10px 0 0;"></i>1-555-123-4567<br>
							<i class="fa fa-mobile" style="padding: 0 10px 0 0;"></i>+1 800 555 1234
						</address>
						<address>
							<a href="mailto:#"><i class="fa fa-envelope-o" style="padding: 0 10px 0 0;"></i>info@elitesupport.com</a><br>
							<a href="#"><i class="fa fa-globe" style="padding: 0 10px 0 0;"></i>www.elitepress.com</a>
						</address>
					</div>
				</div>','elitepress'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_footer_contact_sanitize_text',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[front_contact_add_setting]',array(
    'label'   => __('Contact','elitepress'),
    'section' => 'front_conatct_setting',
	 'type' => 'textarea',));
	 
	 
	 $wp_customize->add_setting(
	'elitepress_lite_options[front_contact_map_enable]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[front_contact_map_enable]',
    array(
        'label' => __('Enable front page map','elitepress'),
        'section' => 'front_conatct_setting',
        'type' => 'checkbox',
    )
	);
	 
	 
	 $wp_customize->add_setting(
    'elitepress_lite_options[front_contact_map]',
    array(
        'default' =>  __('<iframe src="https://snazzymaps.com/embed/36778" width="100%" height="550px" frameborder="0" style="border:none;"></iframe>','elitepress'),
		'capability'     => 'edit_theme_options',
		'type' => 'option',
		));	
	$wp_customize->add_control( 'elitepress_lite_options[front_contact_map]',array(
    'label'   => __('Google Map URL','elitepress'),
    'section' => 'front_conatct_setting',
	 'type' => 'textarea',));
	 
	 
	 
	 
	 
	 
	
	function elitepress_footer_contact_sanitize_text( $input ) 
	{
	return wp_kses_post( force_balance_tags( $input ) );
	}
	function elitepress_footer_contact_sanitize_html( $input ) 
	{
	return force_balance_tags( $input );
	}	
	
}
add_action( 'customize_register', 'elitepress_home_page_customizer' );


function get_categories_select() {
  $teh_cats = get_categories();
  $results;
 
  $count = count($teh_cats);
  for ($i=0; $i < $count; $i++) { 
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}