<?php
// Creating the widget 
class ppwp2_widget_quick_donate extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_widget_quick_donate',

			// Widget name will appear in UI
			__('PPWP2 Card - Quick donate', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Card for quick donate', 'ppwp2' ),
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
        <div class="pir-card pir-card__quick-donate mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Quick donate</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <p>We run an efficient ship, but political parties are not cheap to run. Every dollar you donate goes a long way.</p>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $5
                        </button>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $10
                        </button>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $25
                        </button>
                    </div>
                </div>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $50
                        </button>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $100
                        </button>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          Other
                        </button>
                    </div>
                </div>
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
} // Class ppwp2_widget_quick_donate ends here

// Register and load the widget
function ppwp2_widget_quick_donate_loader() {
	register_widget('ppwp2_widget_quick_donate');
}

add_action('widgets_init', 'ppwp2_widget_quick_donate_loader');