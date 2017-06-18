<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 25/10/16
 * Time: 2:33 AM
 */

?>

<?php if ( is_active_sidebar( 'homepage-hero' ) ) { ?>
    <!-- hero -->
    <?php dynamic_sidebar( 'homepage-hero' ); ?>
<?php } ?>

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
