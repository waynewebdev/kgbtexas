<?php
/**
 * The template used for displaying forms in the scaffolding library.
 *
 * @package kgbtexas
 */

?>

<section class="section-scaffolding">

	<h2 class="scaffolding-heading"><?php esc_html_e( 'Forms', 'kgbtexas' ); ?></h2>

	<?php
		// Search form.
		$echo = false; // set echo to false so the search form outputs correctly.
		kgbtexas__display_scaffolding_section( array(
			'title'       => 'Search Form',
			'description' => 'Display the search form.',
			'usage'       => '<?php get_search_form(); ?>',
			'output'      => get_search_form( $echo ),
		) );
	?>

	<?php
	// Input.
	kgbtexas__display_scaffolding_section( array(
		'title'       => 'Input',
		'description' => 'Display a normal input.',
		'usage'       => '<input type="text">',
		'output'      => '<input type="text">',
	) );
	?>

		<?php
	// Default Select.
	kgbtexas__display_scaffolding_section( array(
		'title'       => 'Default Select',
		'description' => 'Display default select.',
		'usage'       => '<select><option value="option1">Option 1</option><option value="option2">Option 2</option></select>',
		'output'      => '<select><option value="option1">Option 1</option><option value="option2">Option 2</option></select>',
	) );
	?>
</section>
