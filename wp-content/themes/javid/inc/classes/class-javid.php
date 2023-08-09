<?php
/**
 * The theme class
 *
 * @package Javid
 */

namespace JAVID\Inc;

use JAVID\Inc\Traits\Singleton;

use JAVID\Inc\Elementor\Javid_Elementor_Box_Icon_2_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Box_Icon_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Grid_Post_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Header_Menu_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Header_Search_Form_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_List_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Search_Button_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Login_Button_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Search_Form_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Services_Box_2_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Services_Box_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Services_Box_3_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Sidebar_Widget;
use JAVID\Inc\Elementor\Javid_Elementor_Price_Box_Widget;
use Javid_Elementor_Box_Icon_3_Widget;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use WP_Query;
use WP_Widget;

class SocialMedias1 extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'javid-social-medias-1',  // Base ID
			esc_html__( 'javid: social media 1', 'javid' )   // Name
		);
	}

	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		?>
        <div class="jsocial-media-widget1">
			<?php
			if ( ! empty ( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
			?>
			<?php if ( $instance['aparat'] != null ) : ?>
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
			<?php if ( $instance['instagram'] != null ) : ?>
                <a href="<?php echo $instance['instagram']; ?>" class="jsocial-instagram jsocial-link" target="_blank">
                    <div class="jsocial-instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
			<?php endif; ?>
			<?php if ( $instance['telegram'] != null ) : ?>
                <a href="<?php echo $instance['telegram']; ?>" class="jsocial-telegram jsocial-link" target="_blank">
                    <div class="jsocial-telegram">
                        <i class="fa-brands fa-telegram"></i>
                    </div>
                </a>
			<?php endif; ?>
			<?php if ( $instance['youtube'] != null ) : ?>
                <a href="<?php echo $instance['youtube']; ?>" class="jsocial-youtube jsocial-link" target="_blank">
                    <div class="jsocial-youtube">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </a>
			<?php endif; ?>
			<?php if ( $instance['twitter'] != null ) : ?>
                <a href="<?php echo $instance['twitter']; ?>" class="jsocial-twitter jsocial-link" target="_blank">
                    <div class="jsocial-twitter">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                </a>
			<?php endif; ?>
			<?php if ( $instance['facebook'] != null ) : ?>
                <a href="<?php echo $instance['facebook']; ?>" class="jsocial-facebook jsocial-link" target="_blank">
                    <div class="jsocial-facebook">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                </a>
			<?php endif; ?>
			<?php if ( $instance['linkedin'] != null ) : ?>
                <a href="<?php echo $instance['linkedin']; ?>" class="jsocial-linkedin jsocial-link" target="_blank">
                    <div class="jsocial-linkedin">
                        <i class="fa-brands fa-linkedin"></i>
                    </div>
                </a>
			<?php endif; ?>
			<?php if ( $instance['whatsapp'] != null ) : ?>
                <a href="tel:<?php echo $instance['whatsapp']; ?>" class="jsocial-whatsapp jsocial-link"
                   target="_blank">
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
		$title     = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$aparat    = ! empty( $instance['aparat'] ) ? $instance['aparat'] : '';
		$instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
		$telegram  = ! empty( $instance['telegram'] ) ? $instance['telegram'] : '';
		$youtube   = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
		$twitter   = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
		$facebook  = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
		$linkedin  = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
		$whatsapp  = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';
		?>
        <p>
            <label><?php _e( 'Title ', 'javid' ); ?></label>
            <input type="text" placeholder="<?php _e( 'Widget title', 'javid' ); ?>"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Aparat ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'aparat' ); ?>"
                   name="<?php echo $this->get_field_name( 'aparat' ); ?>" value="<?php echo $aparat; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Instagram ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>"
                   name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instagram; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Telegram ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'telegram' ); ?>"
                   name="<?php echo $this->get_field_name( 'telegram' ); ?>" value="<?php echo $telegram; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Youtube ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>"
                   name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $youtube; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Twitter ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>"
                   name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $twitter; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Facebook ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>"
                   name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $facebook; ?>"/>
        </p>
        <p>
            <label><?php _e( 'linkedin ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>"
                   name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $linkedin; ?>"/>
        </p>
        <p>
            <label><?php _e( 'Whatsapp ', 'javid' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'whatsapp' ); ?>"
                   name="<?php echo $this->get_field_name( 'whatsapp' ); ?>" value="<?php echo $whatsapp; ?>"/>
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['aparat']    = ( ! empty( $new_instance['aparat'] ) ) ? strip_tags( $new_instance['aparat'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['telegram']  = ( ! empty( $new_instance['telegram'] ) ) ? strip_tags( $new_instance['telegram'] ) : '';
		$instance['youtube']   = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		$instance['whatsapp']  = ( ! empty( $new_instance['whatsapp'] ) ) ? strip_tags( $new_instance['whatsapp'] ) : '';

		return $instance;
	}
}


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

                <a href="<?php echo $button_link; ?>"
                   class="all btn bg-color-primary"><?php esc_html_e( 'All posts', 'javid' ) ?></a>

				<?php wp_reset_postdata(); ?>

			<?php else: ?>
                <!--            <p class="nopost-available">--><?php //esc_html_e( 'Nothing Found', 'javid' ); ?><!--</p>-->
				<?php get_template_part( 'template-parts/content-none' ); ?>
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
            <label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php esc_html_e( 'Button link', 'javid' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text"
                   value="<?php echo esc_attr( $button_link ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php esc_html_e( 'Category ID', 'javid' ); ?></label>
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


class JAVID {
	use Singleton;

	protected function __construct() {
		// load class
//      Assets::get_instance();
//      Menus::get_instance();
//      Sidebars::get_instance();
//      CustomizerAPI::get_instance();
//      PostTypes::get_instance();
//      Elementor::get_instance();
//		TaxDescriptionTinyMCE::get_instance();
//		Widgets::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions.
		 */
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
		add_action( 'admin_head', [ $this, 'wp_admin_styles' ] );

		// Assets
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );

		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_styles' ] );
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'register_scripts' ] );

		add_action( 'customize_controls_enqueue_scripts', [ $this, 'register_customizer_styles' ] );

		// Menus
		add_action( 'init', [ $this, 'register_menus' ] );

		// Sidebars
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );

		// Customizer
		add_action( 'customize_register', [ $this, 'javid_customizer_register_logostyle' ] );
		add_action( 'customize_register', [ $this, 'javid_customizer_register_header' ] );
		add_action( 'customize_register', [ $this, 'javid_customizer_register_footer' ] );
		add_action( 'customize_register', [ $this, 'javid_customizer_register_archives' ] );
		add_action( 'customize_register', [ $this, 'javid_customizer_register_posts' ] );

		// Post Types
		add_action( 'init', [ $this, 'javid_create_part_cpt' ], 0 );

		// Elementor
		add_action( 'elementor/elements/categories_registered', [
			$this,
			'javid_add_elementor_widgets_category_header'
		] );
		add_action( 'elementor/elements/categories_registered', [
			$this,
			'javid_add_elementor_widgets_category_javid'
		] );

		add_action( 'elementor/widgets/register', [ $this, 'javid_register_elementor_widgets_header' ] );
		add_action( 'elementor/widgets/register', [ $this, 'javid_register_elementor_widgets' ] );

		// Tax Description TinyMCE
		add_filter( 'edit_category_form_fields', [ $this, 'edit_cat_description' ] );
		add_action( 'admin_print_styles', [ $this, 'category_tinymce_css' ] );
		add_action( 'category_add_form_fields', [ $this, 'add_cat_description' ] );
		add_action( 'admin_head', [ $this, 'taxonomy_tinycme_hide_description' ] );

		// Widgets
		add_action( 'widgets_init', [ $this, 'register_custom_widgets' ] );

		/**
		 * Filters.
		 */
		add_filter( 'user_contactmethods', [ $this, 'wpb_new_contact_methods' ], 10, 1 );
		add_filter('script_loader_tag', [$this, 'shapeSpace_script_loader_tag'], 10, 3);
	}

	public function register_custom_widgets() {
		register_widget( new SocialMedias1() );
		register_widget( new lastpost() );
	}

	function edit_cat_description( $category ) {
		$tag_extra_fields = get_option( 'description' ); ?>
        <table class="form-table">
            <tr class="form-field">
                <th scope="row" valign="top"><label
                            for="description"><?php _ex( 'Description', 'Taxonomy Description', 'javid' ); ?></label>
                </th>
                <td>
					<?php $settings = array(
						'wpautop'       => true,
						'media_buttons' => true,
						'quicktags'     => true,
						'textarea_rows' => '15',
						'textarea_name' => 'description'
					);
					wp_editor( html_entity_decode( $category->description, ENT_QUOTES, 'UTF-8' ), 'description1', $settings ); ?>
                    <br/>
                    <span class="description"><?php _e( 'The description is not prominent by default, however some themes may show it.', 'javid' ); ?></span>
                </td>
            </tr>
        </table>
		<?php
	}

	function category_tinymce_css() { ?>
        <style type="text/css">
            .quicktags-toolbar input {
                float: left !important;
                width: auto !important;
            }
        </style>
		<?php
	}

	function add_cat_description( $tag ) {
		$tag_extra_fields = get_option( 'description' ); ?>
        <table class="form-table">
            <tr class="form-field">
                <th scope="row" valign="top"><label
                            for="description"><?php _ex( 'Description', 'Taxonomy Description', 'javid' ); ?></label>
                </th>
            </tr>
            <tr class="form-field">
                <td>
					<?php $settings = array(
						'wpautop'       => true,
						'media_buttons' => true,
						'quicktags'     => true,
						'textarea_rows' => '15',
						'textarea_name' => 'description'
					);
					wp_editor( html_entity_decode( $tag->description, ENT_QUOTES, 'UTF-8' ), 'description1', $settings ); ?>
                    <br/>
                    <span class="description"><?php _e( 'The description is not prominent by default, however some themes may show it.', 'javid' ); ?></span>
                </td>
            </tr>
        </table>
		<?php
	}

	function taxonomy_tinycme_hide_description() {
		global $pagenow;
		//echo $pagenow;exit;

		//only hide on detail not yet on the overview page.
		if ( ( $pagenow == 'edit-tags.php' || isset( $_GET['action'] ) ) ) : ?>
            <script type="text/javascript">
                jQuery(function ($) {
                    $('#description, textarea#tag-description').closest('.form-field').hide();
                });
            </script><?php endif;
	}

	function javid_add_elementor_widgets_category_header( $elements_manager ) {

		$elements_manager->add_category(
			'javid_header',
			[
				'title' => esc_html__( 'Javid Header', 'javid' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}

	function javid_add_elementor_widgets_category_javid( $elements_manager ) {

		$elements_manager->add_category(
			'javid',
			[
				'title' => esc_html__( 'Javid', 'javid' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}

	function javid_register_elementor_widgets_header( $widgets_manager ) {
		require_once( 'elementor/header/header-menu.php' );
		$widgets_manager->register( new Javid_Elementor_Header_Menu_Widget() );

		require_once( 'elementor/header/search-icon.php' );
		$widgets_manager->register( new Javid_Elementor_Search_Button_Widget() );

		require_once( 'elementor/header/login-icon.php' );
		$widgets_manager->register( new Javid_Elementor_Login_Button_Widget() );

		require_once( 'elementor/header/searchform.php' );
		$widgets_manager->register( new Javid_Elementor_Header_Search_Form_Widget() );
	}

	function javid_register_elementor_widgets( $widgets_manager ) {
		require_once( 'elementor/searchform.php' );
		$widgets_manager->register( new Javid_Elementor_Search_Form_Widget() );

		require_once( 'elementor/sidebar.php' );
		$widgets_manager->register( new Javid_Elementor_Sidebar_Widget() );

		require_once( 'elementor/boxicon.php' );
		$widgets_manager->register( new Javid_Elementor_Box_Icon_Widget() );

		require_once( 'elementor/boxicon2.php' );
		$widgets_manager->register( new Javid_Elementor_Box_Icon_2_Widget() );

		require_once( 'elementor/boxicon3.php' );
		$widgets_manager->register( new Javid_Elementor_Box_Icon_3_Widget() );

		require_once( 'elementor/price_box.php' );
		$widgets_manager->register( new Javid_Elementor_Price_Box_Widget() );

		require_once( 'elementor/gridpost.php' );
		$widgets_manager->register( new Javid_Elementor_Grid_Post_Widget() );

		require_once( 'elementor/list.php' );
		$widgets_manager->register( new Javid_Elementor_List_Widget() );

		require_once( 'elementor/services-box.php' );
		$widgets_manager->register( new Javid_Elementor_Services_Box_Widget() );

		require_once( 'elementor/services-box-2.php' );
		$widgets_manager->register( new Javid_Elementor_Services_Box_2_Widget() );

		require_once( 'elementor/services-box-3.php' );
		$widgets_manager->register( new Javid_Elementor_Services_Box_3_Widget() );
	}

	function javid_create_part_cpt() {

		$labels = array(
			'name'                  => _x( 'Parts', 'Post Type General Name', 'javid' ),
			'singular_name'         => _x( 'Part', 'Post Type Singular Name', 'javid' ),
			'menu_name'             => _x( 'Parts', 'Admin Menu text', 'javid' ),
			'name_admin_bar'        => _x( 'Part', 'Add New on Toolbar', 'javid' ),
			'archives'              => __( 'Part Archives', 'javid' ),
			'attributes'            => __( 'Part Attributes', 'javid' ),
			'parent_item_colon'     => __( 'Parent Part:', 'javid' ),
			'all_items'             => __( 'All Parts', 'javid' ),
			'add_new_item'          => __( 'Add New Part', 'javid' ),
			'add_new'               => __( 'Add New', 'javid' ),
			'new_item'              => __( 'New Part', 'javid' ),
			'edit_item'             => __( 'Edit Part', 'javid' ),
			'update_item'           => __( 'Update Part', 'javid' ),
			'view_item'             => __( 'View Part', 'javid' ),
			'view_items'            => __( 'View Parts', 'javid' ),
			'search_items'          => __( 'Search Part', 'javid' ),
			'not_found'             => __( 'Not found', 'javid' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'javid' ),
			'featured_image'        => __( 'Featured Image', 'javid' ),
			'set_featured_image'    => __( 'Set featured image', 'javid' ),
			'remove_featured_image' => __( 'Remove featured image', 'javid' ),
			'use_featured_image'    => __( 'Use as featured image', 'javid' ),
			'insert_into_item'      => __( 'Insert into Part', 'javid' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Part', 'javid' ),
			'items_list'            => __( 'Parts list', 'javid' ),
			'items_list_navigation' => __( 'Parts list navigation', 'javid' ),
			'filter_items_list'     => __( 'Filter Parts list', 'javid' ),
		);
		$args   = array(
			'label'               => __( 'Part', 'javid' ),
			'description'         => __( 'Custom parts for header, footer and etc. You can edit them with elementor', 'javid' ),
			'labels'              => $labels,
			'menu_icon'           => 'dashicons-layout',
			'supports'            => array( 'title' ),
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 25,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'hierarchical'        => false,
			'exclude_from_search' => true,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'javidpart', $args );
	}

	public function javid_customizer_register_logostyle( $wp_customize ) {
		/**
		 * Register Logo And Style.
		 */
		$wp_customize->add_section( 'logostyle', array(
			'title'    => __( 'Logo and Style', 'javid' ),
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'primary_color', array(
			'default'           => '#62D59C',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
			'label'    => __( 'Primary Color', 'javid' ),
			'section'  => 'logostyle',
			'settings' => 'primary_color',
		) ) );

		$wp_customize->add_setting( 'secondary_color', array(
			'default'           => '#00C52E',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
			'label'    => __( 'Secondary Color', 'javid' ),
			'section'  => 'logostyle',
			'settings' => 'secondary_color',
		) ) );

		$wp_customize->add_setting( 'border_radius', array(
			'default'           => '7',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'border_radius', array(
			'type'        => 'number',
			'section'     => 'logostyle',
			'settings'    => 'border_radius',
			'label'       => __( 'Border Radius', 'javid' ),
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
			),
		) );

		$wp_customize->add_setting( 'enable_box_shadow', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'enable_box_shadow', array(
			'type'     => 'checkbox',
			'section'  => 'logostyle',
			'settings' => 'enable_box_shadow',
			'label'    => __( 'Show box shadow', 'javid' ),
		) );

		$wp_customize->add_setting( 'enable_preloader', array(
			'default'   => false,
			'transport' => 'refresh',
		) );
		$wp_customize->add_control( 'enable_preloader', array(
			'type'     => 'checkbox',
			'section'  => 'logostyle',
			'settings' => 'enable_preloader',
			'label'    => __( 'Show preloader', 'javid' ),
		) );
	}

	public function javid_customizer_register_header( $wp_customize ) {
		/**
		 * Register Header.
		 */
		$wp_customize->add_section( 'header', array(
			'title'    => __( 'Header', 'javid' ),
			'priority' => 2,
		) );

		$the_query = new WP_Query( array( 'post_type' => 'javidpart' ) );
		if ( $the_query->have_posts() ) {
			$list_parts = array();
			while ( $the_query->have_posts() ): $the_query->the_post();

				$list_parts[] = get_the_title();

			endwhile;

			$wp_customize->add_setting( 'enable_custom_header', array(
				'default'   => false,
				'transport' => 'refresh',

			) );
			$wp_customize->add_control( 'enable_custom_header', array(
				'type'     => 'checkbox',
				'section'  => 'header',
				'settings' => 'enable_custom_header',
				'label'    => __( 'Enabled Custom Header', 'javid' ),
			) );

			$wp_customize->add_setting( 'select_custom_header', array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint'
			) );
			$wp_customize->add_control( 'select_custom_header', array(
				'type'     => 'select',
				'choices'  => $list_parts,
				'section'  => 'header',
				'settings' => 'select_custom_header',
				'label'    => __( 'Select custom header', 'javid' ),
			) );

		}
		wp_reset_query();

		$wp_customize->add_setting( 'header_background_color', array(
			'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
			'label'    => __( 'Header Background Color', 'javid' ),
			'section'  => 'header',
			'settings' => 'header_background_color',
		) ) );

		$wp_customize->add_setting( 'head_cta_link', array(
			'default'           => '#',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 'head_cta_link', array(
			'type'     => 'url',
			'section'  => 'header',
			'settings' => 'head_cta_link',
			'label'    => __( 'Header button link', 'javid' ),
		) );

		$wp_customize->add_setting( 'head_cta_text', array(
			'default'           => 'Click Me',
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		) );
		$wp_customize->add_control( 'head_cta_text', array(
			'type'     => 'text',
			'section'  => 'header',
			'settings' => 'head_cta_text',
			'label'    => __( 'Header button text', 'javid' ),
		) );

		$wp_customize->add_setting( 'show_header_login', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'show_header_login', array(
			'type'     => 'checkbox',
			'section'  => 'header',
			'settings' => 'show_header_login',
			'label'    => __( 'Show header login icon', 'javid' ),
		) );

		$wp_customize->add_setting( 'show_header_cta', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'show_header_cta', array(
			'type'     => 'checkbox',
			'section'  => 'header',
			'settings' => 'show_header_cta',
			'label'    => __( 'Show header button', 'javid' ),
		) );

		$wp_customize->add_setting( 'show_header_search', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'show_header_search', array(
			'type'     => 'checkbox',
			'section'  => 'header',
			'settings' => 'show_header_search',
			'label'    => __( 'Show header search icon', 'javid' ),
		) );
	}

	public function javid_customizer_register_footer( $wp_customize ) {
		/**
		 * Register Footer.
		 */
		$wp_customize->add_section( 'footer', array(
			'title'    => __( 'Footer', 'javid' ),
			'priority' => 2,
		) );

		$the_query = new WP_Query( array( 'post_type' => 'javidpart' ) );
		if ( $the_query->have_posts() ) {
			$list_parts = array();
			while ( $the_query->have_posts() ): $the_query->the_post();

				$list_parts[] = get_the_title();

			endwhile;

			$wp_customize->add_setting( 'enable_custom_footer', array(
				'default'   => false,
				'transport' => 'refresh',

			) );
			$wp_customize->add_control( 'enable_custom_footer', array(
				'type'     => 'checkbox',
				'section'  => 'footer',
				'settings' => 'enable_custom_footer',
				'label'    => __( 'Enabled Custom Footer', 'javid' ),
			) );

			$wp_customize->add_setting( 'select_custom_footer', array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint'
			) );
			$wp_customize->add_control( 'select_custom_footer', array(
				'type'     => 'select',
				'choices'  => $list_parts,
				'section'  => 'footer',
				'settings' => 'select_custom_footer',
				'label'    => __( 'Select custom footer', 'javid' ),
			) );

		}
		wp_reset_query();

		$wp_customize->add_setting( 'footer_background_color', array(
			'default'           => '#fff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
			'label'    => __( 'Footer Background Color', 'javid' ),
			'section'  => 'footer',
			'settings' => 'footer_background_color',
		) ) );

		$wp_customize->add_setting( 'footer_background_image', array(
			'default'   => '',
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image', array(
			'section'  => 'footer',
			'settings' => 'footer_background_image',
			'label'    => __( 'Footer Background Image', 'javid' ),
		) ) );

		$wp_customize->add_setting( 'footer_background_size', array(
			'default'   => 2,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'footer_background_size', array(
			'type'     => 'radio',
			'choices'  => array(
				'cover'   => __( 'Cover', 'javid' ),
				'contain' => __( 'Contain', 'javid' ),
				'auto'    => __( 'Auto', 'javid' )
			),
			'settings' => 'footer_background_size',
			'section'  => 'footer',
			'label'    => __( 'Footer Background Size', 'javid' ),
		) );

		$wp_customize->add_setting( 'footer_background_repeat', array(
			'default'   => 0,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'footer_background_repeat', array(
			'type'     => 'radio',
			'choices'  => array(
				'repeat'    => __( 'Repeat', 'javid' ),
				'no-repeat' => __( 'No Repeat', 'javid' ),
				'repeat-x'  => __( 'Repeat X', 'javid' ),
				'repeat-y'  => __( 'Repeat Y', 'javid' )
			),
			'settings' => 'footer_background_repeat',
			'section'  => 'footer',
			'label'    => __( 'Footer Background Repeat', 'javid' ),
		) );

		$wp_customize->add_setting( 'footer_top_border_width', array(
			'default'           => '2',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'footer_top_border_width', array(
			'type'        => 'number',
			'section'     => 'footer',
			'settings'    => 'footer_top_border_width',
			'label'       => __( 'Footer Top Border Width', 'javid' ),
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
			),
		) );

		$wp_customize->add_setting( 'footer_top_border_color', array(
			'default'           => '#000000',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_top_border_color', array(
			'label'    => __( 'Footer Top Border Color', 'javid' ),
			'section'  => 'footer',
			'settings' => 'footer_top_border_color',
		) ) );

		$wp_customize->add_setting( 'footer_widgets_row1_columns', array(
			'default'           => 4,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'footer_widgets_row1_columns', array(
			'type'        => 'number',
			'section'     => 'footer',
			'settings'    => 'footer_widgets_row1_columns',
			'label'       => __( 'Footer Widgets Row 1 Columns Number', 'javid' ),
			'input_attrs' => array(
				'min' => 0,
				'max' => 6,
			),
		) );

		$wp_customize->add_setting( 'footer_widgets_row2_columns', array(
			'default'           => 2,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'footer_widgets_row2_columns', array(
			'type'        => 'number',
			'section'     => 'footer',
			'settings'    => 'footer_widgets_row2_columns',
			'label'       => __( 'Footer Widgets Row 2 Columns Number', 'javid' ),
			'input_attrs' => array(
				'min' => 0,
				'max' => 6,
			),
		) );

		$wp_customize->add_setting( 'enable_footer_menu', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'enable_footer_menu', array(
			'type'     => 'checkbox',
			'section'  => 'footer',
			'settings' => 'enable_footer_menu',
			'label'    => __( 'Show footer menu', 'javid' ),
		) );

		$wp_customize->add_setting( 'footer_copyright_right', array(
			'default'           => '© ' . date( 'Y' ) . '. ' . __( 'All Rights Reserved', 'javid' ) . '.',
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		) );
		$wp_customize->add_control( 'footer_copyright_right', array(
			'type'     => 'text',
			'section'  => 'footer',
			'settings' => 'footer_copyright_right',
			'label'    => __( 'Footer Copyright Right', 'javid' ),
		) );

		$wp_customize->add_setting( 'footer_copyright_left', array(
			'default'           => '© ' . date( 'Y' ) . '. ' . __( 'All Rights Reserved', 'javid' ) . '.',
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		) );
		$wp_customize->add_control( 'footer_copyright_left', array(
			'type'     => 'text',
			'section'  => 'footer',
			'settings' => 'footer_copyright_left',
			'label'    => __( 'Footer Copyright Left', 'javid' ),
		) );
	}

	public function javid_customizer_register_archives( $wp_customize ) {
		/**
		 * Register Archives.
		 */
		$wp_customize->add_section( 'archives', array(
			'title'    => __( 'Archives', 'javid' ),
			'priority' => 2,
		) );

		$wp_customize->add_setting( 'archives_columns_number', array(
			'default'           => 3,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'archives_columns_number', array(
			'type'        => 'number',
			'section'     => 'archives',
			'settings'    => 'archives_columns_number',
			'label'       => __( 'Archives columns number', 'javid' ),
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
			)
		) );

		$wp_customize->add_setting( 'archives_enable_post_meta', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'archives_enable_post_meta', array(
			'type'     => 'checkbox',
			'section'  => 'archives',
			'settings' => 'archives_enable_post_meta',
			'label'    => __( 'Enabled Post Meta', 'javid' ),
		) );

		$wp_customize->add_setting( 'archives_enable_read_more', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'archives_enable_read_more', array(
			'type'     => 'checkbox',
			'section'  => 'archives',
			'settings' => 'archives_enable_read_more',
			'label'    => __( 'Enabled Read More Button', 'javid' ),
		) );

		$wp_customize->add_setting( 'archives_enable_categories', array(
			'default'   => false,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'archives_enable_categories', array(
			'type'     => 'checkbox',
			'section'  => 'archives',
			'settings' => 'archives_enable_categories',
			'label'    => __( 'Enabled Categories Links', 'javid' ),
		) );

		$wp_customize->add_setting( 'archives_enable_excerpt', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'archives_enable_excerpt', array(
			'type'     => 'checkbox',
			'section'  => 'archives',
			'settings' => 'archives_enable_excerpt',
			'label'    => __( 'Enabled Excerpt', 'javid' ),
		) );

		$wp_customize->add_setting( 'archives_center_post_title', array(
			'default'   => false,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'archives_center_post_title', array(
			'type'     => 'checkbox',
			'section'  => 'archives',
			'settings' => 'archives_center_post_title',
			'label'    => __( 'Make the title of post centered', 'javid' ),
		) );
	}

	public function javid_customizer_register_posts( $wp_customize ) {
		/**
		 * Register Posts.
		 */
		$wp_customize->add_section( 'posts', array(
			'title'    => __( 'Posts And Pages', 'javid' ),
			'priority' => 2,
		) );

		$wp_customize->add_setting( 'enable_posts_sidebar', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'enable_posts_sidebar', array(
			'type'     => 'checkbox',
			'section'  => 'posts',
			'settings' => 'enable_posts_sidebar',
			'label'    => __( 'Show sidebar in posts', 'javid' ),
		) );

		$wp_customize->add_setting( 'enable_pages_sidebar', array(
			'default'   => false,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'enable_pages_sidebar', array(
			'type'     => 'checkbox',
			'section'  => 'posts',
			'settings' => 'enable_pages_sidebar',
			'label'    => __( 'Show sidebar in page', 'javid' ),
		) );

		$wp_customize->add_setting( 'thumbnail_position', array(
			'default'   => 2,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'thumbnail_position', array(
			'type'     => 'radio',
			'choices'  => array(
				0 => __( 'Full Width', 'javid' ),
				1 => __( 'Right', 'javid' ),
				2 => __( 'Left', 'javid' ),
			),
			'section'  => 'posts',
			'settings' => 'thumbnail_position',
			'label'    => __( 'Thumbnail Position', 'javid' ),
		) );

		$wp_customize->add_setting( 'show_next_prev_post', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'show_next_prev_post', array(
			'type'     => 'checkbox',
			'section'  => 'posts',
			'settings' => 'show_next_prev_post',
			'label'    => __( 'Show next and previous post link', 'javid' ),
		) );

		$wp_customize->add_setting( 'show_post_meta', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'show_post_meta', array(
			'type'     => 'checkbox',
			'section'  => 'posts',
			'settings' => 'show_post_meta',
			'label'    => __( 'Show post meta', 'javid' ),
		) );

		$wp_customize->add_setting( 'show_author_box', array(
			'default'   => true,
			'transport' => 'refresh',

		) );
		$wp_customize->add_control( 'show_author_box', array(
			'type'     => 'checkbox',
			'section'  => 'posts',
			'settings' => 'show_author_box',
			'label'    => __( 'Show author box', 'javid' ),
		) );
	}

	public function register_sidebars() {
		register_sidebar( array(
			'name'          => __( 'Posts Sidebar', 'javid' ),
			'id'            => 'posts-sidebar',
			'description'   => __( "Posts Sidebar", 'javid' ),
			'before_widget' => '<div id="%1$s" class="widget widget-sidebar mb-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widgets (Row 1)', 'javid' ),
			'id'            => 'footer-widgets-1',
			'description'   => __( "Footer widgets (Row 1)", 'javid' ),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widgets (Row 2)', 'javid' ),
			'id'            => 'footer-widgets-2',
			'description'   => __( "Footer widgets (Row 2)", 'javid' ),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	public function register_menus() {
		register_nav_menus( [
			'javid-header-menu' => esc_html__( 'Header Menu', 'javid' ),
			'javid-footer-menu' => esc_html__( 'Footer Menu', 'javid' ),
		] );
	}

	function shapeSpace_script_loader_tag($tag, $handle, $src) {
//        echo '<pre>';
//        print_r($handle);
//        wp_die();
		if ($handle === 'jquery-core' || $handle === 'main-js' || $handle === 'color-convert-js'
            || $handle === 'responsive-js' || $handle === 'bootstrap-js') {

			if (false === stripos($tag, 'async')) {

				$tag = str_replace(' src', ' async="async" src', $tag);

			}

			if (false === stripos($tag, 'defer')) {

				$tag = str_replace('<script ', '<script defer ', $tag);

			}

		}

		return $tag;

	}

	public function register_styles() {
		// Register Styles
		wp_register_style( 'bootstrap-css', JAVID_LIBRARY_URI . '/css/bootstrap.min.css', [] );
		wp_register_style( 'variables-css', JAVID_CSS_URI . '/global/variables.css', [ 'bootstrap-css' ] );
		wp_register_style( 'css-reset-css', JAVID_CSS_URI . '/global/css_reset.css', [ 'variables-css' ] );
		wp_register_style( 'defaults-css', JAVID_CSS_URI . '/global/defaults.css', [ 'css-reset-css' ] );
		wp_register_style( 'header-css', JAVID_CSS_URI . '/global/header.css', [ 'defaults-css' ] );
		wp_register_style( 'footer-css', JAVID_CSS_URI . '/global/footer.css', [ 'header-css' ] );
		wp_register_style( 'content-none-css', JAVID_CSS_URI . '/global/content-none.css', [ 'footer-css' ] );
		wp_register_style( 'responsive-css', JAVID_CSS_URI . '/global/responsive.css', [ 'content-none-css' ] );
		wp_register_style( 'widgets-css', JAVID_CSS_URI . '/global/widgets.css', [ 'responsive-css' ] );

		wp_register_style( 'font-css', JAVID_CSS_URI . '/global/iransans.css', [] );
		wp_register_style( 'fontawesome', JAVID_LIBRARY_URI . '/css/all.min.css', [] );
		wp_register_style( 'singular-css', JAVID_CSS_URI . '/singular.css', [] );
		wp_register_style( 'archive-css', JAVID_CSS_URI . '/archive.css', [] );
		wp_register_style( 'author-css', JAVID_CSS_URI . '/author.css', [] );
		wp_register_style( 'widgets-css', JAVID_CSS_URI . '/widgets.css', [] );
		wp_register_style( 'singular-sidebar-css', JAVID_CSS_URI . '/singular-sidebar.css', [] );
		wp_register_style( 'elementor-css', JAVID_CSS_URI . '/elementor.css', [] );
		wp_register_style( 'rate-my-post-javid', JAVID_CSS_URI . '/plugins/rate-my-post.css', [] );
		wp_register_style( 'easy-table-of-content-javid', JAVID_CSS_URI . '/plugins/easy-table-of-content.css', [] );
		wp_register_style( 'wpforms-javid', JAVID_CSS_URI . '/plugins/wpforms.css', [] );
		wp_register_style('preloader-css', JAVID_CSS_URI . '/preloader.css');

		// Enqueue Styles
		wp_enqueue_style( 'bootstrap-css' );
		wp_enqueue_style( 'variables-css' );
		wp_enqueue_style( 'css-reset-css' );
		wp_enqueue_style( 'defaults-css' );
		wp_enqueue_style( 'header-css' );
		wp_enqueue_style( 'footer-css' );
		wp_enqueue_style( 'content-none-css' );
		wp_enqueue_style( 'responsive-css' );
		wp_enqueue_style( 'widgets-css' );

		wp_enqueue_style( 'font-css' );
		wp_enqueue_style( 'fontawesome' );

		if (get_theme_mod('enable_preloader')) {
			wp_enqueue_style('preloader-css');
		}

		if ( is_singular() ) {
			wp_enqueue_style( 'singular-css' );
		}
		if ( ( is_archive() && ! is_search() ) || is_home() ) {
			wp_enqueue_style( 'archive-css' );
		}
		if ( is_author() ) {
			wp_enqueue_style( 'author-css' );
		}
		if ( is_singular() && is_active_sidebar( 'posts-sidebar' ) ) {
			wp_enqueue_style( 'singular-sidebar-css' );
		}

		$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
		if ( $elementor_page === 'builder' ) {
			wp_enqueue_style( 'elementor-css' );
		}

		if ( is_plugin_active( 'easy-table-of-contents/easy-table-of-contents.php' ) ) {
			wp_enqueue_style( 'easy-table-of-content-javid' );
		}

		if ( is_plugin_active( 'rate-my-post/rate-my-post.php' ) ) {
			wp_enqueue_style( 'rate-my-post-javid' );
		}

		if ( is_plugin_active( 'wpforms-lite/wpforms.php' ) || is_plugin_active( 'wpforms-pro/wpforms.php' ) ) {
			wp_enqueue_style( 'wpforms-javid' );
		}
	}

	public function register_scripts() {
//		wp_deregister_script('jquery');
//
//		// Register Scripts.
        wp_register_script( 'jquery-javid', JAVID_LIBRARY_URI . '/js/jquery.min.js' );
		wp_register_script( 'bootstrap-js', JAVID_DIR_URI . '/assets/library/js/bootstrap.js', [ 'jquery-javid' ] );
		wp_register_script( 'main-js', JAVID_JS_URI . '/main.js', [ 'jquery-javid' ], true );
		wp_register_script( 'color-convert-js', JAVID_JS_URI . '/color_convert.js', [ 'jquery-javid' ], '', true );
		wp_register_script( 'responsive-js', JAVID_JS_URI . '/responsive.js', [ 'jquery-javid' ], '', true );
		wp_register_script( 'preloader-js', JAVID_JS_URI . '/preloader.js', [ 'jquery-javid' ], '', true );

		// Enqueue Scripts
		wp_enqueue_script( 'bootstrap-js' );
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'color-convert-js' );
		wp_enqueue_script( 'responsive-js' );

        if (get_theme_mod('enable_preloader', false)) {
            wp_enqueue_script( 'preloader-js' );
        }
	}

	public function register_customizer_styles() {
		wp_register_style( 'customizer-style', JAVID_CSS_URI . '/customizer.css', [] );
		wp_register_style( 'customizer-font-css', JAVID_CSS_URI . '/global/customizer-iransans.css', [] );


		wp_enqueue_style( 'customizer-style' );
		wp_enqueue_style( 'customizer-font-css' );
	}

	function wpb_new_contact_methods( $contactmethods ) {
		// Add Instagram
		$contactmethods['instagram'] = 'Instagram';
		//add Facebook
		$contactmethods['facebook'] = 'Facebook';
		// add Twitter
		$contactmethods['twitter'] = 'Twitter';

		return $contactmethods;
	}

	public function wp_admin_styles() {
		echo '
        <link rel="stylesheet" href="' . JAVID_CSS_URI . '/global/iransans.css' . '">
        <script src="' . JAVID_LIBRARY_URI . '/js/jquery.min.js' . '"></script>
        <style>
        html, body, *:not(span):not(i):not(pre):not(code) {
            font-family: "iransans", sans-serif !important;
        }
        .editor-styles-wrapper, .editor-styles-wrapper #tinymce {
        	font-size: 16px !important;
        }
        </style>
        ';
	}

	public function setup_theme() {
		load_theme_textdomain( 'javid', JAVID_DIR_PATH . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', [
			'header-text' => [ 'site-title', 'site-description' ],
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		] );
		add_theme_support( 'custom-background', [
			'default-color' => '#fff',
			'default-image' => '',
		] );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'featured-thumbnail', 350, 233, true );

		add_theme_support( 'custom-selective-refresh-widgets' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style'
			] );


		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_editor_style();

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}

		add_image_size(
			'lastpost-thumbnail',
			100,
			100,
			true
		);

		add_image_size(
			'gridpost-thumbnail',
			330,
			185
		);
		add_image_size(
			'post-thumbnail',
			540,
			300
		);
	}
}