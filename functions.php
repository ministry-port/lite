<?php
/**
 * lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lite
 */

if ( ! function_exists( 'lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lite, use a find and replace
	 * to change 'lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lite', get_template_directory() . '/languages' );

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
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-img', 480, 360, true );
	add_image_size( 'lite-blog', 1600, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main' => __( 'Primary Menu',      'lite' ),
		'social'  => __( 'Social Links Menu', 'lite' ),
	) );

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

	// Add Excerpt support to pages
	add_post_type_support( 'page', 'excerpt' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lite_content_width', 1170 );
}
add_action( 'after_setup_theme', 'lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidelites/#registering-a-sidelite
 */
function lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lite_widgets_init' );

if ( ! function_exists( 'lite_fonts_url' ) ) :
/**
 * Register Google fonts for lite.
 *
 * Create your own lite_fonts_url() function to override in a child theme.
 *
 * @since lite 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'lite' ) ) {
		$fonts[] = 'Lato:400,700';
	}

	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'lite' ) ) {
		$fonts[] = 'Raleway:200,300,400,600,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function lite_scripts() {
	wp_enqueue_style( 'lite-style', get_stylesheet_uri() );

	wp_enqueue_style( 'google-font', lite_fonts_url(), array(), null );

	// Font Awesome
	wp_register_style( 'font-fontawesome', get_stylesheet_directory_uri() . '/assets/fonts/css/all.min.css', array(), '20151215' );
	wp_enqueue_style( 'font-fontawesome' );

	wp_enqueue_script( 'lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lite_scripts' );

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
