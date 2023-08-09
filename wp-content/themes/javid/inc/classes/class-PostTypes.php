<?php
/**
 * Register custom post types
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

class PostTypes {
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
        add_action( 'init', [$this, 'javid_create_part_cpt'], 0 );
    }

    // Register Custom Post Type Part
    function javid_create_part_cpt() {

        $labels = array(
            'name' => _x( 'Parts', 'Post Type General Name', 'javid' ),
            'singular_name' => _x( 'Part', 'Post Type Singular Name', 'javid' ),
            'menu_name' => _x( 'Parts', 'Admin Menu text', 'javid' ),
            'name_admin_bar' => _x( 'Part', 'Add New on Toolbar', 'javid' ),
            'archives' => __( 'Part Archives', 'javid' ),
            'attributes' => __( 'Part Attributes', 'javid' ),
            'parent_item_colon' => __( 'Parent Part:', 'javid' ),
            'all_items' => __( 'All Parts', 'javid' ),
            'add_new_item' => __( 'Add New Part', 'javid' ),
            'add_new' => __( 'Add New', 'javid' ),
            'new_item' => __( 'New Part', 'javid' ),
            'edit_item' => __( 'Edit Part', 'javid' ),
            'update_item' => __( 'Update Part', 'javid' ),
            'view_item' => __( 'View Part', 'javid' ),
            'view_items' => __( 'View Parts', 'javid' ),
            'search_items' => __( 'Search Part', 'javid' ),
            'not_found' => __( 'Not found', 'javid' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'javid' ),
            'featured_image' => __( 'Featured Image', 'javid' ),
            'set_featured_image' => __( 'Set featured image', 'javid' ),
            'remove_featured_image' => __( 'Remove featured image', 'javid' ),
            'use_featured_image' => __( 'Use as featured image', 'javid' ),
            'insert_into_item' => __( 'Insert into Part', 'javid' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Part', 'javid' ),
            'items_list' => __( 'Parts list', 'javid' ),
            'items_list_navigation' => __( 'Parts list navigation', 'javid' ),
            'filter_items_list' => __( 'Filter Parts list', 'javid' ),
        );
        $args = array(
            'label' => __( 'Part', 'javid' ),
            'description' => __( 'Custom parts for header, footer and etc. You can edit them with elementor', 'javid' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-layout',
            'supports' => array('title'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 25,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type( 'javidpart', $args );
    }
}
