<?php
$the_query = new WP_Query(array('posts_per_page' => 1, 'post_type' => 'javidpart', 'offset' => get_theme_mod('select_custom_header')));

if ($the_query->have_posts()) {
    ?>
<!--    <nav class="header-nav clearfix">-->
        <?php
        while ($the_query->have_posts()): $the_query->the_post();
            the_content();
        endwhile;
        ?>
<!--    </nav>-->
    <?php
}
wp_reset_query();