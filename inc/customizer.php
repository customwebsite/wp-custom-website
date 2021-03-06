<?php
/**
 * Custom Website Theme Customizer
 *
 * @package Custom Website
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customwebsite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Site Title */
	$wp_customize->add_setting(
		'favicon_icon',
		array(
			'default' => '',
			'transport' => 'refresh',
			// TODO: Add sanitation to restrict image to 16px by 16px
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'favicon_icon',
		array(
			'label' => __('A 16px by 16px version of the site icon to be used for tabs within browsers.', 'customwebsite'),
			'section' => 'title_tagline'
		)
	) );
	$wp_customize->add_setting(
		'banner_hide_too_large' , array(
			'default'     => false,
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'banner_hide_too_large',
		array(
			'label' => __( 'Hide the Header Banner if the window is wider than the banner.', 'customwebsite' ),
			'type' => 'radio',
			'choices' => array(
				true => __('Yes', 'customwebsite'),
				'' => __('No', 'customwebsite'),
			),
			'section' => 'header_image',
		)
	);
	$wp_customize->add_setting(
		'header_logo' , array(
			'default'     => null,
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'header_logo',
		array(
			'label' => __( 'Header Logo', 'customwebsite' ),
			'description' => __('The logo to be displayed within the website header..', 'customwebsite'),
			'type' => 'image',
			'section' => 'header_image',
		)
	) );
	$wp_customize->add_setting(
		'header_logo_width' , array(
			'default'     => '200px',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'header_logo_width',
		array(
			'label' => __( 'Header Logo Width', 'customwebsite' ),
			'type' => 'text',
			'section' => 'header_image',
		)
	);
	$wp_customize->add_setting(
		'header_logo_location' , array(
			'default'     => HEADER_LOGO_LOCATION_NAV_ABOVE,
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'header_logo_location',
		array(
			'label' => __( 'Location of Header Logo', 'customwebsite' ),
			'description' => __('Select where the header logo will be displayed, if at all.', 'customwebsite'),
			'type' => 'radio',
			'choices' => array(
				HEADER_LOGO_LOCATION_NONE => __("Dont't Display"),
				HEADER_LOGO_LOCATION_NAV_LEFT => __('Left of Navigation Bar'),
				HEADER_LOGO_LOCATION_NAV_RIGHT => __('Right of Navigation Bar'),
				HEADER_LOGO_LOCATION_NAV_ABOVE => __('Above Navigation Bar'),
				HEADER_LOGO_LOCATION_NAV_BELOW => __('Below Navigation Bar'),
			),
			'section' => 'header_image',
		)
	);

	// Navigation
	$wp_customize->add_section(
        'navigation',
        array(
            'title' => __('Navigation', 'customwebsite'),
            'priority' => 50,
        )
    );
	$wp_customize->add_setting(
		'nav_menu_toggle' , array(
			'default'     => true,
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'nav_menu_toggle',
		array(
			'label' => __( 'Primary Navigation Menu Toggle', 'customwebsite' ),
			'description' => __('Select if the navigation menu will have toggle a vertical menu for smaller screens.', 'customwebsite'),
			'type' => 'radio',
			'choices' => array(
				true => __('Yes', 'customwebsite'),
				'' => __('No', 'customwebsite'),
			),
			'section' => 'navigation',
		)
	);
	
	/* COLORS */
	$wp_customize->add_setting( 
		'background_nav_color' , array(
			'default'     => '#FFFFFF',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'background_nav_color',
		array(
			'label' => __( 'The background color for the navigation bar', 'customwebsite' ),
			'section' => 'colors',
		)
	));
	$wp_customize->add_setting( 
		'background_footer_color' , array(
			'default'     => '#FFFFFF',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'background_footer_color',
		array(
			'label' => __( 'The background color for the footer bar', 'customwebsite' ),
			'section' => 'colors',
		)
	));
	$wp_customize->add_setting( 
		'body_text_color' , array(
			'default'     => '#353432',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'body_text_color',
		array(
			'label' => __( 'Body Text Color', 'customwebsite' ),
			'section' => 'colors',
		)
	));

	$wp_customize->add_setting( 
		'link_color' , array(
			'default'     => '#2F4D8D',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'link_color',
		array(
			'label' => __( 'Link Color', 'customwebsite' ),
			'description' => __( 'By default the visited link color is the same as links which have not been visited' ),
			'section' => 'colors',
		)
	));

	$wp_customize->add_setting(
		'link_hover_color' , array(
			'default'     => '#2F4D8D',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'link_hover_color',
		array(
			'label' => __( 'Link Hover Color', 'customwebsite' ),
			'section' => 'colors',
		)
	));

	$wp_customize->add_setting(
		'nav_link_color' , array(
			'default'     => '#2F4D8D',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'nav_link_color',
		array(
			'label' => __( 'Navigation Link Color', 'customwebsite' ),
			'section' => 'colors',
		)
	));

	// Fonts section
	$wp_customize->add_section(
        'fonts',
        array(
            'title' => __('Fonts', 'customwebsite'),
            'priority' => 35,
        )
    );

	customizer_add_font(
		$wp_customize,
		'heading',
		'Heading',
		'http://fonts.googleapis.com/css?family=Anonymous+Pro',
		'Anonymous Pro',
		'serif');
	customizer_add_font(
		$wp_customize,
		'body',
		'Body',
		'http://fonts.googleapis.com/css?family=Roboto',
		'Roboto',
		'sans-serif');
	// Leave empty by default to reduce page load times.
	customizer_add_font(
		$wp_customize,
		'alternative',
		'Alternative',
		'',
		'',
		'sans-serif');

	// Layout
	$wp_customize->add_section(
        'layout',
        array(
            'title' => __('Layout', 'customwebsite'),
            'priority' => 30,
        )
    );
	$wp_customize->add_setting(
		'columns_sidebar_footer' , array(
			'default'     => '3',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'columns_sidebar_footer',
		array(
			'label' => __( 'Footer Columns', 'customwebsite' ),
			'description' => __('Columns to be used for the footer sidebar section above 768px in screen width.', 'customwebsite'),
			'type' => 'text',
			'section' => 'layout',
		)
	);
	$wp_customize->add_setting(
		'default_template_text_padding_side' , array(
			'default'     => '10%%',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'default_template_text_padding_side',
		array(
			'label' => __( 'Default Template Side Padding', 'customwebsite' ),
			'description' => __('Padding to be used for text elements within the content area for the default template.', 'customwebsite'),
			'type' => 'text',
			'section' => 'layout',
		)
	);
	$wp_customize->add_setting(
		'display_page_title' , array(
			'default'     => true,
			'transport'   => 'refresh',
	) );
	$wp_customize->add_control(
		'display_page_title',
		array(
			'label' => __( 'Display Page Title', 'customwebsite' ),
			'description' => __('Display the page title as a h1 element on each page.', 'customwebsite'),
			'type' => 'radio',
			'choices' => array(
				true => __('Yes'),
				'' => __('No'),
			),
			'section' => 'layout',
		)
	);
}
add_action( 'customize_register', 'customwebsite_customize_register' );

/**
 * Creates settings and controls for fonts
 *
 * @param string $id must be unique and contain only lowercase letters and optional underscore
 * @param string $title Can be any string describing the font
 * @param string $default_url url to the font css script
 * @param string $default_primary the name of the Primary font to be used
 * @param string $default_secondary the name of the Secondary font to be used
 */
function customizer_add_font(
		$wp_customize, 
		$id = 'body',
		$title = 'Body',
		$default_url = '',
		$default_primary = '',
		$default_secondary = 'sans') {
	$wp_customize->add_setting(
		$id . '_font_url' ,
		array(
			'default' => $default_url,
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control(
		$id . '_font_url',
		array(
			'label' => sprintf ( __( '%1$s Font', 'customwebsite' ), $title ),
			'description' => sprintf( __('The Url to the css script which defines the %1$s fonts.'), strtolower($title)),
			'type' => 'text',
			'section' => 'fonts',
		)
	);
	$wp_customize->add_setting(
		$id . '_font_family_primary' , 
		array(
			'default' => $default_primary,
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control(
		$id . '_font_family_primary',
		array(
			'label' => sprintf( __( '%1$s Primary Font', 'customwebsite' ), $title),
			'type' => 'text',
			'section' => 'fonts',
		)
	);
	$wp_customize->add_setting(
		$id . '_font_family_secondary' , 
		array(
			'default'     => 'serif',
			'transport'   => 'refresh',
		)
	);
	$wp_customize->add_control(
		$id . '_font_family_secondary',
		array(
			'label' => sprintf( __( '%1$s Secondary Font', 'customwebsite' ), $title),
			'type' => 'text',
			'section' => 'fonts',
		)
	);
}

/**
 * Returns the classnames for a the theme's logo image within the header.
 * @return string
 */
function get_header_logo_class() {
	$location = get_theme_mod('header_logo_location');
	$class = 'header-logo';
	switch ($location) {
		case HEADER_LOGO_LOCATION_NONE:
			$class .= ' header-logo-display-none';
			break;
		case HEADER_LOGO_LOCATION_NAV_LEFT:
			$class .= ' header-logo-nav-left';
			break;
		case HEADER_LOGO_LOCATION_NAV_RIGHT:
			$class .= ' header-logo-nav-right';
			break;
		case HEADER_LOGO_LOCATION_NAV_ABOVE:
			$class .= ' header-logo-nav-above';
			break;
		case HEADER_LOGO_LOCATION_NAV_BELOW:
			$class .= ' header-logo-nav-below';
			break;
	}
	return $class;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customwebsite_customize_preview_js() {
	$script = get_template_directory_uri() . '/js/customizer.js';
	wp_enqueue_script( 'customwebsite_customizer', $script, array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'customwebsite_customize_preview_js' );
