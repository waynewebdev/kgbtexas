<?php
/**
 * The template used for displaying icons in the scaffolding library.
 *
 * @package kgbtexas
 */

?>

<section class="section-scaffolding">

	<h2 class="scaffolding-heading"><?php esc_html_e( 'Icons', 'kgbtexas' ); ?></h2>

	<?php
	// SVG Icon.
	kgbtexas__display_scaffolding_section( array(
		'title'       => 'SVG',
		'description' => 'Display inline SVGs.',
		'usage'       => '<?php kgbtexas__display_svg( array(
			\'icon\'   => \'facebook-square\',
			\'title\'  => \'Facebook Icon\',
			\'desc\'   => \'Facebook social icon svg\',
			\'height\' => \'50\',
			\'width\'  => \'50\',
			\'fill\'   => \'#20739a\',
		) ); ?>',
		'parameters'  => array(
			'$args' => '(required) Configuration arguments.',
		),
		'arguments'   => array(
			'icon'   => '(required) The SVG icon file name. Default none',
			'title'  => '(optional) The title of the icon. Default: none',
			'desc'   => '(optional) The description of the icon. Default: none',
			'fill'   => '(optional) The fill color of the icon. Default: none',
			'height' => '(optional) The height of the icon. Default: none',
			'width'  => '(optional) The width of the icon. Default: none',
		),
		'output'      => kgbtexas__get_svg( array(
			'icon'   => 'facebook-square',
			'title'  => 'Facebook Icon',
			'desc'   => 'Facebook social icon svg',
			'height' => '50',
			'width'  => '50',
			'fill'   => '#20739a',
		) ),
	) );
	?>
</section>
