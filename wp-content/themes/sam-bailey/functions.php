<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

define( 'SAMBAILEY_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'SAMBAILEY_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'SAMBAILEY_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'sambailey_setup' ) ) {
	function sambailey_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ducky, use a find and replace
		 * to change 'sam-bailey' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sam-bailey', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_theme_support( 'dark-editor-style' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', 'sam-bailey' ),
					'shortName' => esc_html__( 'S', 'sam-bailey' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'sam-bailey' ),
					'shortName' => esc_html__( 'M', 'sam-bailey' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'sam-bailey' ),
					'shortName' => esc_html__( 'L', 'sam-bailey' ),
					'size' => 28,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'sam-bailey' ),
					'shortName' => esc_html__( 'XL', 'sam-bailey' ),
					'size' => 38,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary', 'sam-bailey' ),
				'slug' => 'primary',
				'color' => sambailey_get_theme_mod( 'accent_color' )[ 'primary' ],
			),
			array(
				'name' => esc_html__( 'Secondary', 'sam-bailey' ),
				'slug' => 'secondary',
				'color' => sambailey_get_theme_mod( 'accent_color' )[ 'secondary' ],
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Gutenberg
		add_theme_support( 'align-wide' );

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'sam-bailey' ),
			'onepage-menu' => esc_html__( 'Onepage Menu', 'sam-bailey' ),
			'navbar-menu' => esc_html__( 'Navbar Menu', 'sam-bailey' ),
		) );

		// 991x826
		add_image_size( 'sambailey-991x826_crop', 991, 826, true );
		add_image_size( 'sambailey-991x826', 991 );

		// 1280x720
		add_image_size( 'sambailey-1280x720_crop', 1280, 720, true );
		add_image_size( 'sambailey-1280x720', 1280 );

		// 1920x1080
		add_image_size( 'sambailey-1920x1080_crop', 1920, 1080, true );
		add_image_size( 'sambailey-1920x1080', 1920 );

	}
}
add_action( 'after_setup_theme', 'sambailey_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'sambailey_content_width' ) ) {
	function sambailey_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'sambailey/content_width', 1320 );
	}
}
add_action( 'after_setup_theme', 'sambailey_content_width', 0 );

/**
 * Import ACF fields
 */
if ( ! SAMBAILEY_DEVELOPMENT ) {
	function sambailey_acf_show_admin_panel() {
		return apply_filters( 'sambailey/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'sambailey_acf_show_admin_panel' );
}

if ( ! SAMBAILEY_DEVELOPMENT ) {
	require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'sambailey_acf_save_json' ) ) {
	function sambailey_acf_save_json( $path ) {
		$path = SAMBAILEY_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'sambailey_acf_save_json' );

if ( SAMBAILEY_DEVELOPMENT ) {
	if ( ! function_exists( 'sambailey_acf_load_json' ) ) {
		function sambailey_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = SAMBAILEY_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'sambailey_acf_load_json' );
}

/**
 * Include Kirki fields
 */
require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';

/**
 * Required files
 */
$sambailey_theme_includes = array(
	'required-plugins',
	'enqueue',
	'includes',
	'ocdi',
	'functions',
	'actions',
	'filters',
	'menus'
);

foreach ( $sambailey_theme_includes as $file ) {
	require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/theme-' . $file . '.php';
}

// Unset the global variable.
unset( $sambailey_theme_includes );