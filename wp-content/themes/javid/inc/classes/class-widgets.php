<?php
/**
 * Register custom widgets
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;
use JAVID\Inc\Widgets\lastpost;
use JAVID\Inc\Widgets\SocialMedias1;

class Widgets {
	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions.
		 */

		add_action( 'widgets_init', [$this, 'register_custom_widgets'] );
	}

	public function register_custom_widgets() {
		register_widget( new SocialMedias1() );
		register_widget( new lastpost() );
	}

}