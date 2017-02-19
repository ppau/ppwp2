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
