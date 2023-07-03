
<?php
/**
 * Author Header Template Part.
 *
 * @package Javid
 */

$author_email = get_the_author_meta( 'user_email' );
$avatar       = get_avatar( $author_email, 240, '', '', [ 'class'   => 'rounded-circle', 'default' => '404' ] );

// author meta configure
$author_website = '';
$author_instagram = '';
$author_twitter = '';
$author_facebook = '';
$author_meta_count = 0;
if (get_the_author_meta('user_url')) {
    $author_website = get_the_author_meta('user_url');
    $author_meta_count += 1;
}
if (get_the_author_meta('instagram')) {
    $author_instagram = get_the_author_meta('instagram');
    $author_meta_count += 1;
}
if (get_the_author_meta('twitter')) {
    $author_twitter = get_the_author_meta('twitter');
    $author_meta_count += 1;
}
if (get_the_author_meta('facebook')) {
    $author_facebook = get_the_author_meta('facebook');
    $author_meta_count += 1;
}


?>
<header class="page-header row mb-5">
    <!--author-col-one-->
    <div class="author-col-one mb-3 col-lg-3 col-md-3 col-sm-12">
        <div id="author-avatar" class="author-avatar d-flex align-items-start">
            <?php
                echo wp_kses_post( $avatar );
            ?>
        </div><!-- #author-avatar -->
    </div>
    <!--author-col-two-->
    <div class="author-col-two text-left col-lg-9 col-md-9 col-sm-12 ml-0 pl-3" id="author-name">
        <?php
        if ( ! empty( get_the_author() ) ) {
            printf(
                '<h1 class="inline-block uppercase text-26px leading-30px mt-0 mb-3">%s</h1>',
                get_the_author()
            );
        }
        // If a user has filled out their description, show a bio on their entries.
        if ( get_the_author_meta( 'description' ) ) : ?>
            <div id="author-info">
                <div id="author-description">
                    <p class="text-left md:text-left"><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>
        <?php endif; ?>
        <!-- author meta icons -->
        <?php if ($author_meta_count > 0): ?>
            <div class="author-row-2 my-4">
                <?php if ($author_website !== ''): ?>
                    <i class="fa-solid fa-globe fa-2xl mx-2"></i>
                <?php endif; ?>
                <?php if ($author_instagram !== ''): ?>
                    <i class="fab fa-instagram fa-2xl mx-2"></i>
                <?php endif; ?>
                <?php if ($author_twitter !== ''): ?>
                    <i class="fa-brands fa-twitter fa-2xl mx-2"></i>
                <?php endif; ?>
                <?php if ($author_facebook !== ''): ?>
                    <i class="fa-brands fa-facebook-f fa-2xl mx-2"></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</header>