<?php
/**
 * @package Page Sidebar for TwentySeventeen
 * @author Joachim Jensen <jv@intox.dk>
 * @license GPLv3
 * @copyright 2017 by Joachim Jensen
 */
/*
 * Plugin Name: Page Sidebar for TwentySeventeen
 * Plugin URI:  https://github.com/intoxstudio/twentyseventeen-page-sidebar/
 * GitHub Plugin URI: intoxstudio/twentyseventeen-page-sidebar
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
 * Add relevant classes to body
 *
 * @since  1.0
 * @param  array  $classes
 * @return array
 */
function psts_body_class( $classes ){
	$classes[] = 'has-sidebar';
	return $classes;
}

/**
 * Get template to be loaded
 *
 * @since  1.0
 * @param  string  $template
 * @return string
 */
function psts_template( $template ) {
	if ( is_page() && !get_page_template_slug() && is_active_sidebar( 'sidebar-1' )) {
		$name = '';
		if(!is_front_page()) {
			$name = 'page';
		} elseif(twentyseventeen_panel_count() === 0) {
			$name = 'front-page';
		}

		if($name) {
			add_filter( 'body_class', 'psts_body_class' );
			$template = plugin_dir_path( __FILE__ ) . 'templates/' . $name . '.php';
		}
	}
	return $template;
}

add_filter( 'template_include', 'psts_template' );

//