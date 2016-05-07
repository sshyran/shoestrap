<?php
/**
 * Shoestrap Theme Customizer.
 *
 * @package Shoestrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shoestrap_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'shoestrap_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shoestrap_customize_preview_js() {
	wp_enqueue_script( 'shoestrap_customizer', trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'shoestrap_customize_preview_js' );

include_once wp_normalize_path( get_template_directory() . '/inc/classes/class-shoestrap-kirki.php' );
if ( class_exists( 'Shoestrap_Kirki' ) ) {

	// Add the Configuration.
	Shoestrap_Kirki::add_config( 'shoestrap', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	));

	// Include files for panels, section & fields.
	include_once wp_normalize_path( get_template_directory() . '/inc/customizer/panels.php' );
	include_once wp_normalize_path( get_template_directory() . '/inc/customizer/sections.php' );
	include_once wp_normalize_path( get_template_directory() . '/inc/customizer/fields.php' );
}
