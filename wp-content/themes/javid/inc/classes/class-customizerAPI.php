<?php
/**
 * Customizer API
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

class CustomizerAPI {
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
        add_action('customizer_register', [$this, 'javid_customizer_register']);
    }

    public function javid_customizer_register($wp_customize) {
        /**
         * Register Logo And Style.
         */
        $wp_customize->add_section('logostyle', array(
            'title' => __('Logo and Style', 'javid'),
            'priority' => 1,
        ));
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'color_primary', array(
            'label'    => __('Primary color', 'javid'),
            'section'  => 'logostyle',
            'settings' => 'primary_color',
        )));
        $wp_customize->add_setting('secondary_color', array(
            'default'   => '#f7f7f7',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'color_secondary', array(
            'label'    => __('Secondary color', 'javid'),
            'section'  => 'logostyle',
            'settings' => 'secondary_color',
        )));
        $wp_customize->add_setting('body_background', array(
            'default'   => '#ffffff',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'background_body', array(
            'label'    => __('Page background', 'javid'),
            'section'  => 'logostyle',
            'settings' => 'body_background',
        )));
    }
}
