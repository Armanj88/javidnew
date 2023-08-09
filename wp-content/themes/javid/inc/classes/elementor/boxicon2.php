<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Box_Icon_2_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'javid_box_icon2';
    }

    public function get_title() {
        return esc_html__('Box Icon 2', 'javid');
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['javid'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the title...', 'javid' ),
                'default' => __('Title', 'javid'),
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'javid' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-download',
                    'library' => 'fa',
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'textcolor',
            [
                'label' => __( 'Color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon size', 'javid' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'javid' ),
                'selector' => '{{WRAPPER}} .boxicon2',
            ]
        );

        $this->add_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'javid' ),
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .boxicon2' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'javid' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .boxicon2' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="javid-elementor-widget boxicon2" style="background-color: <?php echo $settings['bg_color']; ?>;">
            <div class="icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'style' => 'color: '.$settings['icon_color'].'; font-size: '.$settings['icon_size']['size'].'px;' ] ); ?>
            </div>
            <p class="boxicon2-title" style="color: <?php echo $settings['textcolor']; ?>;">
                <?php echo $settings['title']; ?>
            </p>
        </div>
        <?php
    }

    protected function _content_template() {}

}
