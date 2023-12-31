<?php
/**
 * Template for entry content
 *
 * To be used inside WordPress The Loop
 *
 * @package Javid
 */

$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);

?>

<div class="entry-content <?php if ($has_post_thumbnail): echo 'split-view'; endif; ?>">
    <?php
    if (is_singular()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading %s <span class="meta-nav">&rAarr;</span>', 'javid'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">', '</span>', false)
            )
        );
        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'javid' ),
                'after' => '</div>',
            ]
        );
    } else {
        if (get_theme_mod('archives_enable_excerpt', true)) {
            javid_the_excerpt(200);
        }

        if (get_theme_mod('archives_enable_read_more', true)) {
            echo javid_excerpt_more();
        }
    }

    ?>
</div>

