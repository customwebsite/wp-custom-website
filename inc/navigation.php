<?php

// require_once('wp_purecss_navwalker.php');
require_once('pure_menu_walker.php');

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Primary Menu', 'customwebsite' ),
) );

function modify_nav_menu_args( $args ) {
	// Check if this is a purecss menu
	if (isset($args['menu_type']) && $args['menu_type'] == 'purecss') {
		$args['walker'] = new pure_menu_walker();
		$args['menu_class'] = 'pure-menu-list';
		$args['container_class'] = 'pure-menu pure-menu-horizontal custom-can-transform';
		// Is the menu toggle being displayed?
		if ($args['menuToggle']) {
			$toggleMarkup = '<div class="pure-menu-toggle"><div href="#" class="menu-toggle" id="menu-toggle"><s class="bar"></s><s class="bar"></s></a></div>';
			$args['items_wrap'] = $toggleMarkup . '<ul id="%1$s" class="%2$s">%3$s</ul>';
		}
	}
	// Specific to Primary Menu
	if($args['theme_location'] == 'primary') {
		$args['menu_id'] = 'primary-menu';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'modify_nav_menu_args' );
