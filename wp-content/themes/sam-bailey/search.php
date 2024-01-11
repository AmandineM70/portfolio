<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header();

get_template_part( 'template-parts/page-title/page-title', 'search' );

?>

<main class="ptf-main ptf-main--padding">

	<?php

		// Elementor `archive` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {
			get_template_part( 'template-parts/archive/archive', 'search' );
		}

	?>

</main>
<!-- /.ptf-main -->

<?php get_footer(); ?>