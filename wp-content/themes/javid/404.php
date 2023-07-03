<?php
/**
 * 404 Error Template
 *
 * @package Javid
 */

get_header();

?>

<div class="not-found-404">
    <div class="container grid-2">
        <?php get_template_part('template-parts/content-none'); ?>
        <div class="not-found-image">
            <img src="<?php echo JAVID_IMG_URI . '/404.svg'; ?>" alt="Nothing Found">
        </div>
    </div>
</div>

<?php get_footer(); ?>