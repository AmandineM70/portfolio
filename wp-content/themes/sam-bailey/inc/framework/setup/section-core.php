<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * General
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_1',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Colors', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'body_background',
	'section' => 'core_general',
	'label' => esc_html__( 'Site Background', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '#0f0f0f',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'multicolor',
	'settings' => 'accent_color',
	'label' => esc_html__( 'Accent Colors', 'sam-bailey' ),
	'section' => 'core_general',
 	'priority' => $priority++,

	'choices' => [
		'primary' => esc_html__( 'Primary', 'sam-bailey' ),
		'secondary' => esc_html__( 'Secondary', 'sam-bailey' ),
	],
	'default' => [
		'primary' => '#fde3a7',
		'secondary' => '#a95847',
	],
	'output' => array(
		array(
			'choice' => 'primary',
			'element' => ':root',
			'property' => '--ptf-primary-color',
			'context' => array( 'editor', 'front' ),
		),
		array(
			'choice' => 'secondary',
			'element' => ':root',
			'property' => '--ptf-secondary-color',
			'context' => array( 'editor', 'front' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'preloader',
	'section' => 'core_general',
	'label' => esc_html__( 'Preloader', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sam-bailey' ),
		'hide' => esc_html__( 'Hide', 'sam-bailey' ),
	),
	'default' => 'hide'
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_3',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', 'sam-bailey' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'link',
	'settings' => 'arrow_link',
	'label' => esc_html__( 'Arrow Link', 'sam-bailey' ),
	'section' => 'core_general',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'tracking_code',
	'section' => 'core_general',
	'label' => esc_html__( 'Tracking Code', 'sam-bailey' ),
	'description' => esc_html__( 'Copy and paste your tracking code here.', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Fixed socials
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'fixed_socials_show',
	'section' => 'core_fixed_socials',
	'label' => esc_html__( 'Socials Show', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sam-bailey' ),
		'hide' => esc_html__( 'Hide', 'sam-bailey' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'fixed_socials_list',
	'section' => 'core_fixed_socials',
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
			'setting' => 'fixed_socials_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

/**
 * Selection
 */
VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Text Color', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#ffffff',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
			'suffix' => '!important'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Background Color', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true
	),
	'default' => '#a95847',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important'
		)
	)
) );

/**
 * Scrollbar
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
		'disable' => esc_html__( 'Disable', 'sam-bailey' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Track Color', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#fde3a7',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Color', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#a95847',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar-thumb',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Width', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '2'
	),
	'default' => '3',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'width',
			'units' => 'px'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );