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
require  get_stylesheet_directory() . '/inc/nav-walker-mdl.php';

/**
 * Image render
 */
require  get_stylesheet_directory() . '/inc/img-caption-shortcode.php';

/**
 * Page finder
 */
function get_page_by_slug($path){
    $page = get_page_by_path($path);
    if (!empty($path)){
        return get_permalink($page);
    }
    return "#";
}