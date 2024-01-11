<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header();

get_template_part( 'template-parts/page-title/page-title', 'portfolio' );

?>

<main class="ptf-main">

	<?php

		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'custom-page' );
		endwhile;

	?>

</main>
<!-- /.ptf-main -->

<?php get_footer(); ?>