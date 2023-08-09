<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Sidebar_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'javid_sidebar';
    }

    public function get_title() {
        return esc_html__('Javid Sidebar', 'javid');
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['javid'];
    }

    protected function _register_controls() {
        global $wp_registered_sidebars;
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $sidebars = [];
        foreach ($wp_registered_sidebars as $sidebar) {
            $sidebars[] = $sidebar['name'];
        }

        $this->add_control(
            'sidebar',
            [
                'label' => esc_html__( 'Sidebar', 'javid' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 0,
                'options' => $sidebars,
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

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'javid' ),
                'selector' => '{{WRAPPER}} .elementor-sidebar .widget',
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
                    '{{WRAPPER}} .elementor-sidebar .widget' => 'padding: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .elementor-sidebar .widget' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {
        global $wp_registered_sidebars;
        $settings = $this->get_settings_for_display();

        $sidebars_id = [];
        foreach ($wp_registered_sidebars as $sidebar) {
            $sidebars_id[] = $sidebar['id'];
        }
        $sidebar_id = $sidebars_id[$settings['sidebar']];
        ?>
        <aside class="elementor-sidebar sidebar-<?php echo $sidebar_id ?>">
            <?php dynamic_sidebar($sidebar_id); ?>
        </aside>
        <?php
    }

    protected function _content_template() {}

}
