<?php 
add_action( 'widgets_init','elitepress_contact_widget'); 
function elitepress_contact_widget() 
{ 
	return   register_widget( 'elitepress_contact_widget' );
}

class elitepress_contact_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'elitepress_contact_widget', // Base ID
			__('WBR: Contact Widget', 'elitepress'), // Name
			array( 'description' => __('Contact Widget', 'elitepress' ), ) // Args
		);
	}

	public function widget( $args , $instance ) {
		
		echo $args['before_widget'];
		echo '<div class="contact-detail">';
		echo '<div class="comment-title">';
		if($instance['title']){
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}
		echo '</div>';
		echo '<address>';
		
		if($instance['field_1']){
		echo $instance['field_1'];
		}
		
		if($instance['field_2']){
		echo $instance['field_2'];
		}
		
		if($instance['field_3']){
		echo $instance['field_3'] ;
		}
		echo '</address>';
		echo '</div>';
		
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['field_1'] = ( isset($instance['field_1'] ) ? $instance['field_1'] : '' );
		$instance['field_2'] = ( isset($instance['field_2'] ) ? $instance['field_2'] : '' );	
		$instance['field_3'] = ( isset($instance['field_3'] ) ? $instance['field_3'] : '' );
		
		if ( isset( $instance[ 'title' ])){
		$title = $instance[ 'title' ];
		}
		
	
		if ( isset( $instance[ 'field_1' ])){
		$field_1 = $instance[ 'field_1' ];
		}
		
	
		if ( isset( $instance[ 'field_2' ])){
		$field_2 = $instance[ 'field_2' ];
		}
		
		if ( isset( $instance[ 'field_3' ])){
		$field_3 = $instance[ 'field_3' ];
		}
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title','elitepress' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php 
		if($title) echo esc_attr($title); else echo 'Contact Information';?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'field_1' ); ?>"><?php _e( 'Field 1','elitepress' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'field_2' ); ?>" name="<?php echo $this->get_field_name( 'field_1' ); ?>" ><?php 
		if($field_1) echo esc_attr($field_1); else echo '<span><i class="fa fa-phone"></i> 1-234-567-8901</span>'; ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'field_2' ); ?>"><?php _e( 'Field 2','elitepress' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'field_2' ); ?>" name="<?php echo $this->get_field_name( 'field_2' ); ?>" ><?php 
		if($field_2) echo esc_attr($field_2); else echo '<span><i class="fa fa-envelope-o"></i> <a href="mailto:#">info@elitesupport.com</a></span>'; ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'field_3' ); ?>"><?php _e( 'Field 3','elitepress' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'field_3' ); ?>" name="<?php echo $this->get_field_name( 'field_3' ); ?>" ><?php 
		if($field_3) echo esc_attr($field_3); else echo '<span> <i class="fa fa-map-marker"></i> 15AH, San Francisco, California, United States.</span>'; ?></textarea>
		</p>
		
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['field_1'] = ( ! empty( $new_instance['field_1'] ) ) ? $new_instance['field_1'] : '';
		$instance['field_2'] = ( ! empty( $new_instance['field_2'] ) ) ? $new_instance['field_2'] : '';
		$instance['field_3'] = ( ! empty( $new_instance['field_3'] ) ) ? $new_instance['field_3'] : '';
		
		return $instance;
	}
}