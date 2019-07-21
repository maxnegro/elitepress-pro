<!-- Header social & Contact Info -->
<?php $elitepress_lite_options=theme_data_setup();
		$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); ?>
<section class="header-info">	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div id="top-header-sidebar-left">
					<?php if( is_active_sidebar('home-header-sidebar_left') ) { ?>
					<?php  dynamic_sidebar( 'home-header-sidebar_left' ); ?>
					<?php } ?>				
				</div>
			</div>
			<div class="col-md-6">
				<div id="top-header-sidebar-right">
					<?php if( is_active_sidebar('home-header-sidebar_right') ) { ?>
					<?php  dynamic_sidebar( 'home-header-sidebar_right' ); ?>
					<?php } ?>
				</div>
			</div>
		</div>		
	</div>
</section>	
<!-- /Header social & Contact Info -->