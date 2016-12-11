<?php
// Creating the widget 
class ppwp2_widget_data_retention extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_widget_data_retention',

			// Widget name will appear in UI
			__('PPWP2 Card - Data retention', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Card for data retention', 'ppwp2' ),
			)
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$text = apply_filters('widget_text', $instance['text']);
		$read_more_url = apply_filters('widget_read_more_url', $instance['read_more_url']);

		// before and after widget arguments are defined by themes
		echo $before_widget;

        ?>
        <div class="pir-card pir-card__data-retention mdl-card mdl-shadow--2dp">
            <div class="mdl-card__supporting-text">
                <h2 class="mdl-card__title-text"><?php echo($title);?></h2>
            </div>
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text"><?php echo(str_replace("\n", "<br>", htmlspecialchars($text)));?></h2>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="<?php echo($read_more_url);?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Read more
                </a>
            </div>
        </div>
        <?php

		echo $after_widget;
	}

	// Widget Backend
	public function form( $instance ) {
		$instance = wp_parse_args((array)$instance, array(
			'title' => 'Data retention',
			'text' => "Learn how to protect the privacy of yourself & your family",
			'read_more_url' => '/dataretention/',
		));

		$title = esc_attr($instance['title']);
		$text = $instance['text'];
		$read_more_url = esc_attr($instance['read_more_url']);

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'ppwp2'); ?>:</label>
            <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'read_more_url' ); ?>"><?php _e( 'Read more URL:', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'read_more_url' ); ?>" name="<?php echo $this->get_field_name( 'read_more_url' ); ?>" type="text" value="<?php echo esc_attr( $read_more_url ); ?>" />
		</p>


	<?php }

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
		$instance['text'] = !empty($new_instance['text']) ? strip_tags($new_instance['text']) : '';
		$instance['read_more_url'] = !empty($new_instance['read_more_url']) ? strip_tags($new_instance['read_more_url']) : '';
		return $instance;
	}
} // Class ppwp2_widget_data_retention ends here

// Register and load the widget
function ppwp2_widget_data_retention_loader() {
	register_widget('ppwp2_widget_data_retention');
}

add_action('widgets_init', 'ppwp2_widget_data_retention_loader');