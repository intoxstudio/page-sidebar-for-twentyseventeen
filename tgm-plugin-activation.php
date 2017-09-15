<?php
/**
 * @package Page Sidebar for Twenty Seventeen
 * @author Joachim Jensen <jv@intox.dk>
 * @license GPLv3
 * @copyright 2017 by Joachim Jensen
 */

require_once plugin_dir_path( __FILE__ ).'lib/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'psts_register_required_plugins' );

function psts_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Content Aware Sidebars',
			'slug'      => 'content-aware-sidebars',
			'required'  => false,
		)
	);

	$config = array(
		'id'           => 'page-sidebar-for-twentyseventeen',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'notice_can_install_required'     => _n_noop(
				// translators: 1: plugin name(s).
				'Page Sidebar for Twenty Seventeen requires the following plugin: %1$s.',
				'Page Sidebar for Twenty Seventeen requires the following plugins: %1$s.',
				'page-sidebar-for-twentyseventeen'
			),
			'notice_can_install_recommended'  => _n_noop(
				// translators: 1: plugin name(s).
				'Page Sidebar for Twenty Seventeen recommends the following plugin: %1$s.',
				'Page Sidebar for Twenty Seventeen recommends the following plugins: %1$s.',
				'page-sidebar-for-twentyseventeen'
			),
			'nag_type'                        => 'notice-info'
		)
	);

	tgmpa( $plugins, $config );
}

//