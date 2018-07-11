<?php
/**
 * Custom scripts and styles.
 *
 * @package kgbtexas
 */

/**
 * Register Google font.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 * @return string
 */
function kgbtexas__font_url() {

	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by the following, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto    = esc_html_x( 'on', 'Roboto font: on or off', 'kgbtexas' );
	$open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'kgbtexas' );

	if ( 'off' !== $roboto || 'off' !== $open_sans ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,700';
		}

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,300,700';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function kgbtexas__scripts() {
	/**
	 * If WP is in script debug, or we pass ?script_debug in a URL - set debug to true.
	 */
	$debug = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) || ( isset( $_GET['script_debug'] ) ) ? true : false;

	/**
	 * If we are debugging the site, use a unique version every page load so as to ensure no cache issues.
	 */
	$version = '1.0.0';

	/**
	 * Should we load minified files?
	 */
	$suffix = ( true === $debug ) ? '' : '.min';

	/**
	 * Global variable for IE.
	 */
	global $is_IE;

	// Register styles & scripts.
	wp_register_style( 'kgbtexas-google-font', kgbtexas__font_url(), array(), null );
	wp_register_style( 'slick-carousel', get_template_directory_uri() . '/assets/bower_components/slick-carousel/slick/slick.css', null, '1.6.0' );
	wp_register_script( 'slick-carousel', get_template_directory_uri() . '/assets/bower_components/slick-carousel/slick/slick' . $suffix . '.js', array( 'jquery' ), '1.6.0', true );

	// Enqueue styles.
	wp_enqueue_style( 'kgbtexas-google-font' );
	wp_enqueue_style( 'kgbtexas-style', get_stylesheet_directory_uri() . '/style' . $suffix . '.css', array(), $version );

	// Enqueue scripts.
	if ( $is_IE ) {
		wp_enqueue_script( 'kgbtexas-babel-polyfill', get_template_directory_uri() . '/assets/scripts/babel-polyfill.min.js', array(), $version, true );
	}

	wp_enqueue_script( 'kgbtexas-scripts', get_template_directory_uri() . '/assets/scripts/project' . $suffix . '.js', array( 'jquery' ), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue the scaffolding Library script.
	if ( is_page_template( 'template-scaffolding.php' ) ) {
		wp_enqueue_script( 'kgbtexas-scaffolding', get_template_directory_uri() . '/assets/scripts/scaffolding' . $suffix . '.js', array( 'jquery' ), $version, true );
	}
}
add_action( 'wp_enqueue_scripts', 'kgbtexas__scripts' );

/**
 * Enqueue scripts for the customizer.
 *
 * @author Corey Collins
 */
function kgbtexas__customizer_scripts() {

	/**
	 * If WP is in script debug, or we pass ?script_debug in a URL - set debug to true.
	 */
	$debug = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) || ( isset( $_GET['script_debug'] ) ) ? true : false;

	/**
	 * If we are debugging the site, use a unique version every page load so as to ensure no cache issues.
	 */
	$version = '1.0.0';

	/**
	 * Should we load minified files?
	 */
	$suffix = ( true === $debug ) ? '' : '.min';

	wp_enqueue_script( 'kgbtexas__customizer', get_template_directory_uri() . '/assets/scripts/customizer' . $suffix . '.js', array( 'jquery' ), $version, true );
}
add_action( 'customize_controls_enqueue_scripts', 'kgbtexas__customizer_scripts' );

/**
 * Add SVG definitions to footer.
 */
function kgbtexas__include_svg_icons() {

	// Define SVG sprite file.
	$svg_icons = get_template_directory() . '/assets/images/svg-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once $svg_icons;
	}
}
add_action( 'wp_footer', 'kgbtexas__include_svg_icons', 9999 );
