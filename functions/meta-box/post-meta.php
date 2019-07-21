<?php /************ Home slider meta post ****************/
add_action('admin_init','webriti_init');
function webriti_init()
	{
	foreach (array('post','page') as $type)
		{
			add_meta_box('my_banner_meta', __('Description','elitepress'), 'my_meta_banner', $type, 'normal', 'high');
		}

		add_meta_box('home_portfolio_meta', __('Portfolio Details','elitepress'), 'webriti_meta_portfolio', 'elitepress_portfolio', 'normal', 'high');

		add_meta_box('elitepress_team', __('Team Details','elitepress'), 'elitepress_meta_team', 'elitepress_team', 'normal', 'high');
		add_meta_box('elitepress_client', __('Client Details','elitepress'), 'elitepress_meta_client', 'elitepress_client', 'normal', 'high');

		add_action('save_post','webriti_meta_save');
	}
function my_meta_banner()
	{
		global $post ;
		$banner_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'banner_chkbx', true ));
		$banner_title =	sanitize_text_field( get_post_meta( get_the_ID(), 'banner_title', true ));
		$banner_description = sanitize_text_field( get_post_meta( get_the_ID(), 'banner_description', true ));
		?>
		<input type="checkbox" name="banner_chkbx" id="banner_chkbx" <?php if($banner_chkbx){echo "checked='checked'";}?> /><?php _e('Allow banners on the page','elitepress'); ?></p>
		<p><h4 class="heading"><?php _e("Enter the banner's heading title","elitepress");?></h4>
		<p><input type="text" id="banner_title" name="banner_title" placeholder="<?php _e('Title','elitepress'); ?>"  value="<?php if (!empty($banner_title)) esc_attr_e($banner_title); ?>" > </p>
		<p><h4 class="heading"><?php _e('Description','elitepress');?></h4></p>
		<p><textarea id="banner_description" name="banner_description" placeholder="<?php _e('Description','elitepress');?>" style="width: 480px; height: 80px; padding: 0px;" rows="3" cols="10" ><?php if (!empty($banner_description)) { echo $banner_description; } ?></textarea></p>
		<?php
	}
function elitepress_meta_team()
	{
		global $post;
		$designation_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'designation_meta_save', true ));
		$description_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'description_meta_save', true ));
		$fb_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save', true ));
		$fb_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save_chkbx', true ));
		$lnkd_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save', true ));
		$lnkd_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save_chkbx', true ));
		$twt_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save', true ));
		$twt_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save_chkbx', true ));
	?>
	<p><h4 class="heading"><?php _e('Designation','elitepress');?></h4></p>
	<p><input class="inputwidth"  name="designation_meta_save" id="designation_meta_save" style="width: 480px" placeholder="<?php _e("Designation","elitepress"); ?>" type="text" value="<?php if (!empty($designation_meta_save)) echo esc_attr($designation_meta_save);?>" ></input></p>
	<p><h4 class="heading"><?php _e('Description','elitepress');?></h4></p>
	<p><textarea rows="5" cols="10" name="description_meta_save" id="description_meta_save" style="width: 480px; padding: 0px;" placeholder="
	<?php _e('Description','elitepress'); ?>"><?php if (!empty($description_meta_save)) echo esc_textarea( $description_meta_save ); ?></textarea></p>

	<p><h4 class="heading"><span><?php _e('Social media settings','elitepress');?></span></h4>

	<p><h4 class="heading"><label><?php _e('Facebook URL','elitepress');?></label></h4>
	<input type="text" style="width:70%;padding: 10px;"  name="fb_meta_save" id="fb_meta_save" placeholder="<?php _e("Facebook URL","elitepress"); ?>" value="<?php if(!empty($fb_meta_save)) echo esc_attr($fb_meta_save); ?>"/>
	<input type="checkbox" name="fb_meta_save_chkbx" id="fb_meta_save_chkbx" <?php if($fb_meta_save_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','elitepress'); ?></p>

	<p><h4 class="heading"><label><?php _e('LinkedIn URL','elitepress');?></label></h4>
	<input type="text" style="width:70%;padding: 10px;"  name="lnkd_meta_save" id="lnkd_meta_save" placeholder="<?php _e("LinkedIn URL","elitepress"); ?>" value="<?php if(!empty($lnkd_meta_save)) echo esc_attr($lnkd_meta_save); ?>"/>
	<input type="checkbox" name="lnkd_meta_save_chkbx" id="lnkd_meta_save_chkbx" <?php if($lnkd_meta_save_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','elitepress'); ?></p>

	<p><h4 class="heading"><?php _e('Twitter URL','elitepress')?></h4>
	 <p><input type="text" style="width:70%; padding: 10px;"  name="twt_meta_save" id="twt_meta_save" placeholder="<?php _e("Twitter URL","elitepress"); ?>"  value="<?php if(!empty($twt_meta_save)) echo esc_attr($twt_meta_save); ?>"/>
	<input type="checkbox" name="twt_meta_save_chkbx" id="twt_meta_save_chkbx" <?php if($twt_meta_save_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','elitepress'); ?></p>
	<?php
	}

// Code for Project Section
function webriti_meta_portfolio()
{	global $post ;
		$project_description =sanitize_text_field( get_post_meta( get_the_ID(), 'project_description', true ));
		$project_more_btn_text =sanitize_text_field( get_post_meta( get_the_ID(), 'project_more_btn_text', true ));
		$project_more_btn_link =sanitize_text_field( get_post_meta( get_the_ID(), 'project_more_btn_link', true ));
		$project_more_btn_target =sanitize_text_field( get_post_meta( get_the_ID(), 'project_more_btn_target', true ));
	?>
	<p><h4 class="heading"><?php _e('Description','elitepress');?></h4>
	<p><textarea id="project_description" name="project_description" style="width: 480px; height: 80px; padding: 0px;" rows="3" cols="10" ><?php if (!empty($project_description)) esc_attr_e($project_description); ?> </textarea></p>
	<h4 class="heading"><?php _e('Button Text','elitepress');?></h4>
	<input type="text" style="width: 480px" id="project_more_btn_text" name="project_more_btn_text" placeholder="<?php _e('Button Text','elitepress');?>"  value="<?php if (!empty($project_more_btn_text)) esc_attr_e($project_more_btn_text); ?>" > </p>
	<p><h4 class="heading"><?php _e('Link','elitepress');?></h4>
	<p><input class="inputwidth"  name="project_more_btn_link" id="project_more_btn_link" style="width: 480px" placeholder="<?php _e('Link','elitepress');?>" type="text" value="<?php if (!empty($project_more_btn_link)) esc_attr_e($project_more_btn_link);?>" /></p>
	<p><input type="checkbox" id="project_more_btn_target" name="project_more_btn_target" <?php if($project_more_btn_target) echo "checked"; ?> ><?php _e('Open link in new tab','elitepress'); ?></p>
<?php }
function elitepress_meta_client()
	{
	   global $post;
		$client_link = sanitize_text_field( get_post_meta( get_the_ID(), 'clientstrip_link', true ));
		$meta_client_target =sanitize_text_field( get_post_meta( get_the_ID(), 'meta_client_target', true ));
	?>
	    <p><h4 class="heading"><?php _e('URL','elitepress');?></h4>
	<p><input class="inputwidth"  name="client_link" id="client_link" style="width: 480px" placeholder="<?php _e('URL','elitepress');?>" type="text" value="<?php if (!empty($client_link)) echo esc_attr($client_link);?>"></input></p>
	<p><input type="checkbox" id="meta_client_target" name="meta_client_target" <?php if($meta_client_target) echo "checked"; ?> > <?php _e('Open link in new tab','elitepress'); ?></p>


		<p><label><?php _e('Upload client image using feature image. Best fit scenario is using 130 X 130 px image.','elitepress'); ?></label></p>
	<?php
	}





function webriti_meta_save($post_id)
{
	if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;

	if ( ! current_user_can( 'edit_page', $post_id ) )
	{     return ;	}
	if(isset($_POST['post_ID']))
	{
		$post_ID = $_POST['post_ID'];
		$post_type=get_post_type($post_ID);
		if($post_type=='elitepress_portfolio'){
			// echo var_dump($_POST);
			update_post_meta($post_ID, 'project_description', sanitize_text_field($_POST['project_description']));
			update_post_meta($post_ID, 'project_more_btn_text', sanitize_text_field($_POST['project_more_btn_text']));
			update_post_meta($post_ID, 'project_more_btn_link', sanitize_text_field($_POST['project_more_btn_link']));
			// update_post_meta($post_ID, 'project_more_btn_target', sanitize_text_field($_POST['project_more_btn_target']));
		}

		elseif($post_type=='elitepress_team') {
			update_post_meta($post_ID, 'designation_meta_save', sanitize_text_field($_POST['designation_meta_save']));
			update_post_meta($post_ID, 'description_meta_save', sanitize_text_field($_POST['description_meta_save']));
			update_post_meta($post_ID, 'fb_meta_save', sanitize_text_field($_POST['fb_meta_save']));
			update_post_meta($post_ID, 'fb_meta_save_chkbx', sanitize_text_field($_POST['fb_meta_save_chkbx']));
			update_post_meta($post_ID, 'lnkd_meta_save', sanitize_text_field($_POST['lnkd_meta_save']));
			update_post_meta($post_ID, 'lnkd_meta_save_chkbx', sanitize_text_field($_POST['lnkd_meta_save_chkbx']));
			update_post_meta($post_ID, 'twt_meta_save', sanitize_text_field($_POST['twt_meta_save']));
			update_post_meta($post_ID, 'twt_meta_save_chkbx', sanitize_text_field($_POST['twt_meta_save_chkbx']));
		}
	   elseif($post_type=='elitepress_client')
	   {
			  update_post_meta($post_ID, 'clientstrip_link', sanitize_text_field($_POST['client_link']));
				update_post_meta($post_ID, 'meta_client_target', sanitize_text_field($_POST['meta_client_target']));
	    }
		else if($post_type == 'post' || $post_type == 'page'){
			if (array_key_exists('banner_bhkbx', $_POST)) { update_post_meta($post_ID, 'banner_chkbx', sanitize_text_field($_POST['banner_chkbx'])); };
			update_post_meta($post_ID, 'banner_title', sanitize_text_field($_POST['banner_title']));
			update_post_meta($post_ID, 'banner_description', sanitize_text_field($_POST['banner_description']));
		}

	}
}
?>
