<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * Blog page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_1',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_layout',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Layout', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'sam-bailey' ),
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_type_pagination',
	'section' => 'section_blog',
	'label' => esc_html__( 'Type Pagination', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sam-bailey' ),
		'paged' => esc_html__( 'Paged', 'sam-bailey' ),
		'numeric' => esc_html__( 'Numeric', 'sam-bailey' ),
	),
	'default' => 'numeric',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_2',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'blog_title',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Title', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Recent News', 'sam-bailey' ),
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'blog_image',
	'section' => 'section_blog',
	'label' => esc_html__( 'Image', 'sam-bailey' ),
	'priority' => $priority++,
	'default' => '',
) );

/**
 * Archive page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sa_1',
	'section' => 'section_archive',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_layout',
	'section' => 'section_archive',
	'label' => esc_html__( 'Archive Layout', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'sam-bailey' ),
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_type_pagination',
	'section' => 'section_archive',
	'label' => esc_html__( 'Type Pagination', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sam-bailey' ),
		'paged' => esc_html__( 'Paged', 'sam-bailey' ),
		'numeric' => esc_html__( 'Numeric', 'sam-bailey' ),
	),
	'default' => 'paged',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sa_2',
	'section' => 'section_archive',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'archive_image',
	'section' => 'section_archive',
	'label' => esc_html__( 'Image', 'sam-bailey' ),
	'priority' => $priority++,
	'default' => '',
) );

/**
 * Search page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ss_1',
	'section' => 'section_search',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_layout',
	'section' => 'section_search',
	'label' => esc_html__( 'Search Layout', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'sam-bailey' ),
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_type_pagination',
	'section' => 'section_search',
	'label' => esc_html__( 'Type Pagination', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sam-bailey' ),
		'paged' => esc_html__( 'Paged', 'sam-bailey' ),
		'numeric' => esc_html__( 'Numeric', 'sam-bailey' ),
	),
	'default' => 'paged',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ss_2',
	'section' => 'section_search',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'search_image',
	'section' => 'section_search',
	'label' => esc_html__( 'Image', 'sam-bailey' ),
	'priority' => $priority++,
	'default' => '',
) );

/**
 * Single post
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'comment_placement',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Comment Placement', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'top' => esc_html__( 'Top', 'sam-bailey' ),
		'bottom' => esc_html__( 'Bottom', 'sam-bailey' )
	),
	'default' => 'bottom',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_post',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Share', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sam-bailey' ),
		'hide' => esc_html__( 'Hide', 'sam-bailey' )
	),
	'default' => 'hide',
) );

/**
 * Page 404
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_title',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Title', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Page not found', 'sam-bailey' ),
) );

VLT_Options::add_field( array(
	'type' => 'textarea',
	'settings' => 'error_subtitle',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Subtitle', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'We are sorry. But the page you are looking for cannot be found.', 'sam-bailey' ),
) );