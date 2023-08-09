<?php

/**
 * Theme Functions.
 *
 * @package Javid
 */

use JAVID\Inc\JAVID;

if (!defined('JAVID_DIR_PATH')) {
    define('JAVID_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('JAVID_DIR_URI')) {
    define('JAVID_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('JAVID_CSS_URI')) {
    define('JAVID_CSS_URI', untrailingslashit(JAVID_DIR_URI . '/assets/css'));
}

if (!defined('JAVID_IMG_URI')) {
    define('JAVID_IMG_URI', untrailingslashit(JAVID_DIR_URI . '/assets/img'));
}

if (!defined('JAVID_JS_URI')) {
    define('JAVID_JS_URI', untrailingslashit(JAVID_DIR_URI . '/assets/js'));
}

if (!defined('JAVID_FONTS_URI')) {
    define('JAVID_FONTS_URI', untrailingslashit(JAVID_DIR_URI . '/assets/fonts'));
}

if (!defined('JAVID_LIBRARY_URI')) {
    define('JAVID_LIBRARY_URI', untrailingslashit(JAVID_DIR_URI . '/assets/library'));
}

if (!defined('JAVID_ELEMENTOR_URI')) {
    define('JAVID_ELEMENTOR_URI', untrailingslashit(JAVID_DIR_URI . '/elementor'));
}

require_once JAVID_DIR_PATH . '/inc/helpers/autoloader.php';
require_once JAVID_DIR_PATH . '/inc/helpers/template-tags.php';

function javid_get_theme_instance()
{
    JAVID::get_instance();
}

javid_get_theme_instance();
