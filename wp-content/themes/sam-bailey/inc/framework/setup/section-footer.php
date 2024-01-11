<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * Footer general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_1',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_show',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Show', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sam-bailey' ),
		'hide' => esc_html__( 'Hide', 'sam-bailey' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_layout',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Layout', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'sam-bailey' ),
		'template' => esc_html__( 'Template', 'sam-bailey' ),
	),
	'default' => 'default',
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_fixed',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Fixed', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
		'disable' => esc_html__( 'Disable', 'sam-bailey' )
	),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'footer_layout',
			'operator' => '==',
			'value' => 'default',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_template',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Template', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => sambailey_get_elementor_templates(),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show'
		),
		array(
			'setting' => 'footer_layout',
			'operator' => '==',
			'value' => 'template',
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_copyright',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Copyright', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '<p>© SamBailey 2021.</p>',
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'footer_layout',
			'operator' => '==',
			'value' => 'default',
		)
	)
) );