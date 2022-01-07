<?php
/**
 * @package Page Sidebar for TwentySeventeen
 * @author Joachim Jensen <joachim@dev.institute>
 * @license GPLv3
 * @copyright 2022 by Joachim Jensen
 *
 * Plugin Name: Page Sidebar for Twenty Seventeen
 * Plugin URI:  https://wordpress.org/plugins/page-sidebar-for-twentyseventeen/
 * Description: Adds default sidebar to all pages.
 * Version:     1.2
 * Author:      Joachim Jensen
 * Author URI:  https://dev.institute
 * License: GPLv3
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Make sure legacy plugin with other slug is not enabled
if(!function_exists('psts_body_class')) {

	require_once(plugin_dir_path( __FILE__ ).'tgm-plugin-activation.php');

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

	/**
	 * Initiate
	 *
	 * @since  1.1
	 * @return void
	 */
	function psts_init() {
		if(function_exists('twentyseventeen_setup')) {
			add_filter( 'template_include', 'psts_template' );
		}
	}

	add_action('after_setup_theme','psts_init',999);

}
