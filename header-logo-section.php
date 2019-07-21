<!-- /Logo goes here -->
<div class="container">
	<div class="row">
		
		<?php $logo_alignment = get_theme_mod( 'logo_alignment', 'left' );
			   if($logo_alignment == 'left') { ?>
		<div class="col-md-3">
			<?php $elitepress_lite_options=theme_data_setup(); 
				$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
				if($current_options['logo_section_settings']==true) { ?>
		<div class="site-logo">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
				if($current_options['text_title'] ==true)
				{ echo "<div class=elegent_title_head>" . get_bloginfo( ). "</div>"; }
				else if($current_options['upload_image_logo']!='') 
				{ ?>
				<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); }  else { "50"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); }  else { "250"; } ?>px;" alt="logo" />
				<?php } else { ?> 
				<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo5.png" class="img-responsive"/>
				<?php } ?>
			</a></h1>
		</div>
		<?php } ?>
		</div>	
				
		
		<div class="col-md-9">
			<div class="row">
				<?php if( is_active_sidebar('header_widget_area') ) :
						dynamic_sidebar( 'header_widget_area' );
						endif;
				?>
			</div>
		</div>
		<?php } else if($logo_alignment == 'center'){ ?>	
		<div class="col-md-12 " style="text-align: -webkit-center;"; >
			<?php $elitepress_lite_options=theme_data_setup(); 
				$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
				if($current_options['logo_section_settings']==true) { ?>
		<div class="site-logo">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
				if($current_options['text_title'] ==true)
				{ echo "<div class=elegent_title_head>" . get_bloginfo( ). "</div>"; }
				else if($current_options['upload_image_logo']!='') 
				{ ?>
				<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); }  else { "50"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); }  else { "250"; } ?>px;" alt="logo" />
				<?php } else { ?> 
				<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo5.png" class="img-responsive"/>
				<?php } ?>
			</a></h1>
		</div>
		<?php } ?>
		</div>	
		<?php } else if($logo_alignment == 'right'){ ?>
		<div class="col-md-9">
			<div class="row">
				<?php if( is_active_sidebar('header_widget_area') ) :
						dynamic_sidebar( 'header_widget_area' );
						endif;
				?>
			</div>
		</div>
		<div class="col-md-3">
			<?php $elitepress_lite_options=theme_data_setup(); 
				$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
				if($current_options['logo_section_settings']==true) { ?>
		<div class="site-logo" style="margin: 35px 0 34px 0;">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
				if($current_options['text_title'] ==true)
				{ echo "<div class=elegent_title_head>" . get_bloginfo( ). "</div>"; }
				else if($current_options['upload_image_logo']!='') 
				{ ?>
				<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); }  else { "50"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); }  else { "250"; } ?>px;" alt="logo" />
				<?php } else { ?> 
				<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo5.png" class="img-responsive"/>
				<?php } ?>
			</a></h1>
		</div>
		<?php } ?>
		</div>
		<?php } ?>	
	</div>
</div>