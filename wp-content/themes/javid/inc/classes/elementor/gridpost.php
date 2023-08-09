<?php

namespace JAVID\Inc\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class Javid_Elementor_Grid_Post_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'javid_grid_post';
    }

    public function get_title()
    {
        return esc_html__('Grid Post', 'javid');
    }

    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['javid'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'javid'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'javid'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'javid'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'javid'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Description', 'javid'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __('Button Link', 'javid'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'javid'),
            ]
        );
        $this->add_control(
            'buttontext',
            [
                'label' => __('Button Text', 'javid'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'javid'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'javid'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'buttonbg',
            [
                'label' => __('Button Background Color', 'javid'),
                'type' => Controls_Manager::COLOR,
                'default' => get_theme_mod('primary_color'),
            ]
        );
        $this->add_control(
            'buttontextcolor',
            [
                'label' => __('Button Text Color', 'javid'),
                'type' => Controls_Manager::COLOR,
                'default' => "#fff",
            ]
        );
        $this->add_control(
            'titletextcolor',
            [
                'label' => __('Title Text Color', 'javid'),
                'type' => Controls_Manager::COLOR,
                'default' => "#181522",
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="grid-post javid-elementor-widget">
            <div class="container-post">
                <?php if ($settings['title'] != ""): ?>
                    <div class="grid-2">
                        <div class="first">
                            <span class="grid-post-title"
                                  style="color: <?php echo $settings['titletextcolor']; ?> !important;">
                                <?php echo $settings['title']; ?>
                            </span>
                            <p class="grid-post-description">
                                <?php echo $settings['description']; ?>
                            </p>
                        </div>
                        <div class="second">
                            <button class="grid-post-button"
                                    style="background: <?php echo $settings['buttonbg']; ?> !important;">
                                <a href="<?php echo $settings['link']; ?>"
                                   style="color: <?php echo $settings['buttontextcolor']; ?> !important;">
                                    <?php echo $settings['buttontext']; ?>
                                </a>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="grid-3">
                    <?php $the_query = new \WP_Query(array('posts_per_page' => 3)); ?>
                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <article class="post-result-archive box-shadow border-box">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="archive-post-thumbnail">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php
                                                the_post_custom_thumbnail(
                                                    get_the_ID(),
                                                    'gridpost-thumbnail',
                                                    [
                                                        'sizes' => '(max-width: 330px) 330px 185px',
                                                        'class' => 'attachment-featured-large size-featured-image',
                                                        'loading' => 'eager'
                                                    ],
                                                    false
                                                );
                                            ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="archive-post-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <h3 class="post-title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php __('No posts found', 'javid'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template()
    {
    }

}
