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
}
add_action( 'customize_register', 'customwebsite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customwebsite_customize_preview_js() {
	wp_enqueue_script( 'customwebsite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'customwebsite_customize_preview_js' );
