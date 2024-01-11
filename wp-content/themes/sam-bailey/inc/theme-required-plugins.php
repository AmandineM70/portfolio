<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'sambailey_tgm_plugins' ) ) {
	function sambailey_tgm_plugins() {

		$source = 'http://paul-themes.com/wordpress/sam/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'sam-bailey' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'SamBailey Helper Plugin', 'sam-bailey' ),
				'slug' => 'sambailey_helper_plugin',
				'source' => esc_url( $source . 'sambailey_helper_plugin.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields PRO', 'sam-bailey' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Elementor Page Builder', 'sam-bailey' ),
				'slug' => 'elementor',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'sam-bailey' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'GTranslate', 'sam-bailey' ),
				'slug' => 'gtranslate',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'sam-bailey' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'One Click Demo Import', 'sam-bailey' ),
				'slug' => 'one-click-demo-import',
				'required' => false,
			)
		);
		tgmpa( $plugins );
	}
}
add_action( 'tgmpa_register', 'sambailey_tgm_plugins' );

/**
 * Print notice if helper plugin is not installed
 */
if ( ! function_exists( 'sambailey_helper_plugin_notice' ) ) {
	function sambailey_helper_plugin_notice() {
		if ( class_exists( 'VLThemesHelperPlugin' ) ) {
			return;
		}
		echo '<div class="notice notice-info is-dismissible"><p>' . sprintf( __( 'Please activate <strong>%s</strong> before your work with this theme.', 'sam-bailey' ), 'SamBailey Helper Plugin' ) . '</p></div>';
	}
}
add_action( 'admin_notices', 'sambailey_helper_plugin_notice' );