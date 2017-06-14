<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package MDLWP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="icon" type="image/png" href="<?php echo(get_stylesheet_directory_uri() . '/img/favicon/favicon-16x16.png'); ?>" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo(get_stylesheet_directory_uri() . '/img/favicon/favicon-32x32.png'); ?>" sizes="32x32">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo(get_stylesheet_directory_uri() . '/img/favicon/apple-touch-icon.png'); ?>">
	<link rel="manifest" href="<?php echo(get_stylesheet_directory_uri() . '/img/favicon/manifest.json'); ?>">
	<link rel="mask-icon" href="<?php echo(get_stylesheet_directory_uri() . '/img/favicon/safari-pinned-tab.svg'); ?>" color="#5bbad5">
	<meta name="theme-color" content="#0073ae">

	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<?php do_action( 'mdlwp_after_opening_body' ); ?>

<div id="page" class="hfeed site mdl-layout mdl-js-layout mdl-layout--fixed-header">

<header id="masthead" class="site-header mdl-layout__header" role="banner">

	<?php do_action( 'mdlwp_after_opening_header' ); ?>

	<?php get_template_part( 'template-parts/nav', 'main' ); ?>

    <?php do_action( 'mdlwp_before_closing_header' ); ?>

</header>

 <?php get_template_part( 'template-parts/nav', 'drawer' ); ?>
			
	
<main class="mdl-layout__content">
	<div id="content" class="site-content">

		<?php do_action( 'mdlwp_after_opening_content' ); ?>