<?php
/**
 * Header Template
 *
 * @package Javid
 */

?>

<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php get_template_part('template-parts/header/custom-styles'); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
?>

<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
        <?php get_template_part('template-parts/header/nav'); ?>
    </header>
    <div id="header-search" style="display: none;">
        <?php get_template_part('template-parts/header/searchform'); ?>
    </div>
    <div id="content" class="site-content">
