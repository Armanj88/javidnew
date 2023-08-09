<?php
/**
 * Customizer API
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;

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
        add_action('customize_register', [$this, 'javid_customizer_register_logostyle']);
        add_action('customize_register', [$this, 'javid_customizer_register_header']);
        add_action('customize_register', [$this, 'javid_customizer_register_footer']);
        add_action('customize_register', [$this, 'javid_customizer_register_archives']);
        add_action('customize_register', [$this, 'javid_customizer_register_posts']);
    }

	public function sanitize_radio( $input, $setting ){

		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key($input);

		//get the list of possible radio box options
		$choices = $setting->manager->get_control( $setting->id )->choices;

		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

	public function sanitize_checkbox( $input ){
		//returns true if checkbox is checked
		return isset( $input );
	}

	public function sanitize_select( $input, $setting ){

		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key($input);

		//get the list of possible select options
		$choices = $setting->manager->get_control( $setting->id )->choices;

		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	public function sanitize_file( $file, $setting ) {

		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png'
		);

		//check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );

		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}

    public function javid_customizer_register_logostyle($wp_customize) {
        /**
         * Register Logo And Style.
         */
        $wp_customize->add_section('logostyle', array(
            'title' => __('Logo and Style', 'javid'),
            'priority' => 1,
        ));

        $wp_customize->add_setting('primary_color', array(
            'default' => '#62D59C',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
            'label' => __('Primary Color', 'javid'),
            'section' => 'logostyle',
            'settings' => 'primary_color',
        )));

        $wp_customize->add_setting('secondary_color', array(
            'default' => '#00C52E',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
            'label' => __('Secondary Color', 'javid'),
            'section' => 'logostyle',
            'settings' => 'secondary_color',
        )));

        $wp_customize->add_setting('border_radius', array(
            'default' => '7',
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        ));
        $wp_customize->add_control('border_radius', array(
            'type'        => 'number',
            'section'     => 'logostyle',
            'settings'    => 'border_radius',
            'label'       => __('Border Radius', 'javid'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        ));

        $wp_customize->add_setting('enable_box_shadow', array(
            'default' => true,
            'transport' => 'refresh',
	        
        ));
        $wp_customize->add_control('enable_box_shadow', array(
            'type'     => 'checkbox',
            'section'  => 'logostyle',
            'settings' => 'enable_box_shadow',
            'label'    => __('Show box shadow', 'javid'),
        ));
    }

    public function javid_customizer_register_header($wp_customize) {
        /**
         * Register Header.
         */
        $wp_customize->add_section('header', array(
            'title' => __('Header', 'javid'),
            'priority' => 2,
        ));

        $the_query = new \WP_Query(array('post_type' => 'javidpart'));
        if ($the_query->have_posts()) {
            $list_parts = array();
            while ($the_query->have_posts()): $the_query->the_post();

                $list_parts[] = get_the_title();

            endwhile;

            $wp_customize->add_setting('enable_custom_header', array(
                'default'   => false,
                'transport' => 'refresh',
	            
            ));
            $wp_customize->add_control('enable_custom_header', array(
                'type'     => 'checkbox',
                'section'  => 'header',
                'settings' => 'enable_custom_header',
                'label'    => __('Enabled Custom Header', 'javid'),
            ));

            $wp_customize->add_setting('select_custom_header', array(
                'default'   => '',
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            ));
            $wp_customize->add_control('select_custom_header', array(
                'type'     => 'select',
                'choices'  => $list_parts,
                'section'  => 'header',
                'settings' => 'select_custom_header',
                'label'    => __('Select custom header', 'javid'),
            ));

        }
        wp_reset_query();

        $wp_customize->add_setting('header_background_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
            'label' => __('Header Background Color', 'javid'),
            'section' => 'header',
            'settings' => 'header_background_color',
        )));

        $wp_customize->add_setting('head_cta_link', array(
            'default'   => '#',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('head_cta_link', array(
            'type'     => 'url',
            'section'  => 'header',
            'settings' => 'head_cta_link',
            'label'    => __('Header button link', 'javid'),
        ));

        $wp_customize->add_setting('head_cta_text', array(
            'default'   => 'Click Me',
            'transport' => 'refresh',
	        'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));
        $wp_customize->add_control('head_cta_text', array(
            'type'     => 'text',
            'section'  => 'header',
            'settings' => 'head_cta_text',
            'label'    => __('Header button text', 'javid'),
        ));

        $wp_customize->add_setting('show_header_login', array(
            'default' => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('show_header_login', array(
            'type'     => 'checkbox',
            'section'  => 'header',
            'settings' => 'show_header_login',
            'label'    => __('Show header login icon', 'javid'),
        ));

        $wp_customize->add_setting('show_header_cta', array(
            'default' => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('show_header_cta', array(
            'type'     => 'checkbox',
            'section'  => 'header',
            'settings' => 'show_header_cta',
            'label'    => __('Show header button', 'javid'),
        ));

        $wp_customize->add_setting('show_header_search', array(
            'default' => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('show_header_search', array(
            'type'     => 'checkbox',
            'section'  => 'header',
            'settings' => 'show_header_search',
            'label'    => __('Show header search icon', 'javid'),
        ));
    }

    public function javid_customizer_register_footer($wp_customize) {
        /**
         * Register Footer.
         */
        $wp_customize->add_section('footer', array(
            'title' => __('Footer', 'javid'),
            'priority' => 2,
        ));

        $the_query = new \WP_Query(array('post_type' => 'javidpart'));
        if ($the_query->have_posts()) {
            $list_parts = array();
            while ($the_query->have_posts()): $the_query->the_post();

                $list_parts[] = get_the_title();

            endwhile;

            $wp_customize->add_setting('enable_custom_footer', array(
                'default'   => false,
                'transport' => 'refresh',
                
            ));
            $wp_customize->add_control('enable_custom_footer', array(
                'type'     => 'checkbox',
                'section'  => 'footer',
                'settings' => 'enable_custom_footer',
                'label'    => __('Enabled Custom Footer', 'javid'),
            ));

            $wp_customize->add_setting('select_custom_footer', array(
                'default'   => '',
                'transport' => 'refresh',
	            'sanitize_callback' => 'absint'
            ));
            $wp_customize->add_control('select_custom_footer', array(
                'type'     => 'select',
                'choices'  => $list_parts,
                'section'  => 'footer',
                'settings' => 'select_custom_footer',
                'label'    => __('Select custom footer', 'javid'),
            ));

        }
        wp_reset_query();

        $wp_customize->add_setting('footer_background_color', array(
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
            'label' => __('Footer Background Color', 'javid'),
            'section' => 'footer',
            'settings' => 'footer_background_color',
        )));

        $wp_customize->add_setting('footer_background_image', array(
            'default'   => '',
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image', array(
            'section'  => 'footer',
            'settings' => 'footer_background_image',
            'label'    => __('Footer Background Image', 'javid'),
        )));

        $wp_customize->add_setting('footer_background_size', array(
            'default'   => 2,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('footer_background_size', array(
            'type'     => 'radio',
            'choices'  => array(
                'cover'   => __('Cover', 'javid'),
                'contain' => __('Contain', 'javid'),
                'auto'    => __('Auto', 'javid')
            ),
            'settings' => 'footer_background_size',
            'section'  => 'footer',
            'label'    => __('Footer Background Size', 'javid'),
        ));

        $wp_customize->add_setting('footer_background_repeat', array(
            'default'   => 0,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('footer_background_repeat', array(
            'type'     => 'radio',
            'choices'  => array(
                'repeat'   => __('Repeat', 'javid'),
                'no-repeat' => __('No Repeat', 'javid'),
                'repeat-x'    => __('Repeat X', 'javid'),
                'repeat-y'    => __('Repeat Y', 'javid')
            ),
            'settings' => 'footer_background_repeat',
            'section'  => 'footer',
            'label'    => __('Footer Background Repeat', 'javid'),
        ));

        $wp_customize->add_setting('footer_top_border_width', array(
            'default' => '2',
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        ));
        $wp_customize->add_control('footer_top_border_width', array(
            'type'        => 'number',
            'section'     => 'footer',
            'settings'    => 'footer_top_border_width',
            'label'       => __('Footer Top Border Width', 'javid'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        ));

        $wp_customize->add_setting('footer_top_border_color', array(
            'default' => '#000000',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_top_border_color', array(
            'label' => __('Footer Top Border Color', 'javid'),
            'section' => 'footer',
            'settings' => 'footer_top_border_color',
        )));

        $wp_customize->add_setting('footer_widgets_row1_columns', array(
            'default' => 4,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        ));
        $wp_customize->add_control('footer_widgets_row1_columns', array(
            'type'        => 'number',
            'section'     => 'footer',
            'settings'    => 'footer_widgets_row1_columns',
            'label'       => __('Footer Widgets Row 1 Columns Number', 'javid'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 6,
            ),
        ));

        $wp_customize->add_setting('footer_widgets_row2_columns', array(
            'default' => 2,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        ));
        $wp_customize->add_control('footer_widgets_row2_columns', array(
            'type'        => 'number',
            'section'     => 'footer',
            'settings'    => 'footer_widgets_row2_columns',
            'label'       => __('Footer Widgets Row 2 Columns Number', 'javid'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 6,
            ),
        ));

        $wp_customize->add_setting('enable_footer_menu', array(
            'default' => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('enable_footer_menu', array(
            'type'     => 'checkbox',
            'section'  => 'footer',
            'settings' => 'enable_footer_menu',
            'label'    => __('Show footer menu', 'javid'),
        ));

        $wp_customize->add_setting('footer_copyright_right', array(
            'default'   => '© ' . date('Y') . '. ' . __('All Rights Reserved', 'javid') . '.',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));
        $wp_customize->add_control('footer_copyright_right', array(
            'type'     => 'text',
            'section'  => 'footer',
            'settings' => 'footer_copyright_right',
            'label'    => __('Footer Copyright Right', 'javid'),
        ));

        $wp_customize->add_setting('footer_copyright_left', array(
            'default'   => '© ' . date('Y') . '. ' . __('All Rights Reserved', 'javid') . '.',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));
        $wp_customize->add_control('footer_copyright_left', array(
            'type'     => 'text',
            'section'  => 'footer',
            'settings' => 'footer_copyright_left',
            'label'    => __('Footer Copyright Left', 'javid'),
        ));
    }

    public function javid_customizer_register_archives($wp_customize) {
        /**
         * Register Archives.
         */
        $wp_customize->add_section('archives', array(
            'title' => __('Archives', 'javid'),
            'priority' => 2,
        ));

        $wp_customize->add_setting('archives_columns_number', array(
            'default'   => 3,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        ));
        $wp_customize->add_control('archives_columns_number', array(
            'type'     => 'number',
            'section'  => 'archives',
            'settings' => 'archives_columns_number',
            'label'    => __('Archives columns number', 'javid'),
            'input_attrs' => array(
                'min' => 1,
                'max' => 6,
            )
        ));

        $wp_customize->add_setting('archives_enable_post_meta', array(
            'default'   => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('archives_enable_post_meta', array(
            'type'     => 'checkbox',
            'section'  => 'archives',
            'settings' => 'archives_enable_post_meta',
            'label'    => __('Enabled Post Meta', 'javid'),
        ));

        $wp_customize->add_setting('archives_enable_read_more', array(
            'default'   => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('archives_enable_read_more', array(
            'type'     => 'checkbox',
            'section'  => 'archives',
            'settings' => 'archives_enable_read_more',
            'label'    => __('Enabled Read More Button', 'javid'),
        ));

        $wp_customize->add_setting('archives_enable_categories', array(
            'default'   => false,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('archives_enable_categories', array(
            'type'     => 'checkbox',
            'section'  => 'archives',
            'settings' => 'archives_enable_categories',
            'label'    => __('Enabled Categories Links', 'javid'),
        ));

        $wp_customize->add_setting('archives_enable_excerpt', array(
            'default'   => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('archives_enable_excerpt', array(
            'type'     => 'checkbox',
            'section'  => 'archives',
            'settings' => 'archives_enable_excerpt',
            'label'    => __('Enabled Excerpt', 'javid'),
        ));

        $wp_customize->add_setting('archives_center_post_title', array(
            'default'   => false,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('archives_center_post_title', array(
            'type'     => 'checkbox',
            'section'  => 'archives',
            'settings' => 'archives_center_post_title',
            'label'    => __('Make the title of post centered', 'javid'),
        ));
    }

    public function javid_customizer_register_posts($wp_customize) {
        /**
         * Register Posts.
         */
        $wp_customize->add_section('posts', array(
            'title' => __('Posts And Pages', 'javid'),
            'priority' => 2,
        ));

        $wp_customize->add_setting('enable_posts_sidebar', array(
            'default'   => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('enable_posts_sidebar', array(
            'type'     => 'checkbox',
            'section'  => 'posts',
            'settings' => 'enable_posts_sidebar',
            'label'    => __('Show sidebar in posts', 'javid'),
        ));

        $wp_customize->add_setting('enable_pages_sidebar', array(
            'default'   => false,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('enable_pages_sidebar', array(
            'type'     => 'checkbox',
            'section'  => 'posts',
            'settings' => 'enable_pages_sidebar',
            'label'    => __('Show sidebar in page', 'javid'),
        ));

        $wp_customize->add_setting('thumbnail_position', array(
            'default'   => 2,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('thumbnail_position', array(
            'type'     => 'radio',
            'choices'  => array(
                0 => __('Full Width', 'javid'),
                1 => __('Right', 'javid'),
                2 => __('Left', 'javid'),
            ),
            'section'  => 'posts',
            'settings' => 'thumbnail_position',
            'label'    => __('Thumbnail Position', 'javid'),
        ));

        $wp_customize->add_setting('show_next_prev_post', array(
            'default'   => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('show_next_prev_post', array(
            'type'     => 'checkbox',
            'section'  => 'posts',
            'settings' => 'show_next_prev_post',
            'label'    => __('Show next and previous post link', 'javid'),
        ));

        $wp_customize->add_setting('show_post_meta', array(
            'default'   => true,
            'transport' => 'refresh',
            
        ));
        $wp_customize->add_control('show_post_meta', array(
            'type'     => 'checkbox',
            'section'  => 'posts',
            'settings' => 'show_post_meta',
            'label'    => __('Show post meta', 'javid'),
        ));
    }
}
