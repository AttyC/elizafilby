<?php
/**
 * Call To Action Widget
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/**
* Class Hoot_CTA_Widget
*/
class Hoot_CTA_Widget extends Hoot_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'hoot-cta-widget',

			//name
			__( 'Hoot > Call To Action', 'dispatch' ),

			//widget_options
			array(
				'description'	=> __('Display Call To Action block.', 'dispatch'),
				'class'			=> 'hoot-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Headline/Description', 'dispatch' ),
					'id'		=> 'page_id',
					'type'		=> 'select',
					'options'	=> Hoot_WP_Widget::get_wp_list('page'),
				),
				array(
					'name'		=> __( 'Button Text', 'dispatch' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'dispatch' ),
					'id'		=> 'button_text',
					'type'		=> 'text',
					'std'		=> __( '-- LEARN MORE --', 'dispatch' ),
				),
				array(
					'name'		=> __( 'URL', 'dispatch' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'dispatch' ),
					'id'		=> 'url',
					'type'		=> 'text',
					'sanitize'	=> 'url',
				),
				array(
					'name'		=> __( 'Border', 'dispatch' ),
					'desc'		=> __( 'Top and bottom borders.', 'dispatch' ),
					'id'		=> 'border',
					'type'		=> 'select',
					'std'		=> 'none none',
					'options'	=> array(
						'line line'	=> __( 'Top - Line || Bottom - Line', 'dispatch' ),
						'line shadow'	=> __( 'Top - Line || Bottom - StrongDash', 'dispatch' ),
						'line none'	=> __( 'Top - Line || Bottom - None', 'dispatch' ),
						'shadow line'	=> __( 'Top - StrongDash || Bottom - Line', 'dispatch' ),
						'shadow shadow'	=> __( 'Top - StrongDash || Bottom - StrongDash', 'dispatch' ),
						'shadow none'	=> __( 'Top - StrongDash || Bottom - None', 'dispatch' ),
						'none line'	=> __( 'Top - None || Bottom - Line', 'dispatch' ),
						'none shadow'	=> __( 'Top - None || Bottom - StrongDash', 'dispatch' ),
						'none none'	=> __( 'Top - None || Bottom - None', 'dispatch' ),
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
		include( hoot_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function hoot_cta_widget_register(){
	register_widget('Hoot_CTA_Widget');
}
add_action('widgets_init', 'hoot_cta_widget_register');