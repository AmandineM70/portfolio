
<?php

	// Elementor `footer` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		get_template_part( 'template-parts/footer/footer' );
	}

?>

<?php if ( sambailey_get_theme_mod( 'arrow_link' ) ) : ?>

	<a class="ptf-arrow-link" href="<?php echo esc_url( sambailey_get_theme_mod( 'arrow_link' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="37"><path fill="currentColor" fill-rule="nonzero" d="M7.6 0v3.7h23.921L0 34.392 2.679 37 34.2 6.309V29.6H38V0z"/></svg></a>

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>