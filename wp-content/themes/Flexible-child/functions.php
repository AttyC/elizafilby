<?php
/**
 * Flexible Marketing Child functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Flexible
 * @since Flexible 1.0
 */

function create_custom_post_types() {
    register_post_type( 'reviews',
        array(
            'labels' => array(
                'name' => __( 'Reviews' ),
                'singular_name' => __( 'Review' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'reviews' ),
        )
    );
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'testmonials' ),
        )
    );

    register_post_type( 'articles',
        array(
            'labels' => array(
                'name' => __( 'Articles' ),
                'singular_name' => __( 'Article' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'articles' ),
        )
    );
    register_post_type( 'pressmedia',
        array(
            'labels' => array(
                'name' => __( 'Press and Media' ),
                'singular_name' => __( 'PressMedia' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'pressmedia' ),
        )
    );
    register_post_type( 'academicarticles',
        array(
            'labels' => array(
                'name' => __( 'Academic Articles' ),
                'singular_name' => __( 'AcademicArticle' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'academicarticles' ),
        )
    );
   register_post_type( 'interviews',
        array(
            'labels' => array(
                'name' => __( 'Interviews' ),
                'singular_name' => __( 'Interview' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'interviews' ),
        )
    );
   register_post_type( 'broadcasts',
        array(
            'labels' => array(
                'name' => __( 'Broadcasts' ),
                'singular_name' => __( 'Broadcast' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'broadcasts' ),
        )
    );
   register_post_type( 'talks',
        array(
            'labels' => array(
                'name' => __( 'Talks' ),
                'singular_name' => __( 'Talk' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'talks' ),
        )
    );
}
add_action( 'init', 'create_custom_post_types' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Page List',
        'id'            => 'page_list',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
?>