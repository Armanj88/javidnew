<?php
/**
 * Footer Template
 */
?>

</div>

<?php if (get_theme_mod('enable_custom_footer', false)): ?>
    <?php get_template_part('template-parts/footer/custom-footer'); ?>
<?php else: ?>

<footer id="master-footer" class="site-footer">
    <div class="container">
        <?php
        get_template_part('template-parts/footer/widgets');

        if (get_theme_mod('enable_footer_menu')) {
            get_template_part('template-parts/footer/footer-menu');
        }

        get_template_part('template-parts/footer/copyright');

        ?>
    </div>
</footer>
<?php endif; ?>

</div>
<?php
wp_footer();
?>
</body>
</html>

