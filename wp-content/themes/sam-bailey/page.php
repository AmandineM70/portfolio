<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header();

get_template_part( 'template-parts/page-title/page-title', 'page' );

?>

<main class="ptf-main ptf-main--padding">

	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
	?>

</main>
<!-- /.ptf-main -->

<?php

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

?>

<?php get_footer(); ?>