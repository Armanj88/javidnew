<?php
/**
 * Content template
 *
 * @package Javid
 */


$container_classes = !empty( $args['container_classes'] ) ? $args['container_classes'] : 'mb-2';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $container_classes ); ?>>
    <?php
    get_template_part('template-parts/components/blog/entry-header');

    if ((is_archive() && get_theme_mod('archives_enable_post_meta', true)) ||
        (is_home() && get_theme_mod('archives_enable_post_meta', true))||
        (is_singular() && get_theme_mod('show_post_meta', true))) {
        get_template_part('template-parts/components/blog/entry-meta');
    }

    get_template_part('template-parts/components/blog/entry-content');

    if (get_theme_mod('archives_enable_categories', false)) {
        get_template_part('template-parts/components/blog/entry-footer');
    }
    ?>
</article>