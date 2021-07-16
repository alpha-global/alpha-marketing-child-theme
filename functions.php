<?php
/**
 * Child theme main functions
 *
 * @package Alpha
 */

/**
 * Enqueue styles
 *
 * @return void
 */
function alpha_child_enqueue_styles() {
	$parenthandle = 'alpha-parent-style';
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get( 'Version' ) );
	wp_enqueue_style( 'alpha-child-style', get_stylesheet_uri(), array( $parenthandle ), $theme->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'alpha_child_enqueue_styles' );
