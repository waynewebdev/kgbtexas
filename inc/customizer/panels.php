<?php
/**
 * Customizer panels.
 *
 * @package kgbtexas
 */

/**
 * Add a custom panels to attach sections too.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function kgbtexas__customize_panels( $wp_customize ) {

	// Register a new panel.
	$wp_customize->add_panel(
		'site-options', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Site Options', 'kgbtexas' ),
			'description'    => esc_html__( 'Other theme options.', 'kgbtexas' ),
		)
	);
}
add_action( 'customize_register', 'kgbtexas__customize_panels' );
