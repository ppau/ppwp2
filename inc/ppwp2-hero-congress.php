<?php
// Creating the widget 
class ppwp2_hero_congress extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_hero_congress',

			// Widget name will appear in UI
			__('PPWP2 Hero Banner - Congress', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Hero banner for congress', 'ppwp2' ),
			)
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		extract( $args );

		$location_and_dates_text = apply_filters( 'widget_title', $instance['location_and_dates_text'] );
		$event_information_url = apply_filters( 'widget_title', $instance['event_information_url'] );
		$tickets_url = apply_filters( 'widget_title', $instance['tickets_url'] );
		$live_stream_url = apply_filters( 'widget_title', $instance['live_stream_url'] );

		// before and after widget arguments are defined by themes
		echo $before_widget;

        ?>
        <div class="hero hero-congress">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <h2>National Congress <?php echo date("Y"); ?></h2>
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <h3><?php echo($location_and_dates_text)?></h3>
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <?php if (!empty($event_information_url)){ ?>
                        <a href="<?php echo($event_information_url)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                            <i class="material-icons">event</i>&nbsp;&nbsp;&nbsp;Event information
                        </a>
                    <?php } ?>
                    <?php if (!empty($tickets_url)){ ?>
                        <a href="<?php echo($tickets_url);?>" class="pir-button-success mdl-button mdl-js-button mdl-button--raised">
                            <i class="material-icons">receipt</i>&nbsp;&nbsp;&nbsp;Tickets
                        </a>
                    <?php } ?>
                    <?php if (!empty($live_stream_url)){ ?>
                        <a href="<?php echo($live_stream_url);?>" class="pir-button-info mdl-button mdl-js-button mdl-button--raised">
                            <i class="material-icons">ondemand_video</i>&nbsp;&nbsp;&nbsp;Live stream
                        </a>
                    <?php } ?>
                </div>
                <p class="cc-credit">Photo:&nbsp;
                    <a href="https://www.flickr.com/photos/devdsp/9281615801/">
                        Adam Thomas
                    </a> CC-BY
                </p>
            </div>
        </div>
        <?php

		echo $after_widget;
	}

	// Widget Backend
	public function form( $instance ) {
		$instance = wp_parse_args((array)$instance, array(
			'location_and_dates_text' => '',
			'event_information_url' => '',
			'tickets_url' => "",
			'live_stream_url' => '',
		));

		$location_and_dates_text = esc_attr($instance['location_and_dates_text']);
		$event_information_url = esc_attr($instance['event_information_url']);
		$tickets_url = esc_attr($instance['tickets_url']);
		$live_stream_url = esc_attr($instance['live_stream_url']);

		// Widget admin form
		?>
        <p>
			<label for="<?php echo $this->get_field_id( 'location_and_dates_text' ); ?>"><?php _e( 'Event location and dates:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'location_and_dates_text' ); ?>" name="<?php echo $this->get_field_name( 'location_and_dates_text' ); ?>" type="text" value="<?php echo esc_attr( $location_and_dates_text ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'event_information_url' ); ?>"><?php _e( 'Event information URL:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'event_information_url' ); ?>" name="<?php echo $this->get_field_name( 'event_information_url' ); ?>" type="text" value="<?php echo esc_attr( $event_information_url ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tickets_url' ); ?>"><?php _e( 'Ticket URL:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tickets_url' ); ?>" name="<?php echo $this->get_field_name( 'tickets_url' ); ?>" type="text" value="<?php echo esc_attr( $tickets_url ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'live_stream_url' ); ?>"><?php _e( 'Live stream URL:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'live_stream_url' ); ?>" name="<?php echo $this->get_field_name( 'live_stream_url' ); ?>" type="text" value="<?php echo esc_attr( $live_stream_url ); ?>" />
		</p>


	<?php }

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['location_and_dates_text'] = !empty($new_instance['location_and_dates_text']) ? strip_tags($new_instance['location_and_dates_text']) : '';
		$instance['event_information_url'] = !empty($new_instance['event_information_url']) ? strip_tags($new_instance['event_information_url']) : '';
		$instance['tickets_url'] = !empty($new_instance['tickets_url']) ? strip_tags($new_instance['tickets_url']) : '';
		$instance['live_stream_url'] = !empty($new_instance['live_stream_url']) ? strip_tags($new_instance['live_stream_url']) : '';
		return $instance;
	}
} // Class ppwp2_hero_congress ends here

// Register and load the widget
function ppwp2_hero_congress_loader() {
	register_widget('ppwp2_hero_congress');
}

add_action('widgets_init', 'ppwp2_hero_congress_loader');