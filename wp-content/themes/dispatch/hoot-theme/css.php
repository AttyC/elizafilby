<?php
/**
 * Add custom css to frontend.
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

// Hook into 'wp_enqueue_scripts' as 'wp_add_inline_style()' requires stylesheet $handle to be already registered.
// Main stylesheet with handle 'style' is registered by the framework via 'wp_enqueue_scripts' hook at priority 0
add_action( 'wp_enqueue_scripts', 'hoot_custom_css', 99 );

/**
 * Custom CSS built from user theme options
 * For proper sanitization, always use functions from hoot/functions/css-styles.php
 *
 * @since 1.0
 * @access public
 */
function hoot_custom_css() {
	$css = '';
	$accent_color = hoot_get_option( 'accent_color' );
	$accent_color_dark = hoot_color_decrease( $accent_color, 20, 20 );
	$accent_font = hoot_get_option( 'accent_font' );

	$cssrules = array();

	// Hoot Grid
	$cssrules['.grid'] = hoot_css_grid_width();

	// Base Typography and HTML
	$cssrules['a'] = hoot_css_rule( 'color', $accent_color ); // Overridden by hoot_premium_custom_cssrules()
	$cssrules['.invert-typo'] = array(
		hoot_css_rule( 'background', $accent_color ),
		hoot_css_rule( 'color', $accent_font ),
		);
	$cssrules['.invert-typo a, .invert-typo a:hover, .invert-typo h1, .invert-typo h2, .invert-typo h3, .invert-typo h4, .invert-typo h5, .invert-typo h6, .invert-typo .title'] = hoot_css_rule( 'color', $accent_font );
	$cssrules['input[type="submit"], #submit, .button'] = array(
		hoot_css_rule( 'background', $accent_color ),
		hoot_css_rule( 'color', $accent_font ),
		);
	$cssrules['input[type="submit"]:hover, #submit:hover, .button:hover'] = array(
		hoot_css_rule( 'background', $accent_color_dark ),
		hoot_css_rule( 'color', $accent_font ),
		);

	// Layout
	$content_bg = hoot_get_option( 'background' );
	$cssrules['body'][] = hoot_css_background( $content_bg );
	if ( hoot_get_option( 'site_layout' ) == 'boxed' ) {
		$content_bg = hoot_get_option( 'box_background' );
		$cssrules['#page-wrapper'][] = hoot_css_background( $content_bg );
	}
	$cssrules['#page-wrapper'][] = hoot_css_rule( 'border-color', $accent_color );

	// Header
	$cssrules['#topbar-right-inner' . ', ' . '#topbar-right-inner input'] = hoot_css_rule( 'background', $content_bg['color'] );

	// Shortcodes
	$cssrules['#page-wrapper ul.shortcode-tabset-nav li.current'] = hoot_css_rule( 'border-bottom-color', $content_bg['color'] );

	// Light Slider
	$cssrules['.lSSlideOuter .lSPager.lSpg > li:hover a, .lSSlideOuter .lSPager.lSpg > li.active a'] = hoot_css_rule( 'background-color', $accent_color );

	// Allow CSS to be modified
	$cssrules = apply_filters( 'hoot_dynamic_cssrules', $cssrules );


	/** Print CSS Rules **/

	foreach ( $cssrules as $selector => $rules ) {
		if ( !empty( $selector ) ) {
			$css .= $selector . ' {';
			if ( is_array( $rules ) ) {
				foreach ( $rules as $rule ) {
					$css .= $rule . ' ';
				}
			} else {
				$css .= $rules;
			}
			$css .= ' }' . "\n";
		}
	}

	// @todo add media queries to preceding code

	// Allow CSS to be modified
	$cssrules = apply_filters( 'hoot_dynamic_css', $css );

	// Print CSS
	if ( !empty( $css ) ) {
		wp_add_inline_style( 'style', $css );
	}

}