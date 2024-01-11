<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$footer_class = 'ptf-footer ptf-footer--template';

$acf_footer = sambailey_get_theme_mod( 'page_custom_footer', true );

if ( sambailey_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' ptf-footer--fixed';
}

$footer_template = sambailey_get_theme_mod( 'footer_template', $acf_footer );

?>

<footer class="<?php echo sambailey_sanitize_class( $footer_class ); ?>">

	<?php echo sambailey_render_elementor_template( $footer_template ); ?>

</footer>
<!-- /.ptf-footer -->