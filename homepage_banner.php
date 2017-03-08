<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 25/10/16
 * Time: 2:33 AM
 */

?>

<div class="hero">
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

<?php if ( is_active_sidebar( 'homepage-banner-1' ) ) { ?>
    <!-- row one -->
    <div class="mdl-grid mdlwp-1200 pir-cards hp-row-one">
        <?php dynamic_sidebar( 'homepage-banner-1' ); ?>
    </div>
<?php } ?>

<?php if ( is_active_sidebar( 'homepage-banner-2' ) ) { ?>
    <!-- row two -->
    <div class="mdl-grid mdlwp-1200 pir-cards hp-row-two">
        <?php dynamic_sidebar( 'homepage-banner-2' ); ?>
    </div>
<?php } ?>

<?php if ( is_active_sidebar( 'homepage-banner-3' ) ) { ?>
    <!-- row three -->
    <div class="mdl-grid mdlwp-1200 pir-cards hp-row-three">
        <?php dynamic_sidebar( 'homepage-banner-3' ); ?>
    </div>
<?php } ?>

<?php if ( is_active_sidebar( 'homepage-banner-4' ) ) { ?>
    <!-- row four -->
    <div class="mdl-grid mdlwp-1200 pir-cards hp-row-four">
        <?php dynamic_sidebar( 'homepage-banner-4' ); ?>
    </div>
<?php } ?>
