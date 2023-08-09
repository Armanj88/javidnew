<?php

namespace JAVID\Inc\Widgets;

use WP_Query;
use WP_Widget;

class lastpost extends WP_Widget {
	public function __construct() {
		parent::__construct(
// widget ID
			'javid_last_post',
// widget name
			esc_html__( 'Javid: Last Posts with Thumbnail', 'javid' ),
		);
	}

	public function widget( $args, $instance ) {
		$title       = apply_filters( 'widget_title', $instance['title'] );
		$button_link = $instance['button_link'];
		$cat         = $instance['cat'];
		echo $args['before_widget'];
//if title is present
		?>
        <div class="javid-lastpost">
		<?php
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		?>
		<?php
// the query
		$the_query = new WP_Query( array( 'posts_per_page' => 3, 'cat' => $cat ) ); ?>

		<?php if ( $the_query->have_posts() ): ?>

			<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                <div class="post clearfix">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        the_post_custom_thumbnail(
                            get_the_ID(),
                            'lastpost-thumbnail',
	                        [
		                        'sizes' => '(max-width: 200px) 200px, 200px',
		                        'class' => 'attachment-featured-large size-featured-image'
	                        ]
                        );
                        ?>
                    </a>
                    <a href="<?php the_permalink(); ?>"><span class="post-title"><?php the_title(); ?></span></a>
                </div>
			<?php endwhile; ?>

            <a href="<?php echo $button_link; ?>" class="all btn bg-color-primary"><?php esc_html_e( 'All posts', 'javid' ) ?></a>

			<?php wp_reset_postdata(); ?>

		<?php else: ?>
<!--            <p class="nopost-available">--><?php //esc_html_e( 'Nothing Found', 'javid' ); ?><!--</p>-->
            <?php get_template_part('template-parts/content-none'); ?>
		<?php endif; ?>
        </div>
		<?php

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = esc_html__( 'last posts', 'javid' );
		}
		if ( isset( $instance['button_link'] ) ) {
			$button_link = $instance['button_link'];
		} else {
			$button_link = '#';
		}
		if ( isset( $instance['cat'] ) ) {
			$cat = $instance['cat'];
		} else {
			$cat = 1;
		}

		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'javid' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php esc_html_e('Button link', 'javid'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text"
                   value="<?php echo esc_attr( $button_link ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php esc_html_e('Category ID', 'javid'); ?></label>
            <input class="widefat" type="number" id="<?php echo $this->get_field_id( 'cat' ); ?>"
                   name="<?php echo $this->get_field_name( 'cat' ); ?>" value="<?php echo esc_attr( $cat ); ?>"/>
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['title']       = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['button_link'] = ( ! empty( $new_instance['button_link'] ) ) ? strip_tags( $new_instance['button_link'] ) : '';
		$instance['cat']         = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';

		return $instance;
	}
}
