<?php
/**
 * The template part for displaying the main navigation
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

?>

<div class="mdl-layout__header-row">
    <!-- Title -->
    <span class="mdl-layout-title">
        <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            pirate<span>party</span><br>
            <span class="country">australia</span>
        </a>
    </span>

    <div class="mdl-layout-spacer"></div>

    <div>
    <?php

    $args = array(
        'theme_location' => 'primary',
        'container' => 'nav',
        'items_wrap' => '%3$s',
        'container_class' => 'mdl-navigation mdl-layout--large-screen-only',
        'walker' => new PPWPT2_Nav_Walker()
    );

    if (has_nav_menu('primary')) {
        wp_nav_menu($args);
    }
    ?></div>

    <div class="mdl-layout-spacer"></div>

    <div class="pir-header-extra mdl-layout--medium-screen-only">
        <a href="<?php echo(get_page_by_slug("join-us")); ?>" class="pir-button-join mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Join us
        </a>
        <a href="<?php echo(get_page_by_slug("donate")); ?>"  class="pir-button-donate mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Donate
        </a>
        <a href="https://members.pirateparty.org.au"  class="pir-button-members mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Members
        </a>
    </div>

    <div class="mdlwp-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
        <?php get_search_form(); ?>
    </div>

</div>
