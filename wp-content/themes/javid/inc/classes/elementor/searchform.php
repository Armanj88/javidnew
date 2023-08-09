<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Search_Form_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'javid_search_form';
    }

    public function get_title() {
        return esc_html__('Search Form', 'javid');
    }

    public function get_icon() {
        return 'eicon-search-bold';
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
            'placeholder',
            [
                'label' => __( 'Input Placeholder', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the placeholder...', 'javid' ),
                'default' => __('placeholder', 'javid'),
            ]
        );
        $this->add_control(
            'buttontext',
            [
                'label' => __( 'Button Text', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the button text...', 'javid' ),
                'default' => __('Search', 'javid'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'javid' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'titlecolor',
            [
                'label' => __( 'Title text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selector' => [
                    '{{WRAPPER}} .elementor-widget-searchform span' => 'color: {{VALUE}};'
                ]
            ]
        );
        $this->add_control(
            'input_bg_color',
            [
                'label' => __( 'Input Background color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selector' => [
                    '{{WRAPPER}} .elementor-widget-searchform .elementor-widget-searchform-form input' => 'background: {{VALUE}} !important',
                    '{{WRAPPER}} .elementor-widget-searchform .elementor-widget-searchform-form' => 'background: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Button text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selector' => [
                    '{{WRAPPER}} .elementor-widget-searchform .elementor-widget-searchform-form button' => 'color: {{VALUE}} !important;'
                ]
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button background color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFC221',
                'selector' => [
                    '{{WRAPPER}} .elementor-widget-searchform .elementor-widget-searchform-form button' => 'background: {{VALUE}} !important;'
                ]
            ]
        );
        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- <div class="elementor-widget-searchform clearfix" style="background-color: <?php // echo $settings['bg_color']; ?>;"> -->
        <div class="elementor-widget-searchform clearfix">
            <?php if ($settings['title'] != ""): ?>
                <span style="color: <?php echo $settings['titlecolor']; ?>"><?php echo $settings['title'] ?></span>
            <?php endif; ?>
            <form class="elementor-widget-searchform-form" action="<?php echo esc_url( home_url() ); ?>" method="get" >
                <input type="search"
                       placeholder="<?php echo $settings['placeholder']; ?>"
                       value="<?php echo get_search_query(); ?>" name="s"
                       title="<?php echo $settings['placeholder']; ?>"
                       spellcheck="false"
                       autocomplete="off"
                       id="searchinputelementor"
                       style="background: <?php echo $settings['input_bg_color']; ?>;"/>
                <?php if ($settings['buttontext'] != "") : ?>
                    <button type="submit" style="background: <?php echo $settings['button_bg_color']; ?>; color: <?php echo $settings['button_text_color']; ?>;"><?php echo $settings['buttontext']; ?></button>
                <?php endif; ?>
            </form>
        </div>
        <?php
    }

    protected function _content_template() {}

}
