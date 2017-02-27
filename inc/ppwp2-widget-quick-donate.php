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

	public function uri_for_amount($pin_uri, $amount){
	    return $pin_uri . "?amount=%24" . $amount . "&amp;description=One-off+donation&amp;amount_editable=false&amp;success_url=https%3A%2F%2Fpirateparty.org.au%2Fdonate-thank-you%2F";
    }

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		extract( $args );

        $pin_uri = apply_filters('widget_pin_uri', $instance['pin_uri']);

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
                        <a href="<?php echo($this->uri_for_amount($pin_uri, "5.00")); ?>"
                                class="pin-payment-button pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $5
                        </a>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <a href="<?php echo($this->uri_for_amount($pin_uri, "10.00")); ?>"
                                class="pin-payment-button pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $10
                        </a>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <a  href="<?php echo($this->uri_for_amount($pin_uri, "25.00")); ?>"
                                class="pin-payment-button pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $25
                        </a>
                    </div>
                </div>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col">
                        <a href="<?php echo($this->uri_for_amount($pin_uri, "50.00")); ?>"
                                class="pin-payment-button pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $50
                        </a>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <a href="<?php echo($this->uri_for_amount($pin_uri, "100.00")); ?>"
                                class="pin-payment-button pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          $100
                        </a>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <a href="<?php echo(get_page_by_slug("donate")); ?>" class="pir-button pir-button-block mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                          Other
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php

		echo $after_widget;
	}

	// Widget Backend
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'pin_uri' 		=> ''
		) );

		$pin_uri = esc_attr($instance['pin_uri']);

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'pin_uri' ); ?>"><?php _e( 'Pin.js URI', 'ppwp2' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pin_uri' ); ?>" name="<?php echo $this->get_field_name( 'pin_uri' ); ?>" type="text" value="<?php echo esc_attr( $pin_uri ); ?>" />
		</p>

	<?php }

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['pin_uri'] = !empty($new_instance['pin_uri']) ? strip_tags($new_instance['pin_uri']) : '';
		return $instance;
	}
} // Class ppwp2_widget_quick_donate ends here

// Register and load the widget
function ppwp2_widget_quick_donate_loader() {
	register_widget('ppwp2_widget_quick_donate');
}

add_action('widgets_init', 'ppwp2_widget_quick_donate_loader');