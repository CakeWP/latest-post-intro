<?php
/**
 * Plugin Name:       Latest Post Block
 * Description:       A simple dynamic block used to display introduction for the latest available post.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            gutenberghub
 * License:           MIT
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       latest-post-intro
 *
 * @package           gutenberghub
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function gutenberghub_latest_post_intro_block_init() {
	register_block_type( __DIR__ . '/build', array(
		'render_callback' => function() {

			$recent_post = wp_get_recent_posts( array(
				'numberposts' => 1,
				'post_status' => 'publish',
				'post_type' => 'post',
			) );

			$recent_post = reset( $recent_post );

			if ( empty( $recent_post ) ) {
				return "";
			}

			$recent_post_title = $recent_post['post_title'];
			$recent_post_excerpt = $recent_post['post_excerpt'];
			$recent_post_permalink = get_permalink( $recent_post );

			return "
				<div class='wp-block-gutenberghub-latest-post-intro'>
					<a target='_blank' href='$recent_post_permalink'>$recent_post_title</a>
					<p>$recent_post_excerpt</p>
				</div>
			";
		}
	) );
}
add_action( 'init', 'gutenberghub_latest_post_intro_block_init' );
