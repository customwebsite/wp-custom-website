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
	$header_text_color = get_header_textcolor();
	$link_color = get_theme_mod('link_color');
	$link_hover_color = get_theme_mod('link_hover_color');
	$nav_link_color = get_theme_mod('nav_link_color');
	?>
	<style type="text/css">
	<?php if ( 'blank' == $header_text_color ) : ?>
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
	</style>
	<?php
}
endif; // customwebsite_header_style

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
