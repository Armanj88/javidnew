<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Header_Menu_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'javid_header_menu';
    }

    public function get_title() {
        return esc_html__('Javid Header Menu', 'javid');
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
        $list_nav_menus = array();
        foreach (wp_get_nav_menus() as $item) {
            foreach ($item as $key=>$value) {
                if ($key == 'name') {
                    $list_nav_menus[] = $value;
                }
            }
        }

        $this->add_control(
            'menu',
            [
                'label' => esc_html__( 'Menu', 'javid' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 0,
                'options' => $list_nav_menus,
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
        <?php
        $list_nav_menus = array();
        foreach (wp_get_nav_menus() as $item) {
            foreach ($item as $key=>$value) {
                if ($key == 'slug') {
                    $list_nav_menus[] = $value;
                }
            }
        }
        ?>
        <div class="elementor-widget navbar">
            <nav class="clearfix">
                <?php
                wp_nav_menu(array('menu' => $list_nav_menus[$settings['menu']]));
                ?>
            </nav>
        </div>
        <?php
    }

    protected function _content_template() {}

}
