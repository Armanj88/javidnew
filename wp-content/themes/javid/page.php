<?php
/**
 * Page template file
 *
 * @package Javid
 */

?>

<?php get_header(); ?>

<div id="primary">
    <main id="main"  class="site-main mt-5" role="main">
        <div class="container">
            <div class="<?php if (is_active_sidebar('posts-sidebar') && get_theme_mod('enable_pages_sidebar', false)): echo 'row'; endif; ?>">
                <div <?php if (is_active_sidebar('posts-sidebar') && get_theme_mod('enable_pages_sidebar', false)): ?> class="col-lg-8 col-md-8 col-sm-12" <?php endif; ?>>
                    <?php
                    if (have_posts()) {
                        ?>
                        <div class="post-wrap">
                            <?php
                            if (is_home() && ! is_front_page()) {
                                ?>
                                <header class="mb-5">
                                    <h1 class="page-title">
                                        <?php single_post_title(); ?>
                                    </h1>
                                </header>
                                <?php
                            }
                            while (have_posts()) : the_post();
                                get_template_part('template-parts/content');
                            endwhile;

                            ?>

                        </div>
                        <?php
                    }
                    else {
                        get_template_part('template-parts/content-none');
                    }
                    ?>
                </div>
                <?php if (is_active_sidebar('posts-sidebar') && get_theme_mod('enable_pages_sidebar', false)): ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php comments_template(); ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
