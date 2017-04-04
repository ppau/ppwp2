<?php
// Creating the widget 
class ppwp2_widget_we_are_a_movement extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_widget_we_are_a_movement',

			// Widget name will appear in UI
			__('PPWP2 Card - We are a movement', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Card for We are a movement', 'ppwp2' ),
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
        <div class="pir-card pir-card__we-are mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">
                    <strong>We are</strong> a political movement based around the core tenets of:
                </h2>
            </div>
            <div class="mdl-card__supporting-text">
                <ul>
                    <li>freedom of information and culture</li>
                    <li>civil and digital liberties</li>
                    <li>privacy and anonymity</li>
                    <li>government transparency</li>
                    <li>participatory democracy</li>
                </ul>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="<?php echo(get_page_by_slug("how-we-began")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    How we began
                </a>
                <a href="<?php echo(get_page_by_slug("our-vision")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Our vision
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
} // Class ppwp2_widget_we_are_a_movement ends here

// Register and load the widget
function ppwp2_widget_we_are_a_movement_loader() {
	register_widget('ppwp2_widget_we_are_a_movement');
}

add_action('widgets_init', 'ppwp2_widget_we_are_a_movement_loader');