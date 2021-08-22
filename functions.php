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
	wp_enqueue_style( 'donate', get_stylesheet_directory_uri() . '/css/donation-form.css', false, '', 'all');

}
add_action( 'wp_enqueue_scripts', 'alpha_child_enqueue_styles' );

function alpha_child_load_js() {
	if (is_page('donate')) {
		wp_register_script( 'donate', get_stylesheet_directory_uri() . '/js/donate.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'donate' );
	};

	wp_register_script('osano', 'https://cmp.osano.com/AzZcqLRx57D0c6Gv/dde941b7-a2df-401e-968f-216e585dafcd/osano.js', array('jquery'), '', false);
	wp_enqueue_script( 'osano' );
}

add_action(	'get_header', 'alpha_child_load_js' );
