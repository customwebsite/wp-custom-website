<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Custom Website
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'customwebsite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
		<?php
			$header_logo = get_theme_mod('header_logo');
			if ($header_logo) {
				printf('<img src="%1$s" alt="%2$s %3$s" class="%4$s" />',
					$header_logo,
					get_bloginfo('name'),
					__('Logo', 'customwebsite'),
					get_header_logo_class());
			}
		?>
		<nav id="site-navigation" class="main-navigation custom-wrapper" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_type' => 'purecss', 'menuToggle' => get_theme_mod('nav_menu_toggle')));?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
