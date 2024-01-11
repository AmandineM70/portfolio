<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$size = 'sambailey-991x826_crop';
$post_class = 'ptf-post ptf-post--masonry';

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="ptf-post-media">

			<?php the_post_thumbnail( $size, array( 'loading' => 'lazy' ) ); ?>

		</div>
		<!-- /.ptf-post-thumbnail -->

	<?php endif; ?>

	<div class="ptf-post-content">

		<header class="ptf-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
		</header>
		<!-- /.ptf-post-header -->

	</div>
	<!-- /.ptf-post-content -->

</article>
<!-- /.ptf-post -->