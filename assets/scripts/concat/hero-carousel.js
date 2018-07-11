/**
 * File hero-carousel.js
 *
 * Create a carousel if we have more than one hero slide.
 */
window.wdsHeroCarousel = {};
( function( window, $, app ) {

	// Constructor.
	app.init = function() {
		app.cache();

		if ( app.meetsRequirements() ) {
			app.bindEvents();
		}
	};

	// Cache all the things.
	app.cache = function() {
		app.$c = {
			window: $( window ),
			heroCarousel: $( '.carousel' )
		};
	};

	// Combine all events.
	app.bindEvents = function() {
		app.$c.window.on( 'load', app.doSlick );
		app.$c.window.on( 'load', app.doFirstAnimation );
	};

	// Do we meet the requirements?
	app.meetsRequirements = function() {
		return app.$c.heroCarousel.length;
	};

	// Animate the first slide on window load.
	app.doFirstAnimation = function() {

		// Get the first slide content area and animation attribute.
		let firstSlide = app.$c.heroCarousel.find( '[data-slick-index=0]' ),
			firstSlideContent = firstSlide.find( '.hero-content' ),
			firstAnimation = firstSlideContent.attr( 'data-animation' );

		// Add the animation class to the first slide.
		firstSlideContent.addClass( firstAnimation );
	};

	// Animate the slide content.
	app.doAnimation = function() {
		let slides = $( '.slide' ),
			activeSlide = $( '.slick-current' ),
			activeContent = activeSlide.find( '.hero-content' ),

			// This is a string like so: 'animated someCssClass'.
			animationClass = activeContent.attr( 'data-animation' ),
			splitAnimation = animationClass.split( ' ' ),

			// This is the 'animated' class.
			animationTrigger = splitAnimation[0];

		// Go through each slide to see if we've already set animation classes.
		slides.each( function() {
			let slideContent = $( this ).find( '.hero-content' );

			// If we've set animation classes on a slide, remove them.
			if ( slideContent.hasClass( 'animated' ) ) {

				// Get the last class, which is the animate.css class.
				let lastClass = slideContent
					.attr( 'class' )
					.split( ' ' )
					.pop();

				// Remove both animation classes.
				slideContent.removeClass( lastClass ).removeClass( animationTrigger );
			}
		} );

		// Add animation classes after slide is in view.
		activeContent.addClass( animationClass );
	};

	// Allow background videos to autoplay.
	app.playBackgroundVideos = function() {

		// Get all the videos in our slides object.
		$( 'video' ).each( function() {

			// Let them autoplay. TODO: Possibly change this later to only play the visible slide video.
			this.play();
		} );
	};

	// Kick off Slick.
	app.doSlick = function() {
		app.$c.heroCarousel.on( 'init', app.playBackgroundVideos );

		app.$c.heroCarousel.slick( {
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: false,
			dots: false,
			focusOnSelect: true,
			waitForAnimate: true
		} );

		app.$c.heroCarousel.on( 'afterChange', app.doAnimation );
	};

	// Engage!
	$( app.init );
} ( window, jQuery, window.wdsHeroCarousel ) );
