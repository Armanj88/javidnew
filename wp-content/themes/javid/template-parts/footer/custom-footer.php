<?php
$the_query = new WP_Query(array('posts_per_page' => 1, 'post_type' => 'javidpart', 'offset' => get_theme_mod('select_custom_footer')));

if ($the_query->have_posts()) {
    while ($the_query->have_posts()): $the_query->the_post();
        the_content();
    endwhile;
}
wp_reset_query();