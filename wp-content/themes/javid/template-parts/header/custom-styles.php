<style>
    :root {
        --dir: <?php if (is_rtl()): echo 'right'; else: echo 'left'; endif; ?>;
        --opposite-dir: <?php if (is_rtl()): echo 'left'; else: echo 'right'; endif; ?>;
        --flex-direction: <?php if (is_rtl()): echo 'row'; else: echo 'row-reverse'; endif; ?>;
        --flex-direction-opposite: <?php if (is_rtl()): echo 'row-reverse'; else: echo 'row'; endif; ?>;
        --primary-color: <?php echo esc_attr(get_theme_mod('primary_color', '#62D59C')); ?> !important;
        --secondary-color: <?php echo esc_attr(get_theme_mod('secondary_color', '#00C52E')); ?> !important;
        --border-radius: <?php echo esc_attr(get_theme_mod('border_radius', 7)) . 'px'; ?> !important;
        <?php if (!get_theme_mod('enable_box_shadow', true)): ?>
        --box-shadow: none;
        <?php endif; ?>
        --header-background-color: <?php echo esc_attr(get_theme_mod('header_background_color', '#ffffff')); ?>;
        --footer-background-color: <?php echo esc_attr(get_theme_mod('footer_background_color', "#ffffff")); ?>;

        <?php if (get_theme_mod('footer_background_image', 'none') &&
        get_theme_mod('footer_background_image', 'none') !== 'none' &&
        get_theme_mod('footer_background_image', 'none') !== ""): ?>
        --footer-background-image: url(<?php echo esc_url(get_theme_mod('footer_background_image', 'none')); ?>);
        <?php endif; ?>

        --footer-background-repeat: <?php echo esc_attr(get_theme_mod('footer_background_repeat', 'repeat')); ?>;
        --footer-background-size: <?php echo esc_attr(get_theme_mod('footer_background_size', 'auto')); ?>;
        --footer-top-border-width: <?php echo esc_attr(get_theme_mod('footer_top_border_width', 2)); ?>px;
        --footer-top-border-color: <?php echo esc_attr(get_theme_mod('footer_top_border_color', '#000000')); ?>;
    }
</style>