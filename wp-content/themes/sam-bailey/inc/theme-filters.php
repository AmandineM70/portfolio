<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * ACF in Admin Panel
 */
if ( ! function_exists( 'sambailey_acf_in_admin_panel' ) ) {
	function sambailey_acf_in_admin_panel() {
		return sambailey_get_theme_mod( 'acf_show_admin_panel' ) == 'show' ? true : false;
	}
}
add_filter( 'sambailey/acf_show_admin_panel', 'sambailey_acf_in_admin_panel' );

/**
 * Add body class
 */
if ( ! function_exists( 'sambailey_add_body_class' ) ) {
	function sambailey_add_body_class( $classes ) {
		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}

		// preloader
		if ( sambailey_get_theme_mod( 'preloader' ) == 'show' ) {
			$classes[] = 'animsition';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'sambailey_add_body_class' );

/**
 * Add html class
 */
if ( ! function_exists( 'sambailey_add_html_class' ) ) {
	function sambailey_add_html_class( $classes = '' ) {
		return apply_filters( 'sambailey/add_html_class', sambailey_sanitize_class( $classes ) );
	}
}

/**
 * Get post password form
 */
if ( ! function_exists( 'sambailey_get_post_password_form' ) ) {
	function sambailey_get_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="ptf-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<h4>' . esc_html__( 'Password Protected', 'sam-bailey' ) . '</h4>';
		$output .= '<p>' . esc_html__( 'This content is restricted access, please type the password below and get access.', 'sam-bailey' ) . '</p>';
		$output .= '<div class="ptf-form-group">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , 'sam-bailey' ) . '">';
		$output .= '<button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></button>';
		$output .= '</div>';
		$output .= '</form>';
		return apply_filters( 'sambailey/get_post_password_form', $output );
	}
}
add_filter( 'the_password_form', 'sambailey_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'sambailey_change_admin_logo_link' ) ) {
	function sambailey_change_admin_logo_link() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'sambailey_change_admin_logo_link' );

/**
 * Comment form fields order
 */
if ( ! function_exists( 'sambailey_comment_form_fields' ) ) {
	function sambailey_comment_form_fields( $comment_fields ) {
		if ( sambailey_get_theme_mod( 'comment_placement' ) == 'bottom' ) {
			$keys = array_keys( $comment_fields );
			if ( 'comment' == $keys[0] ) {
				$comment_fields['comment'] = array_shift( $comment_fields );
			}
		}
		return $comment_fields;
	}
}
add_filter( 'comment_form_fields', 'sambailey_comment_form_fields' );

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'sambailey_filter_tag_cloud' ) ) {
	function sambailey_filter_tag_cloud( $args ) {
		$args['smallest'] = 15;
		$args['largest'] = 15;
		$args['unit'] = 'px';
		$args['orderby'] = 'count';
		$args['order'] = 'DESC';
		$args['separator']= ', ';
		return $args;
	}
}
add_filter( 'widget_tag_cloud_args', 'sambailey_filter_tag_cloud' );

/**
 * Custom select for ACF
 */
if ( ! function_exists( 'sambailey_add_custom_select_to_acf' ) ) {
	function sambailey_add_custom_select_to_acf( $field, $type = null ) {

		// reset choices
		$field['choices'] = [];

		$args = [
			'post_type' => 'elementor_library',
			'posts_per_page' => -1,
		];

		if ( $type ) {

			$args[ 'tax_query' ] = [
				[
					'taxonomy' => 'elementor_library_type',
					'field' => 'slug',
					'terms' => $type,
				],
			];

		}

		$page_templates = get_posts( $args );

		$field['choices'][0] = esc_html__( 'Select a Template', 'sam-bailey' );

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$field['choices'][$post->ID] = $post->post_title;
			}
		} else {
			$field['choices'][0] = esc_html__( 'Create a Template First', 'sam-bailey' );
		}

		// return the field
		return $field;

	}
}
add_filter( 'acf/load_field/name=footer_template', 'sambailey_add_custom_select_to_acf' );

/**
 * CF7 Remove Autop
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );