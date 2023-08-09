<?php
/**
 * Header Template
 *
 * @package Javid
 */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <?php get_template_part('template-parts/header/custom-styles'); ?>
</head>
<body <?php body_class(); ?>>
<?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
?>

<div id="page" class="site">
    <?php
    get_template_part('template-parts/header/preloader');
    ?>
    <?php if (get_theme_mod('enable_custom_header', false)): ?>
        <?php get_template_part('template-parts/header/custom-header'); ?>
    <?php else: ?>
    <header id="masthead" class="site-header" role="banner">
        <?php get_template_part('template-parts/header/nav'); ?>
    </header>
    <?php endif; ?>
    <div id="header-search" style="display: none;">
        <?php get_template_part('template-parts/header/searchform'); ?>
    </div>
    <div id="content" class="site-content">
