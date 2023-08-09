<?php

namespace JAVID\Inc\Widgets;

class SocialMedias1 extends \WP_Widget {
	public function __construct() {
		parent::__construct(
			'javid-social-medias-1',  // Base ID
			esc_html__('javid: social media 1', 'javid')   // Name
		);
	}

	public function widget( $args, $instance ) {
		echo wp_kses_post($args['before_widget']);
        ?>
        <div class="jsocial-media-widget1">
        <?php
        if (! empty ($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>
		<?php if ($instance['aparat'] != null) : ?>
            <a href="<?php echo $instance['aparat']; ?>" class="jsocial-aparat jsocial-link" target="_blank">
                <div class="jsocial-aparat"></div>
            </a>
		<?php endif; ?>
        <!-- <?php // if ($instance['email'] != null) : ?>
                <a href="mailto:<?php // echo $instance['email']; ?>" class="jsocial-email jsocial-link" target="_blank">
                    <div class="jsocial-email">
                        <i class=""></i>
                    </div>
                </a>
            <?php // endif; ?> -->
		<?php if ($instance['instagram'] != null) : ?>
            <a href="<?php echo $instance['instagram']; ?>" class="jsocial-instagram jsocial-link" target="_blank">
                <div class="jsocial-instagram">
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </a>
		<?php endif; ?>
		<?php if ($instance['telegram'] != null) : ?>
            <a href="<?php echo $instance['telegram']; ?>" class="jsocial-telegram jsocial-link" target="_blank">
                <div class="jsocial-telegram">
                    <i class="fa-brands fa-telegram"></i>
                </div>
            </a>
		<?php endif; ?>
		<?php if ($instance['youtube'] != null) : ?>
            <a href="<?php echo $instance['youtube']; ?>" class="jsocial-youtube jsocial-link" target="_blank">
                <div class="jsocial-youtube">
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </a>
		<?php endif; ?>
		<?php if ($instance['twitter'] != null) : ?>
            <a href="<?php echo $instance['twitter']; ?>" class="jsocial-twitter jsocial-link" target="_blank">
                <div class="jsocial-twitter">
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </a>
		<?php endif; ?>
		<?php if ($instance['facebook'] != null) : ?>
            <a href="<?php echo $instance['facebook']; ?>" class="jsocial-facebook jsocial-link" target="_blank">
                <div class="jsocial-facebook">
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </a>
		<?php endif; ?>
		<?php if ($instance['linkedin'] != null) : ?>
            <a href="<?php echo $instance['linkedin']; ?>" class="jsocial-linkedin jsocial-link" target="_blank">
                <div class="jsocial-linkedin">
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </a>
		<?php endif; ?>
		<?php if ($instance['whatsapp'] != null) : ?>
            <a href="tel:<?php echo $instance['whatsapp']; ?>" class="jsocial-whatsapp jsocial-link" target="_blank">
                <div class="jsocial-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
            </a>
		<?php endif; ?>
        </div>
        <?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$aparat = ! empty( $instance['aparat'] ) ? $instance['aparat'] : '';
		$instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
		$telegram = ! empty( $instance['telegram'] ) ? $instance['telegram'] : '';
		$youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
		$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
		$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
		$linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
		$whatsapp = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';
		?>
        <p>
            <label><?php _e('Title ', 'javid'); ?></label>
            <input type="text" placeholder="<?php _e('Widget title', 'javid'); ?>" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label><?php _e('Aparat ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('aparat'); ?>" name="<?php echo $this->get_field_name('aparat'); ?>" value="<?php echo $aparat; ?>" />
        </p>
        <p>
            <label><?php _e('Instagram ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instagram; ?>" />
        </p>
        <p>
            <label><?php _e('Telegram ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('telegram'); ?>" name="<?php echo $this->get_field_name('telegram'); ?>" value="<?php echo $telegram; ?>" />
        </p>
        <p>
            <label><?php _e('Youtube ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $youtube; ?>" />
        </p>
        <p>
            <label><?php _e('Twitter ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" />
        </p>
        <p>
            <label><?php _e('Facebook ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" />
        </p>
        <p>
            <label><?php _e('linkedin ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" />
        </p>
        <p>
            <label><?php _e('Whatsapp ', 'javid'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('whatsapp'); ?>" name="<?php echo $this->get_field_name('whatsapp'); ?>" value="<?php echo $whatsapp; ?>" />
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['aparat'] = ( ! empty( $new_instance['aparat'] ) ) ? strip_tags( $new_instance['aparat'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['telegram'] = ( ! empty( $new_instance['telegram'] ) ) ? strip_tags( $new_instance['telegram'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		$instance['whatsapp'] = ( ! empty( $new_instance['whatsapp'] ) ) ? strip_tags( $new_instance['whatsapp'] ) : '';
		return $instance;
	}
}
