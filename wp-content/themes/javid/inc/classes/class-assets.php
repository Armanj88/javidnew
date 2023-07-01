<?php
/**
 * Enqueue theme assets
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

class Assets {
    use Singleton;
    protected function __construct()
    {
        // load class;
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        // Register Styles
        wp_register_style('bootstrap-css', JAVID_LIBRARY_URI . '/css/bootstrap.min.css', []);
        wp_register_style('main-css', JAVID_CSS_URI . '/main.css', ['bootstrap-css']);
        wp_register_style('font-css', JAVID_CSS_URI . '/global/iransans.css', []);
        wp_register_style('fontawesome', JAVID_LIBRARY_URI . '/css/all.min.css', []);
        wp_register_style('singular-css', JAVID_CSS_URI . '/singular.css', []);


        // Enqueue Styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('main-css');
        wp_enqueue_style('font-css');
        wp_enqueue_style('fontawesome');

        if (is_singular()) {
            wp_enqueue_style('singular-css');
        }
    }

    public function register_scripts()
    {
        // Register Scripts.
        wp_register_script('bootstrap-js', JAVID_DIR_URI . '/assets/library/js/bootstrap.js', ['jquery']);
        wp_register_script('main-js', JAVID_JS_URI . '/main.js', ['jquery']);
        wp_register_script('color-convert-js', JAVID_JS_URI . '/color_convert.js', ['jquery']);

        // Enqueue Scripts
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('main-js');
        wp_enqueue_script('color-convert-js');
    }
}
