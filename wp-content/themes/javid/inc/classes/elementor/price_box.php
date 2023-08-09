<?php
namespace JAVID\Inc\Elementor;

class Javid_Elementor_Price_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'javid_price_box';
    }

    public function get_title() {
        return esc_html__('Price Box', 'javid');
    }

    public function get_icon() {
        return 'eicon-price-table';
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
            'buttontext',
            [
                'label' => __( 'Button Text', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the button text...', 'javid' ),
                'default' => __('Buy', 'javid'),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'javid' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'javid' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the Price...', 'javid' ),
                'default' => __('22000', 'javid'),
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __( 'Currency', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the Currency...', 'javid' ),
                'default' => __('Rial', 'javid'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'price_item',
            [
                'label' => esc_html__( 'Item', 'javid' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Price Item', 'javid' ),
                'default' => esc_html__( 'Price Item', 'javid' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'list_items',
            [
                'label' => esc_html__( 'List Items', 'javid' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'price_item' => esc_html__( 'Item 1', 'javid' ),
                    ],
                ],
                'title_field' => '{{{ price_item }}}',
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
            'bg_color',
            [
                'label' => __( 'Background Color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selector' => [
                    '{{WRAPPER}} .price-box' => 'background: {{VALUE}} !important;',
                ]
            ]
        );
        $this->add_control(
            'primary_bg_color',
            [
                'label' => __( 'Primary Background Color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fec901',
                'selector' => [
                    '{{WRAPPER}} .price-line' => 'background: {{VALUE}} !important;',
                    '{{WRAPPER}} .btn-wrapper' => 'background: {{VALUE}} !important;',
                    '{{WRAPPER}} .price-items ul li::before' => 'background: {{VALUE}} !important;',
                ]
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#37555f',
                'selector' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#37555f',
                'selector' => [
                    '{{WRAPPER}} .price-line value' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'currency_color',
            [
                'label' => __( 'Currency text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#37555f',
                'selector' => [
                    '{{WRAPPER}} .price-line currency' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1a2f34',
                'selector' => [
                    '{{WRAPPER}} .btn-wrapper' => 'color: {{VALUE}};',
                ]
            ]
        );
        $this->add_control(
            'items_color',
            [
                'label' => __( 'Items text color', 'javid' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selector' => [
                    '{{WRAPPER}} .price-items ul li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .price-items ul li *' => 'color: {{VALUE}};',
                ]
            ]
        );
        // $this->add_group_control(
        // 	\Elementor\Group_Control_Typography::get_type(),
        // 	[
        // 		'name' => 'title_typography',
        //         'label' => esc_html__('Title Typography', 'javid'),
        // 		'selector' => '{{WRAPPER}} .title',
        // 	]
        // );
        // $this->add_group_control(
        // 	\Elementor\Group_Control_Typography::get_type(),
        // 	[
        // 		'name' => 'description_typography',
        //         'label' => esc_html__('Description Typography', 'javid'),
        // 		'selector' => '{{WRAPPER}} .description',
        // 	]
        // );
        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        // $this->add_render_attribute( 'list', 'class', 'javid' );

        ?>
        <div class="price-box javid-elementor-widget" style="background: <?php echo $settings['bg_color']; ?>">
            <span class="title align-center" style="color: <?php echo $settings['title_color']; ?>;"><?php echo $settings['title']; ?></span>
            <div class="price-line" style="background: <?php echo $settings['primary_bg_color']; ?>;">
                <span class="value" style="color: <?php echo $settings['price_color']; ?>;"><?php echo $settings['price']; ?></span>
                <span class="currency" style="color: <?php echo $settings['currency_color']; ?>;"><?php echo $settings['currency']; ?></span>
            </div>
            <div class="price-items">
                <ul>
                    <style>
                        .price-box .price-items ul li::before {
                            background: <?php echo $settings['primary_bg_color']; ?>;
                        }
                    </style>
                    <?php
                    foreach ( $settings['list_items'] as $index => $item ) { ?>
                        <?php
                        $repeater_setting_key = $this->get_repeater_setting_key( 'price_item', 'list_items', $index );
                        $this->add_render_attribute( $repeater_setting_key, 'class', 'price-box-item' );
                        $this->add_inline_editing_attributes( $repeater_setting_key );
                        ?>
                        <li <?php $this->print_render_attribute_string( $repeater_setting_key ); ?>>
                        <span style="color: <?php echo $settings['items_color']; ?>">
                        <?php
                        $title = $settings['list_items'][$index]['price_item'];
                        echo $title;
                        ?>
                        </span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            if ( ! empty( $settings['button_link']['url'] ) ) {
                $this->add_link_attributes( 'button_link', $settings['button_link'] );
            }
            ?>
            <a <?php echo $this->get_render_attribute_string('button_link'); ?> class="btn-wrapper" style="background: <?php echo $settings['primary_bg_color']; ?>; color: <?php echo $settings['button_color']; ?>;">
                <?php echo $settings['buttontext']; ?>
            </a>
        </div>
        <?php
    }

    protected function _content_template() {}

}
