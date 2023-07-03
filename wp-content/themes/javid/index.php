<?php
/**
 * Main template file
 *
 * @package Javid
 */

$no_of_columns = 3;

?>

<?php get_header(); ?>

    <div id="primary">
        <main id="main" class="site-main mt-5" role="main">
            <div class="container">
                <?php
                if (have_posts()) {
                    ?>
                    <?php
                    if (is_home() && !is_front_page()) {
                        ?>
                        <header class="mb-5">
                            <h1 class="page-title">
                                <?php single_post_title(); ?>
                            </h1>
                        </header>
                        <?php
                    }
                    ?>
                    <div class="grid-<?php echo $no_of_columns; ?>">
                        <?php
                        // start the loop
                        while (have_posts()) : the_post();
                            ?>
                            <div class="box-shadow border-box padding-box archive-article">
                                <?php
                                get_template_part('template-parts/content');
                                ?>
                            </div>
                        <?php
                        endwhile;
                        // end the loop
                        ?>
                    </div>
                    <?php
                } else {
                    get_template_part('template-parts/content-none');
                }
                ?>
            </div>

            <?php javid_pagination(); ?>
        </main>
    </div>

<?php get_footer(); ?>