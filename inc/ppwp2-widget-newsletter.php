<?php
// Creating the widget 
class ppwp2_widget_newsletter extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_widget_newsletter',

			// Widget name will appear in UI
			__('PPWP2 Card - Newsletter', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Card for newsletter', 'ppwp2' ),
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
        <div class="pir-card mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Newsletter</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <p>Join our Newsletter, discover what we're up to!</p>

                <form action="#">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="sample1" placeholder="Email">
                        <label class="mdl-textfield__label" for="sample1">Text...</label>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Submit
                    </button>

                </form>

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
} // Class ppwp2_widget_newsletter ends here

// Register and load the widget
function ppwp2_widget_newsletter_loader() {
	register_widget('ppwp2_widget_newsletter');
}

add_action('widgets_init', 'ppwp2_widget_newsletter_loader');