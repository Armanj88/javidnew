<?php
/**
 * Custom Search Form.
 *
 * @package AdvancedTheme
 */

$action_url = esc_url(home_url('/'));

//if (is_archive())
//{
//    $action_url = "";
//}

?>
<form class="form-inline my-2 my-lg-0" role="search" method="get" action="<?php echo $action_url; ?>">
	<span class="screen-reader-text">
		<?php echo _x('Search for:', 'label', 'javid') ?>
	</span>
    <input class="form-control mr-sm-2" type="search"
           autocomplete="off"
           placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'javid') ?>"
           value="<?php the_search_query(); ?>" name="s" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
        <?php echo esc_attr_x('Search', 'submit button', 'javid'); ?>
    </button>
</form>