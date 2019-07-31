<?php

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function firewolf_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'firewolf_javascript_detection', 0 );


/**
 * Enqueue scripts and styles.
 */
function firewolf_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'firewolf-fonts', firewolf_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'firewolf-style', get_stylesheet_uri() );

	wp_enqueue_style( 'common-css', get_theme_file_uri( '/assets/css/theme.css' ), array( 'firewolf-style' ), '1.0' );

	wp_enqueue_script( 'firewolf-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	// Scroll effects (only loaded on front page).
	if ( is_front_page() ) {
		wp_enqueue_script( 'jquery-scrolltop', get_template_directory_uri() . '/assets/js/scrollTop.js', array( 'jquery' ), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'firewolf_scripts' );

/**
 * Register custom fonts.
 */
function firewolf_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Frankin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'libre_franklin font: on or off', 'firewolf' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
