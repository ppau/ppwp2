<?php
// Creating the widget 
class ppwp2_widget_authorisation extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_widget_authorisation',

			// Widget name will appear in UI
			__('PPWP2 Authorisation', 'ppwp2'),

			// Widget description
			array( 
				'description' 	=> __( 'Political authorisation text', 'ppwp2' ),
			)
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		extract( $args );

		$person_and_position = apply_filters( 'widget_person_and_position', $instance['person_and_position'] );
		$address = apply_filters('widget_address', $instance['address']);

		// before and after widget arguments are defined by themes
		echo $before_widget;

		echo 'Authorised by: ';

		if (!empty($person_and_position)) {
			echo $before_title . $person_and_position . $after_title;
		}

		if (!empty($address)) {
			echo '<br>' . $address;
		}

		echo $after_widget;
	}

	// Widget Backend 
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'person_and_position' => '',
			'address' 		=> ''
		) );

		$person_and_position = esc_attr($instance['person_and_position']);
		$address = esc_attr($instance['address']);

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'person_and_position' ); ?>"><?php _e( 'Person name and position:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'person_and_position' ); ?>" name="<?php echo $this->get_field_name( 'person_and_position' ); ?>" type="text" value="<?php echo esc_attr( $person_and_position ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address', 'ppwp2'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
		</p>

	<?php }

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['person_and_position'] = !empty($new_instance['person_and_position']) ? strip_tags($new_instance['person_and_position']) : '';
		$instance['address'] = !empty($new_instance['address']) ? strip_tags($new_instance['address']) : '';
		return $instance;
	}
} // Class ppwp2_widget_authorisation ends here

// Register and load the widget
function ppwp2_widget_authorisation_loader() {
	register_widget( 'ppwp2_widget_authorisation' );
}
add_action( 'widgets_init', 'ppwp2_widget_authorisation_loader' );