<?php
/**
 * The template part for displaying the drawer navigation
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

?>

<div class="mdl-layout__drawer">
    <button id="drawer_close_button" class="mdl-button mdl-js-button mdl-button--icon">
        <i class="material-icons">close</i>
    </button>
    <span class="mdl-layout-title">
        <a id="logo" href="<?php echo esc_url(home_url('/')); ?>">
            pirate<span>party</span><br>
            <span class="country">australia</span>
        </a>
    </span>

    <?php
    $args = array(
        'theme_location' => 'primary',
        'container' => 'ul',
        'menu_class' => 'mdl-navigation',
        'walker' => new PPWPT2_Drawer_Walker()
    );

    if (has_nav_menu('drawer')) {
        wp_nav_menu($args);
    }
    ?>

</div>
