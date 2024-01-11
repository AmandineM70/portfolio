<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header();

get_template_part( 'template-parts/page-title/page-title', 'post' );

?>

<main class="ptf-main">

	<?php

		// Elementor `single` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
			get_template_part( 'template-parts/single-post/single', 'post' );
		}

	?>

</main>
<!-- /.ptf-main -->

<?php

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

?>

<?php get_footer(); ?>