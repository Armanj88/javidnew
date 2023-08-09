<?php
/**
 * Author Archive Page template file.
 *
 * @package Javid
 */

get_header();
$author = get_queried_object();

$no_of_columns = get_theme_mod('archives_columns_number', 3);

?>
    <div id="primary">
        <main id="main" class="site-main my-5" role="main">
            <div class="container">
                <?php get_template_part('template-parts/author/header'); ?>
                <div class="site-content">
                    <?php

                    if (!empty(get_the_author())) {
                        printf(
                            '<h3 class="font-size-xl h3 pb-4">%1$s %2$s</h3>',
                            __('Articles written by ', 'javid'),
                            get_the_author()
                        );
                    }
                    ?>
                    <div class="row">
                        <?php
                        if (have_posts()) :
                            ?>

                            <div class="grid-<?php echo $no_of_columns; ?>">
                                <?php
                                while (have_posts()) : the_post();
                                    // get_template_part( 'template-parts/content', '', [ 'container_classes' => 'col-lg-4 col-md-6 col-sm-12 pb-4' ] );
                                    ?>
                                    <div class="box-shadow border-box padding-box archive-article mb-5">
                                        <?php
                                        get_template_part('template-parts/content');
                                        ?>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        <?php
                        else :
                            get_template_part('template-parts/content-none');
                        endif;
                        ?>
                    </div>
                    <div>
                        <?php javid_pagination(); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php

get_footer();
