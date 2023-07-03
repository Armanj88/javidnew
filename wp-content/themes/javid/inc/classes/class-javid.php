<?php
/**
 * The theme class
 *
 * @package AdvancedTheme
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

class JAVID
{
    use Singleton;

    protected function __construct()
    {
        // load class
        Assets::get_instance();
        Menus::get_instance();
        Sidebars::get_instance();
        CustomizerAPI::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
        add_action('admin_head', [$this, 'wp_admin_fonts']);

        /**
         * Filters.
         */
        add_filter('user_contactmethods', [$this, 'wpb_new_contact_methods'], 10, 1);
    }

    function wpb_new_contact_methods($contactmethods)
    {
        // Add Instagram
        $contactmethods['instagram'] = 'Instagram';
        //add Facebook
        $contactmethods['facebook'] = 'Facebook';
        // add Twitter
        $contactmethods['twitter'] = 'Twitter';

        return $contactmethods;
    }

    public function wp_admin_fonts()
    {
        echo '
        <link rel="stylesheet" href="' . JAVID_CSS_URI . '/global/iransans.css' . '">
        <style>
        html, body, *:not(span):not(i):not(pre):not(code) {
            font-family: "iransans", sans-serif !important;
        }
        </style>
        ';
    }

    public function setup_theme()
    {
        load_theme_textdomain('javid');

        add_theme_support('title-tag');
        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ]);
        add_theme_support('custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
        ]);
        add_theme_support('post-thumbnails');
        add_image_size('featured-thumbnail', 350, 233, true);

        add_theme_support('custom-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style'
            ]);


        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_editor_style();

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }
    }
}