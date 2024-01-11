<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$size = 'sambailey-1280x720_crop';
$post_class = 'ptf-post ptf-post--default';

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="ptf-post-media">

			<a href="<?php the_permalink(); ?>">

				<?php the_post_thumbnail( $size, array( 'loading' => 'lazy' ) ); ?>

			</a>

		</div>
		<!-- /.ptf-post-media -->

	<?php endif; ?>

	<div class="ptf-post-content">

		<header class="ptf-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
		</header>
		<!-- /.ptf-post-header -->

		<div class="ptf-post-excerpt">
			<?php echo sambailey_get_trimmed_content( get_the_content(), 45 ); ?>
		</div>
		<!-- /.ptf-post-excerpt -->

		<footer class="ptf-post-footer">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-read-more' ); ?>
		</footer>
		<!-- /.ptf-post-footer -->

	</div>
	<!-- /.ptf-post-content -->

</article>
<!-- /.ptf-post -->