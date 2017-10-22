<?php
// Creating the widget 
class ppwp2_widget_discussion_boards extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_widget_discussion_boards',

			// Widget name will appear in UI
			__('PPWP2 Card - Discussion forum', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Card for discussion forum', 'ppwp2' ),
			)
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		extract( $args );

		// before and after widget arguments are defined by themes
		echo $before_widget;

        ?>
        <div class="pir-card pir-card__discuss mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">
                    New around here?
                </h2>
            </div>
            <div class="mdl-card__supporting-text">
                Join the discussion, a place where our members gather and share ideas!
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="https://discuss.pirateparty.org.au" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Visit the discussion forum
                </a>
            </div>
        </div>
        <?php

		echo $after_widget;
	}

	// Widget Backend
	public function form( $instance ) {
	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) {
		$instance = array();
		return $instance;
	}
} // Class ppwp2_widget_discussion_boards ends here

// Register and load the widget
function ppwp2_widget_discussion_boards_loader() {
	register_widget('ppwp2_widget_discussion_boards');
}

add_action('widgets_init', 'ppwp2_widget_discussion_boards_loader');
