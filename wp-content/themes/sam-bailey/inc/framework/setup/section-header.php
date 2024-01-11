<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sam-bailey' ),
		'hide' => esc_html__( 'Hide', 'sam-bailey' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_2',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_opaque',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Navigation Opaque', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
		'disable' => esc_html__( 'Disable', 'sam-bailey' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
		'disable' => esc_html__( 'Disable', 'sam-bailey' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent_always',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent Always', 'sam-bailey' ),
	'description' => esc_html__( 'Transparent also after page scrolled down.', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
		'disable' => esc_html__( 'Disable', 'sam-bailey' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_sticky',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Sticky', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
		'disable' => esc_html__( 'Disable', 'sam-bailey' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'navigation_logo',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'navigation_logo_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.ptf-header .ptf-navbar-logo img',
			'property' => 'height'
		)
	)
) );

/**
 * Offcanvas menu
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_1',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Locales', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'offcanvas_menu_locales',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Locales Show', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sam-bailey' ),
		'hide' => esc_html__( 'Hide', 'sam-bailey' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_2',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'offcanvas_menu_socials_list',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Social List', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'social', 'sam-bailey' )
	),
	'fields' => array(
		'social_class' => array(
			'type' => 'text',
			'label' => esc_html__( 'Social Class', 'sam-bailey' ),
		),
		'social_url' => array(
			'type' => 'text',
			'label' => esc_html__( 'Social Url', 'sam-bailey' )
		),
	),
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_3',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Copyright', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'offcanvas_menu_copyright',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Copyright', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '<p>© SamBailey 2021.</p>',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );