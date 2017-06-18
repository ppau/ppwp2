<?php
// Creating the widget 
class ppwp2_hero_broken_politics extends WP_Widget {
	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'ppwp2_hero_broken_politics',

			// Widget name will appear in UI
			__('PPWP2 Hero Banner - Broken politics', 'ppwp2'),

			// Widget description
			array(
				'description' 	=> __( 'Hero banner for broken politics', 'ppwp2' ),
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
        <div class="hero hero-broken-politics">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <h2>Politics is broken, we need your help to fix it.</h2>
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <h3>The major parties have rigged the system, good ideas don't get heard, serious issues are ignored.</h3>
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <h3>With your help a fairer and more democratic Australia is possible.</h3>
                </div>
                <p class="cc-credit">Photo:&nbsp;
                    <a href="https://www.flickr.com/photos/russellstreet/26995633782/">
                        Russell Street
                    </a> CC-BY-SA
                </p>
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
} // Class ppwp2_hero_broken_politics ends here

// Register and load the widget
function ppwp2_hero_broken_politics_loader() {
	register_widget('ppwp2_hero_broken_politics');
}

add_action('widgets_init', 'ppwp2_hero_broken_politics_loader');