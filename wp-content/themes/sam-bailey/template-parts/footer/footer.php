<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$acf_footer = sambailey_get_theme_mod( 'page_custom_footer', true );

if ( sambailey_get_theme_mod( 'footer_show', $acf_footer ) == 'show' ) {
	get_template_part( 'template-parts/footer/footer', sambailey_get_theme_mod( 'footer_layout', $acf_footer ) );
}