<?php
/**
 * Custom Search Form for header.
 *
 * @package Javid
 */

$action_url = esc_url(home_url('/'));

//if (is_archive())
//{
//    $action_url = "";
//}

$search_form_placeholder = esc_attr_x('What are you looking for?', 'placeholder', 'javid');

?>
<span id="search-close">
    <i class="fa-solid fa-x"></i>
</span>
<form class="header-search-form" role="search" method="get" action="<?php echo $action_url; ?>">
	<span class="screen-reader-text">
		<?php echo _x('Search for:', 'label', 'javid') ?>
	</span>
    <input type="search" autocomplete="off" id="searchform-input-header"
           placeholder="<?php echo $search_form_placeholder ?>"
           value="<?php the_search_query(); ?>" name="s" aria-label="Search">
</form>