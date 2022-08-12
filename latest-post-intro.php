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
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'gutenberghub_latest_post_intro_block_init' );
