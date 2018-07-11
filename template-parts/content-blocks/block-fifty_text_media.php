<?php
/**
 *  The template used for displaying fifty/fifty text/media.
 *
 * @package kgbtexas
 */

// Set up fields.
$image_data      = get_sub_field( 'media_right' );
$text            = get_sub_field( 'text_primary' );
$animation_class = kgbtexas__get_animation_class();

// Start a <container> with a possible media background.
kgbtexas__display_block_options( array(
	'container' => 'section', // Any HTML5 container: section, div, etc...
	'class'     => 'content-block grid-container fifty-fifty fifty-text-media', // Container class.
) );
?>
	<div class="grid-x <?php echo esc_attr( $animation_class ); ?>">

		<div class="cell">
			<?php
				echo force_balance_tags( $text ); // WPCS: XSS OK.
			?>
		</div>

		<div class="cell">
			<img class="fifty-media-image" src="<?php echo esc_url( $image_data['url'] ); ?>" alt="<?php echo esc_html( $image_data['alt'] ); ?>">
		</div>

	</div><!-- .grid-x -->
</section><!-- .fifty-text-media -->
