<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Search_Button_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'javid_search_button';
    }

    public function get_title() {
        return esc_html__('Javid Search Button', 'javid');
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
        <a href="javascript:void(0)" class="headbtn btn px-4 py-2 headbtn-icon" id="search-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        <?php
    }

    protected function _content_template() {}

}
