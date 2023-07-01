<?php

function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
	$custom_thumbnail = '';
	if ( null == $post_id ) {
		$post_id = get_the_ID();
	}

	if (has_post_thumbnail($post_id)) {
		$default_attributes = [
			'loading' => 'lazy'
		];

		$attributes = array_merge($additional_attributes, $default_attributes);

		$custom_thumbnail = wp_get_attachment_image(
			get_post_thumbnail_id( $post_id ),
			$size,
			false,
			$attributes
		);
	}
	return $custom_thumbnail;
}

function the_post_custom_thumbnail ( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
	echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function javid_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	// Post is modified
//	print_r(get_the_ID() . '<br>' . get_the_time('Y-m-d\TH:iP') . '<br>' . get_the_modified_time('Y-m-d\TH:iP'));
	if (get_the_time( 'U' ) !== get_the_modified_time( 'U' )) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr(get_the_date( DATE_W3C )),
		esc_attr(get_the_date()),
		esc_attr(get_the_modified_date(DATE_W3C)),
		esc_attr(get_the_modified_date())
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'javid' ),
		'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

function javid_posted_by() {
	$byline = sprintf(
		esc_html_x( ' by %s', 'post author', 'javid' ),
		'<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
	);
	echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function javid_the_excerpt($trim_character_count = 0) {
	if (! has_excerpt() || 0 == $trim_character_count) {
		the_excerpt();
		return;
	}
	$excerpt = wp_strip_all_tags(get_the_excerpt());
	$excerpt = substr($excerpt, 0, $trim_character_count);
	$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

	echo $excerpt . '[...]';
}

function javid_excerpt_more ( $more = '' ) {
	if ( ! is_single() ) {
		$more = sprintf( '<a href="%1$s" class="javid-read-more text-white"><button class="mt-4 btn btn-info d-block">%2$s</button></a>',
			get_permalink(get_the_ID()),
			__( 'Read more', 'javid' )
		);
	}
	return $more;
}

function javid_pagination() {
	$args = [
		'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
		'after_page_number' => '</span>'
	];
	$allowed_tags =  [
		'span' => [
			'class' => []
		],
		'a' => [
			'class' => [],
			'href' => [],
		]
	];
	printf( '<nav class="javid-pagination clearfix">%s</nav>', wp_kses( paginate_links( $args ), $allowed_tags ) );
}

