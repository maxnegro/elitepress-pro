<!-- Clients Section -->
<?php $elitepress_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
wp_register_script('elitepress-client',get_template_directory_uri().'/js/front-page/client.js');
wp_localize_script('elitepress-client','client_settings',$current_options);
wp_enqueue_script('elitepress-client');
?>
<section class="client-section">
	<div class="container">
		<div id="clients" class="flexslider col-md-12">
			<ul class="slides">
				<?php
				$j=1;
				$client_list = $current_options['client_list'];
				$args = array( 'post_type' => 'elitepress_client','posts_per_page' =>$client_list); 	
				$client = new WP_Query( $args );
				if( $client->have_posts() ){
				while ( $client->have_posts() ) : $client->the_post();
				?>
				<li>
					<?php 
							$defalt_arg =array('class' => "img-responsive");
							if(has_post_thumbnail()):
							//the_post_thumbnail('',$defalt_arg); 
							$post_thumbnail_id = get_post_thumbnail_id();
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
							$clint_link = get_post_meta( get_the_ID(),'clientstrip_link', true );	
					?>
					<?php if($clint_link) {?>
						<a href="<?php if(get_post_meta( get_the_ID(),'clientstrip_link', true ) ) { echo get_post_meta( get_the_ID(),'clientstrip_link', true ); } else { echo '#'; } ?>" <?php if(get_post_meta( get_the_ID(),'meta_client_target', true )) { echo "target='_blank'"; }  ?> >
						<img class="img-responsive" title="<?php echo get_the_title(); ?>" src="<?php echo $post_thumbnail_url; ?>">
						</a>
					<?php } else { ?> 
					<img class="img-responsive" title="<?php echo get_the_title(); ?>" src="<?php echo $post_thumbnail_url; ?>"><?php } ?>
				</li>
				<?php
				$j++; endif; endwhile; }
				else { 														
				for($tt=1; $tt<=10; $tt++)
				{ ?>
				<li>
				<img title="Client" height="70px" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/clients/client<?php echo $tt; ?>.png">
				</li>
				<?php } } ?>
			</ul>
		</div>
	</div>
</section>
<!-- End of Clients Section -->
<div class="clearfix"></div>