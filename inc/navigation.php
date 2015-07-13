<?php

require_once('wp_purecss_navwalker.php');

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Primary Menu', 'customwebsite' ),
) );

function modify_nav_menu_args( $args ) {
	// Check if this is a purecss menu
	if (isset($args['menu_type']) && $args['menu_type'] == 'purecss') {
		$args['walker'] = new wp_purecss_navwalker();
		$args['fallback_cb'] = 'wp_purecss_navwalker::fallback';
		$args['menu_class'] = 'pure-menu-list';
		$args['container_class'] = 'pure-menu pure-menu-horizontal';
	}
	// Specific to Primary Menu
	if($args['theme_location'] == 'primary') {
		$args['menu_id'] = 'primary-menu';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'modify_nav_menu_args' );
