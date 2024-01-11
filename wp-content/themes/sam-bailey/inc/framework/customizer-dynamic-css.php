<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

if ( ! function_exists( 'sambailey_dynamic_css' ) ) {
	function sambailey_dynamic_css( $css ) {
		$css .= '';

		return $css;
	}
}
add_filter( 'kirki_sambailey_customize_dynamic_css', 'sambailey_dynamic_css' );