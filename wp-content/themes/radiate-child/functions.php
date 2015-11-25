<?php
/**
 * Radiate Marketing Child functions and definitions
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
 * @subpackage Radiate
 * @since Radiate 1.0
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

/* Register sidebars */

register_sidebar( array(
    'name' =>__( 'About sidebar', 'sidebar-about'),
    'id' => 'sidebar-2',
    'description' => __( 'Appears on the About page', 'sidebar-about' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Academic Articles sidebar', 'sidebar-academic'),
    'id' => 'sidebar-3',
    'description' => __( 'Appears on the Academic Articles page', 'sidebar-academic' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Articles sidebar', 'sidebar-articles'),
    'id' => 'sidebar-4',
    'description' => __( 'Appears on the Articles page', 'sidebar-articles' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Books sidebar', 'sidebar-books'),
    'id' => 'sidebar-5',
    'description' => __( 'Appears on the Books page', 'sidebar-books' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Interviews sidebar', 'sidebar-interviews'),
    'id' => 'sidebar-6',
    'description' => __( 'Appears on the Interviews page', 'sidebar-interviews' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Journalism sidebar', 'sidebar-journalism'),
    'id' => 'sidebar-7',
    'description' => __( 'Appears on the Journalism page', 'sidebar-journalism' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'PressMedia sidebar', 'sidebar-pressmedia'),
    'id' => 'sidebar-8',
    'description' => __( 'Appears on the Press & Media page', 'sidebar-pressmedia' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Reviews sidebar', 'sidebar-reviews'),
    'id' => 'sidebar-9',
    'description' => __( 'Appears on the Reviews page', 'sidebar-reviews' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'Talks sidebar', 'sidebar-talks'),
    'id' => 'sidebar-10',
    'description' => __( 'Appears on the Talks page', 'sidebar-talks' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' =>__( 'TVRadio sidebar', 'sidebar-tvradio'),
    'id' => 'sidebar-11',
    'description' => __( 'Appears on the TV & Radio page', 'sidebar-tvradio' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );