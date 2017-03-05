<?php
/**
 * @package Page Sidebar for TwentySeventeen
 * @author Joachim Jensen <jv@intox.dk>
 * @license GPLv3
 * @copyright 2017 by Joachim Jensen
 */
/*
 * Plugin Name: Page Sidebar for TwentySeventeen
 * Plugin URI:  https://mythemeshop.com/plugins/wp-quiz/
 * Description: Adds the main sidebar to pages. Install Content Aware Sidebars for customization.
 * Version:     1.0
 * Author:      Joachim Jensen
 * Author URI:  https://dev.institute
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if sidebar should be added
 *
 * @since  1.0
 * @return boolean
 */
function psts_in_context() {
	return is_page() && !is_front_page();
}

/**
 * Add relevant classes to body
 *
 * @since  1.0
 * @param  array  $classes
 * @return array
 */
function psts_body_classes( $classes ){
if ( psts_in_context() && is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-sidebar';
	}
	return $classes;
}

/**
 * Include page template
 *
 * @since  1.0
 * @param  string  $original_template
 * @return string
 */
function psts_template( $original_template ) {
	if ( psts_in_context() ) {
		$original_template = plugin_dir_path( __FILE__ ) . 'templates/page.php';
	}
	return $original_template;
}

add_filter( 'body_class', 'psts_body_classes' );
add_filter( 'template_include', 'psts_template' );