<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<article <?php post_class( 'ptf-page ptf-page--404' ); ?>>

	<div class="container">

		<div class="ptf-404-icon">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
		</div>

		<h1><?php echo esc_html( sambailey_get_theme_mod( 'error_title' ) ); ?></h1>

		<p><?php echo wp_kses_post( sambailey_get_theme_mod( 'error_subtitle' ) ); ?></p>

		<a class="ptf-btn ptf-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to Home', 'sam-bailey' ); ?>
		</a>

	</div>

</article>
<!-- /.ptf-page--404 -->