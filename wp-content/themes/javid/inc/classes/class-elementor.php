<?php
/**
 * Register custom elementor widgets
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

use JAVID\Inc\Elementor\Javid_Elementor_Box_Icon_2_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Box_Icon_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Grid_Post_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Header_Menu_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Header_Search_Form_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_List_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Search_Button_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Login_Button_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Search_Form_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Services_Box_2_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Services_Box_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Services_Box_3_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Sidebar_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Price_Box_Widget;
use Javid_Elementor_Box_Icon_3_Widget;

class Elementor {
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
        add_action( 'elementor/elements/categories_registered', [$this, 'javid_add_elementor_widgets_category_header'] );
        add_action( 'elementor/elements/categories_registered', [$this, 'javid_add_elementor_widgets_category_javid'] );

        add_action( 'elementor/widgets/register', [$this, 'javid_register_elementor_widgets_header'] );
        add_action( 'elementor/widgets/register', [$this, 'javid_register_elementor_widgets'] );
    }

    function javid_add_elementor_widgets_category_header( $elements_manager ) {

        $elements_manager->add_category(
            'javid_header',
            [
                'title' => esc_html__( 'Javid Header', 'javid' ),
                'icon' => 'fa fa-plug',
            ]
        );

    }

    function javid_add_elementor_widgets_category_javid( $elements_manager ) {

        $elements_manager->add_category(
            'javid',
            [
                'title' => esc_html__( 'Javid', 'javid' ),
                'icon' => 'fa fa-plug',
            ]
        );

    }

    function javid_register_elementor_widgets_header( $widgets_manager ) {
        require_once( 'elementor/header/header-menu.php' );
        $widgets_manager->register( new Javid_Elementor_Header_Menu_Widget() );

        require_once( 'elementor/header/search-icon.php' );
        $widgets_manager->register( new Javid_Elementor_Search_Button_Widget() );

        require_once( 'elementor/header/login-icon.php' );
        $widgets_manager->register( new Javid_Elementor_Login_Button_Widget() );

        require_once( 'elementor/header/searchform.php' );
        $widgets_manager->register( new Javid_Elementor_Header_Search_Form_Widget() );
    }

    function javid_register_elementor_widgets( $widgets_manager ) {
        require_once( 'elementor/searchform.php' );
        $widgets_manager->register( new Javid_Elementor_Search_Form_Widget() );

        require_once( 'elementor/sidebar.php' );
        $widgets_manager->register( new Javid_Elementor_Sidebar_Widget() );

        require_once( 'elementor/boxicon.php' );
        $widgets_manager->register( new Javid_Elementor_Box_Icon_Widget() );

        require_once( 'elementor/boxicon2.php' );
        $widgets_manager->register( new Javid_Elementor_Box_Icon_2_Widget() );

        require_once( 'elementor/boxicon3.php' );
        $widgets_manager->register( new Javid_Elementor_Box_Icon_3_Widget() );

        require_once( 'elementor/price_box.php' );
        $widgets_manager->register( new Javid_Elementor_Price_Box_Widget() );

        require_once( 'elementor/gridpost.php' );
        $widgets_manager->register( new Javid_Elementor_Grid_Post_Widget() );

        require_once( 'elementor/list.php' );
        $widgets_manager->register( new Javid_Elementor_List_Widget() );

        require_once( 'elementor/services-box.php' );
        $widgets_manager->register( new Javid_Elementor_Services_Box_Widget() );

        require_once( 'elementor/services-box-2.php' );
        $widgets_manager->register( new Javid_Elementor_Services_Box_2_Widget() );

        require_once( 'elementor/services-box-3.php' );
        $widgets_manager->register( new Javid_Elementor_Services_Box_3_Widget() );
    }
}
