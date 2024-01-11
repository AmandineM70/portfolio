<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<article <?php post_class( 'ptf-page ptf-page--custom' ); ?>>

	<?php the_content(); ?>

	<div class="clearfix"></div>

	<?php
		wp_link_pages( array(
			'before' => '<div class="ptf-link-pages"><h5>' . esc_html__( 'Pages: ', 'sam-bailey' ) . '</h5>',
			'after' => '</div>',
			'separator' => '<span class="sep">|</span>',
			'nextpagelink' => esc_html__( 'Next page', 'sam-bailey' ),
			'previouspagelink' => esc_html__( 'Previous page', 'sam-bailey' ),
			'next_or_number' => 'next'
		) );
	?>

</article>
<!-- /.ptf-page -->