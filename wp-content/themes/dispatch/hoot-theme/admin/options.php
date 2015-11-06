<?php
/**
 * Theme Options displayed in admin
 *
 * @package hoot
 * @subpackage dispatch
 * @since dispatch 1.0
 */

/**
 * Filter the default typography option values for the theme
 * For a list of available font faces, see "/hoot/options/includes/fonts.php"
 *
 * @since 1.0
 * @param array $typography array of 'size', 'face', 'style' and 'color'
 * @return  array
 */
function hootoptions_default_typography( $typography ) {
	$theme_typography = array(
		'size' => '14px',
		'face' => '"Open Sans", sans-serif',
		'style' => 'normal',
		'color' => '#444444' );
	return wp_parse_args( $theme_typography, $typography );
}
add_filter( 'hoot_of_default_typography', 'hootoptions_default_typography' );

/**
 * Filter the widget areas added for 'Widgetized Template'
 *
 * @since 1.0
 * @param array $defaults
 * @return  array
 */
function hootoptions_widgetized_template_widget_areas( $default ) {
	return $default;
}
add_filter( 'hoot_widgetized_template_widget_areas', 'hootoptions_widgetized_template_widget_areas' );

/**
 * Filter the admin panel intro buttons
 *
 * @since 1.0
 * @param array $buttons
 * @return array
 */
function hootoptions_intro_buttons( $buttons ) {
	$buttons = array(
		'demo'    => array( 'text'   => __( 'Demo', 'dispatch'),
							'button' => 'secondary',
							'url'    => 'http://demo.wphoot.com/dispatch/',
							'icon'   => 'eye' ),
		'docs'    => array( 'text'   => __( 'Documentation', 'dispatch'),
							'button' => 'secondary',
							'url'    => 'http://wphoot.com/docs/dispatch/',
							'icon'   => 'book' ),
		'support' => array( 'text'   => __( 'Support Forums', 'dispatch'),
							'button' => 'secondary',
							'url'    => 'http://wphoot.com/support/',
							'icon'   => 'support' ),
		'rate' =>    array( 'text'   => __( '5<i class="fa fa-star"></i> Rate the Theme', 'dispatch'),
							'button' => 'secondary',
							'url'    => 'https://wordpress.org/support/view/theme-reviews/dispatch#postform',
							'icon'   => 'none' ),
		);
	$buttons['premium'] = array('text'   => __( 'Go Premium', 'dispatch'),
								'button' => 'primary',
								'url'    => 'http://wphoot.com/themes/dispatch/',
								'icon'   => 'cubes' );
	return $buttons;
}
add_filter( 'hootoptions_intro_buttons', 'hootoptions_intro_buttons' );

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * Child themes can modify the options array using the 'hoot_theme_options' filter hook.
 *
 * @since 1.0
 */
function hootoptions_options() {

	// define a directory path for using image radio buttons
	$imagepath =  trailingslashit( HOOT_THEMEURI ) . 'admin/images/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'dispatch'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Site Options', 'dispatch'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Site Logo', 'dispatch'),
		'desc' => sprintf( __('Use %sSite Title%s as text logo', 'dispatch'), '<a href="' . admin_url('/') . 'options-general.php" target="_blank">', '</a>' ),
		'id' => 'logo',
		'class' => 'logo_selector',
		'std' => 'text',
		'type' => 'radio',
		'options' => array(
			'text' => __('Plain Text', 'dispatch'),
			'image' => __('Image Logo', 'dispatch'), ) );

		$options[] = array(
			'std' => '<div class="show-on-select" data-selector="logo_selector">',
			'type' => 'html');

		$options[] = array(
			'name' => __('Site Title Icon (Optional)', 'dispatch'),
			'desc' => __('Leave empty to hide icon.', 'dispatch'),
			'id' => 'site_title_icon',
			'class' => 'show-on-select-block logo_selector-text hide',
			'type' => 'icon');

		$options[] = array(
			'name' => __('Show Tagline', 'dispatch'),
			'desc' => __('Display site description as tagline below logo.', 'dispatch'),
			'id' => 'show_tagline',
			'class' => 'show-on-select-block logo_selector-text hide',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => __('Upload Logo', 'dispatch'),
			'id' => 'logo_image',
			'class' => 'show-on-select-block logo_selector-image hide',
			'type' => 'upload');

		$options[] = array(
			'std' => '</div>',
			'type' => 'html');

	$options[] = array(
		'name' => __('Custom Favicon', 'dispatch'),
		'desc' => __('Recommnended dimensions are 32x32 pixels.', 'dispatch'),
		'id' => 'favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Site Info Text (footer)', 'dispatch'),
		'desc' => sprintf( __('Text shown in footer. Useful for showing copyright info etc.<br />Use the <code>&lt;!--default--&gt;</code> tag to show the default Info Text.<br />Use the <code>&lt;!--year--&gt;</code> tag to insert the current year.<br />Always use %sHTML codes%s for symbols. For example, the HTML for &copy; is <code>&amp;copy;</code>', 'dispatch'), '<a href="http://ascii.cl/htmlcodes.htm" target="_blank">', '</a>' ),
		'id' => 'site_info',
		'std' => '<!--default-->',
		'type' => 'textarea',
		'settings' => array( 'rows' => 3 ) );

	$options[] = array(
		'name' => __('Sitewide Styling', 'dispatch'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Accent Color', 'dispatch'),
		'id' => 'accent_color',
		'std' => '#48ab79',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Font Color on Accent Color', 'dispatch'),
		'id' => 'accent_font',
		'std' => '#ffffff',
		'type' => 'color' );

	if ( current_theme_supports( 'woocommerce' ) ) :
	$options[] = array(
		'name' => __('Woocommerce Styling', 'dispatch'),
		'desc' => sprintf( __('Looks like you are using Woocommerce. Install %sthis plugin%s to change colors and styles for WooCommerce elements like buttons etc.', 'dispatch'), '<a href="https://wordpress.org/plugins/woocommerce-colors/" target="_blank">', '</a>' ),
		'type' => 'info');
	endif;

	$options[] = array(
		'name' =>  __('Site Background', 'dispatch'),
		'id' => 'background',
		'std' => array(
			'color' => '#ffffff', ),
		'type' => 'background', );

	$options[] = array(
		'name' =>  __('Site Box Background', 'dispatch'),
		'desc' => __("This background will be used only if one of the <strong>'boxed'</strong> options is selected in the <strong>'Site Layout'</strong> option in the Layout tab above.", 'dispatch'),
		'id' => 'box_background',
		'std' => array(
			'color' => '#ffffff', ),
		'type' => 'background', );

	$options[] = array(
		'name' => __('Layout', 'dispatch'),
		'type' => 'heading');

	$options[] = array(
		'name' => __("Site Layout - Boxed vs Stretched", 'dispatch'),
		'desc' => __("For boxed layouts, both backgrounds (site and box) can be set in the 'General > Styling' tab above.<br /><br />For Stretched Layout, only site background is available.", 'dispatch'),
		'id' => "site_layout",
		'std' => "stretch",
		'type' => 'radio',
		'options' => array(
			'boxed' => __('Boxed layout', 'dispatch'),
			'stretch' => __('Stretched layout (full width)', 'dispatch'), ) );

	$options[] = array(
		'name' => __("Max. Site Width (pixels)", 'dispatch'),
		'id' => "site_width",
		'std' => "1260",
		'type' => 'radio',
		'options' => array(
			'1260' => __('1260px (wide)', 'dispatch'),
			'1080' => __('1080px (standard)', 'dispatch'), ) );

	$options[] = array(
		'name' => __("Sidebar Layout (Site-wide)", 'dispatch'),
		'desc' => __("Set the default sidebar width and position for your entire site.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'dispatch'),
		'id' => "sidebar",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);

	$options[] = array(
		'name' => __("Sidebar Layout (for Pages)", 'dispatch'),
		'desc' => __("Set the default sidebar width and position for pages.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'dispatch'),
		'id' => "sidebar_pages",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);

	$options[] = array(
		'name' => __("Sidebar Layout (for single Posts)", 'dispatch'),
		'desc' => __("Set the default sidebar width and position for single posts.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'dispatch'),
		'id' => "sidebar_posts",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);

	if ( current_theme_supports( 'woocommerce' ) ) :
	$options[] = array(
		'name' => __("Sidebar Layout (Woocommerce Shop/Archives)", 'dispatch'),
		'desc' => __("Set the default sidebar width and position for WooCommerce shop and archives pages like product categories etc.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'dispatch'),
		'id' => "sidebar_wooshop",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);
	$options[] = array(
		'name' => __("Sidebar Layout (Woocommerce Single Product Page)", 'dispatch'),
		'desc' => __("Set the default sidebar width and position for WooCommerce product pages<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'dispatch'),
		'id' => "sidebar_wooproduct",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);
	endif;

	$options[] = array(
		'name' => __("Footer Layout", 'dispatch'),
		'desc' => sprintf( __('Once you save the settings here, you can add content to footer columns using the %sWidgets Management screen%s.', 'dispatch'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
		'id' => "footer",
		'std' => "3-1",
		'type' => "images",
		'options' => array(
			'1-1' => $imagepath . '1-1.png',
			'2-1' => $imagepath . '2-1.png',
			'2-2' => $imagepath . '2-2.png',
			'2-3' => $imagepath . '2-3.png',
			'3-1' => $imagepath . '3-1.png',
			'3-2' => $imagepath . '3-2.png',
			'3-3' => $imagepath . '3-3.png',
			'3-4' => $imagepath . '3-4.png',
			'4-1' => $imagepath . '4-1.png', )
	);

	$options[] = array(
		'name' => __('Content', 'dispatch'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Topbar', 'dispatch'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Left Topbar', 'dispatch'),
		'desc' => sprintf( __('You can add content to Left Topbar using Text Widget in the %sWidget Management Screen%s', 'dispatch'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
		'type' => 'info');

	$options[] = array(
		'name' => __('Hide Search Box', 'dispatch'),
		'desc' => __('Check this to hide Search box in Topbar Right Column', 'dispatch'),
		'id' => 'topbar_hide_search',
		'type' => 'checkbox');

	$options[] = array(
		'name'		=> __( 'Social Icons', 'dispatch' ),
		'id'		=> 'topbar_icons',
		'type'		=> 'group',
		'settings' => array(
			'title' => __('Profile', 'dispatch'),
			'add_button' => __('Add Another Profile', 'dispatch'),
			'remove_button' => __('Remove Profile', 'dispatch'),
			'repeatable' => true,
			'sortable' => true,
			'toggleview' => true, ),
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
			),
		),
	);

	$options[] = array(
		'name' => __('Archives (Blog, Cats, Tags)', 'dispatch'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Post Items Content', 'dispatch'),
		'desc' => __('Content to display for each post in the list', 'dispatch'),
		'id' => 'archive_post_content',
		'std' => 'excerpt',
		'type' => 'radio',
		'options' => array(
			'excerpt' => __('Post Excerpt', 'dispatch'),
			'full-content' => __('Full Post Content', 'dispatch'), ) );

	$options[] = array(
		'name' => __('Meta Information for Post List Items', 'dispatch'),
		'desc' => __('Check which meta information to display for each post item in the archive list.', 'dispatch'),
		'id' => 'archive_post_meta',
		'std' => array(
			'author' => '1',
			'date' => '1',
			'cats' => '1',
			'comments' => '1', ),
		'type' => 'multicheck',
		'options' => array(
			'author' => __('Author', 'dispatch'),
			'date' => __('Date', 'dispatch'),
			'cats' => __('Categories', 'dispatch'),
			'tags' => __('Tags', 'dispatch'),
			'comments' => __('No. of comments', 'dispatch') ) );

	$options[] = array(
		'name' => __("Excerpt Length", 'dispatch'),
		'desc' => __("Number of words in excerpt. Default is 105. Leave empty if you dont want to change it.", 'dispatch'),
		'id' => 'excerpt_length',
		'type' => 'text');

	$options[] = array(
		'name' => __("'Read More' Text", 'dispatch'),
		'desc' => __("Replace the default 'Read More' text. Leave empty if you dont want to change it.", 'dispatch'),
		'id' => 'read_more',
		'type' => 'text');

	$options[] = array(
		'name' => __('Single (Posts, Pages)', 'dispatch'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Display Featured Image', 'dispatch'),
		'desc' => __('Display featured image at the beginning of post/page content.', 'dispatch'),
		'id' => 'post_featured_image',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Meta Information on Posts', 'dispatch'),
		'desc' => __("Check which meta information to display on an individual 'Post' page", 'dispatch'),
		'id' => 'post_meta',
		'std' => array(
			'author' => '1',
			'date' => '1',
			'cats' => '1',
			'tags' => '1',
			'comments' => '1', ),
		'type' => 'multicheck',
		'options' => array(
			'author' => __('Author', 'dispatch'),
			'date' => __('Date', 'dispatch'),
			'cats' => __('Categories', 'dispatch'),
			'tags' => __('Tags', 'dispatch'),
			'comments' => __('No. of comments', 'dispatch') ) );

	$options[] = array(
		'name' => __('Meta Information on Page', 'dispatch'),
		'desc' => __("Check which meta information to display on an individual 'Page' page", 'dispatch'),
		'id' => 'page_meta',
		'std' => array(
			'author' => '1',
			'date' => '1',
			'comments' => '1', ),
		'type' => 'multicheck',
		'options' => array(
			'author' => __('Author', 'dispatch'),
			'date' => __('Date', 'dispatch'),
			'comments' => __('No. of comments', 'dispatch') ) );

	$options[] = array(
		'name' => __('Meta Information location', 'dispatch'),
		'id' => 'post_meta_location',
		'std' => 'top',
		'type' => 'radio',
		'options' => array(
			'top' => __('Top (below title)', 'dispatch'),
			'bottom' => __('Bottom (after content)', 'dispatch'), ) );

	$options[] = array(
		'name' => __('Previous/Next Posts', 'dispatch'),
		'desc' => __('Display links to Prev/Next Post links at the end of content.', 'dispatch'),
		'id' => 'post_prev_next_links',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Contact Form', 'dispatch'),
		'desc' => sprintf( __('This theme comes bundled with CSS required to style %sContact-Form-7%s forms. Simply install and activate the plugin to add Contact Forms to your pages.', 'dispatch'), '<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">', '</a>'),
		'type' => 'info' );

	if ( current_theme_supports( 'woocommerce' ) ) :
	$options[] = array(
		'name' => __('WooCommerce', 'dispatch'),
		'type' => 'subheading');
	$wooproducts = range( 0, 99 );
	for ( $wpr=0; $wpr < 4; $wpr++ )
		unset( $wooproducts[$wpr] );
	$options[] = array(
		'name' => __("Total Products per page", 'dispatch'),
		'desc' => __("Total number of products to show on the Shop page", 'dispatch'),
		'id' => "wooshop_products",
		'std' => "12",
		'type' => "select",
		'options' => $wooproducts
	);
	$options[] = array(
		'name' => __("Product Columns", 'dispatch'),
		'desc' => __("Number of products to show in 1 row on the Shop page", 'dispatch'),
		'id' => "wooshop_product_columns",
		'std' => "3",
		'type' => "select",
		'options' => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5' )
	);
	endif;

	if ( current_theme_supports( 'hoot-widgetized-template' ) ) :

	$options[] = array(
		'name' => __('Templates', 'dispatch'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Widgetized Template', 'dispatch'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('How to use this template', 'dispatch'),
		'desc' => sprintf( __( "<p>'Widgetized Template' is a special Page Template which is often used to create a Customized Front Page.</p><ol><li>Create a %sNew Page%s. In the <strong>'Page Attributes'</strong> option box select the <strong>'Widgetized Template'</strong> in the <strong>'Template'</strong> dropdown.</li><li>Goto %sSetting > Reading%s menu. In the <strong>'Front page displays'</strong> option, select <strong>'A static page'</strong> and select the page you created in previous step.</li></ol>", 'dispatch'), '<a href="' . admin_url('/') . 'post-new.php?post_type=page" target="_blank">', '</a>', '<a href="' . admin_url('/') . 'options-reading.php" target="_blank">', '</a>'),
		'type' => 'info' );

	$slider1_label = __('HTML Slider', 'dispatch');
	$slider2_label = __('Image Slider', 'dispatch');

	$options[] = array(
		'name' => __('Widget Areas Order', 'dispatch'),
		'desc' => sprintf( __("Sort different sections of the 'Widgetized Template' in the order you want them to appear.<br />You can disable areas by clicking the 'eye' icon.<br /><br />You can add content to widget areas from the %sWidgets Management screen%s.<br /><br />'Page Content' is the actual content of the page on which this template is applied. This can be used in special situations for creating extra customizable content.", 'dispatch'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
		'id' => 'widgetized_template_sections',
		'std' => array(
			'slider_html' => '1,1',
			'slider_img'  => '2,1',
			'area_a'      => '3,1',
			'area_b'      => '4,1',
			'area_c'      => '5,1',
			'area_d'      => '6,1',
			'content'     => '7,0', ),
		'type' => 'sortlist',
		'settings' => array(
			'hideable' => true,
			),
		'options' => array(
			'slider_html' => $slider1_label,
			'slider_img'  => $slider2_label,
			'area_a'      => __('Widget Area A', 'dispatch'),
			'area_b'      => __('Widget Area B', 'dispatch'),
			'area_c'      => __('Widget Area C', 'dispatch'),
			'area_d'      => __('Widget Area D-left / D-right', 'dispatch'),
			'content'     => __('Page Content', 'dispatch'), ) );

	$options[] = array(
		'name' => __('Widget Area D Widths', 'dispatch'),
		'desc' => __('Widths for D-Left and D-Right Areas', 'dispatch'),
		'id' => 'widgetized_template_area_d_width',
		'std' => '50-50',
		'type' => 'select',
		'options' => array(
			'50-50' => __('50 50', 'dispatch'),
			'33-66' => __('33 66', 'dispatch'),
			'66-33' => __('66 33', 'dispatch'),
			'25-75' => __('25 75', 'dispatch'),
			'75-25' => __('75 25', 'dispatch'), ) );

	$options[] = array(
		'name' => __('Highlight Widget Areas (Highlgihted Background)', 'dispatch'),
		'desc' => __('Check which areas from the above template you want to be highlgihted.', 'dispatch'),
		'id' => 'widgetized_highlight_template_area',
		'type' => 'multicheck',
		'options' => array(
			'area_a'      => __('Widget Area A', 'dispatch'),
			'area_b'      => __('Widget Area B', 'dispatch'),
			'area_c'      => __('Widget Area C', 'dispatch'),
			'area_d'      => __('Widget Area D', 'dispatch'),
			'content'     => __('Page Content Area', 'dispatch'), ) );

	$options[] = array(
		'name' => $slider1_label,
		'type' => 'subheading');

	$options[] = array(
		'name' => __("Slider Width (in Stretched Site Layout)", 'dispatch'),
		'desc' => __("Enable this to stretch the slider to Full Screen Width.<br />Note: This option is useful only if the <strong>'Site Layout'</strong> is set to <strong>'Stretched (full width)'</strong> in the 'Layout' tab above.", 'dispatch'),
		'id' => "wt_html_slider_width",
		'std' => "boxed",
		'type' => "images",
		'options' => array(
			'boxed' => $imagepath . 'slider-width-boxed.png',
			'stretch' => $imagepath . 'slider-width-stretch.png', )
	);

	$options[] = array(
		'name' => __('Slides', 'dispatch'),
		'desc' => __('Premium version of this theme comes with capability to create <strong>Unlimited slides</strong>.', 'dispatch'),
		'id' => 'wt_html_slider',
		'std' => array( 'g0' => array(), 'g1' => array(), 'g2' => array(), 'g3' => array() ),
		'type' => 'group',
		'settings' => array(
			'title' => __( 'Slide', 'dispatch' ),
			'add_button' => __( 'Add New Slide', 'dispatch' ),
			'remove_button' => __( 'Remove Slide', 'dispatch' ),
			),
		'fields' => array(
			array(
				'name' => __('To hide this slide, simply leave the Image, Title and Content empty.', 'dispatch'),
				'type' => 'info'),
			array(
				'name' => __('Slide Image', 'dispatch'),
				'id' => 'image',
				'type' => 'upload'),
			array(
				'name' => __('Title', 'dispatch'),
				'id' => 'title',
				'type' => 'text'),
			array(
				'name' => __('Content', 'dispatch'),
				'id' => 'content',
				'type' => 'textarea',
				'settings' => array( 'rows' => 4 ) ),
			array(
				'name' => __('Link Text', 'dispatch'),
				'id' => 'button',
				'type' => 'text'),
			array(
				'name' => __('Link URL', 'dispatch'),
				'desc' => __('Leave empty if you do not want to show the link.', 'dispatch'),
				'id' => 'url',
				'type' => 'text'),
			array(
				'name' =>  __('Slide Background', 'dispatch'),
				'desc' => __('This can be useful if you are using transparent images', 'dispatch'),
				'id' => 'background',
				'std' => '#ffffff',
				'type' => 'color', ),
			), );

	$options[] = array(
		'name' => $slider2_label,
		'type' => 'subheading');

	$options[] = array(
		'name' => __("Slider Width (in Stretched Site Layout)", 'dispatch'),
		'desc' => __("Enable this to stretch the slider to Full Screen Width.<br />Note: This option is useful only if the <strong>'Site Layout'</strong> is set to <strong>'Stretched (full width)'</strong> in the 'Layout' tab above.", 'dispatch'),
		'id' => "wt_img_slider_width",
		'std' => "boxed",
		'type' => "images",
		'options' => array(
			'boxed' => $imagepath . 'slider-width-boxed.png',
			'stretch' => $imagepath . 'slider-width-stretch.png', )
	);

	$options[] = array(
		'name' => __('Slides', 'dispatch'),
		'desc' => __('Premium version of this theme comes with capability to create <strong>Unlimited slides</strong>.', 'dispatch'),
		'id' => 'wt_img_slider',
		'std' => array( 'g0' => array(), 'g1' => array(), 'g2' => array(), 'g3' => array() ),
		'type' => 'group',
		'settings' => array(
			'title' => __( 'Slide', 'dispatch' ),
			'add_button' => __( 'Add New Slide', 'dispatch' ),
			'remove_button' => __( 'Remove Slide', 'dispatch' ),
			),
		'fields' => array(
			array(
				'name' => __('To hide this slide, simply leave the Image empty.', 'dispatch'),
				'type' => 'info'),
			array(
				'name' => __('Slide Image', 'dispatch'),
				'desc' => __('The main showcase image.', 'dispatch'),
				'id' => 'image',
				'type' => 'upload'),
			array(
				'name' => __('Slide Caption (optional)', 'dispatch'),
				'id' => 'caption',
				'type' => 'text'),
			array(
				'name' => __('Slide Link', 'dispatch'),
				'desc' => __('Leave empty if you do not want to link the slide.', 'dispatch'),
				'id' => 'url',
				'type' => 'text'),
			), );

	endif; // end 'hoot-widgetized-template' supported theme options

	// Add Premium Tab
	$options_premium = include_once( trailingslashit( HOOT_THEMEDIR ) . 'admin/premium.php' );
	if ( is_array( $options_premium ) && !empty( $options_premium ) ) {

		$premium = '';
		foreach ( $options_premium as $option_premium ) {
			$premium .= '<div class="section section-info section-premium-info">';
			if ( !empty( $option_premium['desc'] ) ) {
				$premium .= '<div class="premium-info">';
				$premium .= '<div class="premium-info-text controls">';
				if ( !empty( $option_premium['name'] ) )
					$premium .= '<h4 class="heading">' . $option_premium['name'] . '</h4>';
				$premium .= $option_premium['desc'];
				$premium .= '</div>';
				if ( !empty( $option_premium['img'] ) )
					$premium .= '<div class="premium-info-img explain">' .
								'<img src="' . esc_url( $imagepath . $option_premium['img'] ) . '" />' .
								'</div>';
				$premium .= '<div class="clear"></div>';
				$premium .= '</div>';
			} elseif ( !empty( $option_premium['name'] ) ) {
				$premium .= '<h4 class="heading">' . $option_premium['name'] . '</h4>';
			}
			if ( !empty( $option_premium['std'] ) )
				$premium .= $option_premium['std'];
			$premium .= '</div>';
		}

		$options[] = array(
			'name' => __('Premium Options', 'dispatch'),
			'type' => 'heading');
		$options[] = array(
			'std' => $premium,
			'type' => 'html');
	}

	/* Return Hoot Options Array */
	return $options;
}