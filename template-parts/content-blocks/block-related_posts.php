<?php
/**
 * The template used for displaying related posts.
 *
 * @package kgbtexas
 */

// Set up fields.
$title           = get_sub_field( 'title' );
$related_posts   = get_sub_field( 'related_posts' );
$animation_class = kgbtexas__get_animation_class();

// Display section if we have any posts.
if ( $related_posts ) :

	// Start a <container> with possible block options.
	kgbtexas__display_block_options(
		array(
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block grid-container related-posts', // Container class.
		)
	);

	?>

	<div class="grid-x">
	<?php if ( $title ) : ?>
		<h2 class="content-block-title"><?php echo esc_html( $title ); ?></h2>
	<?php endif; ?>
	</div>

	<div class="grid-x <?php echo esc_attr( $animation_class ); ?>">

		<?php
		// Loop through recent posts.
		foreach ( $related_posts as $key => $post ) :

			// Convert post object to post data.
			setup_postdata( $post );

			// Display a card.
			kgbtexas__display_card( array(
				'title' => get_the_title(),
				'image' => kgbtexas__get_post_image_url( 'medium' ),
				'text'  => kgbtexas__get_the_excerpt( array(
					'length' => 20,
					'more'   => '...',
				) ),
				'url'   => get_the_permalink(),
				'class' => 'cell',
			) );
		endforeach;
		wp_reset_postdata();
	?>
	</div><!-- .grid-x -->
</section><!-- .recent-posts -->
<?php endif; ?>
