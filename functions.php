<?php
/**
 * PPWP2 functions and definitions
 *
 * @package PPWP2
 */

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Enqueue all JS and CSS files
 */
require get_stylesheet_directory() . '/inc/scripts.php';

/**
 * PPWP2 menu walker
 */
require get_stylesheet_directory() . '/inc/nav-walker-mdl.php';

/**
 * Image render
 */
require get_stylesheet_directory() . '/inc/img-caption-shortcode.php';

/**
 * Page finder
 */
function get_page_by_slug($path){
    $page = get_page_by_path($path);
    if (!empty($path)){
        return get_permalink($page);
    }
    return "";
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ppwp2_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Banner row 1', 'ppwp2' ),
		'id'            => 'homepage-banner-1',
		'description'   => '',
		'before_widget' => '<div class="mdl-cell mdl-cell--4-col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Banner row 2', 'ppwp2' ),
		'id'            => 'homepage-banner-2',
		'description'   => '',
		'before_widget' => '<div class="mdl-cell mdl-cell--4-col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Banner row 3', 'ppwp2' ),
		'id'            => 'homepage-banner-3',
		'description'   => '',
		'before_widget' => '<div class="mdl-cell mdl-cell--4-col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Banner row 4', 'ppwp2' ),
		'id'            => 'homepage-banner-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mdl-mega-footer__drop-down-section footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Authorisation', 'ppwp2' ),
		'id'            => 'footer-authorisation-1',
		'description'   => '',
		'before_widget' => '<p>',
		'after_widget'  => '</p>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'ppwp2_widgets_init' );

if ( ! function_exists( 'ppwp2_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ppwp2_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'mdlwp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'mdlwp' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">Posted on ' . $posted_on . '</span>'; // WPCS: XSS OK.

	if ( comments_open() AND ! post_password_required() ) { ?>
		<span class="sep"> | </span>
		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'ppwp2' ) . '</span>', __( '<strong>1</strong> Reply', 'ppwp2' ), __( '<strong>%</strong> Replies', 'ppwp2' ) ); ?>
		</span>
		<?php
	}

}
endif;

/**
 * Remove jQuery Migrate warning
 */
add_action('wp_default_scripts', function ($scripts) {
	if (!empty($scripts->registered['jquery'])) {
		$scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array('jquery-migrate'));
	}
});

/**
 * Add Pin.js script if widget is used
 */
function check_widget() {
    if( is_active_widget( '', '', 'ppwp2_widget_quick_donate' ) ) { // check if search widget is used
        wp_enqueue_script('', 'https://cdn.pin.net.au/pin.v2.js');
    }
}
add_action( 'init', 'check_widget' );

/**
 * Register widgets.
 */
require get_stylesheet_directory() . '/inc/ppwp2-widget-authorisation.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-ship-party.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-data-retention.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-we-are-a-movement.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-discussion-boards.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-quick-donate.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-newsletter.php';
require get_stylesheet_directory() . '/inc/ppwp2-widget-upcoming-events.php';
