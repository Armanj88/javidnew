<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Header_Search_Form_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'javid_header_search_form';
    }

    public function get_title() {
        return esc_html__('Javid Header Search Form', 'javid');
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['javid_header'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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



        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <?php get_search_form(); ?>
        <?php
    }

    protected function _content_template() {}

}
