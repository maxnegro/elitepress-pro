<?php $elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
?>
<!--Google Map Section-->
<section class="googlemap-section">
	<div class="container-fluid">	 
		<div class="row">    

			<?php if(($current_options['front_contact_enable']==true) && ($current_options['front_contact_map_enable']==true)) {?>
			<div class="col-md-4">
			<?php echo $current_options['front_contact_add_setting']; ?>
			</div>
			<div class="col-md-8">  
				<div id="google-map">		
					<?php echo $current_options['front_contact_map']; ?>  
				</div>
			</div>
			<?php } elseif($current_options['front_contact_enable']==true) { ?>
			<div class="col-md-12">
			<?php echo $current_options['front_contact_add_setting']; ?>
			</div>
			<?php } else { ?>
			<div class="col-md-12">  
				<div id="google-map">		
					<?php echo $current_options['front_contact_map']; ?>  
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>
</section>
<!--/End of Google Map Section-->
<div class="clearfix"></div>