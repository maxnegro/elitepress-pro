<?php
/**
/**
Template Name: Contact Us
*/
get_header(); ?>
<?php $elitepress_lite_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
$mapsrc= $current_options['contact_google_map_url'];
	$mapsrc=$mapsrc.'&amp;output=embed'; ?>

	<!-- Page Title Section -->
<?php get_template_part('index','banner'); ?>
<!-- /Page Title Section -->
<!-- Contact Info Section -->
<section class="contact-section">
	<div class="container">
		<div class="row">
			<!--Contact Form-->
			<?php if( is_active_sidebar('contact_widget_area') ) { ?>
			<div class="col-md-8">
			<?php } else { ?> <div class="col-md-12"> <?php } ?>
				<div id="mailsentbox" style="display:none">
				<div class="alert alert-success" >
					<strong><?php _e('Thank you','elitepress');?></strong> <?php _e('Your information has been sent.','elitepress');?>
				</div>
			</div>
			<div class="entry-content"><?php the_post(); the_content( __('Read More','elitepress' ) ); ?></div>
				<div class="comment-form-section" id="myformdata">
					<form class="form-inline wpcf7-form" role="form" method="post" action="#">
					<?php if($current_options['send_usmessage']) { ?>
				<div class="comment-title"><h3><?php echo esc_html($current_options['send_usmessage']); ?></h3></div>
				<?php } ?>
					<?php wp_nonce_field('elitepress_name_nonce_check','elitepress_name_nonce_field'); ?>
					  <div class="contact-form-group">
						<input type="name" id="user_name" name="user_name" placeholder="<?php _e('Name','elitepress'); ?>">
						<span  style="display:none; color:red" id="contact_user_name_error"><?php _e('Name','elitepress'); ?> </span>
					  </div>
					  <div class="contact-form-group">
						<input type="email" id="user_email" name="user_email" placeholder="<?php _e('Email','elitepress'); ?>">
						<span  style="display:none; color:red" id="contact_user_email_error"><?php _e('Email','elitepress'); ?> </span>
					  </div>
					  <div class="contact-form-group-textarea">
						<textarea rows="5" id="user_massage" name="user_massage" placeholder="<?php _e('Message','elitepress'); ?>"></textarea>
						<span  style="display:none; color:red" id="contact_user_massage_error"><?php _e('Message','elitepress'); ?> </span>
					  </div>
					  <div>
					  	<button class="contact-btn" id="contact_submit" name="contact_submit" type="submit"><?php _e('Send Message','elitepress'); ?></button>
					  	<span  style="display:none; color:red" id="contact_nonce_error"><?php _e('Sorry, your nonce did not verify','elitepress');?></span></div>
					</form>
				</div>
			</div>
			<!--Conatct Form-->

			<?php
			if(isset($_POST['contact_submit']))
			{ 	$flag=1;
				if(empty($_POST['user_name']))
				{
					$flag=0;
					echo "<script>jQuery('#contact_user_name_error').show();</script>";
				} else
				if($_POST['user_email']=='')
				{
					$flag=0;
					echo "<script>jQuery('#contact_user_email_error').show();</script>";
				} else
				if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['user_email']))
				{
					$flag=0;
					echo "<script>jQuery('#contact_user_email_error').show();</script>";
				} else
				if($_POST['user_massage']=='')
				{
					$flag=0;
					echo "<script>jQuery('#contact_user_massage_error').show();</script>";
				}else
				if(empty($_POST) || !wp_verify_nonce($_POST['elitepress_name_nonce_field'],'elitepress_name_nonce_check') )
				{
					echo "<script>jQuery('#contact_nonce_error').show();</script>";
					exit;
				}
				else
				{	if($flag==1)
					{
						$to = get_option('admin_email');
						$subject = trim($_POST['user_name']) . get_option("blogname");
						$massage = stripslashes(trim($_POST['user_massage']))."Message sent from:: ".trim($_POST['user_email']);
						$headers = "From: ".trim($_POST['user_name'])." <".trim($_POST['user_email']).">\r\nReply-To:".trim($_POST['user_email']);
						$maildata =wp_mail($to, $subject, $massage, $headers);
						if($maildata){
						echo "<script>jQuery('#myformdata').hide();</script>";
						echo "<script>jQuery('#mailsentbox').show();</script>";
						}
					}
				}
			}
			?>
			<!--/Conatct Form-->

			<!--Contact Detail-->
			<?php
			if( is_active_sidebar('contact_widget_area') ) {
			dynamic_sidebar( 'contact_widget_area' );
			}

			else
			{
				$elitepress_lite_options=theme_data_setup();
				$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
				if(!empty($current_options)) {
					echo $current_options['contact_text'];
				}
			}
			?>
			<!--/Conatct Detail-->
		</div>
	</div>
</section>
<!-- Footer Section -->

<!--Google Map-->
<?php $elitepress_lite_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
if($current_options['contact_google_map_enabled'] == true && $current_options['contact_google_map_url'] != null ){ ?>
<!--Google Map Section-->
<section class="googlemap-section">
	<div id="google-map">
			<?php echo $current_options['contact_google_map_url']; ?>
		</div>
	</div>
</section>
<!--Google Map Section-->
<?php } get_footer(); ?>
<!-- /Footer Section -->
