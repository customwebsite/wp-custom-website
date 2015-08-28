<?php
/**
 * Custom Website functions and definitions
 *
 * @package Custom Website
 */

if ( ! function_exists( 'customwebsite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function customwebsite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Custom Website, use a find and replace
	 * to change 'customwebsite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'customwebsite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * TODO: set_post_thumbnail_size 568px, 768px, 1024px, 1280px
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'customwebsite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // customwebsite_setup
add_action( 'after_setup_theme', 'customwebsite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function customwebsite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'customwebsite_content_width', 640 );
}
add_action( 'after_setup_theme', 'customwebsite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function customwebsite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'customwebsite' ),
		'id'            => 'sidebar-footer',
		'description'   => '',
		'before_widget' => '<div class="pure-u-1 pure-u-md-1-'
			. get_theme_mod('columns_sidebar_footer', '1')
			.'"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'customwebsite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function customwebsite_scripts() {
	wp_enqueue_style( 'customwebsite-style', get_stylesheet_uri() );
	wp_enqueue_script( 'purecss-menu-toggle', get_template_directory_uri() . '/js/purecss-menu-toggle.js', array(), '20150715', true );
	wp_enqueue_script( 'customwebsite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150715', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register Purecss used for grids and menus
	wp_register_style('purecss', 'http://yui.yahooapis.com/pure/0.6.0/menus-min.css', array(), '0.6.0');
	wp_enqueue_style('purecss');
	wp_register_style('purecss-responsive', 'http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css', array(), '0.6.0');
	wp_enqueue_style('purecss-responsive');
}
add_action( 'wp_enqueue_scripts', 'customwebsite_scripts' );

// Disable the emoji styles
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add navigation customization
 */
require get_template_directory() . '/inc/navigation.php';
