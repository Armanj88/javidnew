<?php
/**
 * Template for post entry header
 *
 * @package Javid
 */

$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
$hide_title = get_post_meta($the_post_id, '_hide_page_title', true);
$heading_class = ! empty($hide_title) && 'yes' === $hide_title ? 'hide' : '';

?>

<header class="entry-header">
    <?php
    // Featured image
    $thumbnail_dynamic_class = "";
    if (get_theme_mod('thumbnail_position', 2) == 0) {
        $thumbnail_dynamic_class = "fullwidth";
    } elseif (get_theme_mod('thumbnail_position', 2) == 1) {
        $thumbnail_dynamic_class = "position-right";
    } elseif (get_theme_mod('thumbnail_position', 2) == 2) {
        $thumbnail_dynamic_class = "position-left";
    }
    if ($has_post_thumbnail) {
        ?>
        <div class="entry-image mb-3 <?php echo $thumbnail_dynamic_class; ?>">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php
                $thumbnail_size = "medium-large";
                $thumbnail_max_width = "350px";
                if (is_singular()) {$thumbnail_size = "medium"; $thumbnail_max_width = "300px";}
                the_post_custom_thumbnail(
                    $the_post_id,
                    $thumbnail_size,
                    [
                        'sizes' => '(max-width: ' . $thumbnail_max_width .') 300px 170px',
                        'class' => 'attachment-featured-large size-featured-image'
                    ]
                );
                ?>
            </a>
        </div>
        <?php
    }
    // Title
    if (is_single() || is_page()) {
        printf(
            '<h1 class="page-title text-dark %1$s">%2$s</h1>',
            esc_attr( $heading_class ),
            wp_kses_post( get_the_title() )
        );
    } else {
        $dynamic_classes = "";
        if (get_theme_mod('archives_center_post_title', false)) $dynamic_classes = "text-center";
        printf(
            '<h2 class="entry-title mb-3 ' . $dynamic_classes . '"><a href="%1$s" class="text-dark">%2$s</a></h2>',
            esc_url( get_the_permalink() ),
            wp_kses_post( get_the_title() )
        );
    }
    ?>
</header>
