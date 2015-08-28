<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Custom Website
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses customwebsite_header_style()
 * @uses customwebsite_admin_header_style()
 * @uses customwebsite_admin_header_image()
 */
function customwebsite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'customwebsite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'customwebsite_header_style',
		'admin-head-callback'    => 'customwebsite_admin_header_style',
		'admin-preview-callback' => 'customwebsite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'customwebsite_custom_header_setup' );

if ( ! function_exists( 'customwebsite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see customwebsite_custom_header_setup().
 */
function customwebsite_header_style() {
	$favicon_icon = get_theme_mod('favicon_icon');
	$header_text_color = get_header_textcolor();
	$body_text_color = get_theme_mod('body_text_color');
	$link_color = get_theme_mod('link_color');
	$link_hover_color = get_theme_mod('link_hover_color');
	$nav_link_color = get_theme_mod('nav_link_color');
	$text_padding_side = get_theme_mod('default_template_text_padding_side');
	$body_font_url = get_theme_mod('body_font_url');
	$body_font_family = get_font_family('body');
	$heading_font_url = get_theme_mod('heading_font_url');
	$heading_font_family = get_font_family('heading');
	$alternative_font_url = get_theme_mod('alternative_font_url');
	$alternative_font_family = get_font_family('alternative');
	if ($favicon_icon) {
		printf('<link rel="icon shortcut" href="%1$s" sizes="16x16" />',
			esc_attr($favicon_icon)
		);
	}
	if ($body_font_url) {
		wp_register_style('body_font', $body_font_url);
		wp_enqueue_style('body_font');
	}
	if ($heading_font_url && ($heading_font_url !== $body_font_url)) {
		wp_register_style('heading_font', $heading_font_url);
		wp_enqueue_style('heading_font');
	}
	if ($alternative_font_url && ($alternative_font_url !== $body_font_url)) {
		wp_register_style('alternative_font', $alternative_font_url);
		wp_enqueue_style('alternative_font');
	}
	?>
	<style type="text/css">
	<?php
	
	if ( 'blank' == $header_text_color ) : ?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php else : ?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>

	<?php if ($body_text_color) : ?>
		body, p {
			color: <?php echo  esc_attr($body_text_color); ?>;
		}
	<?php endif; ?>
	<?php if ($link_color) : ?>
		a, a:visited {
			color: <?php echo  esc_attr($link_color); ?>;
		}
	<?php endif; ?>

	<?php if ($link_hover_color) : ?>
		a:hover {
			color: <?php echo  esc_attr($link_hover_color); ?>;
		}
	<?php endif; ?>

	<?php if ($link_color) : ?>
		.main-navigation a, .main-navigation a:visited {
			color: <?php echo  esc_attr($nav_link_color); ?>;
		}
	<?php endif; ?>

	<?php if ($body_font_family) : ?>
		.font-body, body, html, p, button, input, select, textarea, .pure-g [class *= "pure-u"] {
			font-family: <?php echo $body_font_family; ?>;
		}
	<?php endif; ?>
	<?php if ($heading_font_family) : ?>
		.font-heading, h1, h2, h3, h4, h5, h6 {
			font-family: <?php echo $heading_font_family; ?>;
		}
	<?php endif; ?>
	<?php if ($alternative_font_family) : ?>
		.font-alternative {
			font-family: <?php echo $alternative_font_family; ?>;
		}
	<?php endif; ?>
	<?php if (isset($text_padding_side)) : ?>
		.site-content p,
		.site-content h1,
		.site-content h2,
		.site-content h3,
		.site-content h4,
		.site-content h5,
		.site-content h6,
		.site-content form {
			padding-left: <?php echo $text_padding_side; ?>;
			padding-right: <?php echo $text_padding_side; ?>;
		}
	<?php endif; ?>
	</style>
<?php }
endif; // customwebsite_header_style

/**
 * Builds the font family string to be used by the css font-family property.
 * @param string $element
 * @return string
 */
function get_font_family($element) {
	$fonts = array();
	$font_family_primary = get_theme_mod($element . '_font_family_primary');
	if ($font_family_primary) {
		$fonts[] = esc_attr($font_family_primary);
	}
	$fonts[] = esc_attr(get_theme_mod($element . '_font_family_secondary', 'sans-serif'));
	return '"' . implode('","', $fonts) . '"';
}

if ( ! function_exists( 'customwebsite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see customwebsite_custom_header_setup().
 */
function customwebsite_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // customwebsite_admin_header_style

if ( ! function_exists( 'customwebsite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see customwebsite_custom_header_setup().
 */
function customwebsite_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // customwebsite_admin_header_image
