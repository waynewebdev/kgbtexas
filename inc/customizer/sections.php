<?php
/**
 * Customizer sections.
 *
 * @package kgbtexas
 */

/**
 * Register the section sections.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function kgbtexas__customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'kgbtexas__additional_scripts_section',
		array(
			'title'    => esc_html__( 'Additional Scripts', 'kgbtexas' ),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'kgbtexas__social_links_section',
		array(
			'title'       => esc_html__( 'Social Media', 'kgbtexas' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'kgbtexas' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'kgbtexas__header_section',
		array(
			'title'    => esc_html__( 'Header Customizations', 'kgbtexas' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'kgbtexas__footer_section',
		array(
			'title'    => esc_html__( 'Footer Customizations', 'kgbtexas' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);
}
add_action( 'customize_register', 'kgbtexas__customize_sections' );
