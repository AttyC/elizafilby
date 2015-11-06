<?php
/**
 * Social Icons Widget
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/**
* Class Hoot_Social_Icons_Widget
*/
class Hoot_Social_Icons_Widget extends Hoot_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'hoot-social-icons-widget',

			//name
			__( 'Hoot > Social Icons', 'dispatch' ),

			//widget_options
			array(
				'description'	=> __('Display Social Icons', 'dispatch'),
				'class'			=> 'hoot-social-icons-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Icon Size', 'dispatch' ),
					'id'		=> 'size',
					'type'		=> 'select',
					'std'		=> 'medium',
					'options'	=> array(
						'small'		=> __( 'Small', 'dispatch' ),
						'medium'	=> __( 'Medium', 'dispatch' ),
						'large'		=> __( 'Large', 'dispatch' ),
						'huge'		=> __( 'Huge', 'dispatch' ),
					),
				),
				array(
					'name'		=> __( 'Social Icons', 'dispatch' ),
					'id'		=> 'icons',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Icon', 'dispatch' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __( 'Social Icon', 'dispatch' ),
							'id'		=> 'icon',
							'type'		=> 'select',
							'options'	=> array(
								'fa-behance'	=> __( 'Behance', 'dispatch' ),
								'fa-bitbucket'	=> __( 'Bitbucket', 'dispatch' ),
								'fa-btc'		=> __( 'BTC', 'dispatch' ),
								'fa-codepen'	=> __( 'Codepen', 'dispatch' ),
								'fa-delicious'	=> __( 'Delicious', 'dispatch' ),
								'fa-deviantart'	=> __( 'Deviantart', 'dispatch' ),
								'fa-digg'		=> __( 'Digg', 'dispatch' ),
								'fa-dribbble'	=> __( 'Dribbble', 'dispatch' ),
								'fa-dropbox'	=> __( 'Dropbox', 'dispatch' ),
								'fa-envelope'	=> __( 'Email', 'dispatch' ),
								'fa-facebook'	=> __( 'Facebook', 'dispatch' ),
								'fa-flickr'		=> __( 'Flickr', 'dispatch' ),
								'fa-foursquare'	=> __( 'Foursquare', 'dispatch' ),
								'fa-github'		=> __( 'Github', 'dispatch' ),
								'fa-google-plus'=> __( 'Google Plus', 'dispatch' ),
								'fa-instagram'	=> __( 'Instagram', 'dispatch' ),
								'fa-lastfm'		=> __( 'Last FM', 'dispatch' ),
								'fa-linkedin'	=> __( 'Linkedin', 'dispatch' ),
								'fa-pinterest'	=> __( 'Pinterest', 'dispatch' ),
								'fa-reddit'		=> __( 'Reddit', 'dispatch' ),
								'fa-rss'		=> __( 'RSS', 'dispatch' ),
								'fa-skype'		=> __( 'Skype', 'dispatch' ),
								'fa-slack'		=> __( 'Slack', 'dispatch' ),
								'fa-slideshare'	=> __( 'Slideshare', 'dispatch' ),
								'fa-soundcloud'	=> __( 'Soundcloud', 'dispatch' ),
								'fa-stack-exchange'	=> __( 'Stack Exchange', 'dispatch' ),
								'fa-stack-overflow'	=> __( 'Stack Overflow', 'dispatch' ),
								'fa-steam'		=> __( 'Steam', 'dispatch' ),
								'fa-stumbleupon'=> __( 'Stumbleupon', 'dispatch' ),
								'fa-tumblr'		=> __( 'Tumblr', 'dispatch' ),
								'fa-twitch'		=> __( 'Twitch', 'dispatch' ),
								'fa-twitter'	=> __( 'Twitter', 'dispatch' ),
								'fa-vimeo-square'=> __( 'Vimeo', 'dispatch' ),
								'fa-wordpress'	=> __( 'WordPress', 'dispatch' ),
								'fa-yelp'		=> __( 'Yelp', 'dispatch' ),
								'fa-youtube'	=> __( 'Youtube', 'dispatch' ),
							),
						),
						array(
							'name'		=> __( 'URL', 'dispatch' ),
							'id'		=> 'url',
							'type'		=> 'text',
							'sanitize'	=> 'url',
						),
					),
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hoot_locate_widget( 'social-icons' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function hoot_social_icons_widget_register(){
	register_widget('Hoot_Social_Icons_Widget');
}
add_action('widgets_init', 'hoot_social_icons_widget_register');