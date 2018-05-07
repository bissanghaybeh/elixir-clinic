<?php
/**
 * Exilir header.php
 *
 * PHP version 5.3
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name', 'display'); ?> &raquo; Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
        <div class="container custom-container">
            <h1 class="logo pull-left">
                <a href="<?php echo home_url(); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
            <div class="menu-opener visible-xs">
                <i class="fa fa-bars"></i>
            </div>
            <div class="menu-container-mobile clearfix">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'header-menu',
                    )
                );
                ?>
            </div>
            <div class="language-selector hidden-xs">
                <a class="language-link selected"><?php _e('en', ELIXIR_TEXT_DOMAIN); ?></a>
                <a class="language-link"><?php _e('ar', ELIXIR_TEXT_DOMAIN); ?></a>
            </div>
            <div class="social-icons pull-right hidden-xs">
                <a class="fa fa-search" href="#"></a>
                <a class="fa fa-facebook-f" href="#"></a>
                <a class="fa fa-instagram" href="#"></a>
            </div>
            <nav class="pull-right hidden-xs">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'header-menu',
                    )
                );
                ?>
            </nav>
        </div>
    </header><!-- .site-header -->
    <div id="content" class="site-content">
