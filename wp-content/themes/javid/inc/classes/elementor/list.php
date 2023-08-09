<?php
namespace JAVID\Inc\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Javid_Elementor_List_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'javid_list';
    }

    public function get_title() {
        return esc_html__( 'List', 'javid' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return [ 'javid' ];
    }

    public function get_keywords() {
        return [ 'list', 'lists', 'ordered', 'unordered' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'List Content', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'List Item', 'javid' ),
                'default' => esc_html__( 'List Item', 'javid' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'javid' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'javid' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__( 'List Items', 'javid' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'text' => esc_html__( 'Item 1', 'javid' ),
                        'link' => '',
                    ],
                    [
                        'text' => esc_html__( 'Item 2', 'javid' ),
                        'link' => '',
                    ],
                    [
                        'text' => esc_html__( 'Item 3', 'javid' ),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'marker_section',
            [
                'label' => esc_html__( 'List Marker', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'marker_content',
            [
                'label' => esc_html__( 'Marker Icon', 'javid' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'library' => 'fa-solid',
                    'value' => 'fas fa-check-circle'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_content_section',
            [
                'label' => esc_html__( 'List Style', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-list-widget-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-list-widget-text > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'selector' => '{{WRAPPER}} .elementor-list-widget-text, {{WRAPPER}} .elementor-list-widget-text > a',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'selector' => '{{WRAPPER}} .elementor-list-widget-text',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_marker_section',
            [
                'label' => esc_html__( 'Marker Style', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'marker_color',
            [
                'label' => esc_html__( 'Color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-list-widget-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'marker_spacing',
            [
                'label' => esc_html__( 'Spacing', 'javid' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-list-widget-text' => 'padding-inline-start: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'marker_size',
            [
                'label' => esc_html__( 'Size', 'javid' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-list-widget-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $html_tag = [
            'ordered' => 'ol',
            'unordered' => 'ul',
            'other' => 'ul',
        ];
        $this->add_render_attribute( 'list', 'class', 'javid' );
        ?>
        <?php // echo $html_tag[ $settings['marker_type'] ]; ?> <?php // $this->print_render_attribute_string( 'list' ); ?>
        <div class="elementor-widget-javidlist">
        <ul>
        <?php
        foreach ( $settings['list_items'] as $index => $item ) { ?>
            <div class="elementor-list-widget-item">
                <i class="<?php echo $settings['marker_content']['value']; ?> elementor-list-widget-icon"></i>
                <?php
                $repeater_setting_key = $this->get_repeater_setting_key( 'text', 'list_items', $index );
                $this->add_render_attribute( $repeater_setting_key, 'class', 'elementor-list-widget-text' );
                $this->add_inline_editing_attributes( $repeater_setting_key );
                ?>
                <li <?php $this->print_render_attribute_string( $repeater_setting_key ); ?>>
                    <?php
                    $title = $settings['list_items'][$index]['text'];

                    if ( ! empty( $item['link']['url'] ) ) {
                        $this->add_link_attributes( "link_{$index}", $item['link'] );
                        $linked_title = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( "link_{$index}" ), $title );
                        echo $linked_title;
                    } else {
                        echo $title;
                    }
                    ?>
                </li>
            </div>
            <?php
        }
        ?>
        </ul>
        </div>
        <?php
    }


}