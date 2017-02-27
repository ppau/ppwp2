<?php
if (class_exists("Ai1ec_View_Admin_Widget")) {

// Creating the widget
	class ppwp2_widget_upcoming_events extends Ai1ec_View_Admin_Widget
	{
		/**
		 * @return string
		 */
		public function get_id()
		{
			return 'ppwp2_widget_upcoming_events';
		}

		function __construct()
		{
			Ai1ec_Embeddable::__construct(

			// Base ID of your widget
				'ppwp2_widget_upcoming_events',

				// Widget name will appear in UI
				__('PPWP2 Card - Upcoming events', 'ppwp2'),

				// Widget description
				array(
					'description' => __('Card for upcoming events', 'ppwp2'),
					'class' => 'ai1ec-agenda-widget',
				)
			);
		}

		// Creating widget front-end
		// This is where the action happens
		/*public function widget($args, $instance)
		{
			extract($args);

			// before and after widget arguments are defined by themes
			echo $before_widget;

			?>
            <div class="pir-card pir-card__quick-donate mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Upcoming events</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p>We run an efficient ship, but political parties are not cheap to run. Every dollar you donate
                        goes a long way.</p>
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
		}*/

	/* (non-PHPdoc)
	 * @see Ai1ec_Embeddable::get_content()
	 */
	public function get_content( array $args_for_widget, $remote = false ) {
		$before_title = "";
		$after_title = "";

		$agenda     = $this->_registry->get(
			'view.calendar.view.agenda',
			$this->_registry->get( 'http.request.parser' )
		);
		$time       = $this->_registry->get( 'date.time' );
		$search     = $this->_registry->get( 'model.search' );
		$settings   = $this->_registry->get( 'model.settings' );
		$html       = $this->_registry->get( 'factory.html' );

		$is_calendar_page = is_page( $settings->get( 'calendar_page_id' ) );
		if ( $args_for_widget['hide_on_calendar_page'] &&
			$is_calendar_page ) {
			return;
		}

		// Add params to the subscribe_url for filtering by Limits (category, tag)
		$subscribe_filter  = '';
		if ( ! is_array( $args_for_widget['cat_ids'] ) ) {
			$args_for_widget['cat_ids'] = explode( ',', $args_for_widget['cat_ids'] );
		}

		if ( ! is_array( $args_for_widget['tag_ids'] ) ) {
			$args_for_widget['tag_ids'] = explode( ',', $args_for_widget['tag_ids'] );
		}
		$subscribe_filter .= $args_for_widget['cat_ids'] ? '&ai1ec_cat_ids=' . join( ',', $args_for_widget['cat_ids'] ) : '';
		$subscribe_filter .= $args_for_widget['tag_ids'] ? '&ai1ec_tag_ids=' . join( ',', $args_for_widget['tag_ids'] ) : '';

		// Get localized time
		$timestamp = $time->format_to_gmt();

		// Set $limit to the specified category/tag
		$limit = array(
			'cat_ids'    => $args_for_widget['cat_ids'],
			'tag_ids'    => $args_for_widget['tag_ids'],
		);
		$limit = apply_filters( 'ai1ec_add_filters_upcoming_widget', $limit );

		// Get events, then classify into date array
		// JB: apply seek check here
		$seek_days  = ( 'days' === $args_for_widget['events_seek_type'] );
		$seek_count = $args_for_widget['events_per_page'];
		$last_day   = false;
		if ( $seek_days ) {
			$seek_count = $args_for_widget['days_per_page'] * 5;
			$last_day   = strtotime(
				'+' . $args_for_widget['days_per_page'] . ' days'
			);
		}

		$event_results = $search->get_events_relative_to(
			$timestamp,
			$seek_count,
			0,
			$limit
		);
		if ( $seek_days ) {
			foreach ( $event_results['events'] as $ek => $event ) {
				if ( $event->get( 'start' )->format() >= $last_day ) {
					unset( $event_results['events'][$ek] );
				}
			}
		}

		$dates                    = $agenda->get_agenda_like_date_array( $event_results['events'] );


		$args_for_widget['dates']                     = $dates;
		// load CSS just once for all widgets.
		// Do not load it on the calendar page as it's already loaded.
		if ( false === $this->_css_loaded && ! $is_calendar_page ) {
			if ( true === $remote ) {
				$args_for_widget['css'] = $this->_registry->get( 'css.frontend' )->get_compiled_css();
			}
			$this->_css_loaded = true;
		}
		$args_for_widget['show_location_in_title']    = $settings->get( 'show_location_in_title' );
		$args_for_widget['show_year_in_agenda_dates'] = $settings->get( 'show_year_in_agenda_dates' );
		$args_for_widget['calendar_url']              = $html->create_href_helper_instance( $limit )->generate_href();
		$args_for_widget['subscribe_url']             = AI1EC_EXPORT_URL . $subscribe_filter;
		$args_for_widget['subscribe_url_no_html']     = AI1EC_EXPORT_URL . '&no_html=true' . $subscribe_filter;
		$args_for_widget['text_upcoming_events']      = __( 'There are no upcoming events.', AI1EC_PLUGIN_NAME );
		$args_for_widget['text_all_day']              = __( 'all-day', AI1EC_PLUGIN_NAME );
		$args_for_widget['text_view_calendar']        = __( 'View Calendar', AI1EC_PLUGIN_NAME );
		$args_for_widget['text_edit']                 = __( 'Edit', AI1EC_PLUGIN_NAME );
		$args_for_widget['text_venue_separator']      = __( '@ %s', AI1EC_PLUGIN_NAME );
		$args_for_widget['text_subscribe_label']      = __( 'Add', AI1EC_PLUGIN_NAME );
		$args_for_widget['subscribe_buttons_text']    = $this->_registry
			->get( 'view.calendar.subscribe-button' )
			->get_labels();
		// Display theme
		return $this->_registry->get( 'theme.loader' )->get_file(
			'agenda-widget.twig',
			$args_for_widget
		)->get_content();
	}

	/**
	 * Widget function.
	 *
	 * Outputs the given instance of the widget to the front-end.
	 *
	 * @param  array $args     Display arguments passed to the widget
	 * @param  array $instance The settings for this widget instance
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$defaults = $this->get_defaults();
		$instance = wp_parse_args( $instance, $defaults );
		$this->add_js();
		$args['widget_html'] = $this->get_content( $instance );
		if ( ! empty( $args['widget_html'] ) ) {
			$args['title'] = $instance['title'];
			$args          = $this->_filter_widget_args( $args );
			// Display theme
			$this->_registry->get( 'theme.loader' )->get_file(
				'widget.twig',
				$args
			)->render();
		}

	}

	} // Class ppwp2_widget_quick_donate ends here

// Register and load the widget
	function ppwp2_widget_upcoming_events_loader()
	{
		register_widget('ppwp2_widget_upcoming_events');
	}

	add_action('widgets_init', 'ppwp2_widget_upcoming_events_loader');
}