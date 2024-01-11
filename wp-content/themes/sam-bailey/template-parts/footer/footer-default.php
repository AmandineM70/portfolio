<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$footer_class = 'ptf-footer ptf-footer--default';

$acf_footer = sambailey_get_theme_mod( 'page_custom_footer', true );

if ( sambailey_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' ptf-footer--fixed';
}

if ( is_404() ) {
	$footer_class .= ' ptf-footer--fixed';
}

?>

<footer class="<?php echo sambailey_sanitize_class( $footer_class ); ?>">

	<div class="container-fluid">

		<?php if ( sambailey_get_theme_mod( 'footer_copyright' ) ) : ?>

			<div class="ptf-footer-copyright">

				<?php echo wp_kses_post( sambailey_get_theme_mod( 'footer_copyright' ) ); ?>

			</div>
			<!-- /.ptf-footer-copyright -->

		<?php endif; ?>

	</div>

</footer>
<!-- /.ptf-footer -->