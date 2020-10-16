<?php
/**
 * Show the appropriate content for the Video post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {

	// Render the block.
	twenty_twenty_one_print_first_instance_of_block( 'core/video', $content );

	// Add the excerpt.
	the_excerpt();
} elseif ( has_block( 'core/embed', $content ) ) {

	// Render the block.
	twenty_twenty_one_print_first_instance_of_block( 'core/embed', $content );

	// Add the excerpt.
	the_excerpt();
} else {

	// This checks if we have a core-embed block and prints it at the same time.
	// If a block was found it adds the excerpt,
	// otherwise it will fallback to the full-content for backwards-compatibility with non-block posts.
	if ( twenty_twenty_one_print_first_instance_of_block( 'core-embed/*', $content ) ) {
		// Add the excerpt.
		the_excerpt();
	} else {
		// Fallback to the full content.
		the_content();
	}
}
