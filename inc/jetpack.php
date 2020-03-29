<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function lite_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'scroll-wrap',
		'footer_widgets' => true,
		'render'    => 'lite_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'lite_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function lite_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}

 /*
 * Change the posts_per_page Infinite Scroll setting from 10 to 9
 */
function lite_infinite_scroll_settings( $args ) {
    if ( is_array( $args ) )
        $args['posts_per_page'] = 9;
    return $args;
}
add_filter( 'infinite_scroll_settings', 'lite_infinite_scroll_settings' );
