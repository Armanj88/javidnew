<?php

global $post;
if ( isset($post->post_author) ) {
    $display_name = get_the_author_meta( 'display_name', $post->post_author );
    if ( empty( $display_name ) ) {
        $display_name = get_the_author_meta( 'nickname', $post->post_author );
    }
    $author_description = get_the_author_meta( 'user_description', $post->post_author );
    $author_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
    $author_avatar = get_avatar(get_the_author_meta('user_email'), 90);

    ?>
    <div class="post-author clearfix">
        <div class="author-img">
            <?php echo $author_avatar; ?>
        </div>
        <div class="author-details">
            <span class="author-name">
                <?php
                echo $display_name;
                ?>
            </span>
            <p class="author-description">
                <?php
                echo $author_description;
                ?>
            </p>
        </div>
    </div>
    <?php
}
