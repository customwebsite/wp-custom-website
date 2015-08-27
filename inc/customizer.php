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

	/* COLORS */
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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customwebsite_customize_preview_js() {
	$script = get_template_directory_uri() . '/js/customizer.js';
	wp_enqueue_script( 'customwebsite_customizer', $script, array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'customwebsite_customize_preview_js' );
