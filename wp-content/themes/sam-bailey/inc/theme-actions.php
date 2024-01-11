<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'sambailey_register_sidebar' ) ) {
	function sambailey_register_sidebar() {
		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'sam-bailey' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', 'sam-bailey' ),
			'before_widget' => '<div id="%1$s" class="ptf-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="ptf-widget__title">',
			'after_title' => '</h5>'
		) );
	}
}
add_action( 'widgets_init', 'sambailey_register_sidebar' );

/**
 * Fixed socials
 */
if ( ! function_exists( 'sambailey_fixed_socials' ) ) {
	function sambailey_fixed_socials() {

		// fixed socials
		if ( sambailey_get_theme_mod( 'fixed_socials_show' ) == 'show' && sambailey_get_theme_mod( 'fixed_socials_list' ) ) :

			echo '<div class="ptf-fixed-socials">';
			foreach ( sambailey_get_theme_mod( 'fixed_socials_list' ) as $socialItem ) :
				echo '<a class="ptf-social-icon ptf-social-icon--style-1" href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank"><i class="' . esc_attr( $socialItem[ 'social_class' ] ) . '"></i></a>';
			endforeach;

			echo '</div>';

		endif;

	}
}
add_action( 'wp_body_open', 'sambailey_fixed_socials' );

/**
 * Prints Tracking code
 */
if ( ! function_exists( 'sambailey_print_tracking_code' ) ) {
	function sambailey_print_tracking_code() {
		$tracking_code = sambailey_get_theme_mod( 'tracking_code' );
		if ( ! empty( $tracking_code ) ) {
			echo '' . $tracking_code;
		}
	}
}
add_action( 'wp_head', 'sambailey_print_tracking_code' );