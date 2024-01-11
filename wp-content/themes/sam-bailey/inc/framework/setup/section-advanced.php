<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * Advanced
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'jquery_in_footer',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Load jQuery in footer', 'sam-bailey' ),
	'description' => esc_html__( 'Solves render-blocking issue, however can cause plugin conflicts.', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'sam-bailey' ),
		'enable' => esc_html__( 'Enable', 'sam-bailey' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'acf_show_admin_panel',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Show ACF in Admin Panel', 'sam-bailey' ),
	'description' => esc_html__( 'This field enable tab for ACF Professional in your dashboard.', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'hide' => esc_html__( 'Hide', 'sam-bailey' ),
		'show' => esc_html__( 'Show', 'sam-bailey' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'mobile_status_bar_color',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Mobile Status Bar Colors', 'sam-bailey' ),
	'description' => esc_html__( 'Field for address bar or device status bar to match your brand colors.', 'sam-bailey' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '#a95847',
) );