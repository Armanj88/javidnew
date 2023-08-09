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

        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'register_styles'] );
        add_action( 'elementor/frontend/after_enqueue_scripts', [$this, 'register_scripts'] );

        add_action('customize_controls_enqueue_scripts', [$this, 'register_customizer_styles']);
    }

    public function register_styles()
    {
        // Register Styles
        wp_register_style('bootstrap-css', JAVID_LIBRARY_URI . '/css/bootstrap.min.css', []);
	    wp_register_style('variables-css', JAVID_CSS_URI . '/global/variables.css', ['bootstrap-css']);
	    wp_register_style('css-reset-css', JAVID_CSS_URI . '/global/css_reset.css', ['variables-css']);
	    wp_register_style('defaults-css', JAVID_CSS_URI . '/global/defaults.css', ['css-reset-css']);
	    wp_register_style('header-css', JAVID_CSS_URI . '/global/header.css', ['defaults-css']);
	    wp_register_style('footer-css', JAVID_CSS_URI . '/global/footer.css', ['header-css']);
	    wp_register_style('content-none-css', JAVID_CSS_URI . '/global/content-none.css', ['footer-css']);
	    wp_register_style('responsive-css', JAVID_CSS_URI . '/global/responsive.css', ['content-none-css']);
	    wp_register_style('widgets-css', JAVID_CSS_URI . '/global/widgets.css', ['responsive-css']);

        wp_register_style('font-css', JAVID_CSS_URI . '/global/iransans.css', []);
        wp_register_style('fontawesome', JAVID_LIBRARY_URI . '/css/all.min.css', []);
        wp_register_style('singular-css', JAVID_CSS_URI . '/singular.css', []);
        wp_register_style('archive-css', JAVID_CSS_URI . '/archive.css', []);
        wp_register_style('author-css', JAVID_CSS_URI . '/author.css', []);
		wp_register_style('widgets-css', JAVID_CSS_URI . '/widgets.css', []);
        wp_register_style('singular-sidebar-css', JAVID_CSS_URI . '/singular-sidebar.css', []);
        wp_register_style('elementor-css', JAVID_CSS_URI . '/elementor.css', []);
	    wp_register_style('rate-my-post-javid', JAVID_CSS_URI . '/plugins/rate-my-post.css', []);
	    wp_register_style('easy-table-of-content-javid', JAVID_CSS_URI . '/plugins/easy-table-of-content.css', []);
	    wp_register_style('wpforms-javid', JAVID_CSS_URI . '/plugins/wpforms.css', []);
		wp_register_style('preloader-css', JAVID_CSS_URI . '/preloader.css');

        // Enqueue Styles
        wp_enqueue_style('bootstrap-css');
	    wp_enqueue_style('variables-css');
	    wp_enqueue_style('css-reset-css');
	    wp_enqueue_style('defaults-css');
	    wp_enqueue_style('header-css');
	    wp_enqueue_style('footer-css');
	    wp_enqueue_style('content-none-css');
	    wp_enqueue_style('responsive-css');
	    wp_enqueue_style('widgets-css');

        wp_enqueue_style('font-css');
        wp_enqueue_style('fontawesome');

		if (get_theme_mod('enable_preloader')) {
			wp_enqueue_style('preloader-css');
		}

        if (is_singular()) {
            wp_enqueue_style('singular-css');
        }
        if ((is_archive() && !is_search()) || is_home()) {
            wp_enqueue_style('archive-css');
        }
        if (is_author()) {
            wp_enqueue_style('author-css');
        }
        if (is_singular() && is_active_sidebar('posts-sidebar')) {
            wp_enqueue_style('singular-sidebar-css');
        }

        $elementor_page = get_post_meta(get_the_ID(), '_elementor_edit_mode', true);
        if ($elementor_page === 'builder') {
            wp_enqueue_style('elementor-css');
        }

	    if (is_plugin_active('easy-table-of-contents/easy-table-of-contents.php')) {
		    wp_enqueue_style('easy-table-of-content-javid');
	    }

	    if (is_plugin_active('rate-my-post/rate-my-post.php')) {
		    wp_enqueue_style('rate-my-post-javid');
	    }

		if (is_plugin_active('wpforms-lite/wpforms.php') || is_plugin_active('wpforms-pro/wpforms.php')) {
			wp_enqueue_style('wpforms-javid');
		}
    }

    public function register_scripts()
    {
        // Register Scripts.
        wp_register_script('bootstrap-js', JAVID_DIR_URI . '/assets/library/js/bootstrap.js', ['jquery']);
        wp_register_script('main-js', JAVID_JS_URI . '/main.js', ['jquery']);
        wp_register_script('color-convert-js', JAVID_JS_URI . '/color_convert.js', ['jquery'], '', true);
		wp_register_script('responsive-js', JAVID_JS_URI . '/responsive.js', ['jquery'], '');

        // Enqueue Scripts
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('main-js');
	    wp_enqueue_script('color-convert-js');
	    wp_enqueue_script('responsive-js');
    }

    public function register_customizer_styles() {
        wp_register_style('customizer-style', JAVID_CSS_URI . '/customizer.css', []);
        wp_register_style('customizer-font-css', JAVID_CSS_URI . '/global/customizer-iransans.css', []);


        wp_enqueue_style('customizer-style');
        wp_enqueue_style('customizer-font-css');
    }
}
