<?php $current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), theme_data_setup()); ?>
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="footer-contact-info">
		<?php if($current_options['footer_call_out_title']){ ?>
				<h2><?php echo $current_options['footer_call_out_title']; ?></h2>
					<?php }
				if($current_options['footer_call_out_contact']){ ?>
				<span><?php echo $current_options['footer_call_out_contact']; ?></span>
		<?php } ?>
		</div>
	</div>
</div>