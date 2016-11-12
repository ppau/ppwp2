<?php

/** nav-walker-mdl.php
 *
 * @author        Tom Randle
 * @package        Pirate Party WP Theme 2
 * @since        2.0.0 - 2016.10.16
 * @derivative    The Bootstrap, Konstantin Obenland
 */
class PPWPT2_Nav_Walker extends Walker_Nav_Menu
{

    function start_lvl(&$output, $depth = 0, $parent = null, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent";
        $classes = "mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect";
        $output .= "<ul class=\"" . $classes . "\"";
        $output .= (!is_null($parent)) ? ' for="menu-item-' . $parent->ID . '"' : '';
        $output .= ">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'mdl-menu__item';

        if ($args->has_children) {
            $classes[] = (1 > $depth) ? 'mdl-navigation__link' : 'mdl-navigation__link submenu';
            //$li_attributes .= ' data-dropdown="dropdown"';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= ($depth > 0) ? $indent . '<li' . $id . $value . $class_names . $li_attributes . '>' : '';

        $attributes = $item->attr_title ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= $item->target ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= $item->xfn ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        if (!$args->has_children) {
            $attributes .= $item->url ? ' href="' . esc_attr($item->url) . '"' : ' href="#"';
        }

        $attributes_classes[] = 'mdl-navigation__link';
        if (in_array('current-menu-item', $classes)) {
            $attributes_classes[] = 'is-active';
        }
        $attributes .= ' class="' . esc_attr(join(' ', $attributes_classes)) . '"';

        $item_output = $args->before . '<a' . $id . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= ($args->has_children AND 1 > $depth) ? ' <i class="material-icons">arrow_drop_down</i>' : '';
        $item_output .= '</a>' . $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * @see Walker::display_element()
     */
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {

        if (!$element)
            return;

        $id_field = $this->db_fields['id'];

        //display this element
        if (is_array($args[0]))
            $args[0]['has_children'] = (bool)(!empty($children_elements[$element->$id_field]) AND $depth != $max_depth - 1);
        elseif (is_object($args[0]))
            $args[0]->has_children = (bool)(!empty($children_elements[$element->$id_field]) AND $depth != $max_depth - 1);

        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 OR $max_depth > $depth + 1) AND isset($children_elements[$id])) {

            foreach ($children_elements[$id] as $child) {

                if (!isset($newlevel)) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge(array(&$output, $depth, $element), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
            unset($children_elements[$id]);
        }

        if (isset($newlevel) AND $newlevel) {
            //end the child delimiter
            $cb_args = array_merge(array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        if ($depth > 0) {
            call_user_func_array(array(&$this, 'end_el'), $cb_args);
        };

    }
}


class PPWPT2_Drawer_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $args->link_after = '';
        if (in_array('menu-item-has-children', $item->classes)) {
            $args->link_after = "<i class=\"material-icons\">arrow_drop_down</i>";
        }
        return parent::start_el($output, $item, $depth, $args, $id);
    }
}

function pp_nav_menu_css_class($classes, $item, $args)
{
    if ((in_array('current-menu-item', $classes) OR in_array('current-menu-ancestor', $classes))
        AND !in_array('is-active', $classes)
    ) {
        $classes[] = 'is-active';
    }

    if ($item->post_title == "--") {
        $classes[] = "is-hr-li";
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'pp_nav_menu_css_class', 10, 3);

function pp_nav_menu_link_attributes($atts, $item, $args)
{
    $atts["class"] = "mdl-navigation__link";
    if (in_array('current-menu-item', $item->classes)) {
        $atts["class"] .= " is-active";
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'pp_nav_menu_link_attributes', 10, 3);


function pp_walker_nav_menu_start_el($item_output, $item, $depth)
{
    //print_r(get_object_vars($item));
    if ($item->post_title == "--") {
        return "<hr>";
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'pp_walker_nav_menu_start_el', 10, 3);
