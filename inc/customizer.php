<?php
/**
 * lite Theme Customizer.
 *
 * @package lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Add Section for Welcome Area */
	$wp_customize->add_section( 'lite_options', array(
		'title'             => esc_html__( 'Lite Options', 'lite' ),
		'description'       => esc_html__( 'Use this section to customize Lite.', 'lite' ),
		'priority'          => 127,
	) );

	/* Welcome Message Content */
	$wp_customize->add_setting( 'lite_welcome_content', array(
		'sanitize_callback' => 'wp_kses_post',
		//'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'lite_welcome_content', array(
		'label'             => esc_html__( 'Add Welcome Message', 'lite' ),
		'section'           => 'lite_options',
		'description'       => esc_html__( 'Add a welcome message to your homepage.', 'lite' ),
		'type'              => 'textarea',
	) );

	/* Footer Content */
	$wp_customize->add_setting( 'lite_footer_content', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'lite_footer_content', array(
		'label'             => esc_html__( 'Add Custom Footer Credit', 'lite' ),
		'section'           => 'lite_options',
		'description'       => esc_html__( 'Add custom footer credit. Custom footer credit will not replace social media icons if they are in use.', 'lite' ),
		'type'              => 'textarea',
	) );
}
add_action( 'customize_register', 'lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lite_customize_preview_js() {
	wp_enqueue_script( 'lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'lite_customize_preview_js' );
