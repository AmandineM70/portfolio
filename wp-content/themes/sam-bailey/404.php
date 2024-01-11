<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header();

?>

<main class="ptf-main">

	<?php

		// Elementor `single` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
			get_template_part( 'template-parts/content/content', 'page-404' );
		}

	?>

</main>
<!-- /.ptf-main -->

<?php get_footer(); ?>