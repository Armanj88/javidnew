<?php
/**
 * Enqueue theme assets
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

class Sidebars {
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
        add_action('widgets_init', [$this, 'register_sidebars']);
    }

    public function register_sidebars() {
        register_sidebar( array(
            'name'              => __('Posts Sidebar', 'javid'),
            'id'                => 'posts-sidebar',
            'description'       =>  __("Posts Sidebar", 'javid'),
            'before_widget'     => '<div id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h3 class="widget-title">',
            'after_title'       => '</h3>',
        ) );
        register_sidebar( array(
            'name'              => __('Footer Widgets (Row 1)', 'javid'),
            'id'                => 'footer-widgets-1',
            'description'       =>  __("Footer widgets (Row 1)", 'javid'),
            'before_widget'     => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h3 class="widget-title">',
            'after_title'       => '</h3>',
        ) );
        register_sidebar( array(
            'name'              => __('Footer Widgets (Row 2)', 'javid'),
            'id'                => 'footer-widgets-2',
            'description'       =>  __("Footer widgets (Row 2)", 'javid'),
            'before_widget'     => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h3 class="widget-title">',
            'after_title'       => '</h3>',
        ) );
    }
}
