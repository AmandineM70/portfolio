<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

if ( ! function_exists( 'sambailey_kirki_styling' ) ) {
	function sambailey_kirki_styling( $config ) {
		return wp_parse_args( array(
			'disable_loader' => true,
		), $config );
	}
}
add_filter( 'kirki_config', 'sambailey_kirki_styling' );

/**
* Add config
*/
VLT_Options::add_config( array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

/**
 * General
 */
VLT_Options::add_panel( 'panel_core', array(
	'title' => esc_html__( 'Core Options', 'sam-bailey' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_general', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'General Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_fixed_socials', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Fixed Socials', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-twitter',
) );

VLT_Options::add_section( 'core_selection', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Selection', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-underline',
) );

VLT_Options::add_section( 'core_scrollbar', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Scrollbar', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-sort',
) );

require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/setup/section-core.php';

/**
 * Header
 */
VLT_Options::add_panel( 'panel_header_general', array(
	'title' => esc_html__( 'Header Options', 'sam-bailey' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

VLT_Options::add_section( 'section_header_general', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'General Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_offcanvas_menu', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Offcanvas Menu', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
VLT_Options::add_section( 'section_footer_general', array(
	'title' => esc_html__( 'Footer Options', 'sam-bailey' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';

/**
 * Pages
 */
VLT_Options::add_panel( 'panel_page', array(
	'title' => esc_html__( 'Page Options', 'sam-bailey' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-page',
) );

VLT_Options::add_section( 'section_blog', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Blog Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-post',
) );

VLT_Options::add_section( 'section_archive', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Archive Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-category',
) );

VLT_Options::add_section( 'section_search', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Search Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-search',
) );

VLT_Options::add_section( 'section_single_post', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Single Post', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-write-blog',
) );

VLT_Options::add_section( 'section_404', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Page 404', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-warning',
) );

require SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/setup/section-pages.php';

/**
 * Typography
 */
VLT_Options::add_panel( 'panel_typography', array(
	'title' => esc_html__( 'Typography Options', 'sam-bailey' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_fonts', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'General Fonts', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_text', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Text Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-text',
) );

VLT_Options::add_section( 'typography_headings', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Heading Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-textcolor',
) );

VLT_Options::add_section( 'typography_blockquote', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Blockquote Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-quote',
) );

VLT_Options::add_section( 'typography_buttons', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Button Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-links',
) );

VLT_Options::add_section( 'typography_input', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Input Options', 'sam-bailey' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-edit',
) );

require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typography.php';

/**
 * Advanced
 */
VLT_Options::add_section( 'section_advanced', array(
	'title' => esc_html__( 'Advanced', 'sam-bailey' ),
	'priority' => 9999,
	'icon' => 'dashicons-star-filled',
) );

require_once SAMBAILEY_REQUIRE_DIRECTORY . 'inc/framework/setup/section-advanced.php';